
 
<?php

include ('fixedSettings.php');
include ('dvmShared.php');
include('common.php');
/* for future developments
$jsonR = 'jsondata/gauge-data.txt';
$real = file_get_contents($jsonR);
$realData = json_decode($real, true);
*/
error_reporting(0);
$weewxrt = array_map(function ($v)
{
if ($v == 'NULL')
{
    return null;
}
    return $v;
},
explode(" ", file_get_contents($livedata)));

    
//general
$region_city = explode("/", $TZ);
$region = $region_city[0];
$city = $region_city[1];
$ukWeatherHealth = "https://app.powerbi.com/view?r=eyJrIjoiZGI5MTA1NTEtZmE4NC00NTk3LTg5NjQtZjMyNDQ5YTgyMjI2IiwidCI6ImVlNGUxNDk5LTRhMzUtNGIyZS1hZDQ3LTVmM2NmOWRlODY2NiIsImMiOjh9";
$sundial_time = date("M d Y H:i:s",filemtime('serverdata/dvmRealtime.txt'));        
$stationlocation = "Steeple Claydon, UK";
$hardware = "'unknown model'";
$lat = 51.94;
$lon = -0.987;
$absLat = abs($lat);
$absLon = abs($lon);
if ($lat >= "0"){$NS = "North";}
else {$NS = "South";}
if ($lon >= "0") {$EW = "East";}
else {$EW = "West";}
$elevation = 88.0;
$url = "https://claydonsweather.org.uk";
$divum["date"] = date($dateFormat, $divum["datetime"]);
$divum["time"] = date($timeFormat, $divum["datetime"]);
$divum["swversion"] = "5.1.0";
$divum["build"] = $weewxrt[38];
$divum["since"] = "2020";
$divum["heatmap_year"] = date("Y");
$stationUptime = "0 days, 8 hours, 33 minutes";
$TS = time();
$dvmPath = "/var/www/html/divumwx/";
if($theme == 'dark') {$convertStyle = "background: 0; border-color: #393d40; color:";}
else {$convertStyle = "background:";}

$phpVersion = phpversion();
$hemisphere = 0;

//air density
$air_density["now"] = 1.27979;
if(is_numeric($air_density["now"]) != 1){$air_density["now"] = 0;}
$air_density["day_max"] = number_format(1.30370,4);
$air_density["day_min"] = number_format(1.23303,4);
$air_density["day_avg"] = number_format(1.27256,4);
$air_density["day_maxtime"] = date('H:i',1744244829);
$air_density["day_mintime"] = date('H:i',1744303905);
$air_density["yesterday_max"] = number_format(1.30190,4);
$air_density["yesterday_min"] = number_format(1.24730,4);
$air_density["yesterday_avg"] = number_format(1.27713,4);
$air_density["yesterday_maxtime"] = date('H:i',1744176610);
$air_density["yesterday_mintime"] = date('H:i',1744210415);
$air_density["month_max"] = number_format(1.30541,4);
$air_density["month_min"] = number_format(1.19759,4);
$air_density["month_avg"] = number_format(1.26052,4);
$air_density["month_maxtime"] = date('j M H:i',1744091638);
$air_density["month_mintime"] = date('j M H:i',1743778207);
$air_density["year_max"] = number_format(1.33291,4);
$air_density["year_min"] = number_format(1.19456,4);
$air_density["year_avg"] = number_format(1.26593,4);
$air_density["year_maxtime"] = date('j M H:i',1738811168);
$air_density["year_mintime"] = date('j M H:i',1741529041);
$air_density["alltime_max"] = number_format(1.35583,4);
$air_density["alltime_min"] = number_format(1.12072,4);
$air_density["alltime_avg"] = number_format(1.24003,4);
$air_density["alltime_maxtime"] = date('j M Y H:i',1674546300);
$air_density["alltime_mintime"] = date('j M Y H:i',1658239200);

//air quality
$air["pm_units"] = "g/m<sup><b>3</b></sup>";
$air["current.pm2_5"] = 11.1;
$air["24h.rollingavg.pm2_5"] = 11.1;
$air["current.pm10_0"] = 14.6;
$air["24h.rollingavg.pm10_0"] = 14.6;

