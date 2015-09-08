<?php
require('../common.php') ;

$tracker = $sql->getAll("SELECT C.id, C.name, COUNT(BR.id) AS count 
		FROM Backathon_Registration BR 
		INNER JOIN City C ON C.id=BR.city_id 
		WHERE year='2015' 
		GROUP BY BR.city_id
		ORDER BY C.name");

?>
<html>
<head><title>Backathon Tracker</title>
<style type="text/css">
body {
	margin:0;
	padding:0;
}
.tile {
	height: 25%;
 	color: #fff;
 	display: block;
 	float:left;
 	width: 16.66%;
 	font-size:150%;
 	font-weight: bold;
 	text-align:center;
 	text-shadow:#000 1px 1px;
 	cursor: pointer;
}
.city-name {
	margin-top:50px;
	display: block;
}
</style>
</head>
<body>
<?php
$total = 0;
foreach($tracker as $city) { 
	$total += $city['count'];
?>
<div class="tile" data="<?php echo $city['id'] ?>">
<span class="city-name"><?php echo $city['name'] ?></span>
<span class="city-count"><?php echo $city['count'] ?></span>
</div>
<?php } ?>
<div class="tile">
<span class="city-name">Total</span>
<span class="city-count"><?php echo $total; ?></span>
</div>


<script type="text/javascript" src="../../bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="js/index.js"></script>
</body>
</html>