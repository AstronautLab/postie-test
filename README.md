# Specification

This repository is a clean laravel 5.7 installation. 
Fork this repository and submit a PR when complete.

The system needs to:

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

# Extra points 
1. Make the client facing part a Vue SPA using Vue Router (Vuex for extra extra points)
2. Use tailwind css
3. Add integration test for the instagram connection

It doesnt matter how good or bad it looks, there will be no judgement on design at all.
