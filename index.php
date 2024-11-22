<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    <title>Home</title>
</head>
<body>
    <center><h1>Data orang</h1></center> 
    <center>
        <table class="table table-bordered">
            <tr>
                <th>id</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>Gender</th>
                <th>Hobi</th>
                <th>Agama</th>
                <th>Edit/Delete</th>
            </tr>
            <?php
            include 'koneksi.php';
            $result = mysqli_query($koneksi, "SELECT * FROM data ORDER BY id ");
            while ($data = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $data['id'] . "</td>";
                echo "<td>" . $data['nama'] . "</td>";
                echo "<td>" . $data['usia'] . "</td>";
                echo "<td>" . $data['gender'] . "</td>";
                echo "<td>" . $data['hobi'] . "</td>";
                echo "<td>" . $data['agama'] . "</td>";
                echo "<td><a class='btn btn-warning' href='update.php?id=" . $data['id'] . "'>Edit</a> | <a class='btn btn-danger' href='delete.php?id=" . $data['id'] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\");'>Delete</a></td>";
                echo "</tr>";
            }
            ?>
        </table>
        
    </center> 
    <center><a href="add.php" class="btn btn-success">Tambah</a></center> 
</body>
</html>