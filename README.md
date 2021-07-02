# Setup

## Step 1.

```js
// Replace sail with ./vendor/bin/sail if you do not have an alias set up.
composer install
sail up -d
sail npm install
```

## Step 2.

```js
copy/paste .env.example and rename it to .env
set DB_HOST=mysql in .env
`localhost:8080` and make a new database hotel_molveno
sail artisan key:generate
sail artisan migrate:fresh --seed
```

## Step 3.

```js
// This will set the correct path for the pre-commit hook.
git config core.hooksPath .githooks
```
