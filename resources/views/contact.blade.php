@extends('layouts.main')
@section('content')
<form action="contact-form" method="post">
{{ csrf_field() }}
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Пароль</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Пароль">
  </div>
  <button type="submit" class="btn btn-primary">Отправить</button>
</form>		
@endsection