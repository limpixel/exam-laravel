@extends('layouts.app')

@section('title')
    Manage Contact
@endsection

@section('javascript')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <script>
        $(document).ready(function () {
            $('textarea[name=description]').summernote({height: 200});
        });
    </script>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit about</div>
                <div class="card-body">
                    @if (Session::has('success'))
                    <div class="alert alert-success">
                        {!! Session::get('success') !!}
                    </div>
                    @endif
                    <form action="{{ route('backend.manage.about.process') }}" method="post">
                        @csrf
                        {{-- @method('PUT') --}}
                        <label for="title">Title</label>
                        <div class="mb-3">
                            <input class="form-control @error('title') is-invalid @enderror" name="title" type="text" placeholder="Enter your title..." value="{{ $title }}"/>
                            @error('title')
                                <div class="text-danger small">{!! $message !!}</div>
                            @enderror
                        </div>
                        <label for="description">Description</label>
                        <div class="mb-3">
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" type="text">{{ $description }}</textarea>
                            @error('description')
                                <div class="text-danger small">{!! $message !!}</div>
                            @enderror
                        </div>
                        <button class="btn btn-primary btn-xl" id="submitButton" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection