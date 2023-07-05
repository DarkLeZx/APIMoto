<?php 
require("koneksimoto.php");

if($_SERVER["REQUEST_METHOD"]== "POST") {
    $nama = $_POST["nama"];
    $merk = $_POST["merk"];
    $mesin = $_POST["mesin"];
    $tahun = $_POST["tahun"];
    $harga = $_POST["harga"];
    $foto = $_POST["foto"];
    
    $perintah = "INSERT INTO tbl_motorcycle(nama, merk, mesin, tahun, harga, foto) VALUES ('$nama', '$merk', '$mesin', '$tahun', '$harga', '$foto')";
    
    $eksekusi = mysqli_query($connect, $perintah);
    $cek = mysqli_affected_rows ($connect);
    
    if($cek > 0)
    {
        $response["kode"]= 1;
        $response["pesan"] = "Sukses Menyimpan Data";
    }
    else
    {
        $response["kode"]= 0;
        $response["pesan"] = "Gagal Menyimpan Data";
    }
}
else {
    $response["kode"]= 0;
    $response["pesan"] = "Tidak Ada Post Data";
}
echo json_encode($response);
mysqli_close($connect);