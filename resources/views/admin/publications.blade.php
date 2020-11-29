@extends('admin/layouts/main')
@section('content')
<div class="container-fluid">
<button type="button" class="btn btn-primary"><a href="{{ url('admin/addpublication')}}">Добавить публикацию</a></button><br>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Название</th>
	     <th scope="col">Описание</th>
      <th scope="col">Превью</th>
	  <th scope="col">Лайки</th>
	  <th scope="col">Просмотры</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($publications as $key => $result) : ?>
    <tr>
		<th scope="row"><?=($key + 1)?></th>
		<td><?=$result['name']?></td>
		<td><?=$result['description']?></td>
		<td><img src="<?=URL::to('/blog/public/images/'. $result['image'] )?>" style="height:150px; width:150px; object-fit:cover" class="card-img-top" alt="..."></td>
    	<td><?=$result['count_likes']?></td>
		<td><?=$result['count_view']?></td>
	</tr>
<?php endforeach ?>
  </tbody>
</table>
</div>
@endsection


