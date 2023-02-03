
# PHP Laravel URL status code checker

Just a small application that accepts csv upload containing list of urls, then gets the http status codes of those urls, then saves it to database and displays a table of the records.

## Installation
- Clone the repository using `git clone https://github.com/romuwaldo/laravel-url-status-code.git`
- Fill out the `.env` file location at project root using the `.env.example` file as a template
- Install composer dependencies using `composer install` on the project root
- To run the laravel application use `php artisan serve` on the project root

## Usage
Once the project is installed and confirmed running without errors,
- Visit http://localhost:8000 to access the application
- Upload a csv file containing the list of urls. Sample: 
```
http://google.com,
http://facebook.com,
http://youtube.com,
http://google.com/test123,
```
- Hit upload the you will be redirected to the page containing the url's http status code.
