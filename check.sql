/*
check every table build success or not
*/
SELECT PositionLat, PositionLon, CarParkType, CarParkID, FareDescription
from CarParks
limit 20;

SELECT OperatorID, OperatorName_Zh_tw
from Operator
limit 10;

SELECT CarParkID, CarParkName_Zh_tw
from ParkingAvailability
limit 10;


SELECT CarParkID, CarParkName_Zh_tw
from ParkingEntranceExit
limit 10;

SELECT CarParkID, CarParkName_Zh_tw
-- SELECT *
from ParkingFacility
limit 10;

SELECT CarParkID, CarParkName_Zh_tw
from ParkingRate
limit 10;

-- SELECT CarParkID, CarParkName_Zh_tw
SELECT *
from ParkingServiceTime
limit 10;

-- SELECT CarParkID, CarParkName_Zh_tw
SELECT *
from ParkingSpace
limit 10;

-- SELECT CarParkID, CarParkName_Zh_tw
SELECT *
from ParkingSpot
limit 10;
-- SELECT * from ParkingSpot limit 10;
/*
{
    "CarParkID": "KEE12111",
    "CarParkName": {
      "Zh_tw": "65高地停車場"
    },
    "Spots": [
      {
        "ParkingSpotID": "KEE-008",
        "SpaceType": 1,
        "HasChargingPoint": 0,
        "Length": 530,
        "Width": 250,
        "Floor": "1"
      },
      {
        "ParkingSpotID": "KEE-001",
        "SpaceType": 1,
        "HasChargingPoint": 0,
        "Length": 530,
        "Width": 250,
        "Floor": "1"
      },
      {
        "ParkingSpotID": "KEE-026",
        "SpaceType": 1,
        "HasChargingPoint": 0,
        "Length": 530,
        "Width": 250,
        "Floor": "1"
      },
      {
        "ParkingSpotID": "KEE-007",
        "SpaceType": 1,
        "HasChargingPoint": 0,
        "Length": 530,
        "Width": 250,
        "Floor": "1"
      },
*/



-- SELECT CarParkID, CarParkName_Zh_tw
SELECT *
from ParkingSpotAvailability
limit 10;
/*
{
    "CarParkID": "KEE12111",
    "CarParkName": {
      "Zh_tw": "65高地停車場"
    },
    "SpotAvailabilities": [
      {
        "ParkingSpotID": "KEE-001",
        "SpaceType": 1,
        "ServiceStatus": 1,
        "SpotStatus": 255,
        "DeviceStatus": 1,
        "Floor": "1",
        "ChargeStatus": 1,
        "DataCollectTime": "2022-04-29T15:10:52+08:00"
      },
      {
        "ParkingSpotID": "KEE-002",
        "SpaceType": 1,
        "ServiceStatus": 1,
        "SpotStatus": 255,
        "DeviceStatus": 1,
        "Floor": "1",
        "ChargeStatus": 1,
        "DataCollectTime": "2022-04-29T15:10:52+08:00"
      },
      {
        "ParkingSpotID": "KEE-003",
        "SpaceType": 1,
        "ServiceStatus": 1,
        "SpotStatus": 255,
        "DeviceStatus": 1,
        "Floor": "1",
        "ChargeStatus": 1,
        "DataCollectTime": "2022-04-29T15:10:52+08:00"
      },
      {
        "ParkingSpotID": "KEE-004",
        "SpaceType": 1,
        "ServiceStatus": 1,
        "SpotStatus": 255,
        "DeviceStatus": 1,
        "Floor": "1",
        "ChargeStatus": 1,
        "DataCollectTime": "2022-04-29T15:10:52+08:00"
      },
*/

SELECT CarParkID, CarParkName_Zh_tw,  PaymentDescription
from ParkingTicketing
limit 10;
