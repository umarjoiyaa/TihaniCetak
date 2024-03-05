<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\MaterialRequest;
use App\Models\MaterialRequestB;
use App\Models\MaterialRequestC;
use App\Models\MaterialRequestD;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class MaterialRequestController extends Controller
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

            $query = MaterialRequest::select('id', 'sale_order_id', 'date', 'ref_no', 'status', 'description', 'created_by')->with('sale_order', 'user');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->where('ref_no', 'like', '%' . $searchLower . '%')
                        ->where('date', 'like', '%' . $searchLower . '%')
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('order_no', 'like', '%' . $searchLower . '%');
                        })
                        ->where('description', 'like', '%' . $searchLower . '%')
                        ->orWhereHas('user', function ($query) use ($searchLower) {
                            $query->where('full_name', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhere('status', 'like', '%' . $searchLower . '%');
                    // Add more columns as needed
                });
            }

            // Determine the column to sort by
            $results = null;

            if (!empty($columnsData)) {
                $sortableColumns = [
                    1 => 'ref_no',
                    2 => 'date',
                    3 => 'sale_order_id',
                    4 => 'description',
                    5 => 'created_by',
                    6 => 'status',
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
                                $q->where('ref_no', 'like', '%' . $searchLower . '%');
                                break;
                            case 2:
                                $q->where('date', 'like', '%' . $searchLower . '%');
                                break;
                            case 3:
                                $q->whereHas('sale_order', function ($query) use ($searchLower) {
                                    $query->where('order_no', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 4:
                                $q->where('description', 'like', '%' . $searchLower . '%');
                                break;
                            case 5:
                                $q->whereHas('user', function ($query) use ($searchLower) {
                                    $query->where('full_name', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 6:
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
                if ($row->status == 'Request') {
                    $row->status = '<span class="badge badge-warning">Request</span>';
                }

                $row->action = '<div class="dropdown dropdownwidth">
                                <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                                data-toggle="dropdown" id="dropdownMenuButton" type="button">Action <i class="fas fa-caret-down ml-1"></i></button>
                                <div  class="dropdown-menu tx-13">
                                <a class="dropdown-item" href="' . route('material_request.edit', $row->id) . '">Edit</a>
                                <a class="dropdown-item" href="' . route('material_request.view', $row->id) . '">View</a>
                                <a class="dropdown-item" id="swal-warning" data-delete="' . route('material_request.delete', $row->id) . '">Delete</a>
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

            $query = MaterialRequest::select('id', 'sale_order_id', 'date', 'ref_no', 'status', 'description', 'created_by')->with('sale_order', 'user');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->where('ref_no', 'like', '%' . $searchLower . '%')
                        ->where('date', 'like', '%' . $searchLower . '%')
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('order_no', 'like', '%' . $searchLower . '%');
                        })
                        ->where('description', 'like', '%' . $searchLower . '%')
                        ->orWhereHas('user', function ($query) use ($searchLower) {
                            $query->where('full_name', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhere('status', 'like', '%' . $searchLower . '%');
                    // Add more columns as needed
                });
            }

            $sortableColumns = [
                1 => 'ref_no',
                2 => 'date',
                3 => 'sale_order_id',
                4 => 'description',
                5 => 'created_by',
                6 => 'status',
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
                if ($row->status == 'Request') {
                    $row->status = '<span class="badge badge-warning">Request</span>';
                }

                $row->action = '<div class="dropdown dropdownwidth">
                                <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                                data-toggle="dropdown" id="dropdownMenuButton" type="button">Action <i class="fas fa-caret-down ml-1"></i></button>
                                <div  class="dropdown-menu tx-13">
                                <a class="dropdown-item" href="' . route('material_request.edit', $row->id) . '">Edit</a>
                                <a class="dropdown-item" href="' . route('material_request.view', $row->id) . '">View</a>
                                <a class="dropdown-item" id="swal-warning" data-delete="' . route('material_request.delete', $row->id) . '">Delete</a>
                                </div>
                            </div>';
                            $index++;
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
            Auth::user()->hasPermissionTo('MATERIAL REQUEST List') ||
            Auth::user()->hasPermissionTo('MATERIAL REQUEST Create') ||
            Auth::user()->hasPermissionTo('MATERIAL REQUEST Update') ||
            Auth::user()->hasPermissionTo('MATERIAL REQUEST View') ||
            Auth::user()->hasPermissionTo('MATERIAL REQUEST Delete')
        ) {
            Helper::logSystemActivity('MATERIAL REQUEST', 'MATERIAL REQUEST List');
            return view('WMS.MaterialRequest.index');
        }
        return back()->with('custom_errors', 'You don`t have Right Permission');
    }

    public function create(){
        if (!Auth::user()->hasPermissionTo('MATERIAL REQUEST Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $year = Carbon::now('Asia/Kuala_Lumpur')->format('y');
        $count = MaterialRequest::whereYear('date', $year)->count();
        Helper::logSystemActivity('MATERIAL REQUEST', 'MATERIAL REQUEST Create');
        return view('WMS.MaterialRequest.create', compact('year', 'count'));
    }

    public function store(Request $request)
    {
        if (!Auth::user()->hasPermissionTo('MATERIAL REQUEST Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $validator = null;

        $validatedData = $request->validate([
            'sale_order' => 'required',
            'date' => 'required',
            'kertas' => 'required',
            'bahan' => 'required',
            'wip' => 'required',
        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $material_request = new MaterialRequest();
        $material_request->sale_order_id = $request->sale_order;
        $material_request->date = $request->date;
        $material_request->ref_no = $request->ref_no;
        $material_request->description = $request->description;
        $material_request->location = $request->location;
        $material_request->remarks = $request->remarks;
        $material_request->created_by = Auth::user()->id;
        $material_request->status = 'Request';
        $material_request->save();

        foreach($request->kertas as $value){
            $material_request_detail_b = new MaterialRequestB();
            $material_request_detail_b->material_id = $material_request->id;
            $material_request_detail_b->stock_code = $value['stock_code'];
            $material_request_detail_b->group = $value['group'];
            $material_request_detail_b->description = $value['description'];
            $material_request_detail_b->grammage = $value['grammage'];
            $material_request_detail_b->saiz = $value['saiz'];
            $material_request_detail_b->uom = $value['uom'];
            $material_request_detail_b->available_qty = $value['available_qty'];
            $material_request_detail_b->uom_request = $value['uom_request'];
            $material_request_detail_b->request_qty = $value['request_qty'];
            $material_request_detail_b->remarks = $value['remarks'];
            $material_request_detail_b->save();
        }

        foreach($request->bahan as $value){
            $material_request_detail_c = new MaterialRequestC();
            $material_request_detail_c->material_id = $material_request->id;
            $material_request_detail_c->stock_code = $value['stock_code'];
            $material_request_detail_c->group = $value['group'];
            $material_request_detail_c->description = $value['description'];
            $material_request_detail_c->uom = $value['uom'];
            $material_request_detail_c->available_qty = $value['available_qty'];
            $material_request_detail_c->request_qty = $value['request_qty'];
            $material_request_detail_c->save();
        }

        foreach($request->wip as $value){
            $material_request_detail_d = new MaterialRequestD();
            $material_request_detail_d->material_id = $material_request->id;
            $material_request_detail_d->stock_code = $value['stock_code'];
            $material_request_detail_d->group = $value['group'];
            $material_request_detail_d->description = $value['description'];
            $material_request_detail_d->uom = $value['uom'];
            $material_request_detail_d->available_qty = $value['available_qty'];
            $material_request_detail_d->request_qty = $value['request_qty'];
            $material_request_detail_d->save();
        }

        Helper::logSystemActivity('MATERIAL REQUEST', 'MATERIAL REQUEST Store');
        return redirect()->route('material_request')->with('custom_success', 'MATERIAL REQUEST has been Created Successfully !');
    }


    public function edit($id){
        if (!Auth::user()->hasPermissionTo('MATERIAL REQUEST Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $material_request = MaterialRequest::find($id);
        $detailbs = MaterialRequestB::where('material_id', $id)->get();
        $detailcs = MaterialRequestC::where('material_id', $id)->get();
        $detailds = MaterialRequestD::where('material_id', $id)->get();
        Helper::logSystemActivity('MATERIAL REQUEST', 'MATERIAL REQUEST Update');
        return view('WMS.MaterialRequest.edit',compact('material_request', 'detailbs', 'detailcs', 'detailds'));
    }

    public function view($id){
        if (!Auth::user()->hasPermissionTo('MATERIAL REQUEST View')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $material_request = MaterialRequest::find($id);
        $detailbs = MaterialRequestB::where('material_id', $id)->get();
        $detailcs = MaterialRequestC::where('material_id', $id)->get();
        $detailds = MaterialRequestD::where('material_id', $id)->get();
        Helper::logSystemActivity('MATERIAL REQUEST', 'MATERIAL REQUEST View');
        return view('WMS.MaterialRequest.view', compact('material_request', 'detailbs', 'detailcs', 'detailds'));
    }

    public function update(Request $request,$id)
    {
        if (!Auth::user()->hasPermissionTo('MATERIAL REQUEST Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $validatedData = $request->validate([
            'sale_order' => 'required',
            'date' => 'required',
            'kertas' => 'required',
            'bahan' => 'required',
            'wip' => 'required',
        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $material_request = MaterialRequest::find($id);
        $material_request->sale_order_id = $request->sale_order;
        $material_request->date = $request->date;
        $material_request->ref_no = $request->ref_no;
        $material_request->description = $request->description;
        $material_request->location = $request->location;
        $material_request->remarks = $request->remarks;
        $material_request->created_by = Auth::user()->id;
        $material_request->status = 'Request';
        $material_request->save();

        MaterialRequestB::where('material_id', '=', $id)->delete();

        foreach($request->kertas as $value){
            $material_request_detail_b = new MaterialRequestB();
            $material_request_detail_b->material_id = $material_request->id;
            $material_request_detail_b->stock_code = $value['stock_code'];
            $material_request_detail_b->group = $value['group'];
            $material_request_detail_b->description = $value['description'];
            $material_request_detail_b->grammage = $value['grammage'];
            $material_request_detail_b->saiz = $value['saiz'];
            $material_request_detail_b->uom = $value['uom'];
            $material_request_detail_b->available_qty = $value['available_qty'];
            $material_request_detail_b->uom_request = $value['uom_request'];
            $material_request_detail_b->request_qty = $value['request_qty'];
            $material_request_detail_b->remarks = $value['remarks'];
            $material_request_detail_b->save();
        }

        MaterialRequestC::where('material_id', '=', $id)->delete();

        foreach($request->bahan as $value){
            $material_request_detail_c = new MaterialRequestC();
            $material_request_detail_c->material_id = $material_request->id;
            $material_request_detail_c->stock_code = $value['stock_code'];
            $material_request_detail_c->group = $value['group'];
            $material_request_detail_c->description = $value['description'];
            $material_request_detail_c->uom = $value['uom'];
            $material_request_detail_c->available_qty = $value['available_qty'];
            $material_request_detail_c->request_qty = $value['request_qty'];
            $material_request_detail_c->save();
        }

        MaterialRequestD::where('material_id', '=', $id)->delete();

        foreach($request->wip as $value){
            $material_request_detail_d = new MaterialRequestD();
            $material_request_detail_d->material_id = $material_request->id;
            $material_request_detail_d->stock_code = $value['stock_code'];
            $material_request_detail_d->group = $value['group'];
            $material_request_detail_d->description = $value['description'];
            $material_request_detail_d->uom = $value['uom'];
            $material_request_detail_d->available_qty = $value['available_qty'];
            $material_request_detail_d->request_qty = $value['request_qty'];
            $material_request_detail_d->save();
        }

        Helper::logSystemActivity('MATERIAL REQUEST', 'MATERIAL REQUEST update');
        return redirect()->route('material_request')->with('custom_success', 'MATERIAL REQUEST has been Created Successfully !');
    }

    public function delete($id){
        if (!Auth::user()->hasPermissionTo('MATERIAL REQUEST Delete')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $material_request = MaterialRequest::find($id);
        MaterialRequestB::where('material_id', $id)->delete();
        MaterialRequestC::where('material_id', $id)->delete();
        MaterialRequestD::where('material_id', $id)->delete();
        $material_request->delete();
        Helper::logSystemActivity('MATERIAL REQUEST', 'MATERIAL REQUEST Delete');
        return redirect()->route('material_request')->with('custom_success', 'MATERIAL REQUEST has been Successfully Deleted!');
    }
}
