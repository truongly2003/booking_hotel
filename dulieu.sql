-- Insert into Location
INSERT INTO Location (country, city, district) VALUES
('Vietnam', 'Hanoi', 'Cau Giay'),
('Vietnam', 'Ho Chi Minh City', 'District 1'),
('Thailand', 'Bangkok', 'Sukhumvit'),
('Singapore', 'Singapore', 'Marina Bay'),
('Malaysia', 'Kuala Lumpur', 'Bukit Bintang');

-- Insert into Hotel
INSERT INTO Hotel (hotel_name, address, phone_number, email, description, location_id) VALUES
('Hotel Hanoi', '123 Hanoi Street', '0123456789', 'contact@hotelhanoi.com', 'A 5-star hotel in Hanoi', 1),
('Saigon Palace Hotel', '456 Ho Chi Minh St', '0987654321', 'info@saigonpalace.com', 'Luxury hotel in District 1', 2),
('Siam City Hotel', '789 Sukhumvit Rd', '0812345678', 'contact@siamcity.com', 'Premium hotel in Bangkok', 3),
('Marina Bay Sands', '10 Bayfront Ave', '0651234567', 'reservations@marinabaysands.com', 'Iconic hotel in Singapore', 4),
('Kuala Lumpur Grand Hotel', '12 Jalan Bukit Bintang', '0356789123', 'booking@klgrandhotel.com', 'Elegant hotel in the heart of KL', 5);

-- Insert into RoomType
INSERT INTO RoomType (room_type_name) VALUES
('Single Room'),
('Double Room'),
('Suite'),
('Presidential Suite'),
('Family Room');

-- Insert into Room
INSERT INTO Room (room_number, status, capacity, price, hotel_id, room_type_id) VALUES
('101', 'Available', 1, 100.00, 1, 1),
('102', 'Booked', 2, 150.00, 1, 2),
('201', 'Available', 2, 200.00, 2, 3),
('301', 'Under Maintenance', 4, 500.00, 3, 4),
('402', 'Available', 4, 300.00, 4, 5);

-- Insert into RoomImage
INSERT INTO RoomImage (image_url, room_id) VALUES
('http://example.com/images/room101.jpg', 1),
('http://example.com/images/room102.jpg', 2),
('http://example.com/images/room201.jpg', 3),
('http://example.com/images/room301.jpg', 4),
('http://example.com/images/room402.jpg', 5);

-- Insert into Service
INSERT INTO Service (service_name, service_description, service_price) VALUES
('Room Service', '24/7 food and beverage service', 20.00),
('Spa', 'Relaxing spa treatments', 50.00),
('Laundry', 'Laundry and dry cleaning services', 10.00),
('Airport Pickup', 'Airport shuttle service', 30.00),
('Gym Access', 'Access to hotel gym', 15.00);

-- Insert into RoomService
INSERT INTO RoomService (room_id, service_id) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

-- Insert into User
INSERT INTO User (email, username, password, role, status) VALUES
('customer1@example.com', 'customer1', 'password1', 'Customer', 'Active'),
('hotelstaff1@example.com', 'hotelstaff1', 'password2', 'HotelStaff', 'Active'),
('customer2@example.com', 'customer2', 'password3', 'Customer', 'Active'),
('hotelstaff2@example.com', 'hotelstaff2', 'password4', 'HotelStaff', 'Inactive'),
('customer3@example.com', 'customer3', 'password5', 'Customer', 'Inactive');

-- Insert into Customer
INSERT INTO Customer (user_id, customer_name, customer_phone, customer_address, gender) VALUES
(1, 'Nguyen Van A', '0912345678', '123 Hanoi Street', 'Male'),
(3, 'Tran Thi B', '0987654321', '456 Ho Chi Minh St', 'Female'),
(5, 'Le Minh C', '0911222333', '789 Sukhumvit Rd', 'Male'),
(2, 'Hoang Mai D', '0976543210', '101 Marina Bay', 'Female'),
(4, 'Pham Quang E', '0988776655', '12 Jalan Bukit Bintang', 'Other');

-- Insert into Booking
INSERT INTO Booking (customer_id, check_in_date, check_out_date, total_amount, status) VALUES
(1, '2024-12-01', '2024-12-05', 500.00, 'Confirmed'),
(3, '2024-12-10', '2024-12-12', 600.00, 'Pending'),
(5, '2024-12-15', '2024-12-18', 800.00, 'Confirmed'),
(2, '2024-12-20', '2024-12-25', 1000.00, 'Cancelled'),
(4, '2024-12-05', '2024-12-07', 450.00, 'Pending');

-- Insert into BookingRoom
INSERT INTO BookingRoom (booking_id, room_id) VALUES
(1, 1),
(2, 3),
(3, 5),
(4, 2),
(5, 4);

-- Insert into Payment
INSERT INTO Payment (booking_id, payment_method, payment_status, amount) VALUES
(1, 'Credit Card', 'Paid', 500.00),
(2, 'Cash', 'Pending', 600.00),
(3, 'Debit Card', 'Paid', 800.00),
(4, 'Online Payment', 'Failed', 1000.00),
(5, 'Credit Card', 'Paid', 450.00);

-- Insert into Review
INSERT INTO Review (booking_id, hotel_id, customer_id, rating, comment) VALUES
(1, 1, 1, 5, 'Excellent stay, very comfortable!'),
(2, 2, 3, 4, 'Good experience, but room could be better'),
(3, 3, 5, 3, 'Average hotel, not worth the price'),
(4, 4, 2, 2, 'Poor service and outdated rooms'),
(5, 5, 4, 4, 'Nice hotel, but a bit expensive');

-- Insert into Role
INSERT INTO Role (role_name) VALUES
('Customer'),
('HotelStaff'),
('Admin'),
('Manager'),
('Receptionist');

-- Insert into UserRole
INSERT INTO UserRole (user_id, role_id) VALUES
(1, 1),
(2, 2),
(3, 1),
(4, 2),
(5, 1);
