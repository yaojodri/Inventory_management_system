@extends('layouts.master')
@section('title', 'Create New Category')

@section('content')
     @include('categories.form', [
          'action'=> route('categories.store')
        ])
@endsection