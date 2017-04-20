# README #

This README would normally document whatever steps are necessary to get your application up and running.

### How do I get set up? ###

* Clone project, this is public repository
    ````
    git clone https://surenDev@bitbucket.org/surenphp/propertyfinder.git
    ````
* Composer install for phpunit and roting lib
    ````
    cd propertyfinder
    composer install
    ````
* Go into project folder and run docker commands
    this is php7-apache container
    ````
    docker-compose build
    docker-compose up
    ````
    try the url 
    ````
    http://localhost:8081/
    ````
   you should see
   ````
   Your Property Finder Test is working
   ````
* How to run tests
    ````
    ./vendor/bin/phpunit
    ````
* How to test: You can use Postman for http post request
    and load the endpoints from this link
    ````
    https://www.getpostman.com/collections/4d5d660e717ea9b07076
    ````
    In that case when you want to use other type of client
    use the  POST request:
    
    Endpoint: 
    ````
    http://localhost:8081/boarding-cards
    ````
    Request body:
    
    ````
    [
    	{
    		"from" : "Gerona Airport",
    		"to" : "Stockholm",
    		"transport_type" : "flight",
    		"additional_info" : "Gate 45B, seat 3A"
    	},
    	{
    		"from" : "Barcelona",
    		"to" : "Gerona Airport",
    		"transport_type" : "airport_bus",
    		"additional_info" : "No seat assignment"
    	},
    	{
    		"from" : "Madrid",
    		"to" : "Barcelona",
    		"transport_type" : "train",
    		"additional_info" : "Sit in seat 45B"
    	}
    ]
    ````

### Some Descriptions ###

1. I do not write strong controller, wich will validate the input and develop response
2. I do not write so much comments on functions and think that the best comment it is the function by itself ( book: Clean Code )
3. There was no time to write much more unit test but ii is one of my strong side.
4. There was one endpoint and I could not show my strong knowledge from RESTFull API area

### Who do I talk to? ###

* Repo owner or admin: marashlyan.suren@gmail.com