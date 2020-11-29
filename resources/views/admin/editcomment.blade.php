@extends('admin/layouts/main')
@section('content') 
 <button type="button" class="btn btn-primary"><a href="{{ url('admin/comments')}}">К списку комментариев</a></button><br>
<div class="container-fluid">
<hr>
@if (session('status'))
  <div class="alert alert-success">
    {{ session('status') }}
  </div>
@endif
<form action="../editcomment-form" method="post">
{{ csrf_field() }}
	<div class="form-group">
		<label for="exampleInputEmail1">Введите комментарий</label>
		<textarea type="text" class="form-control" name="body" placeholder="Введите комментарий"><?=$comment->body?></textarea>
	</div>
	<input type="hidden" name="id" value="<?=$comment->id?>">
	<div class="btn-group btn-group-toggle" data-toggle="buttons">
	<label class="btn btn-secondary <?php if ($comment->public == '0') { echo 'active';}?>">
	<input type="radio" name="public" value="0" <?php if ($comment->public == '0') { echo 'checked';}?>>Не опубликовано
	</label>
	<label class="btn btn-secondary <?php if ($comment->public == '1') { echo 'active';}?>">
	<input type="radio" name="public" value="1" <?php if ($comment->public == '1') { echo 'checked';}?>>Опубликовать
	</label>
	</div><br><hr>
  <button type="submit" class="btn btn-primary">Сохранить</button>
</form>
</div>
@endsection