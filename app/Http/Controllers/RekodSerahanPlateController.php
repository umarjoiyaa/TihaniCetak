<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\RekodSerahanPlate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RekodSerahanPlateController extends Controller
{
    public function Data(Request $request)
    {
        if ($request->ajax() && $request->input('columnsData') != null) {
            $columnsData = $request->input('columnsData');
            $draw = $request->input('draw');
            $start = $request->input('start');
            $length = $request->input('length');
            $search = $request->input('search.value');
            $orderByColumnIndex = $request->input('order.0.column'); // Get the index of the column to sort by
            $orderByDirection = $request->input('order.0.dir'); // Get the sort direction ('asc' or 'desc')

            $query = RekodSerahanPlate::select('id', 'sale_order_id', 'date', 'created_by', 'user_text', 'mesin', 'seksyen_no', 'kuaniti_plate', 'dummy_lipat', 'sample')->with('user', 'sale_order');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->where('date', 'like', '%' . $searchLower . '%')
                        ->orWhereHas('user', function ($query) use ($searchLower) {
                            $query->where('user_name', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhere('user_text', 'like', '%' . $searchLower . '%')
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('order_no', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhere('mesin', 'like', '%' . $searchLower . '%')
                        ->orWhere('seksyen_no', 'like', '%' . $searchLower . '%')
                        ->orWhere('kuaniti_plate', 'like', '%' . $searchLower . '%')
                        ->orWhere('dummy_lipat', 'like', '%' . $searchLower . '%')
                        ->orWhere('sample', 'like', '%' . $searchLower . '%');
                    // Add more columns as needed
                });
            }
            // Determine the column to sort by
            $results = null;

            if (!empty($columnsData)) {
                $sortableColumns = [
                    1 => 'date',
                    2 => 'mesin',
                    3 => 'sale_order_id',
                    4 => 'seksyen_no',
                    5 => 'kuaniti_plate',
                    6 => 'dummy_lipat',
                    7 => 'sample',
                    8 => 'user_text',
                    9 => 'created_by',
                    // Add more columns as needed
                ];
                if($orderByColumnIndex != null){
                    if($orderByColumnIndex == "0"){
                        $orderByColumn = 'created_at';
                        $orderByDirection = 'ASC';
                    }else{
                        $orderByColumn = $sortableColumns[$orderByColumnIndex];
                    }
                }else{
                    $orderByColumn = 'created_at';
                }
                if($orderByDirection == null){
                    $orderByDirection = 'ASC';
                }
                $results = $query->where(function ($q) use ($columnsData) {
                    foreach ($columnsData as $column) {
                        $searchLower = strtolower($column['value']);

                        switch ($column['index']) {
                            case 1:
                                $q->where('date', 'like', '%' . $searchLower . '%');
                                break;
                            case 2:
                                $q->where('mesin', 'like', '%' . $searchLower . '%');
                                break;
                            case 3:
                                $q->whereHas('sale_order', function ($query) use ($searchLower) {
                                    $query->where('order_no', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 4:
                                $q->where('seksyen_no', 'like', '%' . $searchLower . '%');
                                break;
                            case 5:
                                $q->where('kuaniti_plate', 'like', '%' . $searchLower . '%');
                                break;
                            case 6:
                                $q->where('dummy_lipat', 'like', '%' . $searchLower . '%');
                                break;
                            case 7:
                                $q->where('sample', 'like', '%' . $searchLower . '%');
                                break;
                            case 8:
                                $q->where('user_text', 'like', '%' . $searchLower . '%');
                                break;
                            case 9:
                                $q->whereHas('user', function ($query) use ($searchLower) {
                                    $query->where('full_name', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            default:
                                break;
                        }
                    }
                })->orderBy($orderByColumn, $orderByDirection)->get();
            }

            // Process and format the results for DataTables
            $recordsTotal = $results ? $results->count() : 0;

            // Check if there are results before applying skip and take
            if ($results->isNotEmpty()) {
                $uom = $results->skip($start)->take($length)->all();
            } else {
                $uom = [];
            }

            $index = 0;
            foreach ($uom as $row) {
                $row->sr_no = $start + $index + 1;
                $row->action = '<div class="dropdown dropdownwidth">
                    <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                    data-toggle="dropdown" id="dropdownMenuButton" type="button">Action <i class="fas fa-caret-down ml-1"></i></button>
                    <div  class="dropdown-menu tx-13">
                    <a class="dropdown-item" href="' . route('rekod_serahan_plate.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('rekod_serahan_plate.view', $row->id) . '">View</a>
                    <a class="dropdown-item"  id="swal-warning" data-delete="' . route('rekod_serahan_plate.delete', $row->id) . '">Delete</a>
                    </div>
                </div>';
                $index++;
            }

            // // Continue with your response
            $uomsWithoutAction = array_map(function ($row) {
                return $row;
            }, $uom);

            return response()->json([
                'draw' => $draw,
                'recordsTotal' => $recordsTotal,
                'recordsFiltered' => $recordsTotal, // Total records after filtering
                'data' => array_values($uomsWithoutAction),
            ]);
        } elseif ($request->ajax()) {

            $draw = $request->input('draw');
            $start = $request->input('start');
            $length = $request->input('length');
            $search = $request->input('search.value');
            $orderByColumnIndex = $request->input('order.0.column'); // Get the index of the column to sort by
            $orderByDirection = $request->input('order.0.dir'); // Get the sort direction ('asc' or 'desc')

            $query = RekodSerahanPlate::select('id', 'sale_order_id', 'date', 'created_by', 'user_text', 'mesin', 'seksyen_no', 'kuaniti_plate', 'dummy_lipat', 'sample')->with('user', 'sale_order');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->where('date', 'like', '%' . $searchLower . '%')
                        ->orWhereHas('user', function ($query) use ($searchLower) {
                            $query->where('user_name', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhere('user_text', 'like', '%' . $searchLower . '%')
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('order_no', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhere('mesin', 'like', '%' . $searchLower . '%')
                        ->orWhere('seksyen_no', 'like', '%' . $searchLower . '%')
                        ->orWhere('kuaniti_plate', 'like', '%' . $searchLower . '%')
                        ->orWhere('dummy_lipat', 'like', '%' . $searchLower . '%')
                        ->orWhere('sample', 'like', '%' . $searchLower . '%');
                    // Add more columns as needed
                });
            }

            $sortableColumns = [
                1 => 'date',
                2 => 'mesin',
                3 => 'sale_order_id',
                4 => 'seksyen_no',
                5 => 'kuaniti_plate',
                6 => 'dummy_lipat',
                7 => 'sample',
                8 => 'user_text',
                9 => 'created_by',
                // Add more columns as needed
            ];
            if($orderByColumnIndex != null){
                if($orderByColumnIndex != "0"){
                    $orderByColumn = $sortableColumns[$orderByColumnIndex];
                    $query->orderBy($orderByColumn, $orderByDirection);
                }else{
                    $query->latest('created_at');
                }
            }else{
                $query->latest('created_at');
            }
            $recordsTotal = $query->count();

            $uom = $query
                ->skip($start)
                ->take($length)
                ->get();

            $uom->each(function ($row, $index)  use (&$start) {
                $row->sr_no = $start + $index + 1;
                $row->action = '<div class="dropdown dropdownwidth">
                    <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                    data-toggle="dropdown" id="dropdownMenuButton" type="button">Action <i class="fas fa-caret-down ml-1"></i></button>
                    <div  class="dropdown-menu tx-13">
                    <a class="dropdown-item" href="' . route('rekod_serahan_plate.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('rekod_serahan_plate.view', $row->id) . '">View</a>
                    <a class="dropdown-item"  id="swal-warning" data-delete="' . route('rekod_serahan_plate.delete', $row->id) . '">Delete</a>
                    </div>
                </div>';
            });

            return response()->json([
                'draw' => $draw,
                'recordsTotal' => $recordsTotal,
                'recordsFiltered' => $recordsTotal, // Total records after filtering
                'data' => $uom,
            ]);
        }
    }

    public function index()
    {
        if (
            Auth::user()->hasPermissionTo('REKOD SERAHAN PLATE CETAX DAN SAMPLE List') ||
            Auth::user()->hasPermissionTo('REKOD SERAHAN PLATE CETAX DAN SAMPLE Create') ||
            Auth::user()->hasPermissionTo('REKOD SERAHAN PLATE CETAX DAN SAMPLE Update') ||
            Auth::user()->hasPermissionTo('REKOD SERAHAN PLATE CETAX DAN SAMPLE Delete') ||
            Auth::user()->hasPermissionTo('REKOD SERAHAN PLATE CETAX DAN SAMPLE View')
        ) {
            Helper::logSystemActivity('REKOD SERAHAN PLATE CETAX DAN SAMPLE', 'REKOD SERAHAN PLATE CETAX DAN SAMPLE List');
            return view('Mes.RekodSerahanPlate.index');
        }
        return back()->with('custom_errors', 'You don`t have Right Permission');
    }
    public function create()
    {
        if (!Auth::user()->hasPermissionTo('REKOD SERAHAN PLATE CETAX DAN SAMPLE Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $users = User::all();
        Helper::logSystemActivity('REKOD SERAHAN PLATE CETAX DAN SAMPLE', 'REKOD SERAHAN PLATE CETAX DAN SAMPLE Create');
        return view('Mes.RekodSerahanPlate.create', compact('users'));
    }
    public function store(Request $request)
    {
        if (!Auth::user()->hasPermissionTo('REKOD SERAHAN PLATE CETAX DAN SAMPLE Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $validator = null;

        $validatedData = $request->validate([
            'sale_order' => 'required',
            'date' => 'required',
            'user' => 'required',

        ],[
            'user.required' => 'The operator field is required.',
        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }



        $userIds = $request->user;
        $userNames = [];

        foreach ($userIds as $userId) {
            $user = User::find($userId);
            if ($user) {
               $userNames[] = $user->full_name;
            }
        }

        $userText = implode(', ', $userNames);

        $rekod_serahan_plate = new RekodSerahanPlate();
        $rekod_serahan_plate->sale_order_id = $request->sale_order;
        $rekod_serahan_plate->date = $request->date;
        $rekod_serahan_plate->user_id = json_encode($userIds);
        $rekod_serahan_plate->user_text = $userText;
        $rekod_serahan_plate->jenis = $request->jenis;
        if($request->jenis == "Other"){
            $rekod_serahan_plate->user_input = $request->user_input;
        }else{
            $rekod_serahan_plate->user_input = '';
        }
        $rekod_serahan_plate->mesin = $request->mesin == null ? '' : $request->mesin ;
        $rekod_serahan_plate->seksyen_no = $request->seksyen_no == null ? '' : $request->seksyen_no;
        $rekod_serahan_plate->kuaniti_plate = $request->kuaniti_plate == null ? '' :$request->kuaniti_plate ;
        $rekod_serahan_plate->dummy_lipat = $request->dummy_lipat == null ? '' : $request->dummy_lipat;
        $rekod_serahan_plate->sample = $request->sample == null ? '' : $request->sample ;
        $rekod_serahan_plate->created_by = Auth::user()->id;
        $rekod_serahan_plate->save();
        Helper::logSystemActivity('REKOD SERAHAN PLATE CETAX DAN SAMPLE', 'REKOD SERAHAN PLATE CETAX DAN SAMPLE Store');
        return redirect()->route('rekod_serahan_plate')->with('custom_success', 'REKOD SERAHAN PLATE CETAX DAN SAMPLE has been Created Successfully !');
    }

    public function edit($id)
    {
        if (!Auth::user()->hasPermissionTo('REKOD SERAHAN PLATE CETAX DAN SAMPLE Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $rekod_serahan_plate = RekodSerahanPlate::find($id);
        $users = User::all();
        Helper::logSystemActivity('REKOD SERAHAN PLATE CETAX DAN SAMPLE', 'REKOD SERAHAN PLATE CETAX DAN SAMPLE Edit');
        return view('Mes.RekodSerahanPlate.edit', compact('rekod_serahan_plate', 'users'));
    }

    public function view($id)
    {
        if (!Auth::user()->hasPermissionTo('REKOD SERAHAN PLATE CETAX DAN SAMPLE View')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $rekod_serahan_plate = RekodSerahanPlate::find($id);
        $users = User::all();
        Helper::logSystemActivity('REKOD SERAHAN PLATE CETAX DAN SAMPLE', 'REKOD SERAHAN PLATE CETAX DAN SAMPLE Edit');
        return view('Mes.RekodSerahanPlate.view', compact('rekod_serahan_plate', 'users'));
    }

    public function update(Request $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('REKOD SERAHAN PLATE CETAX DAN SAMPLE Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $validator = null;

        $validatedData = $request->validate([
            'sale_order' => 'required',
            'date' => 'required',
            'user' => 'required',

        ],[
            'user.required' => 'The operator field is required.',
        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $userIds = $request->user;
        $userNames = [];

        foreach ($userIds as $userId) {
            $user = User::find($userId);
            if ($user) {
               $userNames[] = $user->full_name;
            }
        }

        $userText = implode(', ', $userNames);

        $rekod_serahan_plate = RekodSerahanPlate::find($id);
        $rekod_serahan_plate->sale_order_id = $request->sale_order ;
        $rekod_serahan_plate->date = $request->date;
        $rekod_serahan_plate->user_id = json_encode($userIds);
        $rekod_serahan_plate->user_text = $userText;
        $rekod_serahan_plate->jenis = $request->jenis;
        if($request->jenis == "Other"){
            $rekod_serahan_plate->user_input = $request->user_input;
        }else{
            $rekod_serahan_plate->user_input = '';
        }
        $rekod_serahan_plate->mesin = $request->mesin == null ? '' : $request->mesin ;
        $rekod_serahan_plate->seksyen_no = $request->seksyen_no == null ? '' : $request->seksyen_no;
        $rekod_serahan_plate->kuaniti_plate = $request->kuaniti_plate == null ? '' :$request->kuaniti_plate ;
        $rekod_serahan_plate->dummy_lipat = $request->dummy_lipat == null ? '' : $request->dummy_lipat;
        $rekod_serahan_plate->sample = $request->sample == null ? '' : $request->sample ;
        $rekod_serahan_plate->created_by = Auth::user()->id;
        $rekod_serahan_plate->save();
        Helper::logSystemActivity('REKOD SERAHAN PLATE CETAX DAN SAMPLE', 'REKOD SERAHAN PLATE CETAX DAN SAMPLE Update');
        return redirect()->route('rekod_serahan_plate')->with('custom_success', 'REKOD SERAHAN PLATE CETAX DAN SAMPLE has been Updated Successfully !');
    }


    public function delete($id)
    {
        if (!Auth::user()->hasPermissionTo('REKOD SERAHAN PLATE CETAX DAN SAMPLE Delete')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $rekod_serahan_plate = RekodSerahanPlate::find($id);
        $rekod_serahan_plate->delete();
        Helper::logSystemActivity('REKOD SERAHAN PLATE CETAX DAN SAMPLE', 'REKOD SERAHAN PLATE CETAX DAN SAMPLE Delete');
        return redirect()->route('rekod_serahan_plate')->with('custom_success', 'REKOD SERAHAN PLATE CETAX DAN SAMPLE has been Deleted Successfully !');
    }
}
