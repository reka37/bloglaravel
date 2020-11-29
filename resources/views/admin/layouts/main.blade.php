<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

           <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- Styles -->
        <style>
			*{
    margin: 0px;
    padding: 0px;
	font-family: Georgia, serif;
}
		
		
            html, body {
                background-color: #fff;
                color: black;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: black;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
			a { 
				color:black;
				font-weight:bold;
			}
			.footer {
				position:absolute;
				bottom:0;
				text-align:center;
			}
			
			.card-text a .link_autor {
				background-color: black;
			}
        </style>
    </head>
    <body>
			<div class="container">	
				<ul class="nav justify-content-end">
				  <li class="nav-item">
					<a class="nav-link" href="{{ url('/admin') }}">Администратор</a>
				  </li>
				</ul>
				<div class="row">
					<div class="col-3">
						<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
							<a class="nav-link" href="{{ route('admin.publications') }}">Публикации</a>
							<a class="nav-link" href="{{ route('admin.comments') }}">Комментарии</a>
							<a class="nav-link" href="{{ route('admin.category') }}">Категории</a>
							<a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" onclick="event.preventDefault();
							 document.getElementById('logout-form').submit();"href="{{ route('logout') }}" role="tab" aria-controls="v-pills-settings" aria-selected="false">Выход</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							{{ csrf_field() }}
							</form>
						</div>
					</div>
					<div class="col-9">
						<div class="tab-content" id="v-pills-tabContent">
							<div class="container-fluid">
								@yield('content')
							</div>
						</div>
					</div>
				</div>	
				<div class="footer container">
					<div class="row justify-content-center">
						<div class="copyright-block-container justify-content-center">
							<p><?=date('Y')?> © Блог о компьютерных играх</p>
						</div>					
					</div>
				</div>
			</div>		
		<script src="{{ asset('js/app.js') }}"></script>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
		integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    </body>
</html>
