#!/bin/bash

VERSION=0.1
TMPDIR=/tmp/google-api-php-client
RELFILE=/tmp/google-api-php-client-${VERSION}.tar.gz

rm -f $RELFILE
rm -rf $TMPDIR
mkdir $TMPDIR
cp -r * $TMPDIR
cd $TMPDIR
find . -name ".*" -exec rm -rf {} \; &>/dev/null
cd ..
tar c google-api-php-client | gzip > $RELFILE
rm -rf $TMPDIR
