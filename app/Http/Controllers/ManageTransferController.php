<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\AreaLocation;
use App\Models\Location;
use App\Models\ManageTransfer;
use App\Models\ManageTransferB;
use App\Models\ManageTransferC;
use App\Models\ManageTransferD;
use App\Models\ManageTransferLocation1;
use App\Models\ManageTransferLocation2;
use App\Models\ManageTransferLocation3;
use App\Models\MaterialRequest;
use App\Models\MaterialRequestB;
use App\Models\MaterialRequestC;
use App\Models\MaterialRequestD;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ManageTransferController extends Controller
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

            $query = ManageTransfer::select('id', 'request_id', 'date', 'status', 'created_by')->with('material_request.sale_order', 'material_request.user', 'user');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->whereHas('material_request', function ($query) use ($searchLower) {
                            $query->where('ref_no', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhere('date', 'like', '%' . $searchLower . '%')
                        ->orWhereHas('material_request.sale_order', function ($query) use ($searchLower) {
                            $query->where('order_no', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('material_request', function ($query) use ($searchLower) {
                            $query->where('description', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('material_request.user', function ($query) use ($searchLower) {
                            $query->where('user_name', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('user', function ($query) use ($searchLower) {
                            $query->where('user_name', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhere('status', 'like', '%' . $searchLower . '%');
                    // Add more columns as needed
                });
            }

            // Determine the column to sort by
            $results = null;

            if (!empty($columnsData)) {
                $sortableColumns = [
                    1 => 'request_id',
                    2 => 'date',
                    3 => 'request_id',
                    4 => 'request_id',
                    5 => 'request_id',
                    6 => 'created_by',
                    7 => 'status',
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
                                $q->whereHas('material_request', function ($query) use ($searchLower) {
                                    $query->where('ref_no', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 2:
                                $q->where('date', 'like', '%' . $searchLower . '%');
                                break;
                            case 3:
                                $q->whereHas('material_request.sale_order', function ($query) use ($searchLower) {
                                    $query->where('order_no', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 4:
                                $q->whereHas('material_request', function ($query) use ($searchLower) {
                                    $query->where('description', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 5:
                                $q->whereHas('material_request.user', function ($query) use ($searchLower) {
                                    $query->where('user_name', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 6:
                                $q->whereHas('material_request.user', function ($query) use ($searchLower) {
                                    $query->where('user_name', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 7:
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
                $row->status = ($row->status == 'Transferred') ? '<span class="badge badge-success">Transferred</span>' : '<span class="badge badge-info">Received</span>';
                $Link = ($row->status != 'Received') ? '<a class="dropdown-item" href="' . route('manage_transfer.edit', $row->id) . '">Edit</a><a class="dropdown-item" href="' . route('manage_transfer.view', $row->id) . '">View</a><a class="dropdown-item" href="' . route('manage_transfer.receive', $row->id) . '">Receive</a><a class="dropdown-item" id="swal-warning" data-delete="' . route('manage_transfer.delete', $row->id) . '">Delete</a>' : '<a class="dropdown-item" href="' . route('manage_transfer.view', $row->id) . '">View</a>';

                $row->action = '<div class="dropdown dropdownwidth">
                                <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                                data-toggle="dropdown" id="dropdownMenuButton" type="button">Action <i class="fas fa-caret-down ml-1"></i></button>
                                <div class="dropdown-menu tx-13">
                                ' . $Link . '
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

            $query = ManageTransfer::select('id', 'request_id', 'date', 'status', 'created_by')->with('material_request.sale_order', 'material_request.user', 'user');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->whereHas('material_request', function ($query) use ($searchLower) {
                            $query->where('ref_no', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhere('date', 'like', '%' . $searchLower . '%')
                        ->orWhereHas('material_request.sale_order', function ($query) use ($searchLower) {
                            $query->where('order_no', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('material_request', function ($query) use ($searchLower) {
                            $query->where('description', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('material_request.user', function ($query) use ($searchLower) {
                            $query->where('user_name', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('user', function ($query) use ($searchLower) {
                            $query->where('user_name', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhere('status', 'like', '%' . $searchLower . '%');
                    // Add more columns as needed
                });
            }

            $sortableColumns = [
                1 => 'request_id',
                2 => 'date',
                3 => 'request_id',
                4 => 'request_id',
                5 => 'request_id',
                6 => 'created_by',
                7 => 'status',
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
                $row->status = ($row->status == 'Transferred') ? '<span class="badge badge-success">Transferred</span>' : '<span class="badge badge-info">Received</span>';
                $Link = ($row->status != 'Received') ? '<a class="dropdown-item" href="' . route('manage_transfer.edit', $row->id) . '">Edit</a><a class="dropdown-item" href="' . route('manage_transfer.view', $row->id) . '">View</a><a class="dropdown-item" href="' . route('manage_transfer.receive', $row->id) . '">Receive</a><a class="dropdown-item" id="swal-warning" data-delete="' . route('manage_transfer.delete', $row->id) . '">Delete</a>' : '<a class="dropdown-item" href="' . route('manage_transfer.view', $row->id) . '">View</a>';

                $row->action = '<div class="dropdown dropdownwidth">
                                <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                                data-toggle="dropdown" id="dropdownMenuButton" type="button">Action <i class="fas fa-caret-down ml-1"></i></button>
                                <div class="dropdown-menu tx-13">
                                ' . $Link . '
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
            Auth::user()->hasPermissionTo('MANAGE TRANSFER List') ||
            Auth::user()->hasPermissionTo('MANAGE TRANSFER Create') ||
            Auth::user()->hasPermissionTo('MANAGE TRANSFER Update') ||
            Auth::user()->hasPermissionTo('MANAGE TRANSFER View') ||
            Auth::user()->hasPermissionTo('MANAGE TRANSFER Receive') ||
            Auth::user()->hasPermissionTo('MANAGE TRANSFER Delete')
        ) {
            Helper::logSystemActivity('MANAGE TRANSFER', 'MANAGE TRANSFER List');
            return view('WMS.ManageTransfer.index');
        }
        return back()->with('custom_errors', 'You don`t have Right Permission');
    }
    public function create(){
        if (!Auth::user()->hasPermissionTo('MANAGE TRANSFER Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $ref_nos = MaterialRequest::whereHas('manageTransfer', function($query) {
            $query->whereHas('manageTransferProductA', function($subQueryA) {
                $subQueryA->where('remaining_qty', '>', 0);
            })->orWhereHas('manageTransferProductB', function($subQueryB) {
                $subQueryB->where('remaining_qty', '>', 0);
            })->orWhereHas('manageTransferProductC', function($subQueryC) {
                $subQueryC->where('remaining_qty', '>', 0);
            });
        })->get();
        $locations = AreaLocation::select('area_id', 'shelf_id', 'level_id')->with('area', 'shelf', 'level')->get();
        Helper::logSystemActivity('MANAGE TRANSFER', 'MANAGE TRANSFER Create');
        return view('WMS.ManageTransfer.create', compact('ref_nos', 'locations'));
    }

    public function ref(Request $request){
        $material = MaterialRequest::where('id', '=', $request->id)->with('sale_order', 'user')->first();
        $material_b = MaterialRequestB::with(['manageTransfer' => function ($query) use ($material) {
            $query->latest()->with(['manageTransferProductA' => function ($query) use ($material) {
                $query->where('product_id', $material->id)->first();
            }]);
        }, 'products', 'uoms'])
        ->where('material_id', $material->id)
        ->get();
        $material_c = MaterialRequestC::with(['manageTransfer' => function ($query) use ($material) {
            $query->latest()->with(['manageTransferProductB' => function ($query) use ($material) {
                $query->where('product_id', $material->id)->first();
            }]);
        }, 'products'])
        ->where('material_id', $material->id)
        ->get();
        $material_d = MaterialRequestD::with(['manageTransfer' => function ($query) use ($material) {
            $query->latest()->with(['manageTransferProductC' => function ($query) use ($material) {
                $query->where('product_id', $material->id)->first();
            }]);
        }, 'products'])
        ->where('material_id', $material->id)
        ->get();
        return response()->json(['material' => $material, 'material_b' => $material_b, 'material_c' => $material_c, 'material_d' => $material_d]);
    }

    public function available_qty(Request $request){
        $qty = Location::select('used_qty')->where('area_id', '=', $request->area_id)->where('shelf_id', '=', $request->shelf_id)->where('level_id', '=', $request->level_id)->where('product_id', '=', $request->product_id)->first();
        return $qty;
    }

    public function store(Request $request)
    {
        if (!Auth::user()->hasPermissionTo('MANAGE TRANSFER Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $validator = null;

        $validatedData = $request->validate([
            'date' => 'required',
            'ref_no' => 'required'
        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $manage_transfer = new ManageTransfer();
        $manage_transfer->request_id = $request->ref_no;
        $manage_transfer->date = $request->date;
        $manage_transfer->created_by = Auth::user()->id;
        $manage_transfer->status = 'Transferred';
        $manage_transfer->save();

        foreach($request->kertas as $value){
            $manage_transfer_detail_b = new ManageTransferB();
            $manage_transfer_detail_b->transfer_id = $manage_transfer->id;
            $manage_transfer_detail_b->product_id = $value['product_id'] ?? null;
            $manage_transfer_detail_b->previous_qty = $value['previous_qty'] ?? 0;
            $manage_transfer_detail_b->balance_qty = $value['balance_qty'] ?? 0;
            $manage_transfer_detail_b->transfer_qty = $value['transfer_qty'] ?? 0;
            $manage_transfer_detail_b->remaining_qty = $value['remaining_qty'] ?? 0;
            $manage_transfer_detail_b->remarks = $value['remarks'] ?? null;
            $manage_transfer_detail_b->save();
        }

        foreach($request->bahan as $value){
            $manage_transfer_detail_c = new ManageTransferC();
            $manage_transfer_detail_c->transfer_id = $manage_transfer->id;
            $manage_transfer_detail_c->product_id = $value['product_id'] ?? null;
            $manage_transfer_detail_c->previous_qty = $value['previous_qty'] ?? 0;
            $manage_transfer_detail_c->balance_qty = $value['balance_qty'] ?? 0;
            $manage_transfer_detail_c->transfer_qty = $value['transfer_qty'] ?? 0;
            $manage_transfer_detail_c->remaining_qty = $value['remaining_qty'] ?? 0;
            $manage_transfer_detail_c->remarks = $value['remarks'] ?? null;
            $manage_transfer_detail_c->save();
        }

        foreach($request->wip as $value){
            $manage_transfer_detail_d = new ManageTransferD();
            $manage_transfer_detail_d->transfer_id = $manage_transfer->id;
            $manage_transfer_detail_d->product_id = $value['product_id'] ?? null;
            $manage_transfer_detail_d->previous_qty = $value['previous_qty'] ?? 0;
            $manage_transfer_detail_d->balance_qty = $value['balance_qty'] ?? 0;
            $manage_transfer_detail_d->transfer_qty = $value['transfer_qty'] ?? 0;
            $manage_transfer_detail_d->remaining_qty = $value['remaining_qty'] ?? 0;
            $manage_transfer_detail_d->remarks = $value['remarks'] ?? null;
            $manage_transfer_detail_d->save();
        }

        $storedData = json_decode($request->input('details'), true);

        foreach ($storedData as $key => $value) {
            if($value['tableId'] == 1){
                $detail = new ManageTransferLocation1();
                $detail->transfer_id = $manage_transfer->id;
                $detail->product_id = $value['hiddenId'] ?? null;
                $detail->area_id = $value['area'] ?? null;
                $detail->shelf_id = $value['shelf'] ?? null;
                $detail->level_id = $value['level'] ?? null;
                $detail->transfer_qty = $value['transfer_qty'] ?? 0;
                $detail->available_qty = $value['available_qty'] ?? 0;
                $detail->save();
            } else if($value['tableId'] == 2){
                $detail = new ManageTransferLocation2();
                $detail->transfer_id = $manage_transfer->id;
                $detail->product_id = $value['hiddenId'] ?? null;
                $detail->area_id = $value['area'] ?? null;
                $detail->shelf_id = $value['shelf'] ?? null;
                $detail->level_id = $value['level'] ?? null;
                $detail->transfer_qty = $value['transfer_qty'] ?? 0;
                $detail->available_qty = $value['available_qty'] ?? 0;
                $detail->save();
            } else if($value['tableId'] == 3){
                $detail = new ManageTransferLocation3();
                $detail->transfer_id = $manage_transfer->id;
                $detail->product_id = $value['hiddenId'] ?? null;
                $detail->area_id = $value['area'] ?? null;
                $detail->shelf_id = $value['shelf'] ?? null;
                $detail->level_id = $value['level'] ?? null;
                $detail->transfer_qty = $value['transfer_qty'] ?? 0;
                $detail->available_qty = $value['available_qty'] ?? 0;
                $detail->save();
            }

            $location = Location::where('area_id', '=', $value['area'])->where('shelf_id', '=', $value['shelf'])->where('level_id', '=', $value['level'])->where('product_id', '=', $value['hiddenId'])->first();
            $location->used_qty -= $value['transfer_qty'];
            $location->save();
        }

        Helper::logSystemActivity('MANAGE TRANSFER', 'MANAGE TRANSFER Store');
        return redirect()->route('manage_transfer')->with('custom_success', 'MANAGE TRANSFER has been Created Successfully !');
    }

    public function edit($id){
        if (!Auth::user()->hasPermissionTo('MANAGE TRANSFER Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $manage_transfer = ManageTransfer::where('id', $id)->with('manageTransferProductA', 'manageTransferProductB', 'manageTransferProductC')->first();
        $products_a = $manage_transfer->manageTransferProductA;
        $products_b = $manage_transfer->manageTransferProductB;
        $products_c = $manage_transfer->manageTransferProductC;

        $locations_a = ManageTransferLocation1::where('transfer_id', '=', $id)->get();
        $locations_b = ManageTransferLocation2::where('transfer_id', '=', $id)->get();
        $locations_c = ManageTransferLocation3::where('transfer_id', '=', $id)->get();
        $locations = AreaLocation::select('area_id', 'shelf_id', 'level_id')->with('area', 'shelf', 'level')->get();
        Helper::logSystemActivity('MANAGE TRANSFER', 'MANAGE TRANSFER Edit');
        return view('WMS.ManageTransfer.edit', compact('manage_transfer', 'locations', 'products_a', 'products_b', 'products_c', 'locations_a', 'locations_b', 'locations_c'));
    }

    public function update(Request $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('MANAGE TRANSFER Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $validator = null;

        $validatedData = $request->validate([
            'date' => 'required',
        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $manage_transfer = ManageTransfer::find($id);
        $manage_transfer->date = $request->date;
        $manage_transfer->created_by = Auth::user()->id;
        $manage_transfer->status = 'Transferred';
        $manage_transfer->save();

        $details = ManageTransferB::where('transfer_id', '=', $id)->get();
        $detailIds = $details->pluck('product_id')->toArray();
        $existingDetails = ManageTransferLocation1::whereIn('product_id', $detailIds)->get();

        foreach ($existingDetails as $existingDetail) {
            if($existingDetail->area_id != null && $existingDetail->shelf_id != null && $existingDetail->level_id != null){
                $location = Location::where('area_id', $existingDetail->area_id)->where('shelf_id', $existingDetail->shelf_id)->where('level_id', $existingDetail->level_id)->where('product_id', $existingDetail->product_id)->first();

                if ($location) {
                    $location->used_qty += $existingDetail->qty ?? 0;
                    $location->save();
                }
            }
        }

        $details1 = ManageTransferC::where('transfer_id', '=', $id)->get();
        $detailIds1 = $details1->pluck('product_id')->toArray();
        $existingDetails1 = ManageTransferLocation2::whereIn('product_id', $detailIds1)->get();

        foreach ($existingDetails1 as $existingDetail) {
            if($existingDetail->area_id != null && $existingDetail->shelf_id != null && $existingDetail->level_id != null){
                $location = Location::where('area_id', $existingDetail->area_id)->where('shelf_id', $existingDetail->shelf_id)->where('level_id', $existingDetail->level_id)->where('product_id', $existingDetail->product_id)->first();

                if ($location) {
                    $location->used_qty += $existingDetail->qty ?? 0;
                    $location->save();
                }
            }
        }

        $details2 = ManageTransferD::where('transfer_id', '=', $id)->get();
        $detailIds2 = $details2->pluck('product_id')->toArray();
        $existingDetails2 = ManageTransferLocation3::whereIn('product_id', $detailIds2)->get();

        foreach ($existingDetails2 as $existingDetail) {
            if($existingDetail->area_id != null && $existingDetail->shelf_id != null && $existingDetail->level_id != null){
                $location = Location::where('area_id', $existingDetail->area_id)->where('shelf_id', $existingDetail->shelf_id)->where('level_id', $existingDetail->level_id)->where('product_id', $existingDetail->product_id)->first();

                if ($location) {
                    $location->used_qty += $existingDetail->qty ?? 0;
                    $location->save();
                }
            }
        }

        ManageTransferB::where('transfer_id', $id)->delete();
        ManageTransferC::where('transfer_id', $id)->delete();
        ManageTransferD::where('transfer_id', $id)->delete();
        ManageTransferLocation1::whereIn('product_id', $detailIds)->delete();
        ManageTransferLocation2::whereIn('product_id', $detailIds1)->delete();
        ManageTransferLocation3::whereIn('product_id', $detailIds2)->delete();

        foreach($request->kertas as $value){
            $manage_transfer_detail_b = new ManageTransferB();
            $manage_transfer_detail_b->transfer_id = $manage_transfer->id;
            $manage_transfer_detail_b->product_id = $value['product_id'] ?? null;
            $manage_transfer_detail_b->previous_qty = $value['previous_qty'] ?? 0;
            $manage_transfer_detail_b->balance_qty = $value['balance_qty'] ?? 0;
            $manage_transfer_detail_b->transfer_qty = $value['transfer_qty'] ?? 0;
            $manage_transfer_detail_b->remaining_qty = $value['remaining_qty'] ?? 0;
            $manage_transfer_detail_b->remarks = $value['remarks'] ?? null;
            $manage_transfer_detail_b->save();
        }

        foreach($request->bahan as $value){
            $manage_transfer_detail_c = new ManageTransferC();
            $manage_transfer_detail_c->transfer_id = $manage_transfer->id;
            $manage_transfer_detail_c->product_id = $value['product_id'] ?? null;
            $manage_transfer_detail_c->previous_qty = $value['previous_qty'] ?? 0;
            $manage_transfer_detail_c->balance_qty = $value['balance_qty'] ?? 0;
            $manage_transfer_detail_c->transfer_qty = $value['transfer_qty'] ?? 0;
            $manage_transfer_detail_c->remaining_qty = $value['remaining_qty'] ?? 0;
            $manage_transfer_detail_c->remarks = $value['remarks'] ?? null;
            $manage_transfer_detail_c->save();
        }

        foreach($request->wip as $value){
            $manage_transfer_detail_d = new ManageTransferD();
            $manage_transfer_detail_d->transfer_id = $manage_transfer->id;
            $manage_transfer_detail_d->product_id = $value['product_id'] ?? null;
            $manage_transfer_detail_d->previous_qty = $value['previous_qty'] ?? 0;
            $manage_transfer_detail_d->balance_qty = $value['balance_qty'] ?? 0;
            $manage_transfer_detail_d->transfer_qty = $value['transfer_qty'] ?? 0;
            $manage_transfer_detail_d->remaining_qty = $value['remaining_qty'] ?? 0;
            $manage_transfer_detail_d->remarks = $value['remarks'] ?? null;
            $manage_transfer_detail_d->save();
        }

        $storedData = json_decode($request->input('details'), true);

        foreach ($storedData as $key => $value) {
            if($value['tableId'] == 1){
                $detail = new ManageTransferLocation1();
                $detail->transfer_id = $manage_transfer->id;
                $detail->product_id = $value['hiddenId'] ?? null;
                $detail->area_id = $value['area'] ?? null;
                $detail->shelf_id = $value['shelf'] ?? null;
                $detail->level_id = $value['level'] ?? null;
                $detail->transfer_qty = $value['transfer_qty'] ?? 0;
                $detail->available_qty = $value['available_qty'] ?? 0;
                $detail->save();
            } else if($value['tableId'] == 2){
                $detail = new ManageTransferLocation2();
                $detail->transfer_id = $manage_transfer->id;
                $detail->product_id = $value['hiddenId'] ?? null;
                $detail->area_id = $value['area'] ?? null;
                $detail->shelf_id = $value['shelf'] ?? null;
                $detail->level_id = $value['level'] ?? null;
                $detail->transfer_qty = $value['transfer_qty'] ?? 0;
                $detail->available_qty = $value['available_qty'] ?? 0;
                $detail->save();
            } else if($value['tableId'] == 3){
                $detail = new ManageTransferLocation3();
                $detail->transfer_id = $manage_transfer->id;
                $detail->product_id = $value['hiddenId'] ?? null;
                $detail->area_id = $value['area'] ?? null;
                $detail->shelf_id = $value['shelf'] ?? null;
                $detail->level_id = $value['level'] ?? null;
                $detail->transfer_qty = $value['transfer_qty'] ?? 0;
                $detail->available_qty = $value['available_qty'] ?? 0;
                $detail->save();
            }

            $location = Location::where('area_id', '=', $value['area'])->where('shelf_id', '=', $value['shelf'])->where('level_id', '=', $value['level'])->where('product_id', '=', $value['hiddenId'])->first();
            $location->used_qty -= $value['transfer_qty'];
            $location->save();
        }

        Helper::logSystemActivity('MANAGE TRANSFER', 'MANAGE TRANSFER Update');
        return redirect()->route('manage_transfer')->with('custom_success', 'MANAGE TRANSFER has been Updated Successfully !');
    }

    public function view($id){
        if (!Auth::user()->hasPermissionTo('MANAGE TRANSFER View')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $manage_transfer = ManageTransfer::where('id', $id)->with('manageTransferProductA', 'manageTransferProductB', 'manageTransferProductC')->first();
        $products_a = $manage_transfer->manageTransferProductA;
        $products_b = $manage_transfer->manageTransferProductB;
        $products_c = $manage_transfer->manageTransferProductC;

        $locations_a = ManageTransferLocation1::where('transfer_id', '=', $id)->get();
        $locations_b = ManageTransferLocation2::where('transfer_id', '=', $id)->get();
        $locations_c = ManageTransferLocation3::where('transfer_id', '=', $id)->get();
        $locations = AreaLocation::select('area_id', 'shelf_id', 'level_id')->with('area', 'shelf', 'level')->get();
        Helper::logSystemActivity('MANAGE TRANSFER', 'MANAGE TRANSFER View');
        return view('WMS.ManageTransfer.view', compact('manage_transfer', 'locations', 'products_a', 'products_b', 'products_c', 'locations_a', 'locations_b', 'locations_c'));
    }

    public function receive($id){
        if (!Auth::user()->hasPermissionTo('MANAGE TRANSFER Receive')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $manage_transfer = ManageTransfer::where('id', $id)->with('manageTransferProductA', 'manageTransferProductB', 'manageTransferProductC')->first();
        $products_a = $manage_transfer->manageTransferProductA;
        $products_b = $manage_transfer->manageTransferProductB;
        $products_c = $manage_transfer->manageTransferProductC;

        $locations_a = ManageTransferLocation1::where('transfer_id', '=', $id)->get();
        $locations_b = ManageTransferLocation2::where('transfer_id', '=', $id)->get();
        $locations_c = ManageTransferLocation3::where('transfer_id', '=', $id)->get();
        $locations = AreaLocation::select('area_id', 'shelf_id', 'level_id')->with('area', 'shelf', 'level')->get();
        Helper::logSystemActivity('MANAGE TRANSFER', 'MANAGE TRANSFER Receive');
        return view('WMS.ManageTransfer.receive', compact('manage_transfer', 'locations', 'products_a', 'products_b', 'products_c', 'locations_a', 'locations_b', 'locations_c'));
    }

    public function receive_update(Request $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('MANAGE TRANSFER Receive')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $manage_transfer = ManageTransfer::find($id);
        $manage_transfer->received_by_date = Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y h:i:s A');
        $manage_transfer->received_by_user = Auth::user()->user_name;
        $manage_transfer->received_by_designation = (Auth::user()->designations != null) ? Auth::user()->designations->name : 'not assign';
        $manage_transfer->received_by_department = (Auth::user()->departments != null) ? Auth::user()->departments->name : 'not assign';
        $manage_transfer->status = 'Received';
        $manage_transfer->save();

        $material_request = MaterialRequest::find($manage_transfer->request_id);
        $material_request->status = 'Completed';
        $material_request->save();

        Helper::logSystemActivity('MANAGE TRANSFER', 'MANAGE TRANSFER Receive');
        return redirect()->route('manage_transfer')->with('custom_success', 'MANAGE TRANSFER has been Received Successfully !');
    }

    public function delete($id){
        if (!Auth::user()->hasPermissionTo('MANAGE TRANSFER Delete')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $manage_transfer = ManageTransfer::find($id);

        $details = ManageTransferB::where('transfer_id', '=', $id)->get();
        $detailIds = $details->pluck('product_id')->toArray();
        $existingDetails = ManageTransferLocation1::whereIn('product_id', $detailIds)->get();

        foreach ($existingDetails as $existingDetail) {
            if($existingDetail->area_id != null && $existingDetail->shelf_id != null && $existingDetail->level_id != null){
                $location = Location::where('area_id', $existingDetail->area_id)->where('shelf_id', $existingDetail->shelf_id)->where('level_id', $existingDetail->level_id)->where('product_id', $existingDetail->product_id)->first();

                if ($location) {
                    $location->used_qty += $existingDetail->qty ?? 0;
                    $location->save();
                }
            }
        }

        $details1 = ManageTransferC::where('transfer_id', '=', $id)->get();
        $detailIds1 = $details1->pluck('product_id')->toArray();
        $existingDetails1 = ManageTransferLocation2::whereIn('product_id', $detailIds1)->get();

        foreach ($existingDetails1 as $existingDetail) {
            if($existingDetail->area_id != null && $existingDetail->shelf_id != null && $existingDetail->level_id != null){
                $location = Location::where('area_id', $existingDetail->area_id)->where('shelf_id', $existingDetail->shelf_id)->where('level_id', $existingDetail->level_id)->where('product_id', $existingDetail->product_id)->first();

                if ($location) {
                    $location->used_qty += $existingDetail->qty ?? 0;
                    $location->save();
                }
            }
        }

        $details2 = ManageTransferD::where('transfer_id', '=', $id)->get();
        $detailIds2 = $details2->pluck('product_id')->toArray();
        $existingDetails2 = ManageTransferLocation3::whereIn('product_id', $detailIds2)->get();

        foreach ($existingDetails2 as $existingDetail) {
            if($existingDetail->area_id != null && $existingDetail->shelf_id != null && $existingDetail->level_id != null){
                $location = Location::where('area_id', $existingDetail->area_id)->where('shelf_id', $existingDetail->shelf_id)->where('level_id', $existingDetail->level_id)->where('product_id', $existingDetail->product_id)->first();

                if ($location) {
                    $location->used_qty += $existingDetail->qty ?? 0;
                    $location->save();
                }
            }
        }

        ManageTransferB::where('transfer_id', $id)->delete();
        ManageTransferC::where('transfer_id', $id)->delete();
        ManageTransferD::where('transfer_id', $id)->delete();
        ManageTransferLocation1::whereIn('product_id', $detailIds)->delete();
        ManageTransferLocation2::whereIn('product_id', $detailIds1)->delete();
        ManageTransferLocation3::whereIn('product_id', $detailIds2)->delete();

        $manage_transfer->delete();
        Helper::logSystemActivity('MANAGE TRANSFER', 'MANAGE TRANSFER Delete');
        return redirect()->route('manage_transfer')->with('custom_success', 'MANAGE TRANSFER has been Successfully Deleted!');
    }
}
