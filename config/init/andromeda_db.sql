-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2014 at 04:33 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `andromeda_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_modules`
--

CREATE TABLE IF NOT EXISTS `academic_modules` (
  `module_code` varchar(6) NOT NULL,
  `module_name` varchar(200) NOT NULL,
  `module_teacher` int(11) NOT NULL,
  KEY `module_teacher` (`module_teacher`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `catagories`
--

CREATE TABLE IF NOT EXISTS `catagories` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(30) NOT NULL,
  PRIMARY KEY (`cat_id`),
  KEY `cat_id` (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `catagories`
--

INSERT INTO `catagories` (`cat_id`, `cat_name`) VALUES
(0, 'None'),
(1, 'Desktop Software'),
(2, 'Networking and Security'),
(3, 'Mobile Development'),
(4, 'Web development'),
(5, 'Artificial Intelligence'),
(6, 'Microcontrollers'),
(7, 'Open source'),
(8, 'Academic'),
(9, 'Other'),
(10, 'Cryptography');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE IF NOT EXISTS `feedbacks` (
  `up_id` int(11) DEFAULT NULL,
  `feed_desc` text,
  `feed_author` int(11) DEFAULT NULL,
  KEY `up_id` (`up_id`),
  KEY `feed_author` (`feed_author`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_users`
--

CREATE TABLE IF NOT EXISTS `oauth_users` (
  `oauth_id` text NOT NULL,
  `oauth_name` varchar(100) NOT NULL,
  `oauth_email` varchar(150) NOT NULL,
  `oauth_profile` text NOT NULL,
  `oauth_provider` varchar(50) NOT NULL,
  `oauth_picture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `oauth_users`
--

INSERT INTO `oauth_users` (`oauth_id`, `oauth_name`, `oauth_email`, `oauth_profile`, `oauth_provider`, `oauth_picture`) VALUES
('1', '1', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_name` text,
  `p_desc` text,
  `p_catagory` int(11) DEFAULT '0',
  `p_author` int(11) DEFAULT '0',
  `p_mentor` int(11) DEFAULT '0',
  `p_leader` int(11) DEFAULT '0',
  `p_post_date` timestamp NULL DEFAULT NULL,
  `p_state` int(11) DEFAULT '0',
  `p_votes` int(11) NOT NULL DEFAULT '0',
  `p_views` int(11) NOT NULL,
  PRIMARY KEY (`p_id`),
  KEY `p_author` (`p_author`),
  KEY `p_mentor` (`p_mentor`),
  KEY `p_leader` (`p_leader`),
  KEY `p_state` (`p_state`),
  KEY `p_catagory` (`p_catagory`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=143 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`p_id`, `p_name`, `p_desc`, `p_catagory`, `p_author`, `p_mentor`, `p_leader`, `p_post_date`, `p_state`, `p_votes`, `p_views`) VALUES
(8, 'Android Exploitation Framework', 'Proposing Android Exploitation Framework can be used by Security Experts and Engineers for penetration testing. Using this Exploitation Framework they can exploit security vulnerabilities using an exploit from a set of possible exploits for that particular vulnerability and inject a preferred payload to be executed after exploitation. This framework can contribute in a larger scale in making penetration testing more easy and making Android Operating system and apps more secure and reliable.', 1, 0, 0, 0, '2014-01-04 18:30:00', 0, 10, 86),
(20, 'Mentor''s Project', 'this is his description', 1, 2, 0, 0, '2014-01-04 18:30:00', 0, 2, 12),
(21, 'Student Project Ideas Sharing Portal', 'LACK OF TECHNICAL SKILLS IN SOME STUDENTS\r\n\r\nMost of the students put their efforts on academic activities rather than projects to get practical experience and technical skills. One reason is that most of them are lack of new ideas for projects and lack of guidance by experts. This ends up with graduates with only academic knowledge but no experience with new technologies and ability to adapt to new technologies.  And also some students do not involve in projects as they have no idea of finding a project idea. This issue is extremely serious as IT field is really competitive with many IT graduates from various universities and institutes. So it is really important if we can do something to improve CSE student’s technical competencies which helps CSE students get highlighted in the industry.\r\n\r\nMORE…\r\n\r\nAnother major issue is that students pay less attention on the projects that they are currently on. One situation is they consider projects as final moment activities rather than following as a procedure and ends up failing the project or not achieving expected/proposed output. It is really needed proper and regular advices real-time by experts in case they encounter problems.\r\n\r\nPossible Solution\r\n\r\nA solution is a place where students can gather and suggest new project ideas and work interactively. And also academic staff should also participate interactively such that they can monitor project progresses and give feedbacks and advices in case of issues. This kind of knowledge hub can solve the issues of lack of projects, not having technical experience of latest technologies. And also project advisors/evaluators can monitor project progress interactively rather than only by weekly reports and other documentation. Further, this can help advisors identify students who pay less attention on projects and monitor their collaboration on group projects.\r\n\r\n', 4, 2, 0, 0, '2013-12-31 18:30:00', 0, 1, 2),
(25, 'deepal''s project', 'this is description', 4, 1, 0, 0, '2014-01-05 05:50:30', 0, 0, 1),
(28, 'Multi-threaded Web Crawler', 'A multi threaded web spider which can crawl through web pages in a given url and download web pages and store in a mysql database.', 4, 1, 0, 0, '2014-01-05 08:45:57', 0, 15, 36),
(30, 'Another test project', 'desc', 3, 1, 0, 0, '2014-01-05 08:48:28', 0, 0, 3),
(31, 'Gravatar integration for Joomla', 'Gravatar integration for joomla', 4, 1, 0, 0, '2014-01-05 09:06:19', 0, 13, 15),
(32, 'sdfsadf', 'adfasdf', 2, 1, 0, 0, '2014-01-05 09:09:45', 0, 0, 0),
(33, 'hhhhh', 'hhhh', 3, 1, 0, 0, '2014-01-05 09:12:06', 0, 0, 0),
(34, 'Blogger App for Windows 8', 'An offline blogger app for windows 8 which gives the capability to write blogs offline and post when connected.', 4, 1, 0, 0, '2014-01-05 12:08:29', 0, 23, 24),
(35, 'Database management system for a University', 'A database management system for university which can be used to store students'' and teachers'' details and provide an easy management interface for this users through web gui.', 4, 1, 0, 0, '2014-01-05 12:09:52', 0, 5, 10),
(36, 'deepal malli''s project', 'this is a description', 5, 1, 0, 0, '2014-01-05 12:50:39', 0, 0, 0),
(37, 'Road Condition Monitoring system', 'Road condition monitoring system is developed using micro controllers. A special moving equipment is used to check the road''s condition', 6, 6, 0, 0, '2014-01-05 13:34:36', 0, 3, 9),
(38, NULL, NULL, NULL, 1, 0, 0, '2014-01-05 13:40:00', 0, 0, 0),
(39, NULL, NULL, NULL, 1, 0, 0, '2014-01-05 13:41:50', 0, 0, 0),
(40, 'gsdf', 'sdf', 2, 1, 0, 0, '2014-01-05 13:42:01', 0, 0, 0),
(41, 'gggg', 'asdf', 5, 1, 0, 0, '2014-01-05 14:03:55', 0, 0, 0),
(42, 'deepal', 'sdfsdfadv', 7, 1, 0, 0, '2014-01-05 14:07:14', 0, 0, 0),
(43, 'toaster test', 'asdasdfasd', 8, 1, 0, 0, '2014-01-05 14:12:31', 0, 0, 0),
(44, 'Web Penetration Testing', 'In a pentesting I am tryng to get the php files in the server, I got SQL shell, but not os shell, the task is to get the php files in the server with the database.\r\nOS Ubuntu 12.04 php 5.4.6 Mysql 5.0.11.\r\n\r\nYou must work from my backtrack through teamviewer.', 2, 1, 0, 0, '2014-01-06 02:59:18', 0, 21, 46),
(45, 'Custom windows 7 authentication package', 'Project Description:\r\nA simple, custom authentication package that does the following:\r\n\r\n* when the user locks the computer it displays a custom image on the standard lock screen (see attached screenshot)\r\n* connects to a remote host with TCP/IP and waits for a passcode\r\n* when the remote host sends the proper passcode, it unlocks the desktop\r\n* integrates into windows'' security subsystem, does not circumvent or hack it\r\n\r\n\r\nRequirements:\r\n\r\n* you must provide the source code\r\n* must be compilable with a free/standard compiler (MS c++ compiler preferred)\r\n* you must provide a build script\r\n* you must provide a short installation instruction document (just one page on how to install an test) or user''s manual\r\n* it must read the custom image files from a directory\r\n* each time the user locks the desktop it should pick a random image from the directory\r\n* the custom images are 200x200 pixels png\r\n* must use an .ini file (or xml) for it settings with the following content:\r\n* valid passcodes\r\n* path to the directory of images\r\n* remote host name / ip to connect to for passcode\r\n* integrates into windows'' security subsystem, does not circumvent or hack it\r\n\r\nAdditional info:\r\n\r\n* It is a part of a concept application/system, so a production quality implementation is not required. Just make sure it works as expected without crashing.\r\n* The images displayed on the lock screen are password hints for the user. Their content is irrelevant.\r\n* The user logs into a remote system where he specifies the passcode\r\n* Protocol with the remote host is as follows\r\n* Passcode is a maximum 128bytes long number in HEX encoding. For example: 32BA12CD\r\n* When the authentication plugin receives a passcode from the remote host it either sends an ''OK'' or ''INVALID'' response.\r\n* Each message is terminated with an EOL token (ascii CR+LF)\r\n* Character encoding is ASCII\r\n* when a valid passcode is received, the module terminates the TCP/IP connection (after sending the OK message)', 2, 1, 0, 0, '2014-01-06 03:04:29', 0, 35, 80),
(46, 'An open source project', 'This is the description of the open source project', 7, 1, 0, 0, '2014-01-06 03:07:54', 0, 1, 9),
(47, 'test', 'asd;falskdfa', 7, 1, 0, 0, '2014-01-06 04:07:14', 0, 0, 0),
(48, 'IOS Navigation app', 'an ios navigation app', 3, 1, 0, 0, '2014-01-06 05:10:55', 0, 13, 47),
(49, 'CSE Ideas Sharing Hub - Project Portal', 'Basic Idea:\n\nDepartment Lecturers/Instructer(Mentors) who are to evaluate student''s projects should have a proper way to evaluate projects'' progress rather than by weekly reports or milestones. That will help them decide whether students are involved in their projects actively rather than final second efforts. And also measure each student in each team are actively collaborating their project rather than depending on few team mates. It will also allow mentors know whether each team member assigned in projects have equally distributed portion of work. Furthermore, this solution should provide ability to publish regular updates on the project progress and milestones where project mentors can give feedbacks on them if necessary.\n\nBasic Roles:\n\nProject team member\nTeam lead\nProject mentor(s)\nProject Followers\nOther users with Project Portal accounts\n\nBasic Functional Requirements:\n\nSign up for an account or login\nPropose Projects\nJoin a project - which gives access to project sources/posting updates and view feedbacks etc.\nFollow a project if interested- which gives access to view project updates (not feedbacks from mentors) and team members\nSuggest a project lead / Ask for leadership\nSuggest a project mentor / Ask for mentorship\nSubmit project updates/milestones\nGive feedbacks on updates (mentors only)\n\nPossible Upgrades:\n\nIntegration of Google Drive (Submit Documentation/Export project updates as a report)\nIntegration of GitHub (View Project Sources)\nTeam member rating mechanism on,\nMentor''s Feedbacks\nCommunity votes(upvotes only) on suggested projects\n\nAdditional Advantages:\n\nMost of the students put their efforts on academic activities rather than projects. One reason is that most of them are lack of new ideas for projects and lack of guidance by experts. This ends up with graduates with only academic knowledge but no experience with new technologies and ability to adapt to new technologies. This effort improves student''s in CSE get to know new technologies and creative ideas from the start of their carreer rather than in industrial training. And I hope if we succeed, this would be an extraordinary invent which hoist our CSE students among others IT graduates.', 4, 1, 0, 0, '2014-01-06 05:19:39', 0, 70, 98),
(50, 'Need addon like Features Like Foxtab.com', 'Project Description: \r\nA Visual Browsing Tool - Features Like Foxtab.com\r\n\r\nTo know detail features you actually have to install this app. we can talk in detail if can make it. It should work with Chrome , Firefox and IE. One application which will install Extension in all.\r\n\r\nI also need Extensions individually so i can list them on stores.\r\nneed to complete in 3 days and need to see daily progress , please serious bidder only .Skills required: \r\nJava, PHP, Software Architecture', 4, 1, 0, 0, '2014-01-07 05:16:19', 0, 5, 3),
(51, 'Building a Website for an ASIC Bitcoin Mining Company', 'I am involved with an ASIC Bitcoin miner operation. We are developing and importing the hardware and are looking to develop a simple but professional website to sell our miners.\r\n\r\nIf you are not familiar with Bitcoin, you aren''t going to be a good fit for this project.\r\n\r\nOur miners are powerful and unique, but we''re okay setting up a website similar to the other big names in the game. \r\n\r\nYour job will include:\r\n\r\n1. Designing the site. I have a talented group of individuals, but we aren''t web designers. We need someone with excellent graphic design skills, which we don''t have. Site will include ways for visitors to preorder our miners, which is the goal here.\r\n\r\n2. Designing graphics/product images for our various miners, as we''re currently not in the stage of development where we wish to make publicly available our product images.\r\n\r\nWe''re currently in massive debt and therefore the budget for the website is low. The number one priority is getting something out there that looks neat and professional so we can start attracting preorders for our miners. This website shouldn''t take that long to build, as it''s fairly basic.\r\n\r\nAdd a note if you''re willing to accept bitcoin as payment.', 4, 1, 0, 0, '2014-01-08 06:55:44', 0, 2, 3),
(52, 'A client server file conversion app', 'I want to have client and threads based server that will treat all clients who will connect to server on specified port and ip. In my putty i have to write just : ./convert 192.1.1.1 2909 pdf2txt filepath.\r\n\r\nImplement a server and a client for the conversion of documents from one type to another. Client will submit initial document type, document type end. If the server can perform the transformation, it will send the original document and will receive the resulting document. For the server, use a configuration file that specify transformations supported, and utilities that made &#8203;&#8203;these changes. Examples of utilities may be mentioned: ps2pdf, pdf2ps, latex2html, asp2php.', 1, 1, 0, 0, '2014-01-08 07:03:22', 0, 1, 5),
(85, 'Develop simple LightSwitch 2013 HTML web application', 'I need to have a Microsoft Lightswitch 2013 HTML application built and the source code provided.\r\nIt must be done in Lightswitch 2013, HTML, C# (no earlier versions - can''t be silverlight).\r\nForms Authentication - allowing the user to self-register, change password and recover forgotten password.\r\nHosting on Azure. I will provide the website for TEST and PROD.\r\n\r\nIt is a student management system targeted for Training Organisations \r\nwhich helps Training Organisation staff export the student data in TXT files in a particular format.\r\nSignup and using student management system is free, export to TXT files is paid feature.\r\n\r\nIt is majorly a simple CRUD app. Forms which help to input data.\r\nAnd at the end, user can export the data to some TXT files based on some pre-defined algo.\r\nSome fields have drop down list with choices. In those cases, I will be able to provide you all the choice data for DDLs. I will also provide you with relevant validations, business rules for TXT file export.\r\n\r\nReference data showing up in drop down list etc should be managed by a super user role only. \r\n\r\nA user (Training Org staff) should see only his data. Not others. Let''s call this entity as account.\r\nFirst time when a user(Training Org staff) creates data for a training org , it creates an account for the user(Training Org staff) .\r\nA user(Training Org staff) can invite others users (Training Org staff) via email to collaborate on his account. Invited users join the same account and not a new one. That''s how they will share data.\r\nWithin one account , a user(Training Org staff) can create data only for one training org.\r\n\r\nAll the tables in db should have created modified time and person data. Also IsDeleted flag, will detail out when soft delete will be used and when hard delete.\r\n\r\nThere are some paid features between free features : \r\n1. Free : register and create account . single user is free. Create data, edit delete etc. .\r\n2. Paid features : export to TXT files. Invite more users to collaborate, pay per user. All payments are subscription for at least 1 year. \r\nPaid features should show up but disabled when a valid subscription is not available. \r\nFor invited users, they should not be able to login after subscription expires. \r\nFor txt file export, expiry is at account level. \r\nSo an expiry date next to users and expiry date next to account.\r\n\r\nI will share more details, \r\n1. a formal functional specifications document and a \r\n2. Reporting Web Application which is exactly what we need to COPY.\r\n', 4, 1, 0, 0, '2014-01-08 07:21:53', 0, 1, 3),
(89, 'BASIC EMR ON MAP-R V3 AND AWS S3', '1- Scope:\r\n\r\nProviding with a basic Hadoop Map-R V.3 environment over Amazon Web Services. Basic trial environment in this phase. No need to provide 24 x 7 tools or extra code.\r\n\r\nMain aim is to analyse data from several text S3 input sources and start trial period.\r\n\r\n\r\n2- Tools:\r\n\r\nWe provide Project AWS account for the Project and Map-R V.3 Hadoop clusters. Free administration for implementing this project.\r\n\r\n\r\n3- Deliverables:\r\n\r\nScripts code for AWS API based automatic MAP-R V.3 Set-up for a given number of masters and computing nodes.\r\nSet up scripts capable of using EC2 on “demand nodes”\r\nFor real time 24x 7 live queries\r\nFor batch night processes.\r\nJava basic code for providing basic routines like:\r\nJoints tables form several text sources.\r\nGauss statistics: Mean, deviation, etc.\r\nBasic counting and basic mathematics routines.\r\nOutput text or Mysql computed tables.\r\n\r\nskype sessions for 4 hours to train skilled informatics from de php and javascript world.\r\n\r\nDocumented source code.\r\n\r\n\r\n4- Input sources:\r\n\r\nThe project is intended for analysing and creating logs joints form distant connected devices and central text tables.\r\n\r\n-	Several TEXT files for remote devices stored on S3 files.\r\no	Characteristics of remote devices (>400.000 TV sets) \r\n•	Brand\r\n•	Programed parameters\r\n•	Available channels o\r\n•	Geo location\r\no	Log text of distant \r\n•	Real time logging of visits\r\n•	Number of visits\r\n•	Duration\r\n•	TV station tuned in in each moment\r\n•	Type home demographics where the device is installed.\r\n\r\n\r\no	TV Stations programming scheduling\r\n•	Show type: movie, talk show, debate\r\n•	Start time, end time.\r\n•	Celebrities involved in the show.\r\n\r\n\r\n6- Expected outputs.\r\n\r\n-	Several combinations of the above.\r\n\r\n-	- Mean time per TV set type expend in each type of show.\r\n\r\no	Mean time\r\no	Standard deviation\r\no	Top celebrities watched\r\n\r\n-	Samples of joints form several sources.\r\n\r\n-	Real time queries set up in case of need real time response.\r\n\r\n-	Batch set up for long time consuming queries of whole set of queries.\r\n\r\n\r\n7- Time table.\r\n\r\n-	Needed in four weeks / January end – first September week.\r\n-	We provide AWS zone with all the text sources inside ready for use.\r\n-	Week days 9- 18h CET e-mail /skype contact for immediate support for any doubt or clarification needs.\r\n\r\n8- References:\r\n\r\n-	No project will be awarded without clear and outstanding references on hadoop implantations over AWS , \r\n-	MAP-R is a plus.', NULL, 2, 0, 0, '2014-01-09 06:11:18', 0, 0, 0),
(90, 'BASIC EMR ON MAP-R V3 AND AWS S3', '1- Scope:\r\n\r\nProviding with a basic Hadoop Map-R V.3 environment over Amazon Web Services. Basic trial environment in this phase. No need to provide 24 x 7 tools or extra code.\r\n\r\nMain aim is to analyse data from several text S3 input sources and start trial period.\r\n\r\n\r\n2- Tools:\r\n\r\nWe provide Project AWS account for the Project and Map-R V.3 Hadoop clusters. Free administration for implementing this project.\r\n\r\n\r\n3- Deliverables:\r\n\r\n-	Scripts code for AWS API based automatic MAP-R V.3 Set-up for a given number of masters and computing nodes.\r\n-	Set up scripts capable of using EC2 on “demand nodes”\r\no	For real time 24x 7 live queries\r\no	For batch night processes.\r\n-	Java basic code for providing basic routines like:\r\no	Joints tables form several text sources.\r\no	Gauss statistics: Mean, deviation, etc.\r\no	Basic counting and basic mathematics routines.\r\no	Output text or Mysql computed tables.\r\n\r\n-	skype sessions for 4 hours to train skilled informatics from de php and javascript world.\r\n\r\n-	Documented source code.\r\n\r\n\r\n4- Input sources:\r\n\r\nThe project is intended for analysing and creating logs joints form distant connected devices and central text tables.\r\n\r\n-	Several TEXT files for remote devices stored on S3 files.\r\no	Characteristics of remote devices (>400.000 TV sets) \r\n•	Brand\r\n•	Programed parameters\r\n•	Available channels o\r\n•	Geo location\r\no	Log text of distant \r\n•	Real time logging of visits\r\n•	Number of visits\r\n•	Duration\r\n•	TV station tuned in in each moment\r\n•	Type home demographics where the device is installed.\r\n\r\n\r\no	TV Stations programming scheduling\r\n•	Show type: movie, talk show, debate\r\n•	Start time, end time.\r\n•	Celebrities involved in the show.\r\n\r\n\r\n6- Expected outputs.\r\n\r\n-	Several combinations of the above.\r\n\r\n-	- Mean time per TV set type expend in each type of show.\r\n\r\no	Mean time\r\no	Standard deviation\r\no	Top celebrities watched\r\n\r\n-	Samples of joints form several sources.\r\n\r\n-	Real time queries set up in case of need real time response.\r\n\r\n-	Batch set up for long time consuming queries of whole set of queries.\r\n\r\n\r\n7- Time table.\r\n\r\n-	Needed in four weeks / January end – first September week.\r\n-	We provide AWS zone with all the text sources inside ready for use.\r\n-	Week days 9- 18h CET e-mail /skype contact for immediate support for any doubt or clarification needs.\r\n\r\n8- References:\r\n\r\n-	No project will be awarded without clear and outstanding references on hadoop implantations over AWS , \r\n-	MAP-R is a plus.', 0, 2, 0, 0, '2014-01-09 06:15:01', 0, 5, 10),
(141, 'adsf', 'fgsf', 1, 0, 0, 0, '2014-01-21 05:52:08', 0, 0, 3),
(142, 'TinyMCE Rich Text Editor', '<h2>Introduction</h2>\r\n<p style="text-align: right;">&nbsp; This is the introduction</p>', 2, 1, 0, 0, '2014-01-25 15:11:56', 0, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `project_follower`
--

CREATE TABLE IF NOT EXISTS `project_follower` (
  `p_id` int(11) DEFAULT NULL,
  `follower_id` int(11) DEFAULT NULL,
  KEY `p_id` (`p_id`),
  KEY `follower_id` (`follower_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_follower`
--

INSERT INTO `project_follower` (`p_id`, `follower_id`) VALUES
(50, 1),
(NULL, NULL),
(NULL, NULL),
(49, 1),
(35, 1);

-- --------------------------------------------------------

--
-- Table structure for table `project_member`
--

CREATE TABLE IF NOT EXISTS `project_member` (
  `p_id` int(11) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  KEY `p_id` (`p_id`),
  KEY `member_id` (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_member`
--

INSERT INTO `project_member` (`p_id`, `member_id`) VALUES
(49, 1),
(50, 1),
(37, 1),
(45, 1);

-- --------------------------------------------------------

--
-- Table structure for table `project_state`
--

CREATE TABLE IF NOT EXISTS `project_state` (
  `s_id` int(11) NOT NULL DEFAULT '0',
  `s_name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_state`
--

INSERT INTO `project_state` (`s_id`, `s_name`) VALUES
(0, 'open'),
(1, 'ongoing');

-- --------------------------------------------------------

--
-- Table structure for table `project_tags`
--

CREATE TABLE IF NOT EXISTS `project_tags` (
  `p_id` int(11) DEFAULT NULL,
  `tag` varchar(30) DEFAULT NULL,
  KEY `p_id` (`p_id`),
  KEY `tag_id` (`tag`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_tags`
--

INSERT INTO `project_tags` (`p_id`, `tag`) VALUES
(30, 'android'),
(30, 'objective-c'),
(30, 'ios'),
(31, 'php'),
(31, 'javascript'),
(31, 'html'),
(31, 'css'),
(32, 'ping'),
(32, 'localhost'),
(33, 'dog'),
(33, 'cat'),
(33, 'mice'),
(34, 'javascript'),
(34, 'c#'),
(34, 'windows-8'),
(34, ''),
(35, 'database'),
(35, 'mysql'),
(35, 'php'),
(35, ''),
(36, 'java'),
(36, 'python'),
(36, 'css'),
(36, 'php'),
(37, 'pic'),
(37, 'microcontrollers'),
(37, 'embedded-systems'),
(38, ''),
(39, ''),
(40, 'sdfs'),
(41, 'programming'),
(41, 'algorithms'),
(42, 'foss'),
(43, 'html'),
(43, 'css'),
(43, 'javascript'),
(44, 'PHP'),
(44, 'mysql'),
(44, 'hacking'),
(44, 'web'),
(44, 'pentesting'),
(45, 'windows'),
(45, 'authentication'),
(45, 'windows-api'),
(45, 'c'),
(46, 'foss'),
(46, 'mysql'),
(46, 'java'),
(47, 'security'),
(47, 'foss'),
(48, 'ios'),
(48, 'objective-c'),
(48, 'mobile'),
(49, 'php'),
(49, 'css'),
(49, 'javascript'),
(49, 'mysql'),
(50, 'php'),
(50, 'java'),
(50, 'web'),
(51, 'bitcoin'),
(51, 'web'),
(51, 'joomla'),
(52, 'ubuntu'),
(52, 'linux'),
(52, 'c-programming'),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, 'ubuntu'),
(NULL, 'linux'),
(NULL, 'c-programming'),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(85, 'NET'),
(85, 'ASP'),
(85, 'Azure'),
(85, 'C#'),
(85, 'HTML5'),
(NULL, 'hadoop'),
(NULL, ''),
(NULL, 'hadoop'),
(NULL, 'hadoop'),
(89, 'hadoop'),
(90, 'hadoop'),
(NULL, 'f'),
(NULL, 'fa'),
(NULL, 'ff'),
(NULL, 'dfa'),
(NULL, 'fasdf'),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, ''),
(NULL, 'as'),
(141, 'adf'),
(142, 'tinymce');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `updates`
--

CREATE TABLE IF NOT EXISTS `updates` (
  `up_id` int(11) NOT NULL DEFAULT '0',
  `p_id` int(11) DEFAULT NULL,
  `up_desc` text,
  `up_type_id` int(11) DEFAULT NULL,
  `up_post_date` date DEFAULT NULL,
  `up_author` int(11) DEFAULT NULL,
  PRIMARY KEY (`up_id`),
  KEY `up_type_id` (`up_type_id`),
  KEY `p_id` (`p_id`),
  KEY `up_author` (`up_author`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `update_type`
--

CREATE TABLE IF NOT EXISTS `update_type` (
  `up_type_id` int(11) NOT NULL DEFAULT '0',
  `up_type_name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`up_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `firstname` varchar(30) DEFAULT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `profile_pic_path` text NOT NULL,
  `timestamp` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `firstname`, `lastname`, `email`, `profile_pic_path`, `timestamp`) VALUES
(0, 'None', NULL, NULL, NULL, NULL, '', ''),
(1, 'deepal', '0de1df6637948ade6f3a260504933b27', 'Deepal', 'Jayasekara', 'deepal.10@cse.mrt.ac.lk', '', '1388861976'),
(2, 'mentor', '3372c084b5cc705da7ff3b4e8cb0d463', 'Mentor', '1', 'mentor@cse.mrt.ac.lk', '', '1388865508'),
(4, 'ukkuwa', '4ee4ca3b3719a9d435fb34a8f9269b9d', 'Piriwena Paare', 'Ukkuwa', 'ukkwa@cse.mrt.ac.lk', '', '1388868871'),
(6, 'test', 'de16620f33902a2502f3f6c929b4d12b', 'Test', 'User', 'testuser@cse.mrt.ac.lk', '', '1388928478');

-- --------------------------------------------------------

--
-- Table structure for table `user_votes`
--

CREATE TABLE IF NOT EXISTS `user_votes` (
  `user_id` int(11) NOT NULL,
  `voted_project_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`voted_project_id`),
  KEY `user_id` (`user_id`),
  KEY `voted_project_id` (`voted_project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_votes`
--

INSERT INTO `user_votes` (`user_id`, `voted_project_id`) VALUES
(1, 37),
(1, 90),
(2, 49),
(2, 51);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `academic_modules`
--
ALTER TABLE `academic_modules`
  ADD CONSTRAINT `academic_modules_ibfk_1` FOREIGN KEY (`module_teacher`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `feedbacks_ibfk_1` FOREIGN KEY (`up_id`) REFERENCES `updates` (`up_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `feedbacks_ibfk_2` FOREIGN KEY (`feed_author`) REFERENCES `users` (`user_id`) ON DELETE SET NULL;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`p_author`) REFERENCES `users` (`user_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `projects_ibfk_2` FOREIGN KEY (`p_mentor`) REFERENCES `users` (`user_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `projects_ibfk_3` FOREIGN KEY (`p_leader`) REFERENCES `users` (`user_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `projects_ibfk_4` FOREIGN KEY (`p_state`) REFERENCES `project_state` (`s_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `projects_ibfk_5` FOREIGN KEY (`p_catagory`) REFERENCES `catagories` (`cat_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `project_follower`
--
ALTER TABLE `project_follower`
  ADD CONSTRAINT `project_follower_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `projects` (`p_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `project_follower_ibfk_2` FOREIGN KEY (`follower_id`) REFERENCES `users` (`user_id`) ON DELETE SET NULL;

--
-- Constraints for table `project_member`
--
ALTER TABLE `project_member`
  ADD CONSTRAINT `project_member_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `projects` (`p_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `project_member_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `users` (`user_id`) ON DELETE SET NULL;

--
-- Constraints for table `project_tags`
--
ALTER TABLE `project_tags`
  ADD CONSTRAINT `project_tags_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `projects` (`p_id`) ON DELETE SET NULL;

--
-- Constraints for table `updates`
--
ALTER TABLE `updates`
  ADD CONSTRAINT `updates_ibfk_1` FOREIGN KEY (`up_type_id`) REFERENCES `update_type` (`up_type_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `updates_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `projects` (`p_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `updates_ibfk_3` FOREIGN KEY (`up_author`) REFERENCES `users` (`user_id`) ON DELETE SET NULL;

--
-- Constraints for table `user_votes`
--
ALTER TABLE `user_votes`
  ADD CONSTRAINT `user_votes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_votes_ibfk_2` FOREIGN KEY (`voted_project_id`) REFERENCES `projects` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
