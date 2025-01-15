@extends('layouts.master')
@section('title', 'Stock Movement Details')

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
                    <h3>Stock Movement Details</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Product:</h5>
                            <p>{{ $stockmovement->product->name }}</p>
                        </div>
                        <div class="col-md-6">
                            <h5>Type:</h5>
                            <p>{{ ucfirst($stockmovement->type) }}</p>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <h5>Quantity:</h5>
                            <p>{{ $stockmovement->quantity }}</p>
                        </div>
                        <div class="col-md-6">
                            <h5>Reason:</h5>
                            <p>{{ $stockmovement->reason ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('stockmovements.index') }}" class="btn btn-secondary">Back to List</a>
                    @if(Auth::user()->role === 'admin')
                        <div>
                            <a href="{{ route('stockmovements.edit', $stockmovement->id) }}" class="btn btn-success">Edit</a>
                            <x-deletebutton :action="route('stockmovements.destroy', $stockmovement->id)" />
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
