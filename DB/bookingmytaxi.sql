-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2016 at 06:50 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookingmytaxi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@bookingmytaxi.com', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ProviderID` int(11) NOT NULL,
  `FromLoc` varchar(255) NOT NULL,
  `ToLoc` varchar(255) NOT NULL,
  `Via` varchar(255) DEFAULT NULL,
  `IsRound` tinyint(1) NOT NULL DEFAULT '0',
  `ASAP` tinyint(1) NOT NULL DEFAULT '0',
  `StartDateTime` datetime NOT NULL,
  `GoingOutEnd` datetime DEFAULT NULL,
  `EndDateTime` datetime NOT NULL,
  `ReturnEnd` datetime DEFAULT NULL,
  `Passanger` varchar(5) NOT NULL,
  `Luggage` int(3) DEFAULT NULL,
  `TotalFare` int(11) DEFAULT NULL,
  `NeededCar` int(2) DEFAULT NULL,
  `Rating` int(3) DEFAULT NULL,
  `Review` text,
  `Status` enum('Pending','Completed','Failed') DEFAULT 'Pending' COMMENT '0=>Pending, 1=>Completed, 2=>Failed'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`ID`, `UserID`, `ProviderID`, `FromLoc`, `ToLoc`, `Via`, `IsRound`, `ASAP`, `StartDateTime`, `GoingOutEnd`, `EndDateTime`, `ReturnEnd`, `Passanger`, `Luggage`, `TotalFare`, `NeededCar`, `Rating`, `Review`, `Status`) VALUES
