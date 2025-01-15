<!-- resources/views/profile/index.blade.php -->
@extends('layouts.master')

@section('content')

<div class="row">
        <div class="col-md-2 sidebar" id="sidebar">
            <h2>Menu</h2>
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a href="{{ route('products') }}">Transactions</a>
            <a href="{{ route('suppliers') }}">Transfer Funds</a>
            <a href="{{ route('categories') }}">Profile</a>
         

        </div>
        <div class="col-md-10 offset-md-2 main-content" id="main-content">
            <div class="toggle-btn" id="toggle-btn">☰</div>


    <h1>Profile Settings</h1>
    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
        </div>
        <!-- Add more profile fields as needed -->
        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
@endsection
