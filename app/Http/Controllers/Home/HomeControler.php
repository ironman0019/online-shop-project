<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\AdsBanner;
use App\Models\Market\Brand;
use App\Models\Market\Product;
use App\Models\ShowCase;
use Illuminate\Http\Request;

class HomeControler extends Controller
{
    public function index()
    {
        $mostViewedProducts = Product::where('marketable', 1)->orderBy('view_count', 'desc')->take(8)->get();
        $showcaseSlideshows = ShowCase::where('position', 0)->where('status', 1)->get();
        $showcaseLeftTop = ShowCase::where('position', 1)->where('status', 1)->orderBy('updated_at', 'desc')
        ->orderBy('created_at', 'desc')->first();
        $showcaseLeftBottom = ShowCase::where('position', 2)->where('status', 1)->orderBy('updated_at', 'desc')
        ->orderBy('created_at', 'desc')->first();
        $adsBannerTopRight = AdsBanner::where('position', '0')->first();
        $adsBannerTopLeft = AdsBanner::where('position', '1')->first();
        $adsBannerBottom = AdsBanner::where('position', '2')->first();
        $suggestionProducts = Product::where('marketable', 1)->inRandomOrder()->take(8)->get();
        $brands = Brand::all();

        return view('index', compact('mostViewedProducts', 'showcaseSlideshows', 'showcaseLeftTop', 'showcaseLeftBottom', 'adsBannerTopRight', 'adsBannerTopLeft', 'adsBannerBottom', 'suggestionProducts', 'brands'));
    }

    public function product(Product $product)
    {
        $relatedProducts = Product::where('marketable', 1)->where('product_category_id', $product->product_category_id)->inRandomOrder()->take(8)->get()->except($product->id);
        return view('app.product', compact('product', 'relatedProducts'));
    }
}
