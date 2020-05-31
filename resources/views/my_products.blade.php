@extends('layouts.app')

@section('content')
    <div class="p-4">
        @foreach($products as $product)
            <div class="card mb-4">
                <div class="row">
                    <div class="col-md-4">
                        <img src="/img/products/{{$product->image}}" class="w-100">
                    </div>
                    <div class="col-md-8 px-3 p-3">
                        <div class="card-block px-3">
                            <h4 class="card-title">{{ $product->title }}</h4>
                            <p class="card-text">{{ $product->description }}</p>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection