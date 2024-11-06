<?php
if (isset($_POST['joketext']) && !empty($_POST['joketext'])) {
    try {
        include 'includes/database_connection.php';

        $sql = 'INSERT INTO joke SET joketext = :joketext, jokedate = CURDATE(), authorid = 1, categoryid = 3';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':joketext', $_POST['joketext']);
        $stmt->execute();
        header('Location: jokes.php');
    }
    catch (PDOException $e) {
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage();
    }
}
else {
    $title = 'Add a new joke';
    ob_start();
    include 'templates/addjoke.html.php';
    $output = ob_get_clean();
}
include 'templates/layout.html.php';