<?php
require 'insert3.php';
require 'update3.php';
require 'delete3.php';
require 'select3.php';
?>

<?php
// CHECK IF EDIT MODE
$editMenuItem = null;


if (isset($_GET['edit'])) {
  $item_id = $_GET['edit'];
  $stmt = $restaurant->prepare("SELECT * FROM menuitems WHERE item_id = ?");
  $stmt->execute([$item_id]);
  $editMenuItem = $stmt->fetch(PDO::FETCH_ASSOC);

}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>

    <div class="grid" style="drisplay: grid; grid-template-rows: 500px 500px; gap: 20px; margin-top: 20px; border: 1px solid black; padding: 20px;
        width: 1000px; margin-left: auto; margin-right: auto; background-color: #4169E1; color: dark;">
      
        <div class="container" style ="display: grid; grid-template-columns: 200px 200px 200px; gap: 20px; margin-top: 20px; border: 1px solid black; padding: 20px; justify-content: center;
            width: 700px">
        <button type="button" onclick="window.location.href='landing1.php'">Orders</button>
        <button type = "button" onclick="window.location.href='landing2.php'">Customers</button>
        <button type = "button" onclick="window.location.href='landing3.php'">Menu Items</button>
        </div>
        <div class="grid-container" style="margin-top: 20px; border: 1px solid black; padding: 20px;">
         <h3>Add Menu Item</h3>
        <div class="grid input"  style="display: grid; grid-template-columns: 200px 200px 200px 200px; gap: 20px; margin-top: 20px;">
          <div>
            <form method="POST">
                <?php if (!empty($editMenuItem)): ?>
          <input type="hidden" name="item_id" value="<?= $editMenuItem['item_id'] ?>">
                <?php endif; ?>

            <label for="dish_name">Dish Name:</label>
            <input type="text" name="dish_name" style="width: 200px; height: 38px; padding: 6px 10px;
              border-radius: 6px; border: 1px solid #ccc; font-size: 14px;" value="<?= !empty($editMenuItem) ? $editMenuItem['dish_name'] : '' ?>" required>
          </div>
          <div>
          <label for="price">Price:</label>
          <input type="number" name="price" step="0.01" min="0" style="width: 200px; height: 38px; padding: 6px 10px;
              border-radius: 6px; border: 1px solid #ccc; font-size: 14px;" value="<?= !empty($editMenuItem) ? $editMenuItem['price'] : '' ?>" required>
          </div>
          <div>
          <label for="category">Category:</label>
          <input type="text" name="category" style="width: 200px; height: 38px; padding: 6px 10px;
              border-radius: 6px; border: 1px solid #ccc; font-size: 14px;" value="<?= !empty($editMenuItem) ? $editMenuItem['category'] : '' ?>" required>
          </div>
          <div>
            <?php if (!empty($editMenuItem)): ?>
              <button type="submit" name="update" style="width: 200px; height: 38px; padding: 6px 10px;
              border-radius: 6px; border: 1px solid #ccc; font-size: 14px; margin-top: 24px;">Update Menu Item</button>
              <a href="landing2.php" style="display: inline-block; width: 200px; height: 38px; padding: 6px 10px; background-color: #dc3545; color: white;">Cancel</a>
              <?php else: ?>
          <button type="submit" name="add" style="width: 200px; height: 38px; padding: 6px 10px;
              border-radius: 6px; border: 1px solid #ccc; font-size: 14px; margin-top: 24px;">Submit Item</button>
          <?php endif; ?>
          </div>
          </form>
        </div>
      <table class=" table table-striped" style="margin-top: 20px;">
        <thead>
          <tr>
            <th scope="col">Dish</th>
            <th scope="col">Category</th>
            <th scope="col">Price</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <?php foreach ($menuitems as $menuitem): ?>
  <tr>
    <td><?= $menuitem['dish_name'] ?></td>
    <td><?= $menuitem['price'] ?></td>
    <td><?= $menuitem['category'] ?></td>
    <td>
      <a href="?edit=<?= $menuitem['item_id'] ?>">Edit</a> |
      <a href="?delete=<?= $menuitem['item_id'] ?>">Delete</a>
    </td>

  </tr>
  <?php endforeach; ?>
        </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>