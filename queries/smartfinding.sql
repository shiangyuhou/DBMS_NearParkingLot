
SELECT c.CarParkName_Zh_tw
from CarParks as c
join ParkingFacility as p on c.CarParkID=p.CarParkID
where p.FacilityType =25;