//almanac
$alm["parallacticAngle"] = -5.079510963258145;
$alm["ecliptic_longitude_moon"] = 178.68122332695194;
$alm["ecliptic_latitude_moon"] = -0.1511733751153781;
$alm["moon_ecliptic_angle"] = 157.70214897150217;
$alm["ecliptic_angle"] = 23.436004374568054;
$alm["moon_distance"] = 399419.1488552815;
$alm["sun_distance"] = 149901020.91516137;
$alm["ecliptic_tilt"] = 23.436004374568;
$alm["sun_altitude"] = round(-25.30110901606596,2);
$alm["moon_altitude"] = round(37.566832737013854,2);
if ($alm["sun_altitude"] < 0)
{
$alm["sun_None"] = "<i>(Always down)</i>";
$alm["daylight_str"] = "00:00";
}
else
{
$alm["sun_None"] = "<i>(Always up)</i>";
$alm["daylight_str"] = "24:00";
}
$alm["sun_azimuth"] = 329.6280165903202;
$alm["sun_declination"] = 8.302228460839235;
$alm["moon_azimuth"] = 171.7647912851586;
$alm["moon_declination"] = 0.48624992420994634;
$alm["sunrise"] = "06:17";
$alm["sunset"] = "19:53";
$alm["sunrise_date"] = "Apr 10 2025 06:17:32";
$alm["sunset_date"] = "Apr 10 2025 19:53:54";
$alm["sun_right_ascension"] = 19.668524115200682;
$alm["moon_right_ascension"] = 178.67668527996645;
$alm["next_equinox"] = "22/09/25 19:19:17";
$alm["next_solstice"] = "21/06/25 03:42:18";
$alm["sidereal_time"] = 172.15554726735436;
$alm["civil_twilight_begin"] = "05:41";
$alm["civil_twilight_end"] = "20:29";
$alm["nautical_twilight_begin"] = "04:59";
$alm["nautical_twilight_end"] = "21:12";
$alm["astronomical_twilight_begin"] = "04:12";
$alm["astronomical_twilight_end"] = "22:00";
$alm["sun_meridian_transit"] = "13:05";
$alm["moon_meridian_transit"] = "23:41";
$alm["moonphase"] = $lang['Waxinggibbous'];
$alm["moonphase_number"] = 3;
$alm["moon_age"] = 12.470294701821274;
$alm["hour_sun"] = 2.6614006205699043;
$alm["hour_moon"] = 6.169369977882546;
$alm["luminance"] = round(96.09949328788514,2);
$alm["fullmoon"] = "13 Apr 01:22";
$alm["newmoon"] = "27 Apr 20:31";   
$alm["daylight"] = "13:36";
$alm["moonrise"] = "17:21";
$alm["moonset"] = "05:36";
$alm["mercury_hlongitude"] = 239.35313312269489;
$alm["venus_hlongitude"] = 213.10020821748367;
$alm["earth_hlongitude"] = 201.29107068972007;
$alm["mars_hlongitude"] = 153.89948894488478;
$alm["jupiter_hlongitude"] = 86.99207598646376;
$alm["saturn_hlongitude"] = 353.0780777469683;
$alm["uranus_hlongitude"] = 56.882269615446;
$alm["neptune_hlongitude"] = 359.74311294285013;
$alm["pluto_hlongitude"] = 302.09137129098343;
//night or day?
if (strtotime(date("G.i")) >= strtotime($alm["civil_twilight_begin"]) && strtotime(date("G.i")) < strtotime($alm["civil_twilight_end"])){
    $dayPartCivil = "day";
}else{
    $dayPartCivil = "night";
}
if (strtotime(date("G.i")) >= strtotime($alm["nautical_twilight_begin"]) && strtotime(date("G.i")) < strtotime($alm["nautical_twilight_end"])){
    $dayPartNautical = "day";
}else{
    $dayPartNautical = "night";
}
if (strtotime(date("G.i")) >= strtotime($alm["sunrise"]) && strtotime(date("G.i")) < strtotime($alm["sunset"])){
    $dayPartNatural = "day";
}else{
    $dayPartNatural = "night";
}

//barometer
$barom["units"] = " hPa";
if ($barom["units"] == " inHg"){
    $barom["units"] = "inHg";
}
else if ($barom["units"] == " hPa")
{
    $barom["units"] = "hPa";
}
else if ($barom["units"] == " kPa")
{
    $barom["units"] = "kPa";
}
else if ($barom["units"] == " mmHg")
{
    $barom["units"] = "mmHg";
}
else if ($barom["units"] == " mbar")
{
    $barom["units"] = "mbar";
}
$barom["now"] = $weewxrt[10]; //$realData["barometer"]; Removed for future.
$barom["max"] = 1034.2;
$barom["maxtime"] = date('H:i',"1744244409");
$barom["min"] = 1027.7;
$barom["mintime"] = date('H:i',"1744322418");
$barom["trend_code"] = round(-0.4272403982927244,0);
if(is_numeric($barom["trend_code"]) != 1){$barom["trend_code"] = 0;}
if($barom["trend_code"]>3){$barom["trend_desc"]="Rising Very Rapidly";$barom["trend_code"]=4;}
else if($barom["trend_code"]>2){$barom["trend_desc"]="Rising Quickly";$barom["trend_code"]=3;}
else if($barom["trend_code"]>1){$barom["trend_desc"]="Rising";$barom["trend_code"]=2;}
else if($barom["trend_code"]>0){$barom["trend_desc"]="Rising Slowly";$barom["trend_code"]=1;}
else if($barom["trend_code"]==0){$barom["trend_desc"]="Steady";$barom["trend_code"]=0;}
else if($barom["trend_code"]<0){$barom["trend_desc"]="Falling Slowly";$barom["trend_code"]=-1;}
else if($barom["trend_code"]<-1){$barom["trend_desc"]="Falling";$barom["trend_code"]=-2;}
else if($barom["trend_code"]<-2){$barom["trend_desc"]="Falling Quickly";$barom["trend_code"]=-3;}
else if($barom["trend_code"]<-3){$barom["trend_desc"]="Falling Very Rapidly";$barom["trend_code"]=-4;}
else if($barom["trend_code"]=="N/A"||$barom["trend_code"]==" N/A"||$barom["trend_code"]=="  N/A"||$barom["trend_code"]==    N/A){$barom["trend_desc"]="Steady";$barom["trend_code"]=0;}
$barom["yesterday_max"] = 1033.7;
$barom["yesterday_maxtime"] = date('H:i',1744236677);
$barom["yesterday_min"] = 1028.1;
$barom["yesterday_mintime"] = date('H:i',1744153987);
$barom["month_max"] = 1034.2;
$barom["month_maxtime"] = date('j M H:i',1744244409);
$barom["month_min"] = 1017.5;
$barom["month_mintime"] = date('j M H:i',1743780474);
$barom["year_max"] = 1044.5;
$barom["year_maxtime"] = date('j M H:i',1738835045);
$barom["year_min"] = 970.0;
$barom["year_mintime"] = date('j M H:i',1736142404);
$barom["alltime_max"] = 1044.5;
$barom["alltime_maxtime"] = date('j M Y H:i',1675586400);
$barom["alltime_min"] = 955.9;
$barom["alltime_mintime"] = date('j M Y H:i',1698909300);

