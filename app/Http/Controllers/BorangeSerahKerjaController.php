<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\BorangSerahKerjaKulit;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BorangeSerahKerjaController extends Controller
{

    public function Data(Request $request)
    {
        // dd($request->input('columnsData'));
        if ($request->ajax() && $request->input('columnsData') != null) {
            $columnsData = $request->input('columnsData');
            $draw = $request->input('draw');
            $start = $request->input('start');
            $length = $request->input('length');
            $search = $request->input('search.value');
            $orderByColumnIndex = $request->input('order.0.column'); // Get the index of the column to sort by
            $orderByDirection = $request->input('order.0.dir'); // Get the sort direction ('asc' or 'desc')

            $query = BorangSerahKerjaKulit::select('id', 'po_no', 'qty','size' , 'nama', 'sale_order_id', 'status','date')->with('sale_order',"supplier");

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->where('date', 'like', '%' . $searchLower . '%')
                        ->orWhere('po_no', 'like', '%' . $searchLower . '%')
                        ->orWhereHas('supplier', function ($query) use ($searchLower) {
                            $query->where('name', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('order_no', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('description', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhere('qty', 'like', '%' . $searchLower . '%')
                        ->orWhere('size', 'like', '%' . $searchLower . '%')
                        ->orWhere('status', 'like', '%' . $searchLower . '%');
                    // Add more columns as needed
                });
            }
            // Determine the column to sort by
            $results = null;

            if (!empty($columnsData)) {
                $sortableColumns = [
                    0 => 'date',
                    1 => 'po_no',
                    2 => 'nama',
                    3 => 'sale_order_id',
                    4 => 'sale_order_id',
                    5 => 'qty',
                    6 => 'size',
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
                            case 0:
                                $q->where('date', 'like', '%' . $searchLower . '%');
                                break;
                            case 1:
                                $q->where('po_no', 'like', '%' . $searchLower . '%');
                                break;
                            case 2:
                                $q->whereHas('supplier', function ($query) use ($searchLower) {
                                    $query->where('name', 'like', '%' . $searchLower . '%');
                                });

                                break;
                            case 3:
                                $q->whereHas('sale_order', function ($query) use ($searchLower) {
                                    $query->where('order_no', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 4:
                                $q->whereHas('sale_order', function ($query) use ($searchLower) {
                                    $query->where('description', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 5:
                                $q->where('qty', 'like', '%' . $searchLower . '%');
                                break;
                            case 6:
                                $q->where('size', 'like', '%' . $searchLower . '%');
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

                if ($row->status == 'Not-initiated') {
                    $row->status = '<span class="badge badge-light">Not-initiated</span>';
                    $actions = '<a class="dropdown-item" href="' . route('borange_serah_kerja.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('borange_serah_kerja.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('borange_serah_kerja.purchasing', $row->id) . '">Purchasing</a>
                    <a class="dropdown-item"  id="swal-warning" data-delete="' . route('borange_serah_kerja.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'purchased') {
                    $row->status = '<span class="badge badge-primary">Purchased</span>';
                    $actions = '<a class="dropdown-item" href="' . route('borange_serah_kerja.transfer', $row->id) . '">Transfer</a>
                                <a class="dropdown-item" href="' . route('borange_serah_kerja.view', $row->id) . '">View</a>
                                <a class="dropdown-item"  id="swal-warning" data-delete="' . route('borange_serah_kerja.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'transfered') {
                    $row->status = '<span class="badge badge-warning">Transfer</span>';
                    $actions = '<a class="dropdown-item" href="' . route('borange_serah_kerja.receive', $row->id) . '">Receive</a>
                                <a class="dropdown-item" href="' . route('borange_serah_kerja.view', $row->id) . '">View</a>
                                <a class="dropdown-item"  id="swal-warning" data-delete="' . route('borange_serah_kerja.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'received') {
                    $row->status = '<span class="badge badge-success">Received</span>';
                    $actions = '<a class="dropdown-item" href="' . route('borange_serah_kerja.view', $row->id) . '">View</a>';
                }
                else if ($row->status == 'declined') {
                    $row->status = '<span class="badge badge-danger">Declined</span>';
                    $actions = '<a class="dropdown-item" href="' . route('borange_serah_kerja.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('borange_serah_kerja.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('borange_serah_kerja.purchasing', $row->id) . '">Purchasing</a>
                    <a class="dropdown-item"  id="swal-warning" data-delete="' . route('borange_serah_kerja.delete', $row->id) . '">Delete</a>';
                }

                $row->action = '<div class="dropdown dropdownwidth">
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

            $query = BorangSerahKerjaKulit::select('id', 'po_no', 'qty','size' , 'nama', 'sale_order_id', 'status','date')->with('sale_order',"supplier");

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                    ->where('date', 'like', '%' . $searchLower . '%')
                    ->orWhere('po_no', 'like', '%' . $searchLower . '%')
                    ->orWhereHas('supplier', function ($query) use ($searchLower) {
                        $query->where('name', 'like', '%' . $searchLower . '%');
                    })
                    ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                        $query->where('order_no', 'like', '%' . $searchLower . '%');
                    })
                    ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                        $query->where('description', 'like', '%' . $searchLower . '%');
                    })
                    ->orWhere('qty', 'like', '%' . $searchLower . '%')
                    ->orWhere('size', 'like', '%' . $searchLower . '%')
                    ->orWhere('status', 'like', '%' . $searchLower . '%');
                    // Add more columns as needed
                });
            }

            $sortableColumns = [
                0 => 'date',
                1 => 'po_no',
                2 => 'nama',
                3 => 'sale_order_id',
                4 => 'sale_order_id',
                5 => 'qty',
                6 => 'size',
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

                if ($row->status == 'Not-initiated') {
                    $row->status = '<span class="badge badge-light">Not-initiated</span>';
                    $actions = '<a class="dropdown-item" href="' . route('borange_serah_kerja.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('borange_serah_kerja.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('borange_serah_kerja.purchasing', $row->id) . '">Purchasing</a>
                    <a class="dropdown-item"  id="swal-warning" data-delete="' . route('borange_serah_kerja.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'purchased') {
                    $row->status = '<span class="badge badge-primary">Purchased</span>';
                    $actions = '<a class="dropdown-item" href="' . route('borange_serah_kerja.transfer', $row->id) . '">Transfer</a>
                                <a class="dropdown-item" href="' . route('borange_serah_kerja.view', $row->id) . '">View</a>
                                <a class="dropdown-item"  id="swal-warning" data-delete="' . route('borange_serah_kerja.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'transfered') {
                    $row->status = '<span class="badge badge-warning">Transfer</span>';
                    $actions = '<a class="dropdown-item" href="' . route('borange_serah_kerja.receive', $row->id) . '">Receive</a>
                                <a class="dropdown-item" href="' . route('borange_serah_kerja.view', $row->id) . '">View</a>
                                <a class="dropdown-item"  id="swal-warning" data-delete="' . route('borange_serah_kerja.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'received') {
                    $row->status = '<span class="badge badge-success">Received</span>';
                    $actions = '<a class="dropdown-item" href="' . route('borange_serah_kerja.view', $row->id) . '">View</a>';
                }
                else if ($row->status == 'declined') {
                    $row->status = '<span class="badge badge-danger">Declined</span>';
                    $actions = '<a class="dropdown-item" href="' . route('borange_serah_kerja.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('borange_serah_kerja.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('borange_serah_kerja.purchasing', $row->id) . '">Purchasing</a>
                    <a class="dropdown-item"  id="swal-warning" data-delete="' . route('borange_serah_kerja.delete', $row->id) . '">Delete</a>';
                }


                $row->action = '<div class="dropdown dropdownwidth">
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
            Auth::user()->hasPermissionTo('BORANG SERAH KERJA (KULIT BUKU/COVER) List') ||
            Auth::user()->hasPermissionTo('BORANG SERAH KERJA (KULIT BUKU/COVER) Create') ||
            Auth::user()->hasPermissionTo('BORANG SERAH KERJA (KULIT BUKU/COVER) Update') ||
            Auth::user()->hasPermissionTo('BORANG SERAH KERJA (KULIT BUKU/COVER) View') ||
            Auth::user()->hasPermissionTo('BORANG SERAH KERJA (KULIT BUKU/COVER) Delete') ||
            Auth::user()->hasPermissionTo('BORANG SERAH KERJA (KULIT BUKU/COVER) Proses')
        ) {
            Helper::logSystemActivity('BORANG SERAH KERJA (KULIT BUKU/COVER)', 'BORANG SERAH KERJA (KULIT BUKU/COVER) List');
            return view('Production.BorangeSerahKerja.index');
        }
        return back()->with('custom_errors', 'You don`t have Right Permission');
    }

    public function create(){
        if (!Auth::user()->hasPermissionTo('BORANG SERAH KERJA (KULIT BUKU/COVER) Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $suppliers = Supplier::select('id', 'name')->get();
        Helper::logSystemActivity('BORANG SERAH KERJA (KULIT BUKU/COVER)', 'BORANG SERAH KERJA (KULIT BUKU/COVER) Create');
        return view('Production.BorangeSerahKerja.create', compact('suppliers'));
    }


    public function store(Request $request)
    {
        if (!Auth::user()->hasPermissionTo('BORANG SERAH KERJA (KULIT BUKU/COVER) Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        // dd($request);
        $validator = null;

        $validatedData = $request->validate([
            'sale_order' => 'required',
            'date' => 'required',



        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $borange_serah_kerja = new BorangSerahKerjaKulit();
        $borange_serah_kerja->sale_order_id = $request->sale_order;
        $borange_serah_kerja->date = $request->date;
        $borange_serah_kerja->nama = $request->nama;
        $borange_serah_kerja->qty = $request->qty;
        $borange_serah_kerja->size = $request->size;
        $borange_serah_kerja->po_no = $request->po_no;
        $borange_serah_kerja->siap_1 = $request->siap_1;

        $borange_serah_kerja->date_line = $request->date_line;
        $borange_serah_kerja->created_by = Auth::user()->id;

        $borange_serah_kerja->jenis_1 = ($request->jenis_1 != null) ? $request->jenis_1 : null;
        $borange_serah_kerja->jenis_input_1 = $request->jenis_input_1;
        $borange_serah_kerja->jenis_2 = ($request->jenis_2 != null) ? $request->jenis_2 : null;
        $borange_serah_kerja->jenis_3 = ($request->jenis_3 != null) ? $request->jenis_3 : null;
        $borange_serah_kerja->jenis_4 = ($request->jenis_4 != null) ? $request->jenis_4 : null;
        $borange_serah_kerja->jenis_5 = ($request->jenis_5 != null) ? $request->jenis_5 : null;
        $borange_serah_kerja->jenis_6 = ($request->jenis_6 != null) ? $request->jenis_6 : null;
        $borange_serah_kerja->jenis_7 = ($request->jenis_7 != null) ? $request->jenis_7 : null;
        $borange_serah_kerja->jenis_8 = ($request->jenis_8 != null) ? $request->jenis_8 : null;
        $borange_serah_kerja->jenis_9 = ($request->jenis_9 != null) ? $request->jenis_9 : null;
        $borange_serah_kerja->jenis_input_9 = $request->jenis_input_9;
        $borange_serah_kerja->jenis_10 = ($request->jenis_10 != null) ? $request->jenis_10 : null;
        $borange_serah_kerja->jenis_11 = ($request->jenis_11 != null) ? $request->jenis_11 : null;
        $borange_serah_kerja->jenis_12 = ($request->jenis_12 != null) ? $request->jenis_12 : null;
        $borange_serah_kerja->jenis_input_12 = $request->jenis_input_12;
        $borange_serah_kerja->jenis_13 = ($request->jenis_13 != null) ? $request->jenis_13 : null;
        $borange_serah_kerja->jenis_14 = ($request->jenis_14 != null) ? $request->jenis_14 : null;
        $borange_serah_kerja->jenis_15 = ($request->jenis_15 != null) ? $request->jenis_15 : null;
        $borange_serah_kerja->jenis_16 = ($request->jenis_16 != null) ? $request->jenis_16 : null;
        $borange_serah_kerja->jenis_17 = ($request->jenis_17 != null) ? $request->jenis_17 : null;
        $borange_serah_kerja->jenis_18 = ($request->jenis_18 != null) ? $request->jenis_18 : null;
        $borange_serah_kerja->jenis_19 = ($request->jenis_19 != null) ? $request->jenis_19 : null;
        $borange_serah_kerja->jenis_20 = ($request->jenis_20 != null) ? $request->jenis_20 : null;
        $borange_serah_kerja->jenis_21 = ($request->jenis_21 != null) ? $request->jenis_21 : null;
        $borange_serah_kerja->jenis_22 = ($request->jenis_22 != null) ? $request->jenis_22 : null;
        $borange_serah_kerja->jenis_input_22 = $request->jenis_input_22;
        $borange_serah_kerja->jenis_23 = ($request->jenis_23 != null) ? $request->jenis_23 : null;
        $borange_serah_kerja->jenis_input_23 = $request->jenis_input_23;
        $borange_serah_kerja->jenis_24 = ($request->jenis_24 != null) ? $request->jenis_24 : null;
        $borange_serah_kerja->jenis_input_24 = $request->jenis_input_24;
        $borange_serah_kerja->jenis_25 = ($request->jenis_25 != null) ? $request->jenis_25 : null;
        $borange_serah_kerja->jenis_input_25 = $request->jenis_input_25;
        $borange_serah_kerja->jenis_26 = ($request->jenis_26 != null) ? $request->jenis_26 : null;
        $borange_serah_kerja->jenis_input_26 = $request->jenis_input_26;
        $borange_serah_kerja->jenis_27 = ($request->jenis_27 != null) ? $request->jenis_27 : null;
        $borange_serah_kerja->jenis_input_27 = $request->jenis_input_27;

        $borange_serah_kerja->status = 'Not-initiated';
        $borange_serah_kerja->save();

        Helper::logSystemActivity('BORANG SERAH KERJA (KULIT BUKU/COVER)', 'BORANG SERAH KERJA (KULIT BUKU/COVER) Store');
        return redirect()->route('borange_serah_kerja')->with('custom_success', 'BORANG SERAH KERJA (KULIT BUKU/COVER) has been Created Successfully !');
    }

    public function edit($id){
        if (!Auth::user()->hasPermissionTo('BORANG SERAH KERJA (KULIT BUKU/COVER) Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $borange_serah_kerja = BorangSerahKerjaKulit::find($id);
        $suppliers = Supplier::select('id', 'name')->get();
        Helper::logSystemActivity('BORANG SERAH KERJA (KULIT BUKU/COVER)', 'BORANG SERAH KERJA (KULIT BUKU/COVER) Update');
        return view('Production.BorangeSerahKerja.edit', compact('borange_serah_kerja', 'suppliers'));
    }

    public function update(Request $request,$id)
    {
        if (!Auth::user()->hasPermissionTo('BORANG SERAH KERJA (KULIT BUKU/COVER) Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $validator = null;

        $validatedData = $request->validate([
            'sale_order' => 'required',
            'date' => 'required',


        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $borange_serah_kerja =  BorangSerahKerjaKulit::find($id);
        $borange_serah_kerja->sale_order_id = $request->sale_order;
        $borange_serah_kerja->date = $request->date;
        $borange_serah_kerja->nama = $request->nama;
        $borange_serah_kerja->qty = $request->qty;
        $borange_serah_kerja->size = $request->size;
        $borange_serah_kerja->po_no = $request->po_no;

        $borange_serah_kerja->siap_1 = $request->siap_1;

        $borange_serah_kerja->date_line = $request->date_line;
        $borange_serah_kerja->created_by = Auth::user()->id;

        $borange_serah_kerja->jenis_1 = ($request->jenis_1 != null) ? $request->jenis_1 : null;
        $borange_serah_kerja->jenis_input_1 = $request->jenis_input_1;
        $borange_serah_kerja->jenis_2 = ($request->jenis_2 != null) ? $request->jenis_2 : null;
        $borange_serah_kerja->jenis_3 = ($request->jenis_3 != null) ? $request->jenis_3 : null;
        $borange_serah_kerja->jenis_4 = ($request->jenis_4 != null) ? $request->jenis_4 : null;
        $borange_serah_kerja->jenis_5 = ($request->jenis_5 != null) ? $request->jenis_5 : null;
        $borange_serah_kerja->jenis_6 = ($request->jenis_6 != null) ? $request->jenis_6 : null;
        $borange_serah_kerja->jenis_7 = ($request->jenis_7 != null) ? $request->jenis_7 : null;
        $borange_serah_kerja->jenis_8 = ($request->jenis_8 != null) ? $request->jenis_8 : null;
        $borange_serah_kerja->jenis_9 = ($request->jenis_9 != null) ? $request->jenis_9 : null;
        $borange_serah_kerja->jenis_input_9 = $request->jenis_input_9;
        $borange_serah_kerja->jenis_10 = ($request->jenis_10 != null) ? $request->jenis_10 : null;
        $borange_serah_kerja->jenis_11 = ($request->jenis_11 != null) ? $request->jenis_11 : null;
        $borange_serah_kerja->jenis_12 = ($request->jenis_12 != null) ? $request->jenis_12 : null;
        $borange_serah_kerja->jenis_input_12 = $request->jenis_input_12;
        $borange_serah_kerja->jenis_13 = ($request->jenis_13 != null) ? $request->jenis_13 : null;
        $borange_serah_kerja->jenis_14 = ($request->jenis_14 != null) ? $request->jenis_14 : null;
        $borange_serah_kerja->jenis_15 = ($request->jenis_15 != null) ? $request->jenis_15 : null;
        $borange_serah_kerja->jenis_16 = ($request->jenis_16 != null) ? $request->jenis_16 : null;
        $borange_serah_kerja->jenis_17 = ($request->jenis_17 != null) ? $request->jenis_17 : null;
        $borange_serah_kerja->jenis_18 = ($request->jenis_18 != null) ? $request->jenis_18 : null;
        $borange_serah_kerja->jenis_19 = ($request->jenis_19 != null) ? $request->jenis_19 : null;
        $borange_serah_kerja->jenis_20 = ($request->jenis_20 != null) ? $request->jenis_20 : null;
        $borange_serah_kerja->jenis_21 = ($request->jenis_21 != null) ? $request->jenis_21 : null;
        $borange_serah_kerja->jenis_22 = ($request->jenis_22 != null) ? $request->jenis_22 : null;
        $borange_serah_kerja->jenis_input_22 = $request->jenis_input_22;
        $borange_serah_kerja->jenis_23 = ($request->jenis_23 != null) ? $request->jenis_23 : null;
        $borange_serah_kerja->jenis_input_23 = $request->jenis_input_23;
        $borange_serah_kerja->jenis_24 = ($request->jenis_24 != null) ? $request->jenis_24 : null;
        $borange_serah_kerja->jenis_input_24 = $request->jenis_input_24;
        $borange_serah_kerja->jenis_25 = ($request->jenis_25 != null) ? $request->jenis_25 : null;
        $borange_serah_kerja->jenis_input_25 = $request->jenis_input_25;
        $borange_serah_kerja->jenis_26 = ($request->jenis_26 != null) ? $request->jenis_26 : null;
        $borange_serah_kerja->jenis_input_26 = $request->jenis_input_26;
        $borange_serah_kerja->jenis_27 = ($request->jenis_27 != null) ? $request->jenis_27 : null;
        $borange_serah_kerja->jenis_input_27 = $request->jenis_input_27;
        $borange_serah_kerja->status = 'Not-initiated';
        $borange_serah_kerja->save();

        Helper::logSystemActivity('BORANG SERAH KERJA (KULIT BUKU/COVER)', 'BORANG SERAH KERJA (KULIT BUKU/COVER) Update');
        return redirect()->route('borange_serah_kerja')->with('custom_success', 'BORANG SERAH KERJA (KULIT BUKU/COVER) has been Updated Successfully !');
    }



    public function delete($id)
    {
        if (!Auth::user()->hasPermissionTo('BORANG SERAH KERJA (KULIT BUKU/COVER) Delete')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $borange_serah_kerja = BorangSerahKerjaKulit::find($id);
        $borange_serah_kerja->delete();
        Helper::logSystemActivity('BORANG SERAH KERJA (KULIT BUKU/COVER)', 'BORANG SERAH KERJA (KULIT BUKU/COVER) Delete');
        return redirect()->route('borange_serah_kerja')->with('custom_success', 'BORANG SERAH KERJA (KULIT BUKU/COVER) has been Deleted Successfully !');
    }

    public function purchasing($id)
    {
        if (!Auth::user()->hasPermissionTo('BORANG SERAH KERJA (KULIT BUKU/COVER) Purchasing')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $borange_serah_kerja = BorangSerahKerjaKulit::find($id);
        $suppliers = Supplier::select('id', 'name')->get();
        Helper::logSystemActivity('BORANG SERAH KERJA (KULIT BUKU/COVER)', 'BORANG SERAH KERJA (KULIT BUKU/COVER) Update');
        return view('Production.BorangeSerahKerja.purchasing', compact('borange_serah_kerja','suppliers'));
    }


    public function transfer($id)
    {
        if (!Auth::user()->hasPermissionTo('BORANG SERAH KERJA (KULIT BUKU/COVER) Transfer')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $borange_serah_kerja = BorangSerahKerjaKulit::find($id);
        $suppliers = Supplier::select('id', 'name')->get();
        Helper::logSystemActivity('BORANG SERAH KERJA (KULIT BUKU/COVER)', 'BORANG SERAH KERJA (KULIT BUKU/COVER) Update');
        return view('Production.BorangeSerahKerja.transfer', compact('borange_serah_kerja','suppliers'));
    }

    public function receive($id)
    {
        if (!Auth::user()->hasPermissionTo('BORANG SERAH KERJA (KULIT BUKU/COVER) Receive')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $borange_serah_kerja = BorangSerahKerjaKulit::find($id);
        $suppliers = Supplier::select('id', 'name')->get();
        Helper::logSystemActivity('BORANG SERAH KERJA (KULIT BUKU/COVER)', 'BORANG SERAH KERJA (KULIT BUKU/COVER) Update');
        return view('Production.BorangeSerahKerja.receive', compact('borange_serah_kerja','suppliers'));
    }

    public function purchasing_approve(Request $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('BORANG SERAH KERJA (KULIT BUKU/COVER) Purchasing')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $borange_serah_kerja = BorangSerahKerjaKulit::find($id);
        $borange_serah_kerja->status = 'purchased';
        $borange_serah_kerja->po_no = $request->po_no;
        $borange_serah_kerja->purchased_by_date = Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y h:i:s A');
        $borange_serah_kerja->purchased_by_user = Auth::user()->user_name;
        $borange_serah_kerja->purchased_by_designation = (Auth::user()->designationss != null) ? Auth::user()->designationss->name : 'not assign';
        $borange_serah_kerja->purchased_by_department = (Auth::user()->departments != null) ? Auth::user()->departments->name : 'not assign';
        $borange_serah_kerja->save();
        Helper::logSystemActivity('BORANG SERAH KERJA (KULIT BUKU/COVER)', 'BORANG SERAH KERJA (KULIT BUKU/COVER) Purchased');
        return redirect()->route('borange_serah_kerja')->with('custom_success', 'CTP has been Successfully Purchased!');
    }

    public function transfer_approve(Request $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('BORANG SERAH KERJA (KULIT BUKU/COVER) Transfer')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $borange_serah_kerja = BorangSerahKerjaKulit::find($id);
        $borange_serah_kerja->status = 'transfered';
        $borange_serah_kerja->transfer_by_date = Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y h:i:s A');
        $borange_serah_kerja->transfer_by_user = Auth::user()->user_name;
        $borange_serah_kerja->transfer_by_designation = (Auth::user()->designationss != null) ? Auth::user()->designationss->name : 'not assign';
        $borange_serah_kerja->transfer_by_department = (Auth::user()->departments != null) ? Auth::user()->departments->name : 'not assign';
        $borange_serah_kerja->save();
        Helper::logSystemActivity('BORANG SERAH KERJA (KULIT BUKU/COVER)', 'BORANG SERAH KERJA (KULIT BUKU/COVER) Transfered');
        return redirect()->route('borange_serah_kerja')->with('custom_success', 'BORANG SERAH KERJA (KULIT BUKU/COVER) has been Successfully Transfered!');
    }

    public function receive_approve(Request $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('BORANG SERAH KERJA (KULIT BUKU/COVER) Receive')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $borange_serah_kerja = BorangSerahKerjaKulit::find($id);
        $borange_serah_kerja->status = 'received';
        $borange_serah_kerja->received_by_date = Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y h:i:s A');
        $borange_serah_kerja->received_by_user = Auth::user()->user_name;
        $borange_serah_kerja->received_by_designation = (Auth::user()->designationss != null) ? Auth::user()->designationss->name : 'not assign';
        $borange_serah_kerja->received_by_department = (Auth::user()->departments != null) ? Auth::user()->departments->name : 'not assign';
        $borange_serah_kerja->save();
        Helper::logSystemActivity('BORANG SERAH KERJA (KULIT BUKU/COVER)', 'BORANG SERAH KERJA (KULIT BUKU/COVER) Received');
        return redirect()->route('borange_serah_kerja')->with('custom_success', 'BORANG SERAH KERJA (KULIT BUKU/COVER) has been Successfully Received!');
    }

    


    public function view($id){
        if (!Auth::user()->hasPermissionTo('BORANG SERAH KERJA (KULIT BUKU/COVER) View')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $borange_serah_kerja = BorangSerahKerjaKulit::find($id);
        $suppliers = Supplier::select('id', 'name')->get();
        Helper::logSystemActivity('BORANG SERAH KERJA (KULIT BUKU/COVER)', 'BORANG SERAH KERJA (KULIT BUKU/COVER) View');
        return view('Production.BorangeSerahKerja.view', compact('borange_serah_kerja', 'suppliers'));

    }

}
