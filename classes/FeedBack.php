<?php
$path = __DIR__;
$path = rtrim($path, "classes");
include_once $path . 'Database/DB.php';

class Feedback {

    private $FeedId;
    private $name;
    private $discription;
    private $studentID;
    private $FeedDate;
    private $Reply;
    function getFeedId() {
        return $this->FeedId;
    }

    function getName() {
        return $this->name;
    }

    function getDiscription() {
        return $this->discription;
    }

    function getStudentID() {
        return $this->studentID;
    }

    function getFeedDate() {
        return $this->FeedDate;
    }

    function getReply() {
        return $this->Reply;
    }

    function setFeedId($FeedId) {
        $this->FeedId = $FeedId;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setDiscription($discription) {
        $this->discription = $discription;
    }

    function setStudentID($studentID) {
        $this->studentID = $studentID;
    }

    function setFeedDate($FeedDate) {
        $this->FeedDate = $FeedDate;
    }

    function setReply($Reply) {
        $this->Reply = $Reply;
    }
}
