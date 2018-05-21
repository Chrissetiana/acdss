-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 12, 2013 at 03:11 AM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `acdss`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(15) DEFAULT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `mname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `age` int(2) DEFAULT NULL,
  `bdate` date DEFAULT NULL,
  `bplace` varchar(50) DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `religion` enum('Aglipayan','Ang Dating Daan','Assemblies of God','Atheists','Baptist World Alliance','Buddhists','Chinese','Church of Jesus Christ and the Latter Day Saints','Church of the Nazarene','El Shaddai','Evangelical','God World Missions Church','Hindu','Iglesia ni Cristo','Jehovahs Witnesses','Judaism','Lutheran Church in the Philippines','Mennonites','Methodist','Mount Banahaw Holy Confederation','Muslim','Other Christian Denominations Combined','Philippine Benevolent Missionary Association','Philippine Episcopal Church','Presbyterian','Protestants','Rizalistas','Roman Catholic','Seventh-Day Adventists','Unitarian','United Church of Christ in the Philippines','Worldwide Church of God') DEFAULT NULL,
  `brgy` enum('Bagong Nayon','Beverly Hills','Calawis','Cupang','Dalig','Dela Paz','Inarawan','Mambugan','Mayamot','Munting Dilao','San Isidro','San Jose','San Juan','San Luis','San Roque','Sta Cruz') DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `telno` varchar(10) DEFAULT NULL,
  `mobile_no` varchar(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `educ` enum('Elementary Level','Elementary Grad','Highschool Level','Highscool Grad','College Level','College Grad','Post Grad','Vocational','None') DEFAULT NULL,
  `job_title` varchar(50) DEFAULT NULL,
  `month_year` varchar(50) DEFAULT NULL,
  `employment` enum('Contractual','Regular','Self_Employed','Seasonal') DEFAULT NULL,
  `employer` enum('Semi Private','Private','Public') DEFAULT NULL,
  `skill` enum('Political Official','Manager','Professional','Technician','Clerk','Service Worker','Agricultural','Industrial','Assembler','Labor','Unskilled','Special Occupation','Nurse') DEFAULT NULL,
  `income` int(7) DEFAULT NULL,
  `civilstat` enum('Civil Union','Divorced','Married','Separated','Single','Widow') DEFAULT NULL,
  `residence` enum('Owned','Rented','FreeLodger') DEFAULT NULL,
  `dep_name` text,
  `dep_age` text,
  `dep_rel` text,
  `dep_educ` text,
  `dep_occupation` text,
  `org_name` varchar(50) DEFAULT NULL,
  `org_position` varchar(50) DEFAULT NULL,
  `org_address` varchar(100) DEFAULT NULL,
  `org_contact_person` varchar(50) DEFAULT NULL,
  `org_contact_address` varchar(50) DEFAULT NULL,
  `sss` varchar(50) DEFAULT NULL,
  `gsis` varchar(50) DEFAULT NULL,
  `philhealth` varchar(50) DEFAULT NULL,
  `pagibig` varchar(50) DEFAULT NULL,
  `info_source` varchar(100) DEFAULT NULL,
  `client_relation` varchar(50) DEFAULT NULL,
  `assistance` enum('Burial','Financial','Medical') DEFAULT NULL,
  `budget` int(7) DEFAULT NULL,
  `reason` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post` enum('Registered','Pending','Approved','Reapply') NOT NULL DEFAULT 'Registered',
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `clients`
--


-- --------------------------------------------------------

--
-- Table structure for table `directory`
--

