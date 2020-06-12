# RESTful-API-Catalog_Product

Hello this is my project alternative of solving this problem.

I've used Php, Phpmyadmin, and Postman to read the requests and post them in Json.

The 'php_project_catalog' folder it is the first alternative which have the Task1.

The next folder, 'php_project_catalog_update' contain all the project.
For protection i've used JWT.

I have attached the datebase also, 'catalog_product'

This project can create a product or a category for this catalog.There are PUT requestes,
for interogate the table from sql i used GET requestes, in read and read_single(for just one product or category, by id).
I can update data from a product or a category.

For users I made a request how can create a user then view the informations about it and for login I've use a jwt method to protect the informations. 

At the part of rate limit, I made a counter of 3 requests and a time of 30 seconds in case of error.

Because it is the first time I worked with api I don't know how to do the rate limit part, but I attached also a version with a version with html and php form.