(6, 21, 17, 'Aberdeen, United Kingdom', 'Airport Way, Luton, United Kingdom', '', 1, 0, '2016-11-24 12:32:00', NULL, '2016-11-25 12:57:00', NULL, '1', 0, 7965, 1, NULL, NULL, 'Pending'),
(7, 21, 20, 'Aberdeen, United Kingdom', 'Airport Way, Luton, United Kingdom', '', 1, 0, '2016-11-24 16:33:00', NULL, '2016-11-25 12:11:00', NULL, '1', 0, 7983, 1, NULL, NULL, 'Pending'),
(8, 21, 17, 'Aberdeen, United Kingdom', 'Airport Way, Luton, United Kingdom', '', 0, 0, '2016-12-22 20:12:00', '2016-12-23 04:37:00', '1970-01-01 01:00:00', NULL, '1', 0, 3987, 1, NULL, NULL, 'Pending'),
(9, 21, 17, 'Aberdeen, United Kingdom', 'Airport Way, Luton, United Kingdom', '', 1, 0, '2016-12-21 13:57:00', '2016-12-21 22:37:00', '2016-12-29 09:44:00', '2016-12-29 18:07:00', '1', 0, 8042, 1, NULL, NULL, 'Pending'),
(10, 21, 20, 'Aberdeen, United Kingdom', 'Airport Way, Luton, United Kingdom', '', 0, 0, '2016-12-28 13:57:00', '2016-12-28 22:26:00', '1970-01-01 05:30:00', '0000-00-00 00:00:00', '1', 0, 3996, 1, NULL, NULL, 'Pending'),
(11, 21, 20, 'Aberdeen, United Kingdom', 'Airport Way, Luton, United Kingdom', '', 0, 0, '2016-12-28 11:20:00', '2016-12-28 19:51:00', '1970-01-01 05:30:00', '0000-00-00 00:00:00', '1', 0, 4001, 1, NULL, NULL, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `ID` int(11) NOT NULL,
  `CityName` varchar(255) NOT NULL,
  `CountryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`ID`, `CityName`, `CountryID`) VALUES
(1, 'London', 77),
(2, 'test', 77),
(3, 'Test', 77),
(4, 'Test', 77),
(5, 'Test', 77),
(6, 'Test', 77),
(7, 'Test', 77),
(8, 'Test', 77),
(9, 'Test', 77),
(10, 'Test', 77),
(11, 'Test', 77),
(12, 'test', 77),
(13, 'test', 77);

-- --------------------------------------------------------

--
-- Table structure for table `commission`
--

CREATE TABLE `commission` (
  `ID` int(11) NOT NULL,
  `Commission` varchar(5) NOT NULL,
  `UpdatedOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commission`
--

INSERT INTO `commission` (`ID`, `Commission`, `UpdatedOn`) VALUES
(1, '12', '2016-09-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(5) NOT NULL,
  `countryCode` char(2) NOT NULL DEFAULT '',
  `countryName` varchar(45) NOT NULL DEFAULT '',
  `currencyCode` char(3) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `countryCode`, `countryName`, `currencyCode`) VALUES
(1, 'AD', 'Andorra', 'EUR'),
(2, 'AE', 'United Arab Emirates', 'AED'),
(3, 'AF', 'Afghanistan', 'AFN'),
(4, 'AG', 'Antigua and Barbuda', 'XCD'),
(5, 'AI', 'Anguilla', 'XCD'),
(6, 'AL', 'Albania', 'ALL'),
(7, 'AM', 'Armenia', 'AMD'),
(8, 'AO', 'Angola', 'AOA'),
(9, 'AQ', 'Antarctica', ''),
(10, 'AR', 'Argentina', 'ARS'),
(11, 'AS', 'American Samoa', 'USD'),
(12, 'AT', 'Austria', 'EUR'),
(13, 'AU', 'Australia', 'AUD'),
(14, 'AW', 'Aruba', 'AWG'),
(15, 'AX', 'Åland', 'EUR'),
(16, 'AZ', 'Azerbaijan', 'AZN'),
(17, 'BA', 'Bosnia and Herzegovina', 'BAM'),
(18, 'BB', 'Barbados', 'BBD'),
(19, 'BD', 'Bangladesh', 'BDT'),
(20, 'BE', 'Belgium', 'EUR'),
(21, 'BF', 'Burkina Faso', 'XOF'),
(22, 'BG', 'Bulgaria', 'BGN'),
(23, 'BH', 'Bahrain', 'BHD'),
(24, 'BI', 'Burundi', 'BIF'),
(25, 'BJ', 'Benin', 'XOF'),
(26, 'BL', 'Saint Barthélemy', 'EUR'),
(27, 'BM', 'Bermuda', 'BMD'),
(28, 'BN', 'Brunei', 'BND'),
(29, 'BO', 'Bolivia', 'BOB'),
(30, 'BQ', 'Bonaire', 'USD'),
(31, 'BR', 'Brazil', 'BRL'),
(32, 'BS', 'Bahamas', 'BSD'),
(33, 'BT', 'Bhutan', 'BTN'),
(34, 'BV', 'Bouvet Island', 'NOK'),
(35, 'BW', 'Botswana', 'BWP'),
(36, 'BY', 'Belarus', 'BYR'),
(37, 'BZ', 'Belize', 'BZD'),
(38, 'CA', 'Canada', 'CAD'),
(39, 'CC', 'Cocos [Keeling] Islands', 'AUD'),
(40, 'CD', 'Democratic Republic of the Congo', 'CDF'),
(41, 'CF', 'Central African Republic', 'XAF'),
(42, 'CG', 'Republic of the Congo', 'XAF'),
(43, 'CH', 'Switzerland', 'CHF'),
(44, 'CI', 'Ivory Coast', 'XOF'),
(45, 'CK', 'Cook Islands', 'NZD'),
(46, 'CL', 'Chile', 'CLP'),
(47, 'CM', 'Cameroon', 'XAF'),
(48, 'CN', 'China', 'CNY'),
(49, 'CO', 'Colombia', 'COP'),
(50, 'CR', 'Costa Rica', 'CRC'),
(51, 'CU', 'Cuba', 'CUP'),
(52, 'CV', 'Cape Verde', 'CVE'),
(53, 'CW', 'Curacao', 'ANG'),
(54, 'CX', 'Christmas Island', 'AUD'),
(55, 'CY', 'Cyprus', 'EUR'),
(56, 'CZ', 'Czechia', 'CZK'),
(57, 'DE', 'Germany', 'EUR'),
(58, 'DJ', 'Djibouti', 'DJF'),
(59, 'DK', 'Denmark', 'DKK'),
(60, 'DM', 'Dominica', 'XCD'),
(61, 'DO', 'Dominican Republic', 'DOP'),
(62, 'DZ', 'Algeria', 'DZD'),
(63, 'EC', 'Ecuador', 'USD'),
(64, 'EE', 'Estonia', 'EUR'),
(65, 'EG', 'Egypt', 'EGP'),
(66, 'EH', 'Western Sahara', 'MAD'),
(67, 'ER', 'Eritrea', 'ERN'),
(68, 'ES', 'Spain', 'EUR'),
(69, 'ET', 'Ethiopia', 'ETB'),
(70, 'FI', 'Finland', 'EUR'),
(71, 'FJ', 'Fiji', 'FJD'),
(72, 'FK', 'Falkland Islands', 'FKP'),
(73, 'FM', 'Micronesia', 'USD'),
(74, 'FO', 'Faroe Islands', 'DKK'),
(75, 'FR', 'France', 'EUR'),
(76, 'GA', 'Gabon', 'XAF'),
(77, 'GB', 'United Kingdom', 'GBP'),
(78, 'GD', 'Grenada', 'XCD'),
(79, 'GE', 'Georgia', 'GEL'),
(80, 'GF', 'French Guiana', 'EUR'),
(81, 'GG', 'Guernsey', 'GBP'),
(82, 'GH', 'Ghana', 'GHS'),
(83, 'GI', 'Gibraltar', 'GIP'),
(84, 'GL', 'Greenland', 'DKK'),
(85, 'GM', 'Gambia', 'GMD'),
(86, 'GN', 'Guinea', 'GNF'),
(87, 'GP', 'Guadeloupe', 'EUR'),
(88, 'GQ', 'Equatorial Guinea', 'XAF'),
(89, 'GR', 'Greece', 'EUR'),
(90, 'GS', 'South Georgia and the South Sandwich Islands', 'GBP'),
(91, 'GT', 'Guatemala', 'GTQ'),
(92, 'GU', 'Guam', 'USD'),
(93, 'GW', 'Guinea-Bissau', 'XOF'),
(94, 'GY', 'Guyana', 'GYD'),
(95, 'HK', 'Hong Kong', 'HKD'),
(96, 'HM', 'Heard Island and McDonald Islands', 'AUD'),
(97, 'HN', 'Honduras', 'HNL'),
(98, 'HR', 'Croatia', 'HRK'),
(99, 'HT', 'Haiti', 'HTG'),
(100, 'HU', 'Hungary', 'HUF'),
(101, 'ID', 'Indonesia', 'IDR'),
(102, 'IE', 'Ireland', 'EUR'),
(103, 'IL', 'Israel', 'ILS'),
(104, 'IM', 'Isle of Man', 'GBP'),
(105, 'IN', 'India', 'INR'),
(106, 'IO', 'British Indian Ocean Territory', 'USD'),
(107, 'IQ', 'Iraq', 'IQD'),
(108, 'IR', 'Iran', 'IRR'),
(109, 'IS', 'Iceland', 'ISK'),
(110, 'IT', 'Italy', 'EUR'),
(111, 'JE', 'Jersey', 'GBP'),
(112, 'JM', 'Jamaica', 'JMD'),
(113, 'JO', 'Jordan', 'JOD'),
(114, 'JP', 'Japan', 'JPY'),
(115, 'KE', 'Kenya', 'KES'),
(116, 'KG', 'Kyrgyzstan', 'KGS'),
(117, 'KH', 'Cambodia', 'KHR'),
(118, 'KI', 'Kiribati', 'AUD'),
(119, 'KM', 'Comoros', 'KMF'),
(120, 'KN', 'Saint Kitts and Nevis', 'XCD'),
(121, 'KP', 'North Korea', 'KPW'),
(122, 'KR', 'South Korea', 'KRW'),
(123, 'KW', 'Kuwait', 'KWD'),
(124, 'KY', 'Cayman Islands', 'KYD'),
(125, 'KZ', 'Kazakhstan', 'KZT'),
(126, 'LA', 'Laos', 'LAK'),
(127, 'LB', 'Lebanon', 'LBP'),
(128, 'LC', 'Saint Lucia', 'XCD'),
(129, 'LI', 'Liechtenstein', 'CHF'),
(130, 'LK', 'Sri Lanka', 'LKR'),
(131, 'LR', 'Liberia', 'LRD'),
(132, 'LS', 'Lesotho', 'LSL'),
(133, 'LT', 'Lithuania', 'EUR'),
(134, 'LU', 'Luxembourg', 'EUR'),
(135, 'LV', 'Latvia', 'EUR'),
(136, 'LY', 'Libya', 'LYD'),
(137, 'MA', 'Morocco', 'MAD'),
(138, 'MC', 'Monaco', 'EUR'),
(139, 'MD', 'Moldova', 'MDL'),
(140, 'ME', 'Montenegro', 'EUR'),
(141, 'MF', 'Saint Martin', 'EUR'),
(142, 'MG', 'Madagascar', 'MGA'),
(143, 'MH', 'Marshall Islands', 'USD'),
(144, 'MK', 'Macedonia', 'MKD'),
(145, 'ML', 'Mali', 'XOF'),
(146, 'MM', 'Myanmar [Burma]', 'MMK'),
(147, 'MN', 'Mongolia', 'MNT'),
(148, 'MO', 'Macao', 'MOP'),
(149, 'MP', 'Northern Mariana Islands', 'USD'),
(150, 'MQ', 'Martinique', 'EUR'),
(151, 'MR', 'Mauritania', 'MRO'),
(152, 'MS', 'Montserrat', 'XCD'),
(153, 'MT', 'Malta', 'EUR'),
(154, 'MU', 'Mauritius', 'MUR'),
(155, 'MV', 'Maldives', 'MVR'),
(156, 'MW', 'Malawi', 'MWK'),
(157, 'MX', 'Mexico', 'MXN'),
(158, 'MY', 'Malaysia', 'MYR'),
(159, 'MZ', 'Mozambique', 'MZN'),
(160, 'NA', 'Namibia', 'NAD'),
(161, 'NC', 'New Caledonia', 'XPF'),
(162, 'NE', 'Niger', 'XOF'),
(163, 'NF', 'Norfolk Island', 'AUD'),
(164, 'NG', 'Nigeria', 'NGN'),
(165, 'NI', 'Nicaragua', 'NIO'),
(166, 'NL', 'Netherlands', 'EUR'),
(167, 'NO', 'Norway', 'NOK'),
(168, 'NP', 'Nepal', 'NPR'),
(169, 'NR', 'Nauru', 'AUD'),
(170, 'NU', 'Niue', 'NZD'),
(171, 'NZ', 'New Zealand', 'NZD'),
(172, 'OM', 'Oman', 'OMR'),
(173, 'PA', 'Panama', 'PAB'),
(174, 'PE', 'Peru', 'PEN'),
(175, 'PF', 'French Polynesia', 'XPF'),
(176, 'PG', 'Papua New Guinea', 'PGK'),
(177, 'PH', 'Philippines', 'PHP'),
(178, 'PK', 'Pakistan', 'PKR'),
(179, 'PL', 'Poland', 'PLN'),
(180, 'PM', 'Saint Pierre and Miquelon', 'EUR'),
(181, 'PN', 'Pitcairn Islands', 'NZD'),
(182, 'PR', 'Puerto Rico', 'USD'),
(183, 'PS', 'Palestine', 'ILS'),
(184, 'PT', 'Portugal', 'EUR'),
(185, 'PW', 'Palau', 'USD'),
(186, 'PY', 'Paraguay', 'PYG'),
(187, 'QA', 'Qatar', 'QAR'),
(188, 'RE', 'Réunion', 'EUR'),
(189, 'RO', 'Romania', 'RON'),
(190, 'RS', 'Serbia', 'RSD'),
(191, 'RU', 'Russia', 'RUB'),
(192, 'RW', 'Rwanda', 'RWF'),
(193, 'SA', 'Saudi Arabia', 'SAR'),
(194, 'SB', 'Solomon Islands', 'SBD'),
(195, 'SC', 'Seychelles', 'SCR'),
(196, 'SD', 'Sudan', 'SDG'),
(197, 'SE', 'Sweden', 'SEK'),
(198, 'SG', 'Singapore', 'SGD'),
(199, 'SH', 'Saint Helena', 'SHP'),
(200, 'SI', 'Slovenia', 'EUR'),
(201, 'SJ', 'Svalbard and Jan Mayen', 'NOK'),
(202, 'SK', 'Slovakia', 'EUR'),
(203, 'SL', 'Sierra Leone', 'SLL'),
(204, 'SM', 'San Marino', 'EUR'),
(205, 'SN', 'Senegal', 'XOF'),
(206, 'SO', 'Somalia', 'SOS'),
(207, 'SR', 'Suriname', 'SRD'),
(208, 'SS', 'South Sudan', 'SSP'),
(209, 'ST', 'São Tomé and Príncipe', 'STD'),
(210, 'SV', 'El Salvador', 'USD'),
(211, 'SX', 'Sint Maarten', 'ANG'),
(212, 'SY', 'Syria', 'SYP'),
(213, 'SZ', 'Swaziland', 'SZL'),
(214, 'TC', 'Turks and Caicos Islands', 'USD'),
(215, 'TD', 'Chad', 'XAF'),
(216, 'TF', 'French Southern Territories', 'EUR'),
(217, 'TG', 'Togo', 'XOF'),
(218, 'TH', 'Thailand', 'THB'),
(219, 'TJ', 'Tajikistan', 'TJS'),
(220, 'TK', 'Tokelau', 'NZD'),
(221, 'TL', 'East Timor', 'USD'),
(222, 'TM', 'Turkmenistan', 'TMT'),
(223, 'TN', 'Tunisia', 'TND'),
(224, 'TO', 'Tonga', 'TOP'),
(225, 'TR', 'Turkey', 'TRY'),
(226, 'TT', 'Trinidad and Tobago', 'TTD'),
(227, 'TV', 'Tuvalu', 'AUD'),
(228, 'TW', 'Taiwan', 'TWD'),
(229, 'TZ', 'Tanzania', 'TZS'),
(230, 'UA', 'Ukraine', 'UAH'),
(231, 'UG', 'Uganda', 'UGX'),
(232, 'UM', 'U.S. Minor Outlying Islands', 'USD'),
(233, 'US', 'United States', 'USD'),
(234, 'UY', 'Uruguay', 'UYU'),
(235, 'UZ', 'Uzbekistan', 'UZS'),
(236, 'VA', 'Vatican City', 'EUR'),
(237, 'VC', 'Saint Vincent and the Grenadines', 'XCD'),
(238, 'VE', 'Venezuela', 'VEF'),
(239, 'VG', 'British Virgin Islands', 'USD'),
(240, 'VI', 'U.S. Virgin Islands', 'USD'),
(241, 'VN', 'Vietnam', 'VND'),
(242, 'VU', 'Vanuatu', 'VUV'),
(243, 'WF', 'Wallis and Futuna', 'XPF'),
(244, 'WS', 'Samoa', 'WST'),
(245, 'XK', 'Kosovo', 'EUR'),
(246, 'YE', 'Yemen', 'YER'),
(247, 'YT', 'Mayotte', 'EUR'),
(248, 'ZA', 'South Africa', 'ZAR'),
(249, 'ZM', 'Zambia', 'ZMW'),
(250, 'ZW', 'Zimbabwe', 'ZWL');

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `DeviceId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `IntUdId` varchar(255) NOT NULL,
  `DeviceToken` text NOT NULL,
  `DeviceType` enum('iPhone','Android','Windows') NOT NULL,
  `AccessToken` varchar(50) DEFAULT NULL,
  `CreatedOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`DeviceId`, `UserId`, `IntUdId`, `DeviceToken`, `DeviceType`, `AccessToken`, `CreatedOn`) VALUES
(1, 1, 'aswd', 'asd', '', 'a1fd4', '2016-07-15 03:34:46');

-- --------------------------------------------------------

--
-- Table structure for table `global_setting`
--

CREATE TABLE `global_setting` (
  `ID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Extra` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `global_setting`
--

INSERT INTO `global_setting` (`ID`, `Date`, `Extra`) VALUES
(4, '2016-09-01', '10'),
(5, '2016-09-02', '11'),
(6, '2016-09-03', '12'),
(7, '2016-09-04', '11'),
(8, '2016-09-05', '12'),
(9, '2016-09-06', '13'),
(10, '2016-09-07', '11'),
(11, '2016-09-08', '1'),
(12, '2016-09-09', '11'),
(13, '2016-09-10', '1'),
(14, '2016-09-11', '11'),
(15, '2016-10-13', '10');

-- --------------------------------------------------------

--
-- Table structure for table `holiday_list`
--

CREATE TABLE `holiday_list` (
  `ID` int(11) NOT NULL,
  `ProviderID` int(11) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `holiday_list`
--

INSERT INTO `holiday_list` (`ID`, `ProviderID`, `Date`) VALUES
(16, 20, '2016-11-21'),
(17, 20, '2016-11-22');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `ID` int(11) NOT NULL,
  `BookingID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ProviderID` int(11) NOT NULL,
  `StripeTransID` varchar(50) DEFAULT NULL,
  `TotalFee` varchar(11) NOT NULL,
  `TaxiFee` varchar(11) NOT NULL,
  `AdminFee` varchar(11) NOT NULL,
  `AdminPercentage` varchar(5) NOT NULL,
  `Status` enum('Paid','Pending') NOT NULL DEFAULT 'Paid',
  `PaymentDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`ID`, `BookingID`, `UserID`, `ProviderID`, `StripeTransID`, `TotalFee`, `TaxiFee`, `AdminFee`, `AdminPercentage`, `Status`, `PaymentDateTime`) VALUES
