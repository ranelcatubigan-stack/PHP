
<?php
require 'insert1.php';
require 'select1.php';
require 'delete1.php';
require 'update1.php';

// CHECK IF EDIT MODE
$editOrder = null;
if (isset($_GET['edit'])) {
  $order_id = $_GET['edit'];
  $stmt = $restaurant->prepare("SELECT * FROM orders WHERE order_id = ?");
  $stmt->execute([$order_id]);
  $editOrder = $stmt->fetch(PDO::FETCH_ASSOC);
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
        <button type ="button" onclick="window.location.href='landing2.php'">Customers</button>
        <button type ="button" onclick="window.location.href='landing3.php'">Menu Items</button>
        </div>
        <div class="grid-container" style="margin-top: 20px; border: 1px solid black; padding: 20px;">
         <h3>Place New Order</h3>
        <div class="grid input"  style="display: grid; grid-template-columns: 200px 200px 200px 200px; gap: 20px; margin-top: 20px;">
          <div >
          <form method="POST">
                <?php if (!empty($editOrder)): ?>
          <input type="hidden" name="order_id" value="<?= $editOrder['order_id'] ?>">
                <?php endif; ?>

            <label for="customer">Customer:</label>
            <select name="customer" id="customer" style="width: 200px; height: 38px; padding: 6px 10px;
              border-radius: 6px; border: 1px solid #ccc; font-size: 14px;" required>
              <option value ="<?= !empty($editOrder)
            ? $editOrder['customer_id'] : '' ?>" >Choose a name</option>

      <?php foreach ($orders_name as $orders_name): ?>
        <option value="<?= $orders_name['customer_id']; ?>">
            <?= $orders_name['first_name']; ?>
        </option>
      <?php endforeach; ?>
      </select>
          </div>
          <div>
          <label for="menu_item">Menu Item:</label>
          <select name="menu_item" id="menu_item" style="width: 200px; height: 38px; padding: 6px 10px;
              border-radius: 6px; border: 1px solid #ccc; font-size: 14px;" required>
            <option value="<?= !empty($editOrder)
     ? $editOrder['item_id'] : '' ?>">Choose an item</option>

      <?php foreach ($menu_item_name as $menu_item_name): ?>
        <option value="<?= $menu_item_name['item_id']; ?>">
            <?= $menu_item_name['dish_name']; ?>
        </option>
    <?php endforeach; ?>

  </select>
          </div>
          <div>
          <label for="quantity">Quantity:</label>
           <input type="number" name="quantity" value="<?= !empty($editOrder)
     ? $editOrder['quantity'] : '' ?>"  required class="form-control" placeholder="Enter quantity">
          </div>
          <div>
            <?php if (!empty($editOrder)): ?>

        <button type="submit" name="update_order" style="width: 200px; height: 38px; padding: 6px 10px;
              border-radius: 6px; border: 1px solid #ccc; font-size: 14px; margin-top: 24px;">Update</button>
     <a href="landing2.php" style="display: inline-block; width: 200px; height: 38px; padding: 6px 10px; background-color: #dc3545; color: white;">Cancel</a>
      <?php else: ?>
     <button type="submit" name="add_order" style="width: 200px; height: 38px; padding: 6px 10px;
              border-radius: 6px; border: 1px solid #ccc; font-size: 14px; margin-top: 24px;">Add</button>
      <?php endif; ?>
          </div>
      </form>
        </div>
      <table class=" table table-striped" style="margin-top: 20px;">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Customer</th>
            <th scope="col">Dish</th>
            <th scope="col">Total</th>
            <th scope="col">Date</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        
        <?php foreach ($orders as $order): ?>
          <tr>

    <td><?= $order['order_id'] ?></td>
      <td><?= $order['first_name'] ?></td>
      <td><?= $order['dish_name'] ?></td>
      <td><?= $order['total_price'] ?></td>
      <td><?= $order['order_date'] ?></td>

    <td>

      <a class="btn btn-outline-success" href="?edit=<?= $order['order_id'] ?>">Edit</a> |
      <a class="btn btn-outline-danger" href="?delete=<?= $order['order_id'] ?>">Delete</a>

    </td>

  </tr>
    <?php endforeach; ?>

        </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>