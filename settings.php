<?php
/*
öppnar preliminärt 1/4 och stänger 1/5
Target prices for seminars etc. (preliminary):
Taido seminars 350 SEK
Judge seminars 250 SEK
Junior taido seminars 200 SEK
Banquet 550 SEK
ITFG participation: 350 SEK
ETC participation: 500 SEK
Single room incl. breakfast & lunch: 1300 SEK/day
Double room incl. breakfast & lunch: 2200 SEK/day
6 bed cabin incl. breakfast, lunch and cleaning (after checkout): 13800 SEK for the week. 
(2300 SEK/week/person if you are 6 in the cabin).
3/8
Arrival & welcome party
4/8
seminars
EUTAI meeting
WTF meeting
5/8
Seminars 
shinsa
6/8
Seminars 
Judge seminar
7/8
IFG
8/8
ETC
banquet
9/8
Judge meeting
departure
*/
$str_event_name = "European Taido Championships 2015";
$str_event_name_exl_year = "European Taido Championship";
$str_event_short = "ETC2015";
$str_event_shorter = "ETC";
$str_event_price ="100 SEK";
$ifg_fee = "50 SEK";
$contact_email = "info@etc2015.se";
$contact_name = "Swedish Taido Association";
$enrollment_base_url = "http://www.etc2015.se/enroll/";
$submission_deadline = "2015-05-1";
//ETC compeditors
$comp_event_package_includes = "<ol>
	        <li>International Taido Seminar</li>
	        <li>".$str_event_short." Participation Fee </li>
	        <li>7 x Lunchboxes (All days) </li>
	        <li>Participation in Banquette (including Dinner)</li>
        </ol>";
$comp_package_price ="1400 SEK";
$tourist_event_package_includes ="
<ol>
    <li>International Taido Seminar</li>
    <li>".$str_event_short." Ticket</li>
    <li>7 x Lunchboxes (All days) </li>
    <li>Participation in Banquette (including Dinner)</li>
</ol>";
$tourist_event_package_price = "1000 SEK";
$judge_event_package_include = "<ol>
				<li>International Taido Seminar</li>
				<li>7 x Lunchboxes (All days) </li>
				<li>Participation in Banquette (including Dinner)</li>
			</ol>";
$judge_event_package_price ="900 SEK";
$volonteer_package = "<ol>
									        <li>International Taido Seminar</li>
									        <li>7 x Lunchboxes (All days) </li>
								        </ol>";
$volonteer_package_price = "0 SEK";
$staff_package_include ="<ol>
								        <li>Hotel accommodation in a 3 person room for 3 nights????</li>
								        <li>International Taido Seminar</li>
								        <li>Staff T-shirt????</li>
								        <li>7 x Lunchboxes (All days) </li>
								        <li>Participation in Banquette (including Dinner)</li>
							        </ol>";
$staff_package_price ="900 SEK";
$tshirts_included = False;
$tshirts = '<label for="tshirt"><span class="title">T-shirt size</span>
				        <select name="tshirt" id="tshirt" class="variable" data-variable="tshirt">
					        <option value="110-120cm">110-120cm</option>
					        <option value="130-140cm">130-140cm</option>
					        <option value="150-160cm">150-160cm</option>
					        <option value="XS">XS</option>
					        <option value="S">S</option>
					        <option value="M" selected>M</option>
					        <option value="L">L</option>
					        <option value="XL">XL</option>
					        <option value="XXL">XXL</option>
				        </select>
			        </label>';

$hotel_page = '<div class="page hotel" id="hotelPage">
		        <h1>TanumStrand</h1>
		        <p>
Some nice things to say about TanumStrand
		        </p>
		        <p>
Some more stuff about the hotel
		        </p>
		        <h2>Nights</h2>
		        <p>
