@extends('layout.master')

@section('content')
    <div class="container mt-3">
        <h1>Thêm sản phẩm</h1>
        <form action="{{route('product.store')}}" method="post">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputStatus">Chọn nhóm nhân viên</label>
                    <select name="category_id" class="form-control custom-select">
                        @foreach($categories as $key => $category)
                            <option
                                selected
                                value="{{$category->id}}">{{$category->title}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form=group col-md-6">
                    <label for="name">Tên Sản Phẩm</label>
                    <input class="form-control" type="text" name="name" id="name" placeholder="Nhập tên sản phẩm">
                    @error('name')
                    <div style="color: red">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form=group col-md-6">
                    <label for="name">Giá</label>
                    <input class="form-control" type="number" name="price" id="price" placeholder="Nhập giá sản phẩm">
                    @error('price')
                    <div style="color: red">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form=group col-md-6">
                    <label for="name">Mô tả</label>
                    <input class="form-control" type="text" name="description" id="description"
                           placeholder="Mô tả sản phẩm">
                    @error('description')
                    <div style="color: red">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form=group col-md-6">
                    <label for="name">Trạng thái</label>
                    <input class="form-control" type="text" name="active" id="active" placeholder="Trạng thái">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Tạo mới</button>
        </form>
    </div>
@endsection
