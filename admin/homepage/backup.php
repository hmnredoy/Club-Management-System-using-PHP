

<?php

	$username = $_SESSION['username'];

	$sql_group = "SELECT * from message WHERE recieverID in (
    SELECT recieverID from message
    group by senderID having count(*) > 1)";
	
	$result_group = mysqli_query($db, $sql_group);

	if (mysqli_num_rows($result_group) > 0) {

		$sql_ = "SELECT * from message FULL OUTER JOIN studentinfo ON message .senderID = studentinfo .username";
		$result_ = mysqli_query($db, $sql_);

		 while($row = mysqli_fetch_assoc($result_)) {

		 	echo "<div class='inbox_fill'>
					<div>
						 <img src='../../profile_images\\".$row["avatar"]."' alt='profile image' style='border-radius:80%;width:100px; height: 100px;'>
						<p  class='inbox_name'>".$row["name"]."</p>
					</div>";

		 }


	 $sql_msg = "SELECT * FROM message WHERE recieverID = '$username' ORDER BY id DESC";

	$result_msg = mysqli_query($db, $sql_msg);

	if (mysqli_num_rows($result_msg) > 0) {

	    while($row = mysqli_fetch_assoc($result_msg)) {

	    	$replyTo = $row["senderID"];

	    	echo "


	    	<div class='inboxMsg'>
					<p class='inboxMsgTxt'>".$row["message"]."
					<span class='inboxMsgTime'>".$row["time"]."</span>
					</p>
				</div>


			";

	    }
	} else {
	    echo "No message.";
	}


	echo '<div>
			<textarea name="reply_box" id="reply_box" style="padding: 10px 0 0 10px;" rows="2" cols="50" placeholder="Write Your Message" size="200"></textarea>
			<button class="btn btn-block btn-primary" type="button" onclick="sendMessage()">Send&nbsp;<i class="fa fa-paper-plane" aria-hidden="true"></i></button>
			</div>

			</div>';


	}


	

	
	
?>







