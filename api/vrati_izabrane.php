<?php
require('../db/db.php');
require('../model/Broj.php');
$broj = new Broj($conn);
echo json_encode($broj->izabrani());
