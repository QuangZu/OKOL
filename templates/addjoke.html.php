<form action ="" method = "post">
    <label for = "joketext"> Type your joke here:</label>
    <br><br>
    <textarea name = "joketext" rows="3" cols="40"></textarea>
    <br><br>
    <select name ="author">
        <option value="">Select an author</option>
        <?php foreach ($authors as $author):?>
            <option value="<?=$author['id']?>"><?=$author['name']?></option>
        <?php endforeach; ?>
</select>
<br>
    <input type = "submit" name = "submit" value = "Add">
</form>
