# Postie Test


##Local Deploy

 - Install Docker
 - create `.env` file, you can just rename `.env.example` to `.env`
 - run `docker-composer up -d`
 - run `docker-compose exec php-fpm sh -c 'composer install'`
 - run `docker-compose exec php-fpm sh -c 'php artisan migrate'` to populate DB
 

##Working with Instagram
According to the https://www.instagram.com/developer/changelog/
Only personal media is available now(for access token). To pull data from Instagram you have you to get your access 
token and pass as param to command:
 - `docker-compose exec php-fpm sh -c 'php artisan pull:instagram {token}'`
 
##Working with SPA
 - run `npm install`
 - run `npm run dev`
 
 Then open `http://localhost` and you will see users and etc.


## About Postie Test

As you have noticed in project we have Service layer that is responsible for business logic. If I have more time I 
would add some kind of Manager/Repository layer that is for working with DB data.

Having such layers allows us to have clear and flexible code. All code can be tested properly and independently.

For API routes Swagger ca be added

Haven't got enough time to write tests and polish everything! So it doesn't look perfect IMHO :)