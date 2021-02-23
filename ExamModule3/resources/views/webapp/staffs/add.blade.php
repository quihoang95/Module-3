@extends('webapp.master')
@section('content')
    <!-- Main content -->
    <section class="content">
        <form method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thông tin</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>

                        <div class="card-body">
                            {{--                            <div class="form-group">--}}
                            {{--                                <label for="inputName">Mã nhân viên </label>--}}
                            {{--                                <input type="text" name="" id="inputName" placeholder="Nhập tên đầy đủ"--}}
                            {{--                                       class="form-control">--}}
                            {{--                                @error('fullName')--}}
                            {{--                                <div style="color: red">{{ $message }}</div>--}}
                            {{--                                @enderror--}}
                            {{--                            </div>--}}
                            <div class="form-group">
                                <label for="inputStatus">Chọn nhóm nhân viên</label>
                                <select name="role_id" class="form-control custom-select">
                                    @foreach($roles as $key => $role)
                                        <option
                                            value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">Họ tên</label>
                                <input type="text" name="name" id="inputName"
                                       class="form-control">
                                @error('fullName')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">Ngày sinh</label>
                                <input type="date" name="birth" id="inputName"
                                class="form-control">
                                @error('user_name')
                                <div style="color: #ff0000">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">Giới tính</label>
                                <select name="gender" id="inputName"
                                        class="form-control">
                                    <option value="nam">Nam</option>
                                    <option value="nu">Nữ</option>
                                </select>
                                @error('phoneNumber')
                                <div style="color: #ff0000">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">Điện thoại</label>
                                <input type="text" name="phoneNumber" id="inputName"
                                       class="form-control">
                                @error('phoneNumber')
                                <div style="color: #ff0000">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">Số CMND</label>
                                <input type="number" name="cmnd" id="inputName"
                                       class="form-control">
                                @error('cmnd')
                                <div style="color: #ff0000">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">Email</label>
                                <input type="email" name="email" id="inputName"
                                       class="form-control">
                                @error('email')
                                <div style="color: #ff0000">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">Địa chỉ</label>
                                <textarea type="text" name="address" id="inputName" placeholder="Nhập địa chỉ"
                                          class="form-control"></textarea>
                                @error('address')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Thêm" class="btn btn-success">
                                <a href="{{route('users.index')}}" class="btn btn-secondary">Trở về</a>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </form>
    </section>

@endsection
