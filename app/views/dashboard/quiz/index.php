<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Lihat Quiz Sesuai Kategori</h6>
    </div>
    <table class="table table-bordered overflow-auto" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Nama Kategori Quiz</th>
                    <th>Aksi</th>
                </tr>
            </thead>
           
            <tbody>
                <?php foreach($data['all_category'] as $item):?>
                    <tr>
                      <td class="text-capitalize"><?= $item['nama_kategori']?></td>
                      <td><a href="<?= url("/dashboard/quiz_level/{$item['nama_kategori']}")?>" class="btn btn-outline-primary">Lihat Quiz</a></td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
</div>