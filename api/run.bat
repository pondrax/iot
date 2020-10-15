
@echo off
setlocal enabledelayedexpansion

:loop

REM  curl -X POST "http://localhost/iot/api/"
curl -d "iddevice=cedbba1a-0eb9-11eb-9779-98eecb5efc46" "http://localhost/iot/api/"
curl -d "iddevice=bbbbba1a-0eb9-11eb-9779-98eecb5efc46" "http://localhost/iot/api/"
curl -d "iddevice=aaabba1a-0eb9-11eb-9779-98eecb5efc46" "http://localhost/iot/api/"

goto loop
