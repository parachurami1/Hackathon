-- Example table creation
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Add initial data (optional)
INSERT OR IGNORE INTO admin (username, email, password) VALUES
('admin', 'admin@net.com', 'd9rf11f9rf8952');

INSERT OR IGNORE INTO users (username, email, password) VALUES
('me', 'me@admin.com', 'rh64gtg65d6465');
