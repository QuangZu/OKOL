<?php
    try {
        include 'includes/database_connection.php';

        $sql = 'SELECT joketext FROM joke';
        $jokes = $pdo->query($sql);
        $title = 'Joke List';

        ob_start();
        include 'templates/jokes.html.php';
        $output = ob_get_clean();
        include 'templates/layout.html.php';
    }
    catch (PDOException $e) {
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage();
    }
?>