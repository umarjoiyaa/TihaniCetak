<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\AreaLevel;
use App\Models\AreaShelf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AreaLevelController extends Controller
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

            $query = AreaLevel::select('id', 'name', 'code')->where('created_by', '=', Auth::user()->id);

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
                $area_level = $results->skip($start)->take($length)->all();
            } else {
                $area_level = [];
            }

            $index = 0;
            foreach ($area_level as $row) {
                $row->sr_no = $start + $index + 1;
                $row->action = '<div class="dropdown">
                    <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                    data-toggle="dropdown" id="dropdownMenuButton" type="button">Action <i class="fas fa-caret-down ml-1"></i></button>
                    <div  class="dropdown-menu tx-13">
                    <a class="dropdown-item" href="' . route('area_level.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('area_level.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('area_level.delete', $row->id) . '">Delete</a>
                    </div>
                </div>';
                $index++;
            }

            // // Continue with your response
            $area_levelsWithoutAction = array_map(function ($row) {
                return $row;
            }, $area_level);

            return response()->json([
                'draw' => $draw,
                'recordsTotal' => $recordsTotal,
                'recordsFiltered' => $recordsTotal, // Total records after filtering
                'data' => array_values($area_levelsWithoutAction),
            ]);
        } elseif ($request->ajax()) {

            $draw = $request->input('draw');
            $start = $request->input('start');
            $length = $request->input('length');
            $search = $request->input('search.value');
            $orderByColumnIndex = $request->input('order.0.column'); // Get the index of the column to sort by
            $orderByDirection = $request->input('order.0.dir'); // Get the sort direction ('asc' or 'desc')

            $query = AreaLevel::select('id', 'name', 'code')->where('created_by', '=', Auth::user()->id);

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

            $area_level = $query
                ->skip($start)
                ->take($length)
                ->get();

            $area_level->each(function ($row, $index)  use (&$start) {
                $row->sr_no = $start + $index + 1;
                $row->action = '<div class="dropdown">
                    <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                    data-toggle="dropdown" id="dropdownMenuButton" type="button">Action <i class="fas fa-caret-down ml-1"></i></button>
                    <div  class="dropdown-menu tx-13">
                        <a class="dropdown-item" href="' . route('area_level.edit', $row->id) . '">Edit</a>
                        <a class="dropdown-item" href="' . route('area_level.view', $row->id) . '">View</a>
                        <a class="dropdown-item" href="' . route('area_level.delete', $row->id) . '">Delete</a>
                    </div>
                </div>';
            });

            return response()->json([
                'draw' => $draw,
                'recordsTotal' => $recordsTotal,
                'recordsFiltered' => $recordsTotal, // Total records after filtering
                'data' => $area_level,
            ]);
        }
    }

    public function index()
    {
        if (
            Auth::user()->hasPermissionTo('Area Level List') ||
            Auth::user()->hasPermissionTo('Area Level Create') ||
            Auth::user()->hasPermissionTo('Area Level Update') ||
            Auth::user()->hasPermissionTo('Area Level Delete')
        ) {
            Helper::logSystemActivity('Area Level', 'Area Level List');
            return view('Setting.AreaLevel.Index');
        }
        return back()->with('custom_errors', 'You don`t have Right Permission');
    }
    public function create()
    {
        if (!Auth::user()->hasPermissionTo('Area Level Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        Helper::logSystemActivity('Area Level', 'Area Level Create');
        return view('Setting.AreaLevel.Create');
    }
    public function store(Request $request)
    {
        if (!Auth::user()->hasPermissionTo('Area Level Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $validator = null;

        $validatedData = $request->validate([
            'name' => [
                'required',
                Rule::unique('area_levels', 'name')->whereNull('deleted_at'),
            ],
            'code' => [
                'required',
                Rule::unique('area_levels', 'code')->whereNull('deleted_at'),
            ]
        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $area_level = new AreaLevel();
        $area_level->name = $request->name;
        $area_level->code = $request->code;
        $area_level->created_by = Auth::user()->id;
        $area_level->save();
        Helper::logSystemActivity('Area Level', 'Area Level Store');
        return redirect()->route('area_level')->with('custom_success', 'Area Level has been Created Successfully !');
    }

    public function edit($id)
    {
        if (!Auth::user()->hasPermissionTo('Area Level Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $area_level = AreaLevel::find($id);
        Helper::logSystemActivity('Area Level', 'Area Level Edit');
        return view('Setting.AreaLevel.Edit', compact('area_level'));
    }

    public function view($id)
    {
        if (!Auth::user()->hasPermissionTo('Area Level View')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $area_level = AreaLevel::find($id);
        Helper::logSystemActivity('Area Level', 'Area Level View');
        return view('Setting.AreaLevel.View', compact('area_level'));
    }

    public function update(Request $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('Area Level Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $validator = null;

        $validatedData = $request->validate([
            'name' => [
                'required',
                Rule::unique('area_levels', 'name')->whereNull('deleted_at'),
            ],
            'code' => [
                'required',
                Rule::unique('area_levels', 'code')->whereNull('deleted_at'),
            ]
        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $area_level =  AreaLevel::find($id);
        $area_level->name = $request->name;
        $area_level->code = $request->code;
        $area_level->created_by = Auth::user()->id;
        $area_level->save();
        Helper::logSystemActivity('Area Level', 'Area Level Update');
        return redirect()->route('area_level')->with('custom_success', 'Area Level has been Updated Successfully !');
    }


    public function delete($id)
    {
        if (!Auth::user()->hasPermissionTo('Area Level Delete')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $area_level = AreaLevel::find($id);
        $level = AreaShelf::where('level_id', '=', $area_level->id)->first();
        if($level){
            return back()->with('custom_errors', 'This LEVEL is used in SHELF!');
        }
        $area_level->delete();
        Helper::logSystemActivity('Area Level', 'Area Level Delete');
        return redirect()->route('area_level')->with('custom_success', 'Area Level has been Deleted Successfully !');
    }
}
