#!/bin/bash

# Update package lists
apt-get update

# Install the required libraries
apt-get install -y libssl1.0.0 libssl-dev

# Clean up
apt-get clean
