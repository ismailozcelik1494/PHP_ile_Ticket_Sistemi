CREATE TABLE `category` (
`OID` int(11) UNSIGNED NULL AUTO_INCREMENT,
`categoryName` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
`categoryDescription` varchar(500) NULL DEFAULT NULL,
`isActive` tinyint NULL DEFAULT current_timestamp(),
`createdAt` datetime NULL ON UPDATE CURRENT_TIMESTAMP,
PRIMARY KEY (`OID`) 
)
ENGINE = InnoDB
AUTO_INCREMENT = 21
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_turkish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Dynamic;

CREATE TABLE `settings` (
`OID` int(11) UNSIGNED NOT NULL,
`full_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
`logo_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
`adres` varchar(500) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
`email` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
`cagri_merkezi` varchar(16) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
`faks` varchar(16) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
`genel_mudur` varchar(16) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
`web_adres` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
`userOID` int(11) NULL,
PRIMARY KEY (`OID`) 
)
ENGINE = InnoDB
AUTO_INCREMENT = 0
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_turkish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Dynamic;

CREATE TABLE `ticket` (
`OID` int(11) UNSIGNED NULL AUTO_INCREMENT,
`nameSurname` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
`email` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
`telephone` varchar(20) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
`displayCount` int(11) NULL DEFAULT NULL,
`description` longtext CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL,
`categoryOID` int(11) NULL DEFAULT NULL,
`message` varchar(500) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
`pstContent` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
`ticketID` varchar(14) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
`isActive` tinyint(4) NULL DEFAULT NULL,
`fileUrl` varchar(500) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
`createdAt` datetime NULL DEFAULT NULL,
PRIMARY KEY (`OID`, `ticketID`) ,
INDEX `categoryID` (`categoryOID` ASC) USING BTREE
)
ENGINE = InnoDB
AUTO_INCREMENT = 6
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_turkish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Dynamic;

CREATE TABLE `admin` (
`OID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`fullName` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
`userName` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
`email` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
`password` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
`createdAt` datetime NULL DEFAULT NULL,
`isActive` tinyint(4) NULL DEFAULT NULL,
`userRole` int(1) NOT NULL,
PRIMARY KEY (`OID`) 
)
ENGINE = InnoDB
AUTO_INCREMENT = 2
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_turkish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Dynamic;


ALTER TABLE `ticket` ADD CONSTRAINT `categoryJoin` FOREIGN KEY (`categoryOID`) REFERENCES `category` (`OID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `settings` ADD CONSTRAINT `adminJoin` FOREIGN KEY (`userOID`) REFERENCES `admin` (`OID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

