@extends('template.master')

@section('content')
    <div class="content-wrapper">
        <h1>Selamat Datang, {{ Auth::user()->name }}!</h1>
    </div>
@endsection
