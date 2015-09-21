<?php
	

	$csv = array_map('str_getcsv', file('apartments.csv'));
	$geocodeKey = "&key=AIzaSyBQGSHBTA-RjYphVfWVQcFQfVhw8N-swrU";
	$geocodeUrl = 'https://maps.googleapis.com/maps/api/geocode/json?address=';

 	foreach($csv as $c){
		
		$address = urlencode("56 Woodland Place, Fort Thomas KY 41075");

 		$geocodedAddress = file_get_contents($geocodeUrl . $address . $geocodeKey);

		$gc = json_decode($geocodedAddress, true);

		if ($gc['status'] == "OK")
		{
            $adc = $gc['results'][0]['address_components'];
            $apt['address'] = $adc[0]['short_name'] . " " . $adc[1]['short_name'];
            $apt['city'] = $adc[3]['short_name'];
            $apt['state'] = $adc[5]['short_name'];
            $apt['zipcode'] = $adc[7]['short_name'];
            $apt['lat'] = $gc['results'][0]['geometry']['location']['lat'];
            $apt['long'] = $gc['results'][0]['geometry']['location']['lng'];

		} else {
            print_r("Error");
            continue;
        }

        $community = "";
        $phone = "";
        $fax = "";
        $bdrms = "";
        $section8 = "";
        $mgmt = "";
        $x = "";
        $utilities = "";
        $pets = "";
        $wd = "";





 	}

?>