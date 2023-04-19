--Add a new table Brand that stores information about car brands.

CREATE TABLE Brand
(
    Brand_ID   INT                NOT NULL PRIMARY KEY,
    Brand_Name VARCHAR(50) UNIQUE NOT NULL
);

--Add a new table Brand_Type that stores information about car brand types, along with their associated brand.

CREATE TABLE Brand_Type
(
    Brand_Type_ID   INT                NOT NULL PRIMARY KEY,
    Brand_ID        INT                NOT NULL,
    Brand_Type_Name VARCHAR(50) UNIQUE NOT NULL,
    FOREIGN KEY (Brand_ID) REFERENCES Brand (Brand_ID)
);

--Modify the Sedan table to store the passenger capacity of each sedan brand type.

ALTER TABLE Sedan
    ADD Passenger_Capacity INT NOT NULL;

--Modify the Truck table to store the loading capacity of each truck brand type.

ALTER TABLE Truck
    ADD Loading_Capacity INT NOT NULL;

-- To allow a car to be owned by multiple people, remove the Person_ID column from the Car table, and create a new table Car_Owner that stores information about car ownership.

CREATE TABLE Car_Owner
(
    Car_Owner_ID INT NOT NULL PRIMARY KEY,
    Person_ID    INT NOT NULL,
    Car_ID       INT NOT NULL,
    FOREIGN KEY (Person_ID) REFERENCES Person (Person_ID),
    FOREIGN KEY (Car_ID) REFERENCES Car (Car_ID)
);

-- After modifying the table structure, we can write the following SQL queries to implement the changes:

--  To add a new brand to the Brand table:

INSERT INTO Brand (Brand_ID, Brand_Name)
VALUES (1, 'Toyota');

-- To add a new brand type to the Brand_Type table, along with its associated brand:

INSERT INTO Brand_Type (Brand_Type_ID, Brand_ID, Brand_Type_Name)
VALUES (1, 1, 'Corolla');

-- To modify the Sedan table to store the passenger capacity of each sedan brand type:

ALTER TABLE Sedan
    ADD Passenger_Capacity INT NOT NULL;

--To modify the Truck table to store the loading capacity of each truck brand type:

ALTER TABLE Truck
    ADD Loading_Capacity INT NOT NULL;

-- To add a new car ownership record to the Car_Owner table:

INSERT INTO Car_Owner (Car_Owner_ID, Person_ID, Car_ID)
VALUES (1, 1, 1); -- Person 1 owns Car 1