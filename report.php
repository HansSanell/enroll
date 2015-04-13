<?php

// $INDATA, $person and $mysqli are made available by the calling script
	
if (array_key_exists("actor", $INDATA)) {
	// Someone is acting as the person in personid
	$actor = $INDATA["actor"];
} else {
	// The actor is the person in personid
	$actor = $person->personid;
}	

// Fetch person information
$result = $mysqli->query("SELECT * FROM tee_people WHERE personid=".$person->personid) or die($mysqli->error);
$person = $result->fetch_object();

// Fetch event (boolean) information
$result = $mysqli->query("SELECT event FROM tee_events WHERE personid=".$person->personid);
$events = array();
$ifgEvents = 0;
$wtcEvents = 0;
$hotelNights = 0;
while ($row = $result->fetch_object()) {
	$events[] = $row->event;

	if ($row->event[0] == 'A') {
		++$wtcEvents;
	} elseif ($row->event[0] == 'F') {
		++$ifgEvents;
	}
}

// Fetch variable information
$result = $mysqli->query("SELECT variable, value FROM tee_variables WHERE personid=".$person->personid);
$variables = array();
while ($row = $result->fetch_object()) {
	$variables[$row->variable] = $row->value;
}

$totalCost = 0;

?>
Personal information
	Name						<? echo $person->firstName . " ". $person->lastName; 
	if (!strcmp($person->nationality,"japanese"))
		echo " (". $person->firstNameGanji . " ". $person->lastNameGanji. ")";?>
	
	Nationality					<? echo $person->nationality; ?>
	
	Birthday						<? echo $person->birthDay.'.'.$person->birthMonth.'.'.$person->birthYear;?>
	
	Sex							<? echo $person->sex;?>
	
	Local association / Dojo		<? echo $variables["dojo"];?>
	
	Taido rank					<? 
	if ($person->taidoRank < 0)
		echo abs(($person->taidoRank)).' kyu';
	elseif ($person->taidoRank > 0)
		echo $person->taidoRank . ' dan';
	else
		echo "Don't practice";
	if (in_array("renshi", $events)) { ?>
	
	Renshi						Yes<?
	}
	if (in_array("kyoshi", $events)) { ?>
	
	Kyoshi						Yes<?
	}
	if (in_array("hanshi", $events)) { ?>
	
	Hanshi						Yes<?
	}
	if (in_array("wtcCompetitor", $events)) { ?>
	
	Role						ETC Competitor<?
	}
	if (in_array("staff", $events)) { ?>
	
	Role						Staff<?
	}
	?>

	Package						<? 
	if (strlen($person->package) < 1) {
		echo "none";
	} else {
		if ($person->package == "WTC Competitor") {
			echo "ETC Competitor";
		} else {
			echo $person->package;
		}
		switch ($person->package) {
		case "WTC Competitor": $totalCost += 1600; break;
		case "Tourist": $totalCost += 1450; break;
		case "Judge": $totalCost += 1350; break;
		case "Staff": $totalCost += 1000; break;
		case "Kids": $totalCost += 450; break;
		}		
		if (array_key_exists("diet", $variables)) { ?>

	Diet							<?
			echo $variables["diet"];	
		}
		if (array_key_exists("tshirt", $variables)) { ?>

	T-shirt size					<?
			echo $variables["tshirt"];	
		}
	}?>
	

<?

