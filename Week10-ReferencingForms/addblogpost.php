<?php

if($_SERVER['request_method'] === 'POST'){

?><form id="Blog" action="<?{$_SERVER['PHP_SELF'];}?>" method="post">
    <input type="text" placeholder="Title" name="Title">
    <input type="text" placeholder="Content" name="Content">
    <select name="Category">
        <option value="Cat">Cat</option>
        <option value="Dog">Dog</option>
        <option value="Misc">Misc</option>
    </select>
    <input type="submit" value="Submit">
</form> <?


$title = $_POST['Title'];
$content = $_POST['Content'];
$category = $_POST['Category'];


echo "<article><h1>$title</h1><br><p>$content</p><br><strong>$category</strong></article>";
}
elseif($_SERVER['request_method'] === 'GET'){

    ?><form id="Blog" action="<?{$_SERVER['PHP_SELF'];}?>" method="get">
    <input type="text" placeholder="Title" name="Title">
    <input type="text" placeholder="Content" name="Content">
    <select name="Category">
        <option value="Cat">Cat</option>
        <option value="Dog">Dog</option>
        <option value="Misc">Misc</option>
    </select>
    <input type="submit" value="Submit">
    </form> <?

$title = $_GET['Title'];
$content = $_GET['Content'];
$category = $_Get['Category'];

    echo "<article><h1>$title</h1><br><p>$content</p><br><strong>$category</strong></article>";
}
else{}

?>