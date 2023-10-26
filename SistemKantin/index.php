<?php 

include_once("config.php");
 
// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM tb_menu a join tb_penjual b on b.id_penjual = a.id_penjual ORDER BY id_menu DESC");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    
<style>
    .table {
        align-items: center;
    }
</style>

</head>
<body>
    <center>

<h1 align="center">KANTIN</h1>
<h5 align="center">Selamat Datang Di Kantin Multitusdi</h5>
<a href="addpenjual.php"> Daftar Menjadi Penjual Disini </a>
<h5 align="center">Berikut Client Yang Pernah Kami Layani</h5>

    <div class="container">
    <table class="tabel" width='80%' border=1> 


<tr>
        <th class="table">Nama Makanan</th> 
        <th>Harga</th>
        <th>Jenis Makanan</th> 
        <th>Penjual</th>
        <th>Aksi</th>

    </tr>

    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
    ?>
  <tr>
     <td><?= $user_data['nama_menu'] ?></td>
     <td>Rp.<?= number_format($user_data['harga_menu'],2,',','.') ?></td>
     <td><?= $user_data['jenis_menu'] ?></td>   
     <td><?= $user_data['nama_penjual'] ?></td>    

     <td><a href="edit.php?id=<?= $user_data['id_menu'] ?>">Edit</a> | <a href="delete.php?id=<?= $user_data['id_menu'] ?>">Delete</a></td></tr>  

<?php } ?>
    </table><br>

    <a href="add.php"> Pesan Makanan Disini </a>
    <br>
    <br>
    

    
       
    </div>

    </center>
</body>
</html>