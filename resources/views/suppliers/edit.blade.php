@extends('layouts.master')
@section('title', 'Edit ' . $supplier->name)

@section('content')
    @include('suppliers.form', [
        'action' => route('suppliers.update', $supplier->id),
        'edit' => true,
        'supplier' => $supplier
    ])
@endsection
