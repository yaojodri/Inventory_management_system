@extends('layouts.master')



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

            <!-- Welcome Section -->
            <div class="jumbotron text-center">
                <h1>Welcome, {{ Auth::user()->name }}</h1>
                <p class="lead">Manage your inventory and reports</p>
            </div>

            <!-- Inventory Overview Section -->
            <div class="row">
                <div class="col-md-6">
                    <!-- Inventory Overview Card -->
                    <div class="card">
                        <div class="card-header">
                            <h3>Inventory Overview</h3>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item">Total Products: {{ $products->count() }}</li>
                                <li class="list-group-item">Total Categories: {{ $categories->count() }}</li>
                                <li class="list-group-item">Total Suppliers: {{ $suppliers->count() }}</li>
                                <li class="list-group-item">Total Stock Value: GH₵.{{ number_format($totalStockValue, 2) }}</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <!-- Recent Stock Movements Section -->
                    <div class="card">
                        <div class="card-header">
                            <h3>Recent Stock Movements</h3>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                @if ($stockmovements)
                                    @foreach ($stockmovements as $stockmovement)
                                        <li class="list-group-item">
                                            <strong>{{ $stockmovement->type }}</strong> - {{ $stockmovement->quantity }} units of {{ $stockmovement->product->name }} ({{ $stockmovement->created_at }})
                                        </li>
                                    @endforeach
                                @else
                                    <li class="list-group-item">No recent movements</li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

          

<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
@endsection
