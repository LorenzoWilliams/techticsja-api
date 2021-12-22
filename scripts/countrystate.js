/*
	*	By: Baqir Farooq
	*	baqirfarooq@gmail.com
	*	Description:
	*	Inserts Countries & States as Dropdown List
	*	How to Use:
		In Head/Footer section:
		<script type= "text/javascript" src = "countries.js"></script>
		In Body Section:
		Select Country:   <select onchange="print_state('state',this.selectedIndex);" id="country" name ="country"></select>
		City/District/State: <select name ="state" id ="state"></select>
		<script language="javascript">print_country("country");</script>	
	*
	*
*/

var country_arr = new Array("Canada", "Jamaica", "United Kingdom", "United States");

var s_a = new Array();
s_a[0]="";
s_a[1]="Alberta|British Columbia|Manitoba|New Brunswick|Newfoundland and Labrador|Northwest Territories|Nova Scotia|Nunavut|Ontario|Prince Edward Island|Quebec|Saskatchewan|Yukon Territory";
s_a[2]="Clarendon|Hanover|Kingston|Manchester|Portland|St. Andrew|St. Ann|St. Catherine|St. Elizabeth|St. James|Saint Mary|St. Thomas|Trelawny|Westmoreland";

s_a[3]="Al 'Asimah|Al Ahmadi|Al Farwaniyah|Al Jahra'|Hawalli";
s_a[4]="Batken Oblasty|Bishkek Shaary|Chuy Oblasty (Bishkek)|Jalal-Abad Oblasty|Naryn Oblasty|Osh Oblasty|Talas Oblasty|Ysyk-Kol Oblasty (Karakol)"


function print_country(country_id){
	// given the id of the <select> tag as function argument, it inserts <option> tags
	var option_str = document.getElementById(country_id);
	option_str.length=0;
	option_str.options[0] = new Option('Select Country','');
	option_str.selectedIndex = 0;
	for (var i=0; i<country_arr.length; i++) {
		option_str.options[option_str.length] = new Option(country_arr[i],country_arr[i]);
	}
}

function print_state(state_id, state_index){
	var option_str = document.getElementById(state_id);
	option_str.length=0;	
	option_str.options[0] = new Option('Select State','');
	option_str.selectedIndex = 0;
	var state_arr = s_a[state_index].split("|");
	for (var i=0; i<state_arr.length; i++) {
		option_str.options[option_str.length] = new Option(state_arr[i],state_arr[i]);
	}
}