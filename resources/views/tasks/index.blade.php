@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <!-- Task Creation Form -->
        @include('tasks.partials.form')

        <!-- Task List -->
        @include('tasks.partials.list')

    </div>

    <!-- Edit Task Modal -->
    @include('tasks.partials.edit-modal')

@endsection

@section('scripts')
    @include('tasks.partials.scripts')
@endsection
