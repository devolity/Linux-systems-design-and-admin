#!/bin/bash

echo "ls -l /etc" > run_me_please
echo "echo hello world" >> run_me_please

source run_me_please

rm run_me_please

