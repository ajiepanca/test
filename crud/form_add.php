<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="bootstrap.min.css">
    </head>
    <body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Tambah Data calas</h3>
            </div>
            <div class="card-body"> 
            <!-- // membuat tag form dengan attribute action=”Add_proses” artinya form akan diproses di file add_proses, lalu menggunakan method post -->
            <form method="post" action="add_proses.php"> 
                
                    <!--  membuat inputan untuk nim. dengan validasi hanya boleh 10 nilai dan hanya boleh angka saja-->                   
                    <div class="form-group row">
                    <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                    <div class="col-sm-10">
                    <input type="text" name="nim" class="form-control" minlength="10" maxlength="10" onkeypress="return hanyaAngka(event);" id="nim" placeholder="Masukkan Nim" size="35"  required="" /> 
                    </div>
                </div>

                    <!-- membuat inputan untuk nama. dengan validasi hanya boleh 50 nilai dan minimal 3 nilai . hanya boleh huruf saja dan kutip ' -->
                    <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" minlength="3" maxlength="50" onkeypress="return huruf(event);" id="nama" placeholder="Masukkan Nama lengkap" size="35" required="" />
                    </div>
                </div>

                 <!-- membuat inputan untuk jeniskelamin. dengan validasi hanya boleh memilih satu dengan type radio button  -->
                    <div class="form-group row">
                    <label for="jenkel" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                    <input type="radio" name="jenkel" value='laki laki' required="" />LAKI LAKI</p>
                    <input type="radio" name="jenkel" value='perempuan' required="" />PEREMPUAN</p>
                    </div>
                </div>

                 <!-- membuat inputan untuk peminatan. dengan validasi bisa memilih lebih dari satu dan menggunakan type checkbox button -->
                <div class="form-group row">
                    <label for="peminatan" class="col-sm-2 col-form-label">Peminatan</label>
                    <div class="col-sm-10">
                    <input type="checkbox" name="peminatan[]" value="NETWORKING" /> NETWORKING
                    <input type="checkbox" name="peminatan[]" value="PROGRAMMING" /> PROGRAMMING
                    <input type="checkbox" name="peminatan[]" value="ACCOUNTING" /> ACCOUNTING
                    </div>
                </div>

                 <!-- membuat inputan untuk email. dengan validasi hanya boleh email saja -->
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="email" placeholder="Masukkan email" size="35" required="" />
                    </div>
                </div>

                 <!-- membuat inputan untuk agama. dengan validasi hanya boleh memilih satu dengan type combo box button -->
                 <div class="form-group row">
                    <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                    <div class="col-sm-10">
                    <form action="add_proses.php" method="get">
                    <select name='agama'>
                    <option> PILIH AGAMA</option>
                    <option value='islam'>Islam</option>
                    <option value='Kristen'>Kristen</option>
                    <option value='Katolik'>Katholik</option>
                    <option value='Hindu'>hindu</option>
                    <option value='Buddha'>Buddha</option>
                    <option value='kong hu cu'>Konghucu</option>
                    </select>
                    </div>
                </div>

                <!-- membuat inputan untuk alamat. dengan type text area -->
                <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                    <textarea class="form-control" name="alamat" id="alamat" placeholder="Masukkan alamat lengkap" size="35"  required="" /></textarea>
                    </div>
                </div>

                <!--  membuat tombol tambah  -->
                <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                    <input type="submit" name="tombol_tambah" class="btn btn-primary" value="Tambah">
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

