<?php
  include('db.php'); 
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Dunia Buku </title>
    <style type="text/css">
      * {
        font-family: "Trebuchet MS";
      }
      h1 {
        text-transform: uppercase;
        color: #000000;
      }
    button {
          background-color: cadetblue;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
          border: 0px;
          margin-top: 20px;
    }
    label {
      margin-top: 10px;
      float: left;
      text-align: left;
      width: 100%;
    }
    input {
      padding: 6px;
      width: 100%;
      box-sizing: border-box;
      background: #f8f8f8;
      border: 2px solid #ccc;
      outline-color: cadetblue;
    }
    div {
      width: 100%;
      height: auto;
    }
    .base {
      width: 400px;
      height: auto;
      padding: 20px;
      margin-left: auto;
      margin-right: auto;
      background: #ededed;
    }
    </style>
  </head>
  <body>
      <center><center>
        <div class="image">
 <img src="./gambar/TambahBuku.png" width="300px" >
</div>
      <form method="POST" action="proses_tambah.php" enctype="multipart/form-data" >
      <section class="base">

        <div>
          <label>Judul</label>
          <input type="text" name="judul" autofocus="" required="" />
        </div>
        <div>
          <label>Gambar</label>
         <input type="file" name="gambar" required="" />
        </div>
        <div>
          <label>Pengarang</label>
          <input type="text" name="pengarang" required="" />
        </div>
        <div>
          <label>Penerbit</label>
          <input type="text" name="penerbit" required="" />
        </div>
        <div>
         <button type="submit">Tambahkan</button>
        </div>
        </section>
      </form>
  </body>
</html>