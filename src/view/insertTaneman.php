<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require "../../koneksi.php";

if (!file_exists('../../firebase_config.php')) {
    echo "Error: firebase_config.php file not found";
    exit;
}

require '../../firebase_config.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $namaTaneman = $_POST['namaTaneman'];
    $jenisTaneman = $_POST['jenisTaneman'];
    $pinMode = $_POST['pinMode'];

    // Insert data into Firebase Realtime Database
    $data = ['namaTaneman' => $namaTaneman, 'jenisTaneman' => $jenisTaneman, 'pinMode' => $pinMode];
    $reference = $database->getReference('taneman');
    $reference->push($data);

    $sql = "INSERT INTO taneman (namaTaneman, jenisTaneman, pinMode) VALUES ('$namaTaneman', '$jenisTaneman', '$pinMode')";
    
    if (mysqli_query($connect, $sql)) {
        $_SESSION['success'] = " BERHASIL MENAMBAHKAN TANEMAN !!!";
        header("Location: index.php");
    } else {
        $_SESSION['error'] = "data tidak masuk";
        header("Location: index.php");
    }

}
?>