<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    <title>add</title>
</head>
<body>
<center><h1>Tambah</h1>
<form action="add.php" method="post" name="form1">
    <table width="25%" border="0">
        <tr>
            <td>Nama</td>
            <td><input type="text" name="nama"></td>
        </tr>
        <tr>
            <td>Umur</td>
            <td><input type="number" name="usia"></td>
        </tr>
        <tr>
            <td>Gender</td>
            <td>
                <input type="radio" name="gender" value="Laki-laki"> Laki-laki
                <input type="radio" name="gender" value="Perempuan"> Perempuan
            </td>
        </tr> 
        <tr>
            <td>Hobi</td>
            <td class="d-flex flex-col gap-5">
                <input type="checkbox" name="hobi[]" value="futsal"> futsal <br>
                <input type="checkbox" name="hobi[]" value="Sepak bola"> Sepak bola <br>
                <input type="checkbox" name="hobi[]" value="Badminton"> badminton 
            </td>
        </tr>
        <tr>
            <td>Agama</td>
            <td>
                <select name="agama" class="form-select">
                    <option value="" name="" selected disabled hidden>-- pilih agama --</option>
                    <option name="agama" value="Islam">Islam</option>
                    <option name="agama" value="Kristen">Kristen</option>
                    <option name="agama" value="Hindu">Hindu</option>
                    <option name="agama" value="Buddha">Buddha</option>
                    <option name="agama" value="Konghucu">Konghucu</option>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="submit" value="Tambah" class="btn btn-success btn-lg"></td>
        </tr>
    </table>
</form>
</center>
<?php
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $usia = $_POST['usia'];
    $gender = $_POST['gender'];
    $hobi = isset($_POST['hobi']) ? implode(", ", $_POST['hobi']) : ''; 
    $agama = $_POST['agama'];
    
    include "koneksi.php";
    $result = mysqli_query($koneksi, "INSERT INTO data (nama, usia ,gender, hobi, agama) VALUES ('$nama','$usia','$gender','$hobi','$agama' )");
    
    echo "User added successfully";
    header("location:index.php");
}
?>
</body>
</html>
</body>
</html>