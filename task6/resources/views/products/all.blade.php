@extends('layouts.parent')
@section('title' , 'All Product')
@section('content')
<div class="col-12">
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Code</th>
                <th>Name (EN)</th>
                <th>Name (AR)</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>Creation Date</th>
                <th>Update Date</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->code }}</td>
                <td>{{ $product->name_en }}</td>
                <td>{{ $product->name_ar }}</td>
                <td>{{ $product->price }} EGP</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->status }}</td>
                <td>{{ $product->created_at }}</td>
                <td>{{ $product->updated_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
