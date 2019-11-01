-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2019 at 04:05 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `technogyang`
--

-- --------------------------------------------------------

--
-- Table structure for table `chief_executive_officer`
--

CREATE TABLE `chief_executive_officer` (
  `CEO_Id` varchar(255) NOT NULL,
  `First_Name` varchar(255) NOT NULL,
  `Last_Name` varchar(255) NOT NULL,
  `Permanent.Address` varchar(255) NOT NULL,
  `Mail` varchar(255) NOT NULL,
  `Phone_No` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chief_executive_officer`
--

INSERT INTO `chief_executive_officer` (`CEO_Id`, `First_Name`, `Last_Name`, `Permanent.Address`, `Mail`, `Phone_No`) VALUES
('Ceo111', 'Rajendra', 'Barma', 'Baluwatar, Kathmandu', 'rajendra223@gmail.com', 984165343);

-- --------------------------------------------------------

--
-- Table structure for table `company_details`
--

CREATE TABLE `company_details` (
  `Name` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Voice_Call` int(50) NOT NULL,
  `Fax_No` int(50) NOT NULL,
  `Office` int(50) NOT NULL,
  `Web_Address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_details`
--

INSERT INTO `company_details` (`Name`, `Address`, `Email`, `Voice_Call`, `Fax_No`, `Office`, `Web_Address`) VALUES
('TechnoGyang', 'Koteswhore, Kathmandu', 'technogyan2018.gmailcom', 166784454, 166187602, 454550, 'www.technogyan.com');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `Department_Id` varchar(255) NOT NULL,
  `Department_Name` varchar(255) NOT NULL,
  `Assigned_Employes` int(50) NOT NULL,
  `Leaded_by` varchar(255) NOT NULL,
  `Running_Project` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`Department_Id`, `Department_Name`, `Assigned_Employes`, `Leaded_by`, `Running_Project`) VALUES
('Dep001', 'Research and Development', 5, 'Team Leader', 1),
('Dep002', 'Marketing', 5, 'Team Leader', NULL),
('Dep003', 'Human Resource Department', 6, 'Team Leader', 1),
('Dep004', 'Web Department', 4, 'Project Manager, Team Leader', 2),
('Dep005', 'Mobile Department', 5, 'Project Manager, Team Leader', 1);

-- --------------------------------------------------------

--
-- Table structure for table `department_workers`
--

CREATE TABLE `department_workers` (
  `Worker_Id` varchar(255) NOT NULL,
  `Worker_Name` varchar(255) NOT NULL,
  `Worker_Address` varchar(255) NOT NULL,
  `Worker_Phone` int(50) NOT NULL,
  `Worker_Designation` varchar(255) NOT NULL,
  `Worker_Salary` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department_workers`
--

INSERT INTO `department_workers` (`Worker_Id`, `Worker_Name`, `Worker_Address`, `Worker_Phone`, `Worker_Designation`, `Worker_Salary`) VALUES
('Emp145', 'Anup Jain', 'Sydney, Australia', 67345224, 'Implementer', 50000),
('Emp146', 'Anup Jain', 'Delhi, India', 5642222, 'Coder', 60000),
('Emp147', 'Dave Thomas', 'Orleans, USA', 156475555, 'Implementer', 50000),
('Emp148', 'Milan Thapa', 'Baneswhore, Kathmandu', 98413454, 'Coder', 60000),
('Emp149', 'Meed Nezz', 'Paris, France', 12452353, 'Tester', 90000);

-- --------------------------------------------------------

--
-- Table structure for table `project_manager`
--

CREATE TABLE `project_manager` (
  `Manager_Id` varchar(255) NOT NULL,
  `Manager_Name` varchar(255) NOT NULL,
  `Manager_Address` varchar(255) NOT NULL,
  `Manager_Phone` varchar(255) NOT NULL,
  `Manager_Email` varchar(255) NOT NULL,
  `Salary` int(50) NOT NULL,
  `Incharge_Of` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_manager`
--

INSERT INTO `project_manager` (`Manager_Id`, `Manager_Name`, `Manager_Address`, `Manager_Phone`, `Manager_Email`, `Salary`, `Incharge_Of`) VALUES
('ManID122', 'Lana Rey', 'Boston, USA', '126575656', 'lanarey23@gmail.com', 75000, 'Web Department'),
('ManID123', 'Sherlock Holmes', 'Baker Street, London', '865756655', 'sherlock23hmo@gmail.com', 9876654, 'Mobile Department');

-- --------------------------------------------------------

--
-- Table structure for table `running_project`
--

CREATE TABLE `running_project` (
  `Project_Id` varchar(255) NOT NULL,
  `Project_Name` varchar(255) NOT NULL,
  `Departments` varchar(255) NOT NULL,
  `Managed_By` varchar(255) NOT NULL,
  `Supervised_By` varchar(255) NOT NULL,
  `Worker_No` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `running_project`
--

INSERT INTO `running_project` (`Project_Id`, `Project_Name`, `Departments`, `Managed_By`, `Supervised_By`, `Worker_No`) VALUES
('RP100', 'Make It Work', 'Human Resource Department', 'Workers', 'Team Leader', 5),
('RP101', 'Here It Goes', 'Web Department', 'Project Manager', 'Team Leader', 6),
('RP103', 'Visualize', 'Mobile Department', 'Project Manager', 'Team Leader', 7),
('RP104', 'Dreamy Dream', 'Web Department', 'Project Manager', 'Team Leader', 5),
('RP105', 'Varchar', 'Research and Development', 'Workers', 'Team Leader', 4);

-- --------------------------------------------------------

--
-- Table structure for table `team_leader`
--

CREATE TABLE `team_leader` (
  `Leader_Id` varchar(255) NOT NULL,
  `Leader_Name` varchar(255) NOT NULL,
  `Leader_Address` varchar(255) NOT NULL,
  `Leader_Phone` int(50) NOT NULL,
  `Leader_Email` varchar(255) NOT NULL,
  `Leading_Project` varchar(255) NOT NULL,
  `Salary` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team_leader`
--

INSERT INTO `team_leader` (`Leader_Id`, `Leader_Name`, `Leader_Address`, `Leader_Phone`, `Leader_Email`, `Leading_Project`, `Salary`) VALUES
('Led133', 'Eddie Vedder', 'Kaushaltar, Bhaktapur', 983435433, 'eddier@gmail.com', 'Eye Of Danger', 454545),
('Led134', 'Pearl Jam', 'Baluwatar, Kathmandu', 987556344, 'pearl12jam@gmail.com', 'Here It Goes', 43673536),
('Led135', 'Adam Stervia', 'Boston, USA', 1564644446, 'adam12@gmail.com', 'Visualize', 50000),
('Led136', 'Bob Marley', 'Kamalpokhari, Kathmandu', 985643344, 'bobty@gmail.com', 'Make It Work', 60000),
('Led137', 'Sam Smith', 'Fortunate, Disney', 675714334, 'sam143@gmail.com', 'DreamyIsland', 908686);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
