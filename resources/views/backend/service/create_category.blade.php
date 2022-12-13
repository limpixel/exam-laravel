@extends('layouts.app')

@section('title')
    Portfolio | Create
@endsection

@section('javascript')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <script>
        $(function () {
            $('textarea[name=description]').summernote({height: 200});
            $("input[name=image]").change(function() {
                imagePreview(this);
            });

            function imagePreview(input) {
                if(input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#preview').removeClass('d-none');
                        $('#preview').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }
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
                <div class="card-header">{{ __('Create Portfolio | Create') }}</div>

                <div class="card-body">
                    <div class="card-body">
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                {!! Session::get('success') !!}
                            </div>
                        @endif
                        <form action="{{ route('backend.create.process.portfolio') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                                        <div class="mb-3">
                                            <div class="mb-2 @error('title') is-invalid fw-bold @enderror">Title</div>
                                            <input type="text" name="title" value="{{ old('title') }}" placeholder="Masukkan judul..." class="form-control @error('title') is-invalid text-danger @enderror">
                                            @error('title')
                                                <small class="text-danger">{!! $message !!}</small>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="mb-2 @error('image') is-invalid fw-bold @enderror">Image</div>
                                            <input type="file" class="form-control @error('image') is-invalid text-danger @enderror" name="image" id="image">
                                            <img src="" alt="" class="img-thumbnail mt-3 mb-3 d-none w-50" id="preview">
                                            @error('image')
                                                <small class="text-danger">{!! $message !!}</small>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <div class="mb-2 @error('description') is-invalid fw-bold @enderror">Description</div>
                                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" type="text"></textarea>
                                            @error('description')
                                                <div class="text-danger small">{!! $message !!}</div>
                                            @enderror
                                        </div>
                                            <button class="btn btn-primary">Create</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection