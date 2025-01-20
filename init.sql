-- Create database (if not already created)
CREATE DATABASE IF NOT EXISTS hackathon1;

-- Use the database
USE hackathon1;

-- Example table creation
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Add initial data (optional)
INSERT INTO admin (username, email, password) VALUES
('admin', 'admin@net.com' ,'d9rf11f9rf8952');
