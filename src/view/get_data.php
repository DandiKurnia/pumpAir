<?php 
    include "../../koneksi.php";

    $sql = "SELECT * FROM history ORDER BY id DESC LIMIT 1";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo $row["id"] . "," . $row["jenisTaneman"];
        }
    } else {
        echo "0,No data";
    }
?>