<?php

require 'insert.php';
require 'update.php';
require 'delete.php';
require 'select.php';

?>


<h2 style="text-align: center;">Simple PDO CRUD</h2>
<?php
// CHECK IF EDIT MODE
$editUser = null;


if (isset($_GET['edit'])) {
  $users_id = $_GET['edit'];
  $stmt = $pdo->prepare("SELECT * FROM users WHERE users_id = ?");
  $stmt->execute([$users_id]);
  $editUser = $stmt->fetch(PDO::FETCH_ASSOC);

}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Database</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  
  <body>
    <div class="container">
<!-- ADD / UPDATE FORM -->
 <div class="item" style="width: 50%; margin-left: 1em; text-align: center; border: 1px solid black; padding: 1em black;">
<h3><?= $editUser ? 'Update User' : 'Add User' ?></h3>

<form method="POST">

  <?php if (!empty($editUser)): ?>
    <input type="hidden" name="users_id" value="<?= $editUser['users_id'] ?>">
  <?php endif; ?>

  <label style="display: block; margin-bottom: 1px;" style="background-color: #fffff0; color: #2E6F40;">Name:</label>
  <input type="text" name="name" value="<?= !empty($editUser) ? $editUser['name'] : '' ?>" required style=""><br>

  <label style="display: block; margin-bottom: 1px;">Email:</label>
  <input type="email" name="email" value="<?= !empty($editUser) ? $editUser['email'] : '' ?>" required><br>

  <label style="display: block; margin-bottom: 1px;">Product:</label>
  <input type="text" name="product" placeholder="Product" required><br>

  <label style="display: block; margin-bottom: 1px; ">Amount:</label>
  <input type="number" step="0.01" name="amount" placeholder="Amount" required><br>



  <!-- Submit buttons -->
  <?php if (!empty($editUser)): ?>
    <button type="submit" name="update" style="margin-top: 1em; width: 150px; background-color: #2E6F40; color: #fffff0;">Update</button>
    <a href="landing.php">Cancel</a>
  <?php else: ?>
    <button type="submit" name="add" style="margin-top: 1em; width: 150px; background-color: #2E6F40; color: #fffff0;">Add</button>
  <?php endif; ?>
</form>

  </div>




<!-- USER TABLE -->


<div class="item" style=" padding: 1em black; margin-left: -200px;" v>
  <h3 style="border-bottom: 1px solid black; padding-bottom: 0.5em;">User List</h3>
<table class="table table-bordered" style="width: 100%; border: 1px solid black;">
  <tr class="table-active">
    <th>users id</th>
    <th>Name</th>
    <th>Email</th>
    <th>Product</th>
    <th>Amount</th>
    <th>Action</th>
  </tr>
  </thead>

  <?php foreach ($users as $user): ?>
  <tr>

    <td><?= $user['users_id'] ?></td>
    <td><?= $user['name'] ?></td>
    <td><?= $user['email'] ?></td>
    <td><?= $user['product'] ?></td>
    <td><?= $user['amount'] ?></td>
    <td>

      <a href="?edit=<?= $user['users_id'] ?>">Edit</a> |
      <a href="?delete=<?= $user['users_id'] ?>">Delete</a>
    </td>

  </tr>
  <?php endforeach; ?>
</table>
  </div>
  </div>
  <style>
        .container{
      display: grid; 
      grid-template-columns:500px 590px;
      border: 1px solid black;
      padding: 1em;
      background-color: #014421;
      color: #fffff0;
        }
      
        </style>
</body>
</html>
