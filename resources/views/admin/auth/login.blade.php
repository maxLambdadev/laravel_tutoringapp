@extends('layouts.app')
@section('content')
<div class="bg-light login-page">
    <div class="container">
        @livewire('admin.auth.signin')
    </div>
</div>
@endsection
