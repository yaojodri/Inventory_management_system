@extends('layouts.master')
@section('title', 'List of Stock Movements')

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

<a class="btn btn-lg btn-primary mb-3" href="{{ route('stockmovements.create') }}">Add New Stock Movement</a>

<table class="table mt-3">
  <thead>
    <tr>
      <th scope="col">Movement ID</th>
      <th scope="col">Product</th>
      <th scope="col">Quantity</th>
      <th scope="col">Type</th>
      <th scope="col">Description</th>
     
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($stockmovements as $stockmovement)
      <tr>
        <th scope="row">{{ $stockmovement->id }}</th>
        <td>{{ $stockmovement->product->name }}</td>
        <td>{{ $stockmovement->quantity }}</td>
        <td>{{ ucfirst($stockmovement->type) }}</td>
        <td>{{ $stockmovement->description ?? 'N/A' }}</td>
        <td>
          <a href="{{ route('stockmovements.show', $stockmovement->id) }}" class="btn btn-outline-primary">View</a>
          <a href="{{ route('stockmovements.edit', $stockmovement->id) }}" class="btn btn-outline-success">Edit</a>
          <x-deletebutton :action="route('stockmovements.destroy', $stockmovement->id)" />
        </td>
      </tr>
      @endforeach
  </tbody>
</table>



@endsection
