@extends('layouts.app')

@section('title')
    Manage CV
@endsection

@section('javascript')

@endsection

@section('css')

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('CV') }}</div>
                <div class="card-body">
                    <form action="{{ route('backend.manage.cv.process') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <span class="badge bg-warning mb-2">
                            {{ $cv->filename }}
                        </span>
                        <div class="mb-3">
                            <label for="filename" class="form-label">
                                Filename <strong class="text-danger">*</strong>
                            </label>
                            <input type="file" class="form-control @error('filename') is-invalid @enderror" name="filename" id="filename">
                            @error('filename')
                                <small class="text-danger">{!! $message !!}</small>
                            @enderror
                        </div>
                        <button class="btn btn-dark" type="submit">Upload <i class="fas fa-file-upload ps-1"></i></button>
                    </form>
                </div>
            </div>
    </div>
</div>
@endsection