<?php
	//This is your result after you using the SQL query.
	
	$result = array();
	if(empty($_POST["count"]))
	{
		$result[0]["tw_name"] = "日月潭";
		$result[0]["en_name"] = "moon";
		$result[0]["content"] = "一個風景";
		$result[1]["tw_name"] = "日月潭2";
		$result[1]["en_name"] = "moon2";
		$result[1]["content"] = "一個風景2";
	}
	else
	{
		$count = $_POST["count"];
		$result[0]["tw_name"] = "日月潭".($count+1);
		$result[0]["en_name"] = "moon".($count+1);
		$result[0]["content"] = "一個風景".($count+1);
	}
	
	echo json_encode($result);
?>