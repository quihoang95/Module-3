<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller

{
    public function index(){
        $customers = Customer::all();
        return view('modules.customer.list', compact('customers'));
    }
    public function create(){
        return view('modules.customer.create');
    }
    public function store(Request $request){
        $customer = new Customer();
        $customer->name = $request->input('name');
        $customer->phone= $request->input('phoneNumber');
        $customer->email= $request->input('email');
        $customer -> save();
        Session::flash('success','Tạo mới khách hàng thành công');
        return redirect()->route('customersTH.index');
    }
    public function edit($id){
        $customer = Customer::findOrFail($id);
        return view('modules.customer.edit',compact('customer'));
    }
    public function update(Request $request, $id){
        $customer = Customer::findOrFail($id);
        $customer->name = $request->input('name');
        $customer->phone= $request->input('phoneNumber');
        $customer->email= $request->input('email');
        $customer -> save();
        Session::flash('success','Cập nhật khách hàng thành công');
        return redirect()->route('customersTH.index');
    }
    public function destroy($id){
        $customer =Customer::findOrFail($id);
        $customer->delete();
        Session::flash('success','Xóa khách hàng thành công');
        return redirect()->route('customersTH.index');

    }
}
