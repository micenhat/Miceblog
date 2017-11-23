<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Model\user\post;
use App\Model\user\tag;
use App\Model\user\category;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function index()
    {
      $posts = post::where('status',1)->orderBy('created_at','DESC')->paginate(6);
      $categories = category::all();
      // foreach ($posts as $post) {
      //   foreach ($post->categories as $category) {
      //     array_push($categories, $category);
      //   }
      // }

      // $categories = array_unique($categories);
      return view('user.blog',compact('posts', 'categories'));
    }

    public function tag(tag $tag)
    {
      $posts = $tag->posts();
      $categories = array();
      foreach ($posts as $post) {
        foreach ($post->categories as $category) {
          array_push($categories, $category);
        }
      }

      $categories = array_unique($categories);
      return view('user.blog',compact('posts', 'categories'));
    }

    public function category(category $category)
    {
      $posts = $category->posts();
      $categories = array();
      foreach ($posts as $post) {
        foreach ($post->categories as $category) {
          array_push($categories, $category);
        }
      }

      $categories = array_unique($categories);
      return view('user.blog',compact('posts', 'categories'));
    }

    public function search(Request $request){
      $tukhoa = $request->tukhoa;

      $posts = post::where('title', 'like',"%$tukhoa%")->orWhere('subtitle','like',"%$tukhoa%")->orWhere('body','like',"%$tukhoa%")->take(30)->paginate(6);
      $categories = array();
      foreach ($posts as $post) {
        foreach ($post->categories as $category) {
          array_push($categories, $category);
        }
      }

      $categories = array_unique($categories);    
      
      return view('user.search',compact('posts','tukhoa', 'categories'));
    }

}