//dewpoint
$dew["now"] = $weewxrt[4];
$dewTrend = "-2.6";
if(is_numeric($dewTrend) != 1 or $dewTrend == '   N/A'){$dew["trend"] = 0;}
else {$dew["trend"] = intval($dewTrend);}
$dew["day_max"] = "7.4";
if ($dew["day_max"] == '   N/A'){$dew["day_max"] = 0;}
$dew["day_maxtime"] = date('H:i',1744303905);
$dew["day_min"] = "0.5";
if ($dew["day_min"] == '   N/A'){$dew["day_min"] = 0;}
$dew["day_mintime"] = date('H:i',1744244360);
$dew["yesterday_max"] = 4.6;
$dew["yesterday_maxtime"] = date('H:i',1744204236);
$dew["yesterday_min"] = -0.4;
$dew["yesterday_mintime"] = date('H:i',1744176536);
$dew["month_max"] = 8.6;
$dew["month_maxtime"] = date('D j H:i',1743785913);
$dew["month_min"] = -1.7;
$dew["month_mintime"] = date('D j H:i',1744091323);
$dew["year_max"] = 11.7;
$dew["year_maxtime"] = date('D j M H:i',1740131767);
$dew["year_min"] = -6.5; 
$dew["year_mintime"] = date('D j M H:i',1742315597); 
$dew["alltime_max"] = 22.8;
$dew["alltime_maxtime"] = date('j M Y H:i',1723470472);
$dew["alltime_min"] = -13.1;
$dew["alltime_mintime"] = date('j M Y H:i',1671093000);

//evapotranspiration
$et["current"] = 0.00;
$et["hour"] = 0.00;
$et["day"] = 1.18;
$et["24hr"] = 1.18;
$et["week"] = 7.46;
$et["month"] = 22.75;
$et["year"] = 84.27;
$et["alltime"] = 2377.45;

//humidity
$humid["now"] = $weewxrt[3];
$humid["trend"] = 18;
if(is_numeric($humid["trend"]) != 1){$humid["trend"] = 0;}
$humid["day_max"] = 89;
$humid["day_maxtime"] = date('H:i',1744245128);
$humid["day_min"] = 53;
$humid["day_mintime"] = date('H:i',1744303711);
$humid["yesterday_max"] = 95;
$humid["yesterday_maxtime"] = date('H:i',1744183828);
$humid["yesterday_min"] = 47;
$humid["yesterday_mintime"] = date('H:i',1744211611);
$humid["month_max"] = 95;
$humid["month_maxtime"] = date('D j H:i',1744183828);
$humid["month_min"] = 34;
$humid["month_mintime"] = date('D j H:i',1744040687);
$humid["year_max"] = 99;
$humid["year_maxtime"] = date('D j M H:i',1736924963);
$humid["year_min"] = 29;
$humid["year_mintime"] = date('D j M H:i',1742315597);
$humid["alltime_max"] = 99;
$humid["alltime_maxtime"] = date('j M Y H:i',1597530000);
$humid["alltime_min"] = 18;
$humid["alltime_mintime"] = date('j M Y H:i',1658235900);
$humid["indoors_now"] = $weewxrt[23];
$humid["indoors_trend"] = round(0,1);
if(is_numeric($humid["indoors_trend"]) != 1){$humid["indoors_trend"] = 0;}
$humid["indoors_day_max"] = 53;
$humid["indoors_day_maxtime"] = date('H:i',1744309336);
$humid["indoors_day_min"] = 45;
$humid["indoors_day_mintime"] = date('H:i',1744244287);
$humid["indoors_yesterday_max"] = 50;
$humid["indoors_yesterday_maxtime"] = date('H:i',1744217764);
$humid["indoors_yesterday_min"] = 43;
$humid["indoors_yesterday_mintime"] = date('H:i',1744172405);
$humid["indoors_month_max"] = 60;
$humid["indoors_month_maxtime"] = date('D j H:i',1743676744);
$humid["indoors_month_min"] = 41;
$humid["indoors_month_mintime"] = date('D j H:i',1744039373);
$humid["indoors_year_max"] = 61;
$humid["indoors_year_maxtime"] = date('D j M H:i',1735723722);
$humid["indoors_year_min"] = 35;
$humid["indoors_year_mintime"] = date('D j H:i',1738890966);
$humid["indoors_alltime_max"] = 89;
$humid["indoors_alltime_maxtime"] = date('j M Y H:i',1597605300);
$humid["indoors_alltime_min"] = 24;
$humid["indoors_alltime_mintime"] = date('j M Y H:i',1598722200);

//lightning
$lightning["last_strike_time"] = "1744269288";
$lightning["current_strike_count"] = "0"; 
$lightning["hour_strike_count"] ="0";  
$lightning["today_strike_count"] = "37";
$lightning["yesterday_strike_count"] = "1";
$lightning["month_strike_count"] = "91";
$lightning["year_strike_count"] = "112";
$lightning["last_time"] = "1744269288";
$lightning["alltime_strike_count"] = "2763";
$lightning["last_distance"] = "17.0";
$lightning["now_energy"] = $weewxrt[59];
$lightning["now_strike_count"] = $weewxrt[60];
$lightning["now_noise_count"] = $weewxrt[61];
$lightning["now_disturber_count"] = $weewxrt[62];
if (trim($lightning["last_time"]) == 'N/A' || $lightning["last_time"] == '0' || $lightning["last_time"] == 'NULL')
{
$lightning["time_ago"] = 0;
$lightning['last_time'] = time();
$lightning["last_distance"] = "0";
}
else
{
$parts = explode(" ", $lightning["last_time"]);
$parts1 = explode("/", $parts[0]);
$lightning["time_ago"] = time() - strtotime("20" . $parts1[2] . $parts1[1] . $parts1[0] . " " . $parts[1]);
}


