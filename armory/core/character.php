<?php
class Character
{
function displayInfo($guid, $account, $name, $race, $class, $gender, $level, $xp, $money, $playerBytes, $playerBytes2, $playerFlags, $position_x, $position_y, $postion_z, $map, $instance_id, $instance_mode_mask, $orientation, $taximask, $online, $cinematic, $totaltime, $leveltime, $logout_time, $is_logout_resting, $rest_bonus, $resettalents_cost, $resettalents_time, $trans_x, $trans_y, $trans_z, $trans_o, $transguid, $extra_flags, $at_login, $zone, $death_expire_time, $taxi_path, $conquestPoints, $totalHonorPoints, $totalKills, $todayKills, $yesterdayKills, $chosenTitle, $watchedFactin, $drunk, $health, $power1, $power2, $power3, $power4, $power5, $power6, $power7, $power8, $power9, $power10, $latency, $speccount, $activespec, $exploredZones, $equipmentCache, $knownTitles, $actionBars, $currentPetSlot, $petSlotUsed, $grandtableLevels, $talentFree, $deleteInfos_Account, $deleteInfos_Name, $deleteDate)
{
$character = array(
					"guid" => $guid,
					"name" => $name,
					"race" => $race,
					"class" => $class,
					"gender" => $gender,
					"level" => $level,
					"health" => $health,
					"conquest" => $conquestPoints,
					"honor" => $totalHonorPoints,
					"kills" => $totalKills,
					"title" => $chosenTitle,
					"power" => array(
									1 => $power1,
									2 => $power2,
									3 => $power3,
									4 => $power4,
									5 => $power5,
									6 => $power6,
									7 => $power7,
									8 => $power8,
									9 => $power9,
									10 => $power10)
					);
					
									
}
}
?>
