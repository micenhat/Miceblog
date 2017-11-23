<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="border:1px solid gray;background: #365eb4" >
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header" >
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" style="color:white" href="/"><b>Mice</b>BLOG</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"  >
            <ul class="nav navbar-nav">
                <li>
                    <a href="/">HOME</a>
                </li>
                <li>
                    <a href="{{ route('register') }}">REGISTER</a>
                </li>
                <li>
                    <a href="/">SIMPLEPOST</a>
                </li>
                <li>
                    <a href="/">CONTACT</a>
                </li>
                <li>
                  @if(auth::guest())
                    <a href="{{ route('login') }}">LOGIN</a>

                  @else
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        LOGOUT
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                  @endif
                </li>
                <li>
                    <div class="dropdown">
                      <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown" style="margin-left:20px; margin-top: 10px;height:30px;text-align: center;">CATEGORIES
                      <span class="caret"></span></button>
                      <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                        @foreach($categories as $category)
                        <li role="presentation"><a role="menuitem" href="{{ route('category',$category->slug) }}">{{ $category->name }}</a></li>
                        
                        @endforeach
                        
                      </ul>
                    </div>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
