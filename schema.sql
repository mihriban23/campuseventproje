-- CampusEvent Database Schema
-- Prepared for Database Systems (CPE210) & Internet Based Programming (CPE212)

-- 1. Categories Table
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

-- 2. Venues Table
CREATE TABLE venues (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(150) NOT NULL,
    address TEXT,
    capacity INT
);

-- 3. Users Table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    surname VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL, -- SHA-256 Hashed
    role ENUM('student', 'admin') DEFAULT 'student'
);

-- 4. Events Table
CREATE TABLE events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(200) NOT NULL,
    description TEXT,
    category_id INT,
    venue_id INT,
    event_date DATE,
    start_time TIME,
    end_time TIME,
    price DECIMAL(10, 2),
    image_url VARCHAR(255),
    FOREIGN KEY (category_id) REFERENCES categories(id),
    FOREIGN KEY (venue_id) REFERENCES venues(id)
);

-- 5. Bookings Table
CREATE TABLE bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    event_id INT,
    booking_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status ENUM('pending', 'confirmed', 'cancelled') DEFAULT 'pending',
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (event_id) REFERENCES events(id)
);

-- 6. Tickets Table
CREATE TABLE tickets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    booking_id INT,
    ticket_code VARCHAR(50) UNIQUE NOT NULL,
    status ENUM('valid', 'used', 'invalid') DEFAULT 'valid',
    FOREIGN KEY (booking_id) REFERENCES bookings(id)
);

-- 7. Payments Table
CREATE TABLE payments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    booking_id INT,
    amount DECIMAL(10, 2),
    payment_method VARCHAR(50),
    payment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (booking_id) REFERENCES bookings(id)
);

-- Sample Data Insertion
INSERT INTO categories (name) VALUES ('Konserler'), ('Kulüp Faaliyetleri'), ('Kurslar ve Workshoplar');

-- Concerts
INSERT INTO events (title, description, category_id, venue_id, event_date, start_time, price, image_url) VALUES 
('Genç Caz Grubu', 'Kampüste caz rüzgarı esiyor!', 1, 1, '2026-05-20', '20:00', 50.00, 'assets/images/jazz.png'),
('Ateş Eşliğinde Gitar', 'Yıldızlar altında gitar keyfi.', 1, 1, '2026-05-22', '21:00', 0.00, 'assets/images/guitar_fire.png');

-- Club Activities
INSERT INTO events (title, description, category_id, venue_id, event_date, start_time, price, image_url) VALUES 
('Teknofest Tanıtım', 'Teknolojiye yön verenlerin buluşması.', 2, 2, '2026-05-15', '14:00', 0.00, 'assets/images/teknofest.png'),
('IEEE Workshop', 'Robotik ve yazılım dünyasına giriş.', 2, 2, '2026-05-16', '13:00', 0.00, 'assets/images/ieee.png'),
('Bilimtey Bilim Günü', 'Bilimle dolu bir gün geçirin.', 2, 2, '2026-05-17', '10:00', 0.00, 'assets/images/bilimtey.png'),
('TEMA Doğa Yürüyüşü', 'Gelecek için bir adım at.', 2, 1, '2026-05-18', '09:00', 0.00, 'assets/images/tema.png');

-- Courses & Workshops
INSERT INTO events (title, description, category_id, venue_id, event_date, start_time, price, image_url) VALUES 
('Microsoft Araçları', 'Office 365 ve Azure kullanımı.', 3, 2, '2026-06-01', '18:00', 100.00, 'assets/images/microsoft.png'),
('Gitar Öğrenme Kursu', 'Sıfırdan gitar öğrenmeye başlayın.', 3, 1, '2026-06-05', '17:00', 150.00, 'assets/images/guitar_lesson.png');

-- 1. Join Query (Events with Category and Venue)
-- SELECT e.title, c.name as category, v.name as venue FROM events e JOIN categories c ON e.category_id = c.id JOIN venues v ON e.venue_id = v.id;

-- 2. Subquery (Users who have made at least one booking)
-- SELECT name, surname FROM users WHERE id IN (SELECT DISTINCT user_id FROM bookings);

-- 3. Group By (Total bookings per event)
-- SELECT event_id, COUNT(*) as total_bookings FROM bookings GROUP BY event_id;

-- 4. Date Function (Events in May 2026)
-- SELECT * FROM events WHERE MONTH(event_date) = 5 AND YEAR(event_date) = 2026;

-- 5. Character Function (Uppercased event titles)
-- SELECT UPPER(title) as uppercase_title FROM events;
