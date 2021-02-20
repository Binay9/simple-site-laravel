@extends('layout')

@section('head')
<link rel="stylesheet" href="/css/bootstrap.min.css">
@endsection
@section('content')


<div class="container p-3 mb-3 mt-3">
    @if(session('msg'))
    <p class="text-white bg-dark">
        {{session('msg')}}
    </p>
    @endif

    <form action="/contact" method="POST">
        @csrf

        <div class="mb-3 ">
            <label for="email" class="form-label col-form-label-sm text-dark fs-3">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" placeholder="Enter email here" required>
            @error('email')
            <p class="invalid-feedback">{{$message}}</p>
            @enderror
        </div>

        <div class="mt-4">
            <button class="btn btn-primary" type="submit">Send Mail</button>
        </div>

    </form>

</div>
@endsection