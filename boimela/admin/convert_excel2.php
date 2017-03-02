<?php

include 'PHPExcel.php';
include 'connection.php';
 $qry="select * from books " ;
   
$limit=20;
$page = mysql_real_escape_string($_GET['page']);
	if($page){
		$start = ($page - 1) * $limit; 
	}else{
		$start = 0;	
		}	
	
    // Get page data
	$query1 = $qry. " LIMIT $start, $limit";
	$res = mysql_query($query1);

$objPHPExcel = new PHPExcel();
 $objPHPExcel ->setActiveSheetIndex(0);
                 $objPHPExcel ->getActiveSheet()->setTitle('booklist');
                 $objPHPExcel ->getActiveSheet()->setCellValue('A1', ' ID ');
                 $objPHPExcel ->getActiveSheet()->setCellValue('B1', ' BOOK NAME');
				 $objPHPExcel ->getActiveSheet()->setCellValue('C1', ' Author');
				 $objPHPExcel ->getActiveSheet()->setCellValue('D1', ' Type');
				 $objPHPExcel ->getActiveSheet()->setCellValue('E1', ' Public');
				 $objPHPExcel ->getActiveSheet()->setCellValue('F1', ' SOn');
			     $objPHPExcel ->getActiveSheet()->setCellValue('G1', ' Price');
				 $objPHPExcel ->getActiveSheet()->setCellValue('H1', ' Date');
				 $objPHPExcel ->getActiveSheet()->setCellValue('I1', ' Sync');
				 $objPHPExcel ->getActiveSheet()->setCellValue('J1', ' Keyword');
				 $objPHPExcel ->getActiveSheet()->setCellValue('k1', ' Cat');
				 $objPHPExcel ->getActiveSheet()->setCellValue('l1', ' byear');
                //merge cell A1 until I1
              //  $this->excel->getActiveSheet()->mergeCells('A1:I1');
                //set aligment to center for that merged cell (A1 to C1)
                $objPHPExcel ->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objPHPExcel->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objPHPExcel ->getActiveSheet()->getStyle('C1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objPHPExcel ->getActiveSheet()->getStyle('D1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objPHPExcel ->getActiveSheet()->getStyle('E1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objPHPExcel ->getActiveSheet()->getStyle('F1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objPHPExcel ->getActiveSheet()->getStyle('G1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objPHPExcel ->getActiveSheet()->getStyle('H1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objPHPExcel ->getActiveSheet()->getStyle('I1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objPHPExcel ->getActiveSheet()->getStyle('J1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objPHPExcel ->getActiveSheet()->getStyle('k1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
						$objPHPExcel ->getActiveSheet()->getStyle('l1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                //make the font become bold
                //$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
                $objPHPExcel ->getActiveSheet()->getStyle('A1')->getFont()->setSize(14);
				$objPHPExcel ->getActiveSheet()->getStyle('B1')->getFont()->setSize(14);
				$objPHPExcel ->getActiveSheet()->getStyle('C1')->getFont()->setSize(14);
				$objPHPExcel ->getActiveSheet()->getStyle('D1')->getFont()->setSize(14);
				$objPHPExcel ->getActiveSheet()->getStyle('E1')->getFont()->setSize(14);
				$objPHPExcel ->getActiveSheet()->getStyle('F1')->getFont()->setSize(14);
				$objPHPExcel ->getActiveSheet()->getStyle('G1')->getFont()->setSize(14);
				$objPHPExcel ->getActiveSheet()->getStyle('H1')->getFont()->setSize(14);
				$objPHPExcel ->getActiveSheet()->getStyle('I1')->getFont()->setSize(14);
				$objPHPExcel ->getActiveSheet()->getStyle('J1')->getFont()->setSize(14);
				$objPHPExcel ->getActiveSheet()->getStyle('k1')->getFont()->setSize(14);
				$objPHPExcel ->getActiveSheet()->getStyle('l1')->getFont()->setSize(14);
			
                //$this->excel->getActiveSheet()->getStyle('A1')->getFill()->getStartColor()->setARGB('#333');*/
                 for($col = ord('A'); $col <= ord('L'); $col++){
                //set column dimension
                $objPHPExcel ->getActiveSheet()->getColumnDimension(chr($col))->setAutoSize(true);
                 //change the font size
                $objPHPExcel ->getActiveSheet()->getStyle(chr($col))->getFont()->setSize(12);
                 
               $objPHPExcel ->getActiveSheet()->getStyle(chr($col))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
          }
		    
	  
        //$val=$_SESSION['val1'];
        
		 $counter=2;
        while($row=mysql_fetch_array($res)){
                 
                 $objPHPExcel ->getActiveSheet()->setCellValue('A'.$counter, $row['id']);
                 $objPHPExcel ->getActiveSheet()->setCellValue('B'.$counter, $row['book_name']);
				 $objPHPExcel ->getActiveSheet()->setCellValue('C'.$counter, $row['author']);
				 $objPHPExcel ->getActiveSheet()->setCellValue('D'.$counter, $row['type']);
				 $objPHPExcel ->getActiveSheet()->setCellValue('E'.$counter, $row['public']);
				 $objPHPExcel ->getActiveSheet()->setCellValue('F'.$counter, $row['son']);
			     $objPHPExcel ->getActiveSheet()->setCellValue('G'.$counter, $row['price']);
				 $objPHPExcel ->getActiveSheet()->setCellValue('H'.$counter, $row['date']);
				 $objPHPExcel ->getActiveSheet()->setCellValue('I'.$counter, $row['sync']);
				 $objPHPExcel ->getActiveSheet()->setCellValue('J'.$counter, $row['keyword']);
				 $objPHPExcel ->getActiveSheet()->setCellValue('K'.$counter, $row['cat']);
				 $objPHPExcel ->getActiveSheet()->setCellValue('L'.$counter, $row['byear']);
                //merge cell A1 until I1
	 $counter++;	
 }

         
             $filename=date('YmdHis').'booklist.xls'; //save our workbook as this file name
                header('Content-Type: application/vnd.ms-excel'); //mime type
                header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
                header('Cache-Control: max-age=0'); //no cache
 
                //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
                //if you want to save it as .XLSX Excel 2007 format
                $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');  

                //force user to download the Excel file without writing it to server's HD
                $objWriter->save('php://output');



?>