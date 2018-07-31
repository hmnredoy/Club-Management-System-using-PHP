<script type="text/javascript">

	function sendMessage(){


	a = document.getElementById("msg_err");
	a.style.color="";
	a.style.padding = "";
	a.style.width = "";
	a.style.margin = "";
	a.style.backgroundColor= "";
	a.innerHTML = "";
	a.style.borderRadius= "";
	a.style.border= "";
	
	if(document.getElementById("reciever_ID").value.length==0 ||
		document.getElementById("msg_box").value.length==0){

		a.style.color="#fff";
		a.style.padding = "5px 10px 5px 10px";
		a.style.width = "200px";
		a.style.margin = "0px 38% 7px 38%";
		a.style.backgroundColor= "#CF4847";
		a.innerHTML = "Some field are empty.";
		a.style.borderRadius= "2px";
		a.style.border= "2px dashed #fff";
	}

		else{

		var xmlhttpp = new XMLHttpRequest();

		var reciever_ID = document.getElementById('reciever_ID').value;
	    var message = document.getElementById('msg_box').value;
	    var sender_ID = "<?php echo $_SESSION['username']; ?>";
	    var sender_Name = "<?php echo $_SESSION['moderator_name']; ?>";
	    document.getElementById("spinner").style.visibility= "visible";

  		xmlhttpp.onreadystatechange = function() {
		
		if (xmlhttpp.readyState == 4 && xmlhttpp.status == 200) {			
			document.getElementById("spinner").style.visibility= "hidden";
			a.innerHTML=xmlhttpp.responseText;;
			
			}
		};
	 	var url="messageServer.php?receiver_ID="+reciever_ID+"&sender_ID="+sender_ID+"&sender_Name="+sender_Name+"&message="+message;

		xmlhttpp.open("POST", url,true);
		xmlhttpp.send();



		setTimeout(function() {
		text.value = '';}, 2000);
		
		}


}




	function userCheck(){

	var  xmlhttp = new XMLHttpRequest();
	var str=document.getElementById('reciever_ID').value;
	var myself = "<?php echo $_SESSION['username']; ?>";
	document.getElementById("search_spinner").style.visibility= "visible";
	
	xmlhttp.onreadystatechange = function() {
		
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {			
			document.getElementById("search_spinner").style.visibility= "hidden";
			var m=document.getElementById("userHint");
			m.innerHTML=xmlhttp.responseText;
		}
	};
 	var url="userHintServer.php?uname="+str+"&myself="+myself;
	
	xmlhttp.open("GET", url,true);
	xmlhttp.send();



	}



	function ChangeCell(obj)
	{
		var prevHTML = obj.innerHTML;
	    document.getElementById("reciever_ID").value = prevHTML;
	   

	}




	function replyTextArea(text){

	window.text = text.value;
	


	}



	function replyMessage(id){

		//alert(text);

		
		var xmlhttpp = new XMLHttpRequest();
		var a = document.getElementById("replyErr").innerHTML;
	    var message = text;
	    
	    var sender_ID = "<?php echo $_SESSION['username']; ?>";
	    var sender_Name = "<?php echo $_SESSION['moderator_name']; ?>";
	  
	    var receiver_ID = id;

	    document.getElementById("spinner_reply_to").style.visibility= "visible";

  		xmlhttpp.onreadystatechange = function() {
		
		if (xmlhttpp.readyState == 4 && xmlhttpp.status == 200) {			
			document.getElementById("spinner_reply_to").style.visibility= "hidden";
			document.getElementById("replyErr").innerHTML = xmlhttpp.responseText;
			document.getElementById("replyErr").style.visibility= "visible";
			
			setTimeout(function() {
			document.getElementById('replyErr').style.visibility= "hidden";}, 2000);
			}
		};

	 	var url="messageServer.php?receiver_ID="+receiver_ID+"&sender_ID="+sender_ID+"&sender_Name="+sender_Name+"&message="+message;

		xmlhttpp.open("POST", url,true);
		xmlhttpp.send();
	

}


