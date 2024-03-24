<?php
//con este lo que hace es que reinicia la sesion porque el usuario sale del index.php
session_start();
session_unset();
session_destroy();

header("Location: ../index.php");
die();