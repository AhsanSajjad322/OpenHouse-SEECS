# Open House Management Platform


# How to setup
Following are the steps to run this web crawler
1) First download this repository or else clone it in the folder.

2) ### To clone it write command : 
    ```git clone https://github.com/AhsanSajjad322/OpenHouse-SEECS.git```

3) Then start your Apache Server and MySQL service to access PhpAdmin. 

4) After that first we have to make migrations to run the following command in terminal:
    ```php artian migrate```
NOTE: If the above command gives error, then write ':refresh' at the end. 


5) Then we have to seed(enter) values in database. For this run the following command, which will take values from DatabaseSeeder.php files and insert in database:
    ```php artisan db:seed```

6) Then locate to the directory where README.md file is located using termnial and serve the server using command :
    ```php artisan serve```

7) Then click on the URL provided and this takes you to the index page of the project

8) Now to login to the sytem, enter credentials form any of following:
 - For UserType = Admin
    Email: ali@example.com
    Password: ali

 - For UserType = Student
    Email: ahmed@example.com
    Password: ahmed

 - For UserType = Evaluator
    Email: ahsan@example.com
    Password: ahsan

This will take you to the respective views of users.

# About Project
* The code is the Open House Management Platorm, used when FYP's demonstrations are to be organized.

* It helps evaluators and project groups manage their preferences and details easily.

*  The admin has control over project locations, ensuring a smooth event flow. Students can track evaluator involvement without seeing specific scores, maintaining fairness and feedback.

# Technologies used
* Laravel for making API's(backend)
* HTML to structure the content shown on webpage.
* CSS with Bootstrap to style the content.


# About Code
## Users
* There are 3 types of users for the sytem:
- Student (FYP Group)
- Admin
- Evaluator

## Routes
* Separate routes for Student, Admin, Evaulators are defined in code  

## Controllers
* AdminController -> to handle admin related logic.
* EvaluatorController -> to handle evaluator related logic.
* StudentController -> to handle student related logic.
* AuthController -> to handle authentication related logic.

## Models:
* Admin
* Category
* Evaluation
* Evaluator
* Location
* Project
* Student

## Views:
* All views are defined in views/layouts folder.
* Views are written using Blade templating engine

# Functionalities
## User Accounts:
* Guests (Evaluators): Each evaluator has a dedicated account.
* Evaluators can set preferences such as preferred project categories and specialty areas.

## FYP Groups:
* Final Year Project (FYP) groups have accounts to manage project details.
* FYP groups can assign keywords to their projects.

## Admin Account:
* An admin account has the authority to set the physical location of each FYP project on the demonstration floor.

## Project Assignment:
* Projects are randomly assigned to evaluators based on matching keywords and evaluator preferences.
* Each evaluator is assigned to evaluate between 3-5 projects.

## Evaluation Process:
* Evaluators can rate each project on a scale of 1-10.
* Evaluation results are visible only to the admin.

## Student Access:
* Students can view the number of evaluators who have assessed their projects.
* Students do not have access to individual evaluator scores.

# Open House Interface
![login image](/public/assests/login.png)

![admin view image](/public/assests/adminView.png)

![admin project details image](/public/assests/adminViewProjectDetails.png)

![student view image](/public/assests/studentView.png)

![student edit project image](/public/assests/studentEditProject.png)

![evaluator view image](/public/assests/evalView.png)

![evaluator project details image](/public/assests/evalViewProjectDetails.png)

