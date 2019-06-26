<?php
$name = $_GET['file'];
$actual = $_GET['actual'];
$original_filename = '../files/'.$name;
$new_filename = $actual;

// headers to send your file
header("Content-Type: application/jpeg");
header("Content-Length: " . filesize($original_filename));
header('Content-Disposition: attachment; filename="' . $new_filename . '"');

// upload the file to the user and quit
readfile($original_filename);
exit;

?>