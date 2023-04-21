<?php
session_start();

$params = session_get_cookie_params();

/* echo "<pre>";
print_r($params);
echo "</pre>";

echo session_name(); */

setcookie(
    session_name(),
    '',
    time() - 42000,
    $params["path"],
    $params["domain"],
    $params["secure"],
    $params["httponly"]
);

session_destroy();

echo "<script>
        alert('ออกจากระบบสำเร็จ');
        window.location.href='http://localhost/Project_Books/';
    </script>";
?>