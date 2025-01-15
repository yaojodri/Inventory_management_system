<!-- resources/views/students/edit.blade.php -->
@extends('layouts.master')
@section('title', 'Edit ' . $user->fullname)

@section('content')
    @include('users.form', [
        'action' => route('users.update', $user->id), 
        'edit' => true,
        'user' => $user,
    ])
@endsection