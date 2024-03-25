<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Text;
use App\Models\TextDetail;
use App\Models\PrintingProcess;
use App\Models\Supplier;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TextController extends Controller
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

            $query = Text::select('id', 'sale_order_id', 'date','status', 'kuantiti_waste')->with('sale_order', 'senari_semak');

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
                    6 => 'sale_order_id',
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
                                $q->whereHas('sale_order', function ($query) use ($searchLower) {
                                    $query->where('sale_order_qty', 'like', '%' . $searchLower . '%');
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
                // dd($row->status);
                if ($row->status == 'In-Progress') {
                    $row->status = '<span class="badge badge-warning">In-Progress</span>';
                    $actions = '<a class="dropdown-item" href="' . route('text.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('text.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('text.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'Completed') {
                    $row->status = '<span class="badge badge-success">Completed</span>';
                    $actions = '<a class="dropdown-item" href="' . route('text.view', $row->id) . '">View</a>';
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

            $query = Text::select('id', 'sale_order_id', 'date','status', 'kuantiti_waste')->with('sale_order', 'senari_semak');

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
                6 => 'sale_order_id',
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
                // dd($row->status);
                if ($row->status == 'In-Progress') {
                    $row->status = '<span class="badge badge-warning">In-Progress</span>';
                    $actions = '<a class="dropdown-item" href="' . route('text.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('text.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('text.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'Completed') {
                    $row->status = '<span class="badge badge-success">Completed</span>';
                    $actions = '<a class="dropdown-item" href="' . route('text.view', $row->id) . '">View</a>';
                }

                $row->action = '<div class="dropdown dropdownwidth">
                                <button aria-expanded="false" aria-haspopup="true" class="btn  btn-primary"
                                data-toggle="dropdown" id="dropdownMenuButton" type="button" >Action <i class="fas fa-caret-down ml-1"></i></button>
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
            Auth::user()->hasPermissionTo('TEXT List') ||
            Auth::user()->hasPermissionTo('TEXT Create') ||
            Auth::user()->hasPermissionTo('TEXT Update') ||
            Auth::user()->hasPermissionTo('TEXT View') ||
            Auth::user()->hasPermissionTo('TEXT Delete')
        ) {
            Helper::logSystemActivity('TEXT', 'TEXT List');
            return view('Production.Text.index');
        }
        return back()->with('custom_errors', 'You don`t have Right Permission');
    }

    public function create(){
        if (!Auth::user()->hasPermissionTo('TEXT Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $suppliers = Supplier::select('id', 'name')->get();
        Helper::logSystemActivity('TEXT', 'TEXT Create');
        return view('Production.Text.create',compact('suppliers'));
    }

    public function store(Request $request)
    {
        if (!Auth::user()->hasPermissionTo('TEXT Create')) {
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

        $text = new Text();
        $text->sale_order_id = $request->sale_order;
        $text->date = $request->date;
        $text->kuantiti_waste = $request->kuantiti_waste;
        $text->kertas = $request->kertas;
        $text->saiz_potong = $request->saiz_potong;
        $text->plate = $request->plate;
        $text->print = $request->print;
        $text->waste_paper = $request->waste_paper;
        $text->last_print = $request->last_print;
        $text->seksyen_no = $request->seksyen_no;
        $text->arahan_kerja = $request->arahan_kerja;
        $text->catatan = $request->catatan;

        $text->binding_1 = ($request->binding_1 != null) ? $request->binding_1_val : null;
        $text->binding_2 = ($request->binding_2 != null) ? $request->binding_2_val : null;
        $text->binding_3 = ($request->binding_3 != null) ? $request->binding_3_val : null;
        $text->binding_4 = ($request->binding_4 != null) ? $request->binding_4_val : null;
        $text->binding_5 = ($request->binding_5 != null) ? $request->binding_5_val : null;
        $text->binding_6 = ($request->binding_6 != null) ? $request->binding_6_val : null;
        $text->binding_7 = ($request->binding_7 != null) ? $request->binding_7_val : null;
        $text->binding_8 = ($request->binding_8 != null) ? $request->binding_8_val : null;
        $text->binding_9 = ($request->binding_9 != null) ? $request->binding_9_val : null;
        $text->binding_10 = ($request->binding_9 != null) ? $request->binding_10_val : null;
        $text->binding_11 = ($request->binding_11 != null) ? $request->binding_11_val : null;
        $text->binding_12 = ($request->binding_11 != null) ? $request->binding_12_val : null;
        $text->binding_13 = ($request->binding_13 != null) ? $request->binding_13_val : null;
        $text->binding_14 = ($request->binding_13 != null) ? $request->binding_14_val : null;
        $text->binding_15 = ($request->binding_15 != null) ? $request->binding_15_val : null;
        $text->binding_16 = ($request->binding_15 != null) ? $request->binding_16_val : null;
        $text->binding_17 = ($request->binding_17 != null) ? $request->binding_17_val : null;
        $text->binding_18 = ($request->binding_17 != null) ? $request->binding_18_val : null;
        $text->binding_19 = ($request->binding_19 != null) ? $request->binding_19_val : null;
        $text->binding_20 = ($request->binding_19 != null) ? $request->binding_20_val : null;
        $text->status = 'In-Progress';
        $text->created_by = Auth::user()->id;
        $text->save();

        $uniqueMachines = [];

        if(!isset($request->parent_action)){
            for ($index = 1; $index <= $request->seksyen_no; $index++) {
                $detail = new TextDetail();
                $detail->text_id = $text->id;
                $detail->seksyen_no = $index;
                $detail->date = $request->parent_section_date;
                $detail->machine = $request->parent_section_machine;
                $detail->side = $request->parent_section_side;
                $detail->last_print = $request->parent_section_last_print;
                $detail->kuantiti_waste = $request->parent_section_kuantiti_waste;
                $detail->save();
                if (!in_array($request->parent_section_machine, $uniqueMachines)) {
                    $uniqueMachines[] = $request->parent_section_machine;
                }
            }
        }else{
            if(is_array($request->section) ){
                foreach($request->section as $key => $value){
                    $detail = new TextDetail();
                    $detail->text_id = $text->id;
                    $detail->seksyen_no = $key;
                    $detail->date = $value['date'];
                    $detail->machine = $value['machine'] ?? '';
                    $detail->side = $value['side']  ?? '';
                    $detail->last_print = $value['last_print'];
                    $detail->kuantiti_waste = $value['kuantiti_waste'];
                    $detail->save();
                    if (!in_array($value['machine'] ?? '', $uniqueMachines)) {
                        $uniqueMachines[] = $value['machine'] ?? '';
                    }
                }
            }
        }

        foreach($uniqueMachines as $key => $value){
            $printing = new PrintingProcess();
            $printing->text_id = $text->id;
            $printing->machine = $value;
            $printing->status = 'Not-initiated';
            $printing->save();
        }

        Helper::logSystemActivity('TEXT', 'TEXT Store');
        return redirect()->route('text')->with('custom_success', 'TEXT has been Created Successfully !');
    }


    public function edit($id){
        if (!Auth::user()->hasPermissionTo('TEXT Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $text = Text::find($id);
        $details = TextDetail::where('text_id',  '=', $id)->get();
        $suppliers = Supplier::select('id', 'name')->get();
        Helper::logSystemActivity('TEXT', 'TEXT Update');
        return view('Production.Text.edit',compact('text', 'details','suppliers'));
    }

    public function view($id){
        if (!Auth::user()->hasPermissionTo('TEXT View')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $text = Text::find($id);
        $suppliers = Supplier::select('id', 'name')->get();
        $details = TextDetail::where('text_id',  '=', $id)->get();
        Helper::logSystemActivity('TEXT', 'TEXT View');
        return view('Production.Text.view', compact('text', 'details','suppliers'));
    }


    public function print($id){
        $text = Text::find($id);
        $suppliers = Supplier::select('id', 'name')->get();
        $details = TextDetail::where('text_id',  '=', $id)->get();


        $pdf = PDF::loadView('Production.Text.pdf', [
            'text' => $text,
            'suppliers' => $suppliers,
            'details' => $details,
        ]);
        return $pdf->stream('Production.Text.pdf');
    }


    public function update(Request $request,$id)
    {
        if (!Auth::user()->hasPermissionTo('TEXT Update')) {
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

        $text = Text::find($id);
        $text->sale_order_id = $request->sale_order;
        $text->date = $request->date;
        $text->kuantiti_waste = $request->kuantiti_waste;
        $text->kertas = $request->kertas;
        $text->saiz_potong = $request->saiz_potong;
        $text->plate = $request->plate;
        $text->print = $request->print;
        $text->waste_paper = $request->waste_paper;
        $text->last_print = $request->last_print;
        $text->seksyen_no = $request->seksyen_no;
        $text->arahan_kerja = $request->arahan_kerja;
        $text->catatan = $request->catatan;

        $text->binding_1 = ($request->binding_1 != null) ? $request->binding_1_val : null;
        $text->binding_2 = ($request->binding_2 != null) ? $request->binding_2_val : null;
        $text->binding_3 = ($request->binding_3 != null) ? $request->binding_3_val : null;
        $text->binding_4 = ($request->binding_4 != null) ? $request->binding_4_val : null;
        $text->binding_5 = ($request->binding_5 != null) ? $request->binding_5_val : null;
        $text->binding_6 = ($request->binding_6 != null) ? $request->binding_6_val : null;
        $text->binding_7 = ($request->binding_7 != null) ? $request->binding_7_val : null;
        $text->binding_8 = ($request->binding_8 != null) ? $request->binding_8_val : null;
        $text->binding_9 = ($request->binding_9 != null) ? $request->binding_9_val : null;
        $text->binding_10 = ($request->binding_9 != null) ? $request->binding_10_val : null;
        $text->binding_10 = ($request->binding_9 != null) ? $request->binding_10_val : null;
        $text->binding_11 = ($request->binding_11 != null) ? $request->binding_11_val : null;
        $text->binding_12 = ($request->binding_11 != null) ? $request->binding_12_val : null;
        $text->binding_13 = ($request->binding_13 != null) ? $request->binding_13_val : null;
        $text->binding_14 = ($request->binding_13 != null) ? $request->binding_14_val : null;
        $text->binding_15 = ($request->binding_15 != null) ? $request->binding_15_val : null;
        $text->binding_16 = ($request->binding_15 != null) ? $request->binding_16_val : null;
        $text->binding_17 = ($request->binding_17 != null) ? $request->binding_17_val : null;
        $text->binding_18 = ($request->binding_17 != null) ? $request->binding_18_val : null;
        $text->binding_19 = ($request->binding_19 != null) ? $request->binding_19_val : null;
        $text->binding_20 = ($request->binding_19 != null) ? $request->binding_20_val : null;

        $text->status = 'In-Progress';
        $text->created_by = Auth::user()->id;
        $text->save();

        TextDetail::where('text_id', '=', $id)->delete();

        $uniqueMachines = [];

        if(!isset($request->parent_action)){
            for ($index = 1; $index <= $request->seksyen_no; $index++) {
                $detail = new TextDetail();
                $detail->text_id = $text->id;
                $detail->seksyen_no = $index;
                $detail->date = $request->parent_section_date;
                $detail->machine = $request->parent_section_machine;
                $detail->side = $request->parent_section_side;
                $detail->last_print = $request->parent_section_last_print;
                $detail->kuantiti_waste = $request->parent_section_kuantiti_waste;
                $detail->save();
                if (!in_array($request->parent_section_machine, $uniqueMachines)) {
                    $uniqueMachines[] = $request->parent_section_machine;
                }
            }
        }else{
            if(is_array($request->section) ){
                foreach($request->section as $key => $value){
                    $detail = new TextDetail();
                    $detail->text_id = $text->id;
                    $detail->seksyen_no = $key;
                    $detail->date = $value['date'];
                    $detail->machine = $value['machine'] ?? '';
                    $detail->side = $value['side'] ?? '';
                    $detail->last_print = $value['last_print'];
                    $detail->kuantiti_waste = $value['kuantiti_waste'];
                    $detail->save();
                    if (!in_array($value['machine'], $uniqueMachines)) {
                        $uniqueMachines[] = $value['machine'];
                    }
                }
            }
        }

        PrintingProcess::where('text_id', '=', $id)->delete();

        foreach($uniqueMachines as $key => $value){
            $printing = new PrintingProcess();
            $printing->text_id = $text->id;
            $printing->machine = $value;
            $printing->status = 'Not-initiated';
            $printing->save();
        }

        Helper::logSystemActivity('TEXT', 'TEXT update');
        return redirect()->route('text')->with('custom_success', 'TEXT has been Updated Successfully !');
    }

    public function delete($id){
        if (!Auth::user()->hasPermissionTo('TEXT Delete')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $text = Text::find($id);
        TextDetail::where('text_id', $id)->delete();
        PrintingProcess::where('text_id', $id)->delete();
        $text->delete();
        Helper::logSystemActivity('TEXT', 'TEXT Delete');
        return redirect()->route('text')->with('custom_success', 'TEXT has been Successfully Deleted!');
    }

}
