-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2024 at 10:00 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookingdb`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `AddReservation` (IN `p_user_id` INT, IN `p_room_id` INT, IN `p_hotel_id` INT, IN `p_check_in` DATE, IN `p_check_out` DATE, IN `p_adults` INT, IN `p_children` INT, IN `p_city_id` INT)   BEGIN
    DECLARE room_available INT;

    SELECT COUNT(*) INTO room_available
    FROM reservations
    WHERE room_id = p_room_id 
    AND ((check_in < p_check_out AND check_out > p_check_in));

    IF room_available > 0 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'The room is not available for the selected dates.';
    END IF;

    INSERT INTO reservations (user_id, room_id, hotel_id, check_in, check_out, adults, children, city_id)
    VALUES (p_user_id, p_room_id, p_hotel_id, p_check_in, p_check_out, p_adults, p_children, p_city_id);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CancelReservation` (IN `p_reservation_id` INT, IN `p_user_id` INT)   BEGIN
    DECLARE room_id INT;

    SELECT room_id INTO room_id
    FROM reservations
    WHERE id = p_reservation_id;

    IF room_id IS NULL THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Reservation not found.';
    END IF;

    DELETE FROM reservations
    WHERE id = p_reservation_id AND (user_id = p_user_id OR EXISTS (SELECT 1 FROM users WHERE id = p_user_id AND is_admin = 1));

    UPDATE rooms
    SET is_available = 1
    WHERE id = room_id;

