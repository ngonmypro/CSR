<?
include "connect_mysql_salereport.php";

$sql1 = " CREATE TABLE IF NOT EXISTS `salereport_db`.`mtbkk_tb` ( ";
$sql1 .= " `Docutype` INT NOT NULL , ";
$sql1 .= " `BrchID` INT NOT NULL , ";
$sql1 .= " `DocuDate` DATE NULL , ";
$sql1 .= " `DocuNo` VARCHAR( 50 ) NULL PRIMARY KEY , ";
$sql1 .= " `NetAmnt` DOUBLE( 10,2 )  NULL , ";
$sql1 .= " `CustID` INT  NULL , ";
$sql1 .= " `CustCode` VARCHAR( 50 )  NULL , ";
$sql1 .= " `CustName` VARCHAR( 200 )  NULL , ";
$sql1 .= " `Inactive` VARCHAR( 1 )  NULL , ";
$sql1 .= " `District` VARCHAR( 200 )  NULL  ,  ";
$sql1 .= " `Amphur` VARCHAR( 200 ) NULL  ,  ";
$sql1 .= " `Province` VARCHAR( 200 )  NULL    ";
$sql1 .= " ) ENGINE = InnoDB CHARACTER SET tis620 COLLATE tis620_thai_ci ";
 
 $create_tb1 = mysql_query($sql1) or die(mysql_error()); 
 

$sql2 = " CREATE TABLE IF NOT EXISTS `salereport_db`.`y1bkk_tb` ( ";
$sql2 .= " `Docutype` INT NOT NULL , ";
$sql2 .= " `BrchID` INT NOT NULL , ";
$sql2 .= " `DocuDate` DATE NULL , ";
$sql2 .= " `DocuNo` VARCHAR( 50 ) NULL PRIMARY KEY , ";
$sql2 .= " `NetAmnt` DOUBLE( 10,2 )  NULL , ";
$sql2 .= " `CustID` INT  NULL , ";
$sql2 .= " `CustCode` VARCHAR( 50 )  NULL , ";
$sql2 .= " `CustName` VARCHAR( 200 )  NULL , ";
$sql2 .= " `Inactive` VARCHAR( 1 )  NULL , ";
$sql2 .= " `District` VARCHAR( 200 )  NULL  ,  ";
$sql2 .= " `Amphur` VARCHAR( 200 ) NULL  ,  ";
$sql2 .= " `Province` VARCHAR( 200 )  NULL    ";
$sql2 .= " ) ENGINE = InnoDB CHARACTER SET tis620 COLLATE tis620_thai_ci ";
 
 $create_tb2 = mysql_query($sql2) or die(mysql_error()); 


$sql3 = " CREATE TABLE IF NOT EXISTS `salereport_db`.`y6bkk_tb` ( ";
$sql3 .= " `Docutype` INT NOT NULL , ";
$sql3 .= " `BrchID` INT NOT NULL , ";
$sql3 .= " `DocuDate` DATE NULL , ";
$sql3 .= " `DocuNo` VARCHAR( 50 ) NULL PRIMARY KEY , ";
$sql3 .= " `NetAmnt` DOUBLE( 10,2 )  NULL , ";
$sql3 .= " `CustID` INT  NULL , ";
$sql3 .= " `CustCode` VARCHAR( 50 )  NULL , ";
$sql3 .= " `CustName` VARCHAR( 200 )  NULL , ";
$sql3 .= " `Inactive` VARCHAR( 1 )  NULL , ";
$sql3 .= " `District` VARCHAR( 200 )  NULL  ,  ";
$sql3 .= " `Amphur` VARCHAR( 200 ) NULL  ,  ";
$sql3 .= " `Province` VARCHAR( 200 )  NULL    ";
$sql3 .= " ) ENGINE = InnoDB CHARACTER SET tis620 COLLATE tis620_thai_ci ";
 
 $create_tb3 = mysql_query($sql3) or die(mysql_error()); 


