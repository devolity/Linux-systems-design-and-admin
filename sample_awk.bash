#!/bin/bash

awk '{print "ls -l " $1; }' $1 > run_me_please

source run_me_please

rm run_me_please
