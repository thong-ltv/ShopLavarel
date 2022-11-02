<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAddRequest;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminUserController extends Controller
{
    private $user;
    private $role;
    public function __construct(User $user, Role $role)
    {
        $this->user = $user;   
        $this->role = $role;
    }
    public function index()
    {
        $users = $this->user->latest()->paginate(3);
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        $roles = $this->role->all();
        return view('admin.user.add', compact('roles'));
    }

    public function store(UserAddRequest $request)
    {
        try {
            DB::beginTransaction();
            $usersData = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ];
            $users = $this->user->create($usersData);

            $users->roles()->attach($request->role_id);
            DB::commit();

            return redirect()->route('users.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error("Loi ". $th->getMessage());
        }  
    }

    public function edit($id)
    {
        $roles = $this->role->all();
        $users = $this->user->find($id);
        $roleOfUser = $users->roles;
        
        return view('admin.user.edit', compact('roles', 'users', 'roleOfUser'));
    }

    public function update(UserAddRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $dataUsers = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password
            ];

            $this->user->find($id)->update($dataUsers);
            $userUpdate = $this->user->find($id);

            $userUpdate->roles()->sync($request->role_id);
            DB::commit();

            return redirect()->route('users.index');

        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error("Loi: " . $th->getMessage());
        }
    }

    public function delete($id) 
    {
        try {
           DB::beginTransaction();
                $userDelete = $this->user->find($id);
                // $roleOfUser = $userDelete->roles;
                $this->user->find($id)->delete();
                //$userDelete->roles()->detach($userDelete->roles()->value('id'));  
                DB::table('role_users')->where('user_id', $id)->delete();
           DB::commit();

           return redirect()->route('users.index');
        } catch(\Exception $e) {
            DB::rollBack();
            Log::error("Loi: " . $e->getMessage());
        }
    }
}
