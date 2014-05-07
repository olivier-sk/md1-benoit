@ECHO OFF
SET BIN_TARGET=%~dp0/../phpunit/phpunit/phpunit
REM echo "%BIN_TARGET%" %*
ansicon.exe php "%BIN_TARGET%" %*