function replyGroupMessage(id){

		var a = document.getElementById("replyErr").innerHTML;
		var xmlhttpp = new XMLHttpRequest();

	    var message = text;
	    
	    var sender_ID = "<?php echo $_SESSION['username']; ?>";
	    var sender_Name = "<?php echo $_SESSION['moderator_name']; ?>";
	  
	    var group_Name = id;

	    document.getElementById("spinner_reply_to").style.visibility= "visible";

  		xmlhttpp.onreadystatechange = function() {
		
		if (xmlhttpp.readyState == 4 && xmlhttpp.status == 200) {			
			document.getElementById("spinner_reply_to").style.visibility= "hidden";
			document.getElementById("replyErr").innerHTML =xmlhttpp.responseText;
			document.getElementById("replyErr").style.visibility= "visible";

			

			
			setTimeout(function() {
			document.getElementById('replyErr').style.visibility= "hidden";}, 2000);
			}
		};

	 	var url="groupMessageServer.php?sender_ID="+sender_ID+"&groupMsg_name="+group_Name+"&sender_Name="+sender_Name+"&message="+message;

		xmlhttpp.open("POST", url,true);
		xmlhttpp.send();
	

}


</script>









<div class="sendMsg_wrap" id="sendMsg_wrap">

	<div class="sendMsg_fill_form">
		<div class="sendMsg_cont">
		<span class="sendMsg_close">&times;</span>
		<h3 class="msg_head">Send Message</h3>
		
		<p id="msg_err"></p><img id="spinner" src="ajax-loader.gif" width="100px" height="20px" style="visibility:hidden;">
		<div class='send_message'>
			<fieldset>
				<legend align="center">Send Message</legend>
			<input type="text" size="66" name="receiver_ID" id="reciever_ID" onkeyup="userCheck()" placeholder="Write ID of the receiver">

			<span id='userHint' style="width: 200px;
			margin-left: 4%;
			margin-right: 4%;
			margin-top: -1.8%;
			position: absolute;
			background-color: #262626;
			color: #fff;
			"></span><img id="search_spinner" src="searching-for-loading-icon.svg" width="60px" height="60px" style="visibility:hidden; position: absolute;margin-left: -30%;">

			<textarea name="msg_box" id="msg_box" style="padding: 10px 0 0 10px;" rows="2" cols="50" placeholder="Write Your Message" size="200"></textarea>
			<br>
			<button class="btn btn-block btn-primary" type="button" onclick="sendMessage()">Send&nbsp;<i class="fa fa-paper-plane" aria-hidden="true"></i></button>
			</fieldset>
		</div>
	</div>



<h3 class="msg_head">Inbox

<?php

include '../../timeFunction.php';

$username = $_SESSION['username'];

$sql_count = "SELECT COUNT(message) FROM message WHERE recieverID = '$username' AND deleted_by_member <> '$username'";


	$result_count = mysqli_query($db, $sql_count);
	$row_count=mysqli_fetch_array($result_count);

if (mysqli_num_rows($result_count) > 0) {

	echo "(" . $row_count["0"].")";

}

 ?>
</h3>

<div class="inbox_container">
<img id="spinner_reply_to" src="index.messenger-typing-preloader.svg" width="300px" style="visibility:hidden;">
<p id='replyErr'></p>

