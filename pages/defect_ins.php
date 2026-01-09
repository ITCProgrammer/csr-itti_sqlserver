<?php
session_start();
include("../koneksi.php");  
$modal_id=$_GET['id'];  
?>
         
<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Defect Inspection</h4><br>
                </div>
                <div class="modal-body">
                    <h5>No Element : <strong><em><?php echo $modal_id;?></em></strong></h5>
                    <table id="example" class="table table-bordered table-hover table-striped" border="0" width="100%">
                        <thead>
                            <tr>
                                <th align="center" width="5%">No</th>
                                <th align="center" width="10%">Code</th>
                                <th align="center" width="35%">Description</th>
                                <th align="center" width="10%">Start</th>
                                <th align="center" width="10%">Length</th>
                                <th align="center" width="8%">Width</th>
                                <th align="center" width="8%">Credit</th>
                                <th align="center" width="8%">Poins</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $sqldef="SELECT ELEMENTSINSPECTIONEVENT.ELEMENTSINSPECTIONELEMENTCODE,
                            ELEMENTSINSPECTIONEVENT.CODEEVENTCODE,
                            INSPECTIONEVENTTEMPLATE.LONGDESCRIPTION AS DESC_DEF,
                            ELEMENTSINSPECTIONEVENT.STARTPOSITION,
                            ELEMENTSINSPECTIONEVENT.LENGHT,
                            ELEMENTSINSPECTIONEVENT.WIDTH,
                            ELEMENTSINSPECTIONEVENT.WIDTHPOSITION,
                            ELEMENTSINSPECTIONEVENT.CREDITS,
                            ELEMENTSINSPECTIONEVENT.POINTS 
                            FROM ELEMENTSINSPECTIONEVENT ELEMENTSINSPECTIONEVENT 
                            LEFT JOIN INSPECTIONEVENTTEMPLATE INSPECTIONEVENTTEMPLATE
                            ON ELEMENTSINSPECTIONEVENT.CODEEVENTCODE = INSPECTIONEVENTTEMPLATE.EVENTCODE 
                            WHERE ELEMENTSINSPECTIONELEMENTCODE ='$modal_id'";
                            $stmt=db2_exec($conn1,$sqldef, array('cursor'=>DB2_SCROLLABLE));
                            $no=1;
                            while($row = db2_fetch_assoc($stmt)){
                        ?>
                        <tr >
                            <td><?php echo $no;?></td>
                            <td align="center"><?php echo $row['CODEEVENTCODE'];?></td>
                            <td align="center"><?php echo $row['DESC_DEF'];?></td>
                            <td align="center"><?php echo $row['STARTPOSITION'];?></td>
                            <td align="center"><?php echo $row['LENGHT'];?></td>
                            <td align="center"><?php echo $row['WIDTH'];?></td>
                            <td align="center"><?php echo $row['CREDITS'];?></td>
                            <td align="center"><?php echo $row['POINTS'];?></td>
                            <td></td>
                        </tr>  
                        <?php	$no++;  } ?>
                        </tbody>
                    </table>
		        </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
            <!-- /.modal-content -->
</div>
          <!-- /.modal-dialog -->