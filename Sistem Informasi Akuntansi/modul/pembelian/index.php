<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Pembelian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

<!-- Form Input Pembelian -->
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
                    <label for="suplier" class="form-label">Suplier</label>
                    <select name="suplier" class="form-select">
                        <option value="1">PT Suplier Jaya</option>
                        <option value="2">CV Maju Jaya</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <input type="number" class="form-control" name="jumlah">
                </div>
                <div class="col-md-4">
                    <label for="harga" class="form-label">Harga</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="number" class="form-control" name="harga">
                    </div>
                </div>
                <div class="col-md-4">
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
            <hr class="text-secondary">
            <div class="text-end">
                <button type="reset" class="btn btn-secondary">Reset</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Tabel Data Pembelian -->
<div class="card">
    <div class="card-header">
        <h3>Data Pembelian</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Invoice</th>
                        <th>Tanggal</th>
                        <th>Suplier</th>
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
                        <td>BL110324</td>
                        <td>11/03/2024</td>
                        <td>PT Suplier Jaya</td>
                        <td>1</td>
                        <td>Rp. 15.000.000,-</td>
                        <td>Rp. 15.000.000,-</td>
                        <td>Pembelian perlengkapan maintenance</td>
                        <td>
                            <a href="#" class="text-decoration-none btn-edit"
                               data-bs-toggle="modal"
                               data-bs-target="#editPembelian"
                               data-invoice="BL110324"
                               data-tanggal="2024-03-11"
                               data-suplier="1"
                               data-jumlah="1"
                               data-harga="15000000"
                               data-keterangan="Pembelian perlengkapan maintenance">
                                <i class="bi bi-pencil-square text-success"></i>
                            </a>
                            <a href="hapus.php?id=1" class="text-decoration-none" onclick="return confirm('Yakin ingin menghapus?')">
                                <i class="bi bi-trash text-danger"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Edit Data Pembelian -->
<div class="modal fade" id="editPembelian" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="update.php" method="post">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Pembelian</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Invoice</label>
                            <input type="text" class="form-control" name="invoice" readonly>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Suplier</label>
                            <select name="suplier" class="form-select">
                                <option value="1">PT Suplier Jaya</option>
                                <option value="2">CV Maju Jaya</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Jumlah</label>
                            <input type="number" class="form-control" name="jumlah">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Harga</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp.</span>
                                <input type="number" class="form-control" name="harga">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Total</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp.</span>
                                <input type="number" class="form-control" name="total" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <textarea name="keterangan" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
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
            document.querySelector('#editPembelian input[name="invoice"]').value = button.dataset.invoice;
            document.querySelector('#editPembelian input[name="tanggal"]').value = button.dataset.tanggal;
            document.querySelector('#editPembelian select[name="suplier"]').value = button.dataset.suplier;
            document.querySelector('#editPembelian input[name="jumlah"]').value = button.dataset.jumlah;
            document.querySelector('#editPembelian input[name="harga"]').value = button.dataset.harga;
            document.querySelector('#editPembelian input[name="total"]').value = parseInt(button.dataset.jumlah) * parseInt(button.dataset.harga);
            document.querySelector('#editPembelian textarea[name="keterangan"]').value = button.dataset.keterangan;
        });
    });
</script>

</body>
</html>