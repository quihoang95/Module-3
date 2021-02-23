@extends('admin.master')
@section('page-title','Danh sách người dùng')
@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0 px-0 px-md-3">
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Trang chủ</a></li>
        <li class="breadcrumb-item"><a href="#">Quản lí danh mục</a></li>
        <li class="breadcrumb-item">Danh sách danh mục</li>
    </ol>
    @endsection
@section('content')
    <div class="card">
        <div class="card-header">DataTables
            <div class="card-header-actions">
                <a href="https://datatables.net" class="card-header-action" target="_blank"><small class="text-muted">docs</small></a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thread>
                    <tr>
                        <th>No.</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thread>
                <tbody>
                @foreach($posts as $key =>$post)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->getNameCategory()}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
