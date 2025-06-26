<?php
$allow_output = true;
include_once("connection.php");

try{
    //creating SEN schema
    $db->exec( 'CREATE SCHEMA IF NOT EXISTS "SEN";');
    echo"<br><br>Schema 'SEN' created successfully";

    //creating UUID extention for random numbers
    $db->exec( 'CREATE EXTENSION IF NOT EXISTS "uuid-ossp";');
    echo"<br> Extension for UUID has been created";

    //dropping Student table
    $db->exec( 'DROP TABLE IF EXISTS "SEN"."tblStudent" CASCADE;');
    echo"<br> Table 'tblStudent' has been dropped";

    //dropping Tutor table
    $db->exec( 'DROP TABLE IF EXISTS "SEN"."tblTutor" CASCADE;');
    echo"<br> Table 'tblTutor' has been dropped";

    //dropping Diagnosis table
    $db->exec( 'DROP TABLE IF EXISTS "SEN"."tblDiag" CASCADE;');
    echo"<br> Table 'tblDiag' has been dropped";

    //dropping Barrier table
    $db->exec( 'DROP TABLE IF EXISTS "SEN"."tblBarrier" CASCADE;');
    echo"<br> Table 'tblBarrier' has been dropped";

    //dropping Strategies table
    $db->exec( 'DROP TABLE IF EXISTS "SEN"."tblStrat" CASCADE;');
    echo"<br> Table 'tblStrat' has been dropped";

    //dropping Stu-Diag
    $db->exec('DROP TABLE IF EXISTS "SEN"."tblStu-Diag" CASCADE;');
    echo"<br> Table 'tblStu-Diag' has been dropped";

    //dropping Bar-Strat
    $db->exec('DROP TABLE IF EXISTS "SEN"."tblBar-Strat" CASCADE;');
    echo "<br> Table 'tblBar-Strat' has been dropped";

    //dropping Diag-Bar
    $db->exec('DROP TABLE IF EXISTS "SEN"."tblDiag-Bar" CASCADE;');
    echo "<br> Table 'tblDiag-bar' has been dropped";

    //creating Tutor Table
    $db->exec('
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
        YearGroup smallint,
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

    //creating Barrier Table
    $db->exec( '
    CREATE TABLE "SEN"."tblBarrier" (
        BarrierID uuid DEFAULT gen_random_uuid() PRIMARY KEY,
        Label text NOT NULL

    );');
    echo"<br> Table 'tblBarrier' has been created successfully";

    //creating Strategy Table
    $db->exec('
    CREATE TABLE "SEN"."tblStrat" (
        StratID uuid DEFAULT gen_random_uuid() PRIMARY KEY,
        Label text NOT NULL
    );');
    echo"<br> Table 'tblStrat' has been created successfully";

    //creating Stu-Diag
    $db->exec('
    CREATE TABLE "SEN"."tblStu-Diag" (
        StudentID uuid NOT NULL REFERENCES "SEN"."tblStudent"(StudentID) ON DELETE CASCADE,
        TutorID uuid NOT NULL REFERENCES "SEN"."tblTutor"(TutorID) ON DELETE CASCADE
    );');
    echo"<br> Table 'tblStu-Diag' has been created successfully";

    //creating Bar-Strat
    $db->exec('
    CREATE TABLE "SEN"."tblBar-Strat"(
        BarrierID uuid NOT NULL REFERENCES "SEN"."tblBarrier"(BarrierID) ON DELETE CASCADE,
        StratID uuid NOT NULL REFERENCES "SEN"."tblStrat"(StratID) ON DELETE CASCADE
    );');
    echo"<br> Table 'tblBar-Strat' has been created successfully";

    //creating Diag-Bar
    $db->exec('
    CREATE TABLE "SEN"."tblDiag-Bar"(
        DiagID uuid NOT NULL REFERENCES "SEN"."tblDiag"(DiagID) ON DELETE CASCADE,
        BarrierID uuid NOT NULL REFERENCES "SEN"."tblBarrier"(BarrierID) ON DELETE CASCADE
    );');
    echo"<br> Table 'tblDiag-Bar' has been created successfully";

} catch (PDOException $e) {
    echo "<br><br><br><b>Error: " . $e->getMessage() . "</b>";
}

try{
    //Create user schema
    $db->exec( 'CREATE SCHEMA IF NOT EXISTS "app_user";');
    echo"<br><br>Schema 'user' created successfully";

    //Drops tbluser
    $db->exec( 'DROP TABLE IF EXISTS "app_user"."tbluser" CASCADE;');
    echo"<br> Table 'tbluser' has been dropped";

    //Create tbluser
    $db->exec('
    CREATE TABLE "app_user"."tbluser" (
        user_id uuid DEFAULT gen_random_uuid() PRIMARY KEY,
        username text NOT NULL UNIQUE,
        forename text NOT NULL,
        surname text NOT NULL,
        password text NOT NULL,
        email text NOT NULL,
        dob date NOT NULL,
        two_fa_secret text,
        role smallint
    );');
    echo"<br>Table 'tbluser' created successfully.";
} catch (PDOException $e) {
    echo "<br><br><br><b>Error: " . $e->getMessage() . "</b>";
}

?>