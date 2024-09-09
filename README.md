# Gallery PHP

A simple image gallery web application created using PHP, HTML, CSS, JavaScript, and MySQL.

## Motivation

This project was developed to enhance my PHP skills and serve as a learning exercise. I started inspired by the project from the Falcon Master PHP course, but I decided to add a lot of more features.

## Features

- **User Registration and Login**: Users can create accounts, log in, and manage their profiles.
- **Image Upload**: Registered users can upload images along with titles and descriptions.
- **Image Gallery**: All uploaded images are displayed in a gallery format for easy navigation.
- **Image Management**: Users can edit the titles and descriptions of their uploaded images.

## Getting Started

To run this project locally, follow these steps:

1. **Clone this repository.**

1. **Set up a local web server**: You can use web server software like XAMPP or MAMP. Configure it to run PHP.

1. **Database Setup**: Create a MySQL database and define the required tables using the following SQL code:

   ```sql
    CREATE TABLE photos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(50) NOT NULL,
        description VARCHAR(255) NOT NULL,
        img_url VARCHAR(255) NOT NULL,
        user_id INT NOT NULL,

        CONSTRAINT photos__users_fk
            FOREIGN KEY (user_id) REFERENCES users (id)
    );

    CREATE TABLE users (
        id INT auto_increment PRIMARY KEY,
        username VARCHAR(50) NOT NULL,
        email VARCHAR(50) NOT NULL,
        password VARCHAR(255) NOT NULL,

        CONSTRAINT users_pk2 UNIQUE (email)
    );
   ```

1. **Install Dependencies**: Before running the project, you need to install its dependencies. Use the following command to install them:

   ```bash
   composer install
   ```

1. **Environment Variables**: Rename the .env.template file to .env and update the variable values as needed.

1. **Access the Project**: Open the project in your web browser.

## Design
You can view the design and components file here:

<iframe style="border: 1px solid rgba(0, 0, 0, 0.1);" width="800" height="450" src="https://www.figma.com/embed?embed_host=share&url=https%3A%2F%2Fwww.figma.com%2Fdesign%2FAFPp2JcMEM5vozHhPscQMB%2Fpersonal-gallery%3Fnode-id%3D0-1%26t%3DhdUfpexzJxTPTC7T-1" allowfullscreen></iframe>
