@extends('layouts.frontend')

@section('title')
    Basket | Sekolah Developer Indonesia
@endsection

@section('css')
        <style>
            .page-section {
                margin-top: 12rem;
                
            }
        </style>
    @endsection

@section('content')
    <section class="page-section portfolio" id="portfolio">
        <div class="container">
            <!-- Portfolio Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Portfolio</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Portfolio Grid Items-->
            <div class="row justify-content-center">
                @if (Cart::isEmpty())
                    <span class="text-muted text-center">Your Basket is Empty</span>
                @else
                    @foreach (Cart::getContent() as $item)
                        @php
                            echo "<pre>";
                            print_r($item['name']);
                            echo "</pre>";
                        @endphp
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    
    

    

@endsection