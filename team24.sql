CREATE DATABASE IF NOT EXISTS `project` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `project`;

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for afspraak
-- ----------------------------
DROP TABLE IF EXISTS `afspraak`;
CREATE TABLE `afspraak`  (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `studentId` int(50) NULL DEFAULT NULL,
  `docentId` int(50) NULL DEFAULT NULL,
  `lokaalId` int(50) NOT NULL,
  `tijdslot` datetime(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `studentId`(`studentId`) USING BTREE,
  INDEX `docentId`(`docentId`) USING BTREE,
  INDEX `lokaalId`(`lokaalId`) USING BTREE,
  CONSTRAINT `afspraak_ibfk_4` FOREIGN KEY (`docentId`) REFERENCES `gebruiker` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `afspraak_ibfk_5` FOREIGN KEY (`studentId`) REFERENCES `gebruiker` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `afspraak_ibfk_6` FOREIGN KEY (`lokaalId`) REFERENCES `lokaal` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for gebruiker
-- ----------------------------
DROP TABLE IF EXISTS `gebruiker`;
CREATE TABLE `gebruiker`  (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `gebruikertypeId` int(50) NOT NULL,
  `klasId` int(50) NULL DEFAULT NULL,
  `trajectId` int(50) NULL DEFAULT NULL,
  `afspraakId` int(50) NULL DEFAULT NULL,
  `voornaam` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `achternaam` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `paswoord` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `gebruikertypeId`(`gebruikertypeId`) USING BTREE,
  INDEX `klasId`(`klasId`) USING BTREE,
  INDEX `trajectId`(`trajectId`) USING BTREE,
  INDEX `afspraakId`(`afspraakId`) USING BTREE,
  CONSTRAINT `gebruiker_ibfk_3` FOREIGN KEY (`trajectId`) REFERENCES `traject` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `gebruiker_ibfk_5` FOREIGN KEY (`klasId`) REFERENCES `klas` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `gebruiker_ibfk_6` FOREIGN KEY (`gebruikertypeId`) REFERENCES `gebruikertype` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `gebruiker_ibfk_7` FOREIGN KEY (`trajectId`) REFERENCES `traject` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of gebruiker
-- ----------------------------
INSERT INTO `gebruiker` VALUES (1, 1, 1162, NULL, NULL, 'student', '', 'student@student.thomasmore.be', '$2y$10$mA.zxi.HHmms37m.7jMbReLLxprF0QxjvGAxC6PClG8/j0gbnZdhO');
INSERT INTO `gebruiker` VALUES (2, 2, 1162, NULL, NULL, 'docent', '', 'docent@docent.thomasmore.be', '$2y$10$at02OHrl0hae630baexpQelVzB7tCtuiWAWOBN/4ZpYvdeb9rcJdO');
INSERT INTO `gebruiker` VALUES (3, 3, 1162, NULL, NULL, 'isp', '', 'isp@isp.thomasmore.be', '$2y$10$3o47tu.GlfVCB8pnVaIgoeGdEgUYBwqArkcXfdl40VXnh2nIRaTpO');
INSERT INTO `gebruiker` VALUES (4, 2, 1173, NULL, NULL, 'War', 'Op de Beeck', 'r0709145@student.thomasmore.be', '$2y$10$YHt6uKYFJm3x5D22uJtfZe0OqBIqpZGLLejQZXtQzZ1Y1LkZEjNwG');
INSERT INTO `gebruiker` VALUES (5, 1, 1173, NULL, NULL, 'Thomas', 'Dergent', 'r0699038@student.thomasmore.be', '$2y$10$kpMzFOLnEAUXRKI0yHB3G..drQs1/bpPQl2AVyIAa5wdhfEXb.922');
INSERT INTO `gebruiker` VALUES (6, 1, 1173, NULL, NULL, 'Raf', 'Van Elst', 'r0695265@student.thomasmore.be', '$2y$10$zCNqLiJjeYdZQbhGKNh94u7GGhGZxVhpHyrSPUbx1Uvj6OVE3wtXu');
INSERT INTO `gebruiker` VALUES (7, 3, 1173, NULL, NULL, 'Melih', 'Doksanbir', 'r0720857@student.thomasmore.be', '$2y$10$70MgO/PYKo8ehmQoHjer4uoaNVriUGqSgD0krJaOynIWaarC5FFo2');
INSERT INTO `gebruiker` VALUES (8, 1, 1173, NULL, NULL, 'Simon', 'Smedts', 'r0695798@student.thomasmore.be', '$2y$10$3gAFKTTlIEi5LmqO83f2quUe33ot8LfSVRW8N14YTDfT4EgK41wIu');
INSERT INTO `gebruiker` VALUES (9, 4, 1162, NULL, NULL, 'opleidingsmanager', '', 'opleidingsmanager@opleidingsmanager.thomasmore.be', '$2y$10$baSCn6l.FKBS8jJG6bGUL.hxb33sFJVikvO5BvtZZMDK.jRVabxGy');

-- ----------------------------
-- Table structure for gebruiker_lesmoment
-- ----------------------------
DROP TABLE IF EXISTS `gebruiker_lesmoment`;
CREATE TABLE `gebruiker_lesmoment`  (
  `id` int(50) NOT NULL,
  `gebruikerId` int(50) NOT NULL,
  `lesmomentId` int(50) NOT NULL,
  `naam` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  INDEX `gebruikerId`(`gebruikerId`) USING BTREE,
  INDEX `lesmomentId`(`lesmomentId`) USING BTREE,
  CONSTRAINT `gebruiker_lesmoment_ibfk_3` FOREIGN KEY (`gebruikerId`) REFERENCES `gebruiker` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `gebruiker_lesmoment_ibfk_4` FOREIGN KEY (`lesmomentId`) REFERENCES `lesmoment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

INSERT INTO `gebruiker_lesmoment` VALUES (1, 4, 2220, '');
INSERT INTO `gebruiker_lesmoment` VALUES (2, 5, 2221, '');
INSERT INTO `gebruiker_lesmoment` VALUES (3, 6, 2222, '');
INSERT INTO `gebruiker_lesmoment` VALUES (4, 7, 2223, '');
INSERT INTO `gebruiker_lesmoment` VALUES (5, 8, 2224, '');
INSERT INTO `gebruiker_lesmoment` VALUES (6, 9, 2225, '');
INSERT INTO `gebruiker_lesmoment` VALUES (7, 3, 2226, '');
INSERT INTO `gebruiker_lesmoment` VALUES (8, 2, 2227, '');
INSERT INTO `gebruiker_lesmoment` VALUES (9, 1, 2228, '');

-- ----------------------------
-- Table structure for gebruikertype
-- ----------------------------
DROP TABLE IF EXISTS `gebruikertype`;
CREATE TABLE `gebruikertype`  (
  `id` int(50) NOT NULL,
  `beschrijving` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of gebruikertype
-- ----------------------------
INSERT INTO `gebruikertype` VALUES (1, 'student');
INSERT INTO `gebruikertype` VALUES (2, 'docent');
INSERT INTO `gebruikertype` VALUES (3, 'isp');
INSERT INTO `gebruikertype` VALUES (4, 'opleidingsmanager');

-- ----------------------------
-- Table structure for klas
-- ----------------------------
DROP TABLE IF EXISTS `klas`;
CREATE TABLE `klas`  (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `naam` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `maxAantal` int(50) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1178 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of klas
-- ----------------------------
INSERT INTO `klas` VALUES (1155, '1 ITF A', 25);
INSERT INTO `klas` VALUES (1156, '1 ITF B', 25);
INSERT INTO `klas` VALUES (1157, '1 ITF C', 25);
INSERT INTO `klas` VALUES (1158, '1 ITF D', 25);
INSERT INTO `klas` VALUES (1159, '1 ITF E', 25);
INSERT INTO `klas` VALUES (1160, '1 ITF F', 25);
INSERT INTO `klas` VALUES (1161, '1 ITF G', 25);
INSERT INTO `klas` VALUES (1162, '1 ITF H', 25);
INSERT INTO `klas` VALUES (1163, '2 ITF A', 25);
INSERT INTO `klas` VALUES (1164, '2 ITF B', 25);
INSERT INTO `klas` VALUES (1165, '2 ITF C', 25);
INSERT INTO `klas` VALUES (1166, '2 ITF D', 25);
INSERT INTO `klas` VALUES (1167, '3 APP A', 25);
INSERT INTO `klas` VALUES (1168, '3 APP B', 25);
INSERT INTO `klas` VALUES (1169, '3 BI', 25);
INSERT INTO `klas` VALUES (1170, '3 IOT', 25);
INSERT INTO `klas` VALUES (1171, '3 CCS', 25);
INSERT INTO `klas` VALUES (1172, '2 APP-BI A', 25);
INSERT INTO `klas` VALUES (1173, '2 APP-BI B', 25);
INSERT INTO `klas` VALUES (1174, '2 IOT', 25);
INSERT INTO `klas` VALUES (1175, '2 CCS A', 25);
INSERT INTO `klas` VALUES (1176, '2 CCS B', 25);
INSERT INTO `klas` VALUES (1177, '', 25);

-- ----------------------------
-- Table structure for lesmoment
-- ----------------------------
DROP TABLE IF EXISTS `lesmoment`;
CREATE TABLE `lesmoment`  (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `klasId` int(50) NULL DEFAULT NULL,
  `vakId` int(50) NULL DEFAULT NULL,
  `weekdag` int(1) NOT NULL,
  `lesblok` int(50) NOT NULL,
  `maxAantal` int(50) NOT NULL,
  `semester` int(1) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `klasId`(`klasId`) USING BTREE,
  INDEX `vakId`(`vakId`) USING BTREE,
  CONSTRAINT `lesmoment_ibfk_4` FOREIGN KEY (`klasId`) REFERENCES `klas` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `lesmoment_ibfk_5` FOREIGN KEY (`vakId`) REFERENCES `vak` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2656 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lesmoment
-- ----------------------------
INSERT INTO `lesmoment` VALUES (2216, 1155, 214, 0, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2217, 1155, 214, 0, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2218, 1155, 215, 0, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2219, 1155, 216, 1, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2220, 1155, 216, 1, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2221, 1155, 217, 1, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2222, 1155, 217, 1, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2223, 1155, 218, 2, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2224, 1155, 218, 2, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2225, 1155, 219, 2, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2226, 1155, 219, 2, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2227, 1155, 214, 3, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2228, 1155, 214, 3, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2229, 1155, 220, 4, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2230, 1155, 220, 4, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2231, 1155, 221, 0, 1, 25, 2);
INSERT INTO `lesmoment` VALUES (2232, 1155, 221, 0, 2, 25, 2);
INSERT INTO `lesmoment` VALUES (2233, 1155, 222, 0, 3, 25, 2);
INSERT INTO `lesmoment` VALUES (2234, 1155, 223, 1, 1, 25, 2);
INSERT INTO `lesmoment` VALUES (2235, 1155, 223, 1, 2, 25, 2);
INSERT INTO `lesmoment` VALUES (2236, 1155, 217, 1, 3, 25, 2);
INSERT INTO `lesmoment` VALUES (2237, 1155, 217, 1, 4, 25, 2);
INSERT INTO `lesmoment` VALUES (2238, 1155, 224, 2, 3, 25, 2);
INSERT INTO `lesmoment` VALUES (2239, 1155, 224, 2, 4, 25, 2);
INSERT INTO `lesmoment` VALUES (2240, 1155, 225, 3, 1, 25, 2);
INSERT INTO `lesmoment` VALUES (2241, 1155, 225, 3, 2, 25, 2);
INSERT INTO `lesmoment` VALUES (2242, 1155, 226, 3, 3, 25, 2);
INSERT INTO `lesmoment` VALUES (2243, 1155, 227, 4, 1, 25, 2);
INSERT INTO `lesmoment` VALUES (2244, 1155, 227, 4, 2, 25, 2);
INSERT INTO `lesmoment` VALUES (2245, 1155, 226, 4, 3, 25, 2);
INSERT INTO `lesmoment` VALUES (2246, 1156, 214, 0, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2247, 1156, 214, 0, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2248, 1156, 228, 0, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2249, 1156, 228, 0, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2250, 1156, 214, 1, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2251, 1156, 214, 1, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2252, 1156, 217, 1, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2253, 1156, 217, 1, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2254, 1156, 220, 2, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2255, 1156, 220, 2, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2256, 1156, 218, 3, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2257, 1156, 218, 3, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2258, 1156, 215, 4, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2259, 1156, 216, 4, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2260, 1156, 216, 4, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2261, 1156, 225, 0, 1, 25, 2);
INSERT INTO `lesmoment` VALUES (2262, 1156, 225, 0, 2, 25, 2);
INSERT INTO `lesmoment` VALUES (2263, 1156, 221, 0, 3, 25, 2);
INSERT INTO `lesmoment` VALUES (2264, 1156, 221, 0, 4, 25, 2);
INSERT INTO `lesmoment` VALUES (2265, 1156, 226, 1, 1, 25, 2);
INSERT INTO `lesmoment` VALUES (2266, 1156, 222, 1, 2, 25, 2);
INSERT INTO `lesmoment` VALUES (2267, 1156, 217, 1, 3, 25, 2);
INSERT INTO `lesmoment` VALUES (2268, 1156, 217, 1, 4, 25, 2);
INSERT INTO `lesmoment` VALUES (2269, 1156, 229, 2, 3, 25, 2);
INSERT INTO `lesmoment` VALUES (2270, 1156, 229, 2, 4, 25, 2);
INSERT INTO `lesmoment` VALUES (2271, 1156, 223, 3, 1, 25, 2);
INSERT INTO `lesmoment` VALUES (2272, 1156, 223, 3, 2, 25, 2);
INSERT INTO `lesmoment` VALUES (2273, 1156, 226, 4, 2, 25, 2);
INSERT INTO `lesmoment` VALUES (2274, 1156, 224, 4, 3, 25, 2);
INSERT INTO `lesmoment` VALUES (2275, 1156, 224, 4, 4, 25, 2);
INSERT INTO `lesmoment` VALUES (2276, 1157, 214, 0, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2277, 1157, 214, 0, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2278, 1157, 219, 0, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2279, 1157, 219, 0, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2280, 1157, 218, 1, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2281, 1157, 218, 1, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2282, 1157, 217, 1, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2283, 1157, 217, 1, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2284, 1157, 220, 2, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2285, 1157, 220, 2, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2286, 1157, 215, 2, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2287, 1157, 216, 3, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2288, 1157, 216, 3, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2289, 1157, 214, 4, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2290, 1157, 214, 4, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2291, 1157, 224, 0, 1, 25, 2);
INSERT INTO `lesmoment` VALUES (2292, 1157, 224, 0, 2, 25, 2);
INSERT INTO `lesmoment` VALUES (2293, 1157, 222, 1, 1, 25, 2);
INSERT INTO `lesmoment` VALUES (2294, 1157, 226, 1, 2, 25, 2);
INSERT INTO `lesmoment` VALUES (2295, 1157, 217, 1, 3, 25, 2);
INSERT INTO `lesmoment` VALUES (2296, 1157, 217, 1, 4, 25, 2);
INSERT INTO `lesmoment` VALUES (2297, 1157, 229, 2, 2, 25, 2);
INSERT INTO `lesmoment` VALUES (2298, 1157, 229, 2, 3, 25, 2);
INSERT INTO `lesmoment` VALUES (2299, 1157, 226, 3, 2, 25, 2);
INSERT INTO `lesmoment` VALUES (2300, 1157, 225, 3, 3, 25, 2);
INSERT INTO `lesmoment` VALUES (2301, 1157, 225, 3, 4, 25, 2);
INSERT INTO `lesmoment` VALUES (2302, 1157, 221, 4, 1, 25, 2);
INSERT INTO `lesmoment` VALUES (2303, 1157, 221, 4, 2, 25, 2);
INSERT INTO `lesmoment` VALUES (2304, 1157, 223, 4, 3, 25, 2);
INSERT INTO `lesmoment` VALUES (2305, 1157, 223, 4, 4, 25, 2);
INSERT INTO `lesmoment` VALUES (2306, 1158, 215, 0, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2307, 1158, 214, 0, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2308, 1158, 214, 0, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2309, 1158, 216, 1, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2310, 1158, 216, 1, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2311, 1158, 217, 1, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2312, 1158, 217, 1, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2313, 1158, 219, 2, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2314, 1158, 219, 2, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2315, 1158, 220, 3, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2316, 1158, 220, 3, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2317, 1158, 218, 3, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2318, 1158, 218, 3, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2319, 1158, 214, 4, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2320, 1158, 214, 4, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2321, 1158, 222, 0, 2, 25, 2);
INSERT INTO `lesmoment` VALUES (2322, 1158, 229, 0, 3, 25, 2);
INSERT INTO `lesmoment` VALUES (2323, 1158, 229, 0, 4, 25, 2);
INSERT INTO `lesmoment` VALUES (2324, 1158, 223, 1, 1, 25, 2);
INSERT INTO `lesmoment` VALUES (2325, 1158, 223, 1, 2, 25, 2);
INSERT INTO `lesmoment` VALUES (2326, 1158, 226, 2, 1, 25, 2);
INSERT INTO `lesmoment` VALUES (2327, 1158, 225, 2, 3, 25, 2);
INSERT INTO `lesmoment` VALUES (2328, 1158, 225, 2, 4, 25, 2);
INSERT INTO `lesmoment` VALUES (2329, 1158, 221, 3, 3, 25, 2);
INSERT INTO `lesmoment` VALUES (2330, 1158, 221, 3, 4, 25, 2);
INSERT INTO `lesmoment` VALUES (2331, 1158, 224, 4, 1, 25, 2);
INSERT INTO `lesmoment` VALUES (2332, 1158, 224, 4, 2, 25, 2);
INSERT INTO `lesmoment` VALUES (2333, 1158, 217, 4, 3, 25, 2);
INSERT INTO `lesmoment` VALUES (2334, 1158, 217, 4, 4, 25, 2);
INSERT INTO `lesmoment` VALUES (2335, 1159, 214, 0, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2336, 1159, 214, 0, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2337, 1159, 214, 1, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2338, 1159, 214, 1, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2339, 1159, 215, 2, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2340, 1159, 228, 2, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2341, 1159, 228, 2, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2342, 1159, 216, 3, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2343, 1159, 216, 3, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2344, 1159, 220, 3, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2345, 1159, 220, 3, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2346, 1159, 218, 4, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2347, 1159, 218, 4, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2348, 1159, 217, 4, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2349, 1159, 217, 4, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2350, 1159, 226, 0, 1, 25, 2);
INSERT INTO `lesmoment` VALUES (2351, 1159, 225, 1, 1, 25, 2);
INSERT INTO `lesmoment` VALUES (2352, 1159, 225, 1, 2, 25, 2);
INSERT INTO `lesmoment` VALUES (2353, 1159, 222, 2, 3, 25, 2);
INSERT INTO `lesmoment` VALUES (2354, 1159, 221, 2, 4, 25, 2);
INSERT INTO `lesmoment` VALUES (2355, 1159, 221, 2, 5, 25, 2);
INSERT INTO `lesmoment` VALUES (2356, 1159, 224, 3, 1, 25, 2);
INSERT INTO `lesmoment` VALUES (2357, 1159, 224, 3, 2, 25, 2);
INSERT INTO `lesmoment` VALUES (2358, 1159, 223, 3, 3, 25, 2);
INSERT INTO `lesmoment` VALUES (2359, 1159, 223, 3, 4, 25, 2);
INSERT INTO `lesmoment` VALUES (2360, 1159, 229, 4, 1, 25, 2);
INSERT INTO `lesmoment` VALUES (2361, 1159, 229, 4, 2, 25, 2);
INSERT INTO `lesmoment` VALUES (2362, 1159, 217, 4, 3, 25, 2);
INSERT INTO `lesmoment` VALUES (2363, 1159, 217, 4, 4, 25, 2);
INSERT INTO `lesmoment` VALUES (2364, 1160, 215, 0, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2365, 1160, 214, 0, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2366, 1160, 214, 0, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2367, 1160, 214, 1, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2368, 1160, 214, 1, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2369, 1160, 218, 2, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2370, 1160, 218, 2, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2371, 1160, 216, 2, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2372, 1160, 216, 2, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2373, 1160, 230, 3, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2374, 1160, 230, 3, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2375, 1160, 220, 4, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2376, 1160, 220, 4, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2377, 1160, 217, 4, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2378, 1160, 217, 4, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2379, 1160, 225, 0, 1, 25, 2);
INSERT INTO `lesmoment` VALUES (2380, 1160, 225, 0, 2, 25, 2);
INSERT INTO `lesmoment` VALUES (2381, 1160, 229, 1, 1, 25, 2);
INSERT INTO `lesmoment` VALUES (2382, 1160, 229, 1, 2, 25, 2);
INSERT INTO `lesmoment` VALUES (2383, 1160, 222, 1, 3, 25, 2);
INSERT INTO `lesmoment` VALUES (2384, 1160, 226, 2, 1, 25, 2);
INSERT INTO `lesmoment` VALUES (2385, 1160, 221, 3, 1, 25, 2);
INSERT INTO `lesmoment` VALUES (2386, 1160, 221, 3, 2, 25, 2);
INSERT INTO `lesmoment` VALUES (2387, 1160, 224, 3, 3, 25, 2);
INSERT INTO `lesmoment` VALUES (2388, 1160, 224, 3, 4, 25, 2);
INSERT INTO `lesmoment` VALUES (2389, 1160, 223, 4, 1, 25, 2);
INSERT INTO `lesmoment` VALUES (2390, 1160, 223, 4, 2, 25, 2);
INSERT INTO `lesmoment` VALUES (2391, 1160, 217, 4, 3, 25, 2);
INSERT INTO `lesmoment` VALUES (2392, 1160, 217, 4, 4, 25, 2);
INSERT INTO `lesmoment` VALUES (2393, 1161, 215, 0, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2394, 1161, 218, 0, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2395, 1161, 218, 0, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2396, 1161, 220, 1, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2397, 1161, 220, 1, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2398, 1161, 216, 1, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2399, 1161, 216, 1, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2400, 1161, 214, 2, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2401, 1161, 214, 2, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2402, 1161, 219, 3, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2403, 1161, 219, 3, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2404, 1161, 214, 4, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2405, 1161, 214, 4, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2406, 1161, 217, 4, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2407, 1161, 217, 4, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2408, 1162, 218, 0, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2409, 1162, 218, 0, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2410, 1162, 220, 0, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2411, 1162, 220, 0, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2412, 1162, 215, 1, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2413, 1162, 216, 1, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2414, 1162, 216, 1, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2415, 1162, 228, 2, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2416, 1162, 228, 2, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2417, 1162, 214, 3, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2418, 1162, 214, 3, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2419, 1162, 214, 4, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2420, 1162, 214, 4, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2421, 1162, 217, 4, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2422, 1162, 217, 4, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2423, 1163, 231, 0, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2424, 1163, 231, 0, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2425, 1163, 232, 0, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2426, 1163, 232, 0, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2427, 1163, 233, 0, 5, 25, 1);
INSERT INTO `lesmoment` VALUES (2428, 1163, 234, 1, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2429, 1163, 233, 1, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2430, 1163, 235, 1, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2431, 1163, 235, 1, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2432, 1163, 236, 2, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2433, 1163, 236, 2, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2434, 1163, 237, 3, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2435, 1163, 237, 3, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2436, 1163, 238, 3, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2437, 1163, 239, 4, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2438, 1163, 239, 4, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2439, 1163, 240, 4, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2440, 1163, 240, 4, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2441, 1164, 235, 0, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2442, 1164, 235, 0, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2443, 1164, 232, 0, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2444, 1164, 232, 0, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2445, 1164, 233, 0, 5, 25, 1);
INSERT INTO `lesmoment` VALUES (2446, 1164, 234, 1, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2447, 1164, 233, 1, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2448, 1164, 239, 1, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2449, 1164, 239, 1, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2450, 1164, 240, 2, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2451, 1164, 240, 2, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2452, 1164, 236, 2, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2453, 1164, 236, 2, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2454, 1164, 231, 3, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2455, 1164, 231, 3, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2456, 1164, 241, 3, 5, 25, 1);
INSERT INTO `lesmoment` VALUES (2457, 1164, 237, 4, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2458, 1164, 237, 4, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2459, 1165, 242, 0, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2460, 1165, 232, 0, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2461, 1165, 232, 0, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2462, 1165, 233, 0, 5, 25, 1);
INSERT INTO `lesmoment` VALUES (2463, 1165, 237, 1, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2464, 1165, 237, 1, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2465, 1165, 236, 1, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2466, 1165, 236, 1, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2467, 1165, 231, 2, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2468, 1165, 231, 2, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2469, 1165, 240, 3, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2470, 1165, 240, 3, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2471, 1165, 239, 3, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2472, 1165, 239, 3, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2473, 1165, 235, 4, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2474, 1165, 235, 4, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2475, 1165, 233, 4, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2476, 1165, 243, 4, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2477, 1166, 239, 0, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2478, 1166, 239, 0, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2479, 1166, 232, 0, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2480, 1166, 232, 0, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2481, 1166, 233, 0, 5, 25, 1);
INSERT INTO `lesmoment` VALUES (2482, 1166, 231, 1, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2483, 1166, 231, 1, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2484, 1166, 235, 2, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2485, 1166, 235, 2, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2486, 1166, 237, 2, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2487, 1166, 237, 2, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2488, 1166, 244, 3, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2489, 1166, 236, 3, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2490, 1166, 236, 3, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2491, 1166, 240, 4, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2492, 1166, 240, 4, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2493, 1166, 233, 4, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2494, 1166, 243, 4, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2495, 1167, 245, 0, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2496, 1167, 245, 0, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2497, 1167, 246, 1, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2498, 1167, 246, 1, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2499, 1167, 247, 2, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2500, 1167, 247, 2, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2501, 1167, 248, 2, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2502, 1167, 249, 3, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2503, 1167, 249, 3, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2504, 1167, 250, 3, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2505, 1167, 250, 3, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2506, 1167, 251, 4, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2507, 1167, 251, 4, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2508, 1167, 252, 4, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2509, 1167, 252, 4, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2510, 1168, 245, 0, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2511, 1168, 245, 0, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2512, 1168, 246, 1, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2513, 1168, 246, 1, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2514, 1168, 248, 1, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2515, 1168, 247, 2, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2516, 1168, 247, 2, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2517, 1168, 249, 3, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2518, 1168, 249, 3, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2519, 1168, 250, 3, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2520, 1168, 250, 3, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2521, 1168, 251, 4, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2522, 1168, 251, 4, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2523, 1168, 252, 4, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2524, 1168, 252, 4, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2525, 1169, 253, 0, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2526, 1169, 253, 0, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2527, 1169, 254, 1, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2528, 1169, 255, 2, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2529, 1169, 255, 2, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2530, 1169, 256, 3, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2531, 1169, 256, 3, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2532, 1169, 257, 3, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2533, 1169, 257, 3, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2534, 1169, 258, 4, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2535, 1169, 258, 4, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2536, 1169, 259, 4, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2537, 1169, 259, 4, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2538, 1170, 260, 0, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2539, 1170, 260, 0, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2540, 1170, 261, 0, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2541, 1170, 261, 0, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2542, 1170, 262, 1, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2543, 1170, 262, 1, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2544, 1170, 263, 1, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2545, 1170, 263, 1, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2546, 1170, 264, 2, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2547, 1170, 264, 2, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2548, 1170, 265, 2, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2549, 1170, 265, 2, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2550, 1170, 266, 3, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2551, 1170, 266, 3, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2552, 1170, 267, 3, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2553, 1170, 267, 3, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2554, 1170, 268, 4, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2555, 1170, 268, 4, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2556, 1170, 269, 4, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2557, 1170, 269, 4, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2558, 1171, 270, 0, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2559, 1171, 270, 0, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2560, 1171, 271, 0, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2561, 1171, 271, 0, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2562, 1171, 272, 1, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2563, 1171, 272, 1, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2564, 1171, 273, 2, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2565, 1171, 273, 2, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2566, 1171, 274, 2, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2567, 1171, 274, 2, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2568, 1171, 275, 3, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2569, 1171, 275, 3, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2570, 1171, 276, 3, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2571, 1171, 276, 3, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2572, 1171, 277, 4, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2573, 1171, 277, 4, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2574, 1171, 278, 4, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2575, 1171, 278, 4, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2576, 1172, 279, 0, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2577, 1172, 279, 0, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2578, 1172, 280, 0, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2579, 1172, 280, 0, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2580, 1172, 281, 1, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2581, 1172, 282, 1, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2582, 1172, 283, 1, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2583, 1172, 284, 2, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2584, 1172, 284, 2, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2585, 1172, 285, 3, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2586, 1172, 285, 3, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2587, 1172, 286, 3, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2588, 1172, 286, 3, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2589, 1172, 287, 4, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2590, 1172, 287, 4, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2591, 1172, 288, 4, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2592, 1172, 288, 4, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2593, 1173, 279, 0, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2594, 1173, 279, 0, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2595, 1173, 280, 0, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2596, 1173, 280, 0, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2597, 1173, 289, 1, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2598, 1173, 281, 1, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2599, 1173, 282, 1, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2600, 1173, 283, 1, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2601, 1173, 288, 2, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2602, 1173, 288, 2, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2603, 1173, 290, 2, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2604, 1173, 290, 2, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2605, 1173, 286, 3, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2606, 1173, 286, 3, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2607, 1173, 287, 4, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2608, 1173, 287, 4, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2609, 1173, 291, 4, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2610, 1173, 291, 4, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2611, 1174, 292, 0, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2612, 1174, 292, 0, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2613, 1174, 293, 0, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2614, 1174, 293, 0, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2615, 1174, 294, 1, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2616, 1174, 295, 1, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2617, 1174, 296, 2, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2618, 1174, 296, 2, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2619, 1174, 295, 3, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2620, 1174, 297, 3, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2621, 1174, 297, 3, 5, 25, 1);
INSERT INTO `lesmoment` VALUES (2622, 1174, 298, 4, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2623, 1174, 298, 4, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2624, 1174, 299, 4, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2625, 1174, 299, 4, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2626, 1175, 300, 0, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2627, 1175, 300, 0, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2628, 1175, 301, 0, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2629, 1175, 301, 0, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2630, 1175, 302, 1, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2631, 1175, 303, 1, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2632, 1175, 304, 1, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2633, 1175, 304, 1, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2634, 1175, 305, 2, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2635, 1175, 305, 2, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2636, 1175, 306, 3, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2637, 1175, 306, 3, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2638, 1175, 302, 3, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2639, 1175, 307, 4, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2640, 1175, 307, 4, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2641, 1176, 304, 0, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2642, 1176, 304, 0, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2643, 1176, 301, 0, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2644, 1176, 301, 0, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2645, 1176, 302, 1, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2646, 1176, 303, 1, 2, 25, 1);
INSERT INTO `lesmoment` VALUES (2647, 1176, 300, 1, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2648, 1176, 300, 1, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2649, 1176, 305, 2, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2650, 1176, 305, 2, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2651, 1176, 302, 3, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2652, 1176, 307, 3, 3, 25, 1);
INSERT INTO `lesmoment` VALUES (2653, 1176, 307, 3, 4, 25, 1);
INSERT INTO `lesmoment` VALUES (2654, 1176, 306, 4, 1, 25, 1);
INSERT INTO `lesmoment` VALUES (2655, 1176, 306, 4, 2, 25, 1);

-- ----------------------------
-- Table structure for lokaal
-- ----------------------------
DROP TABLE IF EXISTS `lokaal`;
CREATE TABLE `lokaal`  (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `naam` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lokaal
-- ----------------------------
INSERT INTO `lokaal` VALUES (1, 'G E103 - LESLOKAAL (38)');
INSERT INTO `lokaal` VALUES (2, 'BEMT INDONESIË - LESLOKAAL (60), BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)');
INSERT INTO `lokaal` VALUES (3, 'G B210 - VERGADERLOKAAL (8)');
INSERT INTO `lokaal` VALUES (4, 'BEMT INDONESIË - LESLOKAAL (60)');
INSERT INTO `lokaal` VALUES (5, 'BEMT NKOREA - LESLOKAAL (81)');
INSERT INTO `lokaal` VALUES (6, 'F013 - LESLOKAAL (41)');
INSERT INTO `lokaal` VALUES (7, 'BEMT INDONESIË - LESLOKAAL (60), BEMT JAPAN - LESLOKAAL (30), BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)');
INSERT INTO `lokaal` VALUES (8, 'BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)');
INSERT INTO `lokaal` VALUES (9, 'P306B - PRACTICUMRUIMTE (30)');
INSERT INTO `lokaal` VALUES (10, 'BEMT INDONESIË - LESLOKAAL (60)');
INSERT INTO `lokaal` VALUES (11, 'BEMT NKOREA - LESLOKAAL (81)');
INSERT INTO `lokaal` VALUES (12, 'BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)');

-- ----------------------------
-- Table structure for mail
-- ----------------------------
DROP TABLE IF EXISTS `mail`;
CREATE TABLE `mail`  (
  `id` int(50) NOT NULL,
  `onderwerp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `beschrijving` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for richting
-- ----------------------------
DROP TABLE IF EXISTS `richting`;
CREATE TABLE `richting`  (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `naam` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of richting
-- ----------------------------
INSERT INTO `richting` VALUES (6, 'ITF');
INSERT INTO `richting` VALUES (7, 'APP');
INSERT INTO `richting` VALUES (8, 'BI');
INSERT INTO `richting` VALUES (9, 'IOT');
INSERT INTO `richting` VALUES (10, 'CCS');
INSERT INTO `richting` VALUES (11, 'APP-BI');

-- ----------------------------
-- Table structure for traject
-- ----------------------------
DROP TABLE IF EXISTS `traject`;
CREATE TABLE `traject`  (
  `id` int(50) NOT NULL,
  `naam` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `beschrijving` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of traject
-- ----------------------------
INSERT INTO `traject` VALUES (1, 'Model', 'Je neemt alle vakken op van hetzelfde jaar.');
INSERT INTO `traject` VALUES (2, 'Combi', 'Je neemt ook vakken van vorig jaar op waardoor je misschien vakken van je huidige jaar moet laten vallen.');

-- ----------------------------
-- Table structure for vak
-- ----------------------------
DROP TABLE IF EXISTS `vak`;
CREATE TABLE `vak`  (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `richtingId` int(50) NULL DEFAULT NULL,
  `naam` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `beschrijving` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `studiepunt` int(50) NULL DEFAULT NULL,
  `fase` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `richtingId`(`richtingId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 308 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of vak
-- ----------------------------
INSERT INTO `vak` VALUES (214, 6, 'Python ', NULL, NULL, '1');
INSERT INTO `vak` VALUES (215, 6, 'English for IT ', NULL, NULL, '1');
INSERT INTO `vak` VALUES (216, 6, 'Webdesign basis ', NULL, NULL, '1');
INSERT INTO `vak` VALUES (217, 6, 'PO 1 ', NULL, NULL, '1');
INSERT INTO `vak` VALUES (218, 6, 'Linux ', NULL, NULL, '1');
INSERT INTO `vak` VALUES (219, 6, 'IT essentials even weken', NULL, NULL, '1');
INSERT INTO `vak` VALUES (220, 6, 'Netwerken essentials', NULL, NULL, '1');
INSERT INTO `vak` VALUES (221, 6, 'Windows', NULL, NULL, '1');
INSERT INTO `vak` VALUES (222, 6, 'English', NULL, NULL, '1');
INSERT INTO `vak` VALUES (223, 6, 'Netwerken Routing&Switching', NULL, NULL, '1');
INSERT INTO `vak` VALUES (224, 6, 'IoT essentials', NULL, NULL, '1');
INSERT INTO `vak` VALUES (225, 6, 'Java', NULL, NULL, '1');
INSERT INTO `vak` VALUES (226, 6, 'HTML5', NULL, NULL, '1');
INSERT INTO `vak` VALUES (227, 6, 'SQL Tinne E202', NULL, NULL, '1');
INSERT INTO `vak` VALUES (228, 6, 'IT essentials oneven weken', NULL, NULL, '1');
INSERT INTO `vak` VALUES (229, 6, 'SQL', NULL, NULL, '1');
INSERT INTO `vak` VALUES (230, 6, 'IT essentials  oneven weken', NULL, NULL, '1');
INSERT INTO `vak` VALUES (231, 6, 'Linux Webservices', NULL, NULL, '2');
INSERT INTO `vak` VALUES (232, 6, 'PO2', NULL, NULL, '2');
INSERT INTO `vak` VALUES (233, 6, 'Ontwerpproject', NULL, NULL, '2');
INSERT INTO `vak` VALUES (234, 6, 'Engels groep A2 en groep B2', NULL, NULL, '2');
INSERT INTO `vak` VALUES (235, 6, 'Windows server essentials', NULL, NULL, '2');
INSERT INTO `vak` VALUES (236, 6, 'Eisenanalyse', NULL, NULL, '2');
INSERT INTO `vak` VALUES (237, 6, 'PHP', NULL, NULL, '2');
INSERT INTO `vak` VALUES (238, 6, 'Engels groep A1', NULL, NULL, '2');
INSERT INTO `vak` VALUES (239, 6, 'IoT advanced', NULL, NULL, '2');
INSERT INTO `vak` VALUES (240, 6, 'Business Essentials', NULL, NULL, '2');
INSERT INTO `vak` VALUES (241, 6, 'Engels groep B1', NULL, NULL, '2');
INSERT INTO `vak` VALUES (242, 6, 'Frans groep C1', NULL, NULL, '2');
INSERT INTO `vak` VALUES (243, 6, 'Frans groep C2 en groep D2', NULL, NULL, '2');
INSERT INTO `vak` VALUES (244, 6, 'Frans groep D1', NULL, NULL, '2');
INSERT INTO `vak` VALUES (245, 7, 'React', NULL, NULL, '3');
INSERT INTO `vak` VALUES (246, 7, 'Mobile development', NULL, NULL, '3');
INSERT INTO `vak` VALUES (247, 7, 'PO3', NULL, NULL, '3');
INSERT INTO `vak` VALUES (248, 7, 'Angular ', NULL, NULL, '3');
INSERT INTO `vak` VALUES (249, 7, 'Project 4.0 ', NULL, NULL, '3');
INSERT INTO `vak` VALUES (250, 7, 'Angular Lite,  BI Lite, Emdev lite, Security Lite, Project Keulen', NULL, NULL, '3');
INSERT INTO `vak` VALUES (251, 7, 'Java advanced topics', NULL, NULL, '3');
INSERT INTO `vak` VALUES (252, 7, 'sprekers Cyber security (Lite) ', NULL, NULL, '3');
INSERT INTO `vak` VALUES (253, 8, 'SharePoint ', NULL, NULL, '3');
INSERT INTO `vak` VALUES (254, 8, 'Business Intelligence w1-6 /SQL Server Analysis Services w7-12', NULL, NULL, '3');
INSERT INTO `vak` VALUES (255, 8, 'PO3', NULL, NULL, '3');
INSERT INTO `vak` VALUES (256, 8, 'Project 4.0 ', NULL, NULL, '3');
INSERT INTO `vak` VALUES (257, 8, 'Angular Lite,  BI Lite, Emdev lite, Security Lite, Project Keulen', NULL, NULL, '3');
INSERT INTO `vak` VALUES (258, 8, 'Big data', NULL, NULL, '3');
INSERT INTO `vak` VALUES (259, 8, 'sprekers Cyber security (Lite) ', NULL, NULL, '3');
INSERT INTO `vak` VALUES (260, 9, 'KNX home automation groep 1', NULL, NULL, '3');
INSERT INTO `vak` VALUES (261, 9, 'KNX home automation groep 2', NULL, NULL, '3');
INSERT INTO `vak` VALUES (262, 9, 'Cordova w1-6', NULL, NULL, '3');
INSERT INTO `vak` VALUES (263, 9, 'Communication technology', NULL, NULL, '3');
INSERT INTO `vak` VALUES (264, 9, 'PO3', NULL, NULL, '3');
INSERT INTO `vak` VALUES (265, 9, 'Embedded dev adv ', NULL, NULL, '3');
INSERT INTO `vak` VALUES (266, 9, 'Project 4.0 ', NULL, NULL, '3');
INSERT INTO `vak` VALUES (267, 9, 'Angular Lite,  BI Lite, Emdev lite, Security Lite, Project Keulen', NULL, NULL, '3');
INSERT INTO `vak` VALUES (268, 9, 'Emb interf advanced ', NULL, NULL, '3');
INSERT INTO `vak` VALUES (269, 9, 'sprekers Cyber security (Lite) ', NULL, NULL, '3');
INSERT INTO `vak` VALUES (270, 10, 'Cyber sec def & for ', NULL, NULL, '3');
INSERT INTO `vak` VALUES (271, 10, 'Cyber security threat & risk ', NULL, NULL, '3');
INSERT INTO `vak` VALUES (272, 10, 'Cloud communication ', NULL, NULL, '3');
INSERT INTO `vak` VALUES (273, 10, 'PO3', NULL, NULL, '3');
INSERT INTO `vak` VALUES (274, 10, 'Microsoft System Center', NULL, NULL, '3');
INSERT INTO `vak` VALUES (275, 10, 'Project 4.0 ', NULL, NULL, '3');
INSERT INTO `vak` VALUES (276, 10, 'Angular Lite,  BI Lite, Emdev lite, Security Lite, Project Keulen', NULL, NULL, '3');
INSERT INTO `vak` VALUES (277, 10, 'ITIL', NULL, NULL, '3');
INSERT INTO `vak` VALUES (278, 10, 'sprekers Cyber security (Lite) ', NULL, NULL, '3');
INSERT INTO `vak` VALUES (279, 11, 'WPF w1-6 /ASP.NET w7-12', NULL, NULL, '2');
INSERT INTO `vak` VALUES (280, 11, 'PO2', NULL, NULL, '2');
INSERT INTO `vak` VALUES (281, 11, 'WPF w1-6 /ASP.NET w7-12 lesgroep 3', NULL, NULL, '2');
INSERT INTO `vak` VALUES (282, 11, 'WPF w1-6 /ASP.NET w7-12 lesgroepen 1 en 2', NULL, NULL, '2');
INSERT INTO `vak` VALUES (283, 11, 'Frans of Engels lesgroepen 1 en 2', NULL, NULL, '2');
INSERT INTO `vak` VALUES (284, 11, 'Bus Pr&ITIL w1-5 / Project APP-BIT w7-12', NULL, NULL, '2');
INSERT INTO `vak` VALUES (285, 11, 'Cordova w1-6 ', NULL, NULL, '2');
INSERT INTO `vak` VALUES (286, 11, 'Project APP-BIT ', NULL, NULL, '2');
INSERT INTO `vak` VALUES (287, 11, 'UML w1-7 / Java w8-12', NULL, NULL, '2');
INSERT INTO `vak` VALUES (288, 11, 'Bus Processen & ITIL', NULL, NULL, '2');
INSERT INTO `vak` VALUES (289, 11, 'Frans of Engels IOT en APP lesgroep 3', NULL, NULL, '2');
INSERT INTO `vak` VALUES (290, 11, 'Cordova w1-6 / Project APP-BIT w7-12', NULL, NULL, '2');
INSERT INTO `vak` VALUES (291, 11, 'Bus Processen & ITIL w1-5', NULL, NULL, '2');
INSERT INTO `vak` VALUES (292, 9, 'Smart Homes Technology', NULL, NULL, '2');
INSERT INTO `vak` VALUES (293, 9, 'PO2', NULL, NULL, '2');
INSERT INTO `vak` VALUES (294, 9, 'Frans of Engels IOT en APP lesgroep 3', NULL, NULL, '2');
INSERT INTO `vak` VALUES (295, 9, 'Embedded interfacing', NULL, NULL, '2');
INSERT INTO `vak` VALUES (296, 9, 'Project IoT ', NULL, NULL, '2');
INSERT INTO `vak` VALUES (297, 9, 'Wireless systems', NULL, NULL, '2');
INSERT INTO `vak` VALUES (298, 9, 'Programmable IoT devices', NULL, NULL, '2');
INSERT INTO `vak` VALUES (299, 9, 'Embedded devices', NULL, NULL, '2');
INSERT INTO `vak` VALUES (300, 10, 'Linux network services', NULL, NULL, '2');
INSERT INTO `vak` VALUES (301, 10, 'PO2', NULL, NULL, '2');
INSERT INTO `vak` VALUES (302, 10, 'Datacenter Technology', NULL, NULL, '2');
INSERT INTO `vak` VALUES (303, 10, 'Frans of Engels', NULL, NULL, '2');
INSERT INTO `vak` VALUES (304, 10, 'Scaling networks', NULL, NULL, '2');
INSERT INTO `vak` VALUES (305, 10, 'Project Hosting', NULL, NULL, '2');
INSERT INTO `vak` VALUES (306, 10, 'Database management', NULL, NULL, '2');
INSERT INTO `vak` VALUES (307, 10, 'Windows server advanced', NULL, NULL, '2');

SET FOREIGN_KEY_CHECKS = 1;