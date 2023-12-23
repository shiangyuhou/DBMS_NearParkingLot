import pymysql

db_settings = {
    "host": "127.0.0.1",
    "port": 3306,
    "user": "root",
    "password": "gry12345", #改成自己主機設的密碼
    "db": "parkinglot", #改成自己資料庫的名字
    "charset": "utf8"
}

def findcity(citycode):
    try:
        conn = pymysql.connect(**db_settings)
        with conn.cursor() as cursor:
            command = "select c.CarParkName_Zh_tw from Carparks as c where Citycode = '" + citycode + "'"
            cursor.execute(command)
            result = cursor.fetchall()
            print(result)
    except Exception as ex:
        print(ex)

def latnlon(lat, lon):  #lat and lon must be string
    lat=str(lat)
    lon=str(lon)
    try:
        conn = pymysql.connect(**db_settings)
        with conn.cursor() as cursor:
            command = "SELECT c.CarParkName_Zh_tw FROM parkingentranceexit AS p JOIN carparks AS c ON c.CarParkID=p.CarParkID ORDER BY (ABS(p.PositionLat - " + lat + ") + ABS(p.PositionLon - " + lon + ")) LIMIT 1;"
            cursor.execute(command)
            result = cursor.fetchall()
            print(result)
    except Exception as ex:
        print(ex)

latnlon("25.067829", "121.662017")  #query自行修改
