<?php
    $iter = 1;
    // 把 $result 資料的 Key 值設定為欄位名稱的陣列
    while($row = $result->fetch_assoc()) {
    // while($iter <= 10) {
?>

<div class="board__hr"></div>

<div class="card">
    <div class="card__avatar"></div>
    <div class="card__body">
        <div class="card__info"></div>
        <p class="card__content"></p>
        <!-- <h2>test <?php echo $iter; ?></h2> -->
        <!-- <h2>result <?php echo $iter; ?></h2> -->
        <h2>CarParkID:  <?php echo $row['CarParkID']; ?></h2>
        
        <p class="card__content"></p>
    </div>
</div>


<?php 
$iter++;
}
?>