<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;

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

        return view('products.show', compact('product'));
    }
}
