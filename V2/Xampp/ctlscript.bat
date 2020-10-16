@echo off
rem START or STOP Services
rem ----------------------------------
rem Check if argument is STOP or START

if not ""%1"" == ""START"" goto stop

if exist C:\IT1100-IWT---Assignment-01\V2\Xampp\hypersonic\scripts\ctl.bat (start /MIN /B C:\IT1100-IWT---Assignment-01\V2\Xampp\server\hsql-sample-database\scripts\ctl.bat START)
if exist C:\IT1100-IWT---Assignment-01\V2\Xampp\ingres\scripts\ctl.bat (start /MIN /B C:\IT1100-IWT---Assignment-01\V2\Xampp\ingres\scripts\ctl.bat START)
if exist C:\IT1100-IWT---Assignment-01\V2\Xampp\mysql\scripts\ctl.bat (start /MIN /B C:\IT1100-IWT---Assignment-01\V2\Xampp\mysql\scripts\ctl.bat START)
if exist C:\IT1100-IWT---Assignment-01\V2\Xampp\postgresql\scripts\ctl.bat (start /MIN /B C:\IT1100-IWT---Assignment-01\V2\Xampp\postgresql\scripts\ctl.bat START)
if exist C:\IT1100-IWT---Assignment-01\V2\Xampp\apache\scripts\ctl.bat (start /MIN /B C:\IT1100-IWT---Assignment-01\V2\Xampp\apache\scripts\ctl.bat START)
if exist C:\IT1100-IWT---Assignment-01\V2\Xampp\openoffice\scripts\ctl.bat (start /MIN /B C:\IT1100-IWT---Assignment-01\V2\Xampp\openoffice\scripts\ctl.bat START)
if exist C:\IT1100-IWT---Assignment-01\V2\Xampp\apache-tomcat\scripts\ctl.bat (start /MIN /B C:\IT1100-IWT---Assignment-01\V2\Xampp\apache-tomcat\scripts\ctl.bat START)
if exist C:\IT1100-IWT---Assignment-01\V2\Xampp\resin\scripts\ctl.bat (start /MIN /B C:\IT1100-IWT---Assignment-01\V2\Xampp\resin\scripts\ctl.bat START)
if exist C:\IT1100-IWT---Assignment-01\V2\Xampp\jetty\scripts\ctl.bat (start /MIN /B C:\IT1100-IWT---Assignment-01\V2\Xampp\jetty\scripts\ctl.bat START)
if exist C:\IT1100-IWT---Assignment-01\V2\Xampp\subversion\scripts\ctl.bat (start /MIN /B C:\IT1100-IWT---Assignment-01\V2\Xampp\subversion\scripts\ctl.bat START)
rem RUBY_APPLICATION_START
if exist C:\IT1100-IWT---Assignment-01\V2\Xampp\lucene\scripts\ctl.bat (start /MIN /B C:\IT1100-IWT---Assignment-01\V2\Xampp\lucene\scripts\ctl.bat START)
if exist C:\IT1100-IWT---Assignment-01\V2\Xampp\third_application\scripts\ctl.bat (start /MIN /B C:\IT1100-IWT---Assignment-01\V2\Xampp\third_application\scripts\ctl.bat START)
goto end

:stop
echo "Stopping services ..."
if exist C:\IT1100-IWT---Assignment-01\V2\Xampp\third_application\scripts\ctl.bat (start /MIN /B C:\IT1100-IWT---Assignment-01\V2\Xampp\third_application\scripts\ctl.bat STOP)
if exist C:\IT1100-IWT---Assignment-01\V2\Xampp\lucene\scripts\ctl.bat (start /MIN /B C:\IT1100-IWT---Assignment-01\V2\Xampp\lucene\scripts\ctl.bat STOP)
rem RUBY_APPLICATION_STOP
if exist C:\IT1100-IWT---Assignment-01\V2\Xampp\subversion\scripts\ctl.bat (start /MIN /B C:\IT1100-IWT---Assignment-01\V2\Xampp\subversion\scripts\ctl.bat STOP)
if exist C:\IT1100-IWT---Assignment-01\V2\Xampp\jetty\scripts\ctl.bat (start /MIN /B C:\IT1100-IWT---Assignment-01\V2\Xampp\jetty\scripts\ctl.bat STOP)
if exist C:\IT1100-IWT---Assignment-01\V2\Xampp\hypersonic\scripts\ctl.bat (start /MIN /B C:\IT1100-IWT---Assignment-01\V2\Xampp\server\hsql-sample-database\scripts\ctl.bat STOP)
if exist C:\IT1100-IWT---Assignment-01\V2\Xampp\resin\scripts\ctl.bat (start /MIN /B C:\IT1100-IWT---Assignment-01\V2\Xampp\resin\scripts\ctl.bat STOP)
if exist C:\IT1100-IWT---Assignment-01\V2\Xampp\apache-tomcat\scripts\ctl.bat (start /MIN /B /WAIT C:\IT1100-IWT---Assignment-01\V2\Xampp\apache-tomcat\scripts\ctl.bat STOP)
if exist C:\IT1100-IWT---Assignment-01\V2\Xampp\openoffice\scripts\ctl.bat (start /MIN /B C:\IT1100-IWT---Assignment-01\V2\Xampp\openoffice\scripts\ctl.bat STOP)
if exist C:\IT1100-IWT---Assignment-01\V2\Xampp\apache\scripts\ctl.bat (start /MIN /B C:\IT1100-IWT---Assignment-01\V2\Xampp\apache\scripts\ctl.bat STOP)
if exist C:\IT1100-IWT---Assignment-01\V2\Xampp\ingres\scripts\ctl.bat (start /MIN /B C:\IT1100-IWT---Assignment-01\V2\Xampp\ingres\scripts\ctl.bat STOP)
if exist C:\IT1100-IWT---Assignment-01\V2\Xampp\mysql\scripts\ctl.bat (start /MIN /B C:\IT1100-IWT---Assignment-01\V2\Xampp\mysql\scripts\ctl.bat STOP)
if exist C:\IT1100-IWT---Assignment-01\V2\Xampp\postgresql\scripts\ctl.bat (start /MIN /B C:\IT1100-IWT---Assignment-01\V2\Xampp\postgresql\scripts\ctl.bat STOP)

:end

