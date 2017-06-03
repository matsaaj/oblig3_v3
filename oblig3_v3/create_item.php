<?php
  include_once('functions.php');
?>
<div class="container">
  <h1>Legg ut ny annonse</h1>
  <form id="add_item" method="post">

    <div class="form-group row">
      <label for="item_title" class="col-2 col-form-label">Overskrift</label>
      <div class="col-10">
        <input type="text" class="form-control" name="item_title" id="item_title">
      </div>
    </div>

    <div class="form-group row">
      <label for="category" class="col-2 col-form-label">Kategori</label>
      <div class="col-10">
        <select name="category" class="form-control custom-select" id="category">
          <option selected></option>
          <?php
          // Get all categories from database and put data in as select options
          foreach($db->query('SELECT * FROM item_categories') as $category): ?>
            <option value="<?=$category['id']?>"><?=$category['name']?></option>
          <?php endforeach ?>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label for="description" class="col-2 col-form-label">Beskrivelse</label>
      <div class="col-10">
        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
      </div>
    </div>

    <div class="btn-group" role="group">
      <button type="submit" class="btn btn-primary" name="createItem" id="createItem">Publiser</button>
    </div>

  </form>
</div>

<?php
  include_once('layouts/footer.php');
?>
