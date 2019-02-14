# Specification

This repository is a clean laravel 5.7 installation. 
Clone this repository and submit a PR.

The system needs to:

1. From a command line be able to run php artisan instagram:pull <username>
2. Get a maxiumum of 6 images only ranked in order where 1 like = 1 point, 1 comment = 5 points
3. Crop the images to be 600x600 pixels without any image distortion
4. Store the images locally and also add them into a database with the data required
5. Access a list of all usernames with total points for all images at /
6. Access the images by visiting /{username}
7. Access a single image by visiting /{username}/id
8. Single page must have the image, link to instagram post, total points
9. On the single page screen have an email field to have that image with the total points sent in an email.

# Extra points 
1. Make the client facing part a Vue SPA using Vue Router (Vuex for extra extra points)
2. Use tailwind css
3. Add integration test for the instagram connection

It doesnt matter how good or bad it looks, there will be no judgement on design at all.
