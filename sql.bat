@echo off
:: Variabelen instellen
set MYSQL_USER=root
set MYSQL_HOST=localhost
set MYSQL_DB=Achtbaan-2408a

:: Locatie van SQL-bestand createscript
set SQL_FILES_PATH_SP=C:\projects2024\Jamin_B\app\db

:: Inloggen op MySQL en SQL-bestanden uitvoeren
for %%f in ("%SQL_FILES_PATH_SP%\*.sql") do (
    echo Bezig met uitvoeren van %%f...
    mysql -h %MYSQL_HOST% -u %MYSQL_USER%  %MYSQL_DB% < %%f
    if errorlevel 1 (
        echo FOUT: Het script %%f kon niet worden uitgevoerd!
        exit /b 1
    )
)


echo Alle create-scripts succesvol uitgevoerd!

:: Locatie van SQL-SP-bestanden
set SQL_FILES_PATH_SP=C:\projects2024\Jamin_B\app\db\Stored Procedures\Magazijn

:: Inloggen op MySQL en SQL-bestanden uitvoeren
for %%f in ("%SQL_FILES_PATH_SP%\*.sql") do (
    echo Bezig met uitvoeren van %%f...
    mysql -h %MYSQL_HOST% -u %MYSQL_USER%  %MYSQL_DB% < %%f
    if errorlevel 1 (
        echo FOUT: Het script %%f kon niet worden uitgevoerd!
        exit /b 1
    )
)
echo Alle SP-scripts succesvol uitgevoerd!
