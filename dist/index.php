
<?php

	$data = json_decode(file_get_contents('https://www.googleapis.com/civicinfo/v2/representatives?key=AIzaSyCem3ihUqDX2OwsqmVxa9F0R1hJwllShZc&address='.$searchaddress_final));

	// setup blank array
	$jobs = [];
	// loop through each office 
	foreach ($data->offices as $office) {
		// loop through each officialIndices array
    if (isset($office->officialIndices)) {
  		foreach ($office->officialIndices as $officialIndices) {
  			$jobs += [ $officialIndices => $office->name];
  		}
    }
	}
	// print_r($jobs);

// setup count
$i = 0;

// loop through officials
foreach ($data->officials as $person) {
	// print_r($person);	
	echo '<div class="card">';	
	echo '<h3>'.$person->name.'</h3>';
	echo '<h5>'.$jobs[$i].'</h5>';
	echo '<p> Party: '.(isset($person->party)? $person->party :'Not Listed').'</p>';
	echo '</div>';
// add 1 count to $i;
$i++;
}

?>

</div>
