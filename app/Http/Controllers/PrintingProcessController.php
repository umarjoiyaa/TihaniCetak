<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\PrintingProcess;
use App\Models\PrintingProcessDetail;
use App\Models\PrintingProcessDetailB;
use App\Models\Supplier;
use App\Models\User;
use App\Models\Text;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrintingProcessController extends Controller
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

            $query = PrintingProcess::select('id', 'text_id', 'machine', 'status')->with('text', 'text.sale_order');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->whereHas('text', function ($query) use ($searchLower) {
                            $query->where('date', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('text', function ($query) use ($searchLower) {
                            $query->where('sale_order.order_no', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('text', function ($query) use ($searchLower) {
                            $query->where('sale_order.customer', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('text', function ($query) use ($searchLower) {
                            $query->where('sale_order.kod_buku', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('text', function ($query) use ($searchLower) {
                            $query->where('sale_order.description', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('text', function ($query) use ($searchLower) {
                            $query->where('kuantiti_waste', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhere('machine', 'like', '%' . $searchLower . '%')
                        ->orWhere('status', 'like', '%' . $searchLower . '%');
                    // Add more columns as needed
                });
            }


            // Determine the column to sort by
            $results = null;

            if (!empty($columnsData)) {
                $sortableColumns = [
                    1 => 'text.date',
                    2 => 'text.sale_order_id',
                    3 => 'text.sale_order_id',
                    4 => 'text.sale_order_id',
                    5 => 'text.sale_order_id',
                    6 => 'text.kuantiti_waste',
                    7 => 'machine',
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
                                $q->whereHas('text', function ($query) use ($searchLower) {
                                    $query->where('date', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 2:
                                $q->whereHas('text', function ($query) use ($searchLower) {
                                    $query->where('sale_order.order_no', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 3:
                                $q->whereHas('text', function ($query) use ($searchLower) {
                                    $query->where('sale_order.customer', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 4:
                                $q->whereHas('text', function ($query) use ($searchLower) {
                                    $query->where('sale_order.kod_buku', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 5:
                                $q->whereHas('text', function ($query) use ($searchLower) {
                                    $query->where('sale_order.description', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 6:
                                $q->whereHas('text', function ($query) use ($searchLower) {
                                    $query->where('kuantiti_waste', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 7:
                                $q->where('machine', 'like', '%' . $searchLower . '%');
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
                    $actions = '<a class="dropdown-item" href="' . route('printing_process.proses', $row->id) . '">Edit</a><a class="dropdown-item" href="' . route('printing_process.view', $row->id) . '">View</a>';
                } else if ($row->status == 'Started') {
                    $row->status = '<span class="badge badge-success">Started</span>';
                    $actions = '<a class="dropdown-item" href="' . route('printing_process.proses', $row->id) . '">Edit</a><a class="dropdown-item" href="' . route('printing_process.view', $row->id) . '">View</a>';
                } else if ($row->status == 'Paused') {
                    $row->status = '<span class="badge badge-info">Paused</span>';
                    $actions = '<a class="dropdown-item" href="' . route('printing_process.proses', $row->id) . '">Edit</a><a class="dropdown-item" href="' . route('printing_process.view', $row->id) . '">View</a>';
                } else if ($row->status == 'Completed') {
                    $row->status = '<span class="badge badge-success">Completed</span>';
                    $actions = '<a class="dropdown-item" href="' . route('printing_process.verify', $row->id) . '">Verify</a><a class="dropdown-item" href="' . route('printing_process.view', $row->id) . '">View</a>';
                } else if ($row->status == 'declined') {
                    $row->status = '<span class="badge badge-danger">Declined</span>';
                    $actions = '<a class="dropdown-item" href="' . route('printing_process.verify', $row->id) . '">Verify</a><a class="dropdown-item" href="' . route('printing_process.view', $row->id) . '">View</a>';
                } else if ($row->status == 'verified') {
                    $row->status = '<span class="badge badge-success">Verified</span>';
                    $actions = '<a class="dropdown-item" href="' . route('printing_process.view', $row->id) . '">View</a>';
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

            $query = PrintingProcess::select('id', 'text_id', 'machine', 'status')->with('text', 'text.sale_order');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->whereHas('text', function ($query) use ($searchLower) {
                            $query->where('date', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('text', function ($query) use ($searchLower) {
                            $query->where('sale_order.order_no', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('text', function ($query) use ($searchLower) {
                            $query->where('sale_order.customer', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('text', function ($query) use ($searchLower) {
                            $query->where('sale_order.kod_buku', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('text', function ($query) use ($searchLower) {
                            $query->where('sale_order.description', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('text', function ($query) use ($searchLower) {
                            $query->where('kuantiti_waste', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhere('machine', 'like', '%' . $searchLower . '%')
                        ->orWhere('status', 'like', '%' . $searchLower . '%');
                    // Add more columns as needed
                });
            }


            $sortableColumns = [
                1 => 'text.date',
                2 => 'text.sale_order_id',
                3 => 'text.sale_order_id',
                4 => 'text.sale_order_id',
                5 => 'text.sale_order_id',
                6 => 'text.kuantiti_waste',
                7 => 'machine',
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
                    $actions = '<a class="dropdown-item" href="' . route('printing_process.proses', $row->id) . '">Edit</a><a class="dropdown-item" href="' . route('printing_process.view', $row->id) . '">View</a>';
                } else if ($row->status == 'Started') {
                    $row->status = '<span class="badge badge-success">Started</span>';
                    $actions = '<a class="dropdown-item" href="' . route('printing_process.proses', $row->id) . '">Edit</a><a class="dropdown-item" href="' . route('printing_process.view', $row->id) . '">View</a>';
                } else if ($row->status == 'Paused') {
                    $row->status = '<span class="badge badge-info">Paused</span>';
                    $actions = '<a class="dropdown-item" href="' . route('printing_process.proses', $row->id) . '">Edit</a><a class="dropdown-item" href="' . route('printing_process.view', $row->id) . '">View</a>';
                } else if ($row->status == 'Completed') {
                    $row->status = '<span class="badge badge-success">Completed</span>';
                    $actions = '<a class="dropdown-item" href="' . route('printing_process.verify', $row->id) . '">Verify</a><a class="dropdown-item" href="' . route('printing_process.view', $row->id) . '">View</a>';
                } else if ($row->status == 'declined') {
                    $row->status = '<span class="badge badge-danger">Declined</span>';
                    $actions = '<a class="dropdown-item" href="' . route('printing_process.verify', $row->id) . '">Verify</a><a class="dropdown-item" href="' . route('printing_process.view', $row->id) . '">View</a>';
                } else if ($row->status == 'verified') {
                    $row->status = '<span class="badge badge-success">Verified</span>';
                    $actions = '<a class="dropdown-item" href="' . route('printing_process.view', $row->id) . '">View</a>';
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
            Auth::user()->hasPermissionTo('PRINTING PROCESS List') ||
            Auth::user()->hasPermissionTo('PRINTING PROCESS Update') ||
            Auth::user()->hasPermissionTo('PRINTING PROCESS View')
        ) {
            Helper::logSystemActivity('PRINTING PROCESS', 'PRINTING PROCESS List');
            return view('Production.PrintingProcess.index');
        }
        return back()->with('custom_errors', 'You don`t have Right Permission');
    }

    public function view($id){
        if (!Auth::user()->hasPermissionTo('PRINTING PROCESS View')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $printing_process = PrintingProcess::find($id);
        $users = User::all();
        $check_machines = PrintingProcessDetail::where('machine', '=', $printing_process->text->mesin)->where('printing_id',  '=', $id)->orderby('id', 'DESC')->first();
        $details = PrintingProcessDetail::where('printing_id',  '=', $id)->orderby('id', 'ASC')->get();
        $detailIds = $details->pluck('id')->toArray();
        $detailbs = PrintingProcessDetailB::whereIn('printing_detail_id', $detailIds)->orderby('id', 'ASC')->get();
        Helper::logSystemActivity('PRINTING PROCESS', 'PRINTING PROCESS Update');
        return view('Production.PrintingProcess.view', compact('printing_process', 'users', 'check_machines', 'details', 'detailbs'));
    }

    public function proses($id){
        if (!Auth::user()->hasPermissionTo('PRINTING PROCESS Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $printing_process = PrintingProcess::find($id);
        $users = User::all();
        $check_machines = PrintingProcessDetail::where('machine', '=', $printing_process->text->mesin)->where('printing_id',  '=', $id)->orderby('id', 'DESC')->first();
        $details = PrintingProcessDetail::where('printing_id',  '=', $id)->orderby('id', 'ASC')->get();
        $detailIds = $details->pluck('id')->toArray();
        $suppliers = Supplier::select('id', 'name')->get();
        $detailbs = PrintingProcessDetailB::whereIn('printing_detail_id', $detailIds)->orderby('id', 'ASC')->get();
        Helper::logSystemActivity('PRINTING PROCESS', 'PRINTING PROCESS Update');
        return view('Production.PrintingProcess.edit', compact('suppliers','printing_process', 'users', 'check_machines', 'details', 'detailbs'));
    }

    public function proses_update(Request $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('PRINTING PROCESS Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $storedData = json_decode($request->input('details'), true);
        $printing_process = PrintingProcess::find($id);
        $printing_process->operator = json_encode($request->operator);
        $printing_process->save();

        $details = PrintingProcessDetail::where('printing_id',  '=', $id)->orderby('id', 'ASC')->get();
        $detailIds = $details->pluck('id')->toArray();
        PrintingProcessDetailB::whereIn('printing_detail_id', $detailIds)->delete();

        foreach($storedData as $key => $value){
            $detail = new PrintingProcessDetailB();
            $detail->printing_detail_id = $value['hiddenId'] ?? null;
            $detail->section_no = $value['section_no'] ?? null;
            $detail->side = $value['side'] ?? null;
            $detail->last_print = $value['last_print'] ?? null;
            $detail->waste_paper = $value['waste_paper'] ?? null;
            $detail->rejection = $value['rejection'] ?? null;
            $detail->good_count = $value['good_count'] ?? null;
            $detail->check_operator_text = $value['check_operator_text'] ?? null;
            $detail->save();
        }
        Helper::logSystemActivity('PRINTING PROCESS', 'PRINTING PROCESS Proses Update');
        return redirect()->route('printing_process')->with('custom_success', 'PRINTING PROCESS has been Proses Updated Successfully !');
    }

    public function verify($id){
        if (!Auth::user()->hasPermissionTo('PRINTING PROCESS Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $printing_process = PrintingProcess::find($id);
        $users = User::all();
        $check_machines = PrintingProcessDetail::where('machine', '=', $printing_process->text->mesin)->where('printing_id',  '=', $id)->orderby('id', 'DESC')->first();
        $details = PrintingProcessDetail::where('printing_id',  '=', $id)->orderby('id', 'ASC')->get();
        $detailIds = $details->pluck('id')->toArray();
        $detailbs = PrintingProcessDetailB::whereIn('printing_detail_id', $detailIds)->orderby('id', 'ASC')->get();
        Helper::logSystemActivity('PRINTING PROCESS', 'PRINTING PROCESS Update');
        return view('Production.PrintingProcess.verify', compact('printing_process', 'users', 'check_machines', 'details', 'detailbs'));
    }

    public function approve_approve(Request $request, $id){
        if (!Auth::user()->hasPermissionTo('PRINTING PROCESS Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $printing_process = PrintingProcess::find($id);
        $printing_process->status = 'verified';
        $printing_process->verified_by_date = Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y h:i:s A');
        $printing_process->verified_by_user = Auth::user()->user_name;
        $printing_process->verified_by_designation = (Auth::user()->designations != null) ? Auth::user()->designations->name : 'not assign';
        $printing_process->verified_by_department = (Auth::user()->departments != null) ? Auth::user()->departments->name : 'not assign';
        $printing_process->save();

        $storedData = json_decode($request->input('details'), true);
        foreach($storedData as $key => $value){
            if ($value != null) {
                $detail = PrintingProcessDetailB::where('printing_detail_id', '=', $value['hiddenId'])->first();
                $detail->check_verify_text = $value['check_verify_text'] ?? null;
                $detail->save();
            }
        }

        Helper::logSystemActivity('PRINTING PROCESS', 'PRINTING PROCESS Verified');
        return redirect()->route('printing_process')->with('custom_success', 'PRINTING PROCESS has been Successfully Verified!');
    }

    public function approve_decline(Request $request, $id){
        if (!Auth::user()->hasPermissionTo('PRINTING PROCESS Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $printing_process = PrintingProcess::find($id);
        $printing_process->status = 'declined';
        $printing_process->save();
        Helper::logSystemActivity('PRINTING PROCESS', 'PRINTING PROCESS Declined');
        return redirect()->route('printing_process')->with('custom_success', 'PRINTING PROCESS has been Successfully Declined!');
    }

    public function machine_starter(Request $request)
    {
        $ismachinestart = null;

        $JustSelected = PrintingProcess::where('id', '=', $request->printing_id)->where('machine' ,'=' , $request->machine)->orderby('id', 'DESC')->first();

        if(!empty($JustSelected)){
            $ismachinestart = PrintingProcessDetail::where('end_time', '=', null)->where('machine', '=', $request->machine)->where('printing_id', '!=', $request->printing_id)->orderby('id', 'DESC')->first();
        }

        $alreadyexist = PrintingProcessDetail::where('status', '=', 1)->where('machine', '=', $request->machine)->where('printing_id', '=', $request->printing_id)->orderby('id', 'DESC')->first();
        $alreadypaused = PrintingProcessDetail::where('status', '=', 1)->where('machine', '=', $request->machine)->where('printing_id', '=', $request->printing_id)->orderby('id', 'DESC')->first();
        $stopped = PrintingProcessDetail::where('machine', '=', $request->machine)->where('printing_id', '=', $request->printing_id)->where('status', '=', 3)->first();

        if (!$ismachinestart) {

            if ($request->status == 1 && !$alreadyexist && !$stopped) {

                PrintingProcessDetail::create([
                    'machine' => $request->machine,
                    'printing_id' => $request->printing_id,
                    'status' => $request->status,
                    'operator' => json_encode($request->operator),
                    'start_time' => Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y h:i:s A')
                ]);
                $digital = PrintingProcess::find($request->printing_id);
                $digital->status = 'Started';
                $digital->save();
                $check_machine = PrintingProcessDetail::where('machine', '=', $request->machine)->where('printing_id',  '=', $request->printing_id)->orderby('id', 'DESC')->first();
                $details = PrintingProcessDetail::where('printing_id',  '=', $request->printing_id)->orderby('id', 'ASC')->get();
                return response()->json([
                    'message' => 'Machine Started ' . Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y h:i:s A'),
                    'check_machine' => $check_machine,
                    'details' => $details
                ]);
            } else if ($request->status == 2 && $alreadypaused && !$stopped) {

                $mpo = PrintingProcessDetail::where('machine', $request->machine)->where('printing_id', $request->printing_id)->where('end_time', '=', null)->orderby('id', 'DESC')->first();
                $mpo->status = $request->status;
                $mpo->end_time = Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y h:i:s A');
                $mpo->remarks = $request->remarks;
                $mpo->save();
                $start_time = Carbon::parse($mpo->start_time);
                $end_time = Carbon::parse($mpo->end_time);
                $duration = $end_time->diffInMinutes($start_time);
                $mpo->duration = $duration;
                $mpo->save();
                $digital = PrintingProcess::find($request->printing_id);
                $digital->status = 'Paused';
                $digital->save();
                $check_machine = PrintingProcessDetail::where('machine', '=', $request->machine)->where('printing_id',  '=', $request->printing_id)->orderby('id', 'DESC')->first();
                $details = PrintingProcessDetail::where('printing_id',  '=', $request->printing_id)->orderby('id', 'ASC')->get();
                return response()->json([
                    'message' => 'Machine Paused ' . Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y h:i:s A'),
                    'check_machine' => $check_machine,
                    'details' => $details
                ]);
            } else if ($request->status == 3 && !$stopped) {
                $mpo = PrintingProcessDetail::where('machine', $request->machine)->where('printing_id', $request->printing_id)->orderby('id', 'DESC')->first();
                $mpo->status = $request->status;
                $mpo->end_time = Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y h:i:s A');
                $mpo->save();
                $start_time = Carbon::parse($mpo->start_time);
                $end_time = Carbon::parse($mpo->end_time);
                $duration = $end_time->diffInMinutes($start_time);
                $mpo->duration = $duration;
                $mpo->save();
                $digital = PrintingProcess::find($request->printing_id);
                $digital->status = 'Completed';
                $digital->save();
                $records = PrintingProcess::where('text_id', '=', $digital->text_id)->get();
                if ($records->every(fn ($record) => $record->status === 'Completed')) {
                    Text::where('id', $digital->text_id)->update(['status' => 'Completed']);
                }
                $check_machine = PrintingProcessDetail::where('machine', '=', $request->machine)->where('printing_id',  '=', $request->printing_id)->orderby('id', 'DESC')->first();
                $details = PrintingProcessDetail::where('printing_id',  '=', $request->printing_id)->orderby('id', 'ASC')->get();
                return response()->json([
                    'message' => 'Machine Stopped ' . Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y h:i:s A'),
                    'check_machine' => $check_machine,
                    'details' => $details
                ]);
            }
        }else{
            $check_machine = PrintingProcessDetail::where('machine', '=', $request->machine)->where('printing_id',  '=', $request->printing_id)->orderby('id', 'DESC')->first();
            $details = PrintingProcessDetail::where('printing_id',  '=', $request->printing_id)->orderby('id', 'ASC')->get();
            return response()->json([
                'message' => 'Same Machine Is Running On Other Staple Bind!',
                'check_machine' => $check_machine,
                'details' => $details
            ]);
        }
    }
}
