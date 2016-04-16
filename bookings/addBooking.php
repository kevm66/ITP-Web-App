
<?php
session_start();
if(isset($_SESSION['user'])=="")
{
 echo "<script>alert('Please log-in to view this page.');</script>";
 echo "<script>window.location = 'login.php';</script>";
}
include_once '../classes/dbconnect.php';

if(isset($_POST['btn-addbooking']))
{
 $room = mysql_real_escape_string($_POST['room']);
 $capacity = mysql_real_escape_string($_POST['capacity']);
 $date = mysql_real_escape_string($_POST['date']);
 $time = mysql_real_escape_string($_POST['time']);
 $requirements = mysql_real_escape_string($_POST['requirements']);
 if(mysql_query("INSERT INTO bookings(room, capacity, date, time, requirements) VALUES ('$room','$capacity','$date','$time','$requirements')"))
 {
        echo"<script>alert('Your booking had been created. Go to My Bookings to review.');</script>";
 }
 else
 {
        echo"<script>alert('Sorry, there was an error creating your booking.');</script>";
 }
}
?>

  <div class="mdl-grid">
    <div class="mdl-cell mdl-cell--6-col">
    
    <p> Please choose a room and seats required:</p>
            
    <form id="bookingForm" method="post"> 
       <div class="mdl-grid">
          <div class="mdl-cell mdl-cell--6-col">
            <label for="room">Room:</label></br>
            
            <select id="roomList" name="roomList" autofocus required onchange="document.getElementById('roomImage').src = this.value">
              <option value="http://placehold.it/1200">Select a room</option>
              <option value="../images/rooms/SCR3-2.jpg">SCR3</option>
              <option value="../images/rooms/3.02-1.jpg">3.02</option>
              <option value="../images/rooms/3.03.jpg">3.03</option>
              <option value="../images/rooms/3.04.jpg">3.04</option>
              <option value="../images/rooms/Theatre-3-1.jpg">Theatre 3</option>
            </select>
            
          </div>
          
          <div class="mdl-cell mdl-cell--6-col">
            <label for="capacity">Seats Required:</label></br>
            <input name="capacity" width="20%"  type="number" default value="1" min="1" max="100" maxlength="3" required=""/></p>
          </div>
          
          </div><!-- row end -->
          
        <!-- row start -->  
       <div class="mdl-grid">
          <div class="mdl-cell mdl-cell--6-col">
          <label for="date">Date Chosen:</label>
          <p>
            {{date | date:'yyyy/MM/dd'}}
          </p></br>
          </div>
          
          <div class="mdl-cell mdl-cell--6-col">
          <label for="time">Time Chosen:</label>
          <p>
            {{date | date:'HH:mm a'}}
          </p></br>
          </div>
          
        </div><!-- row end -->
          
         <!-- row start -->
         <div class="mdl-grid">
          <div class="mdl-cell mdl-cell--12-col">
          <label for="requirements">Special Requirements:</label></br>
          <textarea name="requirements" placeholder="eg. Wheelchair accessibility" rows="6" cols="50" maxlength="150"/></textarea></p>
          <!-- rows="6" cols="32" maxlength="150"/></textarea></p> -->
          </div>
          
        </div><!-- row end --><p>To finish the booking process, please click the 'complete' button below:</p>
        <input type="submit" form="bookingForm" id="btn-addbooking" name="btn-addbooking" value="Complete" class="hidden"/>
          <!-- <a href="https://itp-module-x14346081.c9users.io/room.php" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">Add a New Room</a> -->
        </form>

 <form action="addbooking.php" method="post">
          <input type="submit" />
        </form>
        
      </div>
        
    <div class="mdl-cell mdl-cell--6-col">
      <div class="room">
        
          
          <img class="photo" id="roomImage" src="http://placehold.it/1000" alt="Please contact a system administrator if you see this"/>
          
        
      </div>
    </div>
              
              
                     
                      
                      
                     
<!-- image chooser  -->
