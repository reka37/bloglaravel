@extends('admin/layouts/main')

@section('content')
 <button type="button" class="btn btn-primary"><a href="{{ url('admin/publications')}}">К списку публикаций</a></button><br>
<form action="addpublicationsave" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
	<div class="form-group">
		<label for="exampleInputEmail1">Добавить публикацию</label>
		<input type="text" name="description" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Введите описание">
	</div><br>
	<label for="exampleInputEmail1">Выберите категорию</label>  
	<select class="form-control" name="category">
	<?php foreach ($categories as $key => $result) :?>
	<option value="<?=$result->id?>"><?=$result->name?></option>
	<?php endforeach ?>
	</select><br>
	<label for="exampleInputEmail1">Выберите автора</label>  
	<select class="form-control" name="user_id">
	<?php foreach ($users as $key => $result) :?>
	<option value="<?=$result->id?>"><?=$result->name?></option>
	<?php endforeach ?>
	</select>
<div class="form-group">
    <label for="exampleFormControlFile1">Выберите файл</label>
    <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
  </div>
  <button type="submit" class="btn btn-primary">Отправить</button>
</form>				
@endsection