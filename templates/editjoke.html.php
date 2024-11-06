<form action="" method="post">
    <input type="hidden" name="jokeid" value="<?= $jokeid['id']; ?>">
    <label for="joketext">Edit your joke here:</label>
    <textarea name="joketext" rows="3" cols="40">
        <?= $joke['joketext'];?>
    </textarea>
    <input type="submit" value="Edit">
</form>