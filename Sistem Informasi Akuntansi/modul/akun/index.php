<?php
// koneksi ke database
include_once(_DIR_ . "/../../koneksi.php");
?>

<!-- Form Tambah Akun -->
<div class="card mb-3">
    <div class="card-body">
        <form action="modul/akun/aksi_akun.php?act=insert" method="post">
            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label">Nama akun</label>
                    <input type="text" class="form-control" name="nama_akun" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Jenis akun</label>
                    <input type="text" class="form-control" name="jenis_akun" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Tipe saldo</label>
                    <select class="form-select" name="tipe_saldo" required>
                        <option value="debit">Debit</option>
                        <option value="kredit">Kredit</option>
                    </select>
                </div>
            </div>
            <div class="text-end">
                <button type="reset" class="btn btn-secondary">Reset</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Tabel Data Akun -->
<div class="card">
    <div class="card-header">
        <h3>Data Akun</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Akun</th>
                        <th>Jenis Akun</th>
                        <th>Tipe Saldo</th>
                        <th><i class="bi bi-gear-fill"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT akun_id, nama_akun, jenis_akun, tipe_saldo FROM akun";
                    $exec = mysqli_query($koneksi, $query);
                    $no = 1;
                    while ($data = mysqli_fetch_array($exec)) {
                        $id = $data['akun_id'];
                        $nama = htmlspecialchars($data['nama_akun']);
                        $jenis = htmlspecialchars($data['jenis_akun']);
                        $saldo = htmlspecialchars($data['tipe_saldo']);
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $nama ?></td>
                        <td><?= $jenis ?></td>
                        <td><?= $saldo ?></td>
                        <td>
                            <!-- Tombol Edit -->
                            <a href="#editAkun<?= $id ?>" class="text-decoration-none" data-bs-toggle="modal">
                                <i class="bi bi-pencil-square text-success"></i>
                            </a>
                            <!-- Tombol Hapus -->
                            <a href="modul/akun/aksi_akun.php?act=delete&id=<?= $id ?>" class="text-decoration-none" onclick="return confirm('Yakin ingin hapus?')">
                                <i class="bi bi-trash text-danger"></i>
                            </a>
                        </td>
                    </tr>

                    <!-- Modal Edit -->
                    <div class="modal fade" id="editAkun<?= $id ?>" tabindex="-1" aria-labelledby="modalLabel<?= $id ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="modul/akun/aksi_akun.php?act=update&id=<?= $id ?>" method="post">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLabel<?= $id ?>">Edit Data Akun</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label">Nama akun</label>
                                            <input type="text" class="form-control" name="nama_akun" value="<?= $nama ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Jenis akun</label>
                                            <input type="text" class="form-control" name="jenis_akun" value="<?= $jenis ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Type saldo</label>
                                            <select class="form-select" name="type_saldo" required>
                                                <option value="debit" <?= ($saldo == 'debit') ? 'selected' : '' ?>>Debit</option>
                                                <option value="kredit" <?= ($saldo == 'kredit') ? 'selected' : '' ?>>Kredit</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>