<!DOCTYPE html>
<html lang="zxx">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="Orbitor,business,company,agency,modern,bootstrap4,tech,software">
  <meta name="author" content="themefisher.com">

  <title>Novena- Health & Care Medical template</title>

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('/front/')}}/images/favicon.ico" />

  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="{{asset('/front/')}}/plugins/bootstrap/css/bootstrap.min.css">
  <!-- Icon Font Css -->
  <link rel="stylesheet" href="{{asset('/front/')}}/plugins/icofont/icofont.min.css">
  <!-- Slick Slider  CSS -->
  <link rel="stylesheet" href="{{asset('/front/')}}/plugins/slick-carousel/slick/slick.css">
  <link rel="stylesheet" href="{{asset('/front/')}}/plugins/slick-carousel/slick/slick-theme.css">
    @yield('style')
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="{{asset('/front/')}}/css/style.css">

</head>

<body id="top">

<header>
	<div class="header-top-bar">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<ul class="top-bar-info list-inline-item pl-0 mb-0">
						<li class="list-inline-item"><a href="mailto:{{$setting->email}}"><i class="icofont-support-faq mr-2"></i> {{$setting->email}}
                        </a></li>
						<li class="list-inline-item"><i class="icofont-location-pin mr-2"></i>{{$setting->address}} </li>
					</ul>
				</div>
				<div class="col-lg-6">
					<div class="text-lg-right top-right-bar mt-2 mt-lg-0">
						<a href="tel:{{$setting->phone}}" >
							<span> اتصل بى الان: </span>
							<span class="h4">{{$setting->phone}}</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg navigation" id="navbar">
		<div class="container">
		 	 <a class="navbar-brand" href="{{route('home')}}">
			  	<img src="{{asset('/front/')}}/images/logo.jpeg" alt="" style="    background-size: cover;    width: 150px;" class="img-fluid">
			  </a>
{{-- {{asset('/front/')}}/images/logo.png --}}
		  	<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain" aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
			<span class="icofont-navigation-menu"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarmain">
			<ul class="navbar-nav ml-auto">

                  {{-- @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">تسجيل الدخول</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">تسجيل حساب جديد</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest --}}

                  <li class="nav-item"><a class="nav-link" href="{{route('Contacts')}}">تواصل معنا</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('categoriesHome') }}">الاقسام</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('about_me') }}">من نحن</a></li>
                  <li class="nav-item active">
                    <a class="nav-link" href="{{route('home')}}">الرئيسية</a>
                  </li>
			</ul>
		  </div>
		</div>
	</nav>
</header>
