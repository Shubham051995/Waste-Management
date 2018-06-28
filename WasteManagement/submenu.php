<?php 
	include_once("db/config.php");
	$page_title = '';
	$page_content = '';
	if(isset($_REQUEST["p_id"])){
		$page_id = $_REQUEST["p_id"];
		$query = "SELECT t1.page_name,t2.* FROM tbl_pages t1 INNER JOIN tbl_content t2 ON t1.page_id = $page_id and t1.page_id = t2.page_id";
		$result = $con->query($query);
		$row = mysqli_fetch_array($result);
		if($row != false){
			
			$page_title = $row["page_name"];
			$page_content = mysqli_real_escape_string($con,$row["content"]);
			//$page_content = $row["content"];
		}
	}
	else{
		//header("location:index.php");
	}
	
?>
<!DOCTYPE HTML>
<html>
<head>
<title><?php echo ucwords($page_title); ?></title>
<?php include_once("files/script.php"); ?>
</head>
<body class="no-sidebar">
<div id="header">
  <div class="inner">
    <header>
      <h1><a href="index.php" id="logo">Waste Management</a></h1>
    </header>
  </div>
  <?php include_once("files/header.php"); ?>
</div>
<div class="wrapper style1">
  <div class="container">
    <div class="row">
      <div class="12u skel-cell-mainContent" id="content">
        <article id="main" class="special">
          <header>
            <h2><?php echo ucwords($page_title); ?></h2>
            <span class="byline"> The developing world tends to rely on informal waste pickers, who comprise five percent of urban jobs in developing economies. </span> </header>
          <a href="#" class="image featured"><img src="images/pic35.jpg" alt=""></a>
           <p><?php echo $page_content; ?></p>	
		 
      </div>
    </div>
   
  </div>
</div>
<div id="footer">
  <?php include_once("files/footer.php"); ?>
</div>
</body>
</html>