@extends('layouts.master')
@section('title', 'Supplier: ' . $supplier->name)

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



    <div class="row">
        <div class="col-md-10 offset-md-2 main-content" id="main-content">
            <div class="card mt-4">
                <div class="card-header">
                    <h3>Supplier: {{ $supplier->name }}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>ID:</h5>
                            <p>{{ $supplier->id }}</p>
                        </div>
                        <div class="col-md-6">
                            <h5>Name:</h5>
                            <p>{{ $supplier->name }}</p>
                        </div>
                        <div class="col-md-6">
                            <h5>Email:</h5>
                            <p>{{ $supplier->email ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-6">
                            <h5>Phone:</h5>
                            <p>{{ $supplier->phone ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-12">
                            <h5>Address:</h5>
                            <p>{{ $supplier->address ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">Back to Suppliers</a>
                    @if(Auth::user()->role === 'admin')
                        <div>
                            <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn btn-success">Edit</a>
                            <x-deletebutton :action="route('suppliers.destroy', $supplier->id)" />
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
