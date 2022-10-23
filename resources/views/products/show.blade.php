@extends('layouts.customer')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">{{ $product->name }}</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{ route('welcome') }}"><i class="lni lni-home"></i> Home</a></li>
                        <li><a
                                href="{{ route('category-details', $product->category->slug) }}">{{ $product->category->name }}</a>
                        </li>
                        <li>{{ $product->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="item-details section">
       <livewire:product-component :product="$product"/>
    </section>
    <x-footer-component />
@endsection
