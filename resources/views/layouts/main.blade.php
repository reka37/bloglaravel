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
    <!--<link href="/blog/public/css/app.css" rel="stylesheet">-->
	<link href="/blog/public/css/main.css" rel="stylesheet">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- Styles -->
    </head>
    <body>
		<div class="container">		
			<nav class="navbar navbar-default navbar-static-top nav-pills">
				<div class="container">
					<div class="navbar-header">
					<ul class="nav justify-content-end">
						  <li class="nav-item">
					<a class="nav-link" href="{{ url('/') }}">
						<img src="<?=URL::to('/blog/public/images/logo/Game.gif')?>" style="height:50px; width:50px; object-fit:cover" class="card-img-top" alt="...">				 
					</a>
				  </li>									
				 <li class="nav-item">
					<a <?php if ($_SERVER['REQUEST_URI'] == '/') { echo 'class="nav-link active"'; } else { echo 'class="nav-link"'; }?> href="{{ url('/') }}">
						Блог о компьютерных играх
					</a>
				  </li>
				  <?php foreach ($menus as $key => $result) : ?>					 
					<li class="nav-item">
					<a <?php if ($_SERVER['REQUEST_URI'] == '/cats/' . $result->id) { echo 'class="nav-link active"'; } else { echo 'class="nav-link"'; }?> href="/cats/<?=$result->id?>"><?=$result->name?></a>
				  </li>					 
				  <?php endforeach; ?>
				  <li class="nav-item">
					<a <?php if ($_SERVER['REQUEST_URI'] == '/contact') { echo 'class="nav-link active"'; } else { echo 'class="nav-link"'; }?> href="/contact">Контакты</a>
				  </li>
				   @if (Auth::guest())
				  <li class="nav-item">
					  <a <?php if ($_SERVER['REQUEST_URI'] == '/login') { echo 'class="nav-link active"'; } else { echo 'class="nav-link"'; }?> href="{{ route('login') }}">Вход</a>
				  </li>				  				  			  
				   <li class="nav-item">
					  <a <?php if ($_SERVER['REQUEST_URI'] == '/register') { echo 'class="nav-link active"'; } else { echo 'class="nav-link"'; }?> href="{{ route('register') }}">Регистрация</a>
				  </li>
					@else
					 <li class="nav-item">
					  <a class="nav-link" href="{{ route('lk') }}">Личный кабинет ({{ Auth::user()->name }})</a>
				  </li>		
					@if (Auth::user()->email == 'root@mail.ru')
						<li class="nav-item">
					  <a class="nav-link" href="{{ route('admin.publications') }}">Администратор</a>
				  </li>
				  @endif				  
				   <li class="nav-item">
					<a class="nav-link" href="{{ route('logout') }}"
						onclick="event.preventDefault();
								 document.getElementById('logout-form').submit();">
						Выйти
					</a>

					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						{{ csrf_field() }}
					</form>
					</li>	
					@endif
					</ul>						
					<form class="form-inline my-2 my-lg-0" method="post" action="/search">
						{{ csrf_field() }}
					  <input class="form-control mr-sm-2" type="search" name="search" placeholder="Поиск" aria-label="Search">
					  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
					</form>					
                </div>   			
            </div>
        </nav>
		<div class="container-fluid">
		@yield('content')
		@include('left')
		</div>
		<hr>
			<div class="container footer">	
				<div class="row">		
					<div class="col-lg-4 col-md-4 col-sm-6 padbot30">
					<h4>О нас</h4>
					<p>Блог о компьюторных играх. Многие пользователи интернета увлекаются компьютерными играми. Ищут в сети обзоры и прохождения, интересуются историей созданий игр.</p>
					<p>Компьютерные ролевые игры. Как много стоит за этим жанром. Они прошли огромный путь.</p>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6 padbot30">
					<h4>О играх</h4>
					<p>Большая сила воли требуется, чтобы пройти до конца тридцатиуровневую игрушку. Хотя ещё большая сила воли требуется, чтобы потом её удалить. Но и этой силы воли не достаточно, чтобы не установить себе новую версию.</p>
					<p>Компьютерные ролевые игры. Как много стоит за этим жанром. Они прошли огромный путь.</p>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6 padbot30">
					<h4>О компьюторах</h4>
					<p>Блог о компьюторных играх. Многие пользователи интернета увлекаются компьютерными играми. Ищут в сети обзоры и прохождения, интересуются историей созданий игр.</p>
					<p>Компьютерные ролевые игры. Как много стоит за этим жанром. Они прошли огромный путь.</p>
					</div>
					<div class="respond_clear"></div>
				</div>
			</div>
			<hr>
			  <div class="container  footer">
				<div class="row">
					<div class="col-md-12 copyright-block">			
						<div class="copyright-block-container text-center">
							<p><?=date('Y')?> © Блог о компьютерных играх</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="/blog/public/js/app.js"></script>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
		integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		<script>
			var set_show = function(id) { 
			   $.ajax({
					type:'POST',
					url:'{{ route("setview") }}',
					data:{_token :"<?php echo csrf_token() ?>", id: id},
					success:function(data){
					},
					error: function (data) {
					}
			   });
			}

			var count_like_heart = function(id, user_id) {
				
			  $.ajax({
					type:'POST',
					url:'{{ route("setlike") }}',
					data:{_token :"<?php echo csrf_token() ?>", id: id, user_id: user_id},
					success:function(data){
						
						$("#count_likes").html(data.count_likes);
					},
					error: function (data) {
					}
			   });
			}
		</script>
    </body>
</html>
