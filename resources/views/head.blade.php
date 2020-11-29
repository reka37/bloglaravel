@extends('layouts/main')
@section('content') 
<hr>
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" style="opacity:0.8">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active" style="height:400px">
      <img src="<?=URL::to('/blog/public/images/carusel/541.jpg')?>" style="object-fit:cover" class="d-block w-100 h-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Играй</h5>
        <p>Играй и записывай блог об этом</p>
      </div>
    </div>
    <div class="carousel-item" style="height:400px">
      <img src="<?=URL::to('/blog/public/images/carusel/515.jpg')?>" style="object-fit:cover" class="d-block w-100 h-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Проходи уровни</h5>
        <p>Проходи уровни и рассказывай как это делать</p>
      </div>
    </div>
	<div class="carousel-item" style="height:400px">
      <img src="<?=URL::to('/blog/public/images/carusel/333.jpg')?>" style="object-fit:cover" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Читай</h5>
        <p>Читай записи других блогеров</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<hr>
<hr>
<?php if (isset($result) && $result) :?>
  <div class="alert alert-success">
    <?=$result?>
  </div>
<?php endif ?>   
<div class="content">
	<div class="row">
		<?php foreach ($data as $dat) :?>
			<div class="col-md-3 col-lg-3 col-sm-12">
			<a href="/one/<?=$dat->id?>" onclick="set_show('<?=$dat->id?>')">
				<img src="<?=URL::to('/blog/public/images/'. $dat->image )?>" style="height:300px; object-fit:cover" class="card-img-top" alt="...">
				<div class="card-body">
				<p class="card-text"><?=$dat->description?></p>
				</div>
				</a>
			</div>
		<?php endforeach;?>   
	</div>	
</div>	
<nav aria-label="">
  <ul class="pagination pagination-sm">
	<?php if (isset($count_pagination)) :?>  
	<?php (isset($_GET['page']) ? $page =$_GET['page'] : $page = 1) ?>
		<?php for ($i = 1; $i <= $count_pagination; $i++) :?> 
			<li class="page-item <?php if (isset($page) && $page == $i) echo 'active'; ?>">
				<a class="page-link" href="/?page=<?=$i?>">
					<?=$i?>
				</a>
			</li>
		<?php endfor?>
	<?php endif ?>
  </ul>
</nav>	
@endsection