<?php
session_start();
echo $_SESSION['template_html'].'<br>';
echo $_SESSION['template_css'].'<br>';
echo $_SESSION['template_jpg'].'<br>';
echo $_SESSION['template_name'].'<br>';
?>