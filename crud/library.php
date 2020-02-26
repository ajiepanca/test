<?php   
class Library //ibaratnya class adalah sebuah wadah yang menyimpan property dan method.
{
    
    public function __construct() // kita membuat function __construct karena kita membuat class. 
    //dalam function __construct ini kita buat perintah untuk terkoneksi dengan database
    //Method adalah tindakan yang bisa dilakukan didalam class. Sebuah class tidak harus memiliki method.
    {
        $host = "localhost"; //  buat variabel dengan nama $host digunakan untuk menyimpan alamat server database
        $dbname = "crud"; // buat variabel dengan nama $dbname digunakan untuk menyimpan nama database, adalah CRUD
        $username = "root"; //  BUAT variabel dengan nama $username digunakan untuk menyimpan user dari database, adalah root
        $password = ""; //  buat variabel dengan nama $password digunakan untuk menyimpan password dari database. kita buat kosong karena standart password database mysql untuk xampp adalah kosong
        $this->db = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password); //melakukan koneksi ke database dengan menggunakan function PDO, dengan menyertakan parameter yang sebelumnya nilainya kita buat dalam sebuah variabel, dan hasil koneksi kita simpan di variabel $db
    }
    
    public function add_data($nim, $nama, $jenkel,$peminatan, $alamat, $agama, $email ) // membuat fungsi add_data
    {
        $data = $this->db->prepare('INSERT INTO calas (nim, nama, jenkel, peminatan, alamat, agama, email) VALUES (?, ?,?,?,?,?,?)');
        // membuat query insert dengan menuliskannya pada bagian prepare statement, membuat 7 tanda tanya, jumlah tanda tanya ini kita samakan dengan jumlah kolom yang akan kita beri isi
        
        $data->bindParam(1, $nim); // untuk menampung nanti data nim . mengisikan nilai pada tanda tanya tersebut, dengan menggunakan perintah bindParam, tanda panah pertama dengan nilai variabel $nim
        $data->bindParam(2, $nama); // mengisikan nilai pada tanda tanya dengan menggunakan perintah bindParam, tanda panah kedua dengan nilai variabel $nama
        $data->bindParam(3, $jenkel);//mengisikan nilai pada tanda tanya dengan menggunakan perintah bindParam,tanda panah ketiga dengan nilai variabel $jenkel
        $data->bindParam(4, $peminatan); // mengisikan nilai pada tanda tanya dengan menggunakan perintah bindParam, tanda panah kempat dengan nilai variabel $peminatan
        $data->bindParam(5, $alamat); // mengisikan nilai pada tanda tanya dengan menggunakan perintah bindParam, tanda panah kelima dengan nilai variabel $alamat
        $data->bindParam(6, $agama); // mengisikan nilai pada tanda tanya dengan menggunakan perintah bindParam, tanda panah keenam dengan nilai variabel $naagama
        $data->bindParam(7, $email); // mengisikan nilai pada tanda tanya dengan menggunakan perintah bindParam, tanda panah ketujuh dengan nilai variabel $email
        
        $data->execute();// menjalankan perintah query 
        return $data->rowCount();
    }
    public function show() // membuat method show 
    {
        $query = $this->db->prepare("SELECT * FROM calas"); //merupakan fungsi PDO yang digunakan untuk menuliskan query SQL hasil query disimpan di variabel $query, kenapa kita menggunakan $this->db karena variabel ini yang menyimpan koneksi ke database.
        $query->execute();// menjalankan perintah query 
        $data = $query->fetchAll(); // menuliskan perintah $query->fetchAll() untuk mendapatkan hasil query, dan menyimpannya kedalam variabel $data, berikutnya kita return variabel $data, untuk mengembalikan hasil query yang telah disimpan di variabel $data
        return $data; // kita return jumlah data yang berhasil ditambahkan 
    }

    public function get_by_id($nim){ // telah membuat function get_by_id yang digunakan untuk menampilkan data siswa, sesuai nim yang dikirimkan, dengan menggunakan prepare statement, dan hasil nilainya akan di return pada file form_edit.php
        $query = $this->db->prepare("SELECT * FROM calas where nim=?");
        $query->bindParam(1, $nim);
        $query->execute();
        return $query->fetch();
    }

    public function update($nim, $nama, $jenkel,$peminatan, $alamat, $agama, $email){ // membuat function update, isi dari function ini adalah perintah query untuk update data menggunakan prepared statement
        $query = $this->db->prepare('UPDATE calas set nama=?,jenkel=?, peminatan=?,alamat=?,agama=?,email=? where nim=?');
        
        $query->bindParam(1, $nama);
        $query->bindParam(2, $jenkel);
        $query->bindParam(3, $peminatan);
        $query->bindParam(4, $alamat);
        $query->bindParam(5, $agama);
        $query->bindParam(6, $email);
        $query->bindParam(7, $nim);
        
        $query->execute(); // menjalankan perintah query nya
        return $query->rowCount(); // setelah data diupdate maka akan return jumlah data yang berhasil diupdate 
    }

    public function delete($nim) // membuat function delete.  dalam function ini kita menuliskan perintah query untuk menghapus data calas berdasarkan nim yang akan dihapus
    {
        $query = $this->db->prepare("DELETE FROM calas where nim=?");

        $query->bindParam(1, $nim);

        $query->execute();// mengeksekusi query nya
        return $query->rowCount();// kita mengembalikan jumlah record yang dihapus
    }

}
?>