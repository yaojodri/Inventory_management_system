@extends('layouts.master')
@section('title', 'List of Users')

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

<div>
    <a class="btn btn-lg btn-primary mb-3" href="{{ route('users.create') }}">Add New User</a>
</div>

<table class="table table-hover mt-3">
    <thead>
        <tr>
            <th scope="col">User ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->fullname }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
            <td>
                <a href="{{ route('users.show', $user->id) }}" class="btn btn-outline-primary">View</a>
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-outline-success">Edit</a>
                <x-deletebutton :action="route('users.destroy', $user->id)" />
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
