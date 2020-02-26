<?php 
include('library.php'); // include file library.php yang berisi class Library
$lib = new Library(); // membuat object dengan nama $lib dengan menggunakan class Library
$data_calas = $lib->show(); // buat variabel $data_siswa digunakan untuk menyimpan hasil pengembalian data saat kita mengakses method show() pada class Library

if(isset($_GET['hapus_calas'])) // melakukan pengecekan apakah terdapat variabel $hapus_calas dengan menggunakan method get, jika ada maka akan menjalankan Line 8 – 13 
{
    $nim = $_GET['hapus_calas']; // membuat variabel $nim untuk menyimpan nim dari variabel hapus_calas dengan method get
    $status_hapus = $lib->delete($nim); // mengakses function delete dengan mengirimkan variabel $nim sebagai parameter.
    if($status_hapus) // variabel $status_hapus digunakan untuk menyimpan hasil pemanggilan function delete diclass lib, jika nilai variabel $status_hapus adalah true maka dinyatakan berhasil hapus data, dan aplikasi akan redirect ke file index.php
    {
        header('Location: index.php');
    }
}
?>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="bootstrap.min.css">
    </head>
    <body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Data calas</h3>
            </div>
            <div class="card-body">  
                <a href="form_add.php" class="btn btn-success">Tambah</a> 
                <hr/>
                <table class="table table-bordered" width="60%">
                    <tr>
                        <th>NO</th>
                        <th>NIM</th>
                        <th>NAMA</th>
                        <th>JENIS KELAMIN</th>
                        <th>PEMINATAN</th>
                        <th>ALAMAT</th>
                        <th>AGAMA</th>
                        <th>EMAIL</th>
                        <th>ACTION</th>
                    </tr>
                    <?php 
                    $no = 1;
                    foreach($data_calas as $row) //perintah foreach untuk extract data yang ada di variabel $data_calas, dan untuk menampilkan isi masing – masing kolom, kita harus menyebutkan nama kolom pada elemen array (Line 47 – 54 file index.php)
                    {
                        echo "<tr>";
                        echo "<td>".$no."</td>";
                        echo "<td>".$row['nim']."</td>";
                        echo "<td>".$row['nama']."</td>";
                        echo "<td>".$row['jenkel']."</td>";
                        echo "<td>".$row['peminatan']."</td>";
                        echo "<td>".$row['alamat']."</td>";
                        echo "<td>".$row['agama']."</td>";
                        echo "<td>".$row['email']."</td>";

                       // membuat tombol edit yang mengakses file form_edit.php dengan mengirimkan variabel nim dengan method get dengan nilai dari kolom nim
                        echo "<td><a class='btn btn-info' href='form_edit.php?nim=".$row['nim']."'>Update</a>
                        <a class='btn btn-danger' href='index.php?hapus_calas=".$row['nim']."'>Hapus</a></td>"; // membuat tombol delete yang mengakses file ini sendiri  index.php dengan mengirimkan variabel hapus_calas dengan method get dengan nilai dari kolom nim
                        echo "</tr>";
                        $no++;
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    </body>
</html>