$sql4 = " CREATE TABLE IF NOT EXISTS `salereport_db`.`y7bkk_tb` ( ";
$sql4 .= " `Docutype` INT NOT NULL , ";
$sql4 .= " `BrchID` INT NOT NULL , ";
$sql4 .= " `DocuDate` DATE NULL , ";
$sql4 .= " `DocuNo` VARCHAR( 50 ) NULL PRIMARY KEY , ";
$sql4 .= " `NetAmnt` DOUBLE( 10,2 )  NULL , ";
$sql4 .= " `CustID` INT  NULL , ";
$sql4 .= " `CustCode` VARCHAR( 50 )  NULL , ";
$sql4 .= " `CustName` VARCHAR( 200 )  NULL , ";
$sql4 .= " `Inactive` VARCHAR( 1 )  NULL , ";
$sql4 .= " `District` VARCHAR( 200 )  NULL  ,  ";
$sql4 .= " `Amphur` VARCHAR( 200 ) NULL  ,  ";
$sql4 .= " `Province` VARCHAR( 200 )  NULL    ";
$sql4 .= " ) ENGINE = InnoDB CHARACTER SET tis620 COLLATE tis620_thai_ci ";
 
 $create_tb4 = mysql_query($sql4) or die(mysql_error()); 


$sql5 = " CREATE TABLE IF NOT EXISTS `salereport_db`.`mtknb_tb` ( ";
$sql5 .= " `Docutype` INT NOT NULL , ";
$sql5 .= " `BrchID` INT NOT NULL , ";
$sql5 .= " `DocuDate` DATE NULL , ";
$sql5 .= " `DocuNo` VARCHAR( 50 ) NULL PRIMARY KEY , ";
$sql5 .= " `NetAmnt` DOUBLE( 10,2 )  NULL , ";
$sql5 .= " `CustID` INT  NULL , ";
$sql5 .= " `CustCode` VARCHAR( 50 )  NULL , ";
$sql5 .= " `CustName` VARCHAR( 200 )  NULL , ";
$sql5 .= " `Inactive` VARCHAR( 1 )  NULL , ";
$sql5 .= " `District` VARCHAR( 200 )  NULL  ,  ";
$sql5 .= " `Amphur` VARCHAR( 200 ) NULL  ,  ";
$sql5 .= " `Province` VARCHAR( 200 )  NULL    ";
$sql5 .= " ) ENGINE = InnoDB CHARACTER SET tis620 COLLATE tis620_thai_ci ";
 
 $create_tb5 = mysql_query($sql5) or die(mysql_error()); 

$sql6 = " CREATE TABLE IF NOT EXISTS `salereport_db`.`y1knb_tb` ( ";
$sql6 .= " `Docutype` INT NOT NULL , ";
$sql6 .= " `BrchID` INT NOT NULL , ";
$sql6 .= " `DocuDate` DATE NULL , ";
$sql6 .= " `DocuNo` VARCHAR( 50 ) NULL PRIMARY KEY , ";
$sql6 .= " `NetAmnt` DOUBLE( 10,2 )  NULL , ";
$sql6 .= " `CustID` INT  NULL , ";
$sql6 .= " `CustCode` VARCHAR( 50 )  NULL , ";
$sql6 .= " `CustName` VARCHAR( 200 )  NULL , ";
$sql6 .= " `Inactive` VARCHAR( 1 )  NULL , ";
$sql6 .= " `District` VARCHAR( 200 )  NULL  ,  ";
$sql6 .= " `Amphur` VARCHAR( 200 ) NULL  ,  ";
$sql6 .= " `Province` VARCHAR( 200 )  NULL    ";
$sql6 .= " ) ENGINE = InnoDB CHARACTER SET tis620 COLLATE tis620_thai_ci ";
 
 $create_tb6 = mysql_query($sql6) or die(mysql_error()); 

$sql7 = " CREATE TABLE IF NOT EXISTS `salereport_db`.`y6knb_tb` ( ";
$sql7 .= " `Docutype` INT NOT NULL , ";
$sql7 .= " `BrchID` INT NOT NULL , ";
$sql7 .= " `DocuDate` DATE NULL , ";
$sql7 .= " `DocuNo` VARCHAR( 50 ) NULL PRIMARY KEY , ";
$sql7 .= " `NetAmnt` DOUBLE( 10,2 )  NULL , ";
$sql7 .= " `CustID` INT  NULL , ";
$sql7 .= " `CustCode` VARCHAR( 50 )  NULL , ";
$sql7 .= " `CustName` VARCHAR( 200 )  NULL , ";
$sql7 .= " `Inactive` VARCHAR( 1 )  NULL , ";
$sql7 .= " `District` VARCHAR( 200 )  NULL  ,  ";
$sql7 .= " `Amphur` VARCHAR( 200 ) NULL  ,  ";
$sql7 .= " `Province` VARCHAR( 200 )  NULL    ";
$sql7 .= " ) ENGINE = InnoDB CHARACTER SET tis620 COLLATE tis620_thai_ci ";
 
 $create_tb7 = mysql_query($sql7) or die(mysql_error()); 

