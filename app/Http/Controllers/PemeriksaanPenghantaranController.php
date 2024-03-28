<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Models\AreaLocation;
use App\Models\Location;
use App\Models\Supplier;
use App\Models\Customer;
use App\Models\Product;
use App\Models\PemeriksaanPenghantaran;
use App\Models\PemeriksaanPenghantaranProduct;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PemeriksaanPenghantaranController extends Controller
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

            $query = PemeriksaanPenghantaran::select('id', 'sale_order_id', 'date', 'quantity', 'label', 'berat', 'kualiti', 'created_by')->with('sale_order', 'user');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->where('date', 'like', '%' . $searchLower . '%')
                        ->orWhere('quantity', 'like', '%' . $searchLower . '%')
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('order_no', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('description', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('kod_buku', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('customer', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhere('label', 'like', '%' . $searchLower . '%')
                        ->orWhere('berat', 'like', '%' . $searchLower . '%')
                        ->orWhere('kualiti', 'like', '%' . $searchLower . '%')
                        ->orWhere('status', 'like', '%' . $searchLower . '%');
                    // Add more columns as needed
                });
            }

            // Determine the column to sort by
            $results = null;

            if (!empty($columnsData)) {
                $sortableColumns = [
                    1 => 'date',
                    2 => 'sale_order_id',
                    3 => 'sale_order_id',
                    4 => 'sale_order_id',
                    5 => 'sale_order_id',
                    6 => 'quantity',
                    7 => 'label',
                    8 => 'berat',
                    9 => 'kualiti',
                    10 => 'status',
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
                                $q->whereHas('sale_order', function ($query) use ($searchLower) {
                                    $query->where('order_no', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 3:
                                $q->whereHas('sale_order', function ($query) use ($searchLower) {
                                    $query->where('kod_buku', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 4:
                                $q->whereHas('sale_order', function ($query) use ($searchLower) {
                                    $query->where('description', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 5:
                                $q->whereHas('sale_order', function ($query) use ($searchLower) {
                                    $query->where('customer', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 6:
                                $q->where('quantity', 'like', '%' . $searchLower . '%');
                                break;
                            case 7:
                                $q->where('label', 'like', '%' . $searchLower . '%');
                                break;
                            case 8:
                                $q->where('berat', 'like', '%' . $searchLower . '%');
                                break;
                            case 9:
                                $q->where('kualiti', 'like', '%' . $searchLower . '%');
                                break;
                            case 10:
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

                $row->status = $row->status == 'Verified' ? '<span class="badge badge-success">'.$row->status.'</span>' : '<span class="badge badge-warning">'.$row->status.'</span>';

                $editLink = $row->status == 'Verified' ? '' : '<a class="dropdown-item" href="' . route('pemeriksaan_penghantaran.edit', $row->id) . '">Edit</a>';
                $verifyLink = $row->status == 'Verified' ? '' : '<a class="dropdown-item" href="' . route('pemeriksaan_penghantaran.receive', $row->id) . '">Receive</a>';
                $deleteLink = $row->status == 'Verified' ? '' : '<a class="dropdown-item" id="swal-warning" data-delete="' . route('pemeriksaan_penghantaran.delete', $row->id) . '">Delete</a>';

                $row->action = '<div class="dropdown dropdownwidth">
                                <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                                data-toggle="dropdown" id="dropdownMenuButton" type="button">Action <i class="fas fa-caret-down ml-1"></i></button>
                                <div  class="dropdown-menu tx-13">
                                ' . $editLink . '
                                <a class="dropdown-item" href="' . route('pemeriksaan_penghantaran.view', $row->id) . '">View</a>
                                ' . $verifyLink . '
                                ' . $deleteLink . '
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

            $query = PemeriksaanPenghantaran::select('id', 'sale_order_id', 'date', 'quantity', 'label', 'berat', 'kualiti', 'created_by')->with('sale_order', 'user');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->where('date', 'like', '%' . $searchLower . '%')
                        ->orWhere('quantity', 'like', '%' . $searchLower . '%')
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('order_no', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('description', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('kod_buku', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('customer', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhere('label', 'like', '%' . $searchLower . '%')
                        ->orWhere('berat', 'like', '%' . $searchLower . '%')
                        ->orWhere('kualiti', 'like', '%' . $searchLower . '%')
                        ->orWhere('status', 'like', '%' . $searchLower . '%');
                    // Add more columns as needed
                });
            }

            $sortableColumns = [
                1 => 'date',
                2 => 'sale_order_id',
                3 => 'sale_order_id',
                4 => 'sale_order_id',
                5 => 'sale_order_id',
                6 => 'quantity',
                7 => 'label',
                8 => 'berat',
                9 => 'kualiti',
                10 => 'status',
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

                $row->status = $row->status == 'Verified' ? '<span class="badge badge-success">'.$row->status.'</span>' : '<span class="badge badge-warning">'.$row->status.'</span>';

                $editLink = $row->status == 'Verified' ? '' : '<a class="dropdown-item" href="' . route('pemeriksaan_penghantaran.edit', $row->id) . '">Edit</a>';
                $verifyLink = $row->status == 'Verified' ? '' : '<a class="dropdown-item" href="' . route('pemeriksaan_penghantaran.receive', $row->id) . '">Receive</a>';
                $deleteLink = $row->status == 'Verified' ? '' : '<a class="dropdown-item" id="swal-warning" data-delete="' . route('pemeriksaan_penghantaran.delete', $row->id) . '">Delete</a>';

                $row->action = '<div class="dropdown dropdownwidth">
                                <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                                data-toggle="dropdown" id="dropdownMenuButton" type="button">Action <i class="fas fa-caret-down ml-1"></i></button>
                                <div  class="dropdown-menu tx-13">
                                ' . $editLink . '
                                <a class="dropdown-item" href="' . route('pemeriksaan_penghantaran.view', $row->id) . '">View</a>
                                ' . $verifyLink . '
                                ' . $deleteLink . '
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
            Auth::user()->hasPermissionTo('PEMERIKSAAN PENGHANTARAN List') ||
            Auth::user()->hasPermissionTo('PEMERIKSAAN PENGHANTARAN Create') ||
            Auth::user()->hasPermissionTo('PEMERIKSAAN PENGHANTARAN Update') ||
            Auth::user()->hasPermissionTo('PEMERIKSAAN PENGHANTARAN View') ||
            Auth::user()->hasPermissionTo('PEMERIKSAAN PENGHANTARAN Delete')
        ) {
            Helper::logSystemActivity('PEMERIKSAAN PENGHANTARAN', 'PEMERIKSAAN PENGHANTARAN List');
            return view('WMS.PemeriksaanPenghantaran.index');
        }
        return back()->with('custom_errors', 'You don`t have Right Permission');
    }

    public function create(){
        if (!Auth::user()->hasPermissionTo('PEMERIKSAAN PENGHANTARAN Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $locations = Location::with('area', 'shelf', 'level', 'product')->get();
        Helper::logSystemActivity('PEMERIKSAAN PENGHANTARAN', 'PEMERIKSAAN PENGHANTARAN Create');
        return view('WMS.PemeriksaanPenghantaran.create', compact('locations'));
    }

    public function store(Request $request)
    {
        if (!Auth::user()->hasPermissionTo('PEMERIKSAAN PENGHANTARAN Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $validator = null;

        $validatedData = $request->validate([
            'sale_order' => 'required',
            'date' => 'required'
        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $pemeriksaan_penghantaran = new PemeriksaanPenghantaran();
        $pemeriksaan_penghantaran->sale_order_id = $request->sale_order;
        $pemeriksaan_penghantaran->date = $request->date;
        $pemeriksaan_penghantaran->quantity = $request->quantity;
        $pemeriksaan_penghantaran->label = $request->label;
        $pemeriksaan_penghantaran->berat = $request->berat;
        $pemeriksaan_penghantaran->kualiti = $request->kualiti;
        $pemeriksaan_penghantaran->created_by = Auth::user()->id;
        $pemeriksaan_penghantaran->save();

        $storedData = json_decode($request->input('details'), true);

        foreach ($storedData as $key => $value) {
            $detail = new PemeriksaanPenghantaranProduct();
            $detail->pemeriksaan_id = $pemeriksaan_penghantaran->id;
            $detail->product_id = $value['hiddenId'] ?? null;
            $detail->area_id = $value['area'] ?? null;
            $detail->shelf_id = $value['shelf'] ?? null;
            $detail->level_id = $value['level'] ?? null;
            $detail->available_qty = $value['available_qty'] ?? 0;
            $detail->qty = $value['qty'] ?? 0;
            $detail->save();

            $location = Location::where('area_id', $detail->area_id)->where('shelf_id', $detail->shelf_id)->where('level_id', $detail->level_id)->where('product_id', $detail->product_id)->first();
            if ($location) {
                $location->used_qty -= $detail->qty ?? 0;
                $location->save();
            }
        }

        Helper::logSystemActivity('PEMERIKSAAN PENGHANTARAN', 'PEMERIKSAAN PENGHANTARAN Store');
        return redirect()->route('pemeriksaan_penghantaran')->with('custom_success', 'PEMERIKSAAN PENGHANTARAN has been Created Successfully !');
    }


    public function edit($id){
        if (!Auth::user()->hasPermissionTo('PEMERIKSAAN PENGHANTARAN Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $pemeriksaan_penghantaran = PemeriksaanPenghantaran::find($id);
        $products = PemeriksaanPenghantaranProduct::where('pemeriksaan_id', $id)->get();
        $locations = Location::with('area', 'shelf', 'level', 'product')->get();
        Helper::logSystemActivity('PEMERIKSAAN PENGHANTARAN', 'PEMERIKSAAN PENGHANTARAN Edit');
        return view('WMS.PemeriksaanPenghantaran.edit',compact('pemeriksaan_penghantaran', 'products', 'locations'));
    }

    public function view($id){
        if (!Auth::user()->hasPermissionTo('PEMERIKSAAN PENGHANTARAN View')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $pemeriksaan_penghantaran = PemeriksaanPenghantaran::find($id);
        $products = PemeriksaanPenghantaranProduct::where('pemeriksaan_id', $id)->get();
        $locations = Location::with('area', 'shelf', 'level', 'product')->get();
        Helper::logSystemActivity('PEMERIKSAAN PENGHANTARAN', 'PEMERIKSAAN PENGHANTARAN View');
        return view('WMS.PemeriksaanPenghantaran.view',compact('pemeriksaan_penghantaran', 'products', 'locations'));
    }

    public function update(Request $request,$id)
    {
        if (!Auth::user()->hasPermissionTo('PEMERIKSAAN PENGHANTARAN Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $validator = null;

        $validatedData = $request->validate([
            'sale_order' => 'required',
            'date' => 'required'
        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $pemeriksaan_penghantaran = PemeriksaanPenghantaran::find($id);
        $pemeriksaan_penghantaran->sale_order_id = $request->sale_order;
        $pemeriksaan_penghantaran->date = $request->date;
        $pemeriksaan_penghantaran->quantity = $request->quantity;
        $pemeriksaan_penghantaran->label = $request->label;
        $pemeriksaan_penghantaran->berat = $request->berat;
        $pemeriksaan_penghantaran->kualiti = $request->kualiti;
        $pemeriksaan_penghantaran->created_by = Auth::user()->id;
        $pemeriksaan_penghantaran->save();

        $details = PemeriksaanPenghantaranProduct::where('pemeriksaan_id', '=', $id)->get();

        foreach ($details as $existingDetail) {
            if($existingDetail->area_id != null && $existingDetail->shelf_id != null && $existingDetail->level_id != null){
                $location = Location::where('area_id', $existingDetail->area_id)->where('shelf_id', $existingDetail->shelf_id)->where('level_id', $existingDetail->level_id)->where('product_id', $existingDetail->product_id)->first();
                if ($location) {
                    $location->used_qty += $existingDetail->qty ?? 0;
                    $location->save();
                }
            }
        }

        PemeriksaanPenghantaranProduct::where('pemeriksaan_id', $id)->delete();

        $storedData = json_decode($request->input('details'), true);

        foreach ($storedData as $key => $value) {
            $detail = new PemeriksaanPenghantaranProduct();
            $detail->pemeriksaan_id = $pemeriksaan_penghantaran->id;
            $detail->product_id = $value['hiddenId'] ?? null;
            $detail->area_id = $value['area'] ?? null;
            $detail->shelf_id = $value['shelf'] ?? null;
            $detail->level_id = $value['level'] ?? null;
            $detail->available_qty = $value['available_qty'] ?? 0;
            $detail->qty = $value['qty'] ?? 0;
            $detail->save();

            $location = Location::where('area_id', $detail->area_id)->where('shelf_id', $detail->shelf_id)->where('level_id', $detail->level_id)->where('product_id', $detail->product_id)->first();
            if ($location) {
                $location->used_qty -= $detail->qty ?? 0;
                $location->save();
            }
        }

        Helper::logSystemActivity('PEMERIKSAAN PENGHANTARAN', 'PEMERIKSAAN PENGHANTARAN Update');
        return redirect()->route('pemeriksaan_penghantaran')->with('custom_success', 'PEMERIKSAAN PENGHANTARAN has been Created Successfully !');
    }

    public function verify($id){
        if (!Auth::user()->hasPermissionTo('PEMERIKSAAN PENGHANTARAN Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $pemeriksaan_penghantaran = PemeriksaanPenghantaran::find($id);
        $products = PemeriksaanPenghantaranProduct::where('pemeriksaan_id', $id)->get();
        $locations = Location::with('area', 'shelf', 'level', 'product')->get();
        Helper::logSystemActivity('PEMERIKSAAN PENGHANTARAN', 'PEMERIKSAAN PENGHANTARAN Verify');
        return view('WMS.PemeriksaanPenghantaran.receive',compact('pemeriksaan_penghantaran', 'products', 'locations'));
    }

    public function verify_update(Request $request,$id)
    {
        if (!Auth::user()->hasPermissionTo('PEMERIKSAAN PENGHANTARAN Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $pemeriksaan_penghantaran = PemeriksaanPenghantaran::find($id);
        $pemeriksaan_penghantaran->status = 'Verified';
        $pemeriksaan_penghantaran->verify_by_date = Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y h:i:s A');
        $pemeriksaan_penghantaran->verify_by_user = Auth::user()->user_name;
        $pemeriksaan_penghantaran->verify_by_designation = (Auth::user()->designations != null) ? Auth::user()->designations->name : 'not assign';
        $pemeriksaan_penghantaran->verify_by_department = (Auth::user()->departments != null) ? Auth::user()->departments->name : 'not assign';
        $pemeriksaan_penghantaran->save();

        Helper::logSystemActivity('PEMERIKSAAN PENGHANTARAN', 'PEMERIKSAAN PENGHANTARAN Verify');
        return redirect()->route('pemeriksaan_penghantaran')->with('custom_success', 'PEMERIKSAAN PENGHANTARAN has been Created Successfully !');
    }

    public function delete($id){
        if (!Auth::user()->hasPermissionTo('PEMERIKSAAN PENGHANTARAN Delete')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $pemeriksaan_penghantaran = PemeriksaanPenghantaran::find($id);

        $details = PemeriksaanPenghantaranProduct::where('pemeriksaan_id', '=', $id)->get();

        foreach ($details as $existingDetail) {
            if($existingDetail->area_id != null && $existingDetail->shelf_id != null && $existingDetail->level_id != null){
                $location = Location::where('area_id', $existingDetail->area_id)->where('shelf_id', $existingDetail->shelf_id)->where('level_id', $existingDetail->level_id)->where('product_id', $existingDetail->product_id)->first();
                if ($location) {
                    $location->used_qty += $existingDetail->qty ?? 0;
                    $location->save();
                }
            }
        }
        PemeriksaanPenghantaranProduct::where('pemeriksaan_id', $id)->delete();

        $pemeriksaan_penghantaran->delete();
        Helper::logSystemActivity('PEMERIKSAAN PENGHANTARAN', 'PEMERIKSAAN PENGHANTARAN Delete');
        return redirect()->route('pemeriksaan_penghantaran')->with('custom_success', 'PEMERIKSAAN PENGHANTARAN has been Successfully Deleted!');
    }
}
