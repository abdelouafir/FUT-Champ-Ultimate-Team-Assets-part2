CREATE Table players (
            playerID INT(50) PRIMARY KEY AUTO_INCREMENT,
            NameCOM VARCHAR(11),
            photo VARCHAR(255),
            position VARCHAR(5),
            rating INT(100)
        );

        CREATE TABLE statistickes (
            statistickesGK_id INT(50) PRIMARY KEY AUTO_INCREMENT,
            playerID INT(50) AUTO_INCREMENT,
            pace INT(100),
            shooting int(100),
            passing INT(100),
            dribbling INT(100), 
            defending INT(100),
            physical INT(100),
            FOREIGN KEY(playerID) REFERENCES players(playerID)
        );

        CREATE TABLE statistickesGK(
            statistickesGK_id INT(50) PRIMARY KEY AUTO_INCREMENT,
            playerID INT(50) AUTO_INCREMENT,
            diving INT(100),
            handling int(100),
            kicking INT(100),
            reflexes INT(100), 
            speed INT(100),
            positioning INT(100),
            FOREIGN KEY(playerID) REFERENCES players(playerID)
        );

        CREATE TABLE club (
            clubid INT UNIQUE ,
            numclub VARCHAR(21),
            playerID INT(50) AUTO_INCREMENT,
            FOREIGN KEY(playerID) REFERENCES players(playerID)
        );

        CREATE Table nationality (
            nationality INT UNIQUE ,
            nationalityName VARCHAR(21),
            playerID INT(50) AUTO_INCREMENT,
            FOREIGN KEY(playerID) REFERENCES players(playerID)
        );


















            CREATE TABLE statistickes (
            statistickesGK_id INT(50) PRIMARY KEY AUTO_INCREMENT,
            playerID INT(50) PRIMARY KEY AUTO_INCREMENT,
            pace INT(100),
            shooting int(100),
            passing INT(100),
            dribbling INT(100), 
            physical INT(100),
            FOREIGN KEY(playerID) REFERENCES players(playerID)
        );

        CREATE TABLE statistickesGK(
            statistickesGK_id INT(50) PRIMARY KEY AUTO_INCREMENT,
            playerID INT(50) PRIMARY KEY AUTO_INCREMENT,
            diving INT(100),
            handling int(100),
            kicking INT(100),
            reflexes INT(100), 
            speed INT(100),
            positioning INT(100),
            FOREIGN KEY(playerID) REFERENCES players(playerID)
        );

        CREATE TABLE club (
            clubid INT UNIQUE ,
            numclub VARCHAR(21),
            playerID INT(50) PRIMARY KEY AUTO_INCREMENT,
            FOREIGN KEY(playerID) REFERENCES players(playerID)
        );

        CREATE Table nationality (
            nationality INT UNIQUE ,
            nationalityName VARCHAR(21),
            playerID INT(50) PRIMARY key AUTO_INCREMENT,
            FOREIGN KEY(playerID) REFERENCES players(playerID)
        );