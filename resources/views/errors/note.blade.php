<?php
    $message = Session::get('message_errors');
    if ($message) {
        echo "<div class='alert alert-danger mx-auto'>".$message."</div>";
        session::put('message_errors', Null);
    }
?>
