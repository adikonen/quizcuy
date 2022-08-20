<div class=" card px-5 py-3 border-radius ">
    <h1 class="text-center mb-4 text-dark font-weight-bold text-uppercase border-bottom-primary"><?= $data['level'][0]['nama_kategori']?></h1>
    <div class="row justify-content-center">
        <?php foreach($data['level'] as $item) :?>
            <a href="<?= url("quiz/level/{$data['nama_level']}")?>"
                class="d-block font-weight-bold text-black col-xl-2 mx-2 my-1 kotak d-flex align-items-center justify-content-center text-dark">
                <h2><?= $item['nama_level']?></h2>
            </a>
        <?php endforeach;?>
    </div>
</div>