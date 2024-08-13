<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Vinkla\Hashids\Facades\Hashids;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     
    public function __invoke(Request $request)
    {
        $slider = Slider::latest()->get();
        $data['popular'] = Product::take(4)->orderBy('views', 'DESC')->get();
        $data['topProducts1'] = Product::orderBy('views', 'DESC')->take(6)->get();
        $data['productCat1'] = Product::where('category_id', 24)->inRandomOrder()->take(9)->get();
        $data['productCat2'] = Product::where('category_id', 3)->inRandomOrder()->take(9)->get();
        $data['productCat3'] = Product::where('category_id', 1)->inRandomOrder()->take(9)->get();
        $data['productCat4'] = Product::where('category_id', 4)->inRandomOrder()->take(9)->get();
        $data['advert'] = Product::inRandomOrder()->take(3)->get();
        addHashId($data['popular']);
        addHashId($data['topProducts1']);
        addHashId( $data['productCat1']);
        addHashId( $data['productCat2']);
        addHashId( $data['productCat3']);
        addHashId( $data['productCat4']);
        addHashId($data['advert']);
        return view('users.dashboard', $data, [
            'sliders' => $slider,
        ]);
    }
}
