-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 08, 2015 at 07:26 AM
-- Server version: 5.5.42-cll-lve
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project_db`
--
CREATE DATABASE IF NOT EXISTS `project_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `project_db`;

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--
-- Creation: Sep 30, 2015 at 05:03 AM
--

CREATE TABLE IF NOT EXISTS `blog` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_title` varchar(255) NOT NULL,
  `article_image` varchar(255) NOT NULL,
  `article_desc` longtext NOT NULL,
  `article_author` varchar(50) NOT NULL,
  `article_date` datetime NOT NULL,
  PRIMARY KEY (`article_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`article_id`, `article_title`, `article_image`, `article_desc`, `article_author`, `article_date`) VALUES
(1, 'Provide First Aid', 'images\\blog\\article_firstaid.jpg', '"Pneumo" means air (as in pneumatic) and "thorax" means chest, so pneumothorax simply means "air in the chest". However it is not air in the normal anatomy of the air passages, but air in the pleural cavity.<br/>\r\nAs result of underlying disease in the lung or injury such as stab wound or a gunshot wound, air enters the pleural cavity from either the lung or through a hole in the chest wall. Each time the casualty breathes in, air enters this cavity.\r\n<br/>\r\nAs air accumulates within the pleural cavity, the lung underneath collapses.\r\n<br/>\r\nOften the layers of the chest wall form a valve, so that air can enter the cavity but cannot exit via the same route. This causes tension within the pleural cavity and is called a tension pneumothorax, which is a medical emergency. If blood is also present in the cavity it is called a hemothorax.', 'Tester', '2015-08-23 22:14:00'),
(2, 'What is a pneumothorax? A first aid guide', 'images\\blog\\Pneumothorax.jpg', '''Pneumo'' means air (as in pneumatic) and ''thorax'' means chest, so pneumothorax simply means ''air in the chest''. However it is not air in the normal anatomy of the air passages, but air in the pleural cavity.<br/>\nAs result of underlying disease in the lung or injury such as stab wound or a gunshot wound, air enters the pleural cavity from either the lung or through a hole in the chest wall. Each time the casualty breathes in, air enters this cavity.\n<br/>\nAs air accumulates within the pleural cavity, the lung underneath collapses.\n<br/>\nOften the layers of the chest wall form a valve, so that air can enter the cavity but cannot exit via the same route. This causes tension within the pleural cavity and is called a tension pneumothorax, which is a medical emergency. If blood is also present in the cavity it is called a hemothorax.', 'Modi', '2015-09-23 02:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comment`
--
-- Creation: Oct 08, 2015 at 12:49 AM
--

CREATE TABLE IF NOT EXISTS `blog_comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_date` datetime NOT NULL,
  `comment_desc` mediumtext NOT NULL,
  `commentator_name` varchar(50) NOT NULL,
  `commentator_email` varchar(50) NOT NULL,
  `article_id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Hide',
  PRIMARY KEY (`comment_id`),
  KEY `article_id` (`article_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `blog_comment`
--

INSERT INTO `blog_comment` (`comment_id`, `comment_date`, `comment_desc`, `commentator_name`, `commentator_email`, `article_id`, `status`) VALUES
(1, '2015-09-10 05:15:18', 'Good article..Thanks for the information', 'Tony Abbott', 'tonyabbott_pm@gmail.com', 1, 'Show'),
(2, '2015-09-19 13:14:12', 'Hii..This is a comment', 'Obama', 'obama@gmail.com', 1, 'Show'),
(3, '2015-09-23 06:20:53', 'This is laden', 'Laden', 'laden@abc.com', 1, 'Show'),
(4, '2015-09-23 06:25:41', 'This is the first comment for this article', 'Raj', 'raj@gmail.com', 2, 'Show'),
(6, '2015-09-26 16:32:30', 'Helooo', 'Modi', 'modi@live.com', 2, 'Show'),
(10, '2015-09-28 04:19:53', 'Test comment', 'Raj', 'testmail@gmail.com', 1, 'Show'),
(11, '2015-10-07 22:46:04', 'Test comment', 'Test', 'test@gmail.com', 2, 'Show'),
(13, '2015-10-08 00:50:57', 'This is a test comment', 'Test1', 'test1@gmail.com', 2, 'Hide'),
(17, '2015-10-08 00:56:15', 'sdfdsf', 'testA', 'd@dd.com', 2, 'Hide'),
(18, '2015-10-08 00:58:30', 'sdfsdf', 'Hell', 'dfa@sf.com', 2, 'Hide'),
(19, '2015-10-08 04:09:12', 'efsdfsdfsd', 'raj', 'rajsekhar.300@gmail.com', 1, 'Show'),
(20, '2015-10-08 06:24:20', 'khjkbkjhkj\r\n', 'raj', 'gfhgf@gmail.com', 1, 'Show'),
(21, '2015-10-08 06:30:40', 'hjfjfjhfjh', 'test1', 'test1@gmail.com', 2, 'Show');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--
-- Creation: Sep 30, 2015 at 05:03 AM
--

CREATE TABLE IF NOT EXISTS `course` (
  `course_id` varchar(25) NOT NULL,
  `course_name` varchar(150) NOT NULL,
  `course_overview` mediumtext NOT NULL,
  `course_desc` longtext NOT NULL,
  `course_price` double NOT NULL,
  `course_duration` double NOT NULL,
  `course_image` varchar(255) NOT NULL,
  `course_prerequisite` text NOT NULL,
  `course_content` text NOT NULL,
  `course_certification` text NOT NULL,
  `course_support` text NOT NULL,
  `employee_id` int(11) NOT NULL,
  `course_status` varchar(4) NOT NULL,
  PRIMARY KEY (`course_id`),
  KEY `employee_id` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_overview`, `course_desc`, `course_price`, `course_duration`, `course_image`, `course_prerequisite`, `course_content`, `course_certification`, `course_support`, `employee_id`, `course_status`) VALUES
('22099VIC', 'Anaphylaxis', '(22099VIC) Course in First Aid Management of Anaphylaxis', 'All schools and childcare providers are required to have staff trained in Asthma Management and Anaphylaxis Awareness, ensuring a trained First Aider is immediately available at all times. Family Day Care providers ensure that all staff members are certified in both Asthma and Anaphylaxis. Does your employment require certification? Please refer to the Australian Childrens Education and Care Quality Authority website for details.', 10, 240, 'images\\courseimages\\anaphylaxis.jpg', 'Australia Wide First Aid`s Asthma and Anaphylaxis training is open to everyone. There are no prerequisites or previous experience required. We do ask students under 14 years of age to provide written statement from a parent or guardian granting them permission to attend the course.', '<strong>22099VIC Course in First Aid Management of Anaphylaxis</strong><br/>\r\nDuring this section of the Asthma and Anaphylaxis course, you will be educated on the skills and knowledge to recognise, treat and manage a severe life threatening allergic reaction (anaphylaxis).<br/><br/>\r\nSpecifically, the course will cover:<br/>Regulations and definitions of allergies and anaphylaxis<br/>\r\nCommon Allergy Triggers<br/>\r\nSigns and Symptoms<br/>\r\nThe importance and administration of Adrenaline Autoinjectors<br/>\r\n<strong>Materials</strong><br/>\r\nWithin the class, you will have the opportunity to practice using the equipment used to deliver treatment for Asthma symptoms and Anaphylaxis. These include Asthma Puffers, spacers, and Adrenaline auto-injectors.<br/>\r\n', 'If you complete an Asthma and Anaphylaxis course with Australia Wide First Aid, you will receive a Nationally Recognised Certificate of Attainment. The Australian Children Education and Care Quality Authority (ACECQA) recognises Australia Wide First Aid certificate as fulfilling the required requirements for Asthma and Anaphylaxis management within the workplace. For more information on the ACECQA requirements, please visit their website here.', 'We have put together some useful resources for Child Care Centres and Schools. Feel free to use these materials in educating staff and students about the importance of being prepared for any Asthma & Anaphylaxis emergency. See the full list of resources.<br/><br/>\r\n<strong>Anaphylaxis Articles:</strong><br/>\r\n - What is Anaphylaxis?<br/>\r\n - Anaphylaxis Triggers: How to Avoid Them<br/>', 1234, 'Show'),
('22282VIC', 'Asthma', '22282VIC Course in the Management of Asthma Risks and Emergencies in the Workplace. 22099VIC Course in First Aid of Anaphylaxis.', '22282VIC Course in the Management of Asthma Risks and Emergencies in the Workplace. 22099VIC Course in First Aid of Anaphylaxis.22282VIC Course in the Management of Asthma Risks and Emergencies in the Workplace. 22099VIC Course in First Aid of Anaphylaxis.22282VIC Course in the Management of Asthma Risks and Emergencies in the Workplace. 22099VIC Course in First Aid of Anaphylaxis.\r\n\r\n22282VIC Course in the Management of Asthma Risks and Emergencies in the Workplace. 22099VIC Course in First Aid of Anaphylaxis.22282VIC Course in the Management of Asthma Risks and Emergencies in the Workplace. 22099VIC Course in First Aid of Anaphylaxis.22282VIC Course in the Management of Asthma Risks and Emergencies in the Workplace. 22099VIC Course in First Aid of Anaphylaxis.22282VIC Course in the Management of Asthma Risks and Emergencies in the Workplace. 22099VIC Course in First Aid of Anaphylaxis.22282VIC Course in the Management of Asthma Risks and Emergencies in the Workplace. 22099VIC Course in First Aid of Anaphylaxis.', 300, 180, 'images\\courseimages\\provide_asthma.jpg', '<strong>NONE</strong><br/><br/>\r\nAustralia Wide First Aid`s Asthma and Anaphylaxis training is open to everyone. There are no prerequisites or previous experience required. We do ask students under 14 years of age to provide written statement from a parent or guardian granting them permission to attend the course.', '<strong>22282VIC Course in the Management of Asthma Risks and Emergencies in the Workplace</strong><br/><br/>\r\nThis course covers the knowledge and skills to recognise the clinical signs of asthma and how you can identify and respond to an asthma emergency. Australia Wide First Aid have been certified by the National Asthma Council of Australia as an authorised provider of Emergency Management of Asthma in the Workplace.<br/><br/>\r\nIn an Australia Wide First Aid Asthma Management course, you will learn:<br/>\r\n - The symptoms and triggers of an Asthma Attack<br/>\r\n - The different classes of Asthma Medication<br/>\r\n - The devices used to administer Asthma Medication<br/>\r\n - How to deliver First Aid Asthma<br/><br/>\r\n\r\n', 'If you complete an Asthma and Anaphylaxis course with Australia Wide First Aid, you will receive a Nationally Recognised Certificate of Attainment. The Australian Children Education and Care Quality Authority (ACECQA) recognises Australia Wide First Aid certificate as fulfilling the required requirements for Asthma and Anaphylaxis management within the workplace. For more information on the ACECQA requirements, please visit their website.', '<strong>Useful Asthma & Anaphylaxis Resources</strong><br/><br/>\r\nWe have put together some useful resources for Child Care Centres and Schools. Feel free to use these materials in educating staff and students about the importance of being prepared for any Asthma & Anaphylaxis emergency. See the full list of resources.<br/>', 2345, 'Show'),
('333', 'hghv', 'hv', 'hv', 111, 111, '', 'mnbmhb', 'mb', 'mb', 'mnbm', 0, 'Show'),
('HLTAID001', 'Provide CPR', 'HLTAID001 Provide CPR. Learn the skills to perform CPR.', 'Provide CPR or Cardio Pulmonary Resuscitation (CPR) provides students with the theoretical knowledge and practical skills required to respond to breathing and cardiac emergencies.\r\nCPR is taught as the first segment of the Provide First Aid Course and forms part of this qualification.', 350, 180, 'images\\courseimages\\provide_cpr.jpg', 'When you choose to do a first aid course with Australia Wide First Aid, everything you need to know will be covered on the day of the course. When you confirm your first aid course booking, you will receive access to Australia Wide First Aid first aid manual. This can be used for personal study and as a first aid reference.<br/><br/>\r\nAustralia Wide First Aid Provide CPR training is open to everyone. There are no prerequisites or previous experience required. We do ask students under 14 years of age to provide written statement from a parent or guardian granting them permission to attend the course.', 'Australia Wide First Aid believes in providing all attendees with hands on training experience. This course is competency based training and we aim to provide you with a sound knowledge of CPR. Our assessment is progressive through the course and involves multiple choice questionnaires, role-play and hands on demonstrations.<br/><br/>\r\n<strong>Professional Development and Accreditation</strong><br/>\r\nMany professions require you to have current CPR certification as a condition of professional registration or employment. In addition to this, some professional bodies award credits for continuing education or professional development. Please call our friendly staff on 1300 336 613 if you have a query about your profession.', 'Upon completion of the course, you will be issued with a Statement of Attainment to certify that you have been trained and shown competence in HLTAID001 Provide CPR. This competency based training described the skills and knowledge require to:<br/><br/>\r\nProvide CPR life support;<br/>\r\nManagement of a causality; and<br/>\r\nManagement of an incidence and other First Aiders until the arrival of medical or other assistance.', 'If you feel the need to acquire extra learning support, our trainers will be more than happy to assist you. Please ensure to mention when booking your course that you require an additional Learning Support.<br/><br/>\r\n<strong>Exercise and Sports Science Australia (ESSA) | 3 CPD points</strong><br/>\r\nThe BCITF provide funding support for those in the Building and Construction Industry in Western Australia to upgrade or maintain their skills. Eligible workers and employers in the Building and Construction industry can claim a rebate of 70% for the cost of their CPR training.<br/>\r\nFor more details and a copy of the claim form, please ask your trainer or call our staff on 1300 336 613. Alternatively, visit the BCITF website for full details.', 1234, 'Show'),
('HLTAID003', 'Provide First Aid', 'HLTAID003 Provide First Aid (Known previously as Senior First Aid or Apply First Aid).', 'Previously known as Apply First Aid, Senior First Aid or Level 2 Workplace First Aid<br/><br/>Australia Wide First Aid Provide First Aid course is the minimum requirement for workplace first aid compliance. \r\nThe Provide First Aid unit of competency provides you with the skills and knowledge required to provide first aid response, life support, management of casualty(s), the incident and other First Aiders until emergency qualified help arrives at the scene of the accident.', 250, 120, 'images\\courseimages\\provide_firsaid.jpg', '<strong>NONE</strong><br/><br/>When you choose to do a first aid course with Australia Wide First Aid, everything you need to know will be covered on the day of the course. When you confirm your first aid course booking, you will receive access to Australia Wide First Aid first aid manual. This can be used for personal study and as a first aid reference. The manual does not form part of the course work, so there is no need to print it or bring it to your first aid course.\r\n<br/>\r\nThe Provide First Aid course is competency based training and does not require any previous training and qualifications. Anyone can enrol in Australia Wide First Aid Provide First Aid course regardless of your level of experience. However, we do ask that all students under 14 years must provide written permission from a parent or guardian to attend the course.\r\n', 'Australia Wide First Aid Provide First Aid course complies with the Australian Resuscitation Council (ARC) Guidelines relating to the provision of first aid.\r\n<br/><br/>\r\n<strong>A list of topics and skills covered in Australia Wide First Aid comprehensive course is as below:</strong>\r\n<br/><br/>\r\nThe basic ethics and theory involved in first aid practice.<br/>\r\nThe measures need to be taken to effectively deal with issues concerning major or minor injury and illness.<br/>\r\nThe most important management steps needs to be undertaken when dealing with potentially critical health conditions.<br/>\r\nBasic Health and safety knowledge is required when dealing with the condition of first aid situations.<br/>\r\nThe principles, procedures and standard precautions need to be undertaken to control infection and its spread.<br/>\r\nYou will master the knowledge of "Chain of Survival".<br/>\r\nYou will learn the skills a First Aider possesses and what limitations you should be aware of.<br/>\r\nHow and when an Automated External Defibrillator (AED) should be used.<br/><br/>\r\n<strong>You will learn the first aid management of:</strong>\r\n<br/>\r\nInjuries: Cold and crush injuries, eye and ear injuries, head, neck and spinal injuries; minor skin injuries; needle stick injuries; soft tissue injuries including sprains, strains and dislocations.<br/>\r\nBurns: From thermal, chemical, friction, or electrical contact<br/>\r\nEnvironmental Impact: Hypothermia, hyperthermia, dehydration or heat stroke\r\nEnvenomation: From a snake, spider, insect and marine bites/stings<br/>\r\nMedical conditions: Such as cardiac conditions, epilepsy, diabetes, asthma, and other respiratory conditions<br/>\r\nSubstance Misuse: High intake of common drugs and alcohol, including illicit drugs<br/>\r\nAwareness of stress manage techniques and available support<br/>\r\nOther Conditions: Allergic reactions, bleeding, chest pain, choking/airway obstruction, fractures, near drowning, respiratory diseases, seizures, shock, stroke, altered or loss of consciousness, causality with no signs of life, excessive intake of poisoning and toxic substances (including chemical contamination).', '', '', 1234, 'Show'),
('HLTAID004', 'Education and Care First Aid', 'HLTAID004 Provide Emergency First Aid Response in an Education and Care Setting.', 'Australia Wide First Aid has commenced delivering the new course called: HLTAID004 Provide an Emergency First Aid Response in an Education and Care Setting.<br/><br/>\r\nThis unit of competency has been approved by the Australian Children Education and Care Quality Authority (ACECQA) and also satisfies all requirements for first aid, anaphylaxis management, and emergency asthma training under the Education and Care Service National Law and the Education and Care Services National Regulations (2011).', 150, 60, 'images\\courseimages\\provide_education.jpg', 'NONE\r\n<br/><br/>', 'Key Course Topics include:<br/><br/>\r\n - Regulations and definitions of asthma and anaphylaxis<br/>\r\nCPR techniques on infants, children and adults<br/>\r\nDRSABCD, including the trained use of a defibrillator<br/>\r\nIncident reporting in a child care setting<br/>\r\nChild Physiology<br/>\r\nHow to properly assess an emergency situation<br/>\r\nFirst Aid procedures for bleeding, burns and fractures<br/>\r\nManaging medical conditions such as epilepsy<br/>\r\nInfection control procedures<br/>\r\nLegal responsibilities of a First Aider<br/>\r\nManaging shock<br/>\r\nAnd much, much more<br/><br/>', 'During a Provide an Emergency First Aid Response in an Education and Care Setting course, you will be educated with the skills and knowledge required to provide a first aid response to any infant, child or adult. This includes the use of all three (3) Mannequin types during the Cardiopulmonary Resuscitation (CPR) session of the course to provide Emergency first aid Education Care.', 'If you feel the need to acquire extra learning support in any of our first aid courses, our trainers will be more than happy to assist you. Please ensure to mention you require extra learning support when booking your first aid course and we can arrange your first aid course to be as comfortable for you.', 2345, 'Show'),
('UETTDRRF06B and HLTAID001', 'LVR/CPR', 'HLTAID001 Provide CPR. Learn skills and knowledge to perform CPR.', 'Course only available in certain locations, please make sure to check via the tabs below.<br/><br/>\r\nPerform Rescue from a Live LV Panel (also known as LVR) course with Australia Wide First Aid will provide you with the skills and knowledge to manage a casualty involved in a perform rescue from a live LV panel. In the emergency situation in which the casualty requires CPR, you or your employees will have the lifesaving skills to manage the situation until emergency services arrive.', 400, 240, 'images\\courseimages\\provide_lv.jpg', '<strong>NONE</strong><br/><br/>\r\nAustralia Wide First Aid''s LVR/CPR training is open to everyone. There are no prerequisites or previous experience required. We do ask students under 14 years of age to provide written statement from a parent or guardian granting them permission to attend the course.', 'Perform Rescue from a Live LV Panel (also known as LVR) course with Australia Wide First Aid will provide you with the skills and knowledge to manage a casualty involved in a perform rescue from a live LV panel. In the emergency situation in which the casualty requires CPR, you or your employees will have the lifesaving skills to manage the situation until emergency services arrive.<br/><br/>\r\nUpon completion of an LVR/CPR course, you or your employees will be issued with a Statement of Attainment to certify that you have been trained and shown competency in UETTDRRF068 Provide Rescue from a live LV Panel and HLTAID001 Provide CPR. This competency based training describes the skills and knowledge required to:<br/>\r\nProvide CPR in line with the Australian Resuscitation Council Guidelines<br/>\r\nRespond to and manage the signs of an unconscious casualty<br/>\r\nCommunicate details of the situation to emergency services.<br/>', 'Upon completion of an LVR/CPR course, you or your employees will be issued with a Statement of Attainment to certify that you have been trained and shown competency in provide rescue from a live LV Panel and Provide CPR. This competency based training describes the skills and knowledge required to:<br/><br/>\r\nProvide CPR in line with the Australian Resuscitation Council Guidelines<br/>\r\nRespond to and manage the signs of an unconscious casualty<br/>\r\nCommunicate details of the situation to emergency services<br/>', 'If your workplace has a minimum of seven (7) employees to be trained in LVR/CPR, we can send an Australia Wide First Aid trainer to you. Contact Australia Wide First Aid on 1300 336 613 and we can arrange a time and booking best suited to you.', 2345, 'Show');

-- --------------------------------------------------------

--
-- Table structure for table `course_location`
--
-- Creation: Sep 30, 2015 at 05:03 AM
--

CREATE TABLE IF NOT EXISTS `course_location` (
  `course_id` varchar(25) NOT NULL,
  `location_id` int(11) NOT NULL,
  PRIMARY KEY (`course_id`,`location_id`),
  KEY `location_id` (`location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course_timetable`
--
-- Creation: Sep 30, 2015 at 05:03 AM
--

CREATE TABLE IF NOT EXISTS `course_timetable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` varchar(25) NOT NULL,
  `location_id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `month_id` int(11) NOT NULL,
  `day_id` int(11) NOT NULL,
  `date_id` int(11) NOT NULL,
  `starttime_id` int(11) NOT NULL,
  `endtime_id` int(11) NOT NULL,
  `avail_seats` int(11) NOT NULL DEFAULT '25',
  PRIMARY KEY (`course_id`,`location_id`,`tutor_id`,`month_id`,`day_id`,`date_id`,`starttime_id`,`endtime_id`,`id`),
  KEY `id` (`id`),
  KEY `location_id` (`location_id`),
  KEY `tutor_id` (`tutor_id`),
  KEY `month_id` (`month_id`),
  KEY `day_id` (`day_id`),
  KEY `date_id` (`date_id`),
  KEY `starttime_id` (`starttime_id`),
  KEY `endtime_id` (`endtime_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `course_timetable`
--

INSERT INTO `course_timetable` (`id`, `course_id`, `location_id`, `tutor_id`, `month_id`, `day_id`, `date_id`, `starttime_id`, `endtime_id`, `avail_seats`) VALUES
(11, '22099VIC', 1, 2345, 2, 3, 11, 2, 7, 20),
(1, '22099VIC', 1, 3456, 10, 5, 8, 8, 13, 14),
(2, '22099VIC', 2, 1234, 10, 5, 30, 9, 14, 30),
(3, '22099VIC', 2, 2345, 10, 5, 12, 3, 8, 0),
(10, '22099VIC', 4, 6789, 10, 1, 12, 4, 9, 20),
(6, 'HLTAID001', 2, 1234, 10, 1, 15, 4, 10, 25);

-- --------------------------------------------------------

--
-- Table structure for table `course_tutor`
--
-- Creation: Sep 30, 2015 at 05:03 AM
--

CREATE TABLE IF NOT EXISTS `course_tutor` (
  `course_id` varchar(25) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  PRIMARY KEY (`course_id`,`tutor_id`),
  KEY `tutor_id` (`tutor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_tutor`
--

INSERT INTO `course_tutor` (`course_id`, `tutor_id`) VALUES
('22099VIC', 1234),
('HLTAID001', 1234),
('22099VIC', 2345),
('HLTAID003', 2345),
('22099VIC', 3456),
('HLTAID004', 3456),
('22282VIC', 4567),
('HLTAID001', 4567),
('HLTAID003', 4567),
('UETTDRRF06B and HLTAID001', 4567),
('22282VIC', 5678),
('HLTAID001', 5678),
('HLTAID004', 6789),
('UETTDRRF06B and HLTAID001', 6789);

-- --------------------------------------------------------

--
-- Table structure for table `homepage`
--
-- Creation: Sep 30, 2015 at 05:03 AM
--

CREATE TABLE IF NOT EXISTS `homepage` (
  `id` int(11) NOT NULL,
  `slide1` varchar(255) DEFAULT NULL,
  `slide1_caption` varchar(255) NOT NULL,
  `slide2` varchar(255) DEFAULT NULL,
  `slide2_caption` varchar(255) NOT NULL,
  `slide3` varchar(255) DEFAULT NULL,
  `slide3_caption` varchar(255) NOT NULL,
  `slide4` varchar(255) DEFAULT NULL,
  `slide4_caption` varchar(255) NOT NULL,
  `student1_name` varchar(50) NOT NULL,
  `student1_review` text NOT NULL,
  `student2_name` varchar(50) NOT NULL,
  `student2_review` text NOT NULL,
  `student3_name` varchar(50) NOT NULL,
  `student3_review` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `homepage`
--

INSERT INTO `homepage` (`id`, `slide1`, `slide1_caption`, `slide2`, `slide2_caption`, `slide3`, `slide3_caption`, `slide4`, `slide4_caption`, `student1_name`, `student1_review`, `student2_name`, `student2_review`, `student3_name`, `student3_review`) VALUES
(0, 'images\\carousel\\slide1.jpg', '0', 'images\\carousel\\slide2.jpg', '', 'images\\carousel\\slide3.jpg', '', 'images\\carousel\\slide4.jpg', '', 'RAJ SEKHAR (course - Provide First Aid)', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.sed do ut labore et dolore magna aliqua.', 'ANIL (course - Anaphylaxis)', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.sed do ut labore et dolore magna aliqua.', 'ASHOK HARSHA (course - CPR/LVR)', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.sed do ut labore et dolore magna aliqua.');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--
-- Creation: Sep 30, 2015 at 05:03 AM
--

CREATE TABLE IF NOT EXISTS `location` (
  `location_id` int(11) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(50) NOT NULL,
  `location_address` text NOT NULL,
  `location_mobile` varchar(50) NOT NULL,
  `location_map` longtext NOT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location_name`, `location_address`, `location_mobile`, `location_map`) VALUES
(1, 'Richmond', '123 King St, Richmond, VIC 3001', '0456234988', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.72256421544!2d144.98344930000002!3d-37.81996689999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad64295571a6281%3A0x63575fd647a0b2f9!2sMelbourne+Cricket+Ground!5e0!3m2!1sen!2sau!4v1442995462152'),
(2, 'Docklands', '717 Bourke St, Docklands, VIC 3002', '0423877999', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12607.314871861954!2d144.93806184999997!3d-37.81748074999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x0ef4152ad3de33cf!2sMelbourne+Star+Observation+Wheel!5e0!3m2!1sen!2sau!4v1442995602146'),
(3, 'North Melbourne', '23 Bell St', '0451245864', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12610.885939637901!2d144.9469143!3d-37.79656639999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x0f045676053061e0!2sThe+Royal+Children&#39;s+Hospital!5e0!3m2!1sen!2sau!4v1442995658270'),
(4, 'Caulfield', '99 russel st', '045248658', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6297.970327852816!2d145.02652945000003!3d-37.884029649999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0xb0fbd58d11fcb909!2sCaulfield+Racecourse!5e0!3m2!1sen!2sau!4v1442995702126'),
(5, 'CBD', '1 Latrobe St', '451234567', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3152.14732290553!2d144.96086330000003!3d-37.81001809999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d4ab189165b%3A0xecf9cfc08f547e62!2sMelbourne+Institute+of+Technology!5e0!3m2!1sen!2sau!4v1442995783552');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--
-- Creation: Sep 30, 2015 at 08:42 AM
--

CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `txnid` varchar(255) NOT NULL,
  `payment_amount` decimal(7,2) NOT NULL,
  `payment_status` varchar(25) NOT NULL,
  `itemid` varchar(25) NOT NULL,
  `createdtime` varchar(255) NOT NULL,
  `student_id` int(11) NOT NULL,
  `timetable_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `student_id` (`itemid`,`createdtime`),
  KEY `course_id` (`createdtime`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `txnid`, `payment_amount`, `payment_status`, `itemid`, `createdtime`, `student_id`, `timetable_id`) VALUES
(25, '2RJ34406RW023660S', '10.00', 'Completed', '22099VIC', '2015-10-06 13:16:45', 150004, 1),
(26, '7AX59639AD487672U', '10.00', 'Completed', '22099VIC', '2015-10-08 04:08:17', 150007, 1),
(27, '7AX59639AD487672U', '10.00', 'Completed', '22099VIC', '2015-10-08 04:08:27', 150007, 150007),
(28, '9BJ60434CV1166804', '10.00', 'Completed', '22099VIC', '2015-10-08 06:28:59', 150001, 1),
(29, '9BJ60434CV1166804', '10.00', 'Completed', '22099VIC', '2015-10-08 06:29:08', 150001, 150001);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--
-- Creation: Sep 30, 2015 at 05:03 AM
--

CREATE TABLE IF NOT EXISTS `student` (
  `student_id` int(11) NOT NULL,
  `student_firstname` varchar(255) NOT NULL,
  `student_lastname` varchar(255) NOT NULL,
  `student_password` varchar(255) NOT NULL,
  `student_address` varchar(255) NOT NULL,
  `student_email` varchar(50) NOT NULL,
  `student_mobile` varchar(50) NOT NULL,
  `student_dob` date NOT NULL,
  PRIMARY KEY (`student_id`),
  UNIQUE KEY `student_id` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_firstname`, `student_lastname`, `student_password`, `student_address`, `student_email`, `student_mobile`, `student_dob`) VALUES
(150000, 'Anil', 'Rai', '71b9b5bc1094ee6eaeae8253e787d654', '12 Jasper Rd, North Melbourne, VIC 3000', 'anil@gmail.com', '0455522789', '1989-07-11'),
(150001, 'Raj Sekhar', 'Masina', 'c53e479b03b3220d3d56da88c4cace20', '45 North Rd, Richmond, VIC 3000', 'masinarajasekhar@gmail.com', '0450477450', '1991-06-22'),
(150003, 'Harsh Sajja', 'Sajja', '226280c5dd9b1bd4e67c72ff2c94bf1b', '10 Jasper Rd, Footscray, VIC 3012', 'harsha@gmail.com', '045933245', '1990-02-22'),
(150004, 'Ashok Kumar', 'Najani', '5f4dcc3b5aa765d61d8327deb882cf99', '9 Tucker Rd, Caulfield, VIC 3020', 'ashok@gmail.com', '045838338', '1991-03-22'),
(150005, 'Test', 'User', 'c53e479b03b3220d3d56da88c4cace20', 'Melbourne', 'abc@xyz.com', '458411585', '1991-10-22'),
(150006, 'Hassan', 'Rehman', '6d81588e7ed912525dd5d2ca67fc0f4b', 'Mulgrave', 'hassanrehman.11@gmail.com', '469286832', '2015-10-02'),
(150007, 'test', 'user', 'c53e479b03b3220d3d56da88c4cace20', 'adfsdf', 'rajsekhar.300@gmail.com', '1342342342', '1991-02-22');

-- --------------------------------------------------------

--
-- Table structure for table `studentcourse`
--
-- Creation: Sep 30, 2015 at 05:03 AM
--

CREATE TABLE IF NOT EXISTS `studentcourse` (
  `student_id` int(11) NOT NULL,
  `course_id` varchar(25) NOT NULL,
  `certificate` blob,
  PRIMARY KEY (`student_id`,`course_id`),
  KEY `student_id` (`student_id`),
  KEY `course_id` (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentcourse`
--

INSERT INTO `studentcourse` (`student_id`, `course_id`, `certificate`) VALUES
(150001, '22099VIC', NULL),
(150004, '22099VIC', NULL),
(150007, '22099VIC', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_course`
--
-- Creation: Sep 30, 2015 at 05:03 AM
--

CREATE TABLE IF NOT EXISTS `student_course` (
  `student_id` int(11) NOT NULL,
  `timetable_id` int(11) NOT NULL,
  `certificate` blob,
  PRIMARY KEY (`student_id`,`timetable_id`),
  KEY `timetable_id` (`timetable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_course`
--

INSERT INTO `student_course` (`student_id`, `timetable_id`, `certificate`) VALUES
(150001, 1, NULL),
(150004, 1, NULL),
(150007, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `timetable_date`
--
-- Creation: Sep 30, 2015 at 05:03 AM
--

CREATE TABLE IF NOT EXISTS `timetable_date` (
  `date_id` int(11) NOT NULL,
  `date_name` int(11) NOT NULL,
  PRIMARY KEY (`date_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timetable_date`
--

INSERT INTO `timetable_date` (`date_id`, `date_name`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(18, 18),
(19, 19),
(20, 20),
(21, 21),
(22, 22),
(23, 23),
(24, 24),
(25, 25),
(26, 26),
(27, 27),
(28, 28),
(29, 29),
(30, 30),
(31, 31);

-- --------------------------------------------------------

--
-- Table structure for table `timetable_day`
--
-- Creation: Sep 30, 2015 at 05:03 AM
--

CREATE TABLE IF NOT EXISTS `timetable_day` (
  `day_id` int(11) NOT NULL,
  `day_name` varchar(50) NOT NULL,
  PRIMARY KEY (`day_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timetable_day`
--

INSERT INTO `timetable_day` (`day_id`, `day_name`) VALUES
(1, 'Monday'),
(2, 'Tuesday'),
(3, 'Wednesday'),
(4, 'Thursday'),
(5, 'Friday'),
(6, 'Saturday'),
(7, 'Sunday');

-- --------------------------------------------------------

--
-- Table structure for table `timetable_month`
--
-- Creation: Sep 30, 2015 at 05:03 AM
--

CREATE TABLE IF NOT EXISTS `timetable_month` (
  `month_id` int(11) NOT NULL,
  `month_name` varchar(50) NOT NULL,
  PRIMARY KEY (`month_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timetable_month`
--

INSERT INTO `timetable_month` (`month_id`, `month_name`) VALUES
(1, 'January'),
(2, 'February'),
(3, 'March'),
(4, 'April'),
(5, 'May'),
(6, 'June'),
(7, 'July'),
(8, 'August'),
(9, 'September'),
(10, 'October'),
(11, 'November'),
(12, 'December');

-- --------------------------------------------------------

--
-- Table structure for table `timetable_time`
--
-- Creation: Sep 30, 2015 at 05:03 AM
--

CREATE TABLE IF NOT EXISTS `timetable_time` (
  `time_id` int(11) NOT NULL,
  `time_name` varchar(50) NOT NULL,
  PRIMARY KEY (`time_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timetable_time`
--

INSERT INTO `timetable_time` (`time_id`, `time_name`) VALUES
(1, '08:00AM'),
(2, '08:30AM'),
(3, '09:00AM'),
(4, '09:30AM'),
(5, '10:00AM'),
(6, '10:30AM'),
(7, '11:00AM'),
(8, '11:30AM'),
(9, '12:00PM'),
(10, '12:30PM'),
(11, '01:00PM'),
(12, '01:30PM'),
(13, '02:00PM'),
(14, '02:30PM'),
(15, '03:00PM'),
(16, '03:30PM'),
(17, '04:00PM'),
(18, '04:30PM'),
(19, '05:00PM'),
(20, '05:30PM'),
(21, '06:00PM');

-- --------------------------------------------------------

--
-- Table structure for table `tutor`
--
-- Creation: Sep 30, 2015 at 05:03 AM
--

CREATE TABLE IF NOT EXISTS `tutor` (
  `tutor_id` int(11) NOT NULL,
  `tutor_name` varchar(50) NOT NULL,
  `tutor_address` varchar(255) NOT NULL,
  `tutor_salary` double NOT NULL,
  `tutor_email` varchar(50) NOT NULL,
  `tutor_mobile` varchar(50) NOT NULL,
  PRIMARY KEY (`tutor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutor`
--

INSERT INTO `tutor` (`tutor_id`, `tutor_name`, `tutor_address`, `tutor_salary`, `tutor_email`, `tutor_mobile`) VALUES
(1234, 'Anil', '17A Kellaway st, Maribyrnong, Footscray, VIC 3032', 90000, 'anil.rai610@gmail.com', '0415651357'),
(2345, 'Raj', '156A McKinnon Rd, McKinnon, VIC 3204', 70000, 'rajsekhar@gmail.com', '0450477450'),
(3456, 'Harsha', 'Tottenham', 150000, 'harsha@yahoo.com', '0451258954'),
(4567, 'Ashok', 'South Morang', 180000, 'ashok@gmail.com', '0458755245'),
(5678, 'Alex', 'Sydney', 50000, 'alex@rediff.com', '0458955256'),
(6789, 'John', 'Ballarat', 60000, 'john@gmail.com', '0486215789');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_comment`
--
ALTER TABLE `blog_comment`
  ADD CONSTRAINT `blog_comment_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `blog` (`article_id`);

--
-- Constraints for table `course_location`
--
ALTER TABLE `course_location`
  ADD CONSTRAINT `course_location_ibfk_2` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`),
  ADD CONSTRAINT `course_location_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`);

--
-- Constraints for table `course_timetable`
--
ALTER TABLE `course_timetable`
  ADD CONSTRAINT `course_timetable_ibfk_8` FOREIGN KEY (`endtime_id`) REFERENCES `timetable_time` (`time_id`),
  ADD CONSTRAINT `course_timetable_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `course_timetable_ibfk_2` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`),
  ADD CONSTRAINT `course_timetable_ibfk_3` FOREIGN KEY (`tutor_id`) REFERENCES `tutor` (`tutor_id`),
  ADD CONSTRAINT `course_timetable_ibfk_4` FOREIGN KEY (`month_id`) REFERENCES `timetable_month` (`month_id`),
  ADD CONSTRAINT `course_timetable_ibfk_5` FOREIGN KEY (`day_id`) REFERENCES `timetable_day` (`day_id`),
  ADD CONSTRAINT `course_timetable_ibfk_6` FOREIGN KEY (`date_id`) REFERENCES `timetable_date` (`date_id`),
  ADD CONSTRAINT `course_timetable_ibfk_7` FOREIGN KEY (`starttime_id`) REFERENCES `timetable_time` (`time_id`);

--
-- Constraints for table `course_tutor`
--
ALTER TABLE `course_tutor`
  ADD CONSTRAINT `course_tutor_ibfk_2` FOREIGN KEY (`tutor_id`) REFERENCES `tutor` (`tutor_id`),
  ADD CONSTRAINT `course_tutor_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`);

--
-- Constraints for table `studentcourse`
--
ALTER TABLE `studentcourse`
  ADD CONSTRAINT `studentcourse_ibfk_3` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `studentcourse_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`);

--
-- Constraints for table `student_course`
--
ALTER TABLE `student_course`
  ADD CONSTRAINT `student_course_ibfk_3` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `student_course_ibfk_2` FOREIGN KEY (`timetable_id`) REFERENCES `course_timetable` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
