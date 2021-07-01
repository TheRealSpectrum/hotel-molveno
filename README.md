# Setup

## Step 1.
```js
// Replace sail with ./vendor/bin/sail if you do not have an alias set up.
sail composer install
sail up -d
sail npm install
```

## Step 2.

```js
change .env.example to .env
set DB_HOST=mysql
`localhost:8080` and make a new database hotel_molveno
sail artisan key:generate
sail artisan migrate:fresh --seed
```

## Step 3.

```js
// This will set the correct path for the pre-commit hook.
git config core.hooksPath .githooks
```




