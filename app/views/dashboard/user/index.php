<div class="card shadow mb-4">
    <div class="card-header py-3">
        <form id="search-form" class="row align-items-center mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <h6 class="col-md-8 m-0 font-weight-bold text-primary">Tabel Pengguna</h6>
            <div class="input-group col-md-4">
                <input type="text" id="search-input" class="form-control bg-white shadow-sm border-0 small" placeholder="Cari Nama User..."
                    aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary search-btn" type="button">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>       
    </div>
    <div class="card-body">
        <div class="table-responsive x-scroll">
            <table class="table table-bordered overflow-auto" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No Telpon</th>
                        <th>Dibuat Saat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No Telpon</th>
                        <th>Dibuat Saat</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach($data['users'] as $user):?>
                        <tr>
                            <td><?=$user['nama']?></td>
                            <td><?=$user['email']?></td>
                            <td><?=$user['no_telpon']?></td>
                            <td><?=$user['dibuat_saat']?></td>
                            <td>
                                <a href=<?= publicUrl('dashboard/edit_user/' . $user['user_id'])?> class="btn btn-info">Edit</a>
                                <form method="POST" class="d-inline" action=<?= publicUrl("dashboard/delete_user/{$user['user_id']}")?>>
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