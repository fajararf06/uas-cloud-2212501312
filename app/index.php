<?php include 'dbconn.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Mahasiswa</title>
</head>
<body>
    <h2>Form Input Mahasiswa</h2>
    <form method="post">
        NIM: <input type="text" name="nim" required><br>
        Nama: <input type="text" name="nama" required><br>
        Email: <input type="email" name="email" required><br>
        <input type="submit" name="submit" value="Simpan">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];

        $sql = "INSERT INTO mahasiswa (nim, nama, email) VALUES ('$nim', '$nama', '$email')";
        if ($conn->query($sql) === TRUE) {
            echo "Data berhasil disimpan.<br><br>";
        } else {
            echo "Error: " . $conn->error;
        }
    }

    echo "<h2>Daftar Mahasiswa</h2>";
    $result = $conn->query("SELECT * FROM mahasiswa");
    if ($result->num_rows > 0) {
        echo "<table border='1'><tr><th>NIM</th><th>Nama</th><th>Email</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["nim"]."</td><td>".$row["nama"]."</td><td>".$row["email"]."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "Belum ada data.";
    }

    $conn->close();
    ?>
</body>
</html>
