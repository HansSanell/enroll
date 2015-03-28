<!DOCTYPE html> <!-- PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> -->
<html>
<head>
	<script type="text/javascript" src="js/jquery-1.9.0.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.10.0.custom.min.js"></script>
	<link href="css/jquery-ui-1.10.1.custom.css" rel="stylesheet" />
	<script type="text/javascript" src="js/tee.js"></script>		
	<link href="css/tee.css" rel="stylesheet" type="text/css" />
    
    <title><?php echo $str_event_short ?> Enrollment - Form</title>
</head>
<body>

<div class="wrapper">
	<div class="logo"></div>
	
	<div class="navigation">
		<ul> 
			<li><a href="#" data-target="personalPage">Personal information</a>
				<div class="summaryCost">&nbsp;</div>
			</li>
			<li>
				<a href="#" data-target="packagesPage">Packages</a>
				<div class="summaryCost"><div class="variableObserver" data-variable="packageCost">0</div> SEK</div>
			</li>
			<li id="ifgNavi"><a href="#" data-target="ifgEventsPage">IFG</a>
				<div class="summaryCost">+ <div class="variableObserver" data-variable="ifgCost">0</div> SEK</div>
			</li>
			<li id="ifgTeamsNavi"><a href="#" data-target="ifgTeamsPage">IFG Teams</a>
			</li>
			<li id="judgeNavi"><a href="#" data-target="judgePage">Judges</a>
			</li>
			<li><a href="#" data-target="volunteerPage">Volunteer</a>
			</li>
			<li><a href="#" data-target="hotelPage">Hotel</a>
				<div class="summaryCost">+ <div class="variableObserver" data-variable="hotelCost">0</div> SEK</div>
			</li>
			<li><a href="#" data-target="optionalPage">Optionals</a>
				<div class="summaryCost">+ <div class="variableObserver" data-variable="optionalsCost">0</div> SEK</div>			
			</li>
			<li><a href="#" data-target="summaryPage">Summary</a>
				<div class="summaryCost">= <div class="variableObserver" data-variable="totalCost">0</div> SEK</div>			
			</li>
		</ul>
		<div class="clearfloat"></div>
	</div>
	
    <form id="enrollForm" action="interface.php">
        <div class="pages">
	        <div class="page" id="loadingPage">
		        <h1>Loading data...</h1>
		        <p>
			        <img src="images/ajax-loader.gif" alt="Loading" />
		        </p>
	        </div>

	        <div class="page" id="personalPage">
		        <h1>Personal information</h1>
		
		        <p>
                    Please fill in your personal information. Competitors and staff of <?php echo $str_event_short ?> will see a field named "Role" with the corresponding role.
                    If this is not the case, please contact your national representative.
		        </p>
		
		        <label for="nationality"><span class="title">Nationality</span></label>
                <!-- TODO: Configure involved nationalities (or clubs?) -->
			    <div class="variable flags" data-variable="nationality" data-value="australian">
				    <img src="images/Flag_of_Australia.png" alt="Australian Flag" />
			    </div>
			    <div class="variable flags" data-variable="nationality" data-value="american">
				    <img src="images/Flag_of_the_United_States.png" alt="United States Flag" />
			    </div>
			    <div class="variable flags" data-variable="nationality" data-value="danish">
				    <img src="images/Flag_of_Denmark.png" alt="Danish Flag" />
			    </div>
			    <div class="variable flags" data-variable="nationality" data-value="dutch">
				    <img src="images/Flag_of_the_Netherlands.png" alt="Dutch Flag" />
			    </div>
			    <div class="variable flags" data-variable="nationality" data-value="finnish">
				    <img src="images/Flag_of_Finland.png" alt="Finnish Flag" />
			    </div>
			    <div class="variable flags" data-variable="nationality" data-value="french">
				    <img src="images/Flag_of_France.png" alt="French Flag" />
			    </div>
			    <div class="variable flags" data-variable="nationality" data-value="german">
				    <img src="images/Flag_of_Germany.png" alt="German Flag" />
			    </div>
			    <div class="variable flags" data-variable="nationality" data-value="japanese">
				    <img src="images/Flag_of_Japan.png" alt="Japanese Flag" />
			    </div>
			    <div class="variable flags" data-variable="nationality" data-value="norwegian">
				    <img src="images/Flag_of_Norway.png" alt="Norwegian Flag" />
			    </div>
			    <div class="variable flags" data-variable="nationality" data-value="portuguese">
				    <img src="images/Flag_of_Portugal.png" alt="Portugese Flag" />
			    </div>
			    <div class="variable flags" data-variable="nationality" data-value="swedish">
				    <img src="images/Flag_of_Sweden.png" alt="Swedish Flag" />
			    </div>
			    <div class="variableErrorMessage" data-variable="nationality">
				    Please select one nationality.
			    </div>			


		        <label for="email"><span class="title">Email address</span></label>
			    <div class="variableObserver" data-variable="email"></div>		        

		
		        <label for="firstName"><span class="title">First (given) names</span></label>
			    <input type="text" name="firstName" id="firstName" class="variable" data-variable="firstName" />
			    <div class="variableErrorMessage" data-variable="firstName">
				    Please enter at least one name.
			    </div>
		        
		
		        <label for="lastName"><span class="title">Last name</span>
			        <input type="text" name="lastName" id="lastName" class="variable" data-variable="lastName" />
			        <div class="variableErrorMessage" data-variable="lastName">
				        Please enter last name.
			        </div>
		        </label>			

		        <div class="requireEnabled" data-variable="firstNameGanji">
			        <label for="firstNameGanji"><span class="title">First name in Ganji</span>
				        <input type="text" name="firstNameGanji" id="firstNameGanji" class="variable" data-variable="firstNameGanji" />
				        <div class="variableErrorMessage" data-variable="firstNameGanji">
					        Please enter at least one name.
				        </div>
			        </label>				
			
			        <label for="lastNameGanji"><span class="title">Last name in Ganji</span>
				        <input type="text" name="lastNameGanji" id="lastNameGanji" class="variable" data-variable="lastNameGanji" />
				        <div class="variableErrorMessage" data-variable="lastNameGanji">
					        Please enter last name.
				        </div>
			        </label>				
		        </div>
		
		        <label for=""><span class="title">Date of birth</span>
			        Day <input type="text" name="birthDay" id="birthDay" size="2" class="variable" data-variable="birthDay" />
			        Month <input type="text" name="birthMonth" id="birthMonth" size="2" class="variable" data-variable="birthMonth" />
			        Year <input type="text" name="birthYear" id="birthYear" size="4" class="variable" data-variable="birthYear" />	
			        <div class="variableErrorMessage" data-variable="birthDay">
				        Day of birth must be a number between 1-31.
			        </div>
			        <div class="variableErrorMessage" data-variable="birthMonth">
				        Month of birth must be a number between 1-12.
			        </div>
			        <div class="variableErrorMessage" data-variable="birthYear">
				        Year of birth must be a number and a valid year.
			        </div>
		        </label>
		
		        <label for="sex"><span class="title">Sex</span>
			        <select name="sex" id="sex" class="variable" data-variable="sex">
				        <option value="">Select one...</option>				
				        <option value="male">male</option>
				        <option value="female">female</option>
			        </select>
			        <div class="variableErrorMessage" data-variable="sex">
				        Please select sex.
			        </div>			
		        </label>
		
		        <label for="dojo"><span class="title">Local association / Dojo</span>
			        <input type="text" name="dojo" id="dojo" class="variable" data-variable="dojo" />
		        </label>			
		
		        <label for="taidoRank"><span class="title">Taido rank</span>
			        <select name="rank" id="taidoRank" class="variable" data-variable="taidoRank">
				        <option value="">Select one...</option>
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
				        <option value="-7">7 kyu</option>
				        <option value="none">don't practice</option>						
			        </select>
			        <div class="variableErrorMessage" data-variable="taidoRank">
				        Please select taido rank.
			        </div>			
		        </label>				
		
		        <label>
			        <span class="title">&nbsp;</span>
			        <div class="variable" id="renshi" data-variable="renshi">Renshi</div>
		        </label>

		        <label class="requireValue" data-variable="role" data-value="!null">
			        <span class="title">Role</span>
			        <div class="requireValue" data-variable="role" data-value="wtc">
                        <?php echo $str_event_shorter ?> Competitor
			        </div>
			        <div class="requireValue" data-variable="role" data-value="staff">
			        Staff
			        </div>
		        </label>	
	        </div> <!--- personal information page -->

	        <div class="page" id="packagesPage">
		        <div class="packages">
			        <div class="requireValue" data-variable="role" data-value="wtc">
				        <div class="package variable" id="wtcPackage" data-variable="package" data-value="WTC Competitor">
					        <div class="title"><?php echo $str_event_short ?> Competitor package</div>

					        <div class="contents">						
						        Package includes
                                <?php echo $comp_event_package_includes ?>

					        </div>
					
					        <div class="price"><?php echo $comp_package_price?></div>
						
				        </div>
			        </div>
			        <div class="requireValue" data-variable="role" data-value="!wtc">
				        <div class="requireValue" data-variable="role" data-value="!staff">
					        <div class="package variable" id="wtcPackage" data-variable="package" data-value="Tourist">
						        <div class="title">Taido Tourist package</div>

						        <div class="contents">
							        Package includes
                                    <?php echo $tourist_event_package_includes ?>
						        </div>							
						
						        <div class="price" id="touristPrice"><?php echo $tourist_event_package_price ?></div>
					        </div>
					        <div class="requireEnabled" data-variable="ifgJudge">
						        <div class="package variable" id="wtcPackage" data-variable="package" data-value="Judge">
							        <div class="title"><?php echo $str_event_short ?> Judge package</div>

							        <div class="contents">
								        Package includes
                                        <?php echo $judge_event_package_include ?>
							        </div>							
							
							        <div class="price"><?php echo $judge_event_package_price ?></div>
						        </div>				
					        </div>
					
					        <div class="requireValue" data-variable="nationality" data-value="finnish">

						        <div class="package variable" id="volunteerPackage" data-variable="package" data-value="Volunteer">
							        <div class="title">Volunteer package</div>

							        <div class="contents">
								        Package includes
                                        <?php echo $volonteer_package?>

							        </div>							
							
							        <div class="price"><?php echo $volonteer_package_price ?></div>
						        </div>				
					        </div>
				        </div>
				        <div class="requireValue" data-variable="role" data-value="staff">
					        <div class="package variable" id="staffPackage" data-variable="package" data-value="Staff">
						        <div class="title">Staff package</div>

						        <div class="contents">
							        Package includes
                                    <?php echo $staff_package_include ?>

						        </div>							
						
                            <div class="price"><?php echo $staff_package_price?></div>
					        </div>				
				        </div>				
			        </div>
			        <div class="clearfloat"></div>		
		        </div>
		
		        <div class="requireEnabled" data-variable="diet">
		            <h2>Additional required information</h2>
			        <label for="diet"><span class="title">Dietary restrictions</span>
				        <input type="text" name="diet" id="diet" class="variable" data-variable="diet" />
				        <div class="variableErrorMessage" data-variable="diet">
					        Please enter your dietary restrictions.
				        </div>
			        </label>
                    <?php if($tshirts_included === True) { echo $tshirts; } ?>
		        </div>
	        </div><!-- packages page -->

	        <div class="page" id="ifgEventsPage">
		        <h1>International Friendship Games</h1>

		        <h2>Rules and information</h2>

		        <ol>
			        <li>Pacticipation costs <?php echo $ifg_fee ?>.</li>
			        <li>Competitors have to be members of a national taido organization that belongs to the World Taido Federation.</li>					
					
			        <li>You only see events to which you are allowed to compete in.</li>					
			        <li>If your taido rank is 2 kyu and your birth year is 1996-1997, you may apply the right to compete in events B3, B4, B20 and B21. The applications should be sent to the National Taido Organization.</li>
					
			        <li>In case too many or too few competitors have applied to a specific event, the competition committee reserves the right to make alterations in the event compositions. Information about any changes will be sent through the national taido organizations.</li>
					
			        <li>Participants  of  the  <?php echo $str_event_name_exl_year ?>  (<?php echo $str_event_shorter?>)  are  not  allowed  to  participate  in  the International Friendship Games (IFG). </li>
					
			        <li>Before a person can be added to a dantai or tenkai team, he or she must have selected the corresponding IFG event and submitted his or her enrollment. This includes the people in reserve. </li>
					
			        <li>If a person only selects dantai or tenkai events and is only marked as a reserve, the participation fee of 30 euros will not be charged. The fee will show up in the enrollment system, but will not appear in the final bill.</li>
		        </ol>
			
 
		        <h2>Jissen regulations</h2> 
	
		        Players are allowed to use any piece of chest or face protection from the list of acceptable items, which is maintained by the World Taido Federation. With their own responsibility, a competitor may choose to not wear protection.  
				

		        <h1>Events</h1>
		        <div class="event variable" id="eventB1" data-variable="eventB1">
			        <div class="code">B1</div>
			        <div class="title">Hokei, men</div>
			        <div class="year">&le; 1997</div>
			        <div class="rank">&ge; 2 kyu</div>
			        <div class="note">tai or in hokei only</div>
		        </div>
		        <div class="event variable" id="eventB2" data-variable="eventB2">
			        <div class="code">B2</div>
			        <div class="title">Hokei, women</div>				
			        <div class="year">&le; 1997</div>
			        <div class="rank">&ge; 2 kyu</div>
			        <div class="note">tai or in hokei only</div>
		        </div>
		        <div class="event variable" id="eventB3" data-variable="eventB3">
			        <div class="code">B3</div>
			        <div class="title">Jissen, men</div>				
			        <div class="year">&le; 1995</div>
			        <div class="rank">&ge; 2 kyu</div>
		        </div>
		        <div class="warning disabled" id="eventB3warning">
			        <div class="title">Warning!</div>
			        <div class="content">The competitors of B3 Jissen, men should be born in 1995 or before. By enrolling to this event, you will request an exception to this rule and apply for the right to compete in this event. A letter of recommendation from your National Taido Organization is also required and it should be sent by email to the <?php echo $contact_name ?> (<a href="mailto:<?php echo $contact_email ?>"><?php echo $contact_email ?></a>) preferably before the submission deadline ends. All applicants are documented and reviewed by both the <?php echo $contact_name ?> and the World Taido Federation.</div>
		        </div>
		        <div class="event variable" id="eventB4" data-variable="eventB4">
			        <div class="code">B4</div>
			        <div class="title">Jissen, women</div>				
			        <div class="year">&le; 1995</div>
			        <div class="rank">&ge; 2 kyu</div>			
		        </div>
		        <div class="warning disabled" id="eventB4warning">
			        <div class="title">Warning!</div>
			        <div class="content">The competitors of B4 Jissen, women should be born in 1995 or before. By enrolling to this event, you will request an exception to this rule and apply for the right to compete in this event. A letter of recommendation from your National Taido Organization is also required and it should be sent by email to the <?php echo $contact_name ?> (<a href="mailto:<?php echo $contact_email ?>"><?php echo $contact_email ?></a>) preferably before the submission deadline ends. All applicants are documented and reviewed by both the <?php echo $contact_name ?> and the World Taido Federation.</div>
		        </div>
		        <div class="event variable" id="eventB5" data-variable="eventB5">
			        <div class="code">B5</div>
			        <div class="title">Hokei, men</div>				
			        <div class="year">&le; 1997</div>
			        <div class="rank">6-3 kyu</div>
			        <div class="note">tai or in hokei: only sen, un, hen</div>							
		        </div>
		        <div class="event variable" id="eventB6" data-variable="eventB6">
			        <div class="code">B6</div>
			        <div class="title">Hokei, women</div>				
			        <div class="year">&le; 1997</div>
			        <div class="rank">6-3 kyu</div>
			        <div class="note">tai or in hokei: only sen, un, hen</div>						
		        </div>
		        <div class="event variable" id="eventB7" data-variable="eventB7">
			        <div class="code">B7</div>
			        <div class="title">Jissen, men</div>				
			        <div class="year">&le; 1995</div>
			        <div class="rank">6-3 kyu</div>			
		        </div>
		        <div class="warning disabled" id="eventB7warning">
			        <div class="title">Warning!</div>
			        <div class="content">The competitors of B7 Jissen, men should be born in 1995 or before. By enrolling to this event, you will request an exception to this rule and apply for the right to compete in this event. A letter of recommendation from your National Taido Organization is also required and it should be sent by email to the <?php echo $contact_name ?> (<a href="mailto:<?php echo $contact_email ?>"><?php echo $contact_email ?></a>) preferably before the submission deadline ends. All applicants are documented and reviewed by both the <?php echo $contact_name ?> and the World Taido Federation.</div>
		        </div>			
		        <div class="event variable" id="eventB8" data-variable="eventB8">
			        <div class="code">B8</div>
			        <div class="title">Jissen, women</div>				
			        <div class="year">&le; 1995</div>
			        <div class="rank">6-3 kyu</div>
		        </div>
		        <div class="warning disabled" id="eventB8warning">
			        <div class="title">Warning!</div>
			        <div class="content">The competitors of B8 Jissen, women should be born in 1995 or before. By enrolling to this event, you will request an exception to this rule and apply for the right to compete in this event. A letter of recommendation from your National Taido Organization is also required and it should be sent by email to the <?php echo $contact_name ?> (<a href="mailto:<?php echo $contact_email ?>"><?php echo $contact_email ?></a>) preferably before the submission deadline ends. All applicants are documented and reviewed by both the <?php echo $contact_name ?> and the World Taido Federation.</div>
		        </div>			
		        <div class="event variable" id="eventB9" data-variable="eventB9">
			        <div class="code">B9</div>
			        <div class="title">Sonen hokei, mixed</div>				
			        <div class="year">&le; 1978</div>
			        <div class="rank">&ge; 6 kyu</div>
			        <div class="note">tai, in or sei hokei only</div>				
		        </div>			
		        <div class="event variable" id="eventB10" data-variable="eventB10">
			        <div class="code">B10</div>
			        <div class="title">Sonen hokei, mixed</div>				
			        <div class="year">&le; 1978</div>
			        <div class="rank">&ge; 6 kyu</div>
			        <div class="note">mei hokei only</div>				
		        </div>			
		        <div class="event variable" id="eventB11" data-variable="eventB11">
			        <div class="code">B11</div>
			        <div class="title">Sonen jissen, men</div>				
			        <div class="year">&le; 1978</div>
			        <div class="rank">&ge; 2 kyu</div>
		        </div>			
		        <div class="event variable" id="eventB12" data-variable="eventB12">
			        <div class="code">B12</div>
			        <div class="title">Sonen jissen, women</div>				
			        <div class="year">&le; 1978</div>
			        <div class="rank">&ge; 2 kyu</div>
		        </div>						
		        <div class="event variable" id="eventB3" data-variable="eventB13">
			        <div class="code">B13</div>
			        <div class="title">Junior hokei, mixed</div>				
			        <div class="year">&ge; 2001</div>
			        <div class="rank">no belt limitation</div>
			        <div class="note">tai or in hokei: only sen, un, hen</div>				
		        </div>			
		        <div class="event variable" id="eventB14" data-variable="eventB14">
			        <div class="code">B14</div>
			        <div class="title">Junior hokei, mixed</div>				
			        <div class="year">1998-2000</div>
			        <div class="rank">no belt limitation</div>
			        <div class="note">tai or in hokei: only sen, un, hen</div>				
		        </div>			
		        <div class="event variable" id="eventB15" data-variable="eventB15">
			        <div class="code">B15</div>
			        <div class="title">Jissen, boys</div>				
			        <div class="year">1999-2001</div>
			        <div class="rank">&ge; 6 kyu</div>
			        <div class="note">tai or in hokei: only sen, un, hen</div>				
		        </div>			
		        <div class="event variable" id="eventB16" data-variable="eventB16">
			        <div class="code">B16</div>
			        <div class="title">Jissen, girls</div>				
			        <div class="year">1999-2001</div>
			        <div class="rank">&ge; 6 kyu</div>
			        <div class="note">tai or in hokei: only sen, un, hen</div>				
		        </div>
		        <div class="event variable" id="eventB17" data-variable="eventB17">
			        <div class="code">B17</div>
			        <div class="title">Jissen, boys</div>				
			        <div class="year">1996-1998</div>
			        <div class="rank">&ge; 6 kyu</div>
		        </div>			
		        <div class="event variable" id="eventB18" data-variable="eventB18">
			        <div class="code">B18</div>
			        <div class="title">Jissen, girls</div>				
			        <div class="year">1996-1998</div>
			        <div class="rank">&ge; 6 kyu</div>
		        </div>			
		        <div class="event variable" id="eventB19" data-variable="eventB19">
			        <div class="code">B19</div>
			        <div class="title">Dantai hokei, mixed</div>				
			        <div class="year">&le; 2003</div>
			        <div class="rank">no belt limitation</div>
			        <div class="note">team: 5 competitors, tai or in hokei only</div>					
		        </div>			
		        <div class="event variable" id="eventB20" data-variable="eventB20">
			        <div class="code">B20</div>
			        <div class="title">Dantai jissen, men</div>				
			        <div class="year">&le; 1995</div>
			        <div class="rank">&ge; 2 kyu</div>
			        <div class="note">team: 5 competitors and leader</div>								
		        </div>			
		        <div class="warning disabled" id="eventB20warning">
			        <div class="title">Warning!</div>
			        <div class="content">The competitors of B20 Dantai jissen, men should be born in 1995 or before. By enrolling to this event, you will request an exception to this rule and apply for the right to compete in this event. A letter of recommendation from your National Taido Organization is also required and it should be sent by email to the <?php echo $contact_name ?> (<a href="mailto:<?php echo $contact_email ?>"><?php echo $contact_email ?></a>) preferably before the submission deadline ends. All applicants are documented and reviewed by both the <?php echo $contact_name ?> and the World Taido Federation.</div>
		        </div>
			
		        <div class="event variable" id="eventB21" data-variable="eventB21">
			        <div class="code">B21</div>
			        <div class="title">Dantai jissen, women</div>				
			        <div class="year">&le; 1995</div>
			        <div class="rank">&ge; 2 kyu</div>
			        <div class="note">team: 5 competitors and leader</div>								
		        </div>			
		        <div class="warning disabled" id="eventB21warning">
			        <div class="title">Warning!</div>
			        <div class="content">The competitors of B21 Dantai jissen, women should be born in 1995 or before. By enrolling to this event, you will request an exception to this rule and apply for the right to compete in this event. A letter of recommendation from your National Taido Organization is also required and it should be sent by email to the <?php echo $contact_name ?> (<a href="mailto:<?php echo $contact_email ?>"><?php echo $contact_email ?></a>) preferably before the submission deadline ends. All applicants are documented and reviewed by both the <?php echo $contact_name ?> and the World Taido Federation.</div>
		        </div>
			
		        <div class="event variable" id="eventB22" data-variable="eventB22">
			        <div class="code">B22</div>
			        <div class="title">Tenkai, mixed</div>				
			        <div class="year">&le; 2003</div>
			        <div class="rank">no belt limitation</div>
			        <div class="note">team: 6 competitors</div>									
		        </div>						
		        <div class="event variable" id="eventB23" data-variable="eventB23">
			        <div class="code">B23</div>
			        <div class="title">Taido trick-track for Juniors</div>				
			        <div class="year">&ge; 2001</div>
			        <div class="rank">no belt limitation</div>
			        <div class="note">rules and directions will be given later</div>								
		        </div>			
			
		        <div class="clearfloat"></div>
	        </div><!-- international friendship games page -->

	        <div class="page" id="ifgTeamsPage">
		        <h1>IFG Team selection</h1>
				
		        <p>
			        A team should consists of members (i.e., players and possibly a leader) from the same country, but teams with members from more than one country are also allowed. All teams must be full at submission deadline. However, if a dantai jissen player is not able to participate in IFG due to injury or similar and no substitution is available, the match for the absent player will be counted as a "default loss" and the team can participate in the event with four (4) competitors. Only teams with at least 3 players are allowed to compete.		
		        </p>
		        <p>
			        To add a player, type in a part of their name and the system will search the database for that person. The system will return a list of people that have enrolled to the corresponding event and have submitted their enrollment. Therefore, you can only add people that will participate in the event. When you submit the team selections along with your enrollment, an email will be sent to each person you have selected in your team.
		        </p>
		
		        <h2>Competitor substitution</h2>
			
		        <p>
                    If a competitor has to cancel his or her participation due to medical reasons, he or she may be replaced. Any replacement must be approved by the competition head office. A replaced competitor is not allowed to rejoin the team, even if he or she recovers and would otherwise be able to compete in the same event again. If a physician has ordered a competitor to not compete, he or she will not be allowed to participate in any event what so ever.
		        </p>
		
		
		        <h1>Enrolled events</h1>
		        <div class="dantai requireValue" data-variable="eventB19">
			        <h2>B19 Dantai hokei, mixed</h2>
				
			        <label for="teamB19_name"><span class="title">Team name</span>
				        <input type="text" name="teamB19_name" id="teamB19_name" class="variable" data-variable="teamB19_name" />
				        <div id="teamB19_loading" class="loading"><img src="images/ajax-loader.gif" alt="Loading" /></div>
				        <div id="teamB19_nameok" class="nameok"><img src="images/tick.png" alt="Tick" /></div>
			        </label>
			        <div class="variableErrorMessage" data-variable="teamB19_name">
				        Please enter a unique name of at least 4 characters for the team, or clear the name to remove the team.
			        </div>
			
			        <div class="team">
				        <label><span class="title">Player 1</span><div class="variable selectPerson" data-variable="teamB19_p1"></div></label>
				        <label><span class="title">Player 2</span><div class="variable selectPerson" data-variable="teamB19_p2"></div></label>
				        <label><span class="title">Player 3</span><div class="variable selectPerson" data-variable="teamB19_p3"></div></label>
				        <label><span class="title">Player 4</span><div class="variable selectPerson" data-variable="teamB19_p4"></div></label>
				        <label><span class="title">Player 5</span><div class="variable selectPerson" data-variable="teamB19_p5"></div></label>
				        <label><span class="title">Reserve 1</span><div class="variable selectPerson" data-variable="teamB19_r1"></div></label>
				        <label><span class="title">Reserve 2</span><div class="variable selectPerson" data-variable="teamB19_r2"></div></label>
			        </div>
		        </div>
		        <div class="dantai requireValue" data-variable="eventB20">
			        <h2>B20 Dantai jissen, men</h2>
				
			        <label for="teamB20_name"><span class="title">Team name</span>
				        <input type="text" name="teamB20_name" id="teamB20_name" class="variable" data-variable="teamB20_name" />
				        <div id="teamB20_loading" class="loading"><img src="images/ajax-loader.gif"/></div>
				        <div id="teamB20_nameok" class="nameok"><img src="images/tick.png"/></div>
			        </label>
			        <div class="variableErrorMessage" data-variable="teamB20_name">
				        Please enter a unique name of at least 4 characters for the team, or clear the name to remove the team.
			        </div>			
			
			        <div class="team">
				        <label><span class="title">Leader</span><div class="variable selectPerson" data-variable="teamB20_lead"></div></label>
				        <label><span class="title">Player 1</span><div class="variable selectPerson" data-variable="teamB20_p1"></div></label>
				        <label><span class="title">Player 2</span><div class="variable selectPerson" data-variable="teamB20_p2"></div></label>
				        <label><span class="title">Player 3</span><div class="variable selectPerson" data-variable="teamB20_p3"></div></label>
				        <label><span class="title">Player 4</span><div class="variable selectPerson" data-variable="teamB20_p4"></div></label>
				        <label><span class="title">Player 5</span><div class="variable selectPerson" data-variable="teamB20_p5"></div></label>
				        <label><span class="title">Reserve 1</span><div class="variable selectPerson" data-variable="teamB20_r1"></div></label>
				        <label><span class="title">Reserve 2</span><div class="variable selectPerson" data-variable="teamB20_r2"></div></label>
			        </div>
		        </div>
		        <div class="dantai requireValue" data-variable="eventB21">
			        <h2>B21 Dantai jissen, women</h2>
				
			        <label for="teamB21_name"><span class="title">Team name</span>
				        <input type="text" name="teamB21_name" id="teamB21_name" class="variable" data-variable="teamB21_name" />
				        <div id="teamB21_loading" class="loading"><img src="images/ajax-loader.gif" alt="Loader" /></div>				
				        <div id="teamB21_nameok" class="nameok"><img src="images/tick.png" alt="Tick" /></div>
			        </label>
			        <div class="variableErrorMessage" data-variable="teamB21_name">
				        Please enter a unique name of at least 4 characters for the team, or clear the name to remove the team.
			        </div>			
			
			        <div class="team">
				        <label><span class="title">Leader</span><div class="variable selectPerson" data-variable="teamB21_lead"></div></label>
				        <label><span class="title">Player 1</span><div class="variable selectPerson" data-variable="teamB21_p1"></div></label>
				        <label><span class="title">Player 2</span><div class="variable selectPerson" data-variable="teamB21_p2"></div></label>
				        <label><span class="title">Player 3</span><div class="variable selectPerson" data-variable="teamB21_p3"></div></label>
				        <label><span class="title">Player 4</span><div class="variable selectPerson" data-variable="teamB21_p4"></div></label>
				        <label><span class="title">Player 5</span><div class="variable selectPerson" data-variable="teamB21_p5"></div></label>
				        <label><span class="title">Reserve 1</span><div class="variable selectPerson" data-variable="teamB21_r1"></div></label>
				        <label><span class="title">Reserve 2</span><div class="variable selectPerson" data-variable="teamB21_r2"></div></label>
			        </div>
		        </div>

		        <div class="dantai requireValue" data-variable="eventB22">
			        <h2>B22 Tenkai, mixed</h2>
				
			        <label for="teamB22_name"><span class="title">Team name</span>
				        <input type="text" name="teamB22_name" id="teamB22_name" class="variable" data-variable="teamB22_name" />
				        <div id="teamB22_loading" class="loading"><img src="images/ajax-loader.gif" alt="Loading" /></div>				
				        <div id="teamB22_nameok" class="nameok"><img src="images/tick.png" alt="Tick" /></div>
			        </label>
			        <div class="variableErrorMessage" data-variable="teamB22_name">
				        Please enter a unique name of at least 4 characters for the team, or clear the name to remove the team.
			        </div>
			
			
			        <div class="team">
				        <label><span class="title">Player 1</span><div class="variable selectPerson" data-variable="teamB22_p1"></div></label>
				        <label><span class="title">Player 2</span><div class="variable selectPerson" data-variable="teamB22_p2"></div></label>
				        <label><span class="title">Player 3</span><div class="variable selectPerson" data-variable="teamB22_p3"></div></label>
				        <label><span class="title">Player 4</span><div class="variable selectPerson" data-variable="teamB22_p4"></div></label>
				        <label><span class="title">Player 5</span><div class="variable selectPerson" data-variable="teamB22_p5"></div></label>
				        <label><span class="title">Player 6</span><div class="variable selectPerson" data-variable="teamB22_p6"></div></label>
				        <label><span class="title">Reserve 1</span><div class="variable selectPerson" data-variable="teamB22_r1"></div></label>
				        <label><span class="title">Reserve 2</span><div class="variable selectPerson" data-variable="teamB22_r2"></div></label>
			        </div>
		        </div>
		
	        </div> <!-- team selection page -->

	        <div class="page" id="judgePage">
		        <h1>Judge</h1>
		
		        <p>
			        A judge in <?php echo $str_event_shorter ?> must have 4 dan and be experienced in judging. If you will complete 4 dan shinsa during the <?php echo $str_event_short?> event,
			        you may enroll as a judge in <?php echo $str_event_shorter?>. A judge in IFG should also have 4 dan and be experienced in judging. However, if you have
                    a recommendation from your national taido organization, you may apply the right to judge in the IFG event. 
                    <?php echo $contact_name ?> and World Taido Federation will review all judge enrollments and decide if a person is qualified. 
		        </p>
		        <p>
			        Enrollment as judge is binding. All judges who enroll to <?php echo $str_event_shorter ?> must enroll also
			        IFG as judge. Competitors of <?php echo $str_event_shorter?> can enroll to judge in IFG, but cannot enroll as judges in <?php echo $str_event_shorter?>.
		        </p>
		
		        <div class="requireValue" data-variable="taidoRank" data-value="3">
			        <label>
				        <span class="title">Will you complete 4 dan during the <?php echo $str_event_shorter?> Event?</span>
				        <div class="variable" data-variable="willComplete4dan">Yes</div>
			        </label>
		        </div>		
		
		        <div class="clearfloat"></div>
		
		        <div class="variable" id="wtcJudge" data-variable="wtcJudge">
			        <?php echo $str_event_name_exl_year ?> judge
		        </div>
		        <div class="variable" id="ifgJudge" data-variable="ifgJudge">
			        International Friendship Games judge 
		        </div>
		
		        <div class="clearfloat"></div>
		
		        <div class="requireEnabled" data-variable="judgeNationalSeminars">
		
			        <h2>Judging experience</h2>
			
			        <p>
				        Please fill in the number of times you have participated or judged in the following events.
			        </p>		
			
			        <label for="judgeNationalSeminars">
				        <span class="title">National seminars</span>
				        <input type="text" class="variable" data-variable="judgeNationalSeminars" />
				        <div class="variableErrorMessage" data-variable="judgeNationalSeminars">
					        Please enter a valid number.
				        </div>
			        </label>	

			        <label for="judgeInternationalSeminars">
				        <span class="title">International seminars</span>
				        <input type="text" class="variable" data-variable="judgeInternationalSeminars" />
				        <div class="variableErrorMessage" data-variable="judgeInternationalSeminars">
					        Please enter a valid number.
				        </div>
			        </label>				

			        <label for="judgeNational">
				        <span class="title">National championships</span>
				        <input type="text" class="variable" data-variable="judgeNationalCount" />
				        <div class="variableErrorMessage" data-variable="judgeNationalCount">
					        Please enter a valid number.
				        </div>
			        </label>				
			
			        <label for="judgeIFGCount">
				        <span class="title">Friendship games</span>
				        <input type="text" class="variable" data-variable="judgeIFGCount" />
				        <div class="variableErrorMessage" data-variable="judgeIFGCount">
					        Please enter a valid number.
				        </div>
			        </label>		

			        <label for="judgeECCount">
				        <span class="title">European championships</span>
				        <input type="text" class="variable" data-variable="judgeECCount" />
				        <div class="variableErrorMessage" data-variable="judgeECCount">
					        Please enter a valid number.
				        </div>
			        </label>				
			
			        <label for="judgeWCCount">
				        <span class="title">World championships</span>
				        <input type="text" class="variable" data-variable="judgeWCCount" />
				        <div class="variableErrorMessage" data-variable="judgeWCCount">
					        Please enter a valid number.
				        </div>
			        </label>	
		        </div>
	        </div>

	        <div class="page volunteer" id="volunteerPage">
		        <h1>Volunteering</h1>
		
		        <p>				 
			        If you are willing to do some volunteer work, please select the dates and the tasks you are willing to participate in. Tasks that overlap with your previous selections, such as IFG games, are not shown.
		        </p>
			
		        <div class="days">		
			        <div class="day variable" data-variable="volunteer">
				        <h2>Volunteering during the event</h2>
					Volunteering to help out with different tasks during the event, will be made clear at a later point.
			        </div>
			
		        </div>
		        <div class="clearfloat"></div>	
	        </div> <!-- Volunteers page -->

            <?php echo $hotel_page ?>


	        <div class="page" id="optionalPage">
		        <h1>Optional services</h1>
		        <p>
			        Information about sightseeings and excursions are sent later. The exact costs for some of the services are determined after the number of participants is determined. 
		        </p>
			
