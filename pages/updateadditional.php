<?php
$sqlData  = db2_exec($conn1, "SELECT x.* FROM DB2ADMIN.ELEMENTSINSPECTION x
WHERE LENGTH(TRIM(x.ELEMENTCODE)) > 11 AND ELEMENTITEMTYPECODE ='KFF' AND x.DEMANDCODE ='$_POST[demandno]'");
$no=1;
  while ($r= db2_fetch_assoc($sqlData)) {
  if($_POST['cek'][$no]==$r['ABSUNIQUEID']){	
		if($_POST['disdefect']!=""){	
		//Query Delete dari Adstorage	
		$queryD = "DELETE FROM ADSTORAGE 
		WHERE UNIQUEID='".$r['ABSUNIQUEID']."' AND NAMEENTITYNAME='ElementsInspection' AND NAMENAME='DisposisiDefect' AND FIELDNAME='DisposisiDefectCode'";
		// Menyiapkan statement
		$stmtD = db2_prepare($conn1, $queryD);
		// Eksekusi statement
		$resultD = db2_execute($stmtD);	
		// Query untuk memasukkan data ke dalam tabel
		$query = "INSERT INTO ADSTORAGE (UNIQUEID,NAMEENTITYNAME,NAMENAME,FIELDNAME,
		KEYSEQUENCE,SHARED,DATATYPE,VALUESTRING,VALUEINT,VALUEBOOLEAN,
		VALUEDATE,VALUEDECIMAL,VALUELONG,VALUETIME,VALUETIMESTAMP,ABSUNIQUEID)
		VALUES ('".$r['ABSUNIQUEID']."',
			'ElementsInspection                                ',
			'DisposisiDefect                                   ',
			'DisposisiDefectCode',
			'1',
			'0',
			'0',
			'".$_POST['disdefect']."',
			'0',
			'0',
			NULL,
			NULL,
			'0',
			NULL,
			NULL,
			'0')";

		// Menyiapkan statement
		$stmt = db2_prepare($conn1, $query);
		// Eksekusi statement
		$result = db2_execute($stmt); 
		}
	  if($_POST['defect']!=""){
	    //Query Delete dari Adstorage	
		$queryD = "DELETE FROM ADSTORAGE 
		WHERE UNIQUEID='".$r['ABSUNIQUEID']."' AND NAMEENTITYNAME='ElementsInspection' AND NAMENAME='Defect' AND FIELDNAME='DefectCode'";
		// Menyiapkan statement
		$stmtD = db2_prepare($conn1, $queryD);
		// Eksekusi statement
		$resultD = db2_execute($stmtD);		  
	// Query untuk memasukkan data ke dalam tabel
		$query = "INSERT INTO ADSTORAGE (UNIQUEID,NAMEENTITYNAME,NAMENAME,FIELDNAME,
		KEYSEQUENCE,SHARED,DATATYPE,VALUESTRING,VALUEINT,VALUEBOOLEAN,
		VALUEDATE,VALUEDECIMAL,VALUELONG,VALUETIME,VALUETIMESTAMP,ABSUNIQUEID)
		VALUES ('".$r['ABSUNIQUEID']."',
			'ElementsInspection                                ',
			'Defect                                            ',
			'DefectCode',
			'1',
			'0',
			'0',
			'".$_POST['defect']."',
			'0',
			'0',
			NULL,
			NULL,
			'0',
			NULL,
			NULL,
			'0')";

		// Menyiapkan statement
		$stmt = db2_prepare($conn1, $query);
		// Eksekusi statement
		$result = db2_execute($stmt);	  
	  }
	  if($_POST['cuttingloss']!=""){
	  //Query Delete dari Adstorage	
		$queryD = "DELETE FROM ADSTORAGE 
		WHERE UNIQUEID='".$r['ABSUNIQUEID']."' AND NAMEENTITYNAME='ElementsInspection' 
		AND NAMENAME='CuttingLoss' AND FIELDNAME='CuttingLossCode'";
		// Menyiapkan statement
		$stmtD = db2_prepare($conn1, $queryD);
		// Eksekusi statement
		$resultD = db2_execute($stmtD);		  
	// Query untuk memasukkan data ke dalam tabel
		$query = "INSERT INTO ADSTORAGE (UNIQUEID,NAMEENTITYNAME,NAMENAME,FIELDNAME,
		KEYSEQUENCE,SHARED,DATATYPE,VALUESTRING,VALUEINT,VALUEBOOLEAN,
		VALUEDATE,VALUEDECIMAL,VALUELONG,VALUETIME,VALUETIMESTAMP,ABSUNIQUEID)
		VALUES ('".$r['ABSUNIQUEID']."',
			'ElementsInspection                                ',
			'CuttingLoss                                       ',
			'CuttingLossCode',
			'1',
			'0',
			'0',
			'".$_POST['cuttingloss']."',
			'0',
			'0',
			NULL,
			NULL,
			'0',
			NULL,
			NULL,
			'0')";

		// Menyiapkan statement
		$stmt = db2_prepare($conn1, $query);
		// Eksekusi statement
		$result = db2_execute($stmt); 
	  }
	  if($_POST['penanggungjawab']!=""){
	  //Query Delete dari Adstorage	
		$queryD = "DELETE FROM ADSTORAGE 
		WHERE UNIQUEID='".$r['ABSUNIQUEID']."' AND NAMEENTITYNAME='ElementsInspection' 
		AND NAMENAME='PenanggungJawab' AND FIELDNAME='PenanggungJawabCode'";
		// Menyiapkan statement
		$stmtD = db2_prepare($conn1, $queryD);
		// Eksekusi statement
		$resultD = db2_execute($stmtD);		  
	// Query untuk memasukkan data ke dalam tabel
		$query = "INSERT INTO ADSTORAGE (UNIQUEID,NAMEENTITYNAME,NAMENAME,FIELDNAME,
		KEYSEQUENCE,SHARED,DATATYPE,VALUESTRING,VALUEINT,VALUEBOOLEAN,
		VALUEDATE,VALUEDECIMAL,VALUELONG,VALUETIME,VALUETIMESTAMP,ABSUNIQUEID)
		VALUES ('".$r['ABSUNIQUEID']."',
			'ElementsInspection                                ',
			'PenanggungJawab                                   ',
			'PenanggungJawabCode',
			'1',
			'0',
			'0',
			'".$_POST['penanggungjawab']."',
			'0',
			'0',
			NULL,
			NULL,
			'0',
			NULL,
			NULL,
			'0')";

		// Menyiapkan statement
		$stmt = db2_prepare($conn1, $query);
		// Eksekusi statement
		$result = db2_execute($stmt);	  
	  }
	 
	}
      $no++;
  }
db2_close($conn1);
if($result){
		    // echo "<script>alert('Data Telah DiUbah');</script>";
			// echo "<script>swal('Data Telah DiUbah!', 'You clicked the button!', 'success');</script>";
			// echo "<script>window.location.href='?p=Input-Data';</script>";
			echo "<script>swal({
  title: 'Data Telah DiUbah',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
    
	 window.location.href='InputAddNOW-$_POST[demandno]'; 
  }
});</script>";
			
		}
?>
