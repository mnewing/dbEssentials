# dbEssentials
Various mini web apps to share with students creating data driven websites

Lesson 1  - TableView
--------
Is a simple example of how to connect to a database and display the contents of a table in a HTML table
<br />

Lesson 2 - TableViewSecure
--------
This takes the TableView code and moves the database connection work out into a seperate file. This is done for 2 reasons:<br />
1. security - you don't want to leave your database connection information in the web folder<br />
2. duplication - if this changes you don't want to have to go into ever file and change it<br />
<br />

Lesson 3 - Adding records
--------
Adding records is broken up into two files:<br />
<i>addPersonForm.html</i> - displays a form to collect the relevant data<br />
<i>addPerson.php</i> - uses the data from the form to insert a new record into the database
<br />

Lesson 4 - Removing records
--------
broken up into two files:<br />
<i>View.php</i> - displays all the records with link for each to delete it<br />
<i>deletePerson.php</i> - uses the ID passed in as a query string with URL to remove the record from the database
<br />

Lesson 5 - Editing records
--------
broken up into three files:<br />
<i>View.php</i> - displays all the records with link for each to edit it<br />
<i>editPersonForm.php</i> - uses the ID passed in as a query string with URL to fetch the current data help for that record from the database and pre-fill in the form. this means the form is an accurate representation of the database record<br />
<i>editPerson.php</i> - updates all the fields for the record apart from the ID whether the user changed them or not. this is a acceptable because the form had the upto date data from the database. the ID is passed from the form to correctly identify which record to update
<br />

Work flow is as follows:
1. the user is shown all the records with a link on each to edit it
2. when the user clicks the edit link they are taken to a page with the form to edit the data and the ID of the record is passed as a query string
3. the form page 1st fetches the record for the ID from the database using a select query with the ID
4. the edit form is pre filled with the values from the database
5. the user changes whatever values they wish to change and clicks submit
6. the edit page then create the UPDATE query based on the data submitted by the form including the ID to ensure that the right record gets updated
7. the update is run and the record gets update
<br />

Lesson 6 - Working with Images
--------
Adding records is broken up into two files:<br />
<i>addImageForm.html</i> - displays a form to get the image file and also displays any images already in teh database<br />
<i>addImage.php</i> - uses the data from the form to add the image to the database<br />
<br />

Lesson 7 - Password protecting pages
--------
<i>loginoutPage.php</i> - single page that demonstrates password access control<br />
<br />
<i>useProtect.php</i> - makes use of the script <i>_protect.php</i> to handle password control<br />
<i>_protect.php</i> - a script that can be included at the top of pages to ensure they are only accessed i the correct passwor is entered.<br />
<br />

Lesson 8 - Searching
--------
Searching is split into 2 files but would work well as a combined page:<br />
<i>searchForm.html</i> - displays a form to collect the relevant data<br />
<i>searchResults.php</i> - uses the data from the form to for matching records which are then displayed in a table
<br />

