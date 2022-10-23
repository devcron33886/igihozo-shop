<div class="col-lg-4 col-md-6 col-12">
    <div class="single-product">
        <div class="product-image">
            <img src="{{ $product->getFirstMediaUrl('image', 'preview') }}" alt="{{ $product->name }}" style="height:400px !important;">
            <div class="py-4">
                @if ($added)
                    <button type="button" wire:click="remove" wire:loading.attr="disabled" class="btn btn-danger">
                        <i class="lni lni-close"></i>
                        Remove
                    </button>
                @else
                    <button type="button" wire:loading.attr="disabled" wire:click="addToCart" class="btn btn-primary">
                        <i class="lni lni-cart"></i>&nbsp;
                        Add to Cart
                    </button>
                @endif
            </div>
        </div>
        <div class="product-info">
            <span class="category">{{ $product->category->name }}</span>
            <h4 class="title">
                <a href="{{ route('product-details', $product->slug) }}">{{ $product->name }}</a>
            </h4>
            <ul class="review">
            </ul>
            <div class="price">
                <span>{{ $product->formattedPrice() }}</span>
            </div>
        </div>
    </div>
</div>
