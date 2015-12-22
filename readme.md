# String Parser

This is a Composer package boilerplate

    Copyright 2015 Mark Roland.
    Released under the MIT license.


## Installation

```sh
    composer require markroland/string-parser
```

## Usage

The "examples" folder in this package contains sample code.

## Build

### Build using Phing

```sh
    phing
```

```sh
    phing phpdoc
```

```sh
    phing phpcs
```

### PHPUnit

```sh
    phpunit --bootstrap tests/bootstrap.php tests
```

### Code Coverage

```sh
    phpunit --coverage-html ./report ./tests
```

### PHP Documentation

PHP Documentation is compiled using [phpDocumentor](http://www.phpdoc.org), which is assumed
to be installed globally on the server. It uses phpdoc.dist.xml for runtime configuration.

```sh
    phpdoc
```

### Code Sniff

```sh
    phpcs -n --report-width=100 ./src
```
