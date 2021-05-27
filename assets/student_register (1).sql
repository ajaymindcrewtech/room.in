-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2016 at 11:10 AM
-- Server version: 5.6.25
-- PHP Version: 5.5.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `students`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_register`
--

CREATE TABLE IF NOT EXISTS `student_register` (
  `st_id` int(11) NOT NULL,
  `reg_no` varchar(20) NOT NULL,
  `admission_no` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
`admission_class` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `ph_no` varchar(50) NOT NULL,
  `caste` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `dob_word` varchar(100) NOT NULL,
  `age` varchar(20) NOT NULL,
  `f_income` varchar(100) NOT NULL,
  `f_occupation` varchar(100) NOT NULL,
    `m_income` varchar(100) NOT NULL,
  `m_occupation` varchar(100) NOT NULL,
  `t_bs` varchar(20) NOT NULL,
  `adhaar_no` varchar(20) NOT NULL,
  `sssmis` varchar(20) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `ifsc_code` varchar(50) NOT NULL,
  `account_no` varchar(50) NOT NULL,
`subj` varchar(20) NOT NULL,
  `vocational` varchar(20) NOT NULL,
  `handicapped` varchar(20) NOT NULL,
  `type_of_disability` varchar(100) NOT NULL,
  `per_of_disability` varchar(50) NOT NULL,
`previous_school_name` varchar(100) NOT NULL,
  `previous_school_disc` varchar(50) NOT NULL,
  `previous_class` varchar(20) NOT NULL,
  `previous_class_result` varchar(50) NOT NULL,
`previous_class_per` varchar(50) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_register`
--

