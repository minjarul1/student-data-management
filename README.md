# student-data-management

![Logo](https://i.postimg.cc/pL59BhxV/cloud-server.png)

## Description

Welcome to the **Student Data Management** system! This web-based application helps manage student, library, and academic records efficiently. The system provides an easy-to-use interface for adding, editing, and deleting student information, managing library books, and recording academic results. 

### Purpose & Goals:
- Streamline student data management.
- Provide a centralized platform for academic records and library resources.
- Ensure secure and efficient data handling.

## Features

### ✍️ **Student Form**
- Add student details: ID, Name, Email, Phone, Course, and Year.
- Edit or delete existing student records.
- Input validation to ensure data integrity.

### 📚 **Library Form**
- Manage book details: Name, Author, Borrowed By (Student ID), Borrow Date, Return Date, and Status.
- Track borrowing history.
- Update book status to "Available" or "Borrowed."

### 📝 **Results Form**
- Record academic performance: Student ID, Subject, Marks, Grade, and Semester.
- Automatically calculate grade averages.
- Easy management of results (add/edit/delete).

### 🔎 **Data View**
- Centralized data view with search, sort, and filter functionalities.
- Quick access for managing records.

### 📱 **Responsive Design**
- Fully responsive, optimized for various devices (desktop, tablet, mobile).

### 💾 **Database Integration**
- MySQL backend for secure data storage.
- Optimized queries for faster operations.

## Live Demo

Experience the live demo of this project here:

🔗 [Live Demo](http://dydstudent.infinityfreeapp.com/index.html)

### Instructions for Demo:
1. Open the live demo link in a browser.
2. Interact with the system by adding or managing student, library, or result data.
3. Explore the full functionality of the application.

## Screenshots

### 🏠 **Home Page**
![Home Page](https://i.postimg.cc/CKYFfzxQ/Screenshot-2025-01-05-224826.png)

### 👨‍🎓 **Student Form**
![Student Form](https://i.postimg.cc/jjdSFDYJ/Screenshot-2025-01-05-224839.png)

### 📖 **Library Form**
![Library Form](https://i.postimg.cc/wMJqmJLn/Screenshot-2025-01-05-224847.png)

### 📊 **Results Form**
![Results Form](https://i.postimg.cc/nLzn1Nq4/Screenshot-2025-01-05-224855.png)

### 📝 **Student Data View**
![Student View](https://i.postimg.cc/T1rxwxX6/Screenshot-2025-01-05-224915.png)

## Tech Stack

- **Frontend**:
  - HTML5: For structured content.
  - CSS3: For modern styling.
  - JavaScript (ES6+): For dynamic functionalities.

- **Backend**:
  - PHP: For server-side scripting and data management.

- **Database**:
  - MySQL: For secure data storage.

- **Development Tools**:
  - XAMPP/WAMP: Local server environment.
  - PhpMyAdmin: For easy database management.

## Usage

### 1️⃣ **Student Form**:
- Add, edit, or delete student records.
- Ensure all fields are filled before submitting.

### 2️⃣ **Library Form**:
- Manage book records, update borrowed status.
- Track borrow dates and return status.

### 3️⃣ **Results Form**:
- Add, edit, and delete student exam results.
- Maintain accurate records for academic performance.

### 4️⃣ **View Data**:
- Access and manage data in a user-friendly interface.
- Use filters and sorting for easy navigation.

## Configuration

### 🛠️ **Set Up Local Environment**
1. Install XAMPP or WAMP on your machine.
2. Clone the repository:
   ```bash
   gh repo clone minjarul1/student-data-management


## Tech Stack

- **Frontend**:
  - HTML5 for structured content.
  - CSS3 for styling and layout.
  - JavaScript for dynamic functionalities.

- **Backend**:
  - PHP for server-side processing.

- **Database**:
  - MySQL for data storage and management.

- **Development Tools**:
  - XAMPP/WAMP for local server development.
  - PhpMyAdmin for database administration.

## Usage

1. **Student Form**:
   - Use the form to add, edit, or delete student records.
   - Ensure all fields are completed before submission.

2. **Library Form**:
   - Manage book records, including their borrowing status.
   - Update records for returned books and mark them as "Available."

3. **Results Form**:
   - Enter and maintain exam results for students.
   - Edit or delete results as needed for corrections.

4. **View Data**:
   - Access all data entries in a consolidated view.
   - Use filters and sorting options for easier navigation.

## Configuration

1. **Set Up Local Environment**:
   - Install XAMPP or WAMP on your system.

2. **Create Required Tables in Database**:
   Use the following SQL commands to set up the necessary tables:

   ```sql
   -- Create students table
   CREATE TABLE students (
       student_id INT AUTO_INCREMENT PRIMARY KEY, -- Unique ID for each student
       name VARCHAR(100) NOT NULL,               -- Name of the student
       email VARCHAR(100) UNIQUE NOT NULL,       -- Email address, must be unique
       phone VARCHAR(15),                        -- Phone number
       course VARCHAR(50),                       -- Course name
       year INT                                  -- Year of study
   );

   -- Create library table
   CREATE TABLE library (
       library_id INT AUTO_INCREMENT PRIMARY KEY, -- Unique ID for each book
       book_name VARCHAR(100) NOT NULL,           -- Name of the book
       author VARCHAR(100),                       -- Author of the book
       borrowed_by INT,                           -- Student ID who borrowed the book
       borrow_date DATE,                          -- Date the book was borrowed
       return_date DATE,                          -- Date the book is to be returned
       status ENUM('Borrowed', 'Available') DEFAULT 'Available', -- Status of the book
       FOREIGN KEY (borrowed_by) REFERENCES students(student_id) -- Relates to students table
   );

   -- Create results table
   CREATE TABLE results (
       result_id INT AUTO_INCREMENT PRIMARY KEY,  -- Unique ID for each result record
       student_id INT,                            -- Relates to the student
       subject VARCHAR(100) NOT NULL,             -- Subject name
       marks INT,                                 -- Marks obtained
       grade CHAR(2),                             -- Grade (e.g., A, B)
       semester VARCHAR(10),                      -- Semester of the result
       FOREIGN KEY (student_id) REFERENCES students(student_id) -- Relates to students table
   );
   ```

3. **Clone the Repository**:
   ```bash
    gh repo clone minjarul1/student-data-management
   ```

4. **Update Database Configuration**:
   - Edit the `config.php` file to match your local server settings:
     ```php
     <?php
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "school_management";
     ?>
     ```

5. **Import Existing Data (Optional)**:
   - If a `schema.sql` or sample data file is provided, import it to initialize the database.


## Running Tests

To ensure that the application functions as expected, follow these steps:

1. **Set Up the Environment**:
   - Install and configure XAMPP or WAMP.
   - Clone the repository and place it in the `htdocs` folder (for XAMPP) or `www` folder (for WAMP).

     ```bash
     gh repo clone minjarul1/student-data-management
     ```

2. **Database Setup**:
   - Start the MySQL service in XAMPP/WAMP.
   - Access `phpMyAdmin` by navigating to:
     ```
     http://localhost/phpmyadmin
     ```
   - Create a new database named `school_management`.
   - Import the SQL file (`schema.sql`) included in the project to set up tables.

3. **Run the Application**:
   - Start the Apache service in XAMPP/WAMP.
   - Open a browser and visit:
     ```
     http://localhost/student-library-result-system
     ```

4. **Test Functionalities**:
   - **Student Form**: Add, edit, and delete student records.
   - **Library Form**: Add books, update their borrowing status, and view details.
   - **Results Form**: Record exam results and update them as needed.
   - Check for data consistency in the MySQL database after performing each action.

5. **Validate Features**:
   - Ensure that all forms validate input data correctly.
   - Test different edge cases, such as duplicate email entries for students or invalid book statuses.

6. **Check Responsiveness**:
   - Test the application on various devices (desktop, tablet, mobile) to ensure proper functionality and design.


## Support

Need help? Here’s how you can get support:

- **Documentation**: [Link to documentation]
- **Community Forums**: [Link to forums]
- **Support Email**: [support@example.com]

We’re here to assist you!

## Badges

![PHP](https://img.shields.io/badge/PHP-%3E=7.4-blue.svg)
![MySQL](https://img.shields.io/badge/MySQL-%3E=5.7-blue.svg)
![HTML5](https://img.shields.io/badge/HTML-5-red.svg)
![CSS3](https://img.shields.io/badge/CSS-3-blue.svg)
![JavaScript](https://img.shields.io/badge/JavaScript-ES6-yellow.svg)
![Responsive](https://img.shields.io/badge/Responsive-Design-brightgreen.svg)

## Run Locally

1. **Clone the Project**:
   ```bash
   git clone git clone https://github.com/your-username/student-library-result-system.git
   ```

2. **Start the Local Server**:
   - Open XAMPP or WAMP and start the Apache and MySQL modules.

3. **Set Up the Database**:
   - Import the provided `schema.sql` file into a new database named `school_management`.

4. **Access the Application**:
   - Open your browser and navigate to:
     ```
     http://localhost/student-library-result-system
     ```

## Usage/Examples
- **Add a Student**:
  1. Navigate to the Student Form.
  2. Fill in the fields: Student ID, Name, Email, Phone, Course, and Year.
  3. Click "Submit" to save the data.

- **Add a Book Record**:
  1. Open the Library Form.
  2. Provide the following details:
     - Book Name
     - Author
     - Borrowed By (Student ID)
     - Borrow Date and Return Date
     - Status
  3. Click "Submit" to save.

- **Add Exam Results**:
  1. Access the Results Form.
  2. Enter details:
     - Student ID
     - Subject
     - Marks
     - Grade
     - Semester
  3. Click "Submit" to store the results.

## Live Demo

You can access the live demo of this project here:
[Live Demo](http://dydstudent.infinityfreeapp.com/index.html), or follow these instructions:

1. Open the live demo link in any modern web browser.
2. Use the provided forms to interact with the application, such as adding or managing student, library, or result data.
3. Explore the functionalities to understand the system's features.
