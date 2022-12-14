<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Halaman <?= $data['title']; ?></title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/style.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src=<?= url("vendor/jquery/jquery.min.js");?>></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   
    
</head>
<body class="bg-base-color">
<nav class="bg-blue-gradient p-3 d-flex justify-content-between" style="border-radius:0;">
  <b class="h1">QUIZCUY</b>
  <div class="icons d-flex align-items-center">
    <a href="<?= url('/')?>" class="bi bi-house-door-fill h1 mx-3"></a>
    <?php if($_SESSION['user_login']['nama_posisi'] === 'admin'):?>
      <a href="<?= url('/dashboard')?>" class="text-dark bi bi-microsoft h2"></a>  
    <?php endif;?>
      <a href="<?= url('/shop')?>" class="bi bi-cart4 h1 mx-3"></a>
      <a href="<?= url('user/profile/'.$_SESSION['user_login']['user_id'])?>" class="text-dark d-flex rounded-circle justify-content-center bg-light px-2">
        <i class="bi bi-person-fill h1"></i>
      </a>
  </div>
  
</nav>
<?php if(isset($_SESSION['success'])):?>
<div class="container text-capitalize table-primary p-2 px-4">
  <h4><?= $_SESSION['success']?></h4>
</div>
<?php endif?>

<?php if(isset($_SESSION['fail'])):?>
<div class="container text-capitalize table-danger p-2 px-4">
  <h4><?= $_SESSION['fail']?></h4>
</div>
<?php endif?>