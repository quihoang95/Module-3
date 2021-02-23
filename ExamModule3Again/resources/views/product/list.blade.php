@extends('layout.master')
@section('content')
    <div class="container mt-3">
        @if (Session::has('success'))
            <p class="text-success">
                <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('success') }}
            </p>
        @endif
        <a href="{{route('product.active',1)}}" class="btn btn-primary">Active product</a>
        <a href="{{route('product.active',2)}}" class="btn btn-success">Inactive product</a>
            <a href="{{route('product.count')}}" class="btn btn-primary">Statistic</a>
            <a href="{{route('product.list')}}" class="btn btn-primary">Trang chu</a>
        <table class="table mt-5">
            <thead class="thead-light">
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Active</th>
                <th>Create at</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->name}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->price}}</td>
                    <td>
                        @if($product->active == 1)
                            <span>Active</span>
                        @else
                            <span>Inactive</span>
                        @endif
                    </td>
                    <td>{{$product->created_at}}</td>
                    <td>
                        <a href="{{route('product.edit',$product->id)}}"><i class="fas fa-edit"></i></a>
                        <a href="{{route('product.delete',$product->id)}}"><i class="fas fa-trash" style="color: red"
                                                                              onclick="return confirm('Are you sure?')"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
