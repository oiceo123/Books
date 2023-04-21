<?php
    require "connect.php";

    $stmt = $conn->prepare("SELECT PublisherName FROM user");
    $stmt->execute();
    $publisherNameAll = $stmt->fetchAll();

    foreach ($publisherNameAll as $item) {
        if ($_GET["PublisherName"] == $item["PublisherName"]) {
            echo "denied";
            exit;
        }
    }

    echo "okay";
?>