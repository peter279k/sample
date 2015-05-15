<?php
	//This is your result after you using the SQL query.
	$link = null;
	$link = new PDO("mysql:host=localhost;dbname=your-db","your-account","you-passoword");
	$result = array();
	if($link==null)
	{
		$result = "cannot link db.";
	}
	else
	{
		//example1 (It does not need to use preparing.)
		$sql = "SELECT * FROM table_name";
		$result = $link -> query($sql);
		$count = 0;
		while($res = $result -> fetch())
		{
			$result[$count]["field"] = $res["field"]; 
		}
		
		//example2 (It needs to use preparing.)
		$field = "where_value";
		$sql = "SELECT * FROM table_name WHERE your-field = :filed";
		$stmt = $link -> prepare($sql);
		$stmt -> execute(array(":filed"=>$field));
		
		$count = 0;
		while($res = $stmt -> fetch())
		{
			$result[$count]["field"] = $res["field"]; 
		}
	}
	
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