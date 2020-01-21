<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <meta name="robots" content="noindex">
      <title>Events | Leftover Events</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Vendor CSS-->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
			<link rel="stylesheet" href="css/owl.carousel.min.css">
			<link rel="stylesheet" href="css/owl.theme.default.min.css">
			<!-- -->
      <!-- Vendor JavaScript -->
      <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
			<script src="js/owl.carousel.min.js"></script>
			<!-- -->
			<!-- CSS -->
			<link rel="stylesheet" href="css/main.css">
			<!-- -->
  </head>
  <body>
    <div class="container">
			<header class="header" id="header">
				<div id="hamburger" class="hamburger" onclick="hamburgerMenu(this)">
				  <div class="bar1"></div>
				  <div class="bar2"></div>
				  <div class="bar3"></div>
				</div>
				<h1>Events</h1>
        <?php
          if ($_SESSION['user']['user_role'] > '1') {
            echo '
            <div id="add-event" class="add-event">
              <a href="new-event.php"><i class="fas fa-plus"></i></a>
            </div>
            ';
          }
        ?>
			</header>
			<main class="main" id="main">
				<div class="owl-carousel">
          <?php
          foreach ($vars as $events) {
           ?>
				  <div class="event" onclick="location.href='event.php<?="?ID=".$events['eventCode']?>';" style="<?="background-color: ".$events['eventColor'];?>">
            <?php
            $beginDate = date_create($events['eventBeginDate']);
            $endDate = date_create($events['eventEndDate']);
            $beginTime = date_create($events['eventBeginTime']);
            $endTime = date_create($events['eventEndTime']);
            ?>
						<h3><?= date_format($beginDate,"d"); ?></h3>
						<h4><?= date_format($beginDate,"M"); ?></h4>
            <h2><?=$events['eventName']?></h2>
            <div class="image-wrapper">
              <img src="img/event-images/<?=$events['eventImg']?>.jpg" alt="Event Image">
            </div>
            <p class="date"><i class="far fa-clock"></i><span><?= date_format($beginDate, "d, M"); ?> - <?= date_format($endDate, "d, M"); ?> <?= date_format($beginTime,"H:i"); ?> - <?= date_format($endTime,"H:i"); ?></span></p>
            <p class="location"><i class="fas fa-map-marker-alt"></i><span><?=$events['eventLocation']?></span></p>
            <p class="description"><i class="fas fa-file-alt"></i><span><?=$events['eventDescription']?></span></p>
					</div>
          <?php } ?>
				</div>
			</main>
    </div>
  </body>
	<!-- JavaScript -->
	<script src="js/events.js"></script>
	<!-- -->
</html>
