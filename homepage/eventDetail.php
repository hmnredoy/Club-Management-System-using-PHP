<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h3 align="center">Event Detail</h3>
    </div>
    <div class="modal-body">
      <fieldset>
        <legend align="center">Event Detail</legend>

        <div class="list_mem_all">
          <div class="mem_list">
            <div>Join Status</div>
            <div>Image</div>
            <div>Event</div>
            <div>Detail</div>
            <div>Venue</div>
            <div>Capacity</div>
            <div>Event Date</div>
            <div>Event Time</div>
          </div>

        <?php

          $clbid = $_SESSION['clubID'];
          $username = $_SESSION['username'];
  
          include '../dbconnect.php';

          $sql = "SELECT * FROM event_table WHERE club_ID = '$clbid'";
          $result = mysqli_query($db, $sql);

          

          if (mysqli_num_rows($result) > 0) {
          
              while($row = mysqli_fetch_assoc($result)) {

                echo "<div id='mem_list_val'>";


              $sql_join_status = "SELECT show_Event FROM event_join WHERE joined_Member_ID = '$username' AND event_ID = '".$row["id"]."'";
              $result_join_status = mysqli_query($db, $sql_join_status);

              if (mysqli_num_rows($result_join_status) > 0) { 
                  while($row_ = mysqli_fetch_assoc($result_join_status)) {

                    if($row_["show_Event"]=='Y')
                    {
                      echo "<div class='joined_event'><i class='fa fa-check' aria-hidden='true'></i>
                      <span class='joined'>Joined</span></div>";
                    }
                    else{
                      echo "<div class='not_joined_event'><i class='fa fa-times' aria-hidden='true'></i>
                      <span class='join_cancelled'>Join Cancelled</span></div>";
                    }

                    

                  }
                }
                else{

                    echo "<div class='pending_joined_event'><i class='fa fa-exclamation' aria-hidden='true'></i>

                      <span class='join_pending'>Join Pending</span></div>";
                }

                        
                echo "<div>
                      <img src='../slider\\".$row["event_img"]."' alt='event image' style='border: 2px dashed #3A3A3A; border-radius: 10px; width:200px; height: 100px;'>
                        </div>
                        <div class='evnt_head'>".$row["event_head"]."</div>
                        <div class='evnt_detail'>".$row["event_detail"]."</div>
                        <div>".$row["venue"]."</div>
                        <div>".$row["capacity"]."</div>
                        <div>".$row["date"]."</div>
                        <div>".$row["time"]."</div>
                        </div>

                        <div style='margin-top: 20px; margin-bottom: 20px; border-bottom: 2px dashed #bfbfbf; width:145%;'></div>";


              }
          } else {
              echo "No Event Available";
          }

        ?>

        </div>
      </fieldset>
    </div>
    
  </div>

</div>

<script type="text/javascript">
  // Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("viewDetail");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


</script>



<style>


.joined_event{
  background-color: #00cc66;
  padding: 5px 0px 0px 0px;
  color: #fff;
  height: 40px;
  width: 40px;
  border-radius: 50px;
  margin-top: 10%;
  margin-bottom: 10%;
  font-size: 20px;
  margin-left: 25%;
  text-align: center;
}


.not_joined_event{
  background-color: #ff5c33;
  padding: 5px 0px 0px 0px;
  color: #fff;
  height: 40px;
  width: 40px;
  border-radius: 50px;
  margin-top: 10%;
  margin-bottom: 10%;
  font-size: 20px;
  margin-left: 25%;
}


.pending_joined_event{
  background-color: #ffbb33;
  padding: 5px 0px 0px 0px;
  color: #fff;
  height: 40px;
  width: 40px;
  border-radius: 50px;
  margin-top: 10%;
  margin-bottom: 10%;
  font-size: 20px;
  margin-left: 25%;
}

.join_pending, .join_cancelled, .joined{

  display: none;
  position: relative;
  margin-left: 135px;
  background-color: rgba(51, 51, 51,0.7);
  color: #fff;
  width: 120px;
  margin-top: 50px;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;
  z-index: 1;
 font-size: 15px;
}

.pending_joined_event:hover .join_pending{
  display: block;
 
}

.not_joined_event:hover .join_cancelled{
  display: block;
}

.joined_event:hover .joined{
  display: block;
}

.evnt_head{

  width: 200px;
  height: 200px;
  overflow: auto;
  word-break: break-word;

}



.evnt_detail{

  width: 250px;
  height: 250px;
  overflow: auto;
  word-break: break-word;
  background-color: #e6e6e6;
  color: #333;
  border: 1px solid #333;
  border-radius: 5px;
  padding: 5px 5px;

}


.list_mem_all{
  height: 600px;
   overflow: auto;

}



#mem_list_val {
  display: grid;
  grid-template-columns: 10% 20% 20% 25% 35% 10% 15% 15%;
  margin: 10px 0 0 0;
  font-size: 17px;
  font-family: Tw Cen MT,ROBOTO,helvetica;
   text-align: center;
}
.mem_list{
  display: grid;
  grid-template-columns: 10% 20% 20% 25% 35% 10% 15% 15%;
  font-weight: bold;
  text-decoration: underline;
   text-align: center;
}










/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 10px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    position: relative;
    background-color: #e6e6e6;
    background-position: center;
    background-image: url('../img/c1.png');
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 80%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
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
.close {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #bfbfbf;
    text-decoration: none;
    cursor: pointer;
}

.modal-header {
    padding: 2px 10px;
    background-color: rgba(13, 13, 13,0.7);
    color: white;
}

.modal-body {padding: 2px 16px;}


</style>

