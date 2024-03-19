<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\BorangSerahKerjaTeks;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BorangeSerahKerja_TeksController extends Controller
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

            $query = BorangSerahKerjaTeks::select('id', 'po_no', 'nama', 'jumlah','sale_order_id', 'status','date','date_line','jenis_text')->with('sale_order',"supplier",'senari_semak');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->where('date', 'like', '%' . $searchLower . '%')
                        ->OrWhere('po_no', 'like', '%' . $searchLower . '%')
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('order_no', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('description', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('supplier', function ($query) use ($searchLower) {
                            $query->where('name', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhere('jumlah', 'like', '%' . $searchLower . '%')
                        ->orWhere('jenis_text', 'like', '%' . $searchLower . '%')
                        ->orWhere('date_line', 'like', '%' . $searchLower . '%')
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
                    2 => 'sale_order_id',
                    3 => 'sale_order_id',
                    4 => 'nama',
                    5 => 'jumlah',
                    6 => 'jenis_text',
                    7 => 'date_line',
                    8 => 'status',
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
                                $q->whereHas('sale_order', function ($query) use ($searchLower) {
                                    $query->where('order_no', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 3:
                                $q->whereHas('sale_order', function ($query) use ($searchLower) {
                                    $query->where('description', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 4:
                                $q->whereHas('supplier', function ($query) use ($searchLower) {
                                    $query->where('name', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 5:

                                $q->where('jumlah', 'like', '%' . $searchLower . '%');

                                break;
                            case 6:
                                $q->where('jenis_text', 'like', '%' . $searchLower . '%');
                                break;
                            case 7:
                                $q->where('date_line', 'like', '%' . $searchLower . '%');
                                break;
                            case 8:
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
                    $actions = '<a class="dropdown-item" href="' . route('borange_serah_kerja_teks.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('borange_serah_kerja_teks.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('borange_serah_kerja_teks.purchasing', $row->id) . '">Purchasing</a>
                    <a class="dropdown-item"  id="swal-warning" data-delete="' . route('borange_serah_kerja_teks.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'purchased') {
                    $row->status = '<span class="badge badge-primary">Purchased</span>';
                    $actions = '<a class="dropdown-item" href="' . route('borange_serah_kerja_teks.transfer', $row->id) . '">Transfer</a>
                                <a class="dropdown-item" href="' . route('borange_serah_kerja_teks.view', $row->id) . '">View</a>
                                <a class="dropdown-item"  id="swal-warning" data-delete="' . route('borange_serah_kerja_teks.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'transfered') {
                    $row->status = '<span class="badge badge-warning">Transfer</span>';
                    $actions = '<a class="dropdown-item" href="' . route('borange_serah_kerja_teks.receive', $row->id) . '">Receive</a>
                                <a class="dropdown-item" href="' . route('borange_serah_kerja_teks.view', $row->id) . '">View</a>
                                <a class="dropdown-item"  id="swal-warning" data-delete="' . route('borange_serah_kerja_teks.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'received') {
                    $row->status = '<span class="badge badge-success">Received</span>';
                    $actions = '<a class="dropdown-item" href="' . route('borange_serah_kerja_teks.view', $row->id) . '">View</a>';
                }
                else if ($row->status == 'declined') {
                    $row->status = '<span class="badge badge-danger">Declined</span>';
                    $actions = '<a class="dropdown-item" href="' . route('borange_serah_kerja_teks.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('borange_serah_kerja_teks.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('borange_serah_kerja_teks.purchasing', $row->id) . '">Purchasing</a>
                    <a class="dropdown-item"  id="swal-warning" data-delete="' . route('borange_serah_kerja_teks.delete', $row->id) . '">Delete</a>';
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

            $query = BorangSerahKerjaTeks::select('id', 'po_no', 'jumlah','nama', 'sale_order_id', 'status','date','jenis_text','date_line')->with('sale_order',"supplier",'senari_semak');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->where('date', 'like', '%' . $searchLower . '%')
                        ->OrWhere('po_no', 'like', '%' . $searchLower . '%')

                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('order_no', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('description', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('supplier', function ($query) use ($searchLower) {
                            $query->where('name', 'like', '%' . $searchLower . '%');
                        })

                        ->orWhere('jumlah', 'like', '%' . $searchLower . '%')
                        ->orWhere('jenis_text', 'like', '%' . $searchLower . '%')
                        ->orWhere('date_line', 'like', '%' . $searchLower . '%')
                        ->orWhere('status', 'like', '%' . $searchLower . '%');

                    // Add more columns as needed
                });
            }

            $sortableColumns = [
                0 => 'date',
                1 => 'po_no',
                2 => 'sale_order_id',
                3 => 'sale_order_id',
                4 => 'nama',
                5 => 'jumlah',
                6 => 'jenis_text',
                7 => 'date_line',
                8 => 'status',
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
                    $actions = '<a class="dropdown-item" href="' . route('borange_serah_kerja_teks.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('borange_serah_kerja_teks.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('borange_serah_kerja_teks.purchasing', $row->id) . '">Purchasing</a>
                    <a class="dropdown-item"  id="swal-warning" data-delete="' . route('borange_serah_kerja_teks.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'purchased') {
                    $row->status = '<span class="badge badge-primary">Purchased</span>';
                    $actions = '<a class="dropdown-item" href="' . route('borange_serah_kerja_teks.transfer', $row->id) . '">Transfer</a>
                                <a class="dropdown-item" href="' . route('borange_serah_kerja_teks.view', $row->id) . '">View</a>
                                <a class="dropdown-item"  id="swal-warning" data-delete="' . route('borange_serah_kerja_teks.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'transfered') {
                    $row->status = '<span class="badge badge-warning">Transfer</span>';
                    $actions = '<a class="dropdown-item" href="' . route('borange_serah_kerja_teks.receive', $row->id) . '">Receive</a>
                                <a class="dropdown-item" href="' . route('borange_serah_kerja_teks.view', $row->id) . '">View</a>
                                <a class="dropdown-item"  id="swal-warning" data-delete="' . route('borange_serah_kerja_teks.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'received') {
                    $row->status = '<span class="badge badge-success">Received</span>';
                    $actions = '<a class="dropdown-item" href="' . route('borange_serah_kerja_teks.view', $row->id) . '">View</a>';
                }
                else if ($row->status == 'declined') {
                    $row->status = '<span class="badge badge-danger">Declined</span>';
                    $actions = '<a class="dropdown-item" href="' . route('borange_serah_kerja_teks.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('borange_serah_kerja_teks.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('borange_serah_kerja_teks.purchasing', $row->id) . '">Purchasing</a>
                    <a class="dropdown-item"  id="swal-warning" data-delete="' . route('borange_serah_kerja_teks.delete', $row->id) . '">Delete</a>';
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
            Auth::user()->hasPermissionTo('BORANG SERAH KERJA (TEKS) List') ||
            Auth::user()->hasPermissionTo('BORANG SERAH KERJA (TEKS) Create') ||
            Auth::user()->hasPermissionTo('BORANG SERAH KERJA (TEKS) Update') ||
            Auth::user()->hasPermissionTo('BORANG SERAH KERJA (TEKS) View') ||
            Auth::user()->hasPermissionTo('BORANG SERAH KERJA (TEKS) Delete') ||
            Auth::user()->hasPermissionTo('BORANG SERAH KERJA (TEKS) Proses')
        ) {
            Helper::logSystemActivity('BORANG SERAH KERJA (TEKS)', 'BORANG SERAH KERJA (TEKS) List');
            return view('Production.BorangeSerahKerja_Teks.index');
        }
        return back()->with('custom_errors', 'You don`t have Right Permission');
    }

    public function create(){
        if (!Auth::user()->hasPermissionTo('BORANG SERAH KERJA (TEKS) Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $suppliers = Supplier::select('id', 'name')->get();
        Helper::logSystemActivity('BORANG SERAH KERJA (TEKS)', 'BORANG SERAH KERJA (TEKS) Create');
        return view('Production.BorangeSerahKerja_Teks.create', compact('suppliers'));
    }


    public function store(Request $request)
    {
        if (!Auth::user()->hasPermissionTo('BORANG SERAH KERJA (TEKS) Create')) {
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


        if($request->jenis != null){
            $userText = implode(', ', $request->jenis);
        }


        $borange_serah_kerja = new BorangSerahKerjaTeks();
        $borange_serah_kerja->sale_order_id = $request->sale_order;
        $borange_serah_kerja->date = $request->date;
        $borange_serah_kerja->nama = $request->nama;
        $borange_serah_kerja->po_no = $request->po_no;
        if($request->jenis != null){
        $borange_serah_kerja->jenis = json_encode($request->jenis);
        $borange_serah_kerja->jenis_text = $userText;
        }else{
            $borange_serah_kerja->jenis = '';
            $borange_serah_kerja->jenis_text = '';
        }
        $borange_serah_kerja->jumlah = $request->jumlah;

        $borange_serah_kerja->date_line = $request->date_line;
        $borange_serah_kerja->Qty_slap_binding = $request->Qty_slap_binding;
        $borange_serah_kerja->waste_binding = $request->waste_binding;
        $borange_serah_kerja->created_by = Auth::user()->id;

        $borange_serah_kerja->jenis_1 = ($request->jenis_1 != null) ? $request->jenis_1 : null;
        $borange_serah_kerja->jenis_input_1 = $request->jenis_input_1;
        $borange_serah_kerja->jenis_2 = ($request->jenis_2 != null) ? $request->jenis_2 : null;
        $borange_serah_kerja->jenis_3 = ($request->jenis_3 != null) ? $request->jenis_3 : null;
        $borange_serah_kerja->jenis_4 = ($request->jenis_4 != null) ? $request->jenis_4 : null;
        $borange_serah_kerja->jenis_5 = ($request->jenis_5 != null) ? $request->jenis_5 : null;
        $borange_serah_kerja->jenis_input_5 = $request->jenis_input_5;
        $borange_serah_kerja->jenis_7 = ($request->jenis_7 != null) ? $request->jenis_7 : null;
        $borange_serah_kerja->jenis_8 = ($request->jenis_8 != null) ? $request->jenis_8 : null;
        $borange_serah_kerja->jenis_9 = ($request->jenis_9 != null) ? $request->jenis_9 : null;
        $borange_serah_kerja->jenis_10 = ($request->jenis_10 != null) ? $request->jenis_10 : null;
        $borange_serah_kerja->jenis_input_10 = $request->jenis_input_10;
        $borange_serah_kerja->jenis_11 = ($request->jenis_11 != null) ? $request->jenis_11 : null;
        $borange_serah_kerja->jenis_12 = ($request->jenis_12 != null) ? $request->jenis_12 : null;
        $borange_serah_kerja->jenis_13 = ($request->jenis_13 != null) ? $request->jenis_13 : null;
        $borange_serah_kerja->jenis_14 = ($request->jenis_14 != null) ? $request->jenis_14 : null;
        $borange_serah_kerja->jenis_input_14 = $request->jenis_input_14;
        $borange_serah_kerja->jenis_15 = ($request->jenis_15 != null) ? $request->jenis_15 : null;
        $borange_serah_kerja->jenis_16 = ($request->jenis_16 != null) ? $request->jenis_16 : null;
        $borange_serah_kerja->jenis_17 = ($request->jenis_17 != null) ? $request->jenis_17 : null;
        $borange_serah_kerja->jenis_input_17 = $request->jenis_input_17;
        $borange_serah_kerja->jenis_18 = ($request->jenis_18 != null) ? $request->jenis_18 : null;
        $borange_serah_kerja->jenis_input_18 = $request->jenis_input_18;
        $borange_serah_kerja->jenis_19 = ($request->jenis_19 != null) ? $request->jenis_19 : null;
        $borange_serah_kerja->jenis_input_19 = $request->jenis_input_19;
        $borange_serah_kerja->jenis_20 = ($request->jenis_20 != null) ? $request->jenis_20 : null;
        $borange_serah_kerja->jenis_input_20 = $request->jenis_input_20;
        $borange_serah_kerja->jenis_21 = ($request->jenis_21 != null) ? $request->jenis_21 : null;
        $borange_serah_kerja->jenis_input_21 = $request->jenis_input_21;



        $borange_serah_kerja->status = 'Not-initiated';
        $borange_serah_kerja->save();

        Helper::logSystemActivity('BORANG SERAH KERJA (TEKS)', 'BORANG SERAH KERJA (TEKS) Store');
        return redirect()->route('borange_serah_kerja_teks')->with('custom_success', 'BORANG SERAH KERJA (TEKS) has been Created Successfully !');
    }

    public function update(Request $request,$id)
    {
        if (!Auth::user()->hasPermissionTo('BORANG SERAH KERJA (TEKS) Create')) {
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
        if($request->jenis != null){
            $userText = implode(', ', $request->jenis);
        }

        $borange_serah_kerja = BorangSerahKerjaTeks::find($id);
        $borange_serah_kerja->sale_order_id = $request->sale_order;
        $borange_serah_kerja->date = $request->date;
        $borange_serah_kerja->nama = $request->nama;
        $borange_serah_kerja->po_no = $request->po_no;
        $borange_serah_kerja->Qty_slap_binding = $request->Qty_slap_binding;
        $borange_serah_kerja->waste_binding = $request->waste_binding;
        if($request->jenis != null){
            $borange_serah_kerja->jenis = json_encode($request->jenis);
            $borange_serah_kerja->jenis_text = $userText;
            }else{
                $borange_serah_kerja->jenis = '';
                $borange_serah_kerja->jenis_text = '';
            }
        $borange_serah_kerja->jumlah = $request->jumlah;
        $borange_serah_kerja->date_line = $request->date_line;
        $borange_serah_kerja->created_by = Auth::user()->id;

        $borange_serah_kerja->jenis_1 = ($request->jenis_1 != null) ? $request->jenis_1 : null;
        $borange_serah_kerja->jenis_input_1 = $request->jenis_input_1;
        $borange_serah_kerja->jenis_2 = ($request->jenis_2 != null) ? $request->jenis_2 : null;
        $borange_serah_kerja->jenis_3 = ($request->jenis_3 != null) ? $request->jenis_3 : null;
        $borange_serah_kerja->jenis_4 = ($request->jenis_4 != null) ? $request->jenis_4 : null;
        $borange_serah_kerja->jenis_5 = ($request->jenis_5 != null) ? $request->jenis_5 : null;
        $borange_serah_kerja->jenis_input_5 = $request->jenis_input_5;
        $borange_serah_kerja->jenis_7 = ($request->jenis_7 != null) ? $request->jenis_7 : null;
        $borange_serah_kerja->jenis_8 = ($request->jenis_8 != null) ? $request->jenis_8 : null;
        $borange_serah_kerja->jenis_9 = ($request->jenis_9 != null) ? $request->jenis_9 : null;
        $borange_serah_kerja->jenis_10 = ($request->jenis_10 != null) ? $request->jenis_10 : null;
        $borange_serah_kerja->jenis_input_10 = $request->jenis_input_10;
        $borange_serah_kerja->jenis_11 = ($request->jenis_11 != null) ? $request->jenis_11 : null;
        $borange_serah_kerja->jenis_12 = ($request->jenis_12 != null) ? $request->jenis_12 : null;
        $borange_serah_kerja->jenis_13 = ($request->jenis_13 != null) ? $request->jenis_13 : null;
        $borange_serah_kerja->jenis_14 = ($request->jenis_14 != null) ? $request->jenis_14 : null;
        $borange_serah_kerja->jenis_input_14 = $request->jenis_input_14;
        $borange_serah_kerja->jenis_15 = ($request->jenis_15 != null) ? $request->jenis_15 : null;
        $borange_serah_kerja->jenis_16 = ($request->jenis_16 != null) ? $request->jenis_16 : null;
        $borange_serah_kerja->jenis_17 = ($request->jenis_17 != null) ? $request->jenis_17 : null;
        $borange_serah_kerja->jenis_input_17 = $request->jenis_input_17;
        $borange_serah_kerja->jenis_18 = ($request->jenis_18 != null) ? $request->jenis_18 : null;
        $borange_serah_kerja->jenis_input_18 = $request->jenis_input_18;
        $borange_serah_kerja->jenis_19 = ($request->jenis_19 != null) ? $request->jenis_19 : null;
        $borange_serah_kerja->jenis_input_19 = $request->jenis_input_19;
        $borange_serah_kerja->jenis_20 = ($request->jenis_20 != null) ? $request->jenis_20 : null;
        $borange_serah_kerja->jenis_input_20 = $request->jenis_input_20;
        $borange_serah_kerja->jenis_21 = ($request->jenis_21 != null) ? $request->jenis_21 : null;
        $borange_serah_kerja->jenis_input_21 = $request->jenis_input_21;


        $borange_serah_kerja->status = 'Not-initiated';
        $borange_serah_kerja->save();

        Helper::logSystemActivity('BORANG SERAH KERJA (TEKS)', 'BORANG SERAH KERJA (TEKS) Store');
        return redirect()->route('borange_serah_kerja_teks')->with('custom_success', 'BORANG SERAH KERJA (TEKS) has been Created Successfully !');
    }

    public function purchasing($id)
    {
        if (!Auth::user()->hasPermissionTo('BORANG SERAH KERJA (TEKS) Purchasing')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $borange_serah_kerja_teks = BorangSerahKerjaTeks::find($id);
        $suppliers = Supplier::select('id', 'name')->get();
        Helper::logSystemActivity('BORANG SERAH KERJA (TEKS)', 'BORANG SERAH KERJA (TEKS) Update');
        return view('Production.BorangeSerahKerja_Teks.purchasing', compact('borange_serah_kerja_teks','suppliers'));
    }


    public function transfer($id)
    {
        if (!Auth::user()->hasPermissionTo('BORANG SERAH KERJA (TEKS) Transfer')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $borange_serah_kerja_teks = BorangSerahKerjaTeks::find($id);
        $suppliers = Supplier::select('id', 'name')->get();
        Helper::logSystemActivity('BORANG SERAH KERJA (TEKS)', 'BORANG SERAH KERJA (TEKS) Update');
        return view('Production.BorangeSerahKerja_Teks.transfer', compact('borange_serah_kerja_teks','suppliers'));
    }

    public function receive($id)
    {
        if (!Auth::user()->hasPermissionTo('BORANG SERAH KERJA (TEKS) Receive')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $borange_serah_kerja_teks = BorangSerahKerjaTeks::find($id);
        $suppliers = Supplier::select('id', 'name')->get();
        Helper::logSystemActivity('BORANG SERAH KERJA (TEKS)', 'BORANG SERAH KERJA (TEKS) Update');
        return view('Production.BorangeSerahKerja_Teks.receive', compact('borange_serah_kerja_teks','suppliers'));
    }

    public function purchasing_approve(Request $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('BORANG SERAH KERJA (TEKS) Purchasing')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $borange_serah_kerja_teks = BorangSerahKerjaTeks::find($id);
        $borange_serah_kerja_teks->status = 'purchased';
        $borange_serah_kerja_teks->po_no = $request->po_no;
        $borange_serah_kerja_teks->purchased_by_date = Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y h:i:s A');
        $borange_serah_kerja_teks->purchased_by_user = Auth::user()->user_name;
        $borange_serah_kerja_teks->purchased_by_designation = (Auth::user()->designationss != null) ? Auth::user()->designationss->name : 'not assign';
        $borange_serah_kerja_teks->purchased_by_department = (Auth::user()->departments != null) ? Auth::user()->departments->name : 'not assign';
        $borange_serah_kerja_teks->save();
        Helper::logSystemActivity('BORANG SERAH KERJA (TEKS)', 'BORANG SERAH KERJA (TEKS) Purchased');
        return redirect()->route('borange_serah_kerja_teks')->with('custom_success', 'CTP has been Successfully Purchased!');
    }

    public function transfer_approve(Request $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('BORANG SERAH KERJA (TEKS) Transfer')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $borange_serah_kerja_teks = BorangSerahKerjaTeks::find($id);
        $borange_serah_kerja_teks->status = 'transfered';
        $borange_serah_kerja_teks->transfer_by_date = Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y h:i:s A');
        $borange_serah_kerja_teks->transfer_by_user = Auth::user()->user_name;
        $borange_serah_kerja_teks->transfer_by_designation = (Auth::user()->designationss != null) ? Auth::user()->designationss->name : 'not assign';
        $borange_serah_kerja_teks->transfer_by_department = (Auth::user()->departments != null) ? Auth::user()->departments->name : 'not assign';
        $borange_serah_kerja_teks->save();
        Helper::logSystemActivity('BORANG SERAH KERJA (TEKS)', 'BORANG SERAH KERJA (TEKS) Transfered');
        return redirect()->route('borange_serah_kerja_teks')->with('custom_success', 'BORANG SERAH KERJA (TEKS) has been Successfully Transfered!');
    }

    public function receive_approve(Request $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('BORANG SERAH KERJA (TEKS) Receive')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $borange_serah_kerja_teks = BorangSerahKerjaTeks::find($id);
        $borange_serah_kerja_teks->status = 'received';
        $borange_serah_kerja_teks->received_by_date = Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y h:i:s A');
        $borange_serah_kerja_teks->received_by_user = Auth::user()->user_name;
        $borange_serah_kerja_teks->received_by_designation = (Auth::user()->designationss != null) ? Auth::user()->designationss->name : 'not assign';
        $borange_serah_kerja_teks->received_by_department = (Auth::user()->departments != null) ? Auth::user()->departments->name : 'not assign';
        $borange_serah_kerja_teks->save();
        Helper::logSystemActivity('BORANG SERAH KERJA (TEKS)', 'BORANG SERAH KERJA (TEKS) Received');
        return redirect()->route('borange_serah_kerja_teks')->with('custom_success', 'BORANG SERAH KERJA (TEKS) has been Successfully Received!');
    }







    public function edit($id){
        if (!Auth::user()->hasPermissionTo('BORANG SERAH KERJA (TEKS) Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $borange_serah_kerja_teks = BorangSerahKerjaTeks::find($id);
        // dd($borange_serah_kerja_teks);
        $suppliers = Supplier::select('id', 'name')->get();
        Helper::logSystemActivity('BORANG SERAH KERJA (TEKS)', 'BORANG SERAH KERJA (TEKS) Update');
        return view('Production.BorangeSerahKerja_Teks.edit', compact('borange_serah_kerja_teks', 'suppliers'));
    }

    public function delete($id)
    {
        if (!Auth::user()->hasPermissionTo('BORANG SERAH KERJA (TEKS) Delete')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $borange_serah_kerja_teks = BorangSerahKerjaTeks::find($id);
        $borange_serah_kerja_teks->delete();
        Helper::logSystemActivity('BORANG SERAH KERJA (TEKS)', 'BORANG SERAH KERJA (TEKS) Delete');
        return redirect()->route('borange_serah_kerja_teks')->with('custom_success', 'BORANG SERAH KERJA (TEKS) has been Deleted Successfully !');
    }

    public function view($id)
    {
        if (!Auth::user()->hasPermissionTo('BORANG SERAH KERJA (TEKS) View')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $borange_serah_kerja_teks = BorangSerahKerjaTeks::find($id);
        // dd($borange_serah_kerja_teks);
        $suppliers = Supplier::select('id', 'name')->get();
        Helper::logSystemActivity('BORANG SERAH KERJA (TEKS)', 'BORANG SERAH KERJA (TEKS) View');
        return view('Production.BorangeSerahKerja_Teks.view', compact('borange_serah_kerja_teks', 'suppliers'));
    }


}
