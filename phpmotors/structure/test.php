<?php
session_start();
require_once('../structure/connect.php');
include('../model/reviews-model.php');

echo createReviewsString(17);

?>