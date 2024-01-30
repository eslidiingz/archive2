#!/bin/sh
yarn
yarn build
yarn export

echo "Export successful! (Folder: out/*)"