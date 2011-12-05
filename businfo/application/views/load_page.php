<?php
	$id=  $_GET[count_to]; 
	echo $id;
	?>

<script type="text/javascript">

	function invo(i)
	{
		sum(i);
		alert (i);
	}



	function sum(id)
	{	id= id + 1;
	}
</script>
Page has been succesfully changed [<?php echo $id; ?>]
<br /><br />
<!-- <a href="#" onclick="makeRequest_2('http://localhost/businfo/application/views/load_page.php?count_to=<?php echo rand(0,10); ?>','change_div','loading...','error page not loaded message');">change div</a>
-->
<a href="#" onclick="invo(<?php echo $id;?>);">change div</a>