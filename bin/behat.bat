@ECHO OFF
SET BIN_TARGET=%~dp0/../vendor/behat/behat/bin/behat
REM ECHO "%BIN_TARGET%" %*
REM php "%BIN_TARGET%" %*
ansicon php "%BIN_TARGET%" %*
REM "C:\wamp\www\PHP\LIBRAIRIES\PHPUnit\tests\bin\/../vendor/behat/behat/bin/behat" --init