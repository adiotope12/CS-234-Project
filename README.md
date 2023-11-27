# CS-234-Project
Hello and welcome to my repository! My name is Tope and I created a simple website as a project for my CS 234 (Database and Web System development) that runs on my localhost MAMP server. The purpose of this README file is to inform about the function of each page.

-Login Page
The login page takes a username and password and will tell you if the username is not in the registration table, or if your password does not match the username provided. It also includes a button that can take new users to a registration page. Upon a successful login, the user is then taken to the homepage.

-Registration page

The Registration page allows the user to create a username and password according to the rules presented. The user's info is then inserted into my registration table as long as it follows the rules and doesn't match another user's username. Upon a successful registration, the user is taken to the homepage.

-Homepage
Here is a short page where the user can read a little bit about me, contact me via email, and access the review or admin page. There is also a logout button should the user want to leave.

-Review page
The review page allows the user to submit a review about me. The form takes in their name, number of stars, and review and inserts them into my review table, which has a username column with a foreign key connected to the registration table so that if a username is deleted or updated, it is reflected in both tables. The bottom of the page shows my overall star rating and all the submitted reviews.

-Admin page
Here anyone given admin status can update the database by submitting an sql statement into the form. A record of all the submitted statements is kept in my admin table that pairs them with the admins username in a separate column.

The images included outside of the project folder are images of the website.

-Logout page
There is a separate logout page, but it is just a single line that outputs the user's username and tells them goodbye.
