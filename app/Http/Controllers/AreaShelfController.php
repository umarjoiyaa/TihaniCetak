<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\AreaLevel;
use App\Models\AreaShelf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AreaShelfController extends Controller
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

            $query = AreaShelf::select('id', 'name', 'code', 'level_id')->where('created_by', '=', Auth::user()->id)->with('level');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->where('name', 'like', '%' . $searchLower . '%')
                        ->orWhere('code', 'like', '%' . $searchLower . '%')
                        ->orWhereHas('level', function ($query) use ($searchLower) {
                            $query->where('name', 'like', '%' . $searchLower . '%');
                        });
                    // Add more columns as needed
                });
            }
            // Determine the column to sort by
            $results = null;

            if (!empty($columnsData)) {
                $sortableColumns = [
                    1 => 'name',
                    2 => 'code',
                    3 => 'level_id',
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
                            case 3:
                                $q->whereHas('level', function ($query) use ($searchLower) {
                                    $query->where('name', 'like', '%' . $searchLower . '%');
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
                $area_shelf = $results->skip($start)->take($length)->all();
            } else {
                $area_shelf = [];
            }

            $index = 0;
            foreach ($area_shelf as $row) {
                $row->sr_no = $start + $index + 1;
                $row->action = '<div class="dropdown">
                    <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                    data-toggle="dropdown" id="dropdownMenuButton" type="button">Action <i class="fas fa-caret-down ml-1"></i></button>
                    <div  class="dropdown-menu tx-13">
                    <a class="dropdown-item" href="' . route('area_shelf.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('area_shelf.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('area_shelf.delete', $row->id) . '">Delete</a>
                    </div>
                </div>';
                $index++;
            }

            // // Continue with your response
            $area_shelfsWithoutAction = array_map(function ($row) {
                return $row;
            }, $area_shelf);

            return response()->json([
                'draw' => $draw,
                'recordsTotal' => $recordsTotal,
                'recordsFiltered' => $recordsTotal, // Total records after filtering
                'data' => array_values($area_shelfsWithoutAction),
            ]);
        } elseif ($request->ajax()) {

            $draw = $request->input('draw');
            $start = $request->input('start');
            $length = $request->input('length');
            $search = $request->input('search.value');
            $orderByColumnIndex = $request->input('order.0.column'); // Get the index of the column to sort by
            $orderByDirection = $request->input('order.0.dir'); // Get the sort direction ('asc' or 'desc')

            $query = AreaShelf::select('id', 'name', 'code', 'level_id')->where('created_by', '=', Auth::user()->id)->with('level');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->where('name', 'like', '%' . $searchLower . '%')
                        ->orWhere('code', 'like', '%' . $searchLower . '%')
                        ->orWhereHas('level', function ($query) use ($searchLower) {
                            $query->where('name', 'like', '%' . $searchLower . '%');
                        });
                    // Add more columns as needed
                });
            }

            $sortableColumns = [
                1 => 'name',
                2 => 'code',
                3 => 'level_id',
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

            $area_shelf = $query
                ->skip($start)
                ->take($length)
                ->get();

            $area_shelf->each(function ($row, $index)  use (&$start) {
                $row->sr_no = $start + $index + 1;
                $row->action = '<div class="dropdown">
                    <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                    data-toggle="dropdown" id="dropdownMenuButton" type="button">Action <i class="fas fa-caret-down ml-1"></i></button>
                    <div  class="dropdown-menu tx-13">
                        <a class="dropdown-item" href="' . route('area_shelf.edit', $row->id) . '">Edit</a>
                        <a class="dropdown-item" href="' . route('area_shelf.view', $row->id) . '">View</a>
                        <a class="dropdown-item" href="' . route('area_shelf.delete', $row->id) . '">Delete</a>
                    </div>
                </div>';
            });

            return response()->json([
                'draw' => $draw,
                'recordsTotal' => $recordsTotal,
                'recordsFiltered' => $recordsTotal, // Total records after filtering
                'data' => $area_shelf,
            ]);
        }
    }

    public function index()
    {
        if (
            Auth::user()->hasPermissionTo('Area Shelf List') ||
            Auth::user()->hasPermissionTo('Area Shelf Create') ||
            Auth::user()->hasPermissionTo('Area Shelf Update') ||
            Auth::user()->hasPermissionTo('Area Shelf Delete')
        ) {
            Helper::logSystemActivity('Area Shelf', 'Area Shelf List');
            return view('Setting.AreaShelf.Index');
        }
        return back()->with('custom_errors', 'You don`t have Right Permission');
    }
    public function create()
    {
        if (!Auth::user()->hasPermissionTo('Area Shelf Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $levels = AreaLevel::select('id', 'name')->get();
        Helper::logSystemActivity('Area Shelf', 'Area Shelf Create');
        return view('Setting.AreaShelf.Create', compact('levels'));
    }
    public function store(Request $request)
    {
        if (!Auth::user()->hasPermissionTo('Area Shelf Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $validator = null;

        $validatedData = $request->validate([
            'name' => [
                'required',
                Rule::unique('area_shelves', 'name')->whereNull('deleted_at'),
            ],
            'code' => [
                'required',
                Rule::unique('area_shelves', 'code')->whereNull('deleted_at'),
            ],
            'level' => 'required'
        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $area_Shelf = new AreaShelf();
        $area_Shelf->name = $request->name;
        $area_Shelf->code = $request->code;
        $area_Shelf->level_id = $request->level;
        $area_Shelf->created_by = Auth::user()->id;
        $area_Shelf->save();
        Helper::logSystemActivity('Area Shelf', 'Area Shelf Store');
        return redirect()->route('area_shelf')->with('custom_success', 'Area Shelf has been Created Successfully !');
    }

    public function edit($id)
    {
        if (!Auth::user()->hasPermissionTo('Area Shelf Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $area_shelf = AreaShelf::find($id);
        $levels = AreaLevel::select('id', 'name')->get();
        Helper::logSystemActivity('Area Shelf', 'Area Shelf Edit');
        return view('Setting.AreaShelf.Edit', compact('area_shelf', 'levels'));
    }

    public function view($id)
    {
        if (!Auth::user()->hasPermissionTo('Area Shelf View')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $area_shelf = AreaShelf::find($id);
        Helper::logSystemActivity('Area Shelf', 'Area Shelf View');
        return view('Setting.AreaShelf.View', compact('area_shelf'));
    }

    public function update(Request $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('Area Shelf Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $validator = null;

        $validatedData = $request->validate([
            'name' => [
                'required',
                Rule::unique('area_shelves', 'name')->whereNull('deleted_at'),
            ],
            'code' => [
                'required',
                Rule::unique('area_shelves', 'code')->whereNull('deleted_at'),
            ],
            'level' => 'required'
        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $area_Shelf =  AreaShelf::find($id);
        $area_Shelf->name = $request->name;
        $area_Shelf->code = $request->code;
        $area_Shelf->level_id = $request->level;
        $area_Shelf->created_by = Auth::user()->id;
        $area_Shelf->save();
        Helper::logSystemActivity('Area Shelf', 'Area Shelf Update');
        return redirect()->route('area_shelf')->with('custom_success', 'Area Shelf has been Updated Successfully !');
    }


    public function delete($id)
    {
        if (!Auth::user()->hasPermissionTo('Area Shelf Delete')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $area_Shelf = AreaShelf::find($id);
        $area_Shelf->delete();
        Helper::logSystemActivity('Area Shelf', 'Area Shelf Delete');
        return redirect()->route('area_Shelf')->with('custom_success', 'Area Shelf has been Deleted Successfully !');
    }
}
