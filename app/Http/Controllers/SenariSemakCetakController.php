<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\SenariSemakCetak;
use App\Models\SenariSemakCetakBahagiaA;
use App\Models\SenariSemakCetakBahagiaC;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SenariSemakCetakController extends Controller
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

            $query = SenariSemakCetak::select('id', 'sale_order_id', 'date', 'created_by', 'status')->with('user', 'sale_order');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->where('date', 'like', '%' . $searchLower . '%')
                        ->orWhereHas('user', function ($query) use ($searchLower) {
                            $query->where('user_name', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('order_no', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('description', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('kod_buku', 'like', '%' . $searchLower . '%');
                        })
                        ->where('status', 'like', '%' . $searchLower . '%');
                    // Add more columns as needed
                });
            }
            // Determine the column to sort by
            $results = null;

            if (!empty($columnsData)) {
                $sortableColumns = [
                    1 => 'sale_order_id',
                    2 => 'sale_order_id',
                    3 => 'sale_order_id',
                    4 => 'date',
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
                                $q->whereHas('sale_order', function ($query) use ($searchLower) {
                                    $query->where('order_no', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 2:
                                $q->whereHas('sale_order', function ($query) use ($searchLower) {
                                    $query->where('description', 'like', '%' . $searchLower . '%');
                                });;
                                break;
                            case 3:
                                $q->whereHas('sale_order', function ($query) use ($searchLower) {
                                    $query->where('kod_buku', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 4:
                                $q->where('date', 'like', '%' . $searchLower . '%');
                                break;
                            case 5:
                                $q->whereHas('user', function ($query) use ($searchLower) {
                                    $query->where('full_name', 'like', '%' . $searchLower . '%');
                                });;
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
                if ($row->status == 'checked') {
                    $row->status = '<span class="badge badge-warning">Checked</span>';
                    $actions = '<a class="dropdown-item" href="' . route('senari_semak_cetak.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('senari_semak_cetak.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('senari_semak_cetak.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item" href="' . route('senari_semak_cetak.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'verified') {
                    $row->status = '<span class="badge badge-success">Verified</span>';
                    $actions = '<a class="dropdown-item" href="' . route('senari_semak_cetak.view', $row->id) . '">View</a>
                                <a class="dropdown-item" href="' . route('senari_semak_cetak.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'declined') {
                    $row->status = '<span class="badge badge-danger">Declined</span>';
                    $actions = '<a class="dropdown-item" href="' . route('senari_semak_cetak.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('senari_semak_cetak.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('senari_semak_cetak.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item" href="' . route('senari_semak_cetak.delete', $row->id) . '">Delete</a>';
                }

                $row->action = '<div class="dropdown">
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

            $query = SenariSemakCetak::select('id', 'sale_order_id', 'date', 'created_by', 'status')->with('user', 'sale_order');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                    ->where('date', 'like', '%' . $searchLower . '%')
                    ->orWhereHas('user', function ($query) use ($searchLower) {
                        $query->where('user_name', 'like', '%' . $searchLower . '%');
                    })
                    ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                        $query->where('order_no', 'like', '%' . $searchLower . '%');
                    })
                    ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                        $query->where('description', 'like', '%' . $searchLower . '%');
                    })
                    ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                        $query->where('kod_buku', 'like', '%' . $searchLower . '%');
                    })
                    ->where('status', 'like', '%' . $searchLower . '%');
                    // Add more columns as needed
                });
            }

            $sortableColumns = [
                1 => 'sale_order_id',
                2 => 'sale_order_id',
                3 => 'sale_order_id',
                4 => 'date',
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
                if ($row->status == 'checked') {
                    $row->status = '<span class="badge badge-warning">Checked</span>';
                    $actions = '<a class="dropdown-item" href="' . route('senari_semak_cetak.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('senari_semak_cetak.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('senari_semak_cetak.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item" href="' . route('senari_semak_cetak.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'verified') {
                    $row->status = '<span class="badge badge-success">Verified</span>';
                    $actions = '<a class="dropdown-item" href="' . route('senari_semak_cetak.view', $row->id) . '">View</a>
                                <a class="dropdown-item" href="' . route('senari_semak_cetak.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'declined') {
                    $row->status = '<span class="badge badge-danger">Declined</span>';
                    $actions = '<a class="dropdown-item" href="' . route('senari_semak_cetak.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('senari_semak_cetak.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('senari_semak_cetak.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item" href="' . route('senari_semak_cetak.delete', $row->id) . '">Delete</a>';
                }

                $row->action = '<div class="dropdown">
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
        // if (
        //     Auth::user()->hasPermissionTo('Senarai Semak Pra Cetak List') ||
        //     Auth::user()->hasPermissionTo('Senarai Semak Pra Cetak Create') ||
        //     Auth::user()->hasPermissionTo('Senarai Semak Pra Cetak Update') ||
        //     Auth::user()->hasPermissionTo('Senarai Semak Pra Cetak View') ||
        //     Auth::user()->hasPermissionTo('Senarai Semak Pra Cetak Delete') ||
        //     Auth::user()->hasPermissionTo('Senarai Semak Pra Cetak Verify')
        // ) {
        //     Helper::logSystemActivity('Senarai Semak Pra Cetak', 'Senarai Semak Pra Cetak List');
            return view('Mes.SenariSemakCetak.index');
        // }
        // return back()->with('custom_errors', 'You don`t have Right Permission');
    }

    public function create(){
        if (!Auth::user()->hasPermissionTo('Senarai Semak Pra Cetak Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        Helper::logSystemActivity('Senarai Semak Pra Cetak', 'Senarai Semak Pra Cetak Create');
        return view('Mes.SenariSemakCetak.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        if (!Auth::user()->hasPermissionTo('Senarai Semak Pra Cetak Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $validator = null;

        $validatedData = $request->validate([
            'sale_order' => 'required',
            'date' => 'required',
            'time' => 'required'
        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $senari_semak_cetak = new SenariSemakCetak();
        $senari_semak_cetak->sale_order_id = $request->sale_order;
        $senari_semak_cetak->date = $request->date;
        $senari_semak_cetak->time = $request->time;
        $senari_semak_cetak->created_by = Auth::user()->id;

        $senari_semak_cetak->item_cover_availibility = $request->item_cover_availibility;
        $senari_semak_cetak->item_leaflet_availibility = $request->item_leaflet_availibility;
        $senari_semak_cetak->item_cover_text = $request->item_cover_text;

        $senari_semak_cetak->bahagian_b_1 = $request->bahagian_b_1;
        $senari_semak_cetak->bahagian_b_2 = $request->bahagian_b_2;
        $senari_semak_cetak->bahagian_b_3 = $request->bahagian_b_3;
        $senari_semak_cetak->bahagian_b_4 = $request->bahagian_b_4;
        $senari_semak_cetak->bahagian_b_5 = $request->bahagian_b_5;
        $senari_semak_cetak->bahagian_b_6 = $request->bahagian_b_6;
        $senari_semak_cetak->bahagian_b_7 = $request->bahagian_b_7;
        $senari_semak_cetak->bahagian_b_8 = $request->bahagian_b_8;
        $senari_semak_cetak->bahagian_b_9 = $request->bahagian_b_9;
        $senari_semak_cetak->bahagian_b_p4_1 = $request->bahagian_b_p4_1;
        $senari_semak_cetak->bahagian_b_p4_2 = $request->bahagian_b_p4_2;
        $senari_semak_cetak->bahagian_b_p4_3 = $request->bahagian_b_p4_3;
        $senari_semak_cetak->bahagian_b_p3_1 = $request->bahagian_b_p3_1;
        $senari_semak_cetak->bahagian_b_p3_2 = $request->bahagian_b_p3_2;
        $senari_semak_cetak->bahagian_b_p3_3 = $request->bahagian_b_p3_3;
        $senari_semak_cetak->bahagian_b_p1_1 = $request->bahagian_b_p1_1;

        $senari_semak_cetak->gripper_margin_cover = $request->gripper_margin_cover;
        $senari_semak_cetak->gripper_margin_teks = $request->gripper_margin_teks;
        $senari_semak_cetak->gripper_margin_leaflet = $request->gripper_margin_leaflet;

        $senari_semak_cetak->status = 'checked';
        $senari_semak_cetak->save();

        $bahagianA = $request->bahagianA;
        ksort($bahagianA);

        foreach($bahagianA as $key => $value){
            $senari_semak_cetak_detail_1 = new SenariSemakCetakBahagiaA();
            $senari_semak_cetak_detail_1->senari_semak_cetak_id = $senari_semak_cetak->id;
        if($key != 1){
            $senari_semak_cetak_detail_1->bahagian_a_1 = $value['1'];
            $senari_semak_cetak_detail_1->bahagian_a_2 = $value['2'];
            $senari_semak_cetak_detail_1->bahagian_a_3 = $value['3'];
            $senari_semak_cetak_detail_1->bahagian_a_4 = $value['4'];
            $senari_semak_cetak_detail_1->bahagian_a_5 = $value['5'];
            $senari_semak_cetak_detail_1->bahagian_a_6 = $value['6'];
            $senari_semak_cetak_detail_1->bahagian_a_7 = $value['7'];
            $senari_semak_cetak_detail_1->bahagian_a_8 = $value['8'];
            $senari_semak_cetak_detail_1->bahagian_a_9 = $value['9'];
            $senari_semak_cetak_detail_1->bahagian_a_10 = $value['10'];
            $senari_semak_cetak_detail_1->bahagian_a_11 = $value['11'];
            $senari_semak_cetak_detail_1->bahagian_a_12 = $value['12'];
            $senari_semak_cetak_detail_1->bahagian_a_13 = $value['13'];
            $senari_semak_cetak_detail_1->bahagian_a_14 = $value['14'];
            $senari_semak_cetak_detail_1->bahagian_a_15 = $value['15'];
            $senari_semak_cetak_detail_1->bahagian_a_16 = $value['16'];
        }
            $senari_semak_cetak_detail_1->bahagian_a_17 = $value['17'];
            $senari_semak_cetak_detail_1->bahagian_a_18 = $value['18'];
            $senari_semak_cetak_detail_1->bahagian_a_19 = $value['19'];
            $senari_semak_cetak_detail_1->bahagian_a_20 = $value['20'];
            $senari_semak_cetak_detail_1->bahagian_a_21 = $value['21'];
            $senari_semak_cetak_detail_1->save();
        }

        $bahagianC = $request->bahagianC;
        ksort($bahagianC);

        foreach($bahagianC as $key => $value){
            $senari_semak_cetak_detail_2 = new SenariSemakCetakBahagiaC();
            $senari_semak_cetak_detail_2->senari_semak_cetak_id = $senari_semak_cetak->id;
            $senari_semak_cetak_detail_2->bahagian_c_1 = $value['1'];
            $senari_semak_cetak_detail_2->bahagian_c_2 = $value['2'];
            $senari_semak_cetak_detail_2->bahagian_c_3 = $value['3'];
            $senari_semak_cetak_detail_2->bahagian_c_4 = $value['4'];
            $senari_semak_cetak_detail_2->bahagian_c_5 = $value['5'];
            $senari_semak_cetak_detail_2->bahagian_c_6 = $value['6'];
            $senari_semak_cetak_detail_2->save();
        }

        Helper::logSystemActivity('Senarai Semak Pra Cetak', 'Senarai Semak Pra Cetak Store');
        return redirect()->route('senari_semak_cetak')->with('custom_success', 'Senarai Semak Pra Cetak has been Created Successfully !');
    }

    public function edit($id){
        if (!Auth::user()->hasPermissionTo('Senarai Semak Pra Cetak Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $senari_semak_cetak = SenariSemakCetak::find($id);
        $detail1 = SenariSemakCetakBahagiaA::where('senari_semak_cetak_id', '=', $id)->orderBy('id', 'asc')->get();
        $detail2 = SenariSemakCetakBahagiaC::where('senari_semak_cetak_id', '=', $id)->orderBy('id', 'asc')->get();
        Helper::logSystemActivity('Senarai Semak Pra Cetak', 'Senarai Semak Pra Cetak Update');
        return view('Mes.SenariSemakCetak.edit', compact('senari_semak_cetak', 'detail1', 'detail2'));
    }

    public function view($id){
        if (!Auth::user()->hasPermissionTo('Senarai Semak Pra Cetak View')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $senari_semak_cetak = SenariSemakCetak::find($id);
        $detail1 = SenariSemakCetakBahagiaA::where('senari_semak_cetak_id', '=', $id)->orderBy('id', 'asc')->get();
        $detail2 = SenariSemakCetakBahagiaC::where('senari_semak_cetak_id', '=', $id)->orderBy('id', 'asc')->get();
        Helper::logSystemActivity('Senarai Semak Pra Cetak', 'Senarai Semak Pra Cetak View');
        return view('Mes.SenariSemakCetak.view', compact('senari_semak_cetak', 'detail1', 'detail2'));
    }

    public function update(Request $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('Senarai Semak Pra Cetak Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $validator = null;

        $validatedData = $request->validate([
            'sale_order' => 'required',
            'date' => 'required',
            'time' => 'required'
        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $senari_semak_cetak = SenariSemakCetak::find($id);
        $senari_semak_cetak->sale_order_id = $request->sale_order;
        $senari_semak_cetak->date = $request->date;
        $senari_semak_cetak->time = $request->time;
        $senari_semak_cetak->created_by = Auth::user()->id;

        $senari_semak_cetak->item_cover_availibility = $request->item_cover_availibility;
        $senari_semak_cetak->item_leaflet_availibility = $request->item_leaflet_availibility;
        $senari_semak_cetak->item_cover_text = $request->item_cover_text;

        $senari_semak_cetak->bahagian_b_1 = $request->bahagian_b_1;
        $senari_semak_cetak->bahagian_b_2 = $request->bahagian_b_2;
        $senari_semak_cetak->bahagian_b_3 = $request->bahagian_b_3;
        $senari_semak_cetak->bahagian_b_4 = $request->bahagian_b_4;
        $senari_semak_cetak->bahagian_b_5 = $request->bahagian_b_5;
        $senari_semak_cetak->bahagian_b_6 = $request->bahagian_b_6;
        $senari_semak_cetak->bahagian_b_7 = $request->bahagian_b_7;
        $senari_semak_cetak->bahagian_b_8 = $request->bahagian_b_8;
        $senari_semak_cetak->bahagian_b_9 = $request->bahagian_b_9;
        $senari_semak_cetak->bahagian_b_p4_1 = $request->bahagian_b_p4_1;
        $senari_semak_cetak->bahagian_b_p4_2 = $request->bahagian_b_p4_2;
        $senari_semak_cetak->bahagian_b_p4_3 = $request->bahagian_b_p4_3;
        $senari_semak_cetak->bahagian_b_p3_1 = $request->bahagian_b_p3_1;
        $senari_semak_cetak->bahagian_b_p3_2 = $request->bahagian_b_p3_2;
        $senari_semak_cetak->bahagian_b_p3_3 = $request->bahagian_b_p3_3;
        $senari_semak_cetak->bahagian_b_p1_1 = $request->bahagian_b_p1_1;

        $senari_semak_cetak->gripper_margin_cover = $request->gripper_margin_cover;
        $senari_semak_cetak->gripper_margin_teks = $request->gripper_margin_teks;
        $senari_semak_cetak->gripper_margin_leaflet = $request->gripper_margin_leaflet;

        $senari_semak_cetak->status = 'checked';
        $senari_semak_cetak->save();

        SenariSemakCetakBahagiaA::where('senari_semak_cetak_id', '=', $id)->delete();

        $bahagianA = $request->bahagianA;
        ksort($bahagianA);

        foreach($bahagianA as $key => $value){
            $senari_semak_cetak_detail_1 = new SenariSemakCetakBahagiaA();
            $senari_semak_cetak_detail_1->senari_semak_cetak_id = $senari_semak_cetak->id;
        if($key != 1){
            $senari_semak_cetak_detail_1->bahagian_a_1 = $value['1'];
            $senari_semak_cetak_detail_1->bahagian_a_2 = $value['2'];
            $senari_semak_cetak_detail_1->bahagian_a_3 = $value['3'];
            $senari_semak_cetak_detail_1->bahagian_a_4 = $value['4'];
            $senari_semak_cetak_detail_1->bahagian_a_5 = $value['5'];
            $senari_semak_cetak_detail_1->bahagian_a_6 = $value['6'];
            $senari_semak_cetak_detail_1->bahagian_a_7 = $value['7'];
            $senari_semak_cetak_detail_1->bahagian_a_8 = $value['8'];
            $senari_semak_cetak_detail_1->bahagian_a_9 = $value['9'];
            $senari_semak_cetak_detail_1->bahagian_a_10 = $value['10'];
            $senari_semak_cetak_detail_1->bahagian_a_11 = $value['11'];
            $senari_semak_cetak_detail_1->bahagian_a_12 = $value['12'];
            $senari_semak_cetak_detail_1->bahagian_a_13 = $value['13'];
            $senari_semak_cetak_detail_1->bahagian_a_14 = $value['14'];
            $senari_semak_cetak_detail_1->bahagian_a_15 = $value['15'];
            $senari_semak_cetak_detail_1->bahagian_a_16 = $value['16'];
        }
            $senari_semak_cetak_detail_1->bahagian_a_17 = $value['17'];
            $senari_semak_cetak_detail_1->bahagian_a_18 = $value['18'];
            $senari_semak_cetak_detail_1->bahagian_a_19 = $value['19'];
            $senari_semak_cetak_detail_1->bahagian_a_20 = $value['20'];
            $senari_semak_cetak_detail_1->bahagian_a_21 = $value['21'];
            $senari_semak_cetak_detail_1->save();
        }

        SenariSemakCetakBahagiaC::where('senari_semak_cetak_id', '=', $id)->delete();

        $bahagianC = $request->bahagianC;
        ksort($bahagianC);

        foreach($bahagianC as $key => $value){
            $senari_semak_cetak_detail_2 = new SenariSemakCetakBahagiaC();
            $senari_semak_cetak_detail_2->senari_semak_cetak_id = $senari_semak_cetak->id;
            $senari_semak_cetak_detail_2->bahagian_c_1 = $value['1'];
            $senari_semak_cetak_detail_2->bahagian_c_2 = $value['2'];
            $senari_semak_cetak_detail_2->bahagian_c_3 = $value['3'];
            $senari_semak_cetak_detail_2->bahagian_c_4 = $value['4'];
            $senari_semak_cetak_detail_2->bahagian_c_5 = $value['5'];
            $senari_semak_cetak_detail_2->bahagian_c_6 = $value['6'];
            $senari_semak_cetak_detail_2->save();
        }

        Helper::logSystemActivity('Senarai Semak Pra Cetak', 'Senarai Semak Pra Cetak Update');
        return redirect()->route('senari_semak_cetak')->with('custom_success', 'Senarai Semak Pra Cetak has been Updated Successfully !');
    }

    public function verify($id){
        if (!Auth::user()->hasPermissionTo('Senarai Semak Pra Cetak Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $senari_semak_cetak = SenariSemakCetak::find($id);
        $detail1 = SenariSemakCetakBahagiaA::where('senari_semak_cetak_id', '=', $id)->orderBy('id', 'asc')->get();
        $detail2 = SenariSemakCetakBahagiaC::where('senari_semak_cetak_id', '=', $id)->orderBy('id', 'asc')->get();
        Helper::logSystemActivity('Senarai Semak Pra Cetak', 'Senarai Semak Pra Cetak Update');
        return view('Mes.SenariSemakCetak.verify', compact('senari_semak_cetak', 'detail1', 'detail2'));
    }

    public function approve_approve(Request $request, $id){
        if (!Auth::user()->hasPermissionTo('Senarai Semak Pra Cetak Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $senari_semak_cetak = SenariSemakCetak::find($id);
        $senari_semak_cetak->status = 'verified';
        $senari_semak_cetak->verified_by_date = Carbon::now()->format('Y-m-d H:i:s');
        $senari_semak_cetak->verified_by_user = Auth::user()->user_name;
        $senari_semak_cetak->verified_by_designation = (Auth::user()->designation != null) ? Auth::user()->designation->name : 'not assign';
        $senari_semak_cetak->verified_by_department = (Auth::user()->department != null) ? Auth::user()->department->name : 'not assign';
        $senari_semak_cetak->save();
        Helper::logSystemActivity('Senarai Semak Pra Cetak', 'Senarai Semak Pra Cetak Verified');
        return redirect()->route('senari_semak_cetak')->with('custom_success', 'Senarai Semak Pra Cetak has been Successfully Verified!');
    }

    public function approve_decline(Request $request, $id){
        if (!Auth::user()->hasPermissionTo('Senarai Semak Pra Cetak Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $senari_semak_cetak = SenariSemakCetak::find($id);
        $senari_semak_cetak->status = 'declined';
        $senari_semak_cetak->save();
        Helper::logSystemActivity('Senarai Semak Pra Cetak', 'Senarai Semak Pra Cetak Declined');
        return redirect()->route('senari_semak_cetak')->with('custom_success', 'Senarai Semak Pra Cetak has been Successfully Declined!');
    }

    public function delete($id){
        if (!Auth::user()->hasPermissionTo('Senarai Semak Pra Cetak Delete')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $senari_semak_cetak = SenariSemakCetak::find($id);
        SenariSemakCetakBahagiaA::where('senari_semak_cetak_id', '=', $id)->delete();
        SenariSemakCetakBahagiaC::where('senari_semak_cetak_id', '=', $id)->delete();
        $senari_semak_cetak->delete();
        Helper::logSystemActivity('Senarai Semak Pra Cetak', 'Senarai Semak Pra Cetak Delete');
        return redirect()->route('senari_semak_cetak')->with('custom_success', 'Senarai Semak Pra Cetak has been Successfully Deleted!');
    }
}
