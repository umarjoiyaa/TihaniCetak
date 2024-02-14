<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Machine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class MachineController extends Controller
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

            $query = Machine::select('id', 'name', 'code')->where('created_by', '=', Auth::user()->id);

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->where('name', 'like', '%' . $searchLower . '%')
                        ->orWhere('code', 'like', '%' . $searchLower . '%');
                    // Add more columns as needed
                });
            }
            // Determine the column to sort by
            $results = null;

            if (!empty($columnsData)) {
                $sortableColumns = [
                    1 => 'name',
                    2 => 'code',
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
                                $q->where('name', 'like', '%' . $searchLower . '%');
                                break;
                            case 2:
                                $q->where('code', 'like', '%' . $searchLower . '%');
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
                $machine = $results->skip($start)->take($length)->all();
            } else {
                $machine = [];
            }

            $index = 0;
            foreach ($machine as $row) {
                $row->sr_no = $start + $index + 1;
                $row->action = '<div class="dropdown">
                    <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                    data-toggle="dropdown" id="dropdownMenuButton" type="button">Action <i class="fas fa-caret-down ml-1"></i></button>
                    <div  class="dropdown-menu tx-13">
                    <a class="dropdown-item" href="' . route('machine.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('machine.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('machine.delete', $row->id) . '">Delete</a>
                    </div>
                </div>';
                $index++;
            }

            // // Continue with your response
            $machinesWithoutAction = array_map(function ($row) {
                return $row;
            }, $machine);

            return response()->json([
                'draw' => $draw,
                'recordsTotal' => $recordsTotal,
                'recordsFiltered' => $recordsTotal, // Total records after filtering
                'data' => array_values($machinesWithoutAction),
            ]);
        } elseif ($request->ajax()) {

            $draw = $request->input('draw');
            $start = $request->input('start');
            $length = $request->input('length');
            $search = $request->input('search.value');
            $orderByColumnIndex = $request->input('order.0.column'); // Get the index of the column to sort by
            $orderByDirection = $request->input('order.0.dir'); // Get the sort direction ('asc' or 'desc')

            $query = Machine::select('id', 'name', 'code')->where('created_by', '=', Auth::user()->id);

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->where('name', 'like', '%' . $searchLower . '%')
                        ->orWhere('code', 'like', '%' . $searchLower . '%');

                    // Add more columns as needed
                });
            }

            $sortableColumns = [
                1 => 'name',
                2 => 'code',
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

            $machine = $query
                ->skip($start)
                ->take($length)
                ->get();

            $machine->each(function ($row, $index)  use (&$start) {
                $row->sr_no = $start + $index + 1;
                $row->action = '<div class="dropdown">
                    <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                    data-toggle="dropdown" id="dropdownMenuButton" type="button">Action <i class="fas fa-caret-down ml-1"></i></button>
                    <div  class="dropdown-menu tx-13">
                        <a class="dropdown-item" href="' . route('machine.edit', $row->id) . '">Edit</a>
                        <a class="dropdown-item" href="' . route('machine.view', $row->id) . '">View</a>
                        <a class="dropdown-item" href="' . route('machine.delete', $row->id) . '">Delete</a>
                    </div>
                </div>';
            });

            return response()->json([
                'draw' => $draw,
                'recordsTotal' => $recordsTotal,
                'recordsFiltered' => $recordsTotal, // Total records after filtering
                'data' => $machine,
            ]);
        }
    }

    public function index()
    {
        if (
            Auth::user()->hasPermissionTo('Machine List') ||
            Auth::user()->hasPermissionTo('Machine Create') ||
            Auth::user()->hasPermissionTo('Machine Update') ||
            Auth::user()->hasPermissionTo('Machine Delete')
        ) {
            Helper::logSystemActivity('Machine', 'Machine List');
            return view('Setting.Machine.Index');
        }
        return back()->with('custom_errors', 'You don`t have Right Permission');
    }
    public function create()
    {
        if (!Auth::user()->hasPermissionTo('Machine Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        Helper::logSystemActivity('Machine', 'Machine Create');
        return view('Setting.Machine.Create');
    }
    public function store(Request $request)
    {
        if (!Auth::user()->hasPermissionTo('Machine Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $validator = null;

        $validatedData = $request->validate([
            'name' => [
                'required',
                Rule::unique('machines', 'name')->whereNull('deleted_at'),
            ],
            'code' => [
                'required',
                Rule::unique('machines', 'code')->whereNull('deleted_at'),
            ]
        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $Machine = new Machine();
        $Machine->name = $request->name;
        $Machine->code = $request->code;
        $Machine->created_by = Auth::user()->id;
        $Machine->save();
        Helper::logSystemActivity('Machine', 'Machine Store');
        return redirect()->route('machine')->with('custom_success', 'Machine has been Created Successfully !');
    }

    public function edit($id)
    {
        if (!Auth::user()->hasPermissionTo('Machine Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $machine = Machine::find($id);
        Helper::logSystemActivity('Machine', 'Machine Edit');
        return view('Setting.Machine.Edit', compact('machine'));
    }

    public function view($id)
    {
        if (!Auth::user()->hasPermissionTo('Machine View')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $machine = Machine::find($id);
        Helper::logSystemActivity('Machine', 'Machine View');
        return view('Setting.Machine.View', compact('machine'));
    }

    public function update(Request $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('Machine Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $validator = null;

        $validatedData = $request->validate([
            'name' => [
                'required',
                Rule::unique('machines', 'name')->whereNull('deleted_at'),
            ],
            'code' => [
                'required',
                Rule::unique('machines', 'code')->whereNull('deleted_at'),
            ]
        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $Machine =  Machine::find($id);
        $Machine->name = $request->name;
        $Machine->code = $request->code;
        $Machine->created_by = Auth::user()->id;
        $Machine->save();
        Helper::logSystemActivity('Machine', 'Machine Update');
        return redirect()->route('machine')->with('custom_success', 'Machine has been Updated Successfully !');
    }


    public function delete($id)
    {
        if (!Auth::user()->hasPermissionTo('Machine Delete')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $Machine = Machine::find($id);
        $Machine->delete();
        Helper::logSystemActivity('Machine', 'Machine Delete');
        return redirect()->route('machine')->with('custom_success', 'Machine has been Deleted Successfully !');
    }
}
