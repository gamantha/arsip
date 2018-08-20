<?php
/*
this file should be copied into 
- tao/includes
- protected/components



*/

abstract class Config
{


const RESULTS_SCRIPT_HOST = "http://rapor.ppsdm.com";
const ACTION_SCRIPT_PATH = "http://auth.ppsdm.com/scripts/Actions.php";
const TESTTAKER_GROUP = "TESTTAKER_ppsdm";


const MYSQL_HOST="localhost";
const MYSQL_NAME="sigisdb";
const MYSQL_USER="root";
const MYSQL_PASSWORD ="";

const PPSDM_DB_HOST = "localhost";
const PPSDM_DB_USER = "ppsdm";
const PPSDM_DB_PASS = "ppsdM2014";
const PPSDM_DB_NAME = "rapordb";

const TAO_HOST = "http://tao.ppsdm.com";
const TAO_ROOT = "";
const TAO_ADMIN_USER = "admin";
const TAO_ADMIN_PASS = "admin";

const TAO_DB_HOST = "localhost";
const TAO_DB_NAME = "taodb";
const TAO_DB_USER = "ppsdm";
const TAO_DB_PASS = "ppsdM2014";

const RESULTS_DB_HOST = "localhost";
const RESULTS_DB_USER = "ppsdm";
const RESULTS_DB_PASS = "ppsdM2014";
const RESULTS_DB_NAME = "resultdb";



}
?>
