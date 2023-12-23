import pymysql

db_settings = {
    "host": "127.0.0.1",
    "port": 3306,
    "user": "root",
    "password": "gry12345", #改成自己主機設的密碼
    "db": "parkinglot", #改成自己資料庫的名字
    "charset": "utf8"
}

querystring="Parkinglot/queries/toilet.sql" #query自行修改

try:
    conn = pymysql.connect(**db_settings)
    with conn.cursor() as cursor:
        command = open(querystring, "r").read()
        cursor.execute(command)
        result = cursor.fetchall()
        print(result)

except Exception as ex:
    print(ex)