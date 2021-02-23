@extends('admin.master')
@section('page-title',' Sua thong tin nguoi dung')
@section('content')
    <div class="col-12 col-md-12 mt-4">
        <div class="card">
            <h5 class="card-header">Sua thong tin người dùng</h5>
            <div class="card-body">
                @foreach($users as $key => $user)
                <form action="" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Tên</label>
                        <input name="name" type="text" class="form-control" value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label >Email</label>
                        <input name="email" value="{{ $user->email }}" type="email" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        @foreach($roles  as $role)
                            <div class="form-check">
                                <input name="roles[{{ $role->id }}]" class="form-check-input" type="checkbox" value="{{ $role->id }}">
                                <label class="form-check-label">
                                    {{ $role->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Cập nhật</button>
                        <a href="{{ route('users.index') }}" class="btn btn-info">Trở về</a>
                    </div>
                </form>
                @endforeach
            </div>
        </div>
    </div>
@endsection
