<!-- <!DOCTYPE html> -->
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <link rel="stylesheet" href="css/style.css">
    <title>留言板</title>
  
  </head>
  <body>
    
    <header class="warning">
      注意！本站為練習用網站，註冊時請勿使用任何真實的帳號或密碼。
    </header>
  
    <main class="board">
      <div class="board__header">
        <div class="border__word-block">
          <h1 class="board__tittle">Comments</h1>
        </div>
        <div class="board__btn-block">
                <a class="board__btn" href="register.php">Sign up</a>
          <a class="board__btn" href="login.php">Log in</a>
          
        </div>
      </div>
   
      <!-- 這是後端驗證；也可使用前端 JS 判斷，在提交表單時進行驗證 -->
      
      <!-- 如果為登入狀態（有username）即可看到表單 -->
            <h3>請登入發布留言</h3>
        
    <div class="board__hr"></div>
  
    <section>
      <!-- 這邊有兩種做法： -->
      <!-- (1) 用 php 包住整個迴圈，但每段 class 都需用 echo 來跑 -->
      <!-- (2) 如下列方法，將 php 和 html 混用，php 只須包住迴圈條件式，較方便撰寫但不易閱讀-->
        <div class="card">
          <div class="card__avatar"></div>
          <div class="card__body">
              <div class="card__info">
                <!-- 將要輸出的資料改為 php echo -->
                <span class="card__author"></span>
                <span class="card__time">2020-10-01 23:07:12</span>
              </div>
              <p class="card__content"></p><h1>joewif</h1><p></p>
          </div>
        </div>
        <div class="board__hr"></div>
            <div class="card">
          <div class="card__avatar"></div>
          <div class="card__body">
              <div class="card__info">
                <!-- 將要輸出的資料改為 php echo -->
                <span class="card__author"></span>
                <span class="card__time">2020-10-01 23:07:04</span>
              </div>
              <p class="card__content">weijfiowefjoewkfopwk</p>
          </div>
        </div>
        <div class="board__hr"></div>
            <div class="card">
          <div class="card__avatar"></div>
          <div class="card__body">
              <div class="card__info">
                <!-- 將要輸出的資料改為 php echo -->
                <span class="card__author"></span>
                <span class="card__time">2020-09-25 15:59:02</span>
              </div>
              <p class="card__content"><textarea>hihi</textarea></p>
          </div>
        </div>
        <div class="board__hr"></div>
            <div class="card">
          <div class="card__avatar"></div>
          <div class="card__body">
              <div class="card__info">
                <!-- 將要輸出的資料改為 php echo -->
                <span class="card__author"></span>
                <span class="card__time">2020-09-20 16:48:10</span>
              </div>
              <p class="card__content">testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p>
          </div>
        </div>
        <div class="board__hr"></div>
            <div class="card">
          <div class="card__avatar"></div>
          <div class="card__body">
              <div class="card__info">
                <!-- 將要輸出的資料改為 php echo -->
                <span class="card__author"></span>
                <span class="card__time">2020-09-20 16:43:37</span>
              </div>
              <p class="card__content">'), ('admin', 'Hacking!        </p>
          </div>
        </div>
        <div class="board__hr"></div>
            <div class="card">
          <div class="card__avatar"></div>
          <div class="card__body">
              <div class="card__info">
                <!-- 將要輸出的資料改為 php echo -->
                <span class="card__author"></span>
                <span class="card__time">2020-09-20 16:39:28</span>
              </div>
              <p class="card__content">123</p>
          </div>
        </div>
        <div class="board__hr"></div>
            <div class="card">
          <div class="card__avatar"></div>
          <div class="card__body">
              <div class="card__info">
                <!-- 將要輸出的資料改為 php echo -->
                <span class="card__author"></span>
                <span class="card__time">2020-09-20 16:38:13</span>
              </div>
              <p class="card__content">我告訴你一件事實
  .
  .
  兩件八十             </p>
          </div>
        </div>
        <div class="board__hr"></div>
            <div class="card">
          <div class="card__avatar"></div>
          <div class="card__body">
              <div class="card__info">
                <!-- 將要輸出的資料改為 php echo -->
                <span class="card__author"></span>
                <span class="card__time">2020-09-20 16:37:01</span>
              </div>
              <p class="card__content">她是小菜
  .
  .
  然後就被端走了</p>
          </div>
        </div>
        <div class="board__hr"></div>
            <div class="card">
          <div class="card__avatar"></div>
          <div class="card__body">
              <div class="card__info">
                <!-- 將要輸出的資料改為 php echo -->
                <span class="card__author"></span>
                <span class="card__time">2020-09-20 16:34:26</span>
              </div>
              <p class="card__content"></p><h1>編輯測試</h1>          <p></p>
          </div>
        </div>
        <div class="board__hr"></div>
            <div class="card">
          <div class="card__avatar"></div>
          <div class="card__body">
              <div class="card__info">
                <!-- 將要輸出的資料改為 php echo -->
                <span class="card__author"></span>
                <span class="card__time">2020-09-20 16:33:45</span>
              </div>
              <p class="card__content">人生就是不公平的，你要適應它。&ZeroWidthSpace;
  
  Life is not fair, get used to it.
  –比爾·蓋茲 Bill Gates</p>
          </div>
        </div>
        <div class="board__hr"></div>
            <div class="card">
          <div class="card__avatar"></div>
          <div class="card__body">
              <div class="card__info">
                <!-- 將要輸出的資料改為 php echo -->
                <span class="card__author"></span>
                <span class="card__time">2020-09-20 16:33:32</span>
              </div>
              <p class="card__content">あんたが会話のボールを自分から投げられないのは、
  あんたが他人に興味ないからよ。
  
  你不會開話題、不會聊天、是因為你根本對其他人沒有興趣。
  《凪的新生活》          </p>
          </div>
        </div>
        <div class="board__hr"></div>
            <div class="card">
          <div class="card__avatar"></div>
          <div class="card__body">
              <div class="card__info">
                <!-- 將要輸出的資料改為 php echo -->
                <span class="card__author"></span>
                <span class="card__time">2020-09-20 16:31:30</span>
              </div>
              <p class="card__content">你的時間有限，&ZeroWidthSpace;
  不要浪費時間過別人的生活。&ZeroWidthSpace;
  
  Your time is limited, &ZeroWidthSpace;
  so don’t waste it living someone else’s life.&ZeroWidthSpace;
  –史蒂夫·賈伯斯 Steve Jobs                    </p>
          </div>
        </div>
        <div class="board__hr"></div>
            <div class="card">
          <div class="card__avatar"></div>
          <div class="card__body">
              <div class="card__info">
                <!-- 將要輸出的資料改為 php echo -->
                <span class="card__author"></span>
                <span class="card__time">2020-09-20 16:30:56</span>
              </div>
              <p class="card__content">おはようございます！</p>
          </div>
        </div>
        <div class="board__hr"></div>
            <div class="card">
          <div class="card__avatar"></div>
          <div class="card__body">
              <div class="card__info">
                <!-- 將要輸出的資料改為 php echo -->
                <span class="card__author"></span>
                <span class="card__time">2020-09-20 16:30:50</span>
              </div>
              <p class="card__content">おはようございます</p>
          </div>
        </div>
        <div class="board__hr"></div>
            <div class="card">
          <div class="card__avatar"></div>
          <div class="card__body">
              <div class="card__info">
                <!-- 將要輸出的資料改為 php echo -->
                <span class="card__author"></span>
                <span class="card__time">2020-09-19 10:00:18</span>
              </div>
              <p class="card__content">test
  
  test
  
  test</p>
          </div>
        </div>
        <div class="board__hr"></div>
      
    </section>
    </main>
  
  
  
  </body></html>