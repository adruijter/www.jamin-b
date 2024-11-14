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

    public function getAllMagazijnProducts()
    {
        try {
            $sql = "CALL spReadMagazijnProduct()";

            $this->db->query($sql);

            return $this->db->resultSet();

        } catch (Exception $e) {
            /**
             * Log de error in de functie logger()
             */
            logger(__LINE__, __METHOD__, __FILE__, $e->getMessage());            
        }
    }

    public function getProductPerLeverancierById($ProductId)
    {
        
        try {
            $sql = "CALL spReadProductPerLeverancierById(:productId)";

            $this->db->query($sql);

            $this->db->bind(':productId', $ProductId, PDO::PARAM_INT);

            return $this->db->resultSet();

        } catch (Exception $e) {
            echo "Fout";exit();
            /**
             * Log de error in de functie logger()
             */
            logger(__LINE__, __METHOD__, __FILE__, $e->getMessage());   
        }
    }
}