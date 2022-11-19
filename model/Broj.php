<?php

class Broj
{

    private $conn;
    private $tabela = "izabrani_brojevi";

    public $broj;
    public $noviBroj;
    public $izabran_at;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function izabrani()
    {
        $sql = "SELECT * FROM " . $this->tabela;

        $izabrani_brojevi = array();
        $res = $this->conn->query($sql);

        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                array_push($izabrani_brojevi, $row);
            }
        }
        return $izabrani_brojevi;
    }

    public function dodajIliIzmeni()
    {

        if ($this->postoji()) {
            if ($this->broj == $this->noviBroj) return false;
            return $this->izmena();
        } else return $this->dodaj();
    }

    public function postoji()
    {
        $sql = "SELECT * FROM " . $this->tabela . " WHERE id = '" . $this->id . "'";
        if ($result = $this->conn->query($sql)) {

            $broj = $result->fetch_assoc();
            if ($broj) {
                $this->broj = $broj['broj'];
                return true;
            }
            return false;
        }
        return false;
    }

    public function dodaj()
    {
        $sql = "INSERT INTO " . $this->tabela . " (broj) VALUES ('" . $this->noviBroj . "')";
        if ($this->conn->query($sql)) {
            return $this->conn->insert_id;
        }

        return false;
    }

    public function izmena()
    {
        
        $sql = "UPDATE " . $this->tabela . " SET broj = " . $this->noviBroj . "  WHERE id = " . $this->id;
        if ($this->conn->query($sql)) {
            return true;
        }
        return false;
    }
}