//rainfall
$rain["units"] = " mm";
if($rain["units"] == " mm")
{
$rain["units"] = "mm";
}
else if($rain["units"] == " cm")
{
$rain["units"] = "cm";
}
else if($rain["units"] == " in")
{
$rain["units"] = "in";
}
$rain["rate"] = round($weewxrt[8],2);
$rain["dayRain"] = round($weewxrt[9],2);
$rain["total"] = $rain["dayRain"];
$rain["last_hour"] = round(0.0,2);
$rain["last_10min"] = 0.0;
$rain["last_24hour"] = 0.00;
//$rain["24h_rate_max"] = 0.0;
//$rain["24h_rate_maxtime"] = 1744153204;
//$rain["yesterday_rate_max"] = 0.0;
//$rain["yesterday_rate_maxtime"] = 1744153204;
$rain["yesterday"] = round(0.0,1);
$rain["24h_total"] = round(0.0,2);
//$rain["day"] = round(0.0,2);
//$rain["dayRain"] = round(0.0,2);
//$rain["day_rate_max"] = 0.0;
//$rain["day_rate_maxtime"] = 1744239601;
$rain["day_total"] = $rain["dayRain"];
//$rain["month_rate_max"] = 0.0;
$rain["monthRain"] = round(0.0,2);
//$rain["monthRain"] = round(0.0,2);
//$rain["month_rate_maxtime"] = 1743462005;
$rain["month_total"] = round(0.0,2);
//$rain["year_rate_max"] = 457.2;
//$rain["year_rate_maxtime"] = 1735727369;
$rain["year_total"] = round(2650.7599999999993,2);
$rain["yearRain"] = round(47.4,2);
//$rain["yearRain"] = round(2650.7599999999993,2);
//$rain["alltime_rate_max"] = 457.2;
//$rain["alltime_rate_maxtime"] = 1735727369;
$rain["alltime_total"] = round(4952.900000000001,2);
$rainStorm = round(0.0,2);
if(is_numeric($rainStorm) != 1){$rain["storm_rain"] = 0;}
else{$rain["storm_rain"] = $rainStorm;}
if($rain["storm_rain"] > 0 ){$rain["storm_rain_start"] = date('D j M H:i',($TS)-(0));}
$rain["last_rain"] = date('D j M H:i',1743144900);
if($weewxrt[8] < 2.5){$rain["intensity"]="Slight";}
else if($weewxrt[8] < 10){$rain["intensity"]="Moderate";}
else if($weewxrt[8] < 50){$rain["intensity"]="Heavy";}
else if($weewxrt[8] >= 50){$rain["intensity"]="Violent";}

//sky
$sky["cloud_base"] = $weewxrt[52];
$sky["cloud_cover"] = round(0.0,2,PHP_ROUND_HALF_UP);
if(is_numeric($sky["cloud_cover"]) != 1){$sky["cloud_cover"] = 0;}

//solar
//illuminance (or luminous flux) lux value
$solar["lux"] = round(0.0,0,PHP_ROUND_HALF_UP);
$solar["day_lux_max"] = round(98670.0,0,PHP_ROUND_HALF_UP);
$solar["day_lux_maxtime"] = "1744283663";
$solar["threshold"] = round(0,0,PHP_ROUND_HALF_UP);
$solar["sun_duration_minutes"] = 167.43060200668896;
$solar["sun_duration_hours_minutes"] = intdiv($solar["sun_duration_minutes"], 60).' hrs: '. ($solar["sun_duration_minutes"] % 60).' mins';
$solar["sunshine_hours_yesterday"] = 391.56243105283903;
$solar["sunshine_minutes_yesterday"] = $solar["sunshine_hours_yesterday"] * 60;
$solar["sunshine_hours_minutes_yesterday"] = intdiv($solar["sunshine_minutes_yesterday"], 60).' hrs: '. ($solar["sunshine_minutes_yesterday"] % 60).' mins';
$solar["now"] = 0;
$solar["day_max"] = 593;
$solar["day_maxtime"] = date('H:i',1744292524);
if($solar["day_rad_max"] == "   N/A"){$solar["day_rad_max"]=0;}
$solar["yesterday_max"] = 611;
$solar["yesterday_maxtime"] = date('H:i',1744201025);
$solar["month_max"] = 688;
$solar["month_maxtime"] = date('D j H:i',1744112773);
$solar["year_max"] = 804;
$solar["year_maxtime"] = date('D j M H:i',1743166252);
$solar["alltime_max"] = 2148;
$solar["alltime_maxtime"] = date('j M Y H:i',1720350455);

