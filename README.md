![License: GPL v2](https://img.shields.io/badge/License-GPL%20v2-blue.svg)

[![Build Status](https://travis-ci.org/udovicic/magento-static-test.svg?branch=master)](https://travis-ci.org/udovicic/magento-static-test)

## What is this?

A Docker image that utilizes a phpcs to evaluate coding standards on code.

Based on:
* [Magento coding standard 2.0.0](https://github.com/magento/magento-coding-standard)
* [Magento EQP 2.0.1](https://github.com/magento/marketplace-eqp)
* [Variable Analysis](https://github.com/sirbrillig/phpcs-variable-analysis)

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
    udovicic/magentost --standard=mcga src
```

A personal recommendation is to add following to your set of aliases:

```bash
alias lmeqp1='docker run --rm --volume `pwd`:/project udovicic/magentost --standard=lMEQP1'
alias lmeqp2='docker run --rm --volume `pwd`:/project udovicic/magentost --standard=lMEQP2'
alias magento2='docker run --rm --volume `pwd`:/project udovicic/magentost --standard=Magento2'
alias mcga='docker run --rm --volume `pwd`:/project udovicic/magentost --standard=mcga'

```

In that case, you can simply use this as:

```bash
$ mcga <path_to_source>
```


## Volumes

* `/project`: Your PHP project directory.
