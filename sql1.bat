@echo off
:: Variabelen instellen
set MYSQL_USER=root
set MYSQL_HOST=localhost
set MYSQL_DB=Achtbaan-2408a

:: Functie om SQL-bestanden uit te voeren
:execute_sql_files
set "SQL_FILES_PATH=%~1"
echo Uitvoeren van SQL-bestanden in %SQL_FILES_PATH%...
for %%f in ("%SQL_FILES_PATH%\*.sql") do (
    echo Bezig met uitvoeren van %%f...
    mysql -h %MYSQL_HOST% -u %MYSQL_USER% %MYSQL_DB% < %%f
    if errorlevel 1 (
        echo FOUT: Het script %%f kon niet worden uitgevoerd!
        exit /b 1
    )
)
echo Alle scripts in %SQL_FILES_PATH% succesvol uitgevoerd!
goto :eof

:: Create-scripts uitvoeren
call :execute_sql_files "C:\projects2024\Jamin_B\app\db"

:: Stored Procedures uitvoeren
call :execute_sql_files "C:\projects2024\Jamin_B\app\db\Stored Procedures\Magazijn"
