<?php
include("../Modelo/ClsConectar.php");
include("../Modelo/ClsArea.php");

$Area = new ClsArea();
$Areas = $Area->listarAreas();
echo "
<div class='form-group'>
					    <label class='col-sm-4 control-label'>Areas</label>
						    <div class='col-sm-4'><select name='Areas' id='areas'  class='form-control input-large'>";
for($i=0;$i<count($Areas);$i++){
	echo "<option value='".$Areas[$i]["bd_departamento_serial"]."'>".$Areas[$i]["bd_area_detalle"]."</option>";

}
echo "</select>
	</div>
</div>
";