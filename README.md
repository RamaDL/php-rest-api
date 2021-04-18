# agile-engine-code-sample
PHP Rest API for user CRUD.

## Project goals
Project scaffolding
Project configuration
Usage of environment variables
Rest API concepts implementation

## Steps
1º Run sql script for DB creation
2º Create an .env file in the project root directory and setup the environment variables use .env.example as example of the viriables required.
3º Run the init.sh file to start the service.


## Rest API endpoints
GET /user --> return all users information
GET /user/{id} --> get single user information where user id is equal to {id}
POST /user --> create new user
DELETE /user/{id} --> logical delete of user where user id is equal to {id}
PUT /user/{id} --> update user information where user id is equal to {id}
