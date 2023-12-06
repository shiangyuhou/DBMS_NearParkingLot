root=$1 
TOKEN=$2
# read -p "input the place to store:" root
mkdir -p $root
# read "input the token" TOKEN
echo $TOKEN
echo "complete"

# ------------------------------------------------------------------------------------------------------------------
list1=(ParkingAvailabilities CarParks ParkingFacilities Operators ParkingEntranceExits ParkingRates ServiceTimes ParkingSpaces Ticketings ParkingSpotAvailabilities ParkingSpots)
list3=(ParkingAvailability CarPark ParkingFacility Operator ParkingEntranceExit ParkingRate ParkingServiceTime ParkingSpace ParkingTicketing ParkingSpotAvailability ParkingSpot)
# list3=(ParkingAvailability)
# 11
# list2=(Kaohsiung  YilanCounty)
list2=(Taoyuan Taipei Taichung Tainan Keelung Kaohsiung Hsinchu MiaoliCounty NantouCounty ChiayiCounty Chiayi PingtungCounty YilanCounty HualienCounty TaitungCounty KinmenCounty LienchiangCounty)
# 15 
# ------------------------------------------------------------------------------------------------------------------
for item2 in "${list2[@]}"; do
    FOLDER="./$root/$item2"
    mkdir -p $FOLDER
    # for item1 in "${list1[@]}"; do
    for ((i = 0; i < ${#list3[@]}; i++)); do
        item1="${list1[i]}"
        item3="${list3[i]}"
        # if [["$item2" == "Keelung" && "$item3" == "ParkingSpace"]]; then
        #     normalURL="https://tdx.transportdata.tw/api/basic/v1/Parking/OffStreet/ParkingSpot/City/$item2?%24format=JSON"
        #     item1=ParkingSpaces
        # elif  [["$item2" == "Keelung" && "$item3" == "ParkingAvailability"]]; then
        #     normalURL="https://tdx.transportdata.tw/api/basic/v1/Parking/OffStreet/ParkingSpotAvailability/City/$item2?%24format=JSON"
        #     item1=ParkingSpotAvailabilities
        # elif  [["$item2" == "Tainan" && "$item3" == "ParkingSpaces"]]; then
        #     normalURL="https://tdx.transportdata.tw/api/basic/v1/Parking/OffStreet/ParkingSpot/City/$item2?%24format=JSON"
        #     item1=ParkingSpots
        # else
        normalURL="https://tdx.transportdata.tw/api/basic/v1/Parking/OffStreet/$item3/City/$item2?%24format=JSON"
        # fi
        FILENAME="$FOLDER/$item3.json"
        # rm $FILENAME
        curl --request GET \
            --url $normalURL \
            --header "authorization: Bearer $TOKEN" | jq ".$item1" > $FILENAME
        echo "$item1 \
            $item2 \
            $item3 \
            $FILENAME" \
            >> $FOLDER/record.txt
        echo $normalURL >> $FOLDER/record_URLtxt
        # sleep .1
        # echo $FILENAME
    done
done
# ------------------------------------------------------------------------------------------------------------------
# echo $FILENAME >> compare.txt


# normal URL = https://tdx.transportdata.tw/api/basic/v1/Parking/OffStreet/***/City/---?%24format=JSON
# *** = [ParkingAvailabilities, CarParks, ParkingFacilities, Operators, ParkingEntranceExits, ParkingRates, ServiceTimes, ParkingSpaces, Ticketings] 
# --- = [Taoyuan,Taipei,Taichung,Tainan,Keelung,Hsinchu,MiaoliCounty,NantouCounty,ChiayiCounty,Chiayi,PingtungCounty,HualienCounty,TaitungCounty,KinmenCounty,LienchiangCounty]

# origin / speci
# ParkingSpaces / ParkingSpots only for [keelung, tainan] 
# ParkingAvailabilities / ParkingSpotAvailabilities [keelung]