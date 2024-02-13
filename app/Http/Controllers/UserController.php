<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Dashboard;
use App\Models\Department;
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
            Auth::user()->hasPermissionTo('User Registration List') ||
            Auth::user()->hasPermissionTo('User Registration Create') ||
            Auth::user()->hasPermissionTo('User Registration Update') ||
            Auth::user()->hasPermissionTo('User Registration Delete')
        ) {
            Helper::logSystemActivity('User Registration', 'User Registration List');
            return view("settings.user_registration.index");
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

            $query = User::select('id', 'emp_id', 'name', 'email', 'contact_no');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->where('id', 'like', '%' . $searchLower . '%')
                        ->orWhere('emp_id', 'like', '%' . $searchLower . '%')
                        ->orWhere('name', 'like', '%' . $searchLower . '%')
                        ->orWhere('email', 'like', '%' . $searchLower . '%')
                        ->orWhere('contact_no', 'like', '%' . $searchLower . '%');
                    // Add more columns as needed
                });
            }
            // Determine the column to sort by
            $results = null;

            if (!empty($columnsData)) {
                $sortableColumns = [
                    0 => 'id',
                    1 => 'emp_id',
                    2 => 'name',
                    3 => 'contact_no',
                    4 => 'email',
                    // Add more columns as needed
                ];
                if($orderByColumnIndex != null){
                    $orderByColumn = $sortableColumns[$orderByColumnIndex];
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
                            case 0:
                                $q->where('id', 'like', '%' . $searchLower . '%');
                                break;
                            case 1:
                                $q->where('emp_id', 'like', '%' . $searchLower . '%');
                                break;
                            case 2:
                                $q->where('name', 'like', '%' . $searchLower . '%');
                                break;
                            case 3:
                                $q->where('contact_no', 'like', '%' . $searchLower . '%');
                                break;
                            case 4:
                                $q->where('email', 'like', '%' . $searchLower . '%');
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
                $users = $results->skip($start)->take($length)->all();
            } else {
                $users = [];
            }


            foreach ($users as &$user) {
                $user->action = '<div class="dropdown">
                        <a class="btn btn-outline-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Action
                        </a>

                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="' . route('user.edit', $user->id) . '">Edit</a></li>
                        <li><a class="dropdown-item" data-delete="' . route('user.destroy', $user->id) . '" data-kt-ecommerce-category-filter="delete_row" href="' . route('user.destroy', $user->id) . '">Delete</a></li>';
                $user->action .= '</ul></div>';
            }

            // Continue with your response
            $usersWithoutAction = array_map(function ($row) {
                return $row;
            }, $users);

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

            $query = User::select('id', 'emp_id', 'name', 'email', 'contact_no');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->where('id', 'like', '%' . $searchLower . '%')
                        ->orWhere('emp_id', 'like', '%' . $searchLower . '%')
                        ->orWhere('name', 'like', '%' . $searchLower . '%')
                        ->orWhere('email', 'like', '%' . $searchLower . '%')
                        ->orWhere('contact_no', 'like', '%' . $searchLower . '%');
                    // Add more columns as needed
                });
            }

            $sortableColumns = [
                0 => 'id',
                1 => 'emp_id',
                2 => 'name',
                3 => 'contact_no',
                4 => 'email',
                // Add more columns as needed
            ];
            if($orderByColumnIndex != null){
                $orderByColumn = $sortableColumns[$orderByColumnIndex];
                $query->orderBy($orderByColumn, $orderByDirection);
            }else{
                $query->latest('created_at');
            }
            $recordsTotal = $query->count();

            $users = $query
                ->skip($start)
                ->take($length)
                ->get();

            $users->each(function ($user) {
                $user->action = '<div class="dropdown">
                    <a class="btn btn-outline-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Action
                    </a>

                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="' . route('user.edit', $user->id) . '">Edit</a></li>
                      <li><a class="dropdown-item" data-delete="' . route('user.destroy', $user->id) . '" data-kt-ecommerce-category-filter="delete_row" href="' . route('user.destroy', $user->id) . '">Delete</a></li>';
                $user->action .= '</ul></div>';
            });

            return response()->json([
                'draw' => $draw,
                'recordsTotal' => $recordsTotal,
                'recordsFiltered' => $recordsTotal, // Total records after filtering
                'data' => $users,
            ]);
        }
    }

    public function create()
    {
        if (!Auth::user()->hasPermissionTo('User Registration Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $roles = Role::select('id', 'name')->get();
        $dashboards = Dashboard::select('id', 'name')->get();
        $departments = Department::select('id', 'name', 'code')->get();
        Helper::logSystemActivity('User Registration', 'User Registration Create');
        return view("settings.user_registration.create", compact("roles", "departments", "dashboards"));
    }

    public function store(Request $request)
    {
        if (!Auth::user()->hasPermissionTo('User Registration Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $this->validate($request, [
            'emp_id' => [
                'required',
                Rule::unique('users', 'emp_id')->whereNull('deleted_at'),
            ],
            'email' => [
                'required',
                Rule::unique('users', 'email')->whereNull('deleted_at'),
            ],
            'name' => 'required',
            'contact_no' => 'required',
            'department' => 'required',
            'role' => 'required',
            'password' => [
                'required',
                'min:8',
                'regex:/^(?=.*[A-Za-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]+$/',
            ],
            'confirm_password' => 'required|same:password',
            'default_dashboard' => 'required'
        ]);

        $dashboardValues = [];

        foreach ($request->data as $data) {
            if (isset($data['dashboard'])) {
                $dashboardValues[] = $data['dashboard'];
            }
        }

        $user = new User();
        $user->emp_id = $request->emp_id;
        $user->email = $request->email;
        $user->name = $request->name;
        $user->contact_no = $request->contact_no;
        $user->department_id = $request->department;
        $user->role = json_encode($request->role);
        $user->password = Hash::make($request->confirm_password);
        if($request->file('profile')){
            $file= $request->file('profile');
            $filename= date('YmdHis').$file->getClientOriginalName();
            $file->move('profile', $filename);
            $user->profile =  $filename;
        }
        $user->dashboard_id = json_encode($dashboardValues);
        $user->default_dashboard = $request->default_dashboard;
        $user->save();
        foreach ($request->role as $roleId) {
            $role = Role::find($roleId);
            $user->assignRole([$role->name]);
        }
        Helper::logSystemActivity('User Registration', 'User Registration Store');
        return redirect()->route('user.index')->with('custom_success', 'User Registration has been Succesfully Added!');
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
        if (!Auth::user()->hasPermissionTo('User Registration Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $user = User::find($id);
        $roles = Role::select('id', 'name')->get();
        $dashboards = Dashboard::select('id', 'name')->get();
        $departments = Department::select('id', 'name', 'code')->get();
        Helper::logSystemActivity('User Registration', 'User Registration Edit');
        return view("settings.user_registration.edit", compact("user", "roles", "departments", "dashboards"));
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
        if (!Auth::user()->hasPermissionTo('User Registration Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $this->validate($request, [
            'emp_id' => [
                'required',
                Rule::unique('users', 'emp_id')->whereNull('deleted_at')->ignore($id),
            ],
            'email' => [
                'required',
                Rule::unique('users', 'email')->whereNull('deleted_at')->ignore($id),
            ],
            'name' => 'required',
            'contact_no' => 'required',
            'department' => 'required',
            'role' => 'required',
            'password' => [
                'required',
                'min:8',
                'regex:/^(?=.*[A-Za-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]+$/',
            ],
            'confirm_password' => 'required|same:password',
            'default_dashboard' => 'required'
        ]);

        $dashboardValues = [];

        foreach ($request->data as $data) {
            if (isset($data['dashboard'])) {
                $dashboardValues[] = $data['dashboard'];
            }
        }

        $user = User::find($id);
        $user->emp_id = $request->emp_id;
        $user->email = $request->email;
        $user->name = $request->name;
        $user->contact_no = $request->contact_no;
        $user->department_id = $request->department;
        $user->role = json_encode($request->role);
        $user->password = Hash::make($request->confirm_password);
        if($request->file('profile')){
            $file= $request->file('profile');
            $filename= date('YmdHis').$file->getClientOriginalName();
            $file->move('profile', $filename);
            $user->profile =  $filename;
        }
        $user->dashboard_id = json_encode($dashboardValues);
        $user->default_dashboard = $request->default_dashboard;
        $user->save();
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        foreach ($request->role as $roleId) {
            $role = Role::find($roleId);
            $user->assignRole([$role->name]);
        }
        Helper::logSystemActivity('User Registration', 'User Registration Update');
        return redirect()->route('user.index')->with('custom_success', 'User Registration has been Succesfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::user()->hasPermissionTo('User Registration Delete')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        // Prevent from from self deleting
        $user = User::find($id);
        if ($id == Auth::user()->id) {
            return back()->with('custom_errors', 'You Can`t delete yourself. Ask super admin to do that.');
        }
        $user->delete();
        Helper::logSystemActivity('User Registration', 'User Registration Delete');
        return redirect()->route('user.index')->with('custom_success', 'User Registration has been Succesfully Deleted!');
    }
}
