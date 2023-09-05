<?php

//buat koneksi database

//persiapan identitas server
$server   ="localhost";     //nama server
$user     ="root";          //username database server
$pass     ="";              //pasword database server
$database ="dbarsip";       //nama database

//koneksi

$koneksi = mysqli_connect($server, $user, $pass, $database) or die (mysqli_error($koneksi));


?>