<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RolePermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $roles = Role::paginate(10);
        $modal = 'close';
        return view('backend.roles_permission.roles',compact('roles' , 'modal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'role_name' => 'required|',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withModal('open');
        }
        if($request->role_id == null){
            $role       = Role::create(['name' => $request->role_name , 'guard_name' => 'web']);
            $permission = ucfirst($request->role_name).'_access';
            Permission::firstOrCreate(
                ['name' => $permission , 'guard_name' => 'web'],
                ['name' => $permission , 'guard_name' => 'web'],
            );
            $role->givePermissionTo([
                $permission,
            ]);
            return redirect()->route('role.index')->withSuccess('Successfully added.'); 

        }else{
            Role::where('id' , $request->role_id)->update([
                'name' => $request->role_name,
            ]);

            return redirect()->route('role.index')->withSuccess('Successfully updated.'); 

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getUsers()
    {
        
        $users = User::paginate(15);
        $roles = Role::all();
        $modal = 'close';
        return view('backend.roles_permission.users', compact('users' , 'roles' , 'modal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addUsers(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'name' => 'required|',
            'email' => 'required|',
            'password' => 'required|confirmed|min:6',
        ]);
        if($validator->fails()){
            $validator->errors()->add('modal' , 'Add User fail');
            return redirect()->back()->withErrors($validator)->withModal('open');
        }

       
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
            $user->assignRole($request->roles);
        return redirect()->route('users.get')->withSuccess('Successfully added.'); 
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
        $validator = Validator::make($request->all() , [
            'name' => 'required|',
            'email' => 'required|',
            'password' => 'nullable|confirmed|min:6',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withModal('open');
        }
            $user = User::find($request->user_id);
            $user->assignRole($request->roles);

        if($request->password == null){
            User::where('id' , $request->user_id)->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
        }else{
            User::where('id' , $request->user_id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
        }
        
        return redirect()->route('users.get')->withSuccess('Successfully updated.'); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
