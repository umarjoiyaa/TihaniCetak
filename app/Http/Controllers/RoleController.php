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
                $role->action = '<div class="dropdown dropdownwidth">
                    <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                    data-toggle="dropdown" id="dropdownMenuButton" type="button">Action <i class="fas fa-caret-down ml-1"></i></button>
                    <div  class="dropdown-menu tx-13">
                    <a class="dropdown-item" href="' . route('role.edit', $role->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('role.view', $role->id) . '">View</a>
                    <a class="dropdown-item"  id="swal-warning" data-delete="' . route('role.delete', $role->id) . '">Delete</a>
                    </div>
                </div>';
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
        $managements = Helper::getpermissions('managements');
        $laporan_rekod_proses = Helper::getpermissions('laporan_rekod_proses');
        $laporan_pemiriksaan_kualitis = Helper::getpermissions('laporan_pemiriksaan_kualitis');
        $job_sheets = Helper::getpermissions('job_sheets');
        $productions = Helper::getpermissions('productions');
        $dashboards = Helper::getpermissions('dashboards');
        $wms_job_sheets = Helper::getpermissions('wms_job_sheets');
        $wms_dashboards = Helper::getpermissions('wms_dashboards');
        $reports = Helper::getpermissions('reports');
        $administrations = Helper::getpermissions('administrations');
        $databases = Helper::getpermissions('databases');
        Helper::logSystemActivity('Role', 'Role Create');
        return view("Setting.Role.create", compact("managements", "laporan_rekod_proses", "laporan_pemiriksaan_kualitis", "job_sheets", "productions", "dashboards", "wms_job_sheets", "wms_dashboards", "reports", "administrations", "databases", "permissions"));
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
            'permissions' => 'required',
        ]);
        $role = Role::create(['name' => $request->input('name')]);
        $permissions = $request->input('permissions');
        $permissionNames = Permission::whereIn('id', $permissions)->pluck('name')->toArray();
        $role->syncPermissions($permissionNames);
        Helper::logSystemActivity('Role', 'Role Store');
        return redirect()->route('role')->with('custom_success', 'Role has been Succesfully Added!');
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
        $managements = Helper::getpermissions('managements');
        $laporan_rekod_proses = Helper::getpermissions('laporan_rekod_proses');
        $laporan_pemiriksaan_kualitis = Helper::getpermissions('laporan_pemiriksaan_kualitis');
        $job_sheets = Helper::getpermissions('job_sheets');
        $productions = Helper::getpermissions('productions');
        $dashboards = Helper::getpermissions('dashboards');
        $wms_job_sheets = Helper::getpermissions('wms_job_sheets');
        $wms_dashboards = Helper::getpermissions('wms_dashboards');
        $reports = Helper::getpermissions('reports');
        $administrations = Helper::getpermissions('administrations');
        $databases = Helper::getpermissions('databases');
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $request->id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();
        Helper::logSystemActivity('Role', 'Role Edit');
        return view("Setting.Role.edit", compact("permissions", "role", "rolePermissions", "managements", "laporan_rekod_proses", "laporan_pemiriksaan_kualitis", "job_sheets", "productions", "dashboards", "wms_job_sheets", "wms_dashboards", "reports", "administrations", "databases"));
    }

    public function view(Request $request)
    {
        if (!Auth::user()->hasPermissionTo('Role View')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $role = Role::find($request->id);
        $permissions = Permission::get();
        $managements = Helper::getpermissions('managements');
        $laporan_rekod_proses = Helper::getpermissions('laporan_rekod_proses');
        $laporan_pemiriksaan_kualitis = Helper::getpermissions('laporan_pemiriksaan_kualitis');
        $job_sheets = Helper::getpermissions('job_sheets');
        $productions = Helper::getpermissions('productions');
        $dashboards = Helper::getpermissions('dashboards');
        $wms_job_sheets = Helper::getpermissions('wms_job_sheets');
        $wms_dashboards = Helper::getpermissions('wms_dashboards');
        $reports = Helper::getpermissions('reports');
        $administrations = Helper::getpermissions('administrations');
        $databases = Helper::getpermissions('databases');
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $request->id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();
        Helper::logSystemActivity('Role', 'Role View');
        return view("Setting.Role.view", compact("permissions", "role", "rolePermissions", "managements", "laporan_rekod_proses", "laporan_pemiriksaan_kualitis", "job_sheets", "productions", "dashboards", "wms_job_sheets", "wms_dashboards", "reports", "administrations", "databases"));
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
            'permissions' => 'required',
        ]);

        $role = Role::find($request->id);
        $role->name = $request->input('name');
        $role->save();

        $permissions = $request->input('permissions');
        $permissionNames = Permission::whereIn('id', $permissions)->pluck('name')->toArray();
        $role->syncPermissions($permissionNames);
        Helper::logSystemActivity('Role', 'Role Update');
        return redirect()->route('role')->with('custom_success', 'Role has been Succesfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
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
        return redirect()->route('role')->with('custom_success', 'Role has been Succesfully Deleted!');
    }
}
