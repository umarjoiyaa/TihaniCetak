<?php

namespace App\Http\Controllers;
use App\Helpers\Helper;
use App\Models\DigitalPrinting;
use App\Models\DigitalPrintingDetailB;
use App\Models\DigitalPrintingDetail;
use App\Models\User;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Auth;

class DigitalPrintingController extends Controller
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

            $query = DigitalPrinting::select('id', 'sale_order_id', 'date', 'kategori_job', 'jenis_produk', 'status')->with('sale_order');

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
                            $query->where('sale_order_qty', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhere('kategori_job', 'like', '%' . $searchLower . '%')
                        ->orWhere('jenis_produk', 'like', '%' . $searchLower . '%')
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
                    5 => 'jenis_produk',
                    6 => 'kategori_job',
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

                                $q->where('kategori_job', 'like', '%' . $searchLower . '%');
                                break;
                            case 6:
                                $q->where('jenis_produk', 'like', '%' . $searchLower . '%');
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
                    $actions = '<a class="dropdown-item" href="' . route('digital_printing.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('digital_printing.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('digital_printing.proses', $row->id) . '">Proses</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('digital_printing.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'Started') {
                    $row->status = '<span class="badge badge-success">Started</span>';
                    $actions = '<a class="dropdown-item" href="' . route('digital_printing.view', $row->id) . '">View</a>
                                <a class="dropdown-item" href="' . route('digital_printing.proses', $row->id) . '">Proses</a>';
                } else if ($row->status == 'Paused') {
                    $row->status = '<span class="badge badge-info">Paused</span>';
                    $actions = '<a class="dropdown-item" href="' . route('digital_printing.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('digital_printing.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('digital_printing.proses', $row->id) . '">Proses</a>';
                } else if ($row->status == 'Completed') {
                    $row->status = '<span class="badge badge-success">Completed</span>';
                    $actions = '<a class="dropdown-item" href="' . route('digital_printing.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('digital_printing.verify', $row->id) . '">Verify</a>';
                } else if ($row->status == 'declined') {
                    $row->status = '<span class="badge badge-danger">Declined</span>';
                    $actions = '<a class="dropdown-item" href="' . route('digital_printing.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('digital_printing.verify', $row->id) . '">Verify</a>';
                } else if ($row->status == 'verified') {
                    $row->status = '<span class="badge badge-success">Verified</span>';
                    $actions = '<a class="dropdown-item" href="' . route('digital_printing.view', $row->id) . '">View</a>';
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

            $query = DigitalPrinting::select('id', 'sale_order_id', 'date', 'kategori_job', 'jenis_produk',  'status')->with('sale_order');

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
                            $query->where('sale_order_qty', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhere('kategori_job', 'like', '%' . $searchLower . '%')
                        ->orWhere('jenis_produk', 'like', '%' . $searchLower . '%')
                        ->orWhere('status', 'like', '%' . $searchLower . '%');
                    // Add more columns as needed
                });
            }

            $sortableColumns = [
                1 => 'date',
                2 => 'sale_order_id',
                3 => 'sale_order_id',
                4 => 'sale_order_id',
                5 => 'jenis_produk',
                6 => 'kategori_job',
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
                    $actions = '<a class="dropdown-item" href="' . route('digital_printing.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('digital_printing.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('digital_printing.proses', $row->id) . '">Proses</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('digital_printing.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'Started') {
                    $row->status = '<span class="badge badge-success">Started</span>';
                    $actions = '<a class="dropdown-item" href="' . route('digital_printing.view', $row->id) . '">View</a>
                                <a class="dropdown-item" href="' . route('digital_printing.proses', $row->id) . '">Proses</a>';
                } else if ($row->status == 'Paused') {
                    $row->status = '<span class="badge badge-info">Paused</span>';
                    $actions = '<a class="dropdown-item" href="' . route('digital_printing.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('digital_printing.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('digital_printing.proses', $row->id) . '">Proses</a>';
                } else if ($row->status == 'Completed') {
                    $row->status = '<span class="badge badge-success">Completed</span>';
                    $actions = '<a class="dropdown-item" href="' . route('digital_printing.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('digital_printing.verify', $row->id) . '">Verify</a>';
                } else if ($row->status == 'declined') {
                    $row->status = '<span class="badge badge-danger">Declined</span>';
                    $actions = '<a class="dropdown-item" href="' . route('digital_printing.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('digital_printing.verify', $row->id) . '">Verify</a>';
                } else if ($row->status == 'verified') {
                    $row->status = '<span class="badge badge-success">Verified</span>';
                    $actions = '<a class="dropdown-item" href="' . route('digital_printing.view', $row->id) . '">View</a>';
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
            Auth::user()->hasPermissionTo('DIGITAL PRINTING List') ||
            Auth::user()->hasPermissionTo('DIGITAL PRINTING Create') ||
            Auth::user()->hasPermissionTo('DIGITAL PRINTING Update') ||
            Auth::user()->hasPermissionTo('DIGITAL PRINTING View') ||
            Auth::user()->hasPermissionTo('DIGITAL PRINTING Delete') ||
            Auth::user()->hasPermissionTo('DIGITAL PRINTING Proses')
        ) {
            Helper::logSystemActivity('DIGITAL PRINTING', 'DIGITAL PRINTING List');
            return view('Production.DigitalPrinting.index');
        }
        return back()->with('custom_errors', 'You don`t have Right Permission');
    }

    public function create(){
        if (!Auth::user()->hasPermissionTo('DIGITAL PRINTING Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $suppliers = Supplier::select('id', 'name')->get();
        Helper::logSystemActivity('DIGITAL PRINTING', 'DIGITAL PRINTING Create');
        return view('Production.DigitalPrinting.create', compact('suppliers'));
    }

    public function store(Request $request)
    {
        if (!Auth::user()->hasPermissionTo('DIGITAL PRINTING Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $validator = null;

        $validatedData = $request->validate([
            'sale_order' => 'required',
            'date' => 'required',
            'jumlah_mukasurat' => 'required',
            'kuantiti_waste' => 'required',
            'mesin' => 'required',
            'kategori_job' => 'required',
            'jenis_produk' => 'required',
            'kertas_teks' => 'required',
            'kertas_cover' => 'required'
        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $digital_printing = new DigitalPrinting();
        $digital_printing->sale_order_id = $request->sale_order;
        $digital_printing->date = $request->date;
        $digital_printing->jumlah_mukasurat = $request->jumlah_mukasurat;
        $digital_printing->kuantiti_waste = $request->kuantiti_waste;
        $digital_printing->remarks = $request->remarks;
        $digital_printing->mesin = $request->mesin;
        $digital_printing->mesin_others = $request->mesin_others;

        $digital_printing->kategori_job = $request->kategori_job;
        $digital_printing->jenis_produk = $request->jenis_produk;
        $digital_printing->jenis_produk_others = $request->jenis_produk_others;
        $digital_printing->kertas_teks = $request->kertas_teks;
        $digital_printing->kertas_cover = $request->kertas_cover;

        $digital_printing->created_by = Auth::user()->id;

        $digital_printing->text_front = $request->text_front;
        $digital_printing->text_back = $request->text_back;
        $digital_printing->text_print = $request->text_print;
        $digital_printing->text_jumlah_up = $request->text_jumlah_up;
        $digital_printing->text_print_cut = $request->text_print_cut;
        $digital_printing->text_print_cut_others = $request->text_print_cut_others;

        $digital_printing->cover_front = $request->cover_front;
        $digital_printing->cover_back = $request->cover_back;
        $digital_printing->cover_print = $request->cover_print;
        $digital_printing->cover_print_cut = $request->cover_print_cut;
        $digital_printing->cover_print_cut_others = $request->cover_print_cut_others;

        $digital_printing->finishing_1 = ($request->finishing_1 != null) ? $request->finishing_1_val : null;
        $digital_printing->finishing_2 = ($request->finishing_2 != null) ? $request->finishing_2_val : null;
        $digital_printing->finishing_3 = ($request->finishing_3 != null) ? $request->finishing_3_val : null;
        $digital_printing->finishing_4 = ($request->finishing_4 != null) ? $request->finishing_4_val : null;
        $digital_printing->finishing_5 = ($request->finishing_5 != null) ? $request->finishing_5_val : null;
        $digital_printing->finishing_6 = ($request->finishing_6 != null) ? $request->finishing_6_val : null;
        $digital_printing->finishing_7 = ($request->finishing_7 != null) ? $request->finishing_7_val : null;
        $digital_printing->finishing_8 = ($request->finishing_8 != null) ? $request->finishing_8_val : null;
        $digital_printing->finishing_9 = ($request->finishing_9 != null) ? $request->finishing_9_val : null;
        $digital_printing->finishing_10 = ($request->finishing_10 != null) ? $request->finishing_10_val : null;
        $digital_printing->finishing_11 = ($request->finishing_10 != null) ? $request->finishing_11_val : null;

        $digital_printing->binding_1 = ($request->binding_1 != null) ? $request->binding_1_val : null;
        $digital_printing->binding_2 = ($request->binding_2 != null) ? $request->binding_2_val : null;
        $digital_printing->binding_3 = ($request->binding_3 != null) ? $request->binding_3_val : null;
        $digital_printing->binding_4 = ($request->binding_4 != null) ? $request->binding_4_val : null;
        $digital_printing->binding_5 = ($request->binding_5 != null) ? $request->binding_5_val : null;
        $digital_printing->binding_6 = ($request->binding_6 != null) ? $request->binding_6_val : null;
        $digital_printing->binding_7 = ($request->binding_7 != null) ? $request->binding_7_val : null;
        $digital_printing->binding_8 = ($request->binding_8 != null) ? $request->binding_8_val : null;
        $digital_printing->binding_9 = ($request->binding_8 != null) ? $request->binding_9_val : null;

        $digital_printing->status = 'Not-initiated';
        $digital_printing->save();

        Helper::logSystemActivity('DIGITAL PRINTING', 'DIGITAL PRINTING Store');
        return redirect()->route('digital_printing')->with('custom_success', 'DIGITAL PRINTING has been Created Successfully !');
    }

    public function edit($id){
        if (!Auth::user()->hasPermissionTo('DIGITAL PRINTING Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $digital_printing = DigitalPrinting::find($id);
        $suppliers = Supplier::select('id', 'name')->get();
        Helper::logSystemActivity('DIGITAL PRINTING', 'DIGITAL PRINTING Update');
        return view('Production.DigitalPrinting.edit', compact('digital_printing', 'suppliers'));
    }

    public function view($id){
        if (!Auth::user()->hasPermissionTo('DIGITAL PRINTING View')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $digital_printing = DigitalPrinting::find($id);
        $suppliers = Supplier::select('id', 'name')->get();
        $users = User::all();
        $check_machines = DigitalPrintingDetail::where('machine', '=', $digital_printing->mesin)->where('digital_id',  '=', $id)->orWhere('machine', '=', $digital_printing->mesin_others)->orderby('id', 'DESC')->first();
        $details = DigitalPrintingDetail::where('digital_id',  '=', $id)->orderby('id', 'ASC')->get();
        $detailIds = $details->pluck('id')->toArray();
        $detailbs = DigitalPrintingDetailB::whereIn('digital_detail_id', $detailIds)->orderby('id', 'ASC')->get();
        Helper::logSystemActivity('DIGITAL PRINTING', 'DIGITAL PRINTING View');
        return view('Production.DigitalPrinting.view', compact('digital_printing', 'suppliers', 'users', 'check_machines', 'details', 'detailbs'));
    }

    public function print($id){
        $digital_printing = DigitalPrinting::find($id);
        $users = User::all();
        $check_machines = DigitalPrintingDetail::where('machine', '=', $digital_printing->mesin)->where('digital_id',  '=', $id)->orWhere('machine', '=', $digital_printing->mesin_others)->orderby('id', 'DESC')->first();
        $details = DigitalPrintingDetail::where('digital_id',  '=', $id)->orderby('id', 'ASC')->get();
        $detailIds = $details->pluck('id')->toArray();
        $detailbs = DigitalPrintingDetailB::whereIn('digital_detail_id', $detailIds)->orderby('id', 'ASC')->get();

        $pdf = PDF::loadView('Production.DigitalPrinting.pdf', [
            'digital_printing' => $digital_printing,
            'users' => $users,
            'check_machines' => $check_machines,
            'details' => $details,
            'detailbs' => $detailbs
        ]);
        return $pdf->stream('Production.DigitalPrinting.pdf');
    }

    public function update(Request $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('DIGITAL PRINTING Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $validator = null;

        $validatedData = $request->validate([
            'sale_order' => 'required',
            'date' => 'required',
            'jumlah_mukasurat' => 'required',
            'kuantiti_waste' => 'required',
            'mesin' => 'required',
            'kategori_job' => 'required',
            'jenis_produk' => 'required',
            'kertas_teks' => 'required',
            'kertas_cover' => 'required'
        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $digital_printing = DigitalPrinting::find($id);
        $digital_printing->sale_order_id = $request->sale_order;
        $digital_printing->date = $request->date;
        $digital_printing->jumlah_mukasurat = $request->jumlah_mukasurat;
        $digital_printing->kuantiti_waste = $request->kuantiti_waste;
        $digital_printing->remarks = $request->remarks;
        $digital_printing->mesin = $request->mesin;
        $digital_printing->mesin_others = $request->mesin_others;

        $digital_printing->kategori_job = $request->kategori_job;
        $digital_printing->jenis_produk = $request->jenis_produk;
        $digital_printing->jenis_produk_others = $request->jenis_produk_others;
        $digital_printing->kertas_teks = $request->kertas_teks;
        $digital_printing->kertas_cover = $request->kertas_cover;

        $digital_printing->created_by = Auth::user()->id;

        $digital_printing->text_front = $request->text_front;
        $digital_printing->text_back = $request->text_back;
        $digital_printing->text_print = $request->text_print;
        $digital_printing->text_jumlah_up = $request->text_jumlah_up;
        $digital_printing->text_print_cut = $request->text_print_cut;
        $digital_printing->text_print_cut_others = $request->text_print_cut_others;

        $digital_printing->cover_front = $request->cover_front;
        $digital_printing->cover_back = $request->cover_back;
        $digital_printing->cover_print = $request->cover_print;
        $digital_printing->cover_print_cut = $request->cover_print_cut;
        $digital_printing->cover_print_cut_others = $request->cover_print_cut_others;

        $digital_printing->finishing_1 = ($request->finishing_1 != null) ? $request->finishing_1_val : null;
        $digital_printing->finishing_2 = ($request->finishing_2 != null) ? $request->finishing_2_val : null;
        $digital_printing->finishing_3 = ($request->finishing_3 != null) ? $request->finishing_3_val : null;
        $digital_printing->finishing_4 = ($request->finishing_4 != null) ? $request->finishing_4_val : null;
        $digital_printing->finishing_5 = ($request->finishing_5 != null) ? $request->finishing_5_val : null;
        $digital_printing->finishing_6 = ($request->finishing_6 != null) ? $request->finishing_6_val : null;
        $digital_printing->finishing_7 = ($request->finishing_7 != null) ? $request->finishing_7_val : null;
        $digital_printing->finishing_8 = ($request->finishing_8 != null) ? $request->finishing_8_val : null;
        $digital_printing->finishing_9 = ($request->finishing_9 != null) ? $request->finishing_9_val : null;
        $digital_printing->finishing_10 = ($request->finishing_10 != null) ? $request->finishing_10_val : null;
        $digital_printing->finishing_11 = ($request->finishing_10 != null) ? $request->finishing_11_val : null;

        $digital_printing->binding_1 = ($request->binding_1 != null) ? $request->binding_1_val : null;
        $digital_printing->binding_2 = ($request->binding_2 != null) ? $request->binding_2_val : null;
        $digital_printing->binding_3 = ($request->binding_3 != null) ? $request->binding_3_val : null;
        $digital_printing->binding_4 = ($request->binding_4 != null) ? $request->binding_4_val : null;
        $digital_printing->binding_5 = ($request->binding_5 != null) ? $request->binding_5_val : null;
        $digital_printing->binding_6 = ($request->binding_6 != null) ? $request->binding_6_val : null;
        $digital_printing->binding_7 = ($request->binding_7 != null) ? $request->binding_7_val : null;
        $digital_printing->binding_8 = ($request->binding_8 != null) ? $request->binding_8_val : null;
        $digital_printing->binding_9 = ($request->binding_8 != null) ? $request->binding_9_val : null;

        if($digital_printing->status == 'Paused'){
            $digital_printing->status = 'Paused';
        }else{
            $digital_printing->status = 'Not-initiated';
        }
        $digital_printing->save();

        Helper::logSystemActivity('DIGITAL PRINTING', 'DIGITAL PRINTING Update');
        return redirect()->route('digital_printing')->with('custom_success', 'DIGITAL PRINTING has been Updated Successfully !');
    }

    public function proses($id){
        if (!Auth::user()->hasPermissionTo('DIGITAL PRINTING Proses')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $digital_printing = DigitalPrinting::find($id);
        $users = User::all();
        $suppliers = Supplier::select('id', 'name')->get();
        $check_machines = DigitalPrintingDetail::where('machine', '=', $digital_printing->mesin)->where('digital_id',  '=', $id)->orWhere('machine', '=', $digital_printing->mesin_others)->orderby('id', 'DESC')->first();
        $details = DigitalPrintingDetail::where('digital_id',  '=', $id)->orderby('id', 'ASC')->get();
        $detailIds = $details->pluck('id')->toArray();
        $detailbs = DigitalPrintingDetailB::whereIn('digital_detail_id', $detailIds)->orderby('id', 'ASC')->get();
        Helper::logSystemActivity('DIGITAL PRINTING', 'DIGITAL PRINTING Update');
        return view('Production.DigitalPrinting.proses', compact('digital_printing', 'suppliers', 'users', 'check_machines', 'details', 'detailbs'));
    }

    public function proses_update(Request $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('DIGITAL PRINTING Proses')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $storedData = json_decode($request->input('details'), true);
        $digital_printing = DigitalPrinting::find($id);
        $digital_printing->operator = json_encode($request->operator);
        $digital_printing->save();

        $details = DigitalPrintingDetail::where('digital_id',  '=', $id)->orderby('id', 'ASC')->get();
        $detailIds = $details->pluck('id')->toArray();
        DigitalPrintingDetailB::whereIn('digital_detail_id', $detailIds)->delete();

        foreach($storedData as $key => $value){
            if ($value != null) {
                $detail = new DigitalPrintingDetailB();
                $detail->digital_detail_id = $value['hiddenId'] ?? null;
                $detail->last_print = $value['last_print'] ?? null;
                $detail->waste_print = $value['waste_print'] ?? null;
                $detail->rejection = $value['rejection'] ?? null;
                $detail->good_count = $value['good_count'] ?? null;
                $detail->meter_click = $value['meter_click'] ?? null;
                $detail->check_operator_text = $value['check_operator_text'] ?? null;
                $detail->save();
            }
        }
        Helper::logSystemActivity('DIGITAL PRINTING', 'DIGITAL PRINTING Proses Update');
        return redirect()->route('digital_printing')->with('custom_success', 'DIGITAL PRINTING has been Proses Updated Successfully !');
    }

    public function verify($id){
        if (!Auth::user()->hasPermissionTo('DIGITAL PRINTING Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $digital_printing = DigitalPrinting::find($id);
        $users = User::all();
        $suppliers = Supplier::select('id', 'name')->get();
        $check_machines = DigitalPrintingDetail::where('machine', '=', $digital_printing->mesin)->where('digital_id',  '=', $id)->orWhere('machine', '=', $digital_printing->mesin_others)->orderby('id', 'DESC')->first();
        $details = DigitalPrintingDetail::where('digital_id',  '=', $id)->orderby('id', 'ASC')->get();
        $detailIds = $details->pluck('id')->toArray();
        $detailbs = DigitalPrintingDetailB::whereIn('digital_detail_id', $detailIds)->orderby('id', 'ASC')->get();
        Helper::logSystemActivity('DIGITAL PRINTING', 'DIGITAL PRINTING Update');
        return view('Production.DigitalPrinting.verify', compact('digital_printing', 'suppliers', 'users', 'check_machines', 'details', 'detailbs'));
    }

    public function approve_approve(Request $request, $id){
        if (!Auth::user()->hasPermissionTo('DIGITAL PRINTING Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $digital_printing = DigitalPrinting::find($id);
        $digital_printing->status = 'verified';
        $digital_printing->verified_by_date = Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y h:i:s A');
        $digital_printing->verified_by_user = Auth::user()->user_name;
        $digital_printing->verified_by_designation = (Auth::user()->designations != null) ? Auth::user()->designations->name : 'not assign';
        $digital_printing->verified_by_department = (Auth::user()->departments != null) ? Auth::user()->departments->name : 'not assign';
        $digital_printing->save();

        $storedData = json_decode($request->input('details'), true);

        foreach($storedData as $key => $value){
            if ($value != null) {
                $detail = DigitalPrintingDetailB::where('digital_detail_id', '=', $value['hiddenId'])->first();
                $detail->check_verify_text = $value['check_verify_text'] ?? null;
                $detail->save();
            }
        }

        Helper::logSystemActivity('DIGITAL PRINTING', 'DIGITAL PRINTING Verified');
        return redirect()->route('digital_printing')->with('custom_success', 'DIGITAL PRINTING has been Successfully Verified!');
    }

    public function approve_decline(Request $request, $id){
        if (!Auth::user()->hasPermissionTo('DIGITAL PRINTING Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $digital_printing = DigitalPrinting::find($id);
        $digital_printing->status = 'declined';
        $digital_printing->save();
        Helper::logSystemActivity('DIGITAL PRINTING', 'DIGITAL PRINTING Declined');
        return redirect()->route('digital_printing')->with('custom_success', 'DIGITAL PRINTING has been Successfully Declined!');
    }

    public function delete($id){
        if (!Auth::user()->hasPermissionTo('DIGITAL PRINTING Delete')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $digital_printing = DigitalPrinting::find($id);
        DigitalPrintingDetail::where('digital_id', $id)->delete();
        DigitalPrintingDetailB::where('digital_detail_id', $id)->delete();
        $digital_printing->delete();
        Helper::logSystemActivity('DIGITAL PRINTING', 'DIGITAL PRINTING Delete');
        return redirect()->route('digital_printing')->with('custom_success', 'DIGITAL PRINTING has been Successfully Deleted!');
    }

    public function machine_starter(Request $request)
    {
        $ismachinestart = null;

        $JustSelected = DigitalPrinting::where('id', '=', $request->digital_id)->where('mesin' ,'=' , $request->machine)->orWhere('mesin_others' ,'=' , $request->machine)->orderby('id', 'DESC')->first();

        if(!empty($JustSelected)){
            $ismachinestart = DigitalPrintingDetail::where('end_time', '=', null)->where('machine', '=', $request->machine)->where('digital_id', '!=', $request->digital_id)->orderby('id', 'DESC')->first();
        }

        $alreadyexist = DigitalPrintingDetail::where('status', '=', 1)->where('machine', '=', $request->machine)->where('digital_id', '=', $request->digital_id)->orderby('id', 'DESC')->first();
        $alreadypaused = DigitalPrintingDetail::where('status', '=', 1)->where('machine', '=', $request->machine)->where('digital_id', '=', $request->digital_id)->orderby('id', 'DESC')->first();
        $stopped = DigitalPrintingDetail::where('machine', '=', $request->machine)->where('digital_id', '=', $request->digital_id)->where('status', '=', 3)->first();

        if (!$ismachinestart) {

            if ($request->status == 1 && !$alreadyexist && !$stopped) {
                DigitalPrintingDetail::create([
                    'machine' => $request->machine,
                    'digital_id' => $request->digital_id,
                    'status' => $request->status,
                    'start_time' => Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y h:i:s A')
                ]);
                $digital = DigitalPrinting::find($request->digital_id);
                $digital->status = 'Started';
                $digital->save();
                $check_machine = DigitalPrintingDetail::where('machine', '=', $request->machine)->where('digital_id',  '=', $request->digital_id)->orderby('id', 'DESC')->first();
                $details = DigitalPrintingDetail::where('digital_id',  '=', $request->digital_id)->orderby('id', 'ASC')->get();
                return response()->json([
                    'message' => 'Machine Started ' . Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y h:i:s A'),
                    'check_machine' => $check_machine,
                    'details' => $details
                ]);
            } else if ($request->status == 2 && $alreadypaused && !$stopped) {

                $mpo = DigitalPrintingDetail::where('machine', $request->machine)->where('digital_id', $request->digital_id)->where('end_time', '=', null)->orderby('id', 'DESC')->first();
                $mpo->status = $request->status;
                $mpo->end_time = Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y h:i:s A');
                $mpo->remarks = $request->remarks;
                $mpo->save();
                $start_time = Carbon::parse($mpo->start_time);
                $end_time = Carbon::parse($mpo->end_time);
                $duration = $end_time->diffInMinutes($start_time);
                $mpo->duration = $duration;
                $mpo->save();
                $digital = DigitalPrinting::find($request->digital_id);
                $digital->status = 'Paused';
                $digital->save();
                $check_machine = DigitalPrintingDetail::where('machine', '=', $request->machine)->where('digital_id',  '=', $request->digital_id)->orderby('id', 'DESC')->first();
                $details = DigitalPrintingDetail::where('digital_id',  '=', $request->digital_id)->orderby('id', 'ASC')->get();
                return response()->json([
                    'message' => 'Machine Paused ' . Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y h:i:s A'),
                    'check_machine' => $check_machine,
                    'details' => $details
                ]);
            } else if ($request->status == 3 && !$stopped) {
                $mpo = DigitalPrintingDetail::where('machine', $request->machine)->where('digital_id', $request->digital_id)->orderby('id', 'DESC')->first();
                $mpo->status = $request->status;
                $mpo->end_time = Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y h:i:s A');
                $mpo->save();
                $start_time = Carbon::parse($mpo->start_time);
                $end_time = Carbon::parse($mpo->end_time);
                $duration = $end_time->diffInMinutes($start_time);
                $mpo->duration = $duration;
                $mpo->save();
                $digital = DigitalPrinting::find($request->digital_id);
                $digital->status = 'Completed';
                $digital->save();
                $check_machine = DigitalPrintingDetail::where('machine', '=', $request->machine)->where('digital_id',  '=', $request->digital_id)->orderby('id', 'DESC')->first();
                $details = DigitalPrintingDetail::where('digital_id',  '=', $request->digital_id)->orderby('id', 'ASC')->get();
                return response()->json([
                    'message' => 'Machine Stopped ' . Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y h:i:s A'),
                    'check_machine' => $check_machine,
                    'details' => $details
                ]);
            }
        }else{
            $check_machine = DigitalPrintingDetail::where('machine', '=', $request->machine)->where('digital_id',  '=', $request->digital_id)->orderby('id', 'DESC')->first();
            $details = DigitalPrintingDetail::where('digital_id',  '=', $request->digital_id)->orderby('id', 'ASC')->get();
            return response()->json([
                'message' => 'Same Machine Is Running On Other Digital Printing!',
                'check_machine' => $check_machine,
                'details' => $details
            ]);
        }
    }
}
