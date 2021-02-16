@extends('layout')

@section('head')
<link rel="stylesheet" href="/css/bootstrap.min.css">
@endsection
@section('content')


<div class="container p-3 mb-3">

    <h1 class=" text-info m-2">Create Article Here</h1>


    <form action="/articles" method="POST">
        @csrf

        <div class="mb-3 ">
            <label for="title" class="form-label col-form-label-lg text-dark fs-3">Title</label>
            <input type="text" 
            class="form-control @error('title') is-invalid @enderror" 
            name="title" id="title" 
            id="title" 
            value="{{ old('title') }}"
            placeholder="Enter title here"
            required>
            @error('title')
                <p class="invalid-feedback">{{$message}}</p>
            @enderror    
        </div>

        <div class="mb-3">
            <label for="excerpt" class="form-label col-form-label-lg text-dark fs-3">Excerpt</label>
            <input type="text" 
            class="form-control @error('excerpt') is-invalid @enderror" 
            id="excerpt" 
            name="excerpt" 
            value="{{ old('excerpt') }}"
            placeholder="Enter Excerpt here"
            required>
            @error('excerpt')
            <p class="invalid-feedback">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="body" class="form-label col-form-label-lg text-dark fs-3">Description</label>
            <textarea class="form-control @error('body') is-invalid @enderror" 
            id="body" 
            rows="3" 
            name="body"  
            placeholder="Enter description here"
            required>{{ old('body') }}</textarea>
            @error('body')
            <p class="invalid-feedback">{{$message}}</p>
            @enderror
        </div>

        <div class="mt-4">
            <button class="btn btn-primary" type="submit">Submit form</button>
        </div>

    </form>

</div>
@endsection