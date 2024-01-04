
SELECT c.CarParkName_Zh_tw
from CarParks as c
join ParkingFacility as p on c.CarParkID=p.CarParkID
where p.FacilityName LIKE '%電梯%'; --#遇到中文query會出錯