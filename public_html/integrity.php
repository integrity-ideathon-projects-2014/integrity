<?php

include_once('../lib/core/init.inc.php');
$id = $_COOKIE['user'];
$db = new Database; 
$sql = "SELECT * FROM users WHERE users.user_id='".$id."'";
//echo $sql;
$db->sql($sql);
$res = $db->results;
$r = array_pop($res);



?>


<link rel="stylesheet" href="css/popcorn.image.css">
<script src="js/popcorn-complete.min.js"></script>
<script src="js/jquery-min.2.0.3.js"></script>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/main.css">

        <script>
       </script>

<?//php echo $r['name']; ?>
		<div id="video-container">

<div class="easyhtml5video" style="position:relative;max-width:640px;margin:0 auto;">
	<video controls="controls"  autoplay="autoplay" poster="html5video/integrity.jpg" style="width:100%" title="640" id="ourvideo">
		<source src="html5video/integrity.m4v" type="video/mp4" />
		<source src="html5video/integrity.webm" type="video/webm" />
		<source src="html5video/integrity.ogv" type="video/ogg" />
	</video>
</div>
</div>
<div id="footnote">
<form name="ajaxform" id="ajaxform" action="post.php" method="POST">

<div id="button">
    <select  id="ethic_id"style="margin:0 auto;" >
    <option value=1>Abuse of Authority</option>
<option value=2>Abuse of Public Assets</option>
<option value=3>Abusive Behavior</option>
<option value=4>Administrative Corruption</option>
<option value=5>Behavior or language unbecoming of a public officeholder</option>
<option value=6>Conflict of Interest</option>
<option value=7>Corruption</option>
<option value=8>Crony-ism (favoritism for colleagues/friends)</option>
<option value=9>Double invoicing / dipping</option>
<option value=10>Embezzlement</option>
<option value=11>Extortion</option>
<option value=12>Facilitation Payment</option>
<option value=13>Failure to apply proper due process</option>
<option value=14>Failure to protect a whistle blower</option>
<option value=15>Failure to provide information</option>
<option value=16>Failure to report (a violation)</option>
<option value=17>Favoritism</option>
<option value=18>Fiduciary failure</option>
<option value=19>Financial Fraud</option>
<option value=20>Fraudulent Record-Keeping</option>
<option value=21>Fraudulent Reporting</option>
<option value=22>Ghost Worker</option>
<option value=23>Inadequate Oversight</option>
<option value=24>Interest Peddling</option>
<option value=25>Jumping the queue</option>
<option value=26>Kickbacks</option>
<option value=27>Lack of professionalism</option>
<option value=28>Living beyond ones means</option>
<option value=29>Nepotism</option>
<option value=30>Patronage</option>
<option value=31>Political Corruption</option>
<option value=32>Rigged Bit</option>
<option value=33>Shooting the Messenger</option>
<option value=34>Time Stealing</option>
<option value=35>Trading Influence</option>
<option value=36>Violation of Rule</option>
<option value=37>Vote Buying</option>
<option value=38>Access to Information</option>
<option value=39>Accountability</option>
<option value=40>Courtesy or Helpfulness</option>
<option value=41>Due Process</option>
<option value=42>Going beyond the call of duty</option>
<option value=43>Good Record-Keeping</option>
<option value=44>Merit based Selection/Promotion</option>
<option value=45>Openness / Transparency</option>
<option value=46>Professionalism</option>
<option value=47>Professional Integrity</option>
<option value=48>Questioning Authority</option>
<option value=49>Reporting a Violation</option>
<option value=50>Whistle-blowing</option>
</select>
<input type="hidden" value="<?php echo $id; ?>" id="id">
    <input type="button" name="yes" id="yes" onclick="submitAns(1)" style="border:0;"/> <input type="button"style="border:0;" name="no" id="no" onclick="submitAns(0)"/> 
</div>
</form>

<script>
function submitAns(ans){
	var popcorn = Popcorn( "#ourvideo" );
	var time = popcorn.currentTime();
	var data = 'test_id=1&user_id='+$('#id').val()+'&video_id=1&integrity_type='+ans+'&time='+time+'&ethic_id='+$('#ethic_id').val();
    

	$.ajax(
	{
		url : "post.php",
		type: "POST",
		data : data,
		success:function(data, textStatus, jqXHR) 
		{
			console.log(data);
		},
		error: function(jqXHR, textStatus, errorThrown) 
		{

		}
	});
}



</script>

