
@extends('webapp.master')
@section('content')
    <!-- Main content -->
    <section class="content">
        <form action="{{route('users.edit',$user->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thông tin</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputStatus">Chọn nhóm nhân viên</label>
                                <select name="role_id" class="form-control custom-select">
                                    @foreach($roles as $key => $role)
                                        <option
                                            @if($role->id == $user -> role_id)
                                            selected
                                            @endif
                                            value="{{$role->id}}">{{$role->name}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('name')
                                <div style="color: red">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">Họ tên</label>
                                <input required value="{{$user->name}}" type="text" name="name" id="inputName"  class="form-control">
                                <div style="color: red"></div>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Ngày sinh</label>
                                <input required value="{{$user->birth}}" type="text" name="birth" id="inputName"  class="form-control">
                                <div style="color: red"></div>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Giới tính</label>
                                <input required value="{{$user->gender}}" type="text" name="gender" id="inputName"  class="form-control">
                                <div style="color: red"></div>
                            </div>

                            <div class="form-group">
                                <label for="inputName">Số điện thoại</label>
                                <input required value="{{$user->phoneNumber}}" type="number" name="phoneNumber" id="inputName"  class="form-control">
                                @error('name')
                                <div style="color: red">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">Số CMND</label>
                                <input required value="{{$user->cmnd}}" type="number" name="cmnd" id="inputName"  class="form-control">
                                @error('name')
                                <div style="color: red">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">Địa chỉ</label>
                                <input required value="{{$user->address}}" type="text" name="address" id="inputName"  class="form-control">
                                @error('address')
                                <div style="color: red">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">Email</label>
                                <input required value="{{$user->email}}" type="email" name="email" id="inputName"  class="form-control">
                                @error('email')
                                <div style="color: red">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Cập nhật" class="btn btn-success">
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
