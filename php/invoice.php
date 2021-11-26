<?php

include 'db.php';
session_start();
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM `user` WHERE `usersID` = '$user_id' ";
    $execute = mysqli_query($conn, $sql);
    $row = mysqli_num_rows($execute);
    if($row){
        $rowinfo = mysqli_fetch_array($execute);
        $fName= $rowinfo['usersName'];
        $uName= $rowinfo['usersUid'];
    
    }
}else{
 header("location: /shopping%20App/login.php");
 exit;
}
$id= $_SESSION['user_id'];


require('../fpdf/fpdf184/fpdf.php');
$pdf = new FPDF();
$pdf->addPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(80);
$pdf->Cell(30,20,'Publics Supermarket',0,0,'C');

$pdf->Ln(20);
$pdf->SetFont('Arial','',12);
$pdf->Cell(40,20,"Order Information");
$pdf->Ln(15);
$pdf->SetFont('Arial','',10);
$pdf->Cell(40,10,"Name");
$pdf->Cell(15,10,$_SESSION['fname']);
$pdf->Cell(10,10,$_SESSION['lname']);
$pdf->ln(5);
$pdf->Cell(40,10,"Address:");
$pdf->Cell(40,10,$_SESSION['address']);
$pdf->ln(5);
$pdf->Cell(40,10,"Email");
$pdf->Cell(40,10,$_SESSION['user_email']);
$pdf->ln(5);
$pdf->Cell(40,10,"Card Number");
$pdf->Cell(40,10,$_SESSION['counter']);
$pdf->ln(5);

$pdf->ln(10);
$pdf->SetFont('Arial','b',12);
$pdf->Cell(80);
$pdf->Cell(30,20,'Products',0,0,'C');
$pdf->Ln(10);
$pdf->SetFont('Arial','',10);
$pdf->Cell(20,20,"",0,0);
$pdf->Cell(40,20,"Name",0,0,'C');
$pdf->Cell(40,20,"Quantity",0,0,'C');
$pdf->Cell(40,20,"Unit",0,0,'C');

$pdf->Cell(40,20,"Total",0,0,'C');
$pdf->ln(10);
$counter = $_SESSION['counter'];
$pdf->Line(20,100,200,100); 
$query= mysqli_query($conn,"select * from `productpurchase` WHERE `userid` = '$id' ORDER BY `id` DESC LIMIT $counter");
while($data=mysqli_fetch_array($query)){
    $pdf->Cell(20,20,"",0,0);
    $pdf->Cell(40,20,$data['name'],0,0,'C');
    $pdf->Cell(40,20,$data['quantity'],0,0,'C');
    $pdf->Cell(40,20,$data['price']/$data['quantity'],0,0,'C');
    
    $pdf->Cell(40,20,$data['price'],0,1,'C');
}
$pdf->Output();


?>