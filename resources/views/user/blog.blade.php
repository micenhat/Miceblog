@extends('user/app')

@section('main-content')
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8" style="background-color: #cccccc; border-radius: 6px;border:0.8px solid #365eb4;">
            <div>
            <div  align="center" style="color:red" >
                <h1>Home 
                <small>Status</small>
              </h1>
                <div><hr  width="100%" style="border-radius: 6px;border:2px solid gray" /></div>
            </div>

            @foreach($posts as $post)
            <!-- First Blog Post -->
            <h4>
                <a href="{{ route('post',$post->slug) }}" style="color: red">{{ $post->title }}</a>
          </h4>

                <a href="#">{{ $post->subtitle }}</a>

            <p class="lead">
                by <a href="index.php">{{ $post->posted_by }}</a>
            </p>
            <div>
            <p><span class="glyphicon glyphicon-time"></span>{{ $post->created_at->diffForHumans() }}
            <a href="">
                <small>0</small>
                <i class="fa-thumbs-up" aria-hidden="true"></i>
                <!-- <span class="glyphicon glyphicon-edit"></span> -->
            </a>

            </p>

            <div style=""><p><span>{!! str_limit($post->body,500) !!}</span></p></div>
            <a class="btn btn-primary" href="{{ route('post',$post->slug) }}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
            <div><hr  width="100%" style="border-radius: 6px;border:2px solid gray" /></div>
          </div>
            @endforeach
            
            <!-- Pager -->
            <ul class="pager">
                {{ $posts->links() }}
            </ul>
          </div>
        </div>
@endsection
