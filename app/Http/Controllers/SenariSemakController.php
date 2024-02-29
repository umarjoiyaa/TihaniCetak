<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\SaleOrder;
use App\Models\SenariSemak;
use App\Models\SenariSemakCetak;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SenariSemakController extends Controller
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

            $query = SenariSemak::select('id', 'sale_order_id', 'date', 'created_by', 'status')->with('user', 'sale_order');

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
                        ->OrWhere('status', 'like', '%' . $searchLower . '%');
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
                                });
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
                if ($row->status == 'checked') {
                    $row->status = '<span class="badge badge-warning">Checked</span>';
                    $actions = '<a class="dropdown-item" href="' . route('senari_semak.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('senari_semak.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('senari_semak.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item"  id="swal-warning" data-delete="' . route('senari_semak.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'verified') {
                    $row->status = '<span class="badge badge-success">Verified</span>';
                    $actions = '<a class="dropdown-item" href="' . route('senari_semak.view', $row->id) . '">View</a>
                                <a class="dropdown-item"  id="swal-warning" data-delete="' . route('senari_semak.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'declined') {
                    $row->status = '<span class="badge badge-danger">Declined</span>';
                    $actions = '<a class="dropdown-item" href="' . route('senari_semak.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('senari_semak.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('senari_semak.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item"  id="swal-warning" data-delete="' . route('senari_semak.delete', $row->id) . '">Delete</a>';
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

            $query = SenariSemak::select('id', 'sale_order_id', 'date', 'created_by', 'status')->with('user', 'sale_order');

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
                    ->OrWhere('status', 'like', '%' . $searchLower . '%');
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
                    $actions = '<a class="dropdown-item" href="' . route('senari_semak.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('senari_semak.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('senari_semak.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item"  id="swal-warning" data-delete="' . route('senari_semak.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'verified') {
                    $row->status = '<span class="badge badge-success">Verified</span>';
                    $actions = '<a class="dropdown-item" href="' . route('senari_semak.view', $row->id) . '">View</a>
                                <a class="dropdown-item"  id="swal-warning" data-delete="' . route('senari_semak.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'declined') {
                    $row->status = '<span class="badge badge-danger">Declined</span>';
                    $actions = '<a class="dropdown-item" href="' . route('senari_semak.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('senari_semak.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('senari_semak.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item"  id="swal-warning" data-delete="' . route('senari_semak.delete', $row->id) . '">Delete</a>';
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
            Auth::user()->hasPermissionTo('Senarai Semak Pencetakan Digital List') ||
            Auth::user()->hasPermissionTo('Senarai Semak Pencetakan Digital Create') ||
            Auth::user()->hasPermissionTo('Senarai Semak Pencetakan Digital Update') ||
            Auth::user()->hasPermissionTo('Senarai Semak Pencetakan Digital View') ||
            Auth::user()->hasPermissionTo('Senarai Semak Pencetakan Digital Delete') ||
            Auth::user()->hasPermissionTo('Senarai Semak Pencetakan Digital Verify')
        ) {
            Helper::logSystemActivity('Senarai Semak Pencetakan Digital List', 'Senarai Semak Pencetakan Digital List');
            return view('Mes.SenariSemak.index');
        }
        return back()->with('custom_errors', 'You don`t have Right Permission');
    }

    public function create(){
        if (!Auth::user()->hasPermissionTo('Senarai Semak Pencetakan Digital Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        Helper::logSystemActivity('Senarai Semak Pencetakan Digital', 'Senarai Semak Pencetakan Digital Create');
        return view('Mes.SenariSemak.create');
    }

    public function sale_order(Request $request)
    {
        $perPage = 10;
        $page = $request->input('page', 1);
        $search = $request->input('q');

        $query = SaleOrder::select('id', 'order_no')->where('order_status', '=', 'published');
        if ($search) {
            $query->where('order_no', 'like', '%' . $search . '%');
        }
        $heads = $query->paginate($perPage, ['*'], 'page', $page);

        // Convert items to a collection and then use map
        $transformedResults = collect($heads->items())->map(function ($item) {
            return [
                'id' => $item['id'],
                'text' => $item['order_no'],
                'order_no' => $item['order_no'],
            ];
        });

        return response()->json([
            'results' => $transformedResults,
            'pagination' => [
                'more' => $heads->hasMorePages(),
            ],
        ]);
    }

    public function sale_order_detail(Request $request)
    {
        $sale_order = SaleOrder::select('id', 'order_no', 'description', 'kod_buku', 'size' , 'status')->where('id', $request->id)->first();

        return response()->json($sale_order);
    }

    public function store(Request $request)
    {
        if (!Auth::user()->hasPermissionTo('Senarai Semak Pencetakan Digital Create')) {
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

        $carbonTime = Carbon::createFromFormat('H:i', $request->time);
        $timeIn12HourFormat = $carbonTime->format('h:i A');


        $senari_semak = new SenariSemak();
        $senari_semak->sale_order_id = $request->sale_order;
        $senari_semak->date = $request->date;

        $senari_semak->time = $timeIn12HourFormat;
        $senari_semak->created_by = Auth::user()->id;

        $senari_semak->bahagian_a_1_cover = $request->behagian_a_1_cover;
        $senari_semak->bahagian_a_1_text = $request->behagian_a_1_text;
        $senari_semak->bahagian_a_2_cover = $request->behagian_a_2_cover;
        $senari_semak->bahagian_a_2_text = $request->behagian_a_2_text;
        $senari_semak->bahagian_a_3_cover = $request->behagian_a_3_cover;
        $senari_semak->bahagian_a_3_text = $request->behagian_a_3_text;
        $senari_semak->bahagian_a_4_cover = $request->behagian_a_4_cover;
        $senari_semak->bahagian_a_4_text = $request->behagian_a_4_text;
        $senari_semak->bahagian_a_5_cover = $request->behagian_a_5_cover;
        $senari_semak->bahagian_a_6_cover = $request->behagian_a_6_cover;
        $senari_semak->bahagian_a_7_text = $request->behagian_a_7_text;
        $senari_semak->bahagian_a_8_text = $request->behagian_a_8_text;
        $senari_semak->bahagian_a_9_text = $request->behagian_a_9_text;
        $senari_semak->bahagian_a_10_text = $request->behagian_a_10_text;

        $senari_semak->bahagian_b_1_text = $request->behagian_b_1_text;
        $senari_semak->bahagian_b_1_cover = $request->behagian_b_1_cover;
        $senari_semak->bahagian_b_2_text = $request->behagian_b_2_text;
        $senari_semak->bahagian_b_2_cover = $request->behagian_b_2_cover;
        $senari_semak->bahagian_b_3_text = $request->behagian_b_3_text;
        $senari_semak->bahagian_b_3_cover = $request->behagian_b_3_cover;
        $senari_semak->bahagian_b_4_text = $request->behagian_b_4_text;
        $senari_semak->bahagian_b_4_cover = $request->behagian_b_4_cover;
        $senari_semak->bahagian_b_5_text = $request->behagian_b_5_text;
        $senari_semak->bahagian_b_5_cover = $request->behagian_b_5_cover;
        $senari_semak->bahagian_b_6_text = $request->behagian_b_6_text;
        $senari_semak->bahagian_b_6_cover = $request->behagian_b_6_cover;
        $senari_semak->bahagian_b_7_text = $request->behagian_b_7_text;
        $senari_semak->bahagian_b_7_cover = $request->behagian_b_7_cover;
        $senari_semak->bahagian_b_8_text = $request->behagian_b_8_text;
        $senari_semak->bahagian_b_8_cover = $request->behagian_b_8_cover;
        $senari_semak->bahagian_b_9_text = $request->behagian_b_9_text;
        $senari_semak->bahagian_b_9_cover = $request->behagian_b_9_cover;
        $senari_semak->bahagian_b_10_text = $request->behagian_b_10_text;
        $senari_semak->bahagian_b_10_cover = $request->behagian_b_10_cover;
        $senari_semak->bahagian_b_11_text = $request->behagian_b_11_text;
        $senari_semak->bahagian_b_11_cover = $request->behagian_b_11_cover;

        $senari_semak->bahagian_c_1_text = $request->behagian_c_1_text;
        $senari_semak->bahagian_c_1_cover = $request->behagian_c_1_cover;
        $senari_semak->bahagian_c_2_text = $request->behagian_c_2_text;
        $senari_semak->bahagian_c_2_cover = $request->behagian_c_2_cover;
        $senari_semak->bahagian_c_3_text = $request->behagian_c_3_text;
        $senari_semak->bahagian_c_3_cover = $request->behagian_c_3_cover;
        $senari_semak->bahagian_c_4_text = $request->behagian_c_4_text;
        $senari_semak->bahagian_c_4_cover = $request->behagian_c_4_cover;
        $senari_semak->bahagian_c_5_text = $request->behagian_c_5_text;
        $senari_semak->bahagian_c_5_cover = $request->behagian_c_5_cover;
        $senari_semak->bahagian_c_6_text = $request->behagian_c_6_text;
        $senari_semak->bahagian_c_6_cover = $request->behagian_c_6_cover;
        $senari_semak->bahagian_c_7_text = $request->behagian_c_7_text;
        $senari_semak->bahagian_c_7_cover = $request->behagian_c_7_cover;
        $senari_semak->bahagian_c_8_text = $request->behagian_c_8_text;
        $senari_semak->bahagian_c_8_cover = $request->behagian_c_8_cover;
        $senari_semak->bahagian_c_9_text = $request->behagian_c_9_text;
        $senari_semak->bahagian_c_9_cover = $request->behagian_c_9_cover;
        $senari_semak->bahagian_c_10_text = $request->behagian_c_10_text;
        $senari_semak->bahagian_c_10_cover = $request->behagian_c_10_cover;
        $senari_semak->bahagian_c_11_input = $request->behagian_c_11_input;
        $senari_semak->bahagian_c_11_text = $request->behagian_c_11_text;
        $senari_semak->bahagian_c_11_cover = $request->behagian_c_11_cover;

        $senari_semak->status = 'checked';
        $senari_semak->save();
        Helper::logSystemActivity('Senarai Semak Pencetakan Digital', 'Senarai Semak Pencetakan Digital Store');
        return redirect()->route('senari_semak')->with('custom_success', 'Senarai Semak Pencetakan Digital has been Created Successfully !');
    }

    public function edit($id){
        if (!Auth::user()->hasPermissionTo('Senarai Semak Pencetakan Digital Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $senari_semak = SenariSemak::find($id);
        Helper::logSystemActivity('Senarai Semak Pencetakan Digital', 'Senarai Semak Pencetakan Digital Update');
        return view('Mes.SenariSemak.edit', compact('senari_semak'));
    }

    public function view($id){
        if (!Auth::user()->hasPermissionTo('Senarai Semak Pencetakan Digital View')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $senari_semak = SenariSemak::find($id);
        Helper::logSystemActivity('Senarai Semak Pencetakan Digital', 'Senarai Semak Pencetakan Digital View');
        return view('Mes.SenariSemak.view', compact('senari_semak'));
    }

    public function update(Request $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('Senarai Semak Pencetakan Digital Update')) {
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

        $carbonTime = Carbon::createFromFormat('H:i', $request->time);
        $timeIn12HourFormat = $carbonTime->format('h:i A');


        $senari_semak = SenariSemak::find($id);
        $senari_semak->sale_order_id = $request->sale_order;
        $senari_semak->date = $request->date;
        $senari_semak->time = $timeIn12HourFormat;
        $senari_semak->created_by = Auth::user()->id;

        $senari_semak->bahagian_a_1_cover = $request->behagian_a_1_cover;
        $senari_semak->bahagian_a_1_text = $request->behagian_a_1_text;
        $senari_semak->bahagian_a_2_cover = $request->behagian_a_2_cover;
        $senari_semak->bahagian_a_2_text = $request->behagian_a_2_text;
        $senari_semak->bahagian_a_3_cover = $request->behagian_a_3_cover;
        $senari_semak->bahagian_a_3_text = $request->behagian_a_3_text;
        $senari_semak->bahagian_a_4_cover = $request->behagian_a_4_cover;
        $senari_semak->bahagian_a_4_text = $request->behagian_a_4_text;
        $senari_semak->bahagian_a_5_cover = $request->behagian_a_5_cover;
        $senari_semak->bahagian_a_6_cover = $request->behagian_a_6_cover;
        $senari_semak->bahagian_a_7_text = $request->behagian_a_7_text;
        $senari_semak->bahagian_a_8_text = $request->behagian_a_8_text;
        $senari_semak->bahagian_a_9_text = $request->behagian_a_9_text;
        $senari_semak->bahagian_a_10_text = $request->behagian_a_10_text;

        $senari_semak->bahagian_b_1_text = $request->behagian_b_1_text;
        $senari_semak->bahagian_b_1_cover = $request->behagian_b_1_cover;
        $senari_semak->bahagian_b_2_text = $request->behagian_b_2_text;
        $senari_semak->bahagian_b_2_cover = $request->behagian_b_2_cover;
        $senari_semak->bahagian_b_3_text = $request->behagian_b_3_text;
        $senari_semak->bahagian_b_3_cover = $request->behagian_b_3_cover;
        $senari_semak->bahagian_b_4_text = $request->behagian_b_4_text;
        $senari_semak->bahagian_b_4_cover = $request->behagian_b_4_cover;
        $senari_semak->bahagian_b_5_text = $request->behagian_b_5_text;
        $senari_semak->bahagian_b_5_cover = $request->behagian_b_5_cover;
        $senari_semak->bahagian_b_6_text = $request->behagian_b_6_text;
        $senari_semak->bahagian_b_6_cover = $request->behagian_b_6_cover;
        $senari_semak->bahagian_b_7_text = $request->behagian_b_7_text;
        $senari_semak->bahagian_b_7_cover = $request->behagian_b_7_cover;
        $senari_semak->bahagian_b_8_text = $request->behagian_b_8_text;
        $senari_semak->bahagian_b_8_cover = $request->behagian_b_8_cover;
        $senari_semak->bahagian_b_9_text = $request->behagian_b_9_text;
        $senari_semak->bahagian_b_9_cover = $request->behagian_b_9_cover;
        $senari_semak->bahagian_b_10_text = $request->behagian_b_10_text;
        $senari_semak->bahagian_b_10_cover = $request->behagian_b_10_cover;
        $senari_semak->bahagian_b_11_text = $request->behagian_b_11_text;
        $senari_semak->bahagian_b_11_cover = $request->behagian_b_11_cover;

        $senari_semak->bahagian_c_1_text = $request->behagian_c_1_text;
        $senari_semak->bahagian_c_1_cover = $request->behagian_c_1_cover;
        $senari_semak->bahagian_c_2_text = $request->behagian_c_2_text;
        $senari_semak->bahagian_c_2_cover = $request->behagian_c_2_cover;
        $senari_semak->bahagian_c_3_text = $request->behagian_c_3_text;
        $senari_semak->bahagian_c_3_cover = $request->behagian_c_3_cover;
        $senari_semak->bahagian_c_4_text = $request->behagian_c_4_text;
        $senari_semak->bahagian_c_4_cover = $request->behagian_c_4_cover;
        $senari_semak->bahagian_c_5_text = $request->behagian_c_5_text;
        $senari_semak->bahagian_c_5_cover = $request->behagian_c_5_cover;
        $senari_semak->bahagian_c_6_text = $request->behagian_c_6_text;
        $senari_semak->bahagian_c_6_cover = $request->behagian_c_6_cover;
        $senari_semak->bahagian_c_7_text = $request->behagian_c_7_text;
        $senari_semak->bahagian_c_7_cover = $request->behagian_c_7_cover;
        $senari_semak->bahagian_c_8_text = $request->behagian_c_8_text;
        $senari_semak->bahagian_c_8_cover = $request->behagian_c_8_cover;
        $senari_semak->bahagian_c_9_text = $request->behagian_c_9_text;
        $senari_semak->bahagian_c_9_cover = $request->behagian_c_9_cover;
        $senari_semak->bahagian_c_10_text = $request->behagian_c_10_text;
        $senari_semak->bahagian_c_10_cover = $request->behagian_c_10_cover;
        $senari_semak->bahagian_c_11_input = $request->behagian_c_11_input;
        $senari_semak->bahagian_c_11_text = $request->behagian_c_11_text;
        $senari_semak->bahagian_c_11_cover = $request->behagian_c_11_cover;

        $senari_semak->status = 'checked';
        $senari_semak->save();
        Helper::logSystemActivity('Senarai Semak Pencetakan Digital', 'Senarai Semak Pencetakan Digital Update');
        return redirect()->route('senari_semak')->with('custom_success', 'Senarai Semak Pencetakan Digital has been Updated Successfully !');
    }

    public function verify($id){
        if (!Auth::user()->hasPermissionTo('Senarai Semak Pencetakan Digital Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $senari_semak = SenariSemak::find($id);
        Helper::logSystemActivity('Senarai Semak Pencetakan Digital', 'Senarai Semak Pencetakan Digital Update');
        return view('Mes.SenariSemak.verify', compact('senari_semak'));
    }

    public function approve_approve(Request $request, $id){
        if (!Auth::user()->hasPermissionTo('Senarai Semak Pencetakan Digital Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $senari_semak = SenariSemak::find($id);
        $senari_semak->status = 'verified';
        $senari_semak->verified_by_date = Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y h:i:s A');
        $senari_semak->verified_by_user = Auth::user()->user_name;
        $senari_semak->verified_by_designation = (Auth::user()->designation != null) ? Auth::user()->designation->name : 'not assign';
        $senari_semak->verified_by_department = (Auth::user()->department != null) ? Auth::user()->department->name : 'not assign';
        $senari_semak->save();
        Helper::logSystemActivity('Senarai Semak Pencetakan Digital', 'Senarai Semak Pencetakan Digital Verified');
        return redirect()->route('senari_semak')->with('custom_success', 'Senarai Semak Pencetakan Digital has been Successfully Verified!');
    }

    public function approve_decline(Request $request, $id){
        if (!Auth::user()->hasPermissionTo('Senarai Semak Pencetakan Digital Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $senari_semak = SenariSemak::find($id);
        $senari_semak->status = 'declined';
        $senari_semak->save();
        Helper::logSystemActivity('Senarai Semak Pencetakan Digital', 'Senarai Semak Pencetakan Digital Declined');
        return redirect()->route('senari_semak')->with('custom_success', 'Senarai Semak Pencetakan Digital has been Successfully Declined!');
    }

    public function delete($id){
        if (!Auth::user()->hasPermissionTo('Senarai Semak Pencetakan Digital Delete')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $senari_semak = SenariSemak::find($id);
        $senari_semak->delete();
        Helper::logSystemActivity('Senarai Semak Pencetakan Digital', 'Senarai Semak Pencetakan Digital Delete');
        return redirect()->route('senari_semak')->with('custom_success', 'Senarai Semak Pencetakan Digital has been Successfully Deleted!');
    }
}
