@extends('layouts.frontend')

@section('title')
    About | Sekolah Developer Indonesia
@endsection

@section('content')
    <section class="page-section bg-primary text-white mb-0" id="about">
        <div class="container">
            <!-- About Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-white">{{ $title }}</h2>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- About Section Content-->
                <div class="col-lg-8 ms-auto me-auto"><p>{!! $description !!}</p></div>
            <!-- About Section Button-->
            <div class="text-center mt-4">
                <a class="btn btn-xl btn-outline-light" href="{{ route('frontend.about.download.my.cv') }}">
                    <i class="fas fa-download me-2"></i>
                    Download My Curriculum Vitae
                </a>
            </div>
        </div>
    </section>

    @section('css')
    <style>
        .page-section {
            padding: 9rem 0 !important;
        }
    </style>
    @endsection

@endsection