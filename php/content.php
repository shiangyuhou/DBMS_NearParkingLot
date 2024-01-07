<?php
    $iter = 1;
    // 把 $result 資料的 Key 值設定為欄位名稱的陣列
    //   while($row = $result->fetch_assoc()) {
    while($iter <= 10) {
?>

<div class="board__hr"></div>

<div class="card">
    <div class="card__avatar"></div>
    <div class="card__body">
        <div class="card__info"></div>
        <p class="card__content"></p>
        <h2>test <?php echo $iter; ?></h2>
        <p class="card__content"></p>
    </div>
</div>

  <!-- <div class="card">
    <div class="card__avatar"></div>
    <div class="card__body">
        <div class="card__info">
          <span class="card__author"><?php echo $row['nickname']; ?></span>
          <span class="card__time"><?php echo $row['created_at']; ?></span>
        </div>
        <p class="card__content"><?php echo $row['content']; ?></p>
    </div>
  </div>
  <div class="board__hr"></div> -->


<?php 
$iter++;
}
?>