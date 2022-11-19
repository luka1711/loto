<?php
require('../db/db.php');
require('../model/Kolo.php');
$kolo = new Kolo($conn);
echo json_encode($kolo->vratiSve());
