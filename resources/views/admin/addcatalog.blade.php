@extends('admin/layouts/main')
@section('content') 

 <button type="button" class="btn btn-primary"><a href="{{ url('admin/category')}}">К списку категорий</a></button><br>

<div class="container-fluid">
<form action="category-form" method="post">
{{ csrf_field() }}
  <div class="form-group">
    <label for="exampleInputEmail1">Введите название</label>
    <input type="text" class="form-control" name="name" placeholder="Введите название">
  </div>
  <button type="submit" class="btn btn-primary">Сохранить</button>
</form>
</div>
@endsection