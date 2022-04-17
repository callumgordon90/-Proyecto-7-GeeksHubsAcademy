#  Project 7 Geekshubs Academy: Back-end written with PHP and Laravel  

<div align="center">
    <img alt="PHP Version" src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white">
    <img alt="Laravel Version" src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white">
    <img alt="JWT Version" src="https://img.shields.io/badge/JWT-000000?style=for-the-badge&logo=JSON%20web%20tokens&logoColor=white">
    <img alt="MySQL Version" src="https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white">
</div>

***

## Click [here ](https://github.com/callumgordon90/Proyecto-7-GeeksHubsAcademy) to see the repository for this project in my Github

***
# Summary of the project:

For this project we were tasked with creating a full functioning backend (Rest API with full CRUD functionality, connecting to a database).

The technologies used for this project were PHP, laraval and MySQL. 

***

The rubric given to us by Geekshubs academy was as follows:


_"A company you work for wants to give a boost to the way employees relate to each other, allowing them to contact each other by creating interest groups._

_A first phase of this project is to create an LFG web application, which will allow employees to contact other employees in the company._

_Employees can contact other colleagues to form groups to play videogames, with the aim of sharing after-work leisure time".

* * * 

The functional requirements of the application were as follows:

* Users must be able to register to the application, by establishing a username/password.

*  Users must be able to authenticate themselves to the application by logging in.
  
*  Users have to be able to create parties (groups) for a given video game.
*  Users must be able to search for parties by selecting a video game.


* * * 

In addition to the above we had to include the following functionality:

*  User registration.
  
*  User login + token + middleware.
CRUD of the different models.


***

My design for the tables in the relational database: 
![Design for the API](readmePhoto/laraveldatabase.jpg)


***

# The tables of my database explained:

1. The table `Users` is where all the data of the users is stored.
2. Users can join in groups or parties called `Parties`.
3. To link users to games, the creation of the `Lobbies` table was necessary. This is a 'many to many' table which connects the users to the parties
4. `Games` contains all of the information about each game.
5. Within the games, the users can send messages to each other to be seen by all the members of the game; hence the `Messages` table to manage this functionality.


---------------------------------------------------

## Pre-requisites of the project to run on your local computer:



### First clone the repository:

    ```bash
    git clone https://github.com/callumgordon90/Proyecto-7-GeeksHubsAcademy.git
    ```

    In VSC, type `cd projectsevenlaravel`.

### Then install all dependencies in the command line:

    ```bash
    composer install
    ```

## Make the migrations to your Database:
   NOTE: You need to have mysql installed and running on your computer for this to work. You need to create the db directly on mysql.

    ```bash
    php artisan migrate
    ```

## Run the server:

    ```bash
    php artisan serve
    ```

## Configuring .env:
In your repository copy the `.env.example` file and rename it to `.env`, there you need to edit these variables with your data:
```
APP_KEY=

DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

Now you will be able to run the API.

***

# ENDPOINTS OF MY PROJECT: 
### Endpoints of my project can be found in:
```
app > routes >api.php 
```
***

```
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::post('me', 'App\Http\Controllers\AuthController@me');
    Route::post('register', 'App\Http\Controllers\AuthController@register');
});

Route::apiResource('games', GameController::class);
Route::apiResource('parties', PartyController::class);
Route::apiResource('messages', MessageController::class);
Route::apiResource('lobbies', LobbyController::class)->except(['update']);

```

-----------------------------------

by Callum Gordon

---------------------










