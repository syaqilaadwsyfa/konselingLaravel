@extends('template.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center">
            @if (Auth::check())
            <h1>Selamat Datang, {{ Auth::user()->name }}!</h1>
            @else
            <h1>Selamat Datang, Silakan login terlebih dahulu!</h1>
            @endif
        </div>
    </div>
</div>
@endsection
