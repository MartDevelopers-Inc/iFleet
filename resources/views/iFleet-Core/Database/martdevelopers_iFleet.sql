-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 29, 2020 at 03:34 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `martdevelopers_iFleet`
--

-- --------------------------------------------------------

--
-- Table structure for table `iFleet_category`
--

CREATE TABLE `iFleet_category` (
  `category_id` int(20) NOT NULL,
  `category_code` varchar(200) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `category_desc` longtext NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iFleet_category`
--

INSERT INTO `iFleet_category` (`category_id`, `category_code`, `category_name`, `category_desc`, `created_at`) VALUES
(2, 'iFleet-2631-MDKF', 'Sub-Urban Taxis', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas volutpat sagittis tellus vitae rhoncus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis et metus aliquam, tempus quam et, hendrerit nunc. Fusce venenatis eleifend massa suscipit condimentum. Sed malesuada ipsum tincidunt eros pretium pellentesque. Donec eu nisl finibus, dignissim metus sit amet, vestibulum sapien. Phasellus vitae justo quam. Sed at lorem eget nisi vestibulum pellentesque. Maecenas tortor libero, commodo at rutrum sed, placerat in tortor. Donec sit amet magna odio. Mauris tempor metus vel consequat auctor. Sed tincidunt leo at sem pellentesque consectetur. Nullam eleifend risus tincidunt risus consequat euismod. Pellentesque dolor enim, facilisis eu ex in, ullamcorper consectetur sem. Vestibulum sit amet lorem arcu. Vestibulum ex velit, pretium vel rutrum sit amet, molestie sit amet est.\r\n\r\nSed viverra turpis eleifend, fringilla mauris non, aliquet eros. Vivamus in eleifend velit. Aliquam tincidunt viverra faucibus. Mauris venenatis sapien urna, quis mattis libero aliquet sed. Pellentesque ac tortor a nunc dignissim tincidunt id sed neque. Nunc elementum consectetur suscipit. Phasellus venenatis nec nisl sed luctus. Proin posuere sem venenatis suscipit lacinia. Nulla euismod blandit erat, at malesuada erat pharetra at. Etiam sit amet orci eget leo mollis tempus at sed nisi. Suspendisse potenti. Nulla elementum, dolor at vestibulum placerat, risus mauris hendrerit lorem, tempor pellentesque massa lacus eget risus. Nullam sagittis eros quis diam scelerisque, sit amet ullamcorper elit molestie. ', '2020-07-25 22:19:41.660160'),
(3, 'iFleet-2603-QSAY', 'Transit Trucks', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, ', '2020-07-27 09:11:38.240581'),
(4, 'iFleet-8412-JYNA', 'PSV', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus.', '2020-07-27 13:21:28.749228'),
(5, 'iFleet-8453-OMPR', 'Hearse Fleet', 'This fleet consists of vehicles, especially a cars,  that are used to carry the dead body of a person in a coffin/casket at a funeral, wake, or memorial service. ', '2020-07-28 09:19:29.411142');

-- --------------------------------------------------------

--
-- Table structure for table `iFleet_fleet`
--

CREATE TABLE `iFleet_fleet` (
  `fleet_id` int(20) NOT NULL,
  `fleet_code` varchar(200) NOT NULL,
  `fleet_category_id` varchar(200) NOT NULL,
  `fleet_category_name` varchar(200) NOT NULL,
  `fleet_name` varchar(200) NOT NULL,
  `fleet_desc` longtext NOT NULL,
  `vehicle_numbers` varchar(200) NOT NULL,
  `fleet_staff_id` varchar(200) NOT NULL,
  `fleet_staff_number` varchar(200) NOT NULL,
  `fleet_staff_name` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iFleet_fleet`
--

INSERT INTO `iFleet_fleet` (`fleet_id`, `fleet_code`, `fleet_category_id`, `fleet_category_name`, `fleet_name`, `fleet_desc`, `vehicle_numbers`, `fleet_staff_id`, `fleet_staff_number`, `fleet_staff_name`, `created_at`) VALUES
(6, 'iFleet-0493-PZIL', '3', 'Transit Trucks', 'Scania G- Class', 'Scania G Class Trucks Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. ', '20', '1', 'iFleet-SJFK-9738', 'Mart Mbithi', '2020-07-27 09:15:48.643207'),
(7, 'iFleet-5082-BFKM', '3', 'Transit Trucks', 'Mercedes Benz  Actross', 'A truck with a star stands not only for reliability and economic efficiency, but also for first-class product and service quality and comprehensive expertise in the area of customer-oriented transport solutions. Whether long-haul, construction site, or distribution transportation, the Mercedes-Benz brand offers the right solution for the light-duty, medium-duty and heavy-duty truck segments. Again and again, the pioneering spirit at Mercedes-Benz Trucks has generated groundbreaking innovations â€“ from efficient drives to autonomous driving to active and passive safety systems.', '5', '2', 'iFleet-RXYN-1073', 'Lorem Ipsum', '2020-07-27 09:16:04.081840'),
(8, 'iFleet-6219-DLNG', '4', 'PSV', 'PSV-Minibus', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus.', '5', '3', 'iFleet-AUGI-8761', 'Ambrose Mutua', '2020-07-27 13:23:04.550992'),
(9, 'iFleet-8071-EDGP', '3', 'Transit Trucks', 'Caravan Hearse', 'The First Call vehicle is a vehicle used in the funeral service industry. This type of vehicle is used to pick up the remains of a recently deceased person, and transport that person to the funeral home for preparation. This initial pickup is called the \"first call\", hence the name of these vehicles. While some funeral homes will use their hearse for these initial pickups, having vehicles specifically for first calls and using the hearse solely for funerals reduces wear on hearses and makes the first call process more discreet. Sometimes, when the procession portion of funeral protocol comes into play, First Call vehicles double as funeral yield vehicles, which grants the procession the right of way.\r\nToday, the vehicles typically used for First call service are minivans. In some cases, funeral homes purchase minivans that have been converted into first call vehicles by the same companies that produce hearses. In other cases, general purpose minivans are purchased without the rear seats installed. ', '5', '', '', '', '2020-07-28 09:28:18.623661');

-- --------------------------------------------------------

--
-- Table structure for table `iFleet_fuel_consumption`
--

CREATE TABLE `iFleet_fuel_consumption` (
  `f_id` int(20) NOT NULL,
  `f_code` varchar(200) NOT NULL,
  `f_veh_reg_no` varchar(200) NOT NULL,
  `f_veh_name` varchar(200) NOT NULL,
  `f_type` varchar(200) NOT NULL,
  `f_consumed` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iFleet_fuel_consumption`
--

INSERT INTO `iFleet_fuel_consumption` (`f_id`, `f_code`, `f_veh_reg_no`, `f_veh_name`, `f_type`, `f_consumed`, `created_at`) VALUES
(1, 'iFleet-LGVH-0581', 'KAA - 123A', 'Mercedes Benz Actross', 'Diesel', '250', '2020-07-27 12:40:04.909845'),
(2, 'iFleet-CPMR-7280', 'KAA - 123A', 'Scania ', 'Diesel', '200', '2020-07-27 13:31:55.933448'),
(3, 'iFleet-IPWX-8201', 'KCT 786 F', 'Dodge Caravan', 'Diesel', '50', '2020-07-28 10:28:37.138760');

-- --------------------------------------------------------

--
-- Table structure for table `iFleet_Login`
--

CREATE TABLE `iFleet_Login` (
  `login_id` int(20) NOT NULL,
  `login_username` varchar(200) NOT NULL,
  `login_user_email` varchar(200) NOT NULL,
  `login_user_password` varchar(200) NOT NULL,
  `login_user_permission` varchar(200) NOT NULL,
  `login_created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iFleet_Login`
--

INSERT INTO `iFleet_Login` (`login_id`, `login_username`, `login_user_email`, `login_user_password`, `login_user_permission`, `login_created_at`) VALUES
(1, 'iFleet Administrator', 'martdevelopers254@gmail.com', 'ca60be3ad1c239c87485a28972d1f2a17ca65e57', '1', '2020-07-27 15:05:28.998222'),
(4, 'Ambrose Mutua', 'ambrose@gmail.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', '1', '2020-07-28 08:16:27.914981'),
(5, 'Mart243', 'lorem@gmail.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', '0', '2020-07-28 08:56:02.553368');

-- --------------------------------------------------------

--
-- Table structure for table `iFleet_PasswordResets`
--

CREATE TABLE `iFleet_PasswordResets` (
  `reset_id` int(20) NOT NULL,
  `reset_code` varchar(200) NOT NULL,
  `reset_token` varchar(200) NOT NULL,
  `reset_status` varchar(200) NOT NULL,
  `reset_email` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iFleet_PasswordResets`
--

INSERT INTO `iFleet_PasswordResets` (`reset_id`, `reset_code`, `reset_token`, `reset_status`, `reset_email`, `created_at`) VALUES
(2, 'TZRXMSI2', '6685bb14d7f7e87fa90176a01c4e1c3c00e99f96', 'Approved', 'martdevelopers254@gmail.com', '2020-07-27 15:05:29.063373'),
(3, 'IB0GJNXE', 'f3c6d760d6bc9ea2405b1000fa568eb721ddd31e', 'Pending', 'martdevelopers254@gmail.com', '2020-07-25 03:14:20.667109'),
(4, 'SC4L2HPZ', '4579f8bd8b1e8b11e9603046d7fbdb480e0f79e7', 'Pending', 'martdevelopers254@gmail.com', '2020-07-25 03:19:28.649827');

-- --------------------------------------------------------

--
-- Table structure for table `iFleet_Route`
--

CREATE TABLE `iFleet_Route` (
  `route_id` int(20) NOT NULL,
  `route_code` varchar(200) NOT NULL,
  `route_name` varchar(200) NOT NULL,
  `route_description` longtext NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iFleet_Route`
--

INSERT INTO `iFleet_Route` (`route_id`, `route_code`, `route_name`, `route_description`, `created_at`) VALUES
(2, 'iFleet-9682-YBRJ', 'Lorem Ipsum Route', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas volutpat sagittis tellus vitae rhoncus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis et metus aliquam, tempus quam et, hendrerit nunc. Fusce venenatis eleifend massa suscipit condimentum. Sed malesuada ipsum tincidunt eros pretium pellentesque. Donec eu nisl finibus, dignissim metus sit amet, vestibulum sapien. Phasellus vitae justo quam. Sed at lorem eget nisi vestibulum pellentesque. Maecenas tortor libero, commodo at rutrum sed, placerat in tortor. Donec sit amet magna odio. Mauris tempor metus vel consequat auctor. Sed tincidunt leo at sem pellentesque consectetur. Nullam eleifend risus tincidunt risus consequat euismod. Pellentesque dolor enim, facilisis eu ex in, ullamcorper consectetur sem. Vestibulum sit amet lorem arcu. Vestibulum ex velit, pretium vel rutrum sit amet, molestie sit amet est.', '2020-07-27 13:04:32.564018'),
(3, 'iFleet-8431-ZXCM', 'Machakos-Nairobi-Kisumu', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus.', '2020-07-27 13:20:43.051611');

-- --------------------------------------------------------

--
-- Table structure for table `iFleet_Shipments`
--

CREATE TABLE `iFleet_Shipments` (
  `s_id` int(20) NOT NULL,
  `s_code` varchar(200) NOT NULL,
  `s_name` varchar(200) NOT NULL,
  `s_status` varchar(200) NOT NULL,
  `vehicle_reg_no` varchar(200) NOT NULL,
  `vehicle_name` varchar(200) NOT NULL,
  `s_desc` longtext NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iFleet_Shipments`
--

INSERT INTO `iFleet_Shipments` (`s_id`, `s_code`, `s_name`, `s_status`, `vehicle_reg_no`, `vehicle_name`, `s_desc`, `created_at`) VALUES
(3, 'iFleet-JOTX-4287', 'Ex- Japan Imported Cars', 'Delivered', 'KAA - 123A', 'Mercedes Benz Actross', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. ', '2020-07-27 11:02:42.158053'),
(4, 'iFleet-CEGJ-3681', 'Crude Oil', 'Delivered', 'KCA 986G', 'Scania ', 'Oil tanker  departed at 0900 HRS from Mombasa en route to Nairobi, expected to arrive at 2300HRS. Its shipping crude oil.', '2020-07-28 10:13:15.553067');

-- --------------------------------------------------------

--
-- Table structure for table `iFleet_Staff`
--

CREATE TABLE `iFleet_Staff` (
  `staff_id` int(20) NOT NULL,
  `staff_name` varchar(200) NOT NULL,
  `staff_number` varchar(200) NOT NULL,
  `staff_natid` varchar(200) NOT NULL,
  `staff_phone` varchar(200) NOT NULL,
  `staff_email` varchar(200) NOT NULL,
  `staff_passport` varchar(200) NOT NULL,
  `staff_bio` longtext NOT NULL,
  `staff_adr` varchar(200) NOT NULL,
  `staff_gender` varchar(200) NOT NULL,
  `staff_dob` varchar(200) NOT NULL,
  `staff_acc_status` varchar(200) NOT NULL,
  `allow_login` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iFleet_Staff`
--

INSERT INTO `iFleet_Staff` (`staff_id`, `staff_name`, `staff_number`, `staff_natid`, `staff_phone`, `staff_email`, `staff_passport`, `staff_bio`, `staff_adr`, `staff_gender`, `staff_dob`, `staff_acc_status`, `allow_login`, `created_at`) VALUES
(1, 'Mart Mbithi', 'iFleet-SJFK-9738', '35574881', '+254737229776', 'martmbithi@protonmail.com', 'Orion.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas volutpat sagittis tellus vitae rhoncus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis et metus aliquam, tempus quam et, hendrerit nunc. Fusce venenatis eleifend massa suscipit condimentum. Sed malesuada ipsum tincidunt eros pretium pellentesque. Donec eu nisl finibus, dignissim metus sit amet, vestibulum sapien. Phasellus vitae justo quam. Sed at lorem eget nisi vestibulum pellentesque. Maecenas tortor libero, commodo at rutrum sed, placerat in tortor. Donec sit amet magna odio. Mauris tempor metus vel consequat auctor. Sed tincidunt leo at sem pellentesque consectetur. Nullam eleifend risus tincidunt risus consequat euismod. Pellentesque dolor enim, facilisis eu ex in, ullamcorper consectetur sem. Vestibulum sit amet lorem arcu. Vestibulum ex velit, pretium vel rutrum sit amet, molestie sit amet est.\r\n\r\nSed viverra turpis eleifend, fringilla mauris non, aliquet eros. Vivamus in eleifend velit. Aliquam tincidunt viverra faucibus. Mauris venenatis sapien urna, quis mattis libero aliquet sed. Pellentesque ac tortor a nunc dignissim tincidunt id sed neque. Nunc elementum consectetur suscipit. Phasellus venenatis nec nisl sed luctus. Proin posuere sem venenatis suscipit lacinia. Nulla euismod blandit erat, at malesuada erat pharetra at. Etiam sit amet orci eget leo mollis tempus at sed nisi. Suspendisse potenti. Nulla elementum, dolor at vestibulum placerat, risus mauris hendrerit lorem, tempor pellentesque massa lacus eget risus. Nullam sagittis eros quis diam scelerisque, sit amet ullamcorper elit molestie. ', '127.0.0.1 Machakos', 'Male', 'July - 13 - 1998', 'Active', '', '2020-07-27 12:59:43.035509'),
(2, 'Lorem Ipsum', 'iFleet-RXYN-1073', '654321', '+254737229776', 'lorem@gmail.com', '', 'Thp[jkhnbwsdcv-[pwkl,sdcpk[wacdx ][kw', '127001;MLZXC ,', 'Male', 'May - 3 - 1980', 'Active', '1', '2020-07-28 08:32:06.236825'),
(3, 'Ambrose Mutua', 'iFleet-AUGI-8761', '35576541', '+254718186074', 'ambrose@gmail.com', '', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus.', '127.0.0.1 Machakos.', 'Male', 'July - 13 - 1995', 'Active', '1', '2020-07-28 08:16:28.156609');

-- --------------------------------------------------------

--
-- Table structure for table `iFleet_Vehicles`
--

CREATE TABLE `iFleet_Vehicles` (
  `v_id` int(20) NOT NULL,
  `v_reg_no` varchar(200) NOT NULL,
  `v_name` varchar(200) NOT NULL,
  `v_fleet_id` varchar(200) NOT NULL,
  `v_fleet_name` varchar(200) NOT NULL,
  `v_fuel` varchar(200) NOT NULL,
  `v_status` varchar(200) NOT NULL,
  `v_desc` longtext NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iFleet_Vehicles`
--

INSERT INTO `iFleet_Vehicles` (`v_id`, `v_reg_no`, `v_name`, `v_fleet_id`, `v_fleet_name`, `v_fuel`, `v_status`, `v_desc`, `created_at`) VALUES
(5, 'KAA - 123A', 'Mercedes Benz Actross', '', 'Mercedes Benz Actross', 'Diesel', 'Operational', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, ', '2020-07-27 09:17:59.327368'),
(6, 'KAA - 123B', 'Scania ', '6', 'Scania G- Class', 'Diesel', 'Operational', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, ', '2020-07-27 09:20:05.113601'),
(7, 'KAA - 123C', 'Mercedes Benz Actross', '', 'Mercedes Benz Actross', 'Diesel', 'Operational', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, ', '2020-07-27 09:20:23.770970'),
(9, 'KAA - 123E', 'Scania G Class ', '6', 'Scania G- Class', 'Diesel', 'Operational', 'Scania engines are known for their fuel efficiency. Our new generation trucks take our reputation a step further. Improved injectors and combustion chambers combined with the new rear axle ratio, contribute to reducing both engine speed and cutting fuel consumption by 3%.\r\n', '2020-07-27 09:21:01.681921'),
(10, 'KCG 809 A', 'Toyota Hiace', '8', 'PSV-Minibus', 'Diesel', 'Operational', '14 Seater, Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus.', '2020-07-27 13:24:30.379173'),
(11, 'KCA 986G', 'Mitsubishi FH', '8', 'PSV-Minibus', 'Diesel', 'Operational', '43 Seater, Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus.', '2020-07-27 13:25:08.292373'),
(13, 'KCG 809 F', 'Isuzu ', '8', 'PSV-Minibus', 'Diesel', 'Operational', '60 Seater Bus Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus.', '2020-07-27 13:26:09.229850'),
(14, 'KCT 786 F', 'Dodge Caravan', '9', 'Caravan Hearse', 'Diesel', 'Operational', 'The Dodge Caravan (also known as the Dodge Grand Caravan) is a series of minivans produced by Chrysler from the 1984 to 2020 model years. Marketed as the Dodge version of the Chrysler minivans, the Caravan is currently in its fifth generation of production. Introduced alongside the Plymouth Voyager, the Caravan was also sold by Chrysler as the Chrysler Town & Country until its 2017 replacement by the Chrysler Pacifica.\r\n\r\nLargely marketed in the United States and Canada, the Dodge Caravan was marketed in Europe as the Chrysler Voyager. From 2009 to 2014, Volkswagen marketed the Volkswagen Routan, a rebadged version of the Dodge Grand Caravan. ', '2020-07-28 09:40:31.421696');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `iFleet_category`
--
ALTER TABLE `iFleet_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `iFleet_fleet`
--
ALTER TABLE `iFleet_fleet`
  ADD PRIMARY KEY (`fleet_id`);

--
-- Indexes for table `iFleet_fuel_consumption`
--
ALTER TABLE `iFleet_fuel_consumption`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `iFleet_Login`
--
ALTER TABLE `iFleet_Login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `iFleet_PasswordResets`
--
ALTER TABLE `iFleet_PasswordResets`
  ADD PRIMARY KEY (`reset_id`);

--
-- Indexes for table `iFleet_Route`
--
ALTER TABLE `iFleet_Route`
  ADD PRIMARY KEY (`route_id`);

--
-- Indexes for table `iFleet_Shipments`
--
ALTER TABLE `iFleet_Shipments`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `iFleet_Staff`
--
ALTER TABLE `iFleet_Staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `iFleet_Vehicles`
--
ALTER TABLE `iFleet_Vehicles`
  ADD PRIMARY KEY (`v_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `iFleet_category`
--
ALTER TABLE `iFleet_category`
  MODIFY `category_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `iFleet_fleet`
--
ALTER TABLE `iFleet_fleet`
  MODIFY `fleet_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `iFleet_fuel_consumption`
--
ALTER TABLE `iFleet_fuel_consumption`
  MODIFY `f_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `iFleet_Login`
--
ALTER TABLE `iFleet_Login`
  MODIFY `login_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `iFleet_PasswordResets`
--
ALTER TABLE `iFleet_PasswordResets`
  MODIFY `reset_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `iFleet_Route`
--
ALTER TABLE `iFleet_Route`
  MODIFY `route_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `iFleet_Shipments`
--
ALTER TABLE `iFleet_Shipments`
  MODIFY `s_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `iFleet_Staff`
--
ALTER TABLE `iFleet_Staff`
  MODIFY `staff_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `iFleet_Vehicles`
--
ALTER TABLE `iFleet_Vehicles`
  MODIFY `v_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
