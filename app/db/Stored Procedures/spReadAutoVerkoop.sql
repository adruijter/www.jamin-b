/************************************************
-- Doel: Opvragen alle records uit de tabel
--       Auto en Verkoop.
************************************************
-- Versie: 01
-- Datum:  25-09-2024
-- Auteur: Arjan de Ruijter
-- Details: Stored procedure voor index model method
************************************************/

-- Noem de database voor de stored procedure
use `jamin_b`;

-- Verwijder de bestaande stored procedure
DROP PROCEDURE IF EXISTS spAutoVerkoop;

DELIMITER //

CREATE PROCEDURE spAutoVerkoop()
BEGIN

    SELECT      Auto.Id                 AS AutoId
               ,Auto.Merk               AS Merk
               ,Auto.Type               AS Type
               ,VERK.Id                 AS VerkoopId
               ,VERK.AutoId             AS VerkoopAutoId
               ,VERK.AantalVerkocht     AS AantalVerkocht
               ,VERK.Prijs              AS Prijs

    FROM       Auto AS AUTO 

    INNER JOIN Verkoop AS VERK
            ON VERK.AutoId = Auto.Id

    ORDER BY Auto.Id; 

END //
DELIMITER ;

/**********debug code stored procedure***************
CALL spAutoVerkoop();
****************************************************/

