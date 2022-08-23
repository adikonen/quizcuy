<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="<?= url("css/profile.css")?>">
  <title class="text-capitalize">Profile <?= $data['user']['nama']?></title>
</head>
<body>
  <div id="card">
	<h1 class="text-capitalize">Profile Pengguna</h1>
	<div class="image-crop">
		<i class="bi bi-person-fill  pt-4 text-dark d-flex align-items-center justify-content-center" style="font-size:100px;"></i>
	</div>
	<div id="bio" class="d-flex align-items-center flex-column">
       <h3><?= $data['user']['nama']?></h3>
	</div>
	<div id="stats">
		<div class="col">
			
			<p class="stat"><i class="bi bi-heart-fill text-danger mx-1 h4"></i><?= $data['user']['jumlah_nyawa']?></p>
			<p class="label">Jumlah Nyawa Tersisa</p>
		</div>
		
		<div class="col">
			<p class="stat"><i class="bi-coin mx-1"></i><?= $data['user']['jumlah_koin']?></p>
			<p class="label">Jummlah Koin Saat Ini</p>
		</div>
	</div>
	<div id="buttons">
		<a href="<?= url('/')?>"><button class="bi bi-arrow-left d-inline">Back</button></a>
		<a href="<?= url('/user/logout')?>"><button class="bi mx-2 btn-secondary d-inline">Logout</button></a>
	</div>
	
</div>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>