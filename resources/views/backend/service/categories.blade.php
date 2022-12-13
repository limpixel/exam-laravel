@extends('layouts.app')

@section('title')
    Portfolio
@endsection

@section('javascript')
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function () {
            $('table').DataTable({
                "pageLength" : 50
            });
        });
    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Contact') }}</div>
                <div class="card-body">
                    @if (Session::has('error'))
                        <div class="alert alert-success">
                            {!! Session::get('error') !!}
                        </div>
                    @endif

                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {!! Session::get('success') !!}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-search pe-1"></i> Create</a>
                        <table class="table table-striped table-hover">
                            <thead>
                                <th>No</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Action</th>
                            </thead>
                            @foreach ($categories as $key => $value)
                            <tbody>
                                    <th>{{ ++$key }}</th>
                                    <td>{{ $value->title }}</td>
                                    <td>{!! $value->slug !!}</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-search pe-1"></i> Show</a>
                                        <a href="#" class="btn btn-sm btn-success"><i class="fas fa-pencil-alt pe-1"></i> Edit</a>
                                        <a href="#" class="btn btn-sm btn-success"><i class="fas fa-pencil-alt pe-1"></i> Edit</a>
                                    </td>
                                </tbody>
                                @endforeach
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection