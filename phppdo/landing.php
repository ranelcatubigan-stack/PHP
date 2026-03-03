<?php

require 'insert.php';
require 'update.php';
require 'delete.php';
require 'select.php';

?>


<h2>Simple PDO CRUD</h2>
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
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  
  <body>
<!-- ADD / UPDATE FORM -->
<h3><?= $editUser ? 'Update User' : 'Add User' ?></h3>

<form method="POST">

  <?php if (!empty($editUser)): ?>
    <input type="hidden" name="users_id" value="<?= $editUser['users_id'] ?>">
  <?php endif; ?>

  <label>Name:</label>
  <input type="text" name="name" value="<?= !empty($editUser) ? $editUser['name'] : '' ?>" required><br>

  <label>Email:</label>
  <input type="email" name="email" value="<?= !empty($editUser) ? $editUser['email'] : '' ?>" required><br>

  <label>Product:</label>
  <input type="text" name="product" placeholder="Product" required><br>

  <label>Amount:</label>
  <input type="number" step="0.01" name="amount" placeholder="Amount" required><br>



  <!-- Submit buttons -->
  <?php if (!empty($editUser)): ?>
    <button type="submit" name="update">Update</button>
    <a href="landing.php">Cancel</a>
  <?php else: ?>
    <button type="submit" name="add">Add</button>
  <?php endif; ?>
</form>





<!-- USER TABLE -->
<h3>User List</h3>


<table class="table center">
<thead class="table-light"> 
  <tr class="table-active">
    <th scope="col">users_id</th>
    <th scope="col">Name</th>
    <th scope="col">Email</th>
    <th scope="col">Product</th>
    <th scope="col">Amount</th>
    <th scope="col">Action</th>
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
<style>
  table {
  margin-left: auto;
  margin-right: auto;
}
  </style>

 
</body>
</html>