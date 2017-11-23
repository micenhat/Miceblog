<?php

namespace App\Http\Controllers\Admin;
use App\Model\user\post;
use App\Model\user\tag;
use App\Model\user\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;


class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index()
    {
        $posts = post::all();
        return view('admin.post.show',compact('posts'));
    }

    public function create()
    {
        if(auth::user()->can('posts.create')){
        $tags = tag::all();
        $categories = category::all();
        return view('admin.post.post',compact('tags','categories'));
      }
      return redirect(route('admin.home'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
          'title'=>'required',
          'subtitle'=>'required',
          'slug'=>'required',
          'body'=>'required',
          'posted_by'=>'required',
          'image'=>'required',
        ]);
        if($request->hasFile('image'))
        {
          $imageName = $request->image->store('public');
        }
        $post = new post;
        $post->image = $imageName;
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->slug = $request->slug;
        $post->posted_by = $request->posted_by;
        $post->body = $request->body;
        $post->status = $request->status;

        $post->save();
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);
        return redirect(route('post.index'));
    }

    public function show($id)
    {

    }


    public function edit($id)
    {
      if(auth::user()->can('posts.update')){
        $post = post::with('tags','categories')->where('id',$id)->first();
        $tags = tag::all();
        $categories = category::all();
        return view('admin.post.edit',compact('tags','categories','post'));
        }
      return redirect(route('admin.home'));
    }


    public function update(Request $request, $id)
    {
      $this->validate($request,[
        'title'=>'required',
        'subtitle'=>'required',
        'slug'=>'required',
        'posted_by'=>'required',
        'body'=>'required',
        'image'=>'required',
      ]);
      if($request->hasFile('image'))
      {
        $imageName = $request->image->store('public');
      }

      $post = post::find($id);

      $post->title = $request->title;
      $post->image = $imageName;
      $post->subtitle = $request->subtitle;
      $post->slug = $request->slug;
      $post->slug = $request->slug;
      $post->posted_by = $request->posted_by;
      $post->status = $request->status;
      $post->tags()->sync($request->tags);
      $post->categories()->sync($request->categories);
      $post->save();

      return redirect(route('post.index'));
    }

    public function destroy($id)
    {
      post::where('id',$id)->delete();
      return redirect()->back();
    }
}
