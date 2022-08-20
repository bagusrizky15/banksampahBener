<?php
if (isset($_POST['simpan'])) {
   require_once("../system/config/koneksi.php");
   $jenis_sampah = $_POST['jenis_sampah'];
   $satuan = $_POST['satuan'];
   $harga = $_POST['harga'];
   $namaFile = $_FILES['gambar']['name'];
   $gambar = $_FILES['gambar'];
   $deskripsi = $_POST['deskripsi'];
   $ukuranFile = $_FILES['gambar']['size'];
   $error = $_FILES['gambar']['error'];

   $rand = rand();
   $ekstensi =  array('png','jpg','jpeg','gif');
   $filename = $gambar['name'];
   $ukuran = $gambar['size'];
   $ext = pathinfo($filename, PATHINFO_EXTENSION);

   if(!in_array($ext,$ekstensi) ) {
     echo "
     <script>
     alert('Gagal Menambah Data!');
     </script>
     ";
  } else {

   if ($ukuran < 1044070) {      
      $xx = $rand.'_'.$filename;
      move_uploaded_file($gambar['tmp_name'], '../asset/internal/img/uploads/'.$rand.'_'.$filename);
      $query = "INSERT INTO sampah(jenis_sampah,satuan,harga,gambar,deskripsi) VALUES ('$jenis_sampah','$satuan','$harga','$xx','$deskripsi')";

      $hasil = mysqli_query($conn, $query);
      echo "
      <script>
      alert('Berhasil Menambah Data!');
      </script>
      ";
   } else {
      echo "
      <script>
      alert('Ukuran terlalu besar!');
      </script>
      ";
   }
}
}

?>

<html>

<head>
   <title>Homepage</title>
   <style>
      label {
         font-family: Montserrat;
         font-size: 18px;
         display: block;
         color: #262626;
      }

      input[type=text],
      input[type=password] {
         border-radius: 5px;
         width: 40%;
         height: 35px;
         background: #eee;
         padding: 0 10px;
         box-shadow: 1px 2px 2px 1px #ccc;
         color: #262626;
      }

      select {
         border-radius: 5px;
         width: 42%;
         height: 39px;
         background: #eee;
         padding: 0 10px;
         box-shadow: 1px 2px 2px 1px #ccc;
         color: #262626;
      }

      input[type=submit] {
         height: 35px;
         width: 200px;
         background: #8cd91a;
         border-radius: 20px;
         color: #fff;
         margin-top: 20px;
         cursor: pointer;
      }

      input,
      select {
         font-family: Montserrat;
         font-size: 16px;
      }

      .form-group {
         padding: 5px 0;
      }
   </style>

</head>

<body>
   <h2 style="font-size: 30px; color: #262626;">Tambah Data Sampah Baru</h2>

   <form action="" method="POST" enctype="multipart/form-data">
      <div class="form-group">
         <label class="text-left">Jenis Sampah</label>
         <input type="text" placeholder="Masukan jenis sampah" name="jenis_sampah" autocomplete="off" />
      </div>

      <div class="form-group">
         <label class="">Satuan</label>
         <select name="satuan">
            <option value="p">---Pilih Satuan---</option>
            <option value="KG">Kilogram</option>
            <option value="PC">Pieces</option>
            <option value="LT">Liter</option>
         </select>
      </div>

      <div class="form-group">
         <label class="">Harga (Rp)</label>
         <input type="text" placeholder="Masukan harga (Rp)" name="harga" />
      </div>

      <div class="form-group">
         <label class="">Gambar</label>
         <input type="file" name="gambar" id="gambar" />
      </div>

      <div class="form-group">
         <label class="">Deskripsi</label>
         <input type="text" placeholder="Masukan deskripsi sampah" name="deskripsi" />
      </div>

      <input type="submit" name="simpan" value="Simpan"></input>
   </form>



</body>

</html>