END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `IsRoomAvailable` (`p_room_id` INT, `p_check_in` DATE, `p_check_out` DATE) RETURNS TINYINT(1)  BEGIN
    DECLARE room_count INT;

    SELECT COUNT(*) INTO room_count
    FROM reservations
    WHERE room_id = p_room_id 
    AND ((check_in < p_check_out AND check_out > p_check_in));

    RETURN room_count = 0;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin_crud`
--

CREATE TABLE `admin_crud` (
  `id` int(11) NOT NULL,
  `admin-name` varchar(150) NOT NULL,
  `admin-password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_crud`
--

INSERT INTO `admin_crud` (`id`, `admin-name`, `admin-password`) VALUES
(1, 'Mouad El Meati', '20010630');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `created_at`) VALUES
(1, 'Kenitra', '2024-12-16 13:16:50'),
(2, 'Rabat', '2024-12-16 13:16:50'),
(3, 'Tanger', '2024-12-16 13:16:50'),
(4, 'Casablanca', '2024-12-16 13:16:50'),
(5, 'Marrakech', '2024-12-16 13:16:50'),
(6, 'Agadir', '2024-12-16 13:16:50'),
(7, 'Fes', '2024-12-16 13:16:50'),
(8, 'Oujda', '2024-12-16 13:16:50'),
(9, 'Tangier', '2024-12-16 13:16:50'),
(10, 'Essaouira', '2024-12-16 13:16:50');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 'Romaissae El Meati', 'romaissae@gmail.com', 'Thanks', '2024-12-16 20:07:50'),
(2, 'Mouad EL Meati', 'mouadelmeati@gmail.com', 'i&#039;m the admin', '2024-12-16 20:08:56'),
(4, 'Oussama El Alaoui', 'oussamaelalaoui@gmail.com', 'I need your help about my reservation', '2024-12-19 10:41:29'),
(5, 'Rachid', 'rachid@gmail.com', 'nothing', '2024-12-29 03:33:47');

-- --------------------------------------------------------

--
-- Table structure for table `hotelinfo`
--

CREATE TABLE `hotelinfo` (
  `id` int(11) NOT NULL,
  `hotelName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotelinfo`
--

INSERT INTO `hotelinfo` (`id`, `hotelName`) VALUES
(1, 'Goats Hotel');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `city_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `name`, `city_id`, `created_at`) VALUES
(1, 'Hotel Sunshine', 4, '2024-12-26 18:08:21'),
(3, 'Mountain Retreat', 2, '2024-12-26 18:08:21'),
(4, 'Hotel City Center ', 2, '2024-12-26 18:08:21'),
(5, 'Hotel FARAH', 2, '2024-12-27 16:43:50'),
(6, 'Hotel El Harti', 1, '2024-12-28 07:55:56'),
(7, 'Hotel Salam', 3, '2024-12-28 07:56:22'),
(8, 'Light Hotel', 8, '2024-12-28 17:52:07'),
(9, 'CR7 Hotel', 5, '2024-12-28 17:52:30'),
(10, 'Hotel Souis', 6, '2024-12-28 17:53:28'),
(11, 'Hotel Maarif', 7, '2024-12-29 03:51:55'),
(12, 'Hotel Success', 10, '2024-12-29 03:52:51');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `adults` int(11) NOT NULL,
  `children` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `city_id` int(11) NOT NULL,
  `hotel_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `user_id`, `room_id`, `check_in`, `check_out`, `adults`, `children`, `created_at`, `city_id`, `hotel_id`) VALUES
(18, 5, 14, '2025-01-05', '2025-01-06', 4, 0, '2024-12-28 17:49:42', 2, 3),
(20, 5, 15, '2025-01-05', '2025-01-09', 2, 0, '2024-12-28 21:00:41', 3, 7);

--
-- Triggers `reservations`
--
DELIMITER $$
CREATE TRIGGER `AfterInsertReservation` AFTER INSERT ON `reservations` FOR EACH ROW BEGIN
    -- Update the room's availability and booking dates
    UPDATE rooms
    SET 
        is_available = 0,
        last_booking_date = NEW.check_in,
        next_available_date = NEW.check_out
    WHERE id = NEW.room_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `BeforeInsertReservation` BEFORE INSERT ON `reservations` FOR EACH ROW BEGIN
    DECLARE conflicting_reservations INT;

    -- Check if the room is marked as unavailable
    IF (SELECT is_available FROM rooms WHERE id = NEW.room_id) = 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'The room is currently unavailable.';
    END IF;

    -- Check for conflicting reservations with overlapping dates
    SELECT COUNT(*) INTO conflicting_reservations
    FROM reservations
    WHERE room_id = NEW.room_id
      AND (
          (NEW.check_in BETWEEN check_in AND check_out) OR
          (NEW.check_out BETWEEN check_in AND check_out) OR
          (check_in BETWEEN NEW.check_in AND NEW.check_out)
      );

    -- If conflicts are found, raise an error
    IF conflicting_reservations > 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'The room is already booked for the selected dates.';
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `afterDeleteReservation` AFTER DELETE ON `reservations` FOR EACH ROW BEGIN
    -- Update the room's availability to available
    UPDATE rooms
    SET is_available = 1
    WHERE id = OLD.room_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `room_type` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `features` text DEFAULT NULL,
  `facilities` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_available` tinyint(1) DEFAULT 1,
  `last_booking_date` date DEFAULT NULL,
  `next_available_date` date DEFAULT NULL,
  `hotel_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_type`, `price`, `features`, `facilities`, `image`, `created_at`, `is_available`, `last_booking_date`, `next_available_date`, `hotel_id`) VALUES
