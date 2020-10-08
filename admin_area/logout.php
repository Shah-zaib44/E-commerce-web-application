<?php
session_start();

session_destroy();

echo"<script>window.open('null.php','_self')</script>";
?>