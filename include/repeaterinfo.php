  <div class="panel panel-default">
  <!-- Standard-Panel-Inhalt -->
  <div class="panel-heading">Repeater Info</div>
  
  <!-- Tabelle -->
  <div class="table-responsive">  
  <table class="table">
    <tr>
      <th>Current Mode</th>
      <th>D-Star linked to</th>
      <th>DMR TS1 last linked to</th>
      <th>DMR TS2 last linked to</th>
    </tr>
<?php
	echo"<tr>";
	echo"<td>".getActualMode($lastHeard, $mmdvmconfigs)."</td>";
	echo"<td>".getActualLink($reverseLogLinesMMDVM, "D-Star")."</td>";
	echo"<td>".getActualLink($reverseLogLinesMMDVM, "DMR Slot 1")."</td>";
	echo"<td>".getActualLink($reverseLogLinesMMDVM, "DMR Slot 2")."/". getActualReflector($reverseLogLinesMMDVM, "DMR Slot 2") ."</td>";
	echo"</tr>\n";
?>
    <tr>
      <td colspan="4">
        <table class="table">
          <tr>
            <th>Location</th>
            <th>Input</th>
            <th>Output</th>
<?php
	if (getEnabled("System Fusion Network", $mmdvmconfigs) == 1) {
?>
            <th>YSFGateway</th>
<?php
	}
	if (getEnabled("DMR", $mmdvmconfigs) == 1) {
?>
            <th>DMR CC</th>
<?php
		if (getEnabled("DMR Network", $mmdvmconfigs) == 1) {
?>
            <th>DMR-Master</th>
	        <th>TS1</th>
            <th>TS2</th>
<?php
		}
	} 
?>
          </tr>
<?php
	echo"<tr>";
	echo"<td>".getConfigItem("Info", "Location", $mmdvmconfigs)."</td>";
	echo"<td>".getMHZ(getConfigItem("Info", "TXFrequency", $mmdvmconfigs))."</td>";
	echo"<td>".getMHZ(getConfigItem("Info", "RXFrequency", $mmdvmconfigs))."</td>";
	if (getEnabled("System Fusion Network", $mmdvmconfigs) == 1) {
		echo"<td>".getConfigItem("System Fusion Network", "GwyAddress", $mmdvmconfigs)."</td>";
	}
	if (getEnabled("DMR", $mmdvmconfigs) == 1) {
		echo"<td>".getConfigItem("DMR", "ColorCode", $mmdvmconfigs)."</td>";
		if (getEnabled("DMR Network", $mmdvmconfigs) == 1) {
			echo"<td>".getConfigItem("DMR Network", "Address", $mmdvmconfigs)."</td>";
?>
            <td><span class="label <?php 
			if (getConfigItem("DMR Network", "Slot1", $mmdvmconfigs) == 1) {
		    	echo 'label-success">enabled';      
			} else {
		    	echo 'label-default">disabled';
		    }
    ?></span></td>
            <td><span class="label <?php 
			if (getConfigItem("DMR Network", "Slot2", $mmdvmconfigs) == 1) {
		    	echo 'label-success">enabled';      
			} else {
		    	echo 'label-default">disabled';
		    }
    ?></span></td>
<?php
		}
	}
?>
		  </tr>
        </table>
      </td>
    </tr>
  </table>
  </div>
</div>
