<?php
include 'db.php';
  $id         = $_POST['id'];
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
                      
                   $query  = "UPDATE buku SET judul = '$judul', gambar = '$gambar_baru', pengarang = '$pengarang', penerbit = '$penerbit'";
                    $query .= "WHERE id = '$id'";
                    $result = mysqli_query($conn, $query);
                    
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($conn).
                             " - ".mysqli_error($conn));
                    } else {
                      echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
                    }
              } else {     
                  echo "<script>alert('Ekstensi gambar yang boleh hanya png, jpg, dan jfif.');window.location='tambah_buku.php';</script>";
              }
    } else {
      $query  = "UPDATE buku SET judul = '$judul', pengarang = '$pengarang', penerbit = '$penerbit' ";
      $query .= "WHERE id = '$id'";
      $result = mysqli_query($conn, $query);
      if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($conn).
                             " - ".mysqli_error($conn));
      } else {
          echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
      }
    }