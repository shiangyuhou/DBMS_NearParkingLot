# DBMS_NearParkingLot_README.md

this file can manually update to the Github Project : **NearParkingLot**
  [README.md](https://github.com/shiangyuhou/DBMS_NearParkingLot/blob/main/README.md) file
  
## Links

[Github](https://github.com/shiangyuhou/DBMS_NearParkingLot)

[Discussion](https://hackmd.io/f7ROse65QOiKWZDtE8hClA)



## About create table 

----Main Folder
  |         
  |-/check.sql
  |         檢查table
  |
  |-/create_table.sql
  |         創建table,(目前唯一warning是有重複資料,系統會自動略過)
  |
  |-/drop.sql
  |         (測試用)把全部建失敗的table通通丟掉
  |
  |--/data_csv/
  |         資料庫用來載入的檔案
  |
  |--/json2csv/
  |         處理資料的東東
  |         |
  |         |
            |--/collect_data/
            |         從TDX網站上抓json檔下來
            |         |含另一readme.md檔案可參
            |
            |--/db_ssh/
            |         未處理的json file
            |
            |--/data_csv/ 
            |         處理好的csv檔案
            |
            |--/exclude/ 
            |         在處理資料前(json2csv)想要排除的column name. 
            |         json2csv.py最後會把指定的column 給刪掉
            |         
            |-/json2csv.py 
            |         把($input_folder)裡的json檔轉換成csv檔並存在($output_folder)中.
            |         
            |-/handle_detail         
            |         紀錄針對特殊file的處理
            |         
            |-/split.py         
            |         把csv的header抓下來看
            |         
            |-/replace.sh         
            |         把"data_csv"放到parent folder (DBMS_Nearingxxx) 裡
            |         
            |         



