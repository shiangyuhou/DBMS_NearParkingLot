<!DOCTYPE html>
<html lang="en">
<head>
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
    <div class ="board__header">
      <h1 class="board__tittle">Log in</h1>
      <div class="board__btn-block">
        <a class="board__btn" href="index.php">Back</a>
        <a class="board__btn" href="register.php">Sign in</a>
      </div>
    </div>
 
    <!-- 這是後端驗證；也可使用前端 JS 判斷，在提交表單時進行驗證 -->
        <!-- 提交表單後會導向 handle_add_comment.php 來新增留言 -->
    <form class="board__new-comment-form" method="POST" action="handle_login.php">
      <div class="board__nickname">
        <span>帳號：</span>
        <input type="text" name="username">
      </div>
        <div class="board__nickname">
        <span>密碼：</span>
        <input type="password" name="password">
      </div>
      <input class="board__submit-btn" type="submit">
    </form>

</body>
</html>
