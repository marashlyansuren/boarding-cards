# README #

This README would normally document whatever steps are necessary to get your application up and running.

### How do I get set up? ###

* Clone project, this is public repository
    ````
    git clone https://surenDev@bitbucket.org/surenphp/propertyfinder.git
    ````
    
* Go into project folder and run docker commands
    this is php7-apache container
    ````
    cd propertyfinder
    docker-compose build
    docker-compose up
    ````
* Composer install for phpunit and roting lib
    ````
    composer install
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
    use the  post request body:
    
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

* Writing tests
* Code review
* Other guidelines

### Who do I talk to? ###

* Repo owner or admin: marashlyan.suren@gmail.com