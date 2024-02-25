<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\CoverAndEndpaper;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Cover_endPaperController extends Controller
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

            $query = CoverAndEndpaper::select('id', 'sale_order_id', 'date', 'jenis', 'status')->with('sale_order');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->where('date', 'like', '%' . $searchLower . '%')
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('order_no', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('customer', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('kod_buku', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('description', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhere('jenis', 'like', '%' . $searchLower . '%')
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('sale_order_qty', 'like', '%' . $searchLower . '%');
                        })
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
                    6 => 'jenis',
                    7 => 'sale_order_id',
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
                                    $query->where('customer', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 4:
                                $q->whereHas('sale_order', function ($query) use ($searchLower) {
                                    $query->where('kod_buku', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 5:
                                $q->whereHas('sale_order', function ($query) use ($searchLower) {
                                    $query->where('description', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 6:
                                $q->where('jenis', 'like', '%' . $searchLower . '%');
                                break;
                            case 7:
                                $q->whereHas('sale_order', function ($query) use ($searchLower) {
                                    $query->where('sale_order_qty', 'like', '%' . $searchLower . '%');
                                });
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
                $row->sr_no = $start + $index + 1;
                if ($row->status == 'Not-initiated') {
                    $row->status = '<span class="badge badge-warning">Not-initiated</span>';
                    $actions = '<a class="dropdown-item" href="' . route('cover_end_paper.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('cover_end_paper.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('cover_end_paper.proses', $row->id) . '">Proses</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('cover_end_paper.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'Started') {
                    $row->status = '<span class="badge badge-success">Started</span>';
                    $actions = '<a class="dropdown-item" href="' . route('cover_end_paper.view', $row->id) . '">View</a>
                                <a class="dropdown-item" href="' . route('cover_end_paper.proses', $row->id) . '">Proses</a>
                                <a class="dropdown-item" id="swal-warning" data-delete="' . route('cover_end_paper.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'Paused') {
                    $row->status = '<span class="badge badge-info">Paused</span>';
                    $actions = '<a class="dropdown-item" href="' . route('cover_end_paper.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('cover_end_paper.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('cover_end_paper.proses', $row->id) . '">Proses</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('cover_end_paper.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'Completed') {
                    $row->status = '<span class="badge badge-success">Completed</span>';
                    $actions = '<a class="dropdown-item" href="' . route('cover_end_paper.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('cover_end_paper.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('cover_end_paper.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'Declined') {
                    $row->status = '<span class="badge badge-danger">Declined</span>';
                    $actions = '<a class="dropdown-item" href="' . route('cover_end_paper.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('cover_end_paper.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('cover_end_paper.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'Verified') {
                    $row->status = '<span class="badge badge-success">Verified</span>';
                    $actions = '<a class="dropdown-item" href="' . route('cover_end_paper.view', $row->id) . '">View</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('cover_end_paper.delete', $row->id) . '">Delete</a>';
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

            $query = CoverAndEndpaper::select('id', 'sale_order_id', 'date', 'jenis', 'status')->with('sale_order');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->where('date', 'like', '%' . $searchLower . '%')
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('order_no', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('customer', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('kod_buku', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('description', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhere('jenis', 'like', '%' . $searchLower . '%')
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('sale_order_qty', 'like', '%' . $searchLower . '%');
                        })
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
                6 => 'jenis',
                7 => 'sale_order_id',
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
                $row->sr_no = $start + $index + 1;
                if ($row->status == 'Not-initiated') {
                    $row->status = '<span class="badge badge-warning">Not-initiated</span>';
                    $actions = '<a class="dropdown-item" href="' . route('cover_end_paper.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('cover_end_paper.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('cover_end_paper.proses', $row->id) . '">Proses</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('cover_end_paper.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'Started') {
                    $row->status = '<span class="badge badge-success">Started</span>';
                    $actions = '<a class="dropdown-item" href="' . route('cover_end_paper.view', $row->id) . '">View</a>
                                <a class="dropdown-item" href="' . route('cover_end_paper.proses', $row->id) . '">Proses</a>
                                <a class="dropdown-item" id="swal-warning" data-delete="' . route('cover_end_paper.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'Paused') {
                    $row->status = '<span class="badge badge-info">Paused</span>';
                    $actions = '<a class="dropdown-item" href="' . route('cover_end_paper.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('cover_end_paper.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('cover_end_paper.proses', $row->id) . '">Proses</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('cover_end_paper.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'Completed') {
                    $row->status = '<span class="badge badge-success">Completed</span>';
                    $actions = '<a class="dropdown-item" href="' . route('cover_end_paper.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('cover_end_paper.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('cover_end_paper.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'Declined') {
                    $row->status = '<span class="badge badge-danger">Declined</span>';
                    $actions = '<a class="dropdown-item" href="' . route('cover_end_paper.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('cover_end_paper.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('cover_end_paper.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'Verified') {
                    $row->status = '<span class="badge badge-success">Verified</span>';
                    $actions = '<a class="dropdown-item" href="' . route('cover_end_paper.view', $row->id) . '">View</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('cover_end_paper.delete', $row->id) . '">Delete</a>';
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
            Auth::user()->hasPermissionTo('COVER & ENDPAPER List') ||
            Auth::user()->hasPermissionTo('COVER & ENDPAPER Create') ||
            Auth::user()->hasPermissionTo('COVER & ENDPAPER Update') ||
            Auth::user()->hasPermissionTo('COVER & ENDPAPER View') ||
            Auth::user()->hasPermissionTo('COVER & ENDPAPER Delete') ||
            Auth::user()->hasPermissionTo('COVER & ENDPAPER Proses')
        ) {
            Helper::logSystemActivity('COVER & ENDPAPER', 'COVER & ENDPAPER List');
            return view('Production.Cover_endPaper.index');
        }
        return back()->with('custom_errors', 'You don`t have Right Permission');
    }

    public function create(){
        if (!Auth::user()->hasPermissionTo('COVER & ENDPAPER Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $suppliers = Supplier::select('id', 'name')->get();
        Helper::logSystemActivity('COVER & ENDPAPER', 'COVER & ENDPAPER Create');
        return view('Production.Cover_endPaper.create', compact('suppliers'));
    }

    public function store(Request $request)
    {
        if (!Auth::user()->hasPermissionTo('COVER & ENDPAPER Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        // dd($request);

        $validator = null;

        $validatedData = $request->validate([
            'sale_order' => 'required',
            'date' => 'required',
            'kuantiti_waste' => 'required',
            'mesin' => 'required',
            'jenis' => 'required',
            'print_cut' => 'required',
            'plate' => 'required'
        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $cover_end_paper = new CoverAndEndpaper();
        $cover_end_paper->sale_order_id = $request->sale_order;
        $cover_end_paper->date = $request->date;
        $cover_end_paper->kuantiti_waste = $request->kuantiti_waste;
        $cover_end_paper->jenis = $request->jenis;
            if($cover_end_paper->jenis == "Others"){
            $cover_end_paper->other_product = $request->other_product;
            }else{
            $cover_end_paper->other_product = '';
            }


        $cover_end_paper->kertas = $request->kertas;
        $cover_end_paper->mesin = $request->mesin;
        $cover_end_paper->saiz_potong = $request->saiz_potong;

        $cover_end_paper->arahan_texteditor = $request->input('arahan_texteditor');
        $cover_end_paper->created_by = Auth::user()->id;

        $cover_end_paper->front = $request->front;
        $cover_end_paper->back = $request->back;
        $cover_end_paper->print = $request->print;
        $cover_end_paper->waste_paper = $request->waste_paper;
        $cover_end_paper->print_cut = $request->print_cut;
        if($cover_end_paper->print_cut == "Others"){
        $cover_end_paper->other_input = $request->other_input;
        }else{
        $cover_end_paper->other_input = '';
        }
        $cover_end_paper->last_print = $request->last_print;

        $cover_end_paper->plate = $request->plate;

        $cover_end_paper->finishing_1 = ($request->finishing_1 != null) ? $request->finishing_1 : null;
        $cover_end_paper->finishing_2 = ($request->finishing_2 != null) ? $request->finishing_2 : null;
        $cover_end_paper->finishing_3 = ($request->finishing_3 != null) ? $request->finishing_3 : null;
        $cover_end_paper->finishing_4 = ($request->finishing_4 != null) ? $request->finishing_4 : null;
        $cover_end_paper->finishing_5 = ($request->finishing_5 != null) ? $request->finishing_5 : null;
        $cover_end_paper->finishing_6 = ($request->finishing_6 != null) ? $request->finishing_6 : null;
        $cover_end_paper->finishing_7 = ($request->finishing_7 != null) ? $request->finishing_7 : null;
        $cover_end_paper->finishing_8 = ($request->finishing_8 != null) ? $request->finishing_8 : null;
        $cover_end_paper->finishing_9 = ($request->finishing_9 != null) ? $request->finishing_9 : null;
        $cover_end_paper->finishing_10 = ($request->finishing_10 != null) ? $request->finishing_10 : null;
        $cover_end_paper->finishing_11 = ($request->finishing_11 != null) ? $request->finishing_11 : null;
        $cover_end_paper->finishing_12 = ($request->finishing_12 != null) ? $request->finishing_12 : null;
        $cover_end_paper->finishing_13 = ($request->finishing_13 != null) ? $request->finishing_13 : null;
        $cover_end_paper->finishing_14 = ($request->finishing_14 != null) ? $request->finishing_14 : null;
        $cover_end_paper->finishing_15 = ($request->finishing_15 != null) ? $request->finishing_15 : null;
        $cover_end_paper->finishing_16 = ($request->finishing_16 != null) ? $request->finishing_16 : null;
        $cover_end_paper->finishing_17 = ($request->finishing_17 != null) ? $request->finishing_17 : null;

        $cover_end_paper->finishing_supplier_1 = $request->finishing_supplier_1;
        $cover_end_paper->finishing_supplier_2 = $request->finishing_supplier_2;
        $cover_end_paper->finishing_supplier_3 = $request->finishing_supplier_3;
        $cover_end_paper->finishing_supplier_4 = $request->finishing_supplier_4;
        $cover_end_paper->finishing_supplier_5 = $request->finishing_supplier_5;
        $cover_end_paper->finishing_supplier_6 = $request->finishing_supplier_6;
        $cover_end_paper->finishing_supplier_7 = $request->finishing_supplier_7;
        $cover_end_paper->finishing_supplier_8 = $request->finishing_supplier_8;
        $cover_end_paper->finishing_supplier_9 = $request->finishing_supplier_9;
        $cover_end_paper->finishing_supplier_10 = $request->finishing_supplier_10;
        $cover_end_paper->finishing_supplier_11 = $request->finishing_supplier_11;
        $cover_end_paper->finishing_supplier_12 = $request->finishing_supplier_12;
        $cover_end_paper->finishing_supplier_13 = $request->finishing_supplier_13;
        $cover_end_paper->finishing_supplier_14 = $request->finishing_supplier_14;
        $cover_end_paper->finishing_supplier_15 = $request->finishing_supplier_15;
        $cover_end_paper->finishing_supplier_16 = $request->finishing_supplier_16;
        $cover_end_paper->finishing_supplier_17 = $request->finishing_supplier_17;

        $cover_end_paper->finishing_input_1 = $request->finishing_input_1;
        $cover_end_paper->finishing_input_2 = $request->finishing_input_2;
        $cover_end_paper->finishing_input_3 = $request->finishing_input_3;








        $cover_end_paper->status = 'Not-initiated';
        $cover_end_paper->save();

        Helper::logSystemActivity('COVER & ENDPAPER', 'COVER & ENDPAPER Store');
        return redirect()->route('cover_end_paper')->with('custom_success', 'COVER & ENDPAPER has been Created Successfully !');
    }



    public function update(Request $request,$id)
    {
        if (!Auth::user()->hasPermissionTo('COVER & ENDPAPER Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $validator = null;

        $validatedData = $request->validate([
            'sale_order' => 'required',
            'date' => 'required',
            'kuantiti_waste' => 'required',
            'mesin' => 'required',
            'jenis' => 'required',
            'print_cut' => 'required',
            'plate' => 'required'
        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $cover_end_paper = CoverAndEndpaper::find($id);
        $cover_end_paper->sale_order_id = $request->sale_order;
        $cover_end_paper->date = $request->date;
        $cover_end_paper->kuantiti_waste = $request->kuantiti_waste;
        $cover_end_paper->jenis = $request->jenis;
        $cover_end_paper->kertas = $request->kertas;
        $cover_end_paper->mesin = $request->mesin;
        $cover_end_paper->saiz_potong = $request->saiz_potong;

        $cover_end_paper->arahan_texteditor = $request->arahan_texteditor;
        $cover_end_paper->created_by = Auth::user()->id;

        $cover_end_paper->front = $request->front;
        $cover_end_paper->back = $request->back;
        $cover_end_paper->print = $request->print;
        $cover_end_paper->waste_paper = $request->waste_paper;
        $cover_end_paper->print_cut = $request->print_cut;
        if($cover_end_paper->print_cut == "other"){
        $cover_end_paper->other_input = $request->other_input;
        }else{
        $cover_end_paper->other_input = '';
        }
        $cover_end_paper->last_print = $request->last_print;

        $cover_end_paper->plate = $request->plate;

        $cover_end_paper->finishing_1 = ($request->finishing_1 != null) ? $request->finishing_1 : null;
        $cover_end_paper->finishing_2 = ($request->finishing_2 != null) ? $request->finishing_2 : null;
        $cover_end_paper->finishing_3 = ($request->finishing_3 != null) ? $request->finishing_3 : null;
        $cover_end_paper->finishing_4 = ($request->finishing_4 != null) ? $request->finishing_4 : null;
        $cover_end_paper->finishing_5 = ($request->finishing_5 != null) ? $request->finishing_5 : null;
        $cover_end_paper->finishing_6 = ($request->finishing_6 != null) ? $request->finishing_6 : null;
        $cover_end_paper->finishing_7 = ($request->finishing_7 != null) ? $request->finishing_7 : null;
        $cover_end_paper->finishing_8 = ($request->finishing_8 != null) ? $request->finishing_8 : null;
        $cover_end_paper->finishing_9 = ($request->finishing_9 != null) ? $request->finishing_9 : null;
        $cover_end_paper->finishing_10 = ($request->finishing_10 != null) ? $request->finishing_10 : null;
        $cover_end_paper->finishing_11 = ($request->finishing_11 != null) ? $request->finishing_11 : null;
        $cover_end_paper->finishing_12 = ($request->finishing_12 != null) ? $request->finishing_12 : null;
        $cover_end_paper->finishing_13 = ($request->finishing_13 != null) ? $request->finishing_13 : null;
        $cover_end_paper->finishing_14 = ($request->finishing_14 != null) ? $request->finishing_14 : null;
        $cover_end_paper->finishing_15 = ($request->finishing_15 != null) ? $request->finishing_15 : null;
        $cover_end_paper->finishing_16 = ($request->finishing_16 != null) ? $request->finishing_16 : null;
        $cover_end_paper->finishing_17 = ($request->finishing_17 != null) ? $request->finishing_17 : null;

        $cover_end_paper->finishing_supplier_1 = $request->finishing_supplier_1;
        $cover_end_paper->finishing_supplier_2 = $request->finishing_supplier_2;
        $cover_end_paper->finishing_supplier_3 = $request->finishing_supplier_3;
        $cover_end_paper->finishing_supplier_4 = $request->finishing_supplier_4;
        $cover_end_paper->finishing_supplier_5 = $request->finishing_supplier_5;
        $cover_end_paper->finishing_supplier_6 = $request->finishing_supplier_6;
        $cover_end_paper->finishing_supplier_7 = $request->finishing_supplier_7;
        $cover_end_paper->finishing_supplier_8 = $request->finishing_supplier_8;
        $cover_end_paper->finishing_supplier_9 = $request->finishing_supplier_9;
        $cover_end_paper->finishing_supplier_10 = $request->finishing_supplier_10;
        $cover_end_paper->finishing_supplier_11 = $request->finishing_supplier_11;
        $cover_end_paper->finishing_supplier_12 = $request->finishing_supplier_12;
        $cover_end_paper->finishing_supplier_13 = $request->finishing_supplier_13;
        $cover_end_paper->finishing_supplier_14 = $request->finishing_supplier_14;
        $cover_end_paper->finishing_supplier_15 = $request->finishing_supplier_15;
        $cover_end_paper->finishing_supplier_16 = $request->finishing_supplier_16;
        $cover_end_paper->finishing_supplier_17 = $request->finishing_supplier_17;

        $cover_end_paper->finishing_input_1 = $request->finishing_input_1;
        $cover_end_paper->finishing_input_2 = $request->finishing_input_2;
        $cover_end_paper->finishing_input_3 = $request->finishing_input_3;








        $cover_end_paper->status = 'Not-initiated';
        $cover_end_paper->save();

        Helper::logSystemActivity('COVER & ENDPAPER', 'COVER & ENDPAPER Update');
        return redirect()->route('cover_end_paper')->with('custom_success', 'COVER & ENDPAPER has been Updated Successfully !');
    }

    public function edit($id){
        if (!Auth::user()->hasPermissionTo('COVER & ENDPAPER Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $cover_end_paper = CoverAndEndpaper::find($id);
        $suppliers = Supplier::select('id', 'name')->get();
        Helper::logSystemActivity('COVER & ENDPAPER', 'COVER & ENDPAPER Update');
        return view('Production.Cover_endPaper.edit', compact('cover_end_paper', 'suppliers'));
    }


    public function proses(){
        return view('Production.Cover_endPaper.proses');
    }

    public function view(){
        return view('Production.Cover_endPaper.view');
    }
}
