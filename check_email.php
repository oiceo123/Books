<?php
    require "connect.php";

    $stmt = $conn->prepare("SELECT Email FROM user");
    $stmt->execute();
    $usernameAll = $stmt->fetchAll();

    foreach ($usernameAll as $item) {
        if ($_GET["Email"] == $item["Email"]) {
            echo "denied";
            exit;
        }
    }

    echo "okay";
?>