if ($ifgEvents) {?>
International Friendship Games events
<?
//ifg is included in the packages
$totalCost += 0;
if (in_array("F1", $events)) { echo "	F1 Hokei, men, >=2 kyu, tai or in hokei only \n"; }
if (in_array("F2", $events)) { echo "	F2 Hokei, women, >=2 kyu, tai or in hokei only \n"; }
if (in_array("F3", $events)) { echo "	F3 Jissen, men, <=1999, >=2 kyu\n"; }
if (in_array("F4", $events)) { echo "	F4 Jissen, women, <=1999, >=2 kyu\n"; }
if (in_array("F5", $events)) { echo "	F5 Hokei, men, <=1999, 6-3 kyu, tai or in hokei: only sen, un, hen \n"; }
if (in_array("F6", $events)) { echo "	F6 Hokei, women, <=1999, 6-3 kyu, tai or in hokei: only sen, un, hen \n"; }
if (in_array("F7", $events)) { echo "	F7 Jissen, men, <=1999, 6-3 kyu\n"; }
if (in_array("F8", $events)) { echo "	F8 Jissen, women, <=1999, 6-3 kyu \n"; }
if (in_array("F9", $events)) { echo "	F9 Kids hokei, mixed, 2006-2008, no belt limitation, Own created mini-hokei \n"; }
if (in_array("F10", $events)) { echo "	F10  Kids hokei, mixed, 2003-2005, no belt limitation, Own created mini-hokei \n"; }
if (in_array("F11", $events)) { echo "	F11 Kids jissen, boys, 2003-2005, no belt limitation \n"; }
if (in_array("F12", $events)) { echo "	F12 Kids jissen, girls, 2003-2005, no belt limitation \n"; }
if (in_array("F13", $events)) { echo "	F13 Junior hokei, mixed, 2000-2002, no belt limitation, tai or in hokei only\n"; }
if (in_array("F14", $events)) { echo "	F14 Junior Jissen, boys, 2000-2002, >=6 kyu \n"; }
if (in_array("F15", $events)) { echo "	F15 Junior Jissen, girls, 2000-2002, >=6 kyu \n"; }
if (in_array("F16", $events)) { echo "	F16 Sonnen Hokei, mix, <=1980, 6-3 kyu \n"; }
if (in_array("F17", $events)) { echo "	F17 Sonnen Hokei, mix, <=1980, >=2 kyu \n"; }
if (in_array("F18", $events)) { echo "	F18 Sonnen Jissen, men, <=1980, >=2 kyu \n"; }
if (in_array("F19", $events)) { echo "	F19 Sonnen Jissen, women, <=1980, >=2 kyu \n"; }
if (in_array("F20", $events)) { echo "	F20 Dantai hokei, mixed, <=2003, no belt limitation, team: 5 competitors, tai or in hokei only\n"; }
if (in_array("F21", $events)) { echo "	F21 Dantai jissen, men, <=1995, >= 2 kyu, team: 5 competitors and leader\n"; }
if (in_array("F22", $events)) { echo "	F22 Dantai jissen, women, <=1995, >= 2 kyu, team: 5 competitors and leader\n"; }
if (in_array("F23", $events)) { echo "	F23 Tenkai, mixed, <=2003, no belt limitation, team: 6 competitors \n"; }
echo "\n";
$teamsResult = $mysqli->query("SELECT * FROM tee_teams JOIN tee_players WHERE tee_players.teamid=tee_teams.teamid AND tee_players.personid=".$person->personid) or die($mysqli->error);
if ($teamsResult->num_rows) {
?>
International Friendship Games teams
<?
	$teamEvents = array( "F20", "F21", "F22", "F23");
	while ($team = $teamsResult->fetch_object()) {
		switch ($team->event) {
		case "F20": echo "\tF20 Dantai hokei"; break;
		case "F21": echo "\tF21 Dantai jissen, men"; break;
		case "F22": echo "\tF22 Dantai jissen, women"; break;
		case "F23": echo "\tF23 Tenkai"; break;		
		}	
		echo ": ". $team->name ."\n";
//		echo "\t". $team->name." (".$team->event .")\n";
		$result = $mysqli->query("SELECT concat(firstName, ' ', lastName) AS name, position FROM tee_people JOIN tee_players ON tee_people.personid=tee_players.personid WHERE tee_players.teamid=".$team->teamid ." ORDER BY position") or die($mysqli->error);
		while ($row = $result->fetch_object()) {
			switch ($row->position[0]) {
				case 'l': echo "\t\tLeader\t"; break;
				case 'p': echo "\t\tPlayer ". $row->position[1]."\t"; break;
				case 'r': echo "\t\tReserve ". $row->position[1]."\t"; break;
				default: continue;
			}
			echo $row->name . "\n";
		}
	}
	echo "\n";
}

}

if ($wtcEvents) {
}

if (array_key_exists("ifgJudge",$variables) && strcmp($variables["ifgJudge"],"yes")==0) {
	// Judge duty?>
Judge
	<? 
		if (array_key_exists("wtcJudge",$variables)) echo "European Taido Championships, ";	//TODO: Substitute text!?
		echo "International Friendship Games\n";?>
	National seminars				<? echo $variables["judgeNationalSeminars"]; ?>	
	International seminars			<? echo $variables["judgeInternationalSeminars"]; ?>	
	National championships		<? echo $variables["judgeNationalCount"]; ?>	
	Friendship games				<? echo $variables["judgeIFGCount"]; ?>	
	European championships		<? echo $variables["judgeECCount"]; ?>	
	World championships			<? echo $variables["judgeWCCount"]; ?>	
	Will complete 4 dan			<? echo $variables["willComplete4dan"]; ?>		
	
<?
}	

$volunteerCount = 0;
foreach ($variables as $key => $value) {
	if (strcmp(substr($key, 0, 9), "volunteer")==0 && $value) {
		++$volunteerCount;
	}
}

