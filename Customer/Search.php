<?php
include("SessionValidator.php");
include("../Assests/Connection/Connection.php");
include("Head.php");


		       
?>


<form id="form1" name="form1" method="post" action="">

<table align="center">
  <tr>
    <td>Work Type</td>
    <td><label for="sel_wt"></label>
      <select name="sel_wt" id="sel_wt" onchange="getSearch()">
       <option value="">---select---</option>
       <?php
			$sel="select * from tbl_worktype";
			$rowW=$con->query($sel);
			while($dataW=$rowW->fetch_assoc())
			{
				?>
                <option value="<?php echo $dataW["worktype_id"]?>"><?php echo $dataW["worktype_name"]?></option>
                <?php
			}
		?>
    </select></td><br/>
   <td>Place</td>
    <td><label for="sel_place"></label>
      <select name="sel_place" id="sel_place" onchange="getSearch()">
       <option value="">---select---</option>
          <?php
			$sel="select * from tbl_place";
			$row=$con->query($sel);
			while($data=$row->fetch_assoc())
			{
				?>
                <option value="<?php echo $data["place_id"]?>"><?php echo $data["place_name"]?></option>
                <?php
			}
		?>
     
      </select></td>
  </tr>
  </table>
  <br /><br /><br />
  <div id="search">
  <table align="center" cellpadding="60">
    <tr>
    <?php
      $sel="select * from tbl_worker w inner join tbl_worktype wt on wt.worktype_id=w.worktype_id inner join tbl_place p on p.place_id=w.place_id where worker_vstatus='1'";
	  $row=$con->query($sel);
	  $i=0;
	  while($data=$row->fetch_assoc())
	  {
		$i++;		  
	
	  ?>
      <td><p style="border:1px solid black;padding:10px;">
      <img src="../Assests/WorkerPhoto/<?php echo $data["worker_photo"]; ?>" height="150px" width="150px";/><br />
      <br />
      <?php echo $data["worker_name"]; ?> <br />
      <?php echo $data["worktype_name"]; ?> <br />
      
       Experience =
      <?php echo $data["worker_experience"]; ?> <br />
      Email : <?php echo $data["worker_email"]; ?> <br />
      <?php echo $data["worker_description"]; ?><br />
      <br />
       <a href="ViewWorkerPreviousWork.php?wid=<?php echo $data["worker_id"]?>">View Previous Works</a><br />
       <br />
       <a href="CustomerFeedback.php?wid=<?php echo $data["worker_id"]?>">View FeedBacks</a><br />
       <br />
       <a href="CustomerWorkRequest.php?wrid=<?php echo $data["worker_id"]?>">Work Request</a>
      </p>
      </td>
      <?php
	  
	  if($i==4)
	  {
		  ?>

		  </tr>
		  <tr>
           <?php
		   $i=0;
	  }}
	  
	  ?>
    </tr>
   
  </table>
  </div>
</form>
<?php
  include("Foot.php");
  ?>
<script src="../Assests/JQuery/jQuery.js"></script>
<script>
function getSearch()
{
	var pid=document.getElementById("sel_place").value;
	var wtid=document.getElementById("sel_wt").value;
	$.ajax({
	url: "../Assests/AjaxPages/AjaxSearchWorker.php?pid="+pid+"&wtid="+wtid,
	  success: function(html){
		$("#search").html(html);
                //alert(html);
	  }
	});
}
</script>