CREATE TABLE IF NOT EXISTS `directory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `office` enum('City Accounting','City Administrator','City Budget','City Social Welfare and Development','City Treasury') DEFAULT NULL,
  `floors` enum('City Hall - 1st Floor','City Hall - 2nd Floor','City Hall - 3rd Floor','City Hall - 4th Floor','GAD Center - 1st Floor') DEFAULT NULL,
  `telno` varchar(10) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `oic` varchar(255) DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Link to Offices' AUTO_INCREMENT=6 ;

--
-- Dumping data for table `directory`
--

INSERT INTO `directory` (`id`, `office`, `floors`, `telno`, `email`, `oic`, `status`) VALUES
(1, 'City Accounting', 'City Hall - 1st Floor', '689-45(21)', '<br />', 'Ms. Prescila P. Sangalang', 'Active'),
(2, 'City Administrator', 'City Hall - 2nd Floor', '689-45(17)', 'city_administrator@antipolo.gov.ph', 'Mr. Melvin A. Cruz - OIC', 'Active'),
(3, 'City Budget', 'City Hall - 2nd Floor', '689-45(48)', 'mavicleyva@antipolo.gov.ph<br>budgetoffice@antipolo.gov.ph', 'Ms. Maura Marivic S. Leyva', 'Active'),
(4, 'City Social Welfare and Development', 'GAD Center - 1st Floor', '689-45(65)', 'nadeiasarte@antipolo.gov.ph<br>cswd@antipolo.gov.ph', 'Ms. Nadeia S. Sarte - OIC', 'Active'),
(5, 'City Treasury', 'City Hall - 1st Floor', '689-45(41)', 'josiedejesus@antipolo.gov.ph<br>citytreasurer@antipolo.gov.ph', 'Ms. Josefina O. De Jesus', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE IF NOT EXISTS `faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text,
  `answer` text,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Frequently Asked Questions' AUTO_INCREMENT=11 ;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `status`) VALUES
