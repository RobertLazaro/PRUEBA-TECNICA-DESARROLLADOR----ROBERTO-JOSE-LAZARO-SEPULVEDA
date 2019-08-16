<?php

    include("db.php");

    $_SESSION['message'] = 'La tarea ha sido finalizada correctamente.';
    $_SESSION['message_type'] = 'danger';
    header("Location: index.php");

    
?>