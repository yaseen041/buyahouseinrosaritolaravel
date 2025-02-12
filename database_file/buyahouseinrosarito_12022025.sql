-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 12, 2025 at 08:41 AM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buyahouseinrosarito`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone_no` varchar(255) DEFAULT NULL,
  `permissions` varchar(255) DEFAULT NULL,
  `type` tinyint DEFAULT '1' COMMENT '0= super_admin, 1 = staff user',
  `status` tinyint NOT NULL DEFAULT '1' COMMENT '0 = inactive, 1 = active',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `email`, `password`, `phone_no`, `permissions`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$12$3a8mjCQxD54t89r/w7STAOl3xBFdmmByfEj70DV92knLbkdNfaLU6', NULL, NULL, 0, 1, '2022-04-15 12:25:42', '2023-12-26 12:03:02');

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

DROP TABLE IF EXISTS `agents`;
CREATE TABLE IF NOT EXISTS `agents` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `name`, `designation`, `phone`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Emma Brown', 'Senior Real Estate Agent', '+1 (555) 123-4567', '1718273923.jpg', 'With over 10 years of experience in the New York real estate market, I specialize in luxury apartments and commercial properties.', '2024-06-13 10:18:43', '2024-06-13 10:18:43'),
(2, 'James Johnson', 'Property Consultant', '+61 1234 5678', '1718273968.jpg', 'I have a passion for matching clients with their dream homes in Sydney. Let me help you find the perfect property.', '2024-06-13 10:19:28', '2024-06-13 10:19:28'),
(3, 'Sarah White', 'Real Estate Broker', '+1 (415) 987-6543', '1718274018.jpg', 'Based in San Francisco, I provide personalized service to ensure smooth transactions and happy clients.', '2024-06-13 10:20:18', '2024-06-13 10:20:18'),
(4, 'Lucas Silva', 'Senior Sales Manager', '+55 11 98765-4321', '1718274057.jpg', 'Com vasta experiência no mercado imobiliário de São Paulo, estou aqui para ajudá-lo a encontrar sua nova casa', '2024-06-13 10:20:57', '2024-06-13 10:20:57'),
(5, 'Takahiro Yamamoto', 'Property Specialist', '+81 90-1234-5678', '1718274102.jpg', '東京の不動産市場に精通しており、あなたのニーズに合った理想の物件を見つけるのをお手伝いします', '2024-06-13 10:21:42', '2024-06-13 10:21:42'),
(6, 'Anna Müller', 'Real Estate Advisor', '+49 30 12345678', '1718274148.jpg', 'Ich biete Ihnen umfassende Beratung beim Kauf oder Verkauf Ihrer Immobilie in Berlin. Kontaktieren Sie mich gerne!', '2024-06-13 10:22:28', '2024-06-13 10:22:28'),
(7, 'Carlos González', 'Property Manager', '+52 55 1234 5678', '1718274185.jpg', 'Con más de 15 años de experiencia en el mercado inmobiliario de la Ciudad de México, estoy aquí para ayudarte con tus necesidades.', '2024-06-13 10:23:05', '2024-06-13 10:23:05'),
(8, 'Julia Schmidt', 'Real Estate Agent', '+49 89 87654321', '1718274222.jpg', 'Als Immobilienmaklerin in München bringe ich Sie in Ihr neues Zuhause. Kontaktieren Sie mich für professionelle Beratung.', '2024-06-13 10:23:42', '2024-06-13 10:23:42'),
(9, 'Diego Fernandez', 'Senior Property Consultant', '+54 11 8765-4321', '1718274259.jpg', 'Con amplia experiencia en el mercado inmobiliario de Buenos Aires, estoy aquí para ayudarlo a encontrar la propiedad perfecta.', '2024-06-13 10:24:19', '2024-06-13 10:24:19'),
(10, 'Sophie Dupont', 'Real Estate Broker', '+33 1 2345 6789', '1718274307.jpg', 'Fort de nombreuses années d\'expérience dans le marché immobilier de Paris, je suis à votre service pour trouver votre futur chez-vous.', '2024-06-13 10:25:07', '2024-06-13 10:25:07');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE IF NOT EXISTS `blogs` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `tier` tinyint NOT NULL DEFAULT '0',
  `parent_id` int DEFAULT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `category_id` int DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `author_id` int DEFAULT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci,
  `post_url` text COLLATE utf8mb4_unicode_ci,
  `featured_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0 = Draft, 1 = Published',
  `disable_crawl` tinyint NOT NULL DEFAULT '0' COMMENT '0 = No, 1 = Yes',
  `meta_title` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `fb_image` text COLLATE utf8mb4_unicode_ci,
  `fb_title` text COLLATE utf8mb4_unicode_ci,
  `fb_description` text COLLATE utf8mb4_unicode_ci,
  `twitter_title` text COLLATE utf8mb4_unicode_ci,
  `twitter_description` text COLLATE utf8mb4_unicode_ci,
  `twitter_image` text COLLATE utf8mb4_unicode_ci,
  `json_ld_code` text COLLATE utf8mb4_unicode_ci,
  `publish_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `tier`, `parent_id`, `title`, `category_id`, `description`, `author_id`, `slug`, `post_url`, `featured_image`, `status`, `disable_crawl`, `meta_title`, `meta_description`, `meta_keywords`, `fb_image`, `fb_title`, `fb_description`, `twitter_title`, `twitter_description`, `twitter_image`, `json_ld_code`, `publish_date`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Rise of Predatory Student Loans', 2, '<h1 style=\"text-align:center;\">The Rise of Predatory Student Loans:&nbsp;<br><strong>A National Crisis in Education and Debt</strong></h1><p>As of June 2024, Americans owe approximately <strong>$1.6 trillion</strong> in student loans, marking a <strong>42% increase</strong> over the past decade (<a href=\"https://www.pewresearch.org/short-reads/2024/09/18/facts-about-student-loans/\"><span style=\"color:windowtext;\">Pew Research Center</span></a>). This debt category now ranks as the <strong>second-largest in the U.S.</strong>, behind mortgages.&nbsp;</p><p>This surge stems from rapidly rising tuition costs and widespread college enrollment. However, the burden is disproportionately borne by students attending <strong>for-profit colleges</strong> or falling victim to <strong>predatory lending practices</strong>.</p><h2 style=\"text-align:center;\">Escalating Student Loan Debt</h2><figure class=\"image\"><a href=\"https://www.statista.com/chart/24477/outstanding-value-of-us-student-loans/\" target=\"_blank\" rel=\"nofollow\"><img style=\"aspect-ratio:558/558;\" src=\"https://defenseclaims.com/portal/public/admin_assets/editorimages/image_1734442887.jpeg\" alt=\"Escalating Student Loan Debt\" width=\"558\" height=\"558\"></a></figure><h2><span style=\"color:windowtext;font-size:12.0pt;\">As of June 2024, Americans owe approximately <strong>$1.6 trillion</strong> in student loans, marking a <strong>42% increase</strong> over the past decade (</span><a href=\"https://www.pewresearch.org/short-reads/2024/09/18/facts-about-student-loans/\" target=\"_blank\" rel=\"nofollow\"><span style=\"font-size:12.0pt;\">Source: Pew Research Center</span></a><span style=\"color:windowtext;font-size:12.0pt;\">). This debt category now ranks as the <strong>second-largest in the U.S.</strong>, behind mortgages.&nbsp;</span><a href=\"https://www.statista.com/chart/24477/outstanding-value-of-us-student-loans/\" target=\"_blank\" rel=\"nofollow\"><span style=\"font-size:12.0pt;\">(Source: Statista)</span></a></h2><h2><span style=\"color:windowtext;font-size:12.0pt;\">This surge stems from rapidly rising tuition costs and widespread college enrollment. However, the burden is disproportionately borne by students attending <strong>for-profit colleges</strong> or falling victim to <strong>predatory lending practices</strong>.</span></h2><h2 style=\"text-align:center;\">Declining Educational Performance</h2><figure class=\"image\"><a href=\"https://www.pewresearch.org/short-reads/2017/02/15/u-s-students-internationally-math-science/\" target=\"_blank\" rel=\"nofollow\"><img style=\"aspect-ratio:719/429;\" src=\"https://defenseclaims.com/portal/public/admin_assets/editorimages/image_1734442736.png\" alt=\"Declining Educational Performance\" width=\"719\" height=\"429\"></a></figure><h2 style=\"text-align:center;\">Declining Educational Performance</h2><p>International assessments reveal a troubling trend: U.S. students lag far behind their global counterparts, especially in <strong>math</strong> and <strong>science</strong>. In the 2015 <a href=\"https://www.pewresearch.org/short-reads/2017/02/15/u-s-students-internationally-math-science/\" target=\"_blank\" rel=\"nofollow\"><strong>Program for International Student Assessment (PISA),</strong></a> U.S. 15-year-olds ranked <strong>38th in math</strong> and <strong>24th in science</strong> out of 71 countries.</p><p>By 2023, the <strong>Trends in International Mathematics and Science Study (TIMSS)</strong> reported significant declines in math performance among both fourth and eighth graders (<a href=\"https://www.wsj.com/us-news/education/us-student-test-scores-covid-impact-bf3ec65a\" target=\"_blank\" rel=\"nofollow\">The Wall Street Journal</a>).</p><h2 style=\"text-align:center;\">Global Comparisons</h2><p>Education systems in countries like Finland, Norway, and Singapore consistently outperform the U.S. These nations benefit from robust educational frameworks emphasizing <strong>equity</strong>, <strong>teacher quality</strong>, and <strong>student outcomes</strong> (<a href=\"https://www.datapandas.org/ranking/education-rankings-by-country/\" target=\"_blank\" rel=\"nofollow\">Data Pandas</a>).</p><h2 style=\"text-align:center;\">Economic Repercussions of Mounting Student Debt</h2><p>The combination of mounting <strong>student loan debt</strong> and subpar <strong>educational outcomes</strong> has profound economic repercussions:</p><ol><li><strong>Delayed Financial Milestones</strong>: High debt levels hinder graduates from buying homes, starting families, or saving for retirement.</li><li><strong>Economic Productivity</strong>: A workforce ill-prepared for global competition stifles innovation and economic growth.</li><li><strong>Wealth Inequality</strong>: Disparities in loan burdens exacerbate socioeconomic divides, particularly among marginalized communities.</li></ol><h2 style=\"text-align:center;\">The Emerging Threat from Global Competitors</h2><figure class=\"image\"><a href=\"https://www.forbes.com/sites/arielcohen/2024/04/11/stem-education-reform-needed-to-compete-with-china/\" target=\"_blank\" rel=\"nofollow\"><img style=\"aspect-ratio:467/464;\" src=\"https://defenseclaims.com/portal/public/admin_assets/editorimages/image_1734442738.jpeg\" alt=\"The Emerging Threat from Global Competitors\" width=\"467\" height=\"464\"></a></figure><p>While the U.S. grapples with escalating student debt and declining educational performance, nations like <strong>China</strong>, <strong>India</strong>, and <strong>Mexico</strong> are positioning themselves to outpace the United States through strategic investments in education and workforce development. Without significant reforms, the U.S. risks losing its global competitive edge in innovation, technology, and economic growth.</p><h3 style=\"text-align:center;\"><a href=\"https://www.forbes.com/sites/arielcohen/2024/04/11/stem-education-reform-needed-to-compete-with-china/\" target=\"_blank\" rel=\"nofollow\"><strong><u>China: STEM and Innovation Leadership</u></strong></a></h3><p>China has aggressively invested in <strong>STEM education</strong>, now producing over <strong>1.2 million engineers annually</strong>, compared to the U.S.\'s approximately 130,000. It has overtaken the U.S. in research paper publications and patent filings, signaling its dominance in cutting-edge industries like <strong>artificial intelligence (AI)</strong> and <strong>renewable energy</strong>.</p><h3 style=\"text-align:center;\">India: A Global IT Powerhouse</h3><figure class=\"image\"><a href=\"https://www.statista.com/topics/2256/it-industry-in-india/\" target=\"_blank\" rel=\"nofollow\"><img style=\"aspect-ratio:489/490;\" src=\"https://defenseclaims.com/portal/public/admin_assets/editorimages/image_1734442958.jpeg\" alt=\"India Vs US in IT Dominance \" width=\"489\" height=\"490\"></a></figure><p>India\'s focus on affordable education and digital learning platforms has created a vast, highly skilled, and <strong>English-speaking workforce</strong>. The country\'s booming <strong>IT sector</strong>, with giants like Infosys and TCS, supports global businesses while driving its own economic growth.</p><ul><li><span style=\"font-size:11.0pt;\"><strong>Source</strong>: India\'s Growing IT Dominance</span></li></ul><h3 style=\"text-align:center;\"><a href=\"https://www.worldbank.org/en/country/mexico/overview\" target=\"_blank\" rel=\"nofollow\"><strong><u>Mexico: A Rising Manufacturing and Trade Competitor</u></strong></a></h3><figure class=\"image\"><a href=\"https://www.worldbank.org/en/country/mexico/overview\"><img style=\"aspect-ratio:479/479;\" src=\"https://defenseclaims.com/portal/public/admin_assets/editorimages/image_1734442983.jpeg\" alt=\"Mexico map affordable education and cheap workforce infographic \" width=\"479\" height=\"479\"></a></figure><p><span style=\"font-size:11.0pt;\">Mexico\'s strategic location and trade agreements, such as the <strong>USMCA</strong>, position it as a key competitor to U.S. manufacturing. Coupled with investments in <strong>technical and vocational training</strong>, Mexico is building a robust workforce capable of supporting industries like automotive and aerospace, and of course, compared to the US, the education is cheap and affordable.</span></p><hr><h3 style=\"text-align:center;\">Economic Implications for the U.S.</h3><p>As these emerging economies prioritize education and workforce readiness, the U.S. risks falling behind. The economic repercussions are significant:</p><ol><li><strong>Loss of Technological Leadership</strong>: With countries like China leading in AI and robotics, the U.S.\'s influence in global innovation is at risk.</li><li><strong>Workforce Decline</strong>: A less-prepared workforce diminishes the nation’s ability to compete in high-growth sectors, further stifling economic productivity.</li><li><strong>Trade and Industry Shifts</strong>: Manufacturing hubs like Mexico offer cost-efficient alternatives to U.S. industries, attracting international investments that might otherwise boost the American economy.</li></ol><hr><h2 style=\"text-align:center;\">Conclusion: The Need for Urgent Reform</h2><p>To maintain its standing as a global leader, the U.S. must urgently address its <strong>education quality gap</strong> and implement <strong>student loan reforms</strong>. Strategic investments in affordable education, STEM programs, and equitable access to higher learning are critical.</p><p>Programs like <strong>Borrower Defense to Repayment</strong> offer relief to borrowers affected by predatory institutions, but systemic changes are essential to prevent further decline. The stakes are high: without immediate action, the U.S. risks being overtaken by nations seizing the opportunities the U.S. has failed to address.</p><p>Addressing the challenges of rising student debt and declining educational performance is crucial for the United States to enhance individual financial well-being and sustain its global economic competitiveness. Strategic investments in education quality and comprehensive student loan reforms are essential steps toward mitigating this crisis, and <a href=\"https://defenseclaims.com/\"><strong>Borrower Defense to Repayment is helping in that effort.</strong></a></p><h3 style=\"text-align:center;\">High-Profile Documentaries Highlighting Predatory Practices in Education</h3><p>Here’s a curated list of must-watch documentaries on the predatory practices of for-profit colleges. Each documentary sheds light on how these institutions have exploited vulnerable students, leading to massive student debt and systemic issues in higher education.&nbsp;</p><hr><h3 style=\"text-align:center;\"><a href=\"https://www.youtube.com/watch?v=ULUtX4fZKlk\" target=\"_blank\" rel=\"nofollow\"><u>1. College, Inc. (Full Documentary) | FRONTLINE</u></a></h3><p><strong>Synopsis</strong>: This documentary investigates the promise and explosive growth of the for-profit higher education industry. It examines the tension between for-profits\' claims of helping underserved student populations and critics\' allegations that they churn out worthless degrees and leave students drowning in debt.</p><figure class=\"image\"><a href=\"https://www.youtube.com/watch?v=ULUtX4fZKlk\" target=\"_blank\" rel=\"nofollow\"><img style=\"aspect-ratio:538/302;\" src=\"https://defenseclaims.com/portal/public/admin_assets/editorimages/image_1734443019.jpeg\" alt=\"PBS Frontline Colleges Inc\" width=\"538\" height=\"302\"></a></figure><hr><h3 style=\"text-align:center;\"><a href=\"https://www.pbs.org/wgbh/frontline/documentary/a-subprime-education/\" target=\"_blank\" rel=\"nofollow\"><u>2. A Subprime Education | FRONTLINE</u></a></h3><p><strong>Synopsis: </strong>FRONTLINE investigates allegations of fraud and predatory behavior in the troubled for-profit college industry. The documentary highlights how these schools target vulnerable populations and leave students with insurmountable debt.</p><figure class=\"image\"><a href=\"https://www.pbs.org/wgbh/frontline/documentary/a-subprime-education/\" target=\"_blank\" rel=\"nofollow\"><img style=\"aspect-ratio:720/314;\" src=\"https://defenseclaims.com/portal/public/admin_assets/editorimages/image_1734443046.jpeg\" alt=\"PBS Frontline A Subprime Education \" width=\"720\" height=\"314\"></a></figure><hr><figure class=\"table\"><table><tbody><tr><td style=\"border:1.0pt solid windowtext;padding:0in 5.4pt;vertical-align:top;width:269.75pt;\"><h3 style=\"text-align:center;\"><a href=\"https://www.imdb.com/title/tt3723750/\" target=\"_blank\" rel=\"nofollow\"><u>3. Fail State (2017)</u></a></h3><p><strong>Synopsis</strong>: Executive produced by <strong>Dan Rather</strong>, this documentary examines the dark side of American higher education. It chronicles decades of policy decisions that allowed the rise of a predatory for-profit college industry. With comparisons to the subprime mortgage crisis, it explores how these institutions exploited millions of low-income and minority students.</p><p>&nbsp;</p></td><td style=\"border-bottom-style:solid;border-color:windowtext;border-left-style:none;border-right-style:solid;border-top-style:solid;border-width:1.0pt;padding:0in 5.4pt;vertical-align:top;width:269.75pt;\"><figure class=\"image\"><a href=\"https://www.imdb.com/title/tt3723750/\" target=\"_blank\" rel=\"nofollow\"><img style=\"aspect-ratio:174/260;\" src=\"https://defenseclaims.com/portal/public/admin_assets/editorimages/image_1734442736.jpeg\" alt=\"Fail State Documentary by Dan Rather \" width=\"174\" height=\"260\"></a></figure></td></tr></tbody></table></figure><hr><p style=\"text-align:center;\"><span style=\"color:#0F4761;font-size:20.0pt;\">Borrower Defense to Repayment:&nbsp;</span><br><span style=\"color:#0F4761;font-size:20.0pt;\">A Critical Lifeline for Defrauded Students</span></p><p>While systemic reform of higher education is essential, the <a href=\"https://studentaid.gov/borrower-defense/\" target=\"_blank\" rel=\"nofollow\"><strong>Borrower Defense to Repayment (BDR) program</strong></a> serves as a crucial lifeline for students who have fallen victim to the predatory practices of for-profit colleges and other deceptive institutions. This federal program provides student loan forgiveness to borrowers who can <strong><u>prove </u></strong>their schools engaged in misconduct.</p><hr><h2 style=\"text-align:center;\">Key Misconduct Categories Recognized Under Borrower Defense</h2><p>Institutions engaged in predatory behavior often exploit students through a range of deceptive practices, including:</p><ul><li><a href=\"https://defenseclaims.com/rise-of-predatory-student-loans/spot-college-job-scams\"><strong>Misrepresenting Job Placement Rates</strong></a><strong> or Accreditation Status</strong>: Institutions might falsely claim high job placement rates or mislead students about the program’s accreditation, which affects employability and credit transfers.</li><li><a href=\"https://defenseclaims.com/rise-of-predatory-student-loans/tricked-by-recruitment-lies\"><strong>Aggressive Recruiting Tactics</strong></a>: Schools employ high-pressure sales techniques, such as false urgency (“Seats are filling fast!”) or financial aid threats (“You’ll lose your aid if you don’t sign up now.”).</li><li><strong>Job Assistance Promises</strong>: Misleading claims like offering resume assistance, mock interviews, or access to exclusive internships are used to entice students, but such services often fall short or are nonexistent.</li><li><a href=\"https://defenseclaims.com/rise-of-predatory-student-loans/spot-college-job-scams\"><strong>Job Placement Claims</strong></a>: Statements like “90% of our graduates find jobs within six months” or false relationships with prominent employers are common tactics.</li><li><strong>Misrepresentation of Program Costs</strong>: Schools might initially quote one tuition price, only for students to discover additional hidden costs or requirements to take extra classes to graduate.</li><li><strong>False Income Claims</strong>: Promising inflated earning potential upon graduation is another deceptive method used to lure prospective students.</li><li><strong>Accreditation Promises</strong>: Falsely assuring that credits will transfer seamlessly or that programs meet licensing requirements is a frequent ploy.</li><li><strong>Falsely Claiming Non-Profit Status</strong>: Some institutions mislead students into believing they are non-profits, which can foster false confidence in the institution’s mission and practices.</li><li><strong>Steering Students into High-Cost Private Loans</strong>: Many for-profit colleges push students into expensive private loans with higher interest rates, often when federal loans would suffice.</li><li><span style=\"font-size:11.0pt;\"><strong>Exploiting Veterans’ GI Bill Benefits</strong>: Veterans are often targeted by these institutions, as their GI Bill benefits represent a guaranteed stream of income for the schools.</span></li></ul><hr><h2 style=\"text-align:center;\">Challenges for Borrowers: The Need for Evidence</h2><p>While the BDR program offers relief, the application process can be challenging. It’s 21 pages with an average of 5-8 responses necessary for each category.&nbsp;</p><ul style=\"list-style-type:disc;\"><li>Borrowers must prove misconduct by their institution and provide <strong>direct or systemic evidence.</strong></li></ul><h3>If students have not saved emails, marketing materials, or recorded conversations, it is advisable to <a href=\"https://defenseclaims.com/contact\">hire a professional law firm or agency experienced in legal investigations</a> to meet the Department of Education\'s <a href=\"https://studentaid.gov/borrower-defense/\" target=\"_blank\" rel=\"nofollow\">\'materially complete standard’</a>.</h3><h2>Evidence can include:</h2><ol><li><strong>Enrollment Documents</strong>: Showing misleading claims made during recruitment.</li><li><strong>Emails or Brochures</strong>: Highlighting false promises or misrepresentations.</li><li><strong>Testimonials from Other Students</strong>: Corroborating similar experiences.</li><li><strong>Recorded Conversations:&nbsp;</strong>Where enrollment advisors made misrepresentations</li><li><strong>Comparing Published Tuition &amp; Fees to Actual Costs:</strong> Requires evaluating loan history</li><li><strong>Proof that your credits won’t transfer:</strong> Generally evaluated through transcripts</li></ol><p>For many borrowers, gathering sufficient evidence to prove misconduct is daunting. This is where hiring a <a href=\"https://defenseclaims.com\">professional borrower defense company or advocate</a> can make a significant difference. Experts in this field understand how to collect and present evidence to meet federal standards effectively.</p><hr><p><strong>The Importance of Professional Advocacy</strong></p><p>Without professional guidance, many borrowers may struggle to meet the Department of Education’s strict evidentiary standards. Experts can help borrowers:</p><ul><li><strong>Search Through Legal Databases</strong>: Like LexisNexis, Westlaw, or Pacer.&nbsp;</li><li><strong>Establish Systematic Behavior</strong>: Demonstrate patterns of misconduct across the institution.</li><li><strong>Ensure Completeness</strong>: Align applications with the Department’s <strong>\"materially complete standard.\"</strong></li><li><strong>Highlight Relevant Evidence</strong>: Build compelling cases using institutional records, testimonials, and legal precedents.</li></ul><p>While complete reform is essential, the <a href=\"https://defenseclaims.com/complete-guide\"><strong>Borrower Defense to Repayment</strong></a> program offers a critical lifeline for students defrauded by <strong>for-profit colleges</strong> and predatory institutions. This federal program provides <strong>student loan forgiveness</strong> to borrowers who can prove their schools engaged in misconduct, such as:</p><ul><li>Misrepresenting <a href=\"https://defenseclaims.com/rise-of-predatory-student-loans/spot-college-job-scams\"><strong>job placement rates</strong></a> or <strong>accreditation status</strong>.</li><li>Steering students into <strong>high-cost private loans</strong>.</li><li>Exploiting veterans’ <strong>GI Bill benefits</strong>.</li></ul><h2 style=\"text-align:center;\">A Few Major Settlements Enabled by Borrower Defense</h2><p>The <a href=\"https://defenseclaims.com/complete-guide\"><strong>Borrower Defense to Repayment program</strong></a> has been pivotal in uncovering fraudulent practices by educational institutions and providing relief to affected students. This federal initiative allows borrowers to seek loan forgiveness if their schools engaged in misconduct, such as misrepresentation or violation of certain laws. Through this program, several significant settlements have been reached, holding institutions accountable and offering substantial relief to defrauded students:</p><p><strong>1. Corinthian Colleges – $5.8 Billion Settlement (2022)</strong></p><ul><li><strong>Amount</strong>: $5.8 billion</li><li><strong>Reason</strong>: Misleading graduation rates and job placement data.</li><li><strong>Outcome</strong>: The U.S. Department of Education canceled loans for 560,000 borrowers.</li><li><a href=\"https://marketrealist.com/p/for-profit-colleges-that-defrauded-students/\" target=\"_blank\" rel=\"nofollow\"><strong>Learn more</strong></a>&nbsp;</li></ul><hr><p><strong>2. Sweet v. Cardona Settlement – $6 Billion Settlement (2022)</strong></p><ul><li><strong>Amount</strong>: $6 billion</li><li><strong>Reason</strong>: Fraud claims by 200,000 borrowers against various for-profit colleges.</li><li><strong>Outcome</strong>: Federal student loans canceled as part of a class-action settlement.</li><li><a href=\"https://www.opb.org/article/2022/11/17/judge-rules-to-erase-the-student-loans-of-200k-borrowers-who-say-they-were-ripped-off/\" target=\"_blank\" rel=\"nofollow\"><strong>Learn more</strong></a></li></ul><hr><p><strong>3. ITT Technical Institute – $7.3 Billion Class-Action Lawsuit (2017)</strong></p><ul><li><strong>Amount</strong>: $7.3 billion</li><li><strong>Reason</strong>: Fraudulent practices, particularly involving private student loans.</li><li><strong>Outcome</strong>: Bankruptcy proceedings included borrower relief claims.</li><li><a href=\"https://hls.harvard.edu/today/forging-path-debt-cancellation-former-itt-tech-students/\" target=\"_blank\" rel=\"nofollow\"><strong>Learn more</strong></a></li></ul><hr><p><strong>4. University of Phoenix – $191 Million Settlement (2019)</strong></p><ul><li><strong>Amount</strong>: $191 million</li><li><strong>Reason</strong>: Deceptive advertising about job placement partnerships.</li><li><strong>Outcome</strong>: Cash payments and debt forgiveness.</li><li><a href=\"https://www.consumeraffairs.com/news/university-of-phoenix-to-pay-191-million-to-settle-charges-that-it-deceived-students-121119.html\" target=\"_blank\" rel=\"nofollow\"><strong>Learn more</strong></a></li></ul><hr><p><strong>5. DeVry University – $71.7 Million Loan Forgiveness (2022)</strong></p><ul><li><strong>Amount</strong>: $71.7 million</li><li><strong>Reason</strong>: Misrepresentation of job placement rates.</li><li><strong>Outcome</strong>: Federal loans forgiven for 1,800 borrowers.</li><li><a href=\"https://www.highereddive.com/news/ed-department-strikes-6b-settlement-with-students-who-attended-for-profits/626001/\" target=\"_blank\" rel=\"nofollow\"><strong>Learn more</strong></a></li></ul><hr><p><strong>6. Grand Canyon University – $37.7 Million Fine (2024)</strong></p><ul><li><strong>Amount</strong>: $37.7 million</li><li><strong>Reason</strong>: Misleading costs of doctoral programs.</li><li><strong>Outcome</strong>: Department of Education fine.</li><li><a href=\"https://nypost.com/2024/11/28/us-news/70-of-biden-admins-education-enforcement-targeted-christian-colleges-target-their-opponents/\" target=\"_blank\" rel=\"nofollow\"><strong>Learn more</strong></a></li></ul><hr><p><strong>7. Walden University – $28.5 Million Settlement (2024)</strong></p><ul><li><strong>Amount</strong>: $28.5 million</li><li><strong>Reason</strong>: Misleading students about the cost and duration of doctoral programs.</li><li><strong>Outcome</strong>: Cash settlement to affected students.</li><li><a href=\"https://www.usnews.com/news/us/articles/2024-03-28/for-profit-school-accused-of-preying-on-black-students-reaches-28-5-million-settlement\" target=\"_blank\" rel=\"nofollow\"><strong>Learn more</strong></a></li></ul><hr><p><strong>8. Lincoln Educational Services – Part of $6 Billion Sweet v. Cardona Settlement (2023)</strong></p><ul><li><strong>Amount</strong>: Part of the $6 billion settlement</li><li><strong>Reason</strong>: Predatory practices appealed by the institution.</li><li><strong>Outcome</strong>: Linked to broader borrower relief settlement.</li><li><a href=\"https://marketrealist.com/p/for-profit-colleges-that-defrauded-students/\" target=\"_blank\" rel=\"nofollow\"><strong>Learn more</strong></a></li></ul><hr><p><strong>9. Everglades College – Part of $6 Billion Sweet v. Cardona Settlement (2023)</strong></p><ul><li><strong>Amount</strong>: Part of the $6 billion settlement</li><li><strong>Reason</strong>: Similar to Lincoln Educational Services, involved in appealing relief.</li><li><strong>Outcome</strong>: Linked to borrower relief claims.</li><li><a href=\"https://marketrealist.com/p/for-profit-colleges-that-defrauded-students/\" target=\"_blank\" rel=\"nofollow\"><strong>Learn more</strong></a></li></ul><hr><p><strong>10. Navient (Loan Servicer) – $1.85 Billion Settlement (2022)</strong></p><ul><li><strong>Amount</strong>: $1.85 billion</li><li><strong>Reason</strong>: Predatory lending practices and steering borrowers into costly repayment plans.</li><li><strong>Outcome</strong>: $1.7 billion in private loan cancellation, $95 million in restitution.</li><li><a href=\"https://www.attorneygeneral.gov/taking-action/attorney-general-josh-shapiro-announces-1-85-billion-landmark-settlement-with-student-loan-servicer-navient/\" target=\"_blank\" rel=\"nofollow\"><strong>Learn more</strong></a></li></ul><hr><p>The settlements highlighted above showcase the critical role of <strong>Borrower Defense to Repayment</strong> in exposing fraudulent practices and holding predatory institutions accountable. With billions of dollars in loans discharged, this program has provided much-needed relief to defrauded students.</p><p>If you believe you’ve been affected by <strong>predatory student loans</strong>, <a href=\"https://defenseclaims.com/contact\">explore your options through Borrower Defense to Repayment</a> and take the first step toward financial freedom.</p><h3 style=\"text-align:center;\">Conclusion</h3><figure class=\"image\"><img style=\"aspect-ratio:720/721;\" src=\"https://defenseclaims.com/portal/public/admin_assets/editorimages/image_1734442737.jpeg\" alt=\"Debt free student  sitting in a chair with a pineapple and a drink on the beach\" width=\"720\" height=\"721\"></figure><p>These settlements reveal the far-reaching consequences of predatory practices in higher education and student lending. They also highlight the importance of accountability and the potential for relief through programs like <strong>Borrower Defense to Repayment</strong>.</p><p>If you believe you’ve been affected by predatory practices, explore your options under Borrower Defense to Repayment and take the first step toward financial recovery.</p><p><a href=\"https://defenseclaims.com/complete-guide\">Click Here to learn more about Borrower Defense to Repayment.</a></p>', 1, 'rise-of-predatory-student-loans', 'rise-of-predatory-student-loans', 'Repayment-1734422843.jpg', 1, 1, 'The Rise of Predatory Student Loans: Impact on Education and Debt', 'Explore how predatory student loans burden borrowers, impact U.S. education, and strain the economy. Learn about Borrower Defense solutions.', 'Predatory student loans in the US, The student debt crisis and its impact, Education loan issues affecting students, Predatory lending in education: What you need to know, National student debt crisis: Solutions and facts, College loan problems: Causes and solutions, Financial burden of student loans on graduates, Rising student loan debt: Trends and solutions, Education and the growing debt crisis, Student loan reform: What changes are needed, High-interest student loans: Understanding the risks, Impact of student loans on graduates\' future, Student debt in the US: An urgent issue, Predatory lending practices in education: A growing concern, Effective solutions to student loan debt crisis', 'Repayment-1734423351.jpg', 'The Rise of Predatory Student Loans: Impact on Education and Debt', 'Explore how predatory student loans burden borrowers, impact U.S. education, and strain the economy. Learn about Borrower Defense solutions.', 'The Rise of Predatory Student Loans: Impact on Education and Debt', 'Explore how predatory student loans burden borrowers, impact U.S. education, and strain the economy. Learn about Borrower Defense solutions.', 'Repayment-1734423351.jpg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"The Rise of Predatory Student Loans: Impact on Education and Debt\",\r\n  \"description\": \"Explore how predatory student loans burden borrowers, impact U.S. education, and strain the economy. Learn about Borrower Defense solutions.\",\r\n  \"author\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Legal Touch Borrower Defense\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Legal Touch Borrower Defense\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://defenseclaims.com/assets/images/logo/borrowerdefence30.png\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-02-04\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://defenseclaims.com/rise-of-predatory-student-loans\"\r\n  }\r\n}', '2024-12-10 12:54:13', '2024-12-10 07:54:13', '2025-02-10 01:23:29'),
