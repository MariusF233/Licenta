<?php


function createActivity($conn, $nume_activitate, $tip_activitate, $date, $durata)

{
    $sql = "INSERT INTO activities2 (nume_activitate,tip_activitate,data1,durata) VALUES (?,?,?,?);";
    $statement = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($statement, $sql)) {

        header("location:../new_visit.php?error4=statementFailed");
        exit();
    }


    mysqli_stmt_bind_param($statement, "ssss", $nume_activitate, $tip_activitate, $date, $durata);
    mysqli_stmt_execute($statement);


    mysqli_stmt_close($statement);
    header("location:../activities.php?error4=none");
    exit();
}
//resurse pt fiecare obiect

function adaugaDetalii($conn,$nume_user, $facultatea, $an, $grupa)
{
    $sql = "INSERT INTO detalii_user (nume_user,facultate,an,grupa) VALUES (?,?,?,?);";
    $statement = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($statement, $sql)) {

        header("location:../orarul_meu.php?error5=statementFailed");
        exit();
    }


    mysqli_stmt_bind_param($statement, "ssss", $nume_user, $facultatea, $an, $grupa);
    mysqli_stmt_execute($statement);


    mysqli_stmt_close($statement);
    header("location:../orarul_meu.php?error3=none");
    exit();
}
