<?php
session_destroy();
unset($_SESSION);

header("Location: index.php");   // renvoie vers une autre page