#!/bin/bash

SCRIPT_DIR=$(dirname $(readlink -f $0))
SERVER_CONTROL_DIR=$SCRIPT_DIR/../site/servercontrol

$SERVER_CONTROL_DIR/process_flag.sh
$SERVER_CONTROL_DIR/monitor_flag.sh &
