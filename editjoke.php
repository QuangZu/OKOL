<?php
include 'includes/database_connection.php';
try {
    if (!isset($_POST['joketext'])) {
        $sql = 'UPDATE joke SET joketext = :joketext WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':joketext', $_POST['joketext']);
        $stmt->bindValue(':id', $_POST['id']);
        $stmt->execute();
        header('Location: jokes.php');
    }
    else {
        $sql = 'SELECT * FROM joke WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $_GET['id']);
        $stmt->execute();
        $joke = $stmt->fetch();
        $title = 'Edit joke';

        ob_start();
        include 'templates/editjoke.html.php';
        $output = ob_get_clean();
    }
}catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
}
include 'templates/layout.html.php';
?>