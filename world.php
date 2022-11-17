<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

#
$pg = $_SERVER['REQUEST_URI'];
$url = parse_url($pg, PHP_URL_QUERY);
parse_str($url, $parameter);
$context = $parameter['context'];
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$country = filter_input(INPUT_GET, 'country', FILTER_SANITIZE_STRING);
$stmt = $conn->query("SELECT * FROM countries");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
$countryQuery = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%';");
$countryResults =  $countryQuery->fetchAll(PDO::FETCH_ASSOC);

if($context=="countries"){
  foreach ($countryResults as $row)
  {
    echo '<tr><td>' . $row['name'] . '<tr><td>' . $row['continent'] . '<tr><td>' . $row['independence_year'] .'<tr><td>' . $row['head_of_state'] . '<tr><td>';
  }
  
  echo '</table>';
  
}

?>
<ul>
<?php foreach ($results as $row): ?>
  <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>
<?php endforeach; ?>
</ul>
