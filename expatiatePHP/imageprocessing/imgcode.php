<?php
session_start();
require 'ValidationCode.class.php';
$image = new ValidationCode(60, 20, 4);
$image->showImage();
$_SESSION['validationcode'] = $image->getCheckCode();
?>

