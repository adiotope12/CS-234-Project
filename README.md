# CS-234-Project
Hello and welcome to my repository! My name is Tope and I created a simple website as a project for my CS 234 (Database and Web System development) that runs on my localhost MAMP server. The purpose of this README file is to inform about the function of each page.

-Login Page
![Log In Page](https://github.com/adiotope12/CS-234-Project/assets/149920417/4d22b2fb-9f4b-4c40-936c-d868fa06a1fb)


The login page takes a username and password and will tell you if the username is not in the registration table, or if your password does not match the username provided. It also includes a button that can take new users to a registration page. Upon a successful login, the user is then taken to the homepage.

-Registration page
![Registration page](https://github.com/adiotope12/CS-234-Project/assets/149920417/e08258aa-3870-49f3-9afb-e891122a9213)


The Registration page allows the user to create a username and password according to the rules presented. The user's info is then inserted into my registration table as long as it follows the rules and doesn't match another user's username. Upon a successful registration, the user is taken to the homepage.

-Homepage
![Homepage](https://github.com/adiotope12/CS-234-Project/assets/149920417/3cc1f07a-717f-4cc8-bb18-84ed298ff4ca)


Here is a short page where the user can read a little bit about me, contact me via email, and access the review or admin page. There is also a logout button should the user want to leave.

-Review page
![Review page](https://github.com/adiotope12/CS-234-Project/assets/149920417/7d885410-8fce-4dea-bd60-0f50bfd20cc1)


The review page allows the user to submit a review about me. The form takes in their name, number of stars, and review and inserts them into my review table, which has a username column with a foreign key connected to the registration table so that if a username is deleted or updated, it is reflected in both tables. The bottom of the page shows my overall star rating and all the submitted reviews.

-Admin page
![Admin page](https://github.com/adiotope12/CS-234-Project/assets/149920417/90693379-75b8-4c36-b362-bed518491955)


Here anyone given admin status can update the database by submitting an sql statement into the form. A record of all the submitted statements is kept in my admin table that pairs them with the admins username in a separate column.


-Logout page

There is a separate logout page, but it is just a single line that outputs the user's username and tells them goodbye.
