  	 <div class="container">
      <div id="previous-page" class="previous-page">
        <a href="http://em.gluweb.nl/profile/user.php"><i class="fas fa-arrow-left"></i></a>
      </div>
      <div class="row">
  			<div class="col-md-6 col-md-offset-3">
  				<div class="panel panel-login">
  					<div class="panel-body">
  						<div class="row">
  							<div class="col-lg-12">
                  <form id="register-form" method="post" role="form">
                    <div id="form-group-titles-register" class="form-group form-group-titles">
                    	<h4 class="form-title">Add Event</h4>
                    </div>
                    <p id="form-notification-global" class="form-notifications"></p>
                    <div id="form-group-event-name" class="form-group">
                    	<p class="form-input-title">Name:</p>
                    	<input type="text" name="eventName" id="event-name" tabindex="1" class="form-control" value="">
                    	<p id="form-notification-event-name" class="form-notifications"></p>
                    </div>
                    <div id="form-group-event-code" class="form-group">
                    	<p class="form-input-title">Product Code:</p>
                    	<input type="number" name="eventCode" id="event-code" tabindex="2" class="form-control" value="<?=mt_rand(1000000000, 9999999999)?>" disabled>
                    	<p id="form-notification-event-code" class="form-notifications"></p>
                    </div>
                    <div id="form-group-event-vendor" class="form-group">
                    	<p class="form-input-title">Organisation:</p>
                    	<input type="text" name="eventVendor" id="event-vendor" tabindex="3" class="form-control" value="">
                    	<p id="form-notification-event-vendor" class="form-notifications"></p>
                    </div>
                    <div id="form-group-event-description" class="form-group">
                    	<p class="form-input-title">Description:</p>
                    	<input type="text" name="eventDescription" id="event-description" tabindex="4" class="form-control" value="">
                    	<p id="form-notification-event-description" class="form-notifications"></p>
                    </div>
                    <div id="form-group-event-presentor" class="form-group">
                    	<p class="form-input-title">Presentor:</p>
                    	<input type="text" name="eventPresentor" id="event-presentor" tabindex="5" class="form-control">
                    </div>
                    <div id="form-group-event-location" class="form-group">
                    	<p class="form-input-title">Location:</p>
                    	<input type="text" name="eventLocation" id="event-location" tabindex="6" class="form-control">
                    </div>
                    <div id="form-group-event-begin-date" class="form-group">
                    	<p class="form-input-title">Begin Date:</p>
                    	<input type="date" name="eventBeginDate" id="event-begin-date" tabindex="7" class="form-control">
                    </div>
                    <div id="form-group-event-end-date" class="form-group">
                    	<p class="form-input-title">End Date:</p>
                    	<input type="date" name="eventEndDate" id="event-end-date" tabindex="8" class="form-control">
                    </div>
                    <div id="form-group-event-begin-time" class="form-group">
                    	<p class="form-input-title">Begin Time:</p>
                    	<input type="time" name="eventBeginTime" id="event-begin-time" tabindex="9" class="form-control">
                    </div>
                    <div id="form-group-event-end-time" class="form-group">
                    	<p class="form-input-title">End Time:</p>
                    	<input type="time" name="eventEndTime" id="event-end-time" tabindex="10" class="form-control">
                    </div>
                    <div id="form-group-quantity-tickets" class="form-group">
                    	<p class="form-input-title">Quantity Tickets:</p>
                    	<input type="number" name="quantityTickets" id="quantity-tickets" tabindex="11" class="form-control" value="">
                    	<p id="form-notification-quantity-tickets" class="form-notifications"></p>
                    </div>
                    <div id="form-group-event-price" class="form-group">
                    	<p class="form-input-title">Price:</p>
                    	<input type="number" min="0.00" max="10000.00" step="any" name="eventPrice" id="event-price" tabindex="12" class="form-control" placeholder="">
                    	<p id="form-notification-event-price" class="form-notifications"></p>
                    </div>
                    <div id="form-group-event-color" class="form-group">
                    	<p class="form-input-title">Color:</p>
                    	<input type="color" name="eventColor" id="event-color" tabindex="13" class="form-control" placeholder="">
                    	<p id="form-notification-event-color" class="form-notifications"></p>
                    </div>
                    <div id="form-group-event-image" class="form-group">
                    	<p class="form-input-title">Image url:</p>
                    	<input type="file" name="eventImage" id="event-img" tabindex="14" class="form-control" placeholder="">
                    	<p id="form-notification-event-color" class="form-notifications"></p>
                    </div>
                    <div class="form-group">
                    	<div class="row">
                    		<div class="col-sm-6 col-sm-offset-3">
                    			<input type="button" name="addEventSubmit" id="add-event-submit" tabindex="13" class="form-control btn btn-register" value="Add Event">
                    		</div>
                    	</div>
                    </div>
                    <script type="text/javascript">
                    	$(function() {
                    		$("#add-event-submit").click(function(){
                    			if($("#event-name").val() != ""){
                						$.ajax({
                						  method: "POST",
                						  url: "add-event.php",
                						  data: {
                                eventName: $("#event-name").val(),
                                eventCode: $("#event-code").val(),
                                eventVendor: $("#event-vendor").val(),
                                eventDescription: $("#event-description").val(),
                                eventPresentor: $("#event-presentor").val(),
                                eventLocation: $("#event-location").val(),
                                eventBeginDate: $("#event-begin-date").val(),
                                eventEndDate: $("#event-end-date").val(),
                                eventBeginTime: $("#event-begin-time").val(),
                                eventEndTime: $("#event-end-time").val(),
                                quantityTickets: $("#quantity-tickets").val(),
                                eventPrice: $("#event-price").val(),
                                eventImg: $("#event-img").val(),
                                eventColor: $("#event-color").val(),
                              }
                						}).done(function( msg ) {
                							document.getElementById("form-notification-global").innerHTML = msg;
                						});
                    			}else{
                    				document.getElementById("form-notification-global").innerHTML = "Insert valid information";
                    			}
                    		});
                    	});
                    </script>
                  </form>
  							</div>
  						</div>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>
