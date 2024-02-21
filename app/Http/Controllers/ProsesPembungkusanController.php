<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\ProsesPembungkusan;
use App\Models\SaleOrder;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProsesPembungkusanController extends Controller
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

            $query = ProsesPembungkusan::select('id', 'sale_order_id', 'date', 'status','time','checklist_1','checklist_2','checklist_3','checklist_4','machine')->with('sale_order');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->where('date', 'like', '%' . $searchLower . '%')
                        ->where('time', 'like', '%' . $searchLower . '%')
                        ->where('machine', 'like', '%' . $searchLower . '%')
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('order_no', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('kod_buku', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('description', 'like', '%' . $searchLower . '%');
                        })
                        ->where('checklist_1', 'like', '%' . $searchLower . '%')
                        ->where('checklist_2', 'like', '%' . $searchLower . '%')
                        ->where('checklist_3', 'like', '%' . $searchLower . '%')
                        ->where('checklist_4', 'like', '%' . $searchLower . '%')
                        ->where('status', 'like', '%' . $searchLower . '%');
                    // Add more columns as needed
                });
            }
            // Determine the column to sort by
            $results = null;

            if (!empty($columnsData)) {
                $sortableColumns = [
                    1 => 'date',
                    2 => 'time',
                    3 => 'machine',
                    4 => 'sale_order_id',
                    5 => 'sale_order_id',
                    6 => 'sale_order_id',
                    7 => 'checklist_1',
                    8 => 'checklist_2',
                    9 => 'checklist_3',
                    10 => 'checklist_4',
                    11 => 'status',

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
                                $q->where('machine', 'like', '%' . $searchLower . '%');
                                break;

                            case 4:
                                $q->whereHas('sale_order', function ($query) use ($searchLower) {
                                    $query->where('order_no', 'like', '%' . $searchLower . '%');
                                });

                                break;
                            case 5:
                                $q->whereHas('sale_order', function ($query) use ($searchLower) {
                                    $query->where('description', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 6:
                                $q->whereHas('sale_order', function ($query) use ($searchLower) {
                                    $query->where('kod_buku', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 7:
                                $q->where('checklist_1', 'like', '%' . $searchLower . '%');
                                break;
                            case 8:
                                $q->where('checklist_2', 'like', '%' . $searchLower . '%');
                                break;
                            case 9:
                                $q->where('checklist_3', 'like', '%' . $searchLower . '%');
                                break;
                            case 10:
                                $q->where('checklist_4', 'like', '%' . $searchLower . '%');
                                break;
                            case 11:
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
                if ($row->status == 'checked') {
                    $row->status = '<span class="badge badge-warning">Checked</span>';
                    $actions = '<a class="dropdown-item" href="' . route('proses_pembungkusan.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('proses_pembungkusan.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('proses_pembungkusan.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item" href="' . route('proses_pembungkusan.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'verified') {
                    $row->status = '<span class="badge badge-success">Verified</span>';
                    $actions = '<a class="dropdown-item" href="' . route('proses_pembungkusan.view', $row->id) . '">View</a>
                                <a class="dropdown-item" href="' . route('proses_pembungkusan.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'declined') {
                    $row->status = '<span class="badge badge-danger">Declined</span>';
                    $actions = '<a class="dropdown-item" href="' . route('proses_pembungkusan.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('proses_pembungkusan.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('proses_pembungkusan.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item" href="' . route('proses_pembungkusan.delete', $row->id) . '">Delete</a>';
                }

                $row->action = '<div class="dropdown">
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

            $query = ProsesPembungkusan::select('id', 'sale_order_id', 'machine' , 'date', 'status','time','checklist_1','checklist_2','checklist_3','checklist_4')->with('sale_order');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                    ->where('date', 'like', '%' . $searchLower . '%')
                    ->where('time', 'like', '%' . $searchLower . '%')
                    ->where('machine', 'like', '%' . $searchLower . '%')
                    ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                        $query->where('order_no', 'like', '%' . $searchLower . '%');
                    })
                    ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                        $query->where('kod_buku', 'like', '%' . $searchLower . '%');
                    })
                    ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                        $query->where('description', 'like', '%' . $searchLower . '%');
                    })
                    ->where('checklist_1', 'like', '%' . $searchLower . '%')
                    ->where('checklist_2', 'like', '%' . $searchLower . '%')
                    ->where('checklist_3', 'like', '%' . $searchLower . '%')
                    ->where('checklist_4', 'like', '%' . $searchLower . '%')
                    ->where('status', 'like', '%' . $searchLower . '%');
                    // Add more columns as needed
                });
            }

            $sortableColumns = [
                1 => 'date',
                2 => 'time',
                3 => 'machine',
                4 => 'sale_order_id',
                5 => 'sale_order_id',
                6 => 'sale_order_id',
                7 => 'checklist_1',
                8 => 'checklist_2',
                9 => 'checklist_3',
                10 => 'checklist_4',
                11 => 'status',

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
                if ($row->status == 'checked') {
                    $row->status = '<span class="badge badge-warning">Checked</span>';
                    $actions = '<a class="dropdown-item" href="' . route('proses_pembungkusan.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('proses_pembungkusan.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('proses_pembungkusan.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item" href="' . route('proses_pembungkusan.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'verified') {
                    $row->status = '<span class="badge badge-success">Verified</span>';
                    $actions = '<a class="dropdown-item" href="' . route('proses_pembungkusan.view', $row->id) . '">View</a>
                                <a class="dropdown-item" href="' . route('proses_pembungkusan.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'declined') {
                    $row->status = '<span class="badge badge-danger">Declined</span>';
                    $actions = '<a class="dropdown-item" href="' . route('proses_pembungkusan.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('proses_pembungkusan.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('proses_pembungkusan.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item" href="' . route('proses_pembungkusan.delete', $row->id) . '">Delete</a>';
                }

                $row->action = '<div class="dropdown">
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
            Auth::user()->hasPermissionTo('PROSES PEMBUNGKUSAN List') ||
            Auth::user()->hasPermissionTo('PROSES PEMBUNGKUSAN Create') ||
            Auth::user()->hasPermissionTo('PROSES PEMBUNGKUSAN Update') ||
            Auth::user()->hasPermissionTo('PROSES PEMBUNGKUSAN View') ||
            Auth::user()->hasPermissionTo('PROSES PEMBUNGKUSAN Delete') ||
            Auth::user()->hasPermissionTo('PROSES PEMBUNGKUSAN Verify')
        ) {
            Helper::logSystemActivity('PROSES PEMBUNGKUSAN List', 'PROSES PEMBUNGKUSAN List');
            return view('Mes.ProsesPembungkusan.index');
        }
        return back()->with('custom_errors', 'You don`t have Right Permission');
    }


    public function create(){
        if (!Auth::user()->hasPermissionTo('PROSES PEMBUNGKUSAN Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        Helper::logSystemActivity('PROSES PEMBUNGKUSAN', 'PROSES PEMBUNGKUSAN Create');
        return view('Mes.ProsesPembungkusan.create');
    }

    public function store(Request $request)
    {
        // dd($request);
        if (!Auth::user()->hasPermissionTo('PROSES PEMBUNGKUSAN Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $validator = null;

        $validatedData = $request->validate([
            'sale_order' => 'required',
            'date' => 'required',
            'time' => 'required',
            'kategori' => 'required',

        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $proses_pembungkusan = new ProsesPembungkusan();
        $proses_pembungkusan->sale_order_id = $request->sale_order;
        $proses_pembungkusan->date = $request->date;
        $proses_pembungkusan->time = $request->time;
        $proses_pembungkusan->machine = $request->machine;
        $proses_pembungkusan->kategori = $request->kategori;
        $proses_pembungkusan->created_by = Auth::user()->id;

        $proses_pembungkusan->checklist_1 = $request->checklist_1;
        $proses_pembungkusan->checklist_2 = $request->checklist_2;
        $proses_pembungkusan->checklist_3 = $request->checklist_3;
        $proses_pembungkusan->checklist_4 = $request->checklist_4;


        $proses_pembungkusan->status = 'checked';
        $proses_pembungkusan->save();
        Helper::logSystemActivity('PROSES PEMBUNGKUSAN', 'PROSES PEMBUNGKUSAN Store');
        return redirect()->route('proses_pembungkusan')->with('custom_success', 'PROSES PEMBUNGKUSAN has been Created Successfully !');
    }

    public function edit($id)
    {
        if (!Auth::user()->hasPermissionTo('PROSES PEMBUNGKUSAN Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $proses_pembungkusan = ProsesPembungkusan::find($id);
        Helper::logSystemActivity('PROSES PEMBUNGKUSAN', 'PROSES PEMBUNGKUSAN Update');
        return view('Mes.ProsesPembungkusan.edit', compact('proses_pembungkusan'));
    }

    public function view($id)
    {
        if (!Auth::user()->hasPermissionTo('PROSES PEMBUNGKUSAN View')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $proses_pembungkusan = ProsesPembungkusan::find($id);
        Helper::logSystemActivity('PROSES PEMBUNGKUSAN', 'PROSES PEMBUNGKUSAN View');
        return view('Mes.ProsesPembungkusan.view', compact('proses_pembungkusan'));
    }

    public function update(Request $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('PROSES PEMBUNGKUSAN Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $validator = null;

        $validatedData = $request->validate([
            'sale_order' => 'required',
            'date' => 'required',
            'time' => 'required',
            'kategori' => 'required',
        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $proses_pembungkusan = ProsesPembungkusan::find($id);
        $proses_pembungkusan->sale_order_id = $request->sale_order;
        $proses_pembungkusan->date = $request->date;
        $proses_pembungkusan->time = $request->time;
        $proses_pembungkusan->machine = $request->machine;
        $proses_pembungkusan->created_by = Auth::user()->id;
        $proses_pembungkusan->kategori = $request->kategori;
        $proses_pembungkusan->checklist_1 = $request->checklist_1;
        $proses_pembungkusan->checklist_2 = $request->checklist_2;
        $proses_pembungkusan->checklist_3 = $request->checklist_3;
        $proses_pembungkusan->checklist_4 = $request->checklist_4;


        $proses_pembungkusan->status = 'checked';
        $proses_pembungkusan->save();
        Helper::logSystemActivity('PROSES PEMBUNGKUSAN', 'PROSES PEMBUNGKUSAN Update');
        return redirect()->route('proses_pembungkusan')->with('custom_success', 'PROSES PEMBUNGKUSAN has been Updated Successfully !');
    }

    public function verify($id)
    {
        if (!Auth::user()->hasPermissionTo('PROSES PEMBUNGKUSAN Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $proses_pembungkusan = ProsesPembungkusan::find($id);
        Helper::logSystemActivity('PROSES PEMBUNGKUSAN', 'PROSES PEMBUNGKUSAN Update');
        return view('Mes.ProsesPembungkusan.verify', compact('proses_pembungkusan'));
    }

    public function approve_approve(Request $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('PROSES PEMBUNGKUSAN Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $proses_pembungkusan = ProsesPembungkusan::find($id);
        $proses_pembungkusan->status = 'verified';
        $proses_pembungkusan->verified_by_date = Carbon::now()->format('Y-m-d H:i:s');
        $proses_pembungkusan->verified_by_user = Auth::user()->user_name;
        $proses_pembungkusan->verified_by_designation = (Auth::user()->designation != null) ? Auth::user()->designation->name : 'not assign';
        $proses_pembungkusan->verified_by_department = (Auth::user()->department != null) ? Auth::user()->department->name : 'not assign';
        $proses_pembungkusan->save();
        Helper::logSystemActivity('PROSES PEMBUNGKUSAN', 'PROSES PEMBUNGKUSAN Verified');
        return redirect()->route('proses_pembungkusan')->with('custom_success', 'PROSES PEMBUNGKUSAN has been Successfully Verified!');
    }

    public function approve_decline(Request $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('PROSES PEMBUNGKUSAN Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $proses_pembungkusan = ProsesPembungkusan::find($id);
        $proses_pembungkusan->status = 'declined';
        $proses_pembungkusan->save();
        Helper::logSystemActivity('PROSES PEMBUNGKUSAN', 'PROSES PEMBUNGKUSAN Declined');
        return redirect()->route('proses_pembungkusan')->with('custom_success', 'PROSES PEMBUNGKUSAN has been Successfully Declined!');
    }

    public function delete($id)
    {
        if (!Auth::user()->hasPermissionTo('PROSES PEMBUNGKUSAN Delete')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $proses_pembungkusan = ProsesPembungkusan::find($id);
        $proses_pembungkusan->delete();
        Helper::logSystemActivity('PROSES PEMBUNGKUSAN', 'PROSES PEMBUNGKUSAN Delete');
        return redirect()->route('proses_pembungkusan')->with('custom_success', 'PROSES PEMBUNGKUSAN has been Successfully Deleted!');
    }

}
