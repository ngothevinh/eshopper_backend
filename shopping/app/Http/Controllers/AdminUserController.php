<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUserRequest;
use App\Models\Role;
use App\Models\User;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminUserController extends Controller
{
    use DeleteModelTrait;
    private $user;
    private $role;
    public function __construct(User $user,Role $role){
        $this->user=$user;
        $this->role=$role;
    }
    public function index(){
        $users=$this->user->latest()->paginate(5);
        return view('admin.user.index',compact('users'));
    }
    public function create(){
        $roles=$this->role->all();
        return view('admin.user.add',compact('roles'));
    }
    public function store(AddUserRequest $request){
        try {
            DB::beginTransaction();
            $user=$this->user->create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
            ]);
            #Insert vào bảng role_user

            $user->roles()->attach($request->role_id);
            DB::commit();
            return redirect()->route('users.index');

        }catch (\Exception $exception){
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . '  line' .$exception->getLine());
        }
    }
    public function edit($id){
        $roles=$this->role->all();
        $user=$this->user->find($id);
        $roleUser=$user->roles;
        return view('admin.user.edit',compact('roles','user','roleUser'));
    }
    public function update($id,Request $request){
        try {
            DB::beginTransaction();
            $this->user->find($id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
            ]);
            $user=$this->user->find($id);

            #Insert vào bảng role_user
            $user->roles()->sync($request->role_id);
            DB::commit();
            return redirect()->route('users.index');

        }catch (\Exception $exception){
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . '  line' .$exception->getLine());
        }
    }
    public function delete($id){
        return $this->deleteModelTrait($id,$this->user);
    }
}
