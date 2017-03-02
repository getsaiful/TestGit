<?php

include_once "connection.php";

$url = "http://192.168.0.50/boimela/admin/server.php?t=";
$tables = array('books', 'author', 'gallery');

function synchronize()
{
	foreach ($tables as $table) {
		
		$endpoint = $url . $table;
		$results = file_get_contents($endpoint);
		
		$rows = unserialize($results);
		
		if (!empty($rows)) {
		
			foreach ($rows as $row) {
	
				mysql_query(insert($table, $row));
				
			}
		
		}
	}
}

function insert($table, $data)
{
    $sql = array();

    if (is_array($sql) === true)
    {
        $sql['query'] = 'INSERT ';

        foreach ($data as $key => $value)
        {
               $data[$key] = "`$key`" . ' = "' . mysql_real_escape_string($value) . '"';
        }

        $sql['query'] .= 'INTO ' . $table . ' SET ' . implode(', ', $data) . ";";
    }

    return implode('', $sql);
}
