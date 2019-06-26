@echo off
ECHO Yet Another Git (YAG) V0.1 - Cloud Computing Project - By Amar Prabhu and Aditya Shenoy Y
ECHO Type "help","something" or "someother thing" for more information. 
TITLE ADI SHARE
ECHO.
IF "%1"=="login" (
    python %~dp0\codeshare\login.py %*
) ELSE IF "%1"=="logout" (
    python %~dp0\codeshare\logout.py %*
) ELSE IF "%1"=="init" (
    python %~dp0\codeshare\init.py %*
) ELSE IF "%1"=="status" (
    python %~dp0\codeshare\status.py %*
) ELSE IF "%1"=="commit" (
    python %~dp0\codeshare\commit.py %*
) ELSE IF "%1"=="push" (
    python %~dp0\codeshare\push.py %*
) ELSE IF "%1"=="share" (
    python %~dp0\codeshare\share.py %*
) ELSE IF "%1"=="pull" (
    python %~dp0\codeshare\pull.py %*
) ELSE IF "%1"=="" (
    ECHO this is some text
) ELSE (
    ECHO Invalid Command Entered. Type "help" to know more.
)
