<?php

require_once('vendor/autoload.php');
require_once('classes/autoload.php');

// load env variables from .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$studentId = $_GET['student'];

// display student grades
if($studentId) {

    try {
        $student = new Student($studentId);
        $student->printGrades();

    } catch (Exception $e) {
        echo $e->getMessage();
    }

    return;
}

// list all studens
(new Students())();