$sql8 = " CREATE TABLE IF NOT EXISTS `salereport_db`.`y7knb_tb` ( ";
$sql8 .= " `Docutype` INT NOT NULL , ";
$sql8 .= " `BrchID` INT NOT NULL , ";
$sql8 .= " `DocuDate` DATE NULL , ";
$sql8 .= " `DocuNo` VARCHAR( 50 ) NULL PRIMARY KEY , ";
$sql8 .= " `NetAmnt` DOUBLE( 10,2 )  NULL , ";
$sql8 .= " `CustID` INT  NULL , ";
$sql8 .= " `CustCode` VARCHAR( 50 )  NULL , ";
$sql8 .= " `CustName` VARCHAR( 200 )  NULL , ";
$sql8 .= " `Inactive` VARCHAR( 1 )  NULL , ";
$sql8 .= " `District` VARCHAR( 200 )  NULL  ,  ";
$sql8 .= " `Amphur` VARCHAR( 200 ) NULL  ,  ";
$sql8 .= " `Province` VARCHAR( 200 )  NULL    ";
$sql8 .= " ) ENGINE = InnoDB CHARACTER SET tis620 COLLATE tis620_thai_ci ";
 
 $create_tb8 = mysql_query($sql8) or die(mysql_error()); 

$sql9 = " CREATE TABLE IF NOT EXISTS `salereport_db`.`mtnpt_tb` ( ";
$sql9 .= " `Docutype` INT NOT NULL , ";
$sql9 .= " `BrchID` INT NOT NULL , ";
$sql9 .= " `DocuDate` DATE NULL , ";
$sql9 .= " `DocuNo` VARCHAR( 50 ) NULL PRIMARY KEY , ";
$sql9 .= " `NetAmnt` DOUBLE( 10,2 )  NULL , ";
$sql9 .= " `CustID` INT  NULL , ";
$sql9 .= " `CustCode` VARCHAR( 50 )  NULL , ";
$sql9 .= " `CustName` VARCHAR( 200 )  NULL , ";
$sql9 .= " `Inactive` VARCHAR( 1 )  NULL , ";
$sql9 .= " `District` VARCHAR( 200 )  NULL  ,  ";
$sql9 .= " `Amphur` VARCHAR( 200 ) NULL  ,  ";
$sql9 .= " `Province` VARCHAR( 200 )  NULL    ";
$sql9 .= " ) ENGINE = InnoDB CHARACTER SET tis620 COLLATE tis620_thai_ci ";
 
 $create_tb9 = mysql_query($sql9) or die(mysql_error()); 

$sql10 = " CREATE TABLE IF NOT EXISTS `salereport_db`.`y1npt_tb` ( ";
$sql10 .= " `Docutype` INT NOT NULL , ";
$sql10 .= " `BrchID` INT NOT NULL , ";
$sql10 .= " `DocuDate` DATE NULL , ";
$sql10 .= " `DocuNo` VARCHAR( 50 ) NULL PRIMARY KEY , ";
$sql10 .= " `NetAmnt` DOUBLE( 10,2 )  NULL , ";
$sql10 .= " `CustID` INT  NULL , ";
$sql10 .= " `CustCode` VARCHAR( 50 )  NULL , ";
$sql10 .= " `CustName` VARCHAR( 200 )  NULL , ";
$sql10 .= " `Inactive` VARCHAR( 1 )  NULL , ";
$sql10 .= " `District` VARCHAR( 200 )  NULL  ,  ";
$sql10 .= " `Amphur` VARCHAR( 200 ) NULL  ,  ";
$sql10 .= " `Province` VARCHAR( 200 )  NULL    ";
$sql10 .= " ) ENGINE = InnoDB CHARACTER SET tis620 COLLATE tis620_thai_ci ";
 
 $create_tb10 = mysql_query($sql10) or die(mysql_error()); 

