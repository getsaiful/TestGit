<?php

if ( !isset($_REQUEST['term']) )
    exit;

$rs = mysql_query('select book_name from books where book_name like "'. mysql_real_escape_string($_REQUEST['term']) .'%" ');

$data = array();
if ( $rs && mysql_num_rows($rs) )
{
    while( $row = mysql_fetch_array($rs, MYSQL_ASSOC) )
    {
        $data[] = array(
            'label' => $row['book_name'] ,
            'value' => $row['book_name']
        );
    }
}

echo json_encode($data);
flush();
