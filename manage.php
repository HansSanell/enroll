<!DOCTYPE html>
<!-- PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  -->
<html>
<head>
    
	<script type="text/javascript" src="js/jquery-1.9.0.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.10.0.custom.min.js"></script>
	<link href="css/jquery-ui-1.10.1.custom.css" rel="stylesheet" />
	<script type="text/javascript" src="js/tee_manager.js"></script>		
	<link href="css/tee.css" rel="stylesheet" type="text/css" />
	<link href="css/tee_manager.css" rel="stylesheet" type="text/css" />

    <title><?php echo $str_event_short; ?> Enrollment - Manage</title>
</head>
<body>
<?php 

function getPersonsFromCountry() {
    include 'database.php';
	try {
		$result = $mysqli->query("SELECT nationality FROM tee_people WHERE loginid='".$_GET["loginid"]."'") or die($mysqli->error);
		$nation = $result->fetch_object()->nationality;
		
	 
	
		$result = $mysqli->query("SELECT personid, firstName, lastName FROM tee_people WHERE nationality='".$nation."' AND role='wtc'") or die($mysqli->error);
	} catch (Exception $e) {
	    echo "caught exception:  " .$e->getMessage();
	}
	$response = [];	
	
	while ($obj = $result->fetch_object()) {
		array_push($response, $obj);
		
		
	}
	
	return $response;
}

