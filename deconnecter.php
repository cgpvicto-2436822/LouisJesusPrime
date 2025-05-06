<?php
session_destroy();
unset($_SESSION);

header("Location: chemin/page.php");   // renvoie vers une autre page