//temperature
$temp["units"] = "C";
if($temp["units"] == "C")
{
$temp["units"] = "C";
}
else if($temp["units"] == "F")
{
$temp["units"] = "F";
}
// indoor temp
$temp["indoor_now"] = $weewxrt[22];
$temp["indoor_trend"] = round(-0.8368421052631518,1);
if(is_numeric($temp["indoor_trend"]) != 1){$temp["indoor_trend"] = 0;}
$temp["indoor_day_max"] = 19.1;
$temp["indoor_day_min"] = 15.8;
//outside temperature
$temp["outside_trend"] = round(-5.973186344238992,1);
if(is_numeric($temp["outside_trend"]) != 1){$temp["outside_trend"] = 0;}
$temp["outside_now"] = $weewxrt[2];
$temp["apptemp"] = $weewxrt[54];
$temp["heatindex"] = $weewxrt[41];
$temp["windchill"] = round($weewxrt[24],1);
$temp["humidex"] = $weewxrt[42];
$temp["outside_24h_max"] = 13.7;
$temp["outside_day_avg_60mn"] = 6.5;
$temp["outside_24h_maxtime"] = date('H:i',1744210415);
$temp["outside_24h_min"] = 1.7;
$temp["outside_24h_mintime"] = date('H:i',1744176610);
$temp["outside_yesterday_max"] = 13.7;
$temp["outside_yesterday_maxtime"] = date('H:i',1744210415);
$temp["outside_yesterday_min"] = 1.7;
$temp["outside_yesterday_mintime"] = date('H:i',1744176610);
$temp["outside_day_avg"] = 8.7;
$temp["outside_day_max"] = 16.5;
$temp["outside_day_maxtime"] = date('H:i',1744303865);
$temp["outside_day_min"] = 2.5;
$temp["outside_day_mintime"] = date('H:i',1744244829);
$temp["outside_month_max"] = 21.8;
$temp["outside_month_maxtime"] = date('D j H:i',1743776297);
$temp["outside_month_min"] = 0.9;
$temp["outside_month_mintime"] = date('D j H:i',1744091700);
$temp["outside_year_max"] = 21.8;
$temp["outside_year_maxtime"] = date('D j M H:i',1743776297);
$temp["outside_year_maxtime2"] = date('M',1743776297);
$temp["outside_year_min"] = -4.6;
$temp["outside_year_mintime"] = date('D j M H:i',1736496720);
$temp["outside_year_mintime2"] = date('M',1736496720);
$temp["outside_alltime_max"] = 38.7;
$temp["outside_alltime_maxtime"] = date('j M Y H:i',1658239200);
$temp["outside_alltime_min"] = -11.5;
$temp["outside_alltime_mintime"] = date('j M Y H:i',1671093000);
//feels like indoors
$Temp = $temp["indoor_now"];
$Humidity = $humid["indoors_now"];
$T = $Temp*9/5+32;
$RH = $Humidity;
$HI = 0;
if($T<=40.0){$HI=$T;}
else {$HI=-42.379+(2.04901523*$T)+(10.14333127*$RH)-(0.22475541*$T*$RH)-(0.00683783*$T*$T)-(0.05481717*$RH*$RH)+(0.00122874*$T*$T*$RH)+(0.00085282*$T*$RH*$RH)-(0.00000199*$T*$T*$RH*$RH);}
if ($RH<13&&$T>=80&&$T<=112){$adjust=((13-$RH)/4)*sqrt(17-abs($T-95)/17);$HI=$HI-$adjust;}
else if ($RH>85&&$T>=80&&$T<=87){$adjust=(($RH-85)/10)*((87-$T)/5);$HI=$HI+$adjust;}
else if ($T<80){$HI=0.5*($T+61.0+(($T-68.0)*1.2)+($RH*0.094));}
$temp["indoor_now_feels"] = number_format($HI, 1);
$temp["indoor_now_feels_degC"] = (number_format($HI, 1)-32)*5/9;

//uv
$uv["now"] = $weewxrt[43];
$uv["day_max"] = 7.0;
$uv["day_maxtime"] = date('H:i',1744283663);
$uv["yesterday_max"] = 4.1;
$uv["yesterday_maxtime"] = date('H:i',1744197301);
$uv["month_max"] = 7.0;
$uv["month_maxtime"] = date('D j H:i',1744283663);
$uv["year_max"] = 7.0;
$uv["year_maxtime"] = date('D j M H:i',1744283663);
$uv["alltime_max"] = 12.4;
$uv["alltime_maxtime"] = date('j M Y H:i',1720350450);

//wind
$wind["units"] = " m/s"; // m/s or mph or km/h or kts
if ($wind["units"] == " m/s")
{
$wind["units"] = "m/s";
}
else if ($wind["units"] == " mph")
{
$wind["units"] = "mph";
}
else if ($wind["units"] == " km/h")
{
$wind["units"] = "km/h";
}
else if ($wind["units"] == " kts")
{
$wind["units"] = "kts";
}
$wind["direction"] = str_pad($weewxrt[7], 3, '0', STR_PAD_LEFT);
$wind["direction_10m_avg"] = "   N/A";
$wind["cardinal"] = $weewxrt[11];    
$wind["speed"] = $weewxrt[6];
$wind["gust"] = $weewxrt[57];
$wind["speed_bft"] = $weewxrt[12];
$wind["speed_max"] = 2.9;
$wind["speed_maxtime"] = date('H:i',1744274700);
$wind["gust_max"] = 6.4;
$wind["gust_maxtime"] = date('H:i',1744285905);
$wind["wind_run"] = $weewxrt[17];
$wind["speed_10m_avg"] = 0.0;
$wind["speed_10m_max"] = 0.0;
$wind["gust_10m_max"] = 0.0;
$wind["speed_yesterday_max"] = 4.6;
$wind["speed_yesterday_maxtime"] = date('H:i',1744206300);
$wind["gust_yesterday_max"] = 9.8;
$wind["gust_yesterday_maxtime"] = date('H:i',1744204782);
$wind["speed_month_max"] = 5.3;
$wind["speed_month_maxtime"] = date('M',1743686400);
$wind["gust_month_max"] = 11.9;
$wind["gust_month_maxtime"] = date('D j M H:i',1743508162);
$wind["speed_year_max"] = 6.0;
$wind["speed_year_maxtime"] = "26/01/25 15:10:00";
$wind["gust_year_max"] = 15.8;
$wind["gust_year_maxtime"] = date('D j M H:i',1740133329);
$wind["speed_alltime_max"] = 17.4;
$wind["speed_alltime_maxtime"] = "23/11/24 06:25:00";
$wind["gust_alltime_max"] = 23.5;
$wind["gust_alltime_maxtime"] = date('D j M Y H:i',1732342879);


//colors

//air density
$colorAirDensity = "#007fff";

//barometer almanac
$colorBarometerCurrent = "#377EF7";
$colorBarometerDayMax = "#377EF7";
$colorBarometerDayMin = "#377EF7";
$colorBarometerYesterdayMax = "#377EF7";
$colorBarometerYesterdayMin = "#377EF7";
$colorBarometerMonthMax = "#377EF7";
$colorBarometerMonthMin = "#E90076";
$colorBarometerYearMax = "#377EF7";
$colorBarometerYearMin = "#FF0000";
$colorBarometerAlltimeMax = "#377EF7";
$colorBarometerAlltimeMin = "#FF0000";
//temperature etc current

