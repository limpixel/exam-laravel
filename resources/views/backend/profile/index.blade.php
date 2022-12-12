@extends('layouts.app')

@section('title')
    Update Password
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
                <div class="card-header">Update Password</div>
                <div class="card-body">
                    @if (Session::has('success'))
                    <div class="alert alert-success">
                        {!! Session::get('success') !!}
                    </div>
                    @endif
                    <form action="{{ route('backend.profile.process') }}" method="post">
                        @csrf
                        {{-- @method('PUT') --}}
                        <label for="old_password">Old password</label>
                        <div class="mb-3">
                            <input class="form-control @error('old_password') is-invalid @enderror" name="old_password" type="text" placeholder="Enter your old password..." value="{{ old('old_password') }}"/>
                            @error('old_password')
                                <div class="text-danger small">{!! $message !!}</div>
                            @enderror
                            @if (Session::has('error'))
                                <small class="text-danger">{{ Session::get('error') }}</small>
                            @endif
                        </div>
                        <label for="new_password">New password</label>
                        <div class="mb-3">
                            <input class="form-control @error('new_password') is-invalid @enderror" name="new_password" type="text" placeholder="Enter your new password..." value="{{ old('new_password') }}"/>
                            @error('new_password')
                                <div class="text-danger small">{!! $message !!}</div>
                            @enderror
                        </div>
                        <label for="new_password_confirmation">Confirm password</label>
                        <div class="mb-3">
                            <input class="form-control @error('new_password_confirmation') is-invalid @enderror" name="new_password_confirmation" type="text" placeholder="Confirm your password..."/>
                            @error('new_password_confirmation')
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