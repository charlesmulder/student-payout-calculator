![Test Status](https://github.com/charlesmulder/student-payout-calculator/actions/workflows/ci.yml/badge.svg)

# Student payout calculator

## Assumptions

- Input data is well formatted and complete with no gaps. 
- Fuel allowance forms part of travel allowance. No travel allowance means no fuel allowance.  
- Travel allowance calculation includes both directions. To work from home and back home from work. 
- Distance calculation in kilometers is rounded to 2 decimal points.
- 5km travel allowance threshold is for one way.
- Financial calculations are done in cents due to limited precision of floating point numbers. Final result is converted to Euros for display.

## Quickstart

### Docker

Calculate payout per student

```sh
docker run --rm -ti --volume $PWD:/app composer run-script calc
```

Run tests

```
docker run --rm -ti --volume $PWD:/app composer run-script test
```

### Local

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

