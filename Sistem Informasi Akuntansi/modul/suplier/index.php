<?php
// koneksi ke database
include_once(__DIR__ . "/../../koneksi.php");
?>

<form action="modul/suplier/aksi_suplier.php?act=insert" method="post">
  <div class="card mb-3">
    <div class="card-body">
      <div class="row">
        <div class="mb-3 col-md-6">
          <label for="nama_supplier" class="form-label">Nama Supplier</label>
          <input type="text" class="form-control" name="nama_supplier">
        </div>
        <div class="mb-3 col-md-6">
          <label for="alamat" class="form-label">Alamat</label>
          <input type="text" class="form-control" name="alamat">
        </div>
      </div>
      <div class="row">
        <div class="mb-3 col-md-6">
          <label for="telp" class="form-label">Telp</label>
          <input type="text" class="form-control" name="telpn">
        </div>
        <div class="mb-3 col-md-6">
          <label for="email" class="form-label">Email</label>
          <input type="text" class="form-control" name="email">
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col text-end">
          <button class="btn btn-secondary" type="reset">Reset</button>
          <button class="btn btn-primary" type="submit">Simpan</button>
        </div>
      </div>
    </div>
  </div>
</form>

<div class="card">
  <div class="card-header">
    <h3>Data Supplier</h3>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Nama Supplier</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Email</th>
            <th><i class="bi bi-gear-fill"></i></th>
          </tr>
        </thead>
       <tbody>
    <?php
    $query = "SELECT * FROM supplier";
    $exec = mysqli_query($koneksi, $query);
    $no = 1;
    while($data = mysqli_fetch_array($exec)){
    ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= $data['nama_supplier'] ?></td>
      <td><?= $data['alamat'] ?></td>
      <td><?= $data['telepon'] ?></td>
      <td><?= $data['email'] ?></td>
      <td>
        <a href="#editSupplier<?= $data['supplier_id'] ?>" class="text-decoration-none" data-bs-toggle="modal">
          <i class="bi bi-pencil-square text-success"></i>
        </a>
        <a href="modul/suplier/aksi_suplier.php?act=delete&id=<?= $data['supplier_id'] ?>" class="text-decoration-none" onclick="return confirm('Yakin ingin menghapus?')">
          <i class="bi bi-trash text-danger"></i>
        </a>
      </td>
    </tr>

    <!-- Modal Edit Supplier -->
    <div class="modal fade" id="editSupplier<?= $data['supplier_id'] ?>" tabindex="-1" aria-labelledby="modalLabel<?= $data['supplier_id'] ?>" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form action="modul/suplier/aksi_suplier.php?act=update" method="post">
            <div class="modal-header">
              <h5 class="modal-title" id="modalLabel<?= $data['supplier_id'] ?>">Edit Supplier</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <input type="hidden" name="supplier_id" value="<?= $data['supplier_id'] ?>">
              <div class="mb-3">
                <label class="form-label">Nama Supplier</label>
                <input type="text" class="form-control" name="nama_supplier" value="<?= $data['nama_supplier'] ?>" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Alamat</label>
                <input type="text" class="form-control" name="alamat" value="<?= $data['alamat'] ?>" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Telepon</label>
                <input type="text" class="form-control" name="telpn" value="<?= $data['telpn'] ?>" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="<?= $data['email'] ?>" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <?php } ?>
  </tbody>
      </table>
    </div>
  </div>
</div>