CREATE TABLE Person (
                        Person_ID INT NOT NULL PRIMARY KEY,
                        First_name VARCHAR(50) NOT NULL,
                        Last_name VARCHAR(50) NOT NULL
);

CREATE TABLE Car (
                     Car_ID INT NOT NULL PRIMARY KEY,
                     License_plate VARCHAR(20) UNIQUE NOT NULL
);

CREATE TABLE Person_Car (
                            Person_Car_ID INT NOT NULL PRIMARY KEY,
                            Person_ID INT NOT NULL,
                            Car_ID INT NOT NULL,
                            FOREIGN KEY (Person_ID) REFERENCES Person(Person_ID),
                            FOREIGN KEY (Car_ID) REFERENCES Car(Car_ID)
);

CREATE TABLE Car_Type (
                          Car_Type_ID INT NOT NULL PRIMARY KEY,
                          Type_Name VARCHAR(20) UNIQUE NOT NULL
);

CREATE TABLE Sedan (
                       Sedan_ID INT NOT NULL PRIMARY KEY,
                       Car_ID INT NOT NULL,
                       Car_Type_ID INT NOT NULL,
                       FOREIGN KEY (Car_ID) REFERENCES Car(Car_ID),
                       FOREIGN KEY (Car_Type_ID) REFERENCES Car_Type(Car_Type_ID)
);

CREATE TABLE Truck (
                       Truck_ID INT NOT NULL PRIMARY KEY,
                       Car_ID INT NOT NULL,
                       Car_Type_ID INT NOT NULL,
                       FOREIGN KEY (Car_ID) REFERENCES Car(Car_ID),
                       FOREIGN KEY (Car_Type_ID) REFERENCES Car_Type(Car_Type_ID)
);
