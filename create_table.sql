-- Create a table to store CarParks data



CREATE TABLE IF NOT EXISTS CarParks (
    primary key (CarParkID, CarParkName_Zh_tw),
    CarParkID VARCHAR(20),
    CarParkName_Zh_tw VARCHAR(40),
    -- CarParkName VARCHAR(255),
    -- CarParkRegNo VARCHAR(255),
    -- CarParkShortName VARCHAR(255),
    OperatorID VARCHAR(20),
    `Description` VARCHAR(255),
    -- `Geometry` VARCHAR(255),
    CarParkType tinyint ,
    ParkingGuideType tinyint ,
    ParkingTypes tinyint ,
    ParkingSiteTypes tinyint ,
    ChargeTypes tinyint ,
    -- Telephone VARCHAR(20),
    PositionLat DECIMAL(10, 6),
    PositionLon DECIMAL(10, 6),
    -- Email VARCHAR(255),
    `Address` VARCHAR(255),
    FareDescription VARCHAR(255),
    IsFreeParkingOutOfHours tinyint ,
    IsPublic tinyint , 
    IsMotorcycle tinyint ,
    OperationType tinyint ,
    LiveOccupancyAvailable tinyint ,
    EVRechargingAvailable tinyint ,
    MonthlyTicketAvailable tinyint ,
    SeasonTicketAvailable tinyint ,
    ReservationAvailable tinyint ,
    WheelchairAccessible tinyint ,
    OvernightPermitted INT,
    TicketMachine tinyint ,
    Toilet tinyint ,
    Restaurant tinyint ,
    GasStation tinyint ,
    Shop tinyint ,
    Gated tinyint ,
    Lighting tinyint ,
    SecureParking tinyint ,
    TicketOffice tinyint ,
    ProhibitedForAnyHazardousMaterialLoads tinyint ,
    SecurityGuard tinyint ,
    Supervision tinyint ,
    City VARCHAR(255),
    CityCode VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS Operator (
    primary key (OperatorID, OperatorName_Zh_tw),
    OperatorID VARCHAR(20),
    OperatorName_Zh_tw VARCHAR(40),
    Telephone VARCHAR(15),
    Email VARCHAR(40),
    `Address` VARCHAR(50),
    BAN int
);

CREATE TABLE IF NOT EXISTS ParkingAvailability (
    primary key (CarParkID, CarParkName_Zh_tw),
    CarParkID VARCHAR(20),
    CarParkName_Zh_tw VARCHAR(40),
    TotalSpaces int,
    AvailableSpaces int,
    Availabilities VARCHAR(100),
    ServiceStatus tinyint,
    FullStatus tinyint,
    ChargeStatus tinyint,
    DataCollectTime VARCHAR(50)
);

CREATE TABLE IF NOT EXISTS ParkingEntranceExit (
    primary key (CarParkID, CarParkName_Zh_tw),
    CarParkID VARCHAR(20),
    CarParkName_Zh_tw VARCHAR(40),
    EntranceExitType tinyint,
    Entrances VARCHAR(10),
    Exits VARCHAR(10),
    EntranceExits VARCHAR(255)

);

CREATE TABLE IF NOT EXISTS ParkingFacility (
    primary key (CarParkID, CarParkName_Zh_tw),
    CarParkID VARCHAR(20),
    CarParkName_Zh_tw VARCHAR(40),
    Facilities TEXT

);

CREATE TABLE IF NOT EXISTS ParkingRate (
    primary key (CarParkID, CarParkName_Zh_tw),
    CarParkID VARCHAR(20),
    CarParkName_Zh_tw VARCHAR(40),
    `Description` VARCHAR(255),
    HourlyRates VARCHAR(255)

);

CREATE TABLE IF NOT EXISTS ParkingServiceTime (
    primary key (CarParkID, CarParkName_Zh_tw),
    CarParkID VARCHAR(20),
    CarParkName_Zh_tw VARCHAR(40),
    OpeningHours VARCHAR(10000)

);


CREATE TABLE IF NOT EXISTS ParkingSpace (
    primary key (CarParkID, CarParkName_Zh_tw),
    CarParkID VARCHAR(20),
    CarParkName_Zh_tw VARCHAR(40),
    TotalSpaces int,
    Spaces VARCHAR(16300)

);


CREATE TABLE IF NOT EXISTS ParkingSpot (
    CarParkID VARCHAR(20),
    CarParkName_Zh_tw VARCHAR(40),
    spots VARCHAR(3000)
);


CREATE TABLE IF NOT EXISTS ParkingSpotAvailability (
    CarParkID VARCHAR(20),
    CarParkName_Zh_tw VARCHAR(40),
    SpotAvailabilities VARCHAR(16300)

);

CREATE TABLE IF NOT EXISTS ParkingTicketing (
    CarParkID VARCHAR(20),
    CarParkName_Zh_tw VARCHAR(40),
    HasInvoice tinyint,
    InvoiceType_DuplicateUniform tinyint,
    InvoiceType_TriplicateUniform tinyint,
    InvoiceSupport_BANPrinted tinyint,
    InvoiceSupport_Donation tinyint,
    HasEInvoice tinyint,
    HasEInvoiceCarrier tinyint,
    EInvoiceCarrierType_Generic tinyint,
    EInvoiceCarrierType_SmartCard tinyint,
    EInvoiceCarrierType_CreditCard tinyint,
    EInvoiceCarrierType_DebitCard tinyint,
    EInvoiceCarrierType_MemberCard tinyint,
    EInvoiceCarrierType_DonationCode tinyint,
    PaymentProcess_PayAndDisplay tinyint,
    PaymentProcess_PayByPrepaidToken tinyint,
    PaymentProcess_PayAtExitBoothManualCollection tinyint,
    PaymentProcess_PayAtMachineOnFootPriorToExit tinyint,
    PaymentProcess_PayBySmartCard tinyint,
    PaymentProcess_PayByMobile tinyint,
    PaymentProcess_PayByEtag tinyint,
    PaymentProcess_Others tinyint,
    PaymentMethod_Cash tinyint,
    PaymentMethod_CreditCard tinyint,
    PaymentMethod_SmartCard tinyint,
    PaymentMethod_ETC tinyint,
    PaymentMethod_MobilePayment tinyint,
    PaymentMethod_Token tinyint,
    PaymentMethod_Others tinyint,
    SmartCard_EasyCard tinyint,
    SmartCard_IPASS tinyint,
    SmartCard_ICash tinyint,
    SmartCard_HappyCash tinyint,
    PaymentDescription VARCHAR(60),
    HasTicketingMachine tinyint,
    TicketingMachine_DisabledFriendly tinyint,
    TicketingMachine_Positions tinyint,
    HasTicketingValidator tinyint,
    TicketingValidatorType_Contactless tinyint,
    TicketingValidatorType_Magnetic tinyint,
    TicketingValidatorType_NFC tinyint,
    TicketingValidatorType_RFID tinyint,
    TicketingValidatorType_Others tinyint

);


load data local infile './data_csv/CarPark_output.csv'
into table CarParks
fields terminated by ','
enclosed by '"'
lines terminated by '\n'
ignore 1 lines;

load data local infile './data_csv/Operator_output.csv'
into table Operator
fields terminated by ','
enclosed by '"'
lines terminated by '\n'
ignore 1 lines;

load data local infile './data_csv/ParkingAvailability_output.csv'
into table ParkingAvailability
fields terminated by ','
enclosed by '"'
lines terminated by '\n'
ignore 1 lines;

load data local infile './data_csv/ParkingEntranceExit_output.csv'
into table ParkingEntranceExit
fields terminated by ','
enclosed by '"'
lines terminated by '\n'
ignore 1 lines;

-- load data local infile './data_csv/ParkingFacility_output.csv'
-- into table ParkingFacility
-- fields terminated by ','
-- enclosed by '"'
-- lines terminated by '\n'
-- ignore 1 lines;

load data local infile './data_csv/ParkingRate_output.csv'
into table ParkingRate
fields terminated by ','
enclosed by '"'
lines terminated by '\n'
ignore 1 lines;

-- load data local infile './data_csv/ParkingServiceTime_output.csv'
-- into table ParkingServiceTime
-- fields terminated by ','
-- enclosed by '"'
-- lines terminated by '\n'
-- ignore 1 lines;

-- load data local infile './data_csv/ParkingSpace_output.csv'
-- into table ParkingSpace
-- fields terminated by ','
-- enclosed by '"'
-- lines terminated by '\n'
-- ignore 1 lines;

-- load data local infile './data_csv/ParkingSpot_output.csv'
-- into table ParkingSpot
-- fields terminated by ','
-- enclosed by '"'
-- lines terminated by '\n'
-- ignore 1 lines;

-- load data local infile './data_csv/ParkingSpotAvailability_output.csv'
-- into table ParkingSpotAvailability
-- fields terminated by ','
-- enclosed by '"'
-- lines terminated by '\n'
-- ignore 1 lines;


load data local infile './data_csv/ParkingTicketing_output.csv'
into table ParkingTicketing
fields terminated by ','
enclosed by '"'
lines terminated by '\n'
ignore 1 lines;