<?php

	$username = $_SESSION['username'];

	//$sql_cnt = "SELECT * FROM message RIGHT JOIN studentinfo ON message .senderID = studentinfo .username WHERE message .recieverID = '$username' GROUP BY message .senderID ORDER BY 1";


	$sql_cnt = "SELECT * FROM message RIGHT JOIN studentinfo ON message .recieverID = studentinfo .username OR message .senderID = studentinfo .username WHERE (message .senderID = '$username' OR message .recieverID = '$username') AND message. deleted_by_member <> '$username' GROUP BY studentinfo .username ORDER BY 1 DESC";

	$sql_cnt_admin = "SELECT * FROM message RIGHT JOIN admininfo ON message .recieverID = admininfo .username OR message .senderID = admininfo .username WHERE (message .senderID = '$username' OR message .recieverID = '$username') AND message. deleted_by_member <> '$username' GROUP BY admininfo .username ORDER BY 1 DESC";

	$sql_cnt_mod = "SELECT * FROM message RIGHT JOIN moderatorinfo ON message .senderID = moderatorinfo .user_ID OR message .senderID = moderatorinfo .user_ID WHERE (message .senderID = '$username' OR message .recieverID = '$username') AND message. deleted_by_member <> '$username' GROUP BY moderatorinfo .user_ID ORDER BY 1 DESC";



	//$sql_cnt_mod = "SELECT message .id, message .senderID, message .recieverID, message .message, message .time, message .senderType, moderatorinfo .user_ID, moderatorinfo .Name, moderatorinfo .Avatar FROM message RIGHT JOIN moderatorinfo ON message .senderID = moderatorinfo .user_ID WHERE message .recieverID = '$username' AND showMessage = 'Y' GROUP BY message .senderID ORDER BY 1 DESC";


    $rslt_cnt = mysqli_query($db, $sql_cnt);
    $rslt_cnt_admin = mysqli_query($db, $sql_cnt_admin);
    $rslt_cnt_mod = mysqli_query($db, $sql_cnt_mod);



    //-----------admin-----------------
	if (mysqli_num_rows($rslt_cnt_admin) > 0) {

    	while($row = mysqli_fetch_assoc($rslt_cnt_admin)){
    		//$list[] = array($row['senderID']);
    		$sender = $row["username"];

		echo "
			
		<div class='inbox_fill'>
		<div>
			 <img src='../../profile_images\\".$row["avatar"]."' alt='profile image' style='border: 2px groove #333; border-radius:80%;width:90px; height: 97px;'>
				<p class='inbox_name'>".$row["name"]."</p>
			</div>
			<div class='inboxMsg'>";

		//$sql_msg = "SELECT * FROM message WHERE recieverID = '$username' AND senderID = '".$row["username"]."' AND showMessage = 'Y' OR recieverID = '".$row["username"]."' AND senderID = '$username' AND showMessage = 'Y' ORDER BY id ASC";

		$sql_msg = "SELECT * FROM message WHERE ((recieverID = '$username' AND senderID = '".$row["username"]."') OR (recieverID = '".$row["username"]."' AND senderID = '$username'))AND deleted_by_member <> '$username' ORDER BY id ASC";
	$result_msg = mysqli_query($db, $sql_msg);


		/*$d1 = new DateTime(); // Today's Date/Time
		$d2 = new DateTime($row_["time"]);
		$i = $d1->diff($d2);

	    	$replyTo = $row_["senderID"];
	    	

	    	//echo "<div class='msgbox'><label class='sender_name'>".$row_["senderName"]."</label><div class='messageWrap'><p class='inboxMsgTxt'>".$row_["message"]."<span class='inboxMsgTime'>".$row_["time"]."</span>
				//</p></div></div>";

			echo "<div class='msgbox'><label class='sender_name'>".$row_["senderName"]."</label><div class='messageWrap'><p class='inboxMsgTxt'>".$row_["message"]."<span class='inboxMsgTime'>";

	    	echo $i->format('%D days %H hours %I minutes ago');
	    	echo "</span>
				</p></div></div>";*/
		
	    while($row_ = mysqli_fetch_assoc($result_msg)) {

	    	$replyTo = $row_["senderID"];

	    	echo "<div class='msgbox'><label class='sender_name'>".$row_["senderName"]."</label><div class='messageWrap'><p class='inboxMsgTxt'>".$row_["message"]."<span class='inboxMsgTime'>";

			
  			echo timeAgo($row_["time"]);

			echo "</span>
				</p></div></div>";


	    }
	 	echo "</div>
					<div>";

?>
			
				<a style='color:#fff;' class='delete' id = "<?php echo $sender; ?>" href='#'><button class="btn">Delete</button></a>
					
<?php

		echo '<div style=" width: 600px; margin-top: 260px; margin-left: -600px;">
		<textarea id="replyMsg" name="replyMsg" style="padding: 10px 0 0 10px;" rows="2" cols="50" placeholder="Write Your Message" size="200" onblur="replyTextArea(this)"></textarea>
	
	<button class="replyBtn" id='.$row["username"].' type="button" onclick="replyMessage(this.id)">Reply&nbsp;<i class="fa fa-paper-plane" aria-hidden="true"></i></button>
		</div>
	';

		echo "</div>
					</div>";
		
			}
	}




    //------------Student----------------
 
   
    if (mysqli_num_rows($rslt_cnt) > 0) {

    	while($row = mysqli_fetch_assoc($rslt_cnt)){
    		//$list[] = array($row['senderID']);
    		$sender = $row["username"];
		echo "
		<div class='inbox_fill'>
			<div>
				 <img src='../../profile_images\\".$row["avatar"]."' alt='profile image' style='border: 2px groove #333; border-radius:80%;width:90px; height: 97px;'>
				<p class='inbox_name'>".$row["name"]."</p>
			</div>
			<div class='inboxMsg'>";

		//$sql_msg = "SELECT * FROM message WHERE recieverID = '$username' AND senderID = '".$row["username"]."'  AND showMessage = 'Y' OR recieverID = '".$row["username"]."' AND senderID = '$username' AND showMessage = 'Y' ORDER BY id ASC";

		$sql_msg = "SELECT * FROM message WHERE ((recieverID = '$username' AND senderID = '".$row["username"]."') OR (recieverID = '".$row["username"]."' AND senderID = '$username'))AND deleted_by_member <> '$username' ORDER BY id ASC";
		$result_msg = mysqli_query($db, $sql_msg);

		
	    while($row_ = mysqli_fetch_assoc($result_msg)) {

	    	$replyTo = $row_["senderID"];
	    	

	    	echo "<div class='msgbox'><label class='sender_name'>".$row_["senderName"]."</label><div class='messageWrap'><p class='inboxMsgTxt'>".$row_["message"]."<span class='inboxMsgTime'>";

			
  			echo timeAgo($row_["time"]);

			echo "</span>
				</p></div></div>";


	    }
	 	echo "</div>
					<div>";

?>
			
				<a style='color:#fff;' class='delete' id = "<?php echo $sender; ?>" href='#'><button class="btn">Delete</button></a>
					
<?php

		echo '<div style=" width: 600px; margin-top: 260px; margin-left: -600px;">
		<textarea id="replyMsg" name="replyMsg" style="padding: 10px 0 0 10px;" rows="2" cols="50" placeholder="Write Your Message" size="200" onblur="replyTextArea(this)"></textarea>
	
	<button class="replyBtn" id='.$row["username"].' type="button" onclick="replyMessage(this.id)">Reply&nbsp;<i class="fa fa-paper-plane" aria-hidden="true"></i></button>
		</div>
	';
		echo "</div>
					</div>";
		
				}
	}





	//------moderator to moderator----------
	

	if(mysqli_num_rows($rslt_cnt_mod) > 0)
	{
 
    	while($row = mysqli_fetch_assoc($rslt_cnt_mod)){
    		//$list[] = array($row['senderID']);
    		$sender = $row["user_ID"];

    		if($row["user_ID"] != $username)
    		{




		echo "
			<p id='replyErr'></p><img id='spinner_reply' src='ajax-loader.gif' width='100px' height='20px' style='visibility:hidden; position: absolute; margin: auto;'>
		<div class='inbox_fill'>
		<div>
			 <img src='../../profile_images\\".$row["Avatar"]."' alt='profile image' style='border: 2px groove #333; border-radius:80%;width:90px; height: 97px;'>
				<p class='inbox_name'>".$row["Name"]."</p>
			</div>
			<div class='inboxMsg'>";

		//$sql_msg = "SELECT * FROM message  WHERE recieverID = '$username' AND senderID = '".$row["user_ID"]."' AND '".$row["id"]."' NOT IN (SELECT message_id FROM message_delete WHERE user_id = '$username') OR recieverID = '".$row["user_ID"]."' AND senderID = '$username' AND '".$row["id"]."' NOT IN (SELECT message_id FROM message_delete WHERE user_id = '$username') ORDER BY id ASC";

		$sql_msg = "SELECT * FROM message WHERE ((recieverID = '$username' AND senderID = '".$row["user_ID"]."') OR (recieverID = '".$row["user_ID"]."' AND senderID = '$username'))AND deleted_by_member <> '$username' ORDER BY id ASC";


		//mysqli_query($connection, "SELECT id FROM mychattable WHERE ((`from`='$id_of_member_a' AND `to`='$id_of_member_b') OR (`from`='$id_of_member_b' AND `to`='$id_of_member_a')) AND is_deleted_by_member='0' ") or die(mysqli_error($connection));

		//$sql_msg = "SELECT t1 .* FROM message t1 LEFT JOIN message_delete t2 ON t2 .message_id = t1 .'".$row["id"]."' WHERE t2 .message_id = null AND t1 .recieverID = '$username' AND t1 .senderID = '".$row["user_ID"]."' OR message .recieverID = '".$row["user_ID"]."' AND message .senderID = '$username'";

		$result_msg = mysqli_query($db, $sql_msg);

		if(mysqli_num_rows($result_msg) > 0)
		{
	    while($row_ = mysqli_fetch_assoc($result_msg)) {

	    	$list[] = array($row_['id']);



	    	$replyTo = $row_["senderID"];
	    	

	    	echo "<div class='msgbox'><label class='sender_name'>".$row_["senderName"]."</label><div class='messageWrap'><p class='inboxMsgTxt'>".$row_["message"]."<span class='inboxMsgTime'>";

			
  			echo timeAgo($row_["time"]);

			echo "</span>
				</p></div></div>";


	    }
	    $arr = json_encode($list);
	}


	 	echo "</div>
					<div>";


	
		
		//echo print_r($list);

?>
			
		<a style='color:#fff;' class='delete' id = "<?php echo $sender; ?>" href='#'><button class="btn">Delete</button></a>

		
<?php

	echo '<div style=" width: 600px; margin-top: 260px; margin-left: -600px;">
		<textarea id="replyMsg" name="replyMsg" style="padding: 10px 0 0 10px;" rows="2" cols="50" placeholder="Write Your Message" size="200" onblur="replyTextArea(this)"></textarea>
	
	<button class="replyBtn" id='.$row["user_ID"].' type="button" onclick="replyMessage(this.id)">Reply&nbsp;<i class="fa fa-paper-plane" aria-hidden="true"></i></button>
		</div>
	';
		echo "</div>
					</div>";
				}
	}
	}

	

	//-----Group Message------

	$sql_grp_msg = "SELECT * FROM group_chat WHERE receiverID = '$username' AND showMessage = 'Y' GROUP BY groupName ORDER BY 1";
	$result_grp_msg = mysqli_query($db, $sql_grp_msg);

	if (mysqli_num_rows($result_grp_msg) > 0) {

		while($row_2 = mysqli_fetch_assoc($result_grp_msg)) {

		echo "
		<div class='inbox_fill'>
			<div>
				<img src='../../profile_images\\groupchat.png' alt='profile image' style='border: 2px groove #333; border-radius:80%;width:90px; height: 90px;'>
				<p style='text-decoration: underline;'>Group Chat</p>
				<h3 class='inbox_name'>".$row_2["groupName"]."</h3>
			</div>
			<div class='inboxMsg'>";

		$sql_grp_msg_show = "SELECT * FROM group_chat WHERE groupName = '".$row_2["groupName"]."' GROUP BY time ORDER BY id ASC";
		$result_grp_msg_show = mysqli_query($db, $sql_grp_msg_show);

		while($row_3 = mysqli_fetch_assoc($result_grp_msg_show)) {


	    	$groupName = $row_3["groupName"];


			echo "<div class='msgbox'><label class='sender_name'>".$row_3["senderName"]."</label><div class='messageWrap'><p class='inboxMsgTxt'>".$row_3["message"]."<span class='inboxMsgTime'>";

  			echo timeAgo($row_3["time"]);

			echo "</span>
				</p></div></div>";


	    }
	 	echo "</div>
					<div>";

?>
			
				<a style='color:#fff;' class='delete' id = "<?php echo $groupName; ?>" href='#'><button class="btn">Delete</button></a>
					
<?php

		echo '<div style=" width: 600px; margin-top: 260px; margin-left: -600px;">
		<textarea id="replyMsg" name="replyMsg" style="padding: 10px 0 0 10px;" rows="2" cols="50" placeholder="Write Your Message" size="200" onblur="replyTextArea(this)"></textarea>
	
	<button class="replyBtn" id='.$row_2["groupName"].' type="button" onclick="replyGroupMessage(this.id)">Reply&nbsp;<i class="fa fa-paper-plane" aria-hidden="true"></i></button>
		</div>
	';

		echo "</div>
					</div>";

			}
    	
    	}

