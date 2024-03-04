<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Area;
use App\Models\AreaShelf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AreaController extends Controller
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

            $query = Area::select('id', 'name', 'code');

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
                $area = $results->skip($start)->take($length)->all();
            } else {
                $area = [];
            }

            $index = 0;
            foreach ($area as $row) {
                $row->sr_no = $start + $index + 1;
                $row->action = '<div class="dropdown">
                    <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                    data-toggle="dropdown" id="dropdownMenuButton" type="button">Action <i class="fas fa-caret-down ml-1"></i></button>
                    <div  class="dropdown-menu tx-13">
                    <a class="dropdown-item" href="' . route('area.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('area.view', $row->id) . '">View</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('area.delete', $row->id) . '">Delete</a>
                    </div>
                </div>';
                $index++;
            }

            // // Continue with your response
            $areasWithoutAction = array_map(function ($row) {
                return $row;
            }, $area);

            return response()->json([
                'draw' => $draw,
                'recordsTotal' => $recordsTotal,
                'recordsFiltered' => $recordsTotal, // Total records after filtering
                'data' => array_values($areasWithoutAction),
            ]);
        } elseif ($request->ajax()) {

            $draw = $request->input('draw');
            $start = $request->input('start');
            $length = $request->input('length');
            $search = $request->input('search.value');
            $orderByColumnIndex = $request->input('order.0.column'); // Get the index of the column to sort by
            $orderByDirection = $request->input('order.0.dir'); // Get the sort direction ('asc' or 'desc')

            $query = Area::select('id', 'name', 'code');

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

            $area = $query
                ->skip($start)
                ->take($length)
                ->get();

            $area->each(function ($row, $index)  use (&$start) {
                $row->sr_no = $start + $index + 1;
                $row->action = '<div class="dropdown">
                    <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                    data-toggle="dropdown" id="dropdownMenuButton" type="button">Action <i class="fas fa-caret-down ml-1"></i></button>
                    <div  class="dropdown-menu tx-13">
                        <a class="dropdown-item" href="' . route('area.edit', $row->id) . '">Edit</a>
                        <a class="dropdown-item" href="' . route('area.view', $row->id) . '">View</a>
                        <a class="dropdown-item" id="swal-warning" data-delete="' . route('area.delete', $row->id) . '">Delete</a>
                    </div>
                </div>';
            });

            return response()->json([
                'draw' => $draw,
                'recordsTotal' => $recordsTotal,
                'recordsFiltered' => $recordsTotal, // Total records after filtering
                'data' => $area,
            ]);
        }
    }

    public function index()
    {
        if (
            Auth::user()->hasPermissionTo('Area List') ||
            Auth::user()->hasPermissionTo('Area Create') ||
            Auth::user()->hasPermissionTo('Area Update') ||
            Auth::user()->hasPermissionTo('Area Delete') ||
            Auth::user()->hasPermissionTo('Area View')
        ) {
            Helper::logSystemActivity('Area', 'Area List');
            return view('Setting.Area.Index');
        }
        return back()->with('custom_errors', 'You don`t have Right Permission');
    }
    public function create()
    {
        if (!Auth::user()->hasPermissionTo('Area Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $shelves = AreaShelf::select('id', 'name')->get();
        Helper::logSystemActivity('Area', 'Area Create');
        return view('Setting.Area.Create', compact('shelves'));
    }
    public function store(Request $request)
    {
        if (!Auth::user()->hasPermissionTo('Area Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $validator = null;

        $validatedData = $request->validate([
            'name' => [
                'required',
                Rule::unique('areas', 'name')->whereNull('deleted_at'),
            ],
            'code' => [
                'required',
                Rule::unique('areas', 'code')->whereNull('deleted_at'),
            ],
            'shelf' => 'required'
        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $area = new Area();
        $area->name = $request->name;
        $area->code = $request->code;
        $area->shelf_id = json_encode($request->shelf);
        $area->created_by = Auth::user()->id;
        $area->save();
        Helper::logSystemActivity('Area', 'Area Store');
        return redirect()->route('area')->with('custom_success', 'Area has been Created Successfully !');
    }

    public function edit($id)
    {
        if (!Auth::user()->hasPermissionTo('Area Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $area = Area::find($id);
        $shelves = AreaShelf::select('id', 'name')->get();
        Helper::logSystemActivity('Area', 'Area Shelf Edit');
        return view('Setting.Area.Edit', compact('area', 'shelves'));
    }

    public function view($id)
    {
        if (!Auth::user()->hasPermissionTo('Area View')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $area = Area::find($id);
        Helper::logSystemActivity('Area', 'Area View');
        return view('Setting.Area.View', compact('area'));
    }

    public function update(Request $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('Area Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $validator = null;

        $validatedData = $request->validate([
            'name' => [
                'required',
                Rule::unique('areas', 'name')->whereNull('deleted_at'),
            ],
            'code' => [
                'required',
                Rule::unique('areas', 'code')->whereNull('deleted_at'),
            ],
            'shelf' => 'required'
        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $area =  Area::find($id);
        $area->name = $request->name;
        $area->code = $request->code;
        $area->shelf_id = json_encode($request->shelf);
        $area->created_by = Auth::user()->id;
        $area->save();
        Helper::logSystemActivity('Area', 'Area Update');
        return redirect()->route('area')->with('custom_success', 'Area has been Updated Successfully !');
    }


    public function delete($id)
    {
        if (!Auth::user()->hasPermissionTo('Area Delete')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $area = Area::find($id);
        $area->delete();
        Helper::logSystemActivity('Area', 'Area Delete');
        return redirect()->route('area')->with('custom_success', 'Area has been Deleted Successfully !');
    }
}