?>
<div class="wrapper">
	<div class="logo"></div>
	
	<div class="navigation">
		<ul> 
		<!--	<li><a href="#" data-target="peoplePage">People</a></li>-->
			<li><a href="#" data-target="wtcIndividualPage">Individual events</a></li>
			<li><a href="#" data-target="wtcTeamPage">Team events</a></li>
			<li><a href="#" data-target="reportsPage">Reports</a></li>
		</ul>
		<div class="clearfloat"></div>
	</div>
	
    <div class="pages">
	    <div class="page" id="peoplePage">
		    <h1>Every <span id="nationality"></span> enrollment</h1>

		    <p>
			    This page allows you to manage who has enrolled to the system from your country. The bottons after a name have the following effects:
            </p>
			<ul>
				<li>Edit: Open an edit dialog to change the personal information of the selected person.</li>
				<li>Enroll: Open a new tab in the enrollment system as if the person had logged in to the personal enrollment system.</li>
				<li>Report: Open a new tab of containing a summary report of all the choices for a person. </li>
			</ul>
			Note that you may only manage the enrollments of your own nationality.
		    <br />
		
		    <div id="addPersonButton">Add person</div>
		    <div id="peopleTable">
			    <img src="images/ajax-loader.gif" alt="Loading" />
		    </div>
	    </div>	
	    <div class="page" id="wtcIndividualPage">
		    <h1>Individual <?php $str_event_shorter?> events</h1>
		    <p>
			    This page allows you to assign competitors to the <?php echo $str_event_shorter?> events. A person can enroll to an event only if they have been assigned
                the "<?php echo $str_event_shorter?> Competor" role and their taido rank and birth year meet the required criteria. In some cases, if a person is very young
                or has a low taido rank, a letter of recommendation (LOR) may be required. LOR should be sent by email to the 
                <?php echo $contact_name ?> (<a href="mailto:<?php echo $contact_email ?>"><?php echo $contact_email ?></a>) preferably before the submission 
                deadline ends. All applicants are documented and reviewed by both the <?php echo $contact_name ?> and the World Taido Federation.
		    </p>
		    <div id="events">
			    <span class="eventTitle">A1 Hokei, men</span>
			    <div class="addToEvent">
					<div class="addIndButton" data-code="A1">Add person</div>
			    </div>
			    <div class="clearfloat"></div>
			
			    <span class="eventTitle">A2 Hokei, women</span>
			    <div class="addToEvent">
				    <div class="addIndButton" data-code="A2">Add person</div>
			    </div>
			    <div class="clearfloat"></div>
			
			    <span class="eventTitle">A3 Jissen, men</span>
			    <div class="addToEvent">
				    <div class="addIndButton" data-code="A3">Add person</div>
			    </div>
			    <div class="clearfloat"></div>
			    
			    <span class="eventTitle">A4 Jissen, women</span>
			    <div class="addToEvent">
					<div class="addIndButton" data-code="A4">Add person</div>
			    </div>
			    <div class="clearfloat"></div>
			    
			
		    </div>
	    </div>	
	    <div class="page" id="wtcTeamPage">
		    <h1>Team events</h1>
		    <p>
			    You can add competitors to the team events of <?php echo $str_event_short?>. When a person is selected to a team, he or she are automatically
                enrolled to the event. 
		    </p>
		    <p>
			    A person can be included in a team only if they have been assigned the "<?php echo $str_event_shorter?> Competor" role and their taido rank and birth year
                meet the required criteria. However, these requirements do not apply to leaders and hence you can add any enrolled person as a 
                team leader. Also, in some cases, if a person is very young or has a low taido rank, a letter of recommendation (LOR) may be 
                required. LOR should be sent by email to the <?php echo $contact_name ?> (<a href="mailto:<?php echo $contact_email ?>"><?php echo $contact_email ?></a>) 
                preferably before the submission deadline ends. All applicants are documented and reviewed by both the <?php echo $contact_name ?> and 
                the World Taido Federation.		
		    </p>
		
		    <span class="eventTitle">A5 Dantai hokei, men</span>
		    <div class="addTeamButton" data-code="A5">Add team</div>
		    <div class="clearfloat"></div>
		    
		
		    <span class="eventTitle">A6 Dantai hokei, women</span>
		    <div class="addTeamButton" data-code="A6">Add team</div>
		    <div class="clearfloat"></div>
		    

		    <span class="eventTitle">A7 Dantai jissen, men</span>
		    <div class="addTeamButton" data-code="A7">Add team</div>
		    <div class="clearfloat"></div>
		    

		    <span class="eventTitle">A8 Dantai jissen, women</span>
		    <div class="addTeamButton" data-code="A8">Add team</div>
		    <div class="clearfloat"></div>
		    
		
		    <span class="eventTitle">A9 Tenkai, mixed</span>
		    <div class="addTeamButton" data-code="A9">Add team</div>
		    <div class="clearfloat"></div>
		    
		
		    <span class="eventTitle">A10 Tenkai, women</span>
		    <div class="addTeamButton" data-code="A10">Add team</div>
		    <div class="clearfloat"></div>
		    
	    </div>	
	    <div class="page" id="reportsPage">
		    <h1>Reports of all enrollments</h1>
		
		    <p>You can produce various reports from the database to inspect what people have enrolled.
		    </p>
		
		    <div class="button report" id="peopleReport">Personal details</div>
		    <div class="button report" id="wtcPeopleReport">People enrolled to each WTC event</div>		
		    <div class="button report" id="ifgPeopleReport">People enrolled to each IFG event</div>
		    <div class="button report" id="hotelReport">Hotel selections</div>
	    <?php if ($person->manager > 1) { ?>
			    <div class="button report" id="statsReport">Statistics</div>
			    <div class="button report" id="volunteerReport">Volunteer</div>
	    <?php } ?>
			    <div class="button report" id="megaReport">All enrollment information</div>
				
		    <p>This page is still under construction. New content will be added shortly.</p>		
	    </div>		
	
	    <div class="clearfloat"></div>	
    </div> <!-- pages -->

	<div class="clearfloat"></div>
	<div id="controls">
		<div class="button" id="nextButton">Next</div>		
		
		<div class="button" id="prevButton">Previous</div>
		<div class="clearfloat"></div>		
	</div>

	<div id="footer">
		<div id="footerLeft">
			Help? <a href="mailto:<?php echo $contact_email ?>"><?php echo $contact_email ?></a>
		</div>
		<!-- 
		<div id="footerRight">
			<a href="http://www.motify.fi" target="_blank"><img src="images/logo-small.png" alt="Motify" /></a>			
		</div>
		 -->
	</div>

