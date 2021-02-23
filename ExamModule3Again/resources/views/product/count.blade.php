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
        <table class="table mt-5">
            <thead class="thead-light">
            <tr>
                <th>Name</th>
                <th>Quantity</th>

            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
            <tr>
            <td>{{$category->title}}</td>
            <td>{{$category->products->count()}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
