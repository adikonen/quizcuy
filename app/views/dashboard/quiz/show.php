<h4 class="text-center mt-3 text-capitalize">Kumpulan Quiz <?= $data['nama_kategori']?> Pada Level <?= $data['nama_level']?></h4>
<div class="text-center my-2"><a href="<?=url('dashboard/quiz_level/'.$data['nama_kategori'])?>" class="btn btn-primary text-capitalize">kembali</a></div>
<?php $i = 1;?>
<?php foreach($data['quizzes'] as $quiz): ?>
<div class="card shadow border-bottom-dark mx-lg-5 mb-lg-4">
    <div
        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary text-capitalize">
            Quiz <?= $quiz['nama_kategori']?> Level <?= $quiz['nama_level']?>
        </h6>
        <div class="dropdown no-arrow">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink_<?= $i?>"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                aria-labelledby="dropdownMenuLink_<?= $i?>">
                <div class="dropdown-header">Aksi:</div>
                <a class="dropdown-item" href="<?= url("dashboard/quiz_edit/{$quiz['quiz_id']}")?>">Edit</a>
                <form class="d" action="<?= url("dashboard/delete_quiz/{$quiz['quiz_id']}")?>" method="post">
                    <button type="button" class="dropdown-item d-inline del-btn">Hapus</button>
                </form>
                <a class="dropdown-item" href="<?= url("dashboard/quiz_user_answers/{$quiz['quiz_id']}")?>">Lihat Jawaban Dari User</a>
            </div>
        </div>
    </div>
    <div class="row flex-column flex-md-row p-md-4 p-2" action="" method="post">
        <div class="col-lg-4 mr-md-4 mt-md-3">
            <span>Gambar Soal Quiz Sekarang</span>

            <div class="p-2">
                <?php if($quiz['link_foto_soal'] != null):?>
                    <img class="img-fluid" src="<?= url($quiz['link_foto_soal'])?>" alt="gambar_quiz">
                <?php else: ?>
                    <h3 class="text-center my-3">Tidak ada Foto</h3>
                <?php endif;?>
            </div>
            <!-- <label for="">Ganti Gambar</label>
            <div class="input-group mb-3">
                <div class="custom-file">
                    <input type="file" class="custom-file-input input" id="inputGroupFile02">
                    <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                </div>   
            </div> -->
            <div class="radio-buttons">
                <p class="mt-2 mb-1">Jawaban Yang benar adalah</p>
                <input class="input" type="radio" id="opsi_a_<?= $i?>" name="jawaban_benar_<?= $i?>" disabled value="a" <?php if($quiz['jawaban_benar'] === 'a'):?> checked <?php endif;?>>
                <label for="opsi_a_<?= $i?>">Opsi A</label><br>

                <input class="input" type="radio" id="opsi_b_<?= $i?>" name="jawaban_benar_<?= $i?>" disabled value="b" <?php if($quiz['jawaban_benar'] === 'b'):?> checked <?php endif;?>>
                <label for="opsi_b_<?= $i?>">Opsi B</label><br>
                
                <input  class="input" type="radio" id="opsi_c_<?= $i?>" name="jawaban_benar_<?= $i?>" disabled value="c" <?php if($quiz['jawaban_benar'] === 'c'):?> checked <?php endif;?>>
                <label for="opsi_c_<?= $i?>">Opsi C</label><br>

                <input  class="input" type="radio" id="opsi_d_<?= $i?>" name="jawaban_benar_<?= $i?>" disabled value="d" <?php if($quiz['jawaban_benar'] === 'd'):?> checked <?php endif;?>>
                <label for="opsi_d_<?= $i?>">Opsi D</label>
            </div>     
        
        </div>

        <div class="form-group row col-lg-7">
            <div class="col-12 mb-2">
                <label for="<?= "soal_{$i}"?>">Soal Quiz</label>
                <textarea name="soal" id=<?= "soal_$i"?> disabled class="form-control rounded input" id="" cols="30" rows="5"><?= $quiz['soal']?></textarea>
            </div>
            <div class="col-md-12">
                <label for="input_opsi_a_<?= $i?>">Opsi A</label>
                <input disabled class="form-control input mb-2" type="text" name="input_opsi_a_<?= $i?>" id="input_opsi_a_<?= $i?>" value="<?= $quiz['opsi_a']?>">
            </div>
            <div class="col-md-12">
                <label for="input_opsi_b_<?= $i?>">Opsi B</label>
                <input disabled class="form-control input mb-2" type="text" name="input_opsi_b_<?= $i?>" id="input_opsi_b_<?= $i?>" value="<?= $quiz['opsi_b']?>">
            </div>
            <div class="col-md-12">
                <label for="input_opsi_c_<?= $i?>">Opsi C</label>
                <input disabled class="form-control input mb-2" type="text" name="input_opsi_c_<?= $i?>" id="input_opsi_c_<?= $i?>" value="<?= $quiz['opsi_c']?>">
            </div>
            <div class="col-md-12">
                <label for="input_opsi_d_<?= $i?>">Opsi D</label>
                <input disabled class="form-control input mb-2" type="text" name="input_opsi_d_<?= $i?>" id="input_opsi_d_<?= $i?>" value="<?= $quiz['opsi_d']?>">
            </div>         
            
        </div>
    </div>
</div>
<?php $i += 1?>

<?php endforeach;?>