<!--		        <div class="requireEnabled" data-variable="optionalBanquette"> -->
			        <h2>Events</h2>
			        <div class="variable option" data-variable="optionalBanquette">
                        		<?php echo $banquette ?>
			        </div>

			        <div class="variable option" data-variable="optionalWTCticket">
				        <div class="title"><?php echo $str_event_shorter?> ticket</div>
				        <div class="contents">&nbsp;</div>
				        <div class="price" id="wtcTicketPrice"><?php echo $str_event_price ?></div>
			        </div>
			
			        <div class="clearfloat"></div>

<!--		        </div> -->
		        <?php if($sightseeing_included === True) { echo $sightseeing; } ?>

	        </div>

	        <div class="page" id="summaryPage">
		        <h1>Summary</h1>
		        <p>
		        Summary of what you have selected.
		        </p>
		        <div class="summary">
			        <h2>Personal information</h2>
			
			        <div class="varSummary">
				        <span class="title">Nationality</span>
				        <div class="variableObserver" data-variable="nationality"></div>
			        </div>
			
			        <div class="varSummary">
				        <span class="title">First names</span>
				        <div class="variableObserver" data-variable="firstName"></div>
			        </div>
			
			        <div class="varSummary">
				        <span class="title">Last name</span>
				        <div class="variableObserver" data-variable="lastName"></div>
			        </div>
			
			        <div class="varSummary requireEnabled" data-variable="firstNameGanji">
				        <span class="title">First name in Ganji</span>
				        <div class="variableObserver" data-variable="firstNameGanji"></div>
			        </div>
			
			        <div class="varSummary requireEnabled" data-variable="firstNameGanji">			
				        <span class="title">Last name in Ganji</span>
				        <div class="variableObserver" data-variable="lastNameGanji"></div>			
			        </div>

			        <div class="varSummary">
				        <span class="title">Birthday</span>
				        <div class="variableObserver" data-variable="birthDay"></div><b>.</b>
				        <div class="variableObserver" data-variable="birthMonth"></div><b>.</b>
				        <div class="variableObserver" data-variable="birthYear"></div>
			        </div>
			
			        <div class="varSummary">			
				        <span class="title">Sex</span>
				        <div class="variableObserver" data-variable="sex"></div>			
			        </div>			
			
			        <div class="varSummary">			
				        <span class="title">Dojo</span>
				        <div class="variableObserver" data-variable="dojo"></div>			
			        </div>			

			        <div class="varSummary">			
				        <span class="title">Taido rank</span>
				        <div class="variableObserver" data-variable="readableTaidoRank"></div>			
			        </div>	

			        <div class="varSummary requireEnabled" data-variable="renshi">			
				        <span class="title">Renshi</span>
				        <div class="variableObserver" data-variable="renshi"></div>			
			        </div>

			
			        <h2>Package</h2>
			
			        <div class="varSummary">			
				        <div class="costSummary"><div class="variableObserver" data-variable="packageCost">0</div> SEK</div>
				        <span class="title">Package</span>
				        <div class="requireValue" data-variable="package" data-value="null">No package selected.</div>
				        <div class="variableObserver" data-variable="package"></div>
			        </div>

			        <div class="varSummary requireEnabled" data-variable="diet">			
				        <span class="title">Diet</span>
				        <div class="variableObserver" data-variable="diet"></div>			
			        </div>

			        <div class="requireEnabled" data-variable="ifgCost">
			
				        <h2>Interantional Friendship Games events</h2>
				        <div class="eventSummary">
					        <div class="costSummary"><div class="variableObserver" data-variable="ifgCost">0</div> SEK</div>
					        <div class="requireValue" data-variable="eventB1" data-value="yes">
						        <span>B1 Hokei, men  </span>
					        </div>
					        <div class="requireValue" data-variable="eventB2" data-value="yes">
					         <span>B2 Hokei, women  </span>
					          </div>
					        <div class="requireValue" data-variable="eventB3" data-value="yes">
					         <span>B3 Jissen, men  </span>
					          </div>
					        <div class="requireValue" data-variable="eventB4" data-value="yes">
					         <span>B4 Jissen, women  </span>
					          </div>
					        <div class="requireValue" data-variable="eventB5" data-value="yes">
					         <span>B5 Hokei, men  </span>
					          </div>
					        <div class="requireValue" data-variable="eventB6" data-value="yes">
					         <span>B6 Hokei, women  </span>
					          </div>
					        <div class="requireValue" data-variable="eventB7" data-value="yes">
					         <span>B7 Jissen, men  </span>
					          </div>
					        <div class="requireValue" data-variable="eventB8" data-value="yes">
					         <span>B8 Jissen, women  </span>
					          </div>
					        <div class="requireValue" data-variable="eventB9" data-value="yes">
					         <span>B9 Sonen hokei, mixed  </span>
					          </div>
					        <div class="requireValue" data-variable="eventB10" data-value="yes">
					         <span>B10 Sonen hokei, mixed  </span>
					          </div>
					        <div class="requireValue" data-variable="eventB11" data-value="yes">
					         <span>B11 Sonen jissen, men  </span>
					          </div>
					        <div class="requireValue" data-variable="eventB12" data-value="yes">
					         <span>B12 Sonen jissen, women  </span>
					          </div>
					        <div class="requireValue" data-variable="eventB13" data-value="yes">
					         <span>B13 Junior hokei, mixed </span>
					          </div>
					        <div class="requireValue" data-variable="eventB14" data-value="yes">
					         <span>B14 Junior hokei, mixed </span>
					          </div>
					        <div class="requireValue" data-variable="eventB15" data-value="yes">
					         <span>B15 Jissen, boys </span>
					          </div>
					        <div class="requireValue" data-variable="eventB16" data-value="yes">
					         <span>B16 Jissen, girls </span>
					          </div>
					        <div class="requireValue" data-variable="eventB17" data-value="yes">
					         <span>B17 Jissen, boys </span>
					          </div>
					        <div class="requireValue" data-variable="eventB18" data-value="yes">
					         <span>B18 Jissen, girls </span>
					          </div>
					        <div class="requireValue" data-variable="eventB19" data-value="yes">
					         <span>B19 Dantai hokei, mixed  </span>
					          </div>
					        <div class="requireValue" data-variable="eventB20" data-value="yes">
					         <span>B20 Dantai jissen, men  </span>
					          </div>
					        <div class="requireValue" data-variable="eventB21" data-value="yes">
					         <span>B21 Dantai jissen, women  </span>
					          </div>
					        <div class="requireValue" data-variable="eventB22" data-value="yes">
					         <span>B22 Tenkai, mixed  </span>
					          </div>
					        <div class="requireValue" data-variable="eventB23" data-value="yes">
					         <span>B23 Taido trick-track for Juniors </span>
					        </div>
					        <div class="requireValue" data-variable="ifgCost" data-value="0">
						        No events selected.
					        </div>
				        </div>
				
				        <h2>International Friendship Games teams</h2>
				
				        <div class="summaryTeams">
					        <div class="dantai requireValue" data-variable="eventB19">
						        <span class="title">Event</span><div>B19 Dantai hokei, mixed</div>
						
						        <span class="title">Team name</span><div class="variableObserver" data-variable="teamB19_name"></div>
						
						        <span class="title">Player 1</span><div class="variableObserver" data-variable="teamB19_p1"></div>
						        <span class="title">Player 2</span><div class="variableObserver" data-variable="teamB19_p2"></div>
						        <span class="title">Player 3</span><div class="variableObserver" data-variable="teamB19_p3"></div>
						        <span class="title">Player 4</span><div class="variableObserver" data-variable="teamB19_p4"></div>
						        <span class="title">Player 5</span><div class="variableObserver" data-variable="teamB19_p5"></div>
						        <span class="title">Reserve 1</span><div class="variableObserver" data-variable="teamB19_r1"></div>
						        <span class="title">Reserve 2</span><div class="variableObserver" data-variable="teamB19_r2"></div>
					        </div>			
					
					        <div class="dantai requireValue" data-variable="eventB20">
						        <span class="title">Event</span><div>B20 Dantai jissen, men</div>
						
						        <span class="title">Team name</span><div class="variableObserver" data-variable="teamB20_name"></div>
						
						        <span class="title">Leader</span><div class="variableObserver" data-variable="teamB20_lead"></div>
						        <span class="title">Player 1</span><div class="variableObserver" data-variable="teamB20_p1"></div>
						        <span class="title">Player 2</span><div class="variableObserver" data-variable="teamB20_p2"></div>
						        <span class="title">Player 3</span><div class="variableObserver" data-variable="teamB20_p3"></div>
						        <span class="title">Player 4</span><div class="variableObserver" data-variable="teamB20_p4"></div>
						        <span class="title">Player 5</span><div class="variableObserver" data-variable="teamB20_p5"></div>
						        <span class="title">Reserve 1</span><div class="variableObserver" data-variable="teamB20_r1"></div>
						        <span class="title">Reserve 2</span><div class="variableObserver" data-variable="teamB20_r2"></div>
					        </div>	
					
					        <div class="dantai requireValue" data-variable="eventB21">
						        <span class="title">Event</span><div>B21 Dantai jissen, women</div>
						
						        <span class="title">Team name</span><div class="variableObserver" data-variable="teamB21_name"></div>
						
						        <span class="title">Leader</span><div class="variableObserver" data-variable="teamB21_lead"></div>
						        <span class="title">Player 1</span><div class="variableObserver" data-variable="teamB21_p1"></div>
						        <span class="title">Player 2</span><div class="variableObserver" data-variable="teamB21_p2"></div>
						        <span class="title">Player 3</span><div class="variableObserver" data-variable="teamB21_p3"></div>
						        <span class="title">Player 4</span><div class="variableObserver" data-variable="teamB21_p4"></div>
						        <span class="title">Player 5</span><div class="variableObserver" data-variable="teamB21_p5"></div>
						        <span class="title">Reserve 1</span><div class="variableObserver" data-variable="teamB21_r1"></div>
						        <span class="title">Reserve 2</span><div class="variableObserver" data-variable="teamB21_r2"></div>
					        </div>	

					        <div class="dantai requireValue" data-variable="eventB22">
						        <span class="title">Event</span><div>B22 Tenkai, mixed</div>
						
						        <span class="title">Team name</span><div class="variableObserver" data-variable="teamB22_name"></div>
						
						        <span class="title">Player 1</span><div class="variableObserver" data-variable="teamB22_p1"></div>
						        <span class="title">Player 2</span><div class="variableObserver" data-variable="teamB22_p2"></div>
						        <span class="title">Player 3</span><div class="variableObserver" data-variable="teamB22_p3"></div>
						        <span class="title">Player 4</span><div class="variableObserver" data-variable="teamB22_p4"></div>
						        <span class="title">Player 5</span><div class="variableObserver" data-variable="teamB22_p5"></div>
						        <span class="title">Player 6</span><div class="variableObserver" data-variable="teamB22_p6"></div>
						        <span class="title">Reserve 1</span><div class="variableObserver" data-variable="teamB22_r1"></div>
						        <span class="title">Reserve 2</span><div class="variableObserver" data-variable="teamB22_r2"></div>
					        </div>	
				        </div>
				        <div class="warning disabled" id="eventB19playerMissing">
					        <div class="title">Warning!</div>
					        <div class="content">You have not selected all players for B19 Dantai hokei. Your team will not be allowed to compete if the team is not full.</div>
				        </div>
				        <div class="warning disabled" id="eventB19teamRemove">
					        <div class="title">Warning!</div>
					        <div class="content">You have not selected a name for your B19 Dantai hokei team. No team will be created and any existing teams will be removed.
					        </div>
				        </div>
				        <div class="warning disabled" id="eventB20playerMissing">
					        <div class="title">Warning!</div>
					        <div class="content">You have not selected all players for B20 Dantai jissen, men. Your team will not be allowed to compete if the team is not full.</div>
				        </div>
				        <div class="warning disabled" id="eventB20teamRemove">
					        <div class="title">Warning!</div>
					        <div class="content">You have not selected a name for your B20 Dantai jissen team. No team will be created and any existing teams will be removed.
					        </div>
				        </div>
				        <div class="warning disabled" id="eventB21playerMissing">
					        <div class="title">Warning!</div>
					        <div class="content">You have not selected all players for B21 Dantai jissen, women. Your team will not be allowed to compete if the team is not full.</div>
				        </div>
				        <div class="warning disabled" id="eventB21teamRemove">
					        <div class="title">Warning!</div>
					        <div class="content">You have not selected a name for your B21 Dantai jissen team. No team will be created and any existing teams will be removed.
					        </div>
				        </div>			
				        <div class="warning disabled" id="eventB22playerMissing">
					        <div class="title">Warning!</div>
					        <div class="content">You have not selected all players for B22 Tenkai. Your team will not be allowed to compete if the team is not full.</div>
				        </div>
				        <div class="warning disabled" id="eventB22teamRemove">
					        <div class="title">Warning!</div>
					        <div class="content">You have not selected a name for your B22 Tenkai team. No team will be created and any existing teams will be removed.
					        </div>
				        </div>
			        </div>
			
			        <div class="judgeSummary requireValue" data-variable="ifgJudge">
				        <h2>Selected judge duty</h2>
				  
				        <div class="varSummary">			
					        <span class="title"><?php echo $str_event_name_exl_year ?></span>
					        <div class="requireValue" data-variable="wtcJudge" data-value="yes">yes</div><div class="requireValue" data-variable="wtcJudge" data-value="!yes">no</div>
				        </div>					

				        <div class="varSummary">			
					        <span class="title">International Friendship Games</span>
					        <div class="requireValue" data-variable="ifgJudge" data-value="yes">yes</div><div class="requireValue" data-variable="ifgJudge" data-value="!yes">no</div>
				        </div>					
				
				        <div class="requireValue" data-variable="taidoRank" data-value="3">
					        <div class="varSummary">
						        <span class="title">Will complete 4 dan?</span>
						        <div class="requireValue" data-variable="willComplete4dan" data-value="yes">yes</div><div class="requireValue" data-variable="willComplete4dan" data-value="!yes">no</div>
					        </div>
				        </div>						  
				
				        <h2>Judgning experience</h2>				
				
				        <div class="varSummary">
					        <span class="title">National seminars</span>
					        <div class="variableObserver" data-variable="judgeNationalSeminars"></div>
				        </div>

				        <div class="varSummary">
					        <span class="title">International seminars</span>
					        <div class="variableObserver" data-variable="judgeInternationalSeminars"></div>
				        </div>


				        <div class="varSummary">
					        <span class="title">National championships</span>
					        <div class="variableObserver" data-variable="judgeNationalCount"></div>
				        </div>
				
				        <div class="varSummary">
					        <span class="title">Friendship games</span>
					        <div class="variableObserver" data-variable="judgeIFGCount"></div>
				        </div>

				        <div class="varSummary">
					        <span class="title">European championships</span>
					        <div class="variableObserver" data-variable="judgeECCount"></div>
				        </div>
				
				        <div class="varSummary">
					        <span class="title">World championships</span>
					        <div class="variableObserver" data-variable="judgeWCCount"></div>
				        </div>
						
			        </div>
			
			        <h2>Volunteer</h2>
			        <div class="varSummary requireValue" data-variable="volunteer" data-value="yes">			
				        <span>Volunteering during the event</span>
			        </div>					
