-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2025 at 07:06 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `consultancy`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievements`
--

CREATE TABLE `achievements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `count` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `achievements`
--

INSERT INTO `achievements` (`id`, `title`, `image`, `count`, `created_at`, `updated_at`) VALUES
(1, 'AWARD WINNING', 'storage/achievement/award-winning1738317947.png', '160', '2025-01-31 03:59:33', '2025-01-31 04:20:47'),
(4, 'GRADUATE', 'storage/achievement/graduate1738317967.png', '200', '2025-01-31 04:21:07', '2025-01-31 04:21:07'),
(5, 'AWARD WINNING', 'storage/achievement/award-winning1738318090.png', '160', '2025-01-31 04:23:10', '2025-01-31 04:23:10'),
(6, 'FACULTIES', 'storage/achievement/faculties1738318122.png', '200', '2025-01-31 04:23:42', '2025-01-31 04:23:42');

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `title`, `type`, `cover`, `created_at`, `updated_at`) VALUES
(1, 'DEmo', 'Picture', 'demo1737978195.jpg', '2025-01-27 05:58:15', '2025-01-27 05:58:15'),
(2, 'Nulla quos voluptati', 'Picture', 'nulla-quos-voluptati1738075346.jpg', '2025-01-28 08:57:26', '2025-01-28 08:57:26');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `category_id` bigint(20) NOT NULL,
  `featured` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `body` longtext DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `location`, `category_id`, `featured`, `image`, `body`, `short_description`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'USA', 'USA, California', 2, 'yes', 'usa1737965665.jpg', '<h3>Discover Your Potential: Why Studying in Australia is a Great Choice</h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Australia is rapidly becoming one of the top destinations for international students seeking world-class education, an excellent quality of life, and career opportunities. Known for its stunning landscapes, vibrant cities, and welcoming culture, Australia has much to offer. Let&rsquo;s dive into why studying in Australia could be the best decision for your future.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<blockquote>Lorem ipsum dolor sit amet, conse ctetur adipi sicing elit, sed do eiusm od tempor incidi dunt ut labore et dolore magna aliqua. Ut enim fugiat nulla pariaatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit</blockquote>', '<p>Australia is rapidly becoming one of the top destinations for international students seeking world-class education, an excellent quality of life, and career opportunities.</p>', 'usa', '2025-01-27 02:29:25', '2025-01-27 05:19:21'),
(2, 'Discover Your Potential', 'Sydney, Australia', 1, 'yes', 'discover-your-potential-why-studying-in-australia-is-a-great-choice1737965750.jpeg', '<p>Australia is rapidly becoming one of the top destinations for international students seeking world-class education, an excellent quality of life, and career opportunities.</p>', '<p>Australia is rapidly becoming one of the top destinations for international students seeking world-class education, an excellent quality of life, and career opportunities.</p>', 'discover-your-potential-why-studying-in-australia-is-a-great-choice', '2025-01-27 02:30:50', '2025-02-02 22:09:01'),
(3, 'Study Abroad', 'Voluptas consequatur', 1, 'yes', 'animi-distinctio-m1737976113.jpeg', '<p>Studying abroad is an experience that has been gaining popularity in recent years, as it opens up doors to endless possibilities and broadens one&rsquo;s horizons. Whether you&rsquo;re looking to experience new cultures, enhance your career prospects, or simply get out of your comfort zone, studying abroad can be an enriching experience that will leave a lasting impact on your personal and professional growth.</p>', '<p>Studying abroad is an experience that has been gaining popularity in recent years, as it opens up doors to endless possibilities and broadens one&rsquo;s horizons.</p>', 'animi-distinctio-m', '2025-01-27 05:23:33', '2025-02-02 22:13:49');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `package` varchar(255) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `previous_score` varchar(255) DEFAULT NULL,
  `attempts` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `map` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `url` longtext DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `image`, `url`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Aqua', '1738048993.png', NULL, 'aqua', '2025-01-28 01:38:13', '2025-01-28 01:38:13'),
(2, 'Water', '1738049004.png', NULL, 'water', '2025-01-28 01:38:24', '2025-01-28 01:38:24'),
(3, 'Company', '1738049021.png', NULL, 'company', '2025-01-28 01:38:41', '2025-01-28 01:38:41'),
(4, 'Aqua Company', '1738049034.png', NULL, 'aqua-company', '2025-01-28 01:38:54', '2025-01-28 01:38:54'),
(5, 'Aqua1', '1738049044.png', NULL, 'aqua1', '2025-01-28 01:39:04', '2025-01-28 01:39:04'),
(6, 'Water Company', '1738049056.png', NULL, 'water-company', '2025-01-28 01:39:16', '2025-01-28 01:39:16');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Education', 'education', '2025-01-27 02:23:05', '2025-01-27 02:23:05'),
(2, 'USA', 'usa', '2025-01-27 02:23:13', '2025-01-27 02:23:13');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `destination_id` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `blog_id` varchar(255) NOT NULL,
  `event_id` varchar(255) NOT NULL,
  `news_id` varchar(255) NOT NULL,
  `package_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `messege` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `test_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `first_name`, `last_name`, `email`, `phone`, `subject`, `messege`, `created_at`, `updated_at`, `test_id`) VALUES
(15, 'Craig Dixon', NULL, 'zitywyjimi@mailinator.com', '1201203298', '', 'Labore officia possi', '2025-01-31 00:32:04', '2025-01-31 00:32:04', '2'),
(19, 'Xena Mclean', NULL, 'naqakewe@mailinator.com', '', 'Amet in quis sint m', 'Dicta excepturi et c', '2025-01-31 03:22:11', '2025-01-31 03:22:11', ''),
(20, 'Tashya Romero', NULL, 'xuhyl@mailinator.com', '2013265290', '', 'Est illum alias vol', '2025-01-31 03:23:02', '2025-01-31 03:23:02', '3'),
(21, 'Jasmine Fisher', NULL, 'xyvuhoziki@mailinator.com', '', '', 'In irure accusamus d', '2025-02-02 22:32:18', '2025-02-02 22:32:18', ''),
(22, 'Quintessa Burris', NULL, 'tovu@mailinator.com', '', '', '', '2025-02-02 22:35:59', '2025-02-02 22:35:59', ''),
(23, 'Jayme Cantrell', NULL, 'nycag@mailinator.com', '', 'Eius ducimus tempor', 'Eu adipisicing sed q', '2025-02-05 05:26:59', '2025-02-05 05:26:59', ''),
(24, 'Ian Rodgers', NULL, 'tykyman@mailinator.com', '1215902358', '', 'Nisi est praesentium', '2025-02-05 05:28:15', '2025-02-05 05:28:15', '1'),
(25, 'Amal Stevens', NULL, 'gidibopu@mailinator.com', '1201203698', '', 'Assumenda in occaeca', '2025-02-05 05:46:18', '2025-02-05 05:46:18', '3');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `code`, `name`) VALUES
(485, 'US', 'United States'),
(486, 'CA', 'Canada'),
(487, 'AF', 'Afghanistan'),
(488, 'AL', 'Albania'),
(489, 'DZ', 'Algeria'),
(490, 'AS', 'American Samoa'),
(491, 'AD', 'Andorra'),
(492, 'AO', 'Angola'),
(493, 'AI', 'Anguilla'),
(494, 'AQ', 'Antarctica'),
(495, 'AG', 'Antigua and/or Barbuda'),
(496, 'AR', 'Argentina'),
(497, 'AM', 'Armenia'),
(498, 'AW', 'Aruba'),
(499, 'AU', 'Australia'),
(500, 'AT', 'Austria'),
(501, 'AZ', 'Azerbaijan'),
(502, 'BS', 'Bahamas'),
(503, 'BH', 'Bahrain'),
(504, 'BD', 'Bangladesh'),
(505, 'BB', 'Barbados'),
(506, 'BY', 'Belarus'),
(507, 'BE', 'Belgium'),
(508, 'BZ', 'Belize'),
(509, 'BJ', 'Benin'),
(510, 'BM', 'Bermuda'),
(511, 'BT', 'Bhutan'),
(512, 'BO', 'Bolivia'),
(513, 'BA', 'Bosnia and Herzegovina'),
(514, 'BW', 'Botswana'),
(515, 'BV', 'Bouvet Island'),
(516, 'BR', 'Brazil'),
(517, 'IO', 'British lndian Ocean Territory'),
(518, 'BN', 'Brunei Darussalam'),
(519, 'BG', 'Bulgaria'),
(520, 'BF', 'Burkina Faso'),
(521, 'BI', 'Burundi'),
(522, 'KH', 'Cambodia'),
(523, 'CM', 'Cameroon'),
(524, 'CV', 'Cape Verde'),
(525, 'KY', 'Cayman Islands'),
(526, 'CF', 'Central African Republic'),
(527, 'TD', 'Chad'),
(528, 'CL', 'Chile'),
(529, 'CN', 'China'),
(530, 'CX', 'Christmas Island'),
(531, 'CC', 'Cocos (Keeling) Islands'),
(532, 'CO', 'Colombia'),
(533, 'KM', 'Comoros'),
(534, 'CG', 'Congo'),
(535, 'CK', 'Cook Islands'),
(536, 'CR', 'Costa Rica'),
(537, 'HR', 'Croatia (Hrvatska)'),
(538, 'CU', 'Cuba'),
(539, 'CY', 'Cyprus'),
(540, 'CZ', 'Czech Republic'),
(541, 'CD', 'Democratic Republic of Congo'),
(542, 'DK', 'Denmark'),
(543, 'DJ', 'Djibouti'),
(544, 'DM', 'Dominica'),
(545, 'DO', 'Dominican Republic'),
(546, 'TP', 'East Timor'),
(547, 'EC', 'Ecudaor'),
(548, 'EG', 'Egypt'),
(549, 'SV', 'El Salvador'),
(550, 'GQ', 'Equatorial Guinea'),
(551, 'ER', 'Eritrea'),
(552, 'EE', 'Estonia'),
(553, 'ET', 'Ethiopia'),
(554, 'FK', 'Falkland Islands (Malvinas)'),
(555, 'FO', 'Faroe Islands'),
(556, 'FJ', 'Fiji'),
(557, 'FI', 'Finland'),
(558, 'FR', 'France'),
(559, 'FX', 'France, Metropolitan'),
(560, 'GF', 'French Guiana'),
(561, 'PF', 'French Polynesia'),
(562, 'TF', 'French Southern Territories'),
(563, 'GA', 'Gabon'),
(564, 'GM', 'Gambia'),
(565, 'GE', 'Georgia'),
(566, 'DE', 'Germany'),
(567, 'GH', 'Ghana'),
(568, 'GI', 'Gibraltar'),
(569, 'GR', 'Greece'),
(570, 'GL', 'Greenland'),
(571, 'GD', 'Grenada'),
(572, 'GP', 'Guadeloupe'),
(573, 'GU', 'Guam'),
(574, 'GT', 'Guatemala'),
(575, 'GN', 'Guinea'),
(576, 'GW', 'Guinea-Bissau'),
(577, 'GY', 'Guyana'),
(578, 'HT', 'Haiti'),
(579, 'HM', 'Heard and Mc Donald Islands'),
(580, 'HN', 'Honduras'),
(581, 'HK', 'Hong Kong'),
(582, 'HU', 'Hungary'),
(583, 'IS', 'Iceland'),
(584, 'IN', 'India'),
(585, 'ID', 'Indonesia'),
(586, 'IR', 'Iran (Islamic Republic of)'),
(587, 'IQ', 'Iraq'),
(588, 'IE', 'Ireland'),
(589, 'IL', 'Israel'),
(590, 'IT', 'Italy'),
(591, 'CI', 'Ivory Coast'),
(592, 'JM', 'Jamaica'),
(593, 'JP', 'Japan'),
(594, 'JO', 'Jordan'),
(595, 'KZ', 'Kazakhstan'),
(596, 'KE', 'Kenya'),
(597, 'KI', 'Kiribati'),
(598, 'KP', 'Korea, Democratic People\'s Republic of'),
(599, 'KR', 'Korea, Republic of'),
(600, 'KW', 'Kuwait'),
(601, 'KG', 'Kyrgyzstan'),
(602, 'LA', 'Lao People\'s Democratic Republic'),
(603, 'LV', 'Latvia'),
(604, 'LB', 'Lebanon'),
(605, 'LS', 'Lesotho'),
(606, 'LR', 'Liberia'),
(607, 'LY', 'Libyan Arab Jamahiriya'),
(608, 'LI', 'Liechtenstein'),
(609, 'LT', 'Lithuania'),
(610, 'LU', 'Luxembourg'),
(611, 'MO', 'Macau'),
(612, 'MK', 'Macedonia'),
(613, 'MG', 'Madagascar'),
(614, 'MW', 'Malawi'),
(615, 'MY', 'Malaysia'),
(616, 'MV', 'Maldives'),
(617, 'ML', 'Mali'),
(618, 'MT', 'Malta'),
(619, 'MH', 'Marshall Islands'),
(620, 'MQ', 'Martinique'),
(621, 'MR', 'Mauritania'),
(622, 'MU', 'Mauritius'),
(623, 'TY', 'Mayotte'),
(624, 'MX', 'Mexico'),
(625, 'FM', 'Micronesia, Federated States of'),
(626, 'MD', 'Moldova, Republic of'),
(627, 'MC', 'Monaco'),
(628, 'MN', 'Mongolia'),
(629, 'MS', 'Montserrat'),
(630, 'MA', 'Morocco'),
(631, 'MZ', 'Mozambique'),
(632, 'MM', 'Myanmar'),
(633, 'NA', 'Namibia'),
(634, 'NR', 'Nauru'),
(635, 'NP', 'Nepal'),
(636, 'NL', 'Netherlands'),
(637, 'AN', 'Netherlands Antilles'),
(638, 'NC', 'New Caledonia'),
(639, 'NZ', 'New Zealand'),
(640, 'NI', 'Nicaragua'),
(641, 'NE', 'Niger'),
(642, 'NG', 'Nigeria'),
(643, 'NU', 'Niue'),
(644, 'NF', 'Norfork Island'),
(645, 'MP', 'Northern Mariana Islands'),
(646, 'NO', 'Norway'),
(647, 'OM', 'Oman'),
(648, 'PK', 'Pakistan'),
(649, 'PW', 'Palau'),
(650, 'PA', 'Panama'),
(651, 'PG', 'Papua New Guinea'),
(652, 'PY', 'Paraguay'),
(653, 'PE', 'Peru'),
(654, 'PH', 'Philippines'),
(655, 'PN', 'Pitcairn'),
(656, 'PL', 'Poland'),
(657, 'PT', 'Portugal'),
(658, 'PR', 'Puerto Rico'),
(659, 'QA', 'Qatar'),
(660, 'SS', 'Republic of South Sudan'),
(661, 'RE', 'Reunion'),
(662, 'RO', 'Romania'),
(663, 'RU', 'Russian Federation'),
(664, 'RW', 'Rwanda'),
(665, 'KN', 'Saint Kitts and Nevis'),
(666, 'LC', 'Saint Lucia'),
(667, 'VC', 'Saint Vincent and the Grenadines'),
(668, 'WS', 'Samoa'),
(669, 'SM', 'San Marino'),
(670, 'ST', 'Sao Tome and Principe'),
(671, 'SA', 'Saudi Arabia'),
(672, 'SN', 'Senegal'),
(673, 'RS', 'Serbia'),
(674, 'SC', 'Seychelles'),
(675, 'SL', 'Sierra Leone'),
(676, 'SG', 'Singapore'),
(677, 'SK', 'Slovakia'),
(678, 'SI', 'Slovenia'),
(679, 'SB', 'Solomon Islands'),
(680, 'SO', 'Somalia'),
(681, 'ZA', 'South Africa'),
(682, 'GS', 'South Georgia South Sandwich Islands'),
(683, 'ES', 'Spain'),
(684, 'LK', 'Sri Lanka'),
(685, 'SH', 'St. Helena'),
(686, 'PM', 'St. Pierre and Miquelon'),
(687, 'SD', 'Sudan'),
(688, 'SR', 'Suriname'),
(689, 'SJ', 'Svalbarn and Jan Mayen Islands'),
(690, 'SZ', 'Swaziland'),
(691, 'SE', 'Sweden'),
(692, 'CH', 'Switzerland'),
(693, 'SY', 'Syrian Arab Republic'),
(694, 'TW', 'Taiwan'),
(695, 'TJ', 'Tajikistan'),
(696, 'TZ', 'Tanzania, United Republic of'),
(697, 'TH', 'Thailand'),
(698, 'TG', 'Togo'),
(699, 'TK', 'Tokelau'),
(700, 'TO', 'Tonga'),
(701, 'TT', 'Trinidad and Tobago'),
(702, 'TN', 'Tunisia'),
(703, 'TR', 'Turkey'),
(704, 'TM', 'Turkmenistan'),
(705, 'TC', 'Turks and Caicos Islands'),
(706, 'TV', 'Tuvalu'),
(707, 'UG', 'Uganda'),
(708, 'UA', 'Ukraine'),
(709, 'AE', 'United Arab Emirates'),
(710, 'GB', 'United Kingdom'),
(711, 'UM', 'United States minor outlying islands'),
(712, 'UY', 'Uruguay'),
(713, 'UZ', 'Uzbekistan'),
(714, 'VU', 'Vanuatu'),
(715, 'VA', 'Vatican City State'),
(716, 'VE', 'Venezuela'),
(717, 'VN', 'Vietnam'),
(718, 'VG', 'Virgin Islands (British)'),
(719, 'VI', 'Virgin Islands (U.S.)'),
(720, 'WF', 'Wallis and Futuna Islands'),
(721, 'EH', 'Western Sahara'),
(722, 'YE', 'Yemen'),
(723, 'YU', 'Yugoslavia'),
(724, 'ZR', 'Zaire'),
(725, 'ZM', 'Zambia'),
(726, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `credit_hour` double(8,2) DEFAULT NULL,
  `banner_image` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `slug`, `description`, `credit_hour`, `banner_image`, `order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Accounting', 'accounting', '<p>Vel repellendus Eaq</p>', 21.00, 'courses/carter-bullock-1737714812.jpeg', 1, 1, '2025-01-24 04:48:32', '2025-02-03 01:04:23'),
(2, 'Computer Science', 'computer-science', '<p>Ut eos ut harum sol</p>', 39.00, 'courses/alisa-bolton-1737963270.jpeg', 2, 1, '2025-01-24 04:48:40', '2025-02-03 01:04:40'),
(3, 'Engineering', 'engineering', '<p>tfytfyt</p>', 57.00, 'courses/tobias-lane-1738075110.jpg', 3, 1, '2025-01-28 08:53:30', '2025-02-03 01:04:54'),
(4, 'Pschycology', 'pschycology', NULL, NULL, 'courses/pschycology-1738752636.jpg', 4, 0, '2025-02-03 01:05:14', '2025-02-05 05:05:36'),
(5, 'Education', 'education', NULL, 52.00, 'courses/education-1738752627.jpg', 5, 0, '2025-02-03 01:05:26', '2025-02-05 05:05:27');

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `sub_title` varchar(255) DEFAULT NULL,
  `country` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `why_image` varchar(255) DEFAULT NULL,
  `why_subtitle` varchar(255) DEFAULT NULL,
  `fact_subtitle` varchar(255) DEFAULT NULL,
  `city_subtitle` varchar(255) DEFAULT NULL,
  `reason_subtitle` varchar(255) DEFAULT NULL,
  `health_subtitle` varchar(255) DEFAULT NULL,
  `job_subtitle` varchar(255) DEFAULT NULL,
  `best_cities` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`best_cities`)),
  `video_image` varchar(255) DEFAULT NULL,
  `banner_image` varchar(255) DEFAULT NULL,
  `youtube_link` varchar(255) DEFAULT NULL,
  `requirement` longtext DEFAULT NULL,
  `scholarship` longtext DEFAULT NULL,
  `in_take` longtext DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `seo_image` varchar(255) DEFAULT NULL,
  `seo_description` text DEFAULT NULL,
  `seo_keyword` text DEFAULT NULL,
  `seo_title` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`id`, `title`, `slug`, `sub_title`, `country`, `description`, `why_image`, `why_subtitle`, `fact_subtitle`, `city_subtitle`, `reason_subtitle`, `health_subtitle`, `job_subtitle`, `best_cities`, `video_image`, `banner_image`, `youtube_link`, `requirement`, `scholarship`, `in_take`, `order`, `is_active`, `created_at`, `updated_at`, `seo_image`, `seo_description`, `seo_keyword`, `seo_title`) VALUES
(11, 'Why Study in Australia', 'why-study-in-australia', 'World-class education, diverse cultural experiences', 'AU', '<p>Australia is not only a student destination but overall a dynamic and technologically vibrant country that offers a good educational and career life to students from all over the world.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Australia is a highly sought study destination for Nepalese students due to its excellent education, quality lifestyle, and welcoming atmosphere. It attracts students from around the world, including Nepal, who are looking for a top-notch education.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>With a wide range of courses and over 1,100 institutions, including prestigious universities, Australia offers an exceptional educational environment. It covers diverse study areas and provides abundant opportunities for international students to pursue their desired fields, such as language, nursing, and medicine.</p>', 'destination/why-study-in-saudi-arabia-67a3225e09eff-1738744414.jpg', 'World-class education, diverse cultural experiences', 'Destination for international students, offering world-class education, diverse cultures, and a high quality of life', 'Destination for international students, offering world-class education, diverse cultures, and a high quality of life', 'Australia offers a diverse range of study options for international students, with more than 1,200 institutions and over 22,000 courses to choose from. Here are  reasons why you should choose Australia for higher education', 'The country has a special health insurance scheme called the Overseas Student Health Cover (OSHC) designed for international students.', 'Australia provides many job opportunities for international students. Here are some key points about job opportunities', '[\"Sydney\",\"Brisbane\",\"Darwin\",\"Perth\",\"Canberra\",\"Wollongong\"]', 'destination/why-study-in-australia-67a3272f30cef-1738745647.jpg', 'destination/doloribus-nisi-rerum-ujpdate-67a1beb33743d-1738653363.jpg', 'https://www.youtube.com/watch?v=sv5hK4crIRc', '<p>ASXDFVBGNVBM N&nbsp;&nbsp;update</p>', NULL, '<p>ZAXSZDCVXCB NB&nbsp;&nbsp;update</p>', 1, 1, '2025-02-04 00:54:20', '2025-02-05 03:09:07', NULL, NULL, NULL, NULL),
(12, 'Why Study in Bahrain', 'why-study-in-bahrain', 'Perspiciatis et bea', 'BH', NULL, NULL, 'Itaque aut enim moll', 'Sit quaerat aspernat', 'Ratione numquam est', 'Laboris eos enim eli', 'Nostrum exercitation', 'Quo sint non ipsa a', NULL, NULL, 'destination/why-study-in-bahrain-67a346211d8d4-1738753569.jpg', 'Et fuga Qui aliqua', NULL, NULL, NULL, 2, 1, '2025-02-04 03:35:34', '2025-02-05 05:21:09', NULL, NULL, NULL, NULL),
(13, 'cool test', 'cool-test', 'Aut ut tempora nesci', 'UG', NULL, NULL, 'Sed quis in rerum ip', 'Adipisci molestiae a', 'Voluptate ratione se', 'Consequat Qui archi', 'Aut magnam pariatur', 'Sunt minus aliquip e', '[\"Dolorem dicta dicta\"]', NULL, NULL, 'Autem maxime est in', NULL, NULL, NULL, 3, 1, '2025-02-05 23:45:25', '2025-02-05 23:45:25', 'cool-test-67a448edebe97-1738819821.jpg', NULL, 'Eum nobis eum est bl,dfvfdsbv,fdbsgb m', 'tetst'),
(14, 'Fuga Cillum quia ex update', 'fuga-cillum-quia-ex-update', 'Est itaque dolorem e', 'HT', NULL, NULL, 'Molestiae quo laboru', 'Deleniti quia eos ei', 'Libero aut dicta nos', 'Vitae omnis labore e', 'Ducimus sit velit', 'Cupiditate sint tene', '[\"Voluptas consequatur\"]', NULL, NULL, 'Sed unde natus et al', NULL, NULL, NULL, 4, 0, '2025-02-05 23:46:32', '2025-02-06 00:03:47', 'destination/fuga-cillum-quia-ex-update-67a44d3ec3b14-1738820926.jpg', 'Labore sequi eos po dfvbkdfvjd update', 'Porro qui molestiae,update', 'In nulla sequi digni jsbhvjd update');

-- --------------------------------------------------------

--
-- Table structure for table `destination_costs`
--

CREATE TABLE `destination_costs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `destination_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `value` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `destination_costs`
--

INSERT INTO `destination_costs` (`id`, `destination_id`, `title`, `image`, `type`, `value`, `created_at`, `updated_at`) VALUES
(4, 11, 'Cost to Study in Australia', 'destination-cost/cost-to-study-in-australia-1738746153.jpg', 'education', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:100%\">\n	<thead>\n		<tr>\n			<th scope=\"col\">Level of Study</th>\n			<th scope=\"col\">Average Annual Tuition Fees (in AUD)</th>\n		</tr>\n	</thead>\n	<tbody>\n		<tr>\n			<td><strong>Undergraduate</strong></td>\n			<td>$20,000 - $45,000</td>\n		</tr>\n		<tr>\n			<td><strong>Postgraduate</strong></td>\n			<td>$22,000 &ndash; $50,000</td>\n		</tr>\n		<tr>\n			<td><strong>Doctoral Degree</strong></td>\n			<td>$18,000 &ndash; $42,000</td>\n		</tr>\n		<tr>\n			<td><strong>PhD</strong></td>\n			<td>$22,000 &ndash; $50,000</td>\n		</tr>\n	</tbody>\n</table>\n\n<p style=\"text-align:center\">&nbsp;</p>', '2025-02-04 00:07:46', '2025-02-05 03:19:53'),
(5, 11, 'Cost of Living in Australia', NULL, 'living', '<table>\n	<thead>\n		<tr>\n			<th scope=\"col\">Expense Category</th>\n			<th scope=\"col\">Average Monthly Cost (in AUD)</th>\n		</tr>\n	</thead>\n	<tbody>\n		<tr>\n			<td><strong>Accommodation</strong></td>\n			<td>$800 - $1,500</td>\n		</tr>\n		<tr>\n			<td><strong>Groceries</strong></td>\n			<td>$200 - $400</td>\n		</tr>\n		<tr>\n			<td><strong>Eating Out</strong></td>\n			<td>$200 - $400</td>\n		</tr>\n		<tr>\n			<td><strong>Public Transportation</strong></td>\n			<td>$100 - $200</td>\n		</tr>\n		<tr>\n			<td><strong>Utilities</strong></td>\n			<td>$50 - $100</td>\n		</tr>\n		<tr>\n			<td><strong>Internet and Mobile</strong></td>\n			<td>$50 - $100</td>\n		</tr>\n		<tr>\n			<td><strong>Entertainment</strong></td>\n			<td>$100 - $200</td>\n		</tr>\n		<tr>\n			<td><strong>Personal Care</strong></td>\n			<td>$50 - $100</td>\n		</tr>\n		<tr>\n			<td><strong>Clothing</strong></td>\n			<td>$50 - $100</td>\n		</tr>\n		<tr>\n			<td><strong>Utilities</strong></td>\n			<td>$50 - $100</td>\n		</tr>\n	</tbody>\n</table>', '2025-02-04 04:49:16', '2025-02-05 03:22:40');

-- --------------------------------------------------------

--
-- Table structure for table `destination_courses`
--

CREATE TABLE `destination_courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` varchar(255) NOT NULL,
  `destination_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `destination_courses`
--

INSERT INTO `destination_courses` (`id`, `course_id`, `destination_id`, `created_at`, `updated_at`) VALUES
(1, '[\"1\",\"2\",\"3\"]', 11, '2025-01-24 04:48:56', '2025-02-04 04:39:20'),
(3, '[\"1\",\"2\",\"3\",\"4\"]', 1, '2025-01-24 05:32:08', '2025-02-03 01:05:53');

-- --------------------------------------------------------

--
-- Table structure for table `destination_facts`
--

CREATE TABLE `destination_facts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `destination_id` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `destination_facts`
--

INSERT INTO `destination_facts` (`id`, `title`, `destination_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Australia', '11', 'Australia is the world\'s 13th-largest economy and has the world\'s fifth-highest per capita incomeefvewrv', '2025-02-03 04:44:30', '2025-02-05 03:05:28'),
(4, 'Australia', '11', 'Australia is ranked 9th in the world in the university system ranking', '2025-02-03 06:20:35', '2025-02-05 03:06:05'),
(5, 'Australia', '11', 'Australia is ranked 9th in the world in the university system ranking', '2025-02-04 02:32:41', '2025-02-05 03:06:20'),
(6, 'Australia', '11', 'Australia is the 3rd most popular destination for international students', '2025-02-04 02:32:48', '2025-02-05 03:06:36'),
(7, 'Australia', '11', 'Over 260 languages are spoken in Australia', '2025-02-04 02:40:35', '2025-02-05 03:06:57'),
(8, 'Australia', '11', '5 of the top 40 cities with the best urban infrastructure are in Australia', '2025-02-04 02:40:45', '2025-02-05 03:07:13'),
(9, 'Australia', '11', '<p>5 out of the 30 best student cities in the world are in Australia</p>', '2025-02-05 03:07:38', '2025-02-05 03:07:38'),
(10, 'Australia', '11', '<p>Melbourne has been ranked the world&rsquo;s most liveable city for the past 3 years</p>', '2025-02-05 03:08:01', '2025-02-05 03:08:01'),
(11, 'Australia', '11', '<p>8 out of the 100 top universities in the world are Australian universities</p>', '2025-02-05 03:08:19', '2025-02-05 03:08:19');

