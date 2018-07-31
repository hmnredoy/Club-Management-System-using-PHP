<?php

if(isset($_SESSION['msg'])) {
    $msg = $_SESSION['msg'];
    session_unset($_SESSION['msg']);

    echo "<div style=

	'color: rgb(138, 109, 59);
	background-color: rgb(252, 248, 227);
	padding: 5px 0;
	border-radius: 2px;
	text-align: center;'
	>".$msg."</div>";

} else {
    $msg = "";
}


?>