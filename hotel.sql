

-- Table for Locations
CREATE TABLE Locations (
    location_id INT AUTO_INCREMENT PRIMARY KEY,
    country VARCHAR(100) NOT NULL,
    city VARCHAR(100) NOT NULL,
    district VARCHAR(100) NOT NULL
);

-- Table for Hotels
CREATE TABLE Hotels (
    hotel_id INT AUTO_INCREMENT PRIMARY KEY,
    hotel_name VARCHAR(100) NOT NULL,
    address VARCHAR(255) NOT NULL,
    phone_number VARCHAR(15),
    email VARCHAR(100),
    description TEXT,
    location_id INT
);

-- Table for Room Types
CREATE TABLE RoomTypes (
    room_type_id INT AUTO_INCREMENT PRIMARY KEY,
    room_type_name VARCHAR(100) NOT NULL
);

-- Table for Rooms
CREATE TABLE Rooms (
    room_id INT AUTO_INCREMENT PRIMARY KEY,
    room_number VARCHAR(50) NOT NULL,
    status ENUM('Available', 'Booked', 'Under Maintenance') NOT NULL,
    capacity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    hotel_id INT,
    room_type_id INT
);



-- Table for Room Images
CREATE TABLE RoomImages (
    image_id INT AUTO_INCREMENT PRIMARY KEY,
    image_url VARCHAR(255) NOT NULL,
    room_id INT
);

-- Table for Services
CREATE TABLE Services (
    service_id INT AUTO_INCREMENT PRIMARY KEY,
    service_name VARCHAR(100) NOT NULL,
    service_description TEXT,
    service_price DECIMAL(10, 2)
);

-- Table for Room Services (Many-to-Many Relationship between Rooms and Services)
CREATE TABLE RoomServices (
    room_id INT,
    service_id INT,
    PRIMARY KEY (room_id, service_id)
);



-- Table for Users (Accounts for both customers and hotel staff)
CREATE TABLE Users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) NOT NULL UNIQUE,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('Customer', 'HotelStaff') NOT NULL,
    status ENUM('Active', 'Inactive') NOT NULL
);

-- Table for Customers (linked with User table)
CREATE TABLE Customers (
    customer_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    customer_name VARCHAR(100),
    customer_phone VARCHAR(15),
    customer_address TEXT,
    gender ENUM('Male', 'Female', 'Other')
);

-- Table for Bookings
CREATE TABLE Bookings (
    booking_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT,
    check_in_date DATE NOT NULL,
    check_out_date DATE NOT NULL,
    total_amount DECIMAL(10, 2),
    status ENUM('Confirmed', 'Pending', 'Cancelled') NOT NULL,
    booking_date DATETIME DEFAULT CURRENT_TIMESTAMP
);
-- Table for Booking Rooms (Many-to-Many Relationship between Bookings and Rooms)
CREATE TABLE BookingRooms(
    booking_room_id INT AUTO_INCREMENT PRIMARY KEY,
    booking_id INT,
    room_id INT
);

-- Table for Payments
CREATE TABLE Payments (
    payment_id INT AUTO_INCREMENT PRIMARY KEY,
    booking_id INT,
    payment_method ENUM('Credit Card', 'Debit Card', 'Cash', 'Online Payment') NOT NULL,
    payment_status ENUM('Paid', 'Pending', 'Failed') NOT NULL,
    payment_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    amount DECIMAL(10, 2) NOT NULL
);


-- Table for Reviews
CREATE TABLE Reviews (
    review_id INT AUTO_INCREMENT PRIMARY KEY,
    booking_id INT,
    hotel_id INT,
    customer_id INT,
    rating INT CHECK (rating >= 1 AND rating <= 5),
    comment TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Table for Roles (for User management)
CREATE TABLE Roles(
    role_id INT AUTO_INCREMENT PRIMARY KEY,
    role_name VARCHAR(50) NOT NULL
);

-- Table for User Roles (assign roles to users)
CREATE TABLE UserRoles (
    user_id INT,
    role_id INT,
    PRIMARY KEY (user_id, role_id)
);



-- Foreign Key References

-- Hotel -> Location
ALTER TABLE Hotels
    ADD CONSTRAINT fk_hotel_location FOREIGN KEY (location_id) REFERENCES Location(location_id);

-- Room -> Hotel
ALTER TABLE Rooms
    ADD CONSTRAINT fk_room_hotel FOREIGN KEY (hotel_id) REFERENCES Hotel(hotel_id);

-- Room -> RoomType
ALTER TABLE Rooms
    ADD CONSTRAINT fk_room_room_type FOREIGN KEY (room_type_id) REFERENCES RoomType(room_type_id);

-- RoomImage -> Room
ALTER TABLE RoomImages
    ADD CONSTRAINT fk_room_image FOREIGN KEY (room_id) REFERENCES Room(room_id);

-- RoomService -> Room
ALTER TABLE RoomServices
    ADD CONSTRAINT fk_room_service_room FOREIGN KEY (room_id) REFERENCES Room(room_id);

-- RoomService -> Service
ALTER TABLE RoomServices
    ADD CONSTRAINT fk_room_service_service FOREIGN KEY (service_id) REFERENCES Service(service_id);

-- Customer -> User
ALTER TABLE Customers
    ADD CONSTRAINT fk_customer_user FOREIGN KEY (user_id) REFERENCES User(user_id);

-- Booking -> Customer
ALTER TABLE Bookings
    ADD CONSTRAINT fk_booking_customer FOREIGN KEY (customer_id) REFERENCES Customer(customer_id);

-- BookingRoom -> Booking
ALTER TABLE BookingRooms
    ADD CONSTRAINT fk_booking_room_booking FOREIGN KEY (booking_id) REFERENCES Booking(booking_id);

-- BookingRoom -> Room
ALTER TABLE BookingRooms
    ADD CONSTRAINT fk_booking_room_room FOREIGN KEY (room_id) REFERENCES Room(room_id);

-- Payment -> Booking
ALTER TABLE Payments
    ADD CONSTRAINT fk_payment_booking FOREIGN KEY (booking_id) REFERENCES Booking(booking_id);

-- Review -> Booking
ALTER TABLE Reviews
    ADD CONSTRAINT fk_review_booking FOREIGN KEY (booking_id) REFERENCES Booking(booking_id);

-- Review -> Hotel
ALTER TABLE Reviews
    ADD CONSTRAINT fk_review_hotel FOREIGN KEY (hotel_id) REFERENCES Hotel(hotel_id);

-- Review -> Customer
ALTER TABLE Reviews
    ADD CONSTRAINT fk_review_customer FOREIGN KEY (customer_id) REFERENCES Customer(customer_id);

-- UserRole -> User
ALTER TABLE UserRoles
    ADD CONSTRAINT fk_user_role_user FOREIGN KEY (user_id) REFERENCES User(user_id);

-- UserRole -> Role
ALTER TABLE UserRoles
    ADD CONSTRAINT fk_user_role_role FOREIGN KEY (role_id) REFERENCES Role(role_id);
