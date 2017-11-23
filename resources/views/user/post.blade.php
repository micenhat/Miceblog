@extends('user/app')

@section('head')
<link href="public/user/css/prism.css" rel="stylesheet">
@endsection
@section('main-content')
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.10&appId=140710136520317";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8" style="background-color: #cccccc; border-radius: 6px;border:0.8px solid #365eb4;">

            <!-- First Blog Post -->
            <div>
              <h3>
                <a href="/"style="color: red">{{ $post->title }}</a>
              </h3>
            </div>
            <h4>
                <a href="#">{{ $post->subtitle }}</a>
            </h4>
            
            <p class="lead">
                by <a href="index.php">{{ $post->posted_by }}</a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> {{ $post->created_at->diffForHumans() }}
              @foreach($post->categories as $category)
                <small class="pull-right" style="margin-right: 20px;font-size:15px" >
                  <a href="{{ route('category',$category->slug) }}">{{ $category->name }}</a>
                </small>
              @endforeach
            </p>
            <div><hr  width="100%" style="border-radius: 6px;border:2px solid gray" /></div>
            {!! htmlspecialchars_decode($post->body) !!}
            <!-- tag clouds -->
            <h3>Tag Clouds:</h3>
            @foreach($post->tags as $tag)
              <a href="{{ route('tag',$tag->slug) }}"><small class="pull-left" style="margin-right: 20px;font-size:15px; border-radius: 6px;border:0.8px solid gray;padding: 2px;color:black;background-color:#C5E72B;"; >
                {{ $tag->name }}
              </small>
            </a>
            @endforeach
            <hr>

            <!-- Pager -->
            <!-- <ul class="pager">
                <li class="previous">
                    <a href="#">&larr; Older</a>
                </li>
                <li class="next">
                    <a href="#">Newer &rarr;</a>
                </li>
            </ul> -->
            <div class="fb-comments" data-href="{{ Request::url() }}" data-numposts="10"></div>
        </div>

@endsection

@section('footer')
<script src="public/user/js/prism.js"></script>
@endsection
