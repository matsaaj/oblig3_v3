<?php
  include_once('functions.php');
?>

    <div class="container-fluid item_feed">
      <div class="row">
        <?php
        // Add articles from database
        foreach($db->query('SELECT * FROM items ORDER BY item_publishdate DESC') as $item):?>
          <div class="col-sm-6 col-md-3 item_display">
            <div class="card">
              <img class="card-img-top img-fluid" src="http://placehold.it/600x400">
              <div class="card-block">
                <a href="item.php?id=<?=$item['item_id']?>" class="card-title"><?=$item['item_name']?></a>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      </div>
    </div>


<?php
  include_once('layouts/footer.php');
?>
