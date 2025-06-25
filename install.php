<?php
try{
    //creating user schema
    $db->exec(statement: 'CREATE SCHEMA IF NOT EXISTS "SEN";');
    echo"<br><br>Schema 'SEN' created successfully";
    $db->exec("");

    //creating UUID extention for random numbers
    $db->exec(statement: 'CREATE EXTENSION IF NOT EXISTS "uuid-ossp":');
    echo"<br> Extention for UUID has been created";

    //dropping Student table
    $db-exec(statement: 'DROP TABLE IF EXISTS "SEN"."tblStudent" CASCADE;');
    echo"<br> Table 'tblStudent' has been dropped";

    //dropping Tutor table
    $db-exec(statement: 'DROP TABLE IF EXISTS "SEN"."tblTutor" CASCADE;');
    echo"<br> Table 'tblTutor' has been dropped";

    //dropping Diagnosis table
    $db-exec(statement: 'DROP TABLE IF EXISTS "SEN"."tblDiag" CASCADE;');
    echo"<br> Table 'tblDiag' has been dropped";

    //dropping Barrier table
    $db-exec(statement: 'DROP TABLE IF EXISTS "SEN"."tblBarrier" CASCADE;');
    echo"<br> Table 'tblBarrier' has been dropped";

    //dropping Strategies table
    $db-exec(statement: 'DROP TABLE IF EXISTS "SEN"."tblStrat" CASCADE;');
    echo"<br> Table 'tblStrat' has been dropped";

    //creating Student Table
    $db->exec(statement: '
    CREATE TABLE "SEN"."tblStudent" (
        StudentID uuid DEFAULT gen_random_uuid() PRIMARY KEY,
        Forename text NOT NULL,
        Surname text NOT NULL,
        YearGroup smallint,
        TutorID smallint,
        House text NOT NULL,
    )'
);
}

?>