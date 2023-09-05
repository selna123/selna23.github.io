<?php

session_start();
unset($_SESSION['id_user']);
unset($_SESSION['username']);

session_destroy();

echo "<script>
      alert('Anda telah Logout dari halaman administrator');
      document.location='index.php';
      </script>";

?>