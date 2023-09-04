@extends('layout.app')
 
    @section('title', 'Kaban board')
    @section('description', ' ')

    @section('canonical', ' ')
    @section('ogImage', ' ')

 
@section('content')
    <main class="mx-auto max-w-screen sm:px-6 lg:px-8 p-4 text-center bg-gray-200 min-h-screen">
        <h1 class="text-5xl font-thin text-center mb-6">Kaban board</h1>
        
        <livewire:board />
    </main>
@endsection