$sql11 = " CREATE TABLE IF NOT EXISTS `salereport_db`.`y6npt_tb` ( ";
$sql11 .= " `Docutype` INT NOT NULL , ";
$sql11 .= " `BrchID` INT NOT NULL , ";
$sql11 .= " `DocuDate` DATE NULL , ";
$sql11 .= " `DocuNo` VARCHAR( 50 ) NULL PRIMARY KEY , ";
$sql11 .= " `NetAmnt` DOUBLE( 10,2 )  NULL , ";
$sql11 .= " `CustID` INT  NULL , ";
$sql11 .= " `CustCode` VARCHAR( 50 )  NULL , ";
$sql11 .= " `CustName` VARCHAR( 200 )  NULL , ";
$sql11 .= " `Inactive` VARCHAR( 1 )  NULL , ";
$sql11 .= " `District` VARCHAR( 200 )  NULL  ,  ";
$sql11 .= " `Amphur` VARCHAR( 200 ) NULL  ,  ";
$sql11 .= " `Province` VARCHAR( 200 )  NULL    ";
$sql11 .= " ) ENGINE = InnoDB CHARACTER SET tis620 COLLATE tis620_thai_ci ";
 
 $create_tb11 = mysql_query($sql11) or die(mysql_error()); 

$sql12 = " CREATE TABLE IF NOT EXISTS `salereport_db`.`y7npt_tb` ( ";
$sql12 .= " `Docutype` INT NOT NULL , ";
$sql12 .= " `BrchID` INT NOT NULL , ";
$sql12 .= " `DocuDate` DATE NULL , ";
$sql12 .= " `DocuNo` VARCHAR( 50 ) NULL PRIMARY KEY , ";
$sql12 .= " `NetAmnt` DOUBLE( 10,2 )  NULL , ";
$sql12 .= " `CustID` INT  NULL , ";
$sql12 .= " `CustCode` VARCHAR( 50 )  NULL , ";
$sql12 .= " `CustName` VARCHAR( 200 )  NULL , ";
$sql12 .= " `Inactive` VARCHAR( 1 )  NULL , ";
$sql12 .= " `District` VARCHAR( 200 )  NULL  ,  ";
$sql12 .= " `Amphur` VARCHAR( 200 ) NULL  ,  ";
$sql12 .= " `Province` VARCHAR( 200 )  NULL    ";
$sql12 .= " ) ENGINE = InnoDB CHARACTER SET tis620 COLLATE tis620_thai_ci ";
 
 $create_tb12 = mysql_query($sql12) or die(mysql_error()); 

$sql13 = " CREATE TABLE IF NOT EXISTS `salereport_db`.`mtrab_tb` ( ";
$sql13 .= " `Docutype` INT NOT NULL , ";
$sql13 .= " `BrchID` INT NOT NULL , ";
$sql13 .= " `DocuDate` DATE NULL , ";
$sql13 .= " `DocuNo` VARCHAR( 50 ) NULL PRIMARY KEY , ";
$sql13 .= " `NetAmnt` DOUBLE( 10,2 )  NULL , ";
$sql13 .= " `CustID` INT  NULL , ";
$sql13 .= " `CustCode` VARCHAR( 50 )  NULL , ";
$sql13 .= " `CustName` VARCHAR( 200 )  NULL , ";
$sql13 .= " `Inactive` VARCHAR( 1 )  NULL , ";
$sql13 .= " `District` VARCHAR( 200 )  NULL  ,  ";
$sql13 .= " `Amphur` VARCHAR( 200 ) NULL  ,  ";
$sql13 .= " `Province` VARCHAR( 200 )  NULL    ";
$sql13 .= " ) ENGINE = InnoDB CHARACTER SET tis620 COLLATE tis620_thai_ci ";
 
 $create_tb13 = mysql_query($sql13) or die(mysql_error()); 

$sql14 = " CREATE TABLE IF NOT EXISTS `salereport_db`.`y1rab_tb` ( ";
$sql14 .= " `Docutype` INT NOT NULL , ";
$sql14 .= " `BrchID` INT NOT NULL , ";
$sql14 .= " `DocuDate` DATE NULL , ";
$sql14 .= " `DocuNo` VARCHAR( 50 ) NULL PRIMARY KEY , ";
$sql14 .= " `NetAmnt` DOUBLE( 10,2 )  NULL , ";
$sql14 .= " `CustID` INT  NULL , ";
$sql14 .= " `CustCode` VARCHAR( 50 )  NULL , ";
$sql14 .= " `CustName` VARCHAR( 200 )  NULL , ";
$sql14 .= " `Inactive` VARCHAR( 1 )  NULL , ";
$sql14 .= " `District` VARCHAR( 200 )  NULL  ,  ";
$sql14 .= " `Amphur` VARCHAR( 200 ) NULL  ,  ";
$sql14 .= " `Province` VARCHAR( 200 )  NULL    ";
$sql14 .= " ) ENGINE = InnoDB CHARACTER SET tis620 COLLATE tis620_thai_ci ";
 
 $create_tb14 = mysql_query($sql14) or die(mysql_error()); 