//print_r($list);
    	

//echo "list is: '".implode("','",$list.To)."'<br>";
/*$messageIDs = explode(",",$arr);

foreach ($messageIDs as $v) {
    echo $v.",";
}*/
?> 


<script src="jquery.js"></script>
<script type="text/javascript">
$(function() {
$(".delete").click(function(){
var element = $(this);
var user = "<?php echo $_SESSION['username']; ?>";
//var messageID = <?php //echo $arr; ?>;
//messageID = messageID.toString();
var senderID = element.attr("id");

if(confirm("Are you sure?"))
{
 $.ajax({
   type: "POST",
   url: "delete_inbox.php",
  // data: info,
   data:{'del_id':senderID,'user':user/*,'messageID':messageID*/},
   success: function(){
 }
});
  $(this).parents(".inbox_fill").animate({ backgroundColor: "#003" }, "slow")
  .animate({ opacity: "hide" }, "slow");
}
return false;
});
});



</script>








			</div>
		</div>
		<br><br><br><br><br>

</div>






<script type="text/javascript">
	

var sendMsg_wrap = document.getElementById('sendMsg_wrap');

var message_button = document.getElementById("message_button");

var span = document.getElementsByClassName("sendMsg_close")[0];

message_button.onclick = function() {
    sendMsg_wrap.style.display = "block";
}

