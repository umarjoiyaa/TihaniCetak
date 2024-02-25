<?php

namespace App\Http\Controllers;
use App\Helpers\Helper;
use App\Models\KulitBuku;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KulitBukuController extends Controller
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

            $query = KulitBuku::select('id', 'sale_order_id', 'date', 'time', 'status', 'b_1', 'b_2', 'b_3')->with('sale_order');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->where('date', 'like', '%' . $searchLower . '%')
                        ->orWhere('time', 'like', '%' . $searchLower . '%')
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('order_no', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('kod_buku', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('description', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhere('b_1', 'like', '%' . $searchLower . '%')
                        ->orWhere('b_2', 'like', '%' . $searchLower . '%')
                        ->orWhere('b_3', 'like', '%' . $searchLower . '%')
                        ->orWhere('status', 'like', '%' . $searchLower . '%');
                    // Add more columns as needed
                });
            }
            // Determine the column to sort by
            $results = null;

            if (!empty($columnsData)) {
                $sortableColumns = [
                    1 => 'date',
                    2 => 'time',
                    3 => 'sale_order_id',
                    4 => 'sale_order_id',
                    5 => 'sale_order_id',
                    6 => 'b_1',
                    7 => 'b_2',
                    8 => 'b_3',
                    9 => 'status',
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
                                $q->where('time', 'like', '%' . $searchLower . '%');
                                break;
                            case 3:
                                $q->whereHas('sale_order', function ($query) use ($searchLower) {
                                    $query->where('order_no', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 4:
                                $q->whereHas('sale_order', function ($query) use ($searchLower) {
                                    $query->where('kod_buku', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 5:
                                $q->whereHas('sale_order', function ($query) use ($searchLower) {
                                    $query->where('description', 'like', '%' . $searchLower . '%');
                                });
                                break;
                                case 6:
                                    $q->where('b_1', 'like', '%' . $searchLower . '%');
                                    break;
                                case 7:
                                    $q->where('b_2', 'like', '%' . $searchLower . '%');
                                    break;
                                case 8:
                                    $q->where('b_3', 'like', '%' . $searchLower . '%');
                                    break;
                            case 9:
                                $q->where('status', 'like', '%' . $searchLower . '%');
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
                if ($row->status == 'checked') {
                    $row->status = '<span class="badge badge-warning">Checked</span>';
                    $actions = '<a class="dropdown-item" href="' . route('kulit_buku.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('kulit_buku.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('kulit_buku.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('kulit_buku.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'verified') {
                    $row->status = '<span class="badge badge-success">Verified</span>';
                    $actions = '<a class="dropdown-item" href="' . route('kulit_buku.view', $row->id) . '">View</a>
                                <a class="dropdown-item" id="swal-warning" data-delete="' . route('kulit_buku.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'declined') {
                    $row->status = '<span class="badge badge-danger">Declined</span>';
                    $actions = '<a class="dropdown-item" href="' . route('kulit_buku.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('kulit_buku.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('kulit_buku.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('kulit_buku.delete', $row->id) . '">Delete</a>';
                }

                $row->action = '<div class="dropdown dropdownwidth">
                                <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                                data-toggle="dropdown" id="dropdownMenuButton" type="button">Action <i class="fas fa-caret-down ml-1"></i></button>
                                <div  class="dropdown-menu tx-13">
                                    ' . $actions . '
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

            $query = KulitBuku::select('id', 'sale_order_id', 'date', 'time', 'status', 'b_1', 'b_2', 'b_3')->with('sale_order');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->where('date', 'like', '%' . $searchLower . '%')
                        ->orWhere('time', 'like', '%' . $searchLower . '%')
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('order_no', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('kod_buku', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('description', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhere('b_1', 'like', '%' . $searchLower . '%')
                        ->orWhere('b_2', 'like', '%' . $searchLower . '%')
                        ->orWhere('b_3', 'like', '%' . $searchLower . '%')
                        ->orWhere('status', 'like', '%' . $searchLower . '%');
                    // Add more columns as needed
                });
            }

            $sortableColumns = [
                1 => 'date',
                2 => 'time',
                3 => 'sale_order_id',
                4 => 'sale_order_id',
                5 => 'sale_order_id',
                6 => 'b_1',
                7 => 'b_2',
                8 => 'b_3',
                9 => 'status',
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
                if ($row->status == 'checked') {
                    $row->status = '<span class="badge badge-warning">Checked</span>';
                    $actions = '<a class="dropdown-item" href="' . route('kulit_buku.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('kulit_buku.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('kulit_buku.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('kulit_buku.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'verified') {
                    $row->status = '<span class="badge badge-success">Verified</span>';
                    $actions = '<a class="dropdown-item" href="' . route('kulit_buku.view', $row->id) . '">View</a>
                                <a class="dropdown-item" id="swal-warning" data-delete="' . route('kulit_buku.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'declined') {
                    $row->status = '<span class="badge badge-danger">Declined</span>';
                    $actions = '<a class="dropdown-item" href="' . route('kulit_buku.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('kulit_buku.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('kulit_buku.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('kulit_buku.delete', $row->id) . '">Delete</a>';
                }

                $row->action = '<div class="dropdown dropdownwidth">
                                <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                                data-toggle="dropdown" id="dropdownMenuButton" type="button">Action <i class="fas fa-caret-down ml-1"></i></button>
                                <div  class="dropdown-menu tx-13">
                                    ' . $actions . '
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

    public function index(){
        if (
            Auth::user()->hasPermissionTo('KULIT BUKU List') ||
            Auth::user()->hasPermissionTo('KULIT BUKU Create') ||
            Auth::user()->hasPermissionTo('KULIT BUKU Update') ||
            Auth::user()->hasPermissionTo('KULIT BUKU View') ||
            Auth::user()->hasPermissionTo('KULIT BUKU Delete') ||
            Auth::user()->hasPermissionTo('KULIT BUKU Verify')
        ) {
            Helper::logSystemActivity('KULIT BUKU', 'KULIT BUKU List');
            return view('Mes.KulitBuku.index');
        }
        return back()->with('custom_errors', 'You don`t have Right Permission');
    }

    public function create(){
        if (!Auth::user()->hasPermissionTo('KULIT BUKU Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        Helper::logSystemActivity('KULIT BUKU', 'KULIT BUKU Create');
        return view('Mes.KulitBuku.create');
    }

    public function store(Request $request)
    {
        if (!Auth::user()->hasPermissionTo('KULIT BUKU Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }



        $validator = null;

        $validatedData = $request->validate([
            'sale_order' => 'required',
            'date' => 'required',
            'time' => 'required'
        ]);



        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }
        $carbonTime = Carbon::createFromFormat('H:i', $request->time);
        $timeIn12HourFormat = $carbonTime->format('h:i A');

        $kulit_buku = new KulitBuku();
        $kulit_buku->sale_order_id = $request->sale_order;
        $kulit_buku->date = $request->date;
        $kulit_buku->time = $timeIn12HourFormat;
        $kulit_buku->created_by = Auth::user()->id;

        $kulit_buku->b_1 = $request->b_1;
        $kulit_buku->b_2 = $request->b_2;
        $kulit_buku->b_3 = $request->b_3;

        $kulit_buku->status = 'checked';
        $kulit_buku->save();

        Helper::logSystemActivity('KULIT BUKU', 'KULIT BUKU Store');
        return redirect()->route('kulit_buku')->with('custom_success', 'KULIT BUKU has been Created Successfully !');
    }

    public function edit($id){
        if (!Auth::user()->hasPermissionTo('KULIT BUKU Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $kulit_buku = KulitBuku::find($id);
        Helper::logSystemActivity('KULIT BUKU', 'KULIT BUKU Update');
        return view('Mes.KulitBuku.edit', compact('kulit_buku'));
    }

    public function view($id){
        if (!Auth::user()->hasPermissionTo('KULIT BUKU View')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $kulit_buku = KulitBuku::find($id);
        Helper::logSystemActivity('KULIT BUKU', 'KULIT BUKU View');
        return view('Mes.KulitBuku.view', compact('kulit_buku'));
    }

    public function update(Request $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('KULIT BUKU Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $validator = null;

        $validatedData = $request->validate([
            'sale_order' => 'required',
            'date' => 'required',
            'time' => 'required'
        ]);


        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
            ->withErrors($validator)->withInput();
        }
        $carbonTime = Carbon::createFromFormat('H:i', $request->time);
        $timeIn12HourFormat = $carbonTime->format('h:i A');

        $kulit_buku = KulitBuku::find($id);
        $kulit_buku->sale_order_id = $request->sale_order;
        $kulit_buku->date = $request->date;
        $kulit_buku->time = $timeIn12HourFormat;
        $kulit_buku->created_by = Auth::user()->id;

        $kulit_buku->b_1 = $request->b_1;
        $kulit_buku->b_2 = $request->b_2;
        $kulit_buku->b_3 = $request->b_3;

        $kulit_buku->status = 'checked';
        $kulit_buku->save();

        Helper::logSystemActivity('KULIT BUKU', 'KULIT BUKU Update');
        return redirect()->route('kulit_buku')->with('custom_success', 'KULIT BUKU has been Updated Successfully !');
    }

    public function verify($id){
        if (!Auth::user()->hasPermissionTo('KULIT BUKU Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $kulit_buku = KulitBuku::find($id);
        Helper::logSystemActivity('KULIT BUKU', 'KULIT BUKU Update');
        return view('Mes.KulitBuku.verify', compact('kulit_buku'));
    }

    public function approve_approve(Request $request, $id){
        if (!Auth::user()->hasPermissionTo('KULIT BUKU Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $kulit_buku = KulitBuku::find($id);
        $kulit_buku->status = 'verified';
        $kulit_buku->verified_by_date = Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y h:i:s A');
        $kulit_buku->verified_by_user = Auth::user()->user_name;
        $kulit_buku->verified_by_designation = (Auth::user()->designation != null) ? Auth::user()->designation->name : 'not assign';
        $kulit_buku->verified_by_department = (Auth::user()->department != null) ? Auth::user()->department->name : 'not assign';
        $kulit_buku->save();

        Helper::logSystemActivity('KULIT BUKU', 'KULIT BUKU Verified');
        return redirect()->route('kulit_buku')->with('custom_success', 'KULIT BUKU has been Successfully Verified!');
    }

    public function approve_decline(Request $request, $id){
        if (!Auth::user()->hasPermissionTo('KULIT BUKU Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $kulit_buku = KulitBuku::find($id);
        $kulit_buku->status = 'declined';
        $kulit_buku->save();
        Helper::logSystemActivity('KULIT BUKU', 'KULIT BUKU Declined');
        return redirect()->route('kulit_buku')->with('custom_success', 'KULIT BUKU has been Successfully Declined!');
    }

    public function delete($id){
        if (!Auth::user()->hasPermissionTo('KULIT BUKU Delete')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $kulit_buku = KulitBuku::find($id);
        $kulit_buku->delete();
        Helper::logSystemActivity('KULIT BUKU', 'KULIT BUKU Delete');
        return redirect()->route('kulit_buku')->with('custom_success', 'KULIT BUKU has been Successfully Deleted!');
    }
}
