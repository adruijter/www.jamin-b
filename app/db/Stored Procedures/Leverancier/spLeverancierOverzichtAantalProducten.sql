/************************************************
-- Doel: Opvragen van alle verschillende producten
         die de verschillende leverancier leveren.
************************************************
-- Versie: 01
-- Datum:  13-12-2024
-- Auteur: Arjan de Ruijter
-- Details: Alleen de verschillende producten
            die de verschillende leveranciers leveren.
            weergeven
************************************************/

-- Noem de database voor de stored procedure
use `jamin_b`;

-- Verwijder de bestaande stored procedure
DROP PROCEDURE IF EXISTS spLeverancierOverzichtAantalProducten;

DELIMITER //

CREATE PROCEDURE spLeverancierOverzichtAantalProducten
(
)
BEGIN

    SELECT       LEVE.Id                             AS      LeverancierId
                ,LEVE.Naam                           AS      Naam
                ,LEVE.Contactpersoon                 AS      Contactpersoon
                ,LEVE.LeverancierNummer              AS      LeverancierNummer
                ,LEVE.Mobiel                         AS      Mobiel 
                ,COUNT(DISTINCT PPLE.ProductId)      AS      AantalProducten              

    FROM        Leverancier AS LEVE

    LEFT JOIN   ProductPerLeverancier AS PPLE
           ON   LEVE.Id = PPLE.LeverancierId

    GROUP BY    LEVE.Id

    ORDER BY    AantalProducten DESC;

END //
DELIMITER ;

/**********debug code stored procedure***************
CALL spLeverancierOverzichtAantalProducten();
****************************************************/

