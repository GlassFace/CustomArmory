<?php
	$json = false;
	if(isset($_GET['json']) && $_GET['json'] == "true")
	{
		$json = true;
		header('Content-Type: application/json');		
	}
	else
	{
		echo '
			<html>
				<head>
					<style>
					* {
						background-color: black;
					}
					</style>
				</head>
			</html>
			';
	}
	include_once("./connection/conn.php");
	include_once("./func/stathandler.php");
	if(!isset($_GET['id']))
	{
		echo "No id...";
		die;
	}
	$id = htmlentities($_GET['id']);
	class Item
	{
		private static function MakeStat($id, $count)
		{
			$stat = StatHandler::getStat($id);
			return "<span style=\"color:white\">" . $count . $stat . "</span>";
		}
		private static function calculateItemPrice($cost)
		{
			$copper = $cost;
			$silver = 0;
			$gold = 0;
			while($copper - 100 >= 0)
			{
				$copper -= 100;
				$silver++;
			}
			while($silver - 100 >= 0)
			{
				$silver -= 100;
				$gold++;
			}
			return array("gold" => $gold, "silver" => $silver, "copper" => $copper);
		}
		function displayItem($entry, $class, $subclass, $unk0, $name, $displayid, $Quality, $Flags, $FlagsExtra, $BuyCount, $BuyPrice, $SellPrice, $InventoryType, $AllowableClass, $AllowableRace, $ItemLevel, $RequiredLevel, $RequiredSkill, $RequiedSkillRank, $requiredspell, $requiredhonorrank, $RequiredCityRank, $RequiredReputationFaction, $RequiredReputationRank, $maxcount, $stackable, $ContainerSlots, $stat_type1, $stat_value1, $stat_unk1_1, $stat_unk2_1, $stat_type2, $stat_value2, $stat_unk1_2, $stat_unk2_2, $stat_type3, $stat_value3, $stat_unk1_3, $stat_unk2_3, $stat_type4, $stat_value4, $stat_unk1_4, $stat_unk2_4, $stat_type5, $stat_value5, $stat_unk1_5, $stat_unk2_5, $stat_type6, $stat_value6, $stat_unk1_6, $stat_unk2_6, $stat_type7, $stat_value7, $stat_unk1_7, $stat_unk2_7, $stat_type8, $stat_value9, $stat_unk1_8, $stat_unk2_8, $stat_type9, $stat_value9, $stat_unk1_9, $stat_unk2_9, $stat_type10, $stat_value10, $stat_unk1_10, $stat_unk2_10, $ScalingStatDistribution, $ScalingStatValue, $DamageType, $delay, $RangedModRange, $spell_id1, $spelltrigger_1, $spellcharges_1, $spellppmRate_1, $spellcooldown_1m, $spellcategory_1, $spellcategorycooldown_1, $spellid_2, $spelltrigger_2, $spellcharges_2, $spellppmRate_2, $spellcooldown_2, $spellcategory_2, $spellcategorycooldown_2, $spellid_3, $spelltrigger_3, $spellcharges_3, $spellppmRate_3, $spellcooldown_3, $spellcategory_3, $spellcategorycooldown_3, $spellid_4, $spelltrigger_4, $spellcharges_4, $spellppmRate_4, $spellcooldown_4, $spellcategory_4, $spellcategorycooldown_4, $spellid_5, $spelltrigger_5, $spellcharges_5, $spellppmRate_5, $spellcooldown_5, $spellcategory_5, $spellcategorycooldown_5, $boding, $description, $PageText, $LanguageID, $PageMaterial, $startquest, $lockid, $Material, $sheath, $RandomProperty, $RandomSuffix, $block, $itemset, $MaxDurability, $area, $Map, $BagFamily, $TotemCategory, $socketColor_1, $socketContent_1, $socketColor_2, $socketContent_2, $socketColor_3, $socketContent_3, $socketBonus, $GemProperties, $RequiredDisenchantSkill, $ArmorDamageModifier, $Duration, $ItemLimitCategory, $HolidayId, $ScriptName, $DisenchantId, $FoodType, $minMoneyLoot, $maxMoneyLoot, $StatScalingFactor, $Field130, $Field131, $WDBVerified, $vipLevel)
		{
			if(isset($_GET['json']) || $_GET['json'] == true)
			{
				$array = array();
				$array['name'] = $name;
				if($ItemLevel != 0)
				{
					$array['item_level'] = $ItemLevel;
				}
				if($stat_type1 != 0)
				{
					$array['stat_1'] = self::MakeStat($stat_type1, $stat_value1);
					
				}
				if($stat_type2 != 0)
				{
					$array['stat_2'] = self::MakeStat($stat_type2, $stat_value2);
					
				}
				if($stat_type3 != 0)
				{
					$array['stat_3'] = self::MakeStat($stat_type3, $stat_value3);
				}
				if($stat_type4 != 0)
				{
					$array['stat_4'] = self::MakeStat($stat_type4, $stat_value4);
				}
				if($stat_type5 != 0)
				{
					$array['stat_5'] = self::MakeStat($stat_type5, $stat_value5);
				}
				if(strlen($description) > 0)
				{
					$array['description'] = $description;
				}
				if($stackable > 0)
				{
					$array['stackable'] = $stackable;
				}
				if($SellPrice > 0)
				{
					$array['price'] = $SellPrice;
				}
				$array['displayid'] = $displayid;
				echo json_encode($array, JSON_PRETTY_PRINT);
				die;
			}
			$name = str_replace("|cff", "#", $name);
			/*
				echo "Name: ".$name."<br>";
				echo "Entry: ".$entry."<br>";
				echo "Display: ".$displayid."<br>";
			*/
			$b ="<br>";
			
			$cklr = array(0 => "grey", 1 => "white", 2 => "green", 3 => "blue", 4 => "purple", 5 => "orange", 6 => "red", 7 => "gold");
			$nclr = '<span style="color:'.$cklr[$Quality].'">';
			echo "$nclr $name </span><br>";
			if($ItemLevel != 0)
			{
				echo "<span style=\"color:yellow\">Item Level $ItemLevel </span><br>";
			}
			$array_stats = array(
					1 => array("type" => $stat_type1, "value" => $stat_value1),
					2 => array("type" => $stat_type2, "value" => $stat_value2),
					3 => array("type" => $stat_type3, "value" => $stat_value3),
					4 => array("type" => $stat_type4, "value" => $stat_value4),
					5 => array("type" => $stat_type5, "value" => $stat_value5)
			);
			foreach($array_stats as $key => $value)
			{
				if($value["value"] > 0 && $value['type'] != 0)
				{
					echo self::MakeStat($value["type"], $value["value"]) . "<br>";
				}
			}
			/*
			if($stat_type1 != 0)
			{
				echo self::MakeStat($stat_type1, $stat_value1);
				echo '<br>';
			}
			if($stat_type2 != 0)
			{
				echo self::MakeStat($stat_type2, $stat_value2);
				echo '<br>';
			}
			if($stat_type3 != 0)
			{
				echo self::MakeStat($stat_type3, $stat_value3);
				echo '<br>';
			}
			if($stat_type4 != 0)
			{
				echo self::MakeStat($stat_type4, $stat_value4);
				echo '<br>';
			}
			if($stat_type5 != 0)
			{
				echo self::MakeStat($stat_type5, $stat_value5);
				echo '<br>';
			}
			*/
			if(strlen($description) > 0)
			{
				echo "<span style=\"color: yellow\">".$description."</span><br>";
			}
			if($stackable > 0)
			{
				echo "<span style=\"color:white\">Max Stack: " . $stackable . "</span><br>";
			}
			if($SellPrice > 0)
			{
				$prices = self::calculateItemPrice($SellPrice);
				if($prices["gold"] > 0){
					$gold = $prices["gold"] . '<img src="./img/money-gold.gif" />';
				} else {
					$gold = null;
				}
				if($prices["silver"] > 0){
					$silver = $prices["silver"] . '<img src="./img/money-silver.gif" />';
				} else {
					$silver = null;
				}
				if($prices["copper"] > 0){
					$copper = $prices["copper"] . '<img src="./img/money-copper.gif" />';
				} else {
					$copper = null;
				}
			    echo $color . " Sell Price: " . $gold . $silver . $copper . "</span><br>";  
			}
			echo $displayid;
				echo $b;
			/*
			 * NAME
			 * Item Level %u
			 * BINDING
			 * TYPE			TYPE_
			 * DAMAGE		SPEED
			 * (DPS)
			 * + %u %s
			 * + %u %s
			 * REQ_LEVEL
			 * Sell Price: 46G 61S 41C
			 */	
		}	
	}
	Database::GetItemRAW($id, new Item());
?>
