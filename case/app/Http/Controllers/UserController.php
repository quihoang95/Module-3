<?php

namespace App\Http\Controllers;

use App\Http\Services\UserService;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    function index()
    {
        $users = $this->userService->getAll();
        return view('admin.users.list', compact('users'));
    }

    function create()
    {
        $roles= Role::all();
        return view('admin.users.create',compact('roles'));
    }

    function store(Request $request)
    {
        $this->userService->create($request);
        $message= 'Tạo mới khách hàng thành công';
        return redirect()->route('users.index')->with('success',$message);
    }
    public function show($id)
    {
        $users = User::where('id','=',$id)->get();
        return view('admin.users.show',compact('users'));
    }
    public function edit($id)
    {
        $roles= Role::all();
        $users = User::where('id','=',$id)->get();
        return view('admin.users.edit',compact('users','roles'));
    }
    public function update(Request $request,$id)
    {
        $this->userService->update($request,$id);
        $message = "Cập nhật khách hàng thành công";
        return redirect()->route('users.index')->with('info',$message);
    }
    public function search(Request $request)
    {
        $search = $request ->input('search');
        $users = User::where('name','like','%'.$search.'%')
            ->orWhere('email','like','%'.$search.'%')
            ->paginate(5);
        return view('admin.users.list',compact('users','search'));
    }
    public function destroy($id)
    {
        $user_role = DB::table('role_user')->where('user_id',$id)->get();
        if(count($user_role)){
            $message = "Bạn không thể xóa";
            return redirect()->route('users.index')->with('error',$message);
        }else{
            User::where('id',$id)->delete();
            $message = "Xóa thành công!";
            return redirect()->route('users.index')->with('success',$message);
        }
    }


}
