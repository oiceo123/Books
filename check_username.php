<?php
    require "connect.php";

    $stmt = $conn->prepare("SELECT Username FROM user");
    $stmt->execute();
    $usernameAll = $stmt->fetchAll();

    foreach ($usernameAll as $item) {
        if ($_GET["Username"] == $item["Username"]) {
            echo "denied";
            exit;
        }
    }

    echo "okay";
?>