<!--
			        <div class="varSummary requireValue" data-variable="volunteerTatami307" data-value="yes">			
				        <span>Carrying tatamis Tue 30.7.</span>
			        </div>					

			        <div class="varSummary requireValue" data-variable="volunteerTatami028" data-value="yes">			
				        <span>Carrying tatamis Fri 2.8. evening</span>
			        </div>					
			
			        <div class="varSummary requireValue" data-variable="volunteerTatami048" data-value="yes">			
				        <span>Carrying tatamis Sun 4.8.</span>
			        </div>					
			
			        <div class="varSummary requireValue" data-variable="volunteerKiosk018" data-value="yes">			
				        <span>Kiosk clerk Thu 1.8.</span>
			        </div>					
			
			        <div class="varSummary requireValue" data-variable="volunteerKiosk028" data-value="yes">			
				        <span>Kiosk clerk Fri 2.8.</span>
			        </div>					
			
			        <div class="varSummary requireValue" data-variable="volunteerKiosk038" data-value="yes">			
				        <span>Kiosk clerk Sat 3.8.</span>
			        </div>					
			
			        <div class="varSummary requireValue" data-variable="volunteerSecurity028" data-value="yes">			
				        <span>Security officer Fri 2.8.</span>
			        </div>					
			
			        <div class="varSummary requireValue" data-variable="volunteerSecurity038" data-value="yes">			
				        <span>Security officer Sat 3.8.</span>
			        </div>												

			        <div class="varSummary requireValue" data-variable="volunteerIT038" data-value="yes">			
				        <span>Technical help Sat 3.8.</span>
			        </div>												
