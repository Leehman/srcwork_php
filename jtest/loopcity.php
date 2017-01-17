<?php
$cities = "City, Country, Continent; Tokyo, Japan, Asia; Mexico City, Mexico, North America; New York City, USA, North America; Mumbai, India, Asia; Seoul, Korea, Asia; Shanghai, China, Asia; Lagos, Nigeria, Africa; Buenos Aires, Argentina, South America; Cairo, Egypt, Africa; London, UK, Europe";

$cities = explode(";", $cities);

$mdCities = array();

foreach($cities as $city){
$city = explode(", ", $city);
array_push($mdCities, $city);
}

?>
<table>
<thead>
<tr>
<?php foreach($mdCities[0] as $header){
echo "<th>" . $header . "</th>";
} ?>
</tr>
</thead>
<tbody>
<?php
array_shift($mdCities);
foreach($mdCities as $city){
echo "<tr>";
foreach($city as $detail){
echo "<td>" . $detail . "</td>";
}
} ?>
</tbody>
</table>