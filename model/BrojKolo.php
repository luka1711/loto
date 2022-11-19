<?php

class BrojKolo
{

    private $conn;
    private $tabela = "izvuceni_brojevi";

    public $id;
    public $izvuceni_brojevi;
    public $id_kolo;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }


    public function izvuciBrojeve()
    {
        foreach ($this->izvuceni_brojevi as  $broj) {
            $this->dodaj($broj);
        }
    }
    public function dodaj($broj)
    {

        $sql = "INSERT INTO " . $this->tabela . " (`id_kolo`, `broj`) 
        VALUES ($this->id_kolo, $broj)";

        if ($this->conn->query($sql)) {
            return $this->conn->insert_id;
        }

        return false;
    }
}
