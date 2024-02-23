<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function Data(Request $request)
    {
        if ($request->ajax()) {

            $draw = $request->input('draw');
            $start = $request->input('start');
            $length = $request->input('length');
            $search = $request->input('search.value');
            $orderByColumnIndex = $request->input('order.0.column'); // Get the index of the column to sort by
            $orderByDirection = $request->input('order.0.dir'); // Get the sort direction ('asc' or 'desc')

            $query = Role::with(['permissions']);

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->where('name', 'like', '%' . $searchLower . '%');
                    // Add more columns as needed
                });
            }

            $sortableColumns = [
                1 => 'name',
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

            $roles = $query
                ->skip($start)
                ->take($length)
                ->get();

            $roles->each(function ($role, $index) use(&$start) {
                $role->sr_no = $start + $index + 1;
                $role->action = '<div class="dropdown">
                    <a class="btn btn-outline-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Action
                    </a>

                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="' . route('role.edit', $role->id) . '">Edit</a></li>
                      <li><a class="dropdown-item" data-delete="' . route('role.destroy', $role->id) . '" data-kt-ecommerce-category-filter="delete_row" href="' . route('role.destroy', $role->id) . '">Delete</a></li>';
                $role->action .= '</ul></div>';
            });

            return response()->json([
                'draw' => $draw,
                'recordsTotal' => $recordsTotal,
                'recordsFiltered' => $recordsTotal, // Total records after filtering
                'data' => $roles,
            ]);

        }
    }

    public function index()
    {
        if (
            Auth::user()->hasPermissionTo('Role List') ||
            Auth::user()->hasPermissionTo('Role Create') ||
            Auth::user()->hasPermissionTo('Role Update') ||
            Auth::user()->hasPermissionTo('Role Delete')
        ) {
            Helper::logSystemActivity('Role', 'Role List');
            return view("Setting.Role.index");
        }
        return back()->with('custom_errors', 'You don`t have Right Permission');
    }

    public function create()
    {
        if (!Auth::user()->hasPermissionTo('Role Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $permissions = Permission::get();
        $others = Helper::getpermissions('others');
        $machines = Helper::getpermissions('machines');
        $settings = Helper::getpermissions('settings');
        $reportings = Helper::getpermissions('reportings');
        $dashboards = Helper::getpermissions('dashboards');
        $maintenances = Helper::getpermissions('maintenances');
        Helper::logSystemActivity('Role', 'Role Create');
        return view("Setting.Role.create", compact("others", "settings", "permissions", "dashboards", "machines", "maintenances", "reportings"));
    }

    public function store(Request $request)
    {
        if (!Auth::user()->hasPermissionTo('Role Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $this->validate($request, [
            'name' => [
                'required',
                Rule::unique('roles', 'name'),
            ],
            'permission' => 'required',
        ]);
        $role = Role::create(['name' => $request->input('name')]);
        $permissions = $request->input('permission');
        $permissionNames = Permission::whereIn('id', $permissions)->pluck('name')->toArray();
        $role->syncPermissions($permissionNames);
        Helper::logSystemActivity('Role', 'Role Store');
        return redirect()->route('role.index')->with('custom_success', 'Role has been Succesfully Added!');
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
    public function edit(Request $request)
    {
        if (!Auth::user()->hasPermissionTo('Role Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $role = Role::find($request->id);
        $permissions = Permission::get();
        $others = Helper::getpermissions('others');
        $machines = Helper::getpermissions('machines');
        $settings = Helper::getpermissions('settings');
        $reportings = Helper::getpermissions('reportings');
        $dashboards = Helper::getpermissions('dashboards');
        $maintenances = Helper::getpermissions('maintenances');
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $request->id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();
        Helper::logSystemActivity('Role', 'Role Edit');
        return view("settings.role_assign.edit", compact("others", "settings", "permissions", "dashboards", "machines", "role", "rolePermissions", "maintenances", "reportings"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (!Auth::user()->hasPermissionTo('Role Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $this->validate($request, [
            'name' => [
                'required',
                Rule::unique('roles', 'name')->ignore($request->id),
            ],
            'permission' => 'required',
        ]);

        $role = Role::find($request->id);
        $role->name = $request->input('name');
        $role->save();

        $permissions = $request->input('permission');
        $permissionNames = Permission::whereIn('id', $permissions)->pluck('name')->toArray();
        $role->syncPermissions($permissionNames);
        Helper::logSystemActivity('Role', 'Role Update');
        return redirect()->route('role.index')->with('custom_success', 'Role has been Succesfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::user()->hasPermissionTo('Role Delete')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        // Prevent from from self deleting
        $role = Role::find($id);
        $existrole = User::whereJsonContains('role', $id)->exists();
        if ($role->id == Auth::user()->roles->pluck('id')[0]) {
            return back()->with('custom_errors', 'This role has been assigned to you. You cannot delete it. Ask super admin to do that.');
        }
        if ($existrole) {
            return back()->with('custom_errors', 'This role has been assigned to someone. You cannot delete it. First Unassign role from user registration');
        }
        DB::table("roles")->where('id', $id)->delete();
        Helper::logSystemActivity('Role', 'Role Delete');
        return redirect()->route('role.index')->with('custom_success', 'Role has been Succesfully Deleted!');
    }
}
