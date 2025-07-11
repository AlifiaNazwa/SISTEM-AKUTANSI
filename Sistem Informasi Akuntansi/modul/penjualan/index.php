<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Data Penjualan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

<!-- Form Input Penjualan -->
<div class="card mb-3">
  <div class="card-body">
    <form action="" method="post">
      <div class="row mb-3">
        <div class="col-md-4">
          <label for="invoice" class="form-label">Invoice</label>
          <input type="text" class="form-control" name="invoice">
        </div>
        <div class="col-md-4">
          <label for="tanggal" class="form-label">Tanggal</label>
          <input type="date" class="form-control" name="tanggal">
        </div>
        <div class="col-md-4">
          <label for="barang" class="form-label">Barang</label>
          <select name="barang" class="form-select">
            <option value="1">Laptop Acer</option>
            <option value="2">Komputer (PC)</option>
          </select>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-4">
          <label for="pelanggan" class="form-label">Pelanggan</label>
          <select name="pelanggan" class="form-select">
            <option value="1">PT Sejahtera</option>
            <option value="2">CV Maju Bersama</option>
          </select>
        </div>
        <div class="col-md-2">
          <label for="jumlah" class="form-label">Jumlah</label>
          <input type="number" class="form-control" name="jumlah">
        </div>
        <div class="col-md-3">
          <label for="harga" class="form-label">Harga</label>
          <div class="input-group">
            <span class="input-group-text">Rp.</span>
            <input type="number" class="form-control" name="harga">
          </div>
        </div>
        <div class="col-md-3">
          <label for="total" class="form-label">Total</label>
          <div class="input-group">
            <span class="input-group-text">Rp.</span>
            <input type="number" class="form-control" name="total" disabled>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <label for="keterangan" class="form-label">Keterangan</label>
          <textarea name="keterangan" class="form-control"></textarea>
        </div>
      </div>
      <hr>
      <div class="text-end">
        <button type="reset" class="btn btn-secondary">Reset</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
  </div>
</div>

<!-- Tabel Data -->
<div class="card">
  <div class="card-header"><h3>Data Penjualan</h3></div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Invoice</th>
            <th>Tanggal</th>
            <th>Barang</th>
            <th>Pelanggan</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Total</th>
            <th>Keterangan</th>
            <th><i class="bi bi-gear-fill"></i></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>PJ110324</td>
            <td>2024-03-11</td>
            <td>Laptop Acer</td>
            <td>PT Sejahtera</td>
            <td>3</td>
            <td>Rp. 10.000.000,-</td>
            <td>Rp. 30.000.000,-</td>
            <td>Penjualan 3 unit laptop acer</td>
            <td>
              <a href="#" class="text-decoration-none btn-edit"
                data-bs-toggle="modal" data-bs-target="#editModal"
                data-invoice="PJ110324"
                data-tanggal="2024-03-11"
                data-barang="1"
                data-pelanggan="1"
                data-jumlah="3"
                data-harga="10000000"
                data-keterangan="Penjualan 3 unit laptop acer">
                <i class="bi bi-pencil-square text-success"></i>
              </a>
              <a href="hapus.php?id=1" onclick="return confirm('Yakin ingin menghapus?')" class="text-decoration-none">
                <i class="bi bi-trash text-danger"></i>
              </a>
            </td>
          </tr>
          <tr>
            <td>2</td>
            <td>PJ100324</td>
            <td>2024-03-10</td>
            <td>Komputer (PC)</td>
            <td>CV Maju Bersama</td>
            <td>10</td>
            <td>Rp. 8.000.000,-</td>
            <td>Rp. 80.000.000,-</td>
            <td>Penjualan 10 unit komputer komplit</td>
            <td>
              <a href="#" class="text-decoration-none btn-edit"
                data-bs-toggle="modal" data-bs-target="#editModal"
                data-invoice="PJ100324"
                data-tanggal="2024-03-10"
                data-barang="2"
                data-pelanggan="2"
                data-jumlah="10"
                data-harga="8000000"
                data-keterangan="Penjualan 10 unit komputer komplit">
                <i class="bi bi-pencil-square text-success"></i>
              </a>
              <a href="hapus.php?id=2" onclick="return confirm('Yakin ingin menghapus?')" class="text-decoration-none">
                <i class="bi bi-trash text-danger"></i>
              </a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <form action="update.php" method="post">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLabel">Edit Data Penjualan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>
        <div class="modal-body">
          <div class="row mb-3">
            <div class="col-md-4">
              <label class="form-label">Invoice</label>
              <input type="text" name="invoice" class="form-control" readonly>
            </div>
            <div class="col-md-4">
              <label class="form-label">Tanggal</label>
              <input type="date" name="tanggal" class="form-control">
            </div>
            <div class="col-md-4">
              <label class="form-label">Barang</label>
              <select name="barang" class="form-select">
                <option value="1">Laptop Acer</option>
                <option value="2">Komputer (PC)</option>
              </select>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-4">
              <label class="form-label">Pelanggan</label>
              <select name="pelanggan" class="form-select">
                <option value="1">PT Sejahtera</option>
                <option value="2">CV Maju Bersama</option>
              </select>
            </div>
            <div class="col-md-2">
              <label class="form-label">Jumlah</label>
              <input type="number" name="jumlah" class="form-control">
            </div>
            <div class="col-md-3">
              <label class="form-label">Harga</label>
              <div class="input-group">
                <span class="input-group-text">Rp.</span>
                <input type="number" name="harga" class="form-control">
              </div>
            </div>
            <div class="col-md-3">
              <label class="form-label">Total</label>
              <div class="input-group">
                <span class="input-group-text">Rp.</span>
                <input type="number" name="total" class="form-control" disabled>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label">Keterangan</label>
            <textarea name="keterangan" class="form-control"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </div>
      </div>
    </div>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  const editButtons = document.querySelectorAll('.btn-edit');
  editButtons.forEach(button => {
    button.addEventListener('click', () => {
      const modal = document.getElementById('editModal');
      modal.querySelector('input[name="invoice"]').value = button.dataset.invoice;
      modal.querySelector('input[name="tanggal"]').value = button.dataset.tanggal;
      modal.querySelector('select[name="barang"]').value = button.dataset.barang;
      modal.querySelector('select[name="pelanggan"]').value = button.dataset.pelanggan;
      modal.querySelector('input[name="jumlah"]').value = button.dataset.jumlah;
      modal.querySelector('input[name="harga"]').value = button.dataset.harga;
      modal.querySelector('input[name="total"]').value = parseInt(button.dataset.harga) * parseInt(button.dataset.jumlah);
      modal.querySelector('textarea[name="keterangan"]').value = button.dataset.keterangan;
    });
  });
</script>

</body>
</html>
