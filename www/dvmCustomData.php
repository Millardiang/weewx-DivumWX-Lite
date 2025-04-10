<?php

//piezo rain gauge
$p_rain["rate"] = round($weewxrt[59],2);
$p_rain["dayRain"] = round($weewxrt[60],2);
$p_rain["total"] = 0.0;
$p_rain["last_hour"] = 0.00;
$p_rain["last_10min"] = 0.00;
$p_rain["last_24hour"] = 0.00;
$p_rain["24h_rate_max"] = 0.00;
$p_rain["24h_rate_maxtime"] = 1744153204;
$p_rain["yesterday_rate_max"] = 0.00;
$p_rain["yesterday_rate_maxtime"] = 1744153204;
$p_rain["yesterday"] = 0.00;
$p_rain["24h_total"] = 0.00;
$p_rain["day_rate_max"] = 0.00;
$p_rain["day_rate_maxtime"] = 1744239601;
$p_rain["day_total"] = 0.00;
$p_rain["month_rate_max"] = 0.00;
$p_rain["monthRain"] = 0.00;
$p_rain["month_rate_maxtime"] = 1743462005;
$p_rain["month_total"] = 0.00;
$p_rain["year_rate_max"] = 36.60;
$p_rain["year_rate_maxtime"] = 1742668672;
$p_rain["year_total"] = 274.40;
$p_rain["yearRain"] = 274.40;
$p_rain["alltime_rate_max"] = 97.87;
$p_rain["alltime_rate_maxtime"] = 1686499800;
$p_rain["alltime_total"] = 4345;
$p_rainStorm = 0.00;
if(is_numeric($p_rainStorm) != 1){$p_rain["storm_rain"] = 0;}
else{$p_rain["storm_rain"] = $p_rainStorm;}
if($p_rain["storm_rain"] > 0 ){$p_rain["storm_rain_start"] = date('D j M H:i',($TS)-(0));}
$p_rain["last_rain"] = date('D j M H:i',1743149400);
if($weewxrt[59] < 2.5){$p_rain["intensity"]="Slight";}
else if($weewxrt[59] < 10){$p_rain["intensity"]="Moderate";}
else if($weewxrt[59] < 50){$p_rain["intensity"]="Heavy";}
else if($weewxrt[59] >= 50){$p_rain["intensity"]="Violent";}

//data for solar energy module
$battery["power"] = 216;
$battery["soc"] = 80;
$grid["power"] = 0;
$load["power"] = 0;
$load["total_power"] = 205;
$load["total_ups_power"] = 0;
$solar["power"] = 84;
$battery["daily_charge"] = 0;
$battery["daily_discharge"] = 0;
$solar["daily_export"] = 11.50;
$grid["daily_import"] = 0;
$load["daily_energy"] = 0;
$solar["daily_energy"] = 16.50;

include("customSettings.php");
?>