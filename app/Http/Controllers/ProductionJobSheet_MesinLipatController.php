<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\MesinLipat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductionJobSheet_MesinLipatController extends Controller
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

            $query = MesinLipat::select('id', 'sale_order_id', 'date','status', 'jumlah_seksyen','jenis_lipatan','mesin')->with('sale_order');

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
                        ->where('jumlah_seksyen', 'like', '%' . $searchLower . '%')
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('sale_order_qty', 'like', '%' . $searchLower . '%');
                        })
                        ->where('jenis_lipatan', 'like', '%' . $searchLower . '%')
                        ->where('mesin', 'like', '%' . $searchLower . '%')
                        ->where('status', 'like', '%' . $searchLower . '%');
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
                    6 => 'jumlah_seksyen',
                    7 => 'sale_order',
                    8 => 'jenis_lipatan',
                    10 => 'mesin',
                    11 => 'status',

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
                                $q->where('jumlah_seksyen', 'like', '%' . $searchLower . '%');
                                break;
                            case 7:
                                $q->whereHas('sale_order', function ($query) use ($searchLower) {
                                    $query->where('sale_order_qty', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 8:
                                $q->where('jenis_lipatan', 'like', '%' . $searchLower . '%');
                                break;
                            case 9:
                                $q->where('mesin', 'like', '%' . $searchLower . '%');
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
                if ($row->status == 'Not-initiated') {
                    $row->status = '<span class="badge badge-warning">Not-initiated</span>';
                    $actions = '<a class="dropdown-item" href="' . route('mesin_lipat.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('mesin_lipat.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('mesin_lipat.proses', $row->id) . '">Proses</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('mesin_lipat.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'Started') {
                    $row->status = '<span class="badge badge-success">Started</span>';
                    $actions = '<a class="dropdown-item" href="' . route('mesin_lipat.view', $row->id) . '">View</a>
                                <a class="dropdown-item" href="' . route('mesin_lipat.proses', $row->id) . '">Proses</a>
                                <a class="dropdown-item" id="swal-warning" data-delete="' . route('mesin_lipat.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'Paused') {
                    $row->status = '<span class="badge badge-info">Paused</span>';
                    $actions = '<a class="dropdown-item" href="' . route('mesin_lipat.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('mesin_lipat.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('mesin_lipat.proses', $row->id) . '">Proses</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('mesin_lipat.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'Completed') {
                    $row->status = '<span class="badge badge-success">Completed</span>';
                    $actions = '<a class="dropdown-item" href="' . route('mesin_lipat.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('mesin_lipat.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('mesin_lipat.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'Declined') {
                    $row->status = '<span class="badge badge-danger">Declined</span>';
                    $actions = '<a class="dropdown-item" href="' . route('mesin_lipat.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('mesin_lipat.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('mesin_lipat.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'Verified') {
                    $row->status = '<span class="badge badge-success">Verified</span>';
                    $actions = '<a class="dropdown-item" href="' . route('mesin_lipat.view', $row->id) . '">View</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('mesin_lipat.delete', $row->id) . '">Delete</a>';
                }

                $row->action = '<div class="dropdown dropdownwidth">
                                <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                                data-toggle="dropdown" id="dropdownMenuButton" type="button">Action <i class="fas fa-caret-down ml-1"></i></button>
                                <div  class="dropdown-menu tx-13">
                                    ' . $actions . '
                                </div>
                            </div>';
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

            $query = MesinLipat::select('id', 'sale_order_id', 'date','status', 'jumlah_seksyen','jenis_lipatan','mesin')->with('sale_order');

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
                        ->where('jumlah_seksyen', 'like', '%' . $searchLower . '%')
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('sale_order_qty', 'like', '%' . $searchLower . '%');
                        })
                        ->where('jenis_lipatan', 'like', '%' . $searchLower . '%')
                        ->where('mesin', 'like', '%' . $searchLower . '%')
                        ->where('status', 'like', '%' . $searchLower . '%');
                    // Add more columns as needed
                });
            }

            $sortableColumns = [
                1 => 'date',
                2 => 'sale_order_id',
                3 => 'sale_order_id',
                4 => 'sale_order_id',
                5 => 'sale_order_id',
                6 => 'jumlah_seksyen',
                7 => 'sale_order',
                8 => 'jenis_lipatan',
                10 => 'mesin',
                11 => 'status',

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
                    $row->status = '<span class="badge badge-warning">Not-initiated</span>';
                    $actions = '<a class="dropdown-item" href="' . route('mesin_lipat.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('mesin_lipat.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('mesin_lipat.proses', $row->id) . '">Proses</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('mesin_lipat.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'Started') {
                    $row->status = '<span class="badge badge-success">Started</span>';
                    $actions = '<a class="dropdown-item" href="' . route('mesin_lipat.view', $row->id) . '">View</a>
                                <a class="dropdown-item" href="' . route('mesin_lipat.proses', $row->id) . '">Proses</a>
                                <a class="dropdown-item" id="swal-warning" data-delete="' . route('mesin_lipat.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'Paused') {
                    $row->status = '<span class="badge badge-info">Paused</span>';
                    $actions = '<a class="dropdown-item" href="' . route('mesin_lipat.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('mesin_lipat.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('mesin_lipat.proses', $row->id) . '">Proses</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('mesin_lipat.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'Completed') {
                    $row->status = '<span class="badge badge-success">Completed</span>';
                    $actions = '<a class="dropdown-item" href="' . route('mesin_lipat.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('mesin_lipat.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('mesin_lipat.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'Declined') {
                    $row->status = '<span class="badge badge-danger">Declined</span>';
                    $actions = '<a class="dropdown-item" href="' . route('mesin_lipat.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('mesin_lipat.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('mesin_lipat.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'Verified') {
                    $row->status = '<span class="badge badge-success">Verified</span>';
                    $actions = '<a class="dropdown-item" href="' . route('mesin_lipat.view', $row->id) . '">View</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('mesin_lipat.delete', $row->id) . '">Delete</a>';
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
            Auth::user()->hasPermissionTo('MESIN LIPAT List') ||
            Auth::user()->hasPermissionTo('MESIN LIPAT Create') ||
            Auth::user()->hasPermissionTo('MESIN LIPAT Update') ||
            Auth::user()->hasPermissionTo('MESIN LIPAT View') ||
            Auth::user()->hasPermissionTo('MESIN LIPAT Delete') ||
            Auth::user()->hasPermissionTo('MESIN LIPAT Proses')
        ) {
            Helper::logSystemActivity('MESIN LIPAT', 'MESIN LIPAT List');
            return view('Production.ProductionJobSheet_MesinLipat.index');
        }
        return back()->with('custom_errors', 'You don`t have Right Permission');
    }

    public function create(){
        if (!Auth::user()->hasPermissionTo('MESIN LIPAT Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        // $suppliers = Supplier::select('id', 'name')->get();
        Helper::logSystemActivity('MESIN LIPAT', 'MESIN LIPAT Create');
        return view('Production.ProductionJobSheet_MesinLipat.create');
    }

    public function store(Request $request)
    {
        if (!Auth::user()->hasPermissionTo('MESIN LIPAT Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $validator = null;

        $validatedData = $request->validate([
            'sale_order' => 'required',
            'date' => 'required',
            'jenis_lipatan' => 'required',
            'mesin' => 'required',

        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $mesin_lipat = new MesinLipat();
        $mesin_lipat->sale_order_id = $request->sale_order;
        $mesin_lipat->date = $request->date;
        $mesin_lipat->jumlah_seksyen = $request->jumlah_seksyen;
        $mesin_lipat->mesin = $request->mesin;
        $mesin_lipat->jenis_lipatan = $request->jenis_lipatan;
        $mesin_lipat->created_by = Auth::user()->id;


        $mesin_lipat->status = 'Not-initiated';
        $mesin_lipat->save();

        Helper::logSystemActivity('MESIN LIPAT', 'MESIN LIPAT Store');
        return redirect()->route('mesin_lipat')->with('custom_success', 'MESIN LIPAT has been Created Successfully !');
    }


    public function edit($id){
        if (!Auth::user()->hasPermissionTo('MESIN LIPAT Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $mesin_lipat = MesinLipat::find($id);
        Helper::logSystemActivity('MESIN LIPAT', 'MESIN LIPAT Update');
        return view('Production.ProductionJobSheet_MesinLipat.edit',compact('mesin_lipat'));
    }

    public function update(Request $request,$id)
    {
        if (!Auth::user()->hasPermissionTo('MESIN LIPAT Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $validator = null;

        $validatedData = $request->validate([
            'sale_order' => 'required',
            'date' => 'required',
            'jenis_lipatan' => 'required',
            'mesin' => 'required',

        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $mesin_lipat =  MesinLipat::find($id);
        $mesin_lipat->sale_order_id = $request->sale_order;
        $mesin_lipat->date = $request->date;
        $mesin_lipat->jumlah_seksyen = $request->jumlah_seksyen;
        $mesin_lipat->mesin = $request->mesin;
        $mesin_lipat->jenis_lipatan = $request->jenis_lipatan;
        $mesin_lipat->created_by = Auth::user()->id;


        $mesin_lipat->status = 'Not-initiated';
        $mesin_lipat->save();

        Helper::logSystemActivity('MESIN LIPAT', 'MESIN LIPAT update');
        return redirect()->route('mesin_lipat')->with('custom_success', 'MESIN LIPAT has been Created Successfully !');
    }


    public function delete($id){
        if (!Auth::user()->hasPermissionTo('MESIN LIPAT Delete')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $mesin_lipat = MesinLipat::find($id);
        $mesin_lipat->delete();
        Helper::logSystemActivity('MESIN LIPAT', 'MESIN LIPAT Delete');
        return redirect()->route('mesin_lipat')->with('custom_success', 'MESIN LIPAT has been Successfully Deleted!');
    }

    public function view($id){
        if (!Auth::user()->hasPermissionTo('MESIN LIPAT View')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $mesin_lipat = MesinLipat::find($id);
        // $suppliers = Supplier::select('id', 'name')->get();
        Helper::logSystemActivity('MESIN LIPAT', 'MESIN LIPAT View');
        return view('Production.ProductionJobSheet_MesinLipat.view', compact('mesin_lipat'));
    }

}
