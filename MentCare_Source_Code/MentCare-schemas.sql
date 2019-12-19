CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `userFirstName` varchar(255) DEFAULT NULL,
  `userLastName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`userID`)
);

CREATE TABLE `userroles` (
  `userID` int(11) DEFAULT NULL,
  `userPosition` varchar(255) NOT NULL,
  `userpassword` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`userPosition`),
  KEY `userroles_fk` (`userID`),
  CONSTRAINT `userroles_fk` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`)
);

CREATE TABLE `appointments` (
  `appointmentID` int(11) NOT NULL,
  `situation` varchar(255) DEFAULT NULL,
  `attendenceStatus` varchar(255) DEFAULT NULL,
  `costs` double DEFAULT NULL,
  `dates` date DEFAULT NULL,
  PRIMARY KEY (`appointmentID`)
);

CREATE TABLE `patientinfo` (
  `appointmentID` int(11) DEFAULT NULL,
  `homeAddress` varchar(255) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `inOut` varchar(255) DEFAULT NULL,
  `sectioned` varchar(255) DEFAULT NULL,
  `historyID` varchar(255) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  KEY `patientinfo_fk_1` (`appointmentID`),
  KEY `patientinfo_fk2` (`userID`),
  CONSTRAINT `patientinfo_fk2` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  CONSTRAINT `patientinfo_fk_1` FOREIGN KEY (`appointmentID`) REFERENCES `appointments` (`appointmentID`)
);

CREATE TABLE `calendar` (
  `dates` date NOT NULL,
  `availability` varchar(255) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  KEY `calendar_fk` (`userID`),
  CONSTRAINT `calendar_fk` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`)
);

CREATE TABLE `medication` (
  `medicationID` int(11) NOT NULL,
  `medication` varchar(255) DEFAULT NULL,
  `averageDose` varchar(255) DEFAULT NULL,
  `use` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`medicationID`)
);

CREATE TABLE `inventory` (
  `inventoryID` int(11) NOT NULL,
  `medication` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `medicationID` int(11) DEFAULT NULL,
  `medicationcount` int(11) DEFAULT NULL,
  PRIMARY KEY (`inventoryID`),
  KEY `inventory_fk` (`medicationID`),
  CONSTRAINT `inventory_fk` FOREIGN KEY (`medicationID`) REFERENCES `medication` (`medicationID`)
);
