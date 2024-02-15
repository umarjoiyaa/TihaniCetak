<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class DepartmentController extends Controller
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

            $query = Department::select('id', 'name');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->where('name', 'like', '%' . $searchLower . '%');
                    // Add more columns as needed
                });
            }
            // Determine the column to sort by
            $results = null;

            if (!empty($columnsData)) {
                $sortableColumns = [
                    1 => 'name',
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
                $department = $results->skip($start)->take($length)->all();
            } else {
                $department = [];
            }

            $index = 0;
            foreach ($department as $row) {
                $row->sr_no = $start + $index + 1;
                $row->action = '<div class="dropdown">
                    <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                    data-toggle="dropdown" id="dropdownMenuButton" type="button">Action <i class="fas fa-caret-down ml-1"></i></button>
                    <div  class="dropdown-menu tx-13">
                    <a class="dropdown-item" href="' . route('department.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('department.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('department.delete', $row->id) . '">Delete</a>
                    </div>
                </div>';
                $index++;
            }

            // // Continue with your response
            $departmentsWithoutAction = array_map(function ($row) {
                return $row;
            }, $department);

            return response()->json([
                'draw' => $draw,
                'recordsTotal' => $recordsTotal,
                'recordsFiltered' => $recordsTotal, // Total records after filtering
                'data' => array_values($departmentsWithoutAction),
            ]);
        } elseif ($request->ajax()) {

            $draw = $request->input('draw');
            $start = $request->input('start');
            $length = $request->input('length');
            $search = $request->input('search.value');
            $orderByColumnIndex = $request->input('order.0.column'); // Get the index of the column to sort by
            $orderByDirection = $request->input('order.0.dir'); // Get the sort direction ('asc' or 'desc')

            $query = Department::select('id', 'name');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->where('name', 'like', '%' . $searchLower . '%');

                    // Add more columns as needed
                });
            }

            $sortableColumns = [
                1 => 'name',

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

            $department = $query
                ->skip($start)
                ->take($length)
                ->get();

            $department->each(function ($row, $index)  use (&$start) {
                $row->sr_no = $start + $index + 1;
                $row->action = '<div class="dropdown">
                    <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                    data-toggle="dropdown" id="dropdownMenuButton" type="button">Action <i class="fas fa-caret-down ml-1"></i></button>
                    <div  class="dropdown-menu tx-13">
                        <a class="dropdown-item" href="' . route('department.edit', $row->id) . '">Edit</a>
                        <a class="dropdown-item" href="' . route('department.view', $row->id) . '">View</a>
                        <a class="dropdown-item" href="' . route('department.delete', $row->id) . '">Delete</a>
                    </div>
                </div>';
            });

            return response()->json([
                'draw' => $draw,
                'recordsTotal' => $recordsTotal,
                'recordsFiltered' => $recordsTotal, // Total records after filtering
                'data' => $department,
            ]);
        }
    }

    public function index()
    {
        if (
            Auth::user()->hasPermissionTo('Department List') ||
            Auth::user()->hasPermissionTo('Department Create') ||
            Auth::user()->hasPermissionTo('Department Update') ||
            Auth::user()->hasPermissionTo('Department Delete') ||
            Auth::user()->hasPermissionTo('Department View')
        ) {
            Helper::logSystemActivity('Department', 'Department List');
            return view('Setting.Department.Index');
        }
        return back()->with('custom_errors', 'You don`t have Right Permission');
    }
    public function create()
    {
        if (!Auth::user()->hasPermissionTo('Department Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        Helper::logSystemActivity('Department', 'Department Create');
        return view('Setting.Department.Create');
    }
    public function store(Request $request)
    {
        if (!Auth::user()->hasPermissionTo('Department Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $validator = null;

        $validatedData = $request->validate([
            'name' => [
                'required',
                Rule::unique('departments', 'name')->whereNull('deleted_at'),
            ]
        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $Department = new Department();
        $Department->name = $request->name;
        $Department->created_by = Auth::user()->id;
        $Department->save();
        Helper::logSystemActivity('Department', 'Department Store');
        return redirect()->route('department')->with('custom_success', 'Department has been Created Successfully !');
    }

    public function edit($id)
    {
        if (!Auth::user()->hasPermissionTo('Department Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $department = Department::find($id);
        Helper::logSystemActivity('Department', 'Department Edit');
        return view('Setting.Department.Edit', compact('department'));
    }

    public function view($id)
    {
        if (!Auth::user()->hasPermissionTo('Department View')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $department = Department::find($id);
        Helper::logSystemActivity('Department', 'Department View');
        return view('Setting.Department.View', compact('department'));
    }

    public function update(Request $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('Department Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $validator = null;

        $validatedData = $request->validate([
            'name' => [
                'required',
                Rule::unique('departments', 'name')->whereNull('deleted_at')->ignore($id),
            ]
        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $Department =  Department::find($id);
        $Department->name = $request->name;
        $Department->save();
        Helper::logSystemActivity('Department', 'Department Update');
        return redirect()->route('department')->with('custom_success', 'Department has been Updated Successfully !');
    }


    public function delete($id)
    {
        if (!Auth::user()->hasPermissionTo('Department Delete')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $Department = Department::find($id);
        $Department->delete();
        Helper::logSystemActivity('Department', 'Department Delete');
        return redirect()->route('department')->with('custom_success', 'Department has been Deleted Successfully !');
    }
}
