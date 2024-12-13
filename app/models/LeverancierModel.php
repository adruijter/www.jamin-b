<?php

class LeverancierModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getLeveranciersWithProducts()
    {
        try {
            $sql = "CALL spLeverancierOverzichtAantalProducten()";

            $this->db->query($sql);

            return $this->db->resultSet();
            
        } catch (Exception $e) {
            /**
             * Log de error in de functie logger()
             */
            logger(__LINE__, __METHOD__, __FILE__, $e->getMessage());            
        }
        
    }
}