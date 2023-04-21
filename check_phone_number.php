<?php
    require "connect.php";

    $stmt = $conn->prepare("SELECT PublisherTel FROM user");
    $stmt->execute();
    $phoneNumberAll = $stmt->fetchAll();

    foreach ($phoneNumberAll as $item) {
        if ($_GET["PublisherTel"] == $item["PublisherTel"]) {
            echo "denied";
            exit;
        }
    }

    echo "okay";
?>