(9, 6, 21, 17, 'ch_19IBXeJcqtRXy8MfGaVIcThw', '3982.72', '3556', '426.72', '12', 'Pending', '2016-11-21 06:44:41'),
(10, 6, 21, 20, 'ch_19IBXeJcqtRXy8MfGaVIcThw', '3982.72', '3556', '426.72', '12', 'Pending', '2016-11-21 06:44:41'),
(11, 7, 21, 17, 'ch_19Iy5XJcqtRXy8MfZ8bg0wI1', '3991.68', '3564', '427.68', '12', 'Pending', '2016-11-23 10:34:54'),
(12, 7, 21, 20, 'ch_19Iy5XJcqtRXy8MfZ8bg0wI1', '3991.68', '3564', '427.68', '12', 'Pending', '2016-11-23 10:34:54'),
(13, 8, 21, 17, 'ch_19O6ATJcqtRXy8MfE5C6cFbK', '3987.2', '3560', '427.2', '12', 'Paid', '2016-12-07 14:13:13'),
(14, 9, 21, 17, 'ch_19OMntJcqtRXy8Mfcp9TXCzn', '4020.8', '3590', '430.8', '12', 'Pending', '2016-12-08 07:58:58'),
(15, 9, 21, 20, 'ch_19OMntJcqtRXy8Mfcp9TXCzn', '4020.8', '3590', '430.8', '12', 'Pending', '2016-12-08 07:58:58'),
(16, 10, 21, 20, 'ch_19UtQ9JcqtRXy8MfJGQdgUMm', '3996.16', '3568', '428.16', '12', 'Paid', '2016-12-26 13:31:26'),
(17, 11, 21, 20, 'ch_19VDdJJcqtRXy8MfpJ5MFNJk', '4000.64', '3572', '428.64', '12', 'Paid', '2016-12-27 11:06:22');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=Active, 0=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `created`, `modified`, `status`) VALUES
(1, 'Adding Google Map on Your Website within 5 Minutes', '', '2016-05-20 13:34:35', '2016-05-20 13:34:35', 1),
(2, 'Top Features of AngularJS that Sets it Apart from other Frameworks', '', '2016-05-20 13:34:35', '2016-05-20 13:34:35', 1),
(3, 'Get visitor location using HTML5 Geolocation API and PHP', '', '2016-05-20 13:34:35', '2016-05-20 13:34:35', 1),
(4, 'WordPress – How to Display Most Popular Posts by Views', '', '2016-05-20 13:34:35', '2016-05-20 13:34:35', 1),
(5, 'PayPal Payment Gateway Integration in CodeIgniter', '', '2016-05-20 13:34:35', '2016-05-20 13:34:35', 1),
(6, 'Drupal 8 Installation and Configuration Tutorial', '', '2016-05-20 13:34:35', '2016-05-20 13:34:35', 1),
(7, 'How to Create a MySQL Database in cPanel', '', '2016-05-20 13:34:35', '2016-05-20 13:34:35', 1),
(8, 'CakePHP Tutorial Part 3: Working with Elements and Layout', '', '2016-05-20 13:34:35', '2016-05-20 13:34:35', 1),
(9, 'Build an event calendar using jQuery, Ajax and PHP', '', '2016-05-20 13:34:35', '2016-05-20 13:34:35', 1),
(10, 'Disable mouse right click, cut, copy and paste using jQuery', '', '2016-05-20 13:34:35', '2016-05-20 13:34:35', 1),
(11, 'Dynamic Dependent Select Box using jQuery, Ajax and PHP', '', '2016-05-20 13:34:35', '2016-05-20 13:34:35', 1),
(12, 'Drupal Custom Module &mdash; Create database table during installation', '', '2016-05-20 13:34:35', '2016-05-20 13:34:35', 1),
(13, 'Redirect non-www to www & HTTP to HTTPS using .htaccess file', '', '2016-05-20 13:34:35', '2016-05-20 13:34:35', 1),
(14, 'PayPal Pro payment gateway integration in PHP', '', '2016-05-20 13:34:35', '2016-05-20 13:34:35', 1),
(15, 'Creating PayPal Sandbox Test Account and Website Payments Pro Account', '', '2016-05-20 13:34:35', '2016-05-20 13:34:35', 1),
(16, 'Add featured image or thumbnail to WordPress post', '', '2016-05-20 13:34:35', '2016-05-20 13:34:35', 1),
(17, 'Drupal custom module development tutorial', '', '2016-05-20 13:34:35', '2016-05-20 13:34:35', 1),
(18, 'Multi-Language implementation in CodeIgniter', '', '2016-05-20 13:34:35', '2016-05-20 13:34:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `provider`
--

CREATE TABLE `provider` (
  `ID` int(11) NOT NULL,
  `CompanyName` varchar(100) NOT NULL,
  `Logo` varchar(50) DEFAULT NULL,
  `StreetAddress` varchar(255) NOT NULL,
  `Lat` varchar(100) DEFAULT NULL,
  `Lng` varchar(100) DEFAULT NULL,
  `PostCode` char(20) NOT NULL,
  `City` int(11) DEFAULT NULL,
  `State` int(11) DEFAULT NULL,
  `Country` int(11) DEFAULT NULL,
  `ContactPerson` varchar(50) NOT NULL,
  `ContactNumber` varchar(20) NOT NULL,
  `OtherContact` text,
  `Email` varchar(50) NOT NULL,
  `ContractStartDate` date NOT NULL,
  `ContractEndDate` date NOT NULL,
  `BaseCost` int(11) DEFAULT NULL,
  `RatePerMin` int(11) NOT NULL,
  `RatePerMile` int(11) DEFAULT NULL COMMENT '0=Sunday, 6=Saturday',
  `MileRange` varchar(5) DEFAULT NULL,
  `CloseDates` text,
  `OpenHour` char(10) NOT NULL,
  `CloseHour` char(10) NOT NULL,
  `TotalVehicle` int(5) NOT NULL DEFAULT '0',
  `AvailableVehicle` int(5) NOT NULL DEFAULT '0',
  `AvgRating` varchar(3) DEFAULT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `Ownersdob` date DEFAULT NULL,
  `OwnersAddress` varchar(255) DEFAULT NULL,
  `OwnersCity` int(11) NOT NULL,
  `OwnersPostalCode` varchar(10) DEFAULT NULL,
  `AdditionalOwners` varchar(255) DEFAULT NULL,
  `IBAN` varchar(50) DEFAULT NULL,
  `AccountNo` varchar(50) DEFAULT NULL,
  `BusinessTaxID` varchar(50) DEFAULT NULL,
  `Identity` varchar(50) DEFAULT NULL,
  `StripeID` varchar(50) DEFAULT NULL,
  `StripeVerification` enum('unverified','pending','verified') DEFAULT NULL,
  `VerificationDetailsCode` varchar(50) DEFAULT NULL,
  `VerificationMsg` text,
  `TransfersEnabled` tinyint(1) DEFAULT NULL,
  `Status` enum('Active','Deactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provider`
--

INSERT INTO `provider` (`ID`, `CompanyName`, `Logo`, `StreetAddress`, `Lat`, `Lng`, `PostCode`, `City`, `State`, `Country`, `ContactPerson`, `ContactNumber`, `OtherContact`, `Email`, `ContractStartDate`, `ContractEndDate`, `BaseCost`, `RatePerMin`, `RatePerMile`, `MileRange`, `CloseDates`, `OpenHour`, `CloseHour`, `TotalVehicle`, `AvailableVehicle`, `AvgRating`, `FirstName`, `LastName`, `Ownersdob`, `OwnersAddress`, `OwnersCity`, `OwnersPostalCode`, `AdditionalOwners`, `IBAN`, `AccountNo`, `BusinessTaxID`, `Identity`, `StripeID`, `StripeVerification`, `VerificationDetailsCode`, `VerificationMsg`, `TransfersEnabled`, `Status`) VALUES
(17, 'Test', '', '74 Ganeshnagar society D-cabin sabarmati', '53.4603145', '-2.198871199999985', '380019', 1, NULL, NULL, 'Test', '8866365517', '8866365517', 'nikunj.prajapati@moweb.com', '2016-11-07', '2016-12-31', 10, 2, 5, '3000', '16-11-2016,17-11-2016,18-11-2016', '12:00 AM', '11:59 PM', 2, -2, '4', 'Nikunj', 'Prajapati', '1993-01-01', '74 Ganeshnagar society D-cabin sabarmati', 1, '380019', '', '108800', '00012345', '000000000', '24e3acab9430de031ad34549650c752c.jpg', 'acct_195VOUBSA6BPYY4b', 'verified', NULL, '{"disabled_reason":null,"due_by":null,"fields_needed":[]}', 1, 'Active'),
(20, 'Test2', '', '74 Ganeshnagar society D-cabin sabarmati', '53.4603145', '-2.198871199999985', 'BB', 1, NULL, NULL, 'Test asd', '8866365517', '8866365517', 'nikunj.prajapati@moweb.com', '2016-11-07', '2016-12-31', 10, 2, 5, '3000', NULL, '00:19', '23:00', 12, 10, '3', 'Nikunj', 'Prajapati', '1993-01-01', '74 Ganeshnagar society D-cabin sabarmati', 1, '380019', '', '108800', '00012345', '000000000', '24e3acab9430de031ad34549650c752c.jpg', 'acct_195VOUBSA6BPYY4b', 'verified', NULL, '{"disabled_reason":null,"due_by":null,"fields_needed":[]}', 1, 'Active'),
(21, 'test', '', 'Aylesbury, United Kingdom', '', '', '', 1, NULL, NULL, 'NikunjPrajapati', '8866365517', '8866365517', 'nikunjprajapati77@gmail.com', '2016-12-08', '2016-12-30', NULL, 0, NULL, '12', NULL, '', '', 12, 12, NULL, '', '', '1970-01-01', '', 0, '380019', '', '', '', '', '0ae2394e8ec0f7fcf6fc10d0faea20c4.jpeg', NULL, NULL, NULL, NULL, NULL, 'Active'),
(22, 'asd', 'e35bfe049c5f8a3ea0c424dc3a083738.png', 'Aberdeen, United Kingdom', '57.149717', '-2.094278000000031', '', 1, NULL, NULL, 'asd', '23212123232132213', '23212123232132213', 'nikunj.prajapati@moweb.com', '2016-12-15', '2017-01-25', 11, 0, 11111, '231', NULL, '', '', 2313, 0, NULL, NULL, NULL, NULL, NULL, 0, 'sad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ProviderID` int(11) NOT NULL,
  `BookingID` int(11) NOT NULL,
  `QueRating` varchar(20) NOT NULL,
  `AvgRating` float(5,2) NOT NULL,
  `CreatedOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`ID`, `UserID`, `ProviderID`, `BookingID`, `QueRating`, `AvgRating`, `CreatedOn`) VALUES
(2, 21, 20, 0, '1,2,3,4,5', 3.00, '2016-11-25 10:14:33'),
(3, 21, 20, 0, '5,3,4,2,5', 3.80, '2016-11-25 10:18:41'),
(4, 21, 20, 0, '3,4,3,4,2', 3.20, '2016-11-25 10:41:54'),
(5, 21, 20, 0, '1,2,2,2,5', 2.40, '2016-11-25 10:46:50'),
(6, 21, 20, 0, '1,2,2,2,5', 2.40, '2016-11-25 10:49:26'),
(7, 21, 20, 10, '1,4,2,3,5', 3.00, '2016-11-26 06:49:29');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `fbID` varchar(50) DEFAULT NULL,
  `gID` varchar(100) DEFAULT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Contact` varchar(20) DEFAULT NULL,
  `ProfilePic` varchar(50) DEFAULT NULL,
  `Password` varchar(50) NOT NULL,
  `ResetKey` varchar(32) DEFAULT NULL,
  `IsGuest` tinyint(1) NOT NULL DEFAULT '0',
  `Status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `fbID`, `gID`, `FirstName`, `LastName`, `Email`, `Contact`, `ProfilePic`, `Password`, `ResetKey`, `IsGuest`, `Status`) VALUES
(20, '1027471234045279', NULL, 'Sùvã Bêpäri', 'Sùvã Bêpäri', NULL, '88663655171', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-x', '', NULL, 0, 'Active'),
(21, NULL, '103265999354864990023', 'Nikunj', 'Prajapati', 'nikunj.prajapati@moweb.com', '8866365517', 'https://lh4.googleusercontent.com/-ppLMpc4pTGM/AAA', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'qW6Tr0GK74vakPAsOCZSR5cdVuEJmj1p', 0, 'Active'),
(23, NULL, NULL, 'Test', 'Test', 'test@gmail.com', '1122334455', NULL, '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL, 0, 'Active'),
(24, NULL, NULL, 'aa', 'aaa', 'aa@asds.asd', '1234567890', NULL, 'f10e2821bbbea527ea02200352313bc059445190', NULL, 0, 'Active'),
(25, NULL, NULL, 'Nikunj', 'Prajapati', 'nikunjprajapati77@gmail.com', '1231232131', NULL, '601f1889667efaebb33b8c12572835da3f027f78', NULL, 0, 'Active'),
(26, NULL, NULL, 'asd', 'asd', 'aasdasdsa@asddas.com', '22222222222222222', NULL, '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL, 0, 'Active'),
(27, NULL, NULL, 'asdasd', 'asdasd', 'asdasdaaaa@aaaa.colm', '21122222222222222', NULL, '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL, 0, 'Active'),
(28, NULL, NULL, 'asdasd', 'asdasd', 'asd@asd.com', '8866365517', NULL, '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL, 0, 'Active'),
(29, NULL, NULL, '', '', '', '', NULL, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', NULL, 0, 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `UserID_2` (`UserID`),
  ADD KEY `ProviderID` (`ProviderID`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `commission`
--
ALTER TABLE `commission`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`DeviceId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `global_setting`
--
ALTER TABLE `global_setting`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `holiday_list`
--
ALTER TABLE `holiday_list`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ProviderID` (`ProviderID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `BookingID` (`BookingID`,`UserID`,`ProviderID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `ProviderID` (`ProviderID`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provider`
--
ALTER TABLE `provider`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `ProviderID` (`ProviderID`),
  ADD KEY `BookingID` (`BookingID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `commission`
--
ALTER TABLE `commission`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;
--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `DeviceId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `global_setting`
--
ALTER TABLE `global_setting`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `holiday_list`
--
ALTER TABLE `holiday_list`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `provider`
--
ALTER TABLE `provider`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`ProviderID`) REFERENCES `provider` (`ID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`BookingID`) REFERENCES `booking` (`ID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `payment_ibfk_3` FOREIGN KEY (`ProviderID`) REFERENCES `provider` (`ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`ProviderID`) REFERENCES `provider` (`ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