Please select which nights you want to spend at the hotel. The days correspond to the start of the night at the hotel. For example, Tuesday 4.8. means the night between 4.8. and 5.8.
		        </p>
		        <div class="days">
			        <div class="hotelday variable" data-variable="hotel38">
				        <h2>Monday 3.8.</h2>
				        <ul><li>Arrival and welcome party</li></ul>
			        </div>
			        <div class="hotelday variable" data-variable="hotel48">
				        <h2>Tuesday 4.8.</h2>
				        <ul>
					        <li>International Taido Seminar</li>
							<li>EUTAI meeting</li>
							<li>WTF meeting</li>
				        </ul>
			        </div>
			        <div class="hotelday variable" data-variable="hotel58">
				        <h2>Wednesday 5.8.</h2>
				        <ul>
					        <li>International Taido Seminar</li>
					        <li>Shinsa</li>
				        </ul>
			        </div>
			        <div class="hotelday variable" data-variable="hotel68">
				        <h2>Thursday 6.8.</h2>
				        <ul>
							<li>Judge seminar</li>
							<li>International Taido Seminar</li>
				        </ul>
			        </div>
			        <div class="hotelday variable" data-variable="hotel78">
				        <h2>Friday 7.8.</h2>
				        <ul>
					        <li>International Friendship Games</li>
				        </ul>
			        </div>
					<div class="hotelday variable" data-variable="hotel88">
				        <h2>Saturday 8.8.</h2>
				        <ul>
					        <li>European Taido Championship</li>
							<li>Banquette</li>
				        </ul>
			        </div>
			        <div class="hotelday variable" data-variable="hotel98">
				        <h2>Sunday 9.8.</h2>
				        <ul>
					        <li>Judge meeting</li>
							<li>Departure</li>
				        </ul>
			        </div>
		        </div>
				
		        <div class="clearfloat">Single room incl. breakfast & lunch: 1300 SEK/day</div>
		        <div class="hotelDetails requireEnabled" data-variable="roomType">
		        <h2>Room type</h2>
			        <div class="roomtypes">
				        <div class="roomtype variable" data-variable="roomType" data-value="Standard Single">
					        <div class="title">Standard Single incl. breakfast and lunch</div>
					        <ul>
						        <li>Cost: 1300 SEK/person/night</li>
						        <li>Fits: 1 person</li>
					        </ul>
				        </div>
				        <div class="roomtype variable" data-variable="roomType" data-value="Standard Double">
					        <div class="title">Standard Double incl. breakfast and lunch</div>
					        <ul>
						        <li>Cost: 2200 SEK/person/night</li>
						        <li>Fits: 2 persons</li>
					        </ul>
				        </div>
				        <div class="roomtype variable" data-variable="roomType" data-value="Cabin">
					        <div class="title">6 bed cabin incl. breakfast, lunch and cleaning (after checkout)</div>
					        <ul>
						        <li>Cost: 13800 SEK for the week (2300 SEK/person for the week for a full cabin)</li>
						        <li>Fits: 6 persons</li>
					        </ul>
				        </div>
			        </div>
			        <div class="variableErrorMessage" data-variable="roomType">
    Please select a room type.
			        </div>
			        <div class="clearfloat"></div>
		        </div>
		        <div class="hotelDetails requireEnabled" data-variable="passportNumber">
			        <h2>Additional required information</h2>
			        <div class="hotelDetail requireEnabled" data-variable="hotelAccompany">
				        <span>Request for room mate</span>
				        <input type="text" class="variable" data-variable="hotelAccompany" />
			        </div>
			        <div class="hotelDetail requireEnabled" data-variable="separateBeds">
				        <span>&nbsp;</span>
				        <div class="variable" data-variable="separateBeds">Separate beds?</div>
			        </div>
			        <div class="hotelDetail">
				        <span>Full home address</span>
				        <textarea name="address" rows="4" cols="50" class="variable" data-variable="address"></textarea>
				        <div class="variableErrorMessage" data-variable="address">
    Please enter your address.
				        </div>
			        </div>
			        <div class="hotelDetail">
				        <span>Passport number</span>
				        <input type="text" name="passportNumber" class="variable" data-variable="passportNumber" />
				        <div class="variableErrorMessage" data-variable="passportNumber">
    Please enter your passport number.
				        </div>
			        </div>
			        <div class="hotelDetail">
				        <span>Additional information</span>
				        <textarea name="hotelAdditional" rows="4" cols="50" class="variable" data-variable="hotelAdditional"></textarea>
			        </div>
		        </div>
	        </div>	<!-- accommodation page -->
    ';
	
$banquette = '<div class="title">Banquette</div>
				        <div class="contents">Arranged 8rd of August in TanumStrand?? </div>
				        <div class="price">550 SEK</div>';


				