(37, 1, NULL, 'Why Are More and More Americans Moving to Rosarito? The Answer May Surprise You!', 2, '<h1 style=\"text-align:center;\"><span style=\"background-color:transparent;color:#0f4761;font-size:20pt;\">Why Are More and More Americans Moving to Rosarito? The Answer May Surprise You!</span><br>&nbsp;</h1><figure class=\"media\"><div data-oembed-url=\"https://www.youtube.com/watch?v=7xqxBAHhpSU&amp;pp=ygUMcm9zYXJpdG8gNGsg\"><div style=\"position: relative; padding-bottom: 100%; height: 0; padding-bottom: 56.2493%;\"><iframe src=\"https://www.youtube.com/embed/7xqxBAHhpSU\" style=\"position: absolute; width: 100%; height: 100%; top: 0; left: 0;\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen=\"\"></iframe></div></div></figure><p><a style=\"text-decoration:none;\" href=\"https://www.sandiegored.com/en/news/229355/Playas-de-Rosarito-becomes-paradise-for-retired-Americans/?utm_source=chatgpt.com\" target=\"_blank\"><span style=\"background-color:transparent;color:#467886;font-size:11pt;\"><u>Rosarito, officially known as Playas de Rosarito</u></span></a><span style=\"background-color:transparent;color:#000000;font-size:11pt;\">, is quickly becoming one of the most sought-after destinations for Americans looking to escape the high cost of living and&nbsp;</span><a style=\"text-decoration:none;\" href=\"https://www.latimes.com/environment/story/2025-01-16/climate-change-california-fires\" target=\"_blank\"><span style=\"background-color:transparent;color:#467886;font-size:11pt;\"><u>extreme climate in many U.S. cities</u></span></a><span style=\"background-color:transparent;color:#000000;font-size:11pt;\">.&nbsp;&nbsp;</span></p><p><a style=\"text-decoration:none;\" href=\"https://www.realtor.com/international/mx/rosarito-baja-california-sur/\" target=\"_blank\"><span style=\"background-color:transparent;color:#467886;font-size:11pt;\"><u>Known for its stunning beachfront properties</u></span></a><span style=\"background-color:transparent;color:#000000;font-size:11pt;\">, year-round mild climate, and affordability, Rosarito offers an unmatched lifestyle at a fraction of the price compared to U.S. cities like Los Angeles or Honolulu</span></p><p><span style=\"background-color:transparent;color:#0f4761;font-size:16pt;\">With Average Cost Per Square Foot of only $110, Can You Afford To Not Live Here?</span></p><p><span style=\"background-color:transparent;color:#000000;font-size:11pt;\">Imagine owning a luxury home with ocean views for as little as $300 per square foot, or a spacious inland property for just $110 per square foot. With&nbsp;<strong>average high temperatures ranging from 65°F (18°C) in January to 75°F (24°C) in August</strong>,&nbsp;</span><a style=\"text-decoration:none;\" href=\"https://en.wikipedia.org/wiki/Rosarito?utm_source=chatgpt.com\" target=\"_blank\"><span style=\"background-color:transparent;color:#467886;font-size:11pt;\"><u>Playas de Rosarito</u></span></a><span style=\"background-color:transparent;color:#000000;font-size:11pt;\"> boasts one of the most comfortable climates in the region, perfect for those seeking to avoid extreme weather.</span></p><p><span style=\"background-color:transparent;color:#000000;font-size:11pt;\">In addition to its affordability and climate, Rosarito is just a short drive from the&nbsp;</span><a style=\"text-decoration:none;\" href=\"https://bwt.cbp.gov/details/09250401/POV\" target=\"_blank\"><span style=\"background-color:transparent;color:#467886;font-size:11pt;\"><u>U.S. San Ysidro border</u></span></a><span style=\"background-color:transparent;color:#000000;font-size:11pt;\">, 40 minutes from the&nbsp;</span><a style=\"text-decoration:none;\" href=\"https://bwt.cbp.gov/details/09250601/POV\" target=\"_blank\"><span style=\"background-color:transparent;color:#467886;font-size:11pt;\"><u>Otay border</u></span></a><span style=\"background-color:transparent;color:#000000;font-size:11pt;\">, and&nbsp;</span><a style=\"text-decoration:none;\" href=\"https://maps.app.goo.gl/e9BMg6V7WAtSj3LN6\" target=\"_blank\"><span style=\"background-color:transparent;color:#467886;font-size:11pt;\"><u>only 1 hour from the Tecate border</u></span></a><span style=\"background-color:transparent;color:#000000;font-size:11pt;\">, making it an ideal location for expats and retirees who want easy access to California while enjoying the relaxed pace and&nbsp;</span><a style=\"text-decoration:none;\" href=\"https://finance.yahoo.com/news/much-average-retiree-mexico-savings-130010760.html\" target=\"_blank\"><span style=\"background-color:transparent;color:#467886;font-size:11pt;\"><u>cost savings of life in Mexico</u></span></a><span style=\"background-color:transparent;color:#000000;font-size:11pt;\">.</span></p><p><span style=\"background-color:transparent;color:#000000;font-size:11pt;\">Whether you’re searching for a quiet retirement home or an affordable second home on the beachfront to escape, Playas de Rosarito offers endless possibilities. With our tools to estimate home size based on budget, you can easily find the property that fits your lifestyle and financial goals. Take the first step toward your dream home and&nbsp;</span><a style=\"text-decoration:none;\" href=\"https://buyahouseinrosarito.com/contact\"><span style=\"background-color:transparent;color:#467886;font-size:11pt;\"><u>Contact Aaron (English) &amp; Adriana (Spanish) By Clicking Here Now</u></span></a><span style=\"background-color:transparent;color:#000000;font-size:11pt;\">, for more information.</span></p><p style=\"text-align:center;\"><span style=\"background-color:transparent;color:#000000;font-size:11pt;\">Please Use this Rosarito App To Estimate&nbsp;<strong>Beachfront, Oceanview</strong>, or&nbsp;<strong>Non-Ocean View</strong> Cost of Ownership&nbsp;</span></p><p style=\"text-align:center;\"><span style=\"background-color:transparent;color:#000000;font-size:11pt;\">[cost_calculator_app]</span></p><p style=\"text-align:center;\"><span style=\"background-color:transparent;color:#000000;font-size:11pt;\"><img src=\"https://lh7-rt.googleusercontent.com/docsz/AD_4nXc1Gl_-Kck_gtITVT0mRqK5xs7du2Uq64YGATLJelpGFPtDC0RdRP6f58ad9pcgdhwEAc6d6A2pMySmn6IP54np_zog8gn_5_V7nzaLu9CKg7swAu2jKD_zqDOoCVOe74_TTvUT?key=_aC3a4ufWwGvN2Hcp33WUhnL\" alt=\"A sunset over Rosarito  beach\" width=\"623\" height=\"524\"></span></p><p style=\"text-align:center;\"><a style=\"text-decoration:none;\" href=\"https://www.tripadvisor.com/LocationPhotoDirectLink-g150774-i462503810-Rosarito_Baja_California.html\" target=\"_blank\"><span style=\"background-color:transparent;color:#467886;font-size:11pt;\"><u>Sunset Over Rosarito Beach</u></span></a><span style=\"background-color:transparent;color:#000000;font-size:11pt;\">&nbsp;</span></p><p>&nbsp;</p><p style=\"text-align:center;\"><a style=\"text-decoration:none;\" href=\"https://buyahouseinrosarito.com/contact\"><span style=\"background-color:transparent;color:#467886;font-size:11pt;\"><u>Contact Aaron (English) &amp; Adriana (Spanish) By Clicking Here Now</u></span></a><span style=\"background-color:transparent;color:#000000;font-size:11pt;\">, for more information.</span></p>', 1, NULL, 'cate/why-are-more-and-more-americans-moving-to-rosarito-the-answer-may-surprise-you', 'buyahouseinrosaritoblog-1738757971-1738928837.jpg', 1, 0, 'Why Americans Are Moving to Rosarito – Affordable Beachfront Living', 'Discover why more Americans are moving to Rosarito! Enjoy affordable beachfront homes, a mild climate, and a relaxed lifestyle just minutes from the U.S. border. Find your dream home today!', 'Rosarito real estate, buy a house in Rosarito, beachfront homes Mexico, affordable homes Rosarito, Playas de Rosarito homes, expat living Mexico, Rosarito property investment', 'buyahouseinrosaritoblog-1738757971-1738928837.jpg', 'Why Americans Are Moving to Rosarito – The Answer Will Surprise You!', 'Looking for affordable beachfront living? Rosarito offers stunning ocean-view homes, a mild climate, and a relaxed lifestyle—all just a short drive from California. Explore your options today!', 'Why Are Americans Moving to Rosarito? The Answer May Surprise You!', 'Discover affordable beachfront homes in Rosarito, Mexico! Stunning ocean views, a mild climate & easy U.S. access make it a top choice for expats & retirees. #RosaritoRealEstate #BeachfrontHomes', 'buyahouseinrosaritoblog-1738757971-1738928837.jpg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Why Americans Are Moving to Rosarito – Affordable Beachfront Living\",\r\n  \"description\": \"Discover why more Americans are moving to Rosarito! Enjoy affordable beachfront homes, a mild climate, and a relaxed lifestyle just minutes from the U.S. border. Find your dream home today!\",\r\n  \"author\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/Header3.png\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-02-07\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/blog/why-are-more-and-more-americans-moving-to-rosarito-the-answer-may-surprise-you\"\r\n  }\r\n}', '2025-02-07 11:47:17', '2025-02-07 06:47:17', '2025-02-10 03:36:20');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categories_parent_id_foreign` (`parent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `description`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'El Real Estate', 'el-real-estate', NULL, NULL, '2024-12-10 07:40:03', '2025-01-28 10:17:02'),
(2, 'Real Estate Investment', 'real-estate-investment', NULL, 1, '2024-12-10 07:40:18', '2025-01-28 10:17:12'),
(3, 'Home Buying', 'home-buying', NULL, 1, '2024-12-10 07:40:46', '2025-01-28 10:17:22'),
(4, 'Home Selling', 'home-selling', NULL, 1, '2024-12-23 13:13:54', '2025-01-28 10:18:47'),
(7, 'Market Trends', 'market-trends', NULL, 1, '2025-01-24 12:09:10', '2025-01-28 10:18:37'),
(8, 'Property Management', 'property-management', NULL, 1, '2025-01-24 12:09:21', '2025-01-28 10:18:27'),
(9, 'Luxury Real Estate', 'luxury-real-estate', NULL, 1, '2025-01-24 12:09:32', '2025-01-28 10:18:16'),
(10, 'Commercial Real Estate', 'commercial-real-estate', NULL, 1, '2025-01-24 12:09:44', '2025-01-28 10:18:01'),
(11, 'Green Realty', 'green-realty', NULL, 1, '2025-01-24 12:09:56', '2025-01-28 10:17:52'),
(12, 'Real Estate Technology', 'real-estate-technology', NULL, 1, '2025-01-24 12:10:07', '2025-01-28 10:17:41'),
(13, 'Legal and Financial', 'legal-and-financial', NULL, 1, '2025-01-24 12:10:35', '2025-01-28 10:17:32');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `fb_image` text COLLATE utf8mb4_unicode_ci,
  `fb_title` text COLLATE utf8mb4_unicode_ci,
  `fb_description` text COLLATE utf8mb4_unicode_ci,
  `twitter_title` text COLLATE utf8mb4_unicode_ci,
  `twitter_description` text COLLATE utf8mb4_unicode_ci,
  `twitter_image` text COLLATE utf8mb4_unicode_ci,
  `json_ld_code` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `slug`, `state`, `country`, `description`, `created_at`, `updated_at`, `image`, `meta_title`, `meta_description`, `meta_keywords`, `fb_image`, `fb_title`, `fb_description`, `twitter_title`, `twitter_description`, `twitter_image`, `json_ld_code`) VALUES
(1, 'Mexico City', 'mexico-city', 'Federal Territory', 'Mexico', '<p>Mexico City is the densely populated, high-altitude capital of Mexico. It\'s known for its Templo Mayor (a 13th-century Aztec temple), the baroque Catedral Metropolitana de México of the Spanish conquistadors and the Palacio Nacional, which houses historic murals by Diego Rivera. All of these are situated in and around the Plaza de la Constitución, the massive main square also known as the Zócalo.</p>', '2025-01-30 05:37:17', '2025-01-30 05:37:17', '1738215437.jpg', 'Buy Property in Mexico City', 'Mexico City is the densely populated, high-altitude capital of Mexico. It\'s known for its Templo Mayor (a 13th-century Aztec temple), the baroque Catedral Metropolitana de México of the Spanish conquistadors and the Palacio Nacional, which houses historic murals by Diego Rivera. All of these are situated in and around the Plaza de la Constitución, the massive main square also known as the Zócalo.', 'Buy Property in Mexico City', 'oscar-reygo-cSaoAlicK-c-unsplash-1738215437728253222.jpg', 'Buy Property in Mexico City', 'Mexico City is the densely populated, high-altitude capital of Mexico. It\'s known for its Templo Mayor (a 13th-century Aztec temple), the baroque Catedral Metropolitana de México of the Spanish conquistadors and the Palacio Nacional, which houses historic murals by Diego Rivera. All of these are situated in and around the Plaza de la Constitución, the massive main square also known as the Zócalo.', 'Buy Property in Mexico City', 'Mexico City is the densely populated, high-altitude capital of Mexico. It\'s known for its Templo Mayor (a 13th-century Aztec temple), the baroque Catedral Metropolitana de México of the Spanish conquistadors and the Palacio Nacional, which houses historic murals by Diego Rivera. All of these are situated in and around the Plaza de la Constitución, the massive main square also known as the Zócalo.', 'alexis-tostado-3TBuSLluZ8w-unsplash-1738215437.jpg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Buy Property in Mexico City\",\r\n  \"description\": \"Mexico City is the densely populated, high-altitude capital of Mexico. It\'s known for its Templo Mayor (a 13th-century Aztec temple), the baroque Catedral Metropolitana de México of the Spanish conquistadors and the Palacio Nacional, which houses historic murals by Diego Rivera. All of these are situated in and around the Plaza de la Constitución, the massive main square also known as the Zócalo.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/city/mexico-city\"\r\n  }\r\n}'),
(2, 'Cancun', 'cancun', 'Quintana Roo', 'Mexico', '<p>Cancún, a Mexican city on the Yucatán Peninsula bordering the Caribbean Sea, is known for its beaches, numerous resorts and nightlife. It’s composed of 2 distinct areas: the more traditional downtown area, El Centro, and Zona Hotelera, a long, beachfront strip of high-rise hotels, nightclubs, shops and restaurants. Cancun is also a famed destination for students during universities’ spring break period.</p>', '2025-01-30 05:39:45', '2025-01-30 05:39:45', '1738215585.jpg', 'Buy Property in Cancún', 'Cancún, a Mexican city on the Yucatán Peninsula bordering the Caribbean Sea, is known for its beaches, numerous resorts and nightlife. It’s composed of 2 distinct areas: the more traditional downtown area, El Centro, and Zona Hotelera, a long, beachfront strip of high-rise hotels, nightclubs, shops and restaurants. Cancun is also a famed destination for students during universities’ spring break period.', 'Buy Property in Cancún', 'gerson-repreza-PW3tJkRkSy8-unsplash-17382155852055246006.jpg', 'Buy Property in Cancún', 'Cancún, a Mexican city on the Yucatán Peninsula bordering the Caribbean Sea, is known for its beaches, numerous resorts and nightlife. It’s composed of 2 distinct areas: the more traditional downtown area, El Centro, and Zona Hotelera, a long, beachfront strip of high-rise hotels, nightclubs, shops and restaurants. Cancun is also a famed destination for students during universities’ spring break period.', 'Buy Property in Cancún', 'Cancún, a Mexican city on the Yucatán Peninsula bordering the Caribbean Sea, is known for its beaches, numerous resorts and nightlife. It’s composed of 2 distinct areas: the more traditional downtown area, El Centro, and Zona Hotelera, a long, beachfront strip of high-rise hotels, nightclubs, shops and restaurants. Cancun is also a famed destination for students during universities’ spring break period.', 'gerson-repreza-PW3tJkRkSy8-unsplash-1738215585.jpg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Buy Property in Cancún\",\r\n  \"description\": \"Cancún, a Mexican city on the Yucatán Peninsula bordering the Caribbean Sea, is known for its beaches, numerous resorts and nightlife. It’s composed of 2 distinct areas: the more traditional downtown area, El Centro, and Zona Hotelera, a long, beachfront strip of high-rise hotels, nightclubs, shops and restaurants. Cancun is also a famed destination for students during universities’ spring break period.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/city/cancun\"\r\n  }\r\n}'),
(3, 'Playa del Carmen', 'playa-del-carmen', 'Quintana Roo', 'Mexico', '<p>Playa del Carmen is a coastal resort town in Mexico, along the Yucatán Peninsula\'s Riviera Maya strip of Caribbean shoreline. In the state of Quintana Roo, it’s known for its palm-lined beaches and coral reefs. Its Quinta Avenida pedestrian thoroughfare runs parallel to the beach, with blocks of shops, restaurants and nightspots ranging from laid-back bars to dance clubs.</p>', '2025-01-30 05:42:38', '2025-01-30 05:42:38', '1738215758.jpg', 'Buy Property in Playa del Carmen', 'Playa del Carmen is a coastal resort town in Mexico, along the Yucatán Peninsula\'s Riviera Maya strip of Caribbean shoreline. In the state of Quintana Roo, it’s known for its palm-lined beaches and coral reefs. Its Quinta Avenida pedestrian thoroughfare runs parallel to the beach, with blocks of shops, restaurants and nightspots ranging from laid-back bars to dance clubs.', 'Buy Property in Playa del Carmen', 'Untitled-1738215758119824741.jpg', 'Buy Property in Playa del Carmen', 'Playa del Carmen is a coastal resort town in Mexico, along the Yucatán Peninsula\'s Riviera Maya strip of Caribbean shoreline. In the state of Quintana Roo, it’s known for its palm-lined beaches and coral reefs. Its Quinta Avenida pedestrian thoroughfare runs parallel to the beach, with blocks of shops, restaurants and nightspots ranging from laid-back bars to dance clubs.', 'Buy Property in Playa del Carmen', 'Playa del Carmen is a coastal resort town in Mexico, along the Yucatán Peninsula\'s Riviera Maya strip of Caribbean shoreline. In the state of Quintana Roo, it’s known for its palm-lined beaches and coral reefs. Its Quinta Avenida pedestrian thoroughfare runs parallel to the beach, with blocks of shops, restaurants and nightspots ranging from laid-back bars to dance clubs.', 'Untitled-1738215758.jpg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Buy Property in Playa del Carmen\",\r\n  \"description\": \"Playa del Carmen is a coastal resort town in Mexico, along the Yucatán Peninsula\'s Riviera Maya strip of Caribbean shoreline. In the state of Quintana Roo, it’s known for its palm-lined beaches and coral reefs. Its Quinta Avenida pedestrian thoroughfare runs parallel to the beach, with blocks of shops, restaurants and nightspots ranging from laid-back bars to dance clubs.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/city/playa-del-carmen\"\r\n  }\r\n}'),
(4, 'Cabo San Lucas', 'cabo-san-lucas', 'Baja California Sur', 'Mexico', '<p>Cabo San Lucas, a resort city on the southern tip of Mexico’s Baja California peninsula, is known for its beaches, water-based activities and nightlife. Playa El Médano is Cabo’s main beach, with outdoor restaurants and numerous bars. Past the marina is Land\'s End promontory, site of Playa del Amor (Lover\'s Beach) and El Arco, a natural archway in the seacliffs.</p>', '2025-01-30 05:45:04', '2025-01-30 05:45:04', '1738215904.jpg', 'Buy Property in Cabo San Lucas', 'Cabo San Lucas, a resort city on the southern tip of Mexico’s Baja California peninsula, is known for its beaches, water-based activities and nightlife. Playa El Médano is Cabo’s main beach, with outdoor restaurants and numerous bars. Past the marina is Land\'s End promontory, site of Playa del Amor (Lover\'s Beach) and El Arco, a natural archway in the seacliffs.', 'Buy Property in Cabo San Lucas', 'Untitled-17382159041796080502.jpg', 'Buy Property in Cabo San Lucas', 'Cabo San Lucas, a resort city on the southern tip of Mexico’s Baja California peninsula, is known for its beaches, water-based activities and nightlife. Playa El Médano is Cabo’s main beach, with outdoor restaurants and numerous bars. Past the marina is Land\'s End promontory, site of Playa del Amor (Lover\'s Beach) and El Arco, a natural archway in the seacliffs.', 'Buy Property in Cabo San Lucas', 'Cabo San Lucas, a resort city on the southern tip of Mexico’s Baja California peninsula, is known for its beaches, water-based activities and nightlife. Playa El Médano is Cabo’s main beach, with outdoor restaurants and numerous bars. Past the marina is Land\'s End promontory, site of Playa del Amor (Lover\'s Beach) and El Arco, a natural archway in the seacliffs.', 'Untitled-1738215904.jpg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Buy Property in Cabo San Lucas\",\r\n  \"description\": \"Cabo San Lucas, a resort city on the southern tip of Mexico’s Baja California peninsula, is known for its beaches, water-based activities and nightlife. Playa El Médano is Cabo’s main beach, with outdoor restaurants and numerous bars. Past the marina is Land\'s End promontory, site of Playa del Amor (Lover\'s Beach) and El Arco, a natural archway in the seacliffs.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/city/cabo-san-lucas\"\r\n  }\r\n}'),
(5, 'Rosarito', 'rosarito', 'Baja California', 'Mexico', '<p>Rosarito Beach is a resort town on the coast of Mexico’s Baja California peninsula. It’s known as a nightlife destination for U.S. visitors due to its proximity to the border. Area beaches known for strong surf include Rosarito in town, Medio Camino in the south and Baja Malibu to the north. Offshore, Rosarito Underwater Park is an artificial reef featuring the remains of Uribe 121, a former navy ship</p>', '2025-01-30 05:48:42', '2025-01-30 05:48:42', '1738216122.jpg', 'Buy Propety in Rosarito', 'Rosarito Beach is a resort town on the coast of Mexico’s Baja California peninsula. It’s known as a nightlife destination for U.S. visitors due to its proximity to the border. Area beaches known for strong surf include Rosarito in town, Medio Camino in the south and Baja Malibu to the north. Offshore, Rosarito Underwater Park is an artificial reef featuring the remains of Uribe 121, a former navy ship', 'Buy Propety in Rosarito', 'sad-1738216122122656098.jpg', 'Buy Propety in Rosarito', 'Rosarito Beach is a resort town on the coast of Mexico’s Baja California peninsula. It’s known as a nightlife destination for U.S. visitors due to its proximity to the border. Area beaches known for strong surf include Rosarito in town, Medio Camino in the south and Baja Malibu to the north. Offshore, Rosarito Underwater Park is an artificial reef featuring the remains of Uribe 121, a former navy ship', 'Buy Propety in Rosarito', 'Rosarito Beach is a resort town on the coast of Mexico’s Baja California peninsula. It’s known as a nightlife destination for U.S. visitors due to its proximity to the border. Area beaches known for strong surf include Rosarito in town, Medio Camino in the south and Baja Malibu to the north. Offshore, Rosarito Underwater Park is an artificial reef featuring the remains of Uribe 121, a former navy ship', 'sad-1738216122.jpg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Buy Propety in Rosarito\",\r\n  \"description\": \"Rosarito Beach is a resort town on the coast of Mexico’s Baja California peninsula. It’s known as a nightlife destination for U.S. visitors due to its proximity to the border. Area beaches known for strong surf include Rosarito in town, Medio Camino in the south and Baja Malibu to the north. Offshore, Rosarito Underwater Park is an artificial reef featuring the remains of Uribe 121, a former navy ship\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/city/rosarito\"\r\n  }\r\n}'),
(6, 'Albuquerque', '', 'New Meixco', 'United States', '<p>Albuquerque, New Mexico’s largest city, sits in the high desert. Its modern Downtown core contrasts with Old Town Albuquerque, dating to the city’s 1706 founding as a Spanish colony. Old Town is filled with historic adobe buildings, such as San Felipe de Neri Church, 5 museums, and shops selling Native American handicrafts.</p>', '2025-01-30 06:49:54', '2025-01-30 06:49:54', '1738219794.jpg', 'Buy Property in Albuquerque', 'Albuquerque, New Mexico’s largest city, sits in the high desert. Its modern Downtown core contrasts with Old Town Albuquerque, dating to the city’s 1706 founding as a Spanish colony. Old Town is filled with historic adobe buildings, such as San Felipe de Neri Church, 5 museums, and shops selling Native American handicrafts.', 'Buy Property in Albuquerque', 'sdsdf-1738219794681993617.jpg', 'Buy Property in Albuquerque', 'Albuquerque, New Mexico’s largest city, sits in the high desert. Its modern Downtown core contrasts with Old Town Albuquerque, dating to the city’s 1706 founding as a Spanish colony. Old Town is filled with historic adobe buildings, such as San Felipe de Neri Church, 5 museums, and shops selling Native American handicrafts.', 'Buy Property in Albuquerque', 'Albuquerque, New Mexico’s largest city, sits in the high desert. Its modern Downtown core contrasts with Old Town Albuquerque, dating to the city’s 1706 founding as a Spanish colony. Old Town is filled with historic adobe buildings, such as San Felipe de Neri Church, 5 museums, and shops selling Native American handicrafts.', 'sdsdf-1738219794.jpg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Buy Property in Albuquerque\",\r\n  \"description\": \"Albuquerque, New Mexico’s largest city, sits in the high desert. Its modern Downtown core contrasts with Old Town Albuquerque, dating to the city’s 1706 founding as a Spanish colony. Old Town is filled with historic adobe buildings, such as San Felipe de Neri Church, 5 museums, and shops selling Native American handicrafts.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/city/\"\r\n  }\r\n}'),
(7, 'Los Angeles', '-los-angeles', 'California', 'United States', '<p>Los Angeles is a sprawling Southern California city and the center of the nation’s film and television industry. Near its iconic Hollywood sign, studios such as Paramount Pictures, Universal and Warner Brothers offer behind-the-scenes tours. On Hollywood Boulevard, TCL Chinese Theatre displays celebrities’ hand- and footprints, the Walk of Fame honors thousands of luminaries and vendors sell maps to stars’ homes</p>', '2025-01-30 06:51:48', '2025-01-30 06:51:48', '1738219908.jpg', 'Buy Property in Los Angeles', 'Los Angeles is a sprawling Southern California city and the center of the nation’s film and television industry. Near its iconic Hollywood sign, studios such as Paramount Pictures, Universal and Warner Brothers offer behind-the-scenes tours. On Hollywood Boulevard, TCL Chinese Theatre displays celebrities’ hand- and footprints, the Walk of Fame honors thousands of luminaries and vendors sell maps to stars’ homes', 'Buy Property in Los Angeles', 'asdasdasd-173821990896059948.jpg', 'Buy Property in Los Angeles', 'Los Angeles is a sprawling Southern California city and the center of the nation’s film and television industry. Near its iconic Hollywood sign, studios such as Paramount Pictures, Universal and Warner Brothers offer behind-the-scenes tours. On Hollywood Boulevard, TCL Chinese Theatre displays celebrities’ hand- and footprints, the Walk of Fame honors thousands of luminaries and vendors sell maps to stars’ homes', 'Buy Property in Los Angeles', 'Los Angeles is a sprawling Southern California city and the center of the nation’s film and television industry. Near its iconic Hollywood sign, studios such as Paramount Pictures, Universal and Warner Brothers offer behind-the-scenes tours. On Hollywood Boulevard, TCL Chinese Theatre displays celebrities’ hand- and footprints, the Walk of Fame honors thousands of luminaries and vendors sell maps to stars’ homes', 'asdasdasd-1738219908.jpg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Buy Property in Los Angeles\",\r\n  \"description\": \"Los Angeles is a sprawling Southern California city and the center of the nation’s film and television industry. Near its iconic Hollywood sign, studios such as Paramount Pictures, Universal and Warner Brothers offer behind-the-scenes tours. On Hollywood Boulevard, TCL Chinese Theatre displays celebrities’ hand- and footprints, the Walk of Fame honors thousands of luminaries and vendors sell maps to stars’ homes\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/city/-los-angeles\"\r\n  }\r\n}');

-- --------------------------------------------------------

--
-- Table structure for table `contact_requests`
--

DROP TABLE IF EXISTS `contact_requests`;
CREATE TABLE IF NOT EXISTS `contact_requests` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `property_ids` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_requests`
--

INSERT INTO `contact_requests` (`id`, `name`, `email`, `phone`, `property_ids`, `message`, `created_at`, `updated_at`) VALUES
(1, 'John Snow', 'dev1@explorelogicsit.net', '+14712449672', '[8]', 'Lorem Ipsum', '2025-01-31 11:21:00', '2025-01-31 11:21:00'),
(2, 'John Doe', 'johndoe@gmail.com', '14567821281', '[\"10\", \"12\", \"14\", \"9\"]', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', '2025-02-10 01:03:54', '2025-02-10 01:03:54');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

DROP TABLE IF EXISTS `features`;
CREATE TABLE IF NOT EXISTS `features` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint NOT NULL COMMENT '1: Interior Feature, 2: Exterior Finish, 3: Featured Amenities, 4: Appliances, 5: Views, 6: Heating, 7: Cooling, 8: Roof, 9: Sewer-Water Systems, 10: Extra Features',
  `status` tinyint NOT NULL DEFAULT '1' COMMENT '0: Inactive, 1: Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `title`, `slug`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Tiles', 'tiles', 1, 1, '2024-06-13 07:38:31', '2024-06-13 07:38:31'),
(2, 'Swimming Pool', 'swimming-pool', 3, 1, '2024-06-13 07:39:03', '2024-06-13 07:39:03'),
(3, 'Tennis Court', 'tennis-court', 3, 1, '2024-06-13 07:39:14', '2024-06-13 07:39:14'),
(4, 'Gated Community', 'gated-community', 3, 1, '2024-06-13 07:39:25', '2024-06-13 07:39:25'),
(5, 'Stove', 'stove', 4, 1, '2024-06-13 07:39:45', '2024-06-13 07:39:45'),
(6, 'Dishwasher', 'dishwasher', 4, 1, '2024-06-13 07:39:56', '2024-06-13 07:39:56'),
(7, 'Washer', 'washer', 4, 1, '2024-06-13 07:40:06', '2024-06-13 07:40:06'),
(8, 'Refrigerator', 'refrigerator', 4, 1, '2024-06-13 07:40:16', '2024-06-13 07:40:16'),
(9, 'Microwave', 'microwave', 4, 1, '2024-06-13 07:40:26', '2024-06-13 07:40:26'),
(10, 'Panoramic', 'panoramic', 5, 1, '2024-06-13 07:40:46', '2024-06-13 07:40:46'),
(11, 'Oceanfront', 'oceanfront', 5, 1, '2024-06-13 07:40:55', '2024-06-13 07:40:55'),
(12, 'Downtown', 'downtown', 5, 1, '2024-06-13 07:41:04', '2024-06-13 07:41:04'),
(13, 'Oceanview', 'oceanview', 5, 1, '2024-06-13 07:41:18', '2024-06-13 07:41:18'),
(14, 'Waterview', 'waterview', 5, 1, '2024-06-13 07:41:27', '2024-06-13 07:41:27'),
(15, 'Waterfront', 'waterfront', 5, 1, '2024-06-13 07:41:36', '2024-06-13 07:41:36'),
(16, 'Central Electric', 'central-electric', 6, 1, '2024-06-13 07:41:50', '2024-06-13 07:41:50'),
(17, 'Ceiling Fan', 'ceiling-fan', 7, 1, '2024-06-13 07:42:00', '2024-06-13 07:42:00'),
(18, 'Public', 'public', 9, 1, '2024-06-13 07:42:15', '2024-06-13 07:42:15'),
(19, 'City Water', 'city-water', 9, 1, '2024-06-13 07:42:24', '2024-06-13 07:42:24'),
(20, 'Lobby', 'lobby', 10, 1, '2024-06-13 07:42:44', '2024-06-13 07:42:44'),
(21, 'Cable TV Available', 'cable-tv-available', 10, 1, '2024-06-13 07:43:07', '2024-06-13 07:43:07'),
(22, 'Furnished', 'furnished', 10, 1, '2024-06-13 07:43:15', '2024-06-13 07:43:15'),
(23, 'Controlled Access', 'controlled-access', 10, 1, '2024-06-13 07:43:22', '2024-06-13 07:43:22'),
(24, 'Wheelchair Access', 'wheelchair-access', 10, 1, '2024-06-13 07:43:29', '2024-06-13 07:43:29'),
(25, 'Covered Parking', 'covered-parking', 10, 1, '2024-06-13 07:43:37', '2024-06-13 07:43:37'),
(26, 'High Speed Internet', 'high-speed-internet', 10, 1, '2024-06-13 07:43:45', '2025-01-30 10:23:11'),
(27, 'Public Transportation', 'public-transportation', 10, 1, '2024-06-13 07:43:53', '2024-06-13 07:43:53'),
(28, 'Floodlights', 'floodlights', 2, 1, '2024-06-13 07:45:56', '2024-06-13 07:45:56'),
(29, 'Pathway lights', 'pathway-lights', 2, 1, '2024-06-13 07:46:34', '2024-06-13 07:46:34'),
(30, 'Metal', 'metal', 8, 1, '2024-06-13 07:47:09', '2024-06-13 07:47:09'),
(31, 'Slate', 'slate', 8, 1, '2024-06-13 07:47:19', '2024-06-13 07:47:19'),
(32, 'Asphalt shingles', 'asphalt-shingles', 8, 1, '2024-06-13 07:47:29', '2024-06-13 07:47:29'),
(33, 'Slate Test', 'slate-test', 10, 1, '2025-01-27 13:09:39', '2025-01-27 13:09:39');

-- --------------------------------------------------------

--
-- Table structure for table `home_evals`
--

DROP TABLE IF EXISTS `home_evals`;
CREATE TABLE IF NOT EXISTS `home_evals` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_built` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bedroom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bathroom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `half_bathroom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `has_suite` tinyint NOT NULL DEFAULT '1' COMMENT '1: No, 2: Yes, 3: Potential',
  `garage` tinyint NOT NULL DEFAULT '0' COMMENT '0: N/A, 1: 1, 2: 2, 3: 3, 4: 4, 5: 5+',
  `garage_type` tinyint NOT NULL DEFAULT '1' COMMENT '1: Attached, 2: Detached',
  `basement_type` tinyint NOT NULL DEFAULT '1' COMMENT '1: None, 2: Full, 3: Partial, 4: Crawl, 5: Walkout',
  `dev_lvl` tinyint NOT NULL DEFAULT '1' COMMENT '1: None, 2: 25%, 3: 50%, 4: 75%, 5: Complete',
  `move_plan` tinyint NOT NULL DEFAULT '1' COMMENT '1: 1 Month, 2: 3 Month, 3: 6 Month, 4: 1 Year, 5: 2+ Years',
  `notes` mediumtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint NOT NULL DEFAULT '1' COMMENT '1: New, 2: Contacted, 3: Closed',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_evals`
--

INSERT INTO `home_evals` (`id`, `fname`, `lname`, `email`, `phone`, `address`, `city`, `state`, `zip`, `year_built`, `size`, `bedroom`, `bathroom`, `half_bathroom`, `has_suite`, `garage`, `garage_type`, `basement_type`, `dev_lvl`, `move_plan`, `notes`, `status`, `created_at`, `updated_at`) VALUES
(1, 'John', 'Doe', 'johndoe@gmail.com', '+19871234519', '221 Bakers Street', 'New York City', 'New York', '10001', '2017', '1280', '4', '3', '1', 2, 1, 1, 3, 5, 3, 'Wondering what your home is worth? I would be happy to help you in whatever way I can. The articles and resources on this page are complimentary and part of the many services I offer.', 1, '2024-06-13 13:20:09', '2024-06-13 13:20:09');

-- --------------------------------------------------------

--
-- Table structure for table `htaccesses`
--

