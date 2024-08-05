<?php
// Mendapatkan nilai 'n' dari input pengguna atau menggunakan nilai default
$n = isset($_GET['n']) ? intval($_GET['n']) : 20; // Misalnya default ke 20 jika tidak ada input

// Mencetak bilangan dari 0 hingga n
for ($i = 0; $i <= $n; $i++) {
    // Jika bukan bilangan pertama, tambahkan koma sebagai pemisah
    if ($i > 0) {
        echo ' , ';
        }
    echo $i;
    }

?>
