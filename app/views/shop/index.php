<div class="container position-relative bg-light p-md-5 my-2 border-normal">
  <h1 class="show-coin"><i class="bi-coin d-block"> <?= $data['point']['jumlah_koin']?></i></h1>
  <h1 class="text-dark">Isi nyawamu dengan Point :</h1>
  <div class="row cards justify-content-center m-4">
    <?php foreach($data['semua_koin'] as $satu_koin):?>
    <form method="post" class="col-md-3 buy-btn btn bg-card border-normal m-md-3 my-2 p-5 d-flex align-items-center justify-content-center" action="<?= url('shop/store_coin_payment/'.$satu_koin['koin_nyawa_id'])?>">
      <ul class="list-unstyled font-weight-bold h3">
        <li>X <?= $satu_koin['jumlah_nyawa_dipulihkan']?> <i class="bi-heart-fill text-danger"></i></li>
        <li>
          <i class="mt-4 bi-coin d-block"> <?= $satu_koin['jumlah_koin_dibayar']?></i>
        </li>
      </ul>
    </form>
    <?php endforeach;?>
  </div>
  <h1 class="text-dark">Top up Nyawamu disini :</h1>
  <div class="row cards justify-content-center m-4">
    <?php foreach($data['semua_cash'] as $satu_cash): ?>
    <form method="POST" action="<?= url('shop/store_cash_payment/'.$satu_cash['cash_nyawa_id'])?>" class="col-md-3 money-btn bg-card border-normal m-md-4 my-2 p-5 d-flex align-items-center justify-content-center">
      <ul class="list-unstyled font-weight-bold h3">
        <li>X <?= $satu_cash['jumlah_nyawa_dipulihkan']?> <i class="bi-heart-fill text-danger"></i></li>
        <li>
          <p class="mt-4">Rp <?= $satu_cash['jumlah_cash_dibayar']?></p>
        </li>
      </ul>
    </form>
    <?php endforeach;?>
  </div>
</div>
