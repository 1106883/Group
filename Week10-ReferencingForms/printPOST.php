<?php
$title=$_POST['Title'];
$content=$_POST['Content'];
$category=$_POST['Category'];

echo "<article><h1>$title</h1><br><p>$content</p><br><strong>$category</strong></article>";