<?php 

$randomNumber = rand(10000, 99999);

function randomString($length = 5)
{
	$str = "";
	$characters = array_merge(range('A','Z'));
	$max = count($characters) - 1;
	for ($i = 0; $i < $length; $i++)
	{
		$rand = mt_rand(0, $max);
		$str .= $characters[$rand];
	}
	return $str;
}

$randomString = randomString();

$randomStr = $randomString.$randomNumber;
echo "$randomStr";
 ?>