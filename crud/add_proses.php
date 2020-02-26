<?php 
include('library.php'); // include file library.php yang berisi class Library
$lib = new Library(); // membuat object dengan nama $lib dengan menggunakan class Library
if(isset($_POST['tombol_tambah'])){ // melakukan pengecekan apakah tombol tambah diklik dengan menggunakan perintah isset, jika tombol tambah diklik maka akan menjalankan code dibaris 6 – 12

    $nim = $_POST['nim']; // kita menangkap isi dari inputan nim dari form
    $nama = $_POST['nama']; // kita menangkap isi dari inputan nama dari form
    $jenkel = $_POST['jenkel']; // kita menangkap isi dari inputan jenkel dari form
    $alamat = $_POST['alamat']; // kita menangkap isi dari inputan alamat dari form
    $peminatan = implode(", ", $_POST['peminatan']); // kita menangkap isi dari inputan peminatan dari form
    $agama = $_POST['agama']; // kita menangkap isi dari inputan agama dari form
    $email = $_POST['email']; // kita menangkap isi dari inputan email dari form



    $add_status = $lib->add_data($nim, $nama, $jenkel, $peminatan, $alamat, $agama, $email); // mengakses method add_data pada class Library, dengan mengirimkan beberapa parameter, antara lain : $$nim, $nama, $jenkel,$peminatan, $alamat, $agama, $email 
    if($add_status){
    header('Location: index.php');
    // saat data berhasil diinsert maka akan redirect halaman ke index.php perintah ini diatur pada line 17 – 18 file form_add.php
    }
}
?>