<?php
include_once 'fpdf/fpdf.php';
include_once '../Database/DB.php';
/**
 *
 * @author Ahmed
 */
$date=  date('l jS \of F Y h:i:s A');
$db = DB::getInstance(); //object from database class
$student = $db->select_one_v2("user", "usertypeid", 2); //get total number of students
$prof = $db->select_one_v2("user", "usertypeid", 3); //get total number of professors
$faculty = $db->select_all("faculty"); //get total number of faculty
$university = $db->select_all("university"); //get total number of university
$course = $db->select_all("course");//get data od courses
//class report_pdf extends FPDF{

//Header Logo   
$image = "../Design/images/pp.png";
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetTitle("Admin report"); //title of Report page

//Header
$pdf->Image($image, 5, 5, 20, 20);
$pdf->SetFont("Arial", "B", 40);
$pdf->SetTextColor(255, 114, 0);
$pdf->Setx(100);
$pdf->Cell(15, 5, "Website Report", 0, 1, 'C');//name of heading(report)
$pdf->Ln(2);
$pdf->SetFont("Arial", "", 10);// Print date
$pdf->Setx(95); 
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(15, 13, $date, 0, 1, 'C');
$pdf->Sety(30);
$pdf->Cell(0, 0, '', 1, 1, 'c');
$pdf->Sety(30);

//Print  number of sudents
$pdf->SetFont("Arial", "", 10);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(20, 10, 'Number of students on system is : ' . count($student), 0, 1, 'c');
$pdf->SetDrawColor(0, 255, 0);

//Print  number of professors
$pdf->SetFont("Arial", "", 10);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(20, 10, 'Number of professors on system is : ' . count($prof), 0, 1, 'c');
$pdf->SetDrawColor(0, 255, 0);

//Print  number of Faculties
$pdf->SetFont("Arial", "", 10);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(20, 10, 'Number of Faculties on system is : ' . count($faculty), 0, 1, 'c');
$pdf->SetDrawColor(0, 255, 0);

//Print  number of universities
$pdf->SetFont("Arial", "", 10);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(20, 10, 'Number of universities on system is : ' . count($university), 0, 1, 'c');
$pdf->SetDrawColor(0, 0, 0);
$pdf->Cell(0, 0, '', 1, 1, 'c');
$pdf->Cell(0,3, '', 0, 1, 'c');



//print table OF courses
$pdf->SetFont("Arial", "B", 10);
$pdf->MultiCell(40, 10, "Courses Info : ", 1,'C');
$pdf->Ln(5);
$pdf->SetDrawColor(0, 0, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Setx(70);
$pdf->Cell(30, 10, "Course ID", 1, 0, 'C');
$pdf->Cell(30, 10, "Course Name", 1, 1, 'C');
$pdf->SetFont("Arial", "", 10);
for ($i = 0; $i <  count($course); $i++) {
    $pdf->Setx(70);
    $pdf->Cell(30, 10, $course[$i]['c_id'], 1, 0, 'C');
    $pdf->Cell(30, 10,$course[$i]['c_name'], 1, 1, 'C');
}
$pdf->Setx(70);
$pdf->MultiCell(60, 10, "Total Number of Course is ".count($course), 1);



//$pdf->
$pdf->Output();
