<?php

session_start();

session_destroy();

header("Location: http://localhost/Elixir/admin/index.php");

exit();

?>