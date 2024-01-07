# DBMS_NearParkingLot_README.md

this file can manually update to the Github Project : **NearParkingLot**
  [README.md](https://github.com/shiangyuhou/DBMS_NearParkingLot/blob/main/README.md) file
  
# Links

[Github](https://github.com/shiangyuhou/DBMS_NearParkingLot)

[Discussion](https://hackmd.io/f7ROse65QOiKWZDtE8hClA)


# start mysql server 

(讓mysql處於可以被連線的狀態)

## Create_table

在DBMS_NearParkingLot這個資料夾下，以root 進入 mysql，執行
```
source create_table.sql;
```
可以用check.sql測試是否建立完成
有遇到問題回去看作業0

### 增設使用者帳號/密碼

(這邊又預設為(ss/ss))

以root 進入 mysql
```
sudo mysql -u root -p
```
設置新帳密
```
CREATE USER 'ss'@'localhost' IDENTIFIED BY 'ss';
GRANT ALL PRIVILEGES ON `資料庫名稱`.* TO 'ss'@'localhost';
FLUSH PRIVILEGES;
```

### 檢查使用者帳號設置


```
SELECT User, Host, authentication_string FROM mysql.user;
```

### 刪除帳密

```
DROP USER 'ss'@'localhost';
```

### let php connect to mysql


 需要先安裝 php-mysql 才能透過php連接資料庫


 ```
sudo apt install php-mysql -y
 ```

這樣應該就可以連了，簡單測試內容在 "connect.php"



# 開始 index.php

<!-- git clone git@github.com:shiangyuhou/DBMS_NearParkingLot.git -->

先fork出自己的repo
```
git clone {自己的repo URL 或是 ssh}
像這樣
git clone git@github.com:shiangyuhou/DBMS_NearParkingLot.git
```
啟動server (測試開發用)
```
cd DBMS_NearParkingLot 
php -S localhost:8000

``` 


進入瀏覽器輸入
http://127.0.0.1:8000/php/



## About create table 
```
.  
├── README.md  
├── check.sql               檢查table    
├── create_table.sql        創建table,(目前唯一warning是有重複資料,系統會自動略過)  
├── data_csv                資料庫用來載入/讀取的,處理好的資料  
├── drop.sql                (測試用)把全部建失敗的table通通丟掉  
├── json2csv                處理資料的東東     
│   ├── collect_data        從TDX抓各縣市相關停車資料(json)  
│   │   ├── getAccessToken.sh  
│   │   ├── grabData.sh  
│   │   ├── readme.md       看這個抓
│   │   └── requireAPI.sh  
│   ├── data_csv   
│   ├── exclude             在處理資料前(json2csv)想要排除的column name.    
│   ├── header_name         紀錄針對特殊file的處理  
│   ├── header_name         data_csv的header name  
│   ├── json2csv.py         把($input_folder)裡的json檔轉換成csv
│   │                       檔並存在($output_folder)中.     
│   ├── replace.sh          把"data_csv"放到parent folder (DBMS_Nearingxxx) 裡  
│   └── split.py            把csv的header抓下來
├── queries
│   ├── AED.sql             查詢AED
│   ├── detectionsystem.sql 查詢車位在席偵測系統
│   ├── elevator.sql        查詢電梯(會出bug，因為有中文)
│   ├── lactationroom.sql   查詢哺乳室
│   ├── machine.sql         查詢繳費機
│   ├── smartfinding.sql    查詢智慧尋車機
│   ├── toilet.sql          查詢廁所
│   ├── query.py            將上面的sql包成.py進行查詢
│   └── findlocation.py     1. 輸入citycode，查詢所在城市 2. 輸入經緯度，找最近停車場
```


