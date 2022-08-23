<div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Kategori Quiz</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Kategori</th>
                            <th>link foto kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama Kategori</th>
                            <th>link foto kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach($data['semua_kategori'] as $category):?>
                            <tr class="text-capitalize">
                                <td><?= $category['nama_kategori']?></td>
                                <td><?= $category['link_foto_kategori'] ?? "Tidak ada Foto"?></td>
                                <td>
                                    <a href=<?= url("dashboard/edit_quiz_category/".$category['kategori_quiz_id'])?> class="btn btn-info">Edit</a>
                                    <form class="d-inline" action="<?= url("/dashboard/delete_quiz_category/{$category['kategori_quiz_id']}")?>" method="post">
                                        <button type="button" class="btn btn-danger del-btn">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<div class="card shadow border-bottom-dark  mb-lg-4">
    <div
        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary text-capitalize">
            Buat Kategori Quiz Baru
        </h6>
    </div>
    <form enctype="multipart/form-data" class="row flex-column flex-md-row p-md-4 p-2" action=<?= url('dashboard/store_quiz_category/');?> method="post">
        <div class="input col-md-6">
            <label for="">Nama Kategori</label>
            <input name="nama_kategori" type="text" class="form-control">
        </div>
        <div class="col-md-6">
            <label for="gambar" class="d-block">Upload Gambar</label>
            <input name="gambar" type="file" class="btn btn-outline-primary" name="gambar" id="gambar">
        </div>
        <div class="col-md-4">
            <button class="btn btn-success my-2 px-5">Buat</button>
        </div>
    </form>
</div>