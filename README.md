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

## Linter

This project makes use of <em>Prettier & ESLint</em> to check for problems and keeping code style consistent. There is also a pre-commit hook set up, this makes sure the code is checked for problems and code style before committing.

**For this to work correctly we need to set the correct path for the pre-commit hook.**

```bash
git config core.hooksPath .githooks
```

## GitHub

_New feature example workflow:_

```bash
# Make sure you have to latest version of main.
git pull

# Create new branch
git checkout -b patch-nielslinden-update-readme

# Add your changes
git add .

# Commit your changes
git commit -m "Update `README.md` with GitHub section"
git commit -m "Fix typo `README.md`"

# Before pushing to GitHub always check if your local main branch is still the latest version.
git pull origin main
git merge main

# Push changes to Github
git push

# Creating/merging a pull request
Head over to the Github repository and open a pull request # Check resources; Creating pull requests.
Merge your pull request # You can also delete your branch after merging your pull request

# Switch back to main branch and repeat the previous steps
git switch main
git checkout -b patch-nielslinden-new-feature
```
