CREATE DATABASE IF NOT EXISTS smart_booking;
USE smart_booking;

CREATE TABLE services (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(100) NOT NULL
);

INSERT INTO services (title) VALUES
('Website Design'),
('SEO Consultation'),
('Technical Support');

CREATE TABLE bookings (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  service_id INT,
  preferred_date DATE,
  booked_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (service_id) REFERENCES services(id)
);