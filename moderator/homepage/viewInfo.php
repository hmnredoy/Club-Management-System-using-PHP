<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2><?php echo $_SESSION['moderator_Club_Name']; ?> Member Detail</h2>
    </div>
    <div class="modal-body">
      <fieldset>
        <legend align="center">Member Detail</legend>

        <div class="list_mem_all">
          <div class="mem_list">
            <div>Avatar</div>
            <div>ID</div>
            <div>Name</div>
            <div>Department</div>
            <div>Semester</div>
            <div>Gender</div>
            <div>DOB</div>
            <div>ADMSNYR</div>
            <div>Phone</div>
            <div>Email</div>
            <div>Join Date</div>
            <div>State</div>
          </div>


        <?php
  
          include '../../dbconnect.php';

          $sql = "SELECT * FROM studentinfo Where clubID = $club_id_session";
          $result = mysqli_query($db, $sql);

          if (mysqli_num_rows($result) > 0) {
          
              while($row = mysqli_fetch_assoc($result)) {

                echo "<div id='mem_list_val'>
                        <div>
                        <img src='../../profile_images\\".$row["avatar"]."' alt='profile image' style='border-radius:80%;width:50px; height: 50px;'>
                        </div>
                        <div>". $row["username"]."</div>
                        <div>". $row["name"]."</div>
                        <div>". $row["dept"]."</div>
                        <div>". $row["semester"]."</div>
                        <div>". $row["gender"]."</div>
                        <div>". $row["dob"]."</div>
                        <div>" . $row["admissionyear"]."</div>
                        <div>" . $row["phone"]."</div>
                        <div>" . $row["email"]."</div>
                        <div>" . $row["dateTime"]."</div>
                        <div>" . $row["is_active"]."</div>
                        
                      </div>
                      <div style='border-bottom: 1px solid #333; width:175%;'></div>
                      ";


              }
          } else {
              echo "0 results";
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



.list_mem_all{
  height: 600px;
   overflow: auto;

}



#mem_list_val {
  display: grid;
  grid-template-columns: 15% 15% 15% 15% 15% 15% 15% 15% 15% 15% 15% 15% 15%;
  margin: 10px 0 0 0;
  font-size: 17px;
  font-family: Tw Cen MT,ROBOTO,helvetica;

}
.mem_list{
  display: grid;
  grid-template-columns: 15% 15% 15% 15% 15% 15% 15% 15% 15% 15% 15% 15% 15%;
  font-weight: bold;
  text-decoration: underline;
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
    background-image: url('../../img/c1.png');
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
    padding: 2px 16px;
    background-color: rgba(58, 58, 58,1);
    color: white;
}

.modal-body {padding: 2px 16px;}


</style>

