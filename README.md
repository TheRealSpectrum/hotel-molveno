# Hotel Molveno Resort

## Setup

<span style="color:grey">Replace <em>sail</em> with <em>./vendor/bin/sail</em> if you do not have an alias set up.</span> _[Or read this guide for more info on how to set up an alias.](https://linuxize.com/post/how-to-create-bash-aliases/ "I highly recommend setting up an alias")_

```bash
composer install
sail up -d
sail npm install
copy/paste .env.example and rename it to .env
set DB_HOST=mysql in .env
`localhost:8080` and make a new database hotel_molveno
sail artisan key:generate
sail artisan migrate:fresh --seed
```
