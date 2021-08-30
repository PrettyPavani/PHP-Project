<?php                                
	$catSql = "SELECT * FROM `categories`";
	
	$catResult = mysqli_query($conn, $catSql);
	while($row = mysqli_fetch_assoc($catResult)){
		$categoryId = $row['id'];
		$categoryName = $row['name'];
		echo '<option value="' .$categoryId. '">' .$categoryName. '</option>';
	}								