<?php
 	require("../libs/config.php");
	$success = false;
 	$casinoname=$_POST['editcasinoname'];
	$casinolocation=$_POST['editcasinolocation'];
	$casinoopening=$_POST['editcasinoopening'];
	$casinoid=$_POST['casinoidtoedit'];
	
	// Get Blanks
	$result = $conn->query("SELECT * FROM casinos WHERE id='$casinoid'");
	while($row = mysqli_fetch_array($result)) {
		if( $casinoname == '' ) { $casinoname = $row['name']; };
		if( $casinolocation == '' ) { $casinolocation = $row['location']; };
		if( $casinoopening == '' ) { $casinoopening = $row['opening']; };
	}
	
	function check_uk_postcode($string){
    // Start config
    $valid_return_value = 'valid';
    $invalid_return_value = 'invalid';
    $exceptions = array('BS981TL', 'BX11LT', 'BX21LB', 'BX32BB', 'BX55AT', 'CF101BH', 'CF991NA', 'DE993GG', 'DH981BT', 'DH991NS', 'E161XL', 'E202AQ', 'E202BB', 'E202ST', 'E203BS', 'E203EL', 'E203ET', 'E203HB', 'E203HY', 'E981SN', 'E981ST', 'E981TT', 'EC2N2DB', 'EC4Y0HQ', 'EH991SP', 'G581SB', 'GIR0AA', 'IV212LR', 'L304GB', 'LS981FD', 'N19GU', 'N811ER', 'NG801EH', 'NG801LH', 'NG801RH', 'NG801TH', 'SE18UJ', 'SN381NW', 'SW1A0AA', 'SW1A0PW', 'SW1A1AA', 'SW1A2AA', 'SW1P3EU', 'SW1W0DT', 'TW89GS', 'W1A1AA', 'W1D4FA', 'W1N4DJ');
    // Add Overseas territories ?
    array_push($exceptions, 'AI-2640', 'ASCN1ZZ', 'STHL1ZZ', 'TDCU1ZZ', 'BBND1ZZ', 'BIQQ1ZZ', 'FIQQ1ZZ', 'GX111AA', 'PCRN1ZZ', 'SIQQ1ZZ', 'TKCA1ZZ');
    // End config

    $string = strtoupper(preg_replace('/\s/', '', $string)); // Remove the spaces and convert to uppercase.
    $exceptions = array_flip($exceptions);
    if(isset($exceptions[$string])){return $valid_return_value;} // Check for valid exception
    $length = strlen($string);
    if($length < 5 || $length > 7){return $invalid_return_value;} // Check for invalid length
    $letters = array_flip(range('A', 'Z')); // An array of letters as keys
    $numbers = array_flip(range(0, 9)); // An array of numbers as keys

    switch($length){
        case 7:
            if(!isset($letters[$string[0]], $letters[$string[1]], $numbers[$string[2]], $numbers[$string[4]], $letters[$string[5]], $letters[$string[6]])){break;}
            if(isset($letters[$string[3]]) || isset($numbers[$string[3]])){
                return $valid_return_value;
            }
        break;
        case 6:
            if(!isset($letters[$string[0]], $numbers[$string[3]], $letters[$string[4]], $letters[$string[5]])){break;}
            if(isset($letters[$string[1]], $numbers[$string[2]]) || isset($numbers[$string[1]], $letters[$string[2]]) || isset($numbers[$string[1]], $numbers[$string[2]])){
                return $valid_return_value;
            }
        break;
        case 5:
            if(isset($letters[$string[0]], $numbers[$string[1]], $numbers[$string[2]], $letters[$string[3]], $letters[$string[4]])){
                return $valid_return_value;
            }
        break;
    }

    return $invalid_return_value;
}

	if( check_uk_postcode($casinolocation) == 'valid' ){
		$sql = "UPDATE casinos SET name='$casinoname', location='$casinolocation', opening='$casinoopening' WHERE id='$casinoid'";
		$edit = $conn->query($sql);
	}	

	if ($edit === TRUE) {
		$success = true;
		exit();
	} else {
		$con = null;
		return $success;
	}