</div> <!-- wrapper -->

<!-- dialogs -->
<div id="dialog-confirm-submit" title="Really submit?" class="dialog">
	<p>
        When you submit, it will be considered a signed confirmation of your enrollment. If you have IFG dantai or tenkai events selected, other 
        people will be able to add you to their teams.
	</p>	
	<p>
	    You may update your submission or retract it at any time before the submission deadline <?php $submission_deadline ?>.
	</p>
</div>

<div id="dialog-confirm-retract" title="Really retract?" class="dialog">
	<p>
        Do you really want to retract your submission? You will be removed from any IFG dantai or tenkai teams you might be selected in.
	</p>	
	<p>
		You may resubmit at any time before the submission deadline <?php $submission_deadline ?>.
	</p>
</div>

<div id="dialog-edit-person" title="Edit person" class="dialog">
	<form id="editPersonForm">
		<label for="firstName"><span class="title">First name</span>
			<input type="text" name="firstName" />
		</label>
		<label for="lastName"><span class="title">Last name</span>
			<input type="text" name="lastName" />
		</label>
		<label for="firstNameGanji"><span class="title">First name in Ganji</span>
			<input type="text" name="firstNameGanji" />
		</label>
		
		<label for="lastNameGanji"><span class="title">Last name in Ganji</span>
			<input type="text" name="lastNameGanji" />
		</label>

		<label for="email"><span class="title">Email address</span>
			<input type="text" name="email" />
		</label>

		<label for="birthDay"><span class="title">Birthday</span>
			<input type="text" name="birthDay" class="birthDay" />
			<input type="text" name="birthMonth" class="birthDay" />
			<input type="text" name="birthYear" class="birthDay" />
		</label>		
		
		<label for="sex"><span class="title">Sex</span>		
			<select name="sex" id="sex">
				<option value="male" selected="selected">male</option>
				<option value="female">female</option>
			</select>		
		</label>
		
		<label for="taidoRank"><span class="title">Taido rank</span>
			<select name="taidoRank" id="taidoRank">
				<option value="8">8 dan</option>
				<option value="7">7 dan</option>
				<option value="6">6 dan</option>
				<option value="5">5 dan</option>
				<option value="4">4 dan</option>
				<option value="3">3 dan</option>
				<option value="2">2 dan</option>
				<option value="1">1 dan</option>
				<option value="-1">1 kyu</option>
				<option value="-2">2 kyu</option>
				<option value="-3">3 kyu</option>
				<option value="-4">4 kyu</option>
				<option value="-5">5 kyu</option>
				<option value="-6">6 kyu</option>
				<option value="-7" selected="selected">7 kyu</option>
				<option value="-8">Kids rank</option>
				<option value="none">don't practice</option>						
			</select>			
		</label>
		
		<label for="role"><span class="title">Role</span>
			<select name="role">
				<option value="">None</option>
				<option value="wtc"><?php echo $str_event_shorter?> Competitor</option>
				<option value="staff">Staff</option>
			</select>
		</label>		
	</form>
	<p>
	Note! When the personal information is changed, the enrollment to events are updated accordingly without additional notification. For example, if sex is changed from male to female, all enrollments to male events will be removed automatically, including corresponding teams.
	</p>
</div>

<div id="dialog-confirm-remove-person" title="Really remove person?" class="dialog">
	<p>Do you really want to remove this person? He or she will be completely removed from the database, which includes any teams.
	</p>
</div>

<div id="dialog-enroll-ready" title="Editing enrollment" class="dialog">
	<p>A new tab has been opened, where you can edit the enrollment information for the selected person. Close this dialog box to refresh the contents of this page.
	</p>
