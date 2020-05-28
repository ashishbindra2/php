-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2020 at 10:04 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `rid` int(11) NOT NULL,
  `name` varchar(66) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `choose` varchar(111) NOT NULL,
  `comment` text NOT NULL,
  `university` varchar(255) NOT NULL,
  `details` varchar(121) NOT NULL,
  `password` varchar(202) NOT NULL,
  `status` int(55) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`rid`, `name`, `email`, `mobile`, `choose`, `comment`, `university`, `details`, `password`, `status`) VALUES
(12, 'ashish', 'ashishbindra5442@gmail.com', '9041213440', 'Action', 'asd', 'pup', 'asd', '$2y$10$T9oG5TsA17HBpZFcu3yfn.Xf7iLxaa5Ol54jb29C97gLn6.nVtUXq', 0),
(13, 'ashish', 'ashishbi2@gmail.com', '2147483647', 'Action', 'asd', 'sd', 'asd', '$2y$10$ZxocFqal4WUPMPmrPu3dduiFPwuQqY0QmB/fp4z3yZiTTQBgyZH6m', 0),
(14, 'ashish', 'ashis42@gmail.com', '2147483647', 'Feedback', 'asd', 'sd', 'asd', '$2y$10$LttiieDt4gAVmwqfi6rzVOVpoH/DF6iZ5IZHwI0SSFn/ZlT7ymjTe', 0),
(15, 'ashish', 'ashishbindra5442@gmail.com', '2147483647', 'Complaint', 'asd', 'sd', 'asd', '$2y$10$W1X3pOfCXfPvPEnYOA382O4kKLrGS907WPAsbmwsACuWz8zoyOMBu', 0),
(16, 'ashish', 'ashishbindra5442@gmail.com', '2147483647', 'Complaint', 'asd', 'sd', 'asd', '$2y$10$NPtCCXMlZZoeQEwkxzA7FegV8XvOTHv7.lNGSeZxVghqzQsgAFyNO', 0),
(17, 'ashish', 'ashishbindra5442@gmail.com', '2147483647', 'Complaint', 'asd', 'sd', 'asd', '$2y$10$W1X3pOfCXfPvPEnYOA382O4kKLrGS907WPAsbmwsACuWz8zoyOMBu', 0),
(18, 'ashish', 'ashishbindra5442@gmail.com', '2147483647', 'Complaint', 'asd', 'sd', 'asd', '$2y$10$W1X3pOfCXfPvPEnYOA382O4kKLrGS907WPAsbmwsACuWz8zoyOMBu', 0),
(19, 'ashish', 'ashishbindra5442@gmail.com', '2147483647', 'Complaint', 'asd', 'sd', 'asd', '$2y$10$W1X3pOfCXfPvPEnYOA382O4kKLrGS907WPAsbmwsACuWz8zoyOMBu', 0),
(20, 'Ashish Bindra', 'ashishbindra5442@gmail.com', '9041213440', 'Feedback', 'sadas', 'sd', 'sdf', '$2y$10$w25Rc282GOx1S3nxJhHvUuQ1ZNocs9be/EBZPocroTFvqhCSTZDmq', 0),
(21, 'Ashish Bindra', 'ashishbindra5442@gmail.com', '9041213440', 'Action', 'asdsa', 'sfd', 'sd', '$2y$10$NGAc0D5nz1mo3RKLKRuIgem4pwZ5IpXENP6GgVBXHJWamaJaxRXju', 0),
(22, 'Ashish Bindra', 'ashishbindra5442@gmail.com', '9041213440', 'Action', 'as', 'sa', 'as', '$2y$10$1G8zAlaVe9RzT0rGBJeF.uZ1w6Uouci6BpMDHGM63qyAvkVVpxWka', 0),
(23, 'Ashish Bindra', 'ashishbindra5442@gmail.com', '9041213440', 'Complaint', 'nhn', 'pup', '1234567', '$2y$10$1nTRCZZpXSEgLgQDCNx/muq7TaQei30WEPQx.zLo27p2PZ9W0JK0.', 0),
(24, 'Ashish Bindra', 'ashishbindra5442@gmail.com', '9041213440', 'Complaint', ',,', 'Legal Initiative', '1234567', '$2y$10$sG5P3o0sawatkxerxcMde.URTkdtCTsxHKg7VcEWXWwYeaRFkp.Cy', 0),
(25, 'Ashish Bindra', 'ashishbindra5442@gmail.com', '9041213440', 'Action', 'asd', 'sd', 'sd', '$2y$10$HyxCdUdYeOJDdc4iPo62OOpvgCD/ctj9Jz9fZU8ttDmmJndJHjGVG', 0),
(26, 'Ashish Bindra', 'ashishbindra5442@gmail.com', '9041213440', 'Action', 'mm', 'pup', 'sd', '$2y$10$xxLF8AkRpJDxDaknRILOluhHLbvRgDgWD2KtM2/.LGlW.D0H7QYGK', 0),
(27, 'Ashish Bindra', 'ashishbindra5442@gmail.com', '9041213440', 'Action', 'mm', 'pup', 'sd', '$2y$10$YNl6qV2BecQ.DRgrGkpvbu75cFEbKHqeQ56O/JlOBQahygXMADQpi', 0),
(28, 'Ashish Bindra', 'ashishbindra5442@gmail.com', '9041213440', 'Action', 'jhgjh', 'klihjl', 'n', '$2y$10$z5RilSYFmbUrq48HtgjHMeFkQH2bj8QIXz5D./.TQ6Yqd8uHf6Cqq', 0),
(29, 'Ashish Bindra', 'ashishbindra5442@gmail.com', '9041213440', 'New Buyer', 'dgv', 'Legal Initiative', 'sd', '$2y$10$3dxNwQ5ExJsjSiyAxvLlHur1RAyFhBGRM.rmQRslL8rKVGDx0m24O', 0),
(30, 'Ashish Bindra', 'ashishbindra5442@gmail.com', '9041213440', 'New Buyer', 'mm', 'pup', 'sd', '$2y$10$eMxKojS2XIbH1T6ryQDW2u62RMRZhtRWhNom/nxUlo0blNjxeBwRW', 0),
(31, 'Ashish Bindra', 'ashishbindra5442@gmail.com', '9041213440', 'Action', 'n', 'Legal Initiative', '1234567', '$2y$10$GCTnNvwsF5vnHD9OttbCcOsSq.2TPIFrze2Geh73wZc6gLAZVLp.u', 0),
(32, 'Ashish Bindra', 'ashishbindra5442@gmail.com', '9041213440', 'New Buyer', ',.', 'Legal Initiative', ',', '$2y$10$5pKdFYN.3s4xbS0nxG5PrOQKNDdlKCAHYFcP3q3Ef7.iKKPXozViC', 0),
(33, 'Ashish Bindra', 'ashishbindra5442@gmail.com', '9041213440', 'Action', ';.&amp;#39;.', 'Legal Initiative', '1234567', '$2y$10$8.3TjsZB.WgthZZnl/hWWebUh/pMulPvVWOdLFN8OT3S9k.Fc4ccy', 0),
(34, 'Ashish Bindra', 'ashishbindra5442@gmail.com', '9041213440', 'New Buyer', 'as', 'as', 'as', '$2y$10$AzevRkhgMpQ60riLnjiVMeoiIJ.YBKvEoKrTInLhaHGPuBzgSNt7C', 0),
(35, 'Ashish Bindra', 'ashishbindra5442@gmail.com', '9041213440', 'Complaint', 'asd', 'as', 'as', '$2y$10$Ve0CwS6mvBfYPq4gF7m1QOAoo3a5L2V5SL/FxjLHHEy2QxPZZhQT2', 0),
(36, 'Ashish Bindra', 'ashishbindra5442@gmail.com', '9041213440', 'New Buyer', 'sa', 'pup', '1234567', '$2y$10$aY9zvbBY7JHWH00ul/bZ/eE0MnwpVsPC2JM/Mf0Yr4BBNCWAse.My', 0),
(37, 'Ashish Bindra', 'ashishbindra5442@gmail.com', '9041213440', 'New Buyer', 'ashish', 'asjos', 'aso', '$2y$10$0B2/s7oqTZSBdiMQjVuVk.M4wnleFVVuKKBkOOMdSLzJwkzFp8GpK', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`rid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