$sql15 = " CREATE TABLE IF NOT EXISTS `salereport_db`.`y6rab_tb` ( ";
$sql15 .= " `Docutype` INT NOT NULL , ";
$sql15 .= " `BrchID` INT NOT NULL , ";
$sql15 .= " `DocuDate` DATE NULL , ";
$sql15 .= " `DocuNo` VARCHAR( 50 ) NULL PRIMARY KEY , ";
$sql15 .= " `NetAmnt` DOUBLE( 10,2 )  NULL , ";
$sql15 .= " `CustID` INT  NULL , ";
$sql15 .= " `CustCode` VARCHAR( 50 )  NULL , ";
$sql15 .= " `CustName` VARCHAR( 200 )  NULL , ";
$sql15 .= " `Inactive` VARCHAR( 1 )  NULL , ";
$sql15 .= " `District` VARCHAR( 200 )  NULL  ,  ";
$sql15 .= " `Amphur` VARCHAR( 200 ) NULL  ,  ";
$sql15 .= " `Province` VARCHAR( 200 )  NULL    ";
$sql15 .= " ) ENGINE = InnoDB CHARACTER SET tis620 COLLATE tis620_thai_ci ";
 
 $create_tb15 = mysql_query($sql15) or die(mysql_error()); 

$sql16 = " CREATE TABLE IF NOT EXISTS `salereport_db`.`y7rab_tb` ( ";
$sql16 .= " `Docutype` INT NOT NULL , ";
$sql16 .= " `BrchID` INT NOT NULL , ";
$sql16 .= " `DocuDate` DATE NULL , ";
$sql16 .= " `DocuNo` VARCHAR( 50 ) NULL PRIMARY KEY , ";
$sql16 .= " `NetAmnt` DOUBLE( 10,2 )  NULL , ";
$sql16 .= " `CustID` INT  NULL , ";
$sql16 .= " `CustCode` VARCHAR( 50 )  NULL , ";
$sql16 .= " `CustName` VARCHAR( 200 )  NULL , ";
$sql16 .= " `Inactive` VARCHAR( 1 )  NULL , ";
$sql16 .= " `District` VARCHAR( 200 )  NULL  ,  ";
$sql16 .= " `Amphur` VARCHAR( 200 ) NULL  ,  ";
$sql16 .= " `Province` VARCHAR( 200 )  NULL    ";
$sql16 .= " ) ENGINE = InnoDB CHARACTER SET tis620 COLLATE tis620_thai_ci ";
 
 $create_tb16 = mysql_query($sql16) or die(mysql_error()); 

$sql17 = " CREATE TABLE IF NOT EXISTS `salereport_db`.`mtspb_tb` ( ";
$sql17 .= " `Docutype` INT NOT NULL , ";
$sql17 .= " `BrchID` INT NOT NULL , ";
$sql17 .= " `DocuDate` DATE NULL , ";
$sql17 .= " `DocuNo` VARCHAR( 50 ) NULL PRIMARY KEY , ";
$sql17 .= " `NetAmnt` DOUBLE( 10,2 )  NULL , ";
$sql17 .= " `CustID` INT  NULL , ";
$sql17 .= " `CustCode` VARCHAR( 50 )  NULL , ";
$sql17 .= " `CustName` VARCHAR( 200 )  NULL , ";
$sql17 .= " `Inactive` VARCHAR( 1 )  NULL , ";
$sql17 .= " `District` VARCHAR( 200 )  NULL  ,  ";
$sql17 .= " `Amphur` VARCHAR( 200 ) NULL  ,  ";
$sql17 .= " `Province` VARCHAR( 200 )  NULL    ";
$sql17 .= " ) ENGINE = InnoDB CHARACTER SET tis620 COLLATE tis620_thai_ci ";
 
 $create_tb17 = mysql_query($sql17) or die(mysql_error()); 

