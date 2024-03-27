<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\LaporanProsesPenjilidanSaddle;
use App\Models\LaporanProsesPenjilidanSaddleC;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanProsesPenjilidanSaddleController extends Controller
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

            $query = LaporanProsesPenjilidanSaddle::select('id', 'sale_order_id', 'date', 'time', 'user_text', 'pembantu_text', 'status')->with('sale_order', 'senari_semak');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->where('date', 'like', '%' . $searchLower . '%')
                        ->orWhere('time', 'like', '%' . $searchLower . '%')
                        ->orWhere('user_text', 'like', '%' . $searchLower . '%')
                        ->orWhere('pembantu_text', 'like', '%' . $searchLower . '%')
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('order_no', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('kod_buku', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('description', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('size', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhere(function ($query) use ($searchLower) {
                            $query->whereHas('senari_semak', function ($q) use ($searchLower) {
                                $q->where('item_cover_text', 'like', '%' . $searchLower . '%');
                            })->orWhereDoesntHave('senari_semak');
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
                    2 => 'time',
                    3 => 'sale_order_id',
                    4 => 'sale_order_id',
                    5 => 'sale_order_id',
                    6 => 'sale_order_id',
                    7 => 'sale_order_id',
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
                                $q->whereHas('sale_order', function ($query) use ($searchLower) {
                                    $query->where('size', 'like', '%' . $searchLower . '%');
                                });
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
                    $actions = '<a class="dropdown-item" href="' . route('laporan_proses_penjilidan_saddle.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('laporan_proses_penjilidan_saddle.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('laporan_proses_penjilidan_saddle.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item"   id="swal-warning" data-delete="' . route('laporan_proses_penjilidan_saddle.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'verified') {
                    $row->status = '<span class="badge badge-success">Verified</span>';
                    $actions = '<a class="dropdown-item" href="' . route('laporan_proses_penjilidan_saddle.view', $row->id) . '">View</a>
                                <a class="dropdown-item"   id="swal-warning" data-delete="' . route('laporan_proses_penjilidan_saddle.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'declined') {
                    $row->status = '<span class="badge badge-danger">Declined</span>';
                    $actions = '<a class="dropdown-item" href="' . route('laporan_proses_penjilidan_saddle.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('laporan_proses_penjilidan_saddle.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('laporan_proses_penjilidan_saddle.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item"   id="swal-warning" data-delete="' . route('laporan_proses_penjilidan_saddle.delete', $row->id) . '">Delete</a>';
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

            $query = LaporanProsesPenjilidanSaddle::select('id', 'sale_order_id', 'date', 'time', 'user_text', 'pembantu_text', 'status')->with('sale_order', 'senari_semak');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->where('date', 'like', '%' . $searchLower . '%')
                        ->orWhere('time', 'like', '%' . $searchLower . '%')
                        ->orWhere('user_text', 'like', '%' . $searchLower . '%')
                        ->orWhere('pembantu_text', 'like', '%' . $searchLower . '%')
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('order_no', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('kod_buku', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('description', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('size', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhere(function ($query) use ($searchLower) {
                            $query->whereHas('senari_semak', function ($q) use ($searchLower) {
                                $q->where('item_cover_text', 'like', '%' . $searchLower . '%');
                            })->orWhereDoesntHave('senari_semak');
                        })
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
                7 => 'sale_order_id',
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
                    $actions = '<a class="dropdown-item" href="' . route('laporan_proses_penjilidan_saddle.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('laporan_proses_penjilidan_saddle.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('laporan_proses_penjilidan_saddle.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item"   id="swal-warning" data-delete="' . route('laporan_proses_penjilidan_saddle.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'verified') {
                    $row->status = '<span class="badge badge-success">Verified</span>';
                    $actions = '<a class="dropdown-item" href="' . route('laporan_proses_penjilidan_saddle.view', $row->id) . '">View</a>
                                <a class="dropdown-item"   id="swal-warning" data-delete="' . route('laporan_proses_penjilidan_saddle.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'declined') {
                    $row->status = '<span class="badge badge-danger">Declined</span>';
                    $actions = '<a class="dropdown-item" href="' . route('laporan_proses_penjilidan_saddle.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('laporan_proses_penjilidan_saddle.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('laporan_proses_penjilidan_saddle.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item"   id="swal-warning" data-delete="' . route('laporan_proses_penjilidan_saddle.delete', $row->id) . '">Delete</a>';
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
            Auth::user()->hasPermissionTo('LAPORAN PROSES PENJILIDAN SADDLE List') ||
            Auth::user()->hasPermissionTo('LAPORAN PROSES PENJILIDAN SADDLE Create') ||
            Auth::user()->hasPermissionTo('LAPORAN PROSES PENJILIDAN SADDLE Update') ||
            Auth::user()->hasPermissionTo('LAPORAN PROSES PENJILIDAN SADDLE View') ||
            Auth::user()->hasPermissionTo('LAPORAN PROSES PENJILIDAN SADDLE Delete') ||
            Auth::user()->hasPermissionTo('LAPORAN PROSES PENJILIDAN SADDLE Verify')
        ) {
            Helper::logSystemActivity('LAPORAN PROSES PENJILIDAN SADDLE', 'LAPORAN PROSES PENJILIDAN SADDLE List');
            return view('Mes.LaporanProsesPenjilidanSaddle.index');
        }
        return back()->with('custom_errors', 'You don`t have Right Permission');
    }

    public function create(){
        if (!Auth::user()->hasPermissionTo('LAPORAN PROSES PENJILIDAN SADDLE Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $users = User::all();
        Helper::logSystemActivity('LAPORAN PROSES PENJILIDAN SADDLE', 'LAPORAN PROSES PENJILIDAN SADDLE Create');
        return view('Mes.LaporanProsesPenjilidanSaddle.create', compact('users'));
    }

    public function store(Request $request)
    {
        if (!Auth::user()->hasPermissionTo('LAPORAN PROSES PENJILIDAN SADDLE Create')) {
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
               $userNames[] = $user->user_name;
            }
        }

        $userText = implode(', ', $userNames);

        $pembantuIds = $request->pembantu;
        $pembantuNames = [];

        foreach ($pembantuIds as $pembantuId) {
            $pembantu = User::find($pembantuId);
            if ($pembantu) {
               $pembantuNames[] = $pembantu->user_name;
            }
        }

        $pembantuText = implode(', ', $pembantuNames);

        $laporan_proses_penjilidan_saddle = new LaporanProsesPenjilidanSaddle();
        $laporan_proses_penjilidan_saddle->sale_order_id = $request->sale_order;
        $laporan_proses_penjilidan_saddle->date = $request->date;
        $laporan_proses_penjilidan_saddle->time = $timeIn12HourFormat;
        $laporan_proses_penjilidan_saddle->created_by = Auth::user()->id;

        $laporan_proses_penjilidan_saddle->user_id = json_encode($userIds);
        $laporan_proses_penjilidan_saddle->user_text = $userText;
        $laporan_proses_penjilidan_saddle->pembantu = json_encode($pembantuIds);
        $laporan_proses_penjilidan_saddle->pembantu_text = $pembantuText;

        $laporan_proses_penjilidan_saddle->b_1 = $request->b_1;
        $laporan_proses_penjilidan_saddle->b_2 = $request->b_2;
        $laporan_proses_penjilidan_saddle->b_3 = $request->b_3;
        $laporan_proses_penjilidan_saddle->b_4 = $request->b_4;
        $laporan_proses_penjilidan_saddle->b_5 = $request->b_5;
        $laporan_proses_penjilidan_saddle->b_6 = $request->b_6;
        $laporan_proses_penjilidan_saddle->b_7 = $request->b_7;
        $laporan_proses_penjilidan_saddle->b_8 = $request->b_8;

        $laporan_proses_penjilidan_saddle->status = 'checked';
        $laporan_proses_penjilidan_saddle->save();
        if($request->semasa != null){
        foreach($request->semasa as $value){
           $detail = new LaporanProsesPenjilidanSaddleC();
           $detail->penjilidan_id = $laporan_proses_penjilidan_saddle->id;
           $detail->c_1 = $value['1'] ?? null;
           $detail->c_2 = $value['2'] ?? null;
           $detail->c_3 = $value['3'] ?? null;
           $detail->c_4 = $value['4'] ?? null;
           $detail->c_5 = $value['5'] ?? null;
           $detail->c_6 = $value['6'] ?? null;
           $detail->c_7 = $value['7'] ?? null;
           $detail->c_8 = $value['8'] ?? null;
           $detail->c_9 = $value['9'] ?? null;
           $detail->c_10 = $value['10'] ?? null;
           $detail->save();
        }
    }


        Helper::logSystemActivity('LAPORAN PROSES PENJILIDAN SADDLE', 'LAPORAN PROSES PENJILIDAN SADDLE Store');
        return redirect()->route('laporan_proses_penjilidan_saddle')->with('custom_success', 'LAPORAN PROSES PENJILIDAN SADDLE has been Created Successfully !');
    }

    public function edit($id){
        if (!Auth::user()->hasPermissionTo('LAPORAN PROSES PENJILIDAN SADDLE Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $laporan_proses_penjilidan_saddle = LaporanProsesPenjilidanSaddle::find($id);
        $details = LaporanProsesPenjilidanSaddleC::where('penjilidan_id', '=', $id)->get();
        $users = User::all();
        Helper::logSystemActivity('LAPORAN PROSES PENJILIDAN SADDLE', 'LAPORAN PROSES PENJILIDAN SADDLE Update');
        return view('Mes.LaporanProsesPenjilidanSaddle.edit', compact('laporan_proses_penjilidan_saddle', 'users', 'details'));
    }

    public function view($id){
        if (!Auth::user()->hasPermissionTo('LAPORAN PROSES PENJILIDAN SADDLE View')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $laporan_proses_penjilidan_saddle = LaporanProsesPenjilidanSaddle::find($id);
        $details = LaporanProsesPenjilidanSaddleC::where('penjilidan_id', '=', $id)->get();
        $users = User::all();
        Helper::logSystemActivity('LAPORAN PROSES PENJILIDAN SADDLE', 'LAPORAN PROSES PENJILIDAN SADDLE View');
        return view('Mes.LaporanProsesPenjilidanSaddle.view', compact('laporan_proses_penjilidan_saddle', 'users', 'details'));
    }

    public function update(Request $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('LAPORAN PROSES PENJILIDAN SADDLE Update')) {
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
               $userNames[] = $user->user_name;
            }
        }

        $userText = implode(', ', $userNames);

        $pembantuIds = $request->pembantu;
        $pembantuNames = [];

        foreach ($pembantuIds as $pembantuId) {
            $pembantu = User::find($pembantuId);
            if ($pembantu) {
               $pembantuNames[] = $pembantu->user_name;
            }
        }

        $pembantuText = implode(', ', $pembantuNames);

        $laporan_proses_penjilidan_saddle = LaporanProsesPenjilidanSaddle::find($id);
        $laporan_proses_penjilidan_saddle->sale_order_id = $request->sale_order;
        $laporan_proses_penjilidan_saddle->date = $request->date;
        $laporan_proses_penjilidan_saddle->time = $timeIn12HourFormat;
        $laporan_proses_penjilidan_saddle->created_by = Auth::user()->id;

        $laporan_proses_penjilidan_saddle->user_id = json_encode($userIds);
        $laporan_proses_penjilidan_saddle->user_text = $userText;
        $laporan_proses_penjilidan_saddle->pembantu = json_encode($pembantuIds);
        $laporan_proses_penjilidan_saddle->pembantu_text = $pembantuText;

        $laporan_proses_penjilidan_saddle->b_1 = $request->b_1;
        $laporan_proses_penjilidan_saddle->b_2 = $request->b_2;
        $laporan_proses_penjilidan_saddle->b_3 = $request->b_3;
        $laporan_proses_penjilidan_saddle->b_4 = $request->b_4;
        $laporan_proses_penjilidan_saddle->b_5 = $request->b_5;
        $laporan_proses_penjilidan_saddle->b_6 = $request->b_6;
        $laporan_proses_penjilidan_saddle->b_7 = $request->b_7;
        $laporan_proses_penjilidan_saddle->b_8 = $request->b_8;

        $laporan_proses_penjilidan_saddle->status = 'checked';
        $laporan_proses_penjilidan_saddle->save();

        LaporanProsesPenjilidanSaddleC::where('penjilidan_id', '=', $id)->delete();

        if($request->semasa != null){
            foreach($request->semasa as $value){
               $detail = new LaporanProsesPenjilidanSaddleC();
               $detail->penjilidan_id = $laporan_proses_penjilidan_saddle->id;
               $detail->c_1 = $value['1'] ?? null;
               $detail->c_2 = $value['2'] ?? null;
               $detail->c_3 = $value['3'] ?? null;
               $detail->c_4 = $value['4'] ?? null;
               $detail->c_5 = $value['5'] ?? null;
               $detail->c_6 = $value['6'] ?? null;
               $detail->c_7 = $value['7'] ?? null;
               $detail->c_8 = $value['8'] ?? null;
               $detail->c_9 = $value['9'] ?? null;
               $detail->c_10 = $value['10'] ?? null;
               $detail->save();
            }
        }

        Helper::logSystemActivity('LAPORAN PROSES PENJILIDAN SADDLE', 'LAPORAN PROSES PENJILIDAN SADDLE Update');
        return redirect()->route('laporan_proses_penjilidan_saddle')->with('custom_success', 'LAPORAN PROSES PENJILIDAN SADDLE has been Updated Successfully !');
    }

    public function verify($id){
        if (!Auth::user()->hasPermissionTo('LAPORAN PROSES PENJILIDAN SADDLE Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $laporan_proses_penjilidan_saddle = LaporanProsesPenjilidanSaddle::find($id);
        $details = LaporanProsesPenjilidanSaddleC::where('penjilidan_id', '=', $id)->get();
        $users = User::all();
        Helper::logSystemActivity('LAPORAN PROSES PENJILIDAN SADDLE', 'LAPORAN PROSES PENJILIDAN SADDLE Update');
        return view('Mes.LaporanProsesPenjilidanSaddle.verify', compact('laporan_proses_penjilidan_saddle', 'users', 'details'));
    }

    public function approve_approve(Request $request, $id){
        if (!Auth::user()->hasPermissionTo('LAPORAN PROSES PENJILIDAN SADDLE Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $laporan_proses_penjilidan_saddle = LaporanProsesPenjilidanSaddle::find($id);
        $laporan_proses_penjilidan_saddle->status = 'verified';
        $laporan_proses_penjilidan_saddle->verified_by_date = Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y h:i:s A');
        $laporan_proses_penjilidan_saddle->verified_by_user = Auth::user()->user_name;
        $laporan_proses_penjilidan_saddle->verified_by_designation = (Auth::user()->designations != null) ? Auth::user()->designations->name : 'not assign';
        $laporan_proses_penjilidan_saddle->verified_by_department = (Auth::user()->departments != null) ? Auth::user()->departments->name : 'not assign';
        $laporan_proses_penjilidan_saddle->save();

        foreach($request->semasa as $key => $value){
            $detail = LaporanProsesPenjilidanSaddleC::find($key);
            $detail->c_10 = $value['1'] ?? null;
            $detail->save();
         }

        Helper::logSystemActivity('LAPORAN PROSES PENJILIDAN SADDLE', 'LAPORAN PROSES PENJILIDAN SADDLE Verified');
        return redirect()->route('laporan_proses_penjilidan_saddle')->with('custom_success', 'LAPORAN PROSES PENJILIDAN SADDLE has been Successfully Verified!');
    }

    public function approve_decline(Request $request, $id){
        if (!Auth::user()->hasPermissionTo('LAPORAN PROSES PENJILIDAN SADDLE Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $laporan_proses_penjilidan_saddle = LaporanProsesPenjilidanSaddle::find($id);
        $laporan_proses_penjilidan_saddle->status = 'declined';
        $laporan_proses_penjilidan_saddle->save();
        Helper::logSystemActivity('LAPORAN PROSES PENJILIDAN SADDLE', 'LAPORAN PROSES PENJILIDAN SADDLE Declined');
        return redirect()->route('laporan_proses_penjilidan_saddle')->with('custom_success', 'LAPORAN PROSES PENJILIDAN SADDLE has been Successfully Declined!');
    }

    public function delete($id){
        if (!Auth::user()->hasPermissionTo('LAPORAN PROSES PENJILIDAN SADDLE Delete')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $laporan_proses_penjilidan_saddle = LaporanProsesPenjilidanSaddle::find($id);
        LaporanProsesPenjilidanSaddleC::where('penjilidan_id', '=', $id)->delete();
        $laporan_proses_penjilidan_saddle->delete();
        Helper::logSystemActivity('LAPORAN PROSES PENJILIDAN SADDLE', 'LAPORAN PROSES PENJILIDAN SADDLE Delete');
        return redirect()->route('laporan_proses_penjilidan_saddle')->with('custom_success', 'LAPORAN PROSES PENJILIDAN SADDLE has been Successfully Deleted!');
    }
}
