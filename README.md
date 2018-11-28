![GitHub](https://img.shields.io/github/license/mashape/apistatus.svg)

[![Build Status](https://travis-ci.org/udovicic/magento-static-test.svg?branch=master)](https://travis-ci.org/udovicic/magento-static-test)

## What is this?

A Docker image that utilizes a phpcs to evaluate coding standards on code.

## How to use this image

Basic usage.

```bash
docker run --rm \
    --volume /local/path:/project \
    udovicic/magentost[:tag] [<options>]
```

For example, to check `src` directory against the lMEQP2 coding standard.

```bash
docker run --rm \
    --volume `pwd`:/project \
    udovicic/magentost --standard=lMEQP2 src
```

A personal recommendation is to add following to your set of aliases:

```bash
alias lmeqp1='docker run --rm --volume `pwd`:/project udovicic/magentost --standard=lMEQP1'
alias lmeqp2='docker run --rm --volume `pwd`:/project udovicic/magentost --standard=lMEQP2'
```

In that case, you can simply use this as:

```bash
$ lemqp1 <path_to_source> # For Magento 1
$ lemqp3 <path_to_source> # For Magento 2
```


## Volumes

* `/project`: Your PHP project directory.
