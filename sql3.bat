@echo off

:: Aanroepen van de functie met een argument (naam)
call :sayHello "3"

:: Einde van het hoofdprogramma
echo Het programma is afgelopen.
pause
exit /b

:sayHello
:: Functie: Deze functie ontvangt een naam als argument
set NAME=%1
echo Hallo %NAME%!
goto :eof


@echo off

:: Aanroepen van de functie met twee getallen als argumenten
call :optellen 5 7

:: Einde van het hoofdprogramma
echo Het programma is afgelopen.
pause
exit /b

:: Functie: optellen
:optellen
:: Ontvang de twee getallen als argumenten
set /a result=%1 + %2
echo Het resultaat van %1 + %2 is %result%
goto :eof


