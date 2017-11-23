<div class="col-md-4">

    <!-- Blog Search Well -->
    <form action="search" method="post">
    <div class="well" style="background-color:#365eb4;">
        
        <h4>Blog Search</h4>
        <div class="input-group">
            <input type="hidden" name="_token" value="{{csrf_token()}}";>
            <input type="text" class="form-control" name="tukhoa" placeholder="search">
            <span class="input-group-btn">
                <button class="btn btn-default" type="submit">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </span>
        </div>
        
    </div>
    <form>
    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
          
            @foreach($categories as $category)
            <div class="col-lg-6">
                <ul class="list-unstyled">

                    <li><a href="{{ route('category',$category->slug) }}">{{ $category->name }}</a>
                    </li>

                </ul>
            </div>
            @endforeach

            <!-- /.col-lg-6 -->
            <!-- <div class="col-lg-6">
                <ul class="list-unstyled">
                    <li><a href="#">Category Name</a>
                    </li>
                    <li><a href="#">Category Name</a>
                    </li>
                    <li><a href="#">Category Name</a>
                    </li>
                    <li><a href="#">Category Name</a>
                    </li>
                </ul>
            </div> -->
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <div class="well">
        <h4>Description</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
    </div>

</div>

</div>
<!-- /.row -->

<hr>
