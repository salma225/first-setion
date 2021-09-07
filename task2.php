<?php
/* TASK
Write a PHP function to print the next character of a specific character.
input : 'a'
Output : 'b'
input : 'z'
Output : 'a' */

$character = 'z';
$next_character = ++$character; 
if (strlen($next_character) > 1) 
{
 $next_character = $next_character[0];
 }
echo $next_character;

echo '<br> <br> <br>' ;


/* Write a PHP function to extract the file name from the following string.
input : 'www.example.com/public_html/index.php'
Output : 'index.php' */

$path = 'www.example.com/public_html/index.php';
$file_name = substr(strrchr($path, "/"), 1);
echo $file_name;


?>