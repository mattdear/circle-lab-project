-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2020 at 04:03 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartmedicalmanagementsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `security_level` int(11) NOT NULL,
  `security_question` enum('birth town','first job','mothers maiden name') NOT NULL,
  `security_answer` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `duration` int(11) NOT NULL,
  `date` date NOT NULL,
  `location_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `diease_drug_link`
--

CREATE TABLE `diease_drug_link` (
  `id` int(11) NOT NULL,
  `disease_id` int(11) NOT NULL,
  `drug_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `disease`
--

CREATE TABLE `disease` (
  `id` int(11) NOT NULL,
  `ref_number` int(11) NOT NULL,
  `name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `disease_patient_link`
--

CREATE TABLE `disease_patient_link` (
  `id` int(11) NOT NULL,
  `disease_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `disease_prescription_patient_link`
--

CREATE TABLE `disease_prescription_patient_link` (
  `id` int(11) NOT NULL,
  `disease_patient_id` int(11) NOT NULL,
  `prescription_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `disease_symptom_link`
--

CREATE TABLE `disease_symptom_link` (
  `id` int(11) NOT NULL,
  `disease_id` int(11) NOT NULL,
  `symptom_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `disease_treatment_link`
--

CREATE TABLE `disease_treatment_link` (
  `id` int(11) NOT NULL,
  `disease_id` int(11) NOT NULL,
  `treatment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `disease_treatment_patient_link`
--

CREATE TABLE `disease_treatment_patient_link` (
  `id` int(11) NOT NULL,
  `disease_patient_id` int(11) NOT NULL,
  `treatment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `specialism` enum('anaesthesiology','dermatology','diagnostic','neurology','gynaecology','ophthalmology') NOT NULL,
  `person_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `drug`
--

CREATE TABLE `drug` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` enum('stimulant','sedative','opioid','anti-depressant','painkiller','other') NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `drug_pharmacy_link`
--

CREATE TABLE `drug_pharmacy_link` (
  `id` int(11) NOT NULL,
  `drug_id` int(11) NOT NULL,
  `pharmacy_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `drug_prescription_link`
--

CREATE TABLE `drug_prescription_link` (
  `id` int(11) NOT NULL,
  `drug_id` int(11) NOT NULL,
  `prescription_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `government`
--

CREATE TABLE `government` (
  `id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `latitude` int(11) NOT NULL,
  `longitude` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nurse`
--

CREATE TABLE `nurse` (
  `id` int(11) NOT NULL,
  `specialism` enum('anaesthesiology','dermatology','diagnostic','neurology','gynaecology','ophthalmology') NOT NULL,
  `person_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `medical_history` varchar(255) NOT NULL,
  `person_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `id` int(11) NOT NULL,
  `ref_num` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `height` float NOT NULL,
  `weight` float NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `date_of_birth` date NOT NULL,
  `ethnicity` enum('english','welsh','northern irish','british irish','gypsy or irish traveller','any other white background','white and black caribbean','white and black african','white and asian','any other mixed/multiple ethnic background','indian','pakistani','bangladeshi','chinese','any other asian background','african','caribbean','any other black/african/caribbean background','arab','any other ethnic group') NOT NULL,
  `eye_colour` enum('blue','black','brown','pink','blonde','red','green','other') NOT NULL,
  `hair_colour` enum('blue','black','brown','pink','blonde','red','green','other') NOT NULL,
  `private_email` varchar(255) NOT NULL,
  `work_email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `work_number` varchar(255) NOT NULL,
  `location_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy`
--

CREATE TABLE `pharmacy` (
  `id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `reference` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `stauts` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `regulatory_body`
--

CREATE TABLE `regulatory_body` (
  `id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `approval_status` enum('approved','denied','awaiting approval') NOT NULL,
  `person_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `researcher`
--

CREATE TABLE `researcher` (
  `id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `symptom`
--

CREATE TABLE `symptom` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

CREATE TABLE `treatment` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_account_person_id_person_id` (`person_id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_appointment_patient_id_patient_id` (`patient_id`),
  ADD KEY `FK_appointment_doctor_id_doctor_id` (`doctor_id`),
  ADD KEY `FK_appointment_location_id_location_id` (`location_id`);

--
-- Indexes for table `diease_drug_link`
--
ALTER TABLE `diease_drug_link`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_disease_drug_link_disease_id_disease_id` (`disease_id`),
  ADD KEY `FK_disease_drug_link_drug_id_drug_id` (`drug_id`);

--
-- Indexes for table `disease`
--
ALTER TABLE `disease`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disease_patient_link`
--
ALTER TABLE `disease_patient_link`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_disease_patient_link_disease_id_disease_id` (`disease_id`),
  ADD KEY `FK_disease_patient_link_patient_id_patient_id` (`patient_id`);

--
-- Indexes for table `disease_prescription_patient_link`
--
ALTER TABLE `disease_prescription_patient_link`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_dpp_link_dp_id_dpl_id` (`disease_patient_id`),
  ADD KEY `FK_dpp_link_prescription_id_prescription_id` (`prescription_id`);

--
-- Indexes for table `disease_symptom_link`
--
ALTER TABLE `disease_symptom_link`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_disease_symptom_link_disease_id_disease_id` (`disease_id`),
  ADD KEY `FK_disease_symptom_link_symptom_id_symptom_id` (`symptom_id`);

--
-- Indexes for table `disease_treatment_link`
--
ALTER TABLE `disease_treatment_link`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_disease_treatment_link_disease_id_disease_id` (`disease_id`),
  ADD KEY `FK_disease_treatment_link_treatment_id_treatment_id` (`treatment_id`);

--
-- Indexes for table `disease_treatment_patient_link`
--
ALTER TABLE `disease_treatment_patient_link`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_dtpl_dp_id_dp_id` (`disease_patient_id`),
  ADD KEY `FK_dtpl_treatment_id_treatment_id` (`treatment_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_doctor_person_id_person_id` (`person_id`);

--
-- Indexes for table `drug`
--
ALTER TABLE `drug`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drug_pharmacy_link`
--
ALTER TABLE `drug_pharmacy_link`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_drug_pharmacy_link_drug_id_drug_id` (`drug_id`),
  ADD KEY `FK_drug_pharmacy_link_pharmacy_id_pharmacy_id` (`pharmacy_id`);

--
-- Indexes for table `drug_prescription_link`
--
ALTER TABLE `drug_prescription_link`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_drug_prescription_link_drug_id_drug_id` (`drug_id`),
  ADD KEY `FK_drug_prescription_link_prescription_id_prescription_id` (`prescription_id`);

--
-- Indexes for table `government`
--
ALTER TABLE `government`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_government_person_id_person_id` (`person_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nurse`
--
ALTER TABLE `nurse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_nurse_person_id_person_id` (`person_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_patient_person_id_person_id` (`person_id`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_person_location_id_location_id` (`location_id`);

--
-- Indexes for table `pharmacy`
--
ALTER TABLE `pharmacy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_pharmacy_location_id_location_id` (`location_id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_prescription_patient_id_patient_id` (`patient_id`),
  ADD KEY `FK_prescription_doctor_id_doctor_id` (`doctor_id`);

--
-- Indexes for table `regulatory_body`
--
ALTER TABLE `regulatory_body`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_regulatory_body_person_id_person_id` (`person_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD KEY `FK_report_person_id_person_id` (`person_id`);

--
-- Indexes for table `researcher`
--
ALTER TABLE `researcher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_researcher_person_id_person_id` (`person_id`);

--
-- Indexes for table `symptom`
--
ALTER TABLE `symptom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `treatment`
--
ALTER TABLE `treatment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `diease_drug_link`
--
ALTER TABLE `diease_drug_link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `disease`
--
ALTER TABLE `disease`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `disease_patient_link`
--
ALTER TABLE `disease_patient_link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `disease_prescription_patient_link`
--
ALTER TABLE `disease_prescription_patient_link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `disease_symptom_link`
--
ALTER TABLE `disease_symptom_link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `disease_treatment_link`
--
ALTER TABLE `disease_treatment_link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `disease_treatment_patient_link`
--
ALTER TABLE `disease_treatment_patient_link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `drug`
--
ALTER TABLE `drug`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `drug_pharmacy_link`
--
ALTER TABLE `drug_pharmacy_link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `drug_prescription_link`
--
ALTER TABLE `drug_prescription_link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `government`
--
ALTER TABLE `government`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nurse`
--
ALTER TABLE `nurse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pharmacy`
--
ALTER TABLE `pharmacy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `regulatory_body`
--
ALTER TABLE `regulatory_body`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `researcher`
--
ALTER TABLE `researcher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `symptom`
--
ALTER TABLE `symptom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `treatment`
--
ALTER TABLE `treatment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `FK_account_person_id_person_id` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`);

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `FK_appointment_doctor_id_doctor_id` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`id`),
  ADD CONSTRAINT `FK_appointment_location_id_location_id` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`),
  ADD CONSTRAINT `FK_appointment_patient_id_patient_id` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`id`);

--
-- Constraints for table `diease_drug_link`
--
ALTER TABLE `diease_drug_link`
  ADD CONSTRAINT `FK_disease_drug_link_disease_id_disease_id` FOREIGN KEY (`disease_id`) REFERENCES `disease` (`id`),
  ADD CONSTRAINT `FK_disease_drug_link_drug_id_drug_id` FOREIGN KEY (`drug_id`) REFERENCES `drug` (`id`);

--
-- Constraints for table `disease_patient_link`
--
ALTER TABLE `disease_patient_link`
  ADD CONSTRAINT `FK_disease_patient_link_disease_id_disease_id` FOREIGN KEY (`disease_id`) REFERENCES `disease` (`id`),
  ADD CONSTRAINT `FK_disease_patient_link_patient_id_patient_id` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`id`);

--
-- Constraints for table `disease_prescription_patient_link`
--
ALTER TABLE `disease_prescription_patient_link`
  ADD CONSTRAINT `FK_dpp_link_dp_id_dpl_id` FOREIGN KEY (`disease_patient_id`) REFERENCES `disease_patient_link` (`id`),
  ADD CONSTRAINT `FK_dpp_link_prescription_id_prescription_id` FOREIGN KEY (`prescription_id`) REFERENCES `prescription` (`id`);

--
-- Constraints for table `disease_symptom_link`
--
ALTER TABLE `disease_symptom_link`
  ADD CONSTRAINT `FK_disease_symptom_link_disease_id_disease_id` FOREIGN KEY (`disease_id`) REFERENCES `disease` (`id`),
  ADD CONSTRAINT `FK_disease_symptom_link_symptom_id_symptom_id` FOREIGN KEY (`symptom_id`) REFERENCES `symptom` (`id`);

--
-- Constraints for table `disease_treatment_link`
--
ALTER TABLE `disease_treatment_link`
  ADD CONSTRAINT `FK_disease_treatment_link_disease_id_disease_id` FOREIGN KEY (`disease_id`) REFERENCES `disease` (`id`),
  ADD CONSTRAINT `FK_disease_treatment_link_treatment_id_treatment_id` FOREIGN KEY (`treatment_id`) REFERENCES `treatment` (`id`);

--
-- Constraints for table `disease_treatment_patient_link`
--
ALTER TABLE `disease_treatment_patient_link`
  ADD CONSTRAINT `FK_dtpl_dp_id_dp_id` FOREIGN KEY (`disease_patient_id`) REFERENCES `disease_patient_link` (`id`),
  ADD CONSTRAINT `FK_dtpl_treatment_id_treatment_id` FOREIGN KEY (`treatment_id`) REFERENCES `treatment` (`id`);

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `FK_doctor_person_id_person_id` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`);

--
-- Constraints for table `drug_pharmacy_link`
--
ALTER TABLE `drug_pharmacy_link`
  ADD CONSTRAINT `FK_drug_pharmacy_link_drug_id_drug_id` FOREIGN KEY (`drug_id`) REFERENCES `drug` (`id`),
  ADD CONSTRAINT `FK_drug_pharmacy_link_pharmacy_id_pharmacy_id` FOREIGN KEY (`pharmacy_id`) REFERENCES `pharmacy` (`id`);

--
-- Constraints for table `drug_prescription_link`
--
ALTER TABLE `drug_prescription_link`
  ADD CONSTRAINT `FK_drug_prescription_link_drug_id_drug_id` FOREIGN KEY (`drug_id`) REFERENCES `drug` (`id`),
  ADD CONSTRAINT `FK_drug_prescription_link_prescription_id_prescription_id` FOREIGN KEY (`prescription_id`) REFERENCES `prescription` (`id`);

--
-- Constraints for table `government`
--
ALTER TABLE `government`
  ADD CONSTRAINT `FK_government_person_id_person_id` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`);

--
-- Constraints for table `nurse`
--
ALTER TABLE `nurse`
  ADD CONSTRAINT `FK_nurse_person_id_person_id` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`);

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `FK_patient_person_id_person_id` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`);

--
-- Constraints for table `person`
--
ALTER TABLE `person`
  ADD CONSTRAINT `FK_person_location_id_location_id` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`);

--
-- Constraints for table `pharmacy`
--
ALTER TABLE `pharmacy`
  ADD CONSTRAINT `FK_pharmacy_location_id_location_id` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`);

--
-- Constraints for table `prescription`
--
ALTER TABLE `prescription`
  ADD CONSTRAINT `FK_prescription_doctor_id_doctor_id` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`id`),
  ADD CONSTRAINT `FK_prescription_patient_id_patient_id` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`id`);

--
-- Constraints for table `regulatory_body`
--
ALTER TABLE `regulatory_body`
  ADD CONSTRAINT `FK_regulatory_body_person_id_person_id` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`);

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `FK_report_person_id_person_id` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`);

--
-- Constraints for table `researcher`
--
ALTER TABLE `researcher`
  ADD CONSTRAINT `FK_researcher_person_id_person_id` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
