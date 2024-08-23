<?php
		include("../Connection/Connection.php");
		$selD="select * from tbl_place where district_id='".$_GET["pid"]."'";
		$rowD=$con->query($selD);
		while($dataD=$rowD->fetch_assoc())
		{
			?>
            <option value="<?php echo $dataD["place_id"]?>"><?php echo $dataD["place_name"]?></option>
            <?php
		}
		?>