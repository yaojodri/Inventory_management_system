@extends('layouts.master')

@section('content')
<div class="container-fluid">
<div class="col-md-2 sidebar" id="sidebar" style="background-color: #343a40; color: #f8f9fa; min-height: 100vh; padding: 15px;">
    <h2 style="color: #f8f9fa;">Menu</h2>
    <a href="{{ route('dashboard') }}" style="color: #f8f9fa; display: block; margin-bottom: 10px;">
       Dashboard <i class="fas fa-tachometer-alt"></i> 
    </a>
    <a href="{{ route('categories.index') }}" style="color: #f8f9fa; display: block; margin-bottom: 10px;">
       Categories <i class="fas fa-th"></i> 
    </a>
    <a href="{{ route('products.index') }}" style="color: #f8f9fa; display: block; margin-bottom: 10px;">
         Products <i class="fas fa-cogs"></i>
    </a>
    <a href="{{ route('suppliers.index') }}" style="color: #f8f9fa; display: block; margin-bottom: 10px;">
         Suppliers <i class="fas fa-truck"></i>
    </a>
    <a href="{{ route('stockmovements.index') }}" style="color: #f8f9fa; display: block; margin-bottom: 10px;">
         Stock Movements <i class="fas fa-exchange-alt"></i>
    </a>
    <a href="{{ route('reports.inventory') }}" style="color: #f8f9fa; display: block; margin-bottom: 10px;">
        Reports  <i class="fas fa-chart-line"></i>
    </a>
    @if(Auth::user()->role === 'admin')
        <a href="{{ route('users.index') }}" style="color: #f8f9fa; display: block; margin-bottom: 10px;">
             Users <i class="fas fa-users"></i>
        </a>
    @endif
    <div class="toggle-btn" id="toggle-btn" 
     style="color: #f8f9fa; background-color: #495057; padding: 5px 10px; cursor: pointer; border: none; outline: none; box-shadow: none;">
    ☰
</div>

</div>



    <div class="row">
        <!-- Sidebar -->

        <!-- Main Content -->
        <div class="col-md-10 offset-md-2 main-content" id="main-content">
            <form action="{{ route('products.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Product Name</label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        class="form-control" 
                        value="{{ old('name') }}" 
                        required>
                </div>

                <div class="mb-3">
                    <label for="category_id" class="form-label">Category</label>
                    <select name="category_id" id="category_id" class="form-select" required>
                        <option value="" disabled selected>Select a category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="supplier_id" class="form-label">Supplier</label>
                    <select name="supplier_id" id="supplier_id" class="form-select" required>
                        <option value="" disabled selected>Select a supplier</option>
                        @foreach($suppliers as $supplier)
                            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input 
                        type="number" 
                        name="quantity" 
                        id="quantity" 
                        class="form-control" 
                        value="{{ old('quantity') }}" 
                        required>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input 
                        type="number" 
                        name="price" 
                        id="price" 
                        class="form-control" 
                        value="{{ old('price') }}" 
                        step="0.01" 
                        required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea 
                        name="description" 
                        id="description" 
                        class="form-control">{{ old('description') }}</textarea>
                </div>

                <button type="submit" class="btn btn-success">Create Product</button>
            </form>
        </div>
    </div>
</div>
@endsection
