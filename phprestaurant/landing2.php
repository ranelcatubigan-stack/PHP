<?php
require 'insert2.php';
require 'select2.php';
require 'delete2.php';
require 'update2.php';

?>

<?php
// CHECK IF EDIT MODE
$editCustomer = null;


if (isset($_GET['edit'])) {
  $customer_id = $_GET['edit'];
  $stmt = $restaurant->prepare("SELECT * FROM customers WHERE customer_id = ?");
  $stmt->execute([$customer_id]);
  $editCustomer = $stmt->fetch(PDO::FETCH_ASSOC);

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
      
         <h3>Add New Customer</h3>

          <div class="grid input"  style="display: grid; grid-template-columns: 200px 200px 200px 200px; gap: 20px; margin-top: 20px;">
          <div>
            <form method="POST">
                <?php if (!empty($editCustomer)): ?>
          <input type="hidden" name="customer_id" value="<?= $editCustomer['customer_id'] ?>">
                <?php endif; ?>

            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" style="width: 200px; height: 38px; padding: 6px 10px;
              border-radius: 6px; border: 1px solid #ccc; font-size: 14px;" value="<?= !empty($editCustomer) ? $editCustomer['first_name'] : '' ?>" required>
          </div>
          <div>
          <label for="last_name">Last Name:</label>
          <input type="text" name=" last_name" style="width: 200px; height: 38px; padding: 6px 10px;
              border-radius: 6px; border: 1px solid #ccc; font-size: 14px;" value="<?= !empty($editCustomer) ? $editCustomer['last_name'] : '' ?>" required>
          </div>
          <div>
          <label for="phone_number">Phone Number:</label>
          <input type="text" name="phone_number" style="width: 200px; height: 38px; padding: 6px 10px;
              border-radius: 6px; border: 1px solid #ccc; font-size: 14px;" value="<?= !empty($editCustomer) ? $editCustomer['phone_number'] : '' ?>" required>
          </div>
            <div>
              <?php if (!empty($editCustomer)): ?>
              <button type="submit" name="update" style="width: 200px; height: 38px; padding: 6px 10px;
              border-radius: 6px; border: 1px solid #ccc; font-size: 14px; margin-top: 24px;">Update Customer</button>
              <a href="landing2.php" style="display: inline-block; width: 200px; height: 38px; padding: 6px 10px; background-color: #dc3545; color: white;">Cancel</a>
              <?php else: ?>

              <button type="submit" name="add" style="width: 200px; height: 38px; padding: 6px 10px;
              border-radius: 6px; border: 1px solid #ccc; font-size: 14px; margin-top: 24px;">Add Customer</button>
            <?php endif; ?>
          </div>
          </form>
        </div>
      <table class=" table table-striped" style="margin-top: 20px;">
        <thead>
          <tr>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
         <?php foreach ($customers as $customer): ?>
  <tr>

    <td><?= $customer['first_name'] ?></td>
    <td><?= $customer['last_name'] ?></td>
    <td><?= $customer['phone_number'] ?></td>
    <td>
      <a href="?edit=<?= $customer['customer_id'] ?>">Edit</a> |
      <a href="?delete=<?= $customer['customer_id'] ?>">Delete</a>
    </td>

  </tr>
  <?php endforeach; ?>
        </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>