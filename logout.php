<?php
session_start();
session_destroy();
header("Location:http://{$_SERVER['HTTP_HOST']}/PROJECT%20UAS/index.php");
