<?php

function comment($c, $s, $t) {
	echo "<div class='matter'><form action='/forum4/ar.php?c=".$c."&s=".$s."&t=".$t."' method='POST'>
		  <p>Comment: </p>
		  <textarea cols='80' rows='5' id='comment' name='comment'></textarea><br />
		  <input type='submit' value='Add comment' />
		  </form></div>";
}

function getnum_topics($c_id, $s_id) {
	include ('database.php');
	$select = mysqli_query($con, "SELECT numcat, numsubcat FROM headTop WHERE ".$c_id." = numcat 
								  AND ".$s_id." = numsubcat");
	return mysqli_num_rows($select);
}

function repliescount($c, $s, $t) {
	include ('database.php');
	$select = mysqli_query($con, "SELECT numcat, numsubcat, tnum FROM headRep WHERE ".$c." = numcat AND 
								  ".$s." = numsubcat AND ".$t." = tnum");
    $count = mysqli_num_rows($select);
	$update = mysqli_query($con, "UPDATE headTop SET replies = ".$count." WHERE numcat = ".$c." AND
								  numsubcat = ".$s." AND tnum = ".$t."");
	return mysqli_num_rows($select);							  
}

function replyhref($c, $s, $t) {
	echo "<div class = 'repli'><a href='/forum4/ret.php?c=".$c."&s=".$s."&t=".$t."'>Reply to this post</a></div>";
}

function show_cat() {
	include ('database.php');
			
			$select = mysqli_query($con, "SELECT * FROM headCat ORDER BY cnum DESC");
			
				
			while ($row = mysqli_fetch_assoc($select)) {
				echo "<table class='table_C'>";
				echo "<tr><td class='category_M' colspan='2'>".$row['ctitle']."</td></tr>";
				showsub_cat($row['cnum']);
				echo "</table>";
				
			}
}

function showcat() {
include ('database.php');
		
		$select = mysqli_query($con, "SELECT * FROM headCat ORDER BY cnum DESC");
		
			
		while ($row = mysqli_fetch_assoc($select)) {
			echo "<table class='table_C'>";
			echo "<tr><td class='category_M' colspan='2'><a href = './ns.php?c=".$row['cnum']."'>".$row['ctitle']."</a></td></tr>";
			showsubcat($row['cnum']);
			echo "</table>";
			
		}
}		

function showsub_cat($pid) {
	include ('database.php');        // since we linked headCat and headSubcat table we are able to use both
	$select = mysqli_query($con, "SELECT cnum, snum, stitle, sdesc FROM headCat, headSubcat 
								  WHERE (  headCat.cnum  = '".$pid."') AND ( headSubcat.pid  = '".$pid."') ORDER BY snum DESC ");
	echo "<tr><th width='90%'>Subcategories</th><th width='10%'>Topics</th></tr>";
	while ($row = mysqli_fetch_assoc($select)) {
		echo "<tr><td class='theme_C'>
			  ".$row['stitle']."<br />";
		echo "<span style='font-size:12px'>".$row['sdesc']."</span></td>";
		echo "<td class='topics_N'><br /><br />".getnum_topics($pid, $row['snum'])."<br /><br /></td></tr>";
	}
	
}
	
	function showsubcat($pid) {
		include ('database.php');        // since we linked headCat and headSubcat table we are able to use both
		$select = mysqli_query($con, "SELECT cnum, snum, stitle, sdesc FROM headCat, headSubcat 
									  WHERE (  headCat.cnum  = '".$pid."') AND ( headSubcat.pid  = '".$pid."') ORDER BY snum DESC ");
		echo "<tr><th width='90%'>Subcategories</th><th width='10%'>Topics</th></tr>";
		while ($row = mysqli_fetch_assoc($select)) {
			echo "<tr><td class='theme_C'><a href='/forum4/ts.php?c=".$row['cnum']."&s=".$row['snum']."'>
				  ".$row['stitle']."<br />";
		    echo "<span style='font-size:12px'>".$row['sdesc']."</span></td>";
			echo "<td class='topics_N'><br /><br />".topicscount($pid, $row['snum'])."<br /><br /></td></tr>";
		}
		
}

function showreplies($c, $s, $t) {
	include ('database.php');
	$select = mysqli_query($con, "SELECT headRep.writer, reply, headRep.date FROM headCat, headSubcat, 
								  headTop, headRep WHERE ($c = headRep.numcat) AND ($s = headRep.numsubcat)
								  AND ($t = headRep.tnum) AND ($c = headCat.cnum) AND 
								  ($s = headSubcat.snum) AND ($t = headTop.tnum) ORDER BY rnum DESC");
	if (mysqli_num_rows($select) != 0) {
		echo "<div class='matter'><table class='table_R'>";
		while ($row = mysqli_fetch_assoc($select)) {
			echo nl2br("<tr><th width='15%'>".$row['writer']."</th><td>".$row['date']."\n".$row['reply']."\n\n</td></tr>");
		}
		echo "</table></div>";
	}
	
}

function showtopics($c, $s) {
	include ('database.php');
	$select = mysqli_query($con, "SELECT tnum, writer, theme, date, visits, replies FROM headCat, headSubcat, headTop 
								  WHERE ($c = headTop.numcat) AND ($s = headTop.numsubcat) AND ($c = headCat.cnum)
								  AND ($s = headSubcat.snum) ORDER BY tnum DESC;"); //done to show the latest topic first
	if (mysqli_num_rows($select) != 0) {
		echo "<table class='table_T'>";
		echo "<tr><th>Title</th><th>Posted By</th><th>Date Posted</th><th>Views</th><th>Replies</th></tr>";
		while ($row = mysqli_fetch_assoc($select)) {
			echo "<tr><td><a href='/forum4/rt.php?c=".$c."&s=".$s."&t=".$row['tnum']."'>
				 ".$row['theme']."</a></td><td>".$row['writer']."</td><td>".$row['date']."</td><td>".$row['visits']."</td>
				 <td>".$row['replies']."</td></tr>";
		}
		echo "</table>";
	} 
}
	
	

function showtopiceach($c, $s, $t) {
	include ('database.php');
	$select = mysqli_query($con, "SELECT cnum, snum, tnum, writer, theme, matter, date FROM 
								  headCat, headSubcat, headTop WHERE ($c = headCat.cnum) AND
								  ($s = headSubcat.snum) AND ($t = headTop.tnum)");
	$row = mysqli_fetch_assoc($select);
	echo nl2br("<div class='matter'><h2 class='theme'>".$row['theme']."</h2><p>".$row['writer']."\n".$row['date']."</p></div>");
	echo "<div class='matter'><p>".$row['matter']."</p></div>";
}

function topicscount($c_id, $s_id) {
	include ('database.php');
	$select = mysqli_query($con, "SELECT numcat, numsubcat FROM headTop WHERE ".$c_id." = numcat 
								  AND ".$s_id." = numsubcat");
	return mysqli_num_rows($select);
}
	
	
	
function visitcount($c, $s, $t) {
	include ('database.php');
	$update = mysqli_query($con, "UPDATE headTop SET visits = visits + 1 WHERE numcat = ".$c." AND
									numsubcat = ".$s." AND tnum = ".$t."");
}
	
	
	
	




								  
?>