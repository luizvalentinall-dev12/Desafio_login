<?php 
    deslogar();
    function deslogar() {
        session_start();
        session_destroy();
        header("Location: index.html");
        exit;
    }