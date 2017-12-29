<?php

return [
	'transaction_mode' => false,
    'current_year' => '2560',
    'current_semester' => '1',
	'current_room_prefix' => 'V'.config('core.current_year').'-'.config('core.current_semester').'-',
	
	'months' => array(
		"1" => "มกราคม",
		"2" => "กุมภาพันธ์",
		"3" => "มีนาคม",
		"4" => "เมษายน",
		"5" => "พฤษภาคม",
		"6" => "มิถุนายน",
		"7" => "กรกฎาคม",
		"8" => "สิงหาคม",
		"9" => "กันยายน",
		"10" => "ตุลาคม",
		"11" => "พฤศจิกายน",
		"12" => "ธันวาคม"
	),
];
