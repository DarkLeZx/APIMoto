<?php 
require("koneksimoto.php");

$perintah = "SELECT * FROM tbl_motorcycle";
$eksekusi = mysqli_query($connect, $perintah);
$check = mysqli_affected_rows($connect);

if($check > 0)
{
    $response ["kode"] = 1;
    $response ["pesan"] = "Data Tersedia";
    $response["data"] = array();
    
    while($get = mysqli_fetch_object($eksekusi))
    {
        $var["id"] = $get -> id;
        $var["nama"] = $get -> nama;
        $var["merk"] = $get -> merk;
        $var["mesin"] = $get -> mesin;
        $var["tahun"] = $get -> tahun;
        $var["harga"] = $get -> harga;
        $var["foto"] = $get -> foto;
        
        
        array_push($response ["data"], $var);
    }
}
else
{
    $response ["kode"] = 0;
    $response ["pesan"] = "Data Tidak Tersedia";   
}

echo json_encode($response);
mysqli_close($connect);