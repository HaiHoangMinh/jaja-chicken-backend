<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminUserController extends Controller
{
    private $user;
    private $role;
    public function __construct(User $user,Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }

    public function index()
    {
        $users = $this->user->paginate(5);
        return view('admin.user.index',compact('users'));

    }
    
   
    public function create()
    {
        $roles = $this->role->all();
        return view('admin.user.add',compact('roles'));
    }
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $user =$this->user->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            $user->roles()->attach($request->role_id);
            DB::commit();
            return redirect()->route('users.index');
        } catch (\Exception $th) {
            DB::rollBack();
            Log::error("loi: " . $th->getMessage() . "dong " . $th->getLine());
        }

        

    }
    
    public function edit($id){
        $user = $this->user->find($id);
        $roles = $this->role->all();
        $roleOfUser = $user->roles;
        return view('admin.user.edit', compact('user','roles','roleOfUser'));
    }
    
    public function update($id,Request $request){
        try {
            DB::beginTransaction();
            $user =$this->user->find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $user = $this->user->find($id);
            $user->roles()->sync($request->role_id);
            DB::commit();
            return redirect()->route('users.index');
        } catch (\Exception $th) {
            DB::rollBack();
            Log::error("loi: " . $th->getMessage() . "dong " . $th->getLine());
        }

    }
    public function delete($id){
        try {
            $this->user->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success',
            ], status:200);
            
        } catch (\Exception $th) {
            Log::error('Message'.$th->getMessage().'Line: ' . $th->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'failed',
            ], status:500);
        }
    }
}