# Run Stores

Fake Marvel store

This is a fake Marvel Store, here you can find a list of all the Marvel characters and simulate a shopping of its
products

## Instalation

First you need to Config every `env` variables:

### Database

- `DB_DATABASE`
- `DB_USERNAME`
- `DB_PASSWORD`

### Facebook login

- `APP_FB_API_KEY`
- `APP_FB_API_SECRET`

### Google login

- `GOOGLE_API_KEY`
- `GOOGLE_API_SECRET`

### Marvel API

- `MARVEL_PUBLIC_KEY`
- `MARVEL_ACCESS_TOKEN`

We also implement apis from the frontend, so configure frontend `env` vars

`public/js/config.example.js` and rename to `config.js`

- `MARVEL_PUBLIC_KEY`
- `MARVEL_HASH`

#### Prepare npm

`npm install; npm run dev`

#### Prepare composer

`composer install; composer dump`

#### Prepare server and dbs

`php artisan migrate; php artisan serve;`

Finally just go to http://localhost:8000/ and test it by your own!

### Authors:

- Ricardo Rito Anguiano
- Jose Maria Garcia Ramirez
- Oscar Uriel Cuello Juárez
- Wendy Alonso Perez
- Brandon Goiz Bravo

# LICENSE

License [MIT](https://opensource.org/licenses/MIT) LICENSE

# Mercado Pago



