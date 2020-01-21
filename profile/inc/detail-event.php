<?php foreach ($vars as $event){?>
  <div id="previous-page" class="previous-page">
    <a href="http://em.gluweb.nl/profile/user.php"><i class="fas fa-arrow-left"></i></a>
  </div>
  <?php
    $beginDate = date_create($event['eventBeginDate']);
    $endDate = date_create($event['eventEndDate']);
    $beginTime = date_create($event['eventBeginTime']);
    $endTime = date_create($event['eventEndTime']);
  ?>
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="panel">
        <div id="event-details" style="<?="background-color: ".$event['eventColor'];?>">
          <div class="event">
            <h3><?= date_format($beginDate,"d"); ?></h3>
						<h4><?= date_format($beginDate,"M"); ?></h4>
            <h4 class="event-name"><?=$event['eventName']?></h4>
            <div class="image-wrapper">
              <img src="img/event-images/<?=$event['eventImg']?>.jpg" alt="Event Image">
            </div>
            <p class="date"><i class="far fa-clock"></i><span><?= date_format($beginDate, "d, M"); ?> - <?= date_format($endDate, "d, M"); ?> <?= date_format($beginTime,"H:i"); ?> - <?= date_format($endTime,"H:i"); ?></span></p>
            <p class="location"><i class="fas fa-map-marker-alt"></i><span><?=$event['eventLocation']?></span></p>
            <div class="google-maps" style="width: 318px;">
              <iframe width="318" height="340" src="https://maps.google.com/maps?width=318&amp;height=340&amp;hl=en&amp;q=Amsterdam%2C%20Nederland+(Titel)&amp;ie=UTF8&amp;t=&amp;z=10&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
            <p class="description"><i class="fas fa-file-alt"></i><span><?=$event['eventDescription']?></span></p>
            <p class="vendor">Presented by: <?=$event['eventVendor']?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