span.onclick = function() {
    sendMsg_wrap.style.display = "none";
}


window.onclick = function(event) {
    if (event.target == sendMsg_wrap) {
        sendMsg_wrap.style.display = "none";
    }
}


</script>




<style type="text/css">



#spinner_reply_to{

	position: fixed;
	top: 35%;
	bottom: 35%;
	left: 40%;
	right: 40%;
}



#replyMsg{
	width:95%;
	display: inline-block;
	vertical-align: middle;
	height: 100px;
	padding: 0 10px;
	margin-top: 3px;
	margin-left: 20px;
	margin-bottom: 10px;
	font-size: 15px;
	line-height: 20px;
	border: 2px solid #808080;
	background-color: rgba(255, 255, 255, 1);
	color: rgba(0, 0, 0, 0.7);
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	border-radius: 5px;
	overflow: auto;

}


.replyBtn{

  text-overflow: ellipsis;
  white-space: nowrap;
  overflow: hidden;
  background-color: rgba(26, 26, 26,0.8);
  color: #fff;
  border: 1px solid rgba(255, 255, 255, 0.15);
  box-shadow: 0 0 rgba(0, 0, 0, 0);
  border-radius: 5px;
  -webkit-transition: background-color 0.2s, box-shadow 0.2s, background-color 0.2s, border-color 0.2s, color 0.2s;
  transition: background-color 0.2s, box-shadow 0.2s, background-color 0.2s, border-color 0.2s, color 0.2s;
  padding: 5px 20px;
  margin-left: 30px;
}

