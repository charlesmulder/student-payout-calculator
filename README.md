[![Build Status](https://travis-ci.com/charlesmulder/student-payout-calculator.svg?token=1Tzw8t7hAJYswucSUiKm&branch=master)](https://travis-ci.com/charlesmulder/student-payout-calculator)

# Student payout calculator

## Docker

Calculate payout per student

```sh
docker run --rm -ti --volume $PWD:/app composer run-script calc
```

Run tests

```
docker run --rm -ti --volume $PWD:/app composer run-script test
```

## Local

Install deps

```sh
composer install
```

Calculate payout per student

```sh
composer calc
```

Run unit tests

```sh
composer test
```

Run linter

```sh
composer lint
```

Run security check

```sh
composer security
```

## Documentation

Generate documentation

```sh
phpdoc -d ./lib -t ./docs
```

Serve documentation

```sh
php -S localhost:8000 -t docs
```

