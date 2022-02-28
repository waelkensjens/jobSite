## Jobsite test

This is a small test to show my coding skill

Maak een mini website waarbij vacatures getoond worden en beheerbaar zijn.
Visualisatie is niet belangrijk.

Frontend:
- Pagina met lijst van vacatures: titel vacature, omschrijving, bedrijf, stad, type (arbeider/bediende)
- Pagina met details van een vacature, het bedrijf en stad

Backend:
- beheer vacatures
- beheer bedrijven
- beheer steden

Maak gebruik van:
- Laravel framework
- Composer


## installation


> git clone https://github.com/waelkensjens/jobSite.git

> composer install

> npm install && npm run dev 

> npx mix 

> php artisan migrate --seed 

> cp .env.example .env

> php artisan key:generate

this will create:

- user admin@admin.com => password
- 5 jobs divided over 2 companies
- 2 companies
- 2 Types

if wanted u can import all belgian cities

> php artisan cities:import 


then:

> php artisan serve 

> yarn watch 


## Pages
/ => joblistings

/{jobId}/ => jobDetail

/admin => admin side
## Time spent

18hours mostly frontend since vue skills aren't that great

## Own Thoughts

I really enjoyed creating this but noticed my frontend skills aren't that
great yet. First time doing both complete and had some troubles with
creating components, so I implemented ping crm to get layout files 
