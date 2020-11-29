@extends('admin/layouts/main')
@section('content')
<div class="container-fluid">
<button type="button" class="btn btn-primary"><a href="{{ url('admin/addcategory')}}">Добавить категорию</a></button><br>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Название</th>
      <th scope="col">Количество публикаций</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($categories as $key => $result) : ?>
    <tr>
      <th scope="row"><?=($key + 1)?></th>
      <td><?=$result['name']?></td>
      <td><?=$result['count_public']?></td>
    </tr>
<?php endforeach ?>
  </tbody>
</table>
</div>
@endsection