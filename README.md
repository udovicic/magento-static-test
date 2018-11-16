![GitHub](https://img.shields.io/github/license/mashape/apistatus.svg)

[![Build Status](https://travis-ci.org/udovicic/magento-static-test.svg?branch=master)](https://travis-ci.org/udovicic/magento-static-test)

## What is this?

A Docker image that utilizes a phpcs to evaluate coding standards on code.

## How to use this image

Basic usage.

```sh
docker run --rm \
    --volume /local/path:/project \
    udovicic/magentost[:tag] [<options>]
```

For example, to check `src` directory against the lMEQP2 coding standard.

```sh
docker run --rm \
    --volume `pwd`:/project \
    udovicic/magentost --standard=lMEQP2 src
```

## Volumes

* `/project`: Your PHP project directory.
