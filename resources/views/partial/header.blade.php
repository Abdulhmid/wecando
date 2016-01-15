<header id="header">      
    <div class="navbar navbar-inverse" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="{!! url('/') !!}">
                    <h1><img src="{!! asset('additional/home/images/logo.png') !!}" alt="logo"></h1>
                </a>
                
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="{!! url('/') !!}">Home</a></li>                                       
                    <li><a href="{!! url('/newsletter') !!}">Newsletter</a></li>                    
                    <li><a href="{!! url('/campaign') !!}">Campaign</a></li>                    
                    <li><a href="{!! url('/donate') !!}">Donasi</a></li>    

                    @if(empty(session('member_session')))
                        <li><a href="{!! url('/go') !!}">Login</a></li>    
                        <li><a href="{!! url('/reg') !!}">Register</a></li>    
                    @else
                        <li class="dropdown">
                            <a href="#"> Masuk </i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="aboutus.html">Login</a></li>
                                <li><a href="aboutus2.html">Register</a></li>
                            </ul>
                        </li>  
                    @endif               
                </ul>
            </div>
            <div class="search">
                <form role="form">
                    <i class="fa fa-search"></i>
                    <div class="field-toggle">
                        <input type="text" class="search-form" autocomplete="off" placeholder="Search">
                    </div>
                </form>
            </div>
        </div>
    </div>
</header>