<?php
require("koneksimoto.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST ["id"];
    $nama = $_POST["nama"];
    $merk = $_POST["merk"];
    $mesin = $_POST["mesin"];
    $tahun = $_POST["tahun"];
    $harga = $_POST["harga"];
    $foto = $_POST["foto"];
    
    $perintah ="UPDATE tbl_motorcycle SET 
    nama ='$nama', 
    merk ='$merk', 
    mesin ='$mesin', 
    tahun='$tahun', 
    harga='$harga',
    foto = '$foto' WHERE id = '$id'";
    $eksekusi = mysqli_query($connect, $perintah);
    $cek =  mysqli_affected_rows ($connect);
    
    if($cek >0 ){
        $response["kode"] = 1;
        $response["pesan"] = "Sukses Mengubah Data";
    }
    else{
        $response["kode"] = 0;
        $response["pesan"] = "Gagal Mengubah Data";
    }
}
else {
    $response["kode"] = 0;
    $response["pesan"] = "Tidak Ada Data diUpdate";
}
echo json_encode($response);
mysqli_close($connect);