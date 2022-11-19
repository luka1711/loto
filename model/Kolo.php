<?php

class Kolo
{

    private $conn;
    private $tabela = "kolo";

    public $id;
    public $naziv;
    public $broj_izvucenih;
    public $broj_pogodjenih;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function vratiSve()
    {
        $sql = "SELECT * FROM " . $this->tabela;

        $kola = array();
        $res = $this->conn->query($sql);

        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                array_push($kola, $row);
            }
        }
        return $kola;
    }

    public function dodaj()
    {

        $sql = "INSERT INTO " . $this->tabela . " (`naziv`, `broj_izvucenih`) 
        VALUES ('" . $this->naziv . "', $this->broj_izvucenih)";

        if ($this->conn->query($sql)) {
            $this->id = $this->conn->insert_id;
            return $this->conn->insert_id;
        }

        return false;
    }

    public function izmena()
    {

        $sql = "UPDATE " . $this->tabela . " SET broj_pogodjenih = " . $this->broj_pogodjenih . "  WHERE id = " . $this->id;
        if ($this->conn->query($sql)) {
            return true;
        }
        return false;
    }

    public function obrisi()
    {
        $sql = "DELETE FROM " . $this->tabela . " WHERE id = " . $this->id;
        if ($this->conn->query($sql)) {
            return true;
        }
        return false;
    }
}
