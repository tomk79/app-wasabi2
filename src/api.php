<?php
@header('Content-type: text/json');
$rest = $paprika->conf()->exdb->get_rest();
$rest->automatic_rest_api();
exit();
