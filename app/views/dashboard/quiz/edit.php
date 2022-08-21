<div class="card shadow border-bottom-dark mx-lg-5 mb-lg-4">
    <div
        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary text-capitalize">
            Quiz <?= $data['quiz']['nama_kategori']?> Level <?= $data['quiz']['nama_level']?>
        </h6>
        <div class="dropdown no-arrow">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
            </a>
        </div>
    </div>
    <form enctype="multipart/form-data" class="row flex-column flex-md-row p-md-4 p-2" action="<?= url('dashboard/update_quiz/'.$data['quiz']['quiz_id'])?>" method="post">
        <div class="col-lg-4 mr-md-4 mt-md-3">
            <span>Gambar Soal Quiz Sekarang</span>

            <div class="p-2">
                <?php if($data['quiz']['link_foto_soal'] != null):?>
                    <img class="img-fluid" src="<?= url($data['quiz']['link_foto_soal'])?>" alt="gambar_quiz">
                <?php else: ?>
                    <h3 class="text-center my-3">Tidak ada Foto</h3>
                <?php endif;?>
            </div>
            <!-- <?php if($data['quiz']['link_foto_soal'] != null):?>
                <button class="btn btn-danger w-100">Hapus Gambar</button>
            <?php endif;?> -->
            <label for="gambar"><?= $data['quiz']['link_foto_soal'] == null ? "Tambah" : "Ganti" ?> Gambar</label>
            <input type="file" name="gambar" class="btn" id="">
            <div class="radio-buttons">
                <p class="mt-2 mb-1">Jawaban Yang benar adalah</p>
                <input class="input" type="radio" id="opsi_a" name="jawaban_benar" value="a" <?php if($data['quiz']['jawaban_benar'] === 'a'):?> checked <?php endif;?>>
                <label for="opsi_a">Opsi A</label><br>

                <input class="input" type="radio" id="opsi_b" name="jawaban_benar" value="b" <?php if($data['quiz']['jawaban_benar'] === 'b'):?> checked <?php endif;?>>
                <label for="opsi_b">Opsi B</label><br>
                
                <input  class="input" type="radio" id="opsi_c" name="jawaban_benar" value="c" <?php if($data['quiz']['jawaban_benar'] === 'c'):?> checked <?php endif;?>>
                <label for="opsi_c">Opsi C</label><br>

                <input  class="input" type="radio" id="opsi_d" name="jawaban_benar" value="d" <?php if($data['quiz']['jawaban_benar'] === 'd'):?> checked <?php endif;?>>
                <label for="opsi_d">Opsi D</label>
            </div>     
        
        </div>

        <div class="form-group row col-lg-7">
            <div class="col-12 mb-2">
                <label for="soal">Soal Quiz</label>
                <textarea name="soal" id="soal" class="form-control rounded input  <?= isInvalid('soal')?>" id="soal" cols="30" rows="5"><?= $data['quiz']['soal']?></textarea>
                <span class="text-danger"><?= error('soal')?></span>
            </div>
            <div class="col-md-12">
                <label for="input_opsi_a">Opsi A</label>
                <input class="form-control input mb-2 <?= isInvalid('input_opsi_a')?>" type="text" name="input_opsi_a" id="input_opsi_a" value="<?= $data['quiz']['opsi_a']?>">
                <span class="text-danger"><?= error('input_opsi_a')?></span>
            </div>
            <div class="col-md-12">
                <label for="input_opsi_b">Opsi B</label>
                <input class="form-control input mb-2 <?= isInvalid('input_opsi_b')?>" type="text" name="input_opsi_b" id="input_opsi_b" value="<?= $data['quiz']['opsi_b']?>">
                <span class="text-danger"><?= error('input_opsi_b')?></span>
            </div>
            <div class="col-md-12">
                <label for="input_opsi_c">Opsi C</label>
                <input class="form-control input mb-2 <?= isInvalid('input_opsi_c')?>" type="text" name="input_opsi_c" id="input_opsi_c" value="<?= $data['quiz']['opsi_c']?>">
                <span class="text-danger"><?= error('input_opsi_c')?></span>
            </div>
            <div class="col-md-12">
                <label for="input_opsi_d">Opsi D</label>
                <input class="form-control input mb-2 <?= isInvalid('input_opsi_d')?>" type="text" name="input_opsi_d" id="input_opsi_d" value="<?= $data['quiz']['opsi_d']?>">
                <span class="text-danger"><?= error('input_opsi_d')?></span>
            </div>         
            <div class="col-12">
            <button class="btn btn-success btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-check"></i>
                </span>
                <span class="text">Simpan Perubahan</span>
            </button>
            <a href="<?= url("dashboard/quiz_show/{$data['quiz']['nama_kategori']}/{$data['quiz']['nama_level']}")?>" class="btn btn-secondary btn-icon-split">
                <span class="text">Kembali</span>
            </a>
            </div>
        </div>
    </form>
</div>