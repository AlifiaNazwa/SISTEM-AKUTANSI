<?php
session_start();
include_once('../../koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_akun  = $_POST['nama_akun'];
    $jenis_akun = $_POST['jenis_akun'];
    $type_saldo = $_POST['tipe_saldo'];
    $act        = $_GET['act'] ?? '';

    if ($act === 'insert') {
        $query = "INSERT INTO akun (nama_akun, jenis_akun, tipe_saldo) VALUES ('$nama_akun', '$jenis_akun', '$tipe_saldo')";
    } elseif ($act === 'update') {
        $id = $_GET['id'];
        $query = "UPDATE akun SET nama_akun='$nama_akun', jenis_akun='$jenis_akun', tipe_saldo='$type_saldo' WHERE akun_id='$id'";
    }

    if (isset($query)) {
        $exec = mysqli_query($koneksi, $query);
        $_SESSION['pesan'] = $exec ? "Data akun berhasil diproses." : "Gagal memproses data akun.";
    }

    header('Location: ../../dashboard.php?modul=akun');
    exit;
}

if ($_GET['act'] == 'delete') {
    $id = $_GET['id'];
    $query = "DELETE FROM akun WHERE akun_id='$id'";
    $exec = mysqli_query($koneksi, $query);
    $_SESSION['pesan'] = $exec ? "Data akun telah dihapus" : "Data akun gagal dihapus";
    header('Location: ../../dashboard.php?modul=akun');
    exit;
}

header('Location: ../../index.php');
exit;