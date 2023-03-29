@echo off
REM Iniciar XAMPP
cd C:\xampp
start /B apache_start.bat
start /B mysql_start.bat

REM Iniciar la aplicación web
start cmd /k "cd C:\EndFerrum\FerrumPHP && php artisan serve && php artisan storage:link"


REM Esperar a que se inicie el servidor web
timeout /t 5

REM Abrir el navegador web
start http://localhost:8000
