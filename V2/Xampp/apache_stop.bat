@echo off
cd /D %~dp0
cmd.exe /C start "" /MIN call "C:\Users\Administrator\Documents\IT1100-IWT---Assignment-01\V2\Xampp\killprocess.bat" "httpd.exe"
if not exist apache\logs\httpd.pid GOTO exit
del apache\logs\httpd.pid

:exit
