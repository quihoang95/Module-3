@extends('admin.master')
@section('page-title','Danh sach nguoi dung')
@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0 px-0 px-md-3">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Trang chủ</a></li>
        <li class="breadcrumb-item"><a href="#">Quản lý người dùng</a></li>
        <li class="breadcrumb-item active">Danh sách người dùng</li>
        <!-- Breadcrumb Menu-->
    </ol>
@endsection
@section('content')
    <div class="card">
        <div class="card-header"> DataTables
            <div class="card-header-actions"><a class="card-header-action" href="https://datatables.net"
                                                target="_blank"><small class="text-muted">docs</small></a></div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered datatable">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @foreach($user->roles as $role)
                                {{ $role->name}}
                            @endforeach
                        </td>
                        <td><span
                                class="badge {{ ($user->status == \App\Http\Controllers\StatusConst::ACTIVE) ? 'badge-success': 'badge-info' }} ">
                            {{ $user->getStatus() }}
                        </span></td>
                        <td><a class="btn btn-success" href="{{route('users.show',$user->id)}}">
                                <svg class="c-icon">
                                    <use
                                        xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass') }}"></use>
                                </svg>
                            </a><a class="btn btn-info" href="{{ route('users.edit', $user->id) }}">
                                <svg class="c-icon">
                                    <use
                                        xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-description') }}"></use>
                                </svg>
                            </a><a class="btn btn-danger" href="{{route('users.destroy',$user->id)}}" onclick="return confirm('Bạn chắc chắn có muốn xóa không?')">
                                <svg class="c-icon">
                                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-trash') }}"></use>
                                </svg>
                            </a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
