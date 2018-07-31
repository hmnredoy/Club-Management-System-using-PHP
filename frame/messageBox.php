<script type="text/javascript">


	function toggleMsg(){
		document.getElementById("msg_box").classList.toggle('active');
		document.getElementById("msg_txt").classList.toggle('active');

	}

	function close_msg(){
	
		document.getElementById("msg_box").style.visibility = 'hidden';
		document.getElementById("msg_txt").style.visibility = 'hidden';
	
	}


</script>



<div id="msg_box">
	
	<div id="msg_head" onclick="toggleMsg()">Name<i style="margin-left:63%; color: rgb(242, 242, 242);" class="fa fa-window-close fa-lg" aria-hidden="true" onclick="close_msg()"></i></div>

<div class="msg_container">
	
	<div class="fnd_txt">
		<p>hello</p>
	</div>

	<div class="my_txt"">
		<p>Hi</p>
	</div>
</div>
	

	

</div>

<div id="msg_txt">
	<span style="display: block;
	width: 115%;
	height: 2px;
	background: #D9D9DA;"></span>

	<input type="text" style="
		background-color: #fff;
        border-top: transparent !important;
        border-left: transparent !important;
        border-right: transparent !important;
        border-bottom: transparent !important;
        padding: 14px 10px;
        width: 235px;
        "
        name="message" placeholder="Type your message...">

	<i class="fa fa-paper-plane" aria-hidden="true"></i>
</div>

<style type="text/css">
	
	.fa-paper-plane{
		color: #333;
	}


	#msg_box{

		position: fixed;
		width: 300px;
		height: 400px;
		left:55%;
		bottom: -361.9px;
		border-top-right-radius: 10px;
		border-top-left-radius: 10px;
		transition: all 300ms linear;
		border: 4px ridge #333333;
		background-color: #fff;
		visibility: hidden;
	}

	#msg_box.active{

		bottom: 0px;

	}

	#msg_head{
		padding: 10px 0 10px 0;
		background-color: rgba(102, 0, 102,0.9);
		color: #fff;
		text-align: center;
		font-size: 17px;
		cursor: pointer;
	}

	#msg_txt{
		background-color: #fff;
		position: fixed;
		bottom: -60px;
		left: 55.25%;
		
		
	}

	#msg_txt.active{
		bottom: 0px;
	}

	#msg_txt input:focus{
   /* outline: none;
    */background: transparent;
            border-top: transparent !important;
            border-left: transparent !important;
            border-right: transparent !important;
            border-bottom: transparent !important;
}

	.msg_container{
		position: relative;
		overflow: auto;
		height: 295px;
	}

	.my_txt{

		text-align: right;

	}

	.fnd_txt{
		text-align: left;
	}

	.my_txt p{
		background-color: rgb(255, 206, 153);
		margin: 10px 5px 10px 5px;
		padding: 10px 10px 10px 10px;
		border-radius: 20px;

		width: 200px;
		display:inline-block;
		overflow: hidden;
		word-wrap: break-word;
	}

	.fnd_txt p{
		background-color: rgb(128, 191, 255);
		margin: 10px 5px 10px 5px;
		padding: 10px 10px 10px 10px;
		border-radius: 20px;
		margin-right: auto;
		width: 200px;
		display:inline-block;
		overflow: hidden;
		word-wrap: break-word;

	}

	

	
</style>