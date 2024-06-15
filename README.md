## NextEd - School Management App
Welcome to NextEd, a one-stop website for everything related to your highschool, university!&nbsp; Students, teachers, instructors, principals and admins can all find the resources and information they need here.

This README file provides instructions on how to set up and run the NextEd application locally on your computer.

**Prerequisites:**

* Docker Desktop installed on your machine [https://www.docker.com/products/docker-desktop/](https://www.docker.com/products/docker-desktop/)


**Getting Started:**

1. **Clone the Repository:**

 &nbsp; Open your terminal and use the following command to clone the NextEd repository from Git:

 &nbsp; ```bash
 &nbsp; git clone git@github.com:mohamadmatar7/NextEd.git
 &nbsp; ```

2. **Navigate to the Project Directory:**

 &nbsp; Use the `cd` command to change directories into the newly cloned NextEd project:

 &nbsp; ```bash
 &nbsp; cd NextEd
 &nbsp; ```

3. **Configure Ddev:**

 &nbsp; Run the following command to configure Ddev for the project. Press Enter to accept the default options throughout the setup process:

 &nbsp; ```bash
 &nbsp; ddev config
 &nbsp; ```

4. **Start the Development Environment:**

 &nbsp; Start the development environment using Ddev:

 &nbsp; ```bash
 &nbsp; ddev start
 &nbsp; ```

5. **Install Dependencies:**

 &nbsp; Install the project's PHP dependencies using Composer:

 &nbsp; ```bash
 &nbsp; ddev composer install
 &nbsp; ```



6. **Generate Application Key:**



 &nbsp; Generate a secret application key for security purposes:



 &nbsp; ```bash
 &nbsp; ddev artisan key:generate
 &nbsp; ```



7. **Launch the Application:**

 &nbsp; Open your web browser and visit the following URL to access the NextEd application running in your local development environment:

 &nbsp; ```
 &nbsp; ddev launch
 &nbsp; ```

**Authors:**

* Karim Matar
* Mohamad Matar