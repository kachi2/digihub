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
        $data['popular'] = Product::take(4)->inRandomOrder()->get();
        $data['ledgers'] = Product::where('category_id', 1)->inRandomOrder()->take(4)->get();
        $data['businesses'] = Product::where('category_id', 2)->inRandomOrder()->take(4)->get();
        $data['Spreadsheet'] = Product::where('category_id', 4)->inRandomOrder()->take(4)->get();
        $data['Coloring'] = Product::where('category_id', 5)->inRandomOrder()->take(4)->get();
        $data['Digital'] = Product::where('category_id', 6)->inRandomOrder()->take(4)->get();
        $data['Cards'] = Product::where('category_id', 7)->inRandomOrder()->take(4)->get();
        $data['Books'] = Product::where('category_id', 8)->inRandomOrder()->take(4)->get();
        $data['Resume'] = Product::where('category_id', 9)->inRandomOrder()->take(4)->get();
        $data['Stationary'] = Product::where('category_id', 10)->inRandomOrder()->take(4)->get();
        addHashId($data['popular']);
        addHashId($data['ledgers']);
        addHashId($data['businesses']);
        addHashId($data['Spreadsheet']);
        addHashId($data['Coloring']);
        addHashId($data['Digital']);
        addHashId($data['Cards']);
        addHashId($data['Books']);
        addHashId($data['Resume']);
        addHashId( $data['Stationary']);
        return view('users.dashboard', $data, [
            'sliders' => $slider,
        ]);
    }
}
