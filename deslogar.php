<?php 
    deslogar();
    function deslogar() {
        session_destroy();
        header("Location: index.html");
        exit;
    }