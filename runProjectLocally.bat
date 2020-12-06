@echo off
IF "%~1" == "" (php artisan serve) ELSE (php artisan serve --host=%1)

