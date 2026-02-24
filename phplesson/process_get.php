<?php
if(isset($_GET['name']) && isset($_GET['age'])){
    $name = $_GET['name'];
    $age = $_GET['age'];

    echo "<h2>GET Data Received</h2>";
    echo "<p>Name: $name</p>";
    echo "<h2>Age: $age</p>";
    echo "<p>Notice how the data is visible in the URL!</p>";

}else{
    echo "No GET data received.";
}
?>