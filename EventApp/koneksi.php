<?php
    define('server', '127.0.0.1');
    define('user', 'root');
    define('pass', '');
    define('db', 'db_event_app');

    $con = mysqli_connect("127.0.0.1", "root", "", "db_event_app") or die(mysqli_errno());
?>  