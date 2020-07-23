# Manager Module Zend3
> Create and delete module zend3.

[![NPM Version][npm-image]][npm-url]
[![Build Status][travis-image]][travis-url]
[![Downloads Stats][npm-downloads]][npm-url]

## Installation

```sh
composer require fxt-solutions/manager-module-z3

ln -s vendor/fxt-solutions/manager-module-z3/fxt.php fxt
```

## On first use

### Set directory default create module:
```sh
php fxt module:path [path]
```

## Basic commands:

### Create module
```sh
php fxt module:create [NameModule]
```
### Delete module
```sh
php fxt module:delete [NameModule]
```

## Release History

* 0.2.1
    * CHANGE: Update docs (module code remains unchanged)
* 0.2.0
    * CHANGE: Remove `setDefaultXYZ()`
    * ADD: Add `init()`
* 0.1.1
    * FIX: Crash when calling `baz()` (Thanks @GenerousContributorName!)
* 0.1.0
    * The first proper release
    * CHANGE: Rename `foo()` to `bar()`
* 0.0.1
    * Work in progress

## Meta

Tiago Martins – tiagomartins7@gmail.com

[https://fxtsolutions.com.br](https://fxtsolutions.com.br)

## Contributing

1. Fork it (<https://github.com/FXTSolutions/ManagerModuleZ3/fork>)
2. Create your feature branch (`git checkout -b feature/fooBar`)
3. Commit your changes (`git commit -am 'Add some fooBar'`)
4. Push to the branch (`git push origin feature/fooBar`)
5. Create a new Pull Request

<!-- Markdown link & img dfn's -->
[npm-image]: https://img.shields.io/npm/v/datadog-metrics.svg?style=flat-square
[npm-url]: https://npmjs.org/package/datadog-metrics
[npm-downloads]: https://img.shields.io/npm/dm/datadog-metrics.svg?style=flat-square
[travis-image]: https://img.shields.io/travis/dbader/node-datadog-metrics/master.svg?style=flat-square
[travis-url]: https://travis-ci.org/dbader/node-datadog-metrics
[wiki]: https://github.com/yourname/yourproject/wiki
