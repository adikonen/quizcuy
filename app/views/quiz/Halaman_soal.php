<div class="container bg-light p-5 my-5 border-radius">
    <div class="d-flex justify-content-between align-items-center">
        <a href="<?= url("quiz/kategori/".$data['quiz']['nama_kategori'])?>" class="bg-primary text-dark m-4 btn px-5 text-dark back-btn h3 font-weight-bold"><i class="bi bi-arrow-left d-block"></i></i>Back</a>
        <i class="bi bi-heart-fill text-danger h3"><span class="text-dark font-weight-bold"> X 3</span></i>
    </div>
    <h1 class="text-center mb-3">Level 1</h1>
    <div class="d-flex justify-content-center align-items-center flex-column">
        <img src="<?= $data['quiz']['link_foto_soal']?>" class="img-thumbnail" alt="Responsive image" width="400" height="auto">
        <p><?= $data['quiz']['soal']?></p>
    </div>
<form action="<?= url("quiz/store_user_answer/{$data['quiz']['quiz_id']}")?>" method="POST" class="pl-5">
        <div class="mx-5">
            <input type="radio" id="<?= $data['quiz']['opsi_a']?>" name="opsi_jawaban" value="<?= $data['quiz']['opsi_a']?>">
            <label for="<?= $data['quiz']['opsi_a']?>"><?= $data['quiz']['opsi_a']?></label><br>
            <input type="radio" id="<?= $data['quiz']['opsi_b']?>" name="opsi_jawaban" value="<?= $data['quiz']['opsi_b']?>">
            <label for="<?= $data['quiz']['opsi_b']?>"><?=$data['quiz']['opsi_b']?></label><br>
            <input type="radio" id="<?= $data['quiz']['opsi_c']?>" name="opsi_jawaban" value="<?= $data['quiz']['opsi_c']?>">
            <label for="<?= $data['quiz']['opsi_c']?>"><?= $data['quiz']['opsi_c']?></label><br>
            <input type="radio" id="<?= $data['quiz']['opsi_d']?>" name="opsi_jawaban" value="<?= $data['quiz']['opsi_d']?>">
            <label for="<?= $data['quiz']['opsi_d']?>"><?= $data['quiz']['opsi_d']?></label><br>                   
        <div class="d-flex justify-content-end" >
            <button class="btn-primary m-4 btn px-5 confirm-btn">Confirm</button>
        </div>
        </div>
    </form>
</div>