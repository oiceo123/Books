<?php
    session_start();

    $total = 0;

    foreach ($_SESSION["cart"] as $item) {
        if (!empty($item["Checked"])) {
            $total = $total + $item["Price"];
        }
    }

    echo $total;
?>