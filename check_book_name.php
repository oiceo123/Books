<?php
    require "connect.php";
    session_start();

    $stmt = $conn->prepare("SELECT BookName FROM book WHERE PublisherName = ?");
    $stmt->bindParam(1, $_SESSION["publisherName"]);
    $stmt->execute();

    while ($item = $stmt->fetch()) {
        if (strtoupper($_GET["bookName"]) === strtoupper($item["BookName"])) {
            echo "denied";
            exit;
        }
    }

    echo "okay";
?>