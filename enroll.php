<!DOCTYPE html> <!-- PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> -->
<html>
<head>
	<script type="text/javascript" src="js/jquery-1.9.0.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.10.0.custom.min.js"></script>
	<link href="css/jquery-ui-1.10.1.custom.css" rel="stylesheet" />
	<script type="text/javascript" src="js/tee.js?v=3"></script>		
	<link href="css/tee.css?v=2" rel="stylesheet" type="text/css" />
    
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
			<li id="ifgNavi"><a href="#" data-target="ifgEventsPage">ITFG</a>
				<div class="summaryCost"><div class="variableObserver"></div></div> <!-- data-variable="ifgCost" -->
			</li>
			<li id="ifgTeamsNavi"><a href="#" data-target="ifgTeamsPage">ITFG Teams</a>
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
<!--
	        <div class="page" id="loadingPage">
		        <h1>Loading data...</h1>
		        <p>
			        <img src="images/ajax-loader.gif" alt="Loading" />
		        </p>
	        </div>
-->
	        <div class="page" id="personalPage">
		        <h1>Personal information</h1>
		
		        <p>
                    Please fill in your personal information. 
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

<!--
		        <label for="email"><span class="title">Email address</span></label>
			    <div class="variableObserver" data-variable="email"></div>		        
-->
		
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
			        <label for="firstNameGanji"><span class="title">First name in kanji</span>
				        <input type="text" name="firstNameGanji" id="firstNameGanji" class="variable" data-variable="firstNameGanji" />
				        <div class="variableErrorMessage" data-variable="firstNameGanji">
					        Please enter at least one name.
				        </div>
			        </label>				
			
			        <label for="lastNameGanji"><span class="title">Last name in kanji</span>
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
						<option value="-8">Kids rank</option>
				        <option value="none">don't practice</option>						
			        </select>
			        <div class="variableErrorMessage" data-variable="taidoRank">
				        Please select taido rank.
			        </div>			
		        </label>				
		
		        <label>
			        <span class="title">&nbsp;</span>
					
			        <div class="variable" id="renshi" data-variable="renshi">Renshi</div> 
			        <div class="variable" id="kyoshi" data-variable="kyoshi">Kyoshi</div>
			        <div class="variable" id="hanshi" data-variable="hanshi">Hanshi</div>
					
			
		        </label>
				<div class="clearfloat"></div>
				Disclaimer: For any questions or problem please contact <a href="mailto:<?php echo $contact_email ?>"><?php echo $contact_email ?></a>
<!--
		        <label class="requireValue" data-variable="role" data-value="!null">
			        <span class="title">Role</span>
			        <div class="requireValue" data-variable="role" data-value="wtc">
                        <?php echo $str_event_shorter ?> Competitor
			        </div>
			        <div class="requireValue" data-variable="role" data-value="staff">
			        Staff
			        </div>
		        </label>	
