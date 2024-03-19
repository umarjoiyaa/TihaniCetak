<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\LaporanProsesPenjilidan;
use App\Models\LaporanProsesPenjilidanC;
use App\Models\User;
use App\Models\SenariSemakCetak;
use App\Models\SaleOrder;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanProsesPenjilidanController extends Controller
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

            $query = LaporanProsesPenjilidan::select('id', 'sale_order_id', 'date','time','user_text', 'jenis', 'pembantu_text', 'status')->with('sale_order', 'senari_semak');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->where('date', 'like', '%' . $searchLower . '%')
                        ->orWhere('time', 'like', '%' . $searchLower . '%')

                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('order_no', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('kod_buku', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('description', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhere(function ($query) use ($searchLower) {
                            $query->whereHas('senari_semak', function ($q) use ($searchLower) {
                                $q->where('item_cover_text', 'like', '%' . $searchLower . '%');
                            })->orWhereDoesntHave('senari_semak');
                        })
                        ->orWhere('jenis', 'like', '%' . $searchLower . '%')
                        ->orWhere('user_text', 'like', '%' . $searchLower . '%')
                        ->orWhere('pembantu_text', 'like', '%' . $searchLower . '%')
                        ->orWhere('status', 'like', '%' . $searchLower . '%');
                    // Add more columns as needed
                });
            }
            // Determine the column to sort by
            $results = null;

            if (!empty($columnsData)) {
                $sortableColumns = [
                    1 => 'date',
                    2 => 'time',
                    3 => 'sale_order_id',
                    4 => 'sale_order_id',
                    5 => 'sale_order_id',
                    6 => 'sale_order_id',
                    7 => 'jenis',
                    8 => 'user_text',
                    9 => 'pembantu_text',
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
                                    $q->where('time', 'like', '%' . $searchLower . '%');
                                    break;
                            case 3:
                                $q->whereHas('sale_order', function ($query) use ($searchLower) {
                                    $query->where('order_no', 'like', '%' . $searchLower . '%');
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
                                $q->where(function ($query) use ($searchLower) {
                                    $query->whereHas('senari_semak', function ($q) use ($searchLower) {
                                        $q->where('item_cover_text', 'like', '%' . $searchLower . '%');
                                    })->orWhereDoesntHave('senari_semak');
                                });
                                break;
                            case 7:
                                $q->where('jenis', 'like', '%' . $searchLower . '%');
                                break;
                            case 8:
                                $q->where('user_text', 'like', '%' . $searchLower . '%');
                                break;
                            case 9:
                                $q->where('pembantu_text', 'like', '%' . $searchLower . '%');
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
                if ($row->status == 'checked') {
                    $row->status = '<span class="badge badge-warning">Checked</span>';
                    $actions = '<a class="dropdown-item" href="' . route('laporan_proses_penjilidan.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('laporan_proses_penjilidan.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('laporan_proses_penjilidan.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item"  id="swal-warning" data-delete="' . route('laporan_proses_penjilidan.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'verified') {
                    $row->status = '<span class="badge badge-success">Verified</span>';
                    $actions = '<a class="dropdown-item" href="' . route('laporan_proses_penjilidan.view', $row->id) . '">View</a>
                                <a class="dropdown-item"  id="swal-warning" data-delete="' . route('laporan_proses_penjilidan.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'declined') {
                    $row->status = '<span class="badge badge-danger">Declined</span>';
                    $actions = '<a class="dropdown-item" href="' . route('laporan_proses_penjilidan.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('laporan_proses_penjilidan.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('laporan_proses_penjilidan.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item"  id="swal-warning" data-delete="' . route('laporan_proses_penjilidan.delete', $row->id) . '">Delete</a>';
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

            $query = LaporanProsesPenjilidan::select('id', 'sale_order_id','time', 'date', 'user_text', 'jenis', 'pembantu_text', 'status')->with('sale_order', 'senari_semak');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->where('date', 'like', '%' . $searchLower . '%')
                        ->orWhere('time', 'like', '%' . $searchLower . '%')

                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('order_no', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('kod_buku', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('description', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhere(function ($query) use ($searchLower) {
                            $query->whereHas('senari_semak', function ($q) use ($searchLower) {
                                $q->where('item_cover_text', 'like', '%' . $searchLower . '%');
                            })->orWhereDoesntHave('senari_semak');
                        })
                        ->orWhere('jenis', 'like', '%' . $searchLower . '%')
                        ->orWhere('user_text', 'like', '%' . $searchLower . '%')
                        ->orWhere('pembantu_text', 'like', '%' . $searchLower . '%')
                        ->orWhere('status', 'like', '%' . $searchLower . '%');
                    // Add more columns as needed
                });
            }

            $sortableColumns = [
                1 => 'date',
                2 => 'time',
                3 => 'sale_order_id',
                4 => 'sale_order_id',
                5 => 'sale_order_id',
                6 => 'sale_order_id',
                7 => 'jenis',
                8 => 'user_text',
                9 => 'pembantu_text',
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
                if ($row->status == 'checked') {
                    $row->status = '<span class="badge badge-warning">Checked</span>';
                    $actions = '<a class="dropdown-item" href="' . route('laporan_proses_penjilidan.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('laporan_proses_penjilidan.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('laporan_proses_penjilidan.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item"  id="swal-warning" data-delete="' . route('laporan_proses_penjilidan.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'verified') {
                    $row->status = '<span class="badge badge-success">Verified</span>';
                    $actions = '<a class="dropdown-item" href="' . route('laporan_proses_penjilidan.view', $row->id) . '">View</a>
                                <a class="dropdown-item"  id="swal-warning" data-delete="' . route('laporan_proses_penjilidan.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'declined') {
                    $row->status = '<span class="badge badge-danger">Declined</span>';
                    $actions = '<a class="dropdown-item" href="' . route('laporan_proses_penjilidan.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('laporan_proses_penjilidan.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('laporan_proses_penjilidan.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item"  id="swal-warning" data-delete="' . route('laporan_proses_penjilidan.delete', $row->id) . '">Delete</a>';
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
            Auth::user()->hasPermissionTo('LAPORAN PROSES PENJILIDAN List') ||
            Auth::user()->hasPermissionTo('LAPORAN PROSES PENJILIDAN Create') ||
            Auth::user()->hasPermissionTo('LAPORAN PROSES PENJILIDAN Update') ||
            Auth::user()->hasPermissionTo('LAPORAN PROSES PENJILIDAN View') ||
            Auth::user()->hasPermissionTo('LAPORAN PROSES PENJILIDAN Delete') ||
            Auth::user()->hasPermissionTo('LAPORAN PROSES PENJILIDAN Verify')
        ) {
            Helper::logSystemActivity('LAPORAN PROSES PENJILIDAN', 'LAPORAN PROSES PENJILIDAN List');
            return view('Mes.LaporanProsesPenjilidan.index');
        }
        return back()->with('custom_errors', 'You don`t have Right Permission');
    }

    public function create(){
        if (!Auth::user()->hasPermissionTo('LAPORAN PROSES PENJILIDAN Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $users = User::all();
        Helper::logSystemActivity('LAPORAN PROSES PENJILIDAN', 'LAPORAN PROSES PENJILIDAN Create');
        return view('Mes.LaporanProsesPenjilidan.create', compact('users'));
    }

    public function sale_order_detail(Request $request)
    {
        $sale_order = SaleOrder::select('id', 'order_no', 'description', 'kod_buku', 'sale_order_qty', 'customer', 'pages_text', 'size', 'extra_stock', 'status')->where('id', $request->id)->first();
        $section = SenariSemakCetak::select('id', 'item_cover_text')->where('sale_order_id', $request->id)->first();
        return response()->json(['sale_order' => $sale_order, 'section' => $section]);
    }

    public function store(Request $request)
    {
        if (!Auth::user()->hasPermissionTo('LAPORAN PROSES PENJILIDAN Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $validator = null;

        $validatedData = $request->validate([
            'sale_order' => 'required',
            'date' => 'required',
            'time' => 'required',
            'user' => 'required',
            'pembantu' => 'required',
        ],[
            'user.required' => 'The operator field is required.',
        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $carbonTime = Carbon::createFromFormat('H:i', $request->time);
        $timeIn12HourFormat = $carbonTime->format('h:i A');


        $userIds = $request->user;
        $userNames = [];

        foreach ($userIds as $userId) {
            $user = User::find($userId);
            if ($user) {
               $userNames[] = $user->full_name;
            }
        }

        $userText = implode(', ', $userNames);

        $pembantuIds = $request->pembantu;
        $pembantuNames = [];

        foreach ($pembantuIds as $pembantuId) {
            $pembantu = User::find($pembantuId);
            if ($pembantu) {
               $pembantuNames[] = $pembantu->full_name;
            }
        }

        $pembantuText = implode(', ', $pembantuNames);

        $laporan_proses_penjilidan = new LaporanProsesPenjilidan();
        $laporan_proses_penjilidan->sale_order_id = $request->sale_order;
        $laporan_proses_penjilidan->date = $request->date;
        $laporan_proses_penjilidan->time = $timeIn12HourFormat;
        $laporan_proses_penjilidan->created_by = Auth::user()->id;

        $laporan_proses_penjilidan->jenis = $request->jenis;
        $laporan_proses_penjilidan->user_id = json_encode($userIds);
        $laporan_proses_penjilidan->user_text = $userText;
        $laporan_proses_penjilidan->pembantu = json_encode($pembantuIds);
        $laporan_proses_penjilidan->pembantu_text = $pembantuText;

        $laporan_proses_penjilidan->b_1 = $request->b_1;
        $laporan_proses_penjilidan->b_2 = $request->b_2;
        $laporan_proses_penjilidan->b_3 = $request->b_3;
        $laporan_proses_penjilidan->b_4 = $request->b_4;
        $laporan_proses_penjilidan->b_5 = $request->b_5;
        $laporan_proses_penjilidan->b_6 = $request->b_6;
        $laporan_proses_penjilidan->b_7 = $request->b_7;
        $laporan_proses_penjilidan->b_8 = $request->b_8;

        $laporan_proses_penjilidan->status = 'checked';
        $laporan_proses_penjilidan->save();
        if($request->semasa != null){
            foreach($request->semasa as $value){
                $detail = new LaporanProsesPenjilidanC();
                $detail->proses_penjilidan_id = $laporan_proses_penjilidan->id;
                $detail->c_1 = $value['1'] ?? null;
                $detail->c_2 = $value['2'] ?? null;
                $detail->c_3 = $value['3'] ?? null;
                $detail->c_4 = $value['4'] ?? null;
                $detail->c_5 = $value['5'] ?? null;
                $detail->c_6 = $value['6'] ?? null;
                $detail->c_7 = $value['7'] ?? null;
                $detail->c_8 = $value['8'] ?? null;
                $detail->save();
             }
        }


        Helper::logSystemActivity('LAPORAN PROSES PENJILIDAN', 'LAPORAN PROSES PENJILIDAN Store');
        return redirect()->route('laporan_proses_penjilidan')->with('custom_success', 'LAPORAN PROSES PENJILIDAN has been Created Successfully !');
    }

    public function edit($id){
        if (!Auth::user()->hasPermissionTo('LAPORAN PROSES PENJILIDAN Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $laporan_proses_penjilidan = LaporanProsesPenjilidan::find($id);
        $details = LaporanProsesPenjilidanC::where('proses_penjilidan_id', '=', $id)->get();
        $users = User::all();
        Helper::logSystemActivity('LAPORAN PROSES PENJILIDAN', 'LAPORAN PROSES PENJILIDAN Update');
        return view('Mes.LaporanProsesPenjilidan.edit', compact('laporan_proses_penjilidan', 'users', 'details'));
    }

    public function view($id){
        if (!Auth::user()->hasPermissionTo('LAPORAN PROSES PENJILIDAN View')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $laporan_proses_penjilidan = LaporanProsesPenjilidan::find($id);
        $details = LaporanProsesPenjilidanC::where('proses_penjilidan_id', '=', $id)->get();
        $users = User::all();
        Helper::logSystemActivity('LAPORAN PROSES PENJILIDAN', 'LAPORAN PROSES PENJILIDAN View');
        return view('Mes.LaporanProsesPenjilidan.view', compact('laporan_proses_penjilidan', 'users', 'details'));
    }

    public function update(Request $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('LAPORAN PROSES PENJILIDAN Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $validator = null;

        $validatedData = $request->validate([
            'sale_order' => 'required',
            'date' => 'required',
            'time' => 'required',
            'user' => 'required',
            'jenis' => 'required',
            'pembantu' => 'required',

        ],[
            'user.required' => 'The operator field is required.',
        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $userIds = $request->user;
        $userNames = [];

        foreach ($userIds as $userId) {
            $user = User::find($userId);
            if ($user) {
               $userNames[] = $user->full_name;
            }
        }
        $carbonTime = Carbon::createFromFormat('H:i', $request->time);
        $timeIn12HourFormat = $carbonTime->format('h:i A');

        $userText = implode(', ', $userNames);

        $pembantuIds = $request->pembantu;
        $pembantuNames = [];

        foreach ($pembantuIds as $pembantuId) {
            $pembantu = User::find($pembantuId);
            if ($pembantu) {
               $pembantuNames[] = $pembantu->full_name;
            }
        }

        $pembantuText = implode(', ', $pembantuNames);

        $laporan_proses_penjilidan = LaporanProsesPenjilidan::find($id);
        $laporan_proses_penjilidan->sale_order_id = $request->sale_order;
        $laporan_proses_penjilidan->date = $request->date;
        $laporan_proses_penjilidan->time = $timeIn12HourFormat;
        $laporan_proses_penjilidan->created_by = Auth::user()->id;

        $laporan_proses_penjilidan->jenis = $request->jenis;
        $laporan_proses_penjilidan->user_id = json_encode($userIds);
        $laporan_proses_penjilidan->user_text = $userText;
        $laporan_proses_penjilidan->pembantu = json_encode($pembantuIds);
        $laporan_proses_penjilidan->pembantu_text = $pembantuText;

        $laporan_proses_penjilidan->b_1 = $request->b_1;
        $laporan_proses_penjilidan->b_2 = $request->b_2;
        $laporan_proses_penjilidan->b_3 = $request->b_3;
        $laporan_proses_penjilidan->b_4 = $request->b_4;
        $laporan_proses_penjilidan->b_5 = $request->b_5;
        $laporan_proses_penjilidan->b_6 = $request->b_6;
        $laporan_proses_penjilidan->b_7 = $request->b_7;
        $laporan_proses_penjilidan->b_8 = $request->b_8;

        $laporan_proses_penjilidan->status = 'checked';
        $laporan_proses_penjilidan->save();

        LaporanProsesPenjilidanC::where('proses_penjilidan_id', '=', $id)->delete();

        if($request->semasa != null){
            foreach($request->semasa as $value){
                $detail = new LaporanProsesPenjilidanC();
                $detail->proses_penjilidan_id = $laporan_proses_penjilidan->id;
                $detail->c_1 = $value['1'] ?? null;
                $detail->c_2 = $value['2'] ?? null;
                $detail->c_3 = $value['3'] ?? null;
                $detail->c_4 = $value['4'] ?? null;
                $detail->c_5 = $value['5'] ?? null;
                $detail->c_6 = $value['6'] ?? null;
                $detail->c_7 = $value['7'] ?? null;
                $detail->c_8 = $value['8'] ?? null;
                $detail->save();
             }
        }

        Helper::logSystemActivity('LAPORAN PROSES PENJILIDAN', 'LAPORAN PROSES PENJILIDAN Update');
        return redirect()->route('laporan_proses_penjilidan')->with('custom_success', 'LAPORAN PROSES PENJILIDAN has been Updated Successfully !');
    }

    public function verify($id){
        if (!Auth::user()->hasPermissionTo('LAPORAN PROSES PENJILIDAN Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $laporan_proses_penjilidan = LaporanProsesPenjilidan::find($id);
        $details = LaporanProsesPenjilidanC::where('proses_penjilidan_id', '=', $id)->get();
        $users = User::all();
        Helper::logSystemActivity('LAPORAN PROSES PENJILIDAN', 'LAPORAN PROSES PENJILIDAN Update');
        return view('Mes.LaporanProsesPenjilidan.verify', compact('laporan_proses_penjilidan', 'users', 'details'));
    }

    public function approve_approve(Request $request, $id){
        if (!Auth::user()->hasPermissionTo('LAPORAN PROSES PENJILIDAN Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $laporan_proses_penjilidan = LaporanProsesPenjilidan::find($id);
        $laporan_proses_penjilidan->status = 'verified';
        $laporan_proses_penjilidan->verified_by_date = Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y h:i:s A');
        $laporan_proses_penjilidan->verified_by_user = Auth::user()->user_name;
        $laporan_proses_penjilidan->verified_by_designation = (Auth::user()->designations != null) ? Auth::user()->designations->name : 'not assign';
        $laporan_proses_penjilidan->verified_by_department = (Auth::user()->departments != null) ? Auth::user()->departments->name : 'not assign';
        $laporan_proses_penjilidan->save();

        foreach($request->semasa as $key => $value){
            $detail = LaporanProsesPenjilidanC::find($key);
            $detail->c_8 = $value['8'] ?? null;
            $detail->save();
         }

        Helper::logSystemActivity('LAPORAN PROSES PENJILIDAN', 'LAPORAN PROSES PENJILIDAN Verified');
        return redirect()->route('laporan_proses_penjilidan')->with('custom_success', 'LAPORAN PROSES PENJILIDAN has been Successfully Verified!');
    }

    public function approve_decline(Request $request, $id){
        if (!Auth::user()->hasPermissionTo('LAPORAN PROSES PENJILIDAN Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $laporan_proses_penjilidan = LaporanProsesPenjilidan::find($id);
        $laporan_proses_penjilidan->status = 'declined';
        $laporan_proses_penjilidan->save();
        Helper::logSystemActivity('LAPORAN PROSES PENJILIDAN', 'LAPORAN PROSES PENJILIDAN Declined');
        return redirect()->route('laporan_proses_penjilidan')->with('custom_success', 'LAPORAN PROSES PENJILIDAN has been Successfully Declined!');
    }

    public function delete($id){
        if (!Auth::user()->hasPermissionTo('LAPORAN PROSES PENJILIDAN Delete')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $laporan_proses_penjilidan = LaporanProsesPenjilidan::find($id);
        LaporanProsesPenjilidanC::where('proses_penjilidan_id', '=', $id)->delete();
        $laporan_proses_penjilidan->delete();
        Helper::logSystemActivity('LAPORAN PROSES PENJILIDAN', 'LAPORAN PROSES PENJILIDAN Delete');
        return redirect()->route('laporan_proses_penjilidan')->with('custom_success', 'LAPORAN PROSES PENJILIDAN has been Successfully Deleted!');
    }
}
