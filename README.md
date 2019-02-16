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


1. Setup a developers sandbox on instagram, add the following user to the sandbox: https://instagram.com/developers (matt_trimma & (astronaut3950)
2. email matt@astronautlab.co the Credntials for connecting to the api
3. Create oauth screens to connet to instagram api
4. Get a maxiumum of 6 images only ranked in order where 1 like = 1 point, 1 comment = 5 points
5. Crop the images to be 600x600 pixels without any image distortion
6. Store the images locally and also add them into a database with the data required
7. Access a list of all usernames with total points for all images at /
8. Access the images by visiting /{username}
9. Access a single image by visiting /{username}/id
10. Single page must have the image, link to instagram post, total points
11. On the single page screen have an email field to have that image with the total points sent in an email.

## About Postie Test

As you have noticed in project we have Service layer that is responsible for business logic. If I have more time I 
would add some kind of Manager/Repository layer that is for working with DB data.

Having such layers allows us to have clear and flexible code. All code can be tested properly and independently.

For API routes Swagger ca be added

Haven't got enough time to write tests and polish everything! So it doesn't look perfect IMHO :)