$sql18 = " CREATE TABLE IF NOT EXISTS `salereport_db`.`y1spb_tb` ( ";
$sql18 .= " `Docutype` INT NOT NULL , ";
$sql18 .= " `BrchID` INT NOT NULL , ";
$sql18 .= " `DocuDate` DATE NULL , ";
$sql18 .= " `DocuNo` VARCHAR( 50 ) NULL PRIMARY KEY , ";
$sql18 .= " `NetAmnt` DOUBLE( 10,2 )  NULL , ";
$sql18 .= " `CustID` INT  NULL , ";
$sql18 .= " `CustCode` VARCHAR( 50 )  NULL , ";
$sql18 .= " `CustName` VARCHAR( 200 )  NULL , ";
$sql18 .= " `Inactive` VARCHAR( 1 )  NULL , ";
$sql18 .= " `District` VARCHAR( 200 )  NULL  ,  ";
$sql18 .= " `Amphur` VARCHAR( 200 ) NULL  ,  ";
$sql18 .= " `Province` VARCHAR( 200 )  NULL    ";
$sql18 .= " ) ENGINE = InnoDB CHARACTER SET tis620 COLLATE tis620_thai_ci ";
 
 $create_tb18 = mysql_query($sql18) or die(mysql_error()); 

$sql19 = " CREATE TABLE IF NOT EXISTS `salereport_db`.`y6spb_tb` ( ";
$sql19 .= " `Docutype` INT NOT NULL , ";
$sql19 .= " `BrchID` INT NOT NULL , ";
$sql19 .= " `DocuDate` DATE NULL , ";
$sql19 .= " `DocuNo` VARCHAR( 50 ) NULL PRIMARY KEY , ";
$sql19 .= " `NetAmnt` DOUBLE( 10,2 )  NULL , ";
$sql19 .= " `CustID` INT  NULL , ";
$sql19 .= " `CustCode` VARCHAR( 50 )  NULL , ";
$sql19 .= " `CustName` VARCHAR( 200 )  NULL , ";
$sql19 .= " `Inactive` VARCHAR( 1 )  NULL , ";
$sql19 .= " `District` VARCHAR( 200 )  NULL  ,  ";
$sql19 .= " `Amphur` VARCHAR( 200 ) NULL  ,  ";
$sql19 .= " `Province` VARCHAR( 200 )  NULL    ";
$sql19 .= " ) ENGINE = InnoDB CHARACTER SET tis620 COLLATE tis620_thai_ci ";
 
 $create_tb19 = mysql_query($sql19) or die(mysql_error()); 

$sql20 = " CREATE TABLE IF NOT EXISTS `salereport_db`.`y7spb_tb` ( ";
$sql20 .= " `Docutype` INT NOT NULL , ";
$sql20 .= " `BrchID` INT NOT NULL , ";
$sql20 .= " `DocuDate` DATE NULL , ";
$sql20 .= " `DocuNo` VARCHAR( 50 ) NULL PRIMARY KEY , ";
$sql20 .= " `NetAmnt` DOUBLE( 10,2 )  NULL , ";
$sql20 .= " `CustID` INT  NULL , ";
$sql20 .= " `CustCode` VARCHAR( 50 )  NULL , ";
$sql20 .= " `CustName` VARCHAR( 200 )  NULL , ";
$sql20 .= " `Inactive` VARCHAR( 1 )  NULL , ";
$sql20 .= " `District` VARCHAR( 200 )  NULL  ,  ";
$sql20 .= " `Amphur` VARCHAR( 200 ) NULL  ,  ";
$sql20 .= " `Province` VARCHAR( 200 )  NULL    ";
$sql20 .= " ) ENGINE = InnoDB CHARACTER SET tis620 COLLATE tis620_thai_ci ";
 
 $create_tb20 = mysql_query($sql20) or die(mysql_error()); 
 
$sql21 = " CREATE TABLE IF NOT EXISTS `salereport_db`.`mtnon_tb` ( ";
$sql21 .= " `Docutype` INT NOT NULL , ";
$sql21 .= " `BrchID` INT NOT NULL , ";
$sql21 .= " `DocuDate` DATE NULL , ";
$sql21 .= " `DocuNo` VARCHAR( 50 ) NULL PRIMARY KEY , ";
$sql21 .= " `NetAmnt` DOUBLE( 10,2 )  NULL , ";
$sql21 .= " `CustID` INT  NULL , ";
$sql21 .= " `CustCode` VARCHAR( 50 )  NULL , ";
$sql21 .= " `CustName` VARCHAR( 200 )  NULL , ";
$sql21 .= " `Inactive` VARCHAR( 1 )  NULL , ";
$sql21 .= " `District` VARCHAR( 200 )  NULL  ,  ";
$sql21 .= " `Amphur` VARCHAR( 200 ) NULL  ,  ";
$sql21 .= " `Province` VARCHAR( 200 )  NULL    ";
$sql21 .= " ) ENGINE = InnoDB CHARACTER SET tis620 COLLATE tis620_thai_ci ";
 
 $create_tb21 = mysql_query($sql21) or die(mysql_error()); 