if($weewxrt[2]<= -10){$colorOutTemp = "#8781bd";}
else if($weewxrt[2]<=0){$colorOutTemp = "#487ea9";}
else if($weewxrt[2]<=5){$colorOutTemp = "#3b9cac";}
else if($weewxrt[2]<10){$colorOutTemp = "#9aba2f";}
else if($weewxrt[2]<20){$colorOutTemp = "#e6a141";}
else if($weewxrt[2]<25){$colorOutTemp = "#ec5a34";}
else if($weewxrt[2]<30){$colorOutTemp = "#d05f2d";}
else if($weewxrt[2]<35){$colorOutTemp = "#d65b4a";}
else if($weewxrt[2]<40){$colorOutTemp = "#dc4953";}
else if($weewxrt[2]<100){$colorOutTemp = "#e26870";}

if($weewxrt[4]<= -10){$colorDewpoint = "#8781bd";}
else if($weewxrt[4]<=0){$colorDewpoint = "#487ea9";}
else if($weewxrt[4]<=5){$colorDewpoint = "#3b9cac";}
else if($weewxrt[4]<10){$colorDewpoint = "#9aba2f";}
else if($weewxrt[4]<20){$colorDewpoint = "#e6a141";}
else if($weewxrt[4]<25){$colorDewpoint = "#ec5a34";}
else if($weewxrt[4]<30){$colorDewpoint = "#d05f2d";}
else if($weewxrt[4]<35){$colorDewpoint = "#d65b4a";}
else if($weewxrt[4]<40){$colorDewpoint = "#dc4953";}
else if($weewxrt[4]<100){$colorDewpoint = "#e26870";}

if($weewxrt[24]<= -10){$colorWindchill = "#8781bd";}
else if($weewxrt[24]<=0){$colorWindchill = "#487ea9";}
else if($weewxrt[24]<=5){$colorWindchill = "#3b9cac";}
else if($weewxrt[24]<10){$colorWindchill = "#9aba2f";}
else if($weewxrt[24]<20){$colorWindchill = "#e6a141";}
else if($weewxrt[24]<25){$colorWindchill = "#ec5a34";}
else if($weewxrt[24]<30){$colorWindchill = "#d05f2d";}
else if($weewxrt[24]<35){$colorWindchill = "#d65b4a";}
else if($weewxrt[24]<40){$colorWindchill = "#dc4953";}
else if($weewxrt[24]<100){$colorWindchill = "#e26870";}

if($weewxrt[41]<= -10){$colorHeatindex = "#8781bd";}
else if($weewxrt[41]<=0){$colorHeatindex = "#487ea9";}
else if($weewxrt[41]<=5){$colorHeatindex = "#3b9cac";}
else if($weewxrt[41]<10){$colorHeatindex = "#9aba2f";}
else if($weewxrt[41]<20){$colorHeatindex = "#e6a141";}
else if($weewxrt[41]<25){$colorHeatindex = "#ec5a34";}
else if($weewxrt[41]<30){$colorHeatindex = "#d05f2d";}
else if($weewxrt[41]<35){$colorHeatindex = "#d65b4a";}
else if($weewxrt[41]<40){$colorHeatindex = "#dc4953";}
else if($weewxrt[41]<100){$colorHeatindex = "#e26870";}

if($weewxrt[42]<= -10){$colorHumidex = "#8781bd";}
else if($weewxrt[42]<=0){$colorHumidex = "#487ea9";}
else if($weewxrt[42]<=5){$colorHumidex = "#3b9cac";}
else if($weewxrt[42]<10){$colorHumidex = "#9aba2f";}
else if($weewxrt[42]<20){$colorHumidex = "#e6a141";}
else if($weewxrt[42]<25){$colorHumidex = "#ec5a34";}
else if($weewxrt[42]<30){$colorHumidex = "#d05f2d";}
else if($weewxrt[42]<35){$colorHumidex = "#d65b4a";}
else if($weewxrt[42]<40){$colorHumidex = "#dc4953";}
else if($weewxrt[42]<100){$colorHumidex = "#e26870";}

if($weewxrt[54]<= -10){$colorAppTemp = "#8781bd";}
else if($weewxrt[54]<=0){$colorAppTemp = "#487ea9";}
else if($weewxrt[54]<=5){$colorAppTemp = "#3b9cac";}
else if($weewxrt[54]<10){$colorAppTemp = "#9aba2f";}
else if($weewxrt[54]<20){$colorAppTemp = "#e6a141";}
else if($weewxrt[54]<25){$colorAppTemp = "#ec5a34";}
else if($weewxrt[54]<30){$colorAppTemp = "#d05f2d";}
else if($weewxrt[54]<35){$colorAppTemp = "#d65b4a";}
else if($weewxrt[54]<40){$colorAppTemp = "#dc4953";}
else if($weewxrt[54]<100){$colorAppTemp = "#e26870";}

$colorOutTempDayAvg = "#9aba2f";

//humidity
if($humid["now"]<30){$colorOutHumidity="Blue";}
else if($humid["now"]<60){$colorOutHumidity="Green";}
else if($humid["now"]<100){$colorOutHumidity="Red";}

if($humid["day_max"]<30){$colorHumidityDayMax="Blue";}
else if($humid["day_max"]<60){$colorHumidityDayMax="Green";}
else if($humid["day_max"]<100){$colorHumidityDayMax="Red";}
if($humid["day_min"]<30){$colorHumidityDayMin="Blue";}
else if($humid["day_min"]<60){$colorHumidityDayMin="Green";}
else if($humid["day_min"]<100){$colorHumidityDayMin="Red";}

