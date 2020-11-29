@extends('layouts/main')
@section('content')  
<hr>
<div class="card mb-3" style="max-width: 100%;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="<?=URL::to('/blog/public/images/'. $data->image )?>" class="card-img" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
	  &#128064;<span id="count_view"> <?=($data->count_view + 1)?> </span>  &nbsp;   
	  @if (!Auth::guest())
	  <span id="count_like_heart" onclick="count_like_heart('<?=$data->id?>', '{{ Auth::user()->id }}')">&#9825;<span id="count_likes"> <?=$data->count_likes?> </span></span>
        @endif
		<h5 class="card-title"><?=$data->description?></h5>
        <p class="card-text"><?=$data->description?></p>
        <p class="card-text"><small class="text-muted"><?=$data->updated_at?>  <a class="link_autor" href="/show_one_autor/<?=$data->user_id?>"><?=$all_users[$data->user_id]?></a></small></p>
      </div>
    </div>
  </div>
</div>
<hr> 
<?php foreach ($comments as $key => $result) :?>
<div class="card">
  <div class="card-header">
    Сообщение № <?=($key + 1)?>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <p><?=$result->body?></p> 
      <footer class="blockquote-footer"><?=$result->created_at?> <cite title="Source Title"><?=$all_users[$result['user_id']]?></cite></footer>
    </blockquote>
  </div>
</div> <hr> 
<?php endforeach;?>
<hr> 
@if (session('status'))
  <div class="alert alert-success">
    {{ session('status') }}
  </div>
@endif
@if (!Auth::guest())
	<form action="../addcomment-form" method="post">
		{{ csrf_field() }}
	  <div class="form-group">
		<label for="exampleInputEmail1">Добавить комментарий</label>
		<textarea type="text" name="comment" class="form-control" placeholder="Введите комментарий"></textarea>
		<input type="hidden" name="competition_id" value="<?=$data->id?>">
	  </div>
	  <button type="submit" class="btn btn-primary">Отправить</button>
	</form>
@else	
 <div class="alert alert-success">
    Войдите или зарегистрируйтесь для написания сообщений!!!
  </div>	
@endif
<hr> 
@endsection