<?php

class MagazijnModel
{
    private $db;

    public function __construct()
    {
        /**
         * Maak een nieuw database object die verbinding maakt met de 
         * MySQL server
         */
        $this->db = new Database();
    }

    public function readMagazijnProduct()
    {
        $sql = 'CALL spReadMagazijnProduct()';

        $this->db->query($sql);

        return $this->db->resultSet();
    }
}