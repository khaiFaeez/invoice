<?php
// The request is a JSON request.
// We must read the input.
// $_POST or $_GET will not work!


define('DB_DRIVER', 'mysql');
define('DB_SERVER', 'localhost');
define('DB_SERVER_USERNAME', 'root');
define('DB_SERVER_PASSWORD', '');
define('DB_DATABASE', 'invoice');

$dboptions = array(
    PDO::ATTR_PERSISTENT => FALSE,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);
try {
  $DB = new PDO(DB_DRIVER . ':host=' . DB_SERVER . ';dbname=' . DB_DATABASE, DB_SERVER_USERNAME, DB_SERVER_PASSWORD, $dboptions);
} catch (Exception $ex) {
  echo $ex->getMessage();
  die;
}


$data = file_get_contents("php://input");

$objData = json_decode($data);

// perform query 




$query = 'select Invoice.Name as client_id,Invoice.Id as InId,Date,Inv_No,Grand_Total,Overdue_Amt,Status_Inv,Client.MyKad_SSM as ic,Client.Name as clientname FROM invoice.Invoice LEFT JOIN invoice.Client ON invoice.Invoice.MyKad_SSM = invoice.Client.id
WHERE
Client.MyKad_SSM LIKE "%'. $objData->data .'%" OR Client.Mobile_No LIKE "%'. $objData->data .'%" OR Client.Phone LIKE "%'. $objData->data .'%" OR Client.Off_Phone LIKE "%'. $objData->data .'%"

';


 try {
$button = 'OPEN';
$arr = array();
    $stmt = $DB->prepare($query);
    $stmt->execute();
          $rowx =  $stmt->fetchAll(PDO::FETCH_ASSOC);
   foreach($rowx as $row){   
    if($stmt->rowCount()>0){

     if (strpos($row['Inv_No'], 'INV-')!== false) {
    $folder = 'p1';$button = 'DETAIL';$inv = $row['Inv_No'];
}
elseif(strpos($row['Inv_No'], 'T-')!== false){
    $folder = 't1';$button = 'DETAIL';$inv = $row['Inv_No'];
}
elseif(strpos($row['Inv_No'], 'TICH-')!== false){
    $folder = 'dcti/ch';$button = 'DETAIL';$inv = $row['Inv_No'];
}
elseif(strpos($row['Inv_No'], 'CH-')!== false){
    $folder = 'c1';$button = 'DETAIL';$inv = $row['Inv_No'];
}
elseif(strpos($row['Inv_No'], 'DCTI-')!== false){
    $folder = 'dcti';$button = 'DETAIL';$inv = $row['Inv_No'];
}

elseif(strpos($row['Inv_No'], 'JKG-')!== false){
    $folder = 'id';$button = 'DETAIL';$inv = $row['Inv_No'];
}
elseif(strpos($row['Inv_No'], 'IDM-')!== false){
    $folder = 'id/idm';$button = 'DETAIL';$inv = $row['Inv_No'];
}
elseif(strpos($row['Inv_No'], 'BJSC-')!== false){
    $folder = '';$button = '';$inv = $row['Inv_No'];
}
elseif(strpos($row['Inv_No'], 'DM-')!== false){
    $folder = '';$button = '';$inv = $row['Inv_No'];
}

$fulldir = "http://www.myxara.com/".$folder."/Invoice_view.php?SelectedID=".$row['InId'];
//$fulldir = "http://www.deexara.com/".$folder."Invoice_view.php?SelectedID=".$row['InId'];

$clientdetail="http://deexara.com/leads/index.php?search_number=".$row['ic'];
$create_inv = "invoice/".$row['client_id'];
$link="DETAIL";

		$other = array(
		"Date" => $row['Date'],
		"Invoice" => $inv,	
		"Total" => $row['Grand_Total'],
		"Overdue" => $row['Overdue_Amt'],
		"Status" => $row['Status_Inv'],
		"IC" => $row['ic'],
		"Name" => $row['clientname'],
		//"InvoiceDetail" => $fulldir,
		//"Button" => $button,
		"ClientDetail" => $clientdetail,
		"Link" => $link,
        "inv" => $create_inv,
			);
			array_push($arr, $other);	
	}
	
	
	}


 
$result = array(
"records" => $arr);


echo $json_response = json_encode($result);

 }
 catch (Exception $ex) {
  echo $ex->getMessage();
  die;
}


?>