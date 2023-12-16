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
    CarParkType int ,
    ParkingGuideType int ,

    -- ParkingTypes tinyint ,
    -- ParkingSiteTypes tinyint ,
    -- ChargeTypes tinyint ,

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
    ProhibitedForAnyHazardousMaterialLoads VARCHAR(20) ,
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
    Availabilities_SpaceType int,
    Availabilities_NumberOfSpaces int,
    Availabilities_AvailableSpaces int,
    -- Availabilities VARCHAR(100),
    ServiceStatus tinyint,
    FullStatus tinyint,
    ChargeStatus tinyint,
    DataCollectTime VARCHAR(60) 
);

CREATE TABLE IF NOT EXISTS ParkingEntranceExit (
    primary key (CarParkID, CarParkName_Zh_tw),
    CarParkID VARCHAR(20),
    CarParkName_Zh_tw VARCHAR(40),
    EntranceExitType tinyint,
    EntranceExitName_Zh_tw VARCHAR(30),
    PositionLat FLOAT,
    PositionLon FLOAT,
    `Type` VARCHAR(10),
    MaxAllowedHeight VARCHAR(30),
    RoadID VARCHAR(10),
    LinkID VARCHAR(10),
    RoadName VARCHAR(30),
    Bearing VARCHAR(10)
    
    -- Entrances VARCHAR(10),
    -- Exits VARCHAR(10),
    -- EntranceExits VARCHAR(255)

);

CREATE TABLE IF NOT EXISTS ParkingFacility (
    primary key (CarParkID, CarParkName_Zh_tw),
    CarParkID VARCHAR(20),
    CarParkName_Zh_tw VARCHAR(40),
    -- Facilities TEXT
    FacilityName VARCHAR(30),
    FacilityType VARCHAR(20),
    LocationDescription VARCHAR(200)

);

CREATE TABLE IF NOT EXISTS ParkingRate (
    primary key (CarParkID, CarParkName_Zh_tw),
    CarParkID VARCHAR(20),
    CarParkName_Zh_tw VARCHAR(40),
    `Description` VARCHAR(255),
    HourlyRates VARCHAR(255),
    RateDescription VARCHAR(255),
    RestrictionUserType VARCHAR(5),
    SpaceType VARCHAR(5),
    RateQualifier VARCHAR(5),
    RatePrice VARCHAR(5),
    MaxPrice VARCHAR(6),
    MinHalfHourCharge VARCHAR(5),
    StartTime VARCHAR(10),
    EndTime VARCHAR(10),
    ServiceDay_Monday VARCHAR(3),
    ServiceDay_Tuesday VARCHAR(3),
    ServiceDay_Wednesday VARCHAR(3),
    ServiceDay_Thursday VARCHAR(3),
    ServiceDay_Friday VARCHAR(3),
    ServiceDay_Saturday VARCHAR(3),
    ServiceDay_Sunday VARCHAR(3),
    ServiceDay_NationalHolidays VARCHAR(3)
    
    -- RestrictionUserType tinyint DEFAULT 0,
    -- SpaceType tinyint DEFAULT 0,
    -- RateQualifier tinyint DEFAULT 0,
    -- MinHalfHourCharge tinyint DEFAULT -1,

    -- ServiceDay_Monday boolean DEFAULT 0,
    -- ServiceDay_Tuesday boolean DEFAULT 0,
    -- ServiceDay_Wednesday boolean DEFAULT 0,
    -- ServiceDay_Thursday boolean DEFAULT 0,
    -- ServiceDay_Friday boolean DEFAULT 0,
    -- ServiceDay_Saturday boolean DEFAULT 0,
    -- ServiceDay_Sunday boolean DEFAULT 0,
    -- ServiceDay_NationalHolidays boolean DEFAULT 0

);

