<?php
//fetch.php
$conn = mysqli_connect("localhost", "root", "", "novoosiguranje");
if (!$conn) {
  die("Connection Failed: ".mysqli_connect_error());
}

$query = "SELECT * FROM clients ORDER BY reference ";
$result = mysqli_query($conn, $query);
//$output = array();
while($row = mysqli_fetch_array($result))
{
 $sub_data["id"] = $row["ID"];
 $sub_data["name"] = $row["clientsPN"];
 $sub_data["text"] = $row["clientsPN"];
 $sub_data["parent_id"] = $row["reference"];
 $data[] = $sub_data;
}
foreach($data as $key => &$value)
{
 $output[$value["id"]] = &$value;
}
foreach($data as $key => &$value)
{
 if($value["parent_id"] && isset($output[$value["parent_id"]]))
 {
  $output[$value["parent_id"]]["nodes"][] = &$value;
 }
}
foreach($data as $key => &$value)
{
 if($value["parent_id"] && isset($output[$value["parent_id"]]))
 {
  unset($data[$key]);
 }
}
echo json_encode($data);
/*echo '<pre>';
print_r($data);
echo '</pre>'; */

?>
