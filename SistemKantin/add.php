<html>
<head>
    <title>Add Users</title>
</head>
 
<body>
    <center>
<br>
    <h1>Mendaftar</h1>
    <br/>
 
    <form action="add.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Nama Makanan</td>
                <td><input type="text" name="nama_menu" required></td>
            </tr>
            <tr> 
                <td>Harga Makanan :</td>
                <td><input type="text" name="harga_menu" required></td>
            </tr>
            <tr> 
                <td>Jenis Makanan</td>
                <td><select name="jenis_menu" id="" required>
                    <option value="Makanan Berat">Makanan Berat</option>
                    <option value="Makanan Ringan">Makanan Ringan</option>
                </select></td>
            </tr>
            <tr> 
                <td>Penjual</td>
                <?php 
                    include "config.php";
                    $query = "select * from tb_penjual";
                    $datapenjual = mysqli_query($mysqli,$query);
              
                ?>
                <td><select name="nama_penjual" id="">
                    <?php 
                        while ($row = mysqli_fetch_array($datapenjual)) {
                    ?>
                    <option value="<?= $row['id_penjual'] ?>"><?= $row['nama_penjual'] ?></option>
                    <?php } ?>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>
    
    <?php
 
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $nama = $_POST['nama_menu'];
        $harga = $_POST['harga_menu'];
        $jenis = $_POST['jenis_menu'];
        $penjual = $_POST['nama_penjual'];
        
        // include database connection file
        include_once("config.php");
                
        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO tb_menu VALUES(null,'$jenis','$harga','$nama','$penjual')");
        
        // Show message when user added
        echo "<script>alert('Berhasil Tambah Data');
        window.location.href = 'index.php';
        </script>";
    }
    ?>

<a href="index.php">Go to Home</a>

</center>
</body>
</html>