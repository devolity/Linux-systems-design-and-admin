#!/bin/bash

awk '{ if(substr($5,0,6)  == "named") { if($6 == "client") { num_client++; } } print num_client;}' /var/log/daemon.log | tail -1

awk 'BEGIN{ num_client = 0; } { if(substr($5,0,6)  == "named") { if($6 == "client") { num_client++; } } } END{print num_client;}' /var/log/daemon.log
