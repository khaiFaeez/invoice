<?php


// to get number of days from current date
 function getAging($date1)
    {
        $fdate = $date1;
        $tdate = date('Y-m-d');
        $datetime1 = new DateTime($fdate);
        $datetime2 = new DateTime($tdate);
        $interval = $datetime1->diff($datetime2);
        $days = $interval->format('%a');//now do whatever you like with $days
        return $days;

    }

// to set invoice number from current ID
function setInvNo($id)
{    
    return 'INV-'.sprintf('%07d', $id);
}


?>