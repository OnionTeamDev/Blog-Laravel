<?php
    $message = Session::get('message_success');
    if ($message) {
        echo "<div class='alert alert-success mx-auto background-success'>".$message."</div>";
        session::put('message_success', Null);
    }
?>
