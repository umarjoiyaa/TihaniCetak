<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Dashboard;
use App\Models\Department;
use App\Models\Designation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        if (
            Auth::user()->hasPermissionTo('User List') ||
            Auth::user()->hasPermissionTo('User Create') ||
            Auth::user()->hasPermissionTo('User Update') ||
            Auth::user()->hasPermissionTo('User Delete') ||
            Auth::user()->hasPermissionTo('User View')
        ) {
            Helper::logSystemActivity('User', 'User List');
            return view("Setting.user.index");
        }
        return back()->with('custom_errors', 'You don`t have Right Permission');
    }

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

            $query = User::select('id', 'user_name', 'full_name', 'email', 'is_active');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->where('user_name', 'like', '%' . $searchLower . '%')
                        ->orWhere('full_name', 'like', '%' . $searchLower . '%')
                        ->orWhere('email', 'like', '%' . $searchLower . '%')
                        ->orWhere('is_active', 'like', '%' . $searchLower . '%');
                    // Add more columns as needed
                });
            }
            // Determine the column to sort by
            $results = null;

            if (!empty($columnsData)) {
                $sortableColumns = [
                    1 => 'user_name',
                    2 => 'full_name',
                    3 => 'email',
                    4 => 'is_active',
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
                                $q->where('user_name', 'like', '%' . $searchLower . '%');
                                break;
                            case 2:
                                $q->where('full_name', 'like', '%' . $searchLower . '%');
                                break;
                            case 3:
                                $q->where('email', 'like', '%' . $searchLower . '%');
                                break;
                            case 4:
                                $q->where('is_active', 'like', '%' . $searchLower . '%');
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
                $user = $results->skip($start)->take($length)->all();
            } else {
                $user = [];
            }

            $index = 0;
            foreach ($user as $row) {
                $row->sr_no = $start + $index + 1;
                if($row->is_active == 'yes'){
                    $row->active = '<span class="badge badge-success">'.$row->is_active.'</span>';
                }else{
                    $row->active = '<span class="badge badge-danger">'.$row->is_active.'</span>';
                }
                $row->action = '<div class="dropdown">
                    <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                    data-toggle="dropdown" id="dropdownMenuButton" type="button">Action <i class="fas fa-caret-down ml-1"></i></button>
                    <div  class="dropdown-menu tx-13">
                    <a class="dropdown-item" href="' . route('user.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('user.view', $row->id) . '">View</a>
                    <a class="dropdown-item"  id="swal-warning" data-delete="' . route('user.delete', $row->id) . '">Delete</a>
                    </div>
                </div>';
                $index++;
            }

            // // Continue with your response
            $usersWithoutAction = array_map(function ($row) {
                return $row;
            }, $user);

            return response()->json([
                'draw' => $draw,
                'recordsTotal' => $recordsTotal,
                'recordsFiltered' => $recordsTotal, // Total records after filtering
                'data' => array_values($usersWithoutAction),
            ]);
        } elseif ($request->ajax()) {

            $draw = $request->input('draw');
            $start = $request->input('start');
            $length = $request->input('length');
            $search = $request->input('search.value');
            $orderByColumnIndex = $request->input('order.0.column'); // Get the index of the column to sort by
            $orderByDirection = $request->input('order.0.dir'); // Get the sort direction ('asc' or 'desc')

            $query = User::select('id', 'user_name', 'full_name', 'email', 'is_active');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                    ->where('user_name', 'like', '%' . $searchLower . '%')
                    ->orWhere('full_name', 'like', '%' . $searchLower . '%')
                    ->orWhere('email', 'like', '%' . $searchLower . '%')
                    ->orWhere('is_active', 'like', '%' . $searchLower . '%');

                    // Add more columns as needed
                });
            }

            $sortableColumns = [
                1 => 'user_name',
                2 => 'full_name',
                3 => 'email',
                4 => 'is_active',
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

            $user = $query
                ->skip($start)
                ->take($length)
                ->get();

            $user->each(function ($row, $index)  use (&$start) {
                $row->sr_no = $start + $index + 1;
                if($row->is_active == 'yes'){
                    $row->active = '<span class="badge badge-success">'.$row->is_active.'</span>';
                }else{
                    $row->active = '<span class="badge badge-danger">'.$row->is_active.'</span>';
                }
                $row->action = '<div class="dropdown">
                    <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                    data-toggle="dropdown" id="dropdownMenuButton" type="button">Action <i class="fas fa-caret-down ml-1"></i></button>
                    <div  class="dropdown-menu tx-13">
                        <a class="dropdown-item" href="' . route('user.edit', $row->id) . '">Edit</a>
                        <a class="dropdown-item" href="' . route('user.view', $row->id) . '">View</a>
                        <a class="dropdown-item"  id="swal-warning" data-delete="' . route('user.delete', $row->id) . '">Delete</a>
                    </div>
                </div>';
            });

            return response()->json([
                'draw' => $draw,
                'recordsTotal' => $recordsTotal,
                'recordsFiltered' => $recordsTotal, // Total records after filtering
                'data' => $user,
            ]);
        }
    }

    public function create()
    {
        if (!Auth::user()->hasPermissionTo('User Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $roles = Role::select('id', 'name')->get();
        $departments = Department::select('id', 'name')->get();
        $designations = Designation::select('id', 'name')->get();
        Helper::logSystemActivity('User', 'User Create');
        return view("Setting.user.create", compact("roles", "departments", "designations"));
    }

    public function store(Request $request)
    {
        if (!Auth::user()->hasPermissionTo('User Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $this->validate($request, [
            'email' => [
                'required',
                Rule::unique('users', 'email')->whereNull('deleted_at'),
            ],
            'user_name' => 'required',
            'full_name' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        $user = new User();
        $user->full_name = $request->full_name;
        $user->email = $request->email;
        $user->user_name = $request->user_name;
        $user->contact_no = $request->phone_no;
        $user->department = $request->department;
        $user->designation = $request->designation;
        $user->is_active = ($request->is_active) ? 'yes' : 'no';
        $user->role_ids = json_encode($request->role);
        $user->password = Hash::make($request->password);
        $user->save();
        foreach($request->role as $role){
            $role_ = Role::find($role);
            $user->assignRole([$role_->name]);
        }
        Helper::logSystemActivity('User', 'User Store');
        return redirect()->route('user')->with('custom_success', 'User has been Succesfully Added!');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('User Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $user = User::find($id);
        $roles = Role::select('id', 'name')->get();
        $departments = Department::select('id', 'name')->get();
        $designations = Designation::select('id', 'name')->get();
        Helper::logSystemActivity('User', 'User Edit');
        return view("Setting.user.edit", compact("user", "roles", "departments", "designations"));
    }

    public function view(Request $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('User View')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $user = User::find($id);
        $roles = Role::select('id', 'name')->get();
        $departments = Department::select('id', 'name')->get();
        $designations = Designation::select('id', 'name')->get();
        Helper::logSystemActivity('User', 'User Edit');
        return view("Setting.user.view", compact("user", "roles", "departments", "designations"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('User Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $this->validate($request, [
            'email' => [
                'required',
                Rule::unique('users', 'email')->whereNull('deleted_at')->ignore($id),
            ],
            'user_name' => 'required',
            'full_name' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        $user = User::find($id);
        $user->full_name = $request->full_name;
        $user->email = $request->email;
        $user->user_name = $request->user_name;
        $user->contact_no = $request->phone_no;
        $user->department = $request->department;
        $user->designation = $request->designation;
        $user->is_active = ($request->is_active) ? 'yes' : 'no';
        $user->role_ids = json_encode($request->role);
        $user->password = Hash::make($request->password);
        $user->save();
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        foreach($request->role as $role){
            $role_ = Role::find($role);
            $user->assignRole([$role_->name]);
        }
        Helper::logSystemActivity('User', 'User Update');
        return redirect()->route('user')->with('custom_success', 'User has been Succesfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if (!Auth::user()->hasPermissionTo('User Delete')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        // Prevent from from self deleting
        $user = User::find($id);
        if ($id == Auth::user()->id) {
            return back()->with('custom_errors', 'You Can`t delete yourself. Ask super admin to do that.');
        }
        $user->delete();
        Helper::logSystemActivity('User', 'User Delete');
        return redirect()->route('user')->with('custom_success', 'User has been Succesfully Deleted!');
    }
}