$sql22 = " CREATE TABLE IF NOT EXISTS `salereport_db`.`y1non_tb` ( ";
$sql22 .= " `Docutype` INT NOT NULL , ";
$sql22 .= " `BrchID` INT NOT NULL , ";
$sql22 .= " `DocuDate` DATE NULL , ";
$sql22 .= " `DocuNo` VARCHAR( 50 ) NULL PRIMARY KEY , ";
$sql22 .= " `NetAmnt` DOUBLE( 10,2 )  NULL , ";
$sql22 .= " `CustID` INT  NULL , ";
$sql22 .= " `CustCode` VARCHAR( 50 )  NULL , ";
$sql22 .= " `CustName` VARCHAR( 200 )  NULL , ";
$sql22 .= " `Inactive` VARCHAR( 1 )  NULL , ";
$sql22 .= " `District` VARCHAR( 200 )  NULL  ,  ";
$sql22 .= " `Amphur` VARCHAR( 200 ) NULL  ,  ";
$sql22 .= " `Province` VARCHAR( 200 )  NULL    ";
$sql22 .= " ) ENGINE = InnoDB CHARACTER SET tis620 COLLATE tis620_thai_ci ";
 
 $create_tb22 = mysql_query($sql22) or die(mysql_error()); 

$sql23 = " CREATE TABLE IF NOT EXISTS `salereport_db`.`y6non_tb` ( ";
$sql23 .= " `Docutype` INT NOT NULL , ";
$sql23 .= " `BrchID` INT NOT NULL , ";
$sql23 .= " `DocuDate` DATE NULL , ";
$sql23 .= " `DocuNo` VARCHAR( 50 ) NULL PRIMARY KEY , ";
$sql23 .= " `NetAmnt` DOUBLE( 10,2 )  NULL , ";
$sql23 .= " `CustID` INT  NULL , ";
$sql23 .= " `CustCode` VARCHAR( 50 )  NULL , ";
$sql23 .= " `CustName` VARCHAR( 200 )  NULL , ";
$sql23 .= " `Inactive` VARCHAR( 1 )  NULL , ";
$sql23 .= " `District` VARCHAR( 200 )  NULL  ,  ";
$sql23 .= " `Amphur` VARCHAR( 200 ) NULL  ,  ";
$sql23 .= " `Province` VARCHAR( 200 )  NULL    ";
$sql23 .= " ) ENGINE = InnoDB CHARACTER SET tis620 COLLATE tis620_thai_ci ";
 
 $create_tb23 = mysql_query($sql23) or die(mysql_error()); 

$sql24 = " CREATE TABLE IF NOT EXISTS `salereport_db`.`y7non_tb` ( ";
$sql24 .= " `Docutype` INT NOT NULL , ";
$sql24 .= " `BrchID` INT NOT NULL , ";
$sql24 .= " `DocuDate` DATE NULL , ";
$sql24 .= " `DocuNo` VARCHAR( 50 ) NULL PRIMARY KEY , ";
$sql24 .= " `NetAmnt` DOUBLE( 10,2 )  NULL , ";
$sql24 .= " `CustID` INT  NULL , ";
$sql24 .= " `CustCode` VARCHAR( 50 )  NULL , ";
$sql24 .= " `CustName` VARCHAR( 200 )  NULL , ";
$sql24 .= " `Inactive` VARCHAR( 1 )  NULL , ";
$sql24 .= " `District` VARCHAR( 200 )  NULL  ,  ";
$sql24 .= " `Amphur` VARCHAR( 200 ) NULL  ,  ";
$sql24 .= " `Province` VARCHAR( 200 )  NULL    ";
$sql24 .= " ) ENGINE = InnoDB CHARACTER SET tis620 COLLATE tis620_thai_ci ";
 
 $create_tb24 = mysql_query($sql24) or die(mysql_error()); 



mysql_close($c);
?>