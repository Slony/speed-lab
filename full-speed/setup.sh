#!/bin/bash

npm install

node_modules/grunt/bin/grunt compass sprite responsive_images \
  concat uglify critical-css
