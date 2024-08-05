<!DOCTYPE html>
<html>
<head>
    <title>Check Even or Odd</title>
</head>
<body>
    <!-- Form untuk input bilangan -->
    <form method="post" action="">
        <label for="number">Masukkan bilangan:</label>
        <input type="number" id="number" name="number" required>
        <input type="submit" value="Cek">
    </form>

    <?php
    // Memeriksa apakah form telah disubmit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Mendapatkan nilai dari input pengguna
        $number = isset($_POST['number']) ? intval($_POST['number']) : 0;

        // Menentukan apakah bilangan tersebut genap atau ganjil
        if ($number % 2 == 0) {
            echo "Bilangan Genap";
        } else {
            echo "Bilangan Ganjil";
        }
    }
    ?>
</body>
</html>