(1, 'What is CSWD?', '', 'Active'),
(2, 'How do I get their benefits?', '', 'Active'),
(3, 'What are the available benefits CSWD is offering?', '', 'Active'),
(4, 'How do I know if I might be eligible for the benefits offered?', '', 'Active'),
(5, 'How do I apply for a specific services?', '', 'Active'),
(6, 'Can CSWD deposit the money into my bank account?', '', 'Active'),
(7, 'Where do I cash my cheque if I do not have a bank account?', '', 'Active'),
(8, 'Who can I call if have a concern about a certain service offered?', '', 'Active'),
(9, 'Does CSWD help other people who aren''t eligible for any services offered?', '', 'Active'),
(10, 'How much money can I get from any services offered?', '', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `gender` enum('Female','Male','Not Specified') DEFAULT NULL,
  `rating` int(1) DEFAULT NULL,
  `comments` text,
  `dateposted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Comments / Suggestions' AUTO_INCREMENT=20 ;

--
-- Dumping data for table `feedback`
--


-- --------------------------------------------------------

--
-- Table structure for table `flow`
--

CREATE TABLE IF NOT EXISTS `flow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dept` varchar(100) DEFAULT NULL,
  `input` varchar(100) DEFAULT NULL,
  `process` varchar(100) DEFAULT NULL,
  `output` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `flow`
--

INSERT INTO `flow` (`id`, `dept`, `input`, `process`, `output`) VALUES
(1, 'CSWD', 'Requirements', 'Validation and Verification', 'Letter of Guarantee (referral)'),
(2, 'ADMIN', 'Processed Client Info', 'Re-checking', 'Approval (voucher) / *Obligation Request'),
(3, 'BUDGET', 'Request for Appropriation', 'Check Funds', 'Approval (obligation form)'),
(4, 'ACCOUNTING', 'Client Documents', 'Final Check of Documents', 'Approval (disbursement)'),
(5, 'TREASURY', 'Voucher / Disbursement Form', 'Process Cash Assistance', 'Cheque');

-- --------------------------------------------------------

--
-- Table structure for table `legal`
--

CREATE TABLE IF NOT EXISTS `legal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tc` text,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Legal Terms' AUTO_INCREMENT=14 ;

--
-- Dumping data for table `legal`
--

INSERT INTO `legal` (`id`, `tc`, `status`) VALUES
(1, 'Welcome to our website. If you continue to browse and use this website you are agreeing to comply with and be bound by the following terms and conditions of use, which together with our privacy policy govern ACDSSs relationship with you in relation to this website.', 'Active'),
(2, 'The term "ACDSS" or "us" or "we" refers to the registered office located at 1st Floor GAD BLDG., Antipolo City Government Building M.L. Quezon Corner Carigma Street, Antipolo City. The term "you" refers to the user or viewer of our website.', 'Active'),
(3, 'The use of this website is subject to the following terms of use:', 'Active'),
(4, 'The content of the pages of this website is for your general information and use only. It is subject to change without notice.', 'Active'),
(5, 'Neither we nor any third parties provide any warranty or guarantee as to the accuracy, timeliness, performance, completeness or suitability of the information and materials found or offered on this website for any particular purpose. You acknowledge that such information and materials may contain inaccuracies or errors and we expressly exclude liability for any such inaccuracies or errors to the fullest extent permitted by law.', 'Active'),
(6, 'Your use of any information or materials on this website is entirely at your own risk, for which we shall not be liable. It shall be your own responsibility to ensure that any products, services or information available through this website meet your specific requirements.', 'Active'),
(7, 'This website contains material which is owned by or licensed to us. This material includes, but is not limited to, the design, layout, look, appearance and graphics. Reproduction is prohibited other than in accordance with the copyright notice, which forms part of these terms and conditions.', 'Active'),
(8, 'All trademarks reproduced in this website, which are not the property of, or licensed to the operator, are acknowledged on the website.', 'Active'),
(9, 'Unauthorised use of this website may give to a claim for damages and/or be a criminal offence.', 'Active'),
(10, 'From time to time this website may also include links to other websites. These links are provided for your convenience to provide further information. They do not signify that we endorse the website(s). We have no responsibility for the content of the linked website(s).', 'Active'),
(11, 'You may not create a link to this website from another website or document without ACDSS prior written consent.', 'Active'),
(12, 'Your use of this website and any dispute arising out of such use of the website is subject to the laws of the Philippine government', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `username` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `activity` varchar(50) DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='[Trigger] Table for Monitoring User Access' AUTO_INCREMENT=284 ;

--
-- Dumping data for table `log`
--


-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE IF NOT EXISTS `requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(15) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `approved_assistance` varchar(255) DEFAULT NULL,
  `approved_budget` double(7,2) DEFAULT NULL,
  `mode` enum('Cash','Check','LOG') DEFAULT NULL,
  `source` enum('Regular','Donation','Priority Fund') DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `requests`
--


-- --------------------------------------------------------

--
-- Table structure for table `requirements`
--

CREATE TABLE IF NOT EXISTS `requirements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(15) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `assistance` enum('Burial','Financial','Medical','OSY','PWD') DEFAULT NULL,
  `birth_cert` varchar(100) DEFAULT NULL,
  `brgy_clearance` varchar(100) DEFAULT NULL,
  `cedula` varchar(100) DEFAULT NULL,
  `checkup_sched` varchar(100) DEFAULT NULL,
  `clinical_abstract` varchar(100) DEFAULT NULL,
  `comelec_voter` varchar(100) DEFAULT NULL,
  `death_cert` varchar(100) DEFAULT NULL,
  `doctors_prescription` varchar(100) DEFAULT NULL,
  `funeral_contract` varchar(100) DEFAULT NULL,
  `hosp_bill` varchar(100) DEFAULT NULL,
  `indigency_cert` varchar(100) DEFAULT NULL,
  `valid_id` varchar(100) DEFAULT NULL,
  `pic` varchar(100) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`id`),
  FULLTEXT KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 ;

--
-- Dumping data for table `requirements`
--


-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `division` enum('Relief and Public Assistance Division','Community Outreach Division','Residential and Rehabilitation Division','Special Programs and Projects') DEFAULT NULL,
  `description` text,
  `min_range` int(11) DEFAULT NULL,
  `max_range` int(11) DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Programs and Services' AUTO_INCREMENT=15 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `division`, `description`, `min_range`, `max_range`, `status`) VALUES
(1, 'Assistance in Crisis Situation', 'Relief and Public Assistance Division', 'Relief assistance refers to the provision of timely and appropriate food (covering at least one and a half day subsistence) and non-food commodities to victims of natural or man-made calamities or any form of distressed situation to prevent starvation or nutritional decline or health and security hazards.', 5000, 10000, 'Active'),
(2, 'Balik-Probinsya Assistance', 'Relief and Public Assistance Division', 'There were 24 indigent individuals provided with Balik-Probinsya Assistance for this year.', 5000, 10000, 'Active'),
(3, 'Core Shelter Assistance', 'Relief and Public Assistance Division', 'Day Center for Street Children cum CICL Custodial Care Shelter - This center was established to provide temporary shelter and rehabilitation facility to Antipolo street children rescued during Oplan Sagip Taong- Lansangan Operation and Children In Conflict With the Law who were referred by the Philippines National Police and other referring individual, group, and organization. Several activities were also conducted to facilitate behavioral transformation and rehabilitation of these children. These are the following services: Residential Services, Spiritual and Value Formation and Psycho-social Service.\r\n\r\n<br />\r\n\r\nThis center is located at the back of the Public order and Safety Department (POSD) near Antipolo Public Market, since its operation last May 2009, it served a total of 1, 896 Street Children & CICL.', 5000, 15000, 'Active'),
(4, 'Emergency Disaster Relief', 'Relief and Public Assistance Division', 'A total of 5,610 received this assistance this 2011. These were victims of disasters/calamities.', 10000, 20000, 'Active'),
(5, 'Emergency Shelter Assistance', 'Relief and Public Assistance Division', 'For the whole year of 2011, there were 264 homeless families who were victims of typhoon Pedring, Re-blocking, and Fire extended with Emergency Shelter Assistance.', 10000, 30000, 'Active'),
(6, 'Children and Youth Development Program', 'Community Outreach Division', 'For the whole year of 2011, there were four hundred sixty seven (467) OSY''s registered and active officers and members of the Pag-asa Youth Association of the Philippines- Antipolo Chapter.', 10000, 20000, 'Active'),
(7, 'Family and Community Development Program', 'Community Outreach Division', 'Social Services to Solo parents. Antipolo City has a total of 692 Solo parents who registered and issued a Solo Parent I.D. from 2005-2011.', 10000, 20000, 'Active'),
(8, 'Persons with Disability Development Program', 'Community Outreach Division', 'A total of 1,591 PWD"s registered at Person"s with Disability Affairs Office for 2011. In addition, the National Disability Prevention and Rehabilitation (NDPR) Week was held last July 28, 2011 with ex-Governor Grace Padaca as the Special Guest Speaker.', 5000, 15000, 'Active'),
(9, 'Senior Citizen''s Development Program', 'Community Outreach Division', 'For the year 2011, the City has a total of 6,493 Senior Citizens based on the number of I.D. card issued.', 5000, 15000, 'Active'),
(10, 'Women''s Welfare Program', 'Community Outreach Division', 'For 2011, a total of 31 cases of Violation Against Women and their Children (VAWC) recorded in this office.\r\n\r\n<br />\r\n\r\nWomen''s Month Celebration. In the celebration of Women"s Month, Blood Letting was conducted with a theme "Alay Kay Nanay, Dugong Pangdugtong ng Buhay" on March 2011.', 5000, 10000, 'Active'),
(11, 'Pantawid Pamilyang Pilipino Program', 'Special Programs and Projects', 'Around 250 families from six (6) different barangays benefited from the national government''s program Pantawid Pamilyang Pilipino Program (4 Ps) through the local government led by Antipolo City Mayor Nilo Leyble, Vice Mayor Susan Say and Councilor Marvin Garcia.\r\n\r\n<br />\r\n\r\nThe 4Ps program is a poverty reduction strategy that provides grants to extremely poor households to improve their health, nutrition and education particularly of children under four years old under the monitoring of the DSWD in coordination with the City Social Welfare Development Office (CSWDO) headed by Nadeia Sarte.\r\n\r\n<br />\r\n\r\nThe program also aims to provide monetary aid to poor beneficiaries with the hope that these investments in human capital would lessen the great financial divide between the rich and the poor.\r\n\r\n<br />\r\n\r\n"Muli ang pagbati sa lahat ng pamilyang nabiyayaan ng programang 4Ps o Pantawid Pamilyang Pilipino Program mula sa ating nasyonal na pamahalaan sa pamumuno ng ating Pangulong Benigno Aquino. Sana makatulong ito sa inyo at sana rin alalahanin natin na ang programang ito ay upang mabawasan ang kahirapan at hindi upang maging sandigan na lang habang buhay dapat matuto din tayong magtrabaho," said Mayor Nilo.\r\n\r\n<br />\r\n\r\nUnder the program a household-beneficiary can receive as much as P1,400 that include P500 per month for nutrition and health expenses and P300 per month per child (with a maximum of three children per household). Household beneficiaries must comply with certain conditions to continue receiving cash grants which can go on for a maximum of five years.\r\n\r\n<br />\r\n\r\nThe conditions under the program are parents must ensure that their children attend school at least 85% of the time and receive vaccinations and health care. For pregnant women they must receive pre and post natal care and be attended during childbirth by a skilled health professional. At the same time parents must attend responsible parenthood seminars, mother''s classes and parent effectiveness seminars.\r\n\r\n<br />\r\n\r\nPantawid Pamilya is geared towards attaining five of the eight Millennium Development Goals: (1) eradicate extreme poverty and hunger, (2) achieve Universal Primary Education, (3) promote gender equality and empower women, (4) reduce child mortality, and (5) improve maternal health and promote the department''s commitment to United Nations'' Convention on the Rights of Children. (Public Information Office-Antipolo).', 20000, 30000, 'Active'),
(12, 'Issuance of Certificates, Referrals, Reports', 'Special Programs and Projects', 'Issuance of Certificate of Guardianship. A Total 282 Certificate of Guardianship issued to Antipolo residents for the year 2011.\r\n\r\n<br />\r\n\r\nIssuance of Certificate of Indigency. For 2011, a total of 332 Certificate Indigency issued to Antipolo residents.\r\n\r\n<br />\r\n\r\nIssuance of Referral Letter. A Total 221 Referral Letter issued to Antipolo residents this year 2011.\r\n\r\n<br />\r\n\r\nIssuance of Social Case Study Report. A Total 2,621 Social Case Study issued to Antipolo residents this 2011.', 5000, 10000, 'Active'),
(13, 'Bahay Kalinga-Antipolo Center for Girls', 'Residential and Rehabilitation Division', 'This center has been in operation for nine (9) years now. It was established to provide livelihood. Last December 28, 2011, BK Founding Anniversary was held.', 5000, 20000, 'Active'),
(14, 'Day Center for Street Children cum CICL Custodial Care Shelter', 'Residential and Rehabilitation Division', 'This center was established to provide temporary shelter and rehabilitation facility to Antipolo street children rescued during Oplan Sagip Taong- Lansangan Operation and Children In Conflict With the Law who were referred by the Philippines National Police and other referring individual, group, and organization. Several activities were also conducted to facilitate behavioral transformation and rehabilitation of these children. These are the following services: Residential Services, Spiritual and Value Formation and Psycho-social Service. This center is located at the back of the Public order and Safety Department (POSD) near Antipolo Public Market, since its operation last May 2009, it served a total of 1, 896 Street Children & CICL.', 10000, 30000, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(15) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `type` enum('Administrator','Client','CSWD','CADMIN','CBUDGET','CACCTG','CTRSRY') DEFAULT NULL,
  `dateAdded` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uid` (`uid`),
  FULLTEXT KEY `username` (`username`),
  FULLTEXT KEY `username_2` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=111 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uid`, `username`, `password`, `type`, `dateAdded`, `status`) VALUES
(1, 'pepper111392', 'Pepper', 'b3f952d5d9adea6f63bee9d4c6fceeaa', 'Administrator', '2013-02-12 17:41:16', 'Active'),
(2, 'maia112892', 'Maia', 'cb6caa35194aee95fffa72f737c4fabb', 'Administrator', '2013-02-12 17:41:16', 'Active'),
(3, 'marko112491', 'Marko', 'c28aa76990994587b0e907683792297c', 'Administrator', '2013-02-12 17:41:16', 'Active'),
(4, 'cswd', 'Cswd', 'eebe97c2edfe84e21622b6e81863cf42', 'CSWD', '2013-02-12 17:41:16', 'Active'),
(5, 'cadmin', 'Cadmin', '441a5fb76039cb8cc1e0e58825edfcbf', 'CADMIN', '2013-02-12 17:41:16', 'Active'),
(6, 'cbudget', 'Cbudget', '119dc47c1fd38cf2dc95c3e350f6f2ec', 'CBUDGET', '2013-02-12 17:41:16', 'Active'),
(7, 'cacctg', 'Cacctg', '4f2f7bb33b40d0180ffd7434615a050d', 'CACCTG', '2013-02-12 17:41:16', 'Active'),
(8, 'ctrsry', 'Ctrsry', '9023e1b9658a30ade4cc7d6352f5124e', 'CTRSRY', '2013-02-12 17:41:16', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE IF NOT EXISTS `voucher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(255) DEFAULT NULL,
  `issuedby` varchar(255) DEFAULT NULL,
  `issuedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `allotment` enum('Checked','Undone') DEFAULT NULL,
  `requirements` enum('Checked','Undone') DEFAULT NULL,
  `updatedby` varchar(255) DEFAULT NULL,
  `updatedon` varchar(255) NOT NULL,
  `finalizedby` varchar(255) DEFAULT NULL,
  `finalizedon` varchar(20) DEFAULT NULL,
  `okfunds` enum('Checked','Undone') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `voucher`
--

