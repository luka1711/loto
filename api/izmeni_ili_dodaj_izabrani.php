<?php
require('../db/db.php');
require('../model/Broj.php');
$broj = new Broj($conn);
$broj->noviBroj = $_POST['noviBroj'];
$broj->id = $_POST['id'];

if (!$broj->dodajIliIzmeni()) {
    echo 'Greska prilikom izmene broja! Verovatno da ste vec uneli taj broj!';
}
