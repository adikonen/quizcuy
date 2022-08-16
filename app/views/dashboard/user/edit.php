<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Pengguna <?= $data['user']['nama']?></h6>
    </div>
    <form class="card-body row px-md-5" method="POST" action=<?= publicUrl('dashboard/update_user/' . $data['user']['user_id']);?>>
        <div class="name-input col-md-6 my-2" >
            <label for="nama">Nama</label>
            <input type="text" id="nama" class="form-control<?php if(isset($_SESSION['nama'])) :?> is-invalid <?php endif;?>" name="nama" value="<?= $data['user']['nama']?>" required>
            <span class="text-danger"><?= error('nama')?></span>
        </div>
        <div class="name-input col-md-6 my-2">
            <label for="email">Email</label>
            <input type="email" id="email" class="form-control <?php if(isset($_SESSION['email'])):?> is-invalid <?php endif?>" name="email" value="<?= $data['user']['email']?>" required>
            <span class="text-danger"><?= error('email')?></span>
        </div>
        <div class="name-input col-md-8 my-2">
            <label for="no_telpon">No Telepon</label>
            <input type="number" id="no_telpon" class="form-control <?php if(isset($_SESSION['no_telpon'])) echo 'is-invalid';?>" name="no_telpon" value="<?= $data['user']['no_telpon']?>" required>
            <span class="text-danger"><?= error('no_telpon')?></span>
        </div>
        <div class="name-input col-md-2 my-2">
            <label for="jumlah_nyawa">Jumlah Nyawa</label>
            <input type="number" id="jumlah_nyawa" class="form-control" value="<?= $data['user']['jumlah_nyawa']?>" name="jumlah_nyawa" required>
        </div>
        <div class="name-input col-md-2 my-2">
            <label for="jumlah_koin">Jumlah Koin</label>
            <input type="number" id="jumlah_koin" class="form-control" value="<?= $data['user']['jumlah_koin']?>" name="jumlah_koin" required>
        </div>
        <div class="col-md-3">
            <button class="btn btn-info my-2">Simpan</button>
            <a class="btn btn-secondary my-2" href="<?= publicUrl('dashboard/user_table')?>">Kembali</a>
        </div>
    </form>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Informasi Lanjutan</h6>
    </div>
    <form class="card-body row px-md-5 table-responsive">
        <table class="table">
            <tr>
                <td>
                    <p>Jumlah Koin</p>
                    <p>Jumlah Nyawa</p>
                    <p>Jumlah Top Up</p>
                    <p>Jumlah Koin Dikeluarkan</p>
                </td>
                <td>
                   <p><?= $data['user']['jumlah_koin']?> Koin Dimiliki</p>
                   <p><?= $data['user']['jumlah_nyawa']?> Nyawa Dimiliki</p>
                   <p><?= $data['sum_cash'] ?? "Tidak ada"?></p>
                   <p><?= $data['sum_koin'] ?? "Tidak ada"?></p>
                </td>

            </tr>
        </table>
        
    </form>
</div>