-- --------------------------------------------------------

--
-- Table structure for table `destination_faqs`
--

CREATE TABLE `destination_faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `destination_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `destination_faqs`
--

INSERT INTO `destination_faqs` (`id`, `destination_id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 11, 'What are the academic requirements for studying in Australia?', 'The process for applying to study in Australia will vary depending on the institution you choose and the program of study you are interested in. In general, you will need to apply to the institution, along with any required supporting documents, such as transcripts and proof of English language proficiency.', '2025-01-28 22:31:45', '2025-02-05 03:50:50'),
(2, 11, 'What is the cost of studying in Australia?', 'The cost of studying in Australia can vary depending on several factors, such as the type, of course, you are studying, and the location of your institution. In general, you can expect to pay between AUD 20,000 and AUD 30,000 per year for tuition.', '2025-01-28 22:32:17', '2025-02-05 03:51:34'),
(3, 11, 'What is the process for applying at a university/college in Australia?', 'To apply to study at a university or college in Australia, you will need to research the institutions and programs that interest you, and then submit an application directly to the institution. You can find more information on the application process on the website.', '2025-01-28 22:32:50', '2025-02-05 03:52:17'),
(4, 11, 'Do I need to have health insurance while studying in Australia?', 'Yes, it is strongly recommended that you have health insurance while studying in Australia. This will cover you for any medical treatment you may need while in Australia.', '2025-01-28 22:33:06', '2025-02-05 03:52:55'),
(5, 11, 'Can I work while studying in Australia?', '<p>Yes, international students in Australia are allowed to work part-time for up to 20 hours per week while studying. This can help with the cost of living and provide valuable work experience.</p>', '2025-02-05 03:53:33', '2025-02-05 03:53:33'),
(6, 11, 'What are the academic requirements for studying in Australia?', '<p>To study in Australia, you must meet the academic requirements for the program you want to take. This could mean that you have to have finished a certain number of courses or have gotten a certain grade point average in your previous studies. You should check with your chosen institution to determine the specific requirements.</p>', '2025-02-05 03:54:00', '2025-02-05 03:54:00'),
(7, 11, 'Are there scholarships available for international students in Australia?', '<p>Yes, there are many scholarships available for international students studying in Australia. These scholarships are offered by the Australian government, educational institutions, and other organizations.</p>', '2025-02-05 03:54:36', '2025-02-05 03:54:36'),
(8, 11, 'What is the process for obtaining a student visa extension?', '<p>To obtain a student visa extension, you will need to apply to the Australian Department of Home Affairs. You will need to provide evidence that you are still enrolled in a full-time course of study and meet the necessary health and character requirements.</p>', '2025-02-05 03:55:06', '2025-02-05 03:55:06'),
(9, 11, 'What is the process for obtaining a student visa extension?', '<p>To obtain a student visa extension, you will need to apply to the Australian Department of Home Affairs. You will need to provide evidence that you are still enrolled in a full-time course of study and meet the necessary health and character requirements.</p>', '2025-02-05 03:55:39', '2025-02-05 03:55:39'),
(10, 11, 'Can Nepali students apply for permanent residency in Australia?', '<p>Yes, after graduating from an Australian educational institution, Nepali students may be eligible to apply for a temporary graduate visa, which allows them to work in Australia for up to four years after graduation. This can provide a pathway to permanent residency in Australia.</p>', '2025-02-05 03:56:16', '2025-02-05 03:56:16');

-- --------------------------------------------------------

--
-- Table structure for table `destination_healths`
--

CREATE TABLE `destination_healths` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `destination_id` varchar(255) NOT NULL,
  `image` text DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `destination_healths`
--

INSERT INTO `destination_healths` (`id`, `title`, `destination_id`, `image`, `description`, `created_at`, `updated_at`) VALUES
(5, 'Overseas Student Health Cover (OSHC)', '11', '<svg version=\"1.1\" id=\"svg-cus-1\" xmlns=\"http://www.w3.org/2000/svg\"\r\n                                                xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n                                                viewBox=\"0 0 72 72\" style=\"enable-background:new 0 0 72 72;\"\r\n                                                xml:space=\"preserve\">\r\n                                                <path\r\n                                                    d=\"M1,9.8h5l6.1,14.3c0.2,0.4,0.5,0.6,0.9,0.6l0,0c0.4,0,0.8-0.3,0.9-0.6l5.8-14.3h5.6c0.4,0,0.8-0.3,0.9-0.6l2.3-5.8l6.5,12\r\n                                                                                                                                   c0.2,0.3,0.5,0.5,0.8,0.5s0.7-0.1,0.9-0.4L41,9.8h23.1c0.5,1.7,2,2.9,3.8,2.9c2.2,0,4-1.8,4-4s-1.8-4-4-4c-1.8,0-3.4,1.2-3.8,2.9\r\n                                                                                                                                   H40.6c-0.3,0-0.6,0.2-0.8,0.4l-3.6,5L29.4,0.5c-0.2-0.3-0.6-0.6-1-0.5c-0.4,0-0.7,0.3-0.9,0.6l-2.9,7.1H19c-0.4,0-0.8,0.3-0.9,0.6\r\n                                                                                                                                   L13,21.1L7.6,8.4C7.5,8,7.1,7.8,6.7,7.8H1c-0.6,0-1,0.5-1,1C0,9.4,0.5,9.8,1,9.8z M68,6.9c1.1,0,1.9,0.9,1.9,1.9S69,10.7,68,10.7\r\n                                                                                                                                   s-1.9-0.9-1.9-1.9S67,6.9,68,6.9z M30.1,63.5h-0.6c-0.5-2-1-4.2-1.5-6.3c-0.9-4-1.9-6.5-7.3-8.1l-5.2-3.7c-0.9-0.6-2-0.9-3-0.7\r\n                                                                                                                                   l-3.4-8.1C6.8,31,3.8,31.7,2.9,32c-2.2,0.8-3.4,3.7-2.7,6l4.4,13.3c0,0.1,0.1,0.3,0.1,0.4c0.7,2.2,1.6,4.9,3.7,6.4l6,4.1\r\n                                                                                                                                   c0.5,0.3,0.8,0.7,1,1.2h-0.1l0,0c-0.7,0-1.3,0.3-1.7,0.7c-0.5,0.5-0.7,1.1-0.7,1.7v3.6c0,1.4,1.1,2.5,2.5,2.5h14.8\r\n                                                                                                                                   c0.7,0,1.3-0.3,1.7-0.7c0.5-0.5,0.7-1.1,0.7-1.7v-3.6C32.6,64.6,31.5,63.5,30.1,63.5z M15.6,60.6l-6-4.1c-1.5-1-2.3-3.4-2.9-5.3\r\n                                                                                                                                   c0-0.1-0.1-0.3-0.1-0.4L2.2,37.4C1.7,36,2.6,34.3,3.6,34c1.2-0.4,2.6,0.8,3.6,3.4l3.5,8.2c-0.3,0.2-0.5,0.5-0.7,0.8\r\n                                                                                                                                   c-0.6,0.9-0.9,1.9-0.7,3s0.7,2,1.6,2.6l7.1,5c0.5,0.3,1.1,0.2,1.4-0.2c0.3-0.5,0.2-1.1-0.2-1.4l-7.1-5.1c-0.4-0.3-0.7-0.8-0.8-1.3\r\n                                                                                                                                   s0-1,0.3-1.5c0.6-0.9,1.9-1.1,2.7-0.4l5.3,3.8c0.1,0.1,0.2,0.1,0.3,0.2c4.5,1.2,5.2,3,6,6.6c0.5,2,0.9,3.9,1.4,5.8h-9.8\r\n                                                                                                                                   C17.3,62.3,16.6,61.3,15.6,60.6z M30.4,69.8c-0.1,0.1-0.1,0.1-0.3,0.1H15.3c-0.2,0-0.4-0.2-0.4-0.4v-3.6c0-0.1,0.1-0.2,0.1-0.3\r\n                                                                                                                                   c0.1-0.1,0.1-0.1,0.3-0.1h14.8c0.2,0,0.4,0.2,0.4,0.4v3.6C30.5,69.7,30.5,69.8,30.4,69.8z M69.1,32c-0.9-0.3-3.9-1-6.2,4.5l-3.4,8.1\r\n                                                                                                                                   c-1-0.2-2.1,0.1-3,0.7L51.3,49c-5.4,1.5-6.3,4.1-7.3,8.1c-0.5,2.1-1,4.2-1.5,6.3h-0.6c-1.4,0-2.5,1.1-2.5,2.5v3.6\r\n                                                                                                                                   c0,0.7,0.3,1.3,0.7,1.7c0.5,0.5,1.1,0.7,1.7,0.7h14.8c1.4,0,2.5-1.1,2.5-2.5v-3.6c0-0.7-0.3-1.3-0.7-1.7c-0.5-0.5-1.1-0.7-1.7-0.7\r\n                                                                                                                                   h-0.1c0.2-0.5,0.6-0.9,1-1.2l6-4.1c2.1-1.4,3-4.2,3.7-6.4c0-0.1,0.1-0.3,0.1-0.4L71.8,38C72.5,35.7,71.3,32.8,69.1,32z M56.7,65.5\r\n                                                                                                                                   c0.1,0,0.2,0.1,0.3,0.1c0.1,0.1,0.1,0.1,0.1,0.3v3.6c0,0.2-0.2,0.4-0.4,0.4H41.9c-0.1,0-0.2-0.1-0.3-0.1c-0.1-0.1-0.1-0.1-0.1-0.3\r\n                                                                                                                                   v-3.6c0-0.2,0.2-0.4,0.4-0.4H56.7z M69.8,37.4l-4.4,13.3c0,0.1-0.1,0.3-0.1,0.4c-0.6,1.9-1.4,4.3-2.9,5.3l-6,4.1\r\n                                                                                                                                   c-1,0.7-1.7,1.7-2,2.9h-9.8c0.5-1.9,1-3.9,1.4-5.8c0.8-3.6,1.5-5.4,6-6.6c0.1,0,0.2-0.1,0.3-0.2l5.3-3.8c0.4-0.3,0.9-0.4,1.5-0.3\r\n                                                                                                                                   c0.5,0.1,1,0.4,1.3,0.8c0.3,0.4,0.4,0.9,0.3,1.5c-0.1,0.5-0.4,1-0.8,1.3l-7.1,5.1c-0.5,0.3-0.6,1-0.2,1.4c0.3,0.5,1,0.6,1.4,0.2\r\n                                                                                                                                   l7.1-5.1c0.9-0.6,1.4-1.5,1.6-2.6c0.2-1.1-0.1-2.1-0.7-3c-0.2-0.3-0.5-0.6-0.7-0.8l3.5-8.2c1.1-2.6,2.5-3.9,3.6-3.4\r\n                                                                                                                                   C69.4,34.3,70.3,36,69.8,37.4z M49.3,40.5c3.7-4.5,5.6-8.6,5.6-12.3c0-5-4.5-9-10-9c-4,0-6.6,1.5-8.9,5c-2.3-3.6-4.9-5-8.9-5\r\n                                                                                                                                   c-5.5,0-10,4-10,9c0,3.7,1.8,7.8,5.6,12.3c3.2,3.8,7.3,7.6,12,11.8c0.4,0.3,0.9,0.5,1.3,0.5s1-0.2,1.3-0.5\r\n                                                                                                                                   C42,48.1,46.2,44.3,49.3,40.5z M36,50.7c-7.9-7.1-16.8-15-16.8-22.5c0-3.8,3.5-7,7.9-7c3.3,0,5.3,1.1,7.2,4.1c0.4,0.6,1,0.9,1.7,0.9\r\n                                                                                                                                   s1.3-0.3,1.7-0.9c2-3,3.9-4.1,7.2-4.1c4.4,0,7.9,3.1,7.9,7C52.8,35.7,43.9,43.7,36,50.7z M42.2,32.6h-2.8v-2.8c0-0.6-0.5-1-1-1h-4.8\r\n                                                                                                                                   c-0.6,0-1,0.5-1,1v2.8h-2.8c-0.6,0-1,0.5-1,1v4.8c0,0.6,0.5,1,1,1h2.8v2.8c0,0.6,0.5,1,1,1h4.8c0.6,0,1-0.5,1-1v-2.8h2.8\r\n                                                                                                                                   c0.6,0,1-0.5,1-1v-4.8C43.2,33.1,42.7,32.6,42.2,32.6z M41.1,37.4h-2.8c-0.6,0-1,0.5-1,1v2.8h-2.7v-2.8c0-0.6-0.5-1-1-1h-2.8v-2.7\r\n                                                                                                                                   h2.8c0.6,0,1-0.5,1-1v-2.8h2.7v2.8c0,0.6,0.5,1,1,1h2.8V37.4z\" />\r\n                                            </svg>', 'All international students are required to have OSHC throughout their stay in Australia. OSHC provides access to a range of medical services and helps cover the cost of medical treatments, hospital stays, prescription medications, and emergency services.', '2025-02-05 01:07:45', '2025-02-05 01:16:22'),
(7, 'Insurance Providers', '11', '<svg version=\"1.1\" id=\"svg-cus-2\" xmlns=\"http://www.w3.org/2000/svg\"\r\n                                                xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n                                                viewBox=\"0 0 72 72\" style=\"enable-background:new 0 0 72 72;\"\r\n                                                xml:space=\"preserve\">\r\n                                                <path\r\n                                                    d=\"M17.1,17c-0.5,0-0.9-0.4-0.9-0.9c0-0.5,0.4-0.9,0.9-0.9h16.1c0.5,0,0.9,0.4,0.9,0.9c0,0.5-0.4,0.9-0.9,0.9H17.1z M14.7,21.7\r\n                                                                                                                                   c0,0.5,0.4,0.9,0.9,0.9h17.5c0.5,0,0.9-0.4,0.9-0.9c0-0.5-0.4-0.9-0.9-0.9H15.7C15.1,20.8,14.7,21.2,14.7,21.7z M13.2,27.4\r\n                                                                                                                                   c0,0.5,0.4,0.9,0.9,0.9h19c0.5,0,0.9-0.4,0.9-0.9c0-0.5-0.4-0.9-0.9-0.9h-19C13.6,26.4,13.2,26.9,13.2,27.4z M23,59.2\r\n                                                                                                                                   c0.2,0.2,0.4,0.3,0.7,0.3h0c0.3,0,0.6-0.2,0.7-0.4l7-9.7c0.3-0.4,0.2-1-0.2-1.3c-0.4-0.3-1-0.2-1.3,0.2l-6.3,8.7l-2.8-3.2\r\n                                                                                                                                   c-0.3-0.4-0.9-0.4-1.3-0.1c-0.4,0.3-0.4,0.9-0.1,1.3L23,59.2z M12.4,53.8c0-7.2,5.8-13,13-13c3.5,0,6.6,1.4,9,3.6\r\n                                                                                                                                   c0.7-0.4,1.5-0.7,2.3-0.7h2.9v-1.1c0-1.6,1.3-3,3-3h2.5l2.4-20c-3.2-1.6-5.4-5-5.6-8.8H13.7L2.1,69.9h59.1l-2.1-10.5H42.2\r\n                                                                                                                                   c-0.5,0-0.9-0.4-0.9-0.9c0-0.5,0.4-0.9,0.9-0.9h17.7h0h11.2c0.5,0,0.9,0.4,0.9,0.9c0,0.5-0.4,0.9-0.9,0.9H61l2.2,11.3v0v0\r\n                                                                                                                                   c0,0,0,0,0,0c0,0,0,0,0,0.1c0,0,0,0,0,0.1v0v0c0,0,0,0.1,0,0.1v0c0,0,0,0.1,0,0.1v0c0,0,0,0,0,0.1c0,0.1-0.1,0.2-0.1,0.3\r\n                                                                                                                                   c0,0,0,0,0,0c0,0,0,0,0,0c0,0,0,0,0,0c0,0,0,0,0,0c0,0,0,0,0,0l0,0c-0.1,0.1-0.2,0.1-0.2,0.2c0,0,0,0,0,0c0,0,0,0,0,0\r\n                                                                                                                                   c0,0-0.1,0-0.1,0c0,0,0,0,0,0c0,0-0.1,0-0.1,0h0c0,0,0,0,0,0c0,0,0,0-0.1,0c0,0-0.1,0-0.1,0h0l-61.4,0h0c0,0-0.1,0-0.1,0\r\n                                                                                                                                   c0,0,0,0-0.1,0c0,0,0,0,0,0h0c0,0-0.1,0-0.1,0c0,0,0,0,0,0c0,0-0.1,0-0.1,0c0,0,0,0,0,0c0,0,0,0,0,0c-0.1,0-0.2-0.1-0.2-0.2l0,0\r\n                                                                                                                                   c0,0,0,0,0,0c0,0,0,0,0,0c0,0,0,0,0,0c0,0,0,0,0,0c0,0,0,0,0,0C0.1,71.2,0.1,71.1,0,71c0,0,0,0,0-0.1v0c0,0,0-0.1,0-0.1v0\r\n                                                                                                                                   c0,0,0-0.1,0-0.1v0v0c0,0,0,0,0-0.1c0,0,0,0,0-0.1c0,0,0,0,0,0v0v0L12,9.7v0c0,0,0-0.1,0-0.1c0,0,0,0,0,0c0,0,0,0,0-0.1c0,0,0,0,0,0\r\n                                                                                                                                   c0,0,0,0,0,0c0.1-0.1,0.1-0.2,0.2-0.3l0,0c0,0,0,0,0.1,0c0,0,0,0,0,0c0,0,0,0,0,0c0,0,0,0,0,0c0,0,0,0,0,0c0,0,0,0,0.1,0\r\n                                                                                                                                   c0.1,0,0.2-0.1,0.4-0.1h0h29.2c0.8-4.9,5-8.6,10.1-8.6c5.6,0,10.2,4.6,10.2,10.2c0,4-2.3,7.4-5.6,9.1l2.4,20h2.5c1.6,0,3,1.3,3,3\r\n                                                                                                                                   v1.1h2.9c2.4,0,4.3,1.9,4.3,4.3v6.5c0,0.5-0.4,0.9-0.9,0.9l-32.6,0c-0.8,6.4-6.3,11.4-12.9,11.4C18.3,66.8,12.4,60.9,12.4,53.8\r\n                                                                                                                                   L12.4,53.8z M52.2,18.8c4.6,0,8.3-3.7,8.3-8.3c0-4.6-3.7-8.3-8.3-8.3c-4.6,0-8.3,3.7-8.3,8.3C43.9,15.1,47.6,18.8,52.2,18.8z\r\n                                                                                                                                    M47,39.6h10.3L55,20.3c-0.9,0.3-1.9,0.4-2.8,0.4s-1.9-0.1-2.8-0.4L47,39.6z M41.5,43.6h21.3v-1.1c0-0.6-0.5-1.1-1.1-1.1H42.6\r\n                                                                                                                                   c-0.6,0-1.1,0.5-1.1,1.1L41.5,43.6z M36.7,45.5c-0.3,0-0.7,0.1-1,0.2c1.7,2.2,2.7,4.9,2.8,7.8h31.6V48c0-1.4-1.1-2.5-2.5-2.5h-3.9h0\r\n                                                                                                                                   h0H40.6h0h0L36.7,45.5z M14.3,53.8c0,6.2,5,11.2,11.2,11.2c6.2,0,11.2-5,11.2-11.2s-5-11.2-11.2-11.2C19.3,42.6,14.3,47.6,14.3,53.8\r\n                                                                                                                                   z\" />\r\n                                            </svg>', 'There are several approved insurance providers in Australia that offer OSHC policies. Students can choose the insurance provider and plan that best suits their needs and budget. It\'s important to compare the coverage and costs of different providers before making a decision.', '2025-02-05 01:16:54', '2025-02-05 01:16:54'),
(8, 'Coverage and Benefits', '11', '<svg version=\"1.1\" id=\"svg-cus-3\" xmlns=\"http://www.w3.org/2000/svg\"\r\n                                                xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n                                                viewBox=\"0 0 72 72\" style=\"enable-background:new 0 0 72 72;\"\r\n                                                xml:space=\"preserve\">\r\n                                                <style type=\"text/css\">\r\n                                                    .st0 {\r\n                                                        fill-rule: evenodd;\r\n                                                        clip-rule: evenodd;\r\n                                                    }\r\n                                                </style>\r\n                                                <path class=\"st0\"\r\n                                                    d=\"M17.6,60.7L0.5,50.5c-0.4-0.3-0.6-0.8-0.4-1.3L20.9,0.6c0-0.1,0.1-0.1,0.1-0.2c0.1-0.2,0.3-0.3,0.4-0.4\r\n                                                                                                                                   C21.5,0,21.7,0,21.8,0c0,0,0,0,0.1,0c0,0,0,0,0,0c0.2,0,0.3,0.1,0.5,0.2c0.2,0.1,0.3,0.3,0.4,0.4l16.5,37v-2.9\r\n                                                                                                                                   c0-0.4,0.2-0.7,0.5-0.9l15.3-8.4c0.3-0.2,0.7-0.2,1,0l15.3,8.4c0.3,0.2,0.5,0.5,0.5,0.9v16.7c0,0.4-0.2,0.7-0.5,0.9l-15.3,8.4\r\n                                                                                                                                   c-0.3,0.2-0.7,0.2-1,0l-3.9-2.1C50.3,66.2,43.8,72,36,72c-7.5,0-13.7-5.3-15.1-12.4l-2.3,1.2c-0.2,0.1-0.3,0.1-0.5,0.1\r\n                                                                                                                                   C17.9,60.9,17.7,60.8,17.6,60.7z M20.5,6.9L2.3,49.2c0,0,11.5,6.9,14.9,8.9L20.5,6.9z M38.8,41.5L22.6,5.2l-3.4,52.9l1.4-0.7\r\n                                                                                                                                   c0-0.3,0-0.6,0-0.9c0-8.5,6.9-15.4,15.4-15.4C36.9,41.2,37.9,41.3,38.8,41.5z M51.4,56.4l3.2,1.8V43.7l-13.3-7.3v5.8\r\n                                                                                                                                   C47.1,44.3,51.3,49.8,51.4,56.4z M56.7,58.1L70,50.9c0,0,0-10.9,0-14.4l-13.3,7.3V58.1z M68.9,34.8l-13.2-7.2c0,0-9.7,5.3-13.1,7.2\r\n                                                                                                                                   L55.7,42L68.9,34.8z M22.7,58c0.7,6.7,6.4,12,13.3,12c7.3,0,13.2-5.8,13.4-13c0,0,0,0,0,0c0-0.1,0-0.2,0-0.3c0-7.4-6-13.4-13.4-13.4\r\n                                                                                                                                   c-7.4,0-13.4,6-13.4,13.4C22.6,57.1,22.7,57.5,22.7,58C22.7,58,22.7,58,22.7,58z\" />\r\n                                            </svg>', 'Coverage and Benefits: OSHC covers a portion of the medical expenses incurred by international students. It also provides limited coverage for pharmaceuticals and hospital services. The coverage may vary depending on the insurance provider and the plan chosen.', '2025-02-05 01:17:20', '2025-02-05 01:17:20'),
(9, 'Extra Coverage', '11', '<svg version=\"1.1\" id=\"svg-cus-3\" xmlns=\"http://www.w3.org/2000/svg\"\r\n                                                xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n                                                viewBox=\"0 0 72 72\" style=\"enable-background:new 0 0 72 72;\"\r\n                                                xml:space=\"preserve\">\r\n                                                <style type=\"text/css\">\r\n                                                    .st0 {\r\n                                                        fill-rule: evenodd;\r\n                                                        clip-rule: evenodd;\r\n                                                    }\r\n                                                </style>\r\n                                                <path class=\"st0\"\r\n                                                    d=\"M17.6,60.7L0.5,50.5c-0.4-0.3-0.6-0.8-0.4-1.3L20.9,0.6c0-0.1,0.1-0.1,0.1-0.2c0.1-0.2,0.3-0.3,0.4-0.4\r\n                                                                                                                                   C21.5,0,21.7,0,21.8,0c0,0,0,0,0.1,0c0,0,0,0,0,0c0.2,0,0.3,0.1,0.5,0.2c0.2,0.1,0.3,0.3,0.4,0.4l16.5,37v-2.9\r\n                                                                                                                                   c0-0.4,0.2-0.7,0.5-0.9l15.3-8.4c0.3-0.2,0.7-0.2,1,0l15.3,8.4c0.3,0.2,0.5,0.5,0.5,0.9v16.7c0,0.4-0.2,0.7-0.5,0.9l-15.3,8.4\r\n                                                                                                                                   c-0.3,0.2-0.7,0.2-1,0l-3.9-2.1C50.3,66.2,43.8,72,36,72c-7.5,0-13.7-5.3-15.1-12.4l-2.3,1.2c-0.2,0.1-0.3,0.1-0.5,0.1\r\n                                                                                                                                   C17.9,60.9,17.7,60.8,17.6,60.7z M20.5,6.9L2.3,49.2c0,0,11.5,6.9,14.9,8.9L20.5,6.9z M38.8,41.5L22.6,5.2l-3.4,52.9l1.4-0.7\r\n                                                                                                                                   c0-0.3,0-0.6,0-0.9c0-8.5,6.9-15.4,15.4-15.4C36.9,41.2,37.9,41.3,38.8,41.5z M51.4,56.4l3.2,1.8V43.7l-13.3-7.3v5.8\r\n                                                                                                                                   C47.1,44.3,51.3,49.8,51.4,56.4z M56.7,58.1L70,50.9c0,0,0-10.9,0-14.4l-13.3,7.3V58.1z M68.9,34.8l-13.2-7.2c0,0-9.7,5.3-13.1,7.2\r\n                                                                                                                                   L55.7,42L68.9,34.8z M22.7,58c0.7,6.7,6.4,12,13.3,12c7.3,0,13.2-5.8,13.4-13c0,0,0,0,0,0c0-0.1,0-0.2,0-0.3c0-7.4-6-13.4-13.4-13.4\r\n                                                                                                                                   c-7.4,0-13.4,6-13.4,13.4C22.6,57.1,22.7,57.5,22.7,58C22.7,58,22.7,58,22.7,58z\" />\r\n                                            </svg>', 'OSHC covers basic medical services, but it may not cover extras such as dental, optical, or allied health services. Students may choose to purchase additional insurance or separate policies to cover these services, if desired.', '2025-02-05 01:17:44', '2025-02-05 01:17:44'),
(10, 'Duration of Coverage', '11', '<svg version=\"1.1\" id=\"svg-cus-3\" xmlns=\"http://www.w3.org/2000/svg\"\r\n                                                xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n                                                viewBox=\"0 0 72 72\" style=\"enable-background:new 0 0 72 72;\"\r\n                                                xml:space=\"preserve\">\r\n                                                <style type=\"text/css\">\r\n                                                    .st0 {\r\n                                                        fill-rule: evenodd;\r\n                                                        clip-rule: evenodd;\r\n                                                    }\r\n                                                </style>\r\n                                                <path class=\"st0\"\r\n                                                    d=\"M48.4,24.7c-13,0-23.6,10.6-23.6,23.6S35.3,72,48.4,72S72,61.4,72,48.4S61.4,24.7,48.4,24.7z M48.4,70\r\n                                                                                                                                   c-11.9,0-21.6-9.7-21.6-21.6s9.7-21.6,21.6-21.6S70,36.4,70,48.4S60.3,70,48.4,70z M48.4,29.2c-10.6,0-19.2,8.6-19.2,19.2\r\n                                                                                                                                   s8.6,19.2,19.2,19.2s19.2-8.6,19.2-19.2S58.9,29.2,48.4,29.2z M48.4,65.5c-9.5,0-17.1-7.7-17.1-17.1s7.7-17.1,17.1-17.1\r\n                                                                                                                                   s17.1,7.7,17.1,17.1S57.8,65.5,48.4,65.5z M54.6,52c-0.2,0.3-0.5,0.5-0.9,0.5c-0.2,0-0.3,0-0.5-0.1l-4.5-2.6c-0.1,0-0.3,0.1-0.4,0.1\r\n                                                                                                                                   c-0.8,0-1.5-0.7-1.5-1.5c0-0.4,0.2-0.8,0.4-1v-8.2c0-0.6,0.5-1,1-1c0.6,0,1,0.5,1,1v8.2c0.2,0.2,0.3,0.4,0.4,0.7l4.5,2.6\r\n                                                                                                                                   C54.8,50.9,54.9,51.5,54.6,52z M38.9,57.8c0.4,0.4,0.4,1,0,1.4l-0.7,0.7c-0.2,0.2-0.5,0.3-0.7,0.3s-0.5-0.1-0.7-0.3\r\n                                                                                                                                   c-0.4-0.4-0.4-1,0-1.4l0.7-0.7C37.9,57.4,38.5,57.4,38.9,57.8z M47.3,34v-1c0-0.6,0.5-1,1-1c0.6,0,1,0.5,1,1v1c0,0.6-0.5,1-1,1\r\n                                                                                                                                   C47.8,35,47.3,34.5,47.3,34z M35,48.4c0,0.6-0.5,1-1,1h-1c-0.6,0-1-0.5-1-1c0-0.6,0.5-1,1-1h1C34.5,47.3,35,47.8,35,48.4z\r\n                                                                                                                                    M59.9,36.8c0.4,0.4,0.4,1,0,1.4l-0.7,0.7c-0.2,0.2-0.5,0.3-0.7,0.3c-0.3,0-0.5-0.1-0.7-0.3c-0.4-0.4-0.4-1,0-1.4l0.7-0.7\r\n                                                                                                                                   C58.9,36.4,59.5,36.4,59.9,36.8z M64.7,48.4c0,0.6-0.5,1-1,1h-1c-0.6,0-1-0.5-1-1c0-0.6,0.5-1,1-1h1C64.3,47.3,64.7,47.8,64.7,48.4z\r\n                                                                                                                                    M38.9,37.5c0.4,0.4,0.4,1,0,1.4c-0.2,0.2-0.5,0.3-0.7,0.3s-0.5-0.1-0.7-0.3l-0.7-0.7c-0.4-0.4-0.4-1,0-1.4c0.4-0.4,1-0.4,1.4,0\r\n                                                                                                                                   L38.9,37.5z M49.4,62.7v1c0,0.6-0.5,1-1,1c-0.6,0-1-0.5-1-1v-1c0-0.6,0.5-1,1-1C48.9,61.7,49.4,62.2,49.4,62.7z M59.9,58.5\r\n                                                                                                                                   c0.4,0.4,0.4,1,0,1.4c-0.2,0.2-0.5,0.3-0.7,0.3s-0.5-0.1-0.7-0.3l-0.7-0.7c-0.4-0.4-0.4-1,0-1.4c0.4-0.4,1-0.4,1.4,0L59.9,58.5z\r\n                                                                                                                                    M43.2,22.2h10.2c0.6,0,1-0.5,1-1v-6.8c0-3.4-2.8-6.1-6.1-6.1s-6.1,2.8-6.1,6.1v6.8C42.2,21.7,42.7,22.2,43.2,22.2z M44.3,20.1v-1\r\n                                                                                                                                   h8.2v1C52.4,20.1,44.3,20.1,44.3,20.1z M48.4,10.3c2.3,0,4.1,1.8,4.1,4.1v2.8h-3.1v-2.8c0-0.6-0.5-1-1-1c-0.6,0-1,0.5-1,1v2.8h-3.1\r\n                                                                                                                                   v-2.8C44.3,12.1,46.1,10.3,48.4,10.3z M33.2,15.2c0-0.6,0.5-1,1-1H38c0.6,0,1,0.5,1,1s-0.5,1-1,1h-3.9\r\n                                                                                                                                   C33.6,16.2,33.2,15.8,33.2,15.2z M47.3,4.9V1c0-0.6,0.5-1,1-1c0.6,0,1,0.5,1,1v3.9c0,0.6-0.5,1-1,1C47.8,5.9,47.3,5.4,47.3,4.9z\r\n                                                                                                                                    M58.7,14.2h3.9c0.6,0,1,0.5,1,1s-0.5,1-1,1h-3.9c-0.6,0-1-0.5-1-1S58.1,14.2,58.7,14.2z M54.9,8.6c-0.4-0.4-0.4-1,0-1.4l2.7-2.7\r\n                                                                                                                                   c0.4-0.4,1-0.4,1.4,0c0.4,0.4,0.4,1,0,1.4l-2.7,2.7c-0.2,0.2-0.5,0.3-0.7,0.3C55.4,8.9,55.1,8.8,54.9,8.6z M37.6,5.9\r\n                                                                                                                                   c-0.4-0.4-0.4-1,0-1.4c0.4-0.4,1-0.4,1.4,0l2.7,2.7c0.4,0.4,0.4,1,0,1.4c-0.2,0.2-0.5,0.3-0.7,0.3s-0.5-0.1-0.7-0.3L37.6,5.9z\r\n                                                                                                                                    M23.9,40.4c0,0.6-0.5,1-1,1h-8.1c-0.6,0-1-0.5-1-1c0-0.6,0.5-1,1-1h8.1C23.4,39.3,23.9,39.8,23.9,40.4z M6.4,32.4c0-0.6,0.5-1,1-1\r\n                                                                                                                                   h19.6c0.6,0,1,0.5,1,1c0,0.6-0.5,1-1,1H7.4C6.8,33.4,6.4,32.9,6.4,32.4z M28,64.3c0,0.6-0.5,1-1,1H7.4c-0.6,0-1-0.5-1-1\r\n                                                                                                                                   c0-0.6,0.5-1,1-1h19.6C27.5,63.3,28,63.8,28,64.3z M21.6,49.4H1c-0.6,0-1-0.5-1-1c0-0.6,0.5-1,1-1h20.6c0.6,0,1,0.5,1,1\r\n                                                                                                                                   C22.7,48.9,22.2,49.4,21.6,49.4z M9.1,57.4H2.5c-0.6,0-1-0.5-1-1s0.5-1,1-1h6.7c0.6,0,1,0.5,1,1S9.7,57.4,9.1,57.4z M23.9,56.3\r\n                                                                                                                                   c0,0.6-0.5,1-1,1h-8.1c-0.6,0-1-0.5-1-1s0.5-1,1-1h8.1C23.4,55.3,23.9,55.8,23.9,56.3z M1.4,40.4c0-0.6,0.5-1,1-1h6.7\r\n                                                                                                                                   c0.6,0,1,0.5,1,1c0,0.6-0.5,1-1,1H2.5C1.9,41.4,1.4,40.9,1.4,40.4z\" />\r\n                                            </svg>', 'OSHC coverage must be maintained for the duration of your student visa in Australia. It is recommended to purchase OSHC before arriving in the country to ensure you are protected from the day you arrive.', '2025-02-05 01:20:25', '2025-02-05 01:20:25'),
(11, 'Government Incentives', '11', '<svg version=\"1.1\" id=\"svg-cus-3\" xmlns=\"http://www.w3.org/2000/svg\"\r\n                                                xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n                                                viewBox=\"0 0 72 72\" style=\"enable-background:new 0 0 72 72;\"\r\n                                                xml:space=\"preserve\">\r\n                                                <path\r\n                                                    d=\"M59.1,0H12.9c-2.3,0-4.2,1.9-4.2,4.2v63.6c0,2.3,1.9,4.2,4.2,4.2H59c2.3,0,4.2-1.9,4.2-4.2l0-63.6C63.2,1.9,61.4,0,59.1,0\r\n                                                                                                                                   L59.1,0z M61.4,67.8c0,1.3-1,2.3-2.3,2.3H12.9c-1.3,0-2.3-1-2.3-2.3V4.2c0-1.3,1-2.3,2.3-2.3H59c1.3,0,2.3,1,2.3,2.3L61.4,67.8z\r\n                                                                                                                                    M18.9,30.5c0.5,0,1.1-0.2,1.5-0.5L34.2,21l1.6,2.4c-0.1,0.1-0.1,0.2-0.1,0.4c-0.1,0.5,0,0.9,0.3,1.3l1,1.5c0.2,0.3,0.5,0.4,0.8,0.4\r\n                                                                                                                                   c0.2,0,0.4-0.1,0.5-0.2l8.7-5.8c0.2-0.1,0.4-0.4,0.4-0.6c0-0.2,0-0.5-0.1-0.7l-1-1.5c-0.3-0.4-0.7-0.7-1.1-0.8c-0.1,0-0.3,0-0.4,0\r\n                                                                                                                                   l-1.7-2.6c0.5-0.7,0.5-1.7,0-2.5l-0.6-0.9c-0.3-0.5-0.8-0.8-1.4-1c-0.3-0.1-0.5-0.1-0.8,0L38.4,8c0.2-0.5,0.2-1.2-0.1-1.7l-1-1.5\r\n                                                                                                                                   c-0.1-0.2-0.4-0.4-0.6-0.4s-0.5,0-0.7,0.1l-8.7,5.8c-0.2,0.1-0.4,0.4-0.4,0.6s0,0.5,0.1,0.7l1,1.5c0.3,0.4,0.7,0.7,1.1,0.8\r\n                                                                                                                                   c0.1,0,0.2,0,0.4,0c0,0,0,0,0,0l1.6,2.4l-13.8,9.1c-0.6,0.4-1,1-1.2,1.8c-0.1,0.7,0,1.5,0.4,2.1C17.1,30.1,18,30.5,18.9,30.5\r\n                                                                                                                                   L18.9,30.5z M38,24.7l-0.4-0.6l7.1-4.7l0.4,0.6L38,24.7z M36.2,6.6l0.4,0.6l-7.1,4.7l-0.4-0.6L36.2,6.6z M18,27.6\r\n                                                                                                                                   c0-0.2,0.2-0.5,0.4-0.6l14.5-9.6c0.4-0.3,0.5-0.9,0.3-1.3l-2-3l5.8-3.8l2,3c0.3,0.4,0.9,0.5,1.3,0.3c0.1-0.1,0.2-0.1,0.3-0.1\r\n                                                                                                                                   c0.1,0,0.2,0.1,0.3,0.2l0.6,0.9c0.1,0.2,0.1,0.4-0.1,0.6c-0.3,0.2-0.4,0.5-0.4,0.8v0v0c0,0.2,0.1,0.3,0.2,0.4l2,3l-5.8,3.8l-2-3\r\n                                                                                                                                   c-0.3-0.4-0.9-0.5-1.3-0.3l-14.5,9.6c-0.4,0.3-1,0.2-1.3-0.3C18,28.1,17.9,27.8,18,27.6L18,27.6z M34.2,30.6v0.7h-0.8\r\n                                                                                                                                   c-1.4,0-2.6,1.1-2.6,2.6v1.6c0,0.5,0.4,0.9,0.9,0.9H55c0.5,0,0.9-0.4,0.9-0.9v-1.6c0-1.4-1.1-2.6-2.6-2.6h-0.8v-0.7\r\n                                                                                                                                   c0-1.4-1.1-2.6-2.6-2.6H36.7C35.3,28.1,34.2,29.2,34.2,30.6L34.2,30.6z M54,33.9v0.7H32.7v-0.7c0-0.4,0.3-0.7,0.7-0.7h1.8h0h0h16.4\r\n                                                                                                                                   h0h0h1.8C53.7,33.2,54,33.5,54,33.9L54,33.9z M50.6,30.6v0.7l-14.6,0v-0.7c0-0.4,0.3-0.7,0.7-0.7h13.2C50.3,30,50.6,30.3,50.6,30.6\r\n                                                                                                                                   L50.6,30.6z M24.1,40.2h-9.6c-0.5,0-0.9,0.4-0.9,0.9v9.6c0,0.5,0.4,0.9,0.9,0.9h9.6c0.5,0,0.9-0.4,0.9-0.9v-9.6\r\n                                                                                                                                   C25.1,40.6,24.6,40.2,24.1,40.2z M23.2,49.8h-7.8V42h7.8V49.8z M16.3,46.8c-0.3-0.4-0.3-1,0.1-1.3c0.4-0.3,1-0.3,1.3,0.1l0.8,0.9\r\n                                                                                                                                   l2.4-3.3c0.3-0.4,0.9-0.5,1.3-0.2c0.4,0.3,0.5,0.9,0.2,1.3l-3.1,4.3c-0.2,0.2-0.4,0.4-0.7,0.4h0c-0.3,0-0.5-0.1-0.7-0.3L16.3,46.8z\r\n                                                                                                                                    M29.3,42.5c0-0.5,0.4-0.9,0.9-0.9h13.6c0.5,0,0.9,0.4,0.9,0.9c0,0.5-0.4,0.9-0.9,0.9H30.2C29.7,43.5,29.3,43.1,29.3,42.5z\r\n                                                                                                                                    M30.2,48.4h27.3c0.5,0,0.9,0.4,0.9,0.9c0,0.5-0.4,0.9-0.9,0.9H30.2c-0.5,0-0.9-0.4-0.9-0.9C29.3,48.8,29.7,48.4,30.2,48.4z\r\n                                                                                                                                    M24.1,56.1h-9.6c-0.5,0-0.9,0.4-0.9,0.9v9.6c0,0.5,0.4,0.9,0.9,0.9h9.6c0.5,0,0.9-0.4,0.9-0.9v-9.6C25.1,56.6,24.6,56.1,24.1,56.1z\r\n                                                                                                                                    M23.2,65.8h-7.8V58h7.8V65.8z M16.3,62.8c-0.3-0.4-0.3-1,0.1-1.3c0.4-0.3,1-0.3,1.3,0.1l0.8,0.9l2.4-3.3c0.3-0.4,0.9-0.5,1.3-0.2\r\n                                                                                                                                   c0.4,0.3,0.5,0.9,0.2,1.3l-3.1,4.3c-0.2,0.2-0.4,0.4-0.7,0.4h0c-0.3,0-0.5-0.1-0.7-0.3L16.3,62.8z M58.4,58.5c0,0.5-0.4,0.9-0.9,0.9\r\n                                                                                                                                   H30.2c-0.5,0-0.9-0.4-0.9-0.9c0-0.5,0.4-0.9,0.9-0.9h27.3C58,57.6,58.4,58,58.4,58.5L58.4,58.5z M58.4,65.3c0,0.5-0.4,0.9-0.9,0.9\r\n                                                                                                                                   H30.2c-0.5,0-0.9-0.4-0.9-0.9c0-0.5,0.4-0.9,0.9-0.9h27.3C58,64.3,58.4,64.7,58.4,65.3L58.4,65.3z\" />\r\n                                            </svg>', 'The Australian government offers several incentives to encourage residents to take up private health insurance, including the Private Health Insurance Rebate, which provides a income-tested rebate on premiums.', '2025-02-05 01:20:50', '2025-02-05 01:20:50');

-- --------------------------------------------------------

--
-- Table structure for table `destination_jobs`
--

CREATE TABLE `destination_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `destination_id` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `destination_jobs`
--

INSERT INTO `destination_jobs` (`id`, `title`, `destination_id`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Work Right', '11', NULL, 'International students with a valid student visa are generally allowed to work part-time during their studies. They can work up to 48 hours per fortnight during the academic term and full-time during scheduled breaks.', '2025-02-03 06:02:37', '2025-02-05 03:47:20'),
(3, 'Job Search Support', '11', NULL, 'Australian universities and institutions often provide career services and job placement assistance to help students find employment opportunities. They offer resources, workshops, and guidance on resume writing, interview skills, and job search strategies.', '2025-02-03 06:26:54', '2025-02-05 03:47:38'),
(4, 'Availability of Jobs', '11', NULL, 'Strong economy and a diverse range of industries, offering job opportunities in sectors such as hospitality, retail, administration, healthcare, and more. Major cities like Sydney, Melbourne, Brisbane, and Perth have a higher concentration of job opportunities.', '2025-02-05 03:47:59', '2025-02-05 03:47:59'),
(5, 'Post-Study Work Opportunities', '11', NULL, 'After graduation, international students may be eligible for the Post-Study Work Stream of the Temporary Graduate Visa (subclass 485), allowing them to work in Australia for a period of two to four years, depending on their level of study.', '2025-02-05 03:48:17', '2025-02-05 03:48:17'),
(6, 'Minimum Wage', '11', NULL, 'Australia has one of the highest minimum wages globally, providing students with fair remuneration for their work. The minimum wage varies based on age, but it is generally around AU$21.38 per hour.', '2025-02-05 03:48:34', '2025-02-05 03:48:34'),
(7, 'A Thriving Market for Skilled Professionals', '11', NULL, 'Australia offers a dynamic and diverse job market, making it an attractive destination for both local and international professionals. With a strong economy and a high demand for skilled workers across various sectors, opportunities.', '2025-02-05 03:48:49', '2025-02-05 03:48:49');

-- --------------------------------------------------------

--
-- Table structure for table `destination_key_facts`
--

CREATE TABLE `destination_key_facts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `destination_id` bigint(20) UNSIGNED NOT NULL,
  `language` varchar(255) DEFAULT NULL,
  `cost_of_study` longtext DEFAULT NULL,
  `source_of_funding` varchar(255) DEFAULT NULL,
  `required_exams` varchar(255) DEFAULT NULL,
  `degrees` varchar(255) DEFAULT NULL,
  `intakes` varchar(255) DEFAULT NULL,
  `visa` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `destination_key_facts`
--

INSERT INTO `destination_key_facts` (`id`, `destination_id`, `language`, `cost_of_study`, `source_of_funding`, `required_exams`, `degrees`, `intakes`, `visa`, `created_at`, `updated_at`) VALUES
(1, 2, 'English', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th>Level of Study</th>\r\n			<th>Average Annual Tuition Fees (in AUD)</th>\r\n		</tr>\r\n		<tr>\r\n			<td><a href=\"https://thenext.edu.np/best-bachelors-degree-for-nepalese-students-to-study-in-australia/\">Undergraduate</a></td>\r\n			<td>$20,000 &ndash; $45,000</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Postgraduate</td>\r\n			<td>$22,000 &ndash; $50,000</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Doctoral Degree</td>\r\n			<td>$18,000 &ndash; $42,000</td>\r\n		</tr>\r\n		<tr>\r\n			<td>PhD</td>\r\n			<td>$22,000 &ndash; $50,000</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 'Parents', 'IELTS, TOEFL', 'Intermediate,Bachelors,Masters', 'Jun/Feb', NULL, '2025-02-03 03:24:44', '2025-02-03 03:24:44');

-- --------------------------------------------------------

--
-- Table structure for table `destination_reasons`
--

CREATE TABLE `destination_reasons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `destination_id` varchar(255) NOT NULL,
  `image` text DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `destination_reasons`
--

INSERT INTO `destination_reasons` (`id`, `title`, `destination_id`, `image`, `description`, `created_at`, `updated_at`) VALUES
(4, 'High-Quality Education', '11', ' <svg version=\"1.1\" id=\"svg-custom_1\" xmlns=\"http://www.w3.org/2000/svg\"\r\n                                                xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n                                                viewBox=\"0 0 72 72\" style=\"enable-background:new 0 0 72 72;\"\r\n                                                xml:space=\"preserve\">\r\n                                                <style type=\"text/css\">\r\n                                                    .st0 {\r\n                                                        fill: #010101;\r\n                                                    }\r\n                                                </style>\r\n                                                <path class=\"st0\"\r\n                                                    d=\"M71.85,65.61L69.9,62.6l0-8.09c0-0.04,0-0.08-0.01-0.13c0-0.01,0-0.02,0-0.03c-0.01-0.08-0.04-0.16-0.07-0.24\r\n                                                                                                                                        c0-0.01-0.01-0.01-0.01-0.02c-0.02-0.04-0.04-0.07-0.06-0.11c0,0,0,0,0,0c-0.02-0.03-0.05-0.07-0.07-0.1\r\n                                                                                                                                        c-0.01-0.01-0.01-0.01-0.02-0.02c-0.03-0.03-0.06-0.06-0.09-0.08c-0.03-0.03-0.07-0.05-0.1-0.07c-0.01-0.01-0.01-0.01-0.02-0.01\r\n                                                                                                                                        c-0.04-0.02-0.08-0.04-0.11-0.06L43.5,42.98c-0.23-0.09-0.49-0.09-0.71,0l-8.99,3.71V12.73l27.03-8.8v42.65\r\n                                                                                                                                        c0,0.52,0.42,0.94,0.94,0.94c0.52,0,0.94-0.42,0.94-0.94l0-43.94v0c0-0.02,0-0.05,0-0.07c0-0.01,0-0.02,0-0.03\r\n                                                                                                                                        c0-0.02-0.01-0.03-0.01-0.05c0-0.02-0.01-0.03-0.01-0.05c0-0.01,0-0.02-0.01-0.02c0-0.02-0.01-0.05-0.02-0.07v0\r\n                                                                                                                                        c0-0.01,0-0.01-0.01-0.02c-0.01-0.02-0.01-0.05-0.03-0.07c-0.01-0.01-0.01-0.02-0.01-0.03c-0.01-0.02-0.01-0.03-0.03-0.05\r\n                                                                                                                                        c-0.01-0.01-0.01-0.03-0.02-0.04c-0.01-0.01-0.01-0.02-0.02-0.04c-0.01-0.02-0.02-0.03-0.03-0.04c-0.01-0.01-0.02-0.02-0.02-0.03\r\n                                                                                                                                        C62.47,2.02,62.45,2.01,62.44,2c-0.01-0.01-0.01-0.02-0.02-0.03c-0.01-0.01-0.02-0.02-0.04-0.03c-0.01-0.01-0.02-0.02-0.03-0.03\r\n                                                                                                                                        s-0.02-0.02-0.04-0.03c-0.01-0.01-0.02-0.02-0.04-0.03c-0.01-0.01-0.02-0.01-0.03-0.02c-0.02-0.01-0.03-0.02-0.05-0.02\r\n                                                                                                                                        c-0.01-0.01-0.02-0.01-0.03-0.02c-0.01-0.01-0.03-0.02-0.05-0.02c-0.01-0.01-0.02-0.01-0.04-0.01c-0.01-0.01-0.03-0.01-0.05-0.02\r\n                                                                                                                                        C62.02,1.74,62,1.73,61.99,1.73c-0.01,0-0.03-0.01-0.04-0.01c-0.02,0-0.04-0.01-0.06-0.01c-0.01,0-0.02,0-0.03,0\r\n                                                                                                                                        c-0.03,0-0.05,0-0.08,0h-0.01h0c-0.03,0-0.05,0-0.08,0h-0.02c-0.02,0-0.04,0.01-0.05,0.01c-0.01,0-0.03,0-0.04,0.01\r\n                                                                                                                                        c-0.01,0-0.02,0.01-0.03,0.01c-0.02,0.01-0.05,0.01-0.07,0.02h0l-28.61,9.32L4.25,1.75h0C4.23,1.74,4.2,1.73,4.18,1.73\r\n                                                                                                                                        c-0.01,0-0.02,0-0.02-0.01c-0.02,0-0.03-0.01-0.05-0.01c-0.02,0-0.03,0-0.05-0.01c-0.01,0-0.02,0-0.02,0c-0.02,0-0.05,0-0.07,0h0\r\n                                                                                                                                        H3.95c-0.02,0-0.05,0-0.07,0c-0.02,0-0.03,0.01-0.04,0.01c-0.02,0-0.04,0.01-0.06,0.01c-0.02,0-0.03,0.01-0.05,0.01\r\n                                                                                                                                        c-0.02,0-0.03,0.01-0.04,0.01C3.68,1.75,3.66,1.75,3.65,1.76C3.63,1.76,3.62,1.77,3.61,1.77C3.59,1.78,3.58,1.79,3.56,1.79\r\n                                                                                                                                        C3.55,1.8,3.54,1.8,3.53,1.81C3.52,1.82,3.5,1.83,3.49,1.84C3.47,1.84,3.46,1.85,3.45,1.85C3.44,1.86,3.43,1.87,3.41,1.88\r\n                                                                                                                                        C3.4,1.89,3.39,1.9,3.38,1.91C3.37,1.92,3.36,1.93,3.35,1.94C3.33,1.95,3.32,1.96,3.31,1.97C3.3,1.98,3.29,1.99,3.29,2\r\n                                                                                                                                        C3.27,2.01,3.26,2.02,3.25,2.03C3.24,2.05,3.23,2.06,3.23,2.06C3.21,2.08,3.2,2.09,3.19,2.11C3.18,2.12,3.18,2.13,3.17,2.14\r\n                                                                                                                                        C3.16,2.15,3.15,2.17,3.14,2.18C3.14,2.2,3.13,2.21,3.12,2.23c0,0.01-0.01,0.02-0.01,0.03C3.1,2.29,3.09,2.31,3.08,2.33\r\n                                                                                                                                        c0,0.01,0,0.01-0.01,0.02v0C3.07,2.37,3.06,2.4,3.05,2.42c0,0.01,0,0.02-0.01,0.02c0,0.02-0.01,0.03-0.01,0.05\r\n                                                                                                                                        c0,0.02,0,0.03-0.01,0.05c0,0.01,0,0.02,0,0.03c0,0.02,0,0.05,0,0.07v0v48.62c0,0.41,0.26,0.77,0.65,0.89l8.33,2.72\r\n                                                                                                                                        c0.1,0.03,0.2,0.05,0.29,0.05c0.39,0,0.76-0.25,0.89-0.65c0.16-0.49-0.11-1.02-0.6-1.18l-7.69-2.5l0-46.65l27.03,8.8v34.74\r\n                                                                                                                                        l-14.96,6.18c-0.35,0.14-0.58,0.49-0.58,0.86c0,0.38,0.23,0.72,0.58,0.86l12.29,5.08v6.16v0.01c0,0.02,0,0.04,0,0.05\r\n                                                                                                                                        c0,0.01,0,0.03,0,0.04c0,0.02,0,0.03,0.01,0.04c0,0.02,0.01,0.03,0.01,0.05c0,0.01,0.01,0.02,0.01,0.04\r\n                                                                                                                                        c0.01,0.02,0.01,0.04,0.01,0.05c0,0.01,0.01,0.02,0.01,0.03c0.01,0.02,0.01,0.03,0.02,0.05c0.01,0.01,0.01,0.02,0.02,0.04\r\n                                                                                                                                        c0.01,0.01,0.01,0.03,0.02,0.04c0.01,0.01,0.02,0.03,0.03,0.04c0.01,0.01,0.02,0.02,0.02,0.03c0.01,0.01,0.02,0.03,0.03,0.04\r\n                                                                                                                                        c0.01,0.01,0.01,0.02,0.02,0.03c0.01,0.02,0.02,0.03,0.04,0.04c0.01,0.01,0.02,0.02,0.03,0.03c0.01,0.01,0.02,0.02,0.04,0.03\r\n                                                                                                                                        c0.01,0.01,0.02,0.02,0.03,0.03c0.01,0.01,0.02,0.02,0.04,0.03c0.02,0.01,0.03,0.02,0.04,0.03c0.01,0,0.01,0.01,0.01,0.01\r\n                                                                                                                                        c0.01,0,0.01,0.01,0.02,0.01c0.01,0.01,0.03,0.02,0.05,0.03c0.01,0.01,0.02,0.01,0.04,0.02c0.02,0.01,0.03,0.01,0.05,0.02\r\n                                                                                                                                        c0.01,0.01,0.03,0.01,0.04,0.01c0.02,0.01,0.03,0.01,0.05,0.01c0.02,0,0.03,0.01,0.05,0.01c0.01,0,0.03,0.01,0.04,0.01\r\n                                                                                                                                        c0.02,0,0.03,0.01,0.05,0.01c0.01,0,0.03,0,0.04,0c0.02,0,0.04,0,0.05,0h0.02h0.01c0.02,0,0.04,0,0.05,0c0.01,0,0.03,0,0.04,0\r\n                                                                                                                                        c0.02,0,0.03,0,0.04-0.01c0.02,0,0.03-0.01,0.05-0.01c0.01,0,0.02-0.01,0.04-0.01c0.02-0.01,0.04-0.01,0.05-0.01\r\n                                                                                                                                        c0.01,0,0.02-0.01,0.03-0.01c0.02-0.01,0.03-0.01,0.05-0.02c0.01-0.01,0.03-0.01,0.04-0.02c0.02-0.01,0.03-0.01,0.04-0.02\r\n                                                                                                                                        c0.02-0.01,0.03-0.02,0.04-0.03c0.01-0.01,0.02-0.02,0.03-0.02c0.01-0.01,0.03-0.02,0.05-0.03c0.01-0.01,0.02-0.01,0.03-0.02\r\n                                                                                                                                        c0.01-0.01,0.03-0.02,0.04-0.04c0.01-0.01,0.02-0.01,0.03-0.02c0.01-0.01,0.02-0.02,0.03-0.04c0.01-0.01,0.02-0.02,0.03-0.03\r\n                                                                                                                                        c0.01-0.01,0.02-0.02,0.03-0.04c0.01-0.01,0.02-0.03,0.03-0.04c0-0.01,0.01-0.01,0.01-0.01c2.01-3.25,6.78-5.35,12.15-5.35\r\n                                                                                                                                        c5.38,0,10.15,2.1,12.15,5.35c0,0,0.01,0.01,0.01,0.01c0.02,0.03,0.04,0.06,0.06,0.08c0,0,0.01,0.01,0.01,0.01\r\n                                                                                                                                        c0.02,0.03,0.05,0.05,0.07,0.08c0.01,0.01,0.02,0.02,0.03,0.03c0.02,0.01,0.04,0.03,0.05,0.04c0.01,0.01,0.02,0.02,0.03,0.02\r\n                                                                                                                                        c0.03,0.02,0.05,0.03,0.08,0.05c0,0,0.01,0,0.01,0.01c0.03,0.02,0.06,0.03,0.1,0.04c0.01,0,0.01,0.01,0.02,0.01\r\n                                                                                                                                        c0.03,0.01,0.05,0.02,0.08,0.03c0.01,0,0.02,0.01,0.03,0.01c0.03,0.01,0.05,0.01,0.08,0.02c0.01,0,0.02,0,0.03,0.01\r\n                                                                                                                                        c0.03,0,0.07,0.01,0.1,0.01h0.01h0.01c0.03,0,0.07,0,0.1-0.01c0.01,0,0.02,0,0.04-0.01c0.03-0.01,0.05-0.01,0.08-0.02\r\n                                                                                                                                        c0.01,0,0.02-0.01,0.03-0.01c0.04-0.01,0.08-0.02,0.11-0.04c0,0,0.01,0,0.01-0.01c0.03-0.01,0.06-0.03,0.09-0.05\r\n                                                                                                                                        c0.01,0,0.01-0.01,0.01-0.01c0.01,0,0.01-0.01,0.01-0.01c0.02-0.01,0.03-0.02,0.04-0.03c0.01-0.01,0.02-0.02,0.04-0.03\r\n                                                                                                                                        c0.01-0.01,0.02-0.02,0.03-0.03c0.01-0.01,0.03-0.02,0.04-0.03c0.01-0.01,0.02-0.02,0.03-0.03c0.01-0.01,0.03-0.03,0.04-0.04\r\n                                                                                                                                        c0.01-0.01,0.01-0.02,0.02-0.03c0.01-0.01,0.02-0.03,0.03-0.05c0.01-0.01,0.01-0.02,0.02-0.03c0.01-0.01,0.02-0.03,0.03-0.04\r\n                                                                                                                                        s0.01-0.03,0.02-0.04s0.01-0.02,0.02-0.04c0.01-0.02,0.01-0.03,0.02-0.05c0-0.01,0.01-0.02,0.01-0.03c0.01-0.02,0.01-0.04,0.01-0.05\r\n                                                                                                                                        c0-0.01,0.01-0.02,0.01-0.04C57,66.8,57,66.79,57,66.77s0.01-0.03,0.01-0.04c0-0.01,0-0.03,0-0.04c0-0.02,0-0.04,0-0.05v-0.02v-6.16\r\n                                                                                                                                        l11-4.54v6.69l-1.95,3.01c-0.2,0.31-0.2,0.71,0,1.02l2.11,3.24c0.17,0.27,0.47,0.43,0.78,0.43c0.32,0,0.61-0.16,0.78-0.43l2.11-3.24\r\n                                                                                                                                        C72.05,66.32,72.05,65.92,71.85,65.61L71.85,65.61z M43.15,59.89c-4.82,0-9.24,1.58-12.02,4.16v-4.22v-0.01v-2.66\r\n                                                                                                                                        c2.08-3.13,6.76-5.13,12.02-5.13s9.93,2.01,12.02,5.13v2.66v0.01v4.22C52.39,61.46,47.97,59.89,43.15,59.89z M57.03,58.43v-1.55\r\n                                                                                                                                        v-0.02c0-0.02,0-0.04,0-0.06c0-0.01,0-0.03,0-0.04c0-0.02-0.01-0.03-0.01-0.05c0-0.02-0.01-0.03-0.01-0.04\r\n                                                                                                                                        c0-0.01-0.01-0.03-0.01-0.05c0-0.01-0.01-0.03-0.02-0.04c-0.01-0.02-0.01-0.03-0.01-0.04c-0.01-0.02-0.01-0.03-0.02-0.05\r\n                                                                                                                                        c-0.01-0.01-0.01-0.02-0.02-0.04c-0.01-0.01-0.02-0.03-0.03-0.05c0-0.01-0.01-0.02-0.01-0.02c-0.01-0.01-0.01-0.02-0.02-0.03\r\n                                                                                                                                        c0,0,0-0.01-0.01-0.01c-2.35-3.77-7.73-6.2-13.73-6.2s-11.37,2.43-13.73,6.2c0,0,0,0.01-0.01,0.01c-0.01,0.01-0.01,0.02-0.02,0.03\r\n                                                                                                                                        c0,0.01-0.01,0.01-0.01,0.02c-0.01,0.02-0.02,0.03-0.03,0.05c-0.01,0.01-0.01,0.02-0.02,0.04c-0.01,0.01-0.01,0.03-0.02,0.05\r\n                                                                                                                                        c-0.01,0.02-0.01,0.03-0.02,0.04c-0.01,0.01-0.01,0.03-0.01,0.05c0,0.01-0.01,0.03-0.01,0.05s-0.01,0.03-0.01,0.04\r\n                                                                                                                                        c0,0.02-0.01,0.03-0.01,0.05c0,0.01,0,0.03,0,0.04c0,0.02,0,0.04,0,0.06v0.02v1.55l-9.47-3.92l13.44-5.55c0,0,0.01,0,0.01-0.01\r\n                                                                                                                                        l9.92-4.1l23.37,9.65L57.03,58.43z M68.96,67.64l-0.99-1.52l0.99-1.52l0.99,1.52L68.96,67.64z M13.19,57.44\r\n                                                                                                                                        c-0.13,0.4-0.5,0.65-0.89,0.65c-0.1,0-0.2-0.01-0.29-0.05l-11.36-3.7C0.26,54.22,0,53.86,0,53.45V6.2c0-0.52,0.42-0.94,0.94-0.94\r\n                                                                                                                                        c0.52,0,0.94,0.42,0.94,0.94v46.57l10.72,3.49C13.08,56.42,13.35,56.95,13.19,57.44L13.19,57.44z M63.86,46.58V6.2\r\n                                                                                                                                        c0-0.52,0.42-0.94,0.94-0.94c0.52,0,0.94,0.42,0.94,0.94v40.37c0,0.52-0.42,0.94-0.94,0.94C64.28,47.51,63.86,47.09,63.86,46.58z\r\n                                                                                                                                            M10.3,11.46c0.16-0.49,0.68-0.77,1.17-0.61l14.45,4.6c0.49,0.16,0.77,0.68,0.61,1.17c-0.13,0.4-0.5,0.65-0.89,0.65\r\n                                                                                                                                        c-0.09,0-0.19-0.02-0.29-0.05l-14.45-4.59C10.41,12.48,10.14,11.95,10.3,11.46z M10.3,20.26c0.16-0.49,0.68-0.77,1.17-0.61\r\n                                                                                                                                        l14.45,4.6c0.49,0.16,0.77,0.68,0.61,1.17c-0.13,0.4-0.5,0.65-0.89,0.65c-0.09,0-0.19-0.01-0.29-0.05l-14.45-4.59\r\n                                                                                                                                        C10.41,21.28,10.14,20.76,10.3,20.26z M10.3,29.07c0.16-0.49,0.68-0.77,1.17-0.61l14.45,4.6c0.49,0.16,0.77,0.68,0.61,1.17\r\n                                                                                                                                        c-0.13,0.4-0.5,0.65-0.89,0.65c-0.09,0-0.19-0.02-0.29-0.05l-14.45-4.59C10.41,30.09,10.14,29.56,10.3,29.07z M10.3,37.87\r\n                                                                                                                                        c0.16-0.49,0.68-0.77,1.17-0.61l14.45,4.6c0.49,0.16,0.77,0.68,0.61,1.17c-0.13,0.4-0.5,0.65-0.89,0.65c-0.09,0-0.19-0.02-0.29-0.05\r\n                                                                                                                                        l-14.45-4.59C10.41,38.89,10.14,38.37,10.3,37.87z M54.82,12.64l-14.45,4.6c-0.09,0.03-0.19,0.05-0.29,0.05\r\n                                                                                                                                        c-0.4,0-0.77-0.26-0.89-0.65c-0.16-0.49,0.11-1.02,0.61-1.17l14.45-4.6c0.49-0.16,1.02,0.11,1.17,0.61\r\n                                                                                                                                        C55.59,11.95,55.32,12.48,54.82,12.64L54.82,12.64z M54.82,21.44l-14.45,4.6c-0.09,0.03-0.19,0.05-0.29,0.05\r\n                                                                                                                                        c-0.4,0-0.77-0.26-0.89-0.65c-0.16-0.49,0.11-1.02,0.61-1.17l14.45-4.6c0.49-0.16,1.02,0.11,1.17,0.61\r\n                                                                                                                                        C55.59,20.76,55.32,21.28,54.82,21.44L54.82,21.44z M55.43,29.07c0.16,0.49-0.11,1.02-0.61,1.17l-14.45,4.6\r\n                                                                                                                                        c-0.09,0.03-0.19,0.05-0.29,0.05c-0.4,0-0.77-0.26-0.89-0.65c-0.16-0.49,0.11-1.02,0.61-1.17l14.45-4.6\r\n                                                                                                                                        C54.75,28.3,55.27,28.58,55.43,29.07L55.43,29.07z\" />\r\n                                            </svg>', 'Australian universities are renowned for their high-quality education and academic standards. The country consistently ranks among the top destinations for academic excellence, offering a wide range of courses', '2025-02-05 00:14:43', '2025-02-05 00:43:57'),
(5, 'Global Recognition', '11', '<svg version=\"1.1\" id=\"svg-custom_2\" xmlns=\"http://www.w3.org/2000/svg\"\r\n                                                xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n                                                viewBox=\"0 0 72 72\" style=\"enable-background:new 0 0 72 72;\"\r\n                                                xml:space=\"preserve\">\r\n                                                <path\r\n                                                    d=\"M32.63,16.4c-3.52,0-6.38,2.86-6.38,6.38s2.86,6.38,6.38,6.38c3.52,0,6.38-2.86,6.38-6.38\r\n                                                                                                                                            C39.01,19.26,36.15,16.4,32.63,16.4z M32.63,27.29c-2.49,0-4.51-2.02-4.51-4.51s2.02-4.51,4.51-4.51c2.49,0,4.51,2.02,4.51,4.51\r\n                                                                                                                                            S35.12,27.29,32.63,27.29z M48.79,24.83c1.16-1.65,0.76-3.93-0.89-5.09c-1.65-1.16-3.93-0.76-5.09,0.89l-6.76,9.64h-6.84l-6.76-9.64\r\n                                                                                                                                            c-0.14-0.2-0.3-0.39-0.48-0.55l4.97-8.78c0.55,0.66,1.23,1.22,1.99,1.66c1.1,0.62,2.32,0.94,3.58,0.94c0.16,0,0.33-0.01,0.5-0.02\r\n                                                                                                                                            c1.05-0.07,2.1,0.16,3.02,0.69c0.92,0.52,1.67,1.3,2.15,2.24c0,0,0,0.01,0.01,0.01c0.02,0.03,0.04,0.06,0.06,0.09\r\n                                                                                                                                            c0.01,0.01,0.01,0.01,0.01,0.02c0.02,0.03,0.05,0.06,0.07,0.09l0,0c0.02,0.03,0.05,0.05,0.08,0.07c0.01,0.01,0.02,0.01,0.03,0.02\r\n                                                                                                                                            c0.02,0.02,0.04,0.03,0.07,0.05c0.01,0.01,0.02,0.01,0.03,0.02c0,0,0.01,0.01,0.01,0.01c0.02,0.01,0.03,0.01,0.05,0.02\r\n                                                                                                                                            c0.02,0.01,0.03,0.02,0.05,0.02c0.03,0.01,0.05,0.02,0.08,0.03c0.01,0,0.03,0.01,0.04,0.01c0.03,0.01,0.07,0.01,0.1,0.02\r\n                                                                                                                                            c0.01,0,0.01,0,0.02,0.01c0.04,0.01,0.08,0.01,0.12,0.01c0.04,0,0.08,0,0.12-0.01c0.01,0,0.02,0,0.03-0.01\r\n                                                                                                                                            c0.03-0.01,0.06-0.01,0.09-0.02c0.01,0,0.03-0.01,0.04-0.01c0.02-0.01,0.04-0.01,0.07-0.02c0.01-0.01,0.03-0.01,0.05-0.02\r\n                                                                                                                                            c0.01-0.01,0.03-0.01,0.04-0.02c0.01,0,0.01-0.01,0.02-0.01c0.01-0.01,0.02-0.01,0.03-0.02c0.02-0.01,0.04-0.03,0.07-0.04\r\n                                                                                                                                            c0.01-0.01,0.02-0.01,0.03-0.02c0.03-0.02,0.06-0.05,0.08-0.07c0,0,0.01-0.01,0.01-0.01c0.02-0.02,0.04-0.05,0.07-0.07\r\n                                                                                                                                            c0.01-0.01,0.01-0.01,0.02-0.02c0.02-0.03,0.04-0.06,0.06-0.09c0,0,0-0.01,0.01-0.01l0-0.01c0,0,0,0,0,0l4.84-8.55c0,0,0,0,0,0\r\n                                                                                                                                            c0.01-0.02,0.02-0.04,0.03-0.06c0-0.01,0.01-0.01,0.01-0.02c0.01-0.01,0.01-0.03,0.02-0.04c0.02-0.07,0.04-0.13,0.05-0.2\r\n                                                                                                                                            c0-0.01,0-0.01,0-0.01c0-0.02,0-0.04,0-0.06c0-0.01,0-0.02,0-0.04V7.79c0-0.02,0-0.04,0-0.05c0-0.01,0-0.01,0-0.02\r\n                                                                                                                                            c-0.01-0.07-0.02-0.14-0.04-0.21c0-0.01-0.01-0.02-0.01-0.04c0-0.01-0.01-0.02-0.01-0.03c-0.01-0.02-0.02-0.04-0.03-0.06\r\n                                                                                                                                            c0,0,0,0,0,0c-0.65-1.27-1.65-2.31-2.89-3.01c-1.24-0.7-2.65-1.02-4.07-0.93c-1.05,0.07-2.1-0.16-3.02-0.69\r\n                                                                                                                                            c-0.92-0.52-1.67-1.3-2.15-2.24c0-0.01-0.01-0.01-0.01-0.02c-0.01-0.02-0.02-0.04-0.03-0.06C32.5,0.42,32.5,0.41,32.49,0.4\r\n                                                                                                                                            c-0.01-0.01-0.02-0.03-0.03-0.04c-0.01-0.01-0.02-0.02-0.03-0.03c-0.01-0.01-0.02-0.02-0.03-0.04s-0.02-0.02-0.04-0.03\r\n                                                                                                                                            c-0.01-0.01-0.02-0.02-0.03-0.03c-0.01-0.01-0.03-0.02-0.04-0.04c-0.01-0.01-0.02-0.01-0.03-0.02c-0.02-0.01-0.04-0.02-0.05-0.04\r\n                                                                                                                                            c-0.01,0-0.01-0.01-0.02-0.01c0,0,0,0,0,0c-0.02-0.01-0.04-0.02-0.06-0.03c-0.01,0-0.01-0.01-0.02-0.01\r\n                                                                                                                                            c-0.02-0.01-0.03-0.01-0.05-0.02c-0.04-0.01-0.07-0.02-0.11-0.03c0,0-0.01,0-0.01,0c-0.02,0-0.04-0.01-0.05-0.01\r\n                                                                                                                                            C31.86,0.01,31.84,0,31.83,0c-0.01,0-0.03,0-0.04,0c-0.02,0.02-0.04,0.01-0.06,0.01h-0.02c-0.11,0-0.22,0.02-0.33,0.06h0\r\n                                                                                                                                            c-0.01,0.01-0.03,0.01-0.04,0.02c-0.01,0.01-0.03,0.01-0.05,0.02c0,0,0,0,0,0c-0.01,0.01-0.02,0.01-0.03,0.01\r\n                                                                                                                                            c-0.02,0.01-0.03,0.02-0.05,0.03c-0.01,0.01-0.02,0.01-0.03,0.02c-0.01,0.01-0.03,0.02-0.04,0.03c-0.01,0.01-0.02,0.02-0.04,0.03\r\n                                                                                                                                            c-0.01,0.01-0.02,0.02-0.03,0.03c-0.01,0.01-0.02,0.03-0.04,0.04c-0.01,0.01-0.02,0.02-0.03,0.03C31,0.35,30.98,0.37,30.97,0.39\r\n                                                                                                                                            c-0.01,0.01-0.01,0.01-0.02,0.02c-0.01,0.02-0.03,0.04-0.04,0.06c0,0.01-0.01,0.01-0.01,0.02l0,0.01l0,0l-4.84,8.56l-5.73,10.12\r\n                                                                                                                                            c-0.99-0.24-2.07-0.07-2.97,0.55c-1.65,1.16-2.05,3.44-0.89,5.09l0.37,0.53l-1.48,2.62c-0.25,0.45-0.1,1.02,0.35,1.27\r\n                                                                                                                                            c0.15,0.08,0.3,0.12,0.46,0.12c0.33,0,0.64-0.17,0.81-0.47l1.04-1.84l7.5,10.7v30.23c0,2.21,1.8,4.02,4.02,4.02\r\n                                                                                                                                            c1.24,0,2.34-0.56,3.08-1.44c0.73,0.88,1.84,1.44,3.08,1.44c2.21,0,4.02-1.8,4.02-4.02V37.75L48.79,24.83z M33.78,4.39\r\n                                                                                                                                            c1.1,0.62,2.32,0.94,3.58,0.94c0.16,0,0.33-0.01,0.5-0.02c1.05-0.07,2.1,0.16,3.02,0.69c0.78,0.44,1.43,1.06,1.9,1.81l-3.84,6.78\r\n                                                                                                                                            c-0.55-0.66-1.23-1.22-1.99-1.66c-1.24-0.7-2.65-1.02-4.07-0.93c-1.05,0.07-2.1-0.16-3.02-0.69c-0.78-0.44-1.43-1.06-1.9-1.81\r\n                                                                                                                                            l3.84-6.78C32.34,3.39,33.01,3.96,33.78,4.39L33.78,4.39z M37.85,67.98c0,1.18-0.96,2.14-2.14,2.14c-1.18,0-2.14-0.96-2.14-2.14\r\n                                                                                                                                            l0-14.6c0-0.52-0.42-0.94-0.94-0.94c-0.52,0-0.94,0.42-0.94,0.94v14.6c0,1.18-0.96,2.14-2.14,2.14c-1.18,0-2.14-0.96-2.14-2.14\r\n                                                                                                                                            V37.45v-0.01c0-0.02,0-0.04,0-0.06c0-0.01,0-0.02,0-0.03c0-0.02-0.01-0.04-0.01-0.06c0-0.01,0-0.02-0.01-0.03\r\n                                                                                                                                            c0-0.01-0.01-0.03-0.01-0.05c0-0.01-0.01-0.03-0.01-0.04c0-0.01-0.01-0.02-0.01-0.04c-0.01-0.02-0.01-0.03-0.02-0.05\r\n                                                                                                                                            c0-0.01-0.01-0.02-0.01-0.03c-0.01-0.02-0.02-0.04-0.03-0.06c-0.01-0.01-0.01-0.02-0.01-0.02c-0.01-0.02-0.02-0.04-0.03-0.05\r\n                                                                                                                                            c0,0,0,0,0-0.01L18,23.75c-0.56-0.81-0.37-1.92,0.44-2.49c0.81-0.56,1.92-0.37,2.49,0.44l7.04,10.04c0.01,0.01,0.01,0.01,0.02,0.02\r\n                                                                                                                                            c0.01,0.01,0.02,0.03,0.03,0.04c0.01,0.01,0.02,0.02,0.03,0.03c0.01,0.01,0.02,0.02,0.03,0.03c0.01,0.01,0.02,0.02,0.04,0.03\r\n                                                                                                                                            c0.01,0.01,0.02,0.02,0.03,0.03c0.01,0.01,0.03,0.02,0.04,0.03c0.01,0.01,0.02,0.01,0.03,0.02s0.03,0.01,0.04,0.02\r\n                                                                                                                                            c0.01,0.01,0.03,0.01,0.04,0.02c0.01,0.01,0.02,0.01,0.04,0.02c0.01,0.01,0.03,0.01,0.05,0.02c0.01,0,0.02,0.01,0.03,0.01\r\n                                                                                                                                            c0.02,0.01,0.04,0.01,0.05,0.02c0.01,0,0.02,0.01,0.03,0.01c0.02,0.01,0.04,0.01,0.05,0.01c0.01,0,0.02,0,0.04,0.01\r\n                                                                                                                                            c0.02,0,0.03,0.01,0.05,0.01c0.01,0,0.03,0,0.05,0c0.01,0,0.02,0,0.03,0h7.81c0.01,0,0.02,0,0.03,0c0.02,0,0.03,0,0.05,0\r\n                                                                                                                                            c0.02,0,0.03,0,0.05-0.01s0.03,0,0.04-0.01c0.02,0,0.04-0.01,0.05-0.01c0.01,0,0.02-0.01,0.03-0.01c0.02-0.01,0.04-0.01,0.05-0.02\r\n                                                                                                                                            c0.01,0,0.02-0.01,0.03-0.01c0.01-0.01,0.03-0.01,0.05-0.02c0.01-0.01,0.02-0.01,0.04-0.02c0.01-0.01,0.03-0.01,0.04-0.02\r\n                                                                                                                                            c0.01-0.01,0.03-0.01,0.04-0.02c0.01-0.01,0.02-0.01,0.03-0.02c0.01-0.01,0.03-0.02,0.04-0.03c0.01-0.01,0.02-0.02,0.03-0.03\r\n                                                                                                                                            c0.01-0.01,0.02-0.02,0.04-0.03c0.01-0.01,0.02-0.02,0.03-0.03c0.01-0.01,0.02-0.02,0.03-0.03c0.01-0.01,0.02-0.03,0.03-0.04\r\n                                                                                                                                            c0.01-0.01,0.01-0.01,0.02-0.02l7.04-10.04c0.56-0.81,1.68-1,2.49-0.44c0.81,0.56,1,1.68,0.44,2.49l-9.23,13.17c0,0,0,0,0,0.01\r\n                                                                                                                                            c-0.01,0.02-0.02,0.04-0.03,0.05C37.98,36.99,37.98,37,37.97,37c-0.01,0.02-0.02,0.04-0.03,0.06c0,0.01-0.01,0.02-0.01,0.03\r\n                                                                                                                                            c-0.01,0.02-0.01,0.03-0.02,0.05c0,0.01-0.01,0.02-0.01,0.04c0,0.01-0.01,0.03-0.01,0.04c0,0.01-0.01,0.03-0.01,0.05\r\n                                                                                                                                            c0,0.01,0,0.02-0.01,0.03c0,0.02-0.01,0.04-0.01,0.06c0,0.01,0,0.02,0,0.03c0,0.02,0,0.04,0,0.06v0.01v15.93L37.85,67.98z\r\n                                                                                                                                            M13.99,37.91l-2.98-0.38L9.72,34.8c-0.15-0.33-0.48-0.54-0.85-0.54c-0.36,0-0.69,0.21-0.85,0.54l-1.28,2.72l-2.98,0.38\r\n                                                                                                                                            C3.4,37.95,3.1,38.2,2.99,38.55c-0.11,0.34-0.01,0.72,0.25,0.97l2.19,2.06l-0.56,2.96c-0.07,0.35,0.07,0.72,0.37,0.93\r\n                                                                                                                                            c0.16,0.12,0.36,0.18,0.55,0.18c0.15,0,0.31-0.04,0.45-0.11l2.64-1.45l2.64,1.45c0.32,0.17,0.7,0.15,1-0.06\r\n                                                                                                                                            c0.29-0.21,0.44-0.58,0.37-0.93l-0.56-2.96l2.19-2.06c0.26-0.25,0.36-0.63,0.25-0.97C14.65,38.2,14.35,37.95,13.99,37.91\r\n                                                                                                                                            L13.99,37.91z M10.67,40.57c-0.23,0.22-0.34,0.54-0.28,0.85l0.29,1.51L9.33,42.2c-0.14-0.08-0.29-0.11-0.45-0.11\r\n                                                                                                                                            c-0.15,0-0.31,0.04-0.45,0.11l-1.35,0.74l0.29-1.51c0.06-0.31-0.04-0.64-0.28-0.85l-1.12-1.06l1.53-0.19\r\n                                                                                                                                            c0.32-0.04,0.59-0.24,0.73-0.53l0.66-1.39l0.66,1.39c0.13,0.29,0.41,0.49,0.73,0.53l1.53,0.19L10.67,40.57z M7.25,11.25l-0.56,2.96\r\n                                                                                                                                            c-0.07,0.35,0.07,0.72,0.37,0.93c0.16,0.12,0.36,0.18,0.55,0.18c0.15,0,0.31-0.04,0.45-0.11l2.64-1.45l2.64,1.45\r\n                                                                                                                                            c0.32,0.17,0.7,0.15,1-0.06c0.29-0.21,0.44-0.58,0.37-0.93l-0.56-2.96l2.19-2.06c0.26-0.25,0.36-0.63,0.25-0.97\r\n                                                                                                                                            c-0.11-0.34-0.41-0.59-0.77-0.64L12.83,7.2l-1.28-2.72c-0.15-0.33-0.48-0.54-0.85-0.54c-0.36,0-0.69,0.21-0.85,0.54L8.57,7.2\r\n                                                                                                                                            L5.59,7.59C5.23,7.63,4.93,7.88,4.82,8.22C4.7,8.57,4.8,8.95,5.06,9.19L7.25,11.25z M9.31,8.99c0.32-0.04,0.59-0.24,0.73-0.53\r\n                                                                                                                                            l0.66-1.39l0.66,1.39c0.13,0.29,0.41,0.49,0.73,0.53l1.53,0.19l-1.12,1.06c-0.23,0.22-0.34,0.54-0.28,0.85l0.29,1.51l-1.35-0.74\r\n                                                                                                                                            c-0.28-0.15-0.62-0.15-0.9,0L8.9,12.61l0.29-1.51c0.06-0.31-0.04-0.64-0.28-0.85L7.79,9.19L9.31,8.99z M57.72,16.23l-0.56-2.96\r\n                                                                                                                                            l2.19-2.06c0.26-0.25,0.36-0.63,0.25-0.97c-0.11-0.34-0.41-0.59-0.77-0.64l-2.98-0.38L54.56,6.5c-0.15-0.33-0.48-0.54-0.85-0.54\r\n                                                                                                                                            c-0.36,0-0.69,0.21-0.85,0.54l-1.28,2.72L48.6,9.6c-0.36,0.04-0.66,0.29-0.77,0.64c-0.11,0.34-0.01,0.72,0.25,0.97l2.19,2.06\r\n                                                                                                                                            l-0.56,2.96c-0.07,0.35,0.07,0.72,0.37,0.93c0.29,0.21,0.68,0.24,1,0.06l2.64-1.45l2.64,1.45c0.14,0.08,0.29,0.11,0.45,0.11\r\n                                                                                                                                            c0.19,0,0.39-0.06,0.55-0.18C57.64,16.95,57.78,16.58,57.72,16.23z M55.5,12.26c-0.23,0.22-0.34,0.54-0.28,0.85l0.29,1.51\r\n                                                                                                                                            l-1.35-0.74c-0.14-0.08-0.29-0.11-0.45-0.11c-0.16,0-0.31,0.04-0.45,0.11l-1.35,0.74l0.29-1.51c0.06-0.31-0.04-0.64-0.28-0.85\r\n                                                                                                                                            L50.8,11.2l1.53-0.19c0.32-0.04,0.59-0.24,0.73-0.53l0.66-1.39l0.66,1.39c0.13,0.29,0.41,0.49,0.73,0.53l1.53,0.19L55.5,12.26z\r\n                                                                                                                                            M69.01,32.92c-0.11-0.34-0.41-0.59-0.77-0.64l-2.98-0.38l-1.28-2.72c-0.15-0.33-0.48-0.54-0.85-0.54s-0.69,0.21-0.85,0.54\r\n                                                                                                                                            l-1.28,2.72l-2.98,0.38c-0.36,0.04-0.66,0.29-0.77,0.64c-0.11,0.34-0.01,0.72,0.25,0.97l2.19,2.06l-0.56,2.96\r\n                                                                                                                                            c-0.07,0.35,0.07,0.72,0.37,0.93c0.16,0.12,0.36,0.18,0.55,0.18c0.15,0,0.31-0.04,0.45-0.11l2.64-1.45l2.64,1.45\r\n                                                                                                                                            c0.32,0.17,0.7,0.15,1-0.06c0.29-0.21,0.44-0.58,0.37-0.93l-0.56-2.96l2.19-2.06C69.02,33.64,69.12,33.26,69.01,32.92z M64.91,34.94\r\n                                                                                                                                            c-0.23,0.22-0.34,0.54-0.28,0.85l0.29,1.51l-1.35-0.74c-0.28-0.15-0.62-0.15-0.9,0l-1.35,0.74l0.29-1.51\r\n                                                                                                                                            c0.06-0.31-0.04-0.64-0.28-0.85l-1.12-1.06l1.53-0.19c0.32-0.04,0.59-0.24,0.73-0.53l0.66-1.39l0.66,1.39\r\n                                                                                                                                            c0.13,0.29,0.41,0.49,0.73,0.53l1.53,0.19L64.91,34.94z M54.12,43.54l-2.98-0.38l-1.28-2.72c-0.15-0.33-0.48-0.54-0.85-0.54\r\n                                                                                                                                            c-0.36,0-0.69,0.21-0.85,0.54l-1.28,2.72l-2.98,0.38c-0.36,0.04-0.66,0.29-0.77,0.64c-0.11,0.34-0.01,0.72,0.25,0.97l2.19,2.06\r\n                                                                                                                                            l-0.56,2.96c-0.07,0.35,0.07,0.72,0.37,0.93c0.16,0.12,0.36,0.18,0.55,0.18c0.15,0,0.31-0.04,0.45-0.11l2.64-1.45l2.64,1.45\r\n                                                                                                                                            c0.32,0.17,0.7,0.15,1-0.06s0.44-0.58,0.37-0.93l-0.56-2.96l2.19-2.06c0.26-0.25,0.36-0.63,0.25-0.97\r\n                                                                                                                                            C54.78,43.83,54.48,43.58,54.12,43.54L54.12,43.54z M50.8,46.2c-0.23,0.22-0.34,0.54-0.28,0.85l0.29,1.51l-1.35-0.74\r\n                                                                                                                                            c-0.14-0.08-0.29-0.11-0.45-0.11s-0.31,0.04-0.45,0.11l-1.35,0.74l0.29-1.51c0.06-0.31-0.04-0.64-0.28-0.85l-1.12-1.06l1.53-0.19\r\n                                                                                                                                            c0.32-0.04,0.59-0.24,0.73-0.53l0.66-1.39l0.66,1.39c0.13,0.29,0.41,0.49,0.73,0.53l1.53,0.19L50.8,46.2z\" />\r\n                                            </svg>', 'Australia is a multicultural country that welcomes students from all around the world. Studying in Australia provides an opportunity to experience a rich cultural mix and develop a global perspective', '2025-02-05 00:22:57', '2025-02-05 00:45:29'),
(6, 'Cultural Diversity', '11', '<svg version=\"1.1\" id=\"svg-custom_3\" xmlns=\"http://www.w3.org/2000/svg\"\r\n                                                xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n                                                viewBox=\"0 0 72 72\" style=\"enable-background:new 0 0 72 72;\"\r\n                                                xml:space=\"preserve\">\r\n                                                <path\r\n                                                    d=\"M68.83,0.31H3.17C1.42,0.31,0,1.73,0,3.48v33.93c0,1.75,1.42,3.17,3.17,3.17h40.59v3.44c0,0.52,0.42,0.94,0.94,0.94h14.96\r\n                                                                                                                                            c2.77,0,5.11-1.85,5.86-4.37h3.33c1.75,0,3.17-1.42,3.17-3.17V3.48C72,1.73,70.58,0.31,68.83,0.31L68.83,0.31z M63.89,38.84\r\n                                                                                                                                            c0,2.09-1.52,3.83-3.51,4.18l0-12.5c0-0.52-0.42-0.94-0.94-0.94c-0.52,0-0.94,0.42-0.94,0.94v12.57l-12.88,0V25.24\r\n                                                                                                                                            c0-0.52-0.42-0.94-0.94-0.94H27.47c0.35-1.99,2.09-3.51,4.18-3.51h25.9c3.5,0,6.34,2.84,6.34,6.34L63.89,38.84z M70.13,37.41\r\n                                                                                                                                            c0,0.72-0.58,1.3-1.3,1.3l-3.07,0V27.14c0-4.53-3.68-8.21-8.21-8.21h-25.9c-3.37,0-6.11,2.74-6.11,6.11v0.2\r\n                                                                                                                                            c0,0.52,0.42,0.94,0.94,0.94h17.28v12.53H3.17c-0.72,0-1.3-0.58-1.3-1.3V3.48c0-0.72,0.58-1.3,1.3-1.3h65.66\r\n                                                                                                                                            c0.72,0,1.3,0.58,1.3,1.3L70.13,37.41z M52.07,4.14c-3.89,0-7.05,3.17-7.05,7.05c0,3.89,3.17,7.05,7.05,7.05\r\n                                                                                                                                            c3.89,0,7.05-3.17,7.05-7.05S55.96,4.14,52.07,4.14z M52.07,16.38c-2.86,0-5.18-2.32-5.18-5.18s2.32-5.18,5.18-5.18\r\n                                                                                                                                            c2.86,0,5.18,2.32,5.18,5.18C57.25,14.05,54.93,16.38,52.07,16.38z M15.19,58.16c1.81-1.24,3.01-3.32,3.01-5.68\r\n                                                                                                                                            c0-3.79-3.08-6.87-6.87-6.87s-6.87,3.08-6.87,6.87c0,2.35,1.19,4.44,3.01,5.68C3.12,59.74,0,63.91,0,68.81v1.95\r\n                                                                                                                                            c0,0.52,0.42,0.94,0.94,0.94h20.79c0.52,0,0.94-0.42,0.94-0.94v-1.95C22.66,63.91,19.54,59.74,15.19,58.16L15.19,58.16z M6.33,52.48\r\n                                                                                                                                            c0-2.75,2.24-5,5-5c2.75,0,5,2.24,5,5c0,2.75-2.24,5-5,5C8.57,57.48,6.33,55.24,6.33,52.48z M20.79,69.82H1.87v-1.01\r\n                                                                                                                                            c0-5.21,4.24-9.46,9.46-9.46c5.21,0,9.46,4.24,9.46,9.46L20.79,69.82z M39.86,58.16c1.81-1.24,3.01-3.32,3.01-5.68\r\n                                                                                                                                            c0-3.79-3.08-6.87-6.87-6.87c-3.79,0-6.87,3.08-6.87,6.87c0,2.35,1.19,4.44,3.01,5.68c-4.35,1.58-7.47,5.76-7.47,10.65v1.94v0\r\n                                                                                                                                            c0,0.52,0.42,0.94,0.94,0.94h20.79c0.52,0,0.94-0.42,0.94-0.94v-1.95C47.33,63.91,44.21,59.74,39.86,58.16L39.86,58.16z M31,52.48\r\n                                                                                                                                            c0-2.75,2.24-5,5-5c2.75,0,5,2.24,5,5c0,2.75-2.24,5-5,5C33.24,57.48,31,55.24,31,52.48z M45.46,69.82H26.54v-1.01\r\n                                                                                                                                            c0-5.21,4.24-9.46,9.46-9.46c5.21,0,9.46,4.24,9.46,9.46L45.46,69.82z M64.53,58.16c1.81-1.24,3.01-3.32,3.01-5.68\r\n                                                                                                                                            c0-3.79-3.08-6.87-6.87-6.87c-3.79,0-6.87,3.08-6.87,6.87c0,2.35,1.19,4.44,3.01,5.68c-4.35,1.58-7.47,5.76-7.47,10.65v1.94v0\r\n                                                                                                                                            c0,0.52,0.42,0.94,0.94,0.94h20.79c0.52,0,0.94-0.42,0.94-0.94v-1.95C72,63.91,68.88,59.74,64.53,58.16L64.53,58.16z M55.67,52.48\r\n                                                                                                                                            c0-2.75,2.24-5,5-5c2.75,0,5,2.24,5,5c0,2.75-2.24,5-5,5C57.91,57.47,55.67,55.24,55.67,52.48z M70.13,69.82H51.21v-1.01\r\n                                                                                                                                            c0-5.21,4.24-9.46,9.46-9.46c5.21,0,9.46,4.24,9.46,9.46L70.13,69.82z\" />\r\n                                            </svg>', 'Australia is a multicultural country that welcomes students from all around the world. Studying in Australia provides an opportunity to experience a rich cultural mix and develop a global perspective', '2025-02-05 00:36:17', '2025-02-05 00:45:19');
INSERT INTO `destination_reasons` (`id`, `title`, `destination_id`, `image`, `description`, `created_at`, `updated_at`) VALUES
(7, 'Research Opportunities', '11', '<svg version=\"1.1\" id=\"svg-custom_4\" xmlns=\"http://www.w3.org/2000/svg\"\r\n                                                xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n                                                viewBox=\"0 0 72 72\" style=\"enable-background:new 0 0 72 72;\"\r\n                                                xml:space=\"preserve\">\r\n                                                <path\r\n                                                    d=\"M59.05,42.9v20.37c0,0.52-0.42,0.94-0.94,0.94c-0.52,0-0.94-0.42-0.94-0.94l0-20.37c0-0.52,0.42-0.94,0.94-0.94\r\n                                                                                                                                   C58.64,41.96,59.05,42.38,59.05,42.9L59.05,42.9z M25.15,65.67H12.21l-2.13-13.84c-0.07-0.46-0.46-0.79-0.92-0.79l-6.42,0\r\n                                                                                                                                   c-0.31,0-0.57-0.14-0.73-0.41c-0.16-0.27-0.16-0.56-0.01-0.84l7.58-13.95c0-0.01,0.01-0.01,0.01-0.02c0.01-0.01,0.01-0.03,0.02-0.04\r\n                                                                                                                                   c0.01-0.01,0.01-0.03,0.02-0.04c0.01-0.01,0.01-0.03,0.01-0.04c0.01-0.01,0.01-0.03,0.01-0.04c0-0.01,0.01-0.03,0.01-0.04\r\n                                                                                                                                   c0-0.01,0.01-0.03,0.01-0.04s0.01-0.03,0.01-0.04c0-0.01,0-0.03,0.01-0.04s0-0.03,0-0.04v-0.04c0-0.01,0-0.03,0-0.05s0-0.03,0-0.04\r\n                                                                                                                                   c0-0.01,0-0.03-0.01-0.05c0-0.01-0.01-0.03-0.01-0.04c0-0.01-0.01-0.03-0.01-0.04c0-0.01-0.01-0.03-0.01-0.05\r\n                                                                                                                                   c0-0.01,0-0.01-0.01-0.02c-0.88-2.55-1.32-5.23-1.32-7.95C8.3,13.67,19.27,2.7,32.74,2.7c2.73,0,5.41,0.45,7.97,1.33\r\n                                                                                                                                   c0.49,0.17,1.02-0.09,1.19-0.58s-0.09-1.02-0.58-1.19c-2.75-0.95-5.64-1.43-8.58-1.43c-14.51,0-26.31,11.8-26.31,26.31\r\n                                                                                                                                   c0,2.79,0.43,5.54,1.29,8.17L0.34,48.9c-0.47,0.86-0.45,1.84,0.05,2.68c0.5,0.84,1.35,1.33,2.33,1.33h5.62l2.13,13.84\r\n                                                                                                                                   c0,0,0,0.01,0,0.01c0.01,0.05,0.02,0.1,0.04,0.15c0,0.01,0.01,0.01,0.01,0.02c0.02,0.04,0.04,0.09,0.06,0.13\r\n                                                                                                                                   c0,0.01,0.01,0.01,0.01,0.02c0.02,0.04,0.05,0.08,0.08,0.12c0,0,0,0,0.01,0.01c0.03,0.04,0.07,0.07,0.1,0.1c0,0,0.01,0.01,0.01,0.01\r\n                                                                                                                                   c0.04,0.03,0.08,0.06,0.12,0.08c0.01,0,0.01,0.01,0.02,0.01c0.04,0.02,0.08,0.04,0.13,0.06c0.01,0,0.01,0.01,0.02,0.01\r\n                                                                                                                                   c0.04,0.01,0.09,0.03,0.14,0.04c0.01,0,0.01,0,0.02,0c0.05,0.01,0.1,0.01,0.15,0.01h0.01h0h12.81v2.67c0,0.52,0.42,0.94,0.94,0.94\r\n                                                                                                                                   c0.52,0,0.94-0.42,0.94-0.94v-3.6C26.09,66.09,25.67,65.67,25.15,65.67L25.15,65.67z M64.75,23.09c0,5.67-2.75,10.98-7.36,14.27\r\n                                                                                                                                   l-1.96,3.66c0.29,0.44,0.46,0.96,0.46,1.53v0.72c0,1-0.54,1.88-1.35,2.36c0.2,0.38,0.31,0.81,0.31,1.27v0.72\r\n                                                                                                                                   c0,1.27-0.86,2.33-2.03,2.65c-0.67,2.45-2.92,4.26-5.59,4.26c-2.66,0-4.91-1.81-5.59-4.26c-1.17-0.31-2.03-1.38-2.03-2.65v-0.72\r\n                                                                                                                                   c0-0.46,0.11-0.88,0.31-1.27c-0.8-0.48-1.35-1.36-1.35-2.36v-0.72c0-0.56,0.17-1.09,0.46-1.53l-1.96-3.66\r\n                                                                                                                                   c-4.61-3.29-7.36-8.6-7.36-14.27c0-9.65,7.85-17.51,17.51-17.51C56.9,5.58,64.76,13.43,64.75,23.09L64.75,23.09z M53.15,41.66h-11.8\r\n                                                                                                                                   c-0.48,0-0.88,0.39-0.88,0.88v0.72c0,0.48,0.39,0.88,0.88,0.88h11.81c0.48,0,0.88-0.39,0.88-0.88l0-0.72\r\n                                                                                                                                   C54.03,42.06,53.63,41.66,53.15,41.66L53.15,41.66z M52.11,46.01h-9.74c-0.48,0-0.88,0.39-0.88,0.88v0.72\r\n                                                                                                                                   c0,0.48,0.39,0.88,0.88,0.88h9.74c0.48,0,0.88-0.39,0.88-0.88v-0.72C52.99,46.4,52.6,46.01,52.11,46.01z M50.81,50.35h-7.13\r\n                                                                                                                                   c0.62,1.35,1.99,2.29,3.57,2.29C48.83,52.64,50.19,51.7,50.81,50.35L50.81,50.35z M62.89,23.09c0-8.62-7.02-15.64-15.64-15.64\r\n                                                                                                                                   c-8.62,0-15.64,7.02-15.64,15.64c0,5.13,2.52,9.94,6.74,12.86c0.12,0.08,0.22,0.19,0.29,0.33l1.94,3.63\r\n                                                                                                                                   c0.24-0.07,0.49-0.11,0.76-0.11h11.81c0.26,0,0.52,0.04,0.76,0.11l1.94-3.63c0.07-0.13,0.17-0.24,0.29-0.33\r\n                                                                                                                                   C60.37,33.02,62.89,28.22,62.89,23.09L62.89,23.09z M63.43,5.58l-2.28,2.28c-0.37,0.37-0.37,0.96,0,1.32\r\n                                                                                                                                   c0.18,0.18,0.42,0.27,0.66,0.27c0.24,0,0.48-0.09,0.66-0.27l2.28-2.28c0.37-0.37,0.37-0.96,0-1.32C64.38,5.22,63.79,5.22,63.43,5.58\r\n                                                                                                                                   L63.43,5.58z M71.06,22.15h-3.22c-0.52,0-0.94,0.42-0.94,0.94c0,0.52,0.42,0.94,0.94,0.94h3.22c0.52,0,0.94-0.42,0.94-0.94\r\n                                                                                                                                   C72,22.57,71.58,22.15,71.06,22.15z M62.47,36.99c-0.37-0.37-0.96-0.37-1.32,0c-0.37,0.37-0.37,0.96,0,1.32l2.28,2.28\r\n                                                                                                                                   c0.18,0.18,0.42,0.27,0.66,0.27c0.24,0,0.48-0.09,0.66-0.27c0.37-0.37,0.37-0.96,0-1.32L62.47,36.99z M32.02,36.99l-2.28,2.28\r\n                                                                                                                                   c-0.37,0.37-0.37,0.96,0,1.32c0.18,0.18,0.42,0.27,0.66,0.27c0.24,0,0.48-0.09,0.66-0.27l2.28-2.28c0.37-0.37,0.37-0.96,0-1.32\r\n                                                                                                                                   C32.98,36.62,32.39,36.62,32.02,36.99L32.02,36.99z M26.65,22.15h-3.22c-0.52,0-0.94,0.42-0.94,0.94c0,0.52,0.42,0.94,0.94,0.94\r\n                                                                                                                                   h3.22c0.52,0,0.94-0.42,0.94-0.94C27.59,22.57,27.17,22.15,26.65,22.15z M29.74,5.58c-0.37,0.37-0.37,0.96,0,1.32l2.28,2.28\r\n                                                                                                                                   c0.18,0.18,0.42,0.27,0.66,0.27c0.24,0,0.48-0.09,0.66-0.27c0.37-0.37,0.37-0.96,0-1.32l-2.28-2.28C30.7,5.22,30.11,5.22,29.74,5.58\r\n                                                                                                                                   L29.74,5.58z M53.6,16.96c0.12,0.16,0.19,0.35,0.19,0.56v16.94c0,1.61-1.31,2.92-2.92,2.92h-7.25c-1.61,0-2.92-1.31-2.92-2.92\r\n                                                                                                                                   l0-16.93c0-0.21,0.07-0.4,0.19-0.56l5.61-7.51c0.18-0.24,0.45-0.37,0.75-0.37c0.29,0,0.57,0.14,0.75,0.37L53.6,16.96L53.6,16.96z\r\n                                                                                                                                    M43.5,16.58h7.49l-3.74-5.02L43.5,16.58z M51.92,18.45h-1.27v12.5h1.27V18.45z M43.84,30.95v-12.5h-1.27v12.5H43.84z M45.71,30.95\r\n                                                                                                                                   h3.08v-12.5h-3.08L45.71,30.95z M51.92,34.45v-1.63h-9.35v1.63c0,0.58,0.47,1.05,1.05,1.05h7.25\r\n                                                                                                                                   C51.45,35.51,51.92,35.03,51.92,34.45L51.92,34.45z\" />\r\n                                            </svg>', 'Australian universities are ahead in cutting-edge research and innovation. Students have access to the best facilities and opportunities to collaborate with leading researchers in their field of interest', '2025-02-05 00:46:02', '2025-02-05 00:46:02'),
(8, 'Vibrant Lifestyle', '11', '<svg version=\"1.1\" id=\"svg-custom_5\" xmlns=\"http://www.w3.org/2000/svg\"\r\n                                                xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n                                                viewBox=\"0 0 72 72\" style=\"enable-background:new 0 0 72 72;\"\r\n                                                xml:space=\"preserve\">\r\n                                                <path\r\n                                                    d=\"M50.53,42.47c-0.43-0.29-1.01-0.17-1.3,0.25c-1.5,2.23-3.38,4.13-5.59,5.66c-0.12,0.08-0.22,0.19-0.29,0.33l-2.74,5.12\r\n                                                                                                                                   c-0.37-0.14-0.76-0.21-1.18-0.21l-15.89,0c-0.41,0-0.81,0.07-1.18,0.21l-2.74-5.12c-0.07-0.13-0.17-0.24-0.29-0.33\r\n                                                                                                                                   c-5.77-4-9.22-10.57-9.22-17.58c0-11.79,9.59-21.38,21.38-21.38c7.23,0,13.92,3.61,17.89,9.67c0.28,0.43,0.86,0.55,1.29,0.27\r\n                                                                                                                                   c0.43-0.28,0.55-0.86,0.27-1.29C46.62,11.49,39.35,7.57,31.49,7.57c-12.82,0-23.24,10.43-23.24,23.24c0,7.55,3.67,14.63,9.83,18.99\r\n                                                                                                                                   l2.77,5.17c-0.43,0.57-0.68,1.27-0.68,2.03v0.96c0,1.34,0.79,2.51,1.93,3.05c-0.34,0.53-0.54,1.16-0.54,1.83v0.96\r\n                                                                                                                                   c0,1.86,1.51,3.37,3.37,3.37h1.03c0.44,2.65,2.75,4.67,5.52,4.67c2.77,0,5.08-2.02,5.53-4.67h1.03c1.86,0,3.37-1.51,3.37-3.37v-0.96\r\n                                                                                                                                   c0-0.67-0.2-1.3-0.54-1.83c1.14-0.54,1.93-1.7,1.93-3.05v-0.96c0-0.76-0.25-1.46-0.68-2.03l2.77-5.17c2.32-1.64,4.3-3.67,5.89-6.03\r\n                                                                                                                                   C51.07,43.34,50.95,42.76,50.53,42.47L50.53,42.47z M31.48,69.98c-1.74,0-3.2-1.19-3.62-2.81h7.24\r\n                                                                                                                                   C34.69,68.79,33.22,69.98,31.48,69.98L31.48,69.98z M39.54,63.8c0,0.83-0.68,1.51-1.51,1.51H24.93c-0.83,0-1.51-0.68-1.51-1.51\r\n                                                                                                                                   v-0.96c0-0.83,0.68-1.51,1.51-1.51l13.11,0c0.83,0,1.51,0.68,1.51,1.51L39.54,63.8z M40.94,57.96c0,0.83-0.68,1.51-1.51,1.51H23.54\r\n                                                                                                                                   c-0.83,0-1.51-0.68-1.51-1.51V57c0-0.83,0.68-1.51,1.51-1.51h15.89c0.83,0,1.51,0.68,1.51,1.51V57.96z M30.55,5.24V0.93\r\n                                                                                                                                   c0-0.52,0.42-0.93,0.93-0.93s0.93,0.42,0.93,0.93v4.31c0,0.51-0.42,0.93-0.93,0.93C30.97,6.17,30.55,5.76,30.55,5.24z M48.9,13.39\r\n                                                                                                                                   c-0.37-0.37-0.37-0.95,0-1.32l3.05-3.05c0.37-0.37,0.95-0.37,1.32,0c0.37,0.37,0.37,0.95,0,1.32l-3.05,3.05\r\n                                                                                                                                   c-0.18,0.18-0.42,0.27-0.66,0.27C49.32,13.66,49.08,13.57,48.9,13.39L48.9,13.39z M53.27,51.27c0.37,0.37,0.37,0.95,0,1.32\r\n                                                                                                                                   c-0.18,0.18-0.42,0.27-0.66,0.27c-0.24,0-0.48-0.09-0.66-0.27l-3.05-3.05c-0.37-0.37-0.37-0.95,0-1.32c0.37-0.37,0.95-0.37,1.32,0\r\n                                                                                                                                   L53.27,51.27z M14.07,48.22c0.37,0.37,0.37,0.95,0,1.32l-3.05,3.05c-0.18,0.18-0.42,0.27-0.66,0.27c-0.24,0-0.48-0.09-0.66-0.27\r\n                                                                                                                                   c-0.37-0.37-0.37-0.95,0-1.32l3.05-3.05C13.11,47.86,13.7,47.86,14.07,48.22L14.07,48.22z M6.85,30.81c0,0.51-0.42,0.93-0.93,0.93\r\n                                                                                                                                   h-4.3c-0.51,0-0.93-0.42-0.93-0.93c0-0.51,0.42-0.93,0.93-0.93h4.31C6.43,29.87,6.85,30.29,6.85,30.81L6.85,30.81z M9.7,10.34\r\n                                                                                                                                   c-0.37-0.37-0.37-0.95,0-1.32c0.37-0.37,0.95-0.37,1.32,0l3.05,3.05c0.37,0.37,0.37,0.95,0,1.32c-0.18,0.18-0.42,0.27-0.66,0.27\r\n                                                                                                                                   c-0.24,0-0.48-0.09-0.66-0.27L9.7,10.34z M66.39,38.32c-2.4,0-4.4,1.72-4.84,4h-6.06l-4.9-4.9c-0.17-0.17-0.41-0.27-0.66-0.27h-5.42\r\n                                                                                                                                   c0.37-0.76,0.67-1.55,0.9-2.36l2.64-0.67c0.41-0.1,0.7-0.48,0.7-0.9v-1.47h7.85c0.44,2.36,2.51,4.16,5,4.16\r\n                                                                                                                                   c2.81,0,5.09-2.28,5.09-5.09c0-2.81-2.28-5.09-5.09-5.09c-2.49,0-4.56,1.79-5,4.16h-7.85v-1.47c0-0.43-0.29-0.8-0.7-0.9l-2.64-0.67\r\n                                                                                                                                   c-0.21-0.74-0.48-1.45-0.8-2.14h5.18c0.25,0,0.48-0.1,0.66-0.27l4.9-4.9h6.06c0.44,2.28,2.44,4,4.84,4c2.72,0,4.93-2.21,4.93-4.93\r\n                                                                                                                                   c0-2.72-2.21-4.93-4.93-4.93c-2.4,0-4.4,1.72-4.84,4h-6.45c-0.25,0-0.48,0.1-0.66,0.27l-4.9,4.9H44.7l0.83-1.4\r\n                                                                                                                                   c0.22-0.37,0.16-0.84-0.14-1.14L42,16.9c-0.3-0.3-0.77-0.36-1.14-0.14l-2.34,1.39c-0.97-0.54-2-0.97-3.07-1.27l-0.67-2.64\r\n                                                                                                                                   c-0.1-0.41-0.48-0.7-0.9-0.7h-4.8c-0.43,0-0.8,0.29-0.9,0.7l-0.67,2.64c-1.07,0.31-2.1,0.73-3.07,1.27l-2.34-1.39\r\n                                                                                                                                   c-0.37-0.22-0.84-0.16-1.14,0.14l-3.39,3.39c-0.3,0.3-0.36,0.77-0.14,1.14l1.39,2.34c-0.54,0.97-0.97,2-1.27,3.07l-2.64,0.67\r\n                                                                                                                                   c-0.41,0.1-0.7,0.48-0.7,0.9v4.8c0,0.43,0.29,0.8,0.7,0.9l2.64,0.67c0.31,1.07,0.73,2.1,1.27,3.07l-1.39,2.34\r\n                                                                                                                                   c-0.22,0.37-0.16,0.84,0.14,1.14l3.39,3.39c0.3,0.3,0.77,0.36,1.14,0.14l2.34-1.39c0.97,0.54,2,0.97,3.07,1.27l0.67,2.64\r\n                                                                                                                                   c0.1,0.41,0.48,0.7,0.9,0.7h4.8c0.43,0,0.8-0.29,0.9-0.7l0.67-2.64c1.07-0.31,2.1-0.73,3.07-1.27l2.34,1.39\r\n                                                                                                                                   c0.37,0.22,0.84,0.16,1.14-0.14l3.39-3.39c0.3-0.3,0.36-0.77,0.14-1.14L44.83,39h4.71l4.9,4.9c0.17,0.17,0.41,0.27,0.66,0.27h6.45\r\n                                                                                                                                   c0.44,2.28,2.44,4,4.84,4c2.72,0,4.93-2.21,4.93-4.93C71.32,40.52,69.11,38.32,66.39,38.32L66.39,38.32z M61.6,27.58\r\n                                                                                                                                   c1.78,0,3.22,1.45,3.22,3.22s-1.45,3.22-3.22,3.22s-3.22-1.45-3.22-3.22S59.83,27.58,61.6,27.58z M66.26,15.52\r\n                                                                                                                                   c1.69,0,3.07,1.37,3.07,3.07s-1.37,3.07-3.07,3.07s-3.07-1.37-3.07-3.07S64.57,15.52,66.26,15.52z M41.19,42.88l-2.19-1.3\r\n                                                                                                                                   c-0.3-0.18-0.67-0.17-0.96,0.01c-1.11,0.68-2.32,1.18-3.58,1.48c-0.34,0.08-0.6,0.34-0.69,0.68l-0.63,2.46h-3.35l-0.63-2.47\r\n                                                                                                                                   c-0.09-0.34-0.35-0.6-0.69-0.68c-1.26-0.31-2.47-0.81-3.58-1.48c-0.3-0.18-0.67-0.18-0.96-0.01l-2.19,1.3l-2.36-2.36l1.3-2.19\r\n                                                                                                                                   c0.18-0.3,0.17-0.67-0.01-0.96c-0.68-1.11-1.18-2.32-1.48-3.58c-0.08-0.34-0.34-0.6-0.68-0.69l-2.46-0.63v-3.35l2.46-0.63\r\n                                                                                                                                   c0.34-0.08,0.6-0.35,0.68-0.69c0.31-1.26,0.81-2.47,1.48-3.58c0.18-0.3,0.18-0.66,0.01-0.96l-1.3-2.19l2.36-2.36l2.19,1.3\r\n                                                                                                                                   c0.3,0.18,0.67,0.18,0.96-0.01c1.11-0.68,2.32-1.18,3.58-1.48c0.34-0.08,0.6-0.34,0.69-0.68l0.63-2.47h3.35l0.63,2.47\r\n                                                                                                                                   c0.08,0.34,0.35,0.6,0.69,0.68c1.26,0.31,2.47,0.81,3.58,1.48c0.3,0.18,0.67,0.18,0.96,0.01l2.19-1.3l2.36,2.36l-1.3,2.19\r\n                                                                                                                                   c0,0,0,0.01-0.01,0.01c-0.04,0.07-0.07,0.14-0.09,0.21c0,0.01-0.01,0.02-0.01,0.03c-0.01,0.03-0.01,0.06-0.02,0.09\r\n                                                                                                                                   c0,0.01,0,0.02,0,0.03c0,0.04-0.01,0.07-0.01,0.11v0v0.01c0,0.03,0,0.07,0.01,0.1c0,0.01,0,0.02,0.01,0.03\r\n                                                                                                                                   c0.01,0.03,0.01,0.06,0.02,0.09c0,0.01,0,0.01,0.01,0.02c0.01,0.04,0.02,0.07,0.04,0.11c0,0,0,0.01,0,0.01\r\n                                                                                                                                   c0.01,0.03,0.03,0.07,0.05,0.1c0,0,0,0.01,0.01,0.01c0.68,1.11,1.18,2.32,1.48,3.58c0.08,0.34,0.34,0.6,0.68,0.69l2.46,0.63v1.67v0\r\n                                                                                                                                   v0v1.67l-2.47,0.63c-0.34,0.08-0.6,0.35-0.68,0.69c-0.31,1.26-0.81,2.46-1.48,3.58c-0.18,0.3-0.18,0.66-0.01,0.96l1.3,2.19\r\n                                                                                                                                   L41.19,42.88z M66.39,46.31c-1.69,0-3.07-1.37-3.07-3.07s1.37-3.07,3.07-3.07s3.07,1.37,3.07,3.07\r\n                                                                                                                                   C69.46,44.94,68.08,46.31,66.39,46.31z M31.48,21.77c-4.98,0-9.04,4.05-9.04,9.04s4.05,9.04,9.04,9.04s9.04-4.05,9.04-9.04\r\n                                                                                                                                   S36.47,21.77,31.48,21.77z M31.48,37.98c-3.95,0-7.17-3.22-7.17-7.17s3.22-7.17,7.17-7.17s7.17,3.22,7.17,7.17\r\n                                                                                                                                   C38.66,34.76,35.44,37.98,31.48,37.98z\" />\r\n                                            </svg>', 'Australia is known for its high standard of living, beautiful landscapes, and vibrant cities. International students can enjoy a safe and inclusive environment, diverse recreational activities, and a thriving social and cultural scene', '2025-02-05 00:46:27', '2025-02-05 00:46:27'),
(9, 'Beautiful Environment', '11', '<svg version=\"1.1\" id=\"svg-custom_6\" xmlns=\"http://www.w3.org/2000/svg\"\r\n                                                xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\r\n                                                viewBox=\"0 0 72 72\" style=\"enable-background:new 0 0 72 72;\"\r\n                                                xml:space=\"preserve\">\r\n                                                <path\r\n                                                    d=\"M31.6,34.93c5.73-0.27,10.31-5.01,10.31-10.8c0-4.4-2.66-8.34-6.69-10c-0.06-4.57-3.58-8.33-8.05-8.76\r\n                                                                                                                                   c-0.44-3.04-3.06-5.39-6.22-5.39s-5.78,2.34-6.22,5.39c-4.48,0.44-7.99,4.19-8.05,8.76C2.66,15.79,0,19.72,0,24.13\r\n                                                                                                                                   c0,5.79,4.58,10.54,10.31,10.8c2.31,3.13,5.86,5.07,9.71,5.35v30.8c0,0.52,0.42,0.94,0.94,0.94c0.52,0,0.94-0.42,0.94-0.94l0-30.8\r\n                                                                                                                                   C25.74,40,29.29,38.06,31.6,34.93L31.6,34.93z M11.57,33.48c-0.17-0.26-0.46-0.41-0.77-0.41c-4.93-0.01-8.93-4.02-8.93-8.94\r\n                                                                                                                                   c0-3.84,2.44-7.24,6.07-8.47c0.4-0.14,0.66-0.53,0.63-0.95c-0.01-0.16-0.02-0.32-0.02-0.46c0-3.89,3.16-7.05,7.05-7.05\r\n                                                                                                                                   c0.52,0,0.94-0.42,0.94-0.94c0-2.43,1.98-4.41,4.41-4.41s4.41,1.98,4.41,4.41c0,0.52,0.42,0.94,0.94,0.94\r\n                                                                                                                                   c3.89,0,7.05,3.16,7.05,7.05c0,0.15-0.01,0.3-0.02,0.46c-0.03,0.42,0.23,0.81,0.63,0.95c3.63,1.23,6.07,4.64,6.07,8.47\r\n                                                                                                                                   c0,4.93-4.01,8.94-8.93,8.94c-0.31,0-0.6,0.15-0.77,0.41c-2.12,3.11-5.62,4.96-9.38,4.96C17.2,38.44,13.69,36.59,11.57,33.48\r\n                                                                                                                                   L11.57,33.48z M60.24,57.38h-5.94v-3.97h0.61c1.5,0,2.72-1.22,2.72-2.72v-3.44c0-1.5-1.22-2.72-2.72-2.72l-22.89,0\r\n                                                                                                                                   c-1.5,0-2.72,1.22-2.72,2.72v3.44c0,1.5,1.22,2.72,2.72,2.72h0.61v3.97H26.7c-0.52,0-0.94,0.42-0.94,0.94v1.97\r\n                                                                                                                                   c0,1.47,1.1,2.69,2.52,2.88v7.91c0,0.52,0.42,0.94,0.94,0.94c0.52,0,0.94-0.42,0.94-0.94v-7.88h26.63v7.88\r\n                                                                                                                                   c0,0.52,0.42,0.94,0.94,0.94c0.52,0,0.94-0.42,0.94-0.94v-7.91c1.42-0.19,2.52-1.4,2.52-2.88v-1.97\r\n                                                                                                                                   C61.18,57.8,60.76,57.38,60.24,57.38L60.24,57.38z M31.17,50.69v-3.44c0-0.47,0.38-0.85,0.85-0.85h22.89c0.47,0,0.85,0.38,0.85,0.85\r\n                                                                                                                                   v3.44c0,0.47-0.38,0.85-0.85,0.85H32.03C31.56,51.54,31.17,51.16,31.17,50.69z M34.5,53.41h17.93v3.97H34.5V53.41z M59.31,60.29\r\n                                                                                                                                   c0,0.57-0.47,1.04-1.04,1.04l-29.6,0c-0.57,0-1.04-0.47-1.04-1.04v-1.04h31.68L59.31,60.29L59.31,60.29z M18.41,62.73\r\n                                                                                                                                   c0-0.01,0-0.02,0-0.02c0-0.02-0.01-0.04-0.01-0.06c0-0.01,0-0.03-0.01-0.04c0-0.01-0.01-0.02-0.01-0.03\r\n                                                                                                                                   c-0.01-0.02-0.01-0.04-0.02-0.06c0-0.01-0.01-0.01-0.01-0.02c-0.01-0.02-0.02-0.05-0.03-0.07c0,0,0,0,0,0\r\n                                                                                                                                   c0-0.01-0.01-0.01-0.01-0.02c-0.01-0.02-0.02-0.04-0.03-0.06c-0.01-0.01-0.01-0.02-0.02-0.03c-0.01-0.02-0.02-0.03-0.03-0.05\r\n                                                                                                                                   c-0.01-0.01-0.02-0.03-0.03-0.04c-0.01-0.01-0.02-0.02-0.03-0.03c-0.01-0.02-0.02-0.03-0.04-0.04c-0.01-0.01-0.02-0.02-0.03-0.03\r\n                                                                                                                                   c-0.01-0.01-0.02-0.02-0.04-0.03c-0.01-0.01-0.02-0.02-0.03-0.03l-0.04-0.03c-0.01-0.01-0.03-0.02-0.04-0.03\r\n                                                                                                                                   C17.98,62.01,17.96,62,17.96,62c-0.02-0.01-0.03-0.02-0.05-0.03c-0.01-0.01-0.02-0.01-0.03-0.01c-0.02-0.01-0.04-0.02-0.06-0.03\r\n                                                                                                                                   c-0.01,0-0.02-0.01-0.02-0.01c-0.02-0.01-0.04-0.02-0.06-0.02c-0.01,0-0.02-0.01-0.03-0.01c-0.02-0.01-0.04-0.01-0.06-0.02\r\n                                                                                                                                   c-0.01,0-0.03,0-0.04-0.01c-0.02,0-0.03-0.01-0.05-0.01c-0.02,0-0.04,0-0.05,0c-0.01,0-0.02,0-0.03,0h-0.01h-0.02\r\n                                                                                                                                   c-2.26,0.01-4.33,0.83-5.93,2.19l-1.39-12.17c-0.05-0.47-0.45-0.83-0.93-0.83c-0.47,0-0.88,0.36-0.93,0.83L6.88,64.06\r\n                                                                                                                                   c-1.6-1.36-3.67-2.19-5.93-2.19H0.93H0.93c-0.01,0-0.02,0-0.03,0c-0.02,0-0.04,0-0.05,0s-0.03,0-0.05,0.01c-0.02,0-0.03,0-0.04,0.01\r\n                                                                                                                                   c-0.02,0-0.04,0.01-0.06,0.02c-0.01,0-0.02,0.01-0.03,0.01c-0.02,0.01-0.04,0.01-0.06,0.02c-0.01,0-0.02,0.01-0.03,0.01\r\n                                                                                                                                   c-0.02,0.01-0.04,0.02-0.06,0.02c-0.01,0-0.02,0.01-0.03,0.02C0.48,61.98,0.46,61.99,0.45,62C0.44,62,0.43,62.01,0.41,62.01\r\n                                                                                                                                   c-0.02,0.01-0.03,0.02-0.04,0.03l-0.04,0.03c-0.01,0.01-0.02,0.02-0.03,0.03c-0.01,0.01-0.02,0.02-0.04,0.03\r\n                                                                                                                                   c-0.01,0.01-0.02,0.02-0.03,0.03c-0.01,0.01-0.02,0.02-0.03,0.04c-0.01,0.01-0.02,0.02-0.03,0.03c-0.01,0.01-0.02,0.02-0.03,0.04\r\n                                                                                                                                   c-0.01,0.02-0.02,0.03-0.03,0.05c-0.01,0.01-0.01,0.02-0.02,0.03c-0.01,0.02-0.02,0.04-0.03,0.06c0,0.01-0.01,0.01-0.01,0.02\r\n                                                                                                                                   c0,0,0,0,0,0c-0.01,0.02-0.02,0.05-0.03,0.07c0,0.01,0,0.01-0.01,0.02c-0.01,0.02-0.01,0.04-0.02,0.06c0,0.01-0.01,0.02-0.01,0.03\r\n                                                                                                                                   c0,0.01,0,0.03-0.01,0.04c0,0.02-0.01,0.04-0.01,0.05c0,0.01,0,0.02,0,0.02c0,0.02,0,0.05,0,0.07v0v0.02c0,0.02,0,0.05,0,0.07\r\n                                                                                                                                   c0,0.02,0,0.03,0.01,0.04c0,0.02,0,0.03,0.01,0.05c0,0.02,0.01,0.03,0.01,0.05c0,0.01,0.01,0.03,0.01,0.04\r\n                                                                                                                                   c0.01,0.02,0.01,0.04,0.02,0.05c0,0.01,0.01,0.02,0.01,0.03c0.01,0.02,0.02,0.03,0.02,0.05c0.01,0.01,0.01,0.02,0.02,0.03\r\n                                                                                                                                   c0.01,0.02,0.02,0.03,0.02,0.04c0.01,0.01,0.02,0.02,0.02,0.04c0.01,0.01,0.02,0.02,0.02,0.03c0.01,0.02,0.02,0.03,0.03,0.04\r\n                                                                                                                                   c0.01,0.01,0.02,0.02,0.02,0.03c0.01,0.02,0.02,0.03,0.04,0.04c0.01,0.01,0.02,0.02,0.02,0.02c0.02,0.01,0.03,0.02,0.04,0.04\r\n                                                                                                                                   c0.01,0.01,0.02,0.02,0.03,0.02c0.02,0.01,0.03,0.02,0.04,0.03c0.02,0.01,0.03,0.02,0.04,0.03c0.01,0.01,0.02,0.02,0.03,0.02\r\n                                                                                                                                   c0.02,0.01,0.04,0.02,0.06,0.03c0.01,0,0.01,0.01,0.02,0.01c2.87,1.27,4.62,4.21,4.36,7.34c-0.05,0.51,0.34,0.97,0.85,1.01\r\n                                                                                                                                   c0.05,0.03,0.08,0.03,0.1,0.03c0.48,0,0.89-0.37,0.93-0.86c0.19-2.22-0.44-4.37-1.67-6.11c1.91,1.33,3.16,3.53,3.16,6.03\r\n                                                                                                                                   c0,0.52,0.42,0.94,0.94,0.94c0.52,0,0.94-0.42,0.94-0.94c0-2.49,1.25-4.7,3.16-6.03c-1.23,1.73-1.85,3.89-1.67,6.11\r\n                                                                                                                                   c0.04,0.49,0.45,0.86,0.93,0.86c0.03,0,0.05,0,0.08,0c0.51-0.05,0.9-0.5,0.85-1.01c-0.27-3.12,1.48-6.07,4.36-7.34\r\n                                                                                                                                   c0.01,0,0.01-0.01,0.02-0.01c0.02-0.01,0.04-0.02,0.06-0.03c0.01-0.01,0.02-0.02,0.03-0.02c0.02-0.01,0.03-0.02,0.04-0.03\r\n                                                                                                                                   c0.02-0.01,0.03-0.02,0.04-0.03c0.01-0.01,0.02-0.02,0.03-0.02c0.02-0.01,0.03-0.02,0.04-0.04c0.01-0.01,0.02-0.02,0.03-0.02\r\n                                                                                                                                   c0.01-0.01,0.02-0.03,0.04-0.04c0.01-0.01,0.02-0.02,0.02-0.03c0.01-0.01,0.02-0.03,0.03-0.04c0.01-0.01,0.02-0.02,0.02-0.04\r\n                                                                                                                                   c0.01-0.01,0.02-0.02,0.02-0.04c0.01-0.02,0.02-0.03,0.02-0.04s0.01-0.02,0.02-0.03c0.01-0.02,0.02-0.03,0.02-0.05\r\n                                                                                                                                   c0-0.01,0.01-0.02,0.01-0.03c0.01-0.02,0.01-0.03,0.02-0.05c0-0.01,0.01-0.02,0.01-0.04c0-0.02,0.01-0.03,0.01-0.05\r\n                                                                                                                                   c0-0.02,0.01-0.03,0.01-0.05c0-0.02,0-0.03,0.01-0.04c0-0.02,0-0.04,0-0.07v-0.02v0C18.42,62.78,18.41,62.75,18.41,62.73\r\n                                                                                                                                   L18.41,62.73z M8.56,65.93l0.65-5.66l0.65,5.66c-0.24,0.35-0.45,0.73-0.65,1.11C9.02,66.66,8.8,66.28,8.56,65.93z M57.58,10.08\r\n                                                                                                                                   c-3.42,0-6.2,2.78-6.2,6.2s2.78,6.2,6.2,6.2c3.42,0,6.2-2.78,6.2-6.2C63.78,12.86,61,10.08,57.58,10.08z M57.58,20.61\r\n                                                                                                                                   c-2.39,0-4.33-1.94-4.33-4.33s1.94-4.33,4.33-4.33c2.39,0,4.33,1.94,4.33,4.33S59.97,20.61,57.58,20.61z M56.65,7.68v-4.9\r\n                                                                                                                                   c0-0.52,0.42-0.94,0.94-0.94c0.52,0,0.94,0.42,0.94,0.94v4.9c0,0.52-0.42,0.94-0.94,0.94C57.06,8.61,56.65,8.2,56.65,7.68\r\n                                                                                                                                   L56.65,7.68z M63,10.86c-0.37-0.37-0.37-0.96,0-1.32l3.46-3.46c0.37-0.37,0.96-0.37,1.32,0c0.37,0.37,0.37,0.96,0,1.32l-3.46,3.46\r\n                                                                                                                                   c-0.18,0.18-0.42,0.27-0.66,0.27C63.42,11.13,63.18,11.04,63,10.86L63,10.86z M72.01,16.28c0,0.52-0.42,0.94-0.94,0.94h-4.9\r\n                                                                                                                                   c-0.52,0-0.94-0.42-0.94-0.94c0-0.52,0.42-0.94,0.94-0.94h4.9C71.59,15.34,72.01,15.76,72.01,16.28z M67.79,25.16\r\n                                                                                                                                   c0.37,0.37,0.37,0.96,0,1.32c-0.18,0.18-0.42,0.27-0.66,0.27c-0.24,0-0.48-0.09-0.66-0.27L63,23.02c-0.37-0.37-0.37-0.96,0-1.32\r\n                                                                                                                                   c0.37-0.37,0.96-0.37,1.32,0L67.79,25.16z M56.65,29.78v-4.9c0-0.52,0.42-0.94,0.94-0.94c0.52,0,0.94,0.42,0.94,0.94v4.9\r\n                                                                                                                                   c0,0.52-0.42,0.94-0.94,0.94C57.06,30.71,56.65,30.29,56.65,29.78z M47.38,25.16l3.46-3.46c0.37-0.37,0.96-0.37,1.32,0\r\n                                                                                                                                   c0.37,0.37,0.37,0.96,0,1.32l-3.46,3.46c-0.18,0.18-0.42,0.27-0.66,0.27c-0.24,0-0.48-0.09-0.66-0.27\r\n                                                                                                                                   C47.01,26.12,47.01,25.53,47.38,25.16L47.38,25.16z M43.15,16.28c0-0.52,0.42-0.94,0.94-0.94h4.9c0.52,0,0.94,0.42,0.94,0.94\r\n                                                                                                                                   c0,0.52-0.42,0.94-0.94,0.94h-4.9C43.57,17.22,43.15,16.8,43.15,16.28z M47.38,7.4c-0.37-0.37-0.37-0.96,0-1.32\r\n                                                                                                                                   c0.37-0.37,0.96-0.37,1.32,0l3.46,3.46c0.37,0.37,0.37,0.96,0,1.32c-0.18,0.18-0.42,0.27-0.66,0.27c-0.24,0-0.48-0.09-0.66-0.27\r\n                                                                                                                                   L47.38,7.4z\" />\r\n                                            </svg>', 'Australia is renowned for its stunning landscapes, from beautiful beaches and coral reefs to vast outback and lush rainforests', '2025-02-05 00:46:47', '2025-02-05 00:46:47');

-- --------------------------------------------------------

--
-- Table structure for table `destination_scholarships`
--

CREATE TABLE `destination_scholarships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` longtext DEFAULT NULL,
  `sub_title` longtext DEFAULT NULL,
  `destination_id` int(10) UNSIGNED DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `link` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `destination_scholarships`
--

INSERT INTO `destination_scholarships` (`id`, `title`, `sub_title`, `destination_id`, `image`, `description`, `link`, `created_at`, `updated_at`) VALUES
(1, 'Scholarships in Australia', 'To explore the various scholarships available for international students', 11, 'destination-scholarship/scholarships-in-australia-1738747818.jpg', '<p>Australia offers a wide range of scholarships for international students to support their studies. These scholarships are offered by universities, government organizations, and various institutions. Scholarships in Australia can provide financial assistance, cover tuition fees, cover living expenses, or both. They are awarded based on academic merit, leadership qualities, research potential, or specific criteria related to the field of study.</p>', 'https://www.idp.com/nepal/study-in-usa/scholarships/', '2025-02-03 22:41:23', '2025-02-05 03:45:18');

-- --------------------------------------------------------

--
-- Table structure for table `destination_tests`
--

CREATE TABLE `destination_tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `destination_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `destination_tests`
--

INSERT INTO `destination_tests` (`id`, `destination_id`, `title`, `value`, `created_at`, `updated_at`) VALUES
(1, 2, 'Required Test', 'IELTS', '2025-02-03 03:25:53', '2025-02-03 03:25:53'),
(2, 1, 'TOEFL', 'TOEFL', '2025-02-03 03:26:11', '2025-02-03 03:26:11');

-- --------------------------------------------------------

--
-- Table structure for table `destination_universities`
--

CREATE TABLE `destination_universities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` varchar(255) NOT NULL,
  `destination_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `destination_universities`
--

INSERT INTO `destination_universities` (`id`, `university_id`, `destination_id`, `created_at`, `updated_at`) VALUES
(1, '[\"1\",\"2\"]', 11, '2025-01-24 05:35:05', '2025-02-04 04:05:04');

-- --------------------------------------------------------

--
-- Table structure for table `destination_visa_processes`
--

CREATE TABLE `destination_visa_processes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text DEFAULT NULL,
  `sub_title` text DEFAULT NULL,
  `destination_id` int(10) UNSIGNED DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `destination_visa_processes`
--

INSERT INTO `destination_visa_processes` (`id`, `title`, `sub_title`, `destination_id`, `image`, `description`, `link`, `created_at`, `updated_at`) VALUES
(1, 'Visa Process Australia', 'World-class education, diverse cultural experiences', 11, 'destination-visa/visa-process-australia-1738745860.jpg', '<p>The student visa process for Australia involves several steps. Firstly, you need to be accepted into a recognized Australian educational institution and receive a Confirmation of Enrollment (CoE) letter. Then, you can create an account on the Department of Home Affairs website and submit your student visa application online. You will need to provide documents such as your COE, proof of financial capacity, health insurance, and English language proficiency. After submitting the application, you will be required to undergo a health examination and may need to attend an interview at the Australian embassy or consulate.</p>', 'https://sa.nepalembassy.gov.np/', '2025-02-03 23:32:47', '2025-02-05 03:12:40');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filename` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `english_tests`
--

CREATE TABLE `english_tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `order` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `english_tests`
--

INSERT INTO `english_tests` (`id`, `title`, `body`, `image`, `order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'IELTS', '<p>The IELTS (International English Language Testing System) is jointly owned and run by four organizations: the British Council, IDP, IELTS Australia and Cambridge English Language Assessment. It is accepted not only by universities and corporations but by the immigration departments of several countries. There are two basic forms of the test&mdash;Academic and General. Both use the same Listening and Speaking sections, but they have different versions of the Reading and Writing Tests. The Academic Test, like the TOEFL, is for people who want to study at universities or colleges in English-speaking countries. The General Training Test is for employment, immigration, or high school purposes. IELTS results are designed to be simple and easy to understand. IELTS can be taken Paper or Computer based. IELTS scores are reported as band scores on a scale from 1 (the lowest) to 9 (the highest). IELTS tests are valid for two years following the test date.</p>', '1738052870.png', '1', 1, '2025-01-28 02:42:50', '2025-01-28 02:42:50'),
(2, 'TOEFL', '<p>Test of English as a Foreign Language (TOEFL) is a standardized test to measure the English language ability of non-native speakers wishing to enroll in English-speaking universities. The test is accepted by many English-speaking academic and professional institutions. TOEFL is one of the two major English-language tests in the world, the other being the IELTS. TOEFL is a trademark of the Educational Testing Service (ETS), a private non-profit organization, which designs and administers the tests. ETS issues official score reports which are sent independently to institutions and are valid for two years following the test. Score requirements are set by individual colleges and universities. You will receive a score from 0 to 30 for each section and a total score of 0 to 120 for the entire test. The total test takes about 3 hours to complete, but you should plan for 3&frac12; hours, allowing 30 minutes for check in.</p>', '1738052896.png', '2', 1, '2025-01-28 02:43:16', '2025-01-28 02:43:16'),
(3, 'PTE', '<p>PTE Academic is the first entirely computer-based English language test for international study and immigration that is accepted across the world. Powered by AI technology, PTE Academic provides a fast and convenient testing solution without human bias. The test assesses the four skills of speaking, listening, reading and writing. It lasts approximately 3 hours and provides a score based on the GSE (Global Scale of English). &nbsp;PTE Academic scores are accepted by thousands of institutions and approved for all UK, Australian and New Zealand visa and immigration categories. Test sessions can be scheduled up to 24 hours in advance, 365 days a year. To complete a PTE Academic test, you will need to attend a secure Pearson test center. You will use a computer and headset to listen to, read and respond to questions. During the three-hour test session, there are three main parts to the test: speaking and writing (together), listening and reading. There is also an optional 10-minute break between the reading and listening parts. During the test, you will find twenty different question formats, ranging from multiple choices through to essay writing and interpreting information. The overall score is based on performance on all test items (tasks in the test consisting of instructions, questions or prompts, answer opportunities and scoring rules). Each test taker will answer between 71 and 83 items in any given test and there are 20 different item types. For each item, the score given contributes to the overall score. The score range is 10&ndash;90 points.</p>', '1738052945.png', '3', 1, '2025-01-28 02:44:05', '2025-01-28 02:44:05'),
(4, 'DUOLINGO ENGLISH TEST', '<p>Duolingo is the most popular language-learning platform and the most downloaded education app in the world, with more than 300 million users. The Duolingo English Test is a modern language proficiency tool designed for today&#39;s international students and institutions. It offers an English proficiency score, video interview, and writing sample in an accessible, efficient, and secure testing experience. This test is accepted most of the reputed universities and colleges globally, including the education providers of the USA, UK, Australia, Canada and New Zealand. Its acceptance rate is growing day by day since. The Duolingo English Test measures English proficiency and reports scores on a scale out of 160 in 5-point increments. Test results include an overall score as well as sub scores of Literacy, Conversation, Comprehension, and Production. The overall score is not an average of the sub scores. All five scores are estimated independently and are weighted combinations of the questions that contribute to the score. Test result certificates include &quot;Your score range&quot; which represents the standard error of measurement (SEM). The SEM represents a range of scores within which a test taker&#39;s true score can be found. This test can be taken online anytime, anywhere and this test can be finished in an hour and can get score in two days. Like other English language tests, this test is also valid for 2 years. The cost of Duolingo English Test is US$49, which is really reasonable in comparison to IELTS, TOEFL and PTE. &nbsp;</p>', '1738052972.png', '4', 1, '2025-01-28 02:44:32', '2025-01-28 02:44:32'),
(5, 'SAT', '<p>The Scholastic Assessment Test (SAT) is an entrance exam used by most colleges and universities to make admissions decisions in the USA. The SAT is a multiple-choice, pencil-and-paper test created and administered by the College Board. The purpose of the SAT is to measure a high school student&#39;s readiness for college, and provide colleges with one common data point that can be used to compare all applicants. College admissions officers will review standardized test scores alongside your high school GPA, the classes you took in high school, letters of recommendation from teachers, extracurricular activities, admissions interviews, and personal essays. How important SAT scores are in the college application process varies from school to school. Overall, the higher you score on the SAT and/or ACT, the more options for attending and paying for college or university will be available to you. The SAT takes three hours to finish, plus 50 minutes for the SAT with essay, and as of 2020 costs US$ 52 (US$ 68 with the optional essay), excluding late fees, with additional processing fees if the SAT is taken outside the United States. Scores on the SAT range from 400 to 1600, combining test results from two 200-to-800-point sections: Mathematics, and evidence-based Critical Reading and Writing.</p>', '1738052994.png', '5', 1, '2025-01-28 02:44:54', '2025-01-28 02:44:54');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `body` longtext DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `event_date` date DEFAULT NULL,
  `event_time` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `image`, `body`, `slug`, `location`, `event_date`, `event_time`, `created_at`, `updated_at`) VALUES
(1, 'Study Abroad Expo 2025', 'study-abroad-expo-20251737966009.jpeg', '<p>The Study Abroad Expo 2025 is a premier event bringing together top universities, educational institutions, and industry experts from around the world. Attendees will have the chance to explore various study programs, scholarship opportunities, and student support services. The event includes seminars on student visas, post-study work options, and living abroad. Connect with university representatives and alumni to gain insights into the application process and life as an international student. Whether you&#39;re considering undergraduate, postgraduate, or research programs, this expo is your gateway to global education.</p>', 'study-abroad-expo-2025', 'Sydney International Convention Centre, Sydney, Australia', NULL, NULL, '2025-01-27 02:35:09', '2025-01-27 02:35:09'),
(2, 'Global Education Fair 2025', 'global-education-fair-20251737966040.jpg', '<p>The Global Education Fair 2025 is designed to help students and professionals explore study opportunities in countries like the USA, UK, Canada, Australia, and beyond. The event features workshops on choosing the right university, writing an impactful statement of purpose, and acing admission interviews. Leading educational consultants and university representatives will provide guidance on scholarships, internships, and career prospects. This fair is an excellent opportunity for anyone looking to enhance their academic and professional journey through international education.</p>', 'global-education-fair-2025', 'Javits Center, New York City, USA', NULL, NULL, '2025-01-27 02:35:40', '2025-01-27 02:35:40'),
(3, 'Dolores voluptatem s updarte', 'dolores-voluptatem-s-updarte1737968131.jpg', '<p>The Global Education Fair 2025 is designed to help students and professionals explore study opportunities in countries like the USA, UK, Canada, Australia, and beyond. The event features workshops on choosing the right university, writing an impactful statement of purpose, and acing admission interviews. Leading educational consultants and university representatives will provide guidance on scholarships, internships, and career prospects. This fair is an excellent opportunity for anyone looking to enhance their academic and professional journey through international education. update</p>', 'dolores-voluptatem-s', 'Qui magni perspiciat update', '2025-01-31', '12:18:00', '2025-01-27 03:05:53', '2025-01-27 03:10:31'),
(4, 'Fuga Sit laborum', 'fuga-sit-laborum1738138638.jpg', '<p>zxcxv c</p>', 'fuga-sit-laborum', 'Inventore ea omnis v', '1985-08-17', '02:29:00', '2025-01-27 03:17:59', '2025-01-29 02:32:19');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `highlights`
--

CREATE TABLE `highlights` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `destination_id` varchar(255) NOT NULL,
  `flag` varchar(255) NOT NULL,
  `founded` varchar(255) NOT NULL,
  `capital` varchar(255) NOT NULL,
  `form` varchar(255) NOT NULL,
  `animal_name` varchar(255) NOT NULL,
  `animal_image` varchar(255) DEFAULT NULL,
  `population` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `infos`
--

CREATE TABLE `infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `footer_about` text DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `linkedIn` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `pobox` varchar(255) DEFAULT NULL,
  `opens` varchar(255) DEFAULT NULL,
  `closes` varchar(255) DEFAULT NULL,
  `map` varchar(255) DEFAULT NULL,
  `intro_video` varchar(255) DEFAULT NULL,
  `study_destination_video` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `admission_year` varchar(255) DEFAULT NULL,
  `admission_season` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `infos`
--

INSERT INTO `infos` (`id`, `name`, `address`, `website`, `footer_about`, `phone`, `mobile`, `email`, `logo`, `favicon`, `facebook`, `linkedIn`, `twitter`, `fax`, `pobox`, `opens`, `closes`, `map`, `intro_video`, `study_destination_video`, `created_at`, `updated_at`, `admission_year`, `admission_season`) VALUES
(1, 'Consultancy', '123 Main Street, City, Country', 'https://example.com', 'Our mission is to bridge the gap between students and international education by providing personalized support at every step.', '+123-456-7890', '+098-765-4321', 'info@example.com', 'consultancy1738753661.jpg', 'consultancyfavicon1738753661.png', 'https://facebook.com/example', 'https://linkedin.com/company/example', 'https://twitter.com/example', '+123-456-7891', 'PO Box 123', '09:00 AM', '05:00 PM', 'https://maps.google.com/example', 'https://youtube.com/example-intro', 'https://youtube.com/example-study', '2025-01-27 23:08:12', '2025-02-05 05:22:41', '2025', 'Winter');

-- --------------------------------------------------------

--
-- Table structure for table `institutes`
--

CREATE TABLE `institutes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `body` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `course` varchar(255) DEFAULT NULL,
  `album_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `language_tests`
--

CREATE TABLE `language_tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `order` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `language_tests`
--

INSERT INTO `language_tests` (`id`, `title`, `body`, `image`, `order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'English Language Classes', '<p>DISCOVERY CREW, a platform that fosters education, introduces English class to prepare you for the personal growth and professional development. It also gives a boost and an extra edge for school and college students, job seekers and abroad study planners. Get a top class English course with British Council certified teachers and continue to fulfill your education and professional dreams, because &lsquo;Your Dreams And Aspirations Matter&rsquo;. Course for students, job holders, self-developers has been modeled as per the requirement. Meet the facilitators who are professionally sound and well-rehearsed who shall shape and fine tune the English language of yours.</p>\r\n\r\n<ul>\r\n	<li>Continuous practice and assessment on all four aspects- Reading, Writing, Listening and Speaking</li>\r\n	<li>Pronunciation for Spoken Language</li>\r\n	<li>Grammar and Vocabulary Skills</li>\r\n	<li>Presentation and its styles, maintaining composure, use of pauses etc. (Focused for work groups)</li>\r\n	<li>Mockup and Exams held regularly</li>\r\n</ul>', '1738054402.png', '1', 1, '2025-01-28 03:08:22', '2025-01-28 03:08:22'),
(2, 'Japanese Language Classes', '<p>The Japanese-Language Proficiency Test (JLPT) is a standardized criterion-referenced test to evaluate and certify Japanese language proficiency for non-native speakers, covering language knowledge, reading ability, and listening ability. Our trained Japanese language teachers provide lessons focused on preparing you for the JLPT exam. Our lessons offer both quality and value for money. &nbsp;Get your knowledge and skill enhanced in terms of Japanese language. Learn Japanese fluently from certified trainers and become proficient for better opportunity! At Discovery Education, N1-N5 level Japanese language classes are available. Apply now to try out one of our JLPT group classes.</p>\r\n\r\n<p><strong>EPS based classes<br />\r\nBasic Korean Language classes</strong></p>\r\n\r\n<p>For the enrollment and trial classes, register with us now!</p>', '1738054424.png', '2', 1, '2025-01-28 03:08:44', '2025-01-28 03:08:44');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `album_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `title`, `album_id`, `created_at`, `updated_at`) VALUES
(1, 'slider-31737978205.jpg', 1, '2025-01-27 05:58:25', '2025-01-27 05:58:25'),
(2, 'slider-41737978205.jpg', 1, '2025-01-27 05:58:25', '2025-01-27 05:58:25'),
(3, 'slider-51737978205.jpg', 1, '2025-01-27 05:58:25', '2025-01-27 05:58:25'),
(4, 'course-21738075359.jpg', 2, '2025-01-28 08:57:39', '2025-01-28 08:57:39'),
(5, 'course-31738075359.jpg', 2, '2025-01-28 08:57:39', '2025-01-28 08:57:39'),
(6, 'course-41738075359.jpg', 2, '2025-01-28 08:57:39', '2025-01-28 08:57:39'),
(7, 'course-51738075359.jpg', 2, '2025-01-28 08:57:39', '2025-01-28 08:57:39'),
(8, 'course-61738075359.jpg', 2, '2025-01-28 08:57:39', '2025-01-28 08:57:39'),
(9, 'course-71738075359.jpg', 2, '2025-01-28 08:57:39', '2025-01-28 08:57:39'),
(10, 'related-course-11738075359.jpg', 2, '2025-01-28 08:57:39', '2025-01-28 08:57:39'),
(11, 'related-course-21738075359.jpg', 2, '2025-01-28 08:57:39', '2025-01-28 08:57:39'),
(12, 'related-course-31738075359.jpg', 2, '2025-01-28 08:57:39', '2025-01-28 08:57:39');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `page_id` int(11) DEFAULT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `destination_id` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `message`, `phone`, `destination_id`, `subject`, `created_at`, `updated_at`) VALUES
(9, 'Emmanuel Mcdowell', 'lecy@mailinator.com', 'Omnis ratione non po', '1023526598', '11', 'Tempor veniam ad in', '2025-02-04 23:10:13', '2025-02-04 23:10:13'),
(10, 'Dominique Nieves', 'vumazu@mailinator.com', 'Exercitationem qui t', '1023026596', '11', 'Quidem voluptas volu', '2025-02-04 23:16:40', '2025-02-04 23:16:40'),
(11, 'Aquila Mcguire', 'xizuj@mailinator.com', 'Fuga Corporis minim', '0023020023', '11', 'Dolor exercitationem', '2025-02-04 23:20:53', '2025-02-04 23:20:53'),
(12, 'Cleo Guerrero', 'dizeju@mailinator.com', 'Non iure a sed lauda', '1023265968', '11', 'Nemo quidem sit esse', '2025-02-04 23:22:15', '2025-02-04 23:22:15');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_01_19_082741_create_menus_table', 1),
(5, '2021_01_19_082924_create_old_pages_table', 1),
(6, '2021_01_20_074816_create_blogs_table', 1),
(7, '2021_01_20_082409_create_services_table', 1),
(8, '2021_01_20_102913_create_albums_table', 1),
(9, '2021_01_20_103219_create_media_table', 1),
(10, '2021_01_21_045808_create_infos_table', 1),
(11, '2021_01_21_053016_create_testimonials_table', 1),
(12, '2021_01_21_063155_create_english_tests_table', 1),
(13, '2021_01_21_063423_create_language_tests_table', 1),
(14, '2021_01_21_080223_create_destinations_table', 1),
(15, '2021_01_21_084033_create_highlights_table', 1),
(16, '2021_01_21_111048_create_cities_table', 1),
(17, '2021_01_21_112912_create_brands_table', 1),
(18, '2021_01_22_052432_create_news_table', 1),
(19, '2021_01_22_052650_create_events_table', 1),
(20, '2021_01_22_061154_create_questionaires_table', 1),
(21, '2021_01_22_072416_create_packages_table', 1),
(22, '2021_01_28_103646_create_comments_table', 1),
(23, '2021_01_28_104015_create_replies_table', 1),
(24, '2021_02_01_071033_create_institutes_table', 1),
(25, '2021_02_10_070211_create_branches_table', 1),
(26, '2021_02_11_053203_create_students_table', 1),
(27, '2021_02_11_053328_create_bookings_table', 1),
(28, '2021_02_11_074551_create_documents_table', 1),
(29, '2021_02_11_084636_create_previous_courses_table', 1),
(30, '2021_02_17_045857_create_categories_table', 1),
(31, '2021_02_17_074937_create_messages_table', 1),
(32, '2021_03_02_072622_create_resources_table', 1),
(33, '2024_12_31_050930_create_sliders_table', 1),
(34, '2025_01_04_145115_create_pages_table', 1),
(35, '2025_01_04_145239_create_page_contents_table', 1),
(36, '2025_01_23_051935_create_destination_tests_table', 1),
(37, '2025_01_23_052428_create_destination_costs_table', 1),
(38, '2025_01_23_052509_create_destination_key_facts_table', 1),
(39, '2025_01_23_052605_create_courses_table', 1),
(40, '2025_01_23_053529_create_universities_table', 1),
(41, '2025_01_23_053615_create_destination_faqs_table', 1),
(42, '2025_01_23_054018_create_destination_courses_table', 1),
(43, '2025_01_23_054206_create_destination_univerities_table', 1),
(44, '2025_01_23_054301_create_countries_table', 1),
(45, '2025_01_27_084513_add_event_date_and_event_time_to_events_table', 2),
(46, '2025_01_27_104641_add_short_description_to_blogs_table', 3),
(47, '2025_01_28_052305_create_contacts_table', 4),
(48, '2025_01_28_095710_create_scholarships_table', 5),
(49, '2025_01_28_100356_add_short_description_to_scholarships_table', 6),
(50, '2025_01_28_102514_add_slug_to_scholarships_table', 7),
(51, '2025_01_29_044401_create_newsletters_table', 8),
(52, '2025_01_29_062507_add_column_to_sliders_table', 9),
(53, '2025_01_29_101622_add_column_to_infos_table', 10),
(54, '2025_01_31_053554_add_admission_year_and_season_to_infos_table', 11),
(55, '2025_01_31_060253_add_test_id_to_contacts_table', 12),
(57, '2025_01_31_071140_add_columns_to_scholarships_table', 13),
(58, '2025_01_31_092523_create_achievements_table', 14),
(59, '2025_02_03_070142_add_type_to_destination_costs_table', 15),
(60, '2025_02_03_101405_create_destination_facts_table', 16),
(61, '2025_02_03_104358_create_destination_reasons_table', 17),
(62, '2025_02_03_110941_create_destination_healths_table', 18),
(63, '2025_02_03_112841_create_destination_jobs_table', 19),
(64, '2025_02_03_114613_add_destination_id_to_destination_jobs_table', 20),
(65, '2025_02_03_115824_add_destination_id_to_destination_reasons_table', 21),
(66, '2025_02_03_120314_add_destination_id_to_destination_facts_table', 22),
(67, '2025_02_03_120924_add_destination_id_to_destination_healths_table', 23),
(68, '2025_02_03_121456_create_destination_scholarships_table', 24),
(69, '2025_02_03_121502_create_destination_visa_processes_table', 24),
(70, '2025_02_04_052859_add_image_to_destination_costs_table', 25),
(71, '2025_02_04_061751_add_columns_to_destinations_table', 26),
(72, '2025_02_04_113936_add_columns_to_messages_table', 27),
(73, '2025_02_06_052332_add_more_columns_to_destinations_table', 28);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `body` longtext DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `location` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'jisuvobe@mailinator.com', '2025-01-28 23:20:05', '2025-01-28 23:20:05'),
(3, 'rexarida@mailinator.com', '2025-01-31 05:26:57', '2025-01-31 05:26:57');

-- --------------------------------------------------------

--
-- Table structure for table `old_pages`
--

CREATE TABLE `old_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `body` longtext DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `body` longtext DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `added_by` bigint(20) UNSIGNED DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `menu` tinyint(1) NOT NULL DEFAULT 0,
  `page_above` longtext DEFAULT NULL,
  `page_below` longtext DEFAULT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_keyword` text DEFAULT NULL,
  `seo_description` varchar(255) DEFAULT NULL,
  `seo_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `added_by`, `content`, `status`, `menu`, `page_above`, `page_below`, `seo_title`, `seo_keyword`, `seo_description`, `seo_image`, `created_at`, `updated_at`) VALUES
(1, 'Home', 'home', NULL, NULL, 1, 0, NULL, NULL, 'Home', 'home-consultansy,home2', 'This is home page for consultancy', '1738816517.jpg', '2025-01-27 00:17:04', '2025-02-05 22:50:18'),
(2, 'About', 'about', NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-28 01:07:46', '2025-01-28 01:07:46'),
(3, 'Contact', 'contact', NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-28 01:47:18', '2025-01-28 01:47:18'),
(4, 'Test', 'test', NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-28 03:37:19', '2025-01-28 03:37:19'),
(5, 'Details', 'details', NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-28 03:39:21', '2025-01-28 03:39:21'),
(6, 'Scholarship', 'scholarship', NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-28 03:52:45', '2025-01-28 03:52:45'),
(7, 'Scholarship Details', 'scholarship-details', NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-28 05:37:46', '2025-01-28 05:37:46'),
(8, 'Service', 'service', NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-28 22:13:51', '2025-01-28 22:13:51'),
(9, 'Blog', 'blog', NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-29 03:03:09', '2025-01-29 03:03:09'),
(10, 'Blog Details', 'blog-details', NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-29 03:18:39', '2025-01-29 03:18:39'),
(11, 'Course Details', 'course-details', NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-29 03:20:56', '2025-01-29 03:20:56'),
(12, 'Event Details', 'event-details', NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-29 03:23:45', '2025-01-29 03:23:45'),
(14, 'Destination Details', 'destination-details', NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-04 02:19:20', '2025-02-04 02:19:20'),
(15, 'Vel natus consectetu', 'Quam nihil adipisici', NULL, NULL, 1, 0, NULL, NULL, 'Qui quo ut autem mag', 'Architect x o reiciendi', 'Esse rerum dolorem', '1738821310.jpg', '2025-02-06 00:08:37', '2025-02-06 00:10:11'),
(16, 'Et fugit eveniet s', 'et-fugit-eveniet-s', NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-06 00:16:03', '2025-02-06 00:16:03');

-- --------------------------------------------------------

--
-- Table structure for table `page_contents`
--

CREATE TABLE `page_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` text DEFAULT NULL,
  `text` longtext DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `link` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_contents`
--

INSERT INTO `page_contents` (`id`, `page_id`, `title`, `subtitle`, `text`, `content`, `link`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Scholarship Facility', NULL, NULL, 'magna aliqua. Ut enim ad minim veniam conse ctetur adipisicing elit, sed do exercitation.', NULL, '71737957724.png', '2025-01-27 00:17:05', '2025-01-27 00:17:05'),
(2, 1, 'Scholarship Facility', NULL, NULL, 'magna aliqua. Ut enim ad minim veniam conse ctetur adipisicing elit, sed do exercitation.', NULL, '81737959535.png', NULL, '2025-01-29 04:30:25'),
(3, 1, 'Scholarship Facility', NULL, NULL, 'magna aliqua. Ut enim ad minim veniam conse ctetur adipisicing elit, sed do exercitation.', NULL, '61737959535.png', NULL, '2025-01-29 04:30:25'),
(4, 1, 'Scholarship Facility', NULL, NULL, 'magna aliqua. Ut enim ad minim veniam conse ctetur adipisicing elit, sed do exercitation.', NULL, '71737959535.png', NULL, '2025-01-29 04:30:25'),
(5, 1, 'About Us', 'tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip', NULL, 'eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim ven iam, quis nostrud exer citation ullamco laboris nisi ut perspiciatis unde omnis iste natus error sit voluptate.', 'https://www.youtube.com/watch?v=sv5hK4crIRc', '51737958520.jpg', NULL, '2025-01-29 04:29:49'),
(6, 1, 'Top Destinations', 'Explore the World\'s Best, One Destination at a Time!', NULL, NULL, NULL, NULL, NULL, '2025-01-27 00:30:20'),
(7, 1, 'Our Courses', 'tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip', NULL, NULL, NULL, NULL, NULL, '2025-01-27 00:30:20'),
(8, 1, 'Our Achievement', 'tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip', NULL, NULL, NULL, NULL, NULL, '2025-01-27 00:30:20'),
(9, 1, 'Testimonials', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 1, 'Register Now', 'Winter Admission Is Going On. We are announcing Special discount for winter batch 2019.', 'Get A free Registration', NULL, NULL, '61737958520.jpg', NULL, '2025-01-27 00:30:20'),
(11, 1, 'Our Event', 'tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip', NULL, NULL, NULL, NULL, NULL, '2025-01-27 00:30:20'),
(12, 1, 'Our Newsfeed', 'tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip', NULL, NULL, NULL, NULL, NULL, '2025-01-27 00:30:20'),
(13, 2, 'About Us', 'About Us Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore .', NULL, 'About Us Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore .', NULL, '91738047166.jpg', '2025-01-28 01:07:47', '2025-01-28 01:07:47'),
(14, 2, 'Scholarship Facility', NULL, NULL, 'magna aliqua. Ut enim ad minim veniam conse ctetur adipisicing elit, sed do exercitation ullamco', NULL, '71738047167.png', '2025-01-28 01:07:47', '2025-01-28 01:07:47'),
(15, 2, 'Best Teacher', NULL, NULL, 'magna aliqua. Ut enim ad minim veniam conse ctetur adipisicing elit, sed do exercitation ullamco', NULL, '91738047167.png', '2025-01-28 01:07:47', '2025-01-28 01:07:47'),
(16, 2, 'Library & Book Store', NULL, NULL, 'magna aliqua. Ut enim ad minim veniam conse ctetur adipisicing elit, sed do exercitation ullamco', NULL, '81738047167.png', '2025-01-28 01:07:47', '2025-01-28 01:07:47'),
(17, 2, '25 Years Of Experience', NULL, NULL, 'magna aliqua. Ut enim ad minim veniam conse ctetur adipisicing elit, sed do exercitation ullamco', NULL, '51738048609.png', '2025-01-28 01:07:47', '2025-01-28 01:31:49'),
(18, 2, 'About Banner', NULL, NULL, 'About Us Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore .', NULL, '101738047167.png', '2025-01-28 01:07:47', '2025-01-28 01:07:47'),
(19, 2, 'Video Image', NULL, NULL, 'About Us Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore .', 'https://www.youtube.com/watch?v=sv5hK4crIRc', '71738047167.jpg', '2025-01-28 01:07:47', '2025-01-28 01:34:39'),
(20, 2, 'Fun Fact', NULL, NULL, 'tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip', NULL, NULL, '2025-01-28 01:07:47', '2025-01-28 01:07:47'),
(21, 2, 'What People Say', NULL, NULL, 'tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim\r\nveniam, quis nostrud exercitation ullamco laboris nisi ut aliquip', NULL, NULL, '2025-01-28 01:07:47', '2025-01-28 01:07:47'),
(22, 3, 'Contact Us', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore .', NULL, '51738049538.jpg', '2025-01-28 01:47:18', '2025-01-28 01:47:18'),
(23, 3, 'Stay Connected', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipis do eiusmod tempor indunt ut labore et dolore magna aliqua.', '<iframe                                 src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2224905.8379164026!2d-63.27089988050263!3d-2.8569688249815943!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91e8605342744385%3A0x3d3c6dc1394a7fc7!2sAmazon%20Rainforest!5e0!3m2!1sen!2sbd!4v1635401091721!5m2!1sen!2sbd\"      style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', NULL, '2025-01-28 01:47:18', '2025-01-28 01:47:18'),
(24, 3, 'Contact Info Image', NULL, NULL, 'Contact Info Image', NULL, '91738049538.jpg', '2025-01-28 01:47:18', '2025-01-28 01:47:18'),
(25, 4, 'Test', 'About Us Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore .', NULL, 'About Us Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore .', NULL, '71738056139.jpg', '2025-01-28 03:37:20', '2025-01-28 03:37:20'),
(26, 5, 'Details', 'Details', NULL, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore .', NULL, '81738056261.jpg', '2025-01-28 03:39:21', '2025-01-28 03:39:21'),
(27, 6, 'Scholarship', NULL, NULL, 'Scholarship', NULL, '51738064238.jpg', '2025-01-28 03:52:45', '2025-01-28 05:52:18'),
(28, 6, 'Scholarship', NULL, NULL, 'Scholarship', NULL, NULL, '2025-01-28 03:52:45', '2025-01-28 03:52:45'),
(29, 7, 'Scholarship Details', NULL, NULL, 'Scholarship Details', NULL, '101738063366.jpg', '2025-01-28 05:37:46', '2025-01-28 05:37:46'),
(30, 8, 'Service', NULL, NULL, 'Service', NULL, '101738123131.jpg', '2025-01-28 22:13:51', '2025-01-28 22:13:51'),
(31, 9, 'Blog', NULL, NULL, 'Blog', NULL, '81738140489.jpg', '2025-01-29 03:03:09', '2025-01-29 03:03:09'),
(32, 10, 'Blog Details', NULL, NULL, 'Blog Details', NULL, '101738141419.jpg', '2025-01-29 03:18:39', '2025-01-29 03:18:39'),
(33, 11, 'Course Details', NULL, NULL, 'Course Grid', NULL, '101738141556.jpg', '2025-01-29 03:20:56', '2025-01-29 03:21:05'),
(34, 12, 'Event Details', NULL, NULL, 'Event Grid', NULL, '71738141725.jpg', '2025-01-29 03:23:45', '2025-01-29 03:23:45'),
(36, 14, 'Frequently Asked Questions (FAQs)', 'Our consultancy offers a wide range of services tailored to meet the unique needs of individuals and businesses, including career guidance:', NULL, 'Our consultancy offers a wide range of services tailored to meet the unique needs of individuals and businesses, including career guidance:', NULL, NULL, '2025-02-04 02:19:20', '2025-02-04 02:19:20'),
(37, 14, 'Get InTouch', 'We value your inquiries, send us a message and we’ll get back to you', NULL, 'We value your inquiries, send us a message and we’ll get back to you', NULL, '101738656260.jpg', '2025-02-04 02:19:20', '2025-02-04 02:19:20'),
(38, 15, 'Sed officia autem ad', 'Ut omnis ea vero pra', 'Ipsum maiores veniam', 'Eiusmod vel necessit', 'Et dolor ipsa vel p', NULL, '2025-02-06 00:08:37', '2025-02-06 00:10:11'),
(39, 16, 'Aliquam cupiditate v', 'Sint nobis nobis ver', 'Et do eos dolorem du', 'Eveniet officia cor', 'Consequatur est ex n', NULL, '2025-02-06 00:16:03', '2025-02-06 00:16:03');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `previous_courses`
--

CREATE TABLE `previous_courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `reading` varchar(5) NOT NULL DEFAULT '0',
  `writing` varchar(5) NOT NULL DEFAULT '0',
  `listening` varchar(5) NOT NULL DEFAULT '0',
  `speaking` varchar(5) NOT NULL DEFAULT '0',
  `attempts` varchar(255) DEFAULT NULL,
  `result` varchar(255) DEFAULT NULL,
  `publish` tinyint(1) NOT NULL DEFAULT 0,
  `remarks` varchar(255) DEFAULT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questionaires`
--

CREATE TABLE `questionaires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `destination_id` varchar(255) DEFAULT NULL,
  `service_id` varchar(255) DEFAULT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `order` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questionaires`
--

INSERT INTO `questionaires` (`id`, `destination_id`, `service_id`, `question`, `answer`, `order`, `status`, `created_at`, `updated_at`) VALUES
(1, '2', 'None', 'Consectetur esse s', '<p>ghnfgnfghnfgn</p>', '1', 0, '2025-01-28 22:29:38', '2025-01-28 22:29:38');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `file` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `scholarships`
--

CREATE TABLE `scholarships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `short_description` longtext DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `desti_id` bigint(20) UNSIGNED DEFAULT NULL,
  `corse_id` bigint(20) UNSIGNED DEFAULT NULL,
  `uni_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scholarships`
--

INSERT INTO `scholarships` (`id`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`, `short_description`, `slug`, `desti_id`, `corse_id`, `uni_id`) VALUES
(8, 'US Scholarship', '<h3>US Study Scholarship Details</h3>\r\n\r\n<p>The <strong>US Study Scholarship</strong> is a prestigious opportunity designed to provide financial assistance to international students seeking to pursue higher education in the United States. This scholarship aims to make education in the U.S. more accessible by offering partial or full coverage for tuition fees, living expenses, and other associated costs.</p>\r\n\r\n<h4><strong>Eligibility Criteria</strong>:</h4>\r\n\r\n<ul>\r\n	<li><strong>Academic Excellence</strong>: Applicants must demonstrate a strong academic record with excellent grades and standardized test scores (e.g., SAT, ACT, GRE).</li>\r\n	<li><strong>Field of Study</strong>: The scholarship is available for students pursuing undergraduate, graduate, or doctoral programs in various fields including STEM, arts, business, and social sciences.</li>\r\n	<li><strong>International Students</strong>: The scholarship is open to students from countries outside the United States.</li>\r\n	<li><strong>Language Proficiency</strong>: Proof of English proficiency (TOEFL, IELTS) is required for non-native English speakers.</li>\r\n</ul>\r\n\r\n<h4><strong>Benefits</strong>:</h4>\r\n\r\n<ul>\r\n	<li><strong>Full/Partial Tuition Coverage</strong>: The scholarship can cover full or partial tuition fees, depending on the award.</li>\r\n	<li><strong>Living Expenses</strong>: Some scholarships also include living allowances to cover room, board, and other living costs.</li>\r\n	<li><strong>Travel Allowance</strong>: Some scholarships may offer travel grants to help cover the cost of flights to and from the United States.</li>\r\n	<li><strong>Health Insurance</strong>: Many scholarship programs include health insurance coverage for the duration of the study period.</li>\r\n</ul>\r\n\r\n<h4><strong>Application Process</strong>:</h4>\r\n\r\n<ol>\r\n	<li><strong>Research</strong>: Begin by researching the scholarship options available for your intended program and institution.</li>\r\n	<li><strong>Prepare Documents</strong>: Typically, you will need to submit:\r\n	<ul>\r\n		<li>Academic transcripts</li>\r\n		<li>Letters of recommendation</li>\r\n		<li>Personal statement or essay</li>\r\n		<li>Proof of English proficiency (TOEFL/IELTS)</li>\r\n		<li>Standardized test scores (if required)</li>\r\n	</ul>\r\n	</li>\r\n	<li><strong>Submit Application</strong>: Follow the scholarship application guidelines provided by the sponsoring organization or university.</li>\r\n	<li><strong>Interview</strong>: Some scholarships may require an interview process to assess the candidate&#39;s suitability.</li>\r\n</ol>\r\n\r\n<h4><strong>Key Dates</strong>:</h4>\r\n\r\n<ul>\r\n	<li><strong>Application Deadlines</strong>: Scholarship deadlines typically vary, with most falling between <strong>January and March</strong> for Fall admissions.</li>\r\n	<li><strong>Notification</strong>: Applicants are usually notified about scholarship awards by <strong>May</strong> or <strong>June</strong>.</li>\r\n</ul>\r\n\r\n<h4><strong>Types of Scholarships</strong>:</h4>\r\n\r\n<ul>\r\n	<li><strong>Merit-Based Scholarships</strong>: Awarded based on academic excellence, research work, or achievements in extracurricular activities.</li>\r\n	<li><strong>Need-Based Scholarships</strong>: Offered to students demonstrating financial need.</li>\r\n	<li><strong>Subject-Specific Scholarships</strong>: Provided for students studying specific subjects or fields of study (e.g., STEM, arts, business).</li>\r\n	<li><strong>University-Specific Scholarships</strong>: Many U.S. universities offer their own scholarships for international students, which may vary in eligibility and benefits.</li>\r\n</ul>\r\n\r\n<h4><strong>Important Considerations</strong>:</h4>\r\n\r\n<ul>\r\n	<li><strong>Visa Requirements</strong>: Scholarship recipients will need to apply for an appropriate U.S. student visa (usually an F-1 visa).</li>\r\n	<li><strong>Post-Graduation</strong>: Some scholarships may require recipients to return to their home country after completing their studies, while others may allow students to stay in the U.S. for work opportunities.</li>\r\n</ul>', 'us-scholarship1738311691.jpg', 1, '2025-01-31 01:46:30', '2025-01-31 02:36:31', 'The US Study Scholarship is a prestigious opportunity designed to provide financial assistance to international students seeking to pursue higher education in the United States. This scholarship aims to make education in the U.S. more...', 'us-scholarship', 3, 3, 1),
(10, 'Unlocking the Future', '<p>Asus Study provides an innovative platform designed to empower students and educators with cutting-edge technology. By combining powerful Asus devices with intuitive educational tools, we aim to create an enriched learning environment that fosters creativity, productivity, and collaboration. Whether you&#39;re studying from home or in the classroom, Asus Study offers the perfect solution to help you excel in your academic journey. Explore the world of knowledge, enhance your skills, and prepare for a brighter future with Asus Study.</p>', 'unlocking-the-future-of-learning-with-asus-study1738310965.jpg', 1, '2025-01-31 02:24:25', '2025-02-02 22:16:01', 'Asus Study provides an innovative platform designed to empower students and educators with cutting-edge technology.&nbsp;', 'unlocking-the-future', 2, 2, 2),
(11, 'Soluta velit molest', '<p>Asus Study provides an innovative platform designed to empower students and educators with cutting-edge technology. By combining powerful Asus devices with intuitive educational tools, we aim to create an enriched learning environment that fosters creativity, productivity, and collaboration. Whether you&#39;re studying from home or in the classroom, Asus Study offers the perfect solution to help you excel in your academic journey. Explore the world of knowledge, enhance your skills, and prepare for a brighter future with Asus Study.</p>', 'soluta-velit-molest1738311028.jpg', 1, '2025-01-31 02:24:50', '2025-01-31 06:07:35', 'Asus Study provides an innovative platform designed to empower students and educators with cutting-edge technology. By combining powerful Asus devices with intuitive educational tools, we aim to create an enriched learning environment that fosters creativ...', 'soluta-velit-molest', 5, 2, 1),
(12, 'Quasi nemo nostrum a', '<p>Asus Study provides an innovative platform designed to empower students and educators with cutting-edge technology. By combining powerful Asus devices with intuitive educational tools, we aim to create an enriched learning environment that fosters creativity, productivity, and collaboration. Whether you&#39;re studying from home or in the classroom, Asus Study offers the perfect solution to help you excel in your academic journey. Explore the world of knowledge, enhance your skills, and prepare for a brighter future with Asus Study.</p>', 'quasi-nemo-nostrum-a1738311013.jpg', 1, '2025-01-31 02:24:56', '2025-01-31 06:07:42', 'Asus Study provides an innovative platform designed to empower students and educators with cutting-edge technology. By combining powerful Asus devices with intuitive educational tools, we aim to create an enriched learning environment that fosters creativ...', 'quasi-nemo-nostrum-a', 2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `body` longtext DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `order` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `image`, `body`, `slug`, `order`, `created_at`, `updated_at`) VALUES
(3, 'Our Objective', 'doloribus-recusandae1738305679.jpg', '<p>The IELTS (International English Language Testing System) is jointly owned and run by four organizations: the British Council, IDP, IELTS Australia and Cambridge English Language Assessment. It is accepted not only by universities and corporations but by the immigration departments of several countries. There are two basic forms of the test&mdash;Academic and General. Both use the same Listening and Speaking sections, but they have different versions of the Reading and Writing Tests. The Academic Test, like the TOEFL, is for people who want to study at universities or colleges in English-speaking countries. The General Training Test is for employment, immigration, or high school purposes. IELTS results are designed to be simple and easy to understand. IELTS can be taken Paper or Computer based. IELTS scores are reported as band scores on a scale from 1 (the lowest) to 9 (the highest). IELTS tests are valid for two years following the test date.</p>', 'doloribus-recusandae', '69', '2025-01-31 00:56:19', '2025-02-02 22:27:47'),
(4, 'Our mission', 'sit-pariatur-quis-e1738307265.jpg', '<p>The IELTS (International English Language Testing System) is jointly owned and run by four organizations: the British Council, IDP, IELTS Australia and Cambridge English Language Assessment. It is accepted not only by universities and corporations but by the immigration departments of several countries. There are two basic forms of the test&mdash;Academic and General. Both use the same Listening and Speaking sections, but they have different versions of the Reading and Writing Tests. The Academic Test, like the TOEFL, is for people who want to study at universities or colleges in English-speaking countries. The General Training Test is for employment, immigration, or high school purposes. IELTS results are designed to be simple and easy to understand. IELTS can be taken Paper or Computer based. IELTS scores are reported as band scores on a scale from 1 (the lowest) to 9 (the highest). IELTS tests are valid for two years following the test date.</p>', 'sit-pariatur-quis-e', '52', '2025-01-31 01:05:33', '2025-02-02 22:26:56'),
(5, 'Our Aim', 'cool1738316118.jpg', '<p>The IELTS (International English Language Testing System) is jointly owned and run by four organizations: the British Council, IDP, IELTS Australia and Cambridge English Language Assessment. It is accepted not only by universities and corporations but by the immigration departments of several countries. There are two basic forms of the test&mdash;Academic and General. Both use the same Listening and Speaking sections, but they have different versions of the Reading and Writing Tests. The Academic Test, like the TOEFL, is for people who want to study at universities or colleges in English-speaking countries. The General Training Test is for employment, immigration, or high school purposes. IELTS results are designed to be simple and easy to understand. IELTS can be taken Paper or Computer based. IELTS scores are reported as band scores on a scale from 1 (the lowest) to 9 (the highest). IELTS tests are valid for two years following the test date.</p>', 'cool', '78', '2025-01-31 03:50:18', '2025-02-02 22:27:56');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` text DEFAULT NULL,
  `title` text DEFAULT NULL,
  `youtube_url` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `order_no` int(11) DEFAULT NULL,
  `button_text` varchar(255) DEFAULT NULL,
  `button_url` text DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image_1` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `heading`, `title`, `youtube_url`, `image`, `status`, `order_no`, `button_text`, `button_url`, `created_by`, `updated_by`, `created_at`, `updated_at`, `image_1`) VALUES
(16, 'MakeYour Own World', 'Grab your opportunity to study abroad !!', 'https://www.cirilonusi.info', '1738137271.6799deb70f643.jpg', 1, 1, 'Deleniti consequuntu', 'https://www.zigedelifida.us', 'Prof. Oscar Renner', 'Prof. Oscar Renner', '2025-01-29 01:37:13', '2025-01-29 02:09:31', '1738137271.6799deb77c059.png'),
(18, 'MakeYour Own World', 'Grab your opportunity to study abroad !!', NULL, '1738137297.6799ded1e8859.jpg', 1, 2, NULL, NULL, 'Prof. Oscar Renner', NULL, '2025-01-29 02:09:58', '2025-01-29 02:09:58', '1738137298.6799ded231420.png');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `dob` date NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `post_code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `image`, `dob`, `phone`, `email`, `nationality`, `state`, `address`, `post_code`, `created_at`, `updated_at`) VALUES
(1, 'Melissa Hinton', '1738751356.jpg', '1990-10-13', '+1 (207) 176-2333', 'terobihi@mailinator.com', 'Quae dolor iure quia', 'Velit at neque ullam', 'Ipsa corrupti et e', 'Vero labore fugiat', '2025-02-05 04:44:17', '2025-02-05 04:44:17'),
(2, 'Amethyst Zamora', NULL, '2013-09-07', '+1 (589) 801-8565', 'goqisana@mailinator.com', 'Accusantium voluptat', 'Anim in odit repelle', 'Earum similique quas', 'Excepturi debitis in', '2025-02-05 04:45:53', '2025-02-05 04:45:53');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `about` varchar(255) DEFAULT NULL,
  `body` text DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `about`, `body`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Susan Paudel', 'Backend Developer', '<p>Learning to code has been a life-changing journey. It&rsquo;s not just about writing lines of code; it&rsquo;s about solving problems, thinking critically, and creating something meaningful from nothing.</p>', 'susan-paudel1738138041.jpg', 1, '2025-01-27 01:55:54', '2025-01-29 02:22:21'),
(2, 'Naresh Chaudahary', 'Senior Developer', '<p>Every error taught me patience, and every successful run fueled my confidence. Coding empowers you to turn your ideas into reality and equips you with a skill that&rsquo;s invaluable in today&rsquo;s digital age.</p>', 'naresh-chaudahary1738138059.jpg', 1, '2025-01-27 01:56:27', '2025-01-29 02:22:39'),
(3, 'Raaz Dai', 'Senior Developer', '<p>Whether you&rsquo;re building apps, automating tasks, or exploring AI, coding opens endless possibilities.</p>', 'raaz-dai1738146473.jpg', 1, '2025-01-27 01:57:00', '2025-01-29 04:42:53'),
(4, 'Teacher', 'Prinicipal', '<p>This is a place to study.</p>', 'teacher1738138026.jpg', 1, '2025-01-29 02:22:06', '2025-01-29 02:22:06');

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

CREATE TABLE `universities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `order` varchar(255) DEFAULT NULL,
  `ranking` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `universities`
--

INSERT INTO `universities` (`id`, `name`, `slug`, `description`, `image`, `country`, `city`, `state`, `order`, `ranking`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'University of Luxemborg', 'university-of-luxemborg', '<p>rqwef</p>', 'universities/garth-huber-1737717297.jpeg', 'SA', 'Enim sint voluptate', 'Sed voluptatem eius', '1', '16', 0, '2025-01-24 05:29:57', '2025-02-04 03:59:25'),
(2, 'University of Samao', 'university-of-samao', '<p>sxcasccx</p>', NULL, 'SA', 'Sit fugit qui Nam', 'In harum vel id reru', '2', '40', 0, '2025-01-24 05:30:04', '2025-02-04 03:59:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Prof. Oscar Renner', 'audrey24@example.org', '2025-01-24 04:43:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ouPtom6X3O4csDQF4gn2bEWCUvIpZsSce3SP040tL0ecocWVjkHLkGgfiQDW', '2025-01-24 04:43:02', '2025-01-24 04:43:02'),
(2, 'Keira Hodkiewicz', 'waino31@example.net', '2025-01-24 04:43:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'cbriLcbprt', '2025-01-24 04:43:02', '2025-01-24 04:43:02'),
(3, 'Mr. Tito Pfannerstill DVM', 'annabelle.stroman@example.org', '2025-01-24 04:43:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'gOdEa0buWD', '2025-01-24 04:43:02', '2025-01-24 04:43:02'),
(4, 'Mr. Sigrid Ernser PhD', 'jorge.beahan@example.com', '2025-01-24 04:43:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'LFGz01F7yh', '2025-01-24 04:43:02', '2025-01-24 04:43:02'),
(5, 'Cruz Treutel', 'qgoldner@example.net', '2025-01-24 04:43:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'U2iIH1czcx', '2025-01-24 04:43:02', '2025-01-24 04:43:02'),
(6, 'Jackie Kreiger', 'ooreilly@example.net', '2025-01-24 04:43:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'hsl91Ha2Po', '2025-01-24 04:43:02', '2025-01-24 04:43:02'),
(7, 'Giovanny Klein', 'angeline83@example.org', '2025-01-24 04:43:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'BaeVaJqHiy', '2025-01-24 04:43:02', '2025-01-24 04:43:02'),
(8, 'Bertha Kunze DDS', 'ziemann.jake@example.org', '2025-01-24 04:43:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'dGQ6yIW1NR', '2025-01-24 04:43:02', '2025-01-24 04:43:02'),
(9, 'Marisol Wehner', 'hartmann.aiden@example.org', '2025-01-24 04:43:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'jgAG9sOoTL', '2025-01-24 04:43:02', '2025-01-24 04:43:02'),
(10, 'Julia Considine', 'mafalda.shanahan@example.com', '2025-01-24 04:43:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'DbCh8SWEkH', '2025-01-24 04:43:02', '2025-01-24 04:43:02'),
(11, 'Miss Myriam Dietrich V', 'bechtelar.adella@example.org', '2025-01-27 23:06:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'JaRD4xVL4d', '2025-01-27 23:06:39', '2025-01-27 23:06:39'),
(12, 'Maida Dach', 'macey.okon@example.com', '2025-01-27 23:06:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'BUDwbVsXjx', '2025-01-27 23:06:39', '2025-01-27 23:06:39'),
(13, 'Mr. Garett Trantow', 'german51@example.com', '2025-01-27 23:06:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'gPPii2H75D', '2025-01-27 23:06:39', '2025-01-27 23:06:39'),
(14, 'Miss Dessie Russel', 'fredrick.swift@example.org', '2025-01-27 23:06:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'yDbaQCCTNC', '2025-01-27 23:06:39', '2025-01-27 23:06:39'),
(15, 'Donnie McDermott', 'ilene.spinka@example.org', '2025-01-27 23:06:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'L398FKnzvK', '2025-01-27 23:06:39', '2025-01-27 23:06:39'),
(16, 'Afton Turcotte', 'bogan.tyrel@example.net', '2025-01-27 23:06:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'jqzF4Ke6yS', '2025-01-27 23:06:39', '2025-01-27 23:06:39'),
(17, 'Tyler Witting', 'beahan.cletus@example.com', '2025-01-27 23:06:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '6cdsC7zznL', '2025-01-27 23:06:39', '2025-01-27 23:06:39'),
(18, 'Augustine Moen', 'durward.mohr@example.org', '2025-01-27 23:06:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'afoRiSx6Am', '2025-01-27 23:06:39', '2025-01-27 23:06:39'),
(19, 'Brenna Mayer', 'pollich.muhammad@example.org', '2025-01-27 23:06:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'VeOxdMJRpk', '2025-01-27 23:06:39', '2025-01-27 23:06:39'),
(20, 'Dr. Carlos O\'Connell', 'hoeger.karl@example.org', '2025-01-27 23:06:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'b2l5gv9yAg', '2025-01-27 23:06:39', '2025-01-27 23:06:39'),
(21, 'Merlin Macejkovic', 'flemke@example.net', '2025-01-27 23:08:12', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'V5d0WEJgzB', '2025-01-27 23:08:12', '2025-01-27 23:08:12'),
(22, 'Angelina Labadie', 'fsatterfield@example.com', '2025-01-27 23:08:12', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'TyiDKjNNQC', '2025-01-27 23:08:12', '2025-01-27 23:08:12'),
(23, 'Rosie Fahey', 'mpfeffer@example.com', '2025-01-27 23:08:12', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '8NfdvQ0gtZ', '2025-01-27 23:08:12', '2025-01-27 23:08:12'),
(24, 'Neal Cole', 'rudy59@example.org', '2025-01-27 23:08:12', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'QDeQd04eiK', '2025-01-27 23:08:12', '2025-01-27 23:08:12'),
(25, 'Tanner Schuppe', 'halie21@example.com', '2025-01-27 23:08:12', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'oT6hTrYIft', '2025-01-27 23:08:12', '2025-01-27 23:08:12'),
(26, 'Dr. Magdalen Feest', 'williamson.deon@example.org', '2025-01-27 23:08:12', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '9G0BjFiXz0', '2025-01-27 23:08:12', '2025-01-27 23:08:12'),
(27, 'Felton Bernier', 'wyman.gilda@example.com', '2025-01-27 23:08:12', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'gqY6sK8oWi', '2025-01-27 23:08:12', '2025-01-27 23:08:12'),
(28, 'Jaqueline O\'Connell', 'clemmie.wiza@example.net', '2025-01-27 23:08:12', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'LKd6S85AFl', '2025-01-27 23:08:12', '2025-01-27 23:08:12'),
(29, 'Shaniya Wyman Sr.', 'christiansen.neil@example.org', '2025-01-27 23:08:12', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pRnkl6xAWL', '2025-01-27 23:08:12', '2025-01-27 23:08:12'),
(30, 'Dr. Roberto Ondricka', 'rjast@example.org', '2025-01-27 23:08:12', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '37onVJQXHx', '2025-01-27 23:08:12', '2025-01-27 23:08:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievements`
--
ALTER TABLE `achievements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `courses_slug_unique` (`slug`);

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `destinations_slug_unique` (`slug`);

--
-- Indexes for table `destination_costs`
--
ALTER TABLE `destination_costs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `destination_costs_destination_id_foreign` (`destination_id`);

--
-- Indexes for table `destination_courses`
--
ALTER TABLE `destination_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `destination_courses_destination_id_foreign` (`destination_id`);

--
-- Indexes for table `destination_facts`
--
ALTER TABLE `destination_facts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destination_faqs`
--
ALTER TABLE `destination_faqs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `destination_faqs_destination_id_foreign` (`destination_id`);

--
-- Indexes for table `destination_healths`
--
ALTER TABLE `destination_healths`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destination_jobs`
--
ALTER TABLE `destination_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destination_key_facts`
--
ALTER TABLE `destination_key_facts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `destination_key_facts_destination_id_foreign` (`destination_id`);

--
-- Indexes for table `destination_reasons`
--
ALTER TABLE `destination_reasons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destination_scholarships`
--
ALTER TABLE `destination_scholarships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destination_tests`
--
ALTER TABLE `destination_tests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `destination_tests_destination_id_foreign` (`destination_id`);

--
-- Indexes for table `destination_universities`
--
ALTER TABLE `destination_universities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `destination_universities_destination_id_foreign` (`destination_id`);

--
-- Indexes for table `destination_visa_processes`
--
ALTER TABLE `destination_visa_processes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `english_tests`
--
ALTER TABLE `english_tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `highlights`
--
ALTER TABLE `highlights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `infos`
--
ALTER TABLE `infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `institutes`
--
ALTER TABLE `institutes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language_tests`
--
ALTER TABLE `language_tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `newsletters_email_unique` (`email`);

--
-- Indexes for table `old_pages`
--
ALTER TABLE `old_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_title_unique` (`title`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`),
  ADD KEY `pages_added_by_foreign` (`added_by`);

--
-- Indexes for table `page_contents`
--
ALTER TABLE `page_contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_contents_page_id_foreign` (`page_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `previous_courses`
--
ALTER TABLE `previous_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questionaires`
--
ALTER TABLE `questionaires`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scholarships`
--
ALTER TABLE `scholarships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `universities`
--
ALTER TABLE `universities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `universities_slug_unique` (`slug`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achievements`
--
ALTER TABLE `achievements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=727;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `destination_costs`
--
ALTER TABLE `destination_costs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `destination_courses`
--
ALTER TABLE `destination_courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `destination_facts`
--
ALTER TABLE `destination_facts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `destination_faqs`
--
ALTER TABLE `destination_faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `destination_healths`
--
ALTER TABLE `destination_healths`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `destination_jobs`
--
ALTER TABLE `destination_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `destination_key_facts`
--
ALTER TABLE `destination_key_facts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `destination_reasons`
--
ALTER TABLE `destination_reasons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `destination_scholarships`
--
ALTER TABLE `destination_scholarships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `destination_tests`
--
ALTER TABLE `destination_tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `destination_universities`
--
ALTER TABLE `destination_universities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `destination_visa_processes`
--
ALTER TABLE `destination_visa_processes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `english_tests`
--
ALTER TABLE `english_tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `highlights`
--
ALTER TABLE `highlights`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `infos`
--
ALTER TABLE `infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `institutes`
--
ALTER TABLE `institutes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `language_tests`
--
ALTER TABLE `language_tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `old_pages`
--
ALTER TABLE `old_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `page_contents`
--
ALTER TABLE `page_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `previous_courses`
--
ALTER TABLE `previous_courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questionaires`
--
ALTER TABLE `questionaires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `scholarships`
--
ALTER TABLE `scholarships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `universities`
--
ALTER TABLE `universities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `destination_costs`
--
ALTER TABLE `destination_costs`
  ADD CONSTRAINT `destination_costs_destination_id_foreign` FOREIGN KEY (`destination_id`) REFERENCES `destinations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `destination_courses`
--
ALTER TABLE `destination_courses`
  ADD CONSTRAINT `destination_courses_destination_id_foreign` FOREIGN KEY (`destination_id`) REFERENCES `destinations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `destination_faqs`
--
ALTER TABLE `destination_faqs`
  ADD CONSTRAINT `destination_faqs_destination_id_foreign` FOREIGN KEY (`destination_id`) REFERENCES `destinations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `destination_key_facts`
--
ALTER TABLE `destination_key_facts`
  ADD CONSTRAINT `destination_key_facts_destination_id_foreign` FOREIGN KEY (`destination_id`) REFERENCES `destinations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `destination_tests`
--
ALTER TABLE `destination_tests`
  ADD CONSTRAINT `destination_tests_destination_id_foreign` FOREIGN KEY (`destination_id`) REFERENCES `destinations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `destination_universities`
--
ALTER TABLE `destination_universities`
  ADD CONSTRAINT `destination_universities_destination_id_foreign` FOREIGN KEY (`destination_id`) REFERENCES `destinations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `pages_added_by_foreign` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `page_contents`
--
ALTER TABLE `page_contents`
  ADD CONSTRAINT `page_contents_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
