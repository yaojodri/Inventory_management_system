@extends('layouts.master')


@section('title', 'List of Products')

@section('content')
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



<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->     

        <!-- Main Content -->
        <div class="col-md-10 offset-md-2 main-content" id="main-content">


<div class="container-fluid px-4">
    <h1 class="mt-4">Product Management Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Manage Products</li>
    </ol>

    <!-- Add New Product -->
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-plus me-1"></i> Add New Product
        </div>
        <div class="card-body">
            <a class="btn btn-lg btn-primary mb-3" href="{{ route('products.create') }}">Add New Product</a>
        </div>
    </div>

    <!-- Search Form -->


    <!-- Product List -->
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i> Product List
        </div>
        <div class="card-body">
            <table class="table mt-3" id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Supplier</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category->name ?? 'N/A' }}</td>
                        <td>{{ $product->supplier->name ?? 'N/A' }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ number_format($product->price, 2) }}</td>
                        <td>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-outline-primary btn-sm">View</a>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-outline-success btn-sm">Edit</a>
                            <x-deletebutton :action="route('products.destroy', $product->id)" />
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination Links -->
    @if(method_exists($products, 'links'))
    <div class="d-flex justify-content-center">
        {{ $products->links() }}
    </div>
    @endif
</div>

@endsection