-->
	        </div> <!--- personal information page -->

	        <div class="page" id="packagesPage">
		        <div class="packages">
				Seminars are inlcluded in all packages. No package? Choose individual events at the "Optionals" tab.
				Lunches are included in the accommodation otherwise extra can be ordered under Optionals.
				<div class="clearfloat"></div>
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
						        <div class="title">ITFG package</div>

						        <div class="contents">
							        Package includes
                                    <?php echo $tourist_event_package_includes ?>
						        </div>							
						
						        <div class="price" id="touristPrice"><?php echo $tourist_event_package_price ?></div>
					        </div>
					        <div class="requireEnabled" data-variable="ifgJudge">
						        <div class="package variable" id="wtcPackage" data-variable="package" data-value="Judge">
							        <div class="title">Judge package</div>

							        <div class="contents">
								        Package includes
                                        <?php echo $judge_event_package_include ?>
							        </div>							
							
							        <div class="price"><?php echo $judge_event_package_price ?></div>
						        </div>				
					        </div>
				        <div class="requireValue" data-variable="role" data-value="staff">
					        <div class="package variable" id="staffPackage" data-variable="package" data-value="Staff">
						        <div class="title">ITFG/ETC Staff package</div>

						        <div class="contents">
							        Package includes
                                    <?php echo $staff_package_include ?>

						        </div>							
						
                            <div class="price"><?php echo $staff_package_price?></div>
					        </div>				
				        </div>				
			        </div>
			        
		        </div>
				
				<div class="variable" data-variable="kidspackage">
					<div class="package variable" id="kidsPackage"  data-variable="package" data-value="kids">
				        <div class="title">Kids package</div>
				        <div class="contents">
							Package includes
        		            <?php echo $kids_package_include;?>
						</div>							
				        <div class="price"><?php echo $kids_package_price ?></div>
				    </div>	
				</div>
			</div>
				<div class="clearfloat"></div>		
				<div class="variable requireEnabled" data-variable="manager">ETC National Team Manager</div>
		        <div class="requireEnabled" data-variable="diet">
		            <h2>Additional required information</h2>
			        <label for="diet"><span class="title">Dietary restrictions</span>
				        <input type="text" name="diet" id="diet" class="variable" data-variable="diet" />
				        <div class="variableErrorMessage" data-variable="diet">
					        Please enter your dietary restrictions.
				        </div>
			        </label>
                    
		        </div>
	        </div><!-- packages page -->

	        <div class="page" id="ifgEventsPage">
		        <h1>International Taido Friendship Games</h1>

		        <h2>Rules and information</h2>

		        <ol>
			        <li>Participation costs <?php echo $ifg_fee_participation ?> unless part of package.</li>
			        <li>Competitors have to be members of a national taido organization that belongs to the World Taido Federation.</li>					
					
			        <li>You only see events to which you are allowed to compete in.</li>					
			        <li>If your taido rank is 2 kyu and your birth year is 1996-1997, you may apply the right to compete in events F3, F4, F20 and F21. The applications should be sent to the National Taido Organization.</li>
					
			        <li>In case too many or too few competitors have applied to a specific event, the competition committee reserves the right to make alterations in the event compositions. Information about any changes will be sent through the national taido organizations.</li>
					
			        <li>Participants  of  the  <?php echo $str_event_name_exl_year ?>  (<?php echo $str_event_shorter?>)  are  not  allowed  to  participate  in  the International Taido Friendship Games (ITFG). </li>
					
			        <li>Before a person can be added to a dantai or tenkai team, he or she must have selected the corresponding ITFG event and submitted his or her enrollment. This includes the people in reserve. </li>
					
			        <li>If a person only selects dantai or tenkai events and is only marked as a reserve, the participation fee of <?php echo $ifg_fee_participation ?> will not be charged. The fee will show up in the enrollment system, but will not appear in the final bill.</li>
		        </ol>
			
 
		        <h2>Jissen regulations</h2> 
	
		        Players are allowed to use any piece of chest or face protection from the list of acceptable items, which is maintained by the World Taido Federation. With their own responsibility, a competitor may choose to not wear protection.  
				

		        <h1>Events</h1>
		        <div class="event variable" id="eventF1" data-variable="eventF1">
			        <div class="code">F1</div>
			        <div class="title">Hokei, men</div>
			        <div class="year"></div>
			        <div class="rank">&ge; 2 kyu</div>
			        <div class="note">tai or in hokei only</div>
		        </div>
		        <div class="event variable" id="eventF2" data-variable="eventF2">
			        <div class="code">F2</div>
			        <div class="title">Hokei, women</div>				
			        <div class="year"></div>
			        <div class="rank">&ge; 2 kyu</div>
			        <div class="note">tai or in hokei only</div>
		        </div>
		        <div class="event variable" id="eventF3" data-variable="eventF3">
			        <div class="code">F3</div>
			        <div class="title">Jissen, men</div>				
			        <div class="year">&le; 1999</div>
			        <div class="rank">&ge; 2 kyu</div>
		        </div>
		        <div class="warning disabled" id="eventF3warning">
			        <div class="title">Warning!</div>
			        <div class="content">The competitors of F3 Jissen, men should be born in 1999 or before. By enrolling to this event, you will request an exception to this rule and apply for the right to compete in this event. A letter of recommendation from your National Taido Organization is also required and it should be sent by email to the <?php echo $contact_name ?> (<a href="mailto:<?php echo $contact_email ?>"><?php echo $contact_email ?></a>) preferably before the submission deadline ends. All applicants are documented and reviewed by both the <?php echo $contact_name ?> and the World Taido Federation.</div>
		        </div>
		        <div class="event variable" id="eventF4" data-variable="eventF4">
			        <div class="code">F4</div>
			        <div class="title">Jissen, women</div>				
			        <div class="year">&le; 1999</div>
			        <div class="rank">&ge; 2 kyu</div>			
		        </div>
		        <div class="warning disabled" id="eventF4warning">
			        <div class="title">Warning!</div>
			        <div class="content">The competitors of F4 Jissen, women should be born in 1999 or before. By enrolling to this event, you will request an exception to this rule and apply for the right to compete in this event. A letter of recommendation from your National Taido Organization is also required and it should be sent by email to the <?php echo $contact_name ?> (<a href="mailto:<?php echo $contact_email ?>"><?php echo $contact_email ?></a>) preferably before the submission deadline ends. All applicants are documented and reviewed by both the <?php echo $contact_name ?> and the World Taido Federation.</div>
		        </div>
		        <div class="event variable" id="eventF5" data-variable="eventF5">
			        <div class="code">F5</div>
			        <div class="title">Hokei, men</div>				
			        <div class="year"></div>
			        <div class="rank">6-3 kyu</div>
			        <div class="note">tai or in hokei: only sen, un, hen</div>							
		        </div>
		        <div class="event variable" id="eventF6" data-variable="eventF6">
			        <div class="code">F6</div>
			        <div class="title">Hokei, women</div>				
			        <div class="year"></div>
			        <div class="rank">6-3 kyu</div>
			        <div class="note">tai or in hokei: only sen, un, hen</div>						
		        </div>
		        <div class="event variable" id="eventF7" data-variable="eventF7">
			        <div class="code">F7</div>
			        <div class="title">Jissen, men</div>				
			        <div class="year">&le; 1999</div>
			        <div class="rank">6-3 kyu</div>			
		        </div>
		        <div class="warning disabled" id="eventF7warning">
			        <div class="title">Warning!</div>
			        <div class="content">The competitors of F7 Jissen, men should be born in 1999 or before. By enrolling to this event, you will request an exception to this rule and apply for the right to compete in this event. A letter of recommendation from your National Taido Organization is also required and it should be sent by email to the <?php echo $contact_name ?> (<a href="mailto:<?php echo $contact_email ?>"><?php echo $contact_email ?></a>) preferably before the submission deadline ends. All applicants are documented and reviewed by both the <?php echo $contact_name ?> and the World Taido Federation.</div>
		        </div>			
		        <div class="event variable" id="eventF8" data-variable="eventF8">
			        <div class="code">F8</div>
			        <div class="title">Jissen, women</div>				
			        <div class="year">&le; 1999</div>
			        <div class="rank">6-3 kyu</div>
		        </div>
		        <div class="warning disabled" id="eventF8warning">
			        <div class="title">Warning!</div>
			        <div class="content">The competitors of F8 Jissen, women should be born in 1999 or before. By enrolling to this event, you will request an exception to this rule and apply for the right to compete in this event. A letter of recommendation from your National Taido Organization is also required and it should be sent by email to the <?php echo $contact_name ?> (<a href="mailto:<?php echo $contact_email ?>"><?php echo $contact_email ?></a>) preferably before the submission deadline ends. All applicants are documented and reviewed by both the <?php echo $contact_name ?> and the World Taido Federation.</div>
		        </div>			
		        <div class="event variable" id="eventF9" data-variable="eventF9">
			        <div class="code">F9</div>
			        <div class="title">Kids hokei, mixed</div>				
			        <div class="year">2006-2008</div>
			        <div class="rank">no belt limitation</div>
			        <div class="note">Own created mini-hokei</div>				
		        </div>			
		        <div class="event variable" id="eventF10" data-variable="eventF10">
			        <div class="code">F10</div>
			        <div class="title">Kids hokei mix</div>				
			        <div class="year">2003-2005</div>
			        <div class="rank">no belt limitation</div>
			        <div class="note">Own created mini-hokei</div>								
		        </div>			
		        <div class="event variable" id="eventF11" data-variable="eventF11">
			        <div class="code">F11</div>
			        <div class="title">Kids Jissen, boys</div>				
			        <div class="year">2003-2005</div>
			        <div class="rank"></div>
		        </div>			
		        <div class="event variable" id="eventF12" data-variable="eventF12">
			        <div class="code">F12</div>
			        <div class="title">Kids Jissen, girls</div>				
			        <div class="year">2003-2005</div>
			        <div class="rank">&ge; 6 kyu</div>
		        </div>			
		        <div class="event variable" id="eventF13" data-variable="eventF13">
			        <div class="code">F13</div>
			        <div class="title">Junior hokei, mixed</div>				
			        <div class="year">2000-2002</div>
			        <div class="rank">no belt limitation</div>
			        <div class="note">tai or in hokei only</div>				
		        </div>			
		        <div class="event variable" id="eventF14" data-variable="eventF14">
			        <div class="code">F14</div>
			        <div class="title">Junior Jissen, boys</div>				
			        <div class="year">2000-2002</div>
			        <div class="rank">&ge; 6 kyu</div>
			        <div class="note"></div>				
		        </div>			
		        <div class="event variable" id="eventF15" data-variable="eventF15">
			        <div class="code">F15</div>
			        <div class="title">Junior Jissen, girls</div>				
			        <div class="year">2000-2002</div>
			        <div class="rank">&ge; 6 kyu</div>
			        <div class="note"></div>				
		        </div>
		        <div class="event variable" id="eventF16" data-variable="eventF16">
			        <div class="code">F16</div>
			        <div class="title">Sonen hokei, mixed</div>				
			        <div class="year">&le; 1980</div>
			        <div class="rank">6-3 kyu</div>
			        <div class="note"></div>				
		        </div>			
		        <div class="event variable" id="eventF17" data-variable="eventF17">
			        <div class="code">F17</div>
			        <div class="title">Sonen hokei, mixed</div>				
			        <div class="year">&le; 1980</div>
			        <div class="rank">&ge; 2 kyu</div>
			        <div class="note"></div>				
		        </div>			
		        <div class="event variable" id="eventF18" data-variable="eventF18">
			        <div class="code">F18</div>
			        <div class="title">Sonen jissen, men</div>				
			        <div class="year">&le; 1980</div>
			        <div class="rank">&ge; 2 kyu</div>
		        </div>			
		        <div class="event variable" id="eventF19" data-variable="eventF19">
			        <div class="code">F19</div>
			        <div class="title">Sonen jissen, women</div>				
			        <div class="year">&le; 1980</div>
			        <div class="rank">&ge; 2 kyu</div>
		        </div>						
		        <div class="event variable" id="eventF20" data-variable="eventF20">
			        <div class="code">F20</div>
			        <div class="title">Dantai hokei, mixed</div>				
			        <div class="year"></div>
			        <div class="rank">no belt limitation</div>
			        <div class="note">team: 5 competitors, tai or in hokei only</div>					
		        </div>			
		        <div class="event variable" id="eventF21" data-variable="eventF21">
			        <div class="code">F21</div>
			        <div class="title">Dantai jissen, men</div>				
			        <div class="year">&le; 1999</div>
			        <div class="rank">&ge; 4 kyu</div>
			        <div class="note">team: 5 competitors and leader</div>								
		        </div>			
		        <div class="warning disabled" id="eventF21warning">
			        <div class="title">Warning!</div>
			        <div class="content">The competitors of F21 Dantai jissen, men should be born in 1999 or before. By enrolling to this event, you will request an exception to this rule and apply for the right to compete in this event. A letter of recommendation from your National Taido Organization is also required and it should be sent by email to the <?php echo $contact_name ?> (<a href="mailto:<?php echo $contact_email ?>"><?php echo $contact_email ?></a>) preferably before the submission deadline ends. All applicants are documented and reviewed by both the <?php echo $contact_name ?> and the World Taido Federation.</div>
		        </div>
			
		        <div class="event variable" id="eventF22" data-variable="eventF22">
			        <div class="code">F22</div>
			        <div class="title">Dantai jissen, women</div>				
			        <div class="year">&le; 1999</div>
			        <div class="rank">&ge; 4 kyu</div>
			        <div class="note">team: 5 competitors and leader</div>								
		        </div>			
		        <div class="warning disabled" id="eventF22warning">
			        <div class="title">Warning!</div>
			        <div class="content">The competitors of F22 Dantai jissen, women should be born in 1999 or before. By enrolling to this event, you will request an exception to this rule and apply for the right to compete in this event. A letter of recommendation from your National Taido Organization is also required and it should be sent by email to the <?php echo $contact_name ?> (<a href="mailto:<?php echo $contact_email ?>"><?php echo $contact_email ?></a>) preferably before the submission deadline ends. All applicants are documented and reviewed by both the <?php echo $contact_name ?> and the World Taido Federation.</div>
		        </div>
			
		        <div class="event variable" id="eventF23" data-variable="eventF23">
			        <div class="code">F23</div>
			        <div class="title">Tenkai, mixed</div>				
			        <div class="year"></div>
			        <div class="rank">no belt limitation</div>
			        <div class="note">team: 6 competitors</div>									
		        </div>						
				<div class="event variable" id="eventF24" data-variable="eventF24">
			        <div class="code">F24</div>
			        <div class="title">ITFG spectator</div>				
			        <div class="year"></div>
			        <div class="rank"></div>
			        <div class="note"></div>									
		        </div>	
			
		        <div class="clearfloat"></div>
	        </div><!-- international friendship games page -->

	        <div class="page" id="ifgTeamsPage">
		        <h1>ITFG Team selection</h1>
				
		        <p>
			        A team should consists of members (i.e., players and possibly a leader) from the same country, but teams with members from more than one country are also allowed. All teams must be full at submission deadline. However, if a dantai jissen player is not able to participate in ITFG due to injury or similar and no substitution is available, the match for the absent player will be counted as a "default loss" and the team can participate in the event with four (4) competitors. Only teams with at least 3 players are allowed to compete.		
		        </p>
		        <p>
			        To add a player, type in a part of their name and the system will search the database for that person. The system will return a list of people that have enrolled to the corresponding event and have submitted their enrollment. Therefore, you can only add people that will participate in the event. When you submit the team selections along with your enrollment, an email will be sent to each person you have selected in your team.
		        </p>
		
		        <h2>Competitor substitution</h2>
			
		        <p>
                    If a competitor has to cancel his or her participation due to medical reasons, he or she may be replaced. Any replacement must be approved by the competition head office. A replaced competitor is not allowed to rejoin the team, even if he or she recovers and would otherwise be able to compete in the same event again. If a physician has ordered a competitor to not compete, he or she will not be allowed to participate in any event what so ever.
		        </p>
		
		
		        <h1>Enrolled events</h1>
		        <div class="dantai requireValue" data-variable="eventF20">
			        <h2>F20 Dantai hokei, mixed</h2>
				
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
		        <div class="dantai requireValue" data-variable="eventF21">
			        <h2>F21 Dantai jissen, men</h2>
				
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
		        <div class="dantai requireValue" data-variable="eventF22">
			        <h2>F22 Dantai jissen, women</h2>
				
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
			        <h2>F23 Tenkai, mixed</h2>
				
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
			        you may enroll as a judge in <?php echo $str_event_shorter?>. A judge in ITFG should also have 1 dan and be experienced in judging. However, if you have
                    a recommendation from your national taido organization, you may apply the right to judge in the ITFG event. 
                    <?php echo $contact_name ?> and World Taido Federation will review all judge enrollments and decide if a person is qualified. 
		        </p>
		        <p>
			        Enrollment as judge is binding. All judges who enroll to <?php echo $str_event_shorter ?> must enroll also
			        ITFG as judge. Competitors of <?php echo $str_event_shorter?> can enroll to judge in ITFG, but cannot enroll as judges in <?php echo $str_event_shorter?>.
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
			        If you are willing to do some volunteer work, please select the dates and the tasks you are willing to participate in. Tasks that overlap with your previous selections, such as ITFG games, are not shown.
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
			<?php if($tshirts_included === True) { echo $tshirts; } ?>
			<div class="clearfloat"></div>
					        <label for="lunches"><span class="title">Lunches (included in accommodation otherwise): </span>
			        <select name="lunches" id="lunches" class="variable" data-variable="optionalLunches">
				        <option value="no" selected>0</option>
				        <option value="1">1</option>
				        <option value="2">2</option>
				        <option value="3">3</option>
				        <option value="4">4</option>
				        <option value="5">5</option>
			        </select>
					</label>
			<!-- TODO: lunches-->
