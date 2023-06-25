@extends('layouts.app')

@section('content')


<div class="flex items-center justify-center h-48 mb-4 rounded bg-gray-50 dark:bg-gray-800">
    <div class="card">
        <div class="card-header flex justify-between">
            <h1 class="my-auto text-xl bold">Name: {{ $data->name }}</h1>
            <a href="{{ route('manager.home') }}" class="bg-blue-400 hover:bg-blue-500 px-2 py-1 text-white rounded hover:no-underline">Go back</a>
        </div>

        <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
</div>
@endsection
