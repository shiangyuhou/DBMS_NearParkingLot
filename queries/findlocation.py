import pymysql

db_settings = {
    "host": "127.0.0.1",
    "port": 3306,
    "user": "root",
    "password": "gry12345", #改成自己主機設的密碼
    "db": "parkinglot", #改成自己資料庫的名字
    "charset": "utf8"
}

citycode = "TPE" #query自行修改

try:
    conn = pymysql.connect(**db_settings)
    with conn.cursor() as cursor:
        command = "select c.CarParkName_Zh_tw from Carparks as c where Citycode = '" + citycode + "'"
        cursor.execute(command)
        result = cursor.fetchall()
        print(result)

except Exception as ex:
    print(ex)