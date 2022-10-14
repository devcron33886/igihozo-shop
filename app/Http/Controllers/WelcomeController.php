<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Artesaos\SEOTools\Facades\SEOTools;

class WelcomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        SEOTools::setTitle('Home');
        SEOTools::setDescription('Igihozo couture is the best fashion design house that is located in Kigali city, KCT Building.');
        SEOTools::opengraph()->setUrl('https://igihozocouture.com');
        SEOTools::setCanonical('https://igihozocouture.com');
        SEOTools::twitter()->setSite('@LuizVinicius73');
        SEOTools::jsonLd()->addImage('https://igihozocouture.com/images/logo/logo.png');

        return view('welcome', compact('categories'));
    }

    public function about()
    {
        return view('about');
    }
}
