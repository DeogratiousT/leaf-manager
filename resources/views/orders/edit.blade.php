@extends('layouts.main')

@section('title')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('orders.index') }}">Orders</a></li>
        <li class="breadcrumb-item"><a href="{{ route('orders.show',$order) }}">{{ $order->order_number}}</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
@endsection

@section('dynamic-content')
    <div class="container">
        <form action="{{ route('orders.update',$order) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="customer_id">Customer</label>
                <select class="form-control {{ $errors->has('customer_id') ? ' is-invalid' : '' }}" name="customer_id" id="customer_id">
                    @foreach ($customers as $customer)
                        <option @if ($customer->id == $order->customer_id) selected @endif value="{{ $customer->id }}">{{ $customer->company_name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('customer_id'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('customer_id') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="product_id">Product</label>
                <select class="form-control {{ $errors->has('product_id') ? ' is-invalid' : '' }}" name="product_id" id="product_id">
                    @foreach ($products as $product)
                        <option @if ($product->id == $order->product_id) selected @endif value="{{ $product->id }}">{{ $product->product_name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('product_id'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('product_id') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="amount">Amount</label>
                <input class="form-control {{ $errors->has('amount') ? ' is-invalid' : '' }}" type="number" id="amount" name="amount" value="{{ $order->amount }}" required>
                @if ($errors->has('amount'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('amount') }}
                    </span>
                @endif
            </div>

            <div class="form-group mb-2 text-center">
                <button class="btn btn-primary btn-block" type="submit">
                    <i class="mdi mdi-content-save"></i> Submit
                </button>
            </div>
        </form>
    </div>
@endsection