-->			
			
			        <h2>Hotel</h2>
			        <?php echo $hotel_summary ?>

			
			        <div class="requireValue" data-variable="package" data-value="!Staff">
				        <div class="requireValue" data-variable="hotelCost" data-value="0">
					        No nights at the hotel.
				        </div>
			        </div>
			
			        <h2>Optional services</h2>
			
			        <div class="varSummary requireValue" data-variable="optionalBanquette">
				        <span>Banquette</span>
				        <div class="costSummary">0 SEK</div>
			        </div>
			
			        <div class="varSummary requireValue" data-variable="optionalWTCticket">
				        <span><?php echo $str_event_shorter ?> ticket</span>
				        <div class="costSummary"> 0 SEK</div>
			        </div>
			        <?php if($sightseeing_included === True) { echo $sightseeing_summary; } ?>

			
			        <div class="varSummary requireValue" data-variable="optionalsCost" data-value="0">
				        <span class="title">No optional services</span>
				        <div class="costSummary">0 SEK</div>
			        </div>
			
			        <h2>
				        <div class="costSummary"><div class="variableObserver" data-variable="totalCost">0</div> SEK</div>
				        Total estimated cost				
			        </h2>
			
			        <h2>Submit enrollment</h2>
			        <p>
				        Please check that the above information is correct. When you are confident with the content, submit your information as enrollment 
                        to the <?php echo $str_event_short ?> event. You may revisit your submission and resubmit. You may also retract your submission. You are able to do this
                        until the submission deadline <?php echo $submission_deadline ?>.
			        </p>
			
			        <div class="varSummary">
				        <span class="title">Status</span>
				        <div class="variableObserver" data-variable="status"></div>
			        </div>			
			
			        <div class="varSummary">
				        <span class="title">Date modified</span>
				        <div class="variableObserver" data-variable="modified"></div>
			        </div>			
						
			        <div class="clearfloat"></div>
		        </div>
	        </div>	

	        <div class="clearfloat"></div>	
        </div> <!-- pages -->
    </form>

	<div class="clearfloat"></div>
	<div id="controls">
		<div class="button" id="nextButton">Next</div>		
		<div class="button" id="submitButton">Submit</div>
		<div class="requireValue" data-variable="status" data-value="Submitted">
			<div class="button" id="retractButton">Retract</div>
		</div>
