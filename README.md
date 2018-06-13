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


Lesson 4 - Removing records
--------
broken up into two files:
View.php - displays all the records with link for each to delete it
deletePerson.php - uses the ID passed in as a query string with URL to remove the record from the database


Lesson 5 - Editing records
--------
broken up into three files:
View.php - displays all the records with link for each to edit it
editPersonForm.php - uses the ID passed in as a query string with URL to fetch the current data help for that record from the database and pre-fill in the form. this means the form is an accurate representation of the database record
editPerson.php - updates all the fields for the record apart from the ID whether the user changed them or not. this is a acceptable because the form had the upto date data from the database. the ID is passed from the form to correctly identify which record to update


Work flow is as follows:
1. the user is shown all the records with a link on each to edit it
2. when the user clicks the edit link they are taken to a page with the form to edit the data and the ID of the record is passed as a query string
3. the form page 1st fetches the record for the ID from the database
4. the edit form is pre filled with the values from the database
5. the user changes whatever values they wish to change and clicks submit
6. the edit page then create the UPDATE query based on the data submitted by the form including the ID to ensure that the right record gets updated
7. the update is run and the record gets update
