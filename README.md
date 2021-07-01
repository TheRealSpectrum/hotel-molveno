## Setup

```
# replace sail with ./vendor/bin/sail if you do not have an alias set up.
sail composer install
sail npm install
sail up -d
sail artisan key:generate
sail artisan migrate:

# linter
git config core.hooksPath .githooks
```
