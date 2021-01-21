<?php
    $message = Session::get('message_errors');
    if ($message) {
        echo "<div class='alert alert-danger mx-auto background-danger'>".$message."</div>";
        session::put('message_errors', Null);
    }
?>
