# Todo_list
A Simple To-Do List Application using PHP 8+, MySQL 8+, jQuery which will be a single-user application. The tasks will be managed using AJAX, which means the page will not reload when you add, remove, or mark tasks as done.

This is a simple, single-user To-Do List web application built using:

PHP 8+ for server-side logic

MySQL 8+ as the database

jQuery (JavaScript) for AJAX-based interaction

HTML + CSS for the user interface

I have provided the db table schema in order to implement this application
========================================================================================

Database creation
==================

CREATE DATABASE todo_list;

USE todo_list;

CREATE TABLE `todo_list`.`task_checklist` (`id` INT NOT NULL AUTO_INCREMENT , `description` VARCHAR(255) NOT NULL , `status` BOOLEAN NOT NULL DEFAULT FALSE , `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;

========================================================================================
Index.php
==========
Purpose: Renders the main webpage and includes all required frontend assets.

Key Elements:

A form to submit new tasks

A list to display existing tasks

Script and stylesheet references

========================================================================================
config.php
==========
This script is used to store the database username, password, database name etc. So if in the future any of this credentials changes, we just need to update it in 1 place.


========================================================================================
db.php
=======
Purpose of this script is to connect the application with the database. So when index.php is executed we just need to include/require db.php


========================================================================================
functions.php
==============
Purpose: Acts as the backend API for AJAX operations. Main functionality is in this script.

Supported Actions:

add: Adds a new task

edit/complete task icon: Toggles a task’s status column

delete: Removes a task

list: Fetches all tasks from the database

Security Notes:

Uses mysqli prepared statements to prevent SQL injection
Prevention from malicious content


========================================================================================
script.js
==========

Purpose: Manages frontend behavior using jQuery. This script sends AJAX post calls and with this approach, the application doesnt need reloading and works much faster than usual.

Functions:

Intercepts form submissions to add tasks via AJAX

Listens for clicks to toggle or delete tasks

Updates task list dynamically without page reload



========================================================================================


Possible improvement which can be made to improvise the application
=====================
1. User login and authentication in order to bifurcate the list, this way only 1 user can access the respective list and update it as per the need.

2. Pagination to improvise the task load speed. If the user is using the application heavily then it doesnt make sense to show all of the task in a page. The purpose of the web application will become redundant.

3. Bifurcate the data in 2 tabs Pending and Completed with pagination. This way the applications purpose is more clear.

4. Usage of session and tokens in order to keep a check on the user request. This way we can control the number of AJAX calls and prevent spam or DOS attacks.

5. I have implemented preventions of malicious input and SQL injection, however, the script is still not safe as anyone can access the application. It is better to record the users IP address and whitelist it so that only that network is given access to.

6. I have implemented the error handling in the scripts, however if any function faces error, I have not implemented the counter-measure due to time limit.

7. I have implemented logging system, however, log file needs to be deleted every week or month depending on the usage of the log files. We can have 1 more script which checks for the file creation date and set an API which will run at 00:00:01s everyday which will check for those files and delete it. My logging application can recreate a new log file if the file doesnt exist.