DROP TABLE IF EXISTS `htaccesses`;
CREATE TABLE IF NOT EXISTS `htaccesses` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1' COMMENT '0: Inactive, 1: Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(25, '2024_06_03_112734_create_neighborhoods_table', 2),
(26, '2024_06_03_113828_create_features_table', 2),
(27, '2024_06_03_122537_create_types_table', 2),
(28, '2024_06_03_122834_create_properties_table', 2),
(29, '2024_06_04_053629_create_property_features_table', 2),
(30, '2024_06_04_053907_create_property_types_table', 2),
(31, '2024_06_04_111142_add_code_field_to_neighborhoods_table', 2),
(32, '2024_06_04_115901_add_fields_to_neighborhoods_table', 2),
(33, '2024_06_07_052015_add_fields_to_properties_table', 2),
(34, '2024_06_09_202726_add_fields_to_neighborhoods_table', 2),
(35, '2024_06_10_064724_add_banner_field_to_types_table', 2),
(36, '2024_06_10_070540_add_isfeatured_to_properties_table', 2),
(37, '2024_06_10_111105_create_testimonials_table', 2),
(38, '2024_06_10_114806_create_agents_table', 2),
(39, '2024_06_10_123615_add_short_description_to_properties_table', 2),
(40, '2024_06_10_131450_create_home_evals_table', 2),
(41, '2024_06_11_045819_add_views_column_to_properties_table', 2),
(42, '2024_06_11_085327_create_cities_table', 2),
(43, '2024_06_11_193516_create_search_saves_table', 2),
(44, '2024_06_12_135144_add_fields_to_neighborhoods_table', 2),
(45, '2025_01_16_084544_add_image_field_to_cities_table', 3),
(46, '2025_01_16_102820_alter_city_column_in_neighborhoods_table_to_city_id', 4),
(47, '2025_01_21_071227_create_newsletter_subs_table', 5),
(48, '2025_01_21_081834_add_fields_to_properties_table', 6),
(49, '2025_01_22_054614_create_contact_requests_table', 7),
(50, '2025_01_22_072014_create_tour_bookings_table', 8),
(51, '2025_01_28_054621_add_fields_to_cities_table', 9),
(52, '2025_01_28_130951_create_s_e_o_s_table', 10),
(53, '2025_01_29_100912_add_fields_to_neighborhoods_table', 11),
(54, '2025_01_29_125340_add_fields_to_properties_table', 11),
(55, '2025_01_29_134815_add_fields_to_cities_table', 11),
(56, '2025_02_05_113854_add_field_to_blogs_table', 12),
(57, '2025_02_10_065248_create_htaccesses_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `neighborhoods`
--

DROP TABLE IF EXISTS `neighborhoods`;
CREATE TABLE IF NOT EXISTS `neighborhoods` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` bigint UNSIGNED DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` text COLLATE utf8mb4_unicode_ci,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint NOT NULL DEFAULT '1' COMMENT '0: Inactive, 1: Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `amenity_icon1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amenity_icon2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amenity_icon3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amenity_title1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amenity_title2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amenity_title3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amenity_desc1` text COLLATE utf8mb4_unicode_ci,
  `amenity_desc2` text COLLATE utf8mb4_unicode_ci,
  `amenity_desc3` text COLLATE utf8mb4_unicode_ci,
  `meta_title` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `fb_image` text COLLATE utf8mb4_unicode_ci,
  `fb_title` text COLLATE utf8mb4_unicode_ci,
  `fb_description` text COLLATE utf8mb4_unicode_ci,
  `twitter_title` text COLLATE utf8mb4_unicode_ci,
  `twitter_description` text COLLATE utf8mb4_unicode_ci,
  `twitter_image` text COLLATE utf8mb4_unicode_ci,
  `json_ld_code` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `neighborhoods`
--

INSERT INTO `neighborhoods` (`id`, `title`, `slug`, `code`, `banner`, `zip`, `city_id`, `country`, `state`, `map`, `longitude`, `latitude`, `images`, `description`, `status`, `created_at`, `updated_at`, `amenity_icon1`, `amenity_icon2`, `amenity_icon3`, `amenity_title1`, `amenity_title2`, `amenity_title3`, `amenity_desc1`, `amenity_desc2`, `amenity_desc3`, `meta_title`, `meta_description`, `meta_keywords`, `fb_image`, `fb_title`, `fb_description`, `twitter_title`, `twitter_description`, `twitter_image`, `json_ld_code`) VALUES
(1, 'Calafia', 'calafia', 'C91', 'C911738216576.jpg', '22800', 5, 'Mexico', 'Baja California', NULL, '-117.0617930811035', '32.36585634898786', '\"[]\"', '<p>Calafia is located in Beautiful Rosarito Baja Mexico. For the best value along the Gold Coast corridor of Northern Baja choose our Calafia Condos real estate listings, where your retirement dollars go further.</p><p>According to an old legend, Calafia was the Amazon warrior Queen of a mythical island named California. She was said to be the most beautiful woman in the world…</p><p>Today, Calafia is one of the most established communities in the Baja area. Developed in such a way that allows you to experience the beauty of both the Pacific and Baja, residents enjoy gorgeous sunrises and sunsets all year long. Breathtaking wall-to-wall views, granite kitchens, travertine bathrooms, Mexican tile flooring, and an array of community appointments allow residents to simply relax and enjoy the surroundings.</p><p>Set up in a resort-style with amenities spread all around the grounds with no crowded spots and fresh clean air, Calafia is planned to promote comfort and leisure. The first tower of Calafia was originally Calafia Condos Resort &amp; Villas designed, founded, and built by Igal Gordon and his partners 15 years ago. Since then, Calafia has transformed into three soaring towers with 200 condos and 36 ocean-side villas.</p>', 1, '2025-01-30 05:56:16', '2025-01-30 05:56:16', NULL, NULL, NULL, '', '', '', '', '', '', 'Buy a House in Calafia', 'Calafia is located in Beautiful Rosarito Baja Mexico. For the best value along the Gold Coast corridor of Northern Baja choose our Calafia Condos real estate listings, where your retirement dollars go further.', 'Buy a House in Calafia', 'ca-1738216576988747345.jpg', 'Buy a House in Calafia', 'Calafia is located in Beautiful Rosarito Baja Mexico. For the best value along the Gold Coast corridor of Northern Baja choose our Calafia Condos real estate listings, where your retirement dollars go further.', 'Buy a House in Calafia', 'Calafia is located in Beautiful Rosarito Baja Mexico. For the best value along the Gold Coast corridor of Northern Baja choose our Calafia Condos real estate listings, where your retirement dollars go further.', 'ca-1738216576.jpg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Buy a House in Calafia\",\r\n  \"description\": \"Calafia is located in Beautiful Rosarito Baja Mexico. For the best value along the Gold Coast corridor of Northern Baja choose our Calafia Condos real estate listings, where your retirement dollars go further.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/community/calafia\"\r\n  }\r\n}'),
(2, 'La Jolla Excellence', 'la-jolla-excellence', 'LJE74', 'LJE741738216744.jpg', '22713', 5, 'Mexico', 'Baja California', NULL, '-117.05840399817204', '32.37129421473118', '\"[]\"', '<p>La Jolla Excellence is a premier residential complex in Rosarito, featuring 5 condominum towers and 105 villas. Our development is located on an exclusive beach providing spectacular ocean views nd beach access unlike anywhere in Baja California. Some of the amenities available for residents include pools, jacuzzis, sauna, gym, tennis court and club house</p>', 1, '2025-01-30 05:59:04', '2025-01-30 05:59:04', NULL, NULL, NULL, '', '', '', '', '', '', 'Buy a place in La Jolla Excellence', 'La Jolla Excellence is a premier residential complex in Rosarito, featuring 5 condominum towers and 105 villas. Our development is located on an exclusive beach providing spectacular ocean views nd beach access unlike anywhere in Baja California. Some of the amenities available for residents include pools, jacuzzis, sauna, gym, tennis court and club house', 'Buy a place in La Jolla Excellence', 'lajolla-17382167441613842233.jpg', 'Buy a place in La Jolla Excellence', 'La Jolla Excellence is a premier residential complex in Rosarito, featuring 5 condominum towers and 105 villas. Our development is located on an exclusive beach providing spectacular ocean views nd beach access unlike anywhere in Baja California. Some of the amenities available for residents include pools, jacuzzis, sauna, gym, tennis court and club house', 'Buy a place in La Jolla Excellence', 'La Jolla Excellence is a premier residential complex in Rosarito, featuring 5 condominum towers and 105 villas. Our development is located on an exclusive beach providing spectacular ocean views nd beach access unlike anywhere in Baja California. Some of the amenities available for residents include pools, jacuzzis, sauna, gym, tennis court and club house', 'lajolla-1738216744.jpg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Buy a place in La Jolla Excellence\",\r\n  \"description\": \"La Jolla Excellence is a premier residential complex in Rosarito, featuring 5 condominum towers and 105 villas. Our development is located on an exclusive beach providing spectacular ocean views nd beach access unlike anywhere in Baja California. Some of the amenities available for residents include pools, jacuzzis, sauna, gym, tennis court and club house\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/community/la-jolla-excellence\"\r\n  }\r\n}'),
(3, 'Quinta del Mar', 'quinta-del-mar', 'QDM51', 'QDM511738216882.jpg', '23000', 5, 'Mexico', 'Baja California', NULL, '-117.0629088800537', '32.35047608706888', '\"[]\"', '<p>Quinta Del Mar is one of Rosarito’s most well-known and recognizable gated communities. Its condo building is featured in most Rosarito’s postcards and brochures, making it an unofficial city landmark.</p><p>Located in the heart of Rosarito, but far enough away to escape the noise of Rosarito’s nightlife, Quinta Del Mar, offers a centric location with beach access, beautiful ocean views, resort amenities, tennis courts, and numerous onsite places for good food and entertainment.</p>', 1, '2025-01-30 06:01:22', '2025-01-30 06:01:22', NULL, NULL, NULL, '', '', '', '', '', '', 'Buy Property in Quinta Del Mar', 'Quinta Del Mar is one of Rosarito’s most well-known and recognizable gated communities. Its condo building is featured in most Rosarito’s postcards and brochures, making it an unofficial city landmark.', 'Buy Property in Quinta Del Mar', 'qdm-17382168822093745590.jpg', 'Buy Property in Quinta Del Mar', 'Quinta Del Mar is one of Rosarito’s most well-known and recognizable gated communities. Its condo building is featured in most Rosarito’s postcards and brochures, making it an unofficial city landmark.', 'Buy Property in Quinta Del Mar', 'Quinta Del Mar is one of Rosarito’s most well-known and recognizable gated communities. Its condo building is featured in most Rosarito’s postcards and brochures, making it an unofficial city landmark.', 'qdm-1738216882.jpg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"\",\r\n  \"description\": \"Quinta Del Mar is one of Rosarito’s most well-known and recognizable gated communities. Its condo building is featured in most Rosarito’s postcards and brochures, making it an unofficial city landmark.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/community/quinta-del-mar\"\r\n  }\r\n}'),
(5, 'La Jolla del Mar', 'la-jolla-del-mar', 'LJDM98', 'LJDM981738220331.jpg', '92014', 5, 'Mexico', 'Baja California', NULL, '-117.08267794004303', '32.38737600056963', '\"[]\"', '<p>Experience the epitome of luxury and oceanfront lifestyle with our exclusive. This exquisite 2 bedroom, 2 full bathroom unit offers a sanctuary of comfort and elegance, highlighting sophistication in every detail.Unparalleled Location: Located in one of the most coveted areas of Rosarito</p>', 1, '2025-01-30 06:58:51', '2025-01-30 06:58:51', NULL, NULL, NULL, '', '', '', '', '', '', 'Buy property in La Jolla del Mar in', 'La Jolla del Mar 402 Tower 1, Playa Encantada, Playas de Rosarito, Baja California, Playas de Rosarito, Baja California 22713', 'Buy property in La Jolla del Mar in', '79b79bef95bd8ff3ef980b8dbb27ae42-17382203311959584491.jpg', 'Buy property in La Jolla del Mar in', 'La Jolla del Mar 402 Tower 1, Playa Encantada, Playas de Rosarito, Baja California, Playas de Rosarito, Baja California 22713', 'Buy property in La Jolla del Mar in', 'La Jolla del Mar 402 Tower 1, Playa Encantada, Playas de Rosarito, Baja California, Playas de Rosarito, Baja California 22713', '79b79bef95bd8ff3ef980b8dbb27ae42-1738220331.jpg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Buy property in La Jolla del Mar in \",\r\n  \"description\": \"La Jolla del Mar 402 Tower 1, Playa Encantada, Playas de Rosarito, Baja California, Playas de Rosarito, Baja California 22713\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/community/la-jolla-del-mar\"\r\n  }\r\n}'),
(6, 'Hermitage Los Cabos', 'hermitage-los-cabos', 'HLC14', 'HLC141738220337.jpeg', '23467', 5, 'Mexico', 'Baja California', NULL, '-109.8687703', '22.919055', '\"[]\"', '<p>Perched high in the hills in the popular and prestigious area of El Tezal<strong>, </strong><span style=\"color:#18395a;\">Hermitage </span>offers its 38 residents single level living in 2, 3, and 4 bedroom floor plans.</p><p>Accented by the beautiful landscaping and tremendous stonework, the community is private, secluded, and offers 24 hr. guarded security. &nbsp;Each of the villas is outfitted with top of the line finishes including GE appliances, marble floors, and granite countertops. Most homes in the development also feature a swimming pool with a fountain and heated jacuzzi and pergola. &nbsp;</p>', 1, '2025-01-30 06:58:57', '2025-01-30 06:58:57', NULL, NULL, NULL, '', '', '', '', '', '', 'Buy Property in Hermitage Los Cabos', 'Perched high in the hills in the popular and prestigious area of El Tezal, Hermitage offers its 38 residents single level living in 2, 3, and 4 bedroom floor plans.', 'Buy Property in Hermitage Los Cabos', 'dgffgfgdgdfg-17382203372028255392.jpg', 'Buy Property in Hermitage Los Cabos', 'Perched high in the hills in the popular and prestigious area of El Tezal, Hermitage offers its 38 residents single level living in 2, 3, and 4 bedroom floor plans.', 'Buy Property in Hermitage Los Cabos', 'Perched high in the hills in the popular and prestigious area of El Tezal, Hermitage offers its 38 residents single level living in 2, 3, and 4 bedroom floor plans.', 'dgffgfgdgdfg-1738220337.jpg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Buy Property in Hermitage Los Cabos\",\r\n  \"description\": \"Perched high in the hills in the popular and prestigious area of El Tezal, Hermitage offers its 38 residents single level living in 2, 3, and 4 bedroom floor plans.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/community/hermitage-los-cabos\"\r\n  }\r\n}'),
(7, 'Puerta Cabos Village', 'puerta-cabos-village', 'PCV78', 'PCV781738220514.jpg', '23450', 5, 'Mexico', 'Baja California', NULL, '-107.91368642913042', '25.16331237487771', '\"[]\"', '<p>Enjoy the ocean breeze from the Sea of Cortez and gorgeous sunrises from your 2BD / 2BA Condo at “Puerta Cabos Village” in Cabo San Lucas. Condos are sunny and roomy with a large terrace for great entertaining. Walking distance to Medano Beach, Cabo Marina, downtown, shops, and fine dining restaurants</p>', 1, '2025-01-30 07:01:54', '2025-01-30 07:01:54', NULL, NULL, NULL, '', '', '', '', '', '', 'Buy Property in Puerta Cabos Village', 'Enjoy the ocean breeze from the Sea of Cortez and gorgeous sunrises from your 2BD / 2BA Condo at “Puerta Cabos Village” in Cabo San Lucas. Condos are sunny and roomy with a large terrace for great entertaining. Walking distance to Medano Beach, Cabo Marina, downtown, shops, and fine dining restaurants', 'Buy Property in Puerta Cabos Village', 'vvvvvv-17382205141154344473.jpg', 'Buy Property in Puerta Cabos Village', 'Enjoy the ocean breeze from the Sea of Cortez and gorgeous sunrises from your 2BD / 2BA Condo at “Puerta Cabos Village” in Cabo San Lucas. Condos are sunny and roomy with a large terrace for great entertaining. Walking distance to Medano Beach, Cabo Marina, downtown, shops, and fine dining restaurants', 'Buy Property in Puerta Cabos Village', 'Enjoy the ocean breeze from the Sea of Cortez and gorgeous sunrises from your 2BD / 2BA Condo at “Puerta Cabos Village” in Cabo San Lucas. Condos are sunny and roomy with a large terrace for great entertaining. Walking distance to Medano Beach, Cabo Marina, downtown, shops, and fine dining restaurants', 'vvvvvv-1738220514.jpg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Buy Property in Puerta Cabos Village\",\r\n  \"description\": \"Enjoy the ocean breeze from the Sea of Cortez and gorgeous sunrises from your 2BD / 2BA Condo at “Puerta Cabos Village” in Cabo San Lucas. Condos are sunny and roomy with a large terrace for great entertaining. Walking distance to Medano Beach, Cabo Marina, downtown, shops, and fine dining restaurants\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/community/puerta-cabos-village\"\r\n  }\r\n}'),
(8, 'Montemar', 'montemar', 'M20', 'M201738223258.jpg', '22713', 5, 'Mexico', 'Baja California', NULL, '-117.04200455201298', '32.35602763891157', '\"[]\"', '<p>Montemar Homes, located in Rosarito, is the perfect place to relax and be happy</p><p>You have the option to use your investment as an AirBnB rental and potentially earn up to $200 per night.&nbsp;<br>We are conventiently located 30 minutes from the border.</p><p>This is the perfect opportunity to rent through AirBnB, take advantage of our incredible amenities and the great ocean view from your condo.</p>', 1, '2025-01-30 07:02:39', '2025-01-30 07:47:38', NULL, NULL, NULL, '', '', '', '', '', '', 'Buy property in Montemar', 'Montemar Homes, located in Rosarito, is the perfect place to relax and be happy.', 'Buy property in Montemar', 'IMG_20210224_123429532 (1)-17382232581140421894.jpg', 'Buy property in Montemar', 'Montemar Homes, located in Rosarito, is the perfect place to relax and be happy.', 'Buy property in Montemar', 'Montemar Homes, located in Rosarito, is the perfect place to relax and be happy.', 'IMG_20210224_123429532 (1)-1738223258.jpg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Buy property in Montemar\",\r\n  \"description\": \"Montemar Homes, located in Rosarito, is the perfect place to relax and be happy.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/community/montemar\"\r\n  }\r\n}'),
(9, 'Mision Viejo Sur', 'mision-viejo-sur-', 'MVS64', 'MVS641738220687.png', '22710', 5, 'Mexico', 'Baja California', NULL, '-117.08453770730293', '32.387580000899376', '\"[]\"', '<p>Located south of Rosarito, 45 minutes from the border and 30 minutes from Ensenada and the Guadalupe Valley, Mission Viejo Sur is a development that encompasses a community style resort with a delight architectural inspired a wellness lifestyle.</p>', 1, '2025-01-30 07:04:47', '2025-01-30 07:04:47', NULL, NULL, NULL, '', '', '', '', '', '', 'Buy property in Mision Viejo Sur', 'Located south of Rosarito, 45 minutes from the border and 30 minutes from Ensenada and the Guadalupe Valley, Mission Viejo Sur is a development that encompasses a community style resort with a delight architectural inspired a wellness lifestyle.', 'Buy property in Mision Viejo Sur', 'img2-1738220687448640709.png', 'Buy property in Mision Viejo Sur', 'Located south of Rosarito, 45 minutes from the border and 30 minutes from Ensenada and the Guadalupe Valley, Mission Viejo Sur is a development that encompasses a community style resort with a delight architectural inspired a wellness lifestyle.', 'Buy property in Mision Viejo Sur', 'Located south of Rosarito, 45 minutes from the border and 30 minutes from Ensenada and the Guadalupe Valley, Mission Viejo Sur is a development that encompasses a community style resort with a delight architectural inspired a wellness lifestyle.', 'img2-1738220687.png', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Buy property in Mision Viejo Sur\",\r\n  \"description\": \"Located south of Rosarito, 45 minutes from the border and 30 minutes from Ensenada and the Guadalupe Valley, Mission Viejo Sur is a development that encompasses a community style resort with a delight architectural inspired a wellness lifestyle.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/community/mision-viejo-sur-\"\r\n  }\r\n}'),
(10, 'Real del Sol Residencial', 'real-del-sol-residencial', 'RDSR86', 'RDSR861738220913.jpg', '77710', 5, 'Mexico', 'Baja California', NULL, '-117.01990770512694', '32.35724333759793', '\"[]\"', '<p>Best place to raise a family of your own. Best landscapes, air, and environment.</p>', 1, '2025-01-30 07:08:33', '2025-01-30 07:08:33', NULL, NULL, NULL, '', '', '', '', '', '', 'Buy Property in Real del Sol Residencial', 'Best place to raise a family of your own. Best landscapes, air, and environment.', 'Buy Property in Real del Sol Residencial', 'nvvvv-17382209131011096238.jpg', 'Buy Property in Real del Sol Residencial', 'Best place to raise a family of your own. Best landscapes, air, and environment.', 'Buy Property in Real del Sol Residencial', 'Best place to raise a family of your own. Best landscapes, air, and environment.', 'nvvvv-1738220913.jpg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Buy Property in Real del Sol Residencial\",\r\n  \"description\": \"Best place to raise a family of your own. Best landscapes, air, and environment.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/community/real-del-sol-residencial\"\r\n  }\r\n}'),
(12, 'Vineyard 55 Plus Community', 'vineyard-55-plus-community', 'V5PC53', 'V5PC531738221192.jpg', '87107', 6, 'United States', 'New Meixco', NULL, '-106.64693562436057', '35.040682833488', '\"[]\"', '<p>A vibrant, historic district in Albuquerque, known for its charm, unique shops, and lively nightlife. The community blends classic adobe-style homes with modern amenities.</p>', 1, '2025-01-30 07:13:12', '2025-01-30 07:13:12', NULL, NULL, NULL, '', '', '', '', '', '', 'Buy Property in Vineyard 55 Plus Community', 'A vibrant, historic district in Albuquerque, known for its charm, unique shops, and lively nightlife. The community blends classic adobe-style homes with modern amenities.', 'Buy Property in Vineyard 55 Plus Community', 'asdasdasdasdas-17382211921623529312.jpg', 'Buy Property in Vineyard 55 Plus Community', 'A vibrant, historic district in Albuquerque, known for its charm, unique shops, and lively nightlife. The community blends classic adobe-style homes with modern amenities.', 'Buy Property in Vineyard 55 Plus Community', 'A vibrant, historic district in Albuquerque, known for its charm, unique shops, and lively nightlife. The community blends classic adobe-style homes with modern amenities.', 'asdasdasdasdas-1738221192.jpg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Buy Property in Vineyard 55 Plus Community\",\r\n  \"description\": \"A vibrant, historic district in Albuquerque, known for its charm, unique shops, and lively nightlife. The community blends classic adobe-style homes with modern amenities.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/community/vineyard-55-plus-community\"\r\n  }\r\n}'),
(13, '528 Live Oak Place', '528-live-oak-place', '5LOP99', '5LOP991738221355.jpg', '87122', 6, 'United States', 'New Meixco', NULL, NULL, NULL, '\"[]\"', '<p><span style=\"background-color:rgb(249,249,249);color:rgb(0,0,0);font-size:14px;\">Please Join us for an open house Sunday 2/2/25 11 am to 1pm .Prepare to be impressed by this original owner gem! Unparalleled city &amp; Mountain VIEWS! Extremely energy efficient with 12 inch thick walls, passive solar trombe wall PLUS OWNED SOLAR installed 2021.</span></p>', 1, '2025-01-30 07:15:55', '2025-01-30 07:15:55', NULL, NULL, NULL, '', '', '', '', '', '', 'Buy property in 528 Live Oak Place', 'Please Join us for an open house Sunday 2/2/25 11 am to 1pm .Prepare to be impressed by this original owner gem! Unparalleled city & Mountain VIEWS! Extremely energy efficient with 12 inch thick walls, passive solar trombe wall PLUS OWNED SOLAR installed 2021.', 'Buy property in 528 Live Oak Place', '1280_boomver_1_1077299-1-1738221355682804052.jpg', 'Buy property in 528 Live Oak Place', 'Please Join us for an open house Sunday 2/2/25 11 am to 1pm .Prepare to be impressed by this original owner gem! Unparalleled city & Mountain VIEWS! Extremely energy efficient with 12 inch thick walls, passive solar trombe wall PLUS OWNED SOLAR installed 2021.', 'Buy property in 528 Live Oak Place', 'Please Join us for an open house Sunday 2/2/25 11 am to 1pm .Prepare to be impressed by this original owner gem! Unparalleled city & Mountain VIEWS! Extremely energy efficient with 12 inch thick walls, passive solar trombe wall PLUS OWNED SOLAR installed 2021.', '1280_boomver_1_1077299-1-1738221355.jpg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Buy property in 528 Live Oak Place\",\r\n  \"description\": \"Please Join us for an open house Sunday 2/2/25 11 am to 1pm .Prepare to be impressed by this original owner gem! Unparalleled city & Mountain VIEWS! Extremely energy efficient with 12 inch thick walls, passive solar trombe wall PLUS OWNED SOLAR installed 2021.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/community/528-live-oak-place\"\r\n  }\r\n}'),
(14, 'Nob Hill Neighborhood', 'nob-hill-neighborhood', 'NHN88', 'NHN881738221563.jpg', '87106', 6, 'United States', 'New Meixco', NULL, '-106.6006', '35.0790', '\"[]\"', '<p>Nob Hill is a vibrant, historic district in Albuquerque, known for its Route 66 charm, unique shops, and lively nightlife. The community blends classic adobe-style homes with modern amenities.</p>', 1, '2025-01-30 07:19:23', '2025-01-30 07:19:23', NULL, NULL, NULL, '', '', '', '', '', '', 'Nob Hill Neighborhood – Historic Route 66 Charm in Albuquerque', 'Explore Nob Hill, Albuquerque’s lively community along Route 66, featuring historic charm, shopping, and a vibrant nightlife.', 'Nob Hill Albuquerque, Route 66 neighborhood, Albuquerque historic districts', 'vbnvnbvnvn-1738221563542869245.jpg', 'Nob Hill Neighborhood – Historic Route 66 Charm in Albuquerque', 'Explore Nob Hill, Albuquerque’s lively community along Route 66, featuring historic charm, shopping, and a vibrant nightlife.', 'Nob Hill Neighborhood – Historic Route 66 Charm in Albuquerque', 'Explore Nob Hill, Albuquerque’s lively community along Route 66, featuring historic charm, shopping, and a vibrant nightlife.', 'ioioio-1738221563.jpg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Nob Hill Neighborhood – Historic Route 66 Charm in Albuquerque\",\r\n  \"description\": \"Explore Nob Hill, Albuquerque’s lively community along Route 66, featuring historic charm, shopping, and a vibrant nightlife.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/community/nob-hill-neighborhood\"\r\n  }\r\n}'),
(15, 'Silver Lake', 'silver-lake', 'SL13', 'SL131738221653.jpg', '90026', 7, 'United States', 'California', NULL, '-118.2702', '34.0865', '\"[]\"', '<p>Silver Lake is a trendy, artistic community in Los Angeles, known for its indie boutiques, vibrant murals, and a hip, creative vibe.</p>', 1, '2025-01-30 07:20:53', '2025-01-30 07:20:53', NULL, NULL, NULL, '', '', '', '', '', '', 'Silver Lake Los Angeles – Trendy and Artistic Community', 'Discover Silver Lake, LA’s most artistic neighborhood, featuring indie shops, street art, and a hip, creative community', 'Silver Lake LA, artistic neighborhood LA, Los Angeles trendy areas', 'retertert-17382216531121330083.jpg', 'Silver Lake Los Angeles – Trendy and Artistic Community', 'Discover Silver Lake, LA’s most artistic neighborhood, featuring indie shops, street art, and a hip, creative community', 'Silver Lake Los Angeles – Trendy and Artistic Community', 'Discover Silver Lake, LA’s most artistic neighborhood, featuring indie shops, street art, and a hip, creative community', 'retertert-1738221653.jpg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Silver Lake Los Angeles – Trendy and Artistic Community\",\r\n  \"description\": \"Discover Silver Lake, LA’s most artistic neighborhood, featuring indie shops, street art, and a hip, creative community\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/community/silver-lake\"\r\n  }\r\n}'),
(16, 'Westwood LA', 'westwood-la', 'WL90', 'WL901738221750.jpg', '90024', 7, 'United States', 'California', NULL, '-118.4473', '34.0595', '\"[]\"', '<p>Home to UCLA, Westwood is a lively, student-friendly community with cultural attractions, museums, and a mix of urban and residential spaces.</p>', 1, '2025-01-30 07:22:30', '2025-01-30 07:22:30', NULL, NULL, NULL, '', '', '', '', '', '', 'Westwood Los Angeles – Home to UCLA and Cultural Attractions', 'Westwood, home to UCLA, offers a lively atmosphere with museums, theaters, and a blend of urban and residential spaces in Los Angeles.', 'Westwood LA, UCLA neighborhood, best neighborhoods in LA', 'bbbbbbbbbbb-1738221750223314317.jpg', 'Westwood Los Angeles – Home to UCLA and Cultural Attractions', 'Westwood, home to UCLA, offers a lively atmosphere with museums, theaters, and a blend of urban and residential spaces in Los Angeles.', 'Westwood Los Angeles – Home to UCLA and Cultural Attractions', 'Westwood, home to UCLA, offers a lively atmosphere with museums, theaters, and a blend of urban and residential spaces in Los Angeles.', 'bbbbbbbbbbb-1738221750.jpg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Westwood Los Angeles – Home to UCLA and Cultural Attractions\",\r\n  \"description\": \"Westwood, home to UCLA, offers a lively atmosphere with museums, theaters, and a blend of urban and residential spaces in Los Angeles.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/community/westwood-la\"\r\n  }\r\n}'),
(17, 'Playacar, Playa del Carmen, Mexico', 'playacar-playa-del-carmen-mexico', 'PPDCM50', 'PPDCM501738221865.jpg', '77717', 3, 'Mexico', 'Quintana Roo', NULL, '-87.0901', '20.6170', '\"[]\"', '<p>Playacar is an exclusive gated community in Playa del Carmen, known for its luxury resorts, beachfront villas, and golf course.</p>', 1, '2025-01-30 07:24:25', '2025-01-30 07:24:25', NULL, NULL, NULL, '', '', '', '', '', '', 'Playacar – Luxury Living in Playa del Carmen', 'Explore Playacar, a high-end gated community in Playa del Carmen featuring luxury homes, beachfront views, and a golf course.', 'Playacar, luxury communities Playa del Carmen, beachfront properties Mexico', 'czxczczxc-1738221865218142926.jpg', 'Playacar – Luxury Living in Playa del Carmen', 'Explore Playacar, a high-end gated community in Playa del Carmen featuring luxury homes, beachfront views, and a golf course.', 'Playacar – Luxury Living in Playa del Carmen', 'Explore Playacar, a high-end gated community in Playa del Carmen featuring luxury homes, beachfront views, and a golf course.', 'czxczczxc-1738221865.jpg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Playacar – Luxury Living in Playa del Carmen\",\r\n  \"description\": \"Explore Playacar, a high-end gated community in Playa del Carmen featuring luxury homes, beachfront views, and a golf course.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/community/playacar-playa-del-carmen-mexico\"\r\n  }\r\n}'),
(18, 'Centro Playa del Carmen', 'centro-playa-del-carmen', 'CPDC79', 'CPDC791738221953.jpg', '77710', 3, 'Mexico', 'Quintana Roo', NULL, '-87.0739', '20.6296', '\"[]\"', '<p>The heart of Playa del Carmen, Centro offers walkable streets, vibrant nightlife, and easy access to the beach and 5th Avenue.</p>', 1, '2025-01-30 07:25:53', '2025-01-30 07:25:53', NULL, NULL, NULL, '', '', '', '', '', '', 'Centro Playa del Carmen – The Heart of the Riviera Maya', 'Live in the heart of Playa del Carmen, with vibrant nightlife, walkable streets, and beachfront access.', 'Playa del Carmen downtown, 5th Avenue Playa, best neighborhoods Playa', 'xzczxczxc-17382219531809627194.jpg', 'Centro Playa del Carmen – The Heart of the Riviera Maya', 'Live in the heart of Playa del Carmen, with vibrant nightlife, walkable streets, and beachfront access.', 'Centro Playa del Carmen – The Heart of the Riviera Maya', 'Live in the heart of Playa del Carmen, with vibrant nightlife, walkable streets, and beachfront access.', 'xzczxczxc-1738221953.jpg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Centro Playa del Carmen – The Heart of the Riviera Maya\",\r\n  \"description\": \"Live in the heart of Playa del Carmen, with vibrant nightlife, walkable streets, and beachfront access.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/community/centro-playa-del-carmen\"\r\n  }\r\n}'),
(19, 'Puerto Cancun', 'puerto-cancun', 'PC80', 'PC801738222085.jpg', '77500', 2, 'Mexico', 'Quintana Roo', NULL, '-86.8141', '21.1606', '\"[]\"', '<p>Puerto Cancún is an exclusive waterfront community with luxury residences, a marina, golf course, and high-end shopping. It offers a blend of modern city life and beachfront living.</p>', 1, '2025-01-30 07:28:05', '2025-01-30 07:28:05', NULL, NULL, NULL, '', '', '', '', '', '', 'Puerto Cancún – Luxury Waterfront Living', 'Discover Puerto Cancún, a high-end waterfront community with luxury residences, a marina, and a golf course in the heart of Cancun.', 'Puerto Cancún – Luxury Waterfront Living', 'ertertdf-1738222085697653432.jpg', 'Puerto Cancún – Luxury Waterfront Living', 'Discover Puerto Cancún, a high-end waterfront community with luxury residences, a marina, and a golf course in the heart of Cancun.', 'Puerto Cancún – Luxury Waterfront Living', 'Discover Puerto Cancún, a high-end waterfront community with luxury residences, a marina, and a golf course in the heart of Cancun.', 'ertertdf-1738222085.jpg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Puerto Cancún – Luxury Waterfront Living\",\r\n  \"description\": \" Discover Puerto Cancún, a high-end waterfront community with luxury residences, a marina, and a golf course in the heart of Cancun.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/community/puerto-cancun\"\r\n  }\r\n}'),
(20, 'Viceroy Los Cabos', 'viceroy-los-cabos', 'VLC18', 'VLC181738223091.jpg', '23405', 4, 'Mexico', 'Baja California Sur', NULL, '-109.699951', '23.062283', '\"[]\"', '<p>Hotel El Ganzo is a home for the creative soul in a unique part of Baja California Sur. Surrounded by water on three sides where the Pacific Ocean meets the Sea of Cortez, El Ganzo offers more than a destination – El Ganzo is a trip, an experience steeped in art, culture and other opportunities for self-fulfillment.</p>', 1, '2025-01-30 07:28:25', '2025-01-30 07:44:51', NULL, NULL, NULL, '', '', '', '', '', '', 'Buy property in Viceroy Los Cabos', 'Hotel El Ganzo is a home for the creative soul in a unique part of Baja California Sur. Surrounded by water on three sides where the Pacific Ocean meets the Sea of Cortez, El Ganzo offers more than a destination – El Ganzo is a trip, an experience steeped in art, culture and other opportunities for self-fulfillment.', 'Buy property in Viceroy Los Cabos', '2024-07-30 (2)-1738223091328501424.jpg', 'Buy property in Viceroy Los Cabos', 'Hotel El Ganzo is a home for the creative soul in a unique part of Baja California Sur. Surrounded by water on three sides where the Pacific Ocean meets the Sea of Cortez, El Ganzo offers more than a destination – El Ganzo is a trip, an experience steeped in art, culture and other opportunities for self-fulfillment.', 'Buy property in Viceroy Los Cabos', 'Hotel El Ganzo is a home for the creative soul in a unique part of Baja California Sur. Surrounded by water on three sides where the Pacific Ocean meets the Sea of Cortez, El Ganzo offers more than a destination – El Ganzo is a trip, an experience steeped in art, culture and other opportunities for self-fulfillment.', '2024-07-30 (2)-1738223091.jpg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Buy property in Viceroy Los Cabos\",\r\n  \"description\": \"Hotel El Ganzo is a home for the creative soul in a unique part of Baja California Sur. Surrounded by water on three sides where the Pacific Ocean meets the Sea of Cortez, El Ganzo offers more than a destination – El Ganzo is a trip, an experience steeped in art, culture and other opportunities for self-fulfillment.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/community/viceroy-los-cabos\"\r\n  }\r\n}'),
(21, 'Polanco', 'polanco', 'P16', 'P161738222194.jpg', '11560', 1, 'Mexico', 'Federal Territory', NULL, '-99.1930', '19.4326', '\"[]\"', '<p>Polanco is one of Mexico City’s most upscale neighborhoods, known for luxury shopping, gourmet dining, and cultural attractions.</p>', 1, '2025-01-30 07:29:54', '2025-01-30 07:29:54', NULL, NULL, NULL, '', '', '', '', '', '', 'Polanco Mexico City – Luxury & Culture', 'Explore Polanco, Mexico City’s most upscale neighborhood, offering luxury shopping, fine dining, and a vibrant cultural scene.', 'Polanco Mexico City, luxury living CDMX, best neighborhoods Mexico City', 'ku,uk,uk,-17382221942141533104.jpg', 'Polanco Mexico City – Luxury & Culture', 'Explore Polanco, Mexico City’s most upscale neighborhood, offering luxury shopping, fine dining, and a vibrant cultural scene.', 'Polanco Mexico City – Luxury & Culture', 'Explore Polanco, Mexico City’s most upscale neighborhood, offering luxury shopping, fine dining, and a vibrant cultural scene.', 'ku,uk,uk,-1738222194.jpg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Polanco Mexico City – Luxury & Culture\",\r\n  \"description\": \"Explore Polanco, Mexico City’s most upscale neighborhood, offering luxury shopping, fine dining, and a vibrant cultural scene.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/community/polanco\"\r\n  }\r\n}'),
(22, 'East Downtown (EDo)', 'east-downtown-edo', 'ED(53', 'ED(531738222950.jpg', '87102', 6, 'United States', 'New Meixco', NULL, '-106.6422', '35.0831', '\"[]\"', '<p>East Downtown, or EDo, is a thriving urban district blending historic charm with modern amenities. It features loft-style apartments, trendy eateries, and a growing arts scene.</p>', 1, '2025-01-30 07:35:47', '2025-01-30 07:42:30', NULL, NULL, NULL, '', '', '', '', '', '', 'Buy property in East Downtown (EDo)', 'East Downtown, or EDo, is a thriving urban district blending historic charm with modern amenities. It features loft-style apartments, trendy eateries, and a growing arts scene.', 'Buy property in East Downtown (EDo)', 'PXL_20220314_011136924 (1)-17382229501116273807.jpg', 'Buy property in East Downtown (EDo)', 'East Downtown, or EDo, is a thriving urban district blending historic charm with modern amenities. It features loft-style apartments, trendy eateries, and a growing arts scene.', 'Buy property in East Downtown (EDo)', 'East Downtown, or EDo, is a thriving urban district blending historic charm with modern amenities. It features loft-style apartments, trendy eateries, and a growing arts scene.', 'PXL_20220314_011136924 (1)-1738222950.jpg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Buy property in East Downtown (EDo)\",\r\n  \"description\": \"East Downtown, or EDo, is a thriving urban district blending historic charm with modern amenities. It features loft-style apartments, trendy eateries, and a growing arts scene.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/community/east-downtown-edo\"\r\n  }\r\n}'),
(23, 'Four Hills Village', 'four-hills-village', 'FHV18', 'FHV181738222841.jpg', '87123', 6, 'United States', 'New Meixco', NULL, '-106.5019', '35.0528', '\"[]\"', '<p>Four Hills Village offers a scenic, upscale residential community with spacious homes, mountain views, and a prestigious golf course.</p>', 1, '2025-01-30 07:40:41', '2025-01-30 07:40:41', NULL, NULL, NULL, '', '', '', '', '', '', 'Buy property in Four Hills Village', 'Four Hills Village offers a scenic, upscale residential community with spacious homes, mountain views, and a prestigious golf course.', 'Buy property in Four Hills Village', 'unnamed (1)-1738222841353576622.jpg', 'Buy property in Four Hills Village', 'Four Hills Village offers a scenic, upscale residential community with spacious homes, mountain views, and a prestigious golf course.', 'Buy property in Four Hills Village', 'Four Hills Village offers a scenic, upscale residential community with spacious homes, mountain views, and a prestigious golf course.', 'unnamed (1)-1738222841.jpg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Buy property in Four Hills Village\",\r\n  \"description\": \"Four Hills Village offers a scenic, upscale residential community with spacious homes, mountain views, and a prestigious golf course.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/community/four-hills-village\"\r\n  }\r\n}'),
(24, 'Taylor Ranch', 'taylor-ranch', 'TR26', 'TR261738223581.jpg', '87120', 6, 'United States', 'New Meixco', NULL, '-106.7111', '35.1571', '\"[]\"', '<p>Located on Albuquerque’s Westside, Taylor Ranch is a suburban community with parks, trails, and family-friendly amenities near the Rio Grande.</p>', 1, '2025-01-30 07:53:01', '2025-01-30 07:53:01', NULL, NULL, NULL, '', '', '', '', '', '', 'Buy property in Taylor Ranch', 'Located on Albuquerque’s Westside, Taylor Ranch is a suburban community with parks, trails, and family-friendly amenities near the Rio Grande.', 'Buy property in Taylor Ranch', '20220708_135814-1738223581856091326.jpg', 'Buy property in Taylor Ranch', 'Located on Albuquerque’s Westside, Taylor Ranch is a suburban community with parks, trails, and family-friendly amenities near the Rio Grande.', 'Buy property in Taylor Ranch', 'Located on Albuquerque’s Westside, Taylor Ranch is a suburban community with parks, trails, and family-friendly amenities near the Rio Grande.', '20220708_135814-1738223581.jpg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Buy property in Taylor Ranch\",\r\n  \"description\": \"Located on Albuquerque’s Westside, Taylor Ranch is a suburban community with parks, trails, and family-friendly amenities near the Rio Grande.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/community/taylor-ranch\"\r\n  }\r\n}');
INSERT INTO `neighborhoods` (`id`, `title`, `slug`, `code`, `banner`, `zip`, `city_id`, `country`, `state`, `map`, `longitude`, `latitude`, `images`, `description`, `status`, `created_at`, `updated_at`, `amenity_icon1`, `amenity_icon2`, `amenity_icon3`, `amenity_title1`, `amenity_title2`, `amenity_title3`, `amenity_desc1`, `amenity_desc2`, `amenity_desc3`, `meta_title`, `meta_description`, `meta_keywords`, `fb_image`, `fb_title`, `fb_description`, `twitter_title`, `twitter_description`, `twitter_image`, `json_ld_code`) VALUES
(25, 'Echo Park', 'echo-park', 'EP49', 'EP491738224032.jpg', '90026', 7, 'United States', 'California', NULL, '-118.2606', '34.0782', '\"[]\"', '<p>Echo Park is a vibrant, historic neighborhood with indie coffee shops, music venues, and scenic views of the famous Echo Park Lake.</p>', 1, '2025-01-30 08:00:32', '2025-01-30 08:00:32', NULL, NULL, NULL, '', '', '', '', '', '', 'Buy property in Echo Park', 'Echo Park is a vibrant, historic neighborhood with indie coffee shops, music venues, and scenic views of the famous Echo Park Lake.', 'Buy property in Echo Park', '20220815_113710~2-1738224032866207030.jpg', 'Buy property in Echo Park', 'Echo Park is a vibrant, historic neighborhood with indie coffee shops, music venues, and scenic views of the famous Echo Park Lake.', 'Buy property in Echo Park', 'Echo Park is a vibrant, historic neighborhood with indie coffee shops, music venues, and scenic views of the famous Echo Park Lake.', '20220815_113710~2-1738224032.jpg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Buy property in Echo Park\",\r\n  \"description\": \"Echo Park is a vibrant, historic neighborhood with indie coffee shops, music venues, and scenic views of the famous Echo Park Lake.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/community/echo-park\"\r\n  }\r\n}'),
(26, 'Koreatown (K-Town)', 'koreatown-k-town', 'K(86', 'K(861738224375.jpg', '90010', 7, 'United States', 'California', NULL, '-118.2966', '34.0620', '\"[]\"', '<p>Koreatown is a cultural hotspot in Los Angeles, known for its diverse food scene, lively nightlife, and modern high-rise apartments.</p>', 1, '2025-01-30 08:06:15', '2025-01-30 08:06:15', NULL, NULL, NULL, '', '', '', '', '', '', 'Buy property in Koreatown (K-Town)', 'Koreatown is a cultural hotspot in Los Angeles, known for its diverse food scene, lively nightlife, and modern high-rise apartments.', 'Buy property in Koreatown (K-Town)', '2022-12-01-17382243751421065650.jpg', 'Buy property in Koreatown (K-Town)', 'Koreatown is a cultural hotspot in Los Angeles, known for its diverse food scene, lively nightlife, and modern high-rise apartments.', 'Buy property in Koreatown (K-Town)', 'Koreatown is a cultural hotspot in Los Angeles, known for its diverse food scene, lively nightlife, and modern high-rise apartments.', '2022-12-01-1738224375.jpg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Buy property in Koreatown (K-Town)\",\r\n  \"description\": \"Koreatown is a cultural hotspot in Los Angeles, known for its diverse food scene, lively nightlife, and modern high-rise apartments.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/community/koreatown-k-town\"\r\n  }\r\n}'),
(27, 'Gonzalo Guerrero', 'gonzalo-guerrero', 'GG30', 'GG301738224755.jpg', '77720', 3, 'Mexico', 'Quintana Roo', NULL, '-87.0765', '20.6293', '\"[]\"', '<p>A central, walkable neighborhood with easy beach access, boutique hotels, and a thriving local dining scene.</p>', 1, '2025-01-30 08:12:35', '2025-01-30 08:12:35', NULL, NULL, NULL, '', '', '', '', '', '', 'Buy property in Gonzalo Guerrero', 'A central, walkable neighborhood with easy beach access, boutique hotels, and a thriving local dining scene.', 'Buy property in Gonzalo Guerrero', '2022-03-02-17382247552073935759.jpg', 'Buy property in Gonzalo Guerrero', 'A central, walkable neighborhood with easy beach access, boutique hotels, and a thriving local dining scene.', 'Buy property in Gonzalo Guerrero', 'A central, walkable neighborhood with easy beach access, boutique hotels, and a thriving local dining scene.', '2022-03-02-1738224755.jpg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Buy property in Gonzalo Guerrero\",\r\n  \"description\": \"A central, walkable neighborhood with easy beach access, boutique hotels, and a thriving local dining scene.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/community/gonzalo-guerrero\"\r\n  }\r\n}'),
(28, 'Casa Zazil', 'casa-zazil', 'CZ11', 'CZ111738225622.jpg', '77727', 3, 'Mexico', 'Quintana Roo', NULL, '-87.0615', '20.6418', '\"[]\"', '<p>A fast-growing area featuring modern condos, beach clubs, and a laid-back yet sophisticated atmosphere.</p>', 1, '2025-01-30 08:27:02', '2025-01-30 08:27:02', NULL, NULL, NULL, '', '', '', '', '', '', 'Buy Property in Casa Zazil', 'A fast-growing area featuring modern condos, beach clubs, and a laid-back yet sophisticated atmosphere.', 'Buy Property in Casa Zazil', '2024-08-12-1738225622981690302.jpg', 'Buy Property in Casa Zazil', 'A fast-growing area featuring modern condos, beach clubs, and a laid-back yet sophisticated atmosphere.', 'Buy Property in Casa Zazil', 'A fast-growing area featuring modern condos, beach clubs, and a laid-back yet sophisticated atmosphere.', '2024-08-12-1738225622.jpg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Buy Property in Casa Zazil\",\r\n  \"description\": \"A fast-growing area featuring modern condos, beach clubs, and a laid-back yet sophisticated atmosphere.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/community/casa-zazil\"\r\n  }\r\n}');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_subs`
--

DROP TABLE IF EXISTS `newsletter_subs`;
CREATE TABLE IF NOT EXISTS `newsletter_subs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parent_blog_categories`
--

DROP TABLE IF EXISTS `parent_blog_categories`;
CREATE TABLE IF NOT EXISTS `parent_blog_categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `blog_id` int DEFAULT NULL,
  `parent_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parent_blog_categories`
--

INSERT INTO `parent_blog_categories` (`id`, `blog_id`, `parent_id`) VALUES
(1, 35, 22),
(2, 35, 23),
(3, 35, 24),
(5, 36, 15),
(6, 36, 24),
(7, 36, 19);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

DROP TABLE IF EXISTS `properties`;
CREATE TABLE IF NOT EXISTS `properties` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(20,2) DEFAULT NULL,
  `views` bigint UNSIGNED NOT NULL DEFAULT '0',
  `neighborhood_id` bigint UNSIGNED NOT NULL,
  `listing_status` tinyint NOT NULL COMMENT '1: For Sale, 2: For Rent, 3: Rented, 4: Sale Pending, 5: Sold',
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size_mt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bedrooms` int NOT NULL,
  `bathrooms` int NOT NULL,
  `parking_spaces` int NOT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gallery` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `map` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dev_lvl` tinyint NOT NULL COMMENT '1: Under Construction, 2: Built, 3: Under Renovation, 4: Renovated',
  `year_built` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `property_tax` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hoa_fees` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rent_cycle` tinyint NOT NULL COMMENT '1: Monthly, 2: Quarterly, 3: Semi-Annually, 4: Annually',
  `date_available` datetime NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1' COMMENT '0: Inactive, 1: Active',
  `is_featured` tinyint NOT NULL DEFAULT '1' COMMENT '1: No, 2: Yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `listing_type` tinyint NOT NULL DEFAULT '0' COMMENT '0=Sale, 1=Rent',
  `lattitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `GLA` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `GLA_mt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avg_ft` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avg_mt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `files` text COLLATE utf8mb4_unicode_ci,
  `agent` bigint UNSIGNED DEFAULT NULL,
  `meta_title` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `fb_image` text COLLATE utf8mb4_unicode_ci,
  `fb_title` text COLLATE utf8mb4_unicode_ci,
  `fb_description` text COLLATE utf8mb4_unicode_ci,
  `twitter_title` text COLLATE utf8mb4_unicode_ci,
  `twitter_description` text COLLATE utf8mb4_unicode_ci,
  `twitter_image` text COLLATE utf8mb4_unicode_ci,
  `json_ld_code` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `properties_code_unique` (`code`),
  KEY `properties_neighborhood_id_foreign` (`neighborhood_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `code`, `title`, `slug`, `price`, `views`, `neighborhood_id`, `listing_status`, `size`, `size_mt`, `bedrooms`, `bathrooms`, `parking_spaces`, `banner`, `gallery`, `map`, `description`, `short_description`, `address`, `country`, `state`, `city`, `dev_lvl`, `year_built`, `property_tax`, `hoa_fees`, `rent_cycle`, `date_available`, `status`, `is_featured`, `created_at`, `updated_at`, `listing_type`, `lattitude`, `longitude`, `GLA`, `GLA_mt`, `avg_ft`, `avg_mt`, `files`, `agent`, `meta_title`, `meta_description`, `meta_keywords`, `fb_image`, `fb_title`, `fb_description`, `twitter_title`, `twitter_description`, `twitter_image`, `json_ld_code`) VALUES
(1, 'LJE74S6791', 'Oceanfront Casa Cortez, La Jolla Excellence', '-oceanfront-casa-cortez-la-jolla-excellence', 9500000.00, 7, 2, 1, '8118', '754.19', 5, 6, 4, 'LJE74S67911738217514.webp', '[\"481738217236.webp\",\"7381738217236.webp\",\"9401738217236.webp\",\"9321738217237.webp\",\"8021738217237.webp\"]', NULL, '<p>Nestled in the prestigious community of La Jolla Excellence, presents a rare opportunity to indulge in the epitome of luxury coastal living. This magnificent 5-bedroom oceanfront home effortlessly combines contemporary elegance with unparalleled panoramic views of the sparkling waters of the Sea of Cortez, promising a lifestyle of opulence and tranquility. Step inside this architectural masterpiece and be greeted by an expansive living space exuding sophistication and charm. The meticulously designed interiors boast high-end finishes, sleek modern amenities, and ample natural light that creates a warm and inviting ambiance in every room. From the gourmet chef\'s kitchen to the spacious bedrooms offering breathtaking ocean vistas, every corner of Casa Cortez is thoughtfully crafted to provide comfort and style. Outside, a private infinity pool and lush gardens offer endless opportunities for relaxation and entertainment. Golf Membership included in the purchase, only available to owners in La Jolla Excellence.Whether you seek a permanent residence or a vacation retreat, Casa Cortez is the ultimate haven for those who appreciate the finer things in life. Embrace the lavish coastal lifestyle and make this oceanfront gem your own slice of paradise in Puerto La Jolla Excellence.</p>', 'Nestled in the prestigious community of La Jolla Excellence, presents a rare opportunity to indulge in the epitome of luxury coastal living. This magnificent 5-bedroom oceanfront home effortlessly combines contemporary elegance with unparalleled panoramic views of the sparkling waters of the Sea of Cortez, promising a lifestyle of opulence and tranquility.', 'Street 1, La Jolla Avenue', 'Mexico', 'Baja California', 'Rosarito', 2, '2020', '1290', '1290', 1, '2025-01-30 06:11:54', 1, 2, '2025-01-30 06:11:54', '2025-02-03 06:09:44', 1, '32.363229515577984', '-117.0548407953369', '8000', '743.22', '1170.24', '12596.35', '[\"LJE74S67911738217514679b182a4016f.pdf\",\"LJE74S67911738217514679b182a4037f.pdf\"]', 3, 'Buy  Oceanfront Casa Cortez, La Jolla Excellence', 'Nestled in the prestigious community of La Jolla Excellence, presents a rare opportunity to indulge in the epitome of luxury coastal living. This magnificent 5-bedroom oceanfront home effortlessly combines contemporary elegance with unparalleled panoramic views of the sparkling waters of the Sea of Cortez, promising a lifestyle of opulence and tranquility.', 'Buy  Oceanfront Casa Cortez, La Jolla Excellence', 'WhatsApp_Image_2025-01-23_at_20-17382175141125748945.png', 'Buy  Oceanfront Casa Cortez, La Jolla Excellence', 'Nestled in the prestigious community of La Jolla Excellence, presents a rare opportunity to indulge in the epitome of luxury coastal living. This magnificent 5-bedroom oceanfront home effortlessly combines contemporary elegance with unparalleled panoramic views of the sparkling waters of the Sea of Cortez, promising a lifestyle of opulence and tranquility.', 'Buy  Oceanfront Casa Cortez, La Jolla Excellence', 'Nestled in the prestigious community of La Jolla Excellence, presents a rare opportunity to indulge in the epitome of luxury coastal living. This magnificent 5-bedroom oceanfront home effortlessly combines contemporary elegance with unparalleled panoramic views of the sparkling waters of the Sea of Cortez, promising a lifestyle of opulence and tranquility.', 'WhatsApp_Image_2025-01-23_at_20-1738217514.png', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Buy  Oceanfront Casa Cortez, La Jolla Excellence\",\r\n  \"description\": \"Nestled in the prestigious community of La Jolla Excellence, presents a rare opportunity to indulge in the epitome of luxury coastal living. This magnificent 5-bedroom oceanfront home effortlessly combines contemporary elegance with unparalleled panoramic views of the sparkling waters of the Sea of Cortez, promising a lifestyle of opulence and tranquility.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/property/-oceanfront-casa-cortez-la-jolla-excellence\"\r\n  }\r\n}'),
(2, 'LJE74R2383', 'Villa 452, La Jolla Excellence', '-villa-452-la-jolla-excellence', 14000.00, 0, 2, 2, '2000', '185.81', 6, 6, 2, 'LJE74R23831738217844.png', '[\"9691738217716.png\",\"5401738217716.png\",\"5651738217718.png\",\"6721738217720.png\",\"8201738217720.png\"]', NULL, '<p>Villa 452 stands as one of the finest oceanfront properties in La Jolla Excellence, showcasing a renovation that blends contemporary elegance with the iconic Palmilla exterior aesthetic. With direct access to a broad, pristine beach, this villa spans over 5,000 square feet of luxurious indoor and outdoor spaces, all with stunning Sea of Cortez views.Inside, Villa 452 is an exquisite blend of modern design and classic craftsmanship, with refined furnishings, curated local artwork, and marble bathrooms. A sophisticated lighting design balances natural sunlight with ambient ceiling fixtures, enhancing the villa\'s warm and inviting atmosphere. For those seeking an exceptional lifestyle, Villa 452 represents a rare market opportunity within Los Cabos\' most exclusive community.</p>', 'A masterpiece property with direct access to a broad, pristine beach, this villa spans over 5,000 square feet of luxurious indoor and outdoor spaces, all with stunning Sea of Cortez views.', '452 - Main Boulevard, La Jolla Excellence', 'Mexico', 'Baja California', 'Rosarito', 2, '2010', '', '', 1, '2025-01-30 06:17:24', 1, 1, '2025-01-30 06:17:24', '2025-01-30 06:17:24', 2, '32.36119952786547', '-117.04703020268553', '2000', '185.81', '0', '0', '[\"LJE74R23831738217844679b1974d0c9f.pdf\",\"LJE74R23831738217844679b1974d0f21.pdf\"]', 5, 'Buy  Villa 452, La Jolla Excellence', 'A masterpiece property with direct access to a broad, pristine beach, this villa spans over 5,000 square feet of luxurious indoor and outdoor spaces, all with stunning Sea of Cortez views.', 'Buy  Villa 452, La Jolla Excellence', 'Untitled-1738217844652750998.jpg', 'Buy  Villa 452, La Jolla Excellence', 'A masterpiece property with direct access to a broad, pristine beach, this villa spans over 5,000 square feet of luxurious indoor and outdoor spaces, all with stunning Sea of Cortez views.', 'Buy  Villa 452, La Jolla Excellence', 'A masterpiece property with direct access to a broad, pristine beach, this villa spans over 5,000 square feet of luxurious indoor and outdoor spaces, all with stunning Sea of Cortez views.', 'Untitled-1738217844.jpg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Buy  Villa 452, La Jolla Excellence\",\r\n  \"description\": \"A masterpiece property with direct access to a broad, pristine beach, this villa spans over 5,000 square feet of luxurious indoor and outdoor spaces, all with stunning Sea of Cortez views.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/property/-villa-452-la-jolla-excellence\"\r\n  }\r\n}'),
(3, 'P16S3746', 'Villa Reforma 360', 'villa-reforma-360', 1200000.00, 0, 21, 1, '3500', '325.16', 3, 5, 2, 'P16S37461738222740.jpg', '[\"7301738222706.jpg\",\"9391738222712.jpg\",\"5771738222715.jpg\",\"351738222716.jpg\",\"8641738222723.jpg\"]', NULL, '<p>Nestled in the prestigious Polanco district, Villa Reforma 360 offers elegance and sophistication. This modern residence features a spacious living area, gourmet kitchen, high ceilings, and a private rooftop with breathtaking views of Mexico City. Located near luxury boutiques and fine dining, this home provides the perfect blend of comfort and convenience.</p>', 'A luxury villa in the heart of Polanco featuring modern design, private rooftop, and smart home technology.', 'Av. Paseo de la Reforma 360, Polanco, CDMX', 'Mexico', 'Federal Territory', 'Mexico City', 2, '2025', '2500', '600', 1, '2025-01-30 07:39:00', 1, 2, '2025-01-30 07:39:00', '2025-01-30 08:23:53', 1, '19.4326', '-99.1930', '3200', '297.29', '342.86', '3690.49', '[\"P16S37461738222740679b2c942ff4f.pdf\",\"P16S37461738222740679b2c9430144.pdf\"]', 5, 'Villa Reforma 360 – Luxury Living in Polanco', 'Discover Villa Reforma 360, a modern luxury villa in the heart of Polanco with smart home features, a private rooftop, and breathtaking views.', 'Polanco luxury home, Mexico City real estate, villa for sale Polanco', 'zcssdf-1738222740904691544.jpg', 'Villa Reforma 360 – Luxury Living in Polanco', 'Discover Villa Reforma 360, a modern luxury villa in the heart of Polanco with smart home features, a private rooftop, and breathtaking views.', 'Villa Reforma 360 – Luxury Living in Polanco', 'Discover Villa Reforma 360, a modern luxury villa in the heart of Polanco with smart home features, a private rooftop, and breathtaking views.', 'zcssdf-1738222740.jpg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Villa Reforma 360 – Luxury Living in Polanco\",\r\n  \"description\": \"Discover Villa Reforma 360, a modern luxury villa in the heart of Polanco with smart home features, a private rooftop, and breathtaking views.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/property/villa-reforma-360\"\r\n  }\r\n}'),
(4, 'P16R1601', 'Torre Lux', 'torre-lux', 12000.00, 1, 21, 2, '2800', '260.13', 4, 3, 4, 'P16R16011738222970.jpg', '[\"4051738222889.jpg\",\"4651738222889.jpg\",\"6291738222889.jpg\",\"5281738222890.jpg\",\"4801738222890.jpg\"]', NULL, '<p>Located in an exclusive Polanco high-rise, Torre Lux 15 is the perfect blend of modern elegance and comfort. This spacious apartment features floor-to-ceiling windows, an open-concept layout, premium finishes, and access to resort-style amenities, including a pool, gym, and 24/7 security. Live in one of Mexico City\'s most desirable neighborhoods.</p>', 'A stylish high-rise apartment offering panoramic city views, floor-to-ceiling windows, and world-class amenities.', 'Campos Elíseos 15, Polanco, CDMX', 'Mexico', 'Federal Territory', 'Mexico City', 2, '2011', '', '', 1, '2026-06-06 07:42:50', 1, 2, '2025-01-30 07:42:50', '2025-01-30 08:23:33', 2, '19.4350', '-99.2000', '2800', '260.13', '0', '0', '[\"P16R16011738222970679b2d7a84e52.pdf\",\"P16R16011738222970679b2d7a85162.pdf\"]', 8, 'Torre Lux 15 – High-Rise Apartment in Polanco', 'Experience luxury living in Torre Lux 15, a modern high-rise apartment in Polanco featuring panoramic city views and top-tier amenities.', 'Polanco apartment for sale, luxury condos Mexico City, high-rise living CDMX', 'zzxxxxx-1738222970733999378.jpg', 'Torre Lux 15 – High-Rise Apartment in Polanco', 'Experience luxury living in Torre Lux 15, a modern high-rise apartment in Polanco featuring panoramic city views and top-tier amenities.', 'Torre Lux 15 – High-Rise Apartment in Polanco', 'Experience luxury living in Torre Lux 15, a modern high-rise apartment in Polanco featuring panoramic city views and top-tier amenities.', 'zzxxxxx-1738222970.jpg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Torre Lux 15 – High-Rise Apartment in Polanco\",\r\n  \"description\": \"Experience luxury living in Torre Lux 15, a modern high-rise apartment in Polanco featuring panoramic city views and top-tier amenities.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/property/torre-lux\"\r\n  }\r\n}'),
(5, 'VLC18S8863', 'Oceanfront Serenity Villa', 'oceanfront-serenity-villa', 2500000.00, 0, 20, 1, '4500', '418.06', 1, 1, 0, 'VLC18S88631738223484.jpg', '[\"7981738223459.jpg\",\"9491738223459.jpg\",\"1421738223459.jpg\",\"2291738223459.jpg\",\"361738223460.jpg\"]', NULL, '<p>Discover unparalleled luxury at Oceanfront Serenity Villa in Viceroy Los Cabos. This stunning 4-bedroom home boasts an open-concept layout, floor-to-ceiling windows, and direct beach access. Enjoy state-of-the-art amenities, including a private infinity pool, spa-inspired bathrooms, and a rooftop terrace with panoramic ocean views. Perfect for those seeking an exclusive coastal lifestyle.</p>', 'A breathtaking oceanfront villa featuring a private infinity pool, modern architecture, and 24/7 concierge services.', 'Viceroy Blvd 12, Los Cabos, BCS, Mexico', 'Mexico', 'Baja California Sur', 'Cabo San Lucas', 2, '2014', '3500', '750', 1, '2025-01-30 07:51:24', 1, 1, '2025-01-30 07:51:24', '2025-01-30 07:51:24', 1, '23.0629', '-109.6827', '4200', '390.19', '555.56', '5979.95', '[\"VLC18S88631738223484679b2f7c11363.pdf\",\"VLC18S88631738223484679b2f7c115ef.pdf\"]', 2, 'Oceanfront Serenity Villa – Luxury Beachfront Home in Viceroy Los Cabos', 'Own a stunning oceanfront villa in Viceroy Los Cabos with a private infinity pool, modern design, and breathtaking views of the sea.', 'beachfront villa Los Cabos, oceanfront property Mexico, luxury homes for sale Los Cabos', 'czxczczxc-17382234841141522249.jpg', 'Oceanfront Serenity Villa – Luxury Beachfront Home in Viceroy Los Cabos', 'Own a stunning oceanfront villa in Viceroy Los Cabos with a private infinity pool, modern design, and breathtaking views of the sea.', 'Oceanfront Serenity Villa – Luxury Beachfront Home in Viceroy Los Cabos', 'Own a stunning oceanfront villa in Viceroy Los Cabos with a private infinity pool, modern design, and breathtaking views of the sea.', 'bbbbbbbbbbb-1738223484.jpg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Oceanfront Serenity Villa – Luxury Beachfront Home in Viceroy Los Cabos\",\r\n  \"description\": \" Own a stunning oceanfront villa in Viceroy Los Cabos with a private infinity pool, modern design, and breathtaking views of the sea.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/property/oceanfront-serenity-villa\"\r\n  }\r\n}'),
(6, 'VLC18R8910', 'Beachfront Bliss Retreat', 'beachfront-bliss-retreat', 8400.00, 0, 20, 2, '1400', '130.06', 4, 4, 2, 'VLC18R89101738223666.png', '[\"5561738223600.webp\",\"5661738223604.webp\",\"7311738223606.webp\",\"5521738223608.webp\",\"5841738223609.png\"]', NULL, '<p>Welcome to Beachfront Bliss Retreat, a stunning oceanfront villa available for rent in Viceroy Los Cabos. This 3-bedroom, fully furnished home features a spacious open-plan living area, private infinity pool, and outdoor lounge spaces. Enjoy five-star resort amenities, including fine dining, a luxury spa, and beachfront cabanas. Ideal for a dream vacation or long-term stay.</p>', 'A breathtaking rental villa with private beach access, luxury finishes, and resort-style living.', 'Beachfront Villa 5, Viceroy Los Cabos, BCS, Mexic', 'Mexico', 'Baja California Sur', 'Cabo San Lucas', 4, '2012', '', '', 1, '2026-03-06 07:54:26', 1, 2, '2025-01-30 07:54:26', '2025-01-30 08:23:26', 2, '23.0635', '-109.6812', '1200', '111.48', '0', '0', '[\"VLC18R89101738223666679b3032ebb5f.pdf\",\"VLC18R89101738223666679b3032ebde5.pdf\"]', 10, 'Beachfront Bliss Retreat – Luxury Rental in Viceroy Los Cabos', 'Rent a luxury beachfront villa in Viceroy Los Cabos with private beach access, resort amenities, and stunning ocean views.', 'luxury rental Los Cabos, oceanfront home for rent, beachfront villa Mexico', 'licensed-image-173822366666289771.jpg', 'Beachfront Bliss Retreat – Luxury Rental in Viceroy Los Cabos', 'Rent a luxury beachfront villa in Viceroy Los Cabos with private beach access, resort amenities, and stunning ocean views.', 'Beachfront Bliss Retreat – Luxury Rental in Viceroy Los Cabos', 'Rent a luxury beachfront villa in Viceroy Los Cabos with private beach access, resort amenities, and stunning ocean views.', 'ertertdf-1738223666.jpg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Beachfront Bliss Retreat – Luxury Rental in Viceroy Los Cabos\",\r\n  \"description\": \"Rent a luxury beachfront villa in Viceroy Los Cabos with private beach access, resort amenities, and stunning ocean views.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/property/beachfront-bliss-retreat\"\r\n  }\r\n}'),
(7, 'PC80S6502', 'Marina View Luxury Residence', 'marina-view-luxury-residence', 3200000.00, 0, 19, 1, '5200', '483.1', 6, 3, 2, 'PC80S65021738223845.webp', '[\"5411738223791.png\",\"5561738223792.webp\",\"9191738223792.webp\",\"1591738223795.jpg\",\"3401738223795.jpg\"]', NULL, '<p>Discover the ultimate luxury living experience in Marina View Luxury Residence. This stunning 4-bedroom home features floor-to-ceiling windows, an open-plan living area, a chef’s kitchen, and breathtaking views of the marina. Enjoy a private infinity pool, an outdoor entertainment area, and exclusive access to Puerto Cancun’s golf course, beach club, and high-end shopping center.</p>', 'A luxurious waterfront villa with a private dock, infinity pool, and access to Puerto Cancun’s exclusive amenities.', 'Avenida Puerto Cancun 15, Cancun, QROO, Mexico', 'Mexico', 'Quintana Roo', 'Cancun', 4, '2012', '4200', '850', 1, '2025-01-30 07:57:25', 1, 1, '2025-01-30 07:57:25', '2025-01-30 07:57:25', 1, '21.1558', '-86.8103', '4900', '455.22', '615.38', '6623.95', '[\"PC80S65021738223845679b30e53153e.pdf\"]', 4, 'Marina View Luxury Residence – Exclusive Waterfront Home in Puerto Cancun', 'Own a stunning waterfront villa in Puerto Cancun with a private dock, infinity pool, and exclusive access to world-class amenities.', 'Puerto Cancun villa for sale, waterfront home Cancun, luxury real estate Mexico', 'fdfdgfdfg-17382238452087063066.jpg', 'Marina View Luxury Residence – Exclusive Waterfront Home in Puerto Cancun', 'Own a stunning waterfront villa in Puerto Cancun with a private dock, infinity pool, and exclusive access to world-class amenities.', 'Marina View Luxury Residence – Exclusive Waterfront Home in Puerto Cancun', 'Own a stunning waterfront villa in Puerto Cancun with a private dock, infinity pool, and exclusive access to world-class amenities.', 'fdfdgfdfg-1738223845.jpg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Marina View Luxury Residence – Exclusive Waterfront Home in Puerto Cancun\",\r\n  \"description\": \"Own a stunning waterfront villa in Puerto Cancun with a private dock, infinity pool, and exclusive access to world-class amenities.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/property/marina-view-luxury-residence\"\r\n  }\r\n}'),
(8, 'CPDC79R8378', 'Casa Solara', 'casa-solara', 4500.00, 17, 18, 2, '2800', '260.13', 3, 2, 1, 'CPDC79R83781738224033.webp', '[\"9371738223979.png\",\"7631738223980.webp\",\"7981738223980.webp\",\"4871738223981.jpg\",\"1711738223981.jpg\",\"8761738223982.png\"]', NULL, '<p>Experience the charm of Playa del Carmen in Casa Solara, a luxurious 3-bedroom villa located in the heart of downtown. Featuring high-end finishes, an open-concept design, and a stunning rooftop pool with ocean views, this home is perfect for investors or families seeking paradise. Walking distance to 5th Avenue, restaurants, and the Caribbean Sea.</p>', 'Modern 3-bedroom villa with a rooftop pool and just steps from the beach.', 'Calle 10 Norte #24, Playa del Carmen, QROO, Mexico', 'Mexico', 'Quintana Roo', 'Playa del Carmen', 2, '1995', '', '', 1, '2027-06-06 08:00:33', 1, 1, '2025-01-30 08:00:33', '2025-02-03 06:09:37', 2, '20.6303', '-87.0705', '2500', '232.26', '0', '0', '[\"CPDC79R83781738224033679b31a18fc5c.pdf\"]', 1, 'Casa Solara – Luxury Villa for Sale in Playa del Carmen', 'Own a modern 3-bedroom villa with a rooftop pool in downtown Playa del Carmen, just steps from the beach.', 'Playa del Carmen real estate, villa for sale Mexico, downtown Playa property', 'ku,uk,uk,-173822403334058418.jpg', 'Casa Solara – Luxury Villa for Sale in Playa del Carmen', 'Own a modern 3-bedroom villa with a rooftop pool in downtown Playa del Carmen, just steps from the beach.', 'Casa Solara – Luxury Villa for Sale in Playa del Carmen', 'Own a modern 3-bedroom villa with a rooftop pool in downtown Playa del Carmen, just steps from the beach.', 'ku,uk,uk,-1738224033.jpg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Casa Solara – Luxury Villa for Sale in Playa del Carmen\",\r\n  \"description\": \" Own a modern 3-bedroom villa with a rooftop pool in downtown Playa del Carmen, just steps from the beach.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/property/casa-solara\"\r\n  }\r\n}'),
(9, 'LJE74S2840', 'Villa Pacifica', 'villa-pacifica', 120000000.00, 0, 2, 1, '9000', '836.13', 10, 10, 2, 'LJE74S28401738224294.jpg', '[\"131738224239.jpg\",\"1281738224239.jpg\",\"5841738224239.jpg\",\"5851738224240.jpg\",\"8541738224240.jpg\"]', NULL, '<p>Villa Pacifica offers unparalleled coastal living with high-end finishes, an open-concept layout, and panoramic ocean views. Featuring 4 spacious bedrooms, a private infinity pool, and floor-to-ceiling glass doors, this home is a true beachfront paradise. Located in the prestigious La Jolla Excellence community, enjoy 24/7 security, resort-style amenities, and private beach access.</p>', 'Luxurious 4-bedroom oceanfront villa with breathtaking Pacific views.', 'Calle Vista del Mar #10, Rosarito, BC, Mexico', 'Mexico', 'Baja California', 'Rosarito', 2, '2021', '5600', '1890', 1, '2025-01-30 08:04:54', 1, 1, '2025-01-30 08:04:54', '2025-01-30 08:04:54', 1, '32.3245', '-117.0587', '9000', '836.13', '13333.33', '143518.87', '[\"LJE74S28401738224294679b32a6943ec.pdf\",\"LJE74S28401738224294679b32a6945f4.pdf\"]', 9, 'Villa Pacifica – Oceanfront Luxury Home for Sale in Rosarito', 'Own a stunning 4-bedroom oceanfront villa in La Jolla Excellence, Rosarito, featuring a private infinity pool and breathtaking Pacific views.', 'Rosarito beachfront home, luxury villa Mexico, La Jolla Excellence real estate', 'fdvfdv-1738224294244140919.jpg', 'Villa Pacifica – Oceanfront Luxury Home for Sale in Rosarito', 'Own a stunning 4-bedroom oceanfront villa in La Jolla Excellence, Rosarito, featuring a private infinity pool and breathtaking Pacific views.', 'Villa Pacifica – Oceanfront Luxury Home for Sale in Rosarito', 'Own a stunning 4-bedroom oceanfront villa in La Jolla Excellence, Rosarito, featuring a private infinity pool and breathtaking Pacific views.', 'ynynyhn-1738224294.jpg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Villa Pacifica – Oceanfront Luxury Home for Sale in Rosarito\",\r\n  \"description\": \" Own a stunning 4-bedroom oceanfront villa in La Jolla Excellence, Rosarito, featuring a private infinity pool and breathtaking Pacific views.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/property/villa-pacifica\"\r\n  }\r\n}'),
(10, 'LJE74R3854', 'La Breeze Penthouse', 'la-breeze-penthouse', 12000.00, 1, 2, 2, '3400', '315.87', 5, 5, 1, 'LJE74R38541738224434.jpg', '[\"3231738224388.jpg\",\"1401738224388.jpg\",\"8761738224389.jpg\",\"6911738224393.jpg\",\"1771738224395.jpg\"]', NULL, '<p>Ocean Breeze Penthouse is a dream residence featuring 3 bedrooms, 3 bathrooms, an expansive terrace, and floor-to-ceiling windows showcasing endless ocean views. Designed for ultimate relaxation and luxury, this penthouse includes high-end appliances, marble finishes, and access to top-tier community amenities.</p>', 'Stunning 3-bedroom penthouse with panoramic Pacific Ocean views.', 'Av. del Mar #15, Rosarito, BC, Mexico', 'Mexico', 'Baja California', 'Rosarito', 4, '2011', '', '', 1, '2026-06-06 08:07:14', 1, 2, '2025-01-30 08:07:14', '2025-01-30 08:28:34', 2, '32.3252', '-117.0579', '3290', '305.65', '0', '0', '[\"LJE74R38541738224434679b3332d6e06.pdf\"]', 3, 'Ocean Breeze Penthouse – Luxury Condo for Sale in Rosarito', 'Own a 3-bedroom luxury penthouse in La Jolla Excellence, Rosarito, featuring breathtaking ocean views and resort-style amenities.', 'Rosarito penthouse for sale, beachfront condo Mexico, La Jolla Excellence real estate', 'sdfsdfdsfsdf-17382244341011949766.jpg', 'Ocean Breeze Penthouse – Luxury Condo for Sale in Rosarito', 'Own a 3-bedroom luxury penthouse in La Jolla Excellence, Rosarito, featuring breathtaking ocean views and resort-style amenities.', 'Ocean Breeze Penthouse – Luxury Condo for Sale in Rosarito', 'Own a 3-bedroom luxury penthouse in La Jolla Excellence, Rosarito, featuring breathtaking ocean views and resort-style amenities.', 'sdfsdfdsfsdf-1738224434.jpg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Ocean Breeze Penthouse – Luxury Condo for Sale in Rosarito\",\r\n  \"description\": \"Own a 3-bedroom luxury penthouse in La Jolla Excellence, Rosarito, featuring breathtaking ocean views and resort-style amenities.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/property/la-breeze-penthouse\"\r\n  }\r\n}'),
(11, 'LJE74S1084', 'Villa 101, La Jolla Excellence', 'villa-101-la-jolla-excellence', 750000.00, 0, 2, 1, '3500', '325.16', 3, 5, 5, 'LJE74S10841738225801.jpg', '[\"3511738225773.jpg\",\"8601738225773.jpg\",\"8521738225774.jpg\",\"8391738225774.jpg\",\"3301738225774.jpg\"]', NULL, '<p>Stunning 3,500 sqft oceanfront villa in La Jolla Excellence, Rosarito. Luxury living with breathtaking views.</p>', 'Stunning oceanfront villa with modern design and panoramic views.', '102 Oceanview Drive', 'Mexico', 'Baja California', 'Rosarito', 2, '2025', '5200', '300', 1, '2025-01-30 08:30:01', 1, 1, '2025-01-30 08:30:01', '2025-01-30 08:30:01', 1, '32.3412', '-117.0594', '3200', '297.29', '214.29', '2306.55', NULL, 8, 'Oceanfront Villa in La Jolla Excellence - For Sale', 'Stunning 3,500 sqft oceanfront villa in La Jolla Excellence, Rosarito. Luxury living with breathtaking views.', 'La Jolla Excellence villa, oceanfront property, luxury home Mexico', '184812656-17382258011124243145.jpg', 'Villa 101, La Jolla Excellence', 'Stunning 3,500 sqft oceanfront villa in La Jolla Excellence, Rosarito. Luxury living with breathtaking views.', 'Villa 101, La Jolla Excellence', 'Stunning 3,500 sqft oceanfront villa in La Jolla Excellence, Rosarito. Luxury living with breathtaking views.', '184497590-1738225801.jpg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Oceanfront Villa in La Jolla Excellence - For Sale\",\r\n  \"description\": \"Stunning 3,500 sqft oceanfront villa in La Jolla Excellence, Rosarito. Luxury living with breathtaking views.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/property/villa-101-la-jolla-excellence\"\r\n  }\r\n}'),
(12, 'LJE74R3644', 'Condo 207, La Jolla Excellence', 'condo-207-la-jolla-excellence', 2500.00, 0, 2, 2, '2800', '260.13', 3, 3, 5, 'LJE74R36441738229829.jpg', '[\"6091738229718.jpg\",\"8651738229719.jpg\",\"5141738229721.jpg\",\"2821738229723.jpg\",\"7991738229768.jpg\"]', NULL, '<p>Hotel Excellence! (HE!) is Marriott International\'s award-winning, online library of training for travel advisors and a key component of Marriott\'s Preferred Travel Agency (PTA) program. Available in 10 languages, the training covers hotel industry knowledge, sales tips, Marriott\'s portfolio of brands, pricing and commission polices and more, all in streamlined, microlearning modules that can be completed from any web-enabled device (tablet, phone, computer).</p>', 'Fully furnished beachfront condo with resort-style amenities.', '207 La Jolla Blvd', 'Mexico', 'Baja California', 'Rosarito', 2, '2025', '4500', '250', 1, '2025-01-30 09:37:09', 1, 1, '2025-01-30 09:37:09', '2025-01-30 09:37:09', 2, '32.3408', '-117.0587', '2600', '241.55', '0', '0', NULL, 2, 'Beachfront Condo in La Jolla Excellence - For Rent', 'Rent this premium 2,800 sqft beachfront condo in La Jolla Excellence, Rosarito. Fully furnished with luxury amenities.', 'La Jolla rental, oceanview condo, luxury beachfront home', 'new3-17382298291175470058.jpg', 'Beachfront Condo in La Jolla Excellence - For Rent', 'Rent this premium 2,800 sqft beachfront condo in La Jolla Excellence, Rosarito. Fully furnished with luxury amenities.', 'Beachfront Condo in La Jolla Excellence - For Rent', 'Rent this premium 2,800 sqft beachfront condo in La Jolla Excellence, Rosarito. Fully furnished with luxury amenities.', 'new2-1738229829.jpg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Beachfront Condo in La Jolla Excellence - For Rent\",\r\n  \"description\": \"Rent this premium 2,800 sqft beachfront condo in La Jolla Excellence, Rosarito. Fully furnished with luxury amenities.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/property/condo-207-la-jolla-excellence\"\r\n  }\r\n}'),
(13, 'EP49S1920', 'Modern Loft, Echo Park', 'modern-loft-echo-park', 850000.00, 0, 25, 1, '1900', '176.52', 6, 4, 3, 'EP49S19201738230831.jpg', '[\"7201738230630.jpg\",\"6901738230630.jpg\",\"4551738230630.jpg\",\"6901738230631.jpg\",\"7181738230685.jpg\"]', NULL, '<p>Hotel Excellence! (HE!) is Marriott International\'s award-winning, online library of training for travel advisors and a key component of Marriott\'s Preferred Travel Agency (PTA) program. Available in 10 languages, the training covers hotel industry knowledge, sales tips, Marriott\'s portfolio of brands, pricing and commission polices and more, all in streamlined, microlearning modules that can be completed from any web-enabled device (tablet, phone, computer).</p>', 'Stylish modern loft in the heart of Echo Park.', '112 Sunset Ave', 'United States', 'California', 'Los Angeles', 2, '2025', '6000', '200', 1, '2025-01-30 09:53:51', 1, 1, '2025-01-30 09:53:51', '2025-01-30 09:53:51', 1, '34.0783', '-118.2600', '1750', '162.58', '447.37', '4815.44', NULL, 3, 'Modern Loft for Sale in Echo Park, LA', 'Sleek and stylish 1,900 sqft loft for sale in Echo Park, LA.', 'Echo Park loft, modern home, LA real estate', '22222-17382308311241947798.jpg', 'Modern Loft for Sale in Echo Park, LA', 'Sleek and stylish 1,900 sqft loft for sale in Echo Park, LA.', 'Modern Loft for Sale in Echo Park, LA', 'Sleek and stylish 1,900 sqft loft for sale in Echo Park, LA.', '111-1738230831.jpg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Modern Loft for Sale in Echo Park, LA\",\r\n  \"description\": \"Sleek and stylish 1,900 sqft loft for sale in Echo Park, LA.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/property/modern-loft-echo-park\"\r\n  }\r\n}'),
(14, 'EP49R9747', 'Cozy Apartment, Echo Park', 'cozy-apartment-echo-park', 2800.00, 1, 25, 2, '1200', '111.48', 4, 6, 4, 'EP49R97471738231626.jpg', '[\"2551738231565.jpg\",\"6341738231565.jpg\",\"9981738231565.jpg\",\"5691738231565.jpg\",\"9931738231566.jpg\"]', NULL, '<p>Hotel Excellence! (HE!) is Marriott International\'s award-winning, online library of training for travel advisors and a key component of Marriott\'s Preferred Travel Agency (PTA) program. Available in 10 languages, the training covers hotel industry knowledge, sales tips, Marriott\'s portfolio of brands, pricing and commission polices and more, all in streamlined, microlearning modules that can be completed from any web-enabled device (tablet, phone, computer).</p>', 'Charming apartment near downtown LA with city views.', '421 Belmont St', 'United States', 'California', 'Los Angeles', 3, '2025', '', '', 1, '2025-01-30 10:07:06', 1, 1, '2025-01-30 10:07:06', '2025-01-30 10:07:28', 2, '34.0771', '-118.2593', '1100', '102.19', '0', '0', NULL, 3, 'Apartment for Rent in Echo Park, LA', 'Cozy 1,200 sqft apartment for rent in Echo Park with stunning city views.', 'Echo Park rental, downtown LA apartment, city view home', '888-17382316261090945496.jpg', 'Apartment for Rent in Echo Park, LA', 'Cozy 1,200 sqft apartment for rent in Echo Park with stunning city views.', 'Apartment for Rent in Echo Park, LA', 'Cozy 1,200 sqft apartment for rent in Echo Park with stunning city views.', '000000000000000000000-1738231626.jpg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Apartment for Rent in Echo Park, LA\",\r\n  \"description\": \"Cozy 1,200 sqft apartment for rent in Echo Park with stunning city views.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/property/cozy-apartment-echo-park\"\r\n  }\r\n}'),
(15, 'LJE74S7858', 'Oceanview Villa 101, La Jolla Excellence', 'oceanview-villa-101-la-jolla-excellence', 750000.00, 2, 2, 1, '2800', '260.13', 5, 5, 6, 'LJE74S78581738231902.jpeg', '[\"1361738231603.jpeg\",\"7781738231603.jpeg\",\"1331738231604.jpeg\",\"6561738231604.jpeg\",\"7121738231604.jpeg\"]', NULL, '<p>This stunning 3-bedroom villa offers breathtaking ocean views, an open-concept design, a gourmet kitchen, and a spacious terrace. Located in the exclusive La Jolla Excellence, this home includes resort-style amenities like pools, a gym, and 24/7 security.</p>', 'A luxurious oceanview villa in the heart of La Jolla Excellence with high-end finishes and private beach access.', 'Av. del Mar 101, Rosarito, Baja California', 'Mexico', 'Baja California', 'Rosarito', 2, '2025', '2500', '250', 1, '2025-01-30 00:00:00', 1, 1, '2025-01-30 10:09:13', '2025-01-30 10:38:42', 1, '32.3445', '-117.0589', '2300', '213.68', '267.86', '2883.19', NULL, 2, 'Oceanview Villa for Sale in La Jolla Excellence, Rosarito', 'Discover this beautiful oceanview villa in La Jolla Excellence, Rosarito. Luxury finishes, private beach access, and top-tier amenities.', 'La Jolla Excellence property for sale, Rosarito luxury homes, oceanview villa Mexico', 'download (3)-17382319021412715501.jpeg', 'Oceanview Villa for Sale in La Jolla Excellence, Rosarito', 'Modern beachfront condo with breathtaking ocean views and resort-style amenities.', 'Oceanview Villa for Sale in La Jolla Excellence, Rosarito', 'Modern beachfront condo with breathtaking ocean views and resort-style amenities.', 'download (3)-1738231902.jpeg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Oceanview Villa for Sale in La Jolla Excellence, Rosarito\",\r\n  \"description\": \"Discover this beautiful oceanview villa in La Jolla Excellence, Rosarito. Luxury finishes, private beach access, and top-tier amenities.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/property/oceanview-villa-101-la-jolla-excellence\"\r\n  }\r\n}'),
(16, 'QDM51S4006', 'Beachside Retreat, Quinta del Mar', 'beachside-retreat-quinta-del-mar', 920000.00, 0, 3, 1, '3800', '353.03', 3, 5, 3, 'QDM51S40061738232058.jpg', '[\"6911738231958.jpg\",\"1521738231958.jpg\",\"7471738231958.jpg\",\"3991738231958.jpg\",\"3031738231959.jpg\"]', NULL, '<p>Hotel Excellence! (HE!) is Marriott International\'s award-winning, online library of training for travel advisors and a key component of Marriott\'s Preferred Travel Agency (PTA) program. Available in 10 languages, the training covers hotel industry knowledge, sales tips, Marriott\'s portfolio of brands, pricing and commission polices and more, all in streamlined, microlearning modules that can be completed from any web-enabled device (tablet, phone, computer).</p>', 'Beachside luxury villa with breathtaking views.', '15 Baja Paradise Road', 'Mexico', 'Baja California', 'Rosarito', 2, '2025', '5800', '275', 1, '2025-01-30 10:14:18', 1, 1, '2025-01-30 10:14:18', '2025-01-30 10:14:18', 1, '32.3342', '-117.0468', '3500', '325.16', '242.11', '2606', NULL, 3, 'Beachside Villa for Sale in Quinta del Mar', 'Elegant 3,800 sqft villa in Quinta del Mar, Rosarito with stunning ocean views and top-tier amenities.', 'Quinta del Mar villa, luxury beach home, Rosarito property', '444-17382320581099505248.jpg', 'Beachside Villa for Sale in Quinta del Mar', 'Elegant 3,800 sqft villa in Quinta del Mar, Rosarito with stunning ocean views and top-tier amenities.', 'Beachside Villa for Sale in Quinta del Mar', 'Elegant 3,800 sqft villa in Quinta del Mar, Rosarito with stunning ocean views and top-tier amenities.', '111-1738232058.jpg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Beachside Villa for Sale in Quinta del Mar\",\r\n  \"description\": \"Elegant 3,800 sqft villa in Quinta del Mar, Rosarito with stunning ocean views and top-tier amenities.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/property/beachside-retreat-quinta-del-mar\"\r\n  }\r\n}'),
(17, 'LJE74R7572', 'Beachfront Condo 302, La Jolla Excellence', 'beachfront-condo-302-la-jolla-excellence', 3000.00, 2, 2, 2, '1500', '139.35', 5, 5, 5, 'LJE74R75721738232484.jpeg', '[\"7051738232178.jpeg\",\"1901738232178.jpeg\",\"3231738232179.jpeg\",\"4341738232179.jpeg\",\"1311738232180.jpg\"]', NULL, '<p>This fully furnished 2-bedroom condo offers a modern layout, a spacious balcony with panoramic ocean views, and exclusive access to pools, a gym, and private beach areas. Perfect for luxury beachfront living.</p>', 'Modern beachfront condo with breathtaking ocean views and resort-style amenities.', 'Av. del Mar 302, Rosarito, Baja California', 'Mexico', 'Baja California', 'Rosarito', 4, '2025', '', '', 1, '2025-01-03 10:21:24', 1, 1, '2025-01-30 10:21:24', '2025-01-30 10:38:26', 2, '32.3456', '-117.0575', '1400', '130.06', '0', '0', NULL, 3, 'Beachfront Condo for Rent in La Jolla Excellence, Rosarito', 'Rent a luxurious beachfront condo in La Jolla Excellence, Rosarito. Fully furnished with ocean views and top-tier amenities.', 'La Jolla Excellence rentals, beachfront condo Rosarito, luxury rentals Mexico', 'download (4)-1738232484941899435.jpeg', 'Beachfront Condo for Rent in La Jolla Excellence, Rosarito', 'Modern beachfront condo with breathtaking ocean views and resort-style amenities.', 'Beachfront Condo for Rent in La Jolla Excellence, Rosarito', 'Modern beachfront condo with breathtaking ocean views and resort-style amenities.', 'download (4)-1738232484.jpeg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Beachfront Condo for Rent in La Jolla Excellence, Rosarito\",\r\n  \"description\": \"Rent a luxurious beachfront condo in La Jolla Excellence, Rosarito. Fully furnished with ocean views and top-tier amenities.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/property/beachfront-condo-302-la-jolla-excellence\"\r\n  }\r\n}'),
(18, 'QDM51R9281', 'Luxury Condo, Quinta del Mar', 'luxury-condo-quinta-del-mar', 3200.00, 0, 3, 2, '2900', '269.42', 4, 4, 2, 'QDM51R56371738232650.jpg', '[\"1081738232540.jpg\",\"1531738232540.jpg\",\"1541738232541.jpg\",\"2931738232541.jpg\",\"2431738232542.jpg\"]', NULL, '<p>Hotel Excellence! (HE!) is Marriott International\'s award-winning, online library of training for travel advisors and a key component of Marriott\'s Preferred Travel Agency (PTA) program. Available in 10 languages, the training covers hotel industry knowledge, sales tips, Marriott\'s portfolio of brands, pricing and commission polices and more, all in streamlined, microlearning modules that can be completed from any web-enabled device (tablet, phone, computer).</p>', 'Spacious high-end condo with oceanfront balcony.', '98 Playa del Sol', 'Mexico', 'Baja California', 'Rosarito', 1, '2025', '', '', 1, '2025-01-30 00:00:00', 1, 1, '2025-01-30 10:24:10', '2025-01-30 10:25:26', 2, '32.3325', '-117.0481', '2750', '255.48', '0', '0', NULL, 3, 'Luxury Condo for Rent in Quinta del Mar', 'Rent this 2,900 sqft oceanfront condo in Quinta del Mar, Rosarito with high-end features.', 'Quinta del Mar rental, oceanview condo, Rosarito luxury home', '000000000000000-17382326501854497224.jpg', 'Luxury Condo for Rent in Quinta del Mar', 'Rent this 2,900 sqft oceanfront condo in Quinta del Mar, Rosarito with high-end features.', 'Luxury Condo for Rent in Quinta del Mar', 'Rent this 2,900 sqft oceanfront condo in Quinta del Mar, Rosarito with high-end features.', '22222-1738232650.jpg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Luxury Condo for Rent in Quinta del Mar\",\r\n  \"description\": \"Rent this 2,900 sqft oceanfront condo in Quinta del Mar, Rosarito with high-end features.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/property/luxury-condo-quinta-del-mar\"\r\n  }\r\n}');
INSERT INTO `properties` (`id`, `code`, `title`, `slug`, `price`, `views`, `neighborhood_id`, `listing_status`, `size`, `size_mt`, `bedrooms`, `bathrooms`, `parking_spaces`, `banner`, `gallery`, `map`, `description`, `short_description`, `address`, `country`, `state`, `city`, `dev_lvl`, `year_built`, `property_tax`, `hoa_fees`, `rent_cycle`, `date_available`, `status`, `is_featured`, `created_at`, `updated_at`, `listing_type`, `lattitude`, `longitude`, `GLA`, `GLA_mt`, `avg_ft`, `avg_mt`, `files`, `agent`, `meta_title`, `meta_description`, `meta_keywords`, `fb_image`, `fb_title`, `fb_description`, `twitter_title`, `twitter_description`, `twitter_image`, `json_ld_code`) VALUES
(19, 'EP49S9669', 'Modern Townhouse 118, Echo Park', 'modern-townhouse-118-echo-park', 950000.00, 0, 25, 1, '1800', '167.23', 2, 2, 1, 'EP49S96691738233370.jpeg', '[\"1761738232861.jpg\",\"6591738232861.jpg\",\"5971738232862.jpg\",\"1421738232862.jpg\",\"241738232862.jpg\"]', NULL, '<p>Located in one of LA’s trendiest neighborhoods, this townhouse features contemporary architecture, open living spaces, a chef’s kitchen, and a private rooftop terrace with skyline views. Walking distance to cafes and Echo Park Lake.</p>', 'Stylish 3-bedroom townhouse in Echo Park with rooftop views of downtown LA.', '118 Sunset Blvd, Los Angeles, CA', 'United States', 'California', 'Los Angeles', 2, '2025', '7500', '400', 1, '2025-01-30 10:36:09', 1, 1, '2025-01-30 10:36:10', '2025-01-30 10:36:10', 1, '34.0782', '-118.2606', '1700', '157.94', '527.78', '5680.96', NULL, 5, 'Modern Townhouse for Sale in Echo Park, LA', 'Buy a contemporary townhouse in Echo Park, LA, featuring stylish design, rooftop views, and prime location near downtown.', 'Echo Park homes for sale, LA modern townhouses, real estate in Echo Park', 'download (2)-17382333701117574876.jpeg', 'Modern Townhouse for Sale in Echo Park, LA', 'Stylish 3-bedroom townhouse in Echo Park with rooftop views of downtown LA.', 'Modern Townhouse for Sale in Echo Park, LA', 'Stylish 3-bedroom townhouse in Echo Park with rooftop views of downtown LA.', 'download (2)-1738233370.jpeg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Modern Townhouse for Sale in Echo Park, LA\",\r\n  \"description\": \"Buy a contemporary townhouse in Echo Park, LA, featuring stylish design, rooftop views, and prime location near downtown.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/property/modern-townhouse-118-echo-park\"\r\n  }\r\n}'),
(20, 'LJE74S4248', 'Casa Mar Azul, La Jolla Excellence', 'casa-mar-azul-la-jolla-excellence', 820000.00, 4, 2, 1, '3700', '343.74', 3, 4, 3, 'LJE74S42481738233443.jpg', '[\"1831738233432.jpg\",\"8511738233432.jpg\",\"5041738233433.jpg\",\"7501738233433.jpg\",\"3711738233433.jpg\"]', NULL, '<p>This 3,700 sqft villa is designed for comfort and luxury, offering spacious interiors, a gourmet kitchen, and a private terrace overlooking the Pacific Ocean. The gated community provides resort-style amenities, including pools, a fitness center, and direct beach access.</p>', 'Elegant oceanfront home with private terrace and breathtaking views.', '210 Ocean Breeze Lane', 'Mexico', 'Baja California', 'Rosarito', 2, '2025', '5800', '320', 1, '2025-01-30 10:37:23', 1, 1, '2025-01-30 10:37:23', '2025-01-31 11:15:33', 1, '32.3421', '-117.0603', '3400', '315.87', '221.62', '2385.52', NULL, 4, 'Luxury Oceanfront Home for Sale - La Jolla Excellence', 'Stunning 3,700 sqft oceanfront home in La Jolla Excellence with panoramic views and premium amenities.', 'La Jolla luxury home, oceanfront villa, Mexico real estate', '000000000000000-1738233443202891895.jpg', 'Luxury Oceanfront Home for Sale - La Jolla Excellence', 'Stunning 3,700 sqft oceanfront home in La Jolla Excellence with panoramic views and premium amenities.', 'Luxury Oceanfront Home for Sale - La Jolla Excellence', 'Stunning 3,700 sqft oceanfront home in La Jolla Excellence with panoramic views and premium amenities.', '888-1738233443.jpg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Luxury Oceanfront Home for Sale - La Jolla Excellence\",\r\n  \"description\": \"Stunning 3,700 sqft oceanfront home in La Jolla Excellence with panoramic views and premium amenities.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/property/casa-mar-azul-la-jolla-excellence\"\r\n  }\r\n}'),
(21, 'LJE74R1562', 'Oceanview Condo, La Jolla Excellence', 'oceanview-condo-la-jolla-excellence', 2700.00, 1, 2, 2, '2600', '241.55', 2, 6, 3, 'LJE74R15621738234201.jpg', '[\"3741738234098.jpg\",\"6461738234099.jpg\",\"5281738234099.jpg\",\"831738234099.jpg\",\"4001738234099.jpg\"]', NULL, '<p>This modern 2,600 sqft condo features high-end finishes, spacious living areas, and a large balcony with stunning ocean views. Residents enjoy access to pools, a gym, and private beach areas.</p>', 'Stylish condo with ocean views and resort-style amenities.', '309 Pacific View Drive', 'Mexico', 'Baja California', 'Rosarito', 1, '2025', '', '', 1, '2025-01-30 10:50:01', 1, 1, '2025-01-30 10:50:01', '2025-01-30 10:54:04', 2, '32.3415', '-117.0612', '2500', '232.26', '0', '0', NULL, 4, 'Oceanview Condo for Rent - La Jolla Excellence', 'Rent this 2,600 sqft oceanview condo in La Jolla Excellence, featuring top-tier amenities and scenic views.', 'La Jolla Excellence rental, beachfront condo, luxury living', '22222-1738234201454011992.jpg', 'Oceanview Condo for Rent - La Jolla Excellence', 'Rent this 2,600 sqft oceanview condo in La Jolla Excellence, featuring top-tier amenities and scenic views.', 'Oceanview Condo for Rent - La Jolla Excellence', 'Rent this 2,600 sqft oceanview condo in La Jolla Excellence, featuring top-tier amenities and scenic views.', '111-1738234201.jpg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Oceanview Condo for Rent - La Jolla Excellence\",\r\n  \"description\": \"Rent this 2,600 sqft oceanview condo in La Jolla Excellence, featuring top-tier amenities and scenic views.\\n\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/property/oceanview-condo-la-jolla-excellence\"\r\n  }\r\n}'),
(22, 'EP49R8928', 'Chic Apartment 207, Echo Park', 'chic-apartment-207-echo-park', 3200.00, 6, 25, 2, '1250', '116.13', 6, 6, 4, 'EP49R89281738234564.jpeg', '[\"5221738234464.jpeg\",\"5271738234464.jpeg\",\"1311738234464.jpeg\",\"4091738234465.webp\",\"411738234465.webp\"]', NULL, '<p>This 2-bedroom apartment offers a stylish interior with floor-to-ceiling windows, a gourmet kitchen, and a private balcony with city views. Steps from trendy restaurants and Echo Park Lake.</p>', 'A chic, modern apartment in the heart of Echo Park, minutes from downtown LA.', '207 Glendale Blvd, Los Angeles, CA', 'United States', 'California', 'Los Angeles', 3, '2025', '', '', 1, '2025-10-04 10:56:04', 1, 1, '2025-01-30 10:56:04', '2025-01-30 11:15:25', 2, '34.0795', '-118.2621', '1150', '106.84', '0', '0', NULL, 2, 'Chic Apartment for Rent in Echo Park, LA', 'Rent a stylish 2-bedroom apartment in Echo Park, Los Angeles. Modern interiors, city views, and prime location near downtown LA.', 'Echo Park rentals, LA apartments for rent, trendy LA neighborhoods', 'images (1)-17382345641390826748.jpeg', 'Chic Apartment for Rent in Echo Park, LA', 'A chic, modern apartment in the heart of Echo Park, minutes from downtown LA.', 'Chic Apartment for Rent in Echo Park, LA', 'A chic, modern apartment in the heart of Echo Park, minutes from downtown LA.', 'images (1)-1738234564.jpeg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Chic Apartment for Rent in Echo Park, LA\",\r\n  \"description\": \"Rent a stylish 2-bedroom apartment in Echo Park, Los Angeles. Modern interiors, city views, and prime location near downtown LA.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/property/chic-apartment-207-echo-park\"\r\n  }\r\n}'),
(23, 'EP49S4358', 'Urban Retreat, Echo Park', 'urban-retreat-echo-park-', 900000.00, 9, 25, 1, '2100', '195.1', 4, 3, 2, 'EP49S43581738234829.jpg', '[\"8901738234749.jpg\",\"2181738234750.jpg\",\"2881738234750.jpg\",\"9291738234750.jpg\",\"8211738234750.jpg\"]', NULL, '<p>This 2,100 sqft modern home is designed for urban living, featuring an open layout, floor-to-ceiling windows, and a private rooftop deck offering stunning downtown LA views. Located in the heart of Echo Park, this home is within walking distance to cafes, parks, and nightlife.</p>', 'Contemporary home with rooftop deck and city skyline views.', '512 Hilltop Lane', 'United States', 'California', 'Los Angeles', 1, '2025', '6200', '180', 1, '2025-01-30 11:00:29', 1, 1, '2025-01-30 11:00:29', '2025-02-03 06:07:37', 1, '34.0789', '-118.2615', '1950', '181.16', '428.57', '4613.11', NULL, 2, 'Modern Home for Sale in Echo Park, LA', 'Discover this stylish 2,100 sqft home in Echo Park with a rooftop deck and city skyline views.', 'Echo Park house for sale, LA real estate, modern home', '111-17382348292116637795.jpg', 'Modern Home for Sale in Echo Park, LA', 'Discover this stylish 2,100 sqft home in Echo Park with a rooftop deck and city skyline views.', 'Modern Home for Sale in Echo Park, LA', 'Discover this stylish 2,100 sqft home in Echo Park with a rooftop deck and city skyline views.', 'new9-1738234829.jpg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Modern Home for Sale in Echo Park, LA\",\r\n  \"description\": \"Discover this stylish 2,100 sqft home in Echo Park with a rooftop deck and city skyline views.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/property/urban-retreat-echo-park-\"\r\n  }\r\n}'),
(24, 'QDM51S6004', 'Beachfront Penthouse 501, Quinta del Mar', 'beachfront-penthouse-501-quinta-del-mar', 1200000.00, 0, 3, 1, '3000', '278.71', 7, 7, 3, 'QDM51S60041738235064.jpeg', '[\"6361738234932.jpeg\",\"6551738234932.jpeg\",\"2761738234933.jpeg\",\"7031738234933.jpg\",\"8001738234933.jpg\",\"7441738234934.jpg\"]', NULL, '<p>This expansive 3-bedroom penthouse features elegant finishes, a spacious balcony, high ceilings, and stunning ocean views. Located in the exclusive Quinta del Mar community with private beach access and pools.</p>', 'Luxury beachfront penthouse with panoramic ocean views and resort amenities.', 'Blvd. Benito Juárez 501, Rosarito, Baja California', 'Mexico', 'Baja California', 'Rosarito', 3, '2025', '3200', '275', 1, '2025-01-30 11:04:24', 1, 1, '2025-01-30 11:04:24', '2025-01-30 11:04:24', 1, '32.3308', '-117.0453', '2800', '260.13', '400', '4305.57', NULL, 4, 'Beachfront Penthouse for Sale in Quinta del Mar, Rosarito', 'Buy a stunning beachfront penthouse in Quinta del Mar, Rosarito. High-end finishes, ocean views, and top-tier amenities.', 'Quinta del Mar real estate, Rosarito luxury condos, beachfront homes in Mexico', 'images (2)-1738235064106179030.jpeg', 'Beachfront Penthouse for Sale in Quinta del Mar, Rosarito', 'Luxury beachfront penthouse with panoramic ocean views and resort amenities.', 'Beachfront Penthouse for Sale in Quinta del Mar, Rosarito', 'Luxury beachfront penthouse with panoramic ocean views and resort amenities.', 'images (2)-1738235064.jpeg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Beachfront Penthouse for Sale in Quinta del Mar, Rosarito\",\r\n  \"description\": \"Buy a stunning beachfront penthouse in Quinta del Mar, Rosarito. High-end finishes, ocean views, and top-tier amenities.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/property/beachfront-penthouse-501-quinta-del-mar\"\r\n  }\r\n}'),
(25, 'EP49R7185', 'Loft Apartment, Echo Park', 'loft-apartment-echo-park-', 3000.00, 66, 25, 2, '1400', '130.06', 8, 2, 5, 'EP49R71851738235120.jpg', '[\"4551738235025.jpg\",\"5241738235025.jpg\",\"2241738235026.jpg\",\"1981738235026.jpg\",\"3461738235026.jpg\"]', NULL, '<p>This 1,400 sqft loft blends modern style with historic charm, featuring exposed brick walls, high ceilings, and an open-concept layout. It’s located in a vibrant area with easy access to restaurants, shopping, and entertainment.</p>', 'Spacious loft with exposed brick and industrial design.', '728 Vine Street', 'United States', 'California', 'Los Angeles', 1, '2025', '', '', 1, '2025-01-30 11:05:20', 1, 1, '2025-01-30 11:05:20', '2025-02-03 06:07:25', 2, '34.0795', '-118.2627', '1350', '125.42', '0', '0', NULL, 4, 'Stylish Loft for Rent in Echo Park, LA', 'Rent this trendy 1,400 sqft loft in Echo Park, featuring an industrial design and an open floor plan.', 'Echo Park loft, industrial apartment, LA rental', 'new9-173823512088910559.jpg', 'Stylish Loft for Rent in Echo Park, LA', 'Rent this trendy 1,400 sqft loft in Echo Park, featuring an industrial design and an open floor plan.', 'Stylish Loft for Rent in Echo Park, LA', 'Rent this trendy 1,400 sqft loft in Echo Park, featuring an industrial design and an open floor plan.', '111-1738235120.jpg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Stylish Loft for Rent in Echo Park, LA\",\r\n  \"description\": \"Rent this trendy 1,400 sqft loft in Echo Park, featuring an industrial design and an open floor plan.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/property/loft-apartment-echo-park-\"\r\n  }\r\n}'),
(26, 'QDM51R4480', 'Oceanview Condo 204, Quinta del Mar', 'oceanview-condo-204-quinta-del-mar', 2800.00, 17, 3, 2, '1800', '167.23', 1, 1, 1, 'QDM51R44801738237297.jpg', '[\"1971738235278.webp\",\"8171738235280.webp\",\"9411738235281.jpg\",\"3621738235282.jpg\",\"8961738235282.jpg\"]', NULL, '<p>Enjoy beachfront living in this beautifully designed 2-bedroom condo with high-end finishes, resort-style amenities, and a large terrace with breathtaking ocean views.</p>', 'Elegant 2-bedroom condo with ocean views in Rosarito’s Quinta del Mar.', 'Blvd. Benito Juárez 204, Rosarito, Baja California', 'Mexico', 'Baja California', 'Rosarito', 1, '2025', '', '', 1, '2025-01-05 00:00:00', 1, 1, '2025-01-30 11:09:22', '2025-01-31 14:30:17', 2, '32.3315', '-117.0467', '1700', '157.94', '0', '0', NULL, 5, 'Oceanview Condo for Rent in Quinta del Mar, Rosarito', 'Rent a luxury oceanview condo in Quinta del Mar, Rosarito. Stunning interiors, breathtaking views, and exclusive community amenities.', 'Quinta del Mar rentals, luxury condos Mexico, beachfront homes Rosarito', 'PXL_20220314_011136924-17382353621507393939.jpg', 'Oceanview Condo for Rent in Quinta del Mar, Rosarito', 'Elegant 2-bedroom condo with ocean views in Rosarito’s Quinta del Mar.', 'Oceanview Condo for Rent in Quinta del Mar, Rosarito', 'Elegant 2-bedroom condo with ocean views in Rosarito’s Quinta del Mar.', 'PXL_20220314_011136924-1738235362.jpg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Oceanview Condo for Rent in Quinta del Mar, Rosarito\",\r\n  \"description\": \"Rent a luxury oceanview condo in Quinta del Mar, Rosarito. Stunning interiors, breathtaking views, and exclusive community amenities.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy A House In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy A House In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyahouseinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyahouseinrosarito.com/property/oceanview-condo-204-quinta-del-mar\"\r\n  }\r\n}');

-- --------------------------------------------------------

--
-- Table structure for table `property_features`
--

DROP TABLE IF EXISTS `property_features`;
CREATE TABLE IF NOT EXISTS `property_features` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `property_id` bigint UNSIGNED NOT NULL,
  `feature_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `property_features_property_id_foreign` (`property_id`),
  KEY `property_features_feature_id_foreign` (`feature_id`)
) ENGINE=InnoDB AUTO_INCREMENT=913 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_features`
--

INSERT INTO `property_features` (`id`, `property_id`, `feature_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2025-01-30 06:11:54', '2025-01-30 06:11:54'),
(2, 1, 2, '2025-01-30 06:11:54', '2025-01-30 06:11:54'),
(3, 1, 3, '2025-01-30 06:11:54', '2025-01-30 06:11:54'),
(4, 1, 4, '2025-01-30 06:11:54', '2025-01-30 06:11:54'),
(5, 1, 5, '2025-01-30 06:11:54', '2025-01-30 06:11:54'),
(6, 1, 6, '2025-01-30 06:11:54', '2025-01-30 06:11:54'),
(7, 1, 7, '2025-01-30 06:11:54', '2025-01-30 06:11:54'),
(8, 1, 8, '2025-01-30 06:11:54', '2025-01-30 06:11:54'),
(9, 1, 9, '2025-01-30 06:11:54', '2025-01-30 06:11:54'),
(10, 1, 10, '2025-01-30 06:11:54', '2025-01-30 06:11:54'),
(11, 1, 11, '2025-01-30 06:11:54', '2025-01-30 06:11:54'),
(12, 1, 12, '2025-01-30 06:11:54', '2025-01-30 06:11:54'),
(13, 1, 13, '2025-01-30 06:11:54', '2025-01-30 06:11:54'),
(14, 1, 14, '2025-01-30 06:11:54', '2025-01-30 06:11:54'),
(15, 1, 15, '2025-01-30 06:11:54', '2025-01-30 06:11:54'),
(16, 1, 16, '2025-01-30 06:11:54', '2025-01-30 06:11:54'),
(17, 1, 17, '2025-01-30 06:11:54', '2025-01-30 06:11:54'),
(18, 1, 18, '2025-01-30 06:11:54', '2025-01-30 06:11:54'),
(19, 1, 19, '2025-01-30 06:11:54', '2025-01-30 06:11:54'),
(20, 1, 20, '2025-01-30 06:11:54', '2025-01-30 06:11:54'),
(21, 1, 21, '2025-01-30 06:11:54', '2025-01-30 06:11:54'),
(22, 1, 22, '2025-01-30 06:11:54', '2025-01-30 06:11:54'),
(23, 1, 23, '2025-01-30 06:11:54', '2025-01-30 06:11:54'),
(24, 1, 24, '2025-01-30 06:11:54', '2025-01-30 06:11:54'),
(25, 1, 25, '2025-01-30 06:11:54', '2025-01-30 06:11:54'),
(26, 1, 26, '2025-01-30 06:11:54', '2025-01-30 06:11:54'),
(27, 1, 27, '2025-01-30 06:11:54', '2025-01-30 06:11:54'),
(28, 1, 28, '2025-01-30 06:11:54', '2025-01-30 06:11:54'),
(29, 1, 29, '2025-01-30 06:11:54', '2025-01-30 06:11:54'),
(30, 1, 32, '2025-01-30 06:11:54', '2025-01-30 06:11:54'),
(31, 1, 33, '2025-01-30 06:11:54', '2025-01-30 06:11:54'),
(32, 2, 1, '2025-01-30 06:17:24', '2025-01-30 06:17:24'),
(33, 2, 2, '2025-01-30 06:17:24', '2025-01-30 06:17:24'),
(34, 2, 3, '2025-01-30 06:17:24', '2025-01-30 06:17:24'),
(35, 2, 4, '2025-01-30 06:17:24', '2025-01-30 06:17:24'),
(36, 2, 5, '2025-01-30 06:17:24', '2025-01-30 06:17:24'),
(37, 2, 6, '2025-01-30 06:17:24', '2025-01-30 06:17:24'),
(38, 2, 7, '2025-01-30 06:17:24', '2025-01-30 06:17:24'),
(39, 2, 8, '2025-01-30 06:17:24', '2025-01-30 06:17:24'),
(40, 2, 9, '2025-01-30 06:17:24', '2025-01-30 06:17:24'),
(41, 2, 10, '2025-01-30 06:17:24', '2025-01-30 06:17:24'),
(42, 2, 11, '2025-01-30 06:17:24', '2025-01-30 06:17:24'),
(43, 2, 12, '2025-01-30 06:17:24', '2025-01-30 06:17:24'),
(44, 2, 13, '2025-01-30 06:17:24', '2025-01-30 06:17:24'),
(45, 2, 14, '2025-01-30 06:17:24', '2025-01-30 06:17:24'),
(46, 2, 15, '2025-01-30 06:17:24', '2025-01-30 06:17:24'),
(47, 2, 16, '2025-01-30 06:17:24', '2025-01-30 06:17:24'),
(48, 2, 17, '2025-01-30 06:17:24', '2025-01-30 06:17:24'),
(49, 2, 18, '2025-01-30 06:17:24', '2025-01-30 06:17:24'),
(50, 2, 19, '2025-01-30 06:17:24', '2025-01-30 06:17:24'),
(51, 2, 20, '2025-01-30 06:17:24', '2025-01-30 06:17:24'),
(52, 2, 21, '2025-01-30 06:17:24', '2025-01-30 06:17:24'),
(53, 2, 22, '2025-01-30 06:17:24', '2025-01-30 06:17:24'),
(54, 2, 23, '2025-01-30 06:17:24', '2025-01-30 06:17:24'),
(55, 2, 24, '2025-01-30 06:17:24', '2025-01-30 06:17:24'),
(56, 2, 25, '2025-01-30 06:17:24', '2025-01-30 06:17:24'),
(57, 2, 26, '2025-01-30 06:17:24', '2025-01-30 06:17:24'),
(58, 2, 27, '2025-01-30 06:17:24', '2025-01-30 06:17:24'),
(59, 2, 28, '2025-01-30 06:17:24', '2025-01-30 06:17:24'),
(60, 2, 29, '2025-01-30 06:17:24', '2025-01-30 06:17:24'),
(61, 2, 31, '2025-01-30 06:17:24', '2025-01-30 06:17:24'),
(62, 2, 33, '2025-01-30 06:17:24', '2025-01-30 06:17:24'),
(63, 3, 1, '2025-01-30 07:39:00', '2025-01-30 07:39:00'),
(64, 3, 2, '2025-01-30 07:39:00', '2025-01-30 07:39:00'),
(65, 3, 3, '2025-01-30 07:39:00', '2025-01-30 07:39:00'),
(66, 3, 4, '2025-01-30 07:39:00', '2025-01-30 07:39:00'),
(67, 3, 5, '2025-01-30 07:39:00', '2025-01-30 07:39:00'),
(68, 3, 6, '2025-01-30 07:39:00', '2025-01-30 07:39:00'),
(69, 3, 7, '2025-01-30 07:39:00', '2025-01-30 07:39:00'),
(70, 3, 8, '2025-01-30 07:39:00', '2025-01-30 07:39:00'),
(71, 3, 9, '2025-01-30 07:39:00', '2025-01-30 07:39:00'),
(72, 3, 10, '2025-01-30 07:39:00', '2025-01-30 07:39:00'),
(73, 3, 11, '2025-01-30 07:39:00', '2025-01-30 07:39:00'),
(74, 3, 12, '2025-01-30 07:39:00', '2025-01-30 07:39:00'),
(75, 3, 13, '2025-01-30 07:39:00', '2025-01-30 07:39:00'),
(76, 3, 14, '2025-01-30 07:39:00', '2025-01-30 07:39:00'),
(77, 3, 15, '2025-01-30 07:39:00', '2025-01-30 07:39:00'),
(78, 3, 16, '2025-01-30 07:39:00', '2025-01-30 07:39:00'),
(79, 3, 17, '2025-01-30 07:39:00', '2025-01-30 07:39:00'),
(80, 3, 18, '2025-01-30 07:39:00', '2025-01-30 07:39:00'),
(81, 3, 19, '2025-01-30 07:39:00', '2025-01-30 07:39:00'),
(82, 3, 20, '2025-01-30 07:39:00', '2025-01-30 07:39:00'),
(83, 3, 21, '2025-01-30 07:39:00', '2025-01-30 07:39:00'),
(84, 3, 22, '2025-01-30 07:39:00', '2025-01-30 07:39:00'),
(85, 3, 23, '2025-01-30 07:39:00', '2025-01-30 07:39:00'),
(86, 3, 24, '2025-01-30 07:39:00', '2025-01-30 07:39:00'),
(87, 3, 25, '2025-01-30 07:39:00', '2025-01-30 07:39:00'),
(88, 3, 26, '2025-01-30 07:39:00', '2025-01-30 07:39:00'),
(89, 3, 27, '2025-01-30 07:39:00', '2025-01-30 07:39:00'),
(90, 3, 28, '2025-01-30 07:39:00', '2025-01-30 07:39:00'),
(91, 3, 29, '2025-01-30 07:39:00', '2025-01-30 07:39:00'),
(92, 3, 30, '2025-01-30 07:39:00', '2025-01-30 07:39:00'),
(93, 3, 33, '2025-01-30 07:39:00', '2025-01-30 07:39:00'),
(94, 4, 1, '2025-01-30 07:42:50', '2025-01-30 07:42:50'),
(95, 4, 2, '2025-01-30 07:42:50', '2025-01-30 07:42:50'),
(96, 4, 3, '2025-01-30 07:42:50', '2025-01-30 07:42:50'),
(97, 4, 4, '2025-01-30 07:42:50', '2025-01-30 07:42:50'),
(98, 4, 5, '2025-01-30 07:42:50', '2025-01-30 07:42:50'),
(99, 4, 6, '2025-01-30 07:42:50', '2025-01-30 07:42:50'),
(100, 4, 7, '2025-01-30 07:42:50', '2025-01-30 07:42:50'),
(101, 4, 8, '2025-01-30 07:42:50', '2025-01-30 07:42:50'),
(102, 4, 9, '2025-01-30 07:42:50', '2025-01-30 07:42:50'),
(103, 4, 10, '2025-01-30 07:42:50', '2025-01-30 07:42:50'),
(104, 4, 11, '2025-01-30 07:42:50', '2025-01-30 07:42:50'),
(105, 4, 12, '2025-01-30 07:42:50', '2025-01-30 07:42:50'),
(106, 4, 13, '2025-01-30 07:42:50', '2025-01-30 07:42:50'),
(107, 4, 14, '2025-01-30 07:42:50', '2025-01-30 07:42:50'),
(108, 4, 15, '2025-01-30 07:42:50', '2025-01-30 07:42:50'),
(109, 4, 16, '2025-01-30 07:42:50', '2025-01-30 07:42:50'),
(110, 4, 17, '2025-01-30 07:42:50', '2025-01-30 07:42:50'),
(111, 4, 18, '2025-01-30 07:42:50', '2025-01-30 07:42:50'),
(112, 4, 19, '2025-01-30 07:42:50', '2025-01-30 07:42:50'),
(113, 4, 20, '2025-01-30 07:42:50', '2025-01-30 07:42:50'),
(114, 4, 21, '2025-01-30 07:42:50', '2025-01-30 07:42:50'),
(115, 4, 22, '2025-01-30 07:42:50', '2025-01-30 07:42:50'),
(116, 4, 23, '2025-01-30 07:42:50', '2025-01-30 07:42:50'),
(117, 4, 24, '2025-01-30 07:42:50', '2025-01-30 07:42:50'),
(118, 4, 25, '2025-01-30 07:42:50', '2025-01-30 07:42:50'),
(119, 4, 26, '2025-01-30 07:42:50', '2025-01-30 07:42:50'),
(120, 4, 27, '2025-01-30 07:42:50', '2025-01-30 07:42:50'),
(121, 4, 28, '2025-01-30 07:42:50', '2025-01-30 07:42:50'),
(122, 4, 29, '2025-01-30 07:42:50', '2025-01-30 07:42:50'),
(123, 4, 31, '2025-01-30 07:42:50', '2025-01-30 07:42:50'),
(124, 4, 33, '2025-01-30 07:42:50', '2025-01-30 07:42:50'),
(125, 5, 1, '2025-01-30 07:51:24', '2025-01-30 07:51:24'),
(126, 5, 2, '2025-01-30 07:51:24', '2025-01-30 07:51:24'),
(127, 5, 3, '2025-01-30 07:51:24', '2025-01-30 07:51:24'),
(128, 5, 4, '2025-01-30 07:51:24', '2025-01-30 07:51:24'),
(129, 5, 5, '2025-01-30 07:51:24', '2025-01-30 07:51:24'),
(130, 5, 6, '2025-01-30 07:51:24', '2025-01-30 07:51:24'),
(131, 5, 7, '2025-01-30 07:51:24', '2025-01-30 07:51:24'),
(132, 5, 8, '2025-01-30 07:51:24', '2025-01-30 07:51:24'),
(133, 5, 9, '2025-01-30 07:51:24', '2025-01-30 07:51:24'),
(134, 5, 10, '2025-01-30 07:51:24', '2025-01-30 07:51:24'),
(135, 5, 11, '2025-01-30 07:51:24', '2025-01-30 07:51:24'),
(136, 5, 12, '2025-01-30 07:51:24', '2025-01-30 07:51:24'),
(137, 5, 13, '2025-01-30 07:51:24', '2025-01-30 07:51:24'),
(138, 5, 14, '2025-01-30 07:51:24', '2025-01-30 07:51:24'),
(139, 5, 15, '2025-01-30 07:51:24', '2025-01-30 07:51:24'),
(140, 5, 16, '2025-01-30 07:51:24', '2025-01-30 07:51:24'),
(141, 5, 17, '2025-01-30 07:51:24', '2025-01-30 07:51:24'),
(142, 5, 18, '2025-01-30 07:51:24', '2025-01-30 07:51:24'),
(143, 5, 19, '2025-01-30 07:51:24', '2025-01-30 07:51:24'),
(144, 5, 20, '2025-01-30 07:51:24', '2025-01-30 07:51:24'),
(145, 5, 21, '2025-01-30 07:51:24', '2025-01-30 07:51:24'),
(146, 5, 22, '2025-01-30 07:51:24', '2025-01-30 07:51:24'),
(147, 5, 23, '2025-01-30 07:51:24', '2025-01-30 07:51:24'),
(148, 5, 24, '2025-01-30 07:51:24', '2025-01-30 07:51:24'),
(149, 5, 25, '2025-01-30 07:51:24', '2025-01-30 07:51:24'),
(150, 5, 26, '2025-01-30 07:51:24', '2025-01-30 07:51:24'),
(151, 5, 27, '2025-01-30 07:51:24', '2025-01-30 07:51:24'),
(152, 5, 28, '2025-01-30 07:51:24', '2025-01-30 07:51:24'),
(153, 5, 29, '2025-01-30 07:51:24', '2025-01-30 07:51:24'),
(154, 5, 31, '2025-01-30 07:51:24', '2025-01-30 07:51:24'),
(155, 5, 33, '2025-01-30 07:51:24', '2025-01-30 07:51:24'),
(156, 6, 1, '2025-01-30 07:54:26', '2025-01-30 07:54:26'),
(157, 6, 2, '2025-01-30 07:54:26', '2025-01-30 07:54:26'),
(158, 6, 3, '2025-01-30 07:54:26', '2025-01-30 07:54:26'),
(159, 6, 4, '2025-01-30 07:54:26', '2025-01-30 07:54:26'),
(160, 6, 5, '2025-01-30 07:54:26', '2025-01-30 07:54:26'),
(161, 6, 6, '2025-01-30 07:54:26', '2025-01-30 07:54:26'),
(162, 6, 7, '2025-01-30 07:54:26', '2025-01-30 07:54:26'),
(163, 6, 8, '2025-01-30 07:54:26', '2025-01-30 07:54:26'),
(164, 6, 9, '2025-01-30 07:54:26', '2025-01-30 07:54:26'),
(165, 6, 10, '2025-01-30 07:54:26', '2025-01-30 07:54:26'),
(166, 6, 11, '2025-01-30 07:54:26', '2025-01-30 07:54:26'),
(167, 6, 12, '2025-01-30 07:54:26', '2025-01-30 07:54:26'),
(168, 6, 13, '2025-01-30 07:54:26', '2025-01-30 07:54:26'),
(169, 6, 14, '2025-01-30 07:54:26', '2025-01-30 07:54:26'),
(170, 6, 15, '2025-01-30 07:54:26', '2025-01-30 07:54:26'),
(171, 6, 16, '2025-01-30 07:54:26', '2025-01-30 07:54:26'),
(172, 6, 17, '2025-01-30 07:54:26', '2025-01-30 07:54:26'),
(173, 6, 18, '2025-01-30 07:54:26', '2025-01-30 07:54:26'),
(174, 6, 19, '2025-01-30 07:54:26', '2025-01-30 07:54:26'),
(175, 6, 20, '2025-01-30 07:54:26', '2025-01-30 07:54:26'),
(176, 6, 21, '2025-01-30 07:54:26', '2025-01-30 07:54:26'),
(177, 6, 22, '2025-01-30 07:54:26', '2025-01-30 07:54:26'),
(178, 6, 23, '2025-01-30 07:54:26', '2025-01-30 07:54:26'),
(179, 6, 24, '2025-01-30 07:54:26', '2025-01-30 07:54:26'),
(180, 6, 25, '2025-01-30 07:54:26', '2025-01-30 07:54:26'),
(181, 6, 26, '2025-01-30 07:54:26', '2025-01-30 07:54:26'),
(182, 6, 27, '2025-01-30 07:54:26', '2025-01-30 07:54:26'),
(183, 6, 28, '2025-01-30 07:54:26', '2025-01-30 07:54:26'),
(184, 6, 29, '2025-01-30 07:54:26', '2025-01-30 07:54:26'),
(185, 6, 30, '2025-01-30 07:54:26', '2025-01-30 07:54:26'),
(186, 6, 32, '2025-01-30 07:54:26', '2025-01-30 07:54:26'),
(187, 6, 33, '2025-01-30 07:54:26', '2025-01-30 07:54:26'),
(188, 7, 1, '2025-01-30 07:57:25', '2025-01-30 07:57:25'),
(189, 7, 2, '2025-01-30 07:57:25', '2025-01-30 07:57:25'),
(190, 7, 3, '2025-01-30 07:57:25', '2025-01-30 07:57:25'),
(191, 7, 4, '2025-01-30 07:57:25', '2025-01-30 07:57:25'),
(192, 7, 5, '2025-01-30 07:57:25', '2025-01-30 07:57:25'),
(193, 7, 6, '2025-01-30 07:57:25', '2025-01-30 07:57:25'),
(194, 7, 7, '2025-01-30 07:57:25', '2025-01-30 07:57:25'),
(195, 7, 8, '2025-01-30 07:57:25', '2025-01-30 07:57:25'),
(196, 7, 9, '2025-01-30 07:57:25', '2025-01-30 07:57:25'),
(197, 7, 10, '2025-01-30 07:57:25', '2025-01-30 07:57:25'),
(198, 7, 11, '2025-01-30 07:57:25', '2025-01-30 07:57:25'),
(199, 7, 12, '2025-01-30 07:57:25', '2025-01-30 07:57:25'),
(200, 7, 13, '2025-01-30 07:57:25', '2025-01-30 07:57:25'),
(201, 7, 14, '2025-01-30 07:57:25', '2025-01-30 07:57:25'),
(202, 7, 15, '2025-01-30 07:57:25', '2025-01-30 07:57:25'),
(203, 7, 16, '2025-01-30 07:57:25', '2025-01-30 07:57:25'),
(204, 7, 17, '2025-01-30 07:57:25', '2025-01-30 07:57:25'),
(205, 7, 18, '2025-01-30 07:57:25', '2025-01-30 07:57:25'),
(206, 7, 19, '2025-01-30 07:57:25', '2025-01-30 07:57:25'),
(207, 7, 20, '2025-01-30 07:57:25', '2025-01-30 07:57:25'),
(208, 7, 21, '2025-01-30 07:57:25', '2025-01-30 07:57:25'),
(209, 7, 22, '2025-01-30 07:57:25', '2025-01-30 07:57:25'),
(210, 7, 23, '2025-01-30 07:57:25', '2025-01-30 07:57:25'),
(211, 7, 24, '2025-01-30 07:57:25', '2025-01-30 07:57:25'),
(212, 7, 25, '2025-01-30 07:57:25', '2025-01-30 07:57:25'),
(213, 7, 26, '2025-01-30 07:57:25', '2025-01-30 07:57:25'),
(214, 7, 27, '2025-01-30 07:57:25', '2025-01-30 07:57:25'),
(215, 7, 28, '2025-01-30 07:57:25', '2025-01-30 07:57:25'),
(216, 7, 29, '2025-01-30 07:57:25', '2025-01-30 07:57:25'),
(217, 7, 30, '2025-01-30 07:57:25', '2025-01-30 07:57:25'),
(218, 7, 31, '2025-01-30 07:57:25', '2025-01-30 07:57:25'),
(219, 7, 32, '2025-01-30 07:57:25', '2025-01-30 07:57:25'),
(220, 7, 33, '2025-01-30 07:57:25', '2025-01-30 07:57:25'),
(221, 8, 1, '2025-01-30 08:00:33', '2025-01-30 08:00:33'),
(222, 8, 2, '2025-01-30 08:00:33', '2025-01-30 08:00:33'),
(223, 8, 3, '2025-01-30 08:00:33', '2025-01-30 08:00:33'),
(224, 8, 4, '2025-01-30 08:00:33', '2025-01-30 08:00:33'),
(225, 8, 5, '2025-01-30 08:00:33', '2025-01-30 08:00:33'),
(226, 8, 6, '2025-01-30 08:00:33', '2025-01-30 08:00:33'),
(227, 8, 7, '2025-01-30 08:00:33', '2025-01-30 08:00:33'),
(228, 8, 8, '2025-01-30 08:00:33', '2025-01-30 08:00:33'),
(229, 8, 9, '2025-01-30 08:00:33', '2025-01-30 08:00:33'),
(230, 8, 10, '2025-01-30 08:00:33', '2025-01-30 08:00:33'),
(231, 8, 11, '2025-01-30 08:00:33', '2025-01-30 08:00:33'),
(232, 8, 12, '2025-01-30 08:00:33', '2025-01-30 08:00:33'),
(233, 8, 13, '2025-01-30 08:00:33', '2025-01-30 08:00:33'),
(234, 8, 14, '2025-01-30 08:00:33', '2025-01-30 08:00:33'),
(235, 8, 15, '2025-01-30 08:00:33', '2025-01-30 08:00:33'),
(236, 8, 16, '2025-01-30 08:00:33', '2025-01-30 08:00:33'),
(237, 8, 17, '2025-01-30 08:00:33', '2025-01-30 08:00:33'),
(238, 8, 18, '2025-01-30 08:00:33', '2025-01-30 08:00:33'),
(239, 8, 19, '2025-01-30 08:00:33', '2025-01-30 08:00:33'),
(240, 8, 20, '2025-01-30 08:00:33', '2025-01-30 08:00:33'),
(241, 8, 21, '2025-01-30 08:00:33', '2025-01-30 08:00:33'),
(242, 8, 22, '2025-01-30 08:00:33', '2025-01-30 08:00:33'),
(243, 8, 23, '2025-01-30 08:00:33', '2025-01-30 08:00:33'),
(244, 8, 24, '2025-01-30 08:00:33', '2025-01-30 08:00:33'),
(245, 8, 25, '2025-01-30 08:00:33', '2025-01-30 08:00:33'),
(246, 8, 26, '2025-01-30 08:00:33', '2025-01-30 08:00:33'),
(247, 8, 27, '2025-01-30 08:00:33', '2025-01-30 08:00:33'),
(248, 8, 28, '2025-01-30 08:00:33', '2025-01-30 08:00:33'),
(249, 8, 29, '2025-01-30 08:00:33', '2025-01-30 08:00:33'),
(250, 8, 30, '2025-01-30 08:00:33', '2025-01-30 08:00:33'),
(251, 8, 31, '2025-01-30 08:00:33', '2025-01-30 08:00:33'),
(252, 8, 32, '2025-01-30 08:00:33', '2025-01-30 08:00:33'),
(253, 8, 33, '2025-01-30 08:00:33', '2025-01-30 08:00:33'),
(254, 9, 1, '2025-01-30 08:04:54', '2025-01-30 08:04:54'),
(255, 9, 2, '2025-01-30 08:04:54', '2025-01-30 08:04:54'),
(256, 9, 3, '2025-01-30 08:04:54', '2025-01-30 08:04:54'),
(257, 9, 4, '2025-01-30 08:04:54', '2025-01-30 08:04:54'),
(258, 9, 5, '2025-01-30 08:04:54', '2025-01-30 08:04:54'),
(259, 9, 6, '2025-01-30 08:04:54', '2025-01-30 08:04:54'),
(260, 9, 7, '2025-01-30 08:04:54', '2025-01-30 08:04:54'),
(261, 9, 8, '2025-01-30 08:04:54', '2025-01-30 08:04:54'),
(262, 9, 9, '2025-01-30 08:04:54', '2025-01-30 08:04:54'),
(263, 9, 10, '2025-01-30 08:04:54', '2025-01-30 08:04:54'),
(264, 9, 11, '2025-01-30 08:04:54', '2025-01-30 08:04:54'),
(265, 9, 12, '2025-01-30 08:04:54', '2025-01-30 08:04:54'),
(266, 9, 13, '2025-01-30 08:04:54', '2025-01-30 08:04:54'),
(267, 9, 14, '2025-01-30 08:04:54', '2025-01-30 08:04:54'),
(268, 9, 15, '2025-01-30 08:04:54', '2025-01-30 08:04:54'),
(269, 9, 16, '2025-01-30 08:04:54', '2025-01-30 08:04:54'),
(270, 9, 17, '2025-01-30 08:04:54', '2025-01-30 08:04:54'),
(271, 9, 18, '2025-01-30 08:04:54', '2025-01-30 08:04:54'),
(272, 9, 19, '2025-01-30 08:04:54', '2025-01-30 08:04:54'),
(273, 9, 20, '2025-01-30 08:04:54', '2025-01-30 08:04:54'),
(274, 9, 21, '2025-01-30 08:04:54', '2025-01-30 08:04:54'),
(275, 9, 22, '2025-01-30 08:04:54', '2025-01-30 08:04:54'),
(276, 9, 23, '2025-01-30 08:04:54', '2025-01-30 08:04:54'),
(277, 9, 24, '2025-01-30 08:04:54', '2025-01-30 08:04:54'),
(278, 9, 25, '2025-01-30 08:04:54', '2025-01-30 08:04:54'),
(279, 9, 26, '2025-01-30 08:04:54', '2025-01-30 08:04:54'),
(280, 9, 27, '2025-01-30 08:04:54', '2025-01-30 08:04:54'),
(281, 9, 28, '2025-01-30 08:04:54', '2025-01-30 08:04:54'),
(282, 9, 29, '2025-01-30 08:04:54', '2025-01-30 08:04:54'),
(283, 9, 30, '2025-01-30 08:04:54', '2025-01-30 08:04:54'),
(284, 9, 31, '2025-01-30 08:04:54', '2025-01-30 08:04:54'),
(285, 9, 32, '2025-01-30 08:04:54', '2025-01-30 08:04:54'),
(286, 9, 33, '2025-01-30 08:04:54', '2025-01-30 08:04:54'),
(287, 10, 1, '2025-01-30 08:07:14', '2025-01-30 08:07:14'),
(288, 10, 2, '2025-01-30 08:07:14', '2025-01-30 08:07:14'),
(289, 10, 3, '2025-01-30 08:07:14', '2025-01-30 08:07:14'),
(290, 10, 4, '2025-01-30 08:07:14', '2025-01-30 08:07:14'),
(291, 10, 5, '2025-01-30 08:07:14', '2025-01-30 08:07:14'),
(292, 10, 6, '2025-01-30 08:07:14', '2025-01-30 08:07:14'),
(293, 10, 7, '2025-01-30 08:07:14', '2025-01-30 08:07:14'),
(294, 10, 8, '2025-01-30 08:07:14', '2025-01-30 08:07:14'),
(295, 10, 9, '2025-01-30 08:07:14', '2025-01-30 08:07:14'),
(296, 10, 10, '2025-01-30 08:07:14', '2025-01-30 08:07:14'),
(297, 10, 11, '2025-01-30 08:07:14', '2025-01-30 08:07:14'),
(298, 10, 12, '2025-01-30 08:07:14', '2025-01-30 08:07:14'),
(299, 10, 13, '2025-01-30 08:07:14', '2025-01-30 08:07:14'),
(300, 10, 14, '2025-01-30 08:07:14', '2025-01-30 08:07:14'),
(301, 10, 15, '2025-01-30 08:07:14', '2025-01-30 08:07:14'),
(302, 10, 16, '2025-01-30 08:07:14', '2025-01-30 08:07:14'),
(303, 10, 17, '2025-01-30 08:07:14', '2025-01-30 08:07:14'),
(304, 10, 18, '2025-01-30 08:07:14', '2025-01-30 08:07:14'),
(305, 10, 19, '2025-01-30 08:07:14', '2025-01-30 08:07:14'),
(306, 10, 20, '2025-01-30 08:07:14', '2025-01-30 08:07:14'),
(307, 10, 21, '2025-01-30 08:07:14', '2025-01-30 08:07:14'),
(308, 10, 22, '2025-01-30 08:07:14', '2025-01-30 08:07:14'),
(309, 10, 23, '2025-01-30 08:07:14', '2025-01-30 08:07:14'),
(310, 10, 24, '2025-01-30 08:07:14', '2025-01-30 08:07:14'),
(311, 10, 25, '2025-01-30 08:07:14', '2025-01-30 08:07:14'),
(312, 10, 26, '2025-01-30 08:07:14', '2025-01-30 08:07:14'),
(313, 10, 27, '2025-01-30 08:07:14', '2025-01-30 08:07:14'),
(314, 10, 28, '2025-01-30 08:07:14', '2025-01-30 08:07:14'),
(315, 10, 29, '2025-01-30 08:07:14', '2025-01-30 08:07:14'),
(316, 10, 31, '2025-01-30 08:07:14', '2025-01-30 08:07:14'),
(317, 10, 32, '2025-01-30 08:07:14', '2025-01-30 08:07:14'),
(318, 10, 33, '2025-01-30 08:07:14', '2025-01-30 08:07:14'),
(319, 11, 1, '2025-01-30 08:30:01', '2025-01-30 08:30:01'),
(320, 11, 2, '2025-01-30 08:30:01', '2025-01-30 08:30:01'),
(321, 11, 3, '2025-01-30 08:30:01', '2025-01-30 08:30:01'),
(322, 11, 4, '2025-01-30 08:30:01', '2025-01-30 08:30:01'),
(323, 11, 5, '2025-01-30 08:30:01', '2025-01-30 08:30:01'),
(324, 11, 6, '2025-01-30 08:30:01', '2025-01-30 08:30:01'),
(325, 11, 7, '2025-01-30 08:30:01', '2025-01-30 08:30:01'),
(326, 11, 8, '2025-01-30 08:30:01', '2025-01-30 08:30:01'),
(327, 11, 9, '2025-01-30 08:30:01', '2025-01-30 08:30:01'),
(328, 11, 10, '2025-01-30 08:30:01', '2025-01-30 08:30:01'),
(329, 11, 11, '2025-01-30 08:30:01', '2025-01-30 08:30:01'),
(330, 11, 12, '2025-01-30 08:30:01', '2025-01-30 08:30:01'),
(331, 11, 13, '2025-01-30 08:30:01', '2025-01-30 08:30:01'),
(332, 11, 14, '2025-01-30 08:30:01', '2025-01-30 08:30:01'),
(333, 11, 15, '2025-01-30 08:30:01', '2025-01-30 08:30:01'),
(334, 11, 16, '2025-01-30 08:30:01', '2025-01-30 08:30:01'),
(335, 11, 17, '2025-01-30 08:30:01', '2025-01-30 08:30:01'),
(336, 11, 18, '2025-01-30 08:30:01', '2025-01-30 08:30:01'),
(337, 11, 19, '2025-01-30 08:30:01', '2025-01-30 08:30:01'),
(338, 11, 20, '2025-01-30 08:30:01', '2025-01-30 08:30:01'),
(339, 11, 21, '2025-01-30 08:30:01', '2025-01-30 08:30:01'),
(340, 11, 22, '2025-01-30 08:30:01', '2025-01-30 08:30:01'),
(341, 11, 23, '2025-01-30 08:30:01', '2025-01-30 08:30:01'),
(342, 11, 24, '2025-01-30 08:30:01', '2025-01-30 08:30:01'),
(343, 11, 25, '2025-01-30 08:30:01', '2025-01-30 08:30:01'),
(344, 11, 26, '2025-01-30 08:30:01', '2025-01-30 08:30:01'),
(345, 11, 27, '2025-01-30 08:30:01', '2025-01-30 08:30:01'),
(346, 11, 28, '2025-01-30 08:30:01', '2025-01-30 08:30:01'),
(347, 11, 29, '2025-01-30 08:30:01', '2025-01-30 08:30:01'),
(348, 11, 31, '2025-01-30 08:30:01', '2025-01-30 08:30:01'),
(349, 11, 33, '2025-01-30 08:30:01', '2025-01-30 08:30:01'),
(350, 12, 1, '2025-01-30 09:37:09', '2025-01-30 09:37:09'),
(351, 12, 2, '2025-01-30 09:37:09', '2025-01-30 09:37:09'),
(352, 12, 3, '2025-01-30 09:37:09', '2025-01-30 09:37:09'),
(353, 12, 4, '2025-01-30 09:37:09', '2025-01-30 09:37:09'),
(354, 12, 5, '2025-01-30 09:37:09', '2025-01-30 09:37:09'),
(355, 12, 6, '2025-01-30 09:37:09', '2025-01-30 09:37:09'),
(356, 12, 7, '2025-01-30 09:37:09', '2025-01-30 09:37:09'),
(357, 12, 8, '2025-01-30 09:37:09', '2025-01-30 09:37:09'),
(358, 12, 9, '2025-01-30 09:37:09', '2025-01-30 09:37:09'),
(359, 12, 10, '2025-01-30 09:37:09', '2025-01-30 09:37:09'),
(360, 12, 11, '2025-01-30 09:37:09', '2025-01-30 09:37:09'),
(361, 12, 12, '2025-01-30 09:37:09', '2025-01-30 09:37:09'),
(362, 12, 13, '2025-01-30 09:37:09', '2025-01-30 09:37:09'),
(363, 12, 14, '2025-01-30 09:37:09', '2025-01-30 09:37:09'),
(364, 12, 15, '2025-01-30 09:37:09', '2025-01-30 09:37:09'),
(365, 12, 16, '2025-01-30 09:37:09', '2025-01-30 09:37:09'),
(366, 12, 17, '2025-01-30 09:37:09', '2025-01-30 09:37:09'),
(367, 12, 18, '2025-01-30 09:37:09', '2025-01-30 09:37:09'),
(368, 12, 19, '2025-01-30 09:37:09', '2025-01-30 09:37:09'),
(369, 12, 20, '2025-01-30 09:37:09', '2025-01-30 09:37:09'),
(370, 12, 21, '2025-01-30 09:37:09', '2025-01-30 09:37:09'),
(371, 12, 22, '2025-01-30 09:37:09', '2025-01-30 09:37:09'),
(372, 12, 23, '2025-01-30 09:37:09', '2025-01-30 09:37:09'),
(373, 12, 24, '2025-01-30 09:37:09', '2025-01-30 09:37:09'),
(374, 12, 25, '2025-01-30 09:37:09', '2025-01-30 09:37:09'),
(375, 12, 26, '2025-01-30 09:37:09', '2025-01-30 09:37:09'),
(376, 12, 27, '2025-01-30 09:37:09', '2025-01-30 09:37:09'),
(377, 12, 28, '2025-01-30 09:37:09', '2025-01-30 09:37:09'),
(378, 12, 29, '2025-01-30 09:37:09', '2025-01-30 09:37:09'),
(379, 12, 31, '2025-01-30 09:37:09', '2025-01-30 09:37:09'),
(380, 12, 33, '2025-01-30 09:37:09', '2025-01-30 09:37:09'),
(381, 13, 1, '2025-01-30 09:53:51', '2025-01-30 09:53:51'),
(382, 13, 2, '2025-01-30 09:53:51', '2025-01-30 09:53:51'),
(383, 13, 3, '2025-01-30 09:53:51', '2025-01-30 09:53:51'),
(384, 13, 4, '2025-01-30 09:53:51', '2025-01-30 09:53:51'),
(385, 13, 5, '2025-01-30 09:53:51', '2025-01-30 09:53:51'),
(386, 13, 6, '2025-01-30 09:53:51', '2025-01-30 09:53:51'),
(387, 13, 7, '2025-01-30 09:53:51', '2025-01-30 09:53:51'),
(388, 13, 8, '2025-01-30 09:53:51', '2025-01-30 09:53:51'),
(389, 13, 9, '2025-01-30 09:53:51', '2025-01-30 09:53:51'),
(390, 13, 10, '2025-01-30 09:53:51', '2025-01-30 09:53:51'),
(391, 13, 11, '2025-01-30 09:53:51', '2025-01-30 09:53:51'),
(392, 13, 12, '2025-01-30 09:53:51', '2025-01-30 09:53:51'),
(393, 13, 13, '2025-01-30 09:53:51', '2025-01-30 09:53:51'),
(394, 13, 14, '2025-01-30 09:53:51', '2025-01-30 09:53:51'),
(395, 13, 15, '2025-01-30 09:53:51', '2025-01-30 09:53:51'),
(396, 13, 16, '2025-01-30 09:53:51', '2025-01-30 09:53:51'),
(397, 13, 17, '2025-01-30 09:53:51', '2025-01-30 09:53:51'),
(398, 13, 18, '2025-01-30 09:53:51', '2025-01-30 09:53:51'),
(399, 13, 19, '2025-01-30 09:53:51', '2025-01-30 09:53:51'),
(400, 13, 20, '2025-01-30 09:53:51', '2025-01-30 09:53:51'),
(401, 13, 21, '2025-01-30 09:53:51', '2025-01-30 09:53:51'),
(402, 13, 22, '2025-01-30 09:53:51', '2025-01-30 09:53:51'),
(403, 13, 23, '2025-01-30 09:53:51', '2025-01-30 09:53:51'),
(404, 13, 24, '2025-01-30 09:53:51', '2025-01-30 09:53:51'),
(405, 13, 25, '2025-01-30 09:53:51', '2025-01-30 09:53:51'),
(406, 13, 26, '2025-01-30 09:53:51', '2025-01-30 09:53:51'),
(407, 13, 27, '2025-01-30 09:53:51', '2025-01-30 09:53:51'),
(408, 13, 28, '2025-01-30 09:53:51', '2025-01-30 09:53:51'),
(409, 13, 29, '2025-01-30 09:53:51', '2025-01-30 09:53:51'),
(410, 13, 31, '2025-01-30 09:53:51', '2025-01-30 09:53:51'),
(411, 13, 33, '2025-01-30 09:53:51', '2025-01-30 09:53:51'),
(412, 14, 1, '2025-01-30 10:07:06', '2025-01-30 10:07:06'),
(413, 14, 2, '2025-01-30 10:07:06', '2025-01-30 10:07:06'),
(414, 14, 3, '2025-01-30 10:07:06', '2025-01-30 10:07:06'),
(415, 14, 4, '2025-01-30 10:07:06', '2025-01-30 10:07:06'),
(416, 14, 5, '2025-01-30 10:07:06', '2025-01-30 10:07:06'),
(417, 14, 6, '2025-01-30 10:07:06', '2025-01-30 10:07:06'),
(418, 14, 7, '2025-01-30 10:07:06', '2025-01-30 10:07:06'),
(419, 14, 8, '2025-01-30 10:07:06', '2025-01-30 10:07:06'),
(420, 14, 9, '2025-01-30 10:07:06', '2025-01-30 10:07:06'),
(421, 14, 10, '2025-01-30 10:07:06', '2025-01-30 10:07:06'),
(422, 14, 11, '2025-01-30 10:07:06', '2025-01-30 10:07:06'),
(423, 14, 12, '2025-01-30 10:07:06', '2025-01-30 10:07:06'),
(424, 14, 13, '2025-01-30 10:07:06', '2025-01-30 10:07:06'),
(425, 14, 14, '2025-01-30 10:07:06', '2025-01-30 10:07:06'),
(426, 14, 15, '2025-01-30 10:07:06', '2025-01-30 10:07:06'),
(427, 14, 16, '2025-01-30 10:07:06', '2025-01-30 10:07:06'),
(428, 14, 17, '2025-01-30 10:07:06', '2025-01-30 10:07:06'),
(429, 14, 18, '2025-01-30 10:07:06', '2025-01-30 10:07:06'),
(430, 14, 19, '2025-01-30 10:07:06', '2025-01-30 10:07:06'),
(431, 14, 20, '2025-01-30 10:07:06', '2025-01-30 10:07:06'),
(432, 14, 21, '2025-01-30 10:07:06', '2025-01-30 10:07:06'),
(433, 14, 22, '2025-01-30 10:07:06', '2025-01-30 10:07:06'),
(434, 14, 23, '2025-01-30 10:07:06', '2025-01-30 10:07:06'),
(435, 14, 24, '2025-01-30 10:07:06', '2025-01-30 10:07:06'),
(436, 14, 25, '2025-01-30 10:07:06', '2025-01-30 10:07:06'),
(437, 14, 26, '2025-01-30 10:07:06', '2025-01-30 10:07:06'),
(438, 14, 27, '2025-01-30 10:07:06', '2025-01-30 10:07:06'),
(439, 14, 28, '2025-01-30 10:07:06', '2025-01-30 10:07:06'),
(440, 14, 29, '2025-01-30 10:07:06', '2025-01-30 10:07:06'),
(441, 14, 31, '2025-01-30 10:07:06', '2025-01-30 10:07:06'),
(442, 14, 33, '2025-01-30 10:07:06', '2025-01-30 10:07:06'),
(474, 15, 1, '2025-01-30 10:11:42', '2025-01-30 10:11:42'),
(475, 15, 2, '2025-01-30 10:11:42', '2025-01-30 10:11:42'),
(476, 15, 3, '2025-01-30 10:11:42', '2025-01-30 10:11:42'),
(477, 15, 4, '2025-01-30 10:11:42', '2025-01-30 10:11:42'),
(478, 15, 5, '2025-01-30 10:11:42', '2025-01-30 10:11:42'),
(479, 15, 6, '2025-01-30 10:11:42', '2025-01-30 10:11:42'),
(480, 15, 7, '2025-01-30 10:11:42', '2025-01-30 10:11:42'),
(481, 15, 8, '2025-01-30 10:11:42', '2025-01-30 10:11:42'),
(482, 15, 9, '2025-01-30 10:11:42', '2025-01-30 10:11:42'),
(483, 15, 10, '2025-01-30 10:11:42', '2025-01-30 10:11:42'),
(484, 15, 11, '2025-01-30 10:11:42', '2025-01-30 10:11:42'),
(485, 15, 12, '2025-01-30 10:11:42', '2025-01-30 10:11:42'),
(486, 15, 13, '2025-01-30 10:11:42', '2025-01-30 10:11:42'),
(487, 15, 14, '2025-01-30 10:11:42', '2025-01-30 10:11:42'),
(488, 15, 15, '2025-01-30 10:11:42', '2025-01-30 10:11:42'),
(489, 15, 16, '2025-01-30 10:11:42', '2025-01-30 10:11:42'),
(490, 15, 17, '2025-01-30 10:11:42', '2025-01-30 10:11:42'),
(491, 15, 18, '2025-01-30 10:11:42', '2025-01-30 10:11:42'),
(492, 15, 19, '2025-01-30 10:11:42', '2025-01-30 10:11:42'),
(493, 15, 20, '2025-01-30 10:11:42', '2025-01-30 10:11:42'),
(494, 15, 21, '2025-01-30 10:11:42', '2025-01-30 10:11:42'),
(495, 15, 22, '2025-01-30 10:11:42', '2025-01-30 10:11:42'),
(496, 15, 23, '2025-01-30 10:11:42', '2025-01-30 10:11:42'),
(497, 15, 24, '2025-01-30 10:11:42', '2025-01-30 10:11:42'),
(498, 15, 25, '2025-01-30 10:11:42', '2025-01-30 10:11:42'),
(499, 15, 26, '2025-01-30 10:11:42', '2025-01-30 10:11:42'),
(500, 15, 27, '2025-01-30 10:11:42', '2025-01-30 10:11:42'),
(501, 15, 28, '2025-01-30 10:11:42', '2025-01-30 10:11:42'),
(502, 15, 29, '2025-01-30 10:11:42', '2025-01-30 10:11:42'),
(503, 15, 30, '2025-01-30 10:11:42', '2025-01-30 10:11:42'),
(504, 15, 33, '2025-01-30 10:11:42', '2025-01-30 10:11:42'),
(505, 16, 1, '2025-01-30 10:14:18', '2025-01-30 10:14:18'),
(506, 16, 2, '2025-01-30 10:14:18', '2025-01-30 10:14:18'),
(507, 16, 3, '2025-01-30 10:14:18', '2025-01-30 10:14:18'),
(508, 16, 4, '2025-01-30 10:14:18', '2025-01-30 10:14:18'),
(509, 16, 5, '2025-01-30 10:14:18', '2025-01-30 10:14:18'),
(510, 16, 6, '2025-01-30 10:14:18', '2025-01-30 10:14:18'),
(511, 16, 7, '2025-01-30 10:14:18', '2025-01-30 10:14:18'),
(512, 16, 8, '2025-01-30 10:14:18', '2025-01-30 10:14:18'),
(513, 16, 9, '2025-01-30 10:14:18', '2025-01-30 10:14:18'),
(514, 16, 10, '2025-01-30 10:14:18', '2025-01-30 10:14:18'),
(515, 16, 11, '2025-01-30 10:14:18', '2025-01-30 10:14:18'),
(516, 16, 12, '2025-01-30 10:14:18', '2025-01-30 10:14:18'),
(517, 16, 13, '2025-01-30 10:14:18', '2025-01-30 10:14:18'),
(518, 16, 14, '2025-01-30 10:14:18', '2025-01-30 10:14:18'),
(519, 16, 15, '2025-01-30 10:14:18', '2025-01-30 10:14:18'),
(520, 16, 16, '2025-01-30 10:14:18', '2025-01-30 10:14:18'),
(521, 16, 17, '2025-01-30 10:14:18', '2025-01-30 10:14:18'),
(522, 16, 18, '2025-01-30 10:14:18', '2025-01-30 10:14:18'),
(523, 16, 19, '2025-01-30 10:14:18', '2025-01-30 10:14:18'),
(524, 16, 20, '2025-01-30 10:14:18', '2025-01-30 10:14:18'),
(525, 16, 21, '2025-01-30 10:14:18', '2025-01-30 10:14:18'),
(526, 16, 22, '2025-01-30 10:14:18', '2025-01-30 10:14:18'),
(527, 16, 23, '2025-01-30 10:14:18', '2025-01-30 10:14:18'),
(528, 16, 24, '2025-01-30 10:14:18', '2025-01-30 10:14:18'),
(529, 16, 25, '2025-01-30 10:14:18', '2025-01-30 10:14:18'),
(530, 16, 26, '2025-01-30 10:14:18', '2025-01-30 10:14:18'),
(531, 16, 27, '2025-01-30 10:14:18', '2025-01-30 10:14:18'),
(532, 16, 28, '2025-01-30 10:14:18', '2025-01-30 10:14:18'),
(533, 16, 29, '2025-01-30 10:14:18', '2025-01-30 10:14:18'),
(534, 16, 31, '2025-01-30 10:14:18', '2025-01-30 10:14:18'),
(535, 16, 33, '2025-01-30 10:14:18', '2025-01-30 10:14:18'),
(536, 17, 1, '2025-01-30 10:21:24', '2025-01-30 10:21:24'),
(537, 17, 2, '2025-01-30 10:21:24', '2025-01-30 10:21:24'),
(538, 17, 3, '2025-01-30 10:21:24', '2025-01-30 10:21:24'),
(539, 17, 4, '2025-01-30 10:21:24', '2025-01-30 10:21:24'),
(540, 17, 5, '2025-01-30 10:21:24', '2025-01-30 10:21:24'),
(541, 17, 6, '2025-01-30 10:21:24', '2025-01-30 10:21:24'),
(542, 17, 7, '2025-01-30 10:21:24', '2025-01-30 10:21:24'),
(543, 17, 8, '2025-01-30 10:21:24', '2025-01-30 10:21:24'),
(544, 17, 9, '2025-01-30 10:21:24', '2025-01-30 10:21:24'),
(545, 17, 10, '2025-01-30 10:21:24', '2025-01-30 10:21:24'),
(546, 17, 11, '2025-01-30 10:21:24', '2025-01-30 10:21:24'),
(547, 17, 12, '2025-01-30 10:21:24', '2025-01-30 10:21:24'),
(548, 17, 13, '2025-01-30 10:21:24', '2025-01-30 10:21:24'),
(549, 17, 14, '2025-01-30 10:21:24', '2025-01-30 10:21:24'),
(550, 17, 15, '2025-01-30 10:21:24', '2025-01-30 10:21:24'),
(551, 17, 16, '2025-01-30 10:21:24', '2025-01-30 10:21:24'),
(552, 17, 17, '2025-01-30 10:21:24', '2025-01-30 10:21:24'),
(553, 17, 18, '2025-01-30 10:21:25', '2025-01-30 10:21:25'),
(554, 17, 19, '2025-01-30 10:21:25', '2025-01-30 10:21:25'),
(555, 17, 20, '2025-01-30 10:21:25', '2025-01-30 10:21:25'),
(556, 17, 21, '2025-01-30 10:21:25', '2025-01-30 10:21:25'),
(557, 17, 22, '2025-01-30 10:21:25', '2025-01-30 10:21:25'),
(558, 17, 23, '2025-01-30 10:21:25', '2025-01-30 10:21:25'),
(559, 17, 24, '2025-01-30 10:21:25', '2025-01-30 10:21:25'),
(560, 17, 25, '2025-01-30 10:21:25', '2025-01-30 10:21:25'),
(561, 17, 26, '2025-01-30 10:21:25', '2025-01-30 10:21:25'),
(562, 17, 27, '2025-01-30 10:21:25', '2025-01-30 10:21:25'),
(563, 17, 28, '2025-01-30 10:21:25', '2025-01-30 10:21:25'),
(564, 17, 29, '2025-01-30 10:21:25', '2025-01-30 10:21:25'),
(565, 17, 30, '2025-01-30 10:21:25', '2025-01-30 10:21:25'),
(566, 17, 31, '2025-01-30 10:21:25', '2025-01-30 10:21:25'),
(567, 17, 32, '2025-01-30 10:21:25', '2025-01-30 10:21:25'),
(568, 17, 33, '2025-01-30 10:21:25', '2025-01-30 10:21:25'),
(599, 18, 1, '2025-01-30 10:25:26', '2025-01-30 10:25:26'),
(600, 18, 2, '2025-01-30 10:25:26', '2025-01-30 10:25:26'),
(601, 18, 3, '2025-01-30 10:25:26', '2025-01-30 10:25:26'),
(602, 18, 4, '2025-01-30 10:25:26', '2025-01-30 10:25:26'),
(603, 18, 5, '2025-01-30 10:25:26', '2025-01-30 10:25:26'),
(604, 18, 6, '2025-01-30 10:25:26', '2025-01-30 10:25:26'),
(605, 18, 7, '2025-01-30 10:25:26', '2025-01-30 10:25:26'),
(606, 18, 8, '2025-01-30 10:25:26', '2025-01-30 10:25:26'),
(607, 18, 9, '2025-01-30 10:25:26', '2025-01-30 10:25:26'),
(608, 18, 10, '2025-01-30 10:25:26', '2025-01-30 10:25:26'),
(609, 18, 11, '2025-01-30 10:25:26', '2025-01-30 10:25:26'),
(610, 18, 12, '2025-01-30 10:25:26', '2025-01-30 10:25:26'),
(611, 18, 13, '2025-01-30 10:25:26', '2025-01-30 10:25:26'),
(612, 18, 14, '2025-01-30 10:25:26', '2025-01-30 10:25:26'),
(613, 18, 15, '2025-01-30 10:25:26', '2025-01-30 10:25:26'),
(614, 18, 16, '2025-01-30 10:25:26', '2025-01-30 10:25:26'),
(615, 18, 17, '2025-01-30 10:25:26', '2025-01-30 10:25:26'),
(616, 18, 18, '2025-01-30 10:25:26', '2025-01-30 10:25:26'),
(617, 18, 19, '2025-01-30 10:25:26', '2025-01-30 10:25:26'),
(618, 18, 20, '2025-01-30 10:25:26', '2025-01-30 10:25:26'),
(619, 18, 21, '2025-01-30 10:25:26', '2025-01-30 10:25:26'),
(620, 18, 22, '2025-01-30 10:25:26', '2025-01-30 10:25:26'),
(621, 18, 23, '2025-01-30 10:25:26', '2025-01-30 10:25:26'),
(622, 18, 24, '2025-01-30 10:25:26', '2025-01-30 10:25:26'),
(623, 18, 25, '2025-01-30 10:25:26', '2025-01-30 10:25:26'),
(624, 18, 27, '2025-01-30 10:25:26', '2025-01-30 10:25:26'),
(625, 18, 28, '2025-01-30 10:25:26', '2025-01-30 10:25:26'),
(626, 18, 29, '2025-01-30 10:25:26', '2025-01-30 10:25:26'),
(627, 18, 31, '2025-01-30 10:25:26', '2025-01-30 10:25:26'),
(628, 18, 33, '2025-01-30 10:25:26', '2025-01-30 10:25:26'),
(629, 19, 1, '2025-01-30 10:36:10', '2025-01-30 10:36:10'),
(630, 19, 2, '2025-01-30 10:36:10', '2025-01-30 10:36:10'),
(631, 19, 3, '2025-01-30 10:36:10', '2025-01-30 10:36:10'),
(632, 19, 4, '2025-01-30 10:36:10', '2025-01-30 10:36:10'),
(633, 19, 5, '2025-01-30 10:36:10', '2025-01-30 10:36:10'),
(634, 19, 6, '2025-01-30 10:36:10', '2025-01-30 10:36:10'),
(635, 19, 7, '2025-01-30 10:36:10', '2025-01-30 10:36:10'),
(636, 19, 8, '2025-01-30 10:36:10', '2025-01-30 10:36:10'),
(637, 19, 9, '2025-01-30 10:36:10', '2025-01-30 10:36:10'),
(638, 19, 10, '2025-01-30 10:36:10', '2025-01-30 10:36:10'),
(639, 19, 11, '2025-01-30 10:36:10', '2025-01-30 10:36:10'),
(640, 19, 12, '2025-01-30 10:36:10', '2025-01-30 10:36:10'),
(641, 19, 13, '2025-01-30 10:36:10', '2025-01-30 10:36:10'),
(642, 19, 14, '2025-01-30 10:36:10', '2025-01-30 10:36:10'),
(643, 19, 15, '2025-01-30 10:36:10', '2025-01-30 10:36:10'),
(644, 19, 16, '2025-01-30 10:36:10', '2025-01-30 10:36:10'),
(645, 19, 17, '2025-01-30 10:36:10', '2025-01-30 10:36:10'),
(646, 19, 18, '2025-01-30 10:36:10', '2025-01-30 10:36:10'),
(647, 19, 19, '2025-01-30 10:36:10', '2025-01-30 10:36:10'),
(648, 19, 20, '2025-01-30 10:36:10', '2025-01-30 10:36:10'),
(649, 19, 21, '2025-01-30 10:36:10', '2025-01-30 10:36:10'),
(650, 19, 22, '2025-01-30 10:36:10', '2025-01-30 10:36:10'),
(651, 19, 23, '2025-01-30 10:36:10', '2025-01-30 10:36:10'),
(652, 19, 24, '2025-01-30 10:36:10', '2025-01-30 10:36:10'),
(653, 19, 25, '2025-01-30 10:36:10', '2025-01-30 10:36:10'),
(654, 19, 27, '2025-01-30 10:36:10', '2025-01-30 10:36:10'),
(655, 19, 28, '2025-01-30 10:36:10', '2025-01-30 10:36:10'),
(656, 19, 29, '2025-01-30 10:36:10', '2025-01-30 10:36:10'),
(657, 19, 30, '2025-01-30 10:36:10', '2025-01-30 10:36:10'),
(658, 19, 31, '2025-01-30 10:36:10', '2025-01-30 10:36:10'),
(659, 19, 32, '2025-01-30 10:36:10', '2025-01-30 10:36:10'),
(660, 19, 33, '2025-01-30 10:36:10', '2025-01-30 10:36:10'),
(661, 20, 1, '2025-01-30 10:37:23', '2025-01-30 10:37:23'),
(662, 20, 2, '2025-01-30 10:37:23', '2025-01-30 10:37:23'),
(663, 20, 3, '2025-01-30 10:37:23', '2025-01-30 10:37:23'),
(664, 20, 4, '2025-01-30 10:37:23', '2025-01-30 10:37:23'),
(665, 20, 5, '2025-01-30 10:37:23', '2025-01-30 10:37:23'),
(666, 20, 6, '2025-01-30 10:37:23', '2025-01-30 10:37:23'),
(667, 20, 7, '2025-01-30 10:37:23', '2025-01-30 10:37:23'),
(668, 20, 8, '2025-01-30 10:37:23', '2025-01-30 10:37:23'),
(669, 20, 9, '2025-01-30 10:37:23', '2025-01-30 10:37:23'),
(670, 20, 10, '2025-01-30 10:37:23', '2025-01-30 10:37:23'),
(671, 20, 11, '2025-01-30 10:37:23', '2025-01-30 10:37:23'),
(672, 20, 12, '2025-01-30 10:37:23', '2025-01-30 10:37:23'),
(673, 20, 13, '2025-01-30 10:37:23', '2025-01-30 10:37:23'),
(674, 20, 14, '2025-01-30 10:37:23', '2025-01-30 10:37:23'),
(675, 20, 15, '2025-01-30 10:37:23', '2025-01-30 10:37:23'),
(676, 20, 16, '2025-01-30 10:37:23', '2025-01-30 10:37:23'),
(677, 20, 17, '2025-01-30 10:37:23', '2025-01-30 10:37:23'),
(678, 20, 18, '2025-01-30 10:37:23', '2025-01-30 10:37:23'),
(679, 20, 19, '2025-01-30 10:37:23', '2025-01-30 10:37:23'),
(680, 20, 20, '2025-01-30 10:37:23', '2025-01-30 10:37:23'),
(681, 20, 21, '2025-01-30 10:37:23', '2025-01-30 10:37:23'),
(682, 20, 22, '2025-01-30 10:37:23', '2025-01-30 10:37:23'),
(683, 20, 23, '2025-01-30 10:37:23', '2025-01-30 10:37:23'),
(684, 20, 24, '2025-01-30 10:37:23', '2025-01-30 10:37:23'),
(685, 20, 25, '2025-01-30 10:37:23', '2025-01-30 10:37:23'),
(686, 20, 26, '2025-01-30 10:37:23', '2025-01-30 10:37:23'),
(687, 20, 27, '2025-01-30 10:37:23', '2025-01-30 10:37:23'),
(688, 20, 28, '2025-01-30 10:37:23', '2025-01-30 10:37:23'),
(689, 20, 29, '2025-01-30 10:37:23', '2025-01-30 10:37:23'),
(690, 20, 31, '2025-01-30 10:37:23', '2025-01-30 10:37:23'),
(691, 20, 33, '2025-01-30 10:37:23', '2025-01-30 10:37:23'),
(692, 21, 1, '2025-01-30 10:50:01', '2025-01-30 10:50:01'),
(693, 21, 2, '2025-01-30 10:50:01', '2025-01-30 10:50:01'),
(694, 21, 3, '2025-01-30 10:50:01', '2025-01-30 10:50:01'),
(695, 21, 4, '2025-01-30 10:50:01', '2025-01-30 10:50:01'),
(696, 21, 5, '2025-01-30 10:50:01', '2025-01-30 10:50:01'),
(697, 21, 6, '2025-01-30 10:50:01', '2025-01-30 10:50:01'),
(698, 21, 7, '2025-01-30 10:50:01', '2025-01-30 10:50:01'),
(699, 21, 8, '2025-01-30 10:50:01', '2025-01-30 10:50:01'),
(700, 21, 9, '2025-01-30 10:50:01', '2025-01-30 10:50:01'),
(701, 21, 10, '2025-01-30 10:50:01', '2025-01-30 10:50:01'),
(702, 21, 11, '2025-01-30 10:50:01', '2025-01-30 10:50:01'),
(703, 21, 12, '2025-01-30 10:50:01', '2025-01-30 10:50:01'),
(704, 21, 13, '2025-01-30 10:50:01', '2025-01-30 10:50:01'),
(705, 21, 14, '2025-01-30 10:50:01', '2025-01-30 10:50:01'),
(706, 21, 15, '2025-01-30 10:50:01', '2025-01-30 10:50:01'),
(707, 21, 16, '2025-01-30 10:50:01', '2025-01-30 10:50:01'),
(708, 21, 17, '2025-01-30 10:50:01', '2025-01-30 10:50:01'),
(709, 21, 18, '2025-01-30 10:50:01', '2025-01-30 10:50:01'),
(710, 21, 19, '2025-01-30 10:50:01', '2025-01-30 10:50:01'),
(711, 21, 20, '2025-01-30 10:50:01', '2025-01-30 10:50:01'),
(712, 21, 21, '2025-01-30 10:50:01', '2025-01-30 10:50:01'),
(713, 21, 22, '2025-01-30 10:50:01', '2025-01-30 10:50:01'),
(714, 21, 23, '2025-01-30 10:50:01', '2025-01-30 10:50:01'),
(715, 21, 24, '2025-01-30 10:50:01', '2025-01-30 10:50:01'),
(716, 21, 25, '2025-01-30 10:50:01', '2025-01-30 10:50:01'),
(717, 21, 26, '2025-01-30 10:50:01', '2025-01-30 10:50:01'),
(718, 21, 27, '2025-01-30 10:50:01', '2025-01-30 10:50:01'),
(719, 21, 28, '2025-01-30 10:50:01', '2025-01-30 10:50:01'),
(720, 21, 29, '2025-01-30 10:50:01', '2025-01-30 10:50:01'),
(721, 21, 31, '2025-01-30 10:50:01', '2025-01-30 10:50:01'),
(722, 21, 33, '2025-01-30 10:50:01', '2025-01-30 10:50:01'),
(723, 22, 1, '2025-01-30 10:56:04', '2025-01-30 10:56:04'),
(724, 22, 2, '2025-01-30 10:56:04', '2025-01-30 10:56:04'),
(725, 22, 3, '2025-01-30 10:56:04', '2025-01-30 10:56:04'),
(726, 22, 4, '2025-01-30 10:56:04', '2025-01-30 10:56:04'),
(727, 22, 5, '2025-01-30 10:56:04', '2025-01-30 10:56:04'),
(728, 22, 6, '2025-01-30 10:56:04', '2025-01-30 10:56:04'),
(729, 22, 7, '2025-01-30 10:56:04', '2025-01-30 10:56:04'),
(730, 22, 8, '2025-01-30 10:56:04', '2025-01-30 10:56:04'),
(731, 22, 9, '2025-01-30 10:56:04', '2025-01-30 10:56:04'),
(732, 22, 10, '2025-01-30 10:56:04', '2025-01-30 10:56:04'),
(733, 22, 11, '2025-01-30 10:56:04', '2025-01-30 10:56:04'),
(734, 22, 12, '2025-01-30 10:56:04', '2025-01-30 10:56:04'),
(735, 22, 13, '2025-01-30 10:56:04', '2025-01-30 10:56:04'),
(736, 22, 14, '2025-01-30 10:56:04', '2025-01-30 10:56:04'),
(737, 22, 15, '2025-01-30 10:56:04', '2025-01-30 10:56:04'),
(738, 22, 16, '2025-01-30 10:56:04', '2025-01-30 10:56:04'),
(739, 22, 17, '2025-01-30 10:56:04', '2025-01-30 10:56:04'),
(740, 22, 18, '2025-01-30 10:56:04', '2025-01-30 10:56:04'),
(741, 22, 19, '2025-01-30 10:56:04', '2025-01-30 10:56:04'),
(742, 22, 20, '2025-01-30 10:56:04', '2025-01-30 10:56:04'),
(743, 22, 21, '2025-01-30 10:56:04', '2025-01-30 10:56:04'),
(744, 22, 22, '2025-01-30 10:56:04', '2025-01-30 10:56:04'),
(745, 22, 23, '2025-01-30 10:56:04', '2025-01-30 10:56:04'),
(746, 22, 24, '2025-01-30 10:56:04', '2025-01-30 10:56:04'),
(747, 22, 25, '2025-01-30 10:56:04', '2025-01-30 10:56:04'),
(748, 22, 26, '2025-01-30 10:56:04', '2025-01-30 10:56:04'),
(749, 22, 27, '2025-01-30 10:56:04', '2025-01-30 10:56:04'),
(750, 22, 28, '2025-01-30 10:56:04', '2025-01-30 10:56:04'),
(751, 22, 29, '2025-01-30 10:56:04', '2025-01-30 10:56:04'),
(752, 22, 32, '2025-01-30 10:56:04', '2025-01-30 10:56:04'),
(753, 22, 33, '2025-01-30 10:56:04', '2025-01-30 10:56:04'),
(754, 23, 1, '2025-01-30 11:00:29', '2025-01-30 11:00:29'),
(755, 23, 2, '2025-01-30 11:00:29', '2025-01-30 11:00:29'),
(756, 23, 3, '2025-01-30 11:00:29', '2025-01-30 11:00:29'),
(757, 23, 4, '2025-01-30 11:00:29', '2025-01-30 11:00:29'),
(758, 23, 5, '2025-01-30 11:00:29', '2025-01-30 11:00:29'),
(759, 23, 6, '2025-01-30 11:00:29', '2025-01-30 11:00:29'),
(760, 23, 7, '2025-01-30 11:00:29', '2025-01-30 11:00:29'),
(761, 23, 8, '2025-01-30 11:00:29', '2025-01-30 11:00:29'),
(762, 23, 9, '2025-01-30 11:00:29', '2025-01-30 11:00:29'),
(763, 23, 10, '2025-01-30 11:00:29', '2025-01-30 11:00:29'),
(764, 23, 11, '2025-01-30 11:00:29', '2025-01-30 11:00:29'),
(765, 23, 12, '2025-01-30 11:00:29', '2025-01-30 11:00:29'),
(766, 23, 13, '2025-01-30 11:00:29', '2025-01-30 11:00:29'),
(767, 23, 14, '2025-01-30 11:00:29', '2025-01-30 11:00:29'),
(768, 23, 15, '2025-01-30 11:00:29', '2025-01-30 11:00:29'),
(769, 23, 16, '2025-01-30 11:00:29', '2025-01-30 11:00:29'),
(770, 23, 17, '2025-01-30 11:00:29', '2025-01-30 11:00:29'),
(771, 23, 18, '2025-01-30 11:00:29', '2025-01-30 11:00:29'),
(772, 23, 19, '2025-01-30 11:00:29', '2025-01-30 11:00:29'),
(773, 23, 20, '2025-01-30 11:00:29', '2025-01-30 11:00:29'),
(774, 23, 21, '2025-01-30 11:00:29', '2025-01-30 11:00:29'),
(775, 23, 22, '2025-01-30 11:00:29', '2025-01-30 11:00:29'),
(776, 23, 23, '2025-01-30 11:00:29', '2025-01-30 11:00:29'),
(777, 23, 24, '2025-01-30 11:00:29', '2025-01-30 11:00:29'),
(778, 23, 25, '2025-01-30 11:00:29', '2025-01-30 11:00:29'),
(779, 23, 26, '2025-01-30 11:00:29', '2025-01-30 11:00:29'),
(780, 23, 27, '2025-01-30 11:00:29', '2025-01-30 11:00:29'),
(781, 23, 28, '2025-01-30 11:00:29', '2025-01-30 11:00:29'),
(782, 23, 29, '2025-01-30 11:00:29', '2025-01-30 11:00:29'),
(783, 23, 31, '2025-01-30 11:00:29', '2025-01-30 11:00:29'),
(784, 23, 33, '2025-01-30 11:00:29', '2025-01-30 11:00:29'),
(785, 24, 1, '2025-01-30 11:04:24', '2025-01-30 11:04:24'),
(786, 24, 2, '2025-01-30 11:04:24', '2025-01-30 11:04:24'),
(787, 24, 3, '2025-01-30 11:04:24', '2025-01-30 11:04:24'),
(788, 24, 4, '2025-01-30 11:04:24', '2025-01-30 11:04:24'),
(789, 24, 5, '2025-01-30 11:04:24', '2025-01-30 11:04:24'),
(790, 24, 6, '2025-01-30 11:04:24', '2025-01-30 11:04:24'),
(791, 24, 7, '2025-01-30 11:04:24', '2025-01-30 11:04:24'),
(792, 24, 8, '2025-01-30 11:04:24', '2025-01-30 11:04:24'),
(793, 24, 9, '2025-01-30 11:04:24', '2025-01-30 11:04:24'),
(794, 24, 10, '2025-01-30 11:04:24', '2025-01-30 11:04:24'),
(795, 24, 11, '2025-01-30 11:04:24', '2025-01-30 11:04:24'),
(796, 24, 12, '2025-01-30 11:04:24', '2025-01-30 11:04:24'),
(797, 24, 13, '2025-01-30 11:04:24', '2025-01-30 11:04:24'),
(798, 24, 14, '2025-01-30 11:04:24', '2025-01-30 11:04:24'),
(799, 24, 15, '2025-01-30 11:04:24', '2025-01-30 11:04:24'),
(800, 24, 16, '2025-01-30 11:04:24', '2025-01-30 11:04:24'),
(801, 24, 17, '2025-01-30 11:04:24', '2025-01-30 11:04:24'),
(802, 24, 18, '2025-01-30 11:04:24', '2025-01-30 11:04:24'),
(803, 24, 19, '2025-01-30 11:04:24', '2025-01-30 11:04:24'),
(804, 24, 20, '2025-01-30 11:04:24', '2025-01-30 11:04:24'),
(805, 24, 21, '2025-01-30 11:04:24', '2025-01-30 11:04:24'),
(806, 24, 22, '2025-01-30 11:04:24', '2025-01-30 11:04:24'),
(807, 24, 23, '2025-01-30 11:04:24', '2025-01-30 11:04:24'),
(808, 24, 24, '2025-01-30 11:04:24', '2025-01-30 11:04:24'),
(809, 24, 25, '2025-01-30 11:04:24', '2025-01-30 11:04:24'),
(810, 24, 26, '2025-01-30 11:04:24', '2025-01-30 11:04:24'),
(811, 24, 27, '2025-01-30 11:04:24', '2025-01-30 11:04:24'),
(812, 24, 28, '2025-01-30 11:04:24', '2025-01-30 11:04:24'),
(813, 24, 29, '2025-01-30 11:04:24', '2025-01-30 11:04:24'),
(814, 24, 30, '2025-01-30 11:04:24', '2025-01-30 11:04:24'),
(815, 24, 33, '2025-01-30 11:04:24', '2025-01-30 11:04:24'),
(816, 25, 1, '2025-01-30 11:05:20', '2025-01-30 11:05:20'),
(817, 25, 2, '2025-01-30 11:05:20', '2025-01-30 11:05:20'),
(818, 25, 3, '2025-01-30 11:05:20', '2025-01-30 11:05:20'),
(819, 25, 4, '2025-01-30 11:05:20', '2025-01-30 11:05:20'),
(820, 25, 5, '2025-01-30 11:05:20', '2025-01-30 11:05:20'),
(821, 25, 6, '2025-01-30 11:05:20', '2025-01-30 11:05:20'),
(822, 25, 7, '2025-01-30 11:05:20', '2025-01-30 11:05:20'),
(823, 25, 8, '2025-01-30 11:05:20', '2025-01-30 11:05:20'),
(824, 25, 9, '2025-01-30 11:05:20', '2025-01-30 11:05:20'),
(825, 25, 10, '2025-01-30 11:05:20', '2025-01-30 11:05:20'),
(826, 25, 11, '2025-01-30 11:05:20', '2025-01-30 11:05:20'),
(827, 25, 12, '2025-01-30 11:05:20', '2025-01-30 11:05:20'),
(828, 25, 13, '2025-01-30 11:05:20', '2025-01-30 11:05:20'),
(829, 25, 14, '2025-01-30 11:05:20', '2025-01-30 11:05:20'),
(830, 25, 15, '2025-01-30 11:05:20', '2025-01-30 11:05:20'),
(831, 25, 16, '2025-01-30 11:05:20', '2025-01-30 11:05:20'),
(832, 25, 17, '2025-01-30 11:05:20', '2025-01-30 11:05:20'),
(833, 25, 18, '2025-01-30 11:05:20', '2025-01-30 11:05:20'),
(834, 25, 19, '2025-01-30 11:05:20', '2025-01-30 11:05:20'),
(835, 25, 20, '2025-01-30 11:05:20', '2025-01-30 11:05:20'),
(836, 25, 21, '2025-01-30 11:05:20', '2025-01-30 11:05:20'),
(837, 25, 22, '2025-01-30 11:05:20', '2025-01-30 11:05:20'),
(838, 25, 23, '2025-01-30 11:05:20', '2025-01-30 11:05:20'),
(839, 25, 24, '2025-01-30 11:05:20', '2025-01-30 11:05:20'),
(840, 25, 25, '2025-01-30 11:05:20', '2025-01-30 11:05:20'),
(841, 25, 26, '2025-01-30 11:05:20', '2025-01-30 11:05:20'),
(842, 25, 27, '2025-01-30 11:05:20', '2025-01-30 11:05:20'),
(843, 25, 28, '2025-01-30 11:05:20', '2025-01-30 11:05:20'),
(844, 25, 29, '2025-01-30 11:05:20', '2025-01-30 11:05:20'),
(845, 25, 31, '2025-01-30 11:05:20', '2025-01-30 11:05:20'),
(846, 25, 33, '2025-01-30 11:05:20', '2025-01-30 11:05:20'),
(880, 26, 1, '2025-01-30 11:41:37', '2025-01-30 11:41:37'),
(881, 26, 2, '2025-01-30 11:41:37', '2025-01-30 11:41:37'),
(882, 26, 3, '2025-01-30 11:41:37', '2025-01-30 11:41:37'),
(883, 26, 4, '2025-01-30 11:41:37', '2025-01-30 11:41:37'),
(884, 26, 5, '2025-01-30 11:41:37', '2025-01-30 11:41:37'),
(885, 26, 6, '2025-01-30 11:41:37', '2025-01-30 11:41:37'),
(886, 26, 7, '2025-01-30 11:41:37', '2025-01-30 11:41:37'),
(887, 26, 8, '2025-01-30 11:41:37', '2025-01-30 11:41:37'),
(888, 26, 9, '2025-01-30 11:41:37', '2025-01-30 11:41:37'),
(889, 26, 10, '2025-01-30 11:41:37', '2025-01-30 11:41:37'),
(890, 26, 11, '2025-01-30 11:41:37', '2025-01-30 11:41:37'),
(891, 26, 12, '2025-01-30 11:41:37', '2025-01-30 11:41:37'),
(892, 26, 13, '2025-01-30 11:41:37', '2025-01-30 11:41:37'),
(893, 26, 14, '2025-01-30 11:41:37', '2025-01-30 11:41:37'),
(894, 26, 15, '2025-01-30 11:41:37', '2025-01-30 11:41:37'),
(895, 26, 16, '2025-01-30 11:41:37', '2025-01-30 11:41:37'),
(896, 26, 17, '2025-01-30 11:41:37', '2025-01-30 11:41:37'),
(897, 26, 18, '2025-01-30 11:41:37', '2025-01-30 11:41:37'),
(898, 26, 19, '2025-01-30 11:41:37', '2025-01-30 11:41:37'),
(899, 26, 20, '2025-01-30 11:41:37', '2025-01-30 11:41:37'),
(900, 26, 21, '2025-01-30 11:41:37', '2025-01-30 11:41:37'),
(901, 26, 22, '2025-01-30 11:41:37', '2025-01-30 11:41:37'),
(902, 26, 23, '2025-01-30 11:41:37', '2025-01-30 11:41:37'),
(903, 26, 24, '2025-01-30 11:41:37', '2025-01-30 11:41:37'),
(904, 26, 25, '2025-01-30 11:41:37', '2025-01-30 11:41:37'),
(905, 26, 26, '2025-01-30 11:41:37', '2025-01-30 11:41:37'),
(906, 26, 27, '2025-01-30 11:41:37', '2025-01-30 11:41:37'),
(907, 26, 28, '2025-01-30 11:41:37', '2025-01-30 11:41:37'),
(908, 26, 29, '2025-01-30 11:41:37', '2025-01-30 11:41:37'),
(909, 26, 30, '2025-01-30 11:41:37', '2025-01-30 11:41:37'),
(910, 26, 31, '2025-01-30 11:41:37', '2025-01-30 11:41:37'),
(911, 26, 32, '2025-01-30 11:41:37', '2025-01-30 11:41:37'),
(912, 26, 33, '2025-01-30 11:41:37', '2025-01-30 11:41:37');

-- --------------------------------------------------------

--
-- Table structure for table `property_types`
--

DROP TABLE IF EXISTS `property_types`;
CREATE TABLE IF NOT EXISTS `property_types` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `property_id` bigint UNSIGNED NOT NULL,
  `type_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `property_types_property_id_foreign` (`property_id`),
  KEY `property_types_type_id_foreign` (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=204 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_types`
--

INSERT INTO `property_types` (`id`, `property_id`, `type_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2025-01-30 06:11:54', '2025-01-30 06:11:54'),
(2, 1, 3, '2025-01-30 06:11:54', '2025-01-30 06:11:54'),
(3, 2, 2, '2025-01-30 06:17:24', '2025-01-30 06:17:24'),
(4, 2, 3, '2025-01-30 06:17:24', '2025-01-30 06:17:24'),
(5, 2, 8, '2025-01-30 06:17:24', '2025-01-30 06:17:24'),
(6, 3, 2, '2025-01-30 07:39:00', '2025-01-30 07:39:00'),
(7, 3, 3, '2025-01-30 07:39:00', '2025-01-30 07:39:00'),
(8, 3, 8, '2025-01-30 07:39:00', '2025-01-30 07:39:00'),
(9, 4, 1, '2025-01-30 07:42:50', '2025-01-30 07:42:50'),
(10, 4, 2, '2025-01-30 07:42:50', '2025-01-30 07:42:50'),
(11, 4, 3, '2025-01-30 07:42:50', '2025-01-30 07:42:50'),
(12, 4, 4, '2025-01-30 07:42:50', '2025-01-30 07:42:50'),
(13, 4, 8, '2025-01-30 07:42:50', '2025-01-30 07:42:50'),
(14, 5, 2, '2025-01-30 07:51:24', '2025-01-30 07:51:24'),
(15, 5, 3, '2025-01-30 07:51:24', '2025-01-30 07:51:24'),
(16, 5, 6, '2025-01-30 07:51:24', '2025-01-30 07:51:24'),
(17, 5, 8, '2025-01-30 07:51:24', '2025-01-30 07:51:24'),
(18, 6, 1, '2025-01-30 07:54:26', '2025-01-30 07:54:26'),
(19, 6, 4, '2025-01-30 07:54:26', '2025-01-30 07:54:26'),
(20, 7, 1, '2025-01-30 07:57:25', '2025-01-30 07:57:25'),
(21, 7, 2, '2025-01-30 07:57:25', '2025-01-30 07:57:25'),
(22, 7, 3, '2025-01-30 07:57:25', '2025-01-30 07:57:25'),
(23, 7, 4, '2025-01-30 07:57:25', '2025-01-30 07:57:25'),
(24, 7, 5, '2025-01-30 07:57:25', '2025-01-30 07:57:25'),
(25, 7, 6, '2025-01-30 07:57:25', '2025-01-30 07:57:25'),
(26, 7, 7, '2025-01-30 07:57:25', '2025-01-30 07:57:25'),
(27, 7, 8, '2025-01-30 07:57:25', '2025-01-30 07:57:25'),
(28, 8, 1, '2025-01-30 08:00:33', '2025-01-30 08:00:33'),
(29, 8, 2, '2025-01-30 08:00:33', '2025-01-30 08:00:33'),
(30, 8, 3, '2025-01-30 08:00:33', '2025-01-30 08:00:33'),
(31, 8, 4, '2025-01-30 08:00:33', '2025-01-30 08:00:33'),
(32, 8, 5, '2025-01-30 08:00:33', '2025-01-30 08:00:33'),
(33, 8, 6, '2025-01-30 08:00:33', '2025-01-30 08:00:33'),
(34, 8, 7, '2025-01-30 08:00:33', '2025-01-30 08:00:33'),
(35, 8, 8, '2025-01-30 08:00:33', '2025-01-30 08:00:33'),
(36, 9, 1, '2025-01-30 08:04:54', '2025-01-30 08:04:54'),
(37, 9, 2, '2025-01-30 08:04:54', '2025-01-30 08:04:54'),
(38, 9, 3, '2025-01-30 08:04:54', '2025-01-30 08:04:54'),
(39, 9, 4, '2025-01-30 08:04:54', '2025-01-30 08:04:54'),
(40, 9, 5, '2025-01-30 08:04:54', '2025-01-30 08:04:54'),
(41, 9, 6, '2025-01-30 08:04:54', '2025-01-30 08:04:54'),
(42, 9, 7, '2025-01-30 08:04:54', '2025-01-30 08:04:54'),
(43, 9, 8, '2025-01-30 08:04:54', '2025-01-30 08:04:54'),
(44, 10, 1, '2025-01-30 08:07:14', '2025-01-30 08:07:14'),
(45, 10, 2, '2025-01-30 08:07:14', '2025-01-30 08:07:14'),
(46, 10, 3, '2025-01-30 08:07:14', '2025-01-30 08:07:14'),
(47, 10, 4, '2025-01-30 08:07:14', '2025-01-30 08:07:14'),
(48, 10, 5, '2025-01-30 08:07:14', '2025-01-30 08:07:14'),
(49, 10, 6, '2025-01-30 08:07:14', '2025-01-30 08:07:14'),
(50, 10, 7, '2025-01-30 08:07:14', '2025-01-30 08:07:14'),
(51, 10, 8, '2025-01-30 08:07:14', '2025-01-30 08:07:14'),
(52, 11, 1, '2025-01-30 08:30:01', '2025-01-30 08:30:01'),
(53, 11, 2, '2025-01-30 08:30:01', '2025-01-30 08:30:01'),
(54, 11, 3, '2025-01-30 08:30:01', '2025-01-30 08:30:01'),
(55, 11, 4, '2025-01-30 08:30:01', '2025-01-30 08:30:01'),
(56, 11, 5, '2025-01-30 08:30:01', '2025-01-30 08:30:01'),
(57, 11, 6, '2025-01-30 08:30:01', '2025-01-30 08:30:01'),
(58, 11, 7, '2025-01-30 08:30:01', '2025-01-30 08:30:01'),
(59, 11, 8, '2025-01-30 08:30:01', '2025-01-30 08:30:01'),
(60, 12, 1, '2025-01-30 09:37:09', '2025-01-30 09:37:09'),
(61, 12, 2, '2025-01-30 09:37:09', '2025-01-30 09:37:09'),
(62, 12, 3, '2025-01-30 09:37:09', '2025-01-30 09:37:09'),
(63, 12, 4, '2025-01-30 09:37:09', '2025-01-30 09:37:09'),
(64, 12, 5, '2025-01-30 09:37:09', '2025-01-30 09:37:09'),
(65, 12, 6, '2025-01-30 09:37:09', '2025-01-30 09:37:09'),
(66, 12, 7, '2025-01-30 09:37:09', '2025-01-30 09:37:09'),
(67, 12, 8, '2025-01-30 09:37:09', '2025-01-30 09:37:09'),
(68, 13, 1, '2025-01-30 09:53:51', '2025-01-30 09:53:51'),
(69, 13, 2, '2025-01-30 09:53:51', '2025-01-30 09:53:51'),
(70, 13, 3, '2025-01-30 09:53:51', '2025-01-30 09:53:51'),
(71, 13, 4, '2025-01-30 09:53:51', '2025-01-30 09:53:51'),
(72, 13, 5, '2025-01-30 09:53:51', '2025-01-30 09:53:51'),
(73, 13, 6, '2025-01-30 09:53:51', '2025-01-30 09:53:51'),
(74, 13, 7, '2025-01-30 09:53:51', '2025-01-30 09:53:51'),
(75, 13, 8, '2025-01-30 09:53:51', '2025-01-30 09:53:51'),
(76, 14, 1, '2025-01-30 10:07:06', '2025-01-30 10:07:06'),
(77, 14, 2, '2025-01-30 10:07:06', '2025-01-30 10:07:06'),
(78, 14, 3, '2025-01-30 10:07:06', '2025-01-30 10:07:06'),
(79, 14, 4, '2025-01-30 10:07:06', '2025-01-30 10:07:06'),
(80, 14, 5, '2025-01-30 10:07:06', '2025-01-30 10:07:06'),
(81, 14, 6, '2025-01-30 10:07:06', '2025-01-30 10:07:06'),
(82, 14, 7, '2025-01-30 10:07:06', '2025-01-30 10:07:06'),
(83, 14, 8, '2025-01-30 10:07:06', '2025-01-30 10:07:06'),
(92, 15, 1, '2025-01-30 10:11:42', '2025-01-30 10:11:42'),
(93, 15, 2, '2025-01-30 10:11:42', '2025-01-30 10:11:42'),
(94, 15, 3, '2025-01-30 10:11:42', '2025-01-30 10:11:42'),
(95, 15, 4, '2025-01-30 10:11:42', '2025-01-30 10:11:42'),
(96, 15, 5, '2025-01-30 10:11:42', '2025-01-30 10:11:42'),
(97, 15, 6, '2025-01-30 10:11:42', '2025-01-30 10:11:42'),
(98, 15, 7, '2025-01-30 10:11:42', '2025-01-30 10:11:42'),
(99, 15, 8, '2025-01-30 10:11:42', '2025-01-30 10:11:42'),
(100, 16, 1, '2025-01-30 10:14:18', '2025-01-30 10:14:18'),
(101, 16, 2, '2025-01-30 10:14:18', '2025-01-30 10:14:18'),
(102, 16, 3, '2025-01-30 10:14:18', '2025-01-30 10:14:18'),
(103, 16, 4, '2025-01-30 10:14:18', '2025-01-30 10:14:18'),
(104, 16, 5, '2025-01-30 10:14:18', '2025-01-30 10:14:18'),
(105, 16, 6, '2025-01-30 10:14:18', '2025-01-30 10:14:18'),
(106, 16, 7, '2025-01-30 10:14:18', '2025-01-30 10:14:18'),
(107, 16, 8, '2025-01-30 10:14:18', '2025-01-30 10:14:18'),
(108, 17, 1, '2025-01-30 10:21:25', '2025-01-30 10:21:25'),
(109, 17, 2, '2025-01-30 10:21:25', '2025-01-30 10:21:25'),
(110, 17, 3, '2025-01-30 10:21:25', '2025-01-30 10:21:25'),
(111, 17, 4, '2025-01-30 10:21:25', '2025-01-30 10:21:25'),
(112, 17, 5, '2025-01-30 10:21:25', '2025-01-30 10:21:25'),
(113, 17, 6, '2025-01-30 10:21:25', '2025-01-30 10:21:25'),
(114, 17, 7, '2025-01-30 10:21:25', '2025-01-30 10:21:25'),
(115, 17, 8, '2025-01-30 10:21:25', '2025-01-30 10:21:25'),
(124, 18, 1, '2025-01-30 10:25:26', '2025-01-30 10:25:26'),
(125, 18, 2, '2025-01-30 10:25:26', '2025-01-30 10:25:26'),
(126, 18, 3, '2025-01-30 10:25:26', '2025-01-30 10:25:26'),
(127, 18, 4, '2025-01-30 10:25:26', '2025-01-30 10:25:26'),
(128, 18, 5, '2025-01-30 10:25:26', '2025-01-30 10:25:26'),
(129, 18, 6, '2025-01-30 10:25:26', '2025-01-30 10:25:26'),
(130, 18, 7, '2025-01-30 10:25:26', '2025-01-30 10:25:26'),
(131, 18, 8, '2025-01-30 10:25:26', '2025-01-30 10:25:26'),
(132, 19, 1, '2025-01-30 10:36:10', '2025-01-30 10:36:10'),
(133, 19, 2, '2025-01-30 10:36:10', '2025-01-30 10:36:10'),
(134, 19, 3, '2025-01-30 10:36:10', '2025-01-30 10:36:10'),
(135, 19, 4, '2025-01-30 10:36:10', '2025-01-30 10:36:10'),
(136, 19, 5, '2025-01-30 10:36:10', '2025-01-30 10:36:10'),
(137, 19, 6, '2025-01-30 10:36:10', '2025-01-30 10:36:10'),
(138, 19, 7, '2025-01-30 10:36:10', '2025-01-30 10:36:10'),
(139, 19, 8, '2025-01-30 10:36:10', '2025-01-30 10:36:10'),
(140, 20, 1, '2025-01-30 10:37:23', '2025-01-30 10:37:23'),
(141, 20, 2, '2025-01-30 10:37:23', '2025-01-30 10:37:23'),
(142, 20, 3, '2025-01-30 10:37:23', '2025-01-30 10:37:23'),
(143, 20, 4, '2025-01-30 10:37:23', '2025-01-30 10:37:23'),
(144, 20, 5, '2025-01-30 10:37:23', '2025-01-30 10:37:23'),
(145, 20, 6, '2025-01-30 10:37:23', '2025-01-30 10:37:23'),
(146, 20, 7, '2025-01-30 10:37:23', '2025-01-30 10:37:23'),
(147, 20, 8, '2025-01-30 10:37:23', '2025-01-30 10:37:23'),
(148, 21, 1, '2025-01-30 10:50:01', '2025-01-30 10:50:01'),
(149, 21, 2, '2025-01-30 10:50:01', '2025-01-30 10:50:01'),
(150, 21, 3, '2025-01-30 10:50:01', '2025-01-30 10:50:01'),
(151, 21, 4, '2025-01-30 10:50:01', '2025-01-30 10:50:01'),
(152, 21, 5, '2025-01-30 10:50:01', '2025-01-30 10:50:01'),
(153, 21, 6, '2025-01-30 10:50:01', '2025-01-30 10:50:01'),
(154, 21, 7, '2025-01-30 10:50:01', '2025-01-30 10:50:01'),
(155, 21, 8, '2025-01-30 10:50:01', '2025-01-30 10:50:01'),
(156, 22, 1, '2025-01-30 10:56:04', '2025-01-30 10:56:04'),
(157, 22, 2, '2025-01-30 10:56:04', '2025-01-30 10:56:04'),
(158, 22, 3, '2025-01-30 10:56:04', '2025-01-30 10:56:04'),
(159, 22, 4, '2025-01-30 10:56:04', '2025-01-30 10:56:04'),
(160, 22, 5, '2025-01-30 10:56:04', '2025-01-30 10:56:04'),
(161, 22, 6, '2025-01-30 10:56:04', '2025-01-30 10:56:04'),
(162, 22, 7, '2025-01-30 10:56:04', '2025-01-30 10:56:04'),
(163, 22, 8, '2025-01-30 10:56:04', '2025-01-30 10:56:04'),
(164, 23, 1, '2025-01-30 11:00:29', '2025-01-30 11:00:29'),
(165, 23, 2, '2025-01-30 11:00:29', '2025-01-30 11:00:29'),
(166, 23, 3, '2025-01-30 11:00:29', '2025-01-30 11:00:29'),
(167, 23, 4, '2025-01-30 11:00:29', '2025-01-30 11:00:29'),
(168, 23, 5, '2025-01-30 11:00:29', '2025-01-30 11:00:29'),
(169, 23, 6, '2025-01-30 11:00:29', '2025-01-30 11:00:29'),
(170, 23, 7, '2025-01-30 11:00:29', '2025-01-30 11:00:29'),
(171, 23, 8, '2025-01-30 11:00:29', '2025-01-30 11:00:29'),
(172, 24, 1, '2025-01-30 11:04:24', '2025-01-30 11:04:24'),
(173, 24, 2, '2025-01-30 11:04:24', '2025-01-30 11:04:24'),
(174, 24, 3, '2025-01-30 11:04:24', '2025-01-30 11:04:24'),
(175, 24, 4, '2025-01-30 11:04:24', '2025-01-30 11:04:24'),
(176, 24, 5, '2025-01-30 11:04:24', '2025-01-30 11:04:24'),
(177, 24, 6, '2025-01-30 11:04:24', '2025-01-30 11:04:24'),
(178, 24, 7, '2025-01-30 11:04:24', '2025-01-30 11:04:24'),
(179, 24, 8, '2025-01-30 11:04:24', '2025-01-30 11:04:24'),
(180, 25, 1, '2025-01-30 11:05:20', '2025-01-30 11:05:20'),
(181, 25, 2, '2025-01-30 11:05:20', '2025-01-30 11:05:20'),
(182, 25, 3, '2025-01-30 11:05:20', '2025-01-30 11:05:20'),
(183, 25, 4, '2025-01-30 11:05:20', '2025-01-30 11:05:20'),
(184, 25, 5, '2025-01-30 11:05:20', '2025-01-30 11:05:20'),
(185, 25, 6, '2025-01-30 11:05:20', '2025-01-30 11:05:20'),
(186, 25, 7, '2025-01-30 11:05:20', '2025-01-30 11:05:20'),
(187, 25, 8, '2025-01-30 11:05:20', '2025-01-30 11:05:20'),
(196, 26, 1, '2025-01-30 11:41:37', '2025-01-30 11:41:37'),
(197, 26, 2, '2025-01-30 11:41:37', '2025-01-30 11:41:37'),
(198, 26, 3, '2025-01-30 11:41:37', '2025-01-30 11:41:37'),
(199, 26, 4, '2025-01-30 11:41:37', '2025-01-30 11:41:37'),
(200, 26, 5, '2025-01-30 11:41:37', '2025-01-30 11:41:37'),
(201, 26, 6, '2025-01-30 11:41:37', '2025-01-30 11:41:37'),
(202, 26, 7, '2025-01-30 11:41:37', '2025-01-30 11:41:37'),
(203, 26, 8, '2025-01-30 11:41:37', '2025-01-30 11:41:37');

-- --------------------------------------------------------

--
-- Table structure for table `search_saves`
--

DROP TABLE IF EXISTS `search_saves`;
CREATE TABLE IF NOT EXISTS `search_saves` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `search_query` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `search_saves`
--

INSERT INTO `search_saves` (`id`, `user_id`, `title`, `search_query`, `created_at`, `updated_at`) VALUES
(1, 92, 'Excellence', '{\"title\":\"Excellence\",\"type_id\":\"2\",\"min_bed\":\"0\",\"min_bath\":\"0\",\"min_price\":\"300\",\"max_price\":\"8000000\",\"min_size\":\"500\",\"max_size\":\"4500\",\"neighborhood_id\":\"4\",\"city_id\":\"1\",\"listing_status\":\"1\",\"features_id_array\":\"[1,56,91]\",\"sorting\":\"2\"}', '2024-06-14 11:07:05', '2024-06-14 11:07:07');

-- --------------------------------------------------------

--
-- Table structure for table `seos`
--

DROP TABLE IF EXISTS `seos`;
CREATE TABLE IF NOT EXISTS `seos` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `page_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fb_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fb_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fb_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `json_ld_code` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` int NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1' COMMENT '1=Published, 0=Draft',
  `publish_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seos`
--

INSERT INTO `seos` (`id`, `page_name`, `meta_title`, `meta_description`, `meta_keywords`, `fb_image`, `fb_title`, `fb_description`, `twitter_title`, `twitter_description`, `twitter_image`, `json_ld_code`, `author_id`, `status`, `publish_date`, `created_at`, `updated_at`) VALUES
(1, 'home', 'Buy A House in Rosarito | Find Your Dream Home in Mexico', 'Find your dream home in Rosarito, Mexico. Explore beachfront homes, investment properties, and real estate listings in one of Baja California’s most desirable locations.', 'Rosarito real estate, homes for sale in Rosarito, beachfront properties Rosarito, buy a house in Rosarito, Mexico real estate, investment properties Rosarito', 'WhatsApp_Image_2025-01-23_at_20-1738071867.png', 'Buy A House in Rosarito | Beachfront & Investment Properties', 'Discover stunning homes for sale in Rosarito, Mexico. Explore listings of beachfront and investment properties in Baja California.', 'Buy A House in Rosarito – Homes & Investment Properties', 'Looking to buy a house in Rosarito? Browse our listings of beachfront homes and investment properties in Mexico.', 'WhatsApp_Image_2025-01-23_at_20-1738071867.png', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Buy A House in Rosarito | Find Your Dream Home in Mexico\",\r\n  \"description\": \"Find your dream home in Rosarito, Mexico. Explore beachfront homes, investment properties, and real estate listings in one of Baja California’s most desirable locations.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy Home In Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy Home In Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyhomeinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyhomeinrosarito.com/home\"\r\n  }\r\n}', 1, 1, '2025-01-28', '2025-01-28 13:44:27', '2025-01-30 08:45:37'),
(2, 'about', 'About Us | Buy A House in Rosarito', 'Learn more about Buy A House in Rosarito, your trusted real estate resource for finding the best properties in Baja California.', 'about Buy A House in Rosarito, Rosarito real estate experts, Rosarito property services, Baja California real estate agency', 'WhatsApp_Image_2025-01-23_at_20-1738226896.png', 'About Us | Buy A House in Rosarito', 'Get to know the team behind Buy A House in Rosarito. We help buyers find their dream homes in Mexico.', 'About Buy A House in Rosarito', 'Learn about our mission to help homebuyers find the best properties in Rosarito, Mexico.', 'WhatsApp_Image_2025-01-23_at_20-1738226896.png', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"About Us | Buy A House in Rosarito\",\r\n  \"description\": \"Learn more about Buy A House in Rosarito, your trusted real estate resource for finding the best properties in Baja California.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy Home in Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy Home in Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyhomeinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyhomeinrosarito.com/about\"\r\n  }\r\n}', 1, 1, '2025-01-30', '2025-01-30 08:48:16', '2025-01-30 08:48:16'),
(3, 'property', 'Property Listings | Homes for Sale in Rosarito', 'Browse our latest property listings in Rosarito. Find beachfront homes, investment properties, and the best real estate opportunities in Baja California.', 'Rosarito property listings, buy a home in Rosarito, Rosarito houses for sale, Rosarito real estate listings, beachfront properties Rosarito', 'WhatsApp_Image_2025-01-23_at_20-1738226955.png', 'Rosarito Property Listings | Homes for Sale in Mexico', 'Explore our listings of stunning homes and investment properties in Rosarito, Baja California.', 'Property Listings | Buy A House in Rosarito', 'Browse the best real estate listings in Rosarito, including beachfront homes and investment properties.', 'WhatsApp_Image_2025-01-23_at_20-1738226955.png', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Property Listings | Homes for Sale in Rosarito\",\r\n  \"description\": \"Browse our latest property listings in Rosarito. Find beachfront homes, investment properties, and the best real estate opportunities in Baja California.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy Home in Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy Home in Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyhomeinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyhomeinrosarito.com/property\"\r\n  }\r\n}', 1, 1, '2025-01-30', '2025-01-30 08:49:15', '2025-01-30 08:49:15'),
(4, 'blog', 'Rosarito Real Estate Blog | Buying Tips & Market Updates', 'Stay informed with the latest real estate news, buying guides, and market updates for Rosarito, Mexico.', 'Rosarito real estate blog, property investment in Mexico, buying a home in Rosarito, real estate market trends Rosarito', 'WhatsApp_Image_2025-01-23_at_20-1738227003.png', 'Rosarito Real Estate Blog | Buying & Investment Tips', 'Read expert insights on buying property in Rosarito. Stay updated on market trends and investment opportunities.', 'Rosarito Real Estate Blog | Expert Tips & Market Trends', 'Get the latest insights, market trends, and expert advice on buying a home in Rosarito.', 'WhatsApp_Image_2025-01-23_at_20-1738227003.png', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Rosarito Real Estate Blog | Buying Tips & Market Updates\",\r\n  \"description\": \"Stay informed with the latest real estate news, buying guides, and market updates for Rosarito, Mexico.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy Home in Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy Home in Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyhomeinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyhomeinrosarito.com/blog\"\r\n  }\r\n}', 1, 1, '2025-01-30', '2025-01-30 08:50:03', '2025-01-30 08:50:03'),
(5, 'faq', 'FAQs | Buy A House in Rosarito', 'Get answers to frequently asked questions about buying a house in Rosarito, Mexico, and learn more about real estate processes and legalities.', 'Rosarito home buying FAQs, real estate questions Rosarito, buying a house in Mexico, property investment questions', 'WhatsApp_Image_2025-01-23_at_20-1738227059.png', 'FAQs | Buying Property in Rosarito', 'Have questions about buying a house in Rosarito? Find answers to common real estate inquiries.', 'FAQs | Buy A House in Rosarito', 'Get answers to the most frequently asked questions about Rosarito real estate and home buying.', 'WhatsApp_Image_2025-01-23_at_20-1738227059.png', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"FAQs | Buy A House in Rosarito\",\r\n  \"description\": \"Get answers to frequently asked questions about buying a house in Rosarito, Mexico, and learn more about real estate processes and legalities.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy Home in Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy Home in Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyhomeinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyhomeinrosarito.com/faq\"\r\n  }\r\n}', 1, 1, '2025-01-30', '2025-01-30 08:50:59', '2025-01-30 08:50:59'),
(6, 'contact', 'Contact Us | Buy A House in Rosarito', 'Contact Buy A House in Rosarito for expert advice on buying a home in Mexico. Our team is here to assist with your real estate needs.', 'contact Rosarito real estate agents, Buy A House in Rosarito contact, real estate inquiries Rosarito', 'WhatsApp_Image_2025-01-23_at_20-1738227109.png', 'Contact Buy A House in Rosarito | Real Estate Experts', 'Need help buying a home in Rosarito? Contact our real estate team for expert assistance.', 'Contact Buy A House in Rosarito', 'Have questions about buying a home in Rosarito? Get in touch with our expert real estate team today.', 'WhatsApp_Image_2025-01-23_at_20-1738227109.png', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"Contact Us | Buy A House in Rosarito\",\r\n  \"description\": \"Contact Buy A House in Rosarito for expert advice on buying a home in Mexico. Our team is here to assist with your real estate needs.\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Buy Home in Rosarito\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Buy Home in Rosarito\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://buyhomeinrosarito.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-30\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://buyhomeinrosarito.com/contact\"\r\n  }\r\n}', 1, 1, '2025-01-30', '2025-01-30 08:51:49', '2025-01-30 08:51:49');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `meta_tag` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `meta_key` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `meta_value` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `meta_tag`, `meta_key`, `meta_value`) VALUES
(1, 'project', 'site_title', 'Buy A House in Rosarito'),
(2, 'project', 'short_site_title', 'BHR'),
(3, 'project', 'site_logo', 'logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `content`, `designation`, `location`, `image`, `created_at`, `updated_at`) VALUES
(1, 'John Smith', 'I\'m thrilled with the apartment I bought through your agency. The location is perfect, and the process was smooth from start to finish.', 'Software Engineer', 'New York, USA', '1718272933.jpg', '2024-06-13 10:02:13', '2024-06-13 10:02:13'),
(2, 'Michael Johnson', 'I\'m impressed with the level of professionalism and dedication shown by your real estate agents. They made the buying process stress-free.', 'Accountant', 'Sydney, Australia', '1718273068.jpg', '2024-06-13 10:04:28', '2024-06-13 10:04:28'),
(3, 'David Lee', 'Your team understood my specific needs as a buyer. They were able to find me a property that exceeded my expectations.', 'Architect', 'San Francisco, USA', '1718273105.jpg', '2024-06-13 10:05:05', '2024-06-13 10:05:05'),
(4, 'Alexandre Silva', 'Estou muito satisfeito com a minha nova casa em São Paulo. Obrigado pela atenção e suporte durante todo o processo de compra.', 'Business Owner', 'São Paulo, Brazil', '1718273140.jpg', '2024-06-13 10:05:40', '2024-06-13 10:05:40'),
(5, 'Hiroshi Tanaka', '東京での私の新しい家についてあなたの助けに感謝しています。あなたのチームの専門知識とサポートに感謝します', 'Engineer', 'Tokyo, Japan', '1718273207.jpg', '2024-06-13 10:06:47', '2024-06-13 10:06:47'),
(6, 'Sophie MüllerDesigner', 'Vielen Dank für die Hilfe bei der Suche nach meiner neuen Wohnung in Berlin. Ich bin sehr zufrieden mit der Immobilie und dem Service', 'Designer', 'Berlin, Germany', '1718273260.jpg', '2024-06-13 10:07:40', '2024-06-13 10:07:40'),
(7, 'Mark Johnson', 'I want to thank your team for finding me the perfect home in Chicago. Your knowledge and dedication were exceptional', 'Doctor', 'Chicago, USA', '1718273298.jpg', '2024-06-13 10:08:18', '2024-06-13 10:08:18'),
(8, 'Juan Pérez', 'Estoy muy contento con la casa que compré gracias a su agencia. El proceso fue eficiente y la atención personalizada fue excelente.', 'Lawyer', 'Mexico City, Mexico', '1718273363.jpg', '2024-06-13 10:09:23', '2024-06-13 10:09:23'),
(9, 'Andreas Schmidt', 'Herzlichen Dank für die Unterstützung bei der Suche nach meinem neuen Zuhause in München. Ich bin mit Ihrer Dienstleistung sehr zufrieden.', 'Manager', 'Munich, Germany', '1718273398.jpg', '2024-06-13 10:09:58', '2024-06-13 10:09:58'),
(10, 'Mateo Rodriguez', 'Quiero expresar mi gratitud por haberme ayudado a encontrar el lugar perfecto para vivir en Buenos Aires. Su profesionalismo fue clave.', 'Artist', 'Buenos Aires, Argentina', '1718273791.jpg', '2024-06-13 10:16:31', '2024-06-13 10:16:31');

-- --------------------------------------------------------

--
-- Table structure for table `tour_bookings`
--

DROP TABLE IF EXISTS `tour_bookings`;
CREATE TABLE IF NOT EXISTS `tour_bookings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` tinyint NOT NULL DEFAULT '1' COMMENT '1: in person, 2: virtual',
  `property_id` bigint UNSIGNED DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

DROP TABLE IF EXISTS `types`;
CREATE TABLE IF NOT EXISTS `types` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1' COMMENT '0: Inactive, 1: Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `title`, `slug`, `banner`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Condo', 'condo', '1718264139.jpg', 1, '2024-06-13 07:35:39', '2024-06-13 07:35:39'),
(2, 'Houses', 'houses', '1718264155.jpg', 1, '2024-06-13 07:35:55', '2024-06-13 07:35:55'),
(3, 'Villas', 'villas', '1718264171.jpg', 1, '2024-06-13 07:36:11', '2024-06-13 07:36:11'),
(4, 'Apartments', 'apartments', '1718264187.jpg', 1, '2024-06-13 07:36:27', '2024-06-13 07:36:27'),
(5, 'Warehouses', 'warehouses', '1737641704.jpg', 1, '2024-06-13 07:36:46', '2025-01-23 14:15:04'),
(6, 'Beach houses', 'beach-houses', '1718264236.jpg', 1, '2024-06-13 07:37:16', '2024-06-13 07:37:16'),
(7, 'Mountain cabins', 'mountain-cabins', '1718264255.jpg', 1, '2024-06-13 07:37:35', '2024-06-13 07:37:35'),
(8, 'Luxury Homes', 'luxury-homes', '1718264270.jpg', 1, '2024-06-13 07:37:50', '2025-01-27 13:02:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone_no` varchar(255) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT 'user.png',
  `status` tinyint NOT NULL DEFAULT '1' COMMENT '0=inactive or del by user, 1=active',
  `is_blocked` tinyint NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=104 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `phone_no`, `image_name`, `status`, `is_blocked`, `created_at`, `updated_at`) VALUES
(92, 'John', 'Doe', 'john@gmail.com', '$2y$12$A1kHkTc5TnFL7swEQMr/KuUvw5jkP7OnoHV.xxe.7Wyg2sGvyIJ9i', '+923394008600', 'user.png', 1, 0, '2023-12-29 09:49:14', '2024-06-14 11:03:51'),
(100, 'John', 'Watson', 'johnwatson@gmail.com', '$2y$12$tVVuRZbLZAv36sWQBectvOcVUrNpsaFfvGKsHK4GJITmvcO/JUGwq', '+1456712347', '1718180371.webp', 0, 0, '2024-06-12 08:09:41', '2024-06-14 11:03:47'),
(101, 'Robert', 'Cruise', 'roberto@gmail.com', '$2y$12$nOP33WByv2lrV9e1cd.KoulYrwBFMwea1pSyvMQ.RO4VQqcFOgKMW', '+123456778', 'user.png', 0, 0, '2025-01-22 05:51:02', '2025-01-22 05:51:02'),
(102, 'we', 'qwer', 'werq', '$2y$12$TG6lB8ZcsKsqNqntXT6T2e5Q1Rtyts9rdKhOlTkUvsdUTJwIQiqTK', '', 'user.png', 0, 0, '2025-01-29 05:47:46', '2025-01-29 05:47:46');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `properties_neighborhood_id_foreign` FOREIGN KEY (`neighborhood_id`) REFERENCES `neighborhoods` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `property_features`
--
ALTER TABLE `property_features`
  ADD CONSTRAINT `property_features_feature_id_foreign` FOREIGN KEY (`feature_id`) REFERENCES `features` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `property_features_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `property_types`
--
ALTER TABLE `property_types`
  ADD CONSTRAINT `property_types_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `property_types_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
