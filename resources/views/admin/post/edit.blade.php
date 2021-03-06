@extends('admin.layouts.app')

@section('headsection')
  <link rel="stylesheet" type="text/css" href="public/admin/bower_components/select2/dist/css/select2.min.css">
@endsection

@section('main-content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Text Editors
      <small>Advanced form element</small>
    </h1>
    <!-- <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Forms</a></li>
      <li class="active">Editors</li>
    </ol> -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">

        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Post</h3>
          </div>

          @include('admin.layouts.error')
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="{{ route('post.update',$post->id) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="box-body">
              <div class="col-lg-6">
              <div class="form-group">

                  <label for="title">Post Title</label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="Enter title"
                  value="{{ $post->title }}"
                  >
                </div>
                <div class="form-group">
                  <label for="subtitle">Post Sub Title</label>
                  <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Enter Sub title"
                  value="{{ $post->subtitle }}">
                </div>
                <div class="form-group">
                  <label for="slug">Post Slug</label>
                  <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter Slug"
                  value="{{ $post->slug }}">
                </div>
                <div class="form-group">
                  <label for="posted_by">Post By</label>
                  <input type="text" class="form-control" id="posted_by" name="posted_by" placeholder="Enter posted by"
                  value="{{ $post->posted_by }}">
                </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <div class="pull-right">
                      <label for="image">File input</label>
                      <input type="file" name="image" id="image" >
                      <p class="help-block">Example block-level help text here.</p>
                    </div>
                  <div class="checkbox pull left" >
                    <label>
                      <input type="checkbox" name="status" value="1"
                      @if($post->status ==1){{'checked'}} @endif
                      > Public
                    </label>
                  </div>
                </div>
                <br>
                  <div class="form-group" style="margin-top:9px;">
                    <label>Select Tags</label>
                    <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true" name="tags[]">
                      @foreach($tags as $tag)
                      <option value="{{ $tag->id }}"
                        @foreach($post->tags as $postTag)
                          @if($postTag->id == $tag->id)
                            selected
                          @endif
                        @endforeach
                      >{{ $tag->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group" style="margin-top:20px;">
                    <label>Select Categories</label>
                    <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true" name="categories[]">
                      @foreach($categories as $category)
                      <option value="{{ $category->id }}"
                        @foreach($post->categories as $postCategory)
                          @if($postCategory->id == $category->id)
                            selected
                          @endif
                        @endforeach
                        >{{ $category->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
            <!-- /.box-body -->
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Write Post Body Here
                  <small>Simple and fast</small>
                </h3>
                <!-- tools box -->

                <div class="pull-right box-tools">
                  <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                          title="Collapse">
                    <i class="fa fa-minus"></i></button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.box-header -->
              <div class="box-body pad">

                  <textarea name="body"
                            style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="editor1">
                          {{ $post->body }}
                  </textarea>

              </div>
            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
              <a type="button" href="{{ route('post.index') }}" class="btn btn-warning">Back</a>
            </div>
          </form>
        </div>
        <!-- /.box -->
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
@endsection

@section('footersection')

<script src="public/admin/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- <script src="public/admin/bower_components/ckeditor/ckeditor.js"></script> -->
<script src="public/admin/ckeditor/ckeditor.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>
<script>
  $(document).ready(function(){
    $('.select2').select2();
  });
</script>
@endsection