<!--		<div class="button" id="saveButton">Save</div>-->
		
		<div class="button" id="prevButton">Previous</div>
		<div class="clearfloat"></div>		
	</div>

	<div id="footer">
		<div id="footerLeft">
			Help? <a href="mailto:<?php echo $contact_email ?>"><?php echo $contact_email ?></a>
		</div>
        <!-- TODO: Remove? -->
		<div id="footerRight">
			<a href="http://www.motify.fi" target="_blank"><img src="images/logo-small.png" alt="Motify" /></a>			
		</div>
	</div>

</div> <!-- wrapper -->

<!-- dialogs -->
<div id="dialog-confirm-submit" title="Really submit?" class="dialog">
	<p>
        When you submit, it will be considered a signed confirmation of your enrollment. If you have IFG dantai or tenkai events selected, other 
        people will be able to add you to their teams.
	</p>	
	<p>
        You may update your submission or retract it at any time before the submission deadline <?php echo $submission_deadline ?>.
	</p>
</div>

<div id="dialog-confirm-retract" title="Really retract?" class="dialog">
	<p>
        Do you really want to retract your submission? You will be removed from any IFG dantai or tenkai teams you might be selected in.
	</p>	
	<p>
		You may resubmit at any time before the submission deadline <?php echo $submission_deadline ?>.
	</p>
</div>

<div id="dialog-confirm-remove-self-from-team" title="Really remove yourself?" class="dialog">
	<p>
        Do you really want to remove yourself from the team? If you remove yourself and submit your enrollment, you cannot later add yourself 
        back to the team anymore. Someone still in the team has to do it.
	</p>
</div>

<div id="submitStatus"></div>			

</body>
</html>