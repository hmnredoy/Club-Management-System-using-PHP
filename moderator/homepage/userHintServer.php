<?php
function getDataFromDB($sql){
	include '../../dbconnect.php';
	$result = mysqli_query($db, $sql)or die(mysqli_error($db));
	$arr=array();
	while($row = mysqli_fetch_assoc($result)) {
		$arr[]=$row;
	}
	return $arr;
}

if(isset($_REQUEST["uname"])){
	$hint = $_REQUEST["uname"];
	$myself = $_REQUEST["myself"];

	$sql_stu="SELECT * FROM studentinfo WHERE username like '$hint%' OR name like '$hint%'";
	$sql_mod="SELECT * FROM moderatorinfo WHERE user_ID like '$hint%' AND user_ID <> '$myself' OR Name like '$hint%' AND user_ID <> '$myself'";
	$sql_admin="SELECT * FROM admininfo WHERE username like '$hint%' OR name like '$hint%'";

	$a=getDataFromDB($sql_stu);
	$b=getDataFromDB($sql_mod);
	$c=getDataFromDB($sql_admin);

	echo "<div style='height: 326.5px;  overflow: auto;' class='tooltip'>
		
			<div style=' margin: 2px 2px;
			border: 2px solid #E6E6E6;
			border-radius: 3px; left: 20px; background-color: #e6e6e6; color: #3F4144;'>
				User Hint
			</div>
			<table align='center'>
			";
	
	foreach($a as $p){
		echo "
			<tr>
				<td style = 'background-color: #333333; color: #fff; overflow: auto;' >".$p["name"]."</td>
			
				<td class='tooltip' style='cursor:pointer; border-bottom: 1px solid #f2f2f2; background-color: #333333; color: #fff;' onclick='ChangeCell(this)'>". $p["username"]."</td>
			</tr>
			";
			echo '<span class="tooltiptext">Click on the ID</span>';
	}
	foreach($b as $p){
		echo "
			<tr>
				<td style = 'background-color: #cccccc; color: #333; overflow: auto;'>".$p["Name"]."</td>

				<td class='tooltip' style='cursor:pointer; border-bottom: 1px solid #f2f2f2; background-color: #cccccc; color: #333;' onclick='ChangeCell(this)'>". $p["user_ID"]."</td>
			</tr>";
		
		}
	foreach($c as $p){
		echo "
			<tr>
				<td style = 'background-color: #ffcc99; color: #333; overflow: auto;'>".$p["name"]."</td>
			
				<td style='cursor:pointer; border-bottom: 1px solid #f2f2f2; background-color: #ffcc99; color: #333;' onclick='ChangeCell(this)'>". $p["username"]."</td>
			</tr>";
			

	}
	echo "</div>";

}
?>


<style>
	
	
.tooltiptext {
   display: none;
    width: 120px;
    background-color: black;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;
    position: absolute;
    z-index: 1;
    top: -35px;
    left: 21%;
    
    
}


.tooltip:hover .tooltiptext{
	display: block;



}

</style>

