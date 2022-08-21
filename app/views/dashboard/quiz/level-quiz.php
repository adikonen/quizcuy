 <div class=" card px-5 py-3 border-radius ">
    <div class="text-center  border-bottom-primary pb-1 mb-3">
        <h1 class="text-dark font-weight-bold text-uppercase">QUIZ <?= $data['nama_kategori']?></h1>
        <a href="<?= url('dashboard/quiz/')?>" class="text-uppercase btn-secondary btn">kembali</a>
    </div>
    
    <div class="row justify-content-center">
        <?php foreach($data['levels'] as $item) :?>
            <a href="<?= url("dashboard/quiz_show/{$item['nama_kategori']}/{$item['nama_level']}")?>"
                class="d-block font-weight-bold text-black col-xl-2 btn-light mx-2 my-1 kotak d-flex align-items-center justify-content-center text-dark">
                <h2><?= $item['nama_level']?></h2>
            </a>
        <?php endforeach;?>
    </div>
</div>