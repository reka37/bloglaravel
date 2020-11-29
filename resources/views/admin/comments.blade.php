@extends('admin/layouts/main')
@section('content')

<?php if (isset($result) && $result) :?>
  <div class="alert alert-success">
   <?=$result?>
  </div>
<?php endif?>
<hr>
<div class="container-fluid">
<table class="table">
  <thead>
    <tr>
		<th scope="col">#</th>
		<th scope="col">Сообщение</th>
		<th scope="col">Пользователь</th>
		<th scope="col">Действия</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($comments as $key => $result) : ?>
    <tr>
		<th scope="row"><?=($key + 1)?></th>
		<td><?=$result['body']?></td>
		<td><?=$all_users[$result['user_id']]?></td>
		<td>
		<?php 
		$id = $result['id'];
		?>
		<div class="btn-group" role="group" aria-label="Basic example">
		  <button type="button" class="btn btn-secondary"><a href='{{ url("admin/editcomment/$id")}}'>Редактировать</a></button>
		  <button type="button" class="btn btn-secondary"><a href='{{ url("admin/deletecomment/$id")}}'>Удалить</a></button>
		</div>
		</td>		
	 </tr>
<?php endforeach ?>
  </tbody>
</table>
</div>
@endsection