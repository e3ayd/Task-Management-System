# Task Management System

This project is a simple web application that allows users to manage their tasks. Users can add, edit, complete, and delete tasks. The application is built with PHP for the backend, MySQL for data storage, and HTML/CSS/JavaScript for the frontend. 

## Features

- **User Authentication**: Users can register and log in to manage their tasks.
- **Task Management**: Users can add, edit, and delete tasks.
- **Task Status**: Users can mark tasks as completed and filter tasks based on their status.
- **Sorting**: Tasks can be sorted by due date or priority.
- **Responsive Design**: The application is designed to work well on mobile devices.

## Installation

1. Clone the repository to your local environment:
   ```bash
   git clone https://github.com/e3ayd/task_manager.git
   
```bash
task_manager/
│
├── index.php            # Homepage (displays tasks for logged-in users)
├── login.php            # User login page
├── register.php         # User registration page
├── add_task.php         # Page for adding a new task
├── edit_task.php        # Page for editing an existing task
├── delete_task.php      # Task deletion
├── complete_task.php    # Mark task as completed
├── db.php               # Database connection
├── style.css            # CSS for styling
└── README.md            # Project description and setup instructions
```
```bash
CREATE DATABASE task_manager;

USE task_manager;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    title VARCHAR(255),
    description TEXT,
    due_date DATE,
    priority ENUM('low', 'medium', 'high'),
    status ENUM('pending', 'completed'),
    FOREIGN KEY (user_id) REFERENCES users(id)
);
