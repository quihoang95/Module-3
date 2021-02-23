@extends('home')
@section('tittle','Danh sách khách hàng')
@section('content')
    <div class="col-12">
        <div class="row">
            <div class="col-12"><h1>Danh sách khách hàng</h1></div>
            <div class="col-12">
                @if (Session::has('success'))
                    <p class="text-success">
                        <i class="fa fa-check" aria-hidden="true"></i>{{Session::get('success')}}
                    </p>
                @endif
            </div>
            <table class="table table-striped">
                <thread>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên khách hàng</th>
                        <th scope="col">Ngày sinh</th>
                        <th scope="col">Email</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thread>
                <tbody>
                @if(count($customers)==0)
                    <tr><td colspan="4">Không có dữ liệu</td></tr>
                @else
                @foreach($customers as $key => $customer )
                    <tr>
                        <th scope="row">{{++$key}}</th>
                        <td>{{$customer->name}}</td>
                        <td>{{$customer->dob}}</td>
                        <td>{{$customer->email}}</td>
                        <td><a href="{{route('customers.edit', $customer->id)}}">Sửa</a></td>
                        <td><a href="{{route('customers.destroy',$customer->id)}}" class="text-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</a></td>
                    </tr>
                @endforeach
                @endif
                </tbody>
            </table>
            <a href="{{route('customers.create')}}" class="btn btn-primary">Thêm mới</a>
        </div>
    </div>
    @endsection

