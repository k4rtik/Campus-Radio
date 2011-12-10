<?php

function countries()
{
	static $countries = NULL;
	if ($countries === NULL)
	{
		$countries = array(
		'' => ''
		, 'Afghanistan' => 'Afghanistan'
		,'Albania' => 'Albania'
		,'Algeria' => 'Algeria'
		,'Andorra' => 'Andorra'
		,'Angola' => 'Angola'
		,'Anguilla' => 'Anguilla'
		,'Antarctica' => 'Antarctica'
		,'Antigua & Barbuda' => 'Antigua & Barbuda'
		,'Argentina' => 'Argentina'
		,'Armenia' => 'Armenia'
		,'Aruba' => 'Aruba'
		,'Australia' => 'Australia'
		,'Austria' => 'Austria'
		,'Azerbaijan' => 'Azerbaijan'
		,'Bahamas' => 'Bahamas'
		,'Bahrain' => 'Bahrain'
		,'Bangladesh' => 'Bangladesh'
		,'Barbados' => 'Barbados'
		,'Belarus' => 'Belarus'
		,'Belgium' => 'Belgium'
		,'Belize' => 'Belize'
		,'Benin' => 'Benin'
		,'Bermuda' => 'Bermuda'
		,'Bhutan' => 'Bhutan'
		,'Bolivia' => 'Bolivia'
		,'Bosnia & Herzegovina' => 'Bosnia & Herzegovina'
		,'Botswana' => 'Botswana'
		,'Bouvet Island' => 'Bouvet Island'
		,'Brazil' => 'Brazil'
		,'British Indian Ocean Territ' => 'British Indian Ocean Territ'
		,'Brunei' => 'Brunei'
		,'Bulgaria' => 'Bulgaria'
		,'Burkina Faso' => 'Burkina Faso'
		,'Burundi' => 'Burundi'
		,'Cambodia' => 'Cambodia'
		,'Cameroon' => 'Cameroon'
		,'Canada' => 'Canada'
		,'Cape Verde' => 'Cape Verde'
		,'Cayman Islands' => 'Cayman Islands'
		,'Central African Rep.' => 'Central African Rep.'
		,'Chad' => 'Chad'
		,'Chile' => 'Chile'
		,'China' => 'China'
		,'Christmas Island' => 'Christmas Island'
		,'Cocos (Keeling) Islands' => 'Cocos (Keeling) Islands'
		,'Colombia' => 'Colombia'
		,'Comoros' => 'Comoros'
		,'Congo (Dem. Rep.)' => 'Congo (Dem. Rep.)'
		,'Congo (Rep.)' => 'Congo (Rep.)'
		,'Cook Islands' => 'Cook Islands'
		,'Costa Rica' => 'Costa Rica'
		,"Cote d'Ivoire" => "Cote d'Ivoire"
		,'Croatia' => 'Croatia'
		,'Cuba' => 'Cuba'
		,'Cyprus' => 'Cyprus'
		,'Czech Republic' => 'Czech Republic'
		,'Denmark' => 'Denmark'
		,'Djibouti' => 'Djibouti'
		,'Dominica' => 'Dominica'
		,'Dominican Republic' => 'Dominican Republic'
		,'East Timor' => 'East Timor'
		,'Ecuador' => 'Ecuador'
		,'Egypt' => 'Egypt'
		,'El Salvador' => 'El Salvador'
		,'Equatorial Guinea' => 'Equatorial Guinea'
		,'Eritrea' => 'Eritrea'
		,'Estonia' => 'Estonia'
		,'Ethiopia' => 'Ethiopia'
		,'Faeroe Islands' => 'Faeroe Islands'
		,'Falkland Islands' => 'Falkland Islands'
		,'Fiji' => 'Fiji'
		,'Finland' => 'Finland'
		,'France' => 'France'
		,'France, Metropolitan' => 'France, Metropolitan'
		,'French Guiana' => 'French Guiana'
		,'French Polynesia' => 'French Polynesia'
		,'French Southern & Antarctic' => 'French Southern & Antarctic'
		,'Gabon' => 'Gabon'
		,'Gambia' => 'Gambia'
		,'Georgia' => 'Georgia'
		,'Germany' => 'Germany'
		,'Ghana' => 'Ghana'
		,'Gibraltar' => 'Gibraltar'
		,'Greece' => 'Greece'
		,'Greenland' => 'Greenland'
		,'Grenada' => 'Grenada'
		,'Guadeloupe' => 'Guadeloupe'
		,'Guam' => 'Guam'
		,'Guatemala' => 'Guatemala'
		,'Guinea' => 'Guinea'
		,'Guinea-Bissau' => 'Guinea-Bissau'
		,'Guyana' => 'Guyana'
		,'Haiti' => 'Haiti'
		,'Heard Island & McDonald Isl' => 'Heard Island & McDonald Isl'
		,'Honduras' => 'Honduras'
		,'Hungary' => 'Hungary'
		,'Iceland' => 'Iceland'
		,'India' => 'India'
		,'Indonesia' => 'Indonesia'
		,'Iran' => 'Iran'
		,'Iraq' => 'Iraq'
		,'Ireland' => 'Ireland'
		,'Israel' => 'Israel'
		,'Italy' => 'Italy'
		,'Jamaica' => 'Jamaica'
		,'Japan' => 'Japan'
		,'Jordan' => 'Jordan'
		,'Kazakhstan' => 'Kazakhstan'
		,'Kenya' => 'Kenya'
		,'Kirgizstan' => 'Kirgizstan'
		,'Kiribati' => 'Kiribati'
		,'Korea (North)' => 'Korea (North)'
		,'Korea (South)' => 'Korea (South)'
		,'Kuwait' => 'Kuwait'
		,'Laos' => 'Laos'
		,'Latvia' => 'Latvia'
		,'Lebanon' => 'Lebanon'
		,'Lesotho' => 'Lesotho'
		,'Liberia' => 'Liberia'
		,'Libya' => 'Libya'
		,'Liechtenstein' => 'Liechtenstein'
		,'Lithuania' => 'Lithuania'
		,'Luxembourg' => 'Luxembourg'
		,'Macao' => 'Macao'
		,'Macedonia' => 'Macedonia'
		,'Madagascar' => 'Madagascar'
		,'Malawi' => 'Malawi'
		,'Malaysia' => 'Malaysia'
		,'Maldives' => 'Maldives'
		,'Mali' => 'Mali'
		,'Malta' => 'Malta'
		,'Marshall Islands' => 'Marshall Islands'
		,'Martinique' => 'Martinique'
		,'Mauritania' => 'Mauritania'
		,'Mauritius' => 'Mauritius'
		,'Mayotte' => 'Mayotte'
		,'Mexico' => 'Mexico'
		,'Micronesia' => 'Micronesia'
		,'Moldova' => 'Moldova'
		,'Monaco' => 'Monaco'
		,'Mongolia' => 'Mongolia'
		,'Montserrat' => 'Montserrat'
		,'Morocco' => 'Morocco'
		,'Mozambique' => 'Mozambique'
		,'Burma' => 'Burma'
		,'Namibia' => 'Namibia'
		,'Nauru' => 'Nauru'
		,'Nepal' => 'Nepal'
		,'Netherlands' => 'Netherlands'
		,'Netherlands Antilles' => 'Netherlands Antilles'
		,'New Caledonia' => 'New Caledonia'
		,'New Zealand' => 'New Zealand'
		,'Nicaragua' => 'Nicaragua'
		,'Niger' => 'Niger'
		,'Nigeria' => 'Nigeria'
		,'Niue' => 'Niue'
		,'Norfolk Island' => 'Norfolk Island'
		,'Northern Mariana Islands' => 'Northern Mariana Islands'
		,'Norway' => 'Norway'
		,'Oman' => 'Oman'
		,'Pakistan' => 'Pakistan'
		,'Palau' => 'Palau'
		,'Palestine' => 'Palestine'
		,'Panama' => 'Panama'
		,'Papua New Guinea' => 'Papua New Guinea'
		,'Paraguay' => 'Paraguay'
		,'Peru' => 'Peru'
		,'Philippines' => 'Philippines'
		,'Pitcairn' => 'Pitcairn'
		,'Poland' => 'Poland'
		,'Portugal' => 'Portugal'
		,'Puerto Rico' => 'Puerto Rico'
		,'Qatar' => 'Qatar'
		,'Reunion' => 'Reunion'
		,'Romania' => 'Romania'
		,'Russia' => 'Russia'
		,'Rwanda' => 'Rwanda'
		,'Samoa (American)' => 'Samoa (American)'
		,'Samoa (Western)' => 'Samoa (Western)'
		,'San Marino' => 'San Marino'
		,'Sao Tome & Principe' => 'Sao Tome & Principe'
		,'Saudi Arabia' => 'Saudi Arabia'
		,'Senegal' => 'Senegal'
		,'Seychelles' => 'Seychelles'
		,'Sierra Leone' => 'Sierra Leone'
		,'Singapore' => 'Singapore'
		,'Slovakia' => 'Slovakia'
		,'Slovenia' => 'Slovenia'
		,'Solomon Islands' => 'Solomon Islands'
		,'Somalia' => 'Somalia'
		,'South Africa' => 'South Africa'
		,'South Georgia & the South S' => 'South Georgia & the South S'
		,'Spain' => 'Spain'
		,'Sri Lanka' => 'Sri Lanka'
		,'St Helena' => 'St Helena'
		,'St Kitts & Nevis' => 'St Kitts & Nevis'
		,'St Lucia' => 'St Lucia'
		,'St Pierre & Miquelon' => 'St Pierre & Miquelon'
		,'St Vincent' => 'St Vincent'
		,'Sudan' => 'Sudan'
		,'Suriname' => 'Suriname'
		,'Svalbard & Jan Mayen' => 'Svalbard & Jan Mayen'
		,'Swaziland' => 'Swaziland'
		,'Sweden' => 'Sweden'
		,'Switzerland' => 'Switzerland'
		,'Syria' => 'Syria'
		,'Taiwan' => 'Taiwan'
		,'Tajikistan' => 'Tajikistan'
		,'Tanzania' => 'Tanzania'
		,'Thailand' => 'Thailand'
		,'Togo' => 'Togo'
		,'Tokelau' => 'Tokelau'
		,'Tonga' => 'Tonga'
		,'Trinidad & Tobago' => 'Trinidad & Tobago'
		,'Tunisia' => 'Tunisia'
		,'Turkey' => 'Turkey'
		,'Turkmenistan' => 'Turkmenistan'
		,'Turks & Caicos Is' => 'Turks & Caicos Is'
		,'Tuvalu' => 'Tuvalu'
		,'Uganda' => 'Uganda'
		,'Ukraine' => 'Ukraine'
		,'United Arab Emirates' => 'United Arab Emirates'
		,'United Kingdom' => 'United Kingdom'
		,'United States of America' => 'United States of America'
		,'Uruguay' => 'Uruguay'
		,'Uzbekistan' => 'Uzbekistan'
		,'Vanuatu' => 'Vanuatu'
		,'Vatican City' => 'Vatican City'
		,'Venezuela' => 'Venezuela'
		,'Vietnam' => 'Vietnam'
		,'Virgin Islands (UK)' => 'Virgin Islands (UK)'
		,'Virgin Islands (US)' => 'Virgin Islands (US)'
		,'Wallis & Futuna' => 'Wallis & Futuna'
		,'Western Sahara' => 'Western Sahara'
		,'Yemen' => 'Yemen'
		,'Yugoslavia' => 'Yugoslavia'
		,'Zambia' => 'Zambia'
		,'Zimbabwe' => 'Zimbabwe'
	);
	}
	return $countries;
}
?>
