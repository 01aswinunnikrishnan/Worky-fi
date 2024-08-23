<?php
session_start();
include("../Connection/Connection.php");
?>
<table align="center" cellpadding="60">
    <tr>
    <?php
      $sel="select * from tbl_worker w inner join tbl_worktype wt on wt.worktype_id=w.worktype_id inner join tbl_place p on p.place_id=w.place_id where true and worker_vstatus='1'";
	  
	  if($_GET["pid"]!=null)
	  {
		  $sel.=" and p.place_id='".$_GET["pid"]."'";
	  }
	  if($_GET["wtid"]!=null)
	  {
		  $sel.=" and wt.worktype_id='".$_GET["wtid"]."'";
	  }
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