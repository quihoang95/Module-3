@extends('admin.master')
@section('page-tittle','Danh sách người dùng')
@section('breadcrumb')
    <ol>
        <li class="breadcrumn-item"><a href="{{route('admin.dashboard')}}">Trang chủ</a></li>
        <li class="breadcrumn-item"><a href="#">Quản lí danh mục</a></li>
        <li class="breadcrumn-item">Danh sách danh mục</li>
    </ol>
@endsection
@section('content')
    <div class="card">
        <div class="card-hearder">DataTables
            <div class="card-header-actions"><a href="https://datatables.net" class="card-header-action" target="_blank"><small class="text-muted">docs</small></a></div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thread>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Total post</th>
                        <th>Actions</th>
                    </tr>
                </thread>
                <tbody>
                @foreach($categories as $key => $category)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{$category->name}}</td>
                        <td><a href="{{route('categories.getPostByCategoryId',$category->id)}}">{{$category->post()->count()}}</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
