<?php
include_once("connection.php");

try{
    //creating user schema
    $db->exec( 'CREATE SCHEMA IF NOT EXISTS "SEN";');
    echo"<br><br>Schema 'SEN' created successfully";

    //creating UUID extention for random numbers
    $db->exec( 'CREATE EXTENSION IF NOT EXISTS "uuid-ossp";');
    echo"<br> Extension for UUID has been created";

    //dropping Student table
    $db-exec( 'DROP TABLE IF EXISTS "SEN"."tblStudent" CASCADE;');
    echo"<br> Table 'tblStudent' has been dropped";

    //dropping Tutor table
    $db-exec( 'DROP TABLE IF EXISTS "SEN"."tblTutor" CASCADE;');
    echo"<br> Table 'tblTutor' has been dropped";

    //dropping Diagnosis table
    $db-exec( 'DROP TABLE IF EXISTS "SEN"."tblDiag" CASCADE;');
    echo"<br> Table 'tblDiag' has been dropped";

    //dropping Barrier table
    $db-exec( 'DROP TABLE IF EXISTS "SEN"."tblBarrier" CASCADE;');
    echo"<br> Table 'tblBarrier' has been dropped";

    //dropping Strategies table
    $db-exec( 'DROP TABLE IF EXISTS "SEN"."tblStrat" CASCADE;');
    echo"<br> Table 'tblStrat' has been dropped";

    //creating Tutor Table
    $db->exec( '
    CREATE TABLE "SEN"."tblTutor" (
        TutorID uuid DEFAULT gen_random_uuid() PRIMARY KEY,
        Forename text NOT NULL,
        Surname text NOT NULL,
        House text NOT NULL
    );');
    echo"<br> Table 'tblTutor' has been created successfully";
    
    //creating Student Table
    $db->exec( '
    CREATE TABLE "SEN"."tblStudent" (
        StudentID uuid DEFAULT gen_random_uuid() PRIMARY KEY,
        Forename text NOT NULL,
        Surname text NOT NULL,
        YearGroup NUMERIC(2,0),
        TutorID uuid NOT NULL REFERENCES "SEN"."tblTutor"(TutorID) ON DELETE CASCADE,
        House text NOT NULL
    );');
    echo'<br>Table "tblStudent" has been created successfully';

    //creating Diagnosis table
    $db->exec( '
    CREATE TABLE "SEN"."tblDiag" (
        DiagID uuid DEFAULT gen_random_uuid() PRIMARY KEY,
        Label text NOT NULL
    );');
    echo"<br> Table 'tblDiag' has been created successfully";

    //creating Barrrier Table
    $db->exec( '
    CREATE TABLE "SEN"."tblBarrier" (
        BarrierID uuid DEFAULT gen_random_uuid() PRIMARY KEY,

    );');
    echo"<br>";
} catch (PDOException $e) {
    echo "<br><br><br><b>Error: " . $e->getMessage() . "</b>";
}

?>