@extends('layouts.master')

@section('header')

        <div class="alert alert-success">
            <div class="alert-success">
                {{ session('message') }}
            </div>
        </div>

        <div class="alert alert-success">
            <div class="alert-success">
                {{ session('error') }}
            </div>
        </div>
@endsection