<div class="card shadow border-bottom-dark mx-lg-5 mb-lg-4">

    <div
        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary text-capitalize">
            Kategori <?= $data['kategori']['nama_kategori']?>
        </h6>
    </div>
    <form enctype="multipart/form-data" class="row flex-column flex-md-row p-md-4 p-2" action=<?= url("/dashboard/update_quiz_category/".$data['kategori']['kategori_quiz_id'])?> method="post">
        <div class="col-lg-4 mr-md-4 mt-md-3">
            <span>Gambar Soal Kategori Quiz</span>

            <div class="p-2">
                <?php if($data['kategori']['link_foto_kategori'] != null):?>
                    <img class="img-fluid" src="<?= url($data['kategori']['link_foto_kategori'])?>" alt="gambar_quiz">
                <?php else: ?>
                    <h3 class="text-center my-3">Tidak ada Foto</h3>
                <?php endif;?>
            </div>
        
        </div>

        <div class="form-group row col-lg-7">
            <div class="col-12 mb-2">
                <label for="nama_kategori">Nama Kategori</label>
                <input name="nama_kategori" id="nama_kategori" class="form-control rounded input <?= isInvalid('nama_kategori')?>" value="<?= $data['kategori']['nama_kategori']?>"/>
                <span class="text-danger"><?= error('nama_kategori')?></span>
            </div>
            <div class="col-md-12">
                <label for="link_foto_kategori">Foto</label>
                <input type="file" class="form-control input mb-2" type="text" name="gambar">
                
            </div>
            
            <div class="col-md-12">
                <button class="btn btn-success btn-icon-split mt-3">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Simpan Perubahan</span>
                </button>
                
                <a href=<?= url('dashboard/quiz_category')?> class="btn btn-secondary mt-3 mx-3">Kembali</a>
            </div>
            </div>
        </div>
    </form>
</div>