.replyBtn:hover,
.replyBtn:focus {
  background-color: rgba(26, 26, 26,1);
  color: #ffffff;
  border-color: rgba(255, 255, 255, 0.3);
  box-shadow: 0 0 rgba(0, 0, 0, 0);
  cursor : pointer;
  
}



.messageWrap{
	background-color: rgba(107, 191, 255,0.8);
	width: 355px;
	margin-left: 27%;
	margin-right: 5px;
	border-radius: 5px;
	padding: 5px 2px;
	margin-top: 5px;
	margin-bottom: 5px;
}


.msgbox{
	border-bottom: 2px solid #AAAEB4;
}


.sender_name{
	font-weight: bold;
	float: left;
	margin-left: 5px;
}




#replyErr{
	visibility: hidden;
	top: 38%;
	bottom: 35%;
	left: 30%;
	right: 30%;
	position: fixed;
	height: 50px;
	padding: 25px 0;
	font-family: Tw Cen MT,ROBOTO,helvetica;
	font-size: 20px;
	
	
}





.inboxMsgTime{
	margin-right: 5px;
	font-size: 13px;
	color: #959595;
	float: right;
	margin-top: 2%;
	margin-bottom: 2%;

}


.inbox_name{
	width: 130px;
	word-wrap: break-word;
	text-align: center;
	border: 1px solid #333;
	margin-left: 15px;
	background: rgba(17,17,17,1);
background: -moz-linear-gradient(top, rgba(17,17,17,1) 0%, rgba(19,19,19,1) 0%, rgba(19,19,19,1) 3%, rgba(28,28,28,1) 9%, rgba(43,43,43,1) 37%, rgba(71,71,71,1) 55%, rgba(89,89,89,1) 94%, rgba(102,102,102,1) 100%);
background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(17,17,17,1)), color-stop(0%, rgba(19,19,19,1)), color-stop(3%, rgba(19,19,19,1)), color-stop(9%, rgba(28,28,28,1)), color-stop(37%, rgba(43,43,43,1)), color-stop(55%, rgba(71,71,71,1)), color-stop(94%, rgba(89,89,89,1)), color-stop(100%, rgba(102,102,102,1)));
background: -webkit-linear-gradient(top, rgba(17,17,17,1) 0%, rgba(19,19,19,1) 0%, rgba(19,19,19,1) 3%, rgba(28,28,28,1) 9%, rgba(43,43,43,1) 37%, rgba(71,71,71,1) 55%, rgba(89,89,89,1) 94%, rgba(102,102,102,1) 100%);
background: -o-linear-gradient(top, rgba(17,17,17,1) 0%, rgba(19,19,19,1) 0%, rgba(19,19,19,1) 3%, rgba(28,28,28,1) 9%, rgba(43,43,43,1) 37%, rgba(71,71,71,1) 55%, rgba(89,89,89,1) 94%, rgba(102,102,102,1) 100%);
background: -ms-linear-gradient(top, rgba(17,17,17,1) 0%, rgba(19,19,19,1) 0%, rgba(19,19,19,1) 3%, rgba(28,28,28,1) 9%, rgba(43,43,43,1) 37%, rgba(71,71,71,1) 55%, rgba(89,89,89,1) 94%, rgba(102,102,102,1) 100%);
background: linear-gradient(to bottom, rgba(17,17,17,1) 0%, rgba(19,19,19,1) 0%, rgba(19,19,19,1) 3%, rgba(28,28,28,1) 9%, rgba(43,43,43,1) 37%, rgba(71,71,71,1) 55%, rgba(89,89,89,1) 94%, rgba(102,102,102,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#111111', endColorstr='#666666', GradientType=0 );
	color: #fff;
}




.inboxMsg{
	width: 100%;
	height: 280px;
	overflow-y: auto;
	word-wrap: break-word;
	background-color: #fff;
	border-radius: 5px;
	border: 2px groove #333;
  	margin-bottom:0;
	
}

.inboxMsgTxt{
	
	text-align: left;
	padding: 0 5px 10px 5px;
	
}
 


.inbox_container{

	width: 78%;
	height: auto;
	border: 1px solid #333;
	border-radius: 5px;
	margin-left: 12%;
	margin-right: 15%;
	margin-bottom: 10%;
	padding-bottom: 40px;
}



.inbox_fill{
	display: grid;
    grid-template-columns: 20% 70% 10%;
    border: 1px solid #333;
    width: 90%;
    height: 430px;
    margin-left: 4.8%;
    margin-right: 5%;
    margin-top: 5%;
    padding: 20px 0;
}





#spinner{
	margin-left:33%;
	margin-right:35%;
}