CREATE TABLE IF NOT EXISTS ParkingServiceTime (
    primary key (CarParkID, CarParkName_Zh_tw),
    CarParkID VARCHAR(20),
    CarParkName_Zh_tw VARCHAR(40),
    ServiceDay_ServiceTag VARCHAR(20),
    ServiceDay_Monday boolean,
    ServiceDay_Tuesday boolean,
    ServiceDay_Wednesday boolean,
    ServiceDay_Thursday boolean,
    ServiceDay_Friday boolean,
    ServiceDay_Saturday boolean,
    ServiceDay_Sunday boolean,
    ServiceDay_NationalHolidays boolean,
    `Description` VARCHAR(40),
    StartTime time,
    EndTime time,
    FreeOfCharge boolean
    -- OpeningHours VARCHAR(10000)

);


CREATE TABLE IF NOT EXISTS ParkingSpace (
    primary key (CarParkID, CarParkName_Zh_tw),
    CarParkID VARCHAR(20),
    CarParkName_Zh_tw VARCHAR(40),
    TotalSpaces int,
    SpaceType int,
    IsMechanical boolean,
    HasChargingPoint boolean,
    NumberOfSpaces int,
    StayType int

);


CREATE TABLE IF NOT EXISTS ParkingSpot (
    CarParkID VARCHAR(20),
    CarParkName_Zh_tw VARCHAR(40),
    ParkingSpotID VARCHAR(20),
    SpaceType tinyint,
    HasChargingPoint boolean,
    Floor VARCHAR(3)
);


CREATE TABLE IF NOT EXISTS ParkingSpotAvailability (
    CarParkID VARCHAR(20),
    CarParkName_Zh_tw VARCHAR(40),
    ParkingSpotID VARCHAR(20),
    SpaceType int,
    ServiceStatus tinyint,
    SpotStatus int,
    DeviceStatus tinyint,
    Floor VARCHAR(3),
    ChargeStatus tinyint,
    DataCollectTime DATETIME 

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
    PaymentDescription VARCHAR(200),
    HasTicketingMachine tinyint,
    TicketingMachine_DisabledFriendly tinyint,
    -- TicketingMachine_Positions tinyint,
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


-- bad data removed
-- ,,NULL,test@123.com,花蓮市商校街234號旁,
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


-- the enclosed have some problem
-- removed from data file
-- 001,府前廣場地下停車場,廁所,2,"主停地下1樓樓梯旁與副停地下1樓,地下2樓樓梯旁"
-- tsa004,草屯鎮公有零售市場地下停車場(市一停車場),電梯,1,"3部(和興街,碧山南路,太平路)"
-- KEE11307,信義國小地下停車場,繳費機,18,"出入口柵欄機旁,ABC梯廳旁皆有"
-- 087,民有市場地下停車場,電動車充電站,19,"B2-34,35車格"

load data local infile './data_csv/ParkingFacility_output.csv'
into table ParkingFacility
fields terminated by ','
enclosed by '"'
lines terminated by '\n'
ignore 1 lines;

load data local infile './data_csv/ParkingRate_output.csv'
into table ParkingRate
fields terminated by ','
enclosed by '"'
lines terminated by '\n'
ignore 1 lines;

load data local infile './data_csv/ParkingServiceTime_output.csv'
into table ParkingServiceTime
fields terminated by ','
enclosed by '"'
lines terminated by '\n'
ignore 1 lines;




-- duplicate name!!
load data local infile './data_csv/ParkingSpace_output.csv'
into table ParkingSpace
fields terminated by ','
enclosed by '"'
lines terminated by '\n'
ignore 1 lines;

load data local infile './data_csv/ParkingSpot_output.csv'
into table ParkingSpot
fields terminated by ','
enclosed by '"'
lines terminated by '\n'
ignore 1 lines;

load data local infile './data_csv/ParkingSpotAvailability_output.csv'
into table ParkingSpotAvailability
fields terminated by ','
enclosed by '"'
lines terminated by '\n'
ignore 1 lines;


load data local infile './data_csv/ParkingTicketing_output.csv'
into table ParkingTicketing
fields terminated by ','
enclosed by '"'
lines terminated by '\n'
ignore 1 lines;
