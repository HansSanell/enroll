<?php

$str_event_name = "European Taido Championships 2015";
$str_event_name_exl_year = "European Taido Championship";
$str_event_short = "ETC2015";
$str_event_shorter = "ETC";
$str_event_price ="20 &euro;";

$contact_email = "info@etc2015.se";
$contact_name = "Swedish Taido Association";

$enrollment_base_url = "http://www.etc2015.se/enroll/";

$submission_deadline = "2015-04-15";

//change days for lunchboxes
$comp_event_package_includes = "<ol>
	        <li>International Taido Seminar</li>
	        <li>Event T-shirt </li>
	        <li>".$str_event_short." Participation Fee </li>
	        <li>3 x Lunchboxes (Thu, Fri, Sat) </li>
	        <li>Participation in Banquette (including Dinner)</li>
        </ol>";

$comp_package_price ="185&euro";

$tourist_event_package_includes ="
<ol>
    <li>International Taido Seminar</li>
    <li>Event T-shirt </li>
    <li>".$str_event_short." Ticket</li>
    <li>3 x Lunchboxes (Thu, Fri, Sat) </li>
    <li>Participation in Banquette (including Dinner)</li>
</ol>";
$tourist_event_package_price = "155&euro;";


$judge_event_package_include = "<ol>
				<li>International Taido Seminar</li>
				<li>Event T-shirt </li>
				<li>3 x Lunchboxes (Thu, Fri, Sat) </li>
				<li>Participation in Banquette (including Dinner)</li>
			</ol>";
$judge_event_package_price ="115&euro";

$volonteer_package = "<ol>
									        <li>International Taido Seminar</li>
									        <li>Staff T-shirt</li>
									        <li>3 x Lunchboxes (Thu, Fri, Sat) </li>
								        </ol>";
$volonteer_package_price = "0 &euro;";

$staff_package_include ="<ol>
								        <li>Hotel accommodation in a 3 person room for 3 nights</li>
								        <li>International Taido Seminar</li>
								        <li>Staff T-shirt</li>
								        <li>3 x Lunchboxes (Thu, Fri, Sat) </li>
								        <li>Participation in Banquette (including Dinner)</li>
							        </ol>";
$staff_package_price ="150&euro;";

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

$ifg_fee = "30 euros";


$hotel_page = '<div class="page hotel" id="hotelPage">
		        <h1>Sokos Hotel Pasila</h1>

		        <p>
The Sokos Hotel Pasila provides peaceful and cozy accommodations in Helsinki�s L�nsi-Pasila district.
The Pasila Sport Hall (venue for the WTC2013 event, 700m), Helsinki Congress and Exhibition Center,
			        Hartwall Arena ice stadium, and Linnanm�ki Amusement Park can all be found a short distance from this
			        hotel. The Sokos Hotel Pasila is located 15 kilometers from Helsinki Vantaa Airport. A tram stop that
			        allows for easy access to central Helsinki can be found right outside the hotel. Guests traveling by car can
			        make use of the hotel�s garage and outdoor parking spaces as well as the car wash.
		        </p>

		        <p>
Spacious, air conditioned rooms with cable TV and free Wi-Fi.
Buffet breakfast is included in the room rate.
		        </p>

		        <h2>Nights</h2>
		        <p>
Please select which nights you want to spend at the hotel. The days correspond to the start of the night at the hotel. For example, Tuesday 30.7. means the night between 30.7. and 1.8.
		        </p>

		        <div class="days">
			        <div class="hotelday variable" data-variable="hotel307">
				        <h2>Tuesday 30.7.</h2>
				        <ul><li>Arrival to Helsinki</li></ul>
			        </div>
			        <div class="hotelday variable" data-variable="hotel317">
				        <h2>Wednesday 31.7.</h2>
				        <ul>
					        <li>Shinsa</li>
					        <li>EuTai meeting</li>
				        </ul>
			        </div>
			        <div class="hotelday variable" data-variable="hotel018">
				        <h2>Thursday 1.8.</h2>
				        <ul>
					        <li>International Taido Seminar</li>
					        <li>International Junior Taido Championships</li>
					        <li>Judge meeting</li>
					        <li>World Taido Federation meeting</li>
				        </ul>
			        </div>
			        <div class="hotelday variable" data-variable="hotel028">
				        <h2>Friday 2.8.</h2>
				        <ul>
					        <li>International Friendship Games</li>
				        </ul>
			        </div>
			        <div class="hotelday variable" data-variable="hotel038">
				        <h2>Saturday 3.8.</h2>
				        <ul>
					        <li>World Taido Championships</li>
					        <li>Banquette</li>
				        </ul>
			        </div>
			        <div class="hotelday variable" data-variable="hotel048">
				        <h2>Sunday 4.8.</h2>
				        <ul>
					        <li>Sightseeing and excursions</li>
				        </ul>
			        </div>
		        </div>
		        <div class="clearfloat"></div>
		        <div class="hotelDetails requireEnabled" data-variable="roomType">
		        <h2>Room type</h2>
			        <div class="roomtypes">
				        <div class="roomtype variable" data-variable="roomType" data-value="Standard Single">
					        <div class="title">Standard Single</div>
					        <ul>
						        <li>Cost: 95&euro;/person/night</li>
						        <li>Fits: 1 person</li>
					        </ul>
				        </div>
				        <div class="roomtype variable" data-variable="roomType" data-value="Standard Double">
					        <div class="title">Standard Double</div>

					        <ul>
						        <li>Cost: 50&euro;/person/night</li>
						        <li>Fits: 2 persons</li>
					        </ul>
				        </div>
				        <div class="roomtype variable" data-variable="roomType" data-value="Superior">
					        <div class="title">Superior</div>
					        <ul>
						        <li>Cost: 70&euro;/person/night</li>
						        <li>Fits: 2 persons</li>
					        </ul>

				        </div>
				        <div class="roomtype variable" data-variable="roomType" data-value="Junior Suite">
					        <div class="title">Junior Suite</div>
					        <ul>
						        <li>Cost: 75&euro;/person/night</li>
						        <li>Fits: 2 persons</li>
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
				        <div class="contents">Arranged 3rd of August in Sokos Hotel Presidentti in the Helsinki City Centre</div>
				        <div class="price">50 &euro;</div>';

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

$hotel_summary ='<div class="hotelSummary requireValue" data-variable="hotelCost" data-value="!0">
				        <div class="varSummary">
					        <div class="costSummary"><div class="variableObserver" data-variable="hotelCost">0</div> &euro;</div>
					        <span class="title">Nights</span>
					        <div class="requireValue" data-variable="hotel307">Tue 30.7. </div>
					        <div class="requireValue" data-variable="hotel317">Wed 31.7. </div>
					        <div class="requireValue" data-variable="hotel018">Thu 1.8. </div>
					        <div class="requireValue" data-variable="hotel028">Fri 2.8. </div>
					        <div class="requireValue" data-variable="hotel038">Sat 3.8. </div>
					        <div class="requireValue" data-variable="hotel048">Sun 4.8. </div>
					        <div class="requireValue" data-variable="package" data-value="staff">Thu 1.8. Fri 2.8. Sat 3.8. </div>
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