.msg_head{

	border: 1px solid #333;
	padding: 10px 0;
	background-color: #333333;
	color: #fff;
	width: 57%;
	margin-left: 18%;
	margin-right: 18%;
}



.send_message button{
	float: right;
	margin-right: 5%;
	font-family: Tw Cen MT,ROBOTO,helvetica;
	font-size: 17px;
}




.send_message{

    margin-bottom: 15%;
	height: 300px;
}



.send_message input[type="text"]{

	width:90%;
	display: inline-block;
	vertical-align: middle;
	height: 34px;
	padding: 0 10px;
	margin-top: 3px;
	margin-bottom: 10px;
	font-size: 15px;
	line-height: 20px;
	border: 1px solid rgb(255, 255, 255);
	background-color: rgba(255, 255, 255, 1);
	color: rgba(0, 0, 0, 0.7);
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	border-radius: 2px;
}
.send_message textarea{

	width:90%;
	display: inline-block;
	vertical-align: middle;
	height: 200px;
	padding: 0 10px;
	margin-top: 3px;
	margin-bottom: 10px;
	font-size: 15px;
	line-height: 20px;
	border: 1px solid rgb(255, 255, 255);
	background-color: rgba(255, 255, 255, 1);
	color: rgba(0, 0, 0, 0.7);
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	border-radius: 2px;
}



.send_message fieldset{
	height: 105%;
	width: 55%;
	margin-left: 18%;
	margin-right: 15%;
	font-size: 17px;
	font-family: Tw Cen MT,ROBOTO,helvetica;
}


.sendMsg_fill_form_container{

	padding-bottom: 30px;
	 border-radius: 10px;
}




.sendMsg_fill_form{

	 position: relative;
    background-color: #e6e6e6;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 80%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
    height: 40%;
    overflow: auto;
}


.sendMsg_wrap {
    display: none;
    position: fixed;
    z-index: 1;
    padding-top: 50px;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0,0.4);
}



/* Add Animation */
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0} 
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

/* The Close Button */
.sendMsg_close {
    color: #000;
    float: right;
    font-size: 28px;
    font-weight: bold;
    margin-right: 25px;

}

.sendMsg_close:hover,
.sendMsg_close:focus {
    color: #4d4d4d;
    text-decoration: none;
    cursor: pointer;
}


</style>