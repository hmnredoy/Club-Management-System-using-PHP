<?php
function getDataFromDB($sql){
	include '../../dbconnect.php';
	$result = mysqli_query($db, $sql)or die(mysqli_error($db));
	$arr=array();
	//print_r($result);
	while($row = mysqli_fetch_assoc($result)) {
		$arr[]=$row;
	}
	return $arr;
}

if(isset($_REQUEST["uname"])){
	$hint = $_REQUEST["uname"];
	$sql="SELECT * FROM studentinfo WHERE username like '$hint%' AND is_active = 'Y' OR name like '$hint%' AND  is_active = 'Y'";
	$sqll="SELECT * FROM moderatorinfo WHERE user_ID like '$hint%' OR Name like '$hint%'";

	$a=getDataFromDB($sql);
	$b=getDataFromDB($sqll);

	echo "<div style='height: 326.5px; width: 250px; overflow: auto;' class='tooltip'>
		
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
			
				<td style='cursor:pointer; border-bottom: 1px solid #f2f2f2; background-color: #333333; color: #fff;' onclick='ChangeCell(this)'>". $p["username"]."</td>	
			</tr>";
			echo '<span class="tooltiptext">Click on the ID</span>';

	}
	foreach($b as $p){
		echo "
			<tr>
				<td style = 'background-color: #cccccc; color: #333; overflow: auto;'>".$p["Name"]."</td>

				<td style='cursor:pointer; border-bottom: 1px solid #f2f2f2; background-color: #cccccc; color: #333;' onclick='ChangeCell(this)'>". $p["user_ID"]."</td>
				<td><input type='radio' class='multiSend' id='". $p["user_ID"]."'  onclick='add_checked(this);'/></td>
			</tr>";
		}
	/*echo "<div class='msgGroup_wrap'>
			<span style='color: #333;'>Send as a Group</span>
			<input type='text' style='text-align: center; background-color: #595959; color: #fff; border-radius: 5px;' name='msgGroup' placeholder = 'Write group name'>
			<input type='button' class='btn btn-block btn-primary' value='Create & Send' onclick='sendMessage()'>

		</div>";*/
	if(empty($p))
	{
		echo "<tr>
				<td>No user found.</td>
			<tr>";
	}
	echo "</table>
	</div>";
}
?>


<style>

/*

.msgGroup_wrap{
	position: absolute;
	top: 100%;
}
*/
	
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
