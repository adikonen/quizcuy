
 <div class="container bg-light p-md-5 my-5 border-normal">
      <h1 class="text-dark">Welcome User</h1>
      <div class="container bg-light shadow mt-3 p-3 pr-5 border-normal d-flex justify-content-between align-items-center">
        <h3 class="m-4">Lihat Aturan Disini</h3>
        <svg class="mr-5" xmlns="http://www.w3.org/2000/svg" width="33" height="33" fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
          <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
        </svg>
      </div>
      <div class="row my-5">
        <?php foreach($data['semua_kategori'] as $category):?>
          <a href="<?= url('quiz/kategori/'.$category['nama_kategori'])?>" class="text-dark d-block col-md-6 height-subject position-relative p-5 my-3 d-flex border-normal justify-content-center align-items-center">
            <img src="<?= url('img/ipa.jpg')?>" alt="gambar-<?= $category['nama_kategori']?>" class="img-fluid">
            <h4 class="h1-subject h2 text-uppercase position-absolute z-1"><?= $category['nama_kategori']?></h4>
          </a>
        <?php endforeach;?>
      </div>
    </div>
</div>