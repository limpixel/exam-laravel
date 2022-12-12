@extends('layouts.app')

@section('title')
    Portfolio | Show #ID {{ $portfolio->id }}
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">
@endsection

@section('javascript')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <script>
        $(function(){
            $('[data-fancybox]').fancybox();
        });
    </script>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Portfolio | Show #ID {{ $portfolio->id }}</div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $portfolio->id }}</td>
                                </tr>
                                <tr>
                                    <th>TITLE</th>
                                    <td>{{ $portfolio->title }}</td>
                                </tr>
                                <tr>
                                    <th>IMAGE</th>
                                    <td>
                                        <a href="{{ asset('images/portfolio/'.$portfolio->image) }}" data-fancybox data-caption="{{ $portfolio->title }}">
                                            <img src="{{ asset('images/portfolio/'.$portfolio->image) }}" alt="{{ $portfolio->title }}" class="w-25">
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>DESCRIPTION</th>
                                    <td>{!! $portfolio->description !!}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection