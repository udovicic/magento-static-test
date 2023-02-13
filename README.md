![License: GPL v2](https://img.shields.io/badge/License-GPL%20v2-blue.svg)

[![Build Status](https://travis-ci.com/udovicic/magento-static-test.svg?branch=master)](https://travis-ci.com/udovicic/magento-static-test)

## What is this?

A Docker image that utilizes a phpcs to evaluate coding standards on code.

Based on:
* [Magento coding standard 31](https://github.com/magento/magento-coding-standard)
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
    udovicic/magentost:latest --standard=mcga --extensions=js,php,phtml src
```

A personal recommendation is to add following to your set of aliases:

```bash
alias mcga='docker run --rm --volume `pwd`:/project udovicic/magentost:latest --standard=mcga --extensions=js,php,phtml'
alias mcga-fix='docker run --rm --entrypoint "phpcbf" --volume `pwd`:/project udovicic/magentost:latest --standard=mcga --extensions=js,php,phtml'
```

In that case, you can simply use this as:

```bash
$ mcga <path_to_source>
```

And to fix what can be automaticall done:
```bash
$ mcga-fix <path_to_source>
```


## Volumes

* `/project`: Your PHP project directory.