</div>
<div id="dialog-add-ind" title="Add a induvidual" class="dialog" style="min-height:80px">
	<label for="name">
	Select the person from your country to add to this event.
	<div  class="clearfloat"></div>
		
		<?php 
		$persons = getPersonsFromCountry(); 
		//echo "test";<input class='addToEventInput' id='".$ids[$i]."In'/>
		echo "<div id='name'><span class='title'>Name</span><select name='pName' id='pName' class='variable'>";
		echo "<option value='0'>Select participant</option>";
		for($y=0; $y<count($persons); $y++) 
		{
			//echo "<option value='".$persons[$y]->personid."'>".$persons[$y]->firstName." ".$persons[$y]->lastName."</option>";
			echo "<option value='".$persons[$y]->firstName." ".$persons[$y]->lastName."'>".$persons[$y]->firstName." ".$persons[$y]->lastName."</option>";
		}
		echo "</select></div>";
		
		?>
<!--		<div class="selectPerson" data-position="person" id="pName"></div>
		<input class="addToEventInput" id="pName"/>-->
	</label>
</div>
<div id="dialog-add-team" title="Add a new team" class="dialog">
	<label for="teamName"><span class="title">Team name</span>
		<input type="text" name="teamName" id="teamName" />
		<div id="teamName_loading" class="loading"><img src="images/ajax-loader.gif" alt="Loader" /></div>
		<div id="teamName_nameok" class="nameok"><img src="images/tick.png" alt="Tick" /></div>
	</label>	
	<?php //echo getPersonsFromCountry(); 
	

	$ids = ["lead", "p1", "p2", "p3", "p4", "p5", "p6", "r1", "r2"];
	$titles = ["Leader", "Player 1", "Player 2", "Player 3", "Player 4", "Player 5", "Player 6", "Reserve 1", "Reserve 2"];
	for($i=0; $i<9; $i++) 
	{
		$persons = getPersonsFromCountry(); 
		//echo "test";<input class='addToEventInput' id='".$ids[$i]."In'/>
		echo "<div id='".$ids[$i]."'><span class='title'>".$titles[$i]."</span><select name='player' id='".$ids[$i]."In' class='variable'>";
		echo "<option value='0'>Select participant</option>";
		for($y=0; $y<count($persons); $y++) 
		{
			echo "<option value='".$persons[$y]->personid."'>".$persons[$y]->firstName." ".$persons[$y]->lastName."</option>";
		}
		echo "</select></div>";
	}
	
	?>
	<!--<div id="lead"><label for="lead"><span class="title">Leader</span>
		<input class="addToEventInput" id="leadIn"/>
	</label>
	</div>
	<div id="p1">
		<label for="p1"><span class="title">Player 1</span>
			<input class="addToEventInput" id="p1In"/>
		</label>
	</div>
	<div id="p2">
		<label for="p2"><span class="title">Player 2</span>
			<input class="addToEventInput" id="p2In"/>
		</label>
	</div>
	<div id="p3">
		<label for="p3"><span class="title">Player 3</span>
			<input class="addToEventInput" id="p3In"/>
		</label>
	</div>
	<div id="p4">
		<label for="p4"><span class="title">Player 4</span>
			<input class="addToEventInput" id="p4In"/>
		</label>
	</div>
	<div id="p5">
		<label for="p5"><span class="title">Player 5</span>
			<input class="addToEventInput" id="p5In"/>
		</label>
	</div>
	<div id="p6">
		<label for="p6"><span class="title">Player 6</span>		
			<input class="addToEventInput" id="p6In"/>
		</label>
	</div>
	<div id="r1">
		<label for="r1"><span class="title">Reserve 1</span>		
			<input class="addToEventInput" id="r1In"/>
		</label>
	</div>
	<div id="r2">
		<label for="r2"><span class="title">Reserve 2</span>		
			<input class="addToEventInput" id="r2In"/>
		</label>
	</div>-->
</div>

<div id="submitStatus"></div>			

</body>
</html>