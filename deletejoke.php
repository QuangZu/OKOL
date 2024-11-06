<?php
    try{
        include 'includes/database_connection.php';

        $sql = 'DELETE FROM joke WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $_GET['id']);
        $stmt->execute();
        header('Location: jokes.php');
    }catch(PDOException $e){
        $title = 'An error occurred';
        $output = 'Database error: '. $e->getMessage();
}
include 'templates/layout.html.php';