$hotel_summary ='<div class="hotelSummary requireValue" data-variable="hotelCost" data-value="!0">
				        <div class="varSummary">
					        <div class="costSummary"><div class="variableObserver" data-variable="hotelCost">0</div> SEK</div>
					        <span class="title">Nights</span>
					        <div class="requireValue" data-variable="hotel38">Mon 3.8. </div>
					        <div class="requireValue" data-variable="hotel48">Tue 4.8. </div>
					        <div class="requireValue" data-variable="hotel58">Wed 5.8. </div>
					        <div class="requireValue" data-variable="hotel68">Thu 6.8. </div>
					        <div class="requireValue" data-variable="hotel78">Fri 7.8. </div>
					        <div class="requireValue" data-variable="hotel88">Sat 8.8. </div>
					        <div class="requireValue" data-variable="package" data-value="staff">Thu 6.8. Fri 7.8. Sat 8.8. </div>
				        </div>
				        <div class="varSummary">
					        <span class="title">Room type</span>
					        <div class="variableObserver" data-variable="roomType"></div>
				        </div>
				        <div class="requireEnabled" data-variable="hotelAccompany">
					        <div class="varSummary">
						        <span class="title">Request for room mate</span>
						        <div class="variableObserver" data-variable="hotelAccompany"></div>
					        </div>
				        </div>
				        <div class="requireEnabled" data-variable="separateBeds">
					        <div class="varSummary">
						        <span class="title">Separate beds</span>
						        <div class="requireValue" data-variable="separateBeds" data-value="yes">Yes</div>
						        <div class="requireValue" data-variable="separateBeds" data-value="!yes">No</div>
					        </div>
				        </div>
				        <div class="varSummary">
					        <span class="title">Address</span>
					        <div class="variableObserver" data-variable="address"></div>
				        </div>
				        <div class="varSummary">
					        <span class="title">Passport number</span>
					        <div class="variableObserver" data-variable="passportNumber"></div>
				        </div>
				        <div class="varSummary">
					        <span class="title">Additional information</span>
					        <div class="variableObserver" data-variable="hotelAdditional"></div>
				        </div>
			        </div>';
					
//Not applicable	
$sightseeing_included = False;
$sightseeing ='<h2>Sightseeing and excursions</h2>
		        <div class="option variable" data-variable="ultimateSauna">
			        <div class="title">Ultimate Sauna Experience</div>
			        <div class="contents">Thursday 1st of August. Will be arranged only if there are approximately 10-20 participants.</div>
			        <div class="price">35 &euro;</div>
		        </div>
		        <div class="option variable" data-variable="hikingTour">
			        <div class="title">Hiking in Nuuksio</div>
			        <div class="contents">Sunday 5th of August. Will be arranged only if there are approximately 10-20 participants.</div>
			        <div class="price">70 &euro;</div>
		        </div>
		        <div class="option variable" data-variable="helsinkiTourWednesday">
			        <div class="title">Sightseeing Helsinki Wed</div>
			        <div class="contents">Wednesday 31st of August.</div>
			        <div class="price">35 &euro;</div>
		        </div>
		        <div class="option variable" data-variable="helsinkiTourThursday">
			        <div class="title">Sightseeing Helsinki Thu</div>
			        <div class="contents">Thursday 1st of August.</div>
			        <div class="price">35 &euro;</div>
		        </div>
		        <div class="option variable" data-variable="tallinTour">
			        <div class="title">Day trip to Tallinn, Estonia</div>
			        <div class="contents">Will be arranged only if there are approximately 10-20 participants.</div>
			        <div class="price">70 &euro;</div>
		        </div>
		        <div class="option variable" data-variable="porvooTour">
			         <div class="title">Sightseeing Porvoo</div>
			         <div class="contents">Sunday 5th of August. Will be arranged only if there are approximately 10-20 participants.</div>
			        <div class="price">70 &euro;</div>
		        </div>';
				
$sightseeing_summary ='<div class="varSummary requireValue" data-variable="ultimateSauna">
				        <span>Ultimate sauna experience</span>
				        <div class="costSummary">35 &euro;</div>
			        </div>
			        <div class="varSummary requireValue" data-variable="hikingTour">
				        <span>Hiking tour in Nuuksio</span>
				        <div class="costSummary">70 &euro;</div>
			        </div>
			        <div class="varSummary requireValue" data-variable="helsinkiTourWednesday">
				        <span>Sightseeing in Helsinki on Wednesday</span>
				        <div class="costSummary">35 &euro;</div>
			        </div>
			        <div class="varSummary requireValue" data-variable="helsinkiTourThursday">
				        <span>Sightseeing in Helsinki on Thursday</span>
				        <div class="costSummary">35 &euro;</div>
			        </div>
			        <div class="varSummary requireValue" data-variable="tallinTour">
				        <span>Day trip to Tallinn</span>
				        <div class="costSummary">70 &euro;</div>
			        </div>
			        <div class="varSummary requireValue" data-variable="porvooTour">
				        <span>Sightseeing in Porvoo</span>
				        <div class="costSummary">70 &euro;</div>
			        </div>';
?>
