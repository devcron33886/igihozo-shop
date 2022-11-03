<div class="container">
    <div class="top-area">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12 col-12">
                <div class="product-images">
                    <main id="gallery">
                        <div class="main-img">
                            <img src="{{ $product->getFirstMediaUrl('image', 'preview') }}" id="current" alt="#">
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
                                {{-- @if ($product->status === 1) --}}
                                <form action="{{ route('cart.addToCart', ['id' => $product->id]) }}"
                                    class="form-inline">

                                    @if ($added)
                                        <button wire:loading.attr="disabled" type="button" wire:click="remove"
                                            class="btn  btn-danger">
                                            <i class="fa fa-times"></i>
                                            Remove
                                        </button>
                                    @else
                                        <div class="input-group mb-3">
                                            <input min="1" value="1" type="text" wire:model="quantity"
                                                max="10" name="qty" class="form-control"
                                                placeholder="Quantity" id="qty{{ $product->id }}">
                                            <button wire:loading.attr="disabled" type="button" wire:click="add" class="btn  btn-success"><i class="fa fa-shopping-cart"></i>
                                                    Add to cart</button>
                                        </div>
                                    @endif


                                </form>
                                {{-- @else
                                    <button class="btn btn-warning">
                                    Not available
                                    </button>
                                @endif --}}

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <x-related-product-component></x-related-product-component>
</div>
