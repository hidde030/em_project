<?php
    require_once '../class/user.php';
    require_once 'config.php';

    $eventName = filter_input(INPUT_POST, 'eventName', FILTER_SANITIZE_STRING);
    $eventCode = filter_input(INPUT_POST, 'eventCode', FILTER_SANITIZE_STRING);
    $eventVendor = filter_input(INPUT_POST, 'eventVendor', FILTER_SANITIZE_STRING);
    $eventDescription = filter_input(INPUT_POST, 'eventDescription', FILTER_SANITIZE_STRING);
    $eventPresentor = filter_input(INPUT_POST, 'eventPresentor', FILTER_SANITIZE_STRING);
    $eventLocation = filter_input(INPUT_POST, 'eventLocation', FILTER_SANITIZE_STRING);
    $eventBeginDate = filter_input(INPUT_POST, 'eventBeginDate', FILTER_SANITIZE_STRING);
    $eventEndDate = filter_input(INPUT_POST, 'eventEndDate', FILTER_SANITIZE_STRING);
    $eventBeginTime = filter_input(INPUT_POST, 'eventBeginTime', FILTER_SANITIZE_STRING);
    $eventEndTime = filter_input(INPUT_POST, 'eventEndTime', FILTER_SANITIZE_STRING);
    $quantityTickets = filter_input(INPUT_POST, 'quantityTickets', FILTER_SANITIZE_STRING);
    $eventPrice = filter_input(INPUT_POST, 'eventPrice', FILTER_SANITIZE_STRING);
    $eventImg = filter_input(INPUT_POST, 'eventImg', FILTER_SANITIZE_STRING);
    $eventColor = filter_input(INPUT_POST, 'eventColor', FILTER_SANITIZE_STRING);

    if($user->addEvent($eventName,$eventCode,$eventVendor,$eventDescription,$eventPresentor,$eventLocation,$eventBeginDate,$eventEndDate,$eventBeginTime,$eventEndTime,$quantityTickets,$eventPrice,$eventImg,$eventColor)) {
        print 'Event has been added to the calender!';
        die;
    } else {
        $user->printMsg();
        die;
    }