(1, 'Another Room', 270.00, '2 Rooms, 2 Bathrooms, 1 Balcony, 3 Sofas', 'Screen TV, Wi-Fi, In-Room Safe, Front Desk', 'images/room/one.png', '2024-12-16 13:24:46', 0, '2025-01-18', '2025-01-19', 8),
(2, 'Deluxe Room', 150.00, '1 Room, 1 Bathroom, Sea View', 'Wi-Fi, Mini Bar, Air Conditioning', 'images/room/two.png', '2024-12-16 13:24:46', 0, '2024-12-20', '2024-12-22', NULL),
(3, 'Standard Room', 100.00, '1 Room, 1 Bathroom', 'Wi-Fi, TV', 'images/room/three.png', '2024-12-16 13:24:46', 0, '2024-12-19', '2024-12-20', NULL),
(4, 'Family Room', 300.00, '2 Rooms, 2 Bathrooms, Kitchenette', 'Wi-Fi, TV, Kitchen', 'images/room/four.png', '2024-12-16 13:24:46', 0, '2024-12-20', '2024-12-22', NULL),
(5, 'Single Room', 80.00, '1 Room, 1 Bathroom', 'Wi-Fi, TV', 'images/room/five.png', '2024-12-16 13:24:46', 0, '2024-12-26', '2024-12-28', NULL),
(6, 'Luxury Suite', 270.00, '2 Rooms, 2 Bathrooms, 1 Balcony, 3 Sofas', 'Screen TV, Wi-Fi, In-Room Safe, Front Desk', 'images/room/one.png', '2024-12-26 08:40:09', 0, '2024-12-27', '2024-12-29', 4),
(7, 'Deluxe Room', 180.00, '1 Room, 1 Bathroom, 1 Balcony', 'Wi-Fi, Air Conditioning, Coffee Maker, Desk', 'images/room/two.png', '2024-12-26 08:40:09', 1, '2024-12-31', '2025-01-01', 1),
(8, 'Executive Suite', 320.00, '2 Rooms, 2 Bathrooms, 1 Living Room', 'Wi-Fi, Smart TV, Mini Bar, Room Service', 'images/room/three.png', '2024-12-26 08:40:09', 1, NULL, NULL, 10),
(11, 'Penthouse Suite', 500.00, '3 Bedrooms, 3 Bathrooms, Large Balcony', 'Jacuzzi, Terrace, Smart TV, Room Service, Private Bar', 'images/room/six.png', '2024-12-26 08:40:09', 1, NULL, NULL, 7),
(13, 'Unique Room', 90.00, 'One room , One barthroom', 'TV', NULL, '2024-12-27 16:45:57', 1, NULL, NULL, 9),
(14, 'Luxury Suite', 125.00, '2 rooms', 'Wifi, Tv,Jacuzzi', NULL, '2024-12-28 15:38:01', 0, '2025-01-05', '2025-01-06', 3),
(15, 'Small Room', 85.00, 'One room , One barthroom', 'Wifi , Tv , Pc,Room Safe', NULL, '2024-12-28 17:11:54', 0, '2025-01-05', '2025-01-09', 7),
(16, 'Room Five', 300.00, '3 rooms , 2 bathroms', 'Wifi , Tv , Pc', NULL, '2024-12-28 17:54:39', 0, '2024-12-29', '2024-12-31', 5),
(17, 'Room Four', 210.00, '2 rooms', 'Wifi , Tv , Pc', NULL, '2024-12-28 17:55:20', 1, '2024-12-28', '2025-01-05', 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `birthday` date NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `pincode`, `birthday`, `password`, `created_at`) VALUES
(3, 'mohamed', 'mohamed@gmail.com', '0655396031', 'DOUAR OULED NCER EST EZAMRANI SIDI TAIBI KENITRA', 'G794503', '2024-12-22', '$2y$10$9rJ4lVoBFw9EgIQGgffDBeTmUizHPhDJRfC2fzCER6Z2boWS6wvs.', '2024-12-15 23:36:57'),
(5, 'zaid ', 'zaid@gmail.com', '0612345609', 'DOUAR OULED NCER EST EZAMRANI SIDI TAIBI KENITRA', 'G794223', '2003-12-14', '$2y$10$HP4L.kVJKZ1cZf5GYn.APulHllRhQ0jLk1whSeqVI/WXaal6lcbou', '2024-12-15 23:43:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_crud`
--
ALTER TABLE `admin_crud`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotelinfo`
--
ALTER TABLE `hotelinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `city_id` (`city_id`),
  ADD KEY `fk_hotel` (`hotel_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_room_hotel` (`hotel_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_crud`
--
ALTER TABLE `admin_crud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hotelinfo`
--
ALTER TABLE `hotelinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hotels`
--
ALTER TABLE `hotels`
  ADD CONSTRAINT `hotels_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `fk_hotel` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`),
  ADD CONSTRAINT `reservations_ibfk_3` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `fk_room_hotel` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
