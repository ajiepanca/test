<?php 
include('library.php'); // include file library.php yang berisi class Library yang sebelumnya telah kita buat
$lib = new Library(); // membuat object dengan nama $lib dengan menggunakan class Library
if(isset($_GET['nim'])){ // melakukan pengecekan apakah saat file form_edit.php ini diakses, juga menyertakan variabel nim dengan method get
    $nim = $_GET['nim']; //menangkap value dari variabel nim dengan method get, dan menyimpannya pada variabel $nim
    $data_calas = $lib->get_by_id($nim); // mengakses function get_by_id pada class Library dengan menyertakan variabel $nim yang berisi data nilai nim yang akan diedit.
    //  telah mendapatkan data calas yang diinginkan dan disimpan pada variabel $data_calas.
    // jika ya maka akan menjalankan kode 5 – 6, 
}
else
{
    header('Location: index.php'); // jika tidak maka akan di redirect
}

if(isset($_POST['tombol_update'])){ // melakukan pengecekan apakah tombol_update diklik, jika ya maka menjalankan perintah di line 15 – 28
    $nim = $_POST['nim']; // menyimpan hasil nilai dari form edit, pada variabel.
    $nama = $_POST['nama']; // menyimpan hasil nilai dari form edit, pada variabelnya.
    $jenkel = $_POST['jenkel']; // menyimpan hasil nilai dari form edit, pada variabel.
    $peminatan = implode(", ", $_POST['peminatan']); // menyimpan hasil nilai dari form edit, pada  variabel.
    $alamat = $_POST['alamat']; //menyimpan hasil nilai dari form edit, pada variabel.
    $agama = $_POST['agama']; // menyimpan hasil nilai dari form edit, pada variabel.
    $email = $_POST['email'];  // menyimpan hasil nilai dari form edit, pada variabel.
    $status_update = $lib->update($nim, $nama, $jenkel,$peminatan, $alamat, $agama, $email);
    if($status_update) //  mengakses function update dengan mengirimkan paimeter $nim, $nama, $jenkel,$peminatan, $alamat, $agama, $email
     // jika hasil pengembalian data dari function update adalah true, maka akan redirect ke file index.php
    {
        header('Location:index.php');
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
                <h3>Update Data calas</h3>
           </div>
            <div class="card-body">
            <form method="post" action="">
                <input type="hidden" name="nim" value="<?php echo $data_calas['nim']; ?>"/>
                <div class="form-group row">
                    <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                    <div class="col-sm-10">
                    <input type="text" name="nim" class="form-control" id="nim" value="<?php echo $data_calas['nim']; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control"  minlength="3" maxlength="50" onkeypress="return huruf(event);" id="nama" value="<?php echo $data_calas['nama']; ?>" required="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenkel" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        LAKI LAKI
                    <input type="radio" name="jenkel" value="LAKI LAKI" <?php if($data_calas['jenkel']=="LAKI LAKI"){ echo "checked";}?> /><br>
                        PEREMPUAN
                   <input type="radio" name="jenkel" value="PEREMPUAN" <?php if($data_calas['jenkel']=="PEREMPUAN"){ echo "checked";}?>/>

                    </div>
                </div>
                <div class="form-group row">
                    <label for="peminatan" class="col-sm-2 col-form-label">Peminatan</label>
                    <div class="col-sm-10">
                    <input type="checkbox" name="peminatan[]" value="NETWORKING" <?php if($data_calas['peminatan']=="NETWORKING"){echo "checked";}?> /> NETWORKING <br>
                    <input type="checkbox" name="peminatan[]" value="PROGRAMMING"<?php if($data_calas['peminatan']=="PROGRAMMING"){echo "checked";}?>/> PROGRAMMING <br>
                    <input type="checkbox" name="peminatan[]" value="ACCOUNTING" <?php if($data_calas['peminatan']=="ACCOUNTING"){echo "checked";}?>/> ACCOUNTING
                    </div>
                </div>
                 <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="email" value="<?php echo $data_calas['email']; ?>" required="">
                    </div>
                </div>
                 <div class="form-group row">
                    <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                    <div class="col-sm-10">
                   <form action="proses.php" method="get">
                    <select name='agama'>
                    <option > <?php echo $data_calas['agama']; ?> </option>
                    <option <?php if( $data_calas=='islam'){echo "selected"; } ?> value='islam'>Islam</option>
                    <option <?php if( $data_calas=='kristen'){echo "selected"; } ?> value='kristen'>Kristen</option>
                    <option <?php if( $data_calas=='katolik'){echo "selected"; } ?> value='katolik'>Katolik</option>
                    <option <?php if( $data_calas=='hindu'){echo "selected"; } ?> value='hindu'>Hindu</option>
                    <option <?php if( $data_calas=='budhha'){echo "selected"; } ?> value='budhha'>Budhha</option>
                    <option <?php if( $data_calas=='kong hu cu'){echo "selected"; } ?> value='kong hu cu'>Konghucu</option>
                    </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                    <textarea class="form-control" required="" name="alamat" id="alamat"><?php echo $data_calas['alamat']; ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                    <input type="submit" name="tombol_update" class="btn btn-primary" value="Update">
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
    </body>
    <script type="text/javascript">
        function hanyaAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
           if (charCode > 31 && (charCode < 48 || charCode > 57))

            return false;
          return true;
        }

         function huruf(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if ((charCode < 65 || charCode > 90)&&(charCode < 97 || charCode > 122)&&charCode>32&&charCode!=39)
           
            return false;
        return true;
        }

    </script>
</html>