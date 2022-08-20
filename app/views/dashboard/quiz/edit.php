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
    <form class="row flex-column flex-md-row p-md-4 p-2" action="<?= url('dashboard/quiz_update/'.$data['quiz']['quiz_id'])?>" method="post">
        <div class="col-lg-4 mr-md-4 mt-md-3">
            <span>Gambar Soal Quiz Sekarang</span>

            <div class="p-2">
                <?php if($data['quiz']['link_foto_soal'] != null):?>
                    <img class="img-fluid" src="<?= url('img/IPA.jpg')?>" alt="gambar_quiz">
                <?php else: ?>
                    <h3 class="text-center my-3">Tidak ada Foto</h3>
                <?php endif;?>
            </div>
            <label for="gambar"><?= $data['quiz']['link_foto_soal'] == null ? "Tamabah" : "Edit" ?> Gambar</label>
            <div class="input-group mb-3">
                <div class="custom-file">
                    <input type="file" name="gambar" class="custom-file-input input" id="gambar">
                    <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                </div>   
            </div>
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
                <textarea name="soal" id="soal" class="form-control rounded input" id="soal" cols="30" rows="5"><?= $data['quiz']['soal']?></textarea>
            </div>
            <div class="col-md-12">
                <label for="input_opsi_a">Opsi A</label>
                <input class="form-control input mb-2" type="text" name="input_opsi_a" id="input_opsi_a" value="<?= $data['quiz']['opsi_a']?>">
            </div>
            <div class="col-md-12">
                <label for="input_opsi_b">Opsi B</label>
                <input class="form-control input mb-2" type="text" name="input_opsi_b" id="input_opsi_b" value="<?= $data['quiz']['opsi_b']?>">
            </div>
            <div class="col-md-12">
                <label for="input_opsi_c">Opsi C</label>
                <input class="form-control input mb-2" type="text" name="input_opsi_c" id="input_opsi_c" value="<?= $data['quiz']['opsi_c']?>">
            </div>
            <div class="col-md-12">
                <label for="input_opsi_d">Opsi D</label>
                <input class="form-control input mb-2" type="text" name="input_opsi_d" id="input_opsi_d" value="<?= $data['quiz']['opsi_d']?>">
            </div>         
            
        </div>
    </form>
</div>