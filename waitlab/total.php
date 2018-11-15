<?php
    require("../connect.php");

    $sql = "SELECT
          	COUNT( o.vn ) as total
              FROM
    ovst_queue_server_dep o
    left outer JOIN patient_image p on p.hn = o.hn
  WHERE
  o.dep_visit = 'lab' 
    AND CONCAT( SUBSTRING( YEAR ( CURRENT_DATE ( ) ) + 543, 3, 2 ), DATE_FORMAT( CURRENT_DATE, '%m%d' ) ) = SUBSTRING( o.vn, 1, 6 )
    and o.status = 1
    AND o.stationno IS NULL";

    $query = mysqli_query($objCon, $sql);
    $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
    echo "<b>ขณะนี้มีผู้รอคิวทั้งสิ้น " .$result['total']. " คน</b>";
    mysqli_close($objCon);
 ?>