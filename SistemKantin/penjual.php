
<center>

<h1>Daftar Penjual Yang Telah Mendaftar<h1>

<?php 

include_once("config.php");
 
// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM tb_penjual ORDER BY id_penjual DESC");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <table class="tabel" width='80%' border=1> 


<tr>
        <th>Nama Penjual</th> 
        <th>Nomor Handphone</th>
        <th>Alamat</th> 
        <th>Aksi</th>
    </tr>

    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
    ?>
  <tr>
     <td><?= $user_data['nama_penjual'] ?></td>
     <td><?= $user_data['NoHp_penjual'] ?></td>   
     <td><?= $user_data['alamat_penjual'] ?></td>    

     <td><a href="editpenjual.php?id=<?= $user_data['id_penjual'] ?>">Edit</a> | <a href="deletepenjual.php?id=<?= $user_data['id_penjual'] ?>">Delete</a></td></tr>  

<?php } ?>
    </table><br>

    <!-- <?php 
    
        //  while($user_data = mysqli_fetch_array($result ))  {         
            
        //     echo "<p>Nama Makanan :$user_data['nama_menu'] ?></p>";
        //     echo "<p>Harga Makanan :".$user_data['harga'] ?>."</p>";
        //     echo "<p>Jenis Makanan :".$user_data['jenis']."</p>";   
           

        //  }
       ?> -->
       
    </div>
    <a href="addpenjual.php">Kembali</a>

        </center>
</body>
</html>