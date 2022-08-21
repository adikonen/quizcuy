<h4 class="text-capitalize">Jawaban benar <?= $data['jawaban_benar']?></h4>
<a href="<?= $_SERVER['HTTP_REFERER']?>" class="btn btn-primary mb-3">Kembali</a>
<div class="row">
    <?php foreach($data['users'] as $user):?>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold <?php echo $user['pilihan'] == $user['jawaban_benar'] ? 'text-success' : 'text-danger'?>">
                                <?= $user['pilihan']?>
                            </div>
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <?= $user['nama']?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach;?>
</div>