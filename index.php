<?php
    $title = "Welcome to Joke System's home page";
    ob_start();
    include "templates/home.html.php";
    $output = ob_get_clean();
    include "templates/layout.html.php";
