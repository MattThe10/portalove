<?php

class database {

    private $server;
    private $db;
    private $meno;
    private $heslo;
    private $connection;

    public function __construct($server, $db, $meno, $heslo){
        $this->server = $server;
        $this->db = $db;
        $this->meno = $meno;
        $this->heslo = $heslo;

        try {
            $this->connection = new \PDO('mysql:host='.$this->server.';dbname='.$this->db, $this->meno, $this->heslo);
        } catch(\PDOException $e) {
            print 'Error!: ' . $e -> getMessage();
            die();
        }
    }


    public function vlozSpravu($meno,$priezvisko, $predmet, $sprava)
    {
        $sql_prikaz = "INSERT INTO kontakt(meno, priezvisko, predmet, sprava) 
                VALUE ('".$meno."', '".$priezvisko."', '".$predmet."', '".$sprava."')";
        try {
            $this->connection->exec($sql_prikaz);
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function vypisSpravy()
    {
        $messages = [];
        $sql_prikaz = "SELECT * FROM kontakt";

        $query = $this->connection->query($sql_prikaz);

        while ($row = $query->fetch()) {
            $messages[] = [
                'id' => $row['id'],
                'meno' => $row['meno'],
                'priezvisko' => $row['priezvisko'],
                'predmet' => $row['predmet'],
                'sprava' => $row['sprava']
            ];
        }

        return $messages;
    }

    public function vymazSpravu($id)
{
    $sql_prikaz = "DELETE FROM kontakt WHERE id = ".$id;

    try {
        $this->connection->exec($sql_prikaz);
        return true;
    } catch (\PDOException $e) {
        return false;
    }
}

    public function aktualizujSpravu($id, $meno, $priezvisko, $predmet, $sprava)
    {
        $sql_prikaz= "UPDATE kontakt 
                SET meno = '".$meno."', priezvisko = '".$priezvisko."', predmet = '".$predmet."', sprava = '".$sprava."' 
                WHERE id = ".$id;

        try {
            $this->connection->exec($sql_prikaz);
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function spravyInfo($id)
    {
        $sql_prikaz = "SELECT * FROM kontakt WHERE id = " . $id;
        $result = [];

        try {
            $query = $this->connection->query($sql_prikaz);
            $result = $query->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $e) {
            return $result;
        }

    }


}

?>