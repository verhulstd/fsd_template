/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table geocaches
# ------------------------------------------------------------

DROP TABLE IF EXISTS `geocaches`;

CREATE TABLE `geocaches` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` longtext,
  `hint` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `level_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `geocaches` WRITE;
/*!40000 ALTER TABLE `geocaches` DISABLE KEYS */;

INSERT INTO `geocaches` (`id`, `name`, `description`, `hint`, `latitude`, `longitude`, `level_id`)
VALUES
	(1,'Castle Quest','A geocache near a historic Belgian castle.','Look near the old tree.',50.8798,4.7005,1),
	(2,'Ardennes Treasure','Hidden in the lush forests of the Ardennes.','Under the mossy rock.',50.2672,5.8663,2),
	(3,'Brussels Adventure','Located near a famous monument in Brussels.','Check near the base of the statue.',50.8467,4.3517,3),
	(4,'Atomium View','A cache with a great view of the Atomium.','Hidden near the observation point.',50.8952,4.3415,4),
	(5,'Antwerp Port Puzzle','A tricky geocache near the port of Antwerp.','Follow the trail markers.',51.2194,4.4025,1),
	(6,'Wallonian Woods','A serene spot in the woods of Wallonia.','Search inside the hollow log.',50.5039,4.4699,1),
	(7,'Flanders Fields Find','Commemorate history with this geocache.','Look beneath the memorial bench.',50.8453,2.8797,2),
	(8,'Meuse Riverside','A scenic riverside cache near Namur.','Check under the large stone.',50.4674,4.8715,2),
	(9,'Grand Place Hidden Gem','A small cache near the iconic Grand Place in Brussels.','Behind the ornate lamp post.',50.8467,4.3524,2),
	(10,'Limburg Orchard Cache','Hidden near a blooming apple orchard in Limburg.','Under the fence post.',50.9375,5.3426,3),
	(11,'Bruges Canal Cache','Hidden near the picturesque canals of Bruges.','Behind the ivy-covered wall.',51.2093,3.2247,3),
	(12,'Ghent\'s Secret Spot','A geocache in the historic heart of Ghent.','Look beneath the small bridge.',51.0543,3.7174,3),
	(13,'Leuven Library Cache','Near the famous university library.','Hidden in the shrubbery.',50.8798,4.7003,3),
	(14,'Dinant Citadel Surprise','Located near the iconic Citadel of Dinant.','Under the wooden bench.',50.2611,4.9117,3),
	(15,'Liège Riverfront Cache','Along the banks of the Meuse in Liège.','Check the base of the lamppost.',50.6337,5.5675,3),
	(16,'Namur Fortress Find','A cache near the historic fortress of Namur.','Under the stone steps.',50.4674,4.8715,3),
	(17,'Arlon Border Cache','Close to the Luxembourg border.','Look near the road sign.',49.6833,5.8167,2),
	(18,'Zwin Nature Park','A geocache in a beautiful bird reserve.','Under the observation deck.',51.3353,3.3532,1),
	(19,'Ypres Memorial Cache','Located near the Menin Gate.','Check the stone ledge.',50.8508,2.8857,1),
	(20,'Kortrijk Hidden Spot','Near the Broel Towers in Kortrijk.','Under the large tree.',50.8281,3.2654,1),
	(21,'Waterloo Battlefield','A cache on the famous battlefield.','Behind the monument.',50.6807,4.4126,2),
	(22,'Hasselt Garden Find','Located in a peaceful Japanese garden.','Hidden near the bridge.',50.9311,5.3378,3),
	(23,'Charleroi Industrial Cache','Near an old factory site.','Look behind the metal gate.',50.4114,4.4447,3),
	(24,'Forest of Soignes','A serene forest near Brussels.','Under the fallen log.',50.7681,4.4214,3),
	(25,'Spa Mineral Cache','Located in the town of Spa.','Behind the fountain.',50.4922,5.8636,2),
	(26,'Durbuy Old Town','A geocache in the smallest city in the world.','Check under the bench.',50.3527,5.4541,1),
	(27,'Comblain-la-Tour Cave','Near the entrance of a famous cave.','Hidden in the rocky outcrop.',50.4414,5.5793,2),
	(28,'Rochefort Abbey Cache','Close to a historic abbey.','Look under the wooden beam.',50.1602,5.2217,3),
	(29,'Stavelot Carnival Spot','Hidden near the Carnival Museum.','Behind the stone pillar.',50.3957,5.9302,3),
	(30,'La Roche Castle','A geocache at the ruins of La Roche-en-Ardenne.','Under the stone arch.',50.1815,5.5759,4),
	(31,'Tournai Cathedral Cache','Near the historic cathedral in Tournai.','Hidden under the stairs.',50.6071,3.3898,1),
	(32,'Chimay Brewery Find','A geocache near the famous brewery.','Under the wooden fence.',50.0459,4.3179,2),
	(33,'Seraing Steel Cache','Hidden near an industrial heritage site.','Behind the old machinery.',50.5833,5.4893,2),
	(34,'Anseremme Riverside','A scenic riverside cache near Dinant.','Check near the tree roots.',50.2467,4.9069,3),
	(35,'Lier Clock Tower','A cache near the Zimmer Tower in Lier.','Behind the stone wall.',51.1317,4.5709,1),
	(36,'Mol Sandy Trails','A hidden gem in the sandy trails of Mol.','Under the wooden bridge.',51.1913,5.1107,4),
	(37,'Eupen Lake Cache','Near the beautiful Lake Eupen.','Behind the large rock.',50.6188,6.0392,3),
	(38,'Herstal Viewpoint','A geocache with a stunning view.','Check near the binoculars.',50.6623,5.6365,2),
	(39,'Aarschot Church Cache','Close to the Gothic church in Aarschot.','Under the bench.',50.9867,4.8325,1),
	(40,'Veurne Market Square','A cache near the charming market square.','Behind the lamppost.',51.0736,2.6697,1),
	(41,'Blankenberge Pier Cache','Hidden near the famous pier.','Under the boardwalk.',51.3124,3.1327,2),
	(42,'Ostend Lighthouse','A geocache near the Ostend lighthouse.','Behind the stone wall.',51.2325,2.9288,3),
	(43,'Nieuwpoort Dunes','Hidden in the dunes near Nieuwpoort.','Under the small bush.',51.1323,2.7536,4),
	(44,'Mons Belfry Cache','A geocache near the Belfry of Mons.','Look near the garden fence.',50.4542,3.9567,3),
	(45,'Huy Bridge Cache','Located near a historic bridge in Huy.','Check the stone railing.',50.5198,5.2401,3),
	(46,'Zottegem Castle','Hidden near an ancient castle.','Behind the large oak tree.',50.8674,3.8054,2),
	(47,'Geraardsbergen Wall','A geocache at the famous Muur van Geraardsbergen.','Under the stone marker.',50.7729,3.8828,1),
	(48,'Florenville Abbey','Close to a peaceful abbey in Florenville.','Behind the old wooden gate.',49.7,5.3237,1),
	(49,'Overijse Vineyards','Hidden in the Overijse vineyards.','Under the trellis.',50.7748,4.5348,2),
	(50,'Hoegaarden Brewery','Near the birthplace of Hoegaarden beer.','Behind the stone wall.',50.7787,4.8881,3),
	(51,'Zaventem Aviation Cache','Close to the Brussels Airport.','Check near the old fence.',50.9014,4.4844,2),
	(52,'Louvain-la-Neuve Park','A geocache in a tranquil park.','Under the bench.',50.6681,4.6144,1),
	(53,'Turnhout Beguinage','Hidden in a historic beguinage.','Behind the wooden door.',51.3225,4.949,2),
	(54,'Middelkerke Coastal Cache','Near the coastline of Middelkerke.','Under the driftwood.',51.184,2.8171,2),
	(55,'Knokke Nature Reserve','Hidden in the Zwin Nature Reserve.','Behind the observation tower.',51.3617,3.3458,3),
	(56,'Bouillon Castle','A geocache at the medieval castle of Bouillon.','Under the stone step.',49.7948,5.0699,4),
	(57,'Villers-la-Ville Abbey','Hidden near the ruins of Villers Abbey.','Behind the broken pillar.',50.5885,4.5292,1),
	(58,'Mechelen Tower Cache','Close to St. Rumbold\'s Tower in Mechelen.','Behind the stone bench.',51.0268,4.4786,4);

/*!40000 ALTER TABLE `geocaches` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table geolevels
# ------------------------------------------------------------

DROP TABLE IF EXISTS `geolevels`;

CREATE TABLE `geolevels` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `weight` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `geolevels` WRITE;
/*!40000 ALTER TABLE `geolevels` DISABLE KEYS */;

INSERT INTO `geolevels` (`id`, `name`, `weight`)
VALUES
	(1,'Easy',100),
	(2,'Hard',300),
	(3,'Impossible',400),
	(4,'Medium',200);

/*!40000 ALTER TABLE `geolevels` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;