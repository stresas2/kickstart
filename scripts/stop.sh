#!/usr/bin/env bash

# Make us independent from working directory
pushd `dirname $0` > /dev/null
SCRIPT_DIR=`pwd`
popd > /dev/null

# Fixing different user case
export UID=${UID}
export GID=${GID}

# Stop server
echo "Stopping docker containers..."
docker-compose -f "$SCRIPT_DIR/docker-compose.yml" kill