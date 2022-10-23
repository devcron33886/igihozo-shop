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
        <div class="container">
            <div class="top-area">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-images">
                            <main id="gallery">
                                <div class="main-img">
                                    <img src="{{ $product->getFirstMediaUrl('image', 'preview') }}" id="current"
                                        alt="#">
                                </div>
                                <div class="images">
                                    @foreach ($product->image as $key => $media)
                                        <img src="{{ $media->getUrl('thumb') }}" class="img" alt="#">
                                    @endforeach

                                </div>
                            </main>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-info">
                            <h2 class="title">{{ $product->name }}</h2>
                            <p class="category"><i class="lni lni-tag"></i> {{ $product->category->name }}</p>
                            <h3 class="price">{{ $product->formattedPrice() }}</h3>
                            <p class="info-text">{{ Str::limit($product->description, 140) }}</p>
                            <div class="row">

                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="form-group quantity">
                                        <form action="{{-- {{ route('cart.addToCart', ['id' => $product->id]) }} --}}"
                                            class="form-inline">

                                            @if ($added)
                                                <button wire:loading.attr="disabled" type="button" wire:click="remove"
                                                    class="btn  btn-danger">
                                                    <i class="fa fa-times"></i>
                                                    Remove
                                                </button>
                                            @else
                                                <div class="input-group">
                                                    <input min="0.5" size="10" value="1" type="text"
                                                        wire:model="quantity" max="{{ $product->qty }}" name="qty"
                                                        class="form-control flat" placeholder="Qty"
                                                        id="qty{{ $product->id }}">
                                                    <span class="input-group-btn">
                                                        <button wire:loading.attr="disabled" type="button" wire:click="add"
                                                            class="btn  btn-success flat"
                                                            {{ $product->qty <= 0 ? 'disabled' : '' }}>
                                                            <i class="fa fa-plus"></i>
                                                            Add to cart
                                                        </button>
                                                    </span>
                                                </div><!-- /input-group -->
                                            @endif

                                        </form>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="product-details-info">
                <div class="single-block">
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="info-body custom-responsive-margin">
                                <h4>Details</h4>
                                <p>{{ $product->description }}</p>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <x-footer-component />
@endsection