if($humid["yesterday_max"]<30){$colorHumidityYesterdayMax="Blue";}
else if($humid["yesterday_max"]<60){$colorHumidityYesterdayMax="Green";}
else if($humid["yesterday_max"]<100){$colorHumidityYesterdayMax="Red";}
if($humid["yesterday_min"]<30){$colorHumidityYesterdayMin="Blue";}
else if($humid["yesterday_min"]<60){$colorHumidityYesterdayMin="Green";}
else if($humid["yesterday_min"]<100){$colorHumidityYesterdayMin="Red";}

if($humid["month_max"]<30){$colorHumidityMonthMax="Blue";}
else if($humid["month_max"]<60){$colorHumidityMonthMax="Green";}
else if($humid["month_max"]<100){$colorHumidityMonthMax="Red";}
if($humid["month_min"]<30){$colorHumidityMonthMin="Blue";}
else if($humid["month_min"]<60){$colorHumidityMonthMin="Green";}
else if($humid["month_min"]<100){$colorHumidityMonthMin="Red";}

if($humid["year_max"]<30){$colorHumidityYearMax="Blue";}
else if($humid["year_max"]<60){$colorHumidityYearMax="Green";}
else if($humid["year_max"]<100){$colorHumidityYearMax="Red";}
if($humid["year_min"]<30){$colorHumidityYearMin="Blue";}
else if($humid["year_min"]<60){$colorHumidityYearMin="Green";}
else if($humid["year_min"]<100){$colorHumidityYearMin="Red";}

if($humid["alltime_max"]<30){$colorHumidityAlltimeMax="Blue";}
else if($humid["alltime_max"]<60){$colorHumidityAlltimeMax="Green";}
else if($humid["alltime_max"]<100){$colorHumidityAlltimeMax="Red";}
if($humid["alltime_min"]<30){$colorHumidityAlltimeMin="Blue";}
else if($humid["alltime_min"]<60){$colorHumidityAlltimeMin="Green";}
else if($humid["alltime_min"]<100){$colorHumidityAlltimeMin="Red";}

//temperature almanac
//day
$colorOutTempDayMax = "#eba141";
$colorOutTempDayMin = "#369cac";
$colorDewpointDayMax = "#9aba2f";
$colorDewpointDayMin = "#369cac";

//yesterday
$colorOutTempYesterdayMax = "#eba141";
$colorOutTempYesterdayMin = "#369cac";
$colorDewpointYesterdayMax = "#369cac";
$colorDewpointYesterdayMin = "#487ea9";

//month
$colorOutTempMonthMax = "#ec5a34";
$colorOutTempMonthMin = "#369cac";
$colorDewpointMonthMax = "#9aba2f";
$colorDewpointMonthMin = "#487ea9";

//year
$colorOutTempYearMax = "#ec5a34";
$colorOutTempYearMin = "#487ea9";
$colorDewpointYearMax = "#eba141";
$colorDewpointYearMin = "#487ea9";

//alltime
$colorOutTempAlltimeMax = "#dc4953";
$colorOutTempAlltimeMin = "#8781bd";
$colorDewpointAlltimeMax = "#ec5a34";
$colorDewpointAlltimeMin = "#8781bd";

//60min
$color["outTemp_60min_avg"] = "#9aba2f";

//indoors
if($weewxrt[22]<= -10){$colorInTemp = "#8781bd";}
else if($weewxrt[22]<=0){$colorInTemp = "#487ea9";}
else if($weewxrt[22]<=5){$colorInTemp = "#3b9cac";}
else if($weewxrt[22]<10){$colorInTemp = "#9aba2f";}
else if($weewxrt[22]<20){$colorInTemp = "#e6a141";}
else if($weewxrt[22]<25){$colorInTemp = "#ec5a34";}
else if($weewxrt[22]<30){$colorInTemp = "#d05f2d";}
else if($weewxrt[22]<35){$colorInTemp = "#d65b4a";}
else if($weewxrt[22]<40){$colorInTemp = "#dc4953";}
else if($weewxrt[22]<100){$colorInTemp = "#e26870";}


// humidity in
if($humid["indoors_now"]<30){$colorInHumidity="Blue";}
else if($humid["indoors_now"]<60){$colorInHumidity="Green";}
else if($humid["indoors_now"]<100){$colorInHumidity="Red";}

// feels
if($temp["indoor_now_feels_degC"]<= -10){$colorFeels = "#8781bd";}
else if($temp["indoor_now_feels_degC"]<=0){$colorFeels = "#487ea9";}
else if($temp["indoor_now_feels_degC"]<=5){$colorFeels = "#3b9cac";}
else if($temp["indoor_now_feels_degC"]<10){$colorFeels = "#9aba2f";}
else if($temp["indoor_now_feels_degC"]<20){$colorFeels = "#e6a141";}
else if($temp["indoor_now_feels_degC"]<25){$colorFeels = "#ec5a34";}
else if($temp["indoor_now_feels_degC"]<30){$colorFeels = "#d05f2d";}
else if($temp["indoor_now_feels_degC"]<35){$colorFeels = "#d65b4a";}
else if($temp["indoor_now_feels_degC"]<40){$colorFeels = "#dc4953";}
else if($temp["indoor_now_feels_degC"]<100){$colorFeels = "#e26870";}


