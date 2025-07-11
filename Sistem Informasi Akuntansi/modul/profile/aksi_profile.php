<?php
session_start();
include '../../koneksi.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_baru = $_POST['password_baru'];
    $password_ulang = $_POST['password_ulang'];

    $query = "SELECT * FROM pengguna WHERE username='$username'";
    $exec = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_array($exec);

    if (!empty($password)) {
        // Jika user mengisi password lama
        if (password_verify($password, $data['password'])) {
            if ($password_baru == $password_ulang) {
                $password_hash = password_hash($password_baru, PASSWORD_BCRYPT);
                $query = "UPDATE pengguna SET password='$password_hash', nama_lengkap='$nama_lengkap', email='$email' WHERE username='$username'";
                $exec = mysqli_query($koneksi, $query);
                if ($exec) {
                    $_SESSION['pesan'] = "Data profile telah diperbaharui";
                } else {
                    $_SESSION['pesan'] = "Gagal memperbaharui data";
                }
            } else {
                $_SESSION['pesan'] = "Password baru tidak sesuai";
            }
        } else {
            $_SESSION['pesan'] = "Password lama tidak sesuai";
        }
    } else {
        // Tidak mengubah password
        $query = "UPDATE pengguna SET nama_lengkap='$nama_lengkap', email='$email' WHERE username='$username'";
        $exec = mysqli_query($koneksi, $query);
        if ($exec) {
            $_SESSION['pesan'] = "Data profile telah diperbaharui tanpa mengubah password";
        } else {
            $_SESSION['pesan'] = "Gagal memperbaharui data";
        }
    }

    header('location:../../dashboard.php?modul=profile');
} else {
    header('location:../../index.php');
}
?>