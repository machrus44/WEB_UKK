<?php
include 'db.php';

  $judul      = $_POST['judul'];
  $gambar     = $_FILES['gambar']['name'];
  $pengarang  = $_POST['pengarang'];
  $penerbit   = $_POST['penerbit'];

if($gambar != "") {
  $ekstensi_diperbolehkan = array('png','jpg','jfif');
  $x = explode('.', $gambar);
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['gambar']['tmp_name'];   
  $angka_acak     = rand(1,999);
  $gambar_baru = $angka_acak.'-'.$gambar;
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, 'gambar/'.$gambar_baru);
                  $query = "INSERT INTO buku (judul, gambar, pengarang, penerbit) VALUES ('$judul', '$gambar_baru', '$pengarang', '$penerbit')";
                  $result = mysqli_query($conn, $query);
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_error($conn).
                           " - ".mysqli_error($conn));
                  } else {
                    echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
                  }

            } else {     
                echo "<script>alert('Ekstensi gambar yang boleh hanya png, jpg, dan jfif.');window.location='tambah_buku.php';</script>";
            }
} else {
   $query = "INSERT INTO buku (judul, gambar, pengarang, penerbit) VALUES ('$judul', '$gambar', '$pengarang', '$penerbit', null)";
                  $result = mysqli_query($conn, $query);

                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_error($conn).
                           " - ".mysqli_error($conn));
                  } else {
                    echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
                  }
}