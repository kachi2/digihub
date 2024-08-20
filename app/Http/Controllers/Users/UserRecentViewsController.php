<?php

namespace App\Http\Controllers\Users;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserRecentViewsController extends Controller
{
    public function recentViews()
    {
        $products = session()->get('products.recently_viewed');
        if (is_array($products)) {
            $data = array_unique($products);
            $datas = array_slice($data, -10, 10, true);
            $products['recent'] = Product::whereIn('id', $datas)->take(10)->latest()->get();
            addHashId($products['recent']);
        } else {
            $products['recent'] = [];
        }
        return view('users.accounts.recent_views', $products);
    }

}