if ($volunteerCount > 0) {
?>
Volunteer
<? 
if (array_key_exists("volunteer",$variables) &&  $variables["volunteer"]) { echo "	Volunteering during the events\n";}
echo "\n";
}

$hotelResult = $mysqli->query("SELECT * FROM tee_hotel WHERE personid=".$person->personid) or die($mysqli->error);
if ($hotel = $hotelResult->fetch_object()) {
?>
Hotel
	Days						<?	
	$nights = "";
	$nrnights = 0;
	$isStaff = strcmp($person->package,"Staff") == 0;
	if ($hotel->nights[0] == '1') { ++$nrnights; $nights .= "Mon 3.8., ";}
	if ($hotel->nights[1] == '1') { ++$nrnights; $nights .= "Tue 4.8., ";}
	if ($hotel->nights[2] == '1' || $isStaff) { ++$nrnights; $nights .= "Wed 5.8., ";}
	if ($hotel->nights[3] == '1' || $isStaff) { ++$nrnights; $nights .= "Thu 6.8., ";}
	if ($hotel->nights[4] == '1' || $isStaff) { ++$nrnights; $nights .= "Fri 7.8., ";}
	if ($hotel->nights[5] == '1') { ++$nrnights; $nights .= "Sat 8.8., ";}

	$payNights = $nrnights - (($isStaff)?3:0);
	$accompany = true;
	switch ($hotel->type) 
	{
		case "Standard Single": $totalCost += $payNights * 1500; $accompany = false; break;
		case "Standard Double": $totalCost += $payNights * 2400; break;
		case "Superior": $totalCost += $payNights * 70; break;
		case "Cabin": $totalCost += $payNights * 2500; break;
	}	
	
	echo substr($nights,0,-2); ?>
	
	Type						<? echo $hotel->type; ?>
	
<?	if ($accompany) { ?>
	Request for room mate			<? echo ($hotel->accompany)?$hotel->accompany:"none"; ?>
	
	Separate beds				<? echo ($variables["separateBeds"])?"Yes":"No"; ?>
<?	} ?>
	
	Address						<? echo $hotel->address; ?>
	
	Passport number				<? echo $hotel->passportNumber; ?>
	
	Information to the hotel    <? echo $hotel->additional; ?>
	
	Information to the organizer:   <?echo $variables["infoOrganizer"]; ?> <br>
	
<?
}

$optionals = array("optionalBanquette", "optionalWTCticket", "optionalKidsSeminars", "optionalSeminars", "optionalJudgeSeminars", "optionalTshirt", "optionalHoodie", "optionalIFGticket","optionalLunches");
$hasOptionals = false;
foreach ($optionals as $key) {
	if (array_key_exists($key, $variables)) {
		$hasOptionals = true;
		break;
	}
}

if ($hasOptionals) {
?>
Optional services
<?
//add all other optionals
if (array_key_exists("optionalBanquette",$variables) &&  $variables["optionalBanquette"]) { echo "	Banquette Sat 8.8.\n"; $totalCost += 600;}
if (array_key_exists("optionalWTCticket",$variables) &&  $variables["optionalWTCticket"]) { echo "	ETC ticket Sat 8.8.\n"; $totalCost += 120;}
if (array_key_exists("optionalIFGticket",$variables) &&  $variables["optionalIFGticket"]) { echo "	ITFG ticket Fri 7.8.\n"; $totalCost += 75;}
if (array_key_exists("optionalJudgeSeminars",$variables) &&  $variables["optionalJudgeSeminars"]) { echo "	Judge seminars\n"; $totalCost += 400;}
if (array_key_exists("optionalSeminars",$variables) &&  $variables["optionalSeminars"]) { echo "	Taido seminars\n"; $totalCost += 500;}
if (array_key_exists("optionalKidsSeminars",$variables) &&  $variables["optionalKidsSeminars"]) { echo "	Kids Taido seminars\n"; $totalCost += 300;}
if (array_key_exists("optionalTshirt",$variables) &&  $variables["optionalTshirt"]) { echo "	T-shirt\n"; $totalCost += 200;}
if (array_key_exists("optionalHoodie",$variables) &&  $variables["optionalHoodie"]) { echo "	Hoodie\n"; $totalCost += 400;}
if (array_key_exists("optionalLunches",$variables) &&  $variables["optionalLunches"]) { echo "	Lunches: ".$variables["optionalLunches"]."*100\n"; $totalCost += $variables["optionalLunches"]*100;}
}
?>

Total estimated cost				<? echo $totalCost;?> SEK