//wind speed color
if($weewxrt[12] == 0){$color["windSpeed"]="#85a3aa";}
else if($weewxrt[12] == 1){$color["windSpeed"]="#7e98bb";}
else if($weewxrt[12] == 2){$color["windSpeed"]="#6e90d0";}
else if($weewxrt[12] == 3){$color["windSpeed"]="#0f94a7";}
else if($weewxrt[12] == 4){$color["windSpeed"]="#39a239";}
else if($weewxrt[12] == 5){$color["windSpeed"]="#c2863e";}
else if($weewxrt[12] == 6){$color["windSpeed"]="#c8420d";}
else if($weewxrt[12] == 7){$color["windSpeed"]="#d20032";}
else if($weewxrt[12] == 8){$color["windSpeed"]="#af5088";}
else if($weewxrt[12] == 9){$color["windSpeed"]="#754a92";}
else if($weewxrt[12] == 10){$color["windSpeed"]="#45698d";}
else if($weewxrt[12] == 11){$color["windSpeed"]="#c1fc77";}
else if($weewxrt[12] == 12){$color["windSpeed"]="#f1ff6c";}
//wind gust color
if($weewxrt[57] <= 1){$color["windGust"]="#85a3aa";}
else if($weewxrt[57] <= 2){$color["windGust"]="#7e98bb";}
else if($weewxrt[57] <= 3){$color["windGust"]="#6e90d0";}
else if($weewxrt[57] <= 5){$color["windGust"]="#0f94a7";}
else if($weewxrt[57] <= 8){$color["windGust"]="#39a239";}
else if($weewxrt[57] <= 11){$color["windGust"]="#c2863e";}
else if($weewxrt[57] <= 14){$color["windGust"]="#c8420d";}
else if($weewxrt[57] <= 17){$color["windGust"]="#d20032";}
else if($weewxrt[57] <= 21){$color["windGust"]="#af5088";}
else if($weewxrt[57] <= 24){$color["windGust"]="#754a92";}
else if($weewxrt[57] <= 28){$color["windGust"]="#45698d";}
else if($weewxrt[57] <= 32){$color["windGust"]="#c1fc77";}
else if($weewxrt[57] <= 100){$color["windGust"]="#f1ff6c";}
$color["windSpeed_max"] = "#6e90d0";
$color["windGust_max"] = "#39a239";
$color["windSpeed_avg"] = "#7e98bb";
$color["windSpeed_10min_avg"] = "#85a3aa";
$color["windGust_10min_max"] = "#85a3aa";
$color["windSpeed_yesterday_max"] = "#0f94a7";
$color["windGust_yesterday_max"] = "#c2863e";
$color["windSpeed_month_max"] = "#39a239";
$color["windGust_month_max"] = "#c8420d";
$color["windSpeed_year_max"] = "#39a239";
$color["windGust_year_max"] = "#d20032";
$color["windSpeed_alltime_max"] = "#af5088";
$color["windGust_alltime_max"] = "#754a92";

//rain color
$colorStormRain ="#3a3d40";

if($rain["total"] == 0 && $theme == 'dark'){$colorRainDaySum ="#C0C0C0";}
else if($rain["total"] == 0){$colorRainDaySum ="#3A3D40";}
else {$colorRainDaySum = "#3a3d40";}
$colorRainYesterdaySum = "#3a3d40";
$colorRain1hrSum = "#3a3d40";
$colorRain24hrSum = "#3a3d40"; 
$colorRainMonthSum = "#3a3d40";
$colorRainYearSum = "#eba141";
$colorRainAlltimeSum = "#eba141";

if($rain["rate"] == 0 && $theme == 'dark'){$colorRainRate ="#C0C0C0";}
else if($rain["rate"] == 0){$colorRainRate ="#3A3D40";}
else {$colorRainRate = "#3a3d40";}
$colorRainRateDayMax = "#3a3d40";
$colorRainRateYesterdayMax = "#3a3d40";
$colorRainRate24hrMax = "#3a3d40"; 
$colorRainRateMonthMax = "#3a3d40";
$colorRainRateYearMax = "#cf2848";
$colorRainRateAlltimeMax = "#cf2848";


$colorUVCurrent = "grey";
$colorUVDayMax = "#fd8620";
$colorUVYesterdayMax = "#fed42d";
$colorUVMonthMax = "#fd8620";
$colorUVYearMax = "#fd8620";
$colorUVAlltimeMax = "#de257b";

$colorSolarCurrent = "grey";
$colorSolarDayMax = "ffc367";
$colorSolarYesterdayMax = "#ffa242";
$colorSolarMonthMax = "#ffa242";
$colorSolarYearMax = "#ffa242";
$colorSolarAlltimeMax = "grey";

if($solar["lux"] == 0){$colorLuxCurrent='grey';}
else if($solar["lux"] < 16000){$colorLuxCurrent='#89C7E7';}
else if($solar["lux"] < 32000){$colorLuxCurrent='#ADD8E5';}
else if($solar["lux"] < 48000){$colorLuxCurrent='#C4EBF1';}
else if($solar["lux"] < 64000){$colorLuxCurrent='#FFFFC2';}
else if($solar["lux"] < 80000){$colorLuxCurrent='#FFF684';}
else if($solar["lux"] > 80000){$colorLuxCurrent='#FFD301';}

if($solar["day_lux_max"] == 0){$colorLuxDay='grey';}
else if($solar["day_lux_max"] < 16000){$colorLuxDay='#89C7E7';}
else if($solar["day_lux_max"] < 32000){$colorLuxDay='#ADD8E5';}
else if($solar["day_lux_max"] < 48000){$colorLuxDay='#C4EBF1';}
else if($solar["day_lux_max"] < 64000){$colorLuxDay='#FFFFC2';}
else if($solar["day_lux_max"] < 80000){$colorLuxDay='#FFF684';}
else if($solar["day_lux_max"] > 80000){$colorLuxDay='#FFD301';}

//Convert temperatures if necessary
include('dvmUnitConversions.php');
include('dvmMeteorShowers.php');

$firerisk = number_format((((110-1.373*$divum["humidity"])-0.54*(10.20-$divum["temp"]))*(124*pow(10,(-0.0142*$divum["humidity"]))))/60,0);
include('dvmCustomData.php');  
?>