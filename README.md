# dbEssentials
Various mini web apps to share with students creating data driven websites

Lesson 1  - TableView
--------
Is a simple example of how to connect to a database and display the contents of a table in a HTML table

Lesson 2 - TableViewSecure
--------
This takes the TableView code and moves the database connection work out into a seperate file. This is done for 2 reasons:
1. security - you don't want to leave your database connection information in the web folder
2. duplication - if this changes you don't want to have to go into ever file and change it

Lesson 3 - Adding records
--------
Adding records is broken up into two files:
addPersonForm.html - displays a form to collect the relevant data
addPerson.php - uses the data from the form to insert a new record into the database