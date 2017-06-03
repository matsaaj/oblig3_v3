<?php
  include_once('functions.php');
  $query = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
  parse_str($query, $item);

  // Redirect to homepage if URI does not include id
  if (!$item['id']) {
    redirect('index.php');
  }

  $sql = "SELECT item_name, item_description, item_publishdate, name AS category, concat(firstname, ' ', surname) AS item_owner
          FROM ((items INNER JOIN users ON items.user_id = users.id)
          INNER JOIN item_categories ON items.category_id = item_categories.id)
          WHERE item_id = :item_id";
  $stmt = $db->prepare($sql);
  $stmt->execute(array(':item_id' => $item['id']));
  $item = $stmt->fetch(PDO::FETCH_ASSOC);

  // Redirect to homepage if item_id in URI does not exist in database
  if (!$item) {
    redirect('index.php');
  }
?>

<div class="container mt-4">
  <div class="row">
    <div class="col-md-8">
      <img class="rounded img-fluid" src="http://placehold.it/1200x600">
      <h2><?=$item['item_name']?></h2>
      <p><?=$item['item_description']?></p>

      <hr>

      <p>Publisert: <?=$item['item_publishdate']?></p>
    </div>

    <div class="col-md-4">
      <div class="item_ownerprofile text-info">
        <i class="material-icons user_icon">account_circle</i>
        <h3><?=$item['item_owner']?></h3>
        <a href="#" class="btn btn-primary">Send melding</a>
      </div>
    </div>
  </div>
</div>

<?php
  include_once('layouts/footer.php');
?>
