<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Designation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class DesignationController extends Controller
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

            $query = Designation::select('id', 'name');

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
                $designation = $results->skip($start)->take($length)->all();
            } else {
                $designation = [];
            }

            $index = 0;
            foreach ($designation as $row) {
                $row->sr_no = $start + $index + 1;
                $row->action = '<div class="dropdown">
                    <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                    data-toggle="dropdown" id="dropdownMenuButton" type="button">Action <i class="fas fa-caret-down ml-1"></i></button>
                    <div  class="dropdown-menu tx-13">
                    <a class="dropdown-item" href="' . route('designation.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('designation.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('designation.delete', $row->id) . '">Delete</a>
                    </div>
                </div>';
                $index++;
            }

            // // Continue with your response
            $designationsWithoutAction = array_map(function ($row) {
                return $row;
            }, $designation);

            return response()->json([
                'draw' => $draw,
                'recordsTotal' => $recordsTotal,
                'recordsFiltered' => $recordsTotal, // Total records after filtering
                'data' => array_values($designationsWithoutAction),
            ]);
        } elseif ($request->ajax()) {

            $draw = $request->input('draw');
            $start = $request->input('start');
            $length = $request->input('length');
            $search = $request->input('search.value');
            $orderByColumnIndex = $request->input('order.0.column'); // Get the index of the column to sort by
            $orderByDirection = $request->input('order.0.dir'); // Get the sort direction ('asc' or 'desc')

            $query = Designation::select('id', 'name');

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

            $designation = $query
                ->skip($start)
                ->take($length)
                ->get();

            $designation->each(function ($row, $index)  use (&$start) {
                $row->sr_no = $start + $index + 1;
                $row->action = '<div class="dropdown">
                    <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                    data-toggle="dropdown" id="dropdownMenuButton" type="button">Action <i class="fas fa-caret-down ml-1"></i></button>
                    <div  class="dropdown-menu tx-13">
                        <a class="dropdown-item" href="' . route('designation.edit', $row->id) . '">Edit</a>
                        <a class="dropdown-item" href="' . route('designation.view', $row->id) . '">View</a>
                        <a class="dropdown-item" href="' . route('designation.delete', $row->id) . '">Delete</a>
                    </div>
                </div>';
            });

            return response()->json([
                'draw' => $draw,
                'recordsTotal' => $recordsTotal,
                'recordsFiltered' => $recordsTotal, // Total records after filtering
                'data' => $designation,
            ]);
        }
    }

    public function index()
    {
        if (
            Auth::user()->hasPermissionTo('Designation List') ||
            Auth::user()->hasPermissionTo('Designation Create') ||
            Auth::user()->hasPermissionTo('Designation Update') ||
            Auth::user()->hasPermissionTo('Designation Delete') ||
            Auth::user()->hasPermissionTo('Designation View')
        ) {
            Helper::logSystemActivity('Designation', 'Designation List');
            return view('Setting.Designation.Index');
        }
        return back()->with('custom_errors', 'You don`t have Right Permission');
    }
    public function create()
    {
        if (!Auth::user()->hasPermissionTo('Designation Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        Helper::logSystemActivity('Designation', 'Designation Create');
        return view('Setting.Designation.Create');
    }
    public function store(Request $request)
    {
        if (!Auth::user()->hasPermissionTo('Designation Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $validator = null;

        $validatedData = $request->validate([
            'name' => [
                'required',
                Rule::unique('designations', 'name')->whereNull('deleted_at'),
            ]
        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $Designation = new Designation();
        $Designation->name = $request->name;
        $Designation->created_by = Auth::user()->id;
        $Designation->save();
        Helper::logSystemActivity('Designation', 'Designation Store');
        return redirect()->route('designation')->with('custom_success', 'Designation has been Created Successfully !');
    }

    public function edit($id)
    {
        if (!Auth::user()->hasPermissionTo('Designation Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $designation = Designation::find($id);
        Helper::logSystemActivity('Designation', 'Designation Edit');
        return view('Setting.Designation.Edit', compact('designation'));
    }

    public function view($id)
    {
        if (!Auth::user()->hasPermissionTo('Designation View')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $designation = Designation::find($id);
        Helper::logSystemActivity('Designation', 'Designation View');
        return view('Setting.Designation.View', compact('designation'));
    }

    public function update(Request $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('Designation Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $validator = null;

        $validatedData = $request->validate([
            'name' => [
                'required',
                Rule::unique('Designations', 'name')->whereNull('deleted_at')->ignore($id),
            ]
        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $Designation =  Designation::find($id);
        $Designation->name = $request->name;
        $Designation->save();
        Helper::logSystemActivity('Designation', 'Designation Update');
        return redirect()->route('designation')->with('custom_success', 'Designation has been Updated Successfully !');
    }


    public function delete($id)
    {
        if (!Auth::user()->hasPermissionTo('Designation Delete')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $Designation = Designation::find($id);
        $Designation->delete();
        Helper::logSystemActivity('Designation', 'Designation Delete');
        return redirect()->route('designation')->with('custom_success', 'Designation has been Deleted Successfully !');
    }
}