<!--		        <div class="requireEnabled" data-variable="optionalBanquette"> -->
			        <h2>Events</h2>
			        <div class="variable option" data-variable="optionalBanquette">
                        		<div class="title">Banquette</div>
				        <div class="contents">Arranged 8th of August in TanumStrand</div>
				        <div class="price">600 SEK</div>
			        </div>

			        <div class="variable option" data-variable="optionalWTCticket">
				        <div class="title"><?php echo $str_event_shorter?> ticket</div>
				        <div class="contents">Spectator ticket to the ETC</div>
				        <div class="price" id="wtcTicketPrice"><?php echo $str_event_price ?></div>
			        </div>

			        <div class="variable option" data-variable="optionalIFGticket">
				        <div class="title">ITFG ticket</div>
				        <div class="contents">Spectator ticket to the ITFG</div>
				        <div class="price" id="ifgTicketPrice">75 SEK</div>
			        </div>
			        <div class="variable option" data-variable="optionalJudgeSeminars">
				        <div class="title">Judge Seminars</div>
				        <div class="contents">Participation in the judge seminars</div>
				        <div class="price" id="judgeSeminarsPrice">400 SEK</div>
			        </div>
			        <div class="variable option" data-variable="optionalSeminars">
				        <div class="title">Taido Seminars</div>
				        <div class="contents">Participation in the Taido Seminars</div>
				        <div class="price" id="seminarsPrice">500 SEK</div>
			        </div>
			        <div class="variable option" data-variable="optionalKidsSeminars">
				        <div class="title">Kids Seminars</div>
				        <div class="contents">Participation in the Kids Taido Seminars</div>
				        <div class="price" id="kidsSeminarsPrice">300 SEK</div>
			        </div>
			        <div class="variable option" data-variable="optionalTshirt">
				        <div class="title">Tshirt</div>
				        <div class="contents"></div>
				        <div class="price" id="tshirtPrice">200 SEK</div>
			        </div>
			        <div class="variable option" data-variable="optionalHoodie">
				        <div class="title">Hoodie</div>
				        <div class="contents"></div>
				        <div class="price" id="hoodiePrice">400 SEK</div>
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
			        <div class="varSummary requireEnabled" data-variable="kyoshi">			
				        <span class="title">Kyoshi</span>
				        <div class="variableObserver" data-variable="kyoshi"></div>			
			        </div>
			        <div class="varSummary requireEnabled" data-variable="hanshi">			
				        <span class="title">Hanshi</span>
				        <div class="variableObserver" data-variable="hanshi"></div>			
			        </div>


			
			        <h2>Package</h2>
			
			        <div class="varSummary">			
				        <div class="costSummary"><div class="variableObserver requireEnabled" data-variable="packageCost">0</div> SEK</div>
				        <span class="title">Package cost</span>
						<div class="variableObserver" data-variable="package"></div>
				        <div class="requireValue" data-variable="packageCost" data-value="0">No package selected.</div>
			        
			        </div>

			        <div class="varSummary requireEnabled" data-variable="diet">			
				        <span class="title">Diet</span>
				        <div class="variableObserver" data-variable="diet"></div>			
			        </div>

			        <div class="requireEnabled" data-variable="ifgCost">
			
				        <h2>Interantional Friendship Games events</h2>
				        <div class="eventSummary">
					        <div class="costSummary"></div><!-- <div class="variableObserver" data-variable="ifgCost"></div> -->
					        <div class="requireValue" data-variable="eventF1" data-value="yes">
						        <span>F1 Hokei, men  </span>
					        </div>
					        <div class="requireValue" data-variable="eventF2" data-value="yes">
					         <span>F2 Hokei, women  </span>
					          </div>
					        <div class="requireValue" data-variable="eventF3" data-value="yes">
					         <span>F3 Jissen, men  </span>
					          </div>
					        <div class="requireValue" data-variable="eventF4" data-value="yes">
					         <span>F4 Jissen, women  </span>
					          </div>
					        <div class="requireValue" data-variable="eventF5" data-value="yes">
					         <span>F5 Hokei, men  </span>
					          </div>
					        <div class="requireValue" data-variable="eventF6" data-value="yes">
					         <span>F6 Hokei, women  </span>
					          </div>
					        <div class="requireValue" data-variable="eventF7" data-value="yes">
					         <span>F7 Jissen, men  </span>
					          </div>
					        <div class="requireValue" data-variable="eventF8" data-value="yes">
					         <span>F8 Jissen, women  </span>
					          </div>
					        <div class="requireValue" data-variable="eventF9" data-value="yes">
					         <span>F9 Kids hokei, mixed </span>
					          </div>
					        <div class="requireValue" data-variable="eventF10" data-value="yes">
					         <span>F10 Kids hokei, mixed </span>
					          </div>
					        <div class="requireValue" data-variable="eventF11" data-value="yes">
					         <span>F11 Jissen, boys </span>
					          </div>
					        <div class="requireValue" data-variable="eventF12" data-value="yes">
					         <span>F12 Jissen, girls </span>
					          </div>
					        <div class="requireValue" data-variable="eventF13" data-value="yes">
					         <span>F13 Junior hokei, mixed </span>
					          </div>
					        <div class="requireValue" data-variable="eventF14" data-value="yes">
					         <span>F14 Jissen, boys </span>
					          </div>
					        <div class="requireValue" data-variable="eventF15" data-value="yes">
					         <span>F15 Jissen, girls </span>
					          </div>
					        <div class="requireValue" data-variable="eventF16" data-value="yes">
					         <span>F16 Sonen hokei, mixed  </span>
					          </div>
					        <div class="requireValue" data-variable="eventF17" data-value="yes">
					         <span>F17 Sonen hokei, mixed  </span>
					          </div>
					        <div class="requireValue" data-variable="eventF18" data-value="yes">
					         <span>F18 Sonen jissen, men  </span>
					          </div>
					        <div class="requireValue" data-variable="eventF19" data-value="yes">
					         <span>F19 Sonen jissen, women  </span>
					          </div>
					        <div class="requireValue" data-variable="eventF20" data-value="yes">
					         <span>F20 Dantai hokei, mixed  </span>
					          </div>
					        <div class="requireValue" data-variable="eventF21" data-value="yes">
					         <span>F21 Dantai jissen, men  </span>
					          </div>
					        <div class="requireValue" data-variable="eventF22" data-value="yes">
					         <span>F22 Dantai jissen, women  </span>
					          </div>
					        <div class="requireValue" data-variable="eventF23" data-value="yes">
					         <span>F23 Tenkai, mixed  </span>
					          </div>
					        <div class="requireValue" data-variable="ifgCost" data-value="0">
						
					        </div>
				        </div>
				
				        <h2>International Friendship Games teams</h2>
				
				        <div class="summaryTeams">
					        <div class="dantai requireValue" data-variable="eventF20">
						        <span class="title">Event</span><div>F20 Dantai hokei, mixed</div>
						
						        <span class="title">Team name</span><div class="variableObserver" data-variable="teamB19_name"></div>
						
						        <span class="title">Player 1</span><div class="variableObserver" data-variable="teamB19_p1"></div>
						        <span class="title">Player 2</span><div class="variableObserver" data-variable="teamB19_p2"></div>
						        <span class="title">Player 3</span><div class="variableObserver" data-variable="teamB19_p3"></div>
						        <span class="title">Player 4</span><div class="variableObserver" data-variable="teamB19_p4"></div>
						        <span class="title">Player 5</span><div class="variableObserver" data-variable="teamB19_p5"></div>
						        <span class="title">Reserve 1</span><div class="variableObserver" data-variable="teamB19_r1"></div>
						        <span class="title">Reserve 2</span><div class="variableObserver" data-variable="teamB19_r2"></div>
					        </div>			
					
					        <div class="dantai requireValue" data-variable="eventF21">
						        <span class="title">Event</span><div>F21 Dantai jissen, men</div>
						
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
					
					        <div class="dantai requireValue" data-variable="eventF22">
						        <span class="title">Event</span><div>F22 Dantai jissen, women</div>
						
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

					        <div class="dantai requireValue" data-variable="eventF23">
						        <span class="title">Event</span><div>F23 Tenkai, mixed</div>
						
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
				        <div class="warning disabled" id="eventF20PlayerMissing">
					        <div class="title">Warning!</div>
					        <div class="content">You have not selected all players for F20 Dantai hokei. Your team will not be allowed to compete if the team is not full.</div>
				        </div>
				        <div class="warning disabled" id="eventF20teamRemove">
					        <div class="title">Warning!</div>
					        <div class="content">You have not selected a name for your F20 Dantai hokei team. No team will be created and any existing teams will be removed.
					        </div>
				        </div>
				        <div class="warning disabled" id="eventF21playerMissing">
					        <div class="title">Warning!</div>
					        <div class="content">You have not selected all players for F21 Dantai jissen, men. Your team will not be allowed to compete if the team is not full.</div>
				        </div>
				        <div class="warning disabled" id="eventF21teamRemove">
					        <div class="title">Warning!</div>
					        <div class="content">You have not selected a name for your F21 Dantai jissen team. No team will be created and any existing teams will be removed.
					        </div>
				        </div>
				        <div class="warning disabled" id="eventF22playerMissing">
					        <div class="title">Warning!</div>
					        <div class="content">You have not selected all players for F22 Dantai jissen, women. Your team will not be allowed to compete if the team is not full.</div>
				        </div>
				        <div class="warning disabled" id="eventF22teamRemove">
					        <div class="title">Warning!</div>
					        <div class="content">You have not selected a name for your F22 Dantai jissen team. No team will be created and any existing teams will be removed.
					        </div>
				        </div>			
				        <div class="warning disabled" id="eventF23playerMissing">
					        <div class="title">Warning!</div>
					        <div class="content">You have not selected all players for F23 Tenkai. Your team will not be allowed to compete if the team is not full.</div>
				        </div>
				        <div class="warning disabled" id="eventF23teamRemove">
					        <div class="title">Warning!</div>
					        <div class="content">You have not selected a name for your F23 Tenkai team. No team will be created and any existing teams will be removed.
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

			
			        <h2>Hotel</h2>
			        <?php echo $hotel_summary ?>

			
			        <div class="requireValue" data-variable="package" data-value="!Staff">
				        <div class="requireValue" data-variable="hotelCost" data-value="0">
					        No nights at the hotel.
				        </div>
			        </div>
			
			        <h2>Optional services</h2>
					
						        <!--<div class="varSummary requireEnabled" data-variable="firstNameGanji">			
				        <span class="title">Last name in Ganji</span>
				        <div class="variableObserver" data-variable="lastNameGanji"></div>			
			        </div>
					-->
			        <div class="varSummary requireEnabled requireValue" data-variable="optionalBanquette">
				        <span class="title">Banquette</span>
				        <div class="variableObserver costSummary">600 SEK</div>
			        </div>
			
			        <div class="varSummary requireValue" data-variable="optionalWTCticket">
				        <span><?php echo $str_event_shorter ?> ticket</span>
				        <div class="variableObserver costSummary"> 120 SEK</div>
			        </div>

			        <div class="varSummary requireValue" data-variable="optionalIFGticket">
				        <span>IFTG ticket</span>
				        <div class="variableObserver costSummary"> 75 SEK</div>
			        </div>
			        <div class="varSummary requireValue" data-variable="optionalJudgeSeminars">
				        <span>Judge Seminars</span>
				        <div class="variableObserver costSummary"> 400 SEK</div>
			        </div>
			        <div class="varSummary requireValue" data-variable="optionalSeminars">
				        <span>Taido Seminars</span>
				        <div class="variableObserver costSummary"> 500 SEK</div>
			        </div>
			        <div class="varSummary requireValue" data-variable="optionalKidsSeminars">
				        <span>Kids Taido Seminars</span>
				        <div class="variableObserver costSummary"> 300 SEK</div>
			        </div>
			        <div class="varSummary requireValue" data-variable="optionalTshirt">
				        <span>T-Shirt</span>
				        <div class="variableObserver costSummary"> 200 SEK</div>
			        </div>
			        <div class="varSummary requireValue" data-variable="optionalHoodie">
				        <span>Hoodie</span>
				        <div class="variableObserver costSummary"> 400 SEK</div>
			        </div>
					<div class="varSummary requiredEnabled" data-variable="optionalLunches">
				        <span>Extra lunches (if selected)</span>
				        <div class="variableObserver costSummary"> 100 SEK/lunch</div>
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
					<span>Extra info to organizer</span>
					<div class="clearfloat"></div>
				        <textarea name="address" rows="4" cols="50" class="variable" data-variable="infoOrganizer"></textarea>
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
		        </div>
	        </div>	

	        <div class="clearfloat"></div>	
        </div> <!-- pages -->
    

	<div class="clearfloat"></div>
	<div id="controls">
		<div class="button" id="nextButton">Next</div>		
		<div class="button" id="submitButton">Submit</div>
		<div class="requireValue" data-variable="status" data-value="Submitted">
</form>
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
        <!-- TODO: Remove? 
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