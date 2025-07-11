<?php
include_once "../../koneksi.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_GET['act'] == "insert") {
        $nama_supplier = $_POST['nama_supplier'];
        $alamat        = $_POST['alamat'];
        $telpn         = $_POST['telpn'];
        $email         = $_POST['email'];

        $query = "INSERT INTO supplier (nama_supplier, alamat, telpn, email)
                  VALUES ('$nama_supplier', '$alamat', '$telpn', '$email')";
        $exc = mysqli_query($koneksi, $query);

        $_SESSION['pesan'] = $exc ? "Data supplier berhasil ditambah" : "Data supplier gagal ditambah";
        header("Location: ../../dashboard.php?modul=suplier");
        exit;

    } elseif ($_GET['act'] == "update") {
        $id            = $_POST['supplier_id']; 
        $nama_supplier = $_POST['nama_supplier'];
        $alamat        = $_POST['alamat'];
        $telepon         = $_POST['telepon'];
        $email         = $_POST['email'];

        $query = "UPDATE supplier SET 
                    nama_supplier = '$nama_supplier',
                    alamat = '$alamat', 
                    telepon = '$teleponn', 
                    email = '$email'
                  WHERE supplier_id = '$id'";

        $exc = mysqli_query($koneksi, $query);

        $_SESSION['pesan'] = $exc ? "Data supplier berhasil diubah" : "Data supplier gagal diubah";
        header("Location: ../../dashboard.php?modul=suplier");
        exit;
    }

} else {
    if ($_GET['act'] == "delete") {
        $id = $_GET['id'];
        $query = "DELETE FROM supplier WHERE supplier_id = '$id'";
        $exc = mysqli_query($koneksi, $query);

        $_SESSION['pesan'] = $exc ? "Data supplier berhasil dihapus" : "Data supplier gagal dihapus";
        header("Location: ../../dashboard.php?modul=suplier");
        exit;

    } else {
        header("Location: ../../index.php");
        exit;
    }
}