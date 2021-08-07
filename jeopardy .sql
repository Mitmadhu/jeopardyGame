-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 21, 2021 at 02:06 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jeopardy`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` mediumtext NOT NULL,
  `email` varchar(500) NOT NULL,
  `feedback` mediumtext NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `feedback`, `created_on`) VALUES
(1, 'Madhu', 'madhu@gmail.com', 'Testing', '2021-06-21 17:20:56');

-- --------------------------------------------------------

--
-- Table structure for table `editorial`
--

CREATE TABLE `editorial` (
  `id` int(11) NOT NULL,
  `question` mediumtext NOT NULL,
  `option1` varchar(500) NOT NULL,
  `option2` varchar(500) NOT NULL,
  `option3` varchar(500) NOT NULL,
  `option4` varchar(500) NOT NULL,
  `answer` int(11) NOT NULL,
  `level` int(11) NOT NULL DEFAULT 100
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `editorial`
--

INSERT INTO `editorial` (`id`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`, `level`) VALUES
(10, 'The Cabinet Committee on Economic A ffairs chaired by Prime Minister Narendra Modi has approved construction of industrial corridor nodes in which two states?', 'West Bengal and Jharkhand', 'Maharashtra and Rajasthan', 'Odisha and Jharkhand', 'Andhra Pradesh and Karnataka', 4, 400),
(11, 'Prime Minister Narendra Modi laid the foundation stone of All India Institute of Medical Sciences ( AIIMS) in which city of Gujarat?', 'Ahmedabad', 'Rajkot', 'Surat', 'Vadodara', 2, 200),
(12, 'Who was awarded a knighthood in the UK\'s New Year\'s Honours List?', 'Dan Evans', 'Chris Adcock', 'Ben Stokes', 'Lewis Hamilton', 4, 400),
(13, 'Raghvendra Singh Chauhan has been appointed as the Chief Justice of which High Court?', 'Uttarakhand', 'Sikkim', 'Madhya Pradesh', 'Odisha', 1, 200),
(14, 'Who has been appointed as the new chairman and CEO of the Railway Board ?', 'Vishal Yadav', 'Suneet Sharma', 'Abhishek Singh', 'Rakesh Nigam', 2, 300),
(15, 'Who has been named as t he deputy election commissioner in the Election Commission of India?', 'Umesh Sinha', 'Ajay Kumar', 'Harsh Dikshit', 'Rajat Nanda', 1, 100),
(16, 'Adopt a Heritage: Apni Dharohar, Apni Pehchaan scheme is an initiative of the Ministry of Tourism, in collaboration with which Ministry?  \r\n\r\n', 'Ministry of Home Affairs', 'Ministry of Tribal Affairs', 'Ministry of Culture', 'Ministry of Urban Development', 3, 100),
(17, 'Kuttanad , where around 10,000 ducks died recently, is located in which state?', 'Andhra Pradesh', 'Kerala', 'Odisha', 'Tamil Nadu', 2, 100),
(18, 'The Odisha government has decided to set up a memorial in which city to honour the Covid Warriors?', 'Cuttack', 'Rourkela', 'Bhubneshwar', 'Puri', 3, 100),
(19, 'Who has become Asia’s richest person , according to the Bloomberg Billionaires Index?', 'Jack Ma', 'William Ding', 'Qin Yinglin', 'Zhong Shanshan', 4, 200),
(20, 'When is World Leprosy Day is celebrated in India?', 'January 31', 'January 28', 'January 30', 'January 27', 3, 100),
(21, 'Who is the author of the book “SOUMITRA CHATTERJEE: A Life in Cinema, Theatre,Poetry & Painting”?', 'Mohit Upadhyay', 'Keshav Anand', 'Saksham Singh', 'Arjun Sengupta', 4, 200),
(22, 'Who has been appointed as the new Chief Executive Officer of Amazon?', 'David Limp', 'Tom Taylor', 'Dave Clark', 'Andy Jassy', 4, 200),
(23, 'What is the GDP growth rate projected by RBI in its Monetary Policy Statement for Financial Year 2021-22?', '9.7%', '.8.9%', '10.5%', '11.2%', 3, 200),
(24, 'Who has been appointed as the interim Chief of the Central Bureau of Investigation?', 'Praveen Sinha', 'Harsh Patil', 'R K S hukla', 'Manoj S ingh', 1, 200),
(25, 'State Election Commissioner (SEC) of which state has launched an \' e-Watch\' app to conduct panchayat polls with total transparency?', 'Odisha', 'Haryana', 'Andhra Pradesh', '.Punjab', 3, 400),
(26, 'Who will become the L eader of the Opposition in the Rajya Sabha a s Ghulam Nabi Azad’s term ends on February 15?', 'P. Chidambaram', 'Mallikarjun Kharge', 'Jairam Ramesh', 'Digvijaya Singh', 2, 200),
(27, 'When is National Productivity Day observed every year in India?', '14 February', '11 February', '13 February', '12 February', 4, 100),
(28, 'The Reserve Bank of India has given permission to which company f or the takeover of Dewan Housing Finance Corporation Ltd ( DHFL)?', 'Reliance Industries', 'Kotak Mahindra', 'Piramal Group', 'Indiabulls Group', 3, 300),
(29, 'Who has taken over as Principal Director General of All India Radio News ?', 'Vinod Dua', 'N. Venudhar Reddy', 'Jaideep Singh', 'Sunit Tandon', 2, 400),
(30, 'Which state government is set to launch Mahasamruddhi Mahila Sashaktikaran scheme on March 8?', 'Madhya Pradesh', 'Maharashtra', 'Uttar Pradesh', 'Jharkhand', 2, 300),
(31, 'What are N440K and E484K, seen in news recently?', 'New strain of Flu', 'Variety of Rice', 'New strains of SARS-CoV-2', 'Variety o f Sunflower', 3, 400),
(32, 'Who is the author of the book “ Bare Necessities: How to Live a Zero Waste Life “?', 'Gaurav Punj', 'Nimsdai Purja', 'Tim De Ridder', 'Michael Palin', 3, 300),
(33, 'Which church of Kerala has been declared as the monument of national importance by the Archaeological Survey of India (ASI)? ', 'St. George’s Orthodox Church', 'St. Alphonsa’s Church', 'Santa Cruz Basilica', 'St. Francis Church', 1, 300),
(34, 'What is the theme of the second edition of Global Bio-India 2021 ?', 'Women in Biotechnology', 'Transforming lives', 'Change is Need', 'Know the Needle', 2, 200),
(35, 'Who is the current Chairman of the Central Board of Direct Taxes?', 'Pramod Chandra Mody', 'Arun Kumar Jain', 'Shushil Chandra', 'Atulesh Jindal', 1, 100),
(36, 'India has described which country as “Priority One” partner in the defence sphere?', 'Russia', 'Israel', 'Bangladesh', 'Sri Lanka', 4, 300),
(37, 'According to a recently published report by the World Bank, how many countries in the world offer full equal rights for women?', '12', '9', '10', '8', 3, 400),
(38, 'Who has topped the Hurun Global Rich List 2021?', 'Bernard Arnault', 'Jeff Bezos', 'Bill Gates', 'Elon Musk', 4, 100),
(39, 'What is the length of India’s first elevated Urban Expressway “ Dwarka Expressway ”?', '29 km', '15 km', '20 km', '35 km', 1, 200);

-- --------------------------------------------------------

--
-- Table structure for table `sports`
--

CREATE TABLE `sports` (
  `id` int(11) NOT NULL,
  `question` mediumtext NOT NULL,
  `option1` varchar(500) NOT NULL,
  `option2` varchar(500) NOT NULL,
  `option3` varchar(500) NOT NULL,
  `option4` varchar(500) NOT NULL,
  `answer` int(11) NOT NULL,
  `level` int(11) NOT NULL DEFAULT 100
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sports`
--

INSERT INTO `sports` (`id`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`, `level`) VALUES
(20, 'Who got the ICC player of the month award in March 2021?', 'Bhuvaneshwar Kumar', 'Rishabh Pant', 'Johny Bairstow', 'Rohit Sharma', 1, 400),
(21, 'Who is the first Indian woman cricketer to score more than 10000 runs in international cricket?', 'Smriti Mandhana', 'Shafali Verma', 'Mithali Raj', 'Sushma Verma', 3, 300),
(22, 'What is the ranking of India in FIFA?', '108', '110', '105', '122', 1, 100),
(23, 'Who won the woman Asian Wrestling Championship in 2021? ', 'Shashi Malik', 'Babita Kumari', 'Vinesh Phogat', 'Kavita Devi', 3, 200),
(24, 'In IPL 2021, who is leading the Rajasthan Royals team?', 'Ben Stokes', 'Chris Morris', 'Sanju Samson', 'Jofra Archer', 3, 100),
(25, 'Who is the newly appointed captain of the Delhi Capitals team in IPL 2021?', 'Prithwi Shaw', 'Shikhar Dhawan', 'Shreyas Iyer', 'Rishabh Pant', 4, 200),
(26, 'Which team has won the most IPL trophies till 2021?', 'CSK', 'SRH', 'MI', 'RCB', 3, 100),
(27, 'Which player scored the first hundred in IPL 2021? ', 'Sanju Samson', 'Shikhar Dhawan', 'Glenn Maxwell', 'A B Devilliers', 1, 300),
(28, 'Which team wins the Copa Del Rey in 2021?', 'Fullham', 'Barcelona', 'Athletic Bilbao', 'Real Madrid', 2, 300),
(29, 'Which team win against Manchester City to reach the FA cup finals in 2021?', 'Leicester City', 'Bayern Munich', 'Chelsea', 'Liverpool', 3, 400),
(30, 'Which cricket stadium is considered as the largest stadium (by capacity) in the world?', 'Narendra modi stadium', 'SCG', 'Eden Garderns', 'Lords', 1, 200),
(31, ' Who was the first Indian to receive the International Shooting Sport Federation (ISSF) Blue Cross?', 'Ronjan Sodhi', 'Vijay Kumar', 'Gagan Narang', 'Abhinav Bindra', 4, 400),
(32, 'Aishwarya Pissay excels in which one of the following sports?', 'Badminton', 'Boxing', 'Motorsports', 'Chess', 3, 100),
(33, 'Who among the following were selected for the Rajiv Gandhi Khel Ratna Award 2019?', 'Vijay Kumar and Yogeshwar Dut', 'Sakshi Malik and Jitu Rai', 'Virat Kohli and Mirabai Chanu', 'Bajrang Punia and Deepa Malik', 3, 300),
(34, 'Which athlete scored first position in the London Marathon held on 4th October, 2020?', 'Eliud Kipchoge', 'Shura Kitata', 'Vincent Kipchumba', 'Sisay Lemma', 2, 200),
(35, 'Who has won the Women\'s Singles US Open Tennis Tournament, 2020?', 'Naomi Osaka', 'Bianca Andreescu', 'Sofia Kenin', 'K. Pliskova', 1, 300),
(36, 'Who won BBC\'s Sports Personality of the Year prize 2020?', 'Lewis Hamilton', 'Michael Schumacher', 'Jordan Henderson', 'Hollie Doyle', 1, 400),
(37, 'Indian cricket team\'s lowest score in test matches was in -', '42 at the Lord\'s in 1974 against England', '36 at Adelaide in 2020 against Australia', '58 at Brisbane in 1947 against Australia', '58 at Manchester in 1952 against England', 2, 100),
(39, 'Who among the following cricketers has become the first bowler to claim 500 wickets in T20 Cricket?', 'Dwayne Bravo', 'Stuart Broad', 'James Andreson', 'Jaspreet Bumrah', 1, 200),
(40, 'How many teams participated in ICC Women\'s T-20 World Cup that was held during February-March 2020 in Australia?', '08', '10', '12', '14', 2, 200),
(41, 'Who has been honoured by the International Olympic Committee with the Coaches Life Time Achievement Award 2019?', 'Ravi Shastri', 'Pullela Gopichand', 'Prakash Padukone', 'Sunil Gavaskar', 2, 300),
(42, 'Which of the following Indian Football Club became country\'s first ever football club to feature on NASDAQ billboards in New York\'s Time Square on 29th July, 2020?', 'East Bengal', 'Churchill Brothers', 'Mohun Bagan', 'Bengaluru Football Club', 3, 400),
(43, 'Triples is a new format of', 'Boxing', 'Judo', 'Chess', 'Badminton', 4, 100),
(44, 'The National Dope Testing Laboratory functions under the -', 'Ministry of Health and Family Welfare', 'Ministry of Science and Technology', 'Ministry of Youth Affairs and Sports', 'Ministry of Home Affairs', 3, 200),
(45, 'RYZEN is the word related to which company products when it comes to processors?', 'INTEL', 'AMD', 'SAMSUNG', 'MEDIATEK', 2, 200),
(46, 'StarLink is an idea of-', 'Jeff Bezoz', 'Elon Musk', 'Satya Nadela', 'Anil Ambani', 2, 200),
(49, 'Who was unanimously elected as the President of the Asian Cricket Council?', 'Rahul Dravid', 'Ajit Agarkar', 'Jay Shah', 'Anil Kumble', 3, 300),
(50, 'The Board of Control for Cricket in India (BCCI) for the first time in________ years has cancelled Ranji Trophy tournament?', '87 years', '74 years', '56 years', '69 years', 1, 100),
(51, 'Which country has won the 2021 Men’s Handball World Championships held in Egypt?', 'Sweden', 'Spain', 'Denmark', 'France', 3, 200),
(52, 'Which country has topped the medal tally of the first Asian Online Shooting Championship ?', 'India', 'Japan', 'Vietnam', 'China', 1, 100);

-- --------------------------------------------------------

--
-- Table structure for table `technology`
--

CREATE TABLE `technology` (
  `id` int(11) NOT NULL,
  `question` mediumtext NOT NULL,
  `option1` varchar(500) NOT NULL,
  `option2` varchar(500) NOT NULL,
  `option3` varchar(500) NOT NULL,
  `option4` varchar(500) NOT NULL,
  `answer` int(11) NOT NULL,
  `level` int(11) NOT NULL DEFAULT 100
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `technology`
--

INSERT INTO `technology` (`id`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`, `level`) VALUES
(6, '	\r\nWhat is a GPU?', 'Grouped Processing Unit', 'Graphics Processing Unit', 'Graphical Performance Utility', 'Graphical Portable Unit', 2, 100),
(7, 'Which company is the first trillion-dollar company in the world?', 'Amazon', 'Microsoft', 'Intel', 'Apple', 4, 100),
(8, 'Who invented the World Wide Web (WWW)?', 'Sir Tim Berners Lee', 'Sir Newton', 'Satya Nadela', 'Tim Cook', 1, 100),
(9, 'Which company is a silicon chip manufacturer for APPLE?', 'TSMC', 'SAMSUNG', 'GLOBAL FOUNDARIES', 'APPLE', 1, 200),
(10, 'Which Company makes their own silicon chip?', 'NVIDIA', 'INTEL', 'QUALCOMM', 'MEDIATEK', 2, 200),
(11, 'The game CSGO is firstly introduced in year-', '1998', '1997', '1999', '2001', 3, 300),
(12, 'what is the name of the processor which is developed by APPLE?', 'Apple Silicon M1', 'RTX', 'Snapdragon', 'Hisilicon', 1, 300),
(13, 'Which storage technology is faster in terms of speed-', 'SSD M.2 3.0', 'HDD', 'NAND FLASH', 'SSD M.2 4.0', 4, 400),
(14, 'Lisa Su is the CEO of the-', 'NVIDIA', 'Qualcomm', 'SAMSUNG', 'AMD', 4, 400),
(15, 'Doug McMillon runs a company name as-', 'Walmart', 'Amazon', 'Flipkart', 'Hathway', 1, 300),
(16, 'Flipkart, an Indian company bought by-', 'Walmart', 'Reliance', 'Microsoft', 'Samsung', 1, 200),
(17, 'PUBG Mobile is a game maintained by which organization?', 'Microsoft', 'Amazon', 'Tencent', 'NVIDIA', 3, 100),
(18, 'Which Game is the Highest earning game in 2020 despite being banned in India?', 'Pubg Mobile', 'COD mobile', 'Candy Crush', 'League Of Legends', 1, 100),
(20, 'Microsoft Windows OS is based on which architecture?', 'x86-64', 'ARM', 'IA64', 'AMD64', 1, 200),
(21, 'Apple silicon M1 is based on which architecture?', 'x86-64', 'AI64', 'ARM', 'AMD64', 3, 200),
(22, 'We use which instruction sets in the Windows OS?', 'CISC', 'RISC', 'TTA', 'MISC', 2, 300),
(23, 'Which of the following is not a database?', 'Centralized Database', 'Distributed Database', 'Hierarchical Databases', 'Python', 4, 400),
(24, 'Elon Musk is the CEO of the-', 'Tesla', 'Amazon', 'Walmart', 'Google', 1, 100),
(25, 'Which company has won the contract worth Rs 2,500 crore contract for Mumbai-Ahmedabad Bullet Train?', 'Hindustan Construction Company', 'Larsen & Toubro', 'GMR Infrastructure Limited', 'Reliance Infrastructure Limited', 2, 300),
(26, 'ISRO is planning to launch Brazil\'s Amazonia-1 by the end of feb 2021 through its which rocket?', 'PSLV-C47', 'PSLV-C51', 'PSLV-C35', 'PSLV-C55', 2, 300),
(27, 'What is the name of the Made In India App which is being seen an Indian alternative to Twitter?', 'Doo App', 'Too App', 'Woo App', 'Koo App', 4, 200),
(28, 'India’s tallest air purifier filter will be installed at which place on trial basis?', 'New Delhi', 'Lucknow', 'Chandigarh', 'Pune', 3, 100),
(29, 'India has decided to test Astra Mark 2 missile which has a strike range of ______?', '120 km', '130 km', '220 km', '160 km', 4, 200),
(30, 'IIT Madras-incubated startup Pi Beam has launched an electric two-wheeler for Rs 30,000. What is the name of this bike?', 'NiMo', 'PiMo', 'CiNo', 'GiMo', 2, 200),
(31, 'HCL Technologies has inked an agreement with which Indian Institute of Technology to collaborate in the area of cybersecurity?', 'IIT Bombay', 'IIT Madras', 'IIT Roorkee', 'IIT Kanpur', 4, 200),
(32, 'The Supreme Court of which country launched the Artificial Intelligence (AI) based translation software ‘ AmarVasha’?', 'India', 'Bhutan', 'Nepal', 'Bangladesh', 4, 300),
(33, 'DRDO has successfully carried out joint user trials of Helina and Dhruvastra missiles from the Advanced Light Helicopter (ALH) at Pokhran? These are which types of missiles?', 'Anti-Tank Guided Missiles', 'Land-attack missile', 'Air to Air Missile', 'Medium Range Missile', 1, 200),
(34, 'Which has become the first state or Union Territory in India to launch Carbon Watch, a mobile application to assess the carbon footprint of an individual?', 'New Delhi', 'Goa', 'Himachal Pradesh', 'Chandigarh', 4, 400),
(35, 'K -9 Vajra-T 155 mm/ 52 calibre self-propelled guns have been developed by which company?', 'Bharat Dynamics', 'Bharat Advanced Defence Systems', 'Larsen & Toubro', 'Garden Reach Shipbuilders & Engineers', 3, 400),
(36, 'Which Payments Bank has been included in the category of a scheduled commercial bank by the Reserve Bank of India?', 'India Post Payments Bank', 'Paytm Payments Bank', 'Airtel Payments Bank', 'Fino Payments Bank', 4, 300);

-- --------------------------------------------------------

--
-- Table structure for table `trailer`
--

CREATE TABLE `trailer` (
  `id` int(11) NOT NULL,
  `question` mediumtext NOT NULL,
  `option1` varchar(500) NOT NULL,
  `option2` varchar(500) NOT NULL,
  `option3` varchar(500) NOT NULL,
  `option4` varchar(500) NOT NULL,
  `answer` int(11) NOT NULL,
  `level` int(11) NOT NULL DEFAULT 100
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trailer`
--

INSERT INTO `trailer` (`id`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`, `level`) VALUES
(6, 'Which among the following is the first official MCU series launches on Disney+ Hotstar on 15 January 2021?', 'Agents of shield', 'Inhumans', 'Wanda Vision', 'Captain America', 3, 100),
(7, 'What is the release date of final chapter of \"To All the Boys: Always and Forever\" on Netflix?', '25 Jan 2021', '19 Feb 2021', '!9 Mar 2021', '25 March 2021', 2, 300),
(8, 'Who is the lead actress in the Netflix series \"The Girl In the Pain\" arrived on 26 Feb 2021?', 'Priyanka Chopra', 'Radhika Apte', 'Kiara Advani', 'Parineeti Chopra', 4, 200),
(9, 'Which film of Rajkumar Rao is recently nominated in Oscar\'s 2021?', 'Newton', 'The Bengal Tiger', 'The White Tiger', 'Shimla Mirchi', 3, 200),
(10, 'Who won the 51st Dadasaheb Phalke award for contribution in actor, producer and screenwriter recently in 2021?', 'Rajnikanth', 'Prabhas', 'Rana Dagubatti', 'Allu Arjun', 1, 100),
(11, 'Who played the captain america role in 1st to  5th episode of The falcon and The winter soldier web series 2021?', 'Chris Evans', 'Anthonie Mackie', 'Wyatt Russell', 'Sebastian Stan', 3, 100),
(12, 'When will be the Oscars of year 2021?', '25 april 2021', '18 april 2021', '25 may 2021', '11 april 2021', 1, 400),
(13, 'Abhijaan is the biopic of which person?', 'Mamta Banerjee', 'Anuradha Chatterjee', 'Kusum Banerjee', 'Shri Soumitra Chatterjee.', 4, 400),
(14, 'Shantanu Mohapatra , who passed away recently, was the music director of which regional music?', 'Malayalam', 'Marathi', 'Odia', 'Tamil', 3, 300),
(15, 'Which company has recently changed its logo after complaint calls signage offensive to women?', 'Azio', 'Nykaa', 'Purplle', 'Myntra', 4, 100),
(16, 'Which Indian documentary film has won the audience award in the World Cinema Documentary category at Sundance Film Festival 2021?', 'Free Solo', 'Ladies First', 'Before the Flood', 'Writing with Fire', 4, 300),
(17, 'Which Indian short film is shortlisted in top 10 films under L ive Action Short film category for 93rd Oscar Awards?', 'Bittu', 'Kaash', 'Chappal', '.Bhay', 1, 400),
(18, 'Redcliffe Lifesciences has roped in which Actoress as the brand ambassador for their fertility and pregnancy care brand, Crysta?', 'Aishwarya Rai', 'Kareena Kapoor Khan', 'Neha Dupiya', 'Karishma Kapoor', 2, 200),
(19, 'Who has won the best actor award at the Dadasaheb Phalke International Film Festival Awards 2021?', 'Sushant Singh Rajput', 'Akshay Kumar', 'Varun Dhawan', 'Ajay Devgan', 2, 100),
(20, 'Levi’s has appointed whom as its Global Brand Ambassador?', 'Priyanka Chopra', 'Alia Bhatt', 'Nora Fatehi', 'Deepika Padukone', 4, 300),
(21, 'Actor featured in the upcoming movie \"Chehre\"?', 'Ranbir Kapoor', 'Akshay Kumar', 'Rajkumar Rao', 'Emraan Hazmi', 4, 100),
(22, 'Which movie lost the title of highest-grossing film at the worldwide box office to \"Avatar\"?', 'Avengers Infinity War', 'Thor Rangnarok', 'Avengers Endgame', 'Captain America The Civil War', 3, 300),
(23, 'What is the title of book written by Priyanka Chopra Jonas?', 'Everything I know about love', 'More than a woman', 'Untamed', 'Unfinished', 4, 300),
(24, 'Which indian actor hosts the 73rd BAFTA Awards 2021 along with other hosts?', 'Deepika Padukone', 'Shahrukh Khan', 'Aamir Khan', 'Priyanka Chopra Jonas', 4, 100),
(25, 'Shang-Chi and the Legend of the Ten Rings will be releasing in theatres on?', '17 sept 2021', '3 sept 2021', '10 sept 2021', '24 sept 2021', 2, 200),
(26, 'What is the release date of film Thalaivi?', '16 april 2021', '30 april 2021', '23 april 2021', '10 april 2021', 3, 300),
(27, 'Anek will release in theatres on 17 September 2021.Who is the main lead of this movie?', 'Rajkumar Rao', 'Kartik Aryan', 'Tiger Shroff', 'Ayushman Khuraana', 4, 400),
(28, 'Who won the trophy of Big Boss season 14?', 'Nikki Tamboli', 'Rakhi Sawant', 'Rubina Dilaik', 'Rahul Vaidya', 3, 300),
(29, 'What is the name Arjun Rampal\'s daughter? ', 'Tahira Rampal', 'Shraddha Ramapal', 'Mahikaa Rampal', 'Megha Rampal', 3, 200),
(30, 'How many Indian movies did Netflix Unveils for 2021?', '11', '12', '13', '15', 3, 400),
(31, 'What is the title of 3rd installment of Marvel\'s Spider Man?', 'Far From Home', 'Homecoming', 'Home Sick', 'No way Home', 4, 200),
(32, 'Who is the lead actor of the upcoming Netflix series Cruella?', 'Chloe Bennet', 'Elizabeth Henstridge', 'Emma Stone', 'Emma Roberts', 3, 300),
(33, 'Which actress is going to play role of Bubbles in the upcoming live-action reimagining of the beloved Cartoon Network series?.', 'Yana Perrault', 'Robyn Lively', 'Chloe Bennet', 'Dove Cameron', 4, 400),
(34, 'Priyanka Chopra Jonas announced opening an Indian cuisine restaurant in New York having name?', 'MONA', 'SONA', 'JONA', 'PARI', 2, 200),
(35, 'On the occasion of International Women’s Day, Amazon Prime Video announced a series which is led by an all-female cast and crew?Name of Series is-', 'Hush Hush', 'Ran Run', 'Rush Rush', 'pooh pooh', 1, 300);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `password` varchar(500) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'user',
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `won` int(11) NOT NULL DEFAULT 0,
  `total_score` int(11) NOT NULL DEFAULT 0,
  `avatar` varchar(500) NOT NULL DEFAULT '/jeopardy/includes/images/profile/default.jpg',
  `avatar_id` varchar(500) NOT NULL DEFAULT 'default'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `password`, `email`, `role`, `created_on`, `won`, `total_score`, `avatar`, `avatar_id`) VALUES
(9, 'Ayush', 'Ayush', 'Kumar', '$2y$10$NLzRgrsxGUijpmO6wmZ2d.pzjWrUuy2dC2ofoz3jP94urfOGsRLhO', 'ayush@gmail.com', 'admin', '2021-06-19 14:08:06', 2, 8543, '/jeopardy/includes/images/profile/avatar-5.jpg', 'avatar-5'),
(10, 'madhu', 'Madhu', 'Verma', '$2y$10$OeDLwPQsY1/vwW8IWBlo/uVjzuUzc236V5gkenCHe9m2hiq23m45e', 'madhu@gmail.com', 'user', '2021-06-19 14:11:43', 0, 0, '/jeopardy/includes/images/profile/avatar-8.jpg', 'avatar-8'),
(11, 'abhi', 'Abhi', 'Shake', '$2y$10$NP.XU3jmRtEW8vnPA9lr7ex5EvBaXwGrPKlM1zKvKOMgW41gaNEGe', 'abhi@gmail.com', 'user', '2021-06-19 14:48:06', 0, 0, '/jeopardy/includes/images/profile/default.jpg', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `editorial`
--
ALTER TABLE `editorial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sports`
--
ALTER TABLE `sports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `technology`
--
ALTER TABLE `technology`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trailer`
--
ALTER TABLE `trailer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `editorial`
--
ALTER TABLE `editorial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `sports`
--
ALTER TABLE `sports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `technology`
--
ALTER TABLE `technology`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `trailer`
--
ALTER TABLE `trailer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
