<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Product;
use Vinkla\Hashids\Facades\Hashids;

class BlogController extends Controller
{
    public function Index(){
    
        $blogs =  Blog::latest()->simplePaginate(20);
        foreach($blogs as $Blog){
            $Blog->hashid = Hashids::connection('products')->encode($Blog->id);
        }
        return view('users.pages.blogs')->with('blogs',$blogs);
    }

    public function Details($id){
        $latest =  Blog::latest()->simplePaginate(20);
        foreach($latest as $bb){
            $bb->hashid = Hashids::connection('products')->encode($bb->id);
        }
        $id = Hashids::connection('products')->decode($id);
        $blogs = Blog::findorfail($id[0]);
    return view('users.pages.blog_details')
    ->with('blogs', $latest)
    ->with('blog', $blogs);

    }
}
