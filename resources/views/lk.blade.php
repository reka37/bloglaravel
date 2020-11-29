@extends('layouts.main')
@section('content')
<form action="lk-form" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
  <div class="form-group">
    <label for="exampleInputEmail1">Добавить картинку</label>
    <input type="text" name="description" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Введите описание">
  </div>
<div class="form-group">
    <label for="exampleFormControlFile1">Выберите файл</label>
    <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
  </div>
  <button type="submit" class="btn btn-primary">Отправить</button>
</form>		
<div class="row">
	<?php foreach ($data as $dat) :?>
		<div class="col-md-4 col-lg-4 col-sm-12">
			<img src="<?=URL::to('/blog/public/images/'. $dat->image )?>" style="height:300px; object-fit:cover" class="card-img-top" alt="...">
			<div class="card-body">
			<p class="card-text"><?=$dat->description?></p>
			</div>
		</div>
	<?php endforeach;?>   
</div>			
@endsection