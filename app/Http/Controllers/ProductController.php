<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Database\Eloquent\Builder;
use App\Models\OrderItem;

class ProductController extends Controller
{
    public function __invoke(Product $product)
    {
        SEOTools::setTitle($product->name);
        SEOTools::setDescription($product->description);
        SEOMeta::addMeta('product:created_time', $product->created_at->toW3CString(), 'property');
        SEOMeta::addMeta('product:section', $product->category->name, 'property');

        OpenGraph::setDescription($product->description);
        OpenGraph::setTitle($product->name);
        OpenGraph::setUrl('https://igihozocouture.com/collection/product/'.$product->slug);

        JsonLd::setTitle($product->name);
        JsonLd::setDescription($product->description);

        $onOder = OrderItem::query()->where('product_id', $product->id)->limit(20)->get();
        $alsoBoughtProducts = collect([]);
        if ($onOder) {
            $alsoBoughtProducts = Product::with('category')
                ->whereHas('orderItems', function (Builder $builder) use ($onOder, $product) {
                    $builder->whereIn('order_id', $onOder->pluck('order_id'))
                        ->where('product_id', '!=', $product->id);
                })->inRandomOrder()->limit(8)->get();
        }
        if ($alsoBoughtProducts->isEmpty()) {
            $alsoBoughtProducts = Product::with('category')
                ->where('category_id', $product->category_id)->inRandomOrder()
                ->limit(8)->get();
        }

        return view('products.show', compact('product'));
    }
}
