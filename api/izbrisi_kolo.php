<?php
require('../db/db.php');
require('../model/Kolo.php');

$kolo = new Kolo($conn);
$kolo->id = $_GET['id_kolo'];

if ($kolo->obrisi())
    echo "Uspesno obrisano kolo.";
else echo "Doslo je do greske prilikom brisanja kola";
