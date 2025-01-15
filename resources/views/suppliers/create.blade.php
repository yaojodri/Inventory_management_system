@extends('layouts.master')
@section('title', 'Create New Supplier')

@section('content')
     @include('suppliers.form', [
          'action'=> route('suppliers.store')
        ])
@endsection
