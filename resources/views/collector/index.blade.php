@extends('layouts.app')
@section('content')
    <div class="contBody">
        <div class="row">
            <div class="col-md-9">
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

            </div>
        </div>
    </div>
@endsection