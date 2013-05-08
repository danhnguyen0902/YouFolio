<?php
$dbconn = new mysqli('localhost','youfolio_frat','password123', 'youfolio_fratcontest');
if(!$dbconn)
{
echo "<h1>Could not connect to database.</h1>\n";
exit;
}
$result = $dbconn->query('SELECT org, COUNT(*) FROM users WHERE org <> "" GROUP BY org;');
if (!$result) {
  echo "<h1>Your query could not be executed.</h1>\n";
  exit;
}
$i = 0;
echo '<html>
<head>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/styles.css" rel="stylesheet">
</head>
<body>
<h4>Orgs</h4>' .
'<table class="table table-striped table-condensed table-bordered">';

$i = 0;

while ($row = $result->fetch_row()) 
{
	echo '<tr>';
	$count = count($row);
	$y = 0;
	while ($y < $count)
	{
		$c_row = current($row);
		echo '<td>' . $c_row . '</td>';
		next($row);
		$y = $y + 1;
	}
	echo '</tr>';
	$i = $i + 1;
}
mysqli_free_result($result);

echo '</table></body></html>';
?>