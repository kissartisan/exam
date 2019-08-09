@extends('layouts.app')

@section('content')
<div class="product">
    <div class="product__form" style="margin-bottom: 2rem;">
        <h1>Products</h1>

        <form action="{{ route('products.store') }}" method="POST" @submit.prevent="addProduct()">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input v-model="name" type="text" class="form-control" name="name" placeholder="Product Name">
            </div>

            <div class="form-group">
                <label for="name">Quantity</label>
                <input v-model="quantity" type="text" class="form-control" name="quantity" placeholder="Quatity in stock">
            </div>

            <div class="form-group">
                <label for="name">Price</label>
                <input v-model="price" type="text" class="form-control" name="price" placeholder="price">
            </div>

            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>

    @if(isset($products))
        <div class="product__list">
            <table class="table table-hover">
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total Value</th>
                {{-- <th>Actions</th> --}}
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product['name'] }}</td>
                        <td>{{ $product['quantity'] }}</td>
                        <td>{{ $product['price'] }}</td>
                        <td>{{ $product['total_value'] }}</td>
                        <td>
                            {{-- <a href="#" @click.prevent="populateFields({{$product}})">Edit</a> --}}
                            {{-- <a href="{{ route('products.destroy', $product) }}">Delete</a> --}}
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    @endif
</div>
@endsection
