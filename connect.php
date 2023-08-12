<?php

$conn = new PDO("mysql:host=localhost;dbname=social_network", "root" , "");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);