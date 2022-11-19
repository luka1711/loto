<?php
require('../db/db.php');
require('../model/Broj.php');
require('../model/BrojKolo.php');
require('../model/Kolo.php');

$broj = new Broj($conn);
$izabraniBrojevi = $broj->izabrani();


$kolo = new Kolo($conn);

$kolo->naziv = $_POST['naziv'];
$kolo->broj_izvucenih = $_POST['broj_izvucenih'];


$brojKolo = new BrojKolo($conn);
$brojKolo->izvuceni_brojevi = UniqueRandomNumbersWithinRange(1, 39, $_POST['broj_izvucenih']);

if ($koloId = $kolo->dodaj()) {
    $brojKolo->id_kolo = $koloId;
    $brojKolo->izvuciBrojeve();
} else die('Greska prilikom generisanja kola!');

$brojac = 0;
$pogodjeni = array();
foreach ($izabraniBrojevi as $broj) {

    foreach ($brojKolo->izvuceni_brojevi as $izvuceniBroj) {
        if ($broj['broj'] == $izvuceniBroj) {
            $brojac++;
            array_push($pogodjeni, $broj['broj']);
        }
    }
}
$kolo->broj_pogodjenih = $brojac;
$kolo->izmena();
echo json_encode([
    'izvuceni_brojevi' => $brojKolo->izvuceni_brojevi,
    'izabrani_brojevi' => $izabraniBrojevi,
    'pogodjeno' => $brojac,
    'pogodjeni' => $pogodjeni 
]);
function UniqueRandomNumbersWithinRange($min, $max, $quantity)
{
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
}
