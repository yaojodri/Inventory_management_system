@extends('layouts.master')
@section('title', 'Create New Stock Movement')

@section('content')
    @include('stockmovements.form', [
        'action' => route('stockmovements.store'),
        'method' => 'POST',
        'products' => $products
    ])
@endsection
