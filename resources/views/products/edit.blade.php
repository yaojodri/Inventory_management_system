@extends('layouts.master')

@section('title', 'Edit Product - ' . $product->name)

@section('content')
<div class="col-md-2 sidebar" id="sidebar">
    <h2>Menu</h2>
    <a href="{{ route('dashboard') }}"><i class="fa fa-tachometer-alt"></i> Dashboard</a>
    <a href="{{ route('categories.index') }}"><i class="fa fa-th"></i> Categories</a>
    <a href="{{ route('products.index') }}"><i class="fa fa-cogs"></i> Products</a>
    <a href="{{ route('suppliers.index') }}"><i class="fa fa-truck"></i> Suppliers</a>
    <a href="{{ route('stockmovements.index') }}"><i class="fa fa-exchange-alt"></i> Stock Movements</a>
    <a href="{{ route('reports.inventory') }}"><i class="fa fa-file-alt"></i> Reports</a>
    @if(Auth::user()->role === 'admin')
        <a class="nav-link" href="{{ route('users.index') }}"><i class="fa fa-users"></i> Users</a>
    @endif
</div>
<div class="toggle-btn" id="toggle-btn">☰</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 offset-md-2 main-content" id="main-content">
            <div class="card">
                <div class="card-header">
                    Edit Product
                </div>
                <div class="card-body">
                    <form action="{{ route('products.update', $product->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <!-- Product Name -->
                        <div class="form-group">
                            <label for="name">Product Name</label>
                            <input 
                                type="text" 
                                name="name" 
                                class="form-control @error('name') is-invalid @enderror" 
                                id="name" 
                                value="{{ old('name', $product->name) }}" 
                                placeholder="Enter product name" 
                                required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Category -->
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select 
                                name="category_id" 
                                id="category_id" 
                                class="form-select @error('category_id') is-invalid @enderror" 
                                required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" 
                                        {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Supplier -->
                        <div class="form-group">
                            <label for="supplier_id">Supplier</label>
                            <select 
                                name="supplier_id" 
                                id="supplier_id" 
                                class="form-select @error('supplier_id') is-invalid @enderror" 
                                required>
                                @foreach($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}" 
                                        {{ old('supplier_id', $product->supplier_id) == $supplier->id ? 'selected' : '' }}>
                                        {{ $supplier->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('supplier_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Quantity -->
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input 
                                type="number" 
                                name="quantity" 
                                class="form-control @error('quantity') is-invalid @enderror" 
                                id="quantity" 
                                value="{{ old('quantity', $product->quantity) }}" 
                                min="0" 
                                required>
                            @error('quantity')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Price -->
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input 
                                type="number" 
                                name="price" 
                                class="form-control @error('price') is-invalid @enderror" 
                                id="price" 
                                value="{{ old('price', $product->price) }}" 
                                step="0.01" 
                                required>
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea 
                                name="description" 
                                class="form-control @error('description') is-invalid @enderror" 
                                id="description" 
                                rows="4">{{ old('description', $product->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Update Product</button>
                        <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
