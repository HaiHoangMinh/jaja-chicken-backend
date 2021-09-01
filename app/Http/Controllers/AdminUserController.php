<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Traits\StorageImageTrait;

class AdminUserController extends Controller
{
    private $user;
    private $role;
    use StorageImageTrait;
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
            $user = [
                'name' => $request->name,
                'username' => $request->username,
                'password' => md5($request->password)
            ];
            $dataUploadFeatureImage = $this->storageTraitUpload($request,'feature_image_path','user');
            if (!empty($dataUploadFeatureImage)) {
                //$user['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $user['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            }
            $user = $this->user->create($user);
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
            $user =[
                'name' => $request->name,
                'username' => $request->username,
                'password' => md5($request->password)
            ];
            dd($request->feature_image_path);
            $dataUploadFeatureImage = $this->storageTraitUpload($request,'feature_image_path','product');
            if (!empty($dataUploadFeatureImage)) {
                //$dataProductUpdate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $user['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            }

            
            $this->user->find($id)->update($user);
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
            ]);
            
        } catch (\Exception $th) {
            Log::error('Message'.$th->getMessage().'Line: ' . $th->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'failed',
            ]);
        }
    }
}