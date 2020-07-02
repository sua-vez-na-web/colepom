@extends('admin.layouts.admin')

@section('content')

<div class="row">
    <h2>Bem Vindo, {{Auth::user()->name ?? 'Develop' }}</h2>
</div>

@endsection