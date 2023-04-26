<?php
    session_start();

    $bookId = $_GET["bookId"];

    $_SESSION["cart"][$bookId]["Checked"] = !$_SESSION["cart"][$bookId]["Checked"];

    foreach ($_SESSION["cart"] as $item) {
        if (empty($item["Checked"])) {
            echo "denied";
        }
    }

    echo "okay";
?>