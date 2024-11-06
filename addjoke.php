<?php
if (isset($_POST['joketext']) && !empty($_POST['joketext'])) {
    try {
        include 'includes/database_connection.php';

        $sql = 'INSERT INTO joke SET joketext = :joketext, jokedate = CURDATE(), author_id = :author_id, category_id = 1';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':joketext', $_POST['joketext']);
        $stmt->bindValue(':author_id', $_POST['author']);
        $stmt->execute();
        header('Location: jokes.php');
    }
    catch (PDOException $e) {
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage();
    }
}
else {
    include 'includes/database_connection.php';

    $title = 'Add a new joke';
    $sql = 'SELECT * FROM author';
    $authors = $pdo->query($sql);
    ob_start();
    include 'templates/addjoke.html.php';
    $output = ob_get_clean();
}
include 'templates/layout.html.php';
