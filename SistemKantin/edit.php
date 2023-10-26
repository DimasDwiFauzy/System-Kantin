<?php
// include database connection file
include_once("config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    $id = $_POST['id_menu'];
    
    $nama=$_POST['nama_menu'];
    $harga=$_POST['harga_menu'];
    $jenis=$_POST['jenis_menu'];
        
    // update user data
    $result = mysqli_query($mysqli, "UPDATE tb_menu SET nama_menu='$nama', harga_menu='$harga',jenis_menu='$jenis' WHERE id_menu='$id'");
    
    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM tb_menu WHERE id_menu=$id");
 
while($user_data = mysqli_fetch_array($result))
{
    $nama = $user_data['nama_menu'];
    $harga = $user_data['harga_menu'];
    $jenis = $user_data['jenis_menu'];
}
?>
<html>
<head>	
    <title>Edit User Data</title>
</head>
 
<body>
    <a href="index.php">Home</a>
    <br/><br/>
    
    <form name="update_user" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>Nama Makanan</td>
                <td><input type="text" name="nama_menu" value=<?php echo $nama;?>></td>
            </tr>
            <tr> 
                <td>Harga Makanan</td>
                <td><input type="number" name="harga_menu" value=<?php echo $harga;?>></td>
            </tr>
            <tr> 
                <td>Jenis Makanan</td>
                <td><select name="jenis_menu" id="">
                    <option value=<?php echo $jenis;?>><?php echo $jenis;?></option>
                    <option value="Makanan Berat">Makanan Berat</option>
                    <option value="Makanan Ringan">Makanan Ringan</option>
                </select>
            </tr>
            <tr>
                <td><input type="hidden" name="id_menu" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>