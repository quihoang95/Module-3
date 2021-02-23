
@extends('webapp.master')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="d-flex">
                                    <input type="text">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                                <div class="col-12 col-md-6" style="text-align: right">
                                        <a href="{{route('users.create')}}" class="btn btn-success">+Thêm mới</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="table" class="table table-bordered table-striped data-table">
                                <thead>
                                <tr>
                                    <th>Mã nhân viên</th>
                                    <th>Nhóm nhân viên</th>
                                    <th>Họ và tên</th>
                                    <th>Giới tính</th>
                                    <th>Số điện thoại</th>
                                    <th>Chức năng</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    @forelse($users as $key => $user)
                                        <td></td>
                                        <td>{{$user->role->name}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->gender}}</td>
                                        <td>{{$user->phoneNumber}}</td>
                                        <td>
                                            <div>
                                                <!-- EDIT -->
                                                    <a data-placement="top" href="{{route('users.edit',$user->id)}}">
                                                        <i class="nav-icon fas fa-edit"></i>Sửa</a>
                                                    <!-- DELETE -->
                                                    <a class="text-danger"
                                                       onclick="return confirm('Bạn chắc chắn muốn xoá lớp học này?')"
                                                       data-placement="top" href="{{route('users.destroy', $user->id)}}">
                                                        <i class="nav-icon far fa-trash-alt"></i>Xóa</a>
                                            </div>
                                        </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">Không có dữ liệu</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>

        <!-- /.container-fluid -->

@endsection
        <script>
            $(document).ready(function () {
                $('#table').DataTable();
            });
        </script>


