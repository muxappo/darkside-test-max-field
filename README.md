# Darkside Developments Technical Test - Max Field

Based on the provided brief, this is a simple dashboard allowing for the creation and storage of customer information in a SQLite database, including a visualisation of created data in the form of a table, built with PHP/Laravel and styled with TailwindCSS on Vue.js.


## Run Locally

Clone the project

```bash
git clone https://github.com/muxappo/darkside-test-max-field.git
```

Go to the project directory

```bash
cd [project directory]
```

Install dependencies

```bash
composer install
```

Create and configure .env file
```bash
cp .env.example .env
```
(I recommend using SQLite)

Build database

```bash
php artisan migrate
```

Start dev server

```bash
npm run dev
php artisan serve
```
