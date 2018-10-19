
<?php
    if(!strlen($_GET['source'])and !strlen($_GET['destination'])){
        header("location: index.php");
    }
    else{
?>
<html>
	<head>
		<title> Buffer </title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	</head>
	<body>
		<header class="w3-container w3-teal w3-center">
          <h1>Xsonic Rail Tracking yohooo!!</h1>
        </header>
        <div class="w3-container">
<?php 
			$source= $_GET['source'];
			$destination = $_GET['destination'];
			$date = $_GET['date'];
			$year= substr($date,0,4);
			$month= substr($date,5,2);
			$day= substr($date,8,2);
			$newdate = $day."-".$month."-".$year;
			$url="https://api.railwayapi.com/v2/between/source/".$source."/dest/".$destination."/date/".$newdate."/apikey/lu0cfqw7ey/";
		    $data=file_get_contents($url);
		    $json = json_decode($data, true);
		    $response = array(200=>"Success", 210=>"Train doesn’t run on the date queried", 211=>"Train doesn’t have journey class queried", 220=>"Flushed PNR", 221=>"Invalid PNR", 230=> "Date chosen for the query is not valid for the chosen parameters", 404=>"Data couldn’t be loaded on our servers. No data available.", 405=> "Data couldn't be loaded on our servers. Request couldn't go through.", 500=> "Unauthorised API key", 501 =>"Contact mayankgbrc@gmail.com", 502=> "Invalid arguments passed, may be you entered in back date");
		    $res = $json["response_code"];
			$u=0;
		    if ($res==200)
			{
				echo "<h4> You are looking for trains from:  ".$json["trains"][$u]["from_station"]["name"]."  to  ".$json["trains"][$u]["to_station"]["name"]  ."  on  ".$newdate  ."</h4>";
			
				?>
				</div>
				<div class ="w3-container w3-center w3-responsive w3-padding" >
				<table class="w3-table-all w3-hoverable w3-centered">
				<tr class="w3-green w3-large">
					<td>TRAIN NUMBER</td>
					<td>TRAIN NAME</td>
					<td>SOURCE STATION</td>
					<td>DESTINATION STATION</td>
					<td>DAYS</td>
				</tr>
				<?php
					for($i=0;$i<$json["total"];$i++)
					{
							$train_number=$json["trains"][$i]["number"];
							$train_name=$json["trains"][$i]["name"];
							$from_station=$json["trains"][$i]["from_station"]["name"];
							$to_station=$json["trains"][$i]["to_station"]["name"];
							for($j=0;$j<7;$j++)
							{
								if($json["trains"][$i]["days"][$j]["runs"]=="Y")
								$array=array($json["trains"][$i]["days"][$j]["code"]);
							}
						echo "<tr><td>". $train_number."</td><td>";
						echo $train_name;
						echo "</td><td>";
						echo $from_station;
						echo "</td><td>";
						echo $to_station;
						echo "</td><td><table><tr>";
						for($d=0;$d<7;$d++)
						{
							echo "<td>".$json["trains"]["days"][$d]["code"]."</td>";
						}
						echo "</tr><tr>";
						$d=0;
						for($d=0;$d<7;$d++)
						{
							echo "<td>".$json["trains"]["days"][$d]["runs"]."</td>";
						}
						echo "</tr></table></td>";
						echo "<br></br>";
					}
				}
	      }
	
	?>
	</table>
	</div>