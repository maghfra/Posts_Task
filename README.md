##Blog Application: 

Welcome to the Blog Application! This project lets users create and manage blog posts, and add comments to those posts. It uses Laravel for the backend and includes user authentication.

Follow these steps to set up and run the project:

1. Clone the Repository
2. Install Dependencies
Run these commands to install necessary packages:
**composer install
**npm install
3. Configure Environment
Copy the example environment file and edit it with your database details:
**cp .env.example .env
4. Set Up the Database
Run the following commands to create the database tables:
**php artisan migrate
5. Set Up Authentication
Laravel UI is used for user authentication. Install the authentication features:
**php artisan ui bootstrap --auth
**npm run dev
6. Start the Application
Run the development server:
**php artisan serve
>>Visit http://localhost:8000 in your web browser to view the application.
#Features
#Database Tables
Users: Stores user details (name, email, password).
Posts: Stores blog posts (title, content, user_id).
Comments: Stores comments on posts (content, user_id, post_id).

#Relationships
A User can have many Posts and Comments.
A Post can have many Comments.

#Authentication
Users can register, log in, and manage their posts and comments. Only logged-in users can create, edit, or delete posts.

#CRUD Operations

Posts:
Create: Users can create new posts.
Read: All posts are listed on the home page. Users can view individual posts.
Update: Users can edit their own posts.
Delete: Users can delete their own posts.

Comments:
Users can add comments to posts.
Users can delete their own comments.
