# Todo List API
In this application users can add, delete, and view their expenses.

## Description

This is a project from [roadmap](https://roadmap.sh/projects/todo-list-api).

In this RESTful API app
- User can register to get access to the api
- Generate token when user register and login. Token will expire in a week.(User has to login to get new token)
- CRUD operations on the todo list created by user. Todo list from other users can not be access.
- Todo list data is store in database(MYSQL)
- Pagination for the to-do list data

## Tech Stack && Installation
Docker is needed to run the app.
- [Docker](https://docs.docker.com/engine/install/)


## Usage
Clone this repository and start docker on app directory. 
```
docker compose up -d
```
Run migration for todo-app.
```
docker exec todo-app php artisan migrate
```

## End point of the api

BASE URL : http://localhost/api/v1
| METHOD | ROUTE | DESCRIPTION |
|----------|----------|----------|
| POST | /register | Register as new user. Token send when successed |
| POST | /login | Login as existing user. New token will be send to replace the old one when successed.|
| GET | /todos | Get all todos data of a user |
| GET | /todos/{todoid} | Get todo data by todo_id |
| POST | /todos | Create new todo. Title and description is required. |
| PUT | /todos/{todoid}| Update todo data by id|
| PATCH | /todos/{todoid} | Update todo data by id |
| DELETE | /todos/{todoid} | Delete todo data by id |