INSERT INTO `student_register` (`st_id`, `reg_no`, `admission_no`, `gender`, `name`, `fname`, `mname`, `address`, `mobile`, `ph_no`, `caste`, `category`, `religion`, `nationality`, `dob`, `dob_word`, `age`, `f_income`, `f_occupation`, `t_bs`, `adhaar_no`, `sssmis`, `bank_name`, `ifsc_code`, `account_no`) VALUES
(2, '1002', '1011', 'male', 'ajay tiwari ', 'suresh tiwari ', 'babita tiwari ', 'khamaria ', '9638527410', '0761-2400002', 'tiwari ', 'General ', 'hindu ', 'Indian ', '1992-09-30', 'thirty September nineteen ninety two ', '24', '250000', 'business ', '3', '1001', '2001', 'SBI ranjhi ', '3001', '100001'),
(1, '1001', '1010', 'Male ', 'Aniket Sharma ', 'prakash sharma ', 'mamta sharma ', 'vidya nagar jabalpur ', '7418529630', '0761-2400001', 'Sharma ', 'General ', 'Hindu ', 'Indian ', '1997-09-24', 'twenty four September ninteen ninty seven ', '15', '120000', 'clerk ', '2', '1000', '2000', 'CBI adhartal ', '3000', '100000'),
(5, '1005', '1015', 'Male ', 'sunil shrivastava ', 'arun shrivastava ', 'soni shrivastava ', 'vidya nagar jabalpur ', '1020305040', '0761-2405040', 'shrivastava ', 'general ', 'Hindu ', 'Indian ', '2000-03-22', 'twenty two march two thousand ', '16', '350000', 'Probationary officer ', '2', '1005', '2005', 'PNB VFJ jabalpur ', '3005', '100005'),
(3, '1003', '1013', 'female', 'ankita markam ', 'santosh markam', 'parvati markam ', 'kundam ', '8520741963', '076-12015658', 'markam ', 'Sc', 'hindu ', 'Indian ', '1999-06-14', 'fourteen jun nineteen ninety nine ', '13', '180000', 'farmer ', '4', '1003', '2003', 'CBI kundam ', '3003', '100003'),
(4, '1004', '1014', 'male', 'amit pal ', 'ajeet pal ', 'sheela pal ', 'bada patthar ', '9602587412', '0761-2400201', 'pal ', 'OBC', 'hindu', 'Indian ', '2002-09-17', 'seventeen september two thausand two ', '14', '190000', 'majdoor ', '2', '1004', '2004', 'SBI ranjhi ', '3004', '100004'),
(7, '1007', '1017', 'female', 'renuka chaudahri ', 'pratap chaudhari ', 'laxmi chaudhari ', 'kanchghar ', '7865984525', '0761-2014526', 'chaudhari ', 'OBC ', 'Hindu ', 'Indian ', '1999-11-24', 'twenty four movember nineteen ninety nine', '17', '450000', 'job', '1', '1007', '2007', 'pnb Kanchghar ', '3007', '100007'),
(6, '1006', '1016', 'female', 'priyanka yadav ', 'ramsingh yadav ', 'rambai yadav', 'gokalpur ', '7894561230', '0761-2431552', 'yadav ', 'OBC ', 'hindu', 'Indian ', '2002-03-17', 'seventeen march two thousand two ', '14', '220000', 'labour ', '4', '1006', '2006', 'CBI gokalpur ', '3006', '100006'),
(8, '1008', '1018', 'male', 'aman verma ', 'mayank verma ', 'priyanshi verma ', 'chungi chauki ', '78546935', '0761-244556', 'verma ', 'SC', 'hindu', 'Indian ', '1998-09-16', 'sixteen september nineteen ninety eight ', '18', '560000', 'job', '3', '1008', '2008', 'SBI chungi chauki ', '3008', '100008'),
(9, '1009', '1019', 'female', 'sona apte ', 'kartik apte ', 'sonali apte ', 'vijay nagar ', '96856432', '0761-2405264', 'apte ', 'SC', 'Hindu ', 'Indian ', '2001-10-24', 'twenty four october two thousand one ', '15', '600000', 'JOB', '1', '1009', '2009', 'CBI vijay nagar ', '3009', '100009'),
(10, '1010', '1021', 'male', 'santanu mishra ', 'pinku mishra ', 'rohini mishra ', 'ranjhi darshan tiraha ', '898955655', '0761-2430665', 'mishra ', 'General ', 'hindu', 'Indian ', '2002-05-23', 'twenty three may two thousand two ', '14', '1500000', 'business ', '3', '1010', '2010', 'SBI ranjhi ', '3010', '100010'),
(11, '1012', '1022', 'female', 'ruhi negi ', 'shubham negi ', 'kalavati negi ', 'ghamapur ', '85965865', '0761-2546465', 'negi ', 'sc ', 'hindu ', 'Indian ', '2004-05-26', 'twenty six may two thousand four ', '12', '210000', 'clerk ', '1', '1010', '2010', 'CBI ghamapur ', '3010', '100003'),
(12, '1013', '1023', 'male', 'ajay sen', 'ajeet sen', 'sheela sen', 'bada patthar ', '96024717412', '0761-2404101', 'sen', 'OBC', 'hindu', 'Indian ', '2004-09-22', 'twenty two september two thousand four ', '12', '390000', 'job', '3', '1012', '2004', 'SBI bada patthar ', '30012', '100012'),
(13, '1013', '1024', 'female', 'fatima ansari ', 'farukh ansari ', 'ruksana ansari ', 'madai VFJ jabalpur ', '98270547025', '0761-2400250', ' ansari ', 'OBC', 'muslim ', 'Indian ', '1997-01-25', 'twenty five january nineteen ninety seven ', '21', '450000', 'business ', '2', '1013', '2013', 'bank of baroda madai ', '3013', '100013'),
(14, '1014', '1024', 'male', 'raja kevat ', 'kallu kevat ', 'mala kevat ', 'New gokalpur ', '78456958', '0761-2431555', 'kevat ', 'ST ', 'hindu ', 'Indian ', '2002-03-16', 'sixteen march two thousand two ', '14', '120000', 'labour ', '4', '1014', '2014', 'SBI new gokalpur ', '3014', '100014'),
(15, '1015', '1025', 'female', 'vini xavier ', 'ashok xavier ', 'Catherine xavier ', 'nanaknagar ', '7985955463', '0761-2322565', 'xavier ', 'General ', 'Christian ', 'Indian ', '1999-12-15', 'fifteen december nineteen ninety nine ', '13', '600000', 'job ', '2', '1015', '2015', 'CBI nanak nagar ', '3015', '100015'),
(16, '1016', '1026', 'male', 'amit bose ', 'kalicharan bose ', 'jhooma bose ', 'uday nagar ', '789658965', '0761-24022556', 'bose ', 'OBC', 'hindu ', 'Indian ', '2004-05-29', 'twenty nine may two thousand four ', '12', '356000', 'job', '2', '1016', '2016', 'SBI ranjhi ', '3016', '100016'),
(17, '1017', '1027', 'female', 'tisnagi bose ', 'ramtek bose ', 'warmala bose ', 'rampur ', '798546321', '0761-2642250', 'bose ', 'General ', 'hindu ', 'Indian ', '2004-06-30', 'thirty june two thousand four ', '14', '580000', 'business ', '3', '1017', '2017', 'union bank of india rampur  ', '3017', '100017'),
(18, '1018', '1028', 'male ', 'sharman joshi ', 'harman joshi ', 'jyotshna joshi', 'khamaria ', '9858965899', '0761-2415442', 'joshi', 'obc', 'hindu', 'Indian ', '2003-10-01', 'one October two thousand three  ', '13', '160000', 'farmer ', '1', '1018', '2018', 'UBI khamaria', '3018', '100018'),
(19, '1019', '1029', 'Male ', 'Ankush Sharma ', 'arjun sharma ', 'maya sharma ', 'ranjhi ', '9926356325', '0761-2402010', 'sharma ', 'General ', 'hindu', 'Indian ', '2002-12-09', 'nineteen december two thousand two ', '14', '180000', 'majdoor ', '3', '1019', '2019', 'CBI ranjhi ', '3019', '100019'),
(20, '1020', '1030', 'female ', 'anita burman', 'keshav burman ', 'radha burman ', 'gokalpur ', '8898866559', '0761-2430115', 'burman', 'sc', 'hindu', 'Indian ', '1999-02-20', 'twenty February nineteen ninetynine  ', '17', '260000', 'job', '2', '1020', '2020', 'SBI gokalpur ', '3020', '100020'),
(21, '1021', '1031', 'female ', 'Khusi patel', 'ronak patel', 'mukta patel', 'adhartal', '8546698562', '0761-2431665', 'patel', 'OBC ', 'hindu ', 'indian ', '1999-08-30', 'thirty august nineteen ninety nine ', '17', '150000', 'majdoor', '3', '1021', '2021', 'union bank of india adhartal', '3021', '100021'),
(22, '1022', '1032', 'male ', 'vampayre khan ', 'abdul khan ', 'rukshar khan ', 'chandmari ', '8978465589', '0761-2495263', 'khan ', 'SC', 'muslim', 'indian ', '1999-02-21', 'twenty one February nineteen ninety nine  ', '17', '250000', 'job', '3', '1022', '2022', 'CBI chandmari ', '3022', '10022'),
(23, '1023', '1033', 'male ', 'shubham riakwar ', 'sanju raikwar ', 'swati raikwar ', 'panager ', '8256986535', '0761-2016985', 'raikwar ', 'Sc ', 'hindu', 'indian ', '2002-09-23', 'twenty three september two thousand two ', '14', '356000', 'job', '2', '1023', '2023', 'bank of baroda panager ', '3022', '10023');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_register`
--
ALTER TABLE `student_register`
  ADD PRIMARY KEY (`st_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_register`
--
ALTER TABLE `student_register`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

CREATE TABLE IF NOT EXISTS `exam_result1` (
  `st_id` int(11) NOT NULL,
`session` varchar(100) NOT NULL,
   `admission_class` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `exam` varchar(100) NOT NULL,
 `hindi` varchar(20) NOT NULL,
`english` varchar(20) NOT NULL,
`maths` varchar(20) NOT NULL,
`science` varchar(20) NOT NULL,
`s.sc` varchar(20) NOT NULL,
`sanskrit` varchar(20) NOT NULL,
`total` varchar(20) NOT NULL,
`per` varchar(20) NOT NULL,
`division` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=01 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `exam_result_maths` (
  `ex_id` bigint(11) NOT NULL,
  `st_id` bigint(20) NOT NULL,
  `session` varchar(100) NOT NULL,
  `reg_no` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `qty_y` int(1) NOT NULL DEFAULT '0',
  `hindi` int(11) NOT NULL,
  `english` int(11) NOT NULL,
  `maths` int(11) NOT NULL,
  `physics` int(11) NOT NULL,
  `chemistry` int(11) NOT NULL,
  `p_prac` int(11) NOT NULL,
  `c_prac` int(11) NOT NULL,
 `half_y` int(1) NOT NULL DEFAULT '0',
  `hindi1` int(11) NOT NULL,
  `english1` int(11) NOT NULL,
  `maths1` int(11) NOT NULL,
  `physics1` int(11) NOT NULL,
  `chemistry1` int(11) NOT NULL,
  `p_prac1` int(11) NOT NULL,
  `c_prac1` int(11) NOT NULL,
 `final_y` int(1) NOT NULL DEFAULT '0',
  `hindi2` int(11) NOT NULL,
  `english2` int(11) NOT NULL,
  `maths2` int(11) NOT NULL,
  `physics2` int(11) NOT NULL,
  `chemistry2` int(11) NOT NULL,
  `p_prac2` int(11) NOT NULL,
  `c_prac2` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `exam_result_bio` (
  `ex_id` bigint(11) NOT NULL,
  `st_id` bigint(20) NOT NULL,
  `session` varchar(100) NOT NULL,
  `reg_no` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
    `qty_y` int(1) NOT NULL DEFAULT '0',
  `hindi` int(11) NOT NULL,
  `english` int(11) NOT NULL,
  `bio` int(11) NOT NULL,
  `physics` int(11) NOT NULL,
  `chemistry` int(11) NOT NULL,
  `p_prac` int(11) NOT NULL,
  `b_prac` int(11) NOT NULL,
  `c_prac` int(11) NOT NULL,
    `half_y` int(1) NOT NULL DEFAULT '0',
    `hindi1` int(11) NOT NULL,
  `english1` int(11) NOT NULL,
  `bio1` int(11) NOT NULL,
  `physics1` int(11) NOT NULL,
  `chemistry1` int(11) NOT NULL,
  `p_prac1` int(11) NOT NULL,
  `b_prac1` int(11) NOT NULL,
  `c_prac1` int(11) NOT NULL,
    `final_y` int(1) NOT NULL DEFAULT '0',
    `hindi2` int(11) NOT NULL,
  `english2` int(11) NOT NULL,
  `bio2` int(11) NOT NULL,
  `physics2` int(11) NOT NULL,
  `chemistry2` int(11) NOT NULL,
  `p_prac2` int(11) NOT NULL,
  `b_prac2` int(11) NOT NULL,
  `c_prac2` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `exam_result_arts` (
  `ex_id` bigint(11) NOT NULL,
  `st_id` bigint(20) NOT NULL,
  `session` varchar(100) NOT NULL,
  `reg_no` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
`qty_y` int(1) NOT NULL DEFAULT '0',
  `hindi` int(11) NOT NULL,
  `english` int(11) NOT NULL,
  `economics` int(11) NOT NULL,
  `geograpy` int(11) NOT NULL,
  `political_science` int(11) NOT NULL,
  `g_prac` int(11) NOT NULL,
`half_y` int(1) NOT NULL DEFAULT '0',
  `hindi1` int(11) NOT NULL,
  `english1` int(11) NOT NULL,
  `economics1` int(11) NOT NULL,
  `geograpy1` int(11) NOT NULL,
  `political_science1` int(11) NOT NULL,
  `g_prac1` int(11) NOT NULL,
`final_y` int(1) NOT NULL DEFAULT '0',
  `hindi2` int(11) NOT NULL,
  `english2` int(11) NOT NULL,
  `economics2` int(11) NOT NULL,
  `geograpy2` int(11) NOT NULL,
  `political_science2` int(11) NOT NULL,
  `g_prac2` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `upgrade_session` (
`id` int(11) NOT NULL,
  `st_id` int(11) NOT NULL,
`session` varchar(20) NOT NULL,
   `present_class` varchar(20) NOT NULL,
  `section` varchar(20) NOT NULL,
  `roll_no` varchar(50) NOT NULL,
 `admission_no` varchar(50) NOT NULL,
`subject` varchar(20) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=01 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `student_data` (
`id` int(11) NOT NULL,
 `name` varchar(20) NOT NULL,
   `mobile` varchar(20) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=01 DEFAULT CHARSET=latin1;