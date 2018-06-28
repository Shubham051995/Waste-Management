<?php
include_once("db/config.php");
$query = "SELECT * FROM tbl_pages";
$result = $con->query($query);
$parent_1 = '';
$parent_2 = '';
$parent_3 = '';

while($row = mysqli_fetch_array($result)){
	$parent_id = $row["int_parent"];
	$page_id = $row["page_id"];
	$page_name = $row["page_name"];
	
	if($parent_id == 1){
		$parent_1 .=" <li class='submenu-item'><a href='submenu.php?p_id=$page_id'>$page_name</a></li>";
	}
	else if($parent_id == 2){
		$parent_2 .=" <li class='submenu-item'><a href='submenu.php?p_id=$page_id'>$page_name</a></li>";
	}
	else{
		$parent_3 .=" <li class='submenu-item'><a href='submenu.php?p_id=$page_id'>$page_name</a></li>";
	}
}
		$response='
			<nav id="nav">
				<ul>
				  <li><a href="index.php">Home</a></li>
				  <li> <a href="sources_of_waste.php"><span>Sources of Waste</span></a>
					<ul class="submenu">
					  '.$parent_1.'
					</ul>
				  </li>
				  <li><a href="hazards_of_waste.php">Hazards of Waste</a>
					<ul class="submenu">
					 '.$parent_2.'
					</ul>
				  </li>
				  <li><a href="management_of_waste.php">Management of Waste</a>
					<ul class="submenu">
					 '.$parent_3.'
					</ul>
				  </li>  
				  <li><a href="importance_of_waste_management.php">Importance of Waste Management</a></li>
				</ul>
			</nav>';
		
		echo $response;
		
?>