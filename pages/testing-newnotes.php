<!--27 September 10:35-->
<style>
	input[type="number"]::-webkit-outer-spin-button,
	input[type="number"]::-webkit-inner-spin-button {
		-webkit-appearance: none;
		margin: 0;
	}

	input[type="number"] {
		-moz-appearance: textfield;
	}
</style>
<style>
	.sc {
		border-collapse: collapse;
		width: 100%;
	}

	.sc,
	.sc th,
	.sc td {
		border: 1px solid #fff;
		text-align: left;
		padding: 2px
	}
</style>
<script>

	function roundToTwo(num) {
		return +(Math.round(num + "e+2") + "e-2");
	}

	function hitung() {
		var cott = document.forms['form1']['fc_cott'].value;
		var poly = document.forms['form1']['fc_poly'].value;
		var elastane = document.forms['form1']['fc_ela'].value;
		var total;
		if (cott > 0) { cott = document.forms['form1']['fc_cott'].value; } else { cott = 0; }
		if (poly > 0) { poly = document.forms['form1']['fc_poly'].value; } else { poly = 0; }
		if (elastane > 0) { elastane = document.forms['form1']['fc_ela'].value; } else { elastane = 0; }
		total = roundToTwo((parseFloat(cott) + parseFloat(poly) + parseFloat(elastane))).toFixed(2);
		document.forms['form1']['fc_total'].value = total;
	}

	function hitungdis() {
		var dcott = document.forms['form1']['dfc_cott'].value;
		var dpoly = document.forms['form1']['dfc_poly'].value;
		var delastane = document.forms['form1']['dfc_ela'].value;
		var dtotal;
		if (dcott > 0) { dcott = document.forms['form1']['dfc_cott'].value; } else { dcott = 0; }
		if (dpoly > 0) { dpoly = document.forms['form1']['dfc_poly'].value; } else { dpoly = 0; }
		if (delastane > 0) { delastane = document.forms['form1']['dfc_ela'].value; } else { delastane = 0; }
		dtotal = roundToTwo((parseFloat(dcott) + parseFloat(dpoly) + parseFloat(delastane))).toFixed(2);
		document.forms['form1']['dfc_total'].value = dtotal;
	}

</script>
<script>
	function tampil() {
		if (document.forms['form1']['jns_test'].value == "FLAMMABILITY") {
			if (document.forms['form1']['stat_fla'].value == "RANDOM") {
				$("#ranfla").css("display", "");  // To unhide
			} else {
				$("#ranfla").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_fla'].value == "DISPOSISI") {
				$("#disfla").css("display", "");  // To unhide
			} else {
				$("#disfla").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_fla'].value == "MARGINAL PASS") {
				$("#marfla").css("display", "");  // To unhide
			} else {
				$("#marfla").css("display", "none");  // To hide
			}
			$("#fla1").css("display", "");  // To unhide
			$("#stat_fla").css("display", "");  // To unhide
		} else {
			$("#fla1").css("display", "none");  // To hide
			$("#stat_fla").css("display", "none");  // To hide
			$("#disfla").css("display", "none");  // To hide
			$("#ranfla").css("display", "none");  // To hide
			$("#marfla").css("display", "none");  // To hide
		}
		if (document.forms['form1']['jns_test'].value == "FIBER CONTENT") {
			if (document.forms['form1']['stat_fib'].value == "RANDOM") {
				$("#ranfib").css("display", "");  // To unhide
				$("#ranfib1").css("display", "");  // To unhide
			} else {
				$("#ranfib").css("display", "none");  // To hide
				$("#ranfib1").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_fib'].value == "DISPOSISI") {
				$("#disfib").css("display", "");  // To unhide
				$("#disfib1").css("display", "");  // To unhide
			} else {
				$("#disfib").css("display", "none");  // To hide
				$("#disfib1").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_fib'].value == "MARGINAL PASS") {
				$("#marfib").css("display", "");  // To unhide
				$("#marfib1").css("display", "");  // To unhide
			} else {
				$("#marfib").css("display", "none");  // To hide
				$("#marfib1").css("display", "none");  // To hide
			}
			$("#fib1").css("display", "");  // To unhide
			$("#fib2").css("display", "");  // To unhide
			$("#stat_fib").css("display", "");  // To unhide
		} else {
			$("#fib1").css("display", "none");  // To hide
			$("#fib2").css("display", "none");  // To hide
			$("#stat_fib").css("display", "none");  // To hide
			$("#disfib").css("display", "none");  // To hide
			$("#disfib1").css("display", "none");  // To hide
			$("#ranfib").css("display", "none");  // To hide
			$("#ranfib1").css("display", "none");  // To hide
			$("#marfib").css("display", "none");  // To hide
			$("#marfib1").css("display", "none");  // To hide
		}
		if (document.forms['form1']['jns_test'].value == "FABRIC COUNT") {
			if (document.forms['form1']['stat_fc'].value == "RANDOM") {
				$("#ranfc").css("display", "");  // To unhide
			} else {
				$("#ranfc").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_fc'].value == "DISPOSISI") {
				$("#disfc").css("display", "");  // To unhide
			} else {
				$("#disfc").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_fc'].value == "MARGINAL PASS") {
				$("#marfc").css("display", "");  // To unhide
			} else {
				$("#marfc").css("display", "none");  // To hide
			}
			$("#fc3").css("display", "");  // To unhide
			$("#stat_fc").css("display", "");  // To unhide
		} else {
			$("#fc3").css("display", "none");  // To hide
			$("#stat_fc").css("display", "none");  // To hide
			$("#disfc").css("display", "none");  // To hide
			$("#ranfc").css("display", "none");  // To hide
			$("#marfc").css("display", "none");  // To hide
		}
		if (document.forms['form1']['jns_test'].value == "FABRIC WEIGHT & SHRINKAGE & SPIRALITY") {
			if (document.forms['form1']['stat_fwss2'].value == "RANDOM") {
				$("#ranfw").css("display", "");  // To unhide
			} else {
				$("#ranfw").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_fwss2'].value == "DISPOSISI") {
				$("#disfw").css("display", "");  // To unhide
			} else {
				$("#disfw").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_fwss2'].value == "MARGINAL PASS") {
				$("#marfw").css("display", "");  // To unhide
			} else {
				$("#marfw").css("display", "none");  // To hide
			}
			$("#fc4").css("display", "");  // To unhide
			$("#stat_fwss2").css("display", "");  // To unhide
		} else {
			$("#fc4").css("display", "none");  // To hide
			$("#stat_fwss2").css("display", "none");  // To hide
			$("#disfw").css("display", "none");  // To hide
			$("#ranfw").css("display", "none");  // To hide
			$("#marfw").css("display", "none");  // To hide
			$("#dis_spirality_status").css("display", "none");  // To hide	
		}
		if (document.forms['form1']['jns_test'].value == "FABRIC WEIGHT & SHRINKAGE & SPIRALITY") {
			if (document.forms['form1']['stat_fwss3'].value == "RANDOM") {
				$("#ranfwi").css("display", "");  // To unhide
			} else {
				$("#ranfwi").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_fwss3'].value == "DISPOSISI") {
				$("#disfwi").css("display", "");  // To unhide
			} else {
				$("#disfwi").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_fwss3'].value == "MARGINAL PASS") {
				$("#marfwi").css("display", "");  // To unhide
			} else {
				$("#marfwi").css("display", "none");  // To hide
			}
			$("#fc5").css("display", "");  // To unhide
			$("#stat_fwss3").css("display", "");  // To unhide
		} else {
			$("#fc5").css("display", "none");  // To hide
			$("#stat_fwss3").css("display", "none");  // To hide
			$("#disfwi").css("display", "none");  // To hide
			$("#ranfwi").css("display", "none");  // To hide
			$("#marfwi").css("display", "none");  // To hide
		}
		if (document.forms['form1']['jns_test'].value == "BOW & SKEW") {
			if (document.forms['form1']['stat_bsk'].value == "RANDOM") {
				$("#ranbsk").css("display", "");  // To unhide
			} else {
				$("#ranbsk").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_bsk'].value == "DISPOSISI") {
				$("#disbsk").css("display", "");  // To unhide
			} else {
				$("#disbsk").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_bsk'].value == "MARGINAL PASS") {
				$("#marbsk").css("display", "");  // To unhide
			} else {
				$("#marbsk").css("display", "none");  // To hide
			}
			$("#fc6").css("display", "");  // To unhide
			$("#stat_bsk").css("display", "");  // To unhide
		} else {
			$("#fc6").css("display", "none");  // To hide
			$("#stat_bsk").css("display", "none");  // To hide
			$("#disbsk").css("display", "none");  // To hide
			$("#ranbsk").css("display", "none");  // To hide
			$("#marbsk").css("display", "none");  // To hide
		}
		if (document.forms['form1']['jns_test'].value == "FABRIC WEIGHT & SHRINKAGE & SPIRALITY") {
			if (document.forms['form1']['stat_fwss'].value == "RANDOM") {
				$("#ranss").css("display", "");  // To unhide
				$("#ranapss").css("display", "");  // To unhide
			} else {
				$("#ranss").css("display", "none");  // To hide
				$("#ranapss").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_fwss'].value == "DISPOSISI") {
				$("#dis_ss").css("display", "");  // To unhide
				$("#disapss").css("display", "");  // To unhide
			} else {
				$("#dis_ss").css("display", "none");  // To hide
				$("#disapss").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_fwss'].value == "MARGINAL PASS") {
				$("#mar_ss").css("display", "");  // To unhide
				$("#marapss").css("display", "");  // To unhide
			} else {
				$("#mar_ss").css("display", "none");  // To hide
				$("#marapss").css("display", "none");  // To hide
			}
			$("#fc7").css("display", "");  // To unhide
			$("#stat_fwss").css("display", "");  // To unhide
		} else {
			$("#fc7").css("display", "none");  // To hide
			$("#stat_fwss").css("display", "none");  // To hide
			$("#dis_ss").css("display", "none");  // To hide
			$("#disapss").css("display", "none");  // To hide
			$("#ranss").css("display", "none");  // To hide
			$("#ranapss").css("display", "none");  // To hide
			$("#mar_ss").css("display", "none");  // To hide
			$("#marapss").css("display", "none");  // To hide
		}
		if (document.forms['form1']['jns_test'].value == "FABRIC WEIGHT & SHRINKAGE & SPIRALITY") {
			if (document.forms['form1']['stat_fwss'].value == "RANDOM") {
				$("#ranss").css("display", "");  // To unhide
				$("#ranapss").css("display", "");  // To unhide
			} else {
				$("#ranss").css("display", "none");  // To hide
				$("#ranapss").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_fwss'].value == "DISPOSISI") {
				$("#dis_ss").css("display", "");  // To unhide
				$("#disapss").css("display", "");  // To unhide
			} else {
				$("#dis_ss").css("display", "none");  // To hide
				$("#disapss").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_fwss'].value == "MARGINAL PASS") {
				$("#mar_ss").css("display", "");  // To unhide
				$("#marapss").css("display", "");  // To unhide
			} else {
				$("#mar_ss").css("display", "none");  // To hide
				$("#marapss").css("display", "none");  // To hide
			}
			$("#fc24").css("display", "");  // To unhide
			$("#stat_fwss").css("display", "");  // To unhide
		} else {
			$("#fc24").css("display", "none");  // To hide
			$("#stat_fwss").css("display", "none");  // To hide
			$("#dis_ss").css("display", "none");  // To hide
			$("#disapss").css("display", "none");  // To hide
			$("#ranss").css("display", "none");  // To hide
			$("#ranapss").css("display", "none");  // To hide
			$("#mar_ss").css("display", "none");  // To hide
			$("#marapss").css("display", "none");  // To hide
		}
		<!--spirality-->
		if (document.forms['form1']['jns_test'].value == "FABRIC WEIGHT & SHRINKAGE & SPIRALITY") {

			if (document.forms['form1']['stat_sparility'].value == "DISPOSISI") {
				$("#dis_spirality_status").css("display", "");  // To unhide

			} else {
				$("#dis_spirality_status").css("display", "none");  // To hide	
			}

			//$("#fc24").css("display", "");  // To unhide
			//$("#stat_fwss").css("display", "");  // To unhide
		} else {
			//$("#fc24").css("display", "none");  // To hide
			//$("#stat_fwss").css("display", "none");  // To hide
		}



		if (document.forms['form1']['jns_test'].value == "PILLING MARTINDLE") {
			if (document.forms['form1']['stat_pm'].value == "RANDOM") {
				$("#ranpm").css("display", "");  // To unhide
			} else {
				$("#ranpm").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_pm'].value == "DISPOSISI") {
				$("#dispm").css("display", "");  // To unhide
			} else {
				$("#dispm").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_pm'].value == "MARGINAL PASS") {
				$("#marpm").css("display", "");  // To unhide
			} else {
				$("#marpm").css("display", "none");  // To hide
			}
			$("#fc8").css("display", "");  // To unhide
			$("#stat_pm").css("display", "");  // To unhide
		} else {
			$("#fc8").css("display", "none");  // To hide
			$("#stat_pm").css("display", "none");  // To hide
			$("#dispm").css("display", "none");  // To hide
			$("#ranpm").css("display", "none");  // To hide
			$("#marpm").css("display", "none");  // To hide
		}
		if (document.forms['form1']['jns_test'].value == "PILLING BOX") {
			if (document.forms['form1']['stat_pb'].value == "RANDOM") {
				$("#ranpb").css("display", "");  // To unhide
			} else {
				$("#ranpb").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_pb'].value == "DISPOSISI") {
				$("#dispb").css("display", "");  // To unhide
			} else {
				$("#dispb").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_pb'].value == "MARGINAL PASS") {
				$("#marpb").css("display", "");  // To unhide
			} else {
				$("#marpb").css("display", "none");  // To hide
			}
			$("#fc9").css("display", "");  // To unhide
			$("#stat_pb").css("display", "");  // To unhide
		} else {
			$("#fc9").css("display", "none");  // To hide
			$("#stat_pb").css("display", "none");  // To hide
			$("#dispb").css("display", "none");  // To hide
			$("#ranpb").css("display", "none");  // To hide
			$("#marpb").css("display", "none");  // To hide
		}
		if (document.forms['form1']['jns_test'].value == "PILLING RANDOM TUMBLER") {
			if (document.forms['form1']['stat_prt'].value == "RANDOM") {
				$("#ranprt").css("display", "");  // To unhide
			} else {
				$("#ranprt").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_prt'].value == "DISPOSISI") {
				$("#disprt").css("display", "");  // To unhide
			} else {
				$("#disprt").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_prt'].value == "MARGINAL PASS") {
				$("#marprt").css("display", "");  // To unhide
			} else {
				$("#marprt").css("display", "none");  // To hide
			}
			$("#fc10").css("display", "");  // To unhide
			$("#stat_prt").css("display", "");  // To unhide
		} else {
			$("#fc10").css("display", "none");  // To hide
			$("#stat_prt").css("display", "none");  // To hide
			$("#disprt").css("display", "none");  // To hide
			$("#ranprt").css("display", "none");  // To hide
			$("#marprt").css("display", "none");  // To hide
		}
		if (document.forms['form1']['jns_test'].value == "ABRATION") {
			if (document.forms['form1']['stat_abr'].value == "RANDOM") {
				$("#ranabr").css("display", "");  // To unhide
			} else {
				$("#ranabr").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_abr'].value == "DISPOSISI") {
				$("#disabr").css("display", "");  // To unhide
			} else {
				$("#disabr").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_abr'].value == "MARGINAL PASS") {
				$("#marabr").css("display", "");  // To unhide
			} else {
				$("#marabr").css("display", "none");  // To hide
			}
			$("#fc11").css("display", "");  // To unhide
			$("#stat_abr").css("display", "");  // To unhide
		} else {
			$("#fc11").css("display", "none");  // To hide
			$("#stat_abr").css("display", "none");  // To hide
			$("#disabr").css("display", "none");  // To hide
			$("#ranabr").css("display", "none");  // To hide
			$("#marabr").css("display", "none");  // To hide
		}
		if (document.forms['form1']['jns_test'].value == "SNAGGING MACE") {
			if (document.forms['form1']['stat_sm'].value == "RANDOM") {
				$("#ransm").css("display", "");  // To unhide
			} else {
				$("#ransm").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_sm'].value == "DISPOSISI") {
				$("#dissm").css("display", "");  // To unhide
			} else {
				$("#dissm").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_sm'].value == "MARGINAL PASS") {
				$("#marsm").css("display", "");  // To unhide
			} else {
				$("#marsm").css("display", "none");  // To hide
			}
			$("#fc12").css("display", "");  // To unhide
			$("#stat_sm").css("display", "");  // To unhide
		} else {
			$("#fc12").css("display", "none");  // To hide
			$("#stat_sm").css("display", "none");  // To hide
			$("#dissm").css("display", "none");  // To hide
			$("#ransm").css("display", "none");  // To hide
			$("#marsm").css("display", "none");  // To hide
		}
		if (document.forms['form1']['jns_test'].value == "SNAGGING POD") {
			if (document.forms['form1']['stat_sp'].value == "RANDOM") {
				$("#ransp").css("display", "");  // To unhide
			} else {
				$("#ransp").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_sp'].value == "DISPOSISI") {
				$("#dissp").css("display", "");  // To unhide
			} else {
				$("#dissp").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_sp'].value == "MARGINAL PASS") {
				$("#marsp").css("display", "");  // To unhide
			} else {
				$("#marsp").css("display", "none");  // To hide
			}
			$("#fc13").css("display", "");  // To unhide
			$("#stat_sp").css("display", "");  // To unhide
		} else {
			$("#fc13").css("display", "none");  // To hide
			$("#stat_sp").css("display", "none");  // To hide
			$("#dissp").css("display", "none");  // To hide
			$("#ransp").css("display", "none");  // To hide
			$("#marsp").css("display", "none");  // To hide
		}
		if (document.forms['form1']['jns_test'].value == "BEAN BAG") {
			if (document.forms['form1']['stat_sb'].value == "RANDOM") {
				$("#ransb").css("display", "");  // To unhide
			} else {
				$("#ransb").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_sb'].value == "DISPOSISI") {
				$("#dissb").css("display", "");  // To unhide
			} else {
				$("#dissb").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_sb'].value == "MARGINAL PASS") {
				$("#marsb").css("display", "");  // To unhide
			} else {
				$("#marsb").css("display", "none");  // To hide
			}
			$("#fc14").css("display", "");  // To unhide
			$("#stat_sb").css("display", "");  // To unhide
		} else {
			$("#fc14").css("display", "none");  // To hide
			$("#stat_sb").css("display", "none");  // To hide
			$("#dissb").css("display", "none");  // To hide
			$("#ransb").css("display", "none");  // To hide
			$("#marsb").css("display", "none");  // To hide
		}
		if (document.forms['form1']['jns_test'].value == "BURSTING STRENGTH") {
			if (document.forms['form1']['stat_bs2'].value == "RANDOM") {
				$("#ranbs2").css("display", "");  // To unhide
			} else {
				$("#ranbs2").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_bs2'].value == "DISPOSISI") {
				$("#disbs2").css("display", "");  // To unhide
			} else {
				$("#disbs2").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_bs2'].value == "MARGINAL PASS") {
				$("#marbs2").css("display", "");  // To unhide
			} else {
				$("#marbs2").css("display", "none");  // To hide
			}
			$("#fc15").css("display", "");  // To unhide
			$("#stat_bs2").css("display", "");  // To unhide
		} else {
			$("#fc15").css("display", "none");  // To hide
			$("#stat_bs2").css("display", "none");  // To hide
			$("#disbs2").css("display", "none");  // To hide
			$("#ranbs2").css("display", "none");  // To hide
			$("#marbs2").css("display", "none");  // To hide
		}
		if (document.forms['form1']['jns_test'].value == "BURSTING STRENGTH") {
			if (document.forms['form1']['stat_bs'].value == "RANDOM") {
				$("#ranbs").css("display", "");  // To unhide
			} else {
				$("#ranbs").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_bs'].value == "DISPOSISI") {
				$("#disbs").css("display", "");  // To unhide
			} else {
				$("#disbs").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_bs'].value == "MARGINAL PASS") {
				$("#marbs").css("display", "");  // To unhide
			} else {
				$("#marbs").css("display", "none");  // To hide
			}
			$("#fc25").css("display", "");  // To unhide
			$("#stat_bs").css("display", "");  // To unhide
		} else {
			$("#fc25").css("display", "none");  // To hide
			$("#stat_bs").css("display", "none");  // To hide
			$("#disbs").css("display", "none");  // To hide
			$("#ranbs").css("display", "none");  // To hide
			$("#marbs").css("display", "none");  // To hide
		}
		if (document.forms['form1']['jns_test'].value == "BURSTING STRENGTH") {
			if (document.forms['form1']['stat_bs3'].value == "RANDOM") {
				$("#ranbs3").css("display", "");  // To unhide
			} else {
				$("#ranbs3").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_bs3'].value == "DISPOSISI") {
				$("#disbs3").css("display", "");  // To unhide
			} else {
				$("#disbs3").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_bs3'].value == "MARGINAL PASS") {
				$("#marbs3").css("display", "");  // To unhide
			} else {
				$("#marbs3").css("display", "none");  // To hide
			}
			$("#fc26").css("display", "");  // To unhide
			$("#stat_bs3").css("display", "");  // To unhide
		} else {
			$("#fc26").css("display", "none");  // To hide
			$("#stat_bs3").css("display", "none");  // To hide
			$("#disbs3").css("display", "none");  // To hide
			$("#ranbs3").css("display", "none");  // To hide
			$("#marbs3").css("display", "none");  // To hide
		}
		if (document.forms['form1']['jns_test'].value == "THICKNESS") {
			if (document.forms['form1']['stat_th'].value == "RANDOM") {
				$("#ranth").css("display", "");  // To unhide
			} else {
				$("#ranth").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_th'].value == "DISPOSISI") {
				$("#disth").css("display", "");  // To unhide
			} else {
				$("#disth").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_th'].value == "MARGINAL PASS") {
				$("#marth").css("display", "");  // To unhide
			} else {
				$("#marth").css("display", "none");  // To hide
			}
			$("#fc16").css("display", "");  // To unhide
			$("#stat_th").css("display", "");  // To unhide
		} else {
			$("#fc16").css("display", "none");  // To hide
			$("#stat_th").css("display", "none");  // To hide
			$("#disth").css("display", "none");  // To hide
			$("#ranth").css("display", "none");  // To hide
			$("#marth").css("display", "none");  // To hide
		}
		if (document.forms['form1']['jns_test'].value == "STRETCH & RECOVERY") {
			if (document.forms['form1']['stat_sr'].value == "RANDOM") {
				$("#ranst").css("display", "");  // To unhide
				$("#ranrc").css("display", "");  // To unhide
			} else {
				$("#ranst").css("display", "none");  // To hide
				$("#ranrc").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_sr'].value == "DISPOSISI") {
				$("#disst").css("display", "");  // To unhide
				$("#disrc").css("display", "");  // To unhide
			} else {
				$("#disst").css("display", "none");  // To hide
				$("#disrc").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_sr'].value == "MARGINAL PASS") {
				$("#marst").css("display", "");  // To unhide
				$("#marrc").css("display", "");  // To unhide
			} else {
				$("#marst").css("display", "none");  // To hide
				$("#marrc").css("display", "none");  // To hide
			}
			$("#fc17").css("display", "");  // To unhide
			$("#stat_sr").css("display", "");  // To unhide
		} else {
			$("#fc17").css("display", "none");  // To hide
			$("#stat_sr").css("display", "none");  // To hide
			$("#disst").css("display", "none");  // To hide
			$("#disrc").css("display", "none");  // To hide
			$("#ranst").css("display", "none");  // To hide
			$("#ranrc").css("display", "none");  // To hide
			$("#marst").css("display", "none");  // To hide
			$("#marrc").css("display", "none");  // To hide
		}
		if (document.forms['form1']['jns_test'].value == "STRETCH & RECOVERY") {
			if (document.forms['form1']['stat_sr'].value == "RANDOM") {
				$("#ranst").css("display", "");  // To unhide
				$("#ranrc").css("display", "");  // To unhide
			} else {
				$("#ranst").css("display", "none");  // To hide
				$("#ranrc").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_sr'].value == "DISPOSISI") {
				$("#disst").css("display", "");  // To unhide
				$("#disrc").css("display", "");  // To unhide
			} else {
				$("#disst").css("display", "none");  // To hide
				$("#disrc").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_sr'].value == "MARGINAL PASS") {
				$("#marst").css("display", "");  // To unhide
				$("#marrc").css("display", "");  // To unhide
			} else {
				$("#marst").css("display", "none");  // To hide
				$("#marrc").css("display", "none");  // To hide
			}
			$("#fc18").css("display", "");  // To unhide 18
			$("#stat_sr").css("display", "");  // To unhide
		} else {
			$("#fc18").css("display", "none");  // To hide
			$("#stat_sr").css("display", "none");  // To hide
			$("#disst").css("display", "none");  // To hide
			$("#disrc").css("display", "none");  // To hide
			$("#ranst").css("display", "none");  // To hide
			$("#ranrc").css("display", "none");  // To hide
			$("#marst").css("display", "none");  // To hide
			$("#marrc").css("display", "none");  // To hide
		}
		if (document.forms['form1']['jns_test'].value == "GROWTH") {
			if (document.forms['form1']['stat_gr'].value == "RANDOM") {
				$("#rangr").css("display", "");  // To unhide
				$("#rangr1").css("display", "");  // To unhide
			} else {
				$("#rangr").css("display", "none");  // To hide
				$("#rangr1").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_gr'].value == "DISPOSISI") {
				$("#disgr").css("display", "");  // To unhide
				$("#disgr1").css("display", "");  // To unhide
			} else {
				$("#disgr").css("display", "none");  // To hide
				$("#disgr1").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_gr'].value == "MARGINAL PASS") {
				$("#margr").css("display", "");  // To unhide
				$("#margr1").css("display", "");  // To unhide
			} else {
				$("#margr").css("display", "none");  // To hide
				$("#margr1").css("display", "none");  // To hide
			}
			$("#fc19").css("display", "");  // To unhide
			$("#fc27").css("display", "");  // To unhide
			$("#stat_gr").css("display", "");  // To unhide
		} else {
			$("#fc19").css("display", "none");  // To hide
			$("#fc27").css("display", "none");  // To hide
			$("#stat_gr").css("display", "none");  // To hide
			$("#disgr").css("display", "none");  // To hide
			$("#rangr").css("display", "none");  // To hide
			$("#disgr1").css("display", "none");  // To hide
			$("#rangr1").css("display", "none");  // To hide
			$("#margr").css("display", "none");  // To hide
			$("#margr1").css("display", "none");  // To hide
		}
		if (document.forms['form1']['jns_test'].value == "APPEARANCE") {
			if (document.forms['form1']['stat_ap'].value == "RANDOM") {
				$("#ranap").css("display", "");  // To unhide
			} else {
				$("#ranap").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_ap'].value == "DISPOSISI") {
				$("#disap").css("display", "");  // To unhide
			} else {
				$("#disap").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_ap'].value == "MARGINAL PASS") {
				$("#marap").css("display", "");  // To unhide
			} else {
				$("#marap").css("display", "none");  // To hide
			}
			$("#fc20").css("display", "");  // To unhide
			$("#stat_ap").css("display", "");  // To unhide
		} else {
			$("#fc20").css("display", "none");  // To hide
			$("#stat_ap").css("display", "none");  // To hide
			$("#disap").css("display", "none");  // To hide
			$("#ranap").css("display", "none");  // To hide
			$("#marap").css("display", "none");  // To hide
		}
		if (document.forms['form1']['jns_test'].value == "HEAT SHRINKAGE") {
			if (document.forms['form1']['stat_hs'].value == "RANDOM") {
				$("#ranhs").css("display", "");  // To unhide
			} else {
				$("#ranhs").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_hs'].value == "DISPOSISI") {
				$("#dishs").css("display", "");  // To unhide
			} else {
				$("#dishs").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_hs'].value == "MARGINAL PASS") {
				$("#marhs").css("display", "");  // To unhide
			} else {
				$("#marhs").css("display", "none");  // To hide
			}
			$("#fc21").css("display", "");  // To unhide
			$("#stat_hs").css("display", "");  // To unhide
		} else {
			$("#fc21").css("display", "none");  // To hide
			$("#stat_hs").css("display", "none");  // To hide
			$("#dishs").css("display", "none");  // To hide
			$("#ranhs").css("display", "none");  // To hide
			$("#marhs").css("display", "none");  // To hide
		}
		if (document.forms['form1']['jns_test'].value == "FIBRE/FUZZ") {
			if (document.forms['form1']['stat_ff'].value == "RANDOM") {
				$("#ranff").css("display", "");  // To unhide
			} else {
				$("#ranff").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_ff'].value == "DISPOSISI") {
				$("#disff").css("display", "");  // To unhide
			} else {
				$("#disff").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_ff'].value == "MARGINAL PASS") {
				$("#marff").css("display", "");  // To unhide
			} else {
				$("#marff").css("display", "none");  // To hide
			}
			$("#fc22").css("display", "");  // To unhide
			$("#stat_ff").css("display", "");  // To unhide
		} else {
			$("#fc22").css("display", "none");  // To hide
			$("#stat_ff").css("display", "none");  // To hide
			$("#disff").css("display", "none");  // To hide
			$("#ranff").css("display", "none");  // To hide
			$("#marff").css("display", "none");  // To hide
		}
		if (document.forms['form1']['jns_test'].value == "PILLING LOCUS") {
			if (document.forms['form1']['stat_pl'].value == "RANDOM") {
				$("#ranpl").css("display", "");  // To unhide
			} else {
				$("#ranpl").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_pl'].value == "DISPOSISI") {
				$("#displ").css("display", "");  // To unhide
			} else {
				$("#displ").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_pl'].value == "MARGINAL PASS") {
				$("#marpl").css("display", "");  // To unhide
			} else {
				$("#marpl").css("display", "none");  // To hide
			}
			$("#fc23").css("display", "");  // To unhide
			$("#stat_pl").css("display", "");  // To unhide
		} else {
			$("#fc23").css("display", "none");  // To hide
			$("#stat_pl").css("display", "none");  // To hide
			$("#displ").css("display", "none");  // To hide
			$("#ranpl").css("display", "none");  // To hide
			$("#marpl").css("display", "none");  // To hide
		}
		if (document.forms['form1']['jns_test'].value == "ODOUR") {
			if (document.forms['form1']['stat_odour'].value == "RANDOM") {
				$("#ranod").css("display", "");  // To unhide
			} else {
				$("#ranod").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_odour'].value == "DISPOSISI") {
				$("#disod").css("display", "");  // To unhide
			} else {
				$("#disod").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_odour'].value == "MARGINAL PASS") {
				$("#marod").css("display", "");  // To unhide
			} else {
				$("#marod").css("display", "none");  // To hide
			}
			$("#fc28").css("display", "");  // To unhide
			$("#stat_odour").css("display", "");  // To unhide
		} else {
			$("#fc28").css("display", "none");  // To hide
			$("#stat_odour").css("display", "none");  // To hide
			$("#disod").css("display", "none");  // To hide
			$("#ranod").css("display", "none");  // To hide
			$("#marod").css("display", "none");  // To hide
		}
		if (document.forms['form1']['jns_test'].value == "CURLING") {
			if (document.forms['form1']['stat_curling'].value == "RANDOM") {
				$("#rancur").css("display", "");  // To unhide
			} else {
				$("#rancur").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_curling'].value == "DISPOSISI") {
				$("#discur").css("display", "");  // To unhide
			} else {
				$("#discur").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_curling'].value == "MARGINAL PASS") {
				$("#marcur").css("display", "");  // To unhide
			} else {
				$("#marcur").css("display", "none");  // To hide
			}
			$("#fc29").css("display", "");  // To unhide
			$("#stat_curling").css("display", "");  // To unhide
		} else {
			$("#fc29").css("display", "none");  // To hide
			$("#stat_curling").css("display", "none");  // To hide
			$("#discur").css("display", "none");  // To hide
			$("#rancur").css("display", "none");  // To hide
			$("#marcur").css("display", "none");  // To hide
		}
		if (document.forms['form1']['jns_test'].value == "NEDLE") {
			if (document.forms['form1']['stat_nedle'].value == "RANDOM") {
				$("#ranned").css("display", "");  // To unhide
			} else {
				$("#ranned").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_nedle'].value == "DISPOSISI") {
				$("#disned").css("display", "");  // To unhide
			} else {
				$("#disned").css("display", "none");  // To hide
			}
			if (document.forms['form1']['stat_nedle'].value == "MARGINAL PASS") {
				$("#marned").css("display", "");  // To unhide
			} else {
				$("#marned").css("display", "none");  // To hide
			}
			$("#fc30").css("display", "");  // To unhide
			$("#stat_nedle").css("display", "");  // To unhide
		} else {
			$("#fc30").css("display", "none");  // To hide
			$("#stat_nedle").css("display", "none");  // To hide
			$("#disned").css("display", "none");  // To hide
			$("#ranned").css("display", "none");  // To hide
			$("#marned").css("display", "none");  // To hide
		}
		if (document.forms['form1']['jns_test'].value == "WRINKLE") {//disini
			// alert('ya')
			$("#fc31").css("display", "");  // To unhide
			$("#stat_wrinkle").css("display", "");  // To unhide
		} else {
			$("#fc31").css("display", "none");  // To hide
			$("#stat_wrinkle").css("display", "none");  // To hide
		}
		if (document.forms['form1']['jns_test'].value == "WRINKLE") {//disini
			// alert('ya')
			$("#fc32").css("display", "");  // To unhide
			$("#stat_wrinkle").css("display", "");  // To unhide
		} else {
			$("#fc32").css("display", "none");  // To hide
			$("#stat_wrinkle").css("display", "none");  // To hide
		}
	}
	function tampil1() {
		if (document.forms['form3']['jns_test1'].value == "WICKING") {
			if (document.forms['form3']['stat_wic'].value == "RANDOM") {
				$("#ranwic").css("display", "");  // To unhide
			} else {
				$("#ranwic").css("display", "none");  // To hide
			}
			if (document.forms['form3']['stat_wic'].value == "DISPOSISI") {
				$("#diswic").css("display", "");  // To unhide
			} else {
				$("#diswic").css("display", "none");  // To hide
			}
			if (document.forms['form3']['stat_wic'].value == "MARGINAL PASS") {
				$("#marwic").css("display", "");  // To unhide
			} else {
				$("#marwic").css("display", "none");  // To hide
			}
			$("#f1").css("display", "");  // To unhide
			$("#stat_wic").css("display", "");  // To unhide
		} else {
			$("#f1").css("display", "none");  // To hide
			$("#stat_wic").css("display", "none");  // To hide
			$("#diswic").css("display", "none");  // To hide
			$("#ranwic").css("display", "none");  // To hide
			$("#marwic").css("display", "none");  // To hide
		}
		if (document.forms['form3']['jns_test1'].value == "WICKING") {
			if (document.forms['form3']['stat_wic1'].value == "RANDOM") {
				$("#ranwic1").css("display", "");  // To unhide
			} else {
				$("#ranwic1").css("display", "none");  // To hide
			}
			if (document.forms['form3']['stat_wic1'].value == "DISPOSISI") {
				$("#diswic1").css("display", "");  // To unhide
			} else {
				$("#diswic1").css("display", "none");  // To hide
			}
			if (document.forms['form3']['stat_wic1'].value == "MARGINAL PASS") {
				$("#marwic1").css("display", "");  // To unhide
			} else {
				$("#marwic1").css("display", "none");  // To hide
			}
			$("#f8").css("display", "");  // To unhide
			$("#stat_wic1").css("display", "");  // To unhide
		} else {
			$("#f8").css("display", "none");  // To hide
			$("#stat_wic1").css("display", "none");  // To hide
			$("#diswic1").css("display", "none");  // To hide
			$("#ranwic1").css("display", "none");  // To hide
			$("#marwic1").css("display", "none");  // To hide
		}
		if (document.forms['form3']['jns_test1'].value == "WICKING") {
			if (document.forms['form3']['stat_wic2'].value == "RANDOM") {
				$("#ranwic2").css("display", "");  // To unhide
			} else {
				$("#ranwic2").css("display", "none");  // To hide
			}
			if (document.forms['form3']['stat_wic2'].value == "DISPOSISI") {
				$("#diswic2").css("display", "");  // To unhide
			} else {
				$("#diswic2").css("display", "none");  // To hide
			}
			if (document.forms['form3']['stat_wic2'].value == "MARGINAL PASS") {
				$("#marwic2").css("display", "");  // To unhide
			} else {
				$("#marwic2").css("display", "none");  // To hide
			}
			$("#f9").css("display", "");  // To unhide
			$("#stat_wic2").css("display", "");  // To unhide
		} else {
			$("#f9").css("display", "none");  // To hide
			$("#stat_wic2").css("display", "none");  // To hide
			$("#diswic2").css("display", "none");  // To hide
			$("#ranwic2").css("display", "none");  // To hide
			$("#marwic2").css("display", "none");  // To hide
		}
		if (document.forms['form3']['jns_test1'].value == "WICKING") {
			if (document.forms['form3']['stat_wic3'].value == "RANDOM") {
				$("#ranwic3").css("display", "");  // To unhide
			} else {
				$("#ranwic3").css("display", "none");  // To hide
			}
			if (document.forms['form3']['stat_wic3'].value == "DISPOSISI") {
				$("#diswic3").css("display", "");  // To unhide
			} else {
				$("#diswic3").css("display", "none");  // To hide
			}
			if (document.forms['form3']['stat_wic3'].value == "MARGINAL PASS") {
				$("#marwic3").css("display", "");  // To unhide
			} else {
				$("#marwic3").css("display", "none");  // To hide
			}
			$("#f10").css("display", "");  // To unhide
			$("#stat_wic3").css("display", "");  // To unhide
		} else {
			$("#f10").css("display", "none");  // To hide
			$("#stat_wic3").css("display", "none");  // To hide
			$("#diswic3").css("display", "none");  // To hide
			$("#ranwic3").css("display", "none");  // To hide
			$("#marwic3").css("display", "none");  // To hide
		}
		if (document.forms['form3']['jns_test1'].value == "ABSORBENCY") {
			if (document.forms['form3']['stat_abs'].value == "RANDOM") {
				$("#ranabs").css("display", "");  // To unhide
			} else {
				$("#ranabs").css("display", "none");  // To hide
			}
			if (document.forms['form3']['stat_abs'].value == "DISPOSISI") {
				$("#disabs").css("display", "");  // To unhide
			} else {
				$("#disabs").css("display", "none");  // To hide
			}
			if (document.forms['form3']['stat_abs'].value == "MARGINAL PASS") {
				$("#marabs").css("display", "");  // To unhide
			} else {
				$("#marabs").css("display", "none");  // To hide
			}
			$("#f2").css("display", "");  // To unhide
			$("#stat_abs").css("display", "");  // To unhide
		} else {
			$("#f2").css("display", "none");  // To hide
			$("#stat_abs").css("display", "none");  // To hide
			$("#disabs").css("display", "none");  // To hide
			$("#ranabs").css("display", "none");  // To hide
			$("#marabs").css("display", "none");  // To hide
		}
		if (document.forms['form3']['jns_test1'].value == "ABSORBENCY") {
			if (document.forms['form3']['stat_abs1'].value == "RANDOM") {
				$("#ranabs1").css("display", "");  // To unhide
			} else {
				$("#ranabs1").css("display", "none");  // To hide
			}
			if (document.forms['form3']['stat_abs1'].value == "DISPOSISI") {
				$("#disabs1").css("display", "");  // To unhide
			} else {
				$("#disabs1").css("display", "none");  // To hide
			}
			if (document.forms['form3']['stat_abs1'].value == "MARGINAL PASS") {
				$("#marabs1").css("display", "");  // To unhide
			} else {
				$("#marabs1").css("display", "none");  // To hide
			}
			$("#f6").css("display", "");  // To unhide
			$("#stat_abs1").css("display", "");  // To unhide
		} else {
			$("#f6").css("display", "none");  // To hide
			$("#stat_abs1").css("display", "none");  // To hide
			$("#disabs1").css("display", "none");  // To hide
			$("#ranabs1").css("display", "none");  // To hide
			$("#marabs1").css("display", "none");  // To hide
		}
		if (document.forms['form3']['jns_test1'].value == "DRYING TIME") {
			if (document.forms['form3']['stat_dry'].value == "RANDOM") {
				$("#randry").css("display", "");  // To unhide
			} else {
				$("#randry").css("display", "none");  // To hide
			}
			if (document.forms['form3']['stat_dry'].value == "DISPOSISI") {
				$("#disdry").css("display", "");  // To unhide
			} else {
				$("#disdry").css("display", "none");  // To hide
			}
			if (document.forms['form3']['stat_dry'].value == "MARGINAL PASS") {
				$("#mardry").css("display", "");  // To unhide
			} else {
				$("#mardry").css("display", "none");  // To hide
			}
			$("#f3").css("display", "");  // To unhide
			$("#stat_dry").css("display", "");  // To unhide
		} else {
			$("#f3").css("display", "none");  // To hide
			$("#stat_dry").css("display", "none");  // To hide
			$("#disdry").css("display", "none");  // To hide
			$("#randry").css("display", "none");  // To hide
			$("#mardry").css("display", "none");  // To hide
		}
		if (document.forms['form3']['jns_test1'].value == "DRYING TIME") {
			if (document.forms['form3']['stat_dry1'].value == "RANDOM") {
				$("#randry1").css("display", "");  // To unhide
			} else {
				$("#randry1").css("display", "none");  // To hide
			}
			if (document.forms['form3']['stat_dry1'].value == "DISPOSISI") {
				$("#disdry1").css("display", "");  // To unhide
			} else {
				$("#disdry1").css("display", "none");  // To hide
			}
			if (document.forms['form3']['stat_dry1'].value == "MARGINAL PASS") {
				$("#mardry1").css("display", "");  // To unhide
			} else {
				$("#mardry1").css("display", "none");  // To hide
			}
			$("#f7").css("display", "");  // To unhide
			$("#stat_dry1").css("display", "");  // To unhide
		} else {
			$("#f7").css("display", "none");  // To hide
			$("#stat_dry1").css("display", "none");  // To hide
			$("#disdry1").css("display", "none");  // To hide
			$("#randry1").css("display", "none");  // To hide
			$("#mardry1").css("display", "none");  // To hide
		}
		if (document.forms['form3']['jns_test1'].value == "WATER REPPELENT") {
			if (document.forms['form3']['stat_wp'].value == "RANDOM") {
				$("#ranwp").css("display", "");  // To unhide
			} else {
				$("#ranwp").css("display", "none");  // To hide
			}
			if (document.forms['form3']['stat_wp'].value == "DISPOSISI") {
				$("#diswp").css("display", "");  // To unhide
			} else {
				$("#diswp").css("display", "none");  // To hide
			}
			if (document.forms['form3']['stat_wp'].value == "MARGINAL PASS") {
				$("#marwp").css("display", "");  // To unhide
			} else {
				$("#marwp").css("display", "none");  // To hide
			}
			$("#f4").css("display", "");  // To unhide
			$("#stat_wp").css("display", "");  // To unhide
		} else {
			$("#f4").css("display", "none");  // To hide
			$("#stat_wp").css("display", "none");  // To hide
			$("#diswp").css("display", "none");  // To hide
			$("#ranwp").css("display", "none");  // To hide
			$("#marwp").css("display", "none");  // To hide
		}
		if (document.forms['form3']['jns_test1'].value == "WATER REPPELENT") {
			if (document.forms['form3']['stat_wp1'].value == "RANDOM") {
				$("#ranwp1").css("display", "");  // To unhide
			} else {
				$("#ranwp1").css("display", "none");  // To hide
			}
			if (document.forms['form3']['stat_wp1'].value == "DISPOSISI") {
				$("#diswp1").css("display", "");  // To unhide
			} else {
				$("#diswp1").css("display", "none");  // To hide
			}
			if (document.forms['form3']['stat_wp1'].value == "MARGINAL PASS") {
				$("#marwp1").css("display", "");  // To unhide
			} else {
				$("#marwp1").css("display", "none");  // To hide
			}
			$("#f11").css("display", "");  // To unhide
			$("#stat_wp1").css("display", "");  // To unhide
		} else {
			$("#f11").css("display", "none");  // To hide
			$("#stat_wp1").css("display", "none");  // To hide
			$("#diswp1").css("display", "none");  // To hide
			$("#ranwp1").css("display", "none");  // To hide
			$("#marwp1").css("display", "none");  // To hide
		}
		if (document.forms['form3']['jns_test1'].value == "PH") {
			if (document.forms['form3']['stat_ph'].value == "RANDOM") {
				$("#ranph").css("display", "");  // To unhide
			} else {
				$("#ranph").css("display", "none");  // To hide
			}
			if (document.forms['form3']['stat_ph'].value == "DISPOSISI") {
				$("#disph").css("display", "");  // To unhide
			} else {
				$("#disph").css("display", "none");  // To hide
			}
			if (document.forms['form3']['stat_ph'].value == "MARGINAL PASS") {
				$("#marph").css("display", "");  // To unhide
			} else {
				$("#marph").css("display", "none");  // To hide
			}
			$("#f5").css("display", "");  // To unhide
			$("#stat_ph").css("display", "");  // To unhide
		} else {
			$("#f5").css("display", "none");  // To hide
			$("#stat_ph").css("display", "none");  // To hide
			$("#disph").css("display", "none");  // To hide
			$("#ranph").css("display", "none");  // To hide
			$("#marph").css("display", "none");  // To hide
		}
		if (document.forms['form3']['jns_test1'].value == "SOIL RELEASE") {
			if (document.forms['form3']['stat_sor'].value == "RANDOM") {
				$("#ransor").css("display", "");  // To unhide
			} else {
				$("#ransor").css("display", "none");  // To hide
			}
			if (document.forms['form3']['stat_sor'].value == "DISPOSISI") {
				$("#dissor").css("display", "");  // To unhide
			} else {
				$("#dissor").css("display", "none");  // To hide
			}
			if (document.forms['form3']['stat_sor'].value == "MARGINAL PASS") {
				$("#marsor").css("display", "");  // To unhide
			} else {
				$("#marsor").css("display", "none");  // To hide
			}
			$("#f24").css("display", "");  // To unhide
			$("#stat_sor").css("display", "");  // To unhide
		} else {
			$("#f24").css("display", "none");  // To hide
			$("#stat_sor").css("display", "none");  // To hide
			$("#dissor").css("display", "none");  // To hide
			$("#ransor").css("display", "none");  // To hide
			$("#marsor").css("display", "none");  // To hide
		}
		if (document.forms['form3']['jns_test1'].value == "HUMIDITY") {
			if (document.forms['form3']['stat_hum'].value == "RANDOM") {
				$("#ranhum").css("display", "");  // To unhide
			} else {
				$("#ranhum").css("display", "none");  // To hide
			}
			if (document.forms['form3']['stat_hum'].value == "DISPOSISI") {
				$("#dishum").css("display", "");  // To unhide
			} else {
				$("#dishum").css("display", "none");  // To hide
			}
			if (document.forms['form3']['stat_hum'].value == "MARGINAL PASS") {
				$("#marhum").css("display", "");  // To unhide
			} else {
				$("#marhum").css("display", "none");  // To hide
			}
			$("#f25").css("display", "");  // To unhide
			$("#stat_hum").css("display", "");  // To unhide
		} else {
			$("#f25").css("display", "none");  // To hide
			$("#stat_hum").css("display", "none");  // To hide
			$("#dishum").css("display", "none");  // To hide
			$("#ranhum").css("display", "none");  // To hide
			$("#marhum").css("display", "none");  // To hide
		}
	}
	function tampil2() {
		if (document.forms['form2']['jns_test2'].value == "WASHING") {
			if (document.forms['form2']['stat_wf'].value == "RANDOM") {
				$("#ranwf").css("display", "");  // To unhide
			} else {
				$("#ranwf").css("display", "none");  // To hide
			}
			if (document.forms['form2']['stat_wf'].value == "DISPOSISI") {
				$("#diswf").css("display", "");  // To unhide
			} else {
				$("#diswf").css("display", "none");  // To hide
			}
			if (document.forms['form2']['stat_wf'].value == "MARGINAL PASS") {
				$("#marwf").css("display", "");  // To unhide
			} else {
				$("#marwf").css("display", "none");  // To hide
			}
			$("#c1").css("display", "");  // To unhide
			$("#stat_wf").css("display", "");  // To unhide
		} else {
			$("#c1").css("display", "none");  // To hide
			$("#stat_wf").css("display", "none");  // To hide
			$("#diswf").css("display", "none");  // To hide
			$("#ranwf").css("display", "none");  // To hide
			$("#marwf").css("display", "none");  // To hide
		}
		if (document.forms['form2']['jns_test2'].value == "WATER") {
			if (document.forms['form2']['stat_wtr'].value == "RANDOM") {
				$("#ranwtr").css("display", "");  // To unhide
			} else {
				$("#ranwtr").css("display", "none");  // To hide
			}
			if (document.forms['form2']['stat_wtr'].value == "DISPOSISI") {
				$("#diswtr").css("display", "");  // To unhide
			} else {
				$("#diswtr").css("display", "none");  // To hide
			}
			if (document.forms['form2']['stat_wtr'].value == "MARGINAL PASS") {
				$("#marwtr").css("display", "");  // To unhide
			} else {
				$("#marwtr").css("display", "none");  // To hide
			}
			$("#c2").css("display", "");  // To unhide
			$("#stat_wtr").css("display", "");  // To unhide
		} else {
			$("#c2").css("display", "none");  // To hide
			$("#stat_wtr").css("display", "none");  // To hide
			$("#diswtr").css("display", "none");  // To hide
			$("#ranwtr").css("display", "none");  // To hide
			$("#marwtr").css("display", "none");  // To hide
		}
		if (document.forms['form2']['jns_test2'].value == "PERSPIRATION ACID") {
			if (document.forms['form2']['stat_pac'].value == "RANDOM") {
				$("#ranpac").css("display", "");  // To unhide
			} else {
				$("#ranpac").css("display", "none");  // To hide
			}
			if (document.forms['form2']['stat_pac'].value == "DISPOSISI") {
				$("#dispac").css("display", "");  // To unhide
			} else {
				$("#dispac").css("display", "none");  // To hide
			}
			if (document.forms['form2']['stat_pac'].value == "MARGINAL PASS") {
				$("#marpac").css("display", "");  // To unhide
			} else {
				$("#marpac").css("display", "none");  // To hide
			}
			$("#c3").css("display", "");  // To unhide
			$("#stat_pac").css("display", "");  // To unhide
		} else {
			$("#c3").css("display", "none");  // To hide
			$("#stat_pac").css("display", "none");  // To hide
			$("#dispac").css("display", "none");  // To hide
			$("#ranpac").css("display", "none");  // To hide
			$("#marpac").css("display", "none");  // To hide
		}
		if (document.forms['form2']['jns_test2'].value == "PERSPIRATION ALKALINE") {
			if (document.forms['form2']['stat_pal'].value == "RANDOM") {
				$("#ranpal").css("display", "");  // To unhide
			} else {
				$("#ranpal").css("display", "none");  // To hide
			}
			if (document.forms['form2']['stat_pal'].value == "DISPOSISI") {
				$("#dispal").css("display", "");  // To unhide
			} else {
				$("#dispal").css("display", "none");  // To hide
			}
			if (document.forms['form2']['stat_pal'].value == "MARGINAL PASS") {
				$("#marpal").css("display", "");  // To unhide
			} else {
				$("#marpal").css("display", "none");  // To hide
			}
			$("#c4").css("display", "");  // To unhide
			$("#stat_pal").css("display", "");  // To unhide
		} else {
			$("#c4").css("display", "none");  // To hide
			$("#stat_pal").css("display", "none");  // To hide
			$("#dispal").css("display", "none");  // To hide
			$("#ranpal").css("display", "none");  // To hide
			$("#marpal").css("display", "none");  // To hide
		}
		if (document.forms['form2']['jns_test2'].value == "CROCKING") {
			if (document.forms['form2']['stat_cr'].value == "RANDOM") {
				$("#rancr").css("display", "");  // To unhide
			} else {
				$("#rancr").css("display", "none");  // To hide
			}
			if (document.forms['form2']['stat_cr'].value == "DISPOSISI") {
				$("#discr").css("display", "");  // To unhide
			} else {
				$("#discr").css("display", "none");  // To hide
			}
			if (document.forms['form2']['stat_cr'].value == "MARGINAL PASS") {
				$("#marcr").css("display", "");  // To unhide
			} else {
				$("#marcr").css("display", "none");  // To hide
			}
			$("#c5").css("display", "");  // To unhide
			$("#stat_cr").css("display", "");  // To unhide
		} else {
			$("#c5").css("display", "none");  // To hide
			$("#stat_cr").css("display", "none");  // To hide
			$("#discr").css("display", "none");  // To hide
			$("#rancr").css("display", "none");  // To hide
			$("#marcr").css("display", "none");  // To hide
		}
		if (document.forms['form2']['jns_test2'].value == "PHENOLIC YELLOWING") {
			if (document.forms['form2']['stat_py'].value == "RANDOM") {
				$("#ranpy").css("display", "");  // To unhide
			} else {
				$("#ranpy").css("display", "none");  // To hide
			}
			if (document.forms['form2']['stat_py'].value == "DISPOSISI") {
				$("#dispy").css("display", "");  // To unhide
			} else {
				$("#dispy").css("display", "none");  // To hide
			}
			if (document.forms['form2']['stat_py'].value == "MARGINAL PASS") {
				$("#marpy").css("display", "");  // To unhide
			} else {
				$("#marpy").css("display", "none");  // To hide
			}
			$("#c6").css("display", "");  // To unhide
			$("#stat_py").css("display", "");  // To unhide
		} else {
			$("#c6").css("display", "none");  // To hide
			$("#stat_py").css("display", "none");  // To hide
			$("#dispy").css("display", "none");  // To hide
			$("#ranpy").css("display", "none");  // To hide
			$("#marpy").css("display", "none");  // To hide
		}
		if (document.forms['form2']['jns_test2'].value == "COLOR MIGRATION-OVEN TEST") {
			if (document.forms['form2']['stat_cmo'].value == "RANDOM") {
				$("#rancmo").css("display", "");  // To unhide
			} else {
				$("#rancmo").css("display", "none");  // To hide
			}
			if (document.forms['form2']['stat_cmo'].value == "DISPOSISI") {
				$("#discmo").css("display", "");  // To unhide
			} else {
				$("#discmo").css("display", "none");  // To hide
			}
			if (document.forms['form2']['stat_cmo'].value == "MARGINAL PASS") {
				$("#marcmo").css("display", "");  // To unhide
			} else {
				$("#marcmo").css("display", "none");  // To hide
			}
			$("#c7").css("display", "");  // To unhide
			$("#stat_cmo").css("display", "");  // To unhide
		} else {
			$("#c7").css("display", "none");  // To hide
			$("#stat_cmo").css("display", "none");  // To hide
			$("#discmo").css("display", "none");  // To hid
			$("#rancmo").css("display", "none");  // To hidee
			$("#marcmo").css("display", "none");  // To hide
		}
		if (document.forms['form2']['jns_test2'].value == "COLOR MIGRATION") {
			if (document.forms['form2']['stat_cm'].value == "RANDOM") {
				$("#rancm").css("display", "");  // To unhide
			} else {
				$("#rancm").css("display", "none");  // To hide
			}
			if (document.forms['form2']['stat_cm'].value == "DISPOSISI") {
				$("#discm").css("display", "");  // To unhide
			} else {
				$("#discm").css("display", "none");  // To hide
			}
			if (document.forms['form2']['stat_cm'].value == "MARGINAL PASS") {
				$("#marcm").css("display", "");  // To unhide
			} else {
				$("#marcm").css("display", "none");  // To hide
			}
			$("#c8").css("display", "");  // To unhide
			$("#stat_cm").css("display", "");  // To unhide
		} else {
			$("#c8").css("display", "none");  // To hide
			$("#stat_cm").css("display", "none");  // To hide
			$("#discm").css("display", "none");  // To hide
			$("#rancm").css("display", "none");  // To hide
			$("#marcm").css("display", "none");  // To hide
		}
		if (document.forms['form2']['jns_test2'].value == "SWEAT CONCEAL") {
			$("#conceal").css("display", "");  // To unhide	
		} else {
			$("#conceal").css("display", "none");  // To hide		
		}
		if (document.forms['form2']['jns_test2'].value == "LIGHT") {
			if (document.forms['form2']['stat_lg'].value == "RANDOM") {
				$("#ranlg").css("display", "");  // To unhide
			} else {
				$("#ranlg").css("display", "none");  // To hide
			}
			if (document.forms['form2']['stat_lg'].value == "DISPOSISI") {
				$("#dislg").css("display", "");  // To unhide
			} else {
				$("#dislg").css("display", "none");  // To hide
			}
			if (document.forms['form2']['stat_lg'].value == "MARGINAL PASS") {
				$("#marlg").css("display", "");  // To unhide
			} else {
				$("#marlg").css("display", "none");  // To hide
			}
			$("#c9").css("display", "");  // To unhide
			$("#stat_lg").css("display", "");  // To unhide
		} else {
			$("#c9").css("display", "none");  // To hide
			$("#stat_lg").css("display", "none");  // To hide
			$("#dislg").css("display", "none");  // To hide
			$("#ranlg").css("display", "none");  // To hide
			$("#marlg").css("display", "none");  // To hide
		}
		if (document.forms['form2']['jns_test2'].value == "LIGHT PERSPIRATION") {
			if (document.forms['form2']['stat_lp'].value == "RANDOM") {
				$("#ranlp").css("display", "");  // To unhide
			} else {
				$("#ranlp").css("display", "none");  // To hide
			}
			if (document.forms['form2']['stat_lp'].value == "DISPOSISI") {
				$("#dislp").css("display", "");  // To unhide
			} else {
				$("#dislp").css("display", "none");  // To hide
			}
			if (document.forms['form2']['stat_lp'].value == "MARGINAL PASS") {
				$("#marlp").css("display", "");  // To unhide
			} else {
				$("#marlp").css("display", "none");  // To hide
			}
			$("#c10").css("display", "");  // To unhide
			$("#stat_lp").css("display", "");  // To unhide
		} else {
			$("#c10").css("display", "none");  // To hide
			$("#stat_lp").css("display", "none");  // To hide
			$("#dislp").css("display", "none");  // To hide
			$("#ranlp").css("display", "none");  // To hide
			$("#marlp").css("display", "none");  // To hide
		}
		if (document.forms['form2']['jns_test2'].value == "SALIVA") {
			if (document.forms['form2']['stat_slv'].value == "RANDOM") {
				$("#ranslv").css("display", "");  // To unhide
			} else {
				$("#ranslv").css("display", "none");  // To hide
			}
			if (document.forms['form2']['stat_slv'].value == "DISPOSISI") {
				$("#disslv").css("display", "");  // To unhide
			} else {
				$("#disslv").css("display", "none");  // To hide
			}
			if (document.forms['form2']['stat_slv'].value == "MARGINAL PASS") {
				$("#marslv").css("display", "");  // To unhide
			} else {
				$("#marslv").css("display", "none");  // To hide
			}
			$("#c11").css("display", "");  // To unhide
			$("#stat_slv").css("display", "");  // To unhide
		} else {
			$("#c11").css("display", "none");  // To hide
			$("#stat_slv").css("display", "none");  // To hide
			$("#disslv").css("display", "none");  // To hide
			$("#ranslv").css("display", "none");  // To hide
			$("#marslv").css("display", "none");  // To hide
		}
		if (document.forms['form2']['jns_test2'].value == "BLEEDING") {
			if (document.forms['form2']['stat_bld'].value == "RANDOM") {
				$("#ranbld").css("display", "");  // To unhide
			} else {
				$("#ranbld").css("display", "none");  // To hide
			}
			if (document.forms['form2']['stat_bld'].value == "DISPOSISI") {
				$("#disbld").css("display", "");  // To unhide
			} else {
				$("#disbld").css("display", "none");  // To hide
			}
			if (document.forms['form2']['stat_bld'].value == "MARGINAL PASS") {
				$("#marbld").css("display", "");  // To unhide
			} else {
				$("#marbld").css("display", "none");  // To hide
			}
			$("#c12").css("display", "");  // To unhide
			$("#stat_bld").css("display", "");  // To unhide
		} else {
			$("#c12").css("display", "none");  // To hide
			$("#stat_bld").css("display", "none");  // To hide
			$("#disbld").css("display", "none");  // To hide
			$("#ranbld").css("display", "none");  // To hide
			$("#marbld").css("display", "none");  // To hide
		}
		if (document.forms['form2']['jns_test2'].value == "CHLORIN & NON-CHLORIN") {
			if (document.forms['form2']['stat_chl'].value == "RANDOM") {
				$("#ranchl").css("display", "");  // To unhide
			} else {
				$("#ranchl").css("display", "none");  // To hide
			}
			if (document.forms['form2']['stat_chl'].value == "DISPOSISI") {
				$("#dischl").css("display", "");  // To unhide
			} else {
				$("#dischl").css("display", "none");  // To hide
			}
			if (document.forms['form2']['stat_chl'].value == "MARGINAL PASS") {
				$("#marchl").css("display", "");  // To unhide
			} else {
				$("#marchl").css("display", "none");  // To hide
			}
			$("#c13").css("display", "");  // To unhide
			$("#stat_chl").css("display", "");  // To unhide
		} else {
			$("#c13").css("display", "none");  // To hide
			$("#stat_chl").css("display", "none");  // To hide
			$("#dischl").css("display", "none");  // To hide
			$("#ranchl").css("display", "none");  // To hide
			$("#marchl").css("display", "none");  // To hide
		}
		if (document.forms['form2']['jns_test2'].value == "CHLORIN & NON-CHLORIN") {
			if (document.forms['form2']['stat_nchl'].value == "RANDOM") {
				$("#rannchl").css("display", "");  // To unhide
			} else {
				$("#rannchl").css("display", "none");  // To hide
			}
			if (document.forms['form2']['stat_nchl'].value == "DISPOSISI") {
				$("#disnchl").css("display", "");  // To unhide
			} else {
				$("#disnchl").css("display", "none");  // To hide
			}
			if (document.forms['form2']['stat_nchl'].value == "MARGINAL PASS") {
				$("#marnchl").css("display", "");  // To unhide
			} else {
				$("#marnchl").css("display", "none");  // To hide
			}
			$("#c14").css("display", "");  // To unhide
			$("#stat_nchl").css("display", "");  // To unhide
		} else {
			$("#c14").css("display", "none");  // To hide
			$("#stat_nchl").css("display", "none");  // To hide
			$("#disnchl").css("display", "none");  // To hide
			$("#rannchl").css("display", "none");  // To hide
			$("#marnchl").css("display", "none");  // To hide
		}
		if (document.forms['form2']['jns_test2'].value == "DYE TRANSFER") {
			if (document.forms['form2']['stat_dye'].value == "RANDOM") {
				$("#randye").css("display", "");  // To unhide
			} else {
				$("#randye").css("display", "none");  // To hide
			}
			if (document.forms['form2']['stat_dye'].value == "DISPOSISI") {
				$("#disdye").css("display", "");  // To unhide
			} else {
				$("#disdye").css("display", "none");  // To hide
			}
			if (document.forms['form2']['stat_dye'].value == "MARGINAL PASS") {
				$("#mardye").css("display", "");  // To unhide
			} else {
				$("#mardye").css("display", "none");  // To hide
			}
			$("#c15").css("display", "");  // To unhide
			$("#stat_dye").css("display", "");  // To unhide
		} else {
			$("#c15").css("display", "none");  // To hide
			$("#stat_dye").css("display", "none");  // To hide
			$("#disdye").css("display", "none");  // To hide
			$("#randye").css("display", "none");  // To hide
			$("#mardye").css("display", "none");  // To hide
		}
	}
</script>
<?php
ini_set("error_reporting", 1);
session_start();
include "koneksi.php";
$nodemand = $_GET['nodemand'];
$notes = $_GET['notest'];
$sqlCek = mysqli_query($con, "SELECT * FROM tbl_tq_nokk WHERE no_test='$notes' ORDER BY id DESC LIMIT 1");
$cek = mysqli_num_rows($sqlCek);
$rcek = mysqli_fetch_array($sqlCek);
$pos = strpos($rcek['pelanggan'], "/");
$posbuyer = substr($rcek['pelanggan'], $pos + 1, 50);
$buyer = str_replace("'", "''", $posbuyer);

//penambahan pengecekan ketabel nokk demand 
$id_nokk = $rcek['id'];
$nodemand = $rcek['nodemand'];
$nokk_demand_sql = mysqli_query($con, "SELECT * FROM tbl_tq_nokk_demand WHERE id_nokk = '$id_nokk' ORDER BY id DESC LIMIT 1");
$nokk_demand_data = mysqli_num_rows($nokk_demand_sql);
$array_no_demand_other2 = [];
$array_no_demand_other3_4 = [];
$array_no_demand_other5_6 = [];
$array_no_demand_other_no = 2;
if ($nokk_demand_data > 0) {
	$id_nokk = mysqli_fetch_array($nokk_demand_sql)['id_nokk'];
	$demand_other = mysqli_query($con, "SELECT * FROM tbl_tq_nokk_demand WHERE id_nokk = '$id_nokk' and id_nokk > 0  ORDER BY id ");

	while ($datas = mysqli_fetch_assoc($demand_other)) {

		if ($array_no_demand_other_no <= 2) {
			$array_no_demand_other2['main'] = $nodemand;
			$array_no_demand_other2[$datas['id']] = $datas['nodemand'];
		} else if ($array_no_demand_other_no <= 4) {
			$array_no_demand_other3_4[$datas['id']] = $datas['nodemand'];
		} else if ($array_no_demand_other_no <= 6) {
			$array_no_demand_other5_6[$datas['id']] = $datas['nodemand'];
		}

		$array_no_demand_other_no++;
	}
}



?>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form0" id="form0">
	<div class="box box-info">
		<div class="box-header with-border">
			<h3 class="box-title">Testing Kartu Kerja</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i
						class="fa fa-minus"></i></button>
			</div>
		</div>
		<div class="box-body">
			<div class="col-md-6">
				<div class="form-group">
					<input name="no_id" type="hidden" class="form-control" id="no_id"
						value="<?php echo $rcek['no_id']; ?>" placeholder="No ID">
					<label for="no_po" class="col-sm-3 control-label">No Demand</label>
					<div class="col-sm-4">
						<div class="input-group">
							<input name="nodemand" type="text" class="form-control" id="nodemand"
								onchange="window.location='TestingNew-'+this.value" value="<?php if ($rcek['nodemand_new'] != '') {
									echo $rcek['nodemand_new'];
								} else if ($rcek['nodemand_new'] == '') {
									echo $rcek['nodemand'];
								} else {
									echo $_GET['nodemand'];
								} ?>" placeholder="No Demand" required <?php if ($_SESSION['lvl_id'] == "TQ") {
									 echo "readonly";
								 } ?>>
						</div>
					</div>

					<div class="col-sm-5">
						<?php foreach ($array_no_demand_other2 as $key => $data_other) {
							if ($key == 'main') {
								$border_color = '#000';
							} else {
								$border_color = '#ddd';
							}
							?>
							<div style="border:solid thin <?= $border_color ?>; float:left; margin-left:10px;padding:5px ">
								<?= $data_other ?>
							</div>
						<?php } ?>
					</div>
					<!-- <?php if ($cek > 0) { ?><a href="#" class="btn btn-info btn-xs posisi_kktq" id="<?php echo $rcek['nodemand']; ?>">Posisi Terakhir</a><?php } ?> -->
				</div>
				<input name="nokk" type="hidden" class="form-control" id="nokk" placeholder="No Prod Order" value="<?php if ($cek > 0) {
					echo $rcek['nokk'];
				} ?>" readonly="readonly">
				<?php if ($rcek['nodemand_new'] != '') { ?>
					<div class="form-group">
						<label for="nodemand_old" class="col-sm-3 control-label">No Demand Old</label>
						<div class="col-sm-5">
							<input name="nodemand_old" type="text" class="form-control" id="nodemand_old"
								placeholder="No Demand Old" value="<?php if ($rcek['nodemand_new'] != '') {
									echo $rcek['nodemand'];
								} ?>" readonly="readonly">
						</div>
					</div>
				<?php } ?>
				<div class="form-group">
					<label for="kk_legacy" class="col-sm-3 control-label">No KK Legacy</label>
					<div class="col-sm-5">
						<input name="kk_legacy" type="text" class="form-control" id="kk_legacy"
							placeholder="No KK Legacy" value="<?php if ($cek > 0) {
								echo $rcek['kk_legacy'];
							} ?>" readonly="readonly">
					</div>
					<?php if ($cek > 0) { ?><a href="#" class="btn btn-info btn-xs posisi_kktq"
							id="<?php echo $rcek['kk_legacy']; ?>">Posisi Terakhir</a>
					<?php } ?>
				</div>
				<div class="form-group">
					<label for="no_test" class="col-sm-3 control-label">No Test</label>
					<div class="col-sm-4">
						<input name="no_test" type="text" class="form-control" id="no_test" placeholder="No Test"
							autocomplete="off" onchange="window.location='TestingNewNoTes-'+this.value"
							value="<?php echo $_GET['notest']; ?>">
					</div>
					<div class="col-sm-5">
						<?php foreach ($array_no_demand_other3_4 as $data_other) { ?>
							<div style="border:solid thin #ddd; float:left; margin-left:10px;padding:5px ">
								<?= $data_other ?>
							</div>
						<?php } ?>
					</div>
				</div>
				<div class="form-group">
					<label for="no_order" class="col-sm-3 control-label">No Order</label>
					<div class="col-sm-4">
						<input name="no_order" type="text" class="form-control" id="no_order" placeholder="No Order"
							value="<?php if ($cek > 0) {
								echo $rcek['no_order'];
							} else {
								echo $r['NoOrder'];
							} ?>" readonly="readonly">
					</div>
					<div class="col-sm-5">
						<?php foreach ($array_no_demand_other5_6 as $data_other) { ?>
							<div style="border:solid thin #ddd; float:left; margin-left:10px;padding:5px ">
								<?= $data_other ?>
							</div>
						<?php } ?>
					</div>
				</div>
				<div class="form-group">
					<label for="no_po" class="col-sm-3 control-label">Pelanggan</label>
					<div class="col-sm-8">
						<input name="pelanggan" type="text" class="form-control" id="no_po" placeholder="Pelanggan"
							value="<?php if ($cek > 0) {
								echo $rcek['pelanggan'];
							} else if ($r1['partnername'] != "") {
								echo $pelanggan;
							} else {
							} ?>" readonly="readonly">
					</div>
				</div>
				<div class="form-group">
					<label for="no_po" class="col-sm-3 control-label">PO</label>
					<div class="col-sm-5">
						<input name="no_po" type="text" class="form-control" id="no_po" placeholder="PO" value="<?php if ($cek > 0) {
							echo $rcek['no_po'];
						} else {
							echo $r['PONumber'];
						} ?>" readonly="readonly">
					</div>
				</div>
				<div class="form-group">
					<label for="no_hanger" class="col-sm-3 control-label">No Hanger / No Item</label>
					<div class="col-sm-3">
						<input name="no_hanger" type="text" class="form-control" id="no_hanger" placeholder="No Hanger"
							value="<?php if ($cek > 0) {
								echo $rcek['no_hanger'];
							} else {
								echo $r['HangerNo'];
							} ?>" readonly="readonly">
					</div>
					<div class="col-sm-3">
						<input name="no_item" type="text" class="form-control" id="no_item" placeholder="No Item" value="<?php if ($rcek['no_item'] != "") {
							echo $rcek['no_item'];
						} else {
							echo $r['ProductCode'];
						} ?>" readonly="readonly">
					</div>
				</div>
				<div class="form-group">
					<label for="l_g" class="col-sm-3 control-label">Lebar X Gramasi</label>
					<div class="col-sm-2">
						<input name="lebar" type="text" required class="form-control" id="lebar" placeholder="0" value="<?php if ($cek > 0) {
							echo $rcek['lebar'];
						} else {
							echo round($r['Lebar']);
						} ?>" readonly="readonly">
					</div>
					<div class="col-sm-2">
						<input name="grms" type="text" required class="form-control" id="grms" placeholder="0" value="<?php if ($cek > 0) {
							echo $rcek['gramasi'];
						} else {
							echo round($r['Gramasi']);
						} ?>" readonly="readonly">
					</div>
				</div>
			</div>
			<!-- col -->
			<div class="col-md-6">
				<div class="form-group">
					<label for="jns_kain" class="col-sm-3 control-label">Jenis Kain</label>
					<div class="col-sm-8">
						<textarea name="jns_kain" readonly="readonly" class="form-control" id="jns_kain"
							placeholder="Jenis Kain"><?php if ($cek > 0) {
								echo $rcek['jenis_kain'];
							} else {
								echo $r['ProductDesc'];
							} ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="warna" class="col-sm-3 control-label">Warna</label>
					<div class="col-sm-8">
						<textarea name="warna" readonly="readonly" class="form-control" id="warna" placeholder="Warna"><?php if ($cek > 0) {
							echo $rcek['warna'];
						} else {
							echo $r['Color'];
						} ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="no_warna" class="col-sm-3 control-label">No Warna</label>
					<div class="col-sm-8">
						<textarea name="no_warna" readonly="readonly" class="form-control" id="no_warna"
							placeholder="No Warna"><?php if ($cek > 0) {
								echo $rcek['no_warna'];
							} else {
								echo $r['ColorNo'];
							} ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="lot" class="col-sm-3 control-label">Prod. Order/ Lot</label>
					<div class="col-sm-3">
						<input name="lot" type="text" class="form-control" id="lot" placeholder="Lot" value="<?php if ($cek > 0) {
							echo $rcek['lot'];
						} else {
							echo $lotno;
						} ?>" readonly="readonly">
					</div>
				</div>
				<?php if ($rcek['lot_new'] != '') { ?>
					<div class="form-group">
						<label for="lot_new" class="col-sm-3 control-label">Prod. Order/ Lot New</label>
						<div class="col-sm-3">
							<input name="lot_new" type="text" class="form-control" id="lot_new" placeholder="Lot New" value="<?php if ($cek > 0) {
								echo $rcek['lot_new'];
							} ?>" readonly="readonly">
						</div>
					</div>
				<?php } ?>
				<div class="form-group">
					<label for="lot_legacy" class="col-sm-3 control-label">No Lot Legacy</label>
					<div class="col-sm-5">
						<input name="lot_legacy" type="text" class="form-control" id="lot_legacy"
							placeholder="No Lot Legacy" value="<?php if ($cek > 0) {
								echo $rcek['lot_legacy'];
							} ?>" readonly="readonly">
					</div>
				</div>
				<div class="form-group">
					<label for="suhu" class="col-sm-3 control-label">Suhu</label>
					<div class="col-sm-3">
						<div class="input-group">
							<input name="suhu" type="text" class="form-control" id="suhu" placeholder="Suhu" value="<?php if ($cek > 0) {
								echo $rcek['suhu'];
							} else {
							} ?>" readonly="readonly">
							<span class="input-group-addon">&deg;C</span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="buyer" class="col-sm-3 control-label">Buyer</label>
					<div class="col-sm-5">
						<input name="buyer" type="text" class="form-control" id="buyer" placeholder="Buyer" value="<?php if ($cek > 0) {
							echo $rcek['buyer'];
						} else {
						} ?>" readonly="readonly">
					</div>
				</div>
			</div>
		</div>
		<div class="box-footer">

		</div>
		<!-- /.box-footer -->
	</div>
</form>
<?php
$sqlCek1 = mysqli_query($con, "SELECT a.*, b.*,
CONCAT_WS(' ',a.fc_note, a.ph_note, a.abr_note, a.bas_note, a.dry_note, a.fla_note, a.fwe_note, a.fwi_note, a.burs_note, a.repp_note, a.wick_note, a.wick_note, a.absor_note, a.apper_note, a.fiber_note, a.pillb_note, a.pillm_note, a.pillr_note, a.thick_note, a.growth_note, a.recover_note, a.stretch_note, a.sns_note, a.snab_note, a.snam_note, a.snap_note, a.wash_note, a.water_note, a.acid_note, a.alkaline_note, a.crock_note, a.phenolic_note, a.cm_printing_note, a.cm_dye_note, a.light_note, a.light_pers_note, a.saliva_note, a.h_shrinkage_note, a.fibre_note, a.pilll_note, a.soil_note, a.bleeding_note, a.chlorin_note, a.dye_tf_note, a.humidity_note, a.odour_note, a.curling_note, a.nedle_note, b.wrinkle_note) AS note_g 
FROM tbl_tq_test a 
LEFT JOIN tbl_tq_test_2 b ON a.id_nokk = b.id_nokk
WHERE a.id_nokk='$rcek[id]' 
ORDER BY a.id DESC 
LIMIT 1");
$cek1 = mysqli_num_rows($sqlCek1);
$rcek1 = mysqli_fetch_array($sqlCek1);
$sqlCekR = mysqli_query($con, "SELECT *,
	CONCAT_WS(' ',rfc_note,rph_note, rabr_note, rbas_note, rdry_note, rfla_note, rfwe_note, rfwi_note, rburs_note,rrepp_note,rwick_note,rabsor_note,rapper_note,rfiber_note,rpillb_note,rpillm_note,rpillr_note,rthick_note,rgrowth_note,rrecover_note,rstretch_note,rsns_note,rsnab_note,rsnam_note,rsnap_note,rwash_note,rwater_note,racid_note,ralkaline_note,rcrock_note,rphenolic_note,rcm_printing_note,rcm_dye_note,rlight_note,rlight_pers_note,rsaliva_note,rh_shrinkage_note,rfibre_note,rpilll_note,rsoil_note,rapperss_note,rbleeding_note,rchlorin_note,rdye_tf_note,rhumidity_note,rodour_note,rcurling_note,rnedle_note) AS rnote_g FROM tbl_tq_randomtest WHERE no_item='$rcek[no_item]' OR no_hanger='$rcek[no_hanger]'");
$cekR = mysqli_num_rows($sqlCekR);
$rcekR = mysqli_fetch_array($sqlCekR);
$sqlCekD = mysqli_query($con, "SELECT b.dbleeding_root, a.*,
	CONCAT_WS(' ',a.dfc_note,a.dph_note, a.dabr_note, a.dbas_note, a.ddry_note, a.dfla_note, a.dfwe_note, a.dfwi_note, a.dburs_note,a.drepp_note,a.dwick_note,a.dabsor_note,a.dapper_note,a.dfiber_note,a.dpillb_note,a.dpillm_note,a.dpillr_note,a.dthick_note,a.dgrowth_note,a.drecover_note,a.dstretch_note,a.dsns_note,a.dsnab_note,a.dsnam_note,a.dsnap_note,a.dwash_note,a.dwater_note,a.dacid_note,a.dalkaline_note,a.dcrock_note,a.dphenolic_note,a.dcm_printing_note,a.dcm_dye_note,a.dlight_note,a.dlight_pers_note,a.dsaliva_note,a.dh_shrinkage_note,a.dfibre_note,a.dpilll_note,a.dsoil_note,a.dapperss_note,a.dbleeding_note,a.dchlorin_note,a.ddye_tf_note,a.dhumidity_note,a.dodour_note,a.dcurling_note,a.dnedle_note) AS dnote_g 
	FROM tbl_tq_disptest a 
	LEFT JOIN tbl_tq_disptest_2 b on (a.id_nokk = b.id_nokk)
	WHERE a.id_nokk='$rcek[id]' ORDER BY a.id DESC LIMIT 1");
$cekD = mysqli_num_rows($sqlCekD);
$rcekD = mysqli_fetch_array($sqlCekD);

$sqlCekM = mysqli_query($con, "SELECT *,
	CONCAT_WS(' ',mfc_note,mph_note, mabr_note, mbas_note, mdry_note, mfla_note, mfwe_note, mfwi_note, mburs_note,mrepp_note,mwick_note,mabsor_note,mapper_note,mfiber_note,mpillb_note,mpillm_note,mpillr_note,mthick_note,mgrowth_note,mrecover_note,mstretch_note,msns_note,msnab_note,msnam_note,msnap_note,mwash_note,mwater_note,macid_note,malkaline_note,mcrock_note,mphenolic_note,mcm_printing_note,mcm_dye_note,mlight_note,mlight_pers_note,msaliva_note,mh_shrinkage_note,mfibre_note,mpilll_note,msoil_note,mapperss_note,mbleeding_note,mchlorin_note,mdye_tf_note,mhumidity_note,modour_note,mnedle_note) AS mnote_g FROM tbl_tq_marginal WHERE id_nokk='$rcek[id]' ORDER BY id DESC LIMIT 1");
$cekM = mysqli_num_rows($sqlCekM);
$rcekM = mysqli_fetch_array($sqlCekM);
$sqlCmt = mysqli_query($con, "SELECT *,
	CONCAT_WS(' ',apperss_note) AS note_apperss FROM tbl_tq_test WHERE id_nokk='$rcek[id]' ORDER BY id DESC LIMIT 1");
$rcekcmt = mysqli_fetch_array($sqlCmt);

$id_tq_test_2 = $rcek['id'];

$tq_test_2_sql = mysqli_query($con, "select id_nokk, spirality_status, bleeding_root, wrinkle, wrinkle1, wrinkle2, stat_wrinkle, stat_wrinkle1, wrinkle_note from tbl_tq_test_2 where id_nokk = '$id_tq_test_2'");
$tq_test_2_array = mysqli_fetch_array($tq_test_2_sql);
?>
<?php if ($_SESSION['lvl_id'] == "TQ" and $cek > 0) { ?>
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header">
					<small class="pull-right">Date:
						<?php echo $rcek1['tgl_buat']; ?>
					</small>
					<div class="box-body">
						<table id="example1" class="table table-bordered table-hover table-striped" width="100%">
							<thead class="bg-blue">
								<tr>
									<th width="24">
										<div align="center">Nama Test</div>
									</th>
									<th width="24">
										<div align="center">Status Test</div>
									</th>
									<th width="80">
										<div align="center">Note</div>
									</th>
								</tr>
							</thead>
							<tbody>
								<?php
								//$no_test=$_GET[no_test];
								$sql = "SELECT a.*, b.*, c.* From tbl_tq_nokk a
                                INNER JOIN tbl_master_test b ON a.no_test=b.no_testmaster
                                INNER JOIN tbl_tq_test c ON a.id=c.id_nokk
                                WHERE no_test='$notes'";
								$result = mysqli_query($con, $sql);
								$no = "1";
								while ($row = mysqli_fetch_array($result)) {
									$detail = explode(",", $row['physical']);
									$detail2 = explode(",", $row['functional']);
									$detail3 = explode(",", $row['colorfastness']);
									?>
									<?php if (in_array("FLAMMABILITY", $detail)) { ?>
										<tr>
											<td align="left">
												<?php if (in_array("FLAMMABILITY", $detail)) {
													echo "FLAMMABILITY";
												} ?>
											</td>
											<td align="center">
												<?php if ($row['stat_fla'] == "DISPOSISI") { ?> <span
														class='label bg-yellow blink_me'>
														<?php echo "DISPOSISI"; ?>
													</span>
												<?php } else if ($row['stat_fla'] == "FAIL") { ?> <span
															class='label bg-red blink_me'>
														<?php echo "FAIL"; ?>
														</span>
												<?php } else if ($row['stat_fla'] == "PASS") { ?> <span class='label bg-green'>
														<?php echo "PASS"; ?>
															</span>
												<?php } else if ($row['stat_fla'] == "R") { ?> <span class='label bg-orange'>
														<?php echo "R"; ?>
																</span>
												<?php } else if ($row['stat_fla'] == "RANDOM") { ?> <span class='label bg-maroon'>
														<?php echo "RANDOM"; ?>
																	</span>
												<?php } else if ($row['stat_fla'] == "A") { ?> <span class='label bg-teal'>
														<?php echo "A"; ?>
																		</span>
												<?php } ?>
											</td>
											<td align="center">
												<?php if ($row['fla_note'] != "") {
													echo $row['fla_note'];
												} ?>
											</td>
										</tr>
									<?php } ?>
									<?php if (in_array("FIBER CONTENT", $detail)) { ?>
										<tr>
											<td align="left">
												<?php if (in_array("FIBER CONTENT", $detail)) {
													echo "FIBER CONTENT";
												} ?>
											</td>
											<td align="center">
												<?php if ($row['stat_fib'] == "DISPOSISI") { ?> <span
														class='label bg-yellow blink_me'>
														<?php echo "DISPOSISI"; ?>
													</span>
												<?php } else if ($row['stat_fib'] == "FAIL") { ?> <span
															class='label bg-red blink_me'>
														<?php echo "FAIL"; ?>
														</span>
												<?php } else if ($row['stat_fib'] == "PASS") { ?> <span class='label bg-green'>
														<?php echo "PASS"; ?>
															</span>
												<?php } else if ($row['stat_fib'] == "R") { ?> <span class='label bg-orange'>
														<?php echo "R"; ?>
																</span>
												<?php } else if ($row['stat_fib'] == "RANDOM") { ?> <span class='label bg-maroon'>
														<?php echo "RANDOM"; ?>
																	</span>
												<?php } else if ($row['stat_fib'] == "A") { ?> <span class='label bg-teal'>
														<?php echo "A"; ?>
																		</span>
												<?php } ?>
											</td>
											<td align="center">
												<?php if ($row['fiber_note'] != "") {
													echo $row['fiber_note'];
												} ?>
											</td>
										</tr>
									<?php } ?>
									<?php if (in_array("FABRIC COUNT", $detail)) { ?>
										<tr>
											<td align="left">
												<?php if (in_array("FABRIC COUNT", $detail)) {
													echo "FABRIC COUNT";
												} ?>
											</td>
											<td align="center">
												<?php if ($row['stat_fc'] == "DISPOSISI") { ?> <span
														class='label bg-yellow blink_me'>
														<?php echo "DISPOSISI"; ?>
													</span>
												<?php } else if ($row['stat_fc'] == "FAIL") { ?> <span
															class='label bg-red blink_me'>
														<?php echo "FAIL"; ?>
														</span>
												<?php } else if ($row['stat_fc'] == "PASS") { ?> <span class='label bg-green'>
														<?php echo "PASS"; ?>
															</span>
												<?php } else if ($row['stat_fc'] == "R") { ?> <span class='label bg-orange'>
														<?php echo "R"; ?>
																</span>
												<?php } else if ($row['stat_fc'] == "RANDOM") { ?> <span class='label bg-maroon'>
														<?php echo "RANDOM"; ?>
																	</span>
												<?php } else if ($row['stat_fc'] == "A") { ?> <span class='label bg-teal'>
														<?php echo "A"; ?>
																		</span>
												<?php } ?>
											</td>
											<td align="center">
												<?php if ($row['fc_note'] != "") {
													echo $row['fc_note'];
												} ?>
											</td>
										</tr>
									<?php } ?>
									<?php if (in_array("BOW & SKEW", $detail)) { ?>
										<tr>
											<td align="left">
												<?php if (in_array("BOW & SKEW", $detail)) {
													echo "BOW & SKEW";
												} ?>
											</td>
											<td align="center">
												<?php if ($row['stat_bsk'] == "DISPOSISI") { ?> <span
														class='label bg-yellow blink_me'>
														<?php echo "DISPOSISI"; ?>
													</span>
												<?php } else if ($row['stat_bsk'] == "FAIL") { ?> <span
															class='label bg-red blink_me'>
														<?php echo "FAIL"; ?>
														</span>
												<?php } else if ($row['stat_bsk'] == "PASS") { ?> <span class='label bg-green'>
														<?php echo "PASS"; ?>
															</span>
												<?php } else if ($row['stat_bsk'] == "R") { ?> <span class='label bg-orange'>
														<?php echo "R"; ?>
																</span>
												<?php } else if ($row['stat_bsk'] == "RANDOM") { ?> <span class='label bg-maroon'>
														<?php echo "RANDOM"; ?>
																	</span>
												<?php } else if ($row['stat_bsk'] == "A") { ?> <span class='label bg-teal'>
														<?php echo "A"; ?>
																		</span>
												<?php } ?>
											</td>
											<td align="center">
												<?php if ($row['bas_note'] != "") {
													echo $row['bas_note'];
												} ?>
											</td>
										</tr>
									<?php } ?>
									<?php if (in_array("PILLING MARTINDLE", $detail)) { ?>
										<tr>
											<td align="left">
												<?php if (in_array("PILLING MARTINDLE", $detail)) {
													echo "PILLING MARTINDLE";
												} ?>
											</td>
											<td align="center">
												<?php if ($row['stat_pm'] == "DISPOSISI") { ?> <span
														class='label bg-yellow blink_me'>
														<?php echo "DISPOSISI"; ?>
													</span>
												<?php } else if ($row['stat_pm'] == "FAIL") { ?> <span
															class='label bg-red blink_me'>
														<?php echo "FAIL"; ?>
														</span>
												<?php } else if ($row['stat_pm'] == "MARGINAL PASS") { ?> <span
																class='label bg-purple'>
														<?php echo "MARGINAL PASS"; ?>
															</span>
												<?php } else if ($row['stat_pm'] == "DATA") { ?> <span class='label bg-blue'>
														<?php echo "DATA"; ?>
																</span>
												<?php } else if ($row['stat_pm'] == "PASS") { ?> <span class='label bg-green'>
														<?php echo "PASS"; ?>
																	</span>
												<?php } else if ($row['stat_pm'] == "R") { ?> <span class='label bg-orange'>
														<?php echo "R"; ?>
																		</span>
												<?php } else if ($row['stat_pm'] == "RANDOM") { ?> <span class='label bg-maroon'>
														<?php echo "RANDOM"; ?>
																			</span>
												<?php } else if ($row['stat_pm'] == "A") { ?> <span class='label bg-teal'>
														<?php echo "A"; ?>
																				</span>
												<?php } ?>
											</td>
											<td align="center">
												<?php if ($row['pillm_note'] != "") {
													echo $row['pillm_note'];
												} ?>
											</td>
										</tr>
									<?php } ?>
									<?php if (in_array("PILLING LOCUS", $detail)) { ?>
										<tr>
											<td align="left">
												<?php if (in_array("PILLING LOCUS", $detail)) {
													echo "PILLING LOCUS";
												} ?>
											</td>
											<td align="center">
												<?php if ($row['stat_pl'] == "DISPOSISI") { ?> <span
														class='label bg-yellow blink_me'>
														<?php echo "DISPOSISI"; ?>
													</span>
												<?php } else if ($row['stat_pl'] == "FAIL") { ?> <span
															class='label bg-red blink_me'>
														<?php echo "FAIL"; ?>
														</span>
												<?php } else if ($row['stat_pl'] == "PASS") { ?> <span class='label bg-green'>
														<?php echo "PASS"; ?>
															</span>
												<?php } else if ($row['stat_pl'] == "R") { ?> <span class='label bg-orange'>
														<?php echo "R"; ?>
																</span>
												<?php } else if ($row['stat_pl'] == "RANDOM") { ?> <span class='label bg-maroon'>
														<?php echo "RANDOM"; ?>
																	</span>
												<?php } else if ($row['stat_pl'] == "A") { ?> <span class='label bg-teal'>
														<?php echo "A"; ?>
																		</span>
												<?php } ?>
											</td>
											<td align="center">
												<?php if ($row['pilll_note'] != "") {
													echo $row['pilll_note'];
												} ?>
											</td>
										</tr>
									<?php } ?>
									<?php if (in_array("FABRIC WEIGHT & SHRINKAGE & SPIRALITY", $detail)) { ?>
										<tr>
											<td align="left">
												<?php if (in_array("FABRIC WEIGHT & SHRINKAGE & SPIRALITY", $detail)) {
													echo "FABRIC WEIGHT";
												} ?>
											</td>
											<td align="center">
												<?php if ($row['stat_fwss2'] == "DISPOSISI") { ?> <span
														class='label bg-yellow blink_me'>
														<?php echo "DISPOSISI"; ?>
													</span>
												<?php } else if ($row['stat_fwss2'] == "FAIL") { ?> <span
															class='label bg-red blink_me'>
														<?php echo "FAIL"; ?>
														</span>
												<?php } else if ($row['stat_fwss2'] == "MARGINAL PASS") { ?> <span
																class='label bg-purple'>
														<?php echo "MARGINAL PASS"; ?>
															</span>
												<?php } else if ($row['stat_fwss2'] == "DATA") { ?> <span class='label bg-blue'>
														<?php echo "DATA"; ?>
																</span>
												<?php } else if ($row['stat_fwss2'] == "PASS") { ?> <span class='label bg-green'>
														<?php echo "PASS"; ?>
																	</span>
												<?php } else if ($row['stat_fwss2'] == "R") { ?> <span class='label bg-orange'>
														<?php echo "R"; ?>
																		</span>
												<?php } else if ($row['stat_fwss2'] == "RANDOM") { ?> <span class='label bg-maroon'>
														<?php echo "RANDOM"; ?>
																			</span>
												<?php } else if ($row['stat_fwss2'] == "A") { ?> <span class='label bg-teal'>
														<?php echo "A"; ?>
																				</span>
												<?php } ?>
											</td>
											<td align="center">
												<?php if ($row['fwe_note'] != "") {
													echo $row['fwe_note'];
												} ?>
											</td>
										</tr>
									<?php } ?>
									<?php if (in_array("FABRIC WEIGHT & SHRINKAGE & SPIRALITY", $detail)) { ?>
										<tr>
											<td align="left">
												<?php if (in_array("FABRIC WEIGHT & SHRINKAGE & SPIRALITY", $detail)) {
													echo "FABRIC WIDTH";
												} ?>
											</td>
											<td align="center">
												<?php if ($row['stat_fwss3'] == "DISPOSISI") { ?> <span
														class='label bg-yellow blink_me'>
														<?php echo "DISPOSISI"; ?>
													</span>
												<?php } else if ($row['stat_fwss3'] == "FAIL") { ?> <span
															class='label bg-red blink_me'>
														<?php echo "FAIL"; ?>
														</span>
												<?php } else if ($row['stat_fwss3'] == "MARGINAL PASS") { ?> <span
																class='label bg-purple'>
														<?php echo "MARGINAL PASS"; ?>
															</span>
												<?php } else if ($row['stat_fwss3'] == "DATA") { ?> <span class='label bg-blue'>
														<?php echo "DATA"; ?>
																</span>
												<?php } else if ($row['stat_fwss3'] == "PASS") { ?> <span class='label bg-green'>
														<?php echo "PASS"; ?>
																	</span>
												<?php } else if ($row['stat_fwss3'] == "R") { ?> <span class='label bg-orange'>
														<?php echo "R"; ?>
																		</span>
												<?php } else if ($row['stat_fwss3'] == "RANDOM") { ?> <span class='label bg-maroon'>
														<?php echo "RANDOM"; ?>
																			</span>
												<?php } else if ($row['stat_fwss3'] == "A") { ?> <span class='label bg-teal'>
														<?php echo "A"; ?>
																				</span>
												<?php } ?>
											</td>
											<td align="center">
												<?php if ($row['fwi_note'] != "") {
													echo $row['fwi_note'];
												} ?>
											</td>
										</tr>
									<?php } ?>
									<?php if (in_array("FABRIC WEIGHT & SHRINKAGE & SPIRALITY", $detail)) { ?>
										<tr>
											<td align="left">
												<?php if (in_array("FABRIC WEIGHT & SHRINKAGE & SPIRALITY", $detail)) {
													echo "SHRINKAGE & SPIRALITY";
												} ?>
											</td>
											<td align="center">
												<?php if ($row['stat_fwss'] == "DISPOSISI") { ?> <span
														class='label bg-yellow blink_me'>
														<?php echo "DISPOSISI"; ?>
													</span>
												<?php } else if ($row['stat_fwss'] == "FAIL") { ?> <span
															class='label bg-red blink_me'>
														<?php echo "FAIL"; ?>
														</span>
												<?php } else if ($row['stat_fwss'] == "MARGINAL PASS") { ?> <span
																class='label bg-purple'>
														<?php echo "MARGINAL PASS"; ?>
															</span>
												<?php } else if ($row['stat_fwss'] == "DATA") { ?> <span class='label bg-blue'>
														<?php echo "DATA"; ?>
																</span>
												<?php } else if ($row['stat_fwss'] == "PASS") { ?> <span class='label bg-green'>
														<?php echo "PASS"; ?>
																	</span>
												<?php } else if ($row['stat_fwss'] == "R") { ?> <span class='label bg-orange'>
														<?php echo "R"; ?>
																		</span>
												<?php } else if ($row['stat_fwss'] == "RANDOM") { ?> <span class='label bg-maroon'>
														<?php echo "RANDOM"; ?>
																			</span>
												<?php } else if ($row['stat_fwss'] == "A") { ?> <span class='label bg-teal'>
														<?php echo "A"; ?>
																				</span>
												<?php } ?>
											</td>
											<td align="center">
												<?php if ($row['sns_note'] != "") {
													echo $row['sns_note'];
												} ?>
											</td>
										</tr>
									<?php } ?>
									<?php if (in_array("PILLING BOX", $detail)) { ?>
										<tr>
											<td align="left">
												<?php if (in_array("PILLING BOX", $detail)) {
													echo "PILLING BOX";
												} ?>
											</td>
											<td align="center">
												<?php if ($row['stat_pb'] == "DISPOSISI") { ?> <span
														class='label bg-yellow blink_me'>
														<?php echo "DISPOSISI"; ?>
													</span>
												<?php } else if ($row['stat_pb'] == "FAIL") { ?> <span
															class='label bg-red blink_me'>
														<?php echo "FAIL"; ?>
														</span>
												<?php } else if ($row['stat_pb'] == "PASS") { ?> <span class='label bg-green'>
														<?php echo "PASS"; ?>
															</span>
												<?php } else if ($row['stat_pb'] == "R") { ?> <span class='label bg-orange'>
														<?php echo "R"; ?>
																</span>
												<?php } else if ($row['stat_pb'] == "RANDOM") { ?> <span class='label bg-maroon'>
														<?php echo "RANDOM"; ?>
																	</span>
												<?php } else if ($row['stat_pb'] == "A") { ?> <span class='label bg-teal'>
														<?php echo "A"; ?>
																		</span>
												<?php } ?>
											</td>
											<td align="center">
												<?php if ($row['pillb_note'] != "") {
													echo $row['pillb_note'];
												} ?>
											</td>
										</tr>
									<?php } ?>
									<?php if (in_array("PILLING RANDOM TUMBLER", $detail)) { ?>
										<tr>
											<td align="left">
												<?php if (in_array("PILLING RANDOM TUMBLER", $detail)) {
													echo "PILLING RANDOM TUMBLER";
												} ?>
											</td>
											<td align="center">
												<?php if ($row['stat_prt'] == "DISPOSISI") { ?> <span
														class='label bg-yellow blink_me'>
														<?php echo "DISPOSISI"; ?>
													</span>
												<?php } else if ($row['stat_prt'] == "FAIL") { ?> <span
															class='label bg-red blink_me'>
														<?php echo "FAIL"; ?>
														</span>
												<?php } else if ($row['stat_prt'] == "PASS") { ?> <span class='label bg-green'>
														<?php echo "PASS"; ?>
															</span>
												<?php } else if ($row['stat_prt'] == "R") { ?> <span class='label bg-orange'>
														<?php echo "R"; ?>
																</span>
												<?php } else if ($row['stat_prt'] == "RANDOM") { ?> <span class='label bg-maroon'>
														<?php echo "RANDOM"; ?>
																	</span>
												<?php } else if ($row['stat_prt'] == "A") { ?> <span class='label bg-teal'>
														<?php echo "A"; ?>
																		</span>
												<?php } ?>
											</td>
											<td align="center">
												<?php if ($row['pillr_note'] != "") {
													echo $row['pillr_note'];
												} ?>
											</td>
										</tr>
									<?php } ?>
									<?php if (in_array("ABRATION", $detail)) { ?>
										<tr>
											<td align="left">
												<?php if (in_array("ABRATION", $detail)) {
													echo "ABRATION";
												} ?>
											</td>
											<td align="center">
												<?php if ($row['stat_abr'] == "DISPOSISI") { ?> <span
														class='label bg-yellow blink_me'>
														<?php echo "DISPOSISI"; ?>
													</span>
												<?php } else if ($row['stat_abr'] == "FAIL") { ?> <span
															class='label bg-red blink_me'>
														<?php echo "FAIL"; ?>
														</span>
												<?php } else if ($row['stat_abr'] == "PASS") { ?> <span class='label bg-green'>
														<?php echo "PASS"; ?>
															</span>
												<?php } else if ($row['stat_abr'] == "R") { ?> <span class='label bg-orange'>
														<?php echo "R"; ?>
																</span>
												<?php } else if ($row['stat_abr'] == "RANDOM") { ?> <span class='label bg-maroon'>
														<?php echo "RANDOM"; ?>
																	</span>
												<?php } else if ($row['stat_abr'] == "A") { ?> <span class='label bg-teal'>
														<?php echo "A"; ?>
																		</span>
												<?php } ?>
											</td>
											<td align="center">
												<?php if ($row['abr_note'] != "") {
													echo $row['abr_note'];
												} ?>
											</td>
										</tr>
									<?php } ?>
									<?php if (in_array("SNAGGING MACE", $detail)) { ?>
										<tr>
											<td align="left">
												<?php if (in_array("SNAGGING MACE", $detail)) {
													echo "SNAGGING MACE";
												} ?>
											</td>
											<td align="center">
												<?php if ($row['stat_sm'] == "DISPOSISI") { ?> <span
														class='label bg-yellow blink_me'>
														<?php echo "DISPOSISI"; ?>
													</span>
												<?php } else if ($row['stat_sm'] == "FAIL") { ?> <span
															class='label bg-red blink_me'>
														<?php echo "FAIL"; ?>
														</span>
												<?php } else if ($row['stat_sm'] == "PASS") { ?> <span class='label bg-green'>
														<?php echo "PASS"; ?>
															</span>
												<?php } else if ($row['stat_sm'] == "R") { ?> <span class='label bg-orange'>
														<?php echo "R"; ?>
																</span>
												<?php } else if ($row['stat_sm'] == "RANDOM") { ?> <span class='label bg-maroon'>
														<?php echo "RANDOM"; ?>
																	</span>
												<?php } else if ($row['stat_sm'] == "A") { ?> <span class='label bg-teal'>
														<?php echo "A"; ?>
																		</span>
												<?php } ?>
											</td>
											<td align="center">
												<?php if ($row['snam_note'] != "") {
													echo $row['snam_note'];
												} ?>
											</td>
										</tr>
									<?php } ?>
									<?php if (in_array("SNAGGING POD", $detail)) { ?>
										<tr>
											<td align="left">
												<?php if (in_array("SNAGGING POD", $detail)) {
													echo "SNAGGING POD";
												} ?>
											</td>
											<td align="center">
												<?php if ($row['stat_sp'] == "DISPOSISI") { ?> <span
														class='label bg-yellow blink_me'>
														<?php echo "DISPOSISI"; ?>
													</span>
												<?php } else if ($row['stat_sp'] == "FAIL") { ?> <span
															class='label bg-red blink_me'>
														<?php echo "FAIL"; ?>
														</span>
												<?php } else if ($row['stat_sp'] == "PASS") { ?> <span class='label bg-green'>
														<?php echo "PASS"; ?>
															</span>
												<?php } else if ($row['stat_sp'] == "R") { ?> <span class='label bg-orange'>
														<?php echo "R"; ?>
																</span>
												<?php } else if ($row['stat_sp'] == "RANDOM") { ?> <span class='label bg-maroon'>
														<?php echo "RANDOM"; ?>
																	</span>
												<?php } else if ($row['stat_sp'] == "A") { ?> <span class='label bg-teal'>
														<?php echo "A"; ?>
																		</span>
												<?php } ?>
											</td>
											<td align="center">
												<?php if ($row['snap_note'] != "") {
													echo $row['snap_note'];
												} ?>
											</td>
										</tr>
									<?php } ?>
									<?php if (in_array("BEAN BAG", $detail)) { ?>
										<tr>
											<td align="left">
												<?php if (in_array("BEAN BAG", $detail)) {
													echo "BEAN BAG";
												} ?>
											</td>
											<td align="center">
												<?php if ($row['stat_sb'] == "DISPOSISI") { ?> <span
														class='label bg-yellow blink_me'>
														<?php echo "DISPOSISI"; ?>
													</span>
												<?php } else if ($row['stat_sb'] == "FAIL") { ?> <span
															class='label bg-red blink_me'>
														<?php echo "FAIL"; ?>
														</span>
												<?php } else if ($row['stat_sb'] == "PASS") { ?> <span class='label bg-green'>
														<?php echo "PASS"; ?>
															</span>
												<?php } else if ($row['stat_sb'] == "R") { ?> <span class='label bg-orange'>
														<?php echo "R"; ?>
																</span>
												<?php } else if ($row['stat_sb'] == "RANDOM") { ?> <span class='label bg-maroon'>
														<?php echo "RANDOM"; ?>
																	</span>
												<?php } else if ($row['stat_sb'] == "A") { ?> <span class='label bg-teal'>
														<?php echo "A"; ?>
																		</span>
												<?php } ?>
											</td>
											<td align="center">
												<?php if ($row['snab_note'] != "") {
													echo $row['snab_note'];
												} ?>
											</td>
										</tr>
									<?php } ?>
									<?php if ($row['bs_instron'] != "") { ?>
										<tr>
											<td align="left">
												<?php if (in_array("BURSTING STRENGTH", $detail)) {
													echo "BURSTING STRENGTH (INSTRON)";
												} ?>
											</td>
											<td align="center">
												<?php if ($row['stat_bs2'] == "DISPOSISI") { ?> <span
														class='label bg-yellow blink_me'>
														<?php echo "DISPOSISI"; ?>
													</span>
												<?php } else if ($row['stat_bs2'] == "FAIL") { ?> <span
															class='label bg-red blink_me'>
														<?php echo "FAIL"; ?>
														</span>
												<?php } else if ($row['stat_bs2'] == "MARGINAL PASS") { ?> <span
																class='label bg-purple'>
														<?php echo "MARGINAL PASS"; ?>
															</span>
												<?php } else if ($row['stat_bs2'] == "DATA") { ?> <span class='label bg-blue'>
														<?php echo "DATA"; ?>
																</span>
												<?php } else if ($row['stat_bs2'] == "PASS") { ?> <span class='label bg-green'>
														<?php echo "PASS"; ?>
																	</span>
												<?php } else if ($row['stat_bs2'] == "R") { ?> <span class='label bg-orange'>
														<?php echo "R"; ?>
																		</span>
												<?php } else if ($row['stat_bs2'] == "RANDOM") { ?> <span class='label bg-maroon'>
														<?php echo "RANDOM"; ?>
																			</span>
												<?php } else if ($row['stat_bs2'] == "A") { ?> <span class='label bg-teal'>
														<?php echo "A"; ?>
																				</span>
												<?php } ?>
											</td>
											<td align="center">
												<?php if ($row['burs_note'] != "") {
													echo $row['burs_note'];
												} ?>
											</td>
										</tr>
									<?php } ?>
									<?php if ($row['bs_mullen'] != "") { ?>
										<tr>
											<td align="left">
												<?php if (in_array("BURSTING STRENGTH", $detail)) {
													echo "BURSTING STRENGTH (MULLEN)";
												} ?>
											</td>
											<td align="center">
												<?php if ($row['stat_bs3'] == "DISPOSISI") { ?> <span
														class='label bg-yellow blink_me'>
														<?php echo "DISPOSISI"; ?>
													</span>
												<?php } else if ($row['stat_bs3'] == "FAIL") { ?> <span
															class='label bg-red blink_me'>
														<?php echo "FAIL"; ?>
														</span>
												<?php } else if ($row['stat_bs3'] == "MARGINAL PASS") { ?> <span
																class='label bg-purple'>
														<?php echo "MARGINAL PASS"; ?>
															</span>
												<?php } else if ($row['stat_bs3'] == "DATA") { ?> <span class='label bg-blue'>
														<?php echo "DATA"; ?>
																</span>
												<?php } else if ($row['stat_bs3'] == "PASS") { ?> <span class='label bg-green'>
														<?php echo "PASS"; ?>
																	</span>
												<?php } else if ($row['stat_bs3'] == "R") { ?> <span class='label bg-orange'>
														<?php echo "R"; ?>
																		</span>
												<?php } else if ($row['stat_bs3'] == "RANDOM") { ?> <span class='label bg-maroon'>
														<?php echo "RANDOM"; ?>
																			</span>
												<?php } else if ($row['stat_bs3'] == "A") { ?> <span class='label bg-teal'>
														<?php echo "A"; ?>
																				</span>
												<?php } ?>
											</td>
											<td align="center">
												<?php if ($row['burs_note'] != "") {
													echo $row['burs_note'];
												} ?>
											</td>
										</tr>
									<?php } ?>
									<?php if ($row['bs_tru'] != "") { ?>
										<tr>
											<td align="left">
												<?php if (in_array("BURSTING STRENGTH", $detail)) {
													echo "BURSTING STRENGTH (TRU)";
												} ?>
											</td>
											<td align="center">
												<?php if ($row['stat_bs'] == "DISPOSISI") { ?> <span
														class='label bg-yellow blink_me'>
														<?php echo "DISPOSISI"; ?>
													</span>
												<?php } else if ($row['stat_bs'] == "FAIL") { ?> <span
															class='label bg-red blink_me'>
														<?php echo "FAIL"; ?>
														</span>
												<?php } else if ($row['stat_bs'] == "MARGINAL PASS") { ?> <span
																class='label bg-purple'>
														<?php echo "MARGINAL PASS"; ?>
															</span>
												<?php } else if ($row['stat_bs'] == "DATA") { ?> <span class='label bg-blue'>
														<?php echo "DATA"; ?>
																</span>
												<?php } else if ($row['stat_bs'] == "PASS") { ?> <span class='label bg-green'>
														<?php echo "PASS"; ?>
																	</span>
												<?php } else if ($row['stat_bs'] == "R") { ?> <span class='label bg-orange'>
														<?php echo "R"; ?>
																		</span>
												<?php } else if ($row['stat_bs'] == "RANDOM") { ?> <span class='label bg-maroon'>
														<?php echo "RANDOM"; ?>
																			</span>
												<?php } else if ($row['stat_bs'] == "A") { ?> <span class='label bg-teal'>
														<?php echo "A"; ?>
																				</span>
												<?php } ?>
											</td>
											<td align="center">
												<?php if ($row['burs_note'] != "") {
													echo $row['burs_note'];
												} ?>
											</td>
										</tr>
									<?php } ?>
									<?php if (in_array("THICKNESS", $detail)) { ?>
										<tr>
											<td align="left">
												<?php if (in_array("THICKNESS", $detail)) {
													echo "THICKNESS";
												} ?>
											</td>
											<td align="center">
												<?php if ($row['stat_th'] == "DISPOSISI") { ?> <span
														class='label bg-yellow blink_me'>
														<?php echo "DISPOSISI"; ?>
													</span>
												<?php } else if ($row['stat_th'] == "FAIL") { ?> <span
															class='label bg-red blink_me'>
														<?php echo "FAIL"; ?>
														</span>
												<?php } else if ($row['stat_th'] == "PASS") { ?> <span class='label bg-green'>
														<?php echo "PASS"; ?>
															</span>
												<?php } else if ($row['stat_th'] == "R") { ?> <span class='label bg-orange'>
														<?php echo "R"; ?>
																</span>
												<?php } else if ($row['stat_th'] == "RANDOM") { ?> <span class='label bg-maroon'>
														<?php echo "RANDOM"; ?>
																	</span>
												<?php } else if ($row['stat_th'] == "A") { ?> <span class='label bg-teal'>
														<?php echo "A"; ?>
																		</span>
												<?php } ?>
											</td>
											<td align="center">
												<?php if ($row['thick_note'] != "") {
													echo $row['thick_note'];
												} ?>
											</td>
										</tr>
									<?php } ?>
									<?php if (in_array("STRETCH & RECOVERY", $detail)) { ?>
										<tr>
											<td align="left">
												<?php if (in_array("STRETCH & RECOVERY", $detail)) {
													echo "STRETCH & RECOVERY";
												} ?>
											</td>
											<td align="center">
												<?php if ($row['stat_sr'] == "DISPOSISI") { ?> <span
														class='label bg-yellow blink_me'>
														<?php echo "DISPOSISI"; ?>
													</span>
												<?php } else if ($row['stat_sr'] == "FAIL") { ?> <span
															class='label bg-red blink_me'>
														<?php echo "FAIL"; ?>
														</span>
												<?php } else if ($row['stat_sr'] == "MARGINAL PASS") { ?> <span
																class='label bg-purple'>
														<?php echo "MARGINAL PASS"; ?>
															</span>
												<?php } else if ($row['stat_sr'] == "DATA") { ?> <span class='label bg-blue'>
														<?php echo "DATA"; ?>
																</span>
												<?php } else if ($row['stat_sr'] == "PASS") { ?> <span class='label bg-green'>
														<?php echo "PASS"; ?>
																	</span>
												<?php } else if ($row['stat_sr'] == "R") { ?> <span class='label bg-orange'>
														<?php echo "R"; ?>
																		</span>
												<?php } else if ($row['stat_sr'] == "RANDOM") { ?> <span class='label bg-maroon'>
														<?php echo "RANDOM"; ?>
																			</span>
												<?php } else if ($row['stat_sr'] == "A") { ?> <span class='label bg-teal'>
														<?php echo "A"; ?>
																				</span>
												<?php } ?>
											</td>
											<td align="center">
												<?php if ($row['stretch_note'] != "" or $row['recover_note'] != "") {
													echo $row['stretch_note'] . " " . $row['recover_note'];
												} ?>
											</td>
										</tr>
									<?php } ?>
									<?php if (in_array("GROWTH", $detail)) { ?>
										<tr>
											<td align="left">
												<?php if (in_array("GROWTH", $detail)) {
													echo "GROWTH";
												} ?>
											</td>
											<td align="center">
												<?php if ($row['stat_gr'] == "DISPOSISI") { ?> <span
														class='label bg-yellow blink_me'>
														<?php echo "DISPOSISI"; ?>
													</span>
												<?php } else if ($row['stat_gr'] == "FAIL") { ?> <span
															class='label bg-red blink_me'>
														<?php echo "FAIL"; ?>
														</span>
												<?php } else if ($row['stat_gr'] == "PASS") { ?> <span class='label bg-green'>
														<?php echo "PASS"; ?>
															</span>
												<?php } else if ($row['stat_gr'] == "R") { ?> <span class='label bg-orange'>
														<?php echo "R"; ?>
																</span>
												<?php } else if ($row['stat_gr'] == "RANDOM") { ?> <span class='label bg-maroon'>
														<?php echo "RANDOM"; ?>
																	</span>
												<?php } else if ($row['stat_gr'] == "A") { ?> <span class='label bg-teal'>
														<?php echo "A"; ?>
																		</span>
												<?php } ?>
											</td>
											<td align="center">
												<?php if ($row['growth_note'] != "") {
													echo $row['growth_note'];
												} ?>
											</td>
										</tr>
									<?php } ?>
									<?php if (in_array("APPEARANCE", $detail)) { ?>
										<tr>
											<td align="left">
												<?php if (in_array("APPEARANCE", $detail)) {
													echo "APPEARANCE";
												} ?>
											</td>
											<td align="center">
												<?php if ($row['stat_ap'] == "DISPOSISI") { ?> <span
														class='label bg-yellow blink_me'>
														<?php echo "DISPOSISI"; ?>
													</span>
												<?php } else if ($row['stat_ap'] == "FAIL") { ?> <span
															class='label bg-red blink_me'>
														<?php echo "FAIL"; ?>
														</span>
												<?php } else if ($row['stat_ap'] == "MARGINAL PASS") { ?> <span
																class='label bg-purple'>
														<?php echo "MARGINAL PASS"; ?>
															</span>
												<?php } else if ($row['stat_ap'] == "DATA") { ?> <span class='label bg-blue'>
														<?php echo "DATA"; ?>
																</span>
												<?php } else if ($row['stat_ap'] == "PASS") { ?> <span class='label bg-green'>
														<?php echo "PASS"; ?>
																	</span>
												<?php } else if ($row['stat_ap'] == "R") { ?> <span class='label bg-orange'>
														<?php echo "R"; ?>
																		</span>
												<?php } else if ($row['stat_ap'] == "RANDOM") { ?> <span class='label bg-maroon'>
														<?php echo "RANDOM"; ?>
																			</span>
												<?php } else if ($row['stat_ap'] == "A") { ?> <span class='label bg-teal'>
														<?php echo "A"; ?>
																				</span>
												<?php } ?>
											</td>
											<td align="center">
												<?php if ($row['apper_note'] != "") {
													echo $row['apper_note'];
												} ?>
											</td>
										</tr>
									<?php } ?>
									<?php if (in_array("HEAT SHRINKAGE", $detail)) { ?>
										<tr>
											<td align="left">
												<?php if (in_array("HEAT SHRINKAGE", $detail)) {
													echo "HEAT SHRINKAGE";
												} ?>
											</td>
											<td align="center">
												<?php if ($row['stat_hs'] == "DISPOSISI") { ?> <span
														class='label bg-yellow blink_me'>
														<?php echo "DISPOSISI"; ?>
													</span>
												<?php } else if ($row['stat_hs'] == "FAIL") { ?> <span
															class='label bg-red blink_me'>
														<?php echo "FAIL"; ?>
														</span>
												<?php } else if ($row['stat_hs'] == "PASS") { ?> <span class='label bg-green'>
														<?php echo "PASS"; ?>
															</span>
												<?php } else if ($row['stat_hs'] == "R") { ?> <span class='label bg-orange'>
														<?php echo "R"; ?>
																</span>
												<?php } else if ($row['stat_hs'] == "RANDOM") { ?> <span class='label bg-maroon'>
														<?php echo "RANDOM"; ?>
																	</span>
												<?php } else if ($row['stat_hs'] == "A") { ?> <span class='label bg-teal'>
														<?php echo "A"; ?>
																		</span>
												<?php } ?>
											</td>
											<td align="center">
												<?php if ($row['h_shrinkage_note'] != "") {
													echo $row['h_shrinkage_note'];
												} ?>
											</td>
										</tr>
									<?php } ?>
									<?php if (in_array("FIBRE/FUZZ", $detail)) { ?>
										<tr>
											<td align="left">
												<?php if (in_array("FIBRE/FUZZ", $detail)) {
													echo "FIBRE/FUZZ";
												} ?>
											</td>
											<td align="center">
												<?php if ($row['stat_ff'] == "DISPOSISI") { ?> <span
														class='label bg-yellow blink_me'>
														<?php echo "DISPOSISI"; ?>
													</span>
												<?php } else if ($row['stat_ff'] == "FAIL") { ?> <span
															class='label bg-red blink_me'>
														<?php echo "FAIL"; ?>
														</span>
												<?php } else if ($row['stat_ff'] == "PASS") { ?> <span class='label bg-green'>
														<?php echo "PASS"; ?>
															</span>
												<?php } else if ($row['stat_ff'] == "R") { ?> <span class='label bg-orange'>
														<?php echo "R"; ?>
																</span>
												<?php } else if ($row['stat_ff'] == "RANDOM") { ?> <span class='label bg-maroon'>
														<?php echo "RANDOM"; ?>
																	</span>
												<?php } else if ($row['stat_ff'] == "A") { ?> <span class='label bg-teal'>
														<?php echo "A"; ?>
																		</span>
												<?php } ?>
											</td>
											<td align="center">
												<?php if ($row['fibre_note'] != "") {
													echo $row['fibre_note'];
												} ?>
											</td>
										</tr>
									<?php } ?>
									<?php if (in_array("WICKING", $detail2)) { ?>
										<tr>
											<td align="left">
												<?php if (in_array("WICKING", $detail2)) {
													echo "WICKING";
												} ?>
											</td>
											<td align="center">
												<?php if ($row['stat_wic'] == "DISPOSISI") { ?> <span
														class='label bg-yellow blink_me'>
														<?php echo "DISPOSISI"; ?>
													</span>
												<?php } else if ($row['stat_wic'] == "FAIL") { ?> <span
															class='label bg-red blink_me'>
														<?php echo "FAIL"; ?>
														</span>
												<?php } else if ($row['stat_wic'] == "MARGINAL PASS") { ?> <span
																class='label bg-purple'>
														<?php echo "MARGINAL PASS"; ?>
															</span>
												<?php } else if ($row['stat_wic'] == "DATA") { ?> <span class='label bg-blue'>
														<?php echo "DATA"; ?>
																</span>
												<?php } else if ($row['stat_wic'] == "PASS") { ?> <span class='label bg-green'>
														<?php echo "PASS"; ?>
																	</span>
												<?php } else if ($row['stat_wic'] == "R") { ?> <span class='label bg-orange'>
														<?php echo "R"; ?>
																		</span>
												<?php } else if ($row['stat_wic'] == "RANDOM") { ?> <span class='label bg-maroon'>
														<?php echo "RANDOM"; ?>
																			</span>
												<?php } else if ($row['stat_wic'] == "A") { ?> <span class='label bg-teal'>
														<?php echo "A"; ?>
																				</span>
												<?php } ?>
											</td>
											<td align="center">
												<?php if ($row['wick_note'] != "") {
													echo $row['wick_note'];
												} ?>
											</td>
										</tr>
									<?php } ?>
									<?php if (in_array("ABSORBENCY", $detail2)) { ?>
										<tr>
											<td align="left">
												<?php if (in_array("ABSORBENCY", $detail2)) {
													echo "ABSORBENCY";
												} ?>
											</td>
											<td align="center">
												<?php if ($row['stat_abs'] == "DISPOSISI") { ?> <span
														class='label bg-yellow blink_me'>
														<?php echo "DISPOSISI"; ?>
													</span>
												<?php } else if ($row['stat_abs'] == "FAIL") { ?> <span
															class='label bg-red blink_me'>
														<?php echo "FAIL"; ?>
														</span>
												<?php } else if ($row['stat_abs'] == "PASS") { ?> <span class='label bg-green'>
														<?php echo "PASS"; ?>
															</span>
												<?php } else if ($row['stat_abs'] == "R") { ?> <span class='label bg-orange'>
														<?php echo "R"; ?>
																</span>
												<?php } else if ($row['stat_abs'] == "RANDOM") { ?> <span class='label bg-maroon'>
														<?php echo "RANDOM"; ?>
																	</span>
												<?php } else if ($row['stat_abs'] == "A") { ?> <span class='label bg-teal'>
														<?php echo "A"; ?>
																		</span>
												<?php } ?>
											</td>
											<td align="center">
												<?php if ($row['absor_note'] != "") {
													echo $row['absor_note'];
												} ?>
											</td>
										</tr>
									<?php } ?>
									<?php if (in_array("DRYING TIME", $detail2)) { ?>
										<tr>
											<td align="left">
												<?php if (in_array("DRYING TIME", $detail2)) {
													echo "DRYING TIME";
												} ?>
											</td>
											<td align="center">
												<?php if ($row['stat_dry'] == "DISPOSISI") { ?> <span
														class='label bg-yellow blink_me'>
														<?php echo "DISPOSISI"; ?>
													</span>
												<?php } else if ($row['stat_dry'] == "FAIL") { ?> <span
															class='label bg-red blink_me'>
														<?php echo "FAIL"; ?>
														</span>
												<?php } else if ($row['stat_dry'] == "MARGINAL PASS") { ?> <span
																class='label bg-purple'>
														<?php echo "MARGINAL PASS"; ?>
															</span>
												<?php } else if ($row['stat_dry'] == "DATA") { ?> <span class='label bg-blue'>
														<?php echo "DATA"; ?>
																</span>
												<?php } else if ($row['stat_dry'] == "PASS") { ?> <span class='label bg-green'>
														<?php echo "PASS"; ?>
																	</span>
												<?php } else if ($row['stat_dry'] == "R") { ?> <span class='label bg-orange'>
														<?php echo "R"; ?>
																		</span>
												<?php } else if ($row['stat_dry'] == "RANDOM") { ?> <span class='label bg-maroon'>
														<?php echo "RANDOM"; ?>
																			</span>
												<?php } else if ($row['stat_dry'] == "A") { ?> <span class='label bg-teal'>
														<?php echo "A"; ?>
																				</span>
												<?php } ?>
											</td>
											<td align="center">
												<?php if ($row['dry_note'] != "") {
													echo $row['dry_note'];
												} ?>
											</td>
										</tr>
									<?php } ?>
									<?php if (in_array("WATER REPPELENT", $detail2)) { ?>
										<tr>
											<td align="left">
												<?php if (in_array("WATER REPPELENT", $detail2)) {
													echo "WATER REPPELENT";
												} ?>
											</td>
											<td align="center">
												<?php if ($row['stat_wp'] == "DISPOSISI") { ?> <span
														class='label bg-yellow blink_me'>
														<?php echo "DISPOSISI"; ?>
													</span>
												<?php } else if ($row['stat_wp'] == "FAIL") { ?> <span
															class='label bg-red blink_me'>
														<?php echo "FAIL"; ?>
														</span>
												<?php } else if ($row['stat_wp'] == "PASS") { ?> <span class='label bg-green'>
														<?php echo "PASS"; ?>
															</span>
												<?php } else if ($row['stat_wp'] == "R") { ?> <span class='label bg-orange'>
														<?php echo "R"; ?>
																</span>
												<?php } else if ($row['stat_wp'] == "RANDOM") { ?> <span class='label bg-maroon'>
														<?php echo "RANDOM"; ?>
																	</span>
												<?php } else if ($row['stat_wp'] == "A") { ?> <span class='label bg-teal'>
														<?php echo "A"; ?>
																		</span>
												<?php } ?>
											</td>
											<td align="center">
												<?php if ($row['repp_note'] != "") {
													echo $row['repp_note'];
												} ?>
											</td>
										</tr>
									<?php } ?>
									<?php if (in_array("PH", $detail2)) { ?>
										<tr>
											<td align="left">
												<?php if (in_array("PH", $detail2)) {
													echo "PH";
												} ?>
											</td>
											<td align="center">
												<?php if ($row['stat_ph'] == "DISPOSISI") { ?> <span
														class='label bg-yellow blink_me'>
														<?php echo "DISPOSISI"; ?>
													</span>
												<?php } else if ($row['stat_ph'] == "FAIL") { ?> <span
															class='label bg-red blink_me'>
														<?php echo "FAIL"; ?>
														</span>
												<?php } else if ($row['stat_ph'] == "MARGINAL PASS") { ?> <span
																class='label bg-purple'>
														<?php echo "MARGINAL PASS"; ?>
															</span>
												<?php } else if ($row['stat_ph'] == "DATA") { ?> <span class='label bg-blue'>
														<?php echo "DATA"; ?>
																</span>
												<?php } else if ($row['stat_ph'] == "PASS") { ?> <span class='label bg-green'>
														<?php echo "PASS"; ?>
																	</span>
												<?php } else if ($row['stat_ph'] == "R") { ?> <span class='label bg-orange'>
														<?php echo "R"; ?>
																		</span>
												<?php } else if ($row['stat_ph'] == "RANDOM") { ?> <span class='label bg-maroon'>
														<?php echo "RANDOM"; ?>
																			</span>
												<?php } else if ($row['stat_ph'] == "A") { ?> <span class='label bg-teal'>
														<?php echo "A"; ?>
																				</span>
												<?php } ?>
											</td>
											<td align="center">
												<?php if ($row['ph_note'] != "") {
													echo $row['ph_note'];
												} ?>
											</td>
										</tr>
									<?php } ?>
									<?php if (in_array("SOIL RELEASE", $detail2)) { ?>
										<tr>
											<td align="left">
												<?php if (in_array("SOIL RELEASE", $detail2)) {
													echo "SOIL RELEASE";
												} ?>
											</td>
											<td align="center">
												<?php if ($row['stat_sor'] == "DISPOSISI") { ?> <span
														class='label bg-yellow blink_me'>
														<?php echo "DISPOSISI"; ?>
													</span>
												<?php } else if ($row['stat_sor'] == "FAIL") { ?> <span
															class='label bg-red blink_me'>
														<?php echo "FAIL"; ?>
														</span>
												<?php } else if ($row['stat_sor'] == "PASS") { ?> <span class='label bg-green'>
														<?php echo "PASS"; ?>
															</span>
												<?php } else if ($row['stat_sor'] == "R") { ?> <span class='label bg-orange'>
														<?php echo "R"; ?>
																</span>
												<?php } else if ($row['stat_sor'] == "RANDOM") { ?> <span class='label bg-maroon'>
														<?php echo "RANDOM"; ?>
																	</span>
												<?php } else if ($row['stat_sor'] == "A") { ?> <span class='label bg-teal'>
														<?php echo "A"; ?>
																		</span>
												<?php } ?>
											</td>
											<td align="center">
												<?php if ($row['soil_note'] != "") {
													echo $row['soil_note'];
												} ?>
											</td>
										</tr>
									<?php } ?>
									<?php if (in_array("WASHING", $detail3)) { ?>
										<tr>
											<td align="left">
												<?php if (in_array("WASHING", $detail3)) {
													echo "WASHING";
												} ?>
											</td>
											<td align="center">
												<?php if ($row['stat_wf'] == "DISPOSISI") { ?> <span
														class='label bg-yellow blink_me'>
														<?php echo "DISPOSISI"; ?>
													</span>
												<?php } else if ($row['stat_wf'] == "FAIL") { ?> <span
															class='label bg-red blink_me'>
														<?php echo "FAIL"; ?>
														</span>
												<?php } else if ($row['stat_wf'] == "MARGINAL PASS") { ?> <span
																class='label bg-purple'>
														<?php echo "MARGINAL PASS"; ?>
															</span>
												<?php } else if ($row['stat_wf'] == "DATA") { ?> <span class='label bg-blue'>
														<?php echo "DATA"; ?>
																</span>
												<?php } else if ($row['stat_wf'] == "PASS") { ?> <span class='label bg-green'>
														<?php echo "PASS"; ?>
																	</span>
												<?php } else if ($row['stat_wf'] == "R") { ?> <span class='label bg-orange'>
														<?php echo "R"; ?>
																		</span>
												<?php } else if ($row['stat_wf'] == "RANDOM") { ?> <span class='label bg-maroon'>
														<?php echo "RANDOM"; ?>
																			</span>
												<?php } else if ($row['stat_wf'] == "A") { ?> <span class='label bg-teal'>
														<?php echo "A"; ?>
																				</span>
												<?php } ?>
											</td>
											<td align="center">
												<?php if ($row['wash_note'] != "") {
													echo $row['wash_note'];
												} ?>
											</td>
										</tr>
									<?php } ?>
									<?php if (in_array("PERSPIRATION ACID", $detail3)) { ?>
										<tr>
											<td align="left">
												<?php if (in_array("PERSPIRATION ACID", $detail3)) {
													echo "PERSPIRATION ACID";
												} ?>
											</td>
											<td align="center">
												<?php if ($row['stat_pac'] == "DISPOSISI") { ?> <span
														class='label bg-yellow blink_me'>
														<?php echo "DISPOSISI"; ?>
													</span>
												<?php } else if ($row['stat_pac'] == "FAIL") { ?> <span
															class='label bg-red blink_me'>
														<?php echo "FAIL"; ?>
														</span>
												<?php } else if ($row['stat_pac'] == "MARGINAL PASS") { ?> <span
																class='label bg-purple'>
														<?php echo "MARGINAL PASS"; ?>
															</span>
												<?php } else if ($row['stat_pac'] == "DATA") { ?> <span class='label bg-blue'>
														<?php echo "DATA"; ?>
																</span>
												<?php } else if ($row['stat_pac'] == "PASS") { ?> <span class='label bg-green'>
														<?php echo "PASS"; ?>
																	</span>
												<?php } else if ($row['stat_pac'] == "R") { ?> <span class='label bg-orange'>
														<?php echo "R"; ?>
																		</span>
												<?php } else if ($row['stat_pac'] == "RANDOM") { ?> <span class='label bg-maroon'>
														<?php echo "RANDOM"; ?>
																			</span>
												<?php } else if ($row['stat_pac'] == "A") { ?> <span class='label bg-teal'>
														<?php echo "A"; ?>
																				</span>
												<?php } ?>
											</td>
											<td align="center">
												<?php if ($row['acid_note'] != "") {
													echo $row['acid_note'];
												} ?>
											</td>
										</tr>
									<?php } ?>
									<?php if (in_array("PERSPIRATION ALKALINE", $detail3)) { ?>
										<tr>
											<td align="left">
												<?php if (in_array("PERSPIRATION ALKALINE", $detail3)) {
													echo "PERSPIRATION ALKALINE";
												} ?>
											</td>
											<td align="center">
												<?php if ($row['stat_pal'] == "DISPOSISI") { ?> <span
														class='label bg-yellow blink_me'>
														<?php echo "DISPOSISI"; ?>
													</span>
												<?php } else if ($row['stat_pal'] == "FAIL") { ?> <span
															class='label bg-red blink_me'>
														<?php echo "FAIL"; ?>
														</span>
												<?php } else if ($row['stat_pal'] == "MARGINAL PASS") { ?> <span
																class='label bg-purple'>
														<?php echo "MARGINAL PASS"; ?>
															</span>
												<?php } else if ($row['stat_pal'] == "DATA") { ?> <span class='label bg-blue'>
														<?php echo "DATA"; ?>
																</span>
												<?php } else if ($row['stat_pal'] == "PASS") { ?> <span class='label bg-green'>
														<?php echo "PASS"; ?>
																	</span>
												<?php } else if ($row['stat_pal'] == "R") { ?> <span class='label bg-orange'>
														<?php echo "R"; ?>
																		</span>
												<?php } else if ($row['stat_pal'] == "RANDOM") { ?> <span class='label bg-maroon'>
														<?php echo "RANDOM"; ?>
																			</span>
												<?php } else if ($row['stat_pal'] == "A") { ?> <span class='label bg-teal'>
														<?php echo "A"; ?>
																				</span>
												<?php } ?>
											</td>
											<td align="center">
												<?php if ($row['alkaline_note'] != "") {
													echo $row['alkaline_note'];
												} ?>
											</td>
										</tr>
									<?php } ?>
									<?php if (in_array("WATER", $detail3)) { ?>
										<tr>
											<td align="left">
												<?php if (in_array("WATER", $detail3)) {
													echo "WATER";
												} ?>
											</td>
											<td align="center">
												<?php if ($row['stat_wtr'] == "DISPOSISI") { ?> <span
														class='label bg-yellow blink_me'>
														<?php echo "DISPOSISI"; ?>
													</span>
												<?php } else if ($row['stat_wtr'] == "FAIL") { ?> <span
															class='label bg-red blink_me'>
														<?php echo "FAIL"; ?>
														</span>
												<?php } else if ($row['stat_wtr'] == "MARGINAL PASS") { ?> <span
																class='label bg-purple'>
														<?php echo "MARGINAL PASS"; ?>
															</span>
												<?php } else if ($row['stat_wtr'] == "DATA") { ?> <span class='label bg-blue'>
														<?php echo "DATA"; ?>
																</span>
												<?php } else if ($row['stat_wtr'] == "PASS") { ?> <span class='label bg-green'>
														<?php echo "PASS"; ?>
																	</span>
												<?php } else if ($row['stat_wtr'] == "R") { ?> <span class='label bg-orange'>
														<?php echo "R"; ?>
																		</span>
												<?php } else if ($row['stat_wtr'] == "RANDOM") { ?> <span class='label bg-maroon'>
														<?php echo "RANDOM"; ?>
																			</span>
												<?php } else if ($row['stat_wtr'] == "A") { ?> <span class='label bg-teal'>
														<?php echo "A"; ?>
																				</span>
												<?php } ?>
											</td>
											<td align="center">
												<?php if ($row['water_note'] != "") {
													echo $row['water_note'];
												} ?>
											</td>
										</tr>
									<?php } ?>
									<?php if (in_array("CROCKING", $detail3)) { ?>
										<tr>
											<td align="left">
												<?php if (in_array("CROCKING", $detail3)) {
													echo "CROCKING";
												} ?>
											</td>
											<td align="center">
												<?php if ($row['stat_cr'] == "DISPOSISI") { ?> <span
														class='label bg-yellow blink_me'>
														<?php echo "DISPOSISI"; ?>
													</span>
												<?php } else if ($row['stat_cr'] == "FAIL") { ?> <span
															class='label bg-red blink_me'>
														<?php echo "FAIL"; ?>
														</span>
												<?php } else if ($row['stat_cr'] == "MARGINAL PASS") { ?> <span
																class='label bg-purple'>
														<?php echo "MARGINAL PASS"; ?>
															</span>
												<?php } else if ($row['stat_cr'] == "DATA") { ?> <span class='label bg-blue'>
														<?php echo "DATA"; ?>
																</span>
												<?php } else if ($row['stat_cr'] == "PASS") { ?> <span class='label bg-green'>
														<?php echo "PASS"; ?>
																	</span>
												<?php } else if ($row['stat_cr'] == "R") { ?> <span class='label bg-orange'>
														<?php echo "R"; ?>
																		</span>
												<?php } else if ($row['stat_cr'] == "RANDOM") { ?> <span class='label bg-maroon'>
														<?php echo "RANDOM"; ?>
																			</span>
												<?php } else if ($row['stat_cr'] == "A") { ?> <span class='label bg-teal'>
														<?php echo "A"; ?>
																				</span>
												<?php } ?>
											</td>
											<td align="center">
												<?php if ($row['crock_note'] != "") {
													echo $row['crock_note'];
												} ?>
											</td>
										</tr>
									<?php } ?>
									<?php if (in_array("PHENOLIC YELLOWING", $detail3)) { ?>
										<tr>
											<td align="left">
												<?php if (in_array("PHENOLIC YELLOWING", $detail3)) {
													echo "PHENOLIC YELLOWING";
												} ?>
											</td>
											<td align="center">
												<?php if ($row['stat_py'] == "DISPOSISI") { ?> <span
														class='label bg-yellow blink_me'>
														<?php echo "DISPOSISI"; ?>
													</span>
												<?php } else if ($row['stat_py'] == "FAIL") { ?> <span
															class='label bg-red blink_me'>
														<?php echo "FAIL"; ?>
														</span>
												<?php } else if ($row['stat_py'] == "MARGINAL PASS") { ?> <span
																class='label bg-purple'>
														<?php echo "MARGINAL PASS"; ?>
															</span>
												<?php } else if ($row['stat_py'] == "DATA") { ?> <span class='label bg-blue'>
														<?php echo "DATA"; ?>
																</span>
												<?php } else if ($row['stat_py'] == "PASS") { ?> <span class='label bg-green'>
														<?php echo "PASS"; ?>
																	</span>
												<?php } else if ($row['stat_py'] == "R") { ?> <span class='label bg-orange'>
														<?php echo "R"; ?>
																		</span>
												<?php } else if ($row['stat_py'] == "RANDOM") { ?> <span class='label bg-maroon'>
														<?php echo "RANDOM"; ?>
																			</span>
												<?php } else if ($row['stat_py'] == "A") { ?> <span class='label bg-teal'>
														<?php echo "A"; ?>
																				</span>
												<?php } ?>
											</td>
											<td align="center">
												<?php if ($row['phenolic_note'] != "") {
													echo $row['phenolic_note'];
												} ?>
											</td>
										</tr>
									<?php } ?>
									<?php if (in_array("LIGHT", $detail3)) { ?>
										<tr>
											<td align="left">
												<?php if (in_array("LIGHT", $detail3)) {
													echo "LIGHT";
												} ?>
											</td>
											<td align="center">
												<?php if ($row['stat_lg'] == "DISPOSISI") { ?> <span
														class='label bg-yellow blink_me'>
														<?php echo "DISPOSISI"; ?>
													</span>
												<?php } else if ($row['stat_lg'] == "FAIL") { ?> <span
															class='label bg-red blink_me'>
														<?php echo "FAIL"; ?>
														</span>
												<?php } else if ($row['stat_lg'] == "PASS") { ?> <span class='label bg-green'>
														<?php echo "PASS"; ?>
															</span>
												<?php } else if ($row['stat_lg'] == "R") { ?> <span class='label bg-orange'>
														<?php echo "R"; ?>
																</span>
												<?php } else if ($row['stat_lg'] == "RANDOM") { ?> <span class='label bg-maroon'>
														<?php echo "RANDOM"; ?>
																	</span>
												<?php } else if ($row['stat_lg'] == "A") { ?> <span class='label bg-teal'>
														<?php echo "A"; ?>
																		</span>
												<?php } ?>
											</td>
											<td align="center">
												<?php if ($row['light_note'] != "") {
													echo $row['light_note'];
												} ?>
											</td>
										</tr>
									<?php } ?>
									<?php if (in_array("COLOR MIGRATION-OVEN TEST", $detail3)) { ?>
										<tr>
											<td align="left">
												<?php if (in_array("COLOR MIGRATION-OVEN TEST", $detail3)) {
													echo "COLOR MIGRATION-OVEN TEST";
												} ?>
											</td>
											<td align="center">
												<?php if ($row['stat_cmo'] == "DISPOSISI") { ?> <span
														class='label bg-yellow blink_me'>
														<?php echo "DISPOSISI"; ?>
													</span>
												<?php } else if ($row['stat_cmo'] == "FAIL") { ?> <span
															class='label bg-red blink_me'>
														<?php echo "FAIL"; ?>
														</span>
												<?php } else if ($row['stat_cmo'] == "PASS") { ?> <span class='label bg-green'>
														<?php echo "PASS"; ?>
															</span>
												<?php } else if ($row['stat_cmo'] == "R") { ?> <span class='label bg-orange'>
														<?php echo "R"; ?>
																</span>
												<?php } else if ($row['stat_cmo'] == "RANDOM") { ?> <span class='label bg-maroon'>
														<?php echo "RANDOM"; ?>
																	</span>
												<?php } else if ($row['stat_cmo'] == "A") { ?> <span class='label bg-teal'>
														<?php echo "A"; ?>
																		</span>
												<?php } ?>
											</td>
											<td align="center">
												<?php if ($row['cm_printing_note'] != "") {
													echo $row['cm_printing_note'];
												} ?>
											</td>
										</tr>
									<?php } ?>
									<?php if (in_array("COLOR MIGRATION", $detail3)) { ?>
										<tr>
											<td align="left">
												<?php if (in_array("COLOR MIGRATION", $detail3)) {
													echo "COLOR MIGRATION";
												} ?>
											</td>
											<td align="center">
												<?php if ($row['stat_cm'] == "DISPOSISI") { ?> <span
														class='label bg-yellow blink_me'>
														<?php echo "DISPOSISI"; ?>
													</span>
												<?php } else if ($row['stat_cm'] == "FAIL") { ?> <span
															class='label bg-red blink_me'>
														<?php echo "FAIL"; ?>
														</span>
												<?php } else if ($row['stat_cm'] == "PASS") { ?> <span class='label bg-green'>
														<?php echo "PASS"; ?>
															</span>
												<?php } else if ($row['stat_cm'] == "R") { ?> <span class='label bg-orange'>
														<?php echo "R"; ?>
																</span>
												<?php } else if ($row['stat_cm'] == "RANDOM") { ?> <span class='label bg-maroon'>
														<?php echo "RANDOM"; ?>
																	</span>
												<?php } else if ($row['stat_cm'] == "A") { ?> <span class='label bg-teal'>
														<?php echo "A"; ?>
																		</span>
												<?php } ?>
											</td>
											<td align="center">
												<?php if ($row['cm_dye_note'] != "") {
													echo $row['cm_dye_note'];
												} ?>
											</td>
										</tr>
									<?php } ?>
									<?php if (in_array("LIGHT PERSPIRATION", $detail3)) { ?>
										<tr>
											<td align="left">
												<?php if (in_array("LIGHT PERSPIRATION", $detail3)) {
													echo "LIGHT PERSPIRATION";
												} ?>
											</td>
											<td align="center">
												<?php if ($row['stat_lp'] == "DISPOSISI") { ?> <span
														class='label bg-yellow blink_me'>
														<?php echo "DISPOSISI"; ?>
													</span>
												<?php } else if ($row['stat_lp'] == "FAIL") { ?> <span
															class='label bg-red blink_me'>
														<?php echo "FAIL"; ?>
														</span>
												<?php } else if ($row['stat_lp'] == "MARGINAL PASS") { ?> <span
																class='label bg-purple'>
														<?php echo "MARGINAL PASS"; ?>
															</span>
												<?php } else if ($row['stat_lp'] == "DATA") { ?> <span class='label bg-blue'>
														<?php echo "DATA"; ?>
																</span>
												<?php } else if ($row['stat_lp'] == "PASS") { ?> <span class='label bg-green'>
														<?php echo "PASS"; ?>
																	</span>
												<?php } else if ($row['stat_lp'] == "R") { ?> <span class='label bg-orange'>
														<?php echo "R"; ?>
																		</span>
												<?php } else if ($row['stat_lp'] == "RANDOM") { ?> <span class='label bg-maroon'>
														<?php echo "RANDOM"; ?>
																			</span>
												<?php } else if ($row['stat_lp'] == "A") { ?> <span class='label bg-teal'>
														<?php echo "A"; ?>
																				</span>
												<?php } ?>
											</td>
											<td align="center">
												<?php if ($row['light_pers_note'] != "") {
													echo $row['light_pers_note'];
												} ?>
											</td>
										</tr>
									<?php } ?>
									<?php if (in_array("SALIVA", $detail3)) { ?>
										<tr>
											<td align="left">
												<?php if (in_array("SALIVA", $detail3)) {
													echo "SALIVA";
												} ?>
											</td>
											<td align="center">
												<?php if ($row['stat_slv'] == "DISPOSISI") { ?> <span
														class='label label-bg-red blink_me'>
														<?php echo "DISPOSISI"; ?>
													</span>
												<?php } else if ($row['stat_slv'] == "FAIL") { ?> <span
															class='label bg-red blink_me'>
														<?php echo "FAIL"; ?>
														</span>
												<?php } else if ($row['stat_slv'] == "PASS") { ?> <span class='label bg-green'>
														<?php echo "PASS"; ?>
															</span>
												<?php } else if ($row['stat_slv'] == "R") { ?> <span class='label bg-orange'>
														<?php echo "R"; ?>
																</span>
												<?php } else if ($row['stat_slv'] == "RANDOM") { ?> <span class='label bg-maroon'>
														<?php echo "RANDOM"; ?>
																	</span>
												<?php } else if ($row['stat_slv'] == "A") { ?> <span class='label bg-teal'>
														<?php echo "A"; ?>
																		</span>
												<?php } ?>
											</td>
											<td align="center">
												<?php if ($row['saliva_note'] != "") {
													echo $row['saliva_note'];
												} ?>
											</td>
										</tr>
									<?php } ?>
									<?php if (in_array("BLEEDING", $detail3)) { ?>
										<tr>
											<td align="left">
												<?php if (in_array("BLEEDING", $detail3)) {
													echo "BLEEDING";
												} ?>
											</td>
											<td align="center">
												<?php if ($row['stat_bld'] == "DISPOSISI") { ?> <span
														class='label label-bg-red blink_me'>
														<?php echo "DISPOSISI"; ?>
													</span>
												<?php } else if ($row['stat_bld'] == "FAIL") { ?> <span
															class='label bg-red blink_me'>
														<?php echo "FAIL"; ?>
														</span>
												<?php } else if ($row['stat_bld'] == "PASS") { ?> <span class='label bg-green'>
														<?php echo "PASS"; ?>
															</span>
												<?php } else if ($row['stat_bld'] == "R") { ?> <span class='label bg-orange'>
														<?php echo "R"; ?>
																</span>
												<?php } else if ($row['stat_bld'] == "RANDOM") { ?> <span class='label bg-maroon'>
														<?php echo "RANDOM"; ?>
																	</span>
												<?php } else if ($row['stat_bld'] == "A") { ?> <span class='label bg-teal'>
														<?php echo "A"; ?>
																		</span>
												<?php } ?>
											</td>
											<td align="center">
												<?php if ($row['bleeding_note'] != "") {
													echo $row['bleeding_note'];
												} ?>
											</td>
										</tr>
									<?php } ?>
									<?php if (in_array("CHLORIN & NON-CHLORIN", $detail3)) { ?>
										<tr>
											<td align="left">
												<?php if (in_array("CHLORIN & NON-CHLORIN", $detail3)) {
													echo "CHLORIN";
												} ?>
											</td>
											<td align="center">
												<?php if ($row['stat_chl'] == "DISPOSISI") { ?> <span
														class='label label-bg-red blink_me'>
														<?php echo "DISPOSISI"; ?>
													</span>
												<?php } else if ($row['stat_chl'] == "FAIL") { ?> <span
															class='label bg-red blink_me'>
														<?php echo "FAIL"; ?>
														</span>
												<?php } else if ($row['stat_chl'] == "PASS") { ?> <span class='label bg-green'>
														<?php echo "PASS"; ?>
															</span>
												<?php } else if ($row['stat_chl'] == "R") { ?> <span class='label bg-orange'>
														<?php echo "R"; ?>
																</span>
												<?php } else if ($row['stat_chl'] == "RANDOM") { ?> <span class='label bg-maroon'>
														<?php echo "RANDOM"; ?>
																	</span>
												<?php } else if ($row['stat_chl'] == "A") { ?> <span class='label bg-teal'>
														<?php echo "A"; ?>
																		</span>
												<?php } ?>
											</td>
											<td align="center">
												<?php if ($row['chlorin_note'] != "") {
													echo $row['chlorin_note'];
												} ?>
											</td>
										</tr>
									<?php } ?>
									<?php if (in_array("CHLORIN & NON-CHLORIN", $detail3)) { ?>
										<tr>
											<td align="left">
												<?php if (in_array("CHLORIN & NON-CHLORIN", $detail3)) {
													echo "NON-CHLORIN";
												} ?>
											</td>
											<td align="center">
												<?php if ($row['stat_nchl'] == "DISPOSISI") { ?> <span
														class='label label-bg-red blink_me'>
														<?php echo "DISPOSISI"; ?>
													</span>
												<?php } else if ($row['stat_nchl'] == "FAIL") { ?> <span
															class='label bg-red blink_me'>
														<?php echo "FAIL"; ?>
														</span>
												<?php } else if ($row['stat_nchl'] == "PASS") { ?> <span class='label bg-green'>
														<?php echo "PASS"; ?>
															</span>
												<?php } else if ($row['stat_nchl'] == "R") { ?> <span class='label bg-orange'>
														<?php echo "R"; ?>
																</span>
												<?php } else if ($row['stat_nchl'] == "RANDOM") { ?> <span class='label bg-maroon'>
														<?php echo "RANDOM"; ?>
																	</span>
												<?php } else if ($row['stat_nchl'] == "A") { ?> <span class='label bg-teal'>
														<?php echo "A"; ?>
																		</span>
												<?php } ?>
											</td>
											<td align="center">
												<?php if ($row['chlorin_note'] != "") {
													echo $row['chlorin_note'];
												} ?>
											</td>
										</tr>
									<?php } ?>
									<?php if (in_array("DYE TRANSFER", $detail3)) { ?>
										<tr>
											<td align="left">
												<?php if (in_array("DYE TRANSFER", $detail3)) {
													echo "DYE TRANSFER";
												} ?>
											</td>
											<td align="center">
												<?php if ($row['stat_dye'] == "DISPOSISI") { ?> <span
														class='label label-bg-red blink_me'>
														<?php echo "DISPOSISI"; ?>
													</span>
												<?php } else if ($row['stat_dye'] == "FAIL") { ?> <span
															class='label bg-red blink_me'>
														<?php echo "FAIL"; ?>
														</span>
												<?php } else if ($row['stat_dye'] == "MARGINAL PASS") { ?> <span
																class='label bg-purple'>
														<?php echo "MARGINAL PASS"; ?>
															</span>
												<?php } else if ($row['stat_dye'] == "DATA") { ?> <span class='label bg-blue'>
														<?php echo "DATA"; ?>
																</span>
												<?php } else if ($row['stat_dye'] == "PASS") { ?> <span class='label bg-green'>
														<?php echo "PASS"; ?>
																	</span>
												<?php } else if ($row['stat_dye'] == "R") { ?> <span class='label bg-orange'>
														<?php echo "R"; ?>
																		</span>
												<?php } else if ($row['stat_dye'] == "RANDOM") { ?> <span class='label bg-maroon'>
														<?php echo "RANDOM"; ?>
																			</span>
												<?php } else if ($row['stat_dye'] == "A") { ?> <span class='label bg-teal'>
														<?php echo "A"; ?>
																				</span>
												<?php } ?>
											</td>
											<td align="center">
												<?php if ($row['dye_tf_note'] != "") {
													echo $row['dye_tf_note'];
												} ?>
											</td>
										</tr>
									<?php } ?>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
<?php if ($cek > 0) { ?>
	<div class="box box-success">
		<div class="box-header with-border">
			<h3 class="box-title">Detail Testing</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
		</div>
		<div class="box-body">
			<div class="col-md-12">
				<!-- Custom Tabs -->
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#tab_1" data-toggle="tab">PHYSICAL</a></li>
						<li><a href="#tab_3" data-toggle="tab">FUNCTIONAL &amp; PH</a></li>
						<li><a href="#tab_2" data-toggle="tab">COLORFASTNESS</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab_1">
							<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form1"
								id="form1">
								<div class="form-group">
									<label for="jnstest" class="col-sm-2 control-label">JENIS TES</label>
									<div class="col-sm-4">
										<select name="jns_test" class="form-control select2" id="jns_test"
											onChange="tampil();" style="width: 100%;">
											<option selected="selected" value="">Pilih</option>
											<?php
											$sql = "SELECT a.*, b.* From tbl_tq_nokk a INNER JOIN tbl_master_test b ON a.no_test=b.no_testmaster WHERE no_test='$rcek[no_test]'";
											$result = mysqli_query($con, $sql);
											while ($row = mysqli_fetch_array($result)) {
												$detail = explode(",", $row['physical']); ?>
												<?php foreach ($detail as $key => $value):
													echo '<option value="' . $value . '">' . $value . '</option>';
												endforeach;
												?>
											<?php } ?>
										</select>
									</div>
								</div>
								<!-- FLAMMABILITY BEGIN-->
								<div class="form-group" id="fla1" style="display:none;">
									<label for="flamability" class="col-sm-2 control-label">FLAMMABILITY</label>
									<div class="col-sm-2">
										<input name="flamability" type="text" class="form-control" id="flamability"
											value="<?php echo $rcek1['flamability']; ?>" placeholder="FLAMMABILITY">
									</div>
									<div class="col-sm-2">
										<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
											name="fla_note" maxlength="50"
											rows="1"><?php echo $rcek1['fla_note']; ?></textarea>
									</div>
								</div>
								<div class="form-group" id="stat_fla" style="display:none;">
									<label for="stat_fla" class="col-sm-2 control-label">STATUS</label>
									<div class="col-sm-2">
										<select name="stat_fla" class="form-control select2" id="stat_fla"
											onChange="tampil();" style="width: 100%;">
											<option <?php if ($rcek1['stat_fla'] == "") { ?> selected=selected <?php }
											; ?>value="">Pilih</option>
											<option <?php if ($rcek1['stat_fla'] == "DISPOSISI") { ?> selected=selected <?php }
											; ?>value="DISPOSISI">DISPOSISI</option>
											<option <?php if ($rcek1['stat_fla'] == "A") { ?> selected=selected <?php }
											; ?>value="A">A</option>
											<option <?php if ($rcek1['stat_fla'] == "R") { ?> selected=selected <?php }
											; ?>value="R">R</option>
											<option <?php if ($rcek1['stat_fla'] == "PASS") { ?> selected=selected <?php }
											; ?>value="PASS">PASS</option>
											<option <?php if ($rcek1['stat_fla'] == "FAIL") { ?> selected=selected <?php }
											; ?>value="FAIL">FAIL</option>
											<option <?php if ($rcek1['stat_fla'] == "RANDOM") { ?> selected=selected <?php }
											; ?>value="RANDOM">RANDOM</option>
										</select>
									</div>
								</div>
								<div class="form-group" id="disfla" style="display:none;">
									<label for="disfla" class="col-sm-2 control-label">FLAMMABILITY (DIS)</label>
									<div class="col-sm-2">
										<input name="dflamability" type="text" class="form-control" id="dflamability"
											value="<?php echo $rcekD['dflamability']; ?>" placeholder="FLAMMABILITY">
									</div>
									<div class="col-sm-2">
										<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
											name="dfla_note" maxlength="50"
											rows="1"><?php echo $rcekD['dfla_note']; ?></textarea>
									</div>
								</div>
								<div class="form-group" id="ranfla" style="display:none;">
									<label for="ranfla" class="col-sm-2 control-label">FLAMMABILITY (RAN)</label>
									<div class="col-sm-2">
										<input name="rflamability" type="text" class="form-control" id="rflamability"
											value="<?php echo $rcekR['rflamability']; ?>" placeholder="FLAMMABILITY"
											readonly>
									</div>
									<div class="col-sm-2">
										<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
											name="rfla_note" maxlength="50" rows="1"
											readonly><?php echo $rcekR['rfla_note']; ?></textarea>
									</div>
								</div>
								<!-- FLAMMABILITY END-->
								<!--<div class="form-group" id="fib2" style="display:none;">
								<label for="fibercontent" class="col-sm-2 control-label">FIBER CONTENT</label>
								<div class="col-sm-6">
									<input name="fibercontent" type="text" class="form-control" id="fibercontent" value="<?php echo $rcek1['fibercontent']; ?>" placeholder="COTT/MODAL/RAYON %, POLYESTER %, ELASTANE %">
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="fiber_note" maxlength="50" rows="1"><?php echo $rcek1['fiber_note']; ?></textarea>
								</div>
							</div>-->
								<!-- FIBER CONTENT BEGIN-->
								<div class="form-group" id="fib1" style="display:none;">
									<label for="fibercontent" class="col-sm-2 control-label">FIBER CONTENT</label>
									<div class="col-sm-6">
										<input name="fibercontent" type="text" class="form-control" id="fibercontent"
											value="<?php echo $rcek1['fibercontent']; ?>"
											placeholder="COTT/MODAL/RAYON %, POLYESTER %, ELASTANE %" readonly>
									</div>
								</div>
								<div class="form-group" id="fib2" style="display:none;">
									<label for="fibercontent" class="col-sm-2 control-label"></label>
									<div class="col-sm-2">
										<div class="input-group">
											<input name="fc_cott" type="text" class="form-control" id="fc_cott"
												value="<?php echo $rcek1['fc_cott']; ?>" placeholder="COTT/MODAL/RAYON"
												onChange="hitung();" onBlur="hitung();" style="text-align: right;">
											<span class="input-group-addon">&#37;</span>
										</div>
										<div class="input-group">
											<input name="fc_poly" type="text" class="form-control" id="fc_poly"
												value="<?php echo $rcek1['fc_poly']; ?>" placeholder="POLYESTER"
												onChange="hitung();" onBlur="hitung();" style="text-align: right;">
											<span class="input-group-addon">&#37;</span>
										</div>
										<div class="input-group">
											<input name="fc_ela" type="text" class="form-control" id="fc_ela"
												value="<?php echo $rcek1['fc_elastane']; ?>" placeholder="ELASTANE"
												onChange="hitung();" onBlur="hitung();" style="text-align: right;">
											<span class="input-group-addon">&#37;</span>
										</div>
										<div class="input-group">
											<input name="fc_total" class="form-control" id="fc_total" value=""
												placeholder="TOTAL" style="text-align: right;" type="number" min="100"
												max="100">
											<span class="input-group-addon">&#37;</span>
										</div>
									</div>
									<div class="col-sm-2">
										<input name="std_fc_cott1" type="text" class="form-control" id="std_fc_cott1"
											value="<?php echo $rcek1['std_fc_cott1']; ?>" placeholder="Standard">
										<input name="std_fc_poly1" type="text" class="form-control" id="std_fc_poly1"
											value="<?php echo $rcek1['std_fc_poly1']; ?>" placeholder="Standard">
										<input name="std_fc_elastane1" type="text" class="form-control"
											id="std_fc_elastane1" value="<?php echo $rcek1['std_fc_elastane1']; ?>"
											placeholder="Standard">
									</div>
									<div class="col-sm-2">
										<select name="fc_cott1" class="form-control select2" id="fc_cott1"
											style="width: 100%;">
											<option <?php if ($rcek1['fc_cott1'] == "") { ?> selected=selected <?php }
											; ?>value="">Pilih</option>
											<option <?php if ($rcek1['fc_cott1'] == "COTTON") { ?> selected=selected <?php }
											; ?>value="COTTON">COTTON</option>
											<option <?php if ($rcek1['fc_cott1'] == "POLYESTER") { ?> selected=selected <?php }
											; ?>value="POLYESTER">POLYESTER</option>
											<option <?php if ($rcek1['fc_cott1'] == "SPANDEX") { ?> selected=selected <?php }
											; ?>value="SPANDEX">SPANDEX</option>
											<option <?php if ($rcek1['fc_cott1'] == "RAYON") { ?> selected=selected <?php }
											; ?>value="RAYON">RAYON</option>
											<option <?php if ($rcek1['fc_cott1'] == "NYLON") { ?> selected=selected <?php }
											; ?>value="NYLON">NYLON</option>
											<option <?php if ($rcek1['fc_cott1'] == "ELASTANE") { ?> selected=selected <?php }
											; ?>value="ELASTANE">ELASTANE</option>
											<option <?php if ($rcek1['fc_cott1'] == "TENCEL") { ?> selected=selected <?php }
											; ?>value="TENCEL">TENCEL</option>
											<option <?php if ($rcek1['fc_cott1'] == "LYCRA") { ?> selected=selected <?php }
											; ?>value="LYCRA">LYCRA</option>
											<option <?php if ($rcek1['fc_cott1'] == "rPOLYESTER") { ?> selected=selected <?php }
											; ?>value="rPOLYESTER">rPOLYESTER</option>
											<option <?php if ($rcek1['fc_cott1'] == "MODAL") { ?> selected=selected <?php }
											; ?>value="MODAL">MODAL</option>
											<option <?php if ($rcek1['fc_cott1'] == "ACRYLIC") { ?> selected=selected <?php }
											; ?>value="ACRYLIC">ACRYLIC</option>
											<option <?php if ($rcek1['fc_cott1'] == "VISCOSE") { ?> selected=selected <?php }
											; ?>value="VISCOSE">VISCOSE</option>
										</select>
										<select name="fc_poly1" class="form-control select2" id="fc_poly1"
											style="width: 100%;">
											<option <?php if ($rcek1['fc_poly1'] == "") { ?> selected=selected <?php }
											; ?>value="">Pilih</option>
											<option <?php if ($rcek1['fc_poly1'] == "COTTON") { ?> selected=selected <?php }
											; ?>value="COTTON">COTTON</option>
											<option <?php if ($rcek1['fc_poly1'] == "POLYESTER") { ?> selected=selected <?php }
											; ?>value="POLYESTER">POLYESTER</option>
											<option <?php if ($rcek1['fc_poly1'] == "SPANDEX") { ?> selected=selected <?php }
											; ?>value="SPANDEX">SPANDEX</option>
											<option <?php if ($rcek1['fc_poly1'] == "RAYON") { ?> selected=selected <?php }
											; ?>value="RAYON">RAYON</option>
											<option <?php if ($rcek1['fc_poly1'] == "NYLON") { ?> selected=selected <?php }
											; ?>value="NYLON">NYLON</option>
											<option <?php if ($rcek1['fc_poly1'] == "ELASTANE") { ?> selected=selected <?php }
											; ?>value="ELASTANE">ELASTANE</option>
											<option <?php if ($rcek1['fc_poly1'] == "TENCEL") { ?> selected=selected <?php }
											; ?>value="TENCEL">TENCEL</option>
											<option <?php if ($rcek1['fc_poly1'] == "LYCRA") { ?> selected=selected <?php }
											; ?>value="LYCRA">LYCRA</option>
											<option <?php if ($rcek1['fc_poly1'] == "rPOLYESTER") { ?> selected=selected <?php }
											; ?>value="rPOLYESTER">rPOLYESTER</option>
											<option <?php if ($rcek1['fc_poly1'] == "MODAL") { ?> selected=selected <?php }
											; ?>value="MODAL">MODAL</option>
											<option <?php if ($rcek1['fc_poly1'] == "ACRYLIC") { ?> selected=selected <?php }
											; ?>value="ACRYLIC">ACRYLIC</option>
											<option <?php if ($rcek1['fc_poly1'] == "VISCOSE") { ?> selected=selected <?php }
											; ?>value="VISCOSE">VISCOSE</option>
										</select>
										<select name="fc_ela1" class="form-control select2" id="fc_ela1"
											style="width: 100%;">
											<option <?php if ($rcek1['fc_elastane1'] == "") { ?> selected=selected <?php }
											; ?>value="">Pilih</option>
											<option <?php if ($rcek1['fc_elastane1'] == "COTTON") { ?> selected=selected <?php }
											; ?>value="COTTON">COTTON</option>
											<option <?php if ($rcek1['fc_elastane1'] == "POLYESTER") { ?> selected=selected
												<?php }
											; ?>value="POLYESTER">POLYESTER</option>
											<option <?php if ($rcek1['fc_elastane1'] == "SPANDEX") { ?> selected=selected
												<?php }
											; ?>value="SPANDEX">SPANDEX</option>
											<option <?php if ($rcek1['fc_elastane1'] == "RAYON") { ?> selected=selected <?php }
											; ?>value="RAYON">RAYON</option>
											<option <?php if ($rcek1['fc_elastane1'] == "NYLON") { ?> selected=selected <?php }
											; ?>value="NYLON">NYLON</option>
											<option <?php if ($rcek1['fc_elastane1'] == "ELASTANE") { ?> selected=selected
												<?php }
											; ?>value="ELASTANE">ELASTANE</option>
											<option <?php if ($rcek1['fc_elastane1'] == "TENCEL") { ?> selected=selected <?php }
											; ?>value="TENCEL">TENCEL</option>
											<option <?php if ($rcek1['fc_elastane1'] == "LYCRA") { ?> selected=selected <?php }
											; ?>value="LYCRA">LYCRA</option>
											<option <?php if ($rcek1['fc_elastane1'] == "rPOLYESTER") { ?> selected=selected
												<?php }
											; ?>value="rPOLYESTER">rPOLYESTER</option>
											<option <?php if ($rcek1['fc_elastane1'] == "MODAL") { ?> selected=selected <?php }
											; ?>value="MODAL">MODAL</option>
											<option <?php if ($rcek1['fc_elastane1'] == "ACRYLIC") { ?> selected=selected
												<?php }
											; ?>value="ACRYLIC">ACRYLIC</option>
											<option <?php if ($rcek1['fc_elastane1'] == "VISCOSE") { ?> selected=selected
												<?php }
											; ?>value="VISCOSE">VISCOSE</option>
										</select>
									</div>
									<div class="col-sm-2">
										<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
											name="fiber_note" maxlength="50"
											rows="1"><?php echo $rcek1['fiber_note']; ?></textarea>
									</div>
								</div>
								<div class="form-group" id="stat_fib" style="display:none;">
									<label for="stat_fib" class="col-sm-2 control-label">STATUS</label>
									<div class="col-sm-2">
										<select name="stat_fib" class="form-control select2" id="stat_fib"
											onChange="tampil();" style="width: 100%;">
											<option <?php if ($rcek1['stat_fib'] == "") { ?> selected=selected <?php }
											; ?>value="">Pilih</option>
											<option <?php if ($rcek1['stat_fib'] == "DISPOSISI") { ?> selected=selected <?php }
											; ?>value="DISPOSISI">DISPOSISI</option>
											<option <?php if ($rcek1['stat_fib'] == "A") { ?> selected=selected <?php }
											; ?>value="A">A</option>
											<option <?php if ($rcek1['stat_fib'] == "R") { ?> selected=selected <?php }
											; ?>value="R">R</option>
											<option <?php if ($rcek1['stat_fib'] == "PASS") { ?> selected=selected <?php }
											; ?>value="PASS">PASS</option>
											<option <?php if ($rcek1['stat_fib'] == "FAIL") { ?> selected=selected <?php }
											; ?>value="FAIL">FAIL</option>
											<option <?php if ($rcek1['stat_fib'] == "RANDOM") { ?> selected=selected <?php }
											; ?>value="RANDOM">RANDOM</option>
										</select>
									</div>
								</div>
								<div class="form-group" id="disfib1" style="display:none;">
									<label for="dfibercontent" class="col-sm-2 control-label">FIBER CONTENT (DIS)</label>
									<div class="col-sm-6">
										<input name="dfibercontent" type="text" class="form-control" id="dfibercontent"
											value="<?php echo $rcekD['dfibercontent']; ?>"
											placeholder="COTT/MODAL/RAYON %, POLYESTER %, ELASTANE %" readonly>
									</div>
									<!--<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="dfiber_note " maxlength="50" rows="1"><?php echo $rcekD['dfiber_note']; ?></textarea>
								</div>-->
								</div>
								<div class="form-group" id="disfib" style="display:none;">
									<label for="dfibercontent" class="col-sm-2 control-label"></label>
									<div class="col-sm-2">
										<div class="input-group">
											<input name="dfc_cott" type="text" class="form-control" id="dfc_cott"
												value="<?php echo $rcekD['dfc_cott']; ?>" placeholder="COTT/MODAL/RAYON"
												onChange="hitungdis();" onBlur="hitungdis();" style="text-align: right;">
											<span class="input-group-addon">&#37;</span>
										</div>
										<div class="input-group">
											<input name="dfc_poly" type="text" class="form-control" id="dfc_poly"
												value="<?php echo $rcekD['dfc_poly']; ?>" placeholder="POLYESTER"
												onChange="hitungdis();" onBlur="hitungdis();" style="text-align: right;">
											<span class="input-group-addon">&#37;</span>
										</div>
										<div class="input-group">
											<input name="dfc_ela" type="text" class="form-control" id="dfc_ela"
												value="<?php echo $rcekD['dfc_elastane']; ?>" placeholder="ELASTANE"
												onChange="hitungdis();" onBlur="hitungdis();" style="text-align: right;">
											<span class="input-group-addon">&#37;</span>
										</div>
										<div class="input-group">
											<input name="dfc_total" class="form-control" id="dfc_total" value=""
												placeholder="TOTAL" style="text-align: right;" type="number" min="100"
												max="100">
											<span class="input-group-addon">&#37;</span>
										</div>
									</div>
									<div class="col-sm-2">
										<input name="std_dfc_cott1" type="text" class="form-control" id="std_dfc_cott1"
											value="<?php echo $rcek1['std_dfc_cott1']; ?>" placeholder="Standard">
										<input name="std_dfc_poly1" type="text" class="form-control" id="std_dfc_poly1"
											value="<?php echo $rcek1['std_dfc_poly1']; ?>" placeholder="Standard">
										<input name="std_dfc_elastane1" type="text" class="form-control"
											id="std_dfc_elastane1" value="<?php echo $rcek1['std_dfc_elastane1']; ?>"
											placeholder="Standard">
									</div>
									<div class="col-sm-4">
										<select name="dfc_cott1" class="form-control select2" id="dfc_cott1"
											style="width: 100%;">
											<option <?php if ($rcekD['dfc_cott1'] == "") { ?> selected=selected <?php }
											; ?>value="">Pilih</option>
											<option <?php if ($rcekD['dfc_cott1'] == "COTTON") { ?> selected=selected <?php }
											; ?>value="COTTON">COTTON</option>
											<option <?php if ($rcekD['dfc_cott1'] == "POLYESTER") { ?> selected=selected <?php }
											; ?>value="POLYESTER">POLYESTER</option>
											<option <?php if ($rcekD['dfc_cott1'] == "SPANDEX") { ?> selected=selected <?php }
											; ?>value="SPANDEX">SPANDEX</option>
											<option <?php if ($rcekD['dfc_cott1'] == "RAYON") { ?> selected=selected <?php }
											; ?>value="RAYON">RAYON</option>
											<option <?php if ($rcekD['dfc_cott1'] == "NYLON") { ?> selected=selected <?php }
											; ?>value="NYLON">NYLON</option>
											<option <?php if ($rcekD['dfc_cott1'] == "ELASTANE") { ?> selected=selected <?php }
											; ?>value="ELASTANE">ELASTANE</option>
											<option <?php if ($rcekD['dfc_cott1'] == "TENCEL") { ?> selected=selected <?php }
											; ?>value="TENCEL">TENCEL</option>
											<option <?php if ($rcekD['dfc_cott1'] == "LYCRA") { ?> selected=selected <?php }
											; ?>value="LYCRA">LYCRA</option>
											<option <?php if ($rcekD['dfc_cott1'] == "rPOLYESTER") { ?> selected=selected
												<?php }
											; ?>value="rPOLYESTER">rPOLYESTER</option>
											<option <?php if ($rcekD['dfc_cott1'] == "MODAL") { ?> selected=selected <?php }
											; ?>value="MODAL">MODAL</option>
											<option <?php if ($rcekD['dfc_cott1'] == "ACRYLIC") { ?> selected=selected <?php }
											; ?>value="ACRYLIC">ACRYLIC</option>
											<option <?php if ($rcekD['dfc_cott1'] == "VISCOSE") { ?> selected=selected <?php }
											; ?>value="VISCOSE">VISCOSE</option>
										</select>
										<select name="dfc_poly1" class="form-control select2" id="dfc_poly1"
											style="width: 100%;">
											<option <?php if ($rcekD['dfc_poly1'] == "") { ?> selected=selected <?php }
											; ?>value="">Pilih</option>
											<option <?php if ($rcekD['dfc_poly1'] == "COTTON") { ?> selected=selected <?php }
											; ?>value="COTTON">COTTON</option>
											<option <?php if ($rcekD['dfc_poly1'] == "POLYESTER") { ?> selected=selected <?php }
											; ?>value="POLYESTER">POLYESTER</option>
											<option <?php if ($rcekD['dfc_poly1'] == "SPANDEX") { ?> selected=selected <?php }
											; ?>value="SPANDEX">SPANDEX</option>
											<option <?php if ($rcekD['dfc_poly1'] == "RAYON") { ?> selected=selected <?php }
											; ?>value="RAYON">RAYON</option>
											<option <?php if ($rcekD['dfc_poly1'] == "NYLON") { ?> selected=selected <?php }
											; ?>value="NYLON">NYLON</option>
											<option <?php if ($rcekD['dfc_poly1'] == "ELASTANE") { ?> selected=selected <?php }
											; ?>value="ELASTANE">ELASTANE</option>
											<option <?php if ($rcekD['dfc_poly1'] == "TENCEL") { ?> selected=selected <?php }
											; ?>value="TENCEL">TENCEL</option>
											<option <?php if ($rcekD['dfc_poly1'] == "LYCRA") { ?> selected=selected <?php }
											; ?>value="LYCRA">LYCRA</option>
											<option <?php if ($rcekD['dfc_poly1'] == "rPOLYESTER") { ?> selected=selected
												<?php }
											; ?>value="rPOLYESTER">rPOLYESTER</option>
											<option <?php if ($rcekD['dfc_poly1'] == "MODAL") { ?> selected=selected <?php }
											; ?>value="MODAL">MODAL</option>
											<option <?php if ($rcekD['dfc_poly1'] == "ACRYLIC") { ?> selected=selected <?php }
											; ?>value="ACRYLIC">ACRYLIC</option>
											<option <?php if ($rcekD['dfc_poly1'] == "VISCOSE") { ?> selected=selected <?php }
											; ?>value="VISCOSE">VISCOSE</option>
										</select>
										<select name="dfc_ela1" class="form-control select2" id="dfc_ela1"
											style="width: 100%;">
											<option <?php if ($rcekD['dfc_elastane1'] == "") { ?> selected=selected <?php }
											; ?>value="">Pilih</option>
											<option <?php if ($rcekD['dfc_elastane1'] == "COTTON") { ?> selected=selected
												<?php }
											; ?>value="COTTON">COTTON</option>
											<option <?php if ($rcekD['dfc_elastane1'] == "POLYESTER") { ?> selected=selected
												<?php }
											; ?>value="POLYESTER">POLYESTER</option>
											<option <?php if ($rcekD['dfc_elastane1'] == "SPANDEX") { ?> selected=selected
												<?php }
											; ?>value="SPANDEX">SPANDEX</option>
											<option <?php if ($rcekD['dfc_elastane1'] == "RAYON") { ?> selected=selected <?php }
											; ?>value="RAYON">RAYON</option>
											<option <?php if ($rcekD['dfc_elastane1'] == "NYLON") { ?> selected=selected <?php }
											; ?>value="NYLON">NYLON</option>
											<option <?php if ($rcekD['dfc_elastane1'] == "ELASTANE") { ?> selected=selected
												<?php }
											; ?>value="ELASTANE">ELASTANE</option>
											<option <?php if ($rcekD['dfc_elastane1'] == "TENCEL") { ?> selected=selected
												<?php }
											; ?>value="TENCEL">TENCEL</option>
											<option <?php if ($rcekD['dfc_elastane1'] == "LYCRA") { ?> selected=selected <?php }
											; ?>value="LYCRA">LYCRA</option>
											<option <?php if ($rcekD['dfc_elastane1'] == "rPOLYESTER") { ?> selected=selected
												<?php }
											; ?>value="rPOLYESTER">rPOLYESTER</option>
											<option <?php if ($rcekD['dfc_elastane1'] == "MODAL") { ?> selected=selected <?php }
											; ?>value="MODAL">MODAL</option>
											<option <?php if ($rcekD['dfc_elastane1'] == "ACRYLIC") { ?> selected=selected
												<?php }
											; ?>value="ACRYLIC">ACRYLIC</option>
											<option <?php if ($rcekD['dfc_elastane1'] == "VISCOSE") { ?> selected=selected
												<?php }
											; ?>value="VISCOSE">VISCOSE</option>
										</select>
									</div>
									<div class="col-sm-2">
										<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
											name="dfiber_note" maxlength="50"
											rows="1"><?php echo $rcekD['dfiber_note']; ?></textarea>
									</div>
								</div>
								<div class="form-group" id="ranfib1" style="display:none;">
									<label for="rfibercontent" class="col-sm-2 control-label">FIBER CONTENT (RAN)</label>
									<div class="col-sm-6">
										<input name="rfibercontent" type="text" class="form-control" id="rfibercontent"
											value="<?php echo $rcekR['rfibercontent']; ?>"
											placeholder="COTT/MODAL/RAYON %, POLYESTER %, ELASTANE %" readonly>
									</div>
									<!--<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rfiber_note" maxlength="50" rows="1"><?php echo $rcekR['rfiber_note']; ?></textarea>
								</div>-->
								</div>
								<div class="form-group" id="ranfib" style="display:none;">
									<label for="rfibercontent" class="col-sm-2 control-label"></label>
									<div class="col-sm-2">
										<div class="input-group">
											<input name="rfc_cott" type="text" class="form-control" id="rfc_cott"
												value="<?php echo $rcekR['rfc_cott']; ?>" placeholder="COTT/MODAL/RAYON"
												style="text-align: right;" readonly>
											<span class="input-group-addon">&#37;</span>
										</div>
										<div class="input-group">
											<input name="rfc_poly" type="text" class="form-control" id="rfc_poly"
												value="<?php echo $rcekR['rfc_poly']; ?>" placeholder="POLYESTER"
												style="text-align: right;" readonly>
											<span class="input-group-addon">&#37;</span>
										</div>
										<div class="input-group">
											<input name="rfc_ela" type="text" class="form-control" id="rfc_ela"
												value="<?php echo $rcekR['rfc_elastane']; ?>" placeholder="ELASTANE"
												style="text-align: right;" readonly>
											<span class="input-group-addon">&#37;</span>
										</div>
									</div>
									<div class="col-sm-2">
										<input name="std_rfc_cott1" type="text" class="form-control" id="std_rfc_cott1"
											value="<?php echo $rcek1['std_rfc_cott1']; ?>" placeholder="Standard" readonly>
										<input name="std_rfc_poly1" type="text" class="form-control" id="std_rfc_poly1"
											value="<?php echo $rcek1['std_rfc_poly1']; ?>" placeholder="Standard" readonly>
										<input name="std_rfc_elastane1" type="text" class="form-control"
											id="std_rfc_elastane1" value="<?php echo $rcek1['std_rfc_elastane1']; ?>"
											placeholder="Standard" readonly>
									</div>
									<div class="col-sm-4">
										<select name="rfc_cott1" class="form-control select2" id="rfc_cott1"
											style="width: 100%;">
											<option <?php if ($rcekR['rfc_cott1'] == "") { ?> selected=selected <?php }
											; ?>value="">Pilih</option>
											<option <?php if ($rcekR['rfc_cott1'] == "COTTON") { ?> selected=selected <?php }
											; ?>value="COTTON">COTTON</option>
											<option <?php if ($rcekR['rfc_cott1'] == "POLYESTER") { ?> selected=selected <?php }
											; ?>value="POLYESTER">POLYESTER</option>
											<option <?php if ($rcekR['rfc_cott1'] == "SPANDEX") { ?> selected=selected <?php }
											; ?>value="SPANDEX">SPANDEX</option>
											<option <?php if ($rcekR['rfc_cott1'] == "RAYON") { ?> selected=selected <?php }
											; ?>value="RAYON">RAYON</option>
											<option <?php if ($rcekR['rfc_cott1'] == "NYLON") { ?> selected=selected <?php }
											; ?>value="NYLON">NYLON</option>
											<option <?php if ($rcekR['rfc_cott1'] == "ELASTANE") { ?> selected=selected <?php }
											; ?>value="ELASTANE">ELASTANE</option>
											<option <?php if ($rcekR['rfc_cott1'] == "TENCEL") { ?> selected=selected <?php }
											; ?>value="TENCEL">TENCEL</option>
											<option <?php if ($rcekR['rfc_cott1'] == "LYCRA") { ?> selected=selected <?php }
											; ?>value="LYCRA">LYCRA</option>
											<option <?php if ($rcekR['rfc_cott1'] == "rPOLYESTER") { ?> selected=selected
												<?php }
											; ?>value="rPOLYESTER">rPOLYESTER</option>
											<option <?php if ($rcekR['rfc_cott1'] == "MODAL") { ?> selected=selected <?php }
											; ?>value="MODAL">MODAL</option>
											<option <?php if ($rcekR['rfc_cott1'] == "ACRYLIC") { ?> selected=selected <?php }
											; ?>value="ACRYLIC">ACRYLIC</option>
											<option <?php if ($rcekR['rfc_cott1'] == "VISCOSE") { ?> selected=selected <?php }
											; ?>value="VISCOSE">VISCOSE</option>
										</select>
										<select name="rfc_poly1" class="form-control select2" id="rfc_poly1"
											style="width: 100%;">
											<option <?php if ($rcekR['rfc_poly1'] == "") { ?> selected=selected <?php }
											; ?>value="">Pilih</option>
											<option <?php if ($rcekR['rfc_poly1'] == "COTTON") { ?> selected=selected <?php }
											; ?>value="COTTON">COTTON</option>
											<option <?php if ($rcekR['rfc_poly1'] == "POLYESTER") { ?> selected=selected <?php }
											; ?>value="POLYESTER">POLYESTER</option>
											<option <?php if ($rcekR['rfc_poly1'] == "SPANDEX") { ?> selected=selected <?php }
											; ?>value="SPANDEX">SPANDEX</option>
											<option <?php if ($rcekR['rfc_poly1'] == "RAYON") { ?> selected=selected <?php }
											; ?>value="RAYON">RAYON</option>
											<option <?php if ($rcekR['rfc_poly1'] == "NYLON") { ?> selected=selected <?php }
											; ?>value="NYLON">NYLON</option>
											<option <?php if ($rcekR['rfc_poly1'] == "ELASTANE") { ?> selected=selected <?php }
											; ?>value="ELASTANE">ELASTANE</option>
											<option <?php if ($rcekR['rfc_poly1'] == "TENCEL") { ?> selected=selected <?php }
											; ?>value="TENCEL">TENCEL</option>
											<option <?php if ($rcekR['rfc_poly1'] == "LYCRA") { ?> selected=selected <?php }
											; ?>value="LYCRA">LYCRA</option>
											<option <?php if ($rcekR['rfc_poly1'] == "rPOLYESTER") { ?> selected=selected
												<?php }
											; ?>value="rPOLYESTER">rPOLYESTER</option>
											<option <?php if ($rcekR['rfc_poly1'] == "MODAL") { ?> selected=selected <?php }
											; ?>value="MODAL">MODAL</option>
											<option <?php if ($rcekR['rfc_poly1'] == "ACRYLIC") { ?> selected=selected <?php }
											; ?>value="ACRYLIC">ACRYLIC</option>
											<option <?php if ($rcekR['rfc_poly1'] == "VISCOSE") { ?> selected=selected <?php }
											; ?>value="VISCOSE">VISCOSE</option>
										</select>
										<select name="rfc_ela1" class="form-control select2" id="rfc_ela1"
											style="width: 100%;">
											<option <?php if ($rcekR['rfc_elastane1'] == "") { ?> selected=selected <?php }
											; ?>value="">Pilih</option>
											<option <?php if ($rcekR['rfc_elastane1'] == "COTTON") { ?> selected=selected
												<?php }
											; ?>value="COTTON">COTTON</option>
											<option <?php if ($rcekR['rfc_elastane1'] == "POLYESTER") { ?> selected=selected
												<?php }
											; ?>value="POLYESTER">POLYESTER</option>
											<option <?php if ($rcekR['rfc_elastane1'] == "SPANDEX") { ?> selected=selected
												<?php }
											; ?>value="SPANDEX">SPANDEX</option>
											<option <?php if ($rcekR['rfc_elastane1'] == "RAYON") { ?> selected=selected <?php }
											; ?>value="RAYON">RAYON</option>
											<option <?php if ($rcekR['rfc_elastane1'] == "NYLON") { ?> selected=selected <?php }
											; ?>value="NYLON">NYLON</option>
											<option <?php if ($rcekR['rfc_elastane1'] == "ELASTANE") { ?> selected=selected
												<?php }
											; ?>value="ELASTANE">ELASTANE</option>
											<option <?php if ($rcekR['rfc_elastane1'] == "TENCEL") { ?> selected=selected
												<?php }
											; ?>value="TENCEL">TENCEL</option>
											<option <?php if ($rcekR['rfc_elastane1'] == "LYCRA") { ?> selected=selected <?php }
											; ?>value="LYCRA">LYCRA</option>
											<option <?php if ($rcekR['rfc_elastane1'] == "rPOLYESTER") { ?> selected=selected
												<?php }
											; ?>value="rPOLYESTER">rPOLYESTER</option>
											<option <?php if ($rcekR['rfc_elastane1'] == "MODAL") { ?> selected=selected <?php }
											; ?>value="MODAL">MODAL</option>
											<option <?php if ($rcekR['rfc_elastane1'] == "ACRYLIC") { ?> selected=selected
												<?php }
											; ?>value="ACRYLIC">ACRYLIC</option>
											<option <?php if ($rcekR['rfc_elastane1'] == "VISCOSE") { ?> selected=selected
												<?php }
											; ?>value="VISCOSE">VISCOSE</option>
										</select>
									</div>
									<div class="col-sm-2">
										<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
											name="rfiber_note" maxlength="50" rows="1"
											readonly><?php echo $rcekR['rfiber_note']; ?></textarea>
									</div>
								</div>
								<!-- FIBER CONTENT END-->
								<!-- FABRIC COUNT BEGIN-->
								<div class="form-group" id="fc3" style="display:none;">
									<label for="fabric_count" class="col-sm-2 control-label">FABRIC COUNT</label>
									<div class="col-sm-2">
										<input name="wpi" type="text" class="form-control" id="wpi"
											value="<?php echo $rcek1['fc_wpi']; ?>" placeholder="WPI">
									</div>
									<div class="col-sm-2">
										<input name="cpi" type="text" class="form-control" id="cpi"
											value="<?php echo $rcek1['fc_cpi']; ?>" placeholder="CPI">
									</div>
									<div class="col-sm-2">
										<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
											name="fc_note" maxlength="50"
											rows="1"><?php echo $rcek1['fc_note']; ?></textarea>
									</div>
								</div>
								<div class="form-group" id="stat_fc" style="display:none;">
									<label for="stat_fc" class="col-sm-2 control-label">STATUS</label>
									<div class="col-sm-2">
										<select name="stat_fc" class="form-control select2" id="stat_fc"
											onChange="tampil();" style="width: 100%;">
											<option <?php if ($rcek1['stat_fc'] == "") { ?> selected=selected <?php }
											; ?>value="">
												Pilih</option>
											<option <?php if ($rcek1['stat_fc'] == "DISPOSISI") { ?> selected=selected <?php }
											; ?>value="DISPOSISI">DISPOSISI</option>
											<option <?php if ($rcek1['stat_fc'] == "A") { ?> selected=selected <?php }
											; ?>value="A">A</option>
											<option <?php if ($rcek1['stat_fc'] == "R") { ?> selected=selected <?php }
											; ?>value="R">R</option>
											<option <?php if ($rcek1['stat_fc'] == "PASS") { ?> selected=selected <?php }
											; ?>value="PASS">PASS</option>
											<option <?php if ($rcek1['stat_fc'] == "FAIL") { ?> selected=selected <?php }
											; ?>value="FAIL">FAIL</option>
											<option <?php if ($rcek1['stat_fc'] == "RANDOM") { ?> selected=selected <?php }
											; ?>value="RANDOM">RANDOM</option>

										</select>
									</div>
								</div>
								<div class="form-group" id="disfc" style="display:none;">
									<label for="disfc" class="col-sm-2 control-label">FABRIC COUNT (DIS)</label>
									<div class="col-sm-2">
										<input name="dwpi" type="text" class="form-control" id="dwpi"
											value="<?php echo $rcekD['dfc_wpi']; ?>" placeholder="WPI">
									</div>
									<div class="col-sm-2">
										<input name="dcpi" type="text" class="form-control" id="dcpi"
											value="<?php echo $rcekD['dfc_wpi']; ?>" placeholder="CPI">
									</div>
									<div class="col-sm-2">
										<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
											name="dfc_note" maxlength="50"
											rows="1"><?php echo $rcekD['dfc_note']; ?></textarea>
									</div>
								</div>
								<div class="form-group" id="ranfc" style="display:none;">
									<label for="ranfc" class="col-sm-2 control-label">FABRIC COUNT (RAN)</label>
									<div class="col-sm-2">
										<input name="rwpi" type="text" class="form-control" id="rwpi"
											value="<?php echo $rcekR['rfc_wpi']; ?>" placeholder="WPI" readonly>
									</div>
									<div class="col-sm-2">
										<input name="rcpi" type="text" class="form-control" id="rcpi"
											value="<?php echo $rcekR['rfc_wpi']; ?>" placeholder="CPI" readonly>
									</div>
									<div class="col-sm-2">
										<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
											name="rfc_note" maxlength="50" rows="1"
											readonly><?php echo $rcekR['rfc_note']; ?></textarea>
									</div>
								</div>
								<!-- FABRIC COUNT END-->
								<!-- FABRIC WEIGHT BEGIN-->
								<div class="form-group" id="fc4" style="display:none;">
									<label for="fabric_weight" class="col-sm-2 control-label">FABRIC WEIGHT</label>
									<div class="col-sm-2">
										<input name="fabric_weight" type="text" class="form-control" id="fabric_weight"
											value="<?php echo $rcek1['f_weight']; ?>" placeholder="FABRIC WEIGHT">
									</div>
									<div class="col-sm-2">
										<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
											name="fwe_note" maxlength="50"
											rows="1"><?php echo $rcek1['fwe_note']; ?></textarea>
									</div>
									<div class="col-sm-2">
										<select name="stat_fwss2" class="form-control select2" id="stat_fwss2"
											onChange="tampil();" style="width: 100%;">
											<option <?php if ($rcek1['stat_fwss2'] == "") { ?> selected=selected <?php }
											; ?>value="">Pilih</option>
											<option <?php if ($rcek1['stat_fwss2'] == "DISPOSISI") { ?> selected=selected
												<?php }
											; ?>value="DISPOSISI">DISPOSISI</option>
											<option <?php if ($rcek1['stat_fwss2'] == "A") { ?> selected=selected <?php }
											; ?>value="A">A</option>
											<option <?php if ($rcek1['stat_fwss2'] == "R") { ?> selected=selected <?php }
											; ?>value="R">R</option>
											<option <?php if ($rcek1['stat_fwss2'] == "PASS") { ?> selected=selected <?php }
											; ?>value="PASS">PASS</option>
											<option <?php if ($rcek1['stat_fwss2'] == "MARGINAL PASS") { ?> selected=selected
												<?php }
											; ?>value="MARGINAL PASS">MARGINAL PASS</option>
											<option <?php if ($rcek1['stat_fwss2'] == "DATA") { ?> selected=selected <?php }
											; ?>value="DATA">DATA</option>
											<option <?php if ($rcek1['stat_fwss2'] == "FAIL") { ?> selected=selected <?php }
											; ?>value="FAIL">FAIL</option>
											<option <?php if ($rcek1['stat_fwss2'] == "RANDOM") { ?> selected=selected <?php }
											; ?>value="RANDOM">RANDOM</option>
										</select>
									</div>
								</div>
								<div class="form-group" id="disfw" style="display:none;">
									<label for="disfw" class="col-sm-2 control-label">FABRIC WEIGHT (DIS)</label>
									<div class="col-sm-2">
										<input name="dfabric_weight" type="text" class="form-control" id="dfabric_weight"
											value="<?php echo $rcekD['df_weight']; ?>" placeholder="FABRIC WEIGHT">
									</div>
									<div class="col-sm-2">
										<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
											name="dfwe_note" maxlength="50"
											rows="1"><?php echo $rcekD['dfwe_note']; ?></textarea>
									</div>
								</div>
								<div class="form-group" id="marfw" style="display:none;">
									<label for="marfw" class="col-sm-2 control-label">FABRIC WEIGHT (MARGINAL)</label>
									<div class="col-sm-2">
										<input name="mfabric_weight" type="text" class="form-control" id="mfabric_weight"
											value="<?php echo $rcekM['mf_weight']; ?>" placeholder="FABRIC WEIGHT">
									</div>
									<div class="col-sm-2">
										<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
											name="mfwe_note" maxlength="50"
											rows="1"><?php echo $rcekM['mfwe_note']; ?></textarea>
									</div>
								</div>
								<div class="form-group" id="ranfw" style="display:none;">
									<label for="ranfw" class="col-sm-2 control-label">FABRIC WEIGHT (RAN)</label>
									<div class="col-sm-2">
										<input name="rfabric_weight" type="text" class="form-control" id="rfabric_weight"
											value="<?php echo $rcekR['rf_weight']; ?>" placeholder="FABRIC WEIGHT" readonly>
									</div>
									<div class="col-sm-2">
										<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
											name="rfwe_note" maxlength="50" rows="1"
											readonly><?php echo $rcekR['rfwe_note']; ?></textarea>
									</div>
								</div>
								<!-- FABRIC WEIGHT END-->
								<!-- FABRIC WIDTH BEGIN-->
								<div class="form-group" id="fc5" style="display:none;">
									<label for="fabric_width" class="col-sm-2 control-label">FABRIC WIDTH</label>
									<div class="col-sm-2">
										<input name="fabric_width" type="text" class="form-control" id="fabric_width"
											value="<?php echo $rcek1['f_width']; ?>" placeholder="FABRIC WIDTH">
									</div>
									<div class="col-sm-2">
										<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
											name="fwi_note" maxlength="50"
											rows="1"><?php echo $rcek1['fwi_note']; ?></textarea>
									</div>
									<div class="col-sm-2">
										<select name="stat_fwss3" class="form-control select2" id="stat_fwss3"
											onChange="tampil();" style="width: 100%;">
											<option <?php if ($rcek1['stat_fwss3'] == "") { ?> selected=selected <?php }
											; ?>value="">Pilih</option>
											<option <?php if ($rcek1['stat_fwss3'] == "DISPOSISI") { ?> selected=selected
												<?php }
											; ?>value="DISPOSISI">DISPOSISI</option>
											<option <?php if ($rcek1['stat_fwss3'] == "A") { ?> selected=selected <?php }
											; ?>value="A">A</option>
											<option <?php if ($rcek1['stat_fwss3'] == "R") { ?> selected=selected <?php }
											; ?>value="R">R</option>
											<option <?php if ($rcek1['stat_fwss3'] == "PASS") { ?> selected=selected <?php }
											; ?>value="PASS">PASS</option>
											<option <?php if ($rcek1['stat_fwss3'] == "MARGINAL PASS") { ?> selected=selected
												<?php }
											; ?>value="MARGINAL PASS">MARGINAL PASS</option>
											<option <?php if ($rcek1['stat_fwss3'] == "DATA") { ?> selected=selected <?php }
											; ?>value="DATA">DATA</option>
											<option <?php if ($rcek1['stat_fwss3'] == "FAIL") { ?> selected=selected <?php }
											; ?>value="FAIL">FAIL</option>
											<option <?php if ($rcek1['stat_fwss3'] == "RANDOM") { ?> selected=selected <?php }
											; ?>value="RANDOM">RANDOM</option>
										</select>
									</div>
								</div>
								<div class="form-group" id="disfwi" style="display:none;">
									<label for="disfwi" class="col-sm-2 control-label">FABRIC WIDTH (DIS)</label>
									<div class="col-sm-2">
										<input name="dfabric_width" type="text" class="form-control" id="dfabric_width"
											value="<?php echo $rcekD['df_width']; ?>" placeholder="FABRIC WIDTH">
									</div>
									<div class="col-sm-2">
										<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
											name="dfwi_note" maxlength="50"
											rows="1"><?php echo $rcekD['dfwi_note']; ?></textarea>
									</div>
								</div>
								<div class="form-group" id="marfwi" style="display:none;">
									<label for="marfwi" class="col-sm-2 control-label">FABRIC WIDTH (MARGINAL)</label>
									<div class="col-sm-2">
										<input name="mfabric_width" type="text" class="form-control" id="mfabric_width"
											value="<?php echo $rcekM['mf_width']; ?>" placeholder="FABRIC WIDTH">
									</div>
									<div class="col-sm-2">
										<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
											name="mfwi_note" maxlength="50"
											rows="1"><?php echo $rcekM['mfwi_note']; ?></textarea>
									</div>
								</div>
								<div class="form-group" id="ranfwi" style="display:none;">
									<label for="ranfwi" class="col-sm-2 control-label">FABRIC WIDTH (RAN)</label>
									<div class="col-sm-2">
										<input name="rfabric_width" type="text" class="form-control" id="rfabric_width"
											value="<?php echo $rcekR['rf_width']; ?>" placeholder="FABRIC WIDTH" readonly>
									</div>
									<div class="col-sm-2">
										<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
											name="rfwi_note" maxlength="50" rows="1"
											readonly><?php echo $rcekR['rfwi_note']; ?></textarea>
									</div>
								</div>
								<!-- FABRIC WIDTH END-->
								<!-- BOW & SKEW BEGIN-->
								<div class="form-group" id="fc6" style="display:none;">
									<label for="bow_skew" class="col-sm-2 control-label">BOW &amp; SKEW</label>
									<div class="col-sm-2">
										<input name="bow" type="text" class="form-control" id="bow"
											value="<?php echo $rcek1['bow']; ?>" placeholder="BOW">
									</div>
									<div class="col-sm-2">
										<input name="skew" type="text" class="form-control" id="skew"
											value="<?php echo $rcek1['skew']; ?>" placeholder="SKEW">
									</div>
									<div class="col-sm-2">
										<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
											name="bas_note" maxlength="200"
											rows="1"><?php echo $rcek1['bas_note']; ?></textarea>
									</div>
								</div>
								<div class="form-group" id="stat_bsk" style="display:none;">
									<label for="stat_bsk" class="col-sm-2 control-label">STATUS</label>
									<div class="col-sm-2">
										<select name="stat_bsk" class="form-control select2" id="stat_bsk"
											onChange="tampil();" style="width: 100%;">
											<option <?php if ($rcek1['stat_bsk'] == "") { ?> selected=selected <?php }
											; ?>value="">Pilih</option>
											<option <?php if ($rcek1['stat_bsk'] == "DISPOSISI") { ?> selected=selected <?php }
											; ?>value="DISPOSISI">DISPOSISI</option>
											<option <?php if ($rcek1['stat_bsk'] == "A") { ?> selected=selected <?php }
											; ?>value="A">A</option>
											<option <?php if ($rcek1['stat_bsk'] == "R") { ?> selected=selected <?php }
											; ?>value="R">R</option>
											<option <?php if ($rcek1['stat_bsk'] == "PASS") { ?> selected=selected <?php }
											; ?>value="PASS">PASS</option>
											<option <?php if ($rcek1['stat_bsk'] == "MARGINAL PASS") { ?> selected=selected
												<?php }
											; ?>value="MARGINAL PASS">MARGINAL PASS</option>
											<option <?php if ($rcek1['stat_bsk'] == "DATA") { ?> selected=selected <?php }
											; ?>value="DATA">DATA</option>
											<option <?php if ($rcek1['stat_bsk'] == "FAIL") { ?> selected=selected <?php }
											; ?>value="FAIL">FAIL</option>
											<option <?php if ($rcek1['stat_bsk'] == "RANDOM") { ?> selected=selected <?php }
											; ?>value="RANDOM">RANDOM</option>
										</select>
									</div>
								</div>
								<div class="form-group" id="disbsk" style="display:none;">
									<label for="disbsk" class="col-sm-2 control-label">BOW &amp; SKEW (DIS)</label>
									<div class="col-sm-2">
										<input name="dbow" type="text" class="form-control" id="dbow"
											value="<?php echo $rcekD['dbow']; ?>" placeholder="BOW">
									</div>
									<div class="col-sm-2">
										<input name="dskew" type="text" class="form-control" id="dskew"
											value="<?php echo $rcekD['dskew']; ?>" placeholder="SKEW">
									</div>
									<div class="col-sm-2">
										<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
											name="dbas_note" maxlength="200"
											rows="1"><?php echo $rcekD['dbas_note']; ?></textarea>
									</div>
								</div>
								<div class="form-group" id="marbsk" style="display:none;">
									<label for="marbsk" class="col-sm-2 control-label">BOW &amp; SKEW (MARGINAL)</label>
									<div class="col-sm-2">
										<input name="mbow" type="text" class="form-control" id="mbow"
											value="<?php echo $rcekM['mbow']; ?>" placeholder="BOW">
									</div>
									<div class="col-sm-2">
										<input name="mskew" type="text" class="form-control" id="mskew"
											value="<?php echo $rcekM['mskew']; ?>" placeholder="SKEW">
									</div>
									<div class="col-sm-2">
										<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
											name="mbas_note" maxlength="200"
											rows="1"><?php echo $rcekM['mbas_note']; ?></textarea>
									</div>
								</div>
								<div class="form-group" id="ranbsk" style="display:none;">
									<label for="ranbsk" class="col-sm-2 control-label">BOW &amp; SKEW (RAN)</label>
									<div class="col-sm-2">
										<input name="rbow" type="text" class="form-control" id="rbow"
											value="<?php echo $rcekR['rbow']; ?>" placeholder="BOW" readonly>
									</div>
									<div class="col-sm-2">
										<input name="rskew" type="text" class="form-control" id="rskew"
											value="<?php echo $rcekR['rskew']; ?>" placeholder="SKEW" readonly>
									</div>
									<div class="col-sm-2">
										<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
											name="rbas_note" maxlength="200" rows="1"
											readonly><?php echo $rcekR['rbas_note']; ?></textarea>
									</div>
								</div>
								<!-- BOW & SKEW END-->
								<!-- SHRINKAGE & SPIRALITY & APPEARANCE BEGIN-->
								<div class="form-group" id="fc7" style="display:none;">
									<label for="shrinkage_len" class="col-sm-2 control-label">SHRINKAGE &amp;
										SPIRALITY</label>
									<div class="col-sm-1">
										<label><input type="checkbox" name="ss_temp" id="ss_temp" class="minimal" value="30"
												<?php if ($rcek1['ss_temp'] == '30') {
													echo "checked";
												} ?>> 30&deg;C &nbsp;
											&nbsp;
											&nbsp; &nbsp;
										</label>
										<label><input type="checkbox" name="ss_temp" id="ss_temp" class="minimal" value="40"
												<?php if ($rcek1['ss_temp'] == '40') {
													echo "checked";
												} ?>> 40&deg;C
										</label>
										<label><input type="checkbox" name="ss_temp" id="ss_temp" class="minimal" value="60"
												<?php if ($rcek1['ss_temp'] == '60') {
													echo "checked";
												} ?>> 60&deg;C
										</label>
									</div>
									<div class="col-sm-1">
										<label><input type="checkbox" name="ss_washes3" id="ss_washes3" class="minimal"
												value="3" <?php if ($rcek1['ss_washes3'] == '3') {
													echo "checked";
												} ?>> X3
											&nbsp;
											&nbsp; &nbsp; &nbsp;
										</label>
										<label><input type="checkbox" name="ss_washes10" id="ss_washes10" class="minimal"
												value="10" <?php if ($rcek1['ss_washes10'] == '10') {
													echo "checked";
												} ?>>
											X10
										</label>
										<label><input type="checkbox" name="ss_washes15" id="ss_washes15" class="minimal"
												value="15" <?php if ($rcek1['ss_washes15'] == '15') {
													echo "checked";
												} ?>>
											X15
										</label>
									</div>
									<div class="col-sm-1">
										<label><input type="checkbox" name="ss_linedry" id="ss_linedry" class="minimal"
												value="1" <?php if ($rcek1['ss_linedry'] == '1') {
													echo "checked";
												} ?>> Line
											Dry
										</label>
										<label><input type="checkbox" name="ss_tumbledry" id="ss_tumbledry" class="minimal"
												value="1" <?php if ($rcek1['ss_tumbledry'] == '1') {
													echo "checked";
												} ?>>
											Tumble
											Dry
										</label>
									</div>
									<div class="col-sm-1">
										<input name="shrinkage_len1" type="text" class="form-control" id="shrinkage_len1"
											value="<?php echo $rcek1['shrinkage_l1']; ?>" placeholder="LEN 1">
										<input name="shrinkage_wid1" type="text" class="form-control" id="shrinkage_wid1"
											value="<?php echo $rcek1['shrinkage_w1']; ?>" placeholder="WID 1">
										<input style="margin-top:15px" name="spirality1" type="text" class="form-control"
											id="spirality1" value="<?php echo $rcek1['spirality1']; ?>" placeholder="SPI 1">
									</div>
									<div class="col-sm-1">
										<input name="shrinkage_len2" type="text" class="form-control" id="shrinkage_len2"
											value="<?php echo $rcek1['shrinkage_l2']; ?>" placeholder="LEN 2">
										<input name="shrinkage_wid2" type="text" class="form-control" id="shrinkage_wid2"
											value="<?php echo $rcek1['shrinkage_w2']; ?>" placeholder="WID 2">
										<input style="margin-top:15px" name="spirality2" type="text" class="form-control"
											id="spirality2" value="<?php echo $rcek1['spirality2']; ?>" placeholder="SPI 2">
									</div>
									<div class="col-sm-1">
										<input name="shrinkage_len3" type="text" class="form-control" id="shrinkage_len3"
											value="<?php echo $rcek1['shrinkage_l3']; ?>" placeholder="LEN 3">
										<input name="shrinkage_wid3" type="text" class="form-control" id="shrinkage_wid3"
											value="<?php echo $rcek1['shrinkage_w3']; ?>" placeholder="WID 3">
										<input style="margin-top:15px" name="spirality3" type="text" class="form-control"
											id="spirality3" value="<?php echo $rcek1['spirality3']; ?>" placeholder="SPI 3">
									</div>
									<div class="col-sm-1">
										<input name="shrinkage_len4" type="text" class="form-control" id="shrinkage_len4"
											value="<?php echo $rcek1['shrinkage_l4']; ?>" placeholder="LEN 4">
										<input name="shrinkage_wid4" type="text" class="form-control" id="shrinkage_wid4"
											value="<?php echo $rcek1['shrinkage_w4']; ?>" placeholder="WID 4">
										<input style="margin-top:15px" name="spirality4" type="text" class="form-control"
											id="spirality4" value="<?php echo $rcek1['spirality4']; ?>" placeholder="SPI 4">
									</div>
									<div class="col-sm-1">
										<input name="shrinkage_len5" type="text" class="form-control" id="shrinkage_len5"
											value="<?php echo $rcek1['shrinkage_l5']; ?>" placeholder="LEN 5">
										<input name="shrinkage_wid5" type="text" class="form-control" id="shrinkage_wid5"
											value="<?php echo $rcek1['shrinkage_w5']; ?>" placeholder="WID 5">
										<input style="margin-top:15px" name="spirality5" type="text" class="form-control"
											id="spirality5" value="<?php echo $rcek1['spirality5']; ?>" placeholder="SPI 5">
									</div>
									<div class="col-sm-1">
										<input name="shrinkage_len6" type="text" class="form-control" id="shrinkage_len6"
											value="<?php echo $rcek1['shrinkage_l6']; ?>" placeholder="LEN 6">
										<input name="shrinkage_wid6" type="text" class="form-control" id="shrinkage_wid6"
											value="<?php echo $rcek1['shrinkage_w6']; ?>" placeholder="WID 6">
										<input style="margin-top:15px" name="spirality6" type="text" class="form-control"
											id="spirality6" value="<?php echo $rcek1['spirality6']; ?>" placeholder="SPI 6">
									</div>
									<div class="col-sm-1">
										<textarea style="margin-bottom:10px" class="form-control"
											placeholder="Note harus diakhir tanda titik" name="sns_note" maxlength="50"
											rows="3"><?php echo $rcek1['sns_note']; ?></textarea>
										<!--spirality_status_view-->
										<?php
										$spirality_status = ['DISPOSISI', 'A', 'R', 'PASS', 'FAIL', 'RANDOM']; ?>
										<select name="spirality_status" class="form-control select2" id="stat_sparility"
											onChange="tampil();">
											<option value="0">Pilih</option>
											<?php foreach ($spirality_status as $status_sp) {
												if ($status_sp == $tq_test_2_array['spirality_status']) {
													echo '<option selected value="' . $status_sp . '">' . $status_sp . '</option>';
												} else {
													echo '<option  value="' . $status_sp . '">' . $status_sp . '</option>';
												}
											}
											?>
										</select>
									</div>
								</div>
								<div class="form-group" id="dis_spirality_status" style="display:none;">
									<div class="col-sm-5"></div>

									<div class="col-sm-1"><input name="dspirality1"
											value="<?php echo $rcekD['dspirality1']; ?>" type="text" class="form-control">
									</div>
									<div class="col-sm-1"><input name="dspirality2"
											value="<?php echo $rcekD['dspirality2']; ?>" type="text" class="form-control">
									</div>
									<div class="col-sm-1"><input name="dspirality3"
											value="<?php echo $rcekD['dspirality3']; ?>" type="text" class="form-control">
									</div>
									<div class="col-sm-1"><input name="dspirality4"
											value="<?php echo $rcekD['dspirality4']; ?>" type="text" class="form-control">
									</div>
									<div class="col-sm-1"><input name="dspirality5"
											value="<?php echo $rcekD['dspirality5']; ?>" type="text" class="form-control">
									</div>
									<div class="col-sm-1"><input name="dspirality6"
											value="<?php echo $rcekD['dspirality6']; ?>" type="text" class="form-control">
									</div>
								</div>

								<div class="form-group" id="fc24" style="display:none;">
									<label for="apperss" class="col-sm-2 control-label">APPEARANCE</label>
									<div class="col-sm-1">
										<input name="apperss_pf1" type="text" class="form-control" id="apperss_pf1"
											value="<?php echo $rcek1['apperss_pf1']; ?>" placeholder="PILLING FACE 1">
										<input name="apperss_pb1" type="text" class="form-control" id="apperss_pb1"
											value="<?php echo $rcek1['apperss_pb1']; ?>" placeholder="PILLING BACK 1">
										<input name="apperss_ch1" type="text" class="form-control" id="apperss_ch1"
											value="<?php echo $rcek1['apperss_ch1']; ?>" placeholder="PASS/FAIL 1">
										<input name="apperss_cc1" type="text" class="form-control" id="apperss_cc1"
											value="<?php echo $rcek1['apperss_cc1']; ?>" placeholder="C.CHANGE 1">
										<input name="apperss_sf1" type="text" class="form-control" id="apperss_sf1"
											value="<?php echo $rcek1['apperss_sf1']; ?>" placeholder="SNAGGING FACE 1">
										<input name="apperss_sb1" type="text" class="form-control" id="apperss_sb1"
											value="<?php echo $rcek1['apperss_sb1']; ?>" placeholder="SNAGGING BACK 1">
										<input name="apperss_st" type="text" class="form-control" id="apperss_st"
											value="<?php echo $rcek1['apperss_st']; ?>" placeholder="C.STAINING">
									</div>
									<div class="col-sm-1">
										<input name="apperss_pf2" type="text" class="form-control" id="apperss_pf2"
											value="<?php echo $rcek1['apperss_pf2']; ?>" placeholder="PILLING FACE 2">
										<input name="apperss_pb2" type="text" class="form-control" id="apperss_pb2"
											value="<?php echo $rcek1['apperss_pb2']; ?>" placeholder="PILLING BACK 2">
										<input name="apperss_ch2" type="text" class="form-control" id="apperss_ch2"
											value="<?php echo $rcek1['apperss_ch2']; ?>" placeholder="PASS/FAIL 2">
										<input name="apperss_cc2" type="text" class="form-control" id="apperss_cc2"
											value="<?php echo $rcek1['apperss_cc2']; ?>" placeholder="C.CHANGE 2">
										<input name="apperss_sf2" type="text" class="form-control" id="apperss_sf2"
											value="<?php echo $rcek1['apperss_sf2']; ?>" placeholder="SNAGGING FACE 2">
										<input name="apperss_sb2" type="text" class="form-control" id="apperss_sb2"
											value="<?php echo $rcek1['apperss_sb2']; ?>" placeholder="SNAGGING BACK 2">
									</div>
									<div class="col-sm-1">
										<input name="apperss_pf3" type="text" class="form-control" id="apperss_pf3"
											value="<?php echo $rcek1['apperss_pf3']; ?>" placeholder="PILLING FACE 3">
										<input name="apperss_pb3" type="text" class="form-control" id="apperss_pb3"
											value="<?php echo $rcek1['apperss_pb3']; ?>" placeholder="PILLING BACK 3">
										<input name="apperss_ch3" type="text" class="form-control" id="apperss_ch3"
											value="<?php echo $rcek1['apperss_ch3']; ?>" placeholder="PASS/FAIL 3">
										<input name="apperss_cc3" type="text" class="form-control" id="apperss_cc3"
											value="<?php echo $rcek1['apperss_cc3']; ?>" placeholder="C.CHANGE 3">
										<input name="apperss_sf3" type="text" class="form-control" id="apperss_sf3"
											value="<?php echo $rcek1['apperss_sf3']; ?>" placeholder="SNAGGING FACE 3">
										<input name="apperss_sb3" type="text" class="form-control" id="apperss_sb3"
											value="<?php echo $rcek1['apperss_sb3']; ?>" placeholder="SNAGGING BACK 3">
									</div>
									<div class="col-sm-1">
										<input name="apperss_pf4" type="text" class="form-control" id="apperss_pf4"
											value="<?php echo $rcek1['apperss_pf4']; ?>" placeholder="PILLING FACE 4">
										<input name="apperss_pb4" type="text" class="form-control" id="apperss_pb4"
											value="<?php echo $rcek1['apperss_pb4']; ?>" placeholder="PILLING BACK 4">
										<input name="apperss_ch4" type="text" class="form-control" id="apperss_ch4"
											value="<?php echo $rcek1['apperss_ch4']; ?>" placeholder="PASS/FAIL 4">
										<input name="apperss_cc4" type="text" class="form-control" id="apperss_cc4"
											value="<?php echo $rcek1['apperss_cc4']; ?>" placeholder="C.CHANGE 4">
										<input name="apperss_sf4" type="text" class="form-control" id="apperss_sf4"
											value="<?php echo $rcek1['apperss_sf4']; ?>" placeholder="SNAGGING FACE 4">
										<input name="apperss_sb4" type="text" class="form-control" id="apperss_sb4"
											value="<?php echo $rcek1['apperss_sb4']; ?>" placeholder="SNAGGING BACK 4">
									</div>
									<div class="col-sm-2">
										<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
											name="apperss_note"
											maxlength="1000">PHX-AP0701 slight color change, no obvious pilling (face=<?php echo $rcek1['apperss_pf2']; ?>, back=<?php echo $rcek1['apperss_pb2']; ?>), snagging (face=<?php echo $rcek1['apperss_sf2']; ?>, back=<?php echo $rcek1['apperss_sb2']; ?>), overall satisfactory</textarea>
									</div>
									<div class="col-sm-1">
										<label><input type="checkbox" name="ss_cmt" id="ss_cmt" class="minimal" value="1"
												<?php if ($rcek1['ss_cmt'] == '1') {
													echo "checked";
												} ?>> &#10003;
										</label>
									</div>
								</div>
								<div class="form-group" id="stat_fwss" style="display:none;">
									<label for="stat_fwss" class="col-sm-2 control-label">STATUS</label>
									<div class="col-sm-2">
										<select name="stat_fwss" class="form-control select2" id="stat_fwss"
											onChange="tampil();" style="width: 100%;">
											<option <?php if ($rcek1['stat_fwss'] == "") { ?> selected=selected <?php }
											; ?>value="">Pilih</option>
											<option <?php if ($rcek1['stat_fwss'] == "DISPOSISI") { ?> selected=selected <?php }
											; ?>value="DISPOSISI">DISPOSISI</option>
											<option <?php if ($rcek1['stat_fwss'] == "A") { ?> selected=selected <?php }
											; ?>value="A">A</option>
											<option <?php if ($rcek1['stat_fwss'] == "R") { ?> selected=selected <?php }
											; ?>value="R">R</option>
											<option <?php if ($rcek1['stat_fwss'] == "PASS") { ?> selected=selected <?php }
											; ?>value="PASS">PASS</option>
											<option <?php if ($rcek1['stat_fwss'] == "MARGINAL PASS") { ?> selected=selected
												<?php }
											; ?>value="MARGINAL PASS">MARGINAL PASS</option>
											<option <?php if ($rcek1['stat_fwss'] == "DATA") { ?> selected=selected <?php }
											; ?>value="DATA">DATA</option>
											<option <?php if ($rcek1['stat_fwss'] == "FAIL") { ?> selected=selected <?php }
											; ?>value="FAIL">FAIL</option>
											<option <?php if ($rcek1['stat_fwss'] == "RANDOM") { ?> selected=selected <?php }
											; ?>value="RANDOM">RANDOM</option>
										</select>
									</div>
								</div>
								<div class="form-group" id="dis_ss" style="display:none;">
									<label for="dis_ss" class="col-sm-2 control-label">SHRINKAGE &amp; SPIRALITY
										(DIS)</label>
									<div class="col-sm-1">
										<label><input type="checkbox" name="dss_temp" id="dss_temp" class="minimal"
												value="30" <?php if ($rcekD['dss_temp'] == '30') {
													echo "checked";
												} ?>>
											30&deg;C
											&nbsp; &nbsp; &nbsp; &nbsp;
										</label>
										<label><input type="checkbox" name="dss_temp" id="dss_temp" class="minimal"
												value="40" <?php if ($rcekD['dss_temp'] == '40') {
													echo "checked";
												} ?>>
											40&deg;C
										</label>
										<label><input type="checkbox" name="dss_temp" id="dss_temp" class="minimal"
												value="60" <?php if ($rcekD['dss_temp'] == '60') {
													echo "checked";
												} ?>>
											60&deg;C
										</label>
									</div>
									<div class="col-sm-1">
										<label><input type="checkbox" name="dss_washes3" id="dss_washes3" class="minimal"
												value="3" <?php if ($rcekD['dss_washes3'] == '3') {
													echo "checked";
												} ?>> X3
											&nbsp;
											&nbsp; &nbsp; &nbsp;
										</label>
										<label><input type="checkbox" name="dss_washes10" id="dss_washes10" class="minimal"
												value="10" <?php if ($rcekD['dss_washes10'] == '10') {
													echo "checked";
												} ?>>
											X10
										</label>
										<label><input type="checkbox" name="dss_washes15" id="dss_washes15" class="minimal"
												value="15" <?php if ($rcekD['dss_washes15'] == '15') {
													echo "checked";
												} ?>>
											X15
										</label>
									</div>
									<div class="col-sm-1">
										<label><input type="checkbox" name="dss_linedry" id="dss_linedry" class="minimal"
												value="1" <?php if ($rcekD['dss_linedry'] == '1') {
													echo "checked";
												} ?>> Line
											Dry
										</label>
										<label><input type="checkbox" name="dss_tumbledry" id="dss_tumbledry"
												class="minimal" value="1" <?php if ($rcekD['dss_tumbledry'] == '1') {
													echo "checked";
												} ?>> Tumble Dry
										</label>
									</div>
									<div class="col-sm-1">
										<input name="dshrinkage_len1" type="text" class="form-control" id="dshrinkage_len1"
											value="<?php echo $rcekD['dshrinkage_l1']; ?>" placeholder="LEN 1">
										<input name="dshrinkage_wid1" type="text" class="form-control" id="dshrinkage_wid1"
											value="<?php echo $rcekD['dshrinkage_w1']; ?>" placeholder="WID 1">
										<!--
									<input name="dspirality1" type="text" class="form-control" id="dspirality1" value="<?php echo $rcekD['dspirality1']; ?>" placeholder="SPI 1">
									-->
									</div>
									<div class="col-sm-1">
										<input name="dshrinkage_len2" type="text" class="form-control" id="dshrinkage_len2"
											value="<?php echo $rcekD['dshrinkage_l2']; ?>" placeholder="LEN 2">
										<input name="dshrinkage_wid2" type="text" class="form-control" id="dshrinkage_wid2"
											value="<?php echo $rcekD['dshrinkage_w2']; ?>" placeholder="WID 2">
										<!--
									<input name="dspirality2" type="text" class="form-control" id="dspirality2" value="<?php echo $rcekD['dspirality2']; ?>" placeholder="SPI 2">
									-->
									</div>
									<div class="col-sm-1">
										<input name="dshrinkage_len3" type="text" class="form-control" id="dshrinkage_len3"
											value="<?php echo $rcekD['dshrinkage_l3']; ?>" placeholder="LEN 3">
										<input name="dshrinkage_wid3" type="text" class="form-control" id="dshrinkage_wid3"
											value="<?php echo $rcekD['dshrinkage_w3']; ?>" placeholder="WID 3">
										<!--
									<input name="dspirality3" type="text" class="form-control" id="dspirality3" value="<?php echo $rcekD['dspirality3']; ?>" placeholder="SPI 3">
									-->
									</div>
									<div class="col-sm-1">
										<input name="dshrinkage_len4" type="text" class="form-control" id="dshrinkage_len4"
											value="<?php echo $rcekD['dshrinkage_l4']; ?>" placeholder="LEN 4">
										<input name="dshrinkage_wid4" type="text" class="form-control" id="dshrinkage_wid4"
											value="<?php echo $rcekD['dshrinkage_w4']; ?>" placeholder="WID 4">
										<!--
									<input name="dspirality4" type="text" class="form-control" id="dspirality4" value="<?php echo $rcekD['dspirality4']; ?>" placeholder="SPI 4">
									-->
									</div>
									<div class="col-sm-1">
										<input name="dshrinkage_len5" type="text" class="form-control" id="dshrinkage_len5"
											value="<?php echo $rcekD['dshrinkage_l5']; ?>" placeholder="LEN 5">
										<input name="dshrinkage_wid5" type="text" class="form-control" id="dshrinkage_wid5"
											value="<?php echo $rcekD['dshrinkage_w5']; ?>" placeholder="WID 5">
										<!--
									<input name="dspirality5" type="text" class="form-control" id="dspirality5" value="<?php echo $rcekD['dspirality5']; ?>" placeholder="SPI 5">
									-->
									</div>
									<div class="col-sm-1">
										<input name="dshrinkage_len6" type="text" class="form-control" id="dshrinkage_len6"
											value="<?php echo $rcekD['dshrinkage_l6']; ?>" placeholder="LEN 6">
										<input name="dshrinkage_wid6" type="text" class="form-control" id="dshrinkage_wid6"
											value="<?php echo $rcekD['dshrinkage_w6']; ?>" placeholder="WID 6">
										<!--
									<input name="dspirality6" type="text" class="form-control" id="dspirality6" value="<?php echo $rcekD['dspirality6']; ?>" placeholder="SPI 6">
									-->
									</div>

									<div class="col-sm-1">
										<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
											name="dsns_note" maxlength="50"
											rows="3"><?php echo $rcekD['dsns_note']; ?></textarea>
									</div>
								</div>



								<div class="form-group" id="mar_ss" style="display:none;">
									<label for="mar_ss" class="col-sm-2 control-label">SHRINKAGE &amp; SPIRALITY
										(MARGINAL)</label>
									<div class="col-sm-1">
										<label><input type="checkbox" name="mss_temp" id="mss_temp" class="minimal"
												value="30" <?php if ($rcekM['mss_temp'] == '30') {
													echo "checked";
												} ?>>
											30&deg;C
											&nbsp; &nbsp; &nbsp; &nbsp;
										</label>
										<label><input type="checkbox" name="mss_temp" id="mss_temp" class="minimal"
												value="40" <?php if ($rcekM['mss_temp'] == '40') {
													echo "checked";
												} ?>>
											40&deg;C
										</label>
										<label><input type="checkbox" name="mss_temp" id="mss_temp" class="minimal"
												value="60" <?php if ($rcekM['mss_temp'] == '60') {
													echo "checked";
												} ?>>
											60&deg;C
										</label>
									</div>
									<div class="col-sm-1">
										<label><input type="checkbox" name="mss_washes3" id="mss_washes3" class="minimal"
												value="3" <?php if ($rcekM['mss_washes3'] == '3') {
													echo "checked";
												} ?>> X3
											&nbsp;
											&nbsp; &nbsp; &nbsp;
										</label>
										<label><input type="checkbox" name="mss_washes10" id="mss_washes10" class="minimal"
												value="10" <?php if ($rcekM['mss_washes10'] == '10') {
													echo "checked";
												} ?>>
											X10
										</label>
										<label><input type="checkbox" name="mss_washes15" id="mss_washes15" class="minimal"
												value="15" <?php if ($rcekM['mss_washes15'] == '15') {
													echo "checked";
												} ?>>
											X15
										</label>
									</div>
									<div class="col-sm-1">
										<label><input type="checkbox" name="mss_linedry" id="mss_linedry" class="minimal"
												value="1" <?php if ($rcekM['mss_linedry'] == '1') {
													echo "checked";
												} ?>> Line
											Dry
										</label>
										<label><input type="checkbox" name="mss_tumbledry" id="mss_tumbledry"
												class="minimal" value="1" <?php if ($rcekM['mss_tumbledry'] == '1') {
													echo "checked";
												} ?>> Tumble Dry
										</label>
									</div>
									<div class="col-sm-1">
										<input name="mshrinkage_len1" type="text" class="form-control" id="mshrinkage_len1"
											value="<?php echo $rcekM['mshrinkage_l1']; ?>" placeholder="LEN 1">
										<input name="mshrinkage_wid1" type="text" class="form-control" id="mshrinkage_wid1"
											value="<?php echo $rcekM['mshrinkage_w1']; ?>" placeholder="WID 1">
										<input name="mspirality1" type="text" class="form-control" id="mspirality1"
											value="<?php echo $rcekM['mspirality1']; ?>" placeholder="SPI 1">
									</div>
									<div class="col-sm-1">
										<input name="mshrinkage_len2" type="text" class="form-control" id="mshrinkage_len2"
											value="<?php echo $rcekM['mshrinkage_l2']; ?>" placeholder="LEN 2">
										<input name="mshrinkage_wid2" type="text" class="form-control" id="mshrinkage_wid2"
											value="<?php echo $rcekM['mshrinkage_w2']; ?>" placeholder="WID 2">
										<input name="mspirality2" type="text" class="form-control" id="mspirality2"
											value="<?php echo $rcekM['mspirality2']; ?>" placeholder="SPI 2">
									</div>
									<div class="col-sm-1">
										<input name="mshrinkage_len3" type="text" class="form-control" id="mshrinkage_len3"
											value="<?php echo $rcekM['mshrinkage_l3']; ?>" placeholder="LEN 3">
										<input name="mshrinkage_wid3" type="text" class="form-control" id="mshrinkage_wid3"
											value="<?php echo $rcekM['mshrinkage_w3']; ?>" placeholder="WID 3">
										<input name="mspirality3" type="text" class="form-control" id="mspirality3"
											value="<?php echo $rcekM['mspirality3']; ?>" placeholder="SPI 3">
									</div>
									<div class="col-sm-1">
										<input name="mshrinkage_len4" type="text" class="form-control" id="mshrinkage_len4"
											value="<?php echo $rcekM['mshrinkage_l4']; ?>" placeholder="LEN 4">
										<input name="mshrinkage_wid4" type="text" class="form-control" id="mshrinkage_wid4"
											value="<?php echo $rcekM['mshrinkage_w4']; ?>" placeholder="WID 4">
										<input name="mspirality4" type="text" class="form-control" id="mspirality4"
											value="<?php echo $rcekM['mspirality4']; ?>" placeholder="SPI 4">
									</div>
									<div class="col-sm-1">
										<input name="mshrinkage_len5" type="text" class="form-control" id="mshrinkage_len5"
											value="<?php echo $rcekM['mshrinkage_l5']; ?>" placeholder="LEN 5">
										<input name="mshrinkage_wid5" type="text" class="form-control" id="mshrinkage_wid5"
											value="<?php echo $rcekM['mshrinkage_w5']; ?>" placeholder="WID 5">
										<input name="mspirality5" type="text" class="form-control" id="mspirality5"
											value="<?php echo $rcekM['mspirality5']; ?>" placeholder="SPI 5">
									</div>
									<div class="col-sm-1">
										<input name="mshrinkage_len6" type="text" class="form-control" id="mshrinkage_len6"
											value="<?php echo $rcekM['mshrinkage_l6']; ?>" placeholder="LEN 6">
										<input name="mshrinkage_wid6" type="text" class="form-control" id="mshrinkage_wid6"
											value="<?php echo $rcekM['mshrinkage_w6']; ?>" placeholder="WID 6">
										<input name="mspirality6" type="text" class="form-control" id="mspirality6"
											value="<?php echo $rcekM['mspirality6']; ?>" placeholder="SPI 6">
									</div>
									<div class="col-sm-1">
										<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
											name="msns_note" maxlength="50"
											rows="3"><?php echo $rcekM['msns_note']; ?></textarea>
									</div>
								</div>
								<div class="form-group" id="ranss" style="display:none;">
									<label for="ranss" class="col-sm-2 control-label">SHRINKAGE &amp; SPIRALITY
										(RAN)</label>
									<div class="col-sm-1">
										<label><input type="checkbox" name="rss_temp" id="rss_temp" class="minimal"
												value="30" <?php if ($rcekR['rss_temp'] == '30') {
													echo "checked";
												} ?>>
											30&deg;C
											&nbsp; &nbsp; &nbsp; &nbsp;
										</label>
										<label><input type="checkbox" name="rss_temp" id="rss_temp" class="minimal"
												value="40" <?php if ($rcekR['rss_temp'] == '40') {
													echo "checked";
												} ?>>
											40&deg;C
										</label>
										<label><input type="checkbox" name="rss_temp" id="rss_temp" class="minimal"
												value="60" <?php if ($rcekR['rss_temp'] == '60') {
													echo "checked";
												} ?>>
											60&deg;C
										</label>
									</div>
									<div class="col-sm-1">
										<label><input type="checkbox" name="rss_washes3" id="rss_washes3" class="minimal"
												value="3" <?php if ($rcekR['rss_washes3'] == '3') {
													echo "checked";
												} ?>> X3
											&nbsp;
											&nbsp; &nbsp; &nbsp;
										</label>
										<label><input type="checkbox" name="rss_washes10" id="rss_washes10" class="minimal"
												value="10" <?php if ($rcekR['rss_washes10'] == '10') {
													echo "checked";
												} ?>>
											X10
										</label>
										<label><input type="checkbox" name="rss_washes15" id="rss_washes15" class="minimal"
												value="15" <?php if ($rcekR['rss_washes15'] == '15') {
													echo "checked";
												} ?>>
											X15
										</label>
									</div>
									<div class="col-sm-1">
										<label><input type="checkbox" name="rss_linedry" id="rss_linedry" class="minimal"
												value="1" <?php if ($rcekR['rss_linedry'] == '1') {
													echo "checked";
												} ?>> Line
											Dry
										</label>
										<label><input type="checkbox" name="rss_tumbledry" id="rss_tumbledry"
												class="minimal" value="1" <?php if ($rcekR['rss_tumbledry'] == '1') {
													echo "checked";
												} ?>> Tumble Dry
										</label>
									</div>
									<div class="col-sm-1">
										<input name="rshrinkage_len1" type="text" class="form-control" id="rshrinkage_len1"
											value="<?php echo $rcekR['rshrinkage_l1']; ?>" placeholder="LEN 1" readonly>
										<input name="rshrinkage_wid1" type="text" class="form-control" id="rshrinkage_wid1"
											value="<?php echo $rcekR['rshrinkage_w1']; ?>" placeholder="WID 1" readonly>
										<input name="rspirality1" type="text" class="form-control" id="rspirality1"
											value="<?php echo $rcekR['rspirality1']; ?>" placeholder="SPI 1" readonly>
									</div>
									<div class="col-sm-1">
										<input name="rshrinkage_len2" type="text" class="form-control" id="rshrinkage_len2"
											value="<?php echo $rcekR['rshrinkage_l2']; ?>" placeholder="LEN 2" readonly>
										<input name="rshrinkage_wid2" type="text" class="form-control" id="rshrinkage_wid2"
											value="<?php echo $rcekR['rshrinkage_w2']; ?>" placeholder="WID 2" readonly>
										<input name="rspirality2" type="text" class="form-control" id="rspirality2"
											value="<?php echo $rcekR['rspirality2']; ?>" placeholder="SPI 2" readonly>
									</div>
									<div class="col-sm-1">
										<input name="rshrinkage_len3" type="text" class="form-control" id="rshrinkage_len3"
											value="<?php echo $rcekR['rshrinkage_l3']; ?>" placeholder="LEN 3" readonly>
										<input name="rshrinkage_wid3" type="text" class="form-control" id="rshrinkage_wid3"
											value="<?php echo $rcekR['rshrinkage_w3']; ?>" placeholder="WID 3" readonly>
										<input name="rspirality3" type="text" class="form-control" id="rspirality3"
											value="<?php echo $rcekR['rspirality3']; ?>" placeholder="SPI 3" readonly>
									</div>
									<div class="col-sm-1">
										<input name="rshrinkage_len4" type="text" class="form-control" id="rshrinkage_len4"
											value="<?php echo $rcekR['rshrinkage_l4']; ?>" placeholder="LEN 4" readonly>
										<input name="rshrinkage_wid4" type="text" class="form-control" id="rshrinkage_wid4"
											value="<?php echo $rcekR['rshrinkage_w4']; ?>" placeholder="WID 4" readonly>
										<input name="rspirality4" type="text" class="form-control" id="rspirality4"
											value="<?php echo $rcekR['rspirality4']; ?>" placeholder="SPI 4" readonly>
									</div>
									<div class="col-sm-1">
										<input name="rshrinkage_len5" type="text" class="form-control" id="rshrinkage_len5"
											value="<?php echo $rcekR['rshrinkage_l5']; ?>" placeholder="LEN 5" readonly>
										<input name="rshrinkage_wid5" type="text" class="form-control" id="rshrinkage_wid5"
											value="<?php echo $rcekR['rshrinkage_w5']; ?>" placeholder="WID 5" readonly>
										<input name="rspirality5" type="text" class="form-control" id="rspirality5"
											value="<?php echo $rcekR['rspirality5']; ?>" placeholder="SPI 5" readonly>
									</div>
									<div class="col-sm-1">
										<input name="rshrinkage_len6" type="text" class="form-control" id="rshrinkage_len6"
											value="<?php echo $rcekR['rshrinkage_l6']; ?>" placeholder="LEN 6" readonly>
										<input name="rshrinkage_wid6" type="text" class="form-control" id="rshrinkage_wid6"
											value="<?php echo $rcekR['rshrinkage_w6']; ?>" placeholder="WID 6" readonly>
										<input name="rspirality6" type="text" class="form-control" id="rspirality6"
											value="<?php echo $rcekR['rspirality6']; ?>" placeholder="SPI 6" readonly>
									</div>
									<div class="col-sm-1">
										<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
											name="rsns_note" maxlength="50" rows="3"
											readonly><?php echo $rcekR['rsns_note']; ?></textarea>
									</div>
								</div>
								<div class="form-group" id="disapss" style="display:none;">
									<label for="disapss" class="col-sm-2 control-label">APPEARANCE (DIS)</label>
									<div class="col-sm-1">
										<input name="dapperss_pf1" type="text" class="form-control" id="dapperss_pf1"
											value="<?php echo $rcekD['dapperss_pf1']; ?>" placeholder="PILLING FACE 1">
										<input name="dapperss_pb1" type="text" class="form-control" id="dapperss_pb1"
											value="<?php echo $rcekD['dapperss_pb1']; ?>" placeholder="PILLING BACK 1">
										<input name="dapperss_ch1" type="text" class="form-control" id="dapperss_ch1"
											value="<?php echo $rcekD['dapperss_ch1']; ?>" placeholder="PASS/FAIL 1">
										<input name="dapperss_cc1" type="text" class="form-control" id="dapperss_cc1"
											value="<?php echo $rcekD['dapperss_cc1']; ?>" placeholder="C.CHANGE 1">
										<input name="dapperss_sf1" type="text" class="form-control" id="dapperss_sf1"
											value="<?php echo $rcekD['dapperss_sf1']; ?>" placeholder="SNAGGING FACE 1">
										<input name="dapperss_sb1" type="text" class="form-control" id="dapperss_sb1"
											value="<?php echo $rcekD['dapperss_sb1']; ?>" placeholder="SNAGGING BACK 1">
										<input name="dapperss_st" type="text" class="form-control" id="dapperss_st"
											value="<?php echo $rcekD['dapperss_st']; ?>" placeholder="C.STAINING">
									</div>
									<div class="col-sm-1">
										<input name="dapperss_pf2" type="text" class="form-control" id="dapperss_pf2"
											value="<?php echo $rcekD['dapperss_pf2']; ?>" placeholder="PILLING FACE 2">
										<input name="dapperss_pb2" type="text" class="form-control" id="dapperss_pb2"
											value="<?php echo $rcekD['dapperss_pb2']; ?>" placeholder="PILLING BACK 2">
										<input name="dapperss_ch2" type="text" class="form-control" id="dapperss_ch2"
											value="<?php echo $rcekD['dapperss_ch2']; ?>" placeholder="PASS/FAIL 2">
										<input name="dapperss_cc2" type="text" class="form-control" id="dapperss_cc2"
											value="<?php echo $rcekD['dapperss_cc2']; ?>" placeholder="C.CHANGE 2">
										<input name="dapperss_sf2" type="text" class="form-control" id="dapperss_sf2"
											value="<?php echo $rcekD['dapperss_sf2']; ?>" placeholder="SNAGGING FACE 2">
										<input name="dapperss_sb2" type="text" class="form-control" id="dapperss_sb2"
											value="<?php echo $rcekD['dapperss_sb2']; ?>" placeholder="SNAGGING BACK 2">
									</div>
									<div class="col-sm-1">
										<input name="dapperss_pf3" type="text" class="form-control" id="dapperss_pf3"
											value="<?php echo $rcekD['dapperss_pf3']; ?>" placeholder="PILLING FACE 3">
										<input name="dapperss_pb3" type="text" class="form-control" id="dapperss_pb3"
											value="<?php echo $rcekD['dapperss_pb3']; ?>" placeholder="PILLING BACK 3">
										<input name="dapperss_ch3" type="text" class="form-control" id="dapperss_ch3"
											value="<?php echo $rcekD['dapperss_ch3']; ?>" placeholder="PASS/FAIL 3">
										<input name="dapperss_cc3" type="text" class="form-control" id="dapperss_cc3"
											value="<?php echo $rcekD['dapperss_cc3']; ?>" placeholder="C.CHANGE 3">
										<input name="dapperss_sf3" type="text" class="form-control" id="dapperss_sf3"
											value="<?php echo $rcekD['dapperss_sf3']; ?>" placeholder="SNAGGING FACE 3">
										<input name="dapperss_sb3" type="text" class="form-control" id="dapperss_sb3"
											value="<?php echo $rcekD['dapperss_sb3']; ?>" placeholder="SNAGGING BACK 3">
									</div>
									<div class="col-sm-1">
										<input name="dapperss_pf4" type="text" class="form-control" id="dapperss_pf4"
											value="<?php echo $rcekD['dapperss_pf4']; ?>" placeholder="PILLING FACE 4">
										<input name="dapperss_pb4" type="text" class="form-control" id="dapperss_pb4"
											value="<?php echo $rcekD['dapperss_pb4']; ?>" placeholder="PILLING BACK 4">
										<input name="dapperss_ch4" type="text" class="form-control" id="dapperss_ch4"
											value="<?php echo $rcekD['dapperss_ch4']; ?>" placeholder="PASS/FAIL 4">
										<input name="dapperss_cc4" type="text" class="form-control" id="dapperss_cc4"
											value="<?php echo $rcekD['dapperss_cc4']; ?>" placeholder="C.CHANGE 4">
										<input name="dapperss_sf4" type="text" class="form-control" id="dapperss_sf4"
											value="<?php echo $rcekD['dapperss_sf4']; ?>" placeholder="SNAGGING FACE 4">
										<input name="dapperss_sb4" type="text" class="form-control" id="dapperss_sb4"
											value="<?php echo $rcekD['dapperss_sb4']; ?>" placeholder="SNAGGING BACK 4">
									</div>
									<div class="col-sm-2">
										<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
											name="dapperss_note"
											maxlength="1000">PHX-AP0701 slight color change, no obvious pilling (face=<?php echo $rcekD['dapperss_pf2']; ?>, back=<?php echo $rcekD['dapperss_pb2']; ?>), snagging (face=<?php echo $rcekD['dapperss_sf2']; ?>, back=<?php echo $rcekD['dapperss_sb2']; ?>), overall satisfactory</textarea>
									</div>
									<div class="col-sm-1">
										<label><input type="checkbox" name="dss_cmt" id="dss_cmt" class="minimal" value="1"
												<?php if ($rcekD['dss_cmt'] == '1') {
													echo "checked";
												} ?>> &#10003;
										</label>
									</div>
								</div>
								<div class="form-group" id="marapss" style="display:none;">
									<label for="marapss" class="col-sm-2 control-label">APPEARANCE (MARGINAL)</label>
									<div class="col-sm-1">
										<input name="mapperss_pf1" type="text" class="form-control" id="mapperss_pf1"
											value="<?php echo $rcekM['mapperss_pf1']; ?>" placeholder="PILLING FACE 1">
										<input name="mapperss_pb1" type="text" class="form-control" id="mapperss_pb1"
											value="<?php echo $rcekM['mapperss_pb1']; ?>" placeholder="PILLING BACK 1">
										<input name="mapperss_ch1" type="text" class="form-control" id="mapperss_ch1"
											value="<?php echo $rcekM['mapperss_ch1']; ?>" placeholder="PASS/FAIL 1">
										<input name="mapperss_cc1" type="text" class="form-control" id="mapperss_cc1"
											value="<?php echo $rcekM['mapperss_cc1']; ?>" placeholder="C.CHANGE 1">
										<input name="mapperss_sf1" type="text" class="form-control" id="mapperss_sf1"
											value="<?php echo $rcekM['mapperss_sf1']; ?>" placeholder="SNAGGING FACE 1">
										<input name="mapperss_sb1" type="text" class="form-control" id="mapperss_sb1"
											value="<?php echo $rcekM['mapperss_sb1']; ?>" placeholder="SNAGGING BACK 1">
										<input name="mapperss_st" type="text" class="form-control" id="mapperss_st"
											value="<?php echo $rcekM['mapperss_st']; ?>" placeholder="C.STAINING">
									</div>
									<div class="col-sm-1">
										<input name="mapperss_pf2" type="text" class="form-control" id="mapperss_pf2"
											value="<?php echo $rcekM['mapperss_pf2']; ?>" placeholder="PILLING FACE 2">
										<input name="mapperss_pb2" type="text" class="form-control" id="mapperss_pb2"
											value="<?php echo $rcekM['mapperss_pb2']; ?>" placeholder="PILLING BACK 2">
										<input name="mapperss_ch2" type="text" class="form-control" id="mapperss_ch2"
											value="<?php echo $rcekM['mapperss_ch2']; ?>" placeholder="PASS/FAIL 2">
										<input name="mapperss_cc2" type="text" class="form-control" id="mapperss_cc2"
											value="<?php echo $rcekM['mapperss_cc2']; ?>" placeholder="C.CHANGE 2">
										<input name="mapperss_sf2" type="text" class="form-control" id="mapperss_sf2"
											value="<?php echo $rcekM['mapperss_sf2']; ?>" placeholder="SNAGGING FACE 2">
										<input name="mapperss_sb2" type="text" class="form-control" id="mapperss_sb2"
											value="<?php echo $rcekM['mapperss_sb2']; ?>" placeholder="SNAGGING BACK 2">
									</div>
									<div class="col-sm-1">
										<input name="mapperss_pf3" type="text" class="form-control" id="mapperss_pf3"
											value="<?php echo $rcekM['mapperss_pf3']; ?>" placeholder="PILLING FACE 3">
										<input name="mapperss_pb3" type="text" class="form-control" id="mapperss_pb3"
											value="<?php echo $rcekM['mapperss_pb3']; ?>" placeholder="PILLING BACK 3">
										<input name="mapperss_ch3" type="text" class="form-control" id="mapperss_ch3"
											value="<?php echo $rcekM['mapperss_ch3']; ?>" placeholder="PASS/FAIL 3">
										<input name="mapperss_cc3" type="text" class="form-control" id="mapperss_cc3"
											value="<?php echo $rcekM['mapperss_cc3']; ?>" placeholder="C.CHANGE 3">
										<input name="mapperss_sf3" type="text" class="form-control" id="mapperss_sf3"
											value="<?php echo $rcekM['mapperss_sf3']; ?>" placeholder="SNAGGING FACE 3">
										<input name="mapperss_sb3" type="text" class="form-control" id="mapperss_sb3"
											value="<?php echo $rcekM['mapperss_sb3']; ?>" placeholder="SNAGGING BACK 3">
									</div>
									<div class="col-sm-1">
										<input name="mapperss_pf4" type="text" class="form-control" id="mapperss_pf4"
											value="<?php echo $rcekM['mapperss_pf4']; ?>" placeholder="PILLING FACE 4">
										<input name="mapperss_pb4" type="text" class="form-control" id="mapperss_pb4"
											value="<?php echo $rcekM['mapperss_pb4']; ?>" placeholder="PILLING BACK 4">
										<input name="mapperss_ch4" type="text" class="form-control" id="mapperss_ch4"
											value="<?php echo $rcekM['mapperss_ch4']; ?>" placeholder="PASS/FAIL 4">
										<input name="mapperss_cc4" type="text" class="form-control" id="mapperss_cc4"
											value="<?php echo $rcekM['mapperss_cc4']; ?>" placeholder="C.CHANGE 4">
										<input name="mapperss_sf4" type="text" class="form-control" id="mapperss_sf4"
											value="<?php echo $rcekM['mapperss_sf4']; ?>" placeholder="SNAGGING FACE 4">
										<input name="mapperss_sb4" type="text" class="form-control" id="mapperss_sb4"
											value="<?php echo $rcekM['mapperss_sb4']; ?>" placeholder="SNAGGING BACK 4">
									</div>
									<div class="col-sm-2">
										<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
											name="mapperss_note"
											maxlength="1000">PHX-AP0701 slight color change, no obvious pilling (face=<?php echo $rcekM['mapperss_pf2']; ?>, back=<?php echo $rcekM['mapperss_pb2']; ?>), snagging (face=<?php echo $rcekM['mapperss_sf2']; ?>, back=<?php echo $rcekM['mapperss_sb2']; ?>), overall satisfactory</textarea>
									</div>
									<div class="col-sm-1">
										<label><input type="checkbox" name="mss_cmt" id="mss_cmt" class="minimal" value="1"
												<?php if ($rcekM['mss_cmt'] == '1') {
													echo "checked";
												} ?>> &#10003;
										</label>
									</div>
								</div>
								<div class="form-group" id="ranapss" style="display:none;">
									<label for="ranapss" class="col-sm-2 control-label">APPEARANCE (RAN)</label>
									<div class="col-sm-1">
										<input name="rapperss_pf1" type="text" class="form-control" id="rapperss_pf1"
											value="<?php echo $rcekR['rapperss_pf1']; ?>" placeholder="PILLING FACE 1"
											readonly>
										<input name="rapperss_pb1" type="text" class="form-control" id="rapperss_pb1"
											value="<?php echo $rcekR['rapperss_pb1']; ?>" placeholder="PILLING BACK 1"
											readonly>
										<input name="rapperss_ch1" type="text" class="form-control" id="rapperss_ch1"
											value="<?php echo $rcekR['rapperss_ch1']; ?>" placeholder="PASS/FAIL 1"
											readonly>
										<input name="rapperss_cc1" type="text" class="form-control" id="rapperss_cc1"
											value="<?php echo $rcekR['rapperss_cc1']; ?>" placeholder="C.CHANGE 1" readonly>
										<input name="rapperss_sf1" type="text" class="form-control" id="rapperss_sf1"
											value="<?php echo $rcekR['rapperss_sf1']; ?>" placeholder="SNAGGING FACE 1"
											readonly>
										<input name="rapperss_sb1" type="text" class="form-control" id="rapperss_sb1"
											value="<?php echo $rcekR['rapperss_sb1']; ?>" placeholder="SNAGGING BACK 1"
											readonly>
										<input name="rapperss_st" type="text" class="form-control" id="rapperss_st"
											value="<?php echo $rcekR['rapperss_st']; ?>" placeholder="C.STAINING" readonly>
									</div>
									<div class="col-sm-1">
										<input name="rapperss_pf2" type="text" class="form-control" id="rapperss_pf2"
											value="<?php echo $rcekR['rapperss_pf2']; ?>" placeholder="PILLING FACE 2"
											readonly>
										<input name="rapperss_pb2" type="text" class="form-control" id="rapperss_pb2"
											value="<?php echo $rcekR['rapperss_pb2']; ?>" placeholder="PILLING BACK 2"
											readonly>
										<input name="rapperss_ch2" type="text" class="form-control" id="rapperss_ch2"
											value="<?php echo $rcekR['rapperss_ch2']; ?>" placeholder="PASS/FAIL 2"
											readonly>
										<input name="rapperss_cc2" type="text" class="form-control" id="rapperss_cc2"
											value="<?php echo $rcekR['rapperss_cc2']; ?>" placeholder="C.CHANGE 2" readonly>
										<input name="rapperss_sf2" type="text" class="form-control" id="rapperss_sf2"
											value="<?php echo $rcekR['rapperss_sf2']; ?>" placeholder="SNAGGING FACE 2"
											readonly>
										<input name="rapperss_sb2" type="text" class="form-control" id="rapperss_sb2"
											value="<?php echo $rcekR['rapperss_sb2']; ?>" placeholder="SNAGGING BACK 2"
											readonly>
									</div>
									<div class="col-sm-1">
										<input name="rapperss_pf3" type="text" class="form-control" id="rapperss_pf3"
											value="<?php echo $rcekR['rapperss_pf3']; ?>" placeholder="PILLING FACE 3"
											readonly>
										<input name="rapperss_pb3" type="text" class="form-control" id="rapperss_pb3"
											value="<?php echo $rcekR['rapperss_pb3']; ?>" placeholder="PILLING BACK 3"
											readonly>
										<input name="rapperss_ch3" type="text" class="form-control" id="rapperss_ch3"
											value="<?php echo $rcekR['rapperss_ch3']; ?>" placeholder="PASS/FAIL 3"
											readonly>
										<input name="rapperss_cc3" type="text" class="form-control" id="rapperss_cc3"
											value="<?php echo $rcekR['rapperss_cc3']; ?>" placeholder="C.CHANGE 3" readonly>
										<input name="rapperss_sf3" type="text" class="form-control" id="rapperss_sf3"
											value="<?php echo $rcekR['rapperss_sf3']; ?>" placeholder="SNAGGING FACE 3"
											readonly>
										<input name="rapperss_sb3" type="text" class="form-control" id="rapperss_sb3"
											value="<?php echo $rcekR['rapperss_sb3']; ?>" placeholder="SNAGGING BACK 3"
											readonly>
									</div>
									<div class="col-sm-1">
										<input name="rapperss_pf4" type="text" class="form-control" id="rapperss_pf4"
											value="<?php echo $rcekR['rapperss_pf4']; ?>" placeholder="PILLING FACE 4"
											readonly>
										<input name="rapperss_pb4" type="text" class="form-control" id="rapperss_pb4"
											value="<?php echo $rcekR['rapperss_pb4']; ?>" placeholder="PILLING BACK 4"
											readonly>
										<input name="rapperss_ch4" type="text" class="form-control" id="rapperss_ch4"
											value="<?php echo $rcekR['rapperss_ch4']; ?>" placeholder="PASS/FAIL 4"
											readonly>
										<input name="rapperss_cc4" type="text" class="form-control" id="rapperss_cc4"
											value="<?php echo $rcekR['rapperss_cc4']; ?>" placeholder="C.CHANGE 4" readonly>
										<input name="rapperss_sf4" type="text" class="form-control" id="rapperss_sf4"
											value="<?php echo $rcekR['rapperss_sf4']; ?>" placeholder="SNAGGING FACE 4"
											readonly>
										<input name="rapperss_sb4" type="text" class="form-control" id="rapperss_sb4"
											value="<?php echo $rcekR['rapperss_sb4']; ?>" placeholder="SNAGGING BACK 4"
											readonly>
									</div>
									<div class="col-sm-2">
										<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
											name="rapperss_note"
											maxlength="1000">PHX-AP0701 slight color change, no obvious pilling (face=<?php echo $rcekR['rapperss_pf2']; ?>, back=<?php echo $rcekR['rapperss_pb2']; ?>), snagging (face=<?php echo $rcekR['rapperss_sf2']; ?>, back=<?php echo $rcekR['rapperss_sb2']; ?>), overall satisfactory</textarea>
									</div>
									<div class="col-sm-1">
										<label><input type="checkbox" name="rss_cmt" id="rss_cmt" class="minimal" value="1"
												<?php if ($rcekR['rss_cmt'] == '1') {
													echo "checked";
												} ?>> &#10003;
										</label>
									</div>
								</div>
								<!-- SHRINKAGE & SPIRALITY & APPEARANCE END-->
								<!-- PILLING MARTINDLE BEGIN-->
								<div class="form-group" id="fc8" style="display:none;">
									<label for="pillingm" class="col-sm-2 control-label">PILLING MARTINDLE</label>
									<div class="col-sm-1">
										<input name="pillingm_f1" type="text" class="form-control" id="pillingm_f1"
											value="<?php echo $rcek1['pm_f1']; ?>" placeholder="FACE 1">
										<input name="pillingm_b1" type="text" class="form-control" id="pillingm_b1"
											value="<?php echo $rcek1['pm_b1']; ?>" placeholder="BACK 1">
									</div>
									<div class="col-sm-1">
										<input name="pillingm_f2" type="text" class="form-control" id="pillingm_f2"
											value="<?php echo $rcek1['pm_f2']; ?>" placeholder="FACE 2">
										<input name="pillingm_b2" type="text" class="form-control" id="pillingm_b2"
											value="<?php echo $rcek1['pm_b2']; ?>" placeholder="BACK 2">
									</div>
									<div class="col-sm-1">
										<input name="pillingm_f3" type="text" class="form-control" id="pillingm_f3"
											value="<?php echo $rcek1['pm_f3']; ?>" placeholder="FACE 3">
										<input name="pillingm_b3" type="text" class="form-control" id="pillingm_b3"
											value="<?php echo $rcek1['pm_b3']; ?>" placeholder="BACK 3">
									</div>
									<div class="col-sm-1">
										<input name="pillingm_f4" type="text" class="form-control" id="pillingm_f4"
											value="<?php echo $rcek1['pm_f4']; ?>" placeholder="FACE 4">
										<input name="pillingm_b4" type="text" class="form-control" id="pillingm_b4"
											value="<?php echo $rcek1['pm_b4']; ?>" placeholder="BACK 4">
									</div>
									<div class="col-sm-1">
										<input name="pillingm_f5" type="text" class="form-control" id="pillingm_f5"
											value="<?php echo $rcek1['pm_f5']; ?>" placeholder="FACE 5">
										<input name="pillingm_b5" type="text" class="form-control" id="pillingm_b5"
											value="<?php echo $rcek1['pm_b5']; ?>" placeholder="BACK 5">
									</div>
									<div class="col-sm-2">
										<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
											name="pillm_note" maxlength="50"><?php echo $rcek1['pillm_note']; ?></textarea>
									</div>
								</div>
								<div class="form-group" id="stat_pm" style="display:none;">
									<label for="stat_pm" class="col-sm-2 control-label">STATUS</label>
									<div class="col-sm-2">
										<select name="stat_pm" class="form-control select2" id="stat_pm"
											onChange="tampil();" style="width: 100%;">
											<option <?php if ($rcek1['stat_pm'] == "") { ?> selected=selected <?php }
											; ?>value="">
												Pilih</option>
											<option <?php if ($rcek1['stat_pm'] == "DISPOSISI") { ?> selected=selected <?php }
											; ?>value="DISPOSISI">DISPOSISI</option>
											<option <?php if ($rcek1['stat_pm'] == "A") { ?> selected=selected <?php }
											; ?>value="A">A</option>
											<option <?php if ($rcek1['stat_pm'] == "R") { ?> selected=selected <?php }
											; ?>value="R">R</option>
											<option <?php if ($rcek1['stat_pm'] == "PASS") { ?> selected=selected <?php }
											; ?>value="PASS">PASS</option>
											<option <?php if ($rcek1['stat_pm'] == "MARGINAL PASS") { ?> selected=selected
												<?php }
											; ?>value="MARGINAL PASS">MARGINAL PASS</option>
											<option <?php if ($rcek1['stat_pm'] == "DATA") { ?> selected=selected <?php }
											; ?>value="DATA">DATA</option>
											<option <?php if ($rcek1['stat_pm'] == "FAIL") { ?> selected=selected <?php }
											; ?>value="FAIL">FAIL</option>
											<option <?php if ($rcek1['stat_pm'] == "RANDOM") { ?> selected=selected <?php }
											; ?>value="RANDOM">RANDOM</option>
										</select>
									</div>
								</div>
								<div class="form-group" id="dispm" style="display:none;">
									<label for="dispm" class="col-sm-2 control-label">PILLING MARTINDLE (DIS)</label>
									<div class="col-sm-1">
										<input name="dpillingm_f1" type="text" class="form-control" id="dpillingm_f1"
											value="<?php echo $rcekD['dpm_f1']; ?>" placeholder="FACE 1">
										<input name="dpillingm_b1" type="text" class="form-control" id="dpillingm_b1"
											value="<?php echo $rcekD['dpm_b1']; ?>" placeholder="BACK 1">
									</div>
									<div class="col-sm-1">
										<input name="dpillingm_f2" type="text" class="form-control" id="dpillingm_f2"
											value="<?php echo $rcekD['dpm_f2']; ?>" placeholder="FACE 2">
										<input name="dpillingm_b2" type="text" class="form-control" id="dpillingm_b2"
											value="<?php echo $rcekD['dpm_b2']; ?>" placeholder="BACK 2">
									</div>
									<div class="col-sm-1">
										<input name="dpillingm_f3" type="text" class="form-control" id="dpillingm_f3"
											value="<?php echo $rcekD['dpm_f3']; ?>" placeholder="FACE 3">
										<input name="dpillingm_b3" type="text" class="form-control" id="dpillingm_b3"
											value="<?php echo $rcekD['dpm_b3']; ?>" placeholder="BACK 3">
									</div>
									<div class="col-sm-1">
										<input name="dpillingm_f4" type="text" class="form-control" id="dpillingm_f4"
											value="<?php echo $rcekD['dpm_f4']; ?>" placeholder="FACE 4">
										<input name="dpillingm_b4" type="text" class="form-control" id="dpillingm_b4"
											value="<?php echo $rcekD['dpm_b4']; ?>" placeholder="BACK 4">
									</div>
									<div class="col-sm-1">
										<input name="dpillingm_f5" type="text" class="form-control" id="dpillingm_f5"
											value="<?php echo $rcekD['dpm_f5']; ?>" placeholder="FACE 5">
										<input name="dpillingm_b5" type="text" class="form-control" id="dpillingm_b5"
											value="<?php echo $rcekD['dpm_b5']; ?>" placeholder="BACK 5">
									</div>
									<div class="col-sm-2">
										<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
											name="dpillm_note"
											maxlength="50"><?php echo $rcekD['dpillm_note']; ?></textarea>
									</div>
								</div>
								<div class="form-group" id="marpm" style="display:none;">
									<label for="marpm" class="col-sm-2 control-label">PILLING MARTINDLE (MARGINAL)</label>
									<div class="col-sm-1">
										<input name="mpillingm_f1" type="text" class="form-control" id="mpillingm_f1"
											value="<?php echo $rcekM['mpm_f1']; ?>" placeholder="FACE 1">
										<input name="mpillingm_b1" type="text" class="form-control" id="mpillingm_b1"
											value="<?php echo $rcekM['mpm_b1']; ?>" placeholder="BACK 1">
									</div>
									<div class="col-sm-1">
										<input name="mpillingm_f2" type="text" class="form-control" id="mpillingm_f2"
											value="<?php echo $rcekM['mpm_f2']; ?>" placeholder="FACE 2">
										<input name="mpillingm_b2" type="text" class="form-control" id="mpillingm_b2"
											value="<?php echo $rcekM['mpm_b2']; ?>" placeholder="BACK 2">
									</div>
									<div class="col-sm-1">
										<input name="mpillingm_f3" type="text" class="form-control" id="mpillingm_f3"
											value="<?php echo $rcekM['mpm_f3']; ?>" placeholder="FACE 3">
										<input name="mpillingm_b3" type="text" class="form-control" id="mpillingm_b3"
											value="<?php echo $rcekM['mpm_b3']; ?>" placeholder="BACK 3">
									</div>
									<div class="col-sm-1">
										<input name="mpillingm_f4" type="text" class="form-control" id="mpillingm_f4"
											value="<?php echo $rcekM['mpm_f4']; ?>" placeholder="FACE 4">
										<input name="mpillingm_b4" type="text" class="form-control" id="mpillingm_b4"
											value="<?php echo $rcekM['mpm_b4']; ?>" placeholder="BACK 4">
									</div>
									<div class="col-sm-1">
										<input name="mpillingm_f5" type="text" class="form-control" id="mpillingm_f5"
											value="<?php echo $rcekM['mpm_f5']; ?>" placeholder="FACE 5">
										<input name="mpillingm_b5" type="text" class="form-control" id="mpillingm_b5"
											value="<?php echo $rcekM['mpm_b5']; ?>" placeholder="BACK 5">
									</div>
									<div class="col-sm-2">
										<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
											name="mpillm_note"
											maxlength="50"><?php echo $rcekM['mpillm_note']; ?></textarea>
									</div>
								</div>
								<div class="form-group" id="ranpm" style="display:none;">
									<label for="ranpm" class="col-sm-2 control-label">PILLING MARTINDLE (RAN)</label>
									<div class="col-sm-1">
										<input name="rpillingm_f1" type="text" class="form-control" id="rpillingm_f1"
											value="<?php echo $rcekR['rpm_f1']; ?>" placeholder="FACE 1" readonly>
										<input name="rpillingm_b1" type="text" class="form-control" id="rpillingm_b1"
											value="<?php echo $rcekR['rpm_b1']; ?>" placeholder="BACK 1" readonly>
									</div>
									<div class="col-sm-1">
										<input name="rpillingm_f2" type="text" class="form-control" id="rpillingm_f2"
											value="<?php echo $rcekR['rpm_f2']; ?>" placeholder="FACE 2" readonly>
										<input name="rpillingm_b2" type="text" class="form-control" id="rpillingm_b2"
											value="<?php echo $rcekR['rpm_b2']; ?>" placeholder="BACK 2" readonly>
									</div>
									<div class="col-sm-1">
										<input name="rpillingm_f3" type="text" class="form-control" id="rpillingm_f3"
											value="<?php echo $rcekR['rpm_f3']; ?>" placeholder="FACE 3" readonly>
										<input name="rpillingm_b3" type="text" class="form-control" id="rpillingm_b3"
											value="<?php echo $rcekR['rpm_b3']; ?>" placeholder="BACK 3" readonly>
									</div>
									<div class="col-sm-1">
										<input name="rpillingm_f4" type="text" class="form-control" id="rpillingm_f4"
											value="<?php echo $rcekR['rpm_f4']; ?>" placeholder="FACE 4" readonly>
										<input name="rpillingm_b4" type="text" class="form-control" id="rpillingm_b4"
											value="<?php echo $rcekR['rpm_b4']; ?>" placeholder="BACK 4" readonly>
									</div>
									<div class="col-sm-1">
										<input name="rpillingm_f5" type="text" class="form-control" id="rpillingm_f5"
											value="<?php echo $rcekR['rpm_f5']; ?>" placeholder="FACE 5" readonly>
										<input name="rpillingm_b5" type="text" class="form-control" id="rpillingm_b5"
											value="<?php echo $rcekR['rpm_b5']; ?>" placeholder="BACK 5" readonly>
									</div>
									<div class="col-sm-2">
										<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
											name="rpillm_note" maxlength="50"
											readonly><?php echo $rcekR['rpillm_note']; ?></textarea>
									</div>
								</div>
								<!-- PILLING MARTINDLE END-->
								<!-- PILLING LOCUS BEGIN-->
								<div class="form-group" id="fc23" style="display:none;">
									<label for="pillingl" class="col-sm-2 control-label">PILLING LOCUS</label>
									<div class="col-sm-1">
										<input name="pillingl_f1" type="text" class="form-control" id="pillingl_f1"
											value="<?php echo $rcek1['pl_f1']; ?>" placeholder="FACE 1">
										<input name="pillingl_b1" type="text" class="form-control" id="pillingl_b1"
											value="<?php echo $rcek1['pl_b1']; ?>" placeholder="BACK 1">
									</div>
									<div class="col-sm-1">
										<input name="pillingl_f2" type="text" class="form-control" id="pillingl_f2"
											value="<?php echo $rcek1['pl_f2']; ?>" placeholder="FACE 2">
										<input name="pillingl_b2" type="text" class="form-control" id="pillingl_b2"
											value="<?php echo $rcek1['pl_b2']; ?>" placeholder="BACK 2">
									</div>
									<div class="col-sm-1">
										<input name="pillingl_f3" type="text" class="form-control" id="pillingl_f3"
											value="<?php echo $rcek1['pl_f3']; ?>" placeholder="FACE 3">
										<input name="pillingl_b3" type="text" class="form-control" id="pillingl_b3"
											value="<?php echo $rcek1['pl_b3']; ?>" placeholder="BACK 3">
									</div>
									<div class="col-sm-1">
										<input name="pillingl_f4" type="text" class="form-control" id="pillingl_f4"
											value="<?php echo $rcek1['pl_f4']; ?>" placeholder="FACE 4">
										<input name="pillingl_b4" type="text" class="form-control" id="pillingl_b4"
											value="<?php echo $rcek1['pl_b4']; ?>" placeholder="BACK 4">
									</div>
									<div class="col-sm-1">
										<input name="pillingl_f5" type="text" class="form-control" id="pillingl_f5"
											value="<?php echo $rcek1['pl_f5']; ?>" placeholder="FACE 5">
										<input name="pillingl_b5" type="text" class="form-control" id="pillingl_b5"
											value="<?php echo $rcek1['pl_b5']; ?>" placeholder="BACK 5">
									</div>
									<div class="col-sm-2">
										<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
											name="pilll_note" maxlength="50"><?php echo $rcek1['pilll_note']; ?></textarea>
									</div>
								</div>
								<div class="form-group" id="stat_pl" style="display:none;">
									<label for="stat_pl" class="col-sm-2 control-label">STATUS</label>
									<div class="col-sm-2">
										<select name="stat_pl" class="form-control select2" id="stat_pl"
											onChange="tampil();" style="width: 100%;">
											<option <?php if ($rcek1['stat_pl'] == "") { ?> selected=selected <?php }
											; ?>value="">
												Pilih</option>
											<option <?php if ($rcek1['stat_pl'] == "DISPOSISI") { ?> selected=selected <?php }
											; ?>value="DISPOSISI">DISPOSISI</option>
											<option <?php if ($rcek1['stat_pl'] == "A") { ?> selected=selected <?php }
											; ?>value="A">A</option>
											<option <?php if ($rcek1['stat_pl'] == "R") { ?> selected=selected <?php }
											; ?>value="R">R</option>
											<option <?php if ($rcek1['stat_pl'] == "PASS") { ?> selected=selected <?php }
											; ?>value="PASS">PASS</option>
											<option <?php if ($rcek1['stat_pl'] == "FAIL") { ?> selected=selected <?php }
											; ?>value="FAIL">FAIL</option>
											<option <?php if ($rcek1['stat_pl'] == "RANDOM") { ?> selected=selected <?php }
											; ?>value="RANDOM">RANDOM</option>
										</select>
									</div>
								</div>
								<div class="form-group" id="displ" style="display:none;">
									<label for="displ" class="col-sm-2 control-label">PILLING LOCUS (DIS)</label>
									<div class="col-sm-1">
										<input name="dpillingl_f1" type="text" class="form-control" id="dpillingl_f1"
											value="<?php echo $rcekD['dpl_f1']; ?>" placeholder="FACE 1">
										<input name="dpillingl_b1" type="text" class="form-control" id="dpillingl_b1"
											value="<?php echo $rcekD['dpl_b1']; ?>" placeholder="BACK 1">
									</div>
									<div class="col-sm-1">
										<input name="dpillingl_f2" type="text" class="form-control" id="dpillingl_f2"
											value="<?php echo $rcekD['dpl_f2']; ?>" placeholder="FACE 2">
										<input name="dpillingl_b2" type="text" class="form-control" id="dpillingl_b2"
											value="<?php echo $rcekD['dpl_b2']; ?>" placeholder="BACK 2">
									</div>
									<div class="col-sm-1">
										<input name="dpillingl_f3" type="text" class="form-control" id="dpillingl_f3"
											value="<?php echo $rcekD['dpl_f3']; ?>" placeholder="FACE 3">
										<input name="dpillingl_b3" type="text" class="form-control" id="dpillingl_b3"
											value="<?php echo $rcekD['dpl_b3']; ?>" placeholder="BACK 3">
									</div>
									<div class="col-sm-1">
										<input name="dpillingl_f4" type="text" class="form-control" id="dpillingl_f4"
											value="<?php echo $rcekD['dpl_f4']; ?>" placeholder="FACE 4">
										<input name="dpillingl_b4" type="text" class="form-control" id="dpillingl_b4"
											value="<?php echo $rcekD['dpl_b4']; ?>" placeholder="BACK 4">
									</div>
									<div class="col-sm-1">
										<input name="dpillingl_f5" type="text" class="form-control" id="dpillingl_f5"
											value="<?php echo $rcekD['dpl_f5']; ?>" placeholder="FACE 5">
										<input name="dpillingl_b5" type="text" class="form-control" id="dpillingl_b5"
											value="<?php echo $rcekD['dpl_b5']; ?>" placeholder="BACK 5">
									</div>
									<div class="col-sm-2">
										<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
											name="dpilll_note"
											maxlength="50"><?php echo $rcekD['dpilll_note']; ?></textarea>
									</div>
								</div>
								<div class="form-group" id="ranpl" style="display:none;">
									<label for="ranpl" class="col-sm-2 control-label">PILLING LOCUS (RAN)</label>
									<div class="col-sm-1">
										<input name="rpillingl_f1" type="text" class="form-control" id="rpillingl_f1"
											value="<?php echo $rcekR['rpl_f1']; ?>" placeholder="FACE 1" readonly>
										<input name="rpillingl_b1" type="text" class="form-control" id="rpillingl_b1"
											value="<?php echo $rcekR['rpl_b1']; ?>" placeholder="BACK 1" readonly>
									</div>
									<div class="col-sm-1">
										<input name="rpillingl_f2" type="text" class="form-control" id="rpillingl_f2"
											value="<?php echo $rcekR['rpl_f2']; ?>" placeholder="FACE 2" readonly>
										<input name="rpillingl_b2" type="text" class="form-control" id="rpillingl_b2"
											value="<?php echo $rcekR['rpl_b2']; ?>" placeholder="BACK 2" readonly>
									</div>
									<div class="col-sm-1">
										<input name="rpillingl_f3" type="text" class="form-control" id="rpillingl_f3"
											value="<?php echo $rcekR['rpl_f3']; ?>" placeholder="FACE 3" readonly>
										<input name="rpillingl_b3" type="text" class="form-control" id="rpillingl_b3"
											value="<?php echo $rcekR['rpl_b3']; ?>" placeholder="BACK 3" readonly>
									</div>
									<div class="col-sm-1">
										<input name="rpillingl_f4" type="text" class="form-control" id="rpillingl_f4"
											value="<?php echo $rcekR['rpl_f4']; ?>" placeholder="FACE 4" readonly>
										<input name="rpillingl_b4" type="text" class="form-control" id="rpillingl_b4"
											value="<?php echo $rcekR['rpl_b4']; ?>" placeholder="BACK 4" readonly>
									</div>
									<div class="col-sm-1">
										<input name="rpillingl_f5" type="text" class="form-control" id="rpillingl_f5"
											value="<?php echo $rcekR['rpl_f5']; ?>" placeholder="FACE 5" readonly>
										<input name="rpillingl_b5" type="text" class="form-control" id="rpillingl_b5"
											value="<?php echo $rcekR['rpl_b5']; ?>" placeholder="BACK 5" readonly>
									</div>
									<div class="col-sm-2">
										<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
											name="rpilll_note" maxlength="50"
											readonly><?php echo $rcekR['rpilll_note']; ?></textarea>
									</div>
								</div>
								<!-- PILLING LOCUS END-->
								<!-- PILLING BOX BEGIN-->
								<div class="form-group" id="fc9" style="display:none;">
									<label for="pillingb" class="col-sm-2 control-label">PILLING BOX</label>
									<div class="col-sm-2">
										<input name="pillingb_f1" type="text" class="form-control" id="pillingb_f1"
											value="<?php echo $rcek1['pb_f1']; ?>" placeholder="FACE 1/PILLING">
										<input name="pillingb_b1" type="text" class="form-control" id="pillingb_b1"
											value="<?php echo $rcek1['pb_b1']; ?>" placeholder="BACK 1">
									</div>
									<div class="col-sm-2">
										<input name="pillingb_f2" type="text" class="form-control" id="pillingb_f2"
											value="<?php echo $rcek1['pb_f2']; ?>" placeholder="FACE 2/FUZZING">
										<!-- <input name="pillingb_b2" type="text" class="form-control" id="pillingb_b2" value="<?php echo $rcek1['pb_b2']; ?>" placeholder="BACK 2"> -->
									</div>
									<div class="col-sm-2">
										<input name="pillingb_f3" type="text" class="form-control" id="pillingb_f3"
											value="<?php echo $rcek1['pb_f3']; ?>" placeholder="FACE 3/MATTING">
										<!-- <input name="pillingb_b3" type="text" class="form-control" id="pillingb_b3" value="<?php echo $rcek1['pb_b3']; ?>" placeholder="BACK 3"> -->
									</div>
									<!-- <div class="col-sm-1">
									<input name="pillingb_f4" type="text" class="form-control" id="pillingb_f4" value="<?php echo $rcek1['pb_f4']; ?>" placeholder="FACE 4">
									<input name="pillingb_b4" type="text" class="form-control" id="pillingb_b4" value="<?php echo $rcek1['pb_b4']; ?>" placeholder="BACK 4">
								</div>
								<div class="col-sm-1">
									<input name="pillingb_f5" type="text" class="form-control" id="pillingb_f5" value="<?php echo $rcek1['pb_f5']; ?>" placeholder="FACE 5">
									<input name="pillingb_b5" type="text" class="form-control" id="pillingb_b5" value="<?php echo $rcek1['pb_b5']; ?>" placeholder="BACK 5">
								</div> -->
									<div class="col-sm-2">
										<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
											name="pillb_note" maxlength="50"><?php echo $rcek1['pillb_note']; ?></textarea>
									</div>
								</div>
								<div class="form-group" id="stat_pb" style="display:none;">
									<label for="stat_pb" class="col-sm-2 control-label">STATUS</label>
									<div class="col-sm-2">
										<select name="stat_pb" class="form-control select2" id="stat_pb"
											onChange="tampil();" style="width: 100%;">
											<option <?php if ($rcek1['stat_pb'] == "") { ?> selected=selected <?php }
											; ?>value="">
												Pilih</option>
											<option <?php if ($rcek1['stat_pb'] == "DISPOSISI") { ?> selected=selected <?php }
											; ?>value="DISPOSISI">DISPOSISI</option>
											<option <?php if ($rcek1['stat_pb'] == "A") { ?> selected=selected <?php }
											; ?>value="A">A</option>
											<option <?php if ($rcek1['stat_pb'] == "R") { ?> selected=selected <?php }
											; ?>value="R">R</option>
											<option <?php if ($rcek1['stat_pb'] == "PASS") { ?> selected=selected <?php }
											; ?>value="PASS">PASS</option>
											<option <?php if ($rcek1['stat_pb'] == "MARGINAL PASS") { ?> selected=selected
												<?php }
											; ?>value="MARGINAL PASS">MARGINAL PASS</option>
											<option <?php if ($rcek1['stat_pb'] == "DATA") { ?> selected=selected <?php }
											; ?>value="DATA">DATA</option>
											<option <?php if ($rcek1['stat_pb'] == "FAIL") { ?> selected=selected <?php }
											; ?>value="FAIL">FAIL</option>
											<option <?php if ($rcek1['stat_pb'] == "RANDOM") { ?> selected=selected <?php }
											; ?>value="RANDOM">RANDOM</option>
										</select>
									</div>
								</div>
								<div class="form-group" id="dispb" style="display:none;">
									<label for="dispb" class="col-sm-2 control-label">PILLING BOX (DIS)</label>
									<div class="col-sm-2">
										<input name="dpillingb_f1" type="text" class="form-control" id="dpillingb_f1"
											value="<?php echo $rcekD['dpb_f1']; ?>" placeholder="FACE 1/PILLING">
										<input name="dpillingb_b1" type="text" class="form-control" id="dpillingb_b1"
											value="<?php echo $rcekD['dpb_b1']; ?>" placeholder="BACK 1">
									</div>
									<div class="col-sm-2">
										<input name="dpillingb_f2" type="text" class="form-control" id="dpillingb_f2"
											value="<?php echo $rcekD['dpb_f2']; ?>" placeholder="FACE 2/FUZZING">
										<!-- <input name="pillingb_b2" type="text" class="form-control" id="pillingb_b2" value="<?php echo $rcek1['dpb_b2']; ?>" placeholder="BACK 2"> -->
									</div>
									<div class="col-sm-2">
										<input name="dpillingb_f3" type="text" class="form-control" id="dpillingb_f3"
											value="<?php echo $rcekD['dpb_f3']; ?>" placeholder="FACE 3/MATTING">
										<!-- <input name="pillingb_b3" type="text" class="form-control" id="pillingb_b3" value="<?php echo $rcek1['pb_b3']; ?>" placeholder="BACK 3"> -->
									</div>
									<!-- <div class="col-sm-1">
									<input name="pillingb_f4" type="text" class="form-control" id="pillingb_f4" value="<?php echo $rcek1['pb_f4']; ?>" placeholder="FACE 4">
									<input name="pillingb_b4" type="text" class="form-control" id="pillingb_b4" value="<?php echo $rcek1['pb_b4']; ?>" placeholder="BACK 4">
								</div>
								<div class="col-sm-1">
									<input name="pillingb_f5" type="text" class="form-control" id="pillingb_f5" value="<?php echo $rcek1['pb_f5']; ?>" placeholder="FACE 5">
									<input name="pillingb_b5" type="text" class="form-control" id="pillingb_b5" value="<?php echo $rcek1['pb_b5']; ?>" placeholder="BACK 5">
								</div> -->
									<div class="col-sm-2">
										<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
											name="dpillb_note"
											maxlength="50"><?php echo $rcekD['dpillb_note']; ?></textarea>
									</div>
								</div>
								<div class="form-group" id="marpb" style="display:none;">
									<label for="marpb" class="col-sm-2 control-label">PILLING BOX (MARGINAL)</label>
									<div class="col-sm-2">
										<input name="mpillingb_f1" type="text" class="form-control" id="mpillingb_f1"
											value="<?php echo $rcekM['mpb_f1']; ?>" placeholder="FACE 1/PILLING">
										<input name="mpillingb_b1" type="text" class="form-control" id="mpillingb_b1"
											value="<?php echo $rcekM['mpb_b1']; ?>" placeholder="BACK 1">
									</div>
									<div class="col-sm-2">
										<input name="mpillingb_f2" type="text" class="form-control" id="mpillingb_f2"
											value="<?php echo $rcekM['mpb_f2']; ?>" placeholder="FACE 2/FUZZING">
										<!-- <input name="pillingb_b2" type="text" class="form-control" id="pillingb_b2" value="<?php echo $rcek1['pb_b2']; ?>" placeholder="BACK 2"> -->
									</div>
									<div class="col-sm-2">
										<input name="mpillingb_f3" type="text" class="form-control" id="mpillingb_f3"
											value="<?php echo $rcekM['mpb_f3']; ?>" placeholder="FACE 3/MATTING">
										<!-- <input name="pillingb_b3" type="text" class="form-control" id="pillingb_b3" value="<?php echo $rcek1['pb_b3']; ?>" placeholder="BACK 3"> -->
									</div>
									<!-- <div class="col-sm-1">
									<input name="pillingb_f4" type="text" class="form-control" id="pillingb_f4" value="<?php echo $rcek1['pb_f4']; ?>" placeholder="FACE 4">
									<input name="pillingb_b4" type="text" class="form-control" id="pillingb_b4" value="<?php echo $rcek1['pb_b4']; ?>" placeholder="BACK 4">
								</div>
								<div class="col-sm-1">
									<input name="pillingb_f5" type="text" class="form-control" id="pillingb_f5" value="<?php echo $rcek1['pb_f5']; ?>" placeholder="FACE 5">
									<input name="pillingb_b5" type="text" class="form-control" id="pillingb_b5" value="<?php echo $rcek1['pb_b5']; ?>" placeholder="BACK 5">
								</div> -->
									<div class="col-sm-2">
										<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
											name="mpillb_note" maxlength="50"
											readonly><?php echo $rcekM['mpillb_note']; ?></textarea>
									</div>
								</div>
								<div class="form-group" id="ranpb" style="display:none;">
									<label for="ranpb" class="col-sm-2 control-label">PILLING BOX (RAN)</label>
									<div class="col-sm-2">
										<input name="rpillingb_f1" type="text" class="form-control" id="rpillingb_f1"
											value="<?php echo $rcekR['rpb_f1']; ?>" placeholder="FACE 1/PILLING" readonly>
										<input name="rpillingb_b1" type="text" class="form-control" id="rpillingb_b1"
											value="<?php echo $rcekR['rpb_b1']; ?>" placeholder="BACK 1" readonly>
									</div>
									<div class="col-sm-2">
										<input name="rpillingb_f2" type="text" class="form-control" id="rpillingb_f2"
											value="<?php echo $rcekR['rpb_f2']; ?>" placeholder="FACE 2/FUZZING" readonly>
										<!-- <input name="pillingb_b2" type="text" class="form-control" id="pillingb_b2" value="<?php echo $rcek1['pb_b2']; ?>" placeholder="BACK 2"> -->
									</div>
									<div class="col-sm-2">
										<input name="rpillingb_f3" type="text" class="form-control" id="rpillingb_f3"
											value="<?php echo $rcekR['rpb_f3']; ?>" placeholder="FACE 3/MATTING" readonly>
										<!-- <input name="pillingb_b3" type="text" class="form-control" id="pillingb_b3" value="<?php echo $rcek1['pb_b3']; ?>" placeholder="BACK 3"> -->
									</div>
									<!-- <div class="col-sm-1">
									<input name="pillingb_f4" type="text" class="form-control" id="pillingb_f4" value="<?php echo $rcek1['pb_f4']; ?>" placeholder="FACE 4">
									<input name="pillingb_b4" type="text" class="form-control" id="pillingb_b4" value="<?php echo $rcek1['pb_b4']; ?>" placeholder="BACK 4">
								</div>
								<div class="col-sm-1">
									<input name="pillingb_f5" type="text" class="form-control" id="pillingb_f5" value="<?php echo $rcek1['pb_f5']; ?>" placeholder="FACE 5">
									<input name="pillingb_b5" type="text" class="form-control" id="pillingb_b5" value="<?php echo $rcek1['pb_b5']; ?>" placeholder="BACK 5">
								</div> -->
									<div class="col-sm-2">
										<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
											name="rpillb_note" maxlength="50"
											readonly><?php echo $rcekR['rpillb_note']; ?></textarea>
									</div>
								</div>
								<!-- PILLING BOX END-->
								<!-- PILLING RANDOM TUMBLER BEGIN-->
								<div class="form-group" id="fc10" style="display:none;">
									<label for="pillingrt" class="col-sm-2 control-label">PILLING RANDOM TUMBLER</label>
									<div class="col-sm-1">
										<input name="pillingrt_f1" type="text" class="form-control" id="pillingrt_f1"
											value="<?php echo $rcek1['prt_f1']; ?>" placeholder="FACE 1">
										<input name="pillingrt_b1" type="text" class="form-control" id="pillingrt_b1"
											value="<?php echo $rcek1['prt_b1']; ?>" placeholder="BACK 1">
									</div>
									<div class="col-sm-1">
										<input name="pillingrt_f2" type="text" class="form-control" id="pillingrt_f2"
											value="<?php echo $rcek1['prt_f2']; ?>" placeholder="FACE 2">
										<input name="pillingrt_b2" type="text" class="form-control" id="pillingrt_b2"
											value="<?php echo $rcek1['prt_b2']; ?>" placeholder="BACK 2">
									</div>
									<div class="col-sm-1">
										<input name="pillingrt_f3" type="text" class="form-control" id="pillingrt_f3"
											value="<?php echo $rcek1['prt_f3']; ?>" placeholder="FACE 3">
										<input name="pillingrt_b3" type="text" class="form-control" id="pillingrt_b3"
											value="<?php echo $rcek1['prt_b3']; ?>" placeholder="BACK 3">
									</div>
									<div class="col-sm-1">
										<input name="pillingrt_f4" type="text" class="form-control" id="pillingrt_f4"
											value="<?php echo $rcek1['prt_f4']; ?>" placeholder="FACE 4">
										<input name="pillingrt_b4" type="text" class="form-control" id="pillingrt_b4"
											value="<?php echo $rcek1['prt_b4']; ?>" placeholder="BACK 4">
									</div>
									<div class="col-sm-1">
										<input name="pillingrt_f5" type="text" class="form-control" id="pillingrt_f5"
											value="<?php echo $rcek1['prt_f5']; ?>" placeholder="FACE 5">
										<input name="pillingrt_b5" type="text" class="form-control" id="pillingrt_b5"
											value="<?php echo $rcek1['prt_b5']; ?>" placeholder="BACK 5">
									</div>
									<div class="col-sm-2">
										<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
											name="pillr_note" maxlength="50"><?php echo $rcek1['pillr_note']; ?></textarea>
									</div>
								</div>
								<div class="form-group" id="stat_prt" style="display:none;">
									<label for="stat_prt" class="col-sm-2 control-label">STATUS</label>
									<div class="col-sm-2">
										<select name="stat_prt" class="form-control select2" id="stat_prt"
											onChange="tampil();" style="width: 100%;">
											<option <?php if ($rcek1['stat_prt'] == "") { ?> selected=selected <?php }
											; ?>value="">Pilih</option>
											<option <?php if ($rcek1['stat_prt'] == "DISPOSISI") { ?> selected=selected <?php }
											; ?>value="DISPOSISI">DISPOSISI</option>
											<option <?php if ($rcek1['stat_prt'] == "A") { ?> selected=selected <?php }
											; ?>value="A">A</option>
											<option <?php if ($rcek1['stat_prt'] == "R") { ?> selected=selected <?php }
											; ?>value="R">R</option>
											<option <?php if ($rcek1['stat_prt'] == "PASS") { ?> selected=selected <?php }
											; ?>value="PASS">PASS</option>
											<option <?php if ($rcek1['stat_prt'] == "FAIL") { ?> selected=selected <?php }
											; ?>value="FAIL">FAIL</option>
											<option <?php if ($rcek1['stat_prt'] == "RANDOM") { ?> selected=selected <?php }
											; ?>value="RANDOM">RANDOM</option>
										</select>
									</div>
								</div>
								<div class="form-group" id="disprt" style="display:none;">
									<label for="disprt" class="col-sm-2 control-label">PILLING RANDOM TUMBLER (DIS)</label>
									<div class="col-sm-1">
										<input name="dpillingrt_f1" type="text" class="form-control" id="dpillingrt_f1"
											value="<?php echo $rcekD['dprt_f1']; ?>" placeholder="FACE 1">
										<input name="dpillingrt_b1" type="text" class="form-control" id="dpillingrt_b1"
											value="<?php echo $rcekD['dprt_b1']; ?>" placeholder="BACK 1">
									</div>
									<div class="col-sm-1">
										<input name="dpillingrt_f2" type="text" class="form-control" id="dpillingrt_f2"
											value="<?php echo $rcekD['dprt_f2']; ?>" placeholder="FACE 2">
										<input name="dpillingrt_b2" type="text" class="form-control" id="dpillingrt_b2"
											value="<?php echo $rcekD['dprt_b2']; ?>" placeholder="BACK 2">
									</div>
									<div class="col-sm-1">
										<input name="dpillingrt_f3" type="text" class="form-control" id="dpillingrt_f3"
											value="<?php echo $rcekD['dprt_f3']; ?>" placeholder="FACE 3">
										<input name="dpillingrt_b3" type="text" class="form-control" id="dpillingrt_b3"
											value="<?php echo $rcekD['dprt_b3']; ?>" placeholder="BACK 3">
									</div>
									<div class="col-sm-1">
										<input name="dpillingrt_f4" type="text" class="form-control" id="dpillingrt_f4"
											value="<?php echo $rcekD['dprt_f4']; ?>" placeholder="FACE 4">
										<input name="dpillingrt_b4" type="text" class="form-control" id="dpillingrt_b4"
											value="<?php echo $rcekD['dprt_b4']; ?>" placeholder="BACK 4">
									</div>
									<div class="col-sm-1">
										<input name="dpillingrt_f5" type="text" class="form-control" id="dpillingrt_f5"
											value="<?php echo $rcekD['dprt_f5']; ?>" placeholder="FACE 5">
										<input name="dpillingrt_b5" type="text" class="form-control" id="dpillingrt_b5"
											value="<?php echo $rcekD['dprt_b5']; ?>" placeholder="BACK 5">
									</div>
									<div class="col-sm-2">
										<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
											name="dpillr_note"
											maxlength="50"><?php echo $rcekD['dpillr_note']; ?></textarea>
									</div>
								</div>
								<div class="form-group" id="ranprt" style="display:none;">
									<label for="ranprt" class="col-sm-2 control-label">PILLING RANDOM TUMBLER (RAN)</label>
									<div class="col-sm-1">
										<input name="rpillingrt_f1" type="text" class="form-control" id="rpillingrt_f1"
											value="<?php echo $rcekR['rprt_f1']; ?>" placeholder="FACE 1" readonly>
										<input name="rpillingrt_b1" type="text" class="form-control" id="rpillingrt_b1"
											value="<?php echo $rcekR['rprt_b1']; ?>" placeholder="BACK 1" readonly>
									</div>
									<div class="col-sm-1">
										<input name="rpillingrt_f2" type="text" class="form-control" id="rpillingrt_f2"
											value="<?php echo $rcekR['rprt_f2']; ?>" placeholder="FACE 2" readonly>
										<input name="rpillingrt_b2" type="text" class="form-control" id="rpillingrt_b2"
											value="<?php echo $rcekR['rprt_b2']; ?>" placeholder="BACK 2" readonly>
									</div>
									<div class="col-sm-1">
										<input name="rpillingrt_f3" type="text" class="form-control" id="rpillingrt_f3"
											value="<?php echo $rcekR['rprt_f3']; ?>" placeholder="FACE 3" readonly>
										<input name="rpillingrt_b3" type="text" class="form-control" id="rpillingrt_b3"
											value="<?php echo $rcekR['rprt_b3']; ?>" placeholder="BACK 3" readonly>
									</div>
									<div class="col-sm-1">
										<input name="rpillingrt_f4" type="text" class="form-control" id="rpillingrt_f4"
											value="<?php echo $rcekR['rprt_f4']; ?>" placeholder="FACE 4" readonly>
										<input name="rpillingrt_b4" type="text" class="form-control" id="rpillingrt_b4"
											value="<?php echo $rcekR['rprt_b4']; ?>" placeholder="BACK 4" readonly>
									</div>
									<div class="col-sm-1">
										<input name="rpillingrt_f5" type="text" class="form-control" id="rpillingrt_f5"
											value="<?php echo $rcekR['rprt_f5']; ?>" placeholder="FACE 5" readonly>
										<input name="rpillingrt_b5" type="text" class="form-control" id="rpillingrt_b5"
											value="<?php echo $rcekR['rprt_b5']; ?>" placeholder="BACK 5" readonly>
									</div>
									<div class="col-sm-2">
										<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
											name="rpillr_note" maxlength="50"
											readonly><?php echo $rcekR['rpillr_note']; ?></textarea>
									</div>
								</div>
								<!-- PILLING RANDOM TUMBLER END-->
								<!-- ABRATION BEGIN-->
								<div class="form-group" id="fc11" style="display:none;">
									<label for="abr" class="col-sm-2 control-label">ABRATION</label>
									<div class="col-sm-2">
										<input name="abr" type="text" class="form-control" id="abr"
											value="<?php echo $rcek1['abration']; ?>" placeholder="ABRATION">
									</div>
									<div class="col-sm-2">
										<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
											name="abr_note" maxlength="50"
											rows="1"><?php echo $rcek1['abr_note']; ?></textarea>
									</div>
								</div>
								<div class="form-group" id="stat_abr" style="display:none;">
									<label for="stat_abr" class="col-sm-2 control-label">STATUS</label>
									<div class="col-sm-2">
										<select name="stat_abr" class="form-control select2" id="stat_abr"
											onChange="tampil();" style="width: 100%;">
											<option <?php if ($rcek1['stat_abr'] == "") { ?> selected=selected <?php }
											; ?>value="">Pilih</option>
											<option <?php if ($rcek1['stat_abr'] == "DISPOSISI") { ?> selected=selected <?php }
											; ?>value="DISPOSISI">DISPOSISI</option>
											<option <?php if ($rcek1['stat_abr'] == "A") { ?> selected=selected <?php }
											; ?>value="A">A</option>
											<option <?php if ($rcek1['stat_abr'] == "R") { ?> selected=selected <?php }
											; ?>value="R">R</option>
											<option <?php if ($rcek1['stat_abr'] == "PASS") { ?> selected=selected <?php }
											; ?>value="PASS">PASS</option>
											<option <?php if ($rcek1['stat_abr'] == "FAIL") { ?> selected=selected <?php }
											; ?>value="FAIL">FAIL</option>
											<option <?php if ($rcek1['stat_abr'] == "RANDOM") { ?> selected=selected <?php }
											; ?>value="RANDOM">RANDOM</option>
										</select>
									</div>
								</div>
								<div class="form-group" id="disabr" style="display:none;">
									<label for="abr" class="col-sm-2 control-label">ABRATION (DIS)</label>
									<<div class="col-sm-2">
										<input name="dabr" type="text" class="form-control" id="dabr"
											value="<?php echo $rcekD['dabration']; ?>" placeholder="ABRATION">
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="dabr_note" maxlength="50"
										rows="1"><?php echo $rcekD['dabr_note']; ?></textarea>
								</div>
						</div>
						<div class="form-group" id="ranabr" style="display:none;">
							<label for="ranabr" class="col-sm-2 control-label">ABRATION (RAN)</label>
							<div class="col-sm-2">
								<input name="rabr" type="text" class="form-control" id="rabr"
									value="<?php echo $rcekR['rabration']; ?>" placeholder="ABRATION" readonly>
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rabr_note"
									maxlength="50" rows="1" readonly><?php echo $rcekR['rabr_note']; ?></textarea>
							</div>
						</div>
						<!-- ABRATION END-->
						<!-- SNAGGING MACE BEGIN-->
						<div class="form-group" id="fc12" style="display:none;">
							<label for="snaggingm" class="col-sm-2 control-label">SNAGGING MACE</label>
							<div class="col-sm-1">
								<input name="snaggingm_l1" type="text" class="form-control" id="snaggingm_l1"
									value="<?php echo $rcek1['sm_l1']; ?>" placeholder="LEN 1">
								<input name="snaggingm_w1" type="text" class="form-control" id="snaggingm_w1"
									value="<?php echo $rcek1['sm_w1']; ?>" placeholder="WID 1">
							</div>
							<div class="col-sm-1">
								<input name="snaggingm_l2" type="text" class="form-control" id="snaggingm_l2"
									value="<?php echo $rcek1['sm_l2']; ?>" placeholder="LEN 2">
								<input name="snaggingm_w2" type="text" class="form-control" id="snaggingm_w2"
									value="<?php echo $rcek1['sm_w2']; ?>" placeholder="WID 2">
							</div>
							<div class="col-sm-1">
								<input name="snaggingm_l3" type="text" class="form-control" id="snaggingm_l3"
									value="<?php echo $rcek1['sm_l3']; ?>" placeholder="LEN 3">
								<input name="snaggingm_w3" type="text" class="form-control" id="snaggingm_w3"
									value="<?php echo $rcek1['sm_w3']; ?>" placeholder="WID 3">
							</div>
							<div class="col-sm-1">
								<input name="snaggingm_l4" type="text" class="form-control" id="snaggingm_l4"
									value="<?php echo $rcek1['sm_l4']; ?>" placeholder="LEN 4">
								<input name="snaggingm_w4" type="text" class="form-control" id="snaggingm_w4"
									value="<?php echo $rcek1['sm_w4']; ?>" placeholder="WID 4">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="snam_note"
									maxlength="50"><?php echo $rcek1['snam_note']; ?></textarea>
							</div>
						</div>
						<div class="form-group" id="stat_sm" style="display:none;">
							<label for="stat_sm" class="col-sm-2 control-label">STATUS</label>
							<div class="col-sm-2">
								<select name="stat_sm" class="form-control select2" id="stat_sm" onChange="tampil();"
									style="width: 100%;">
									<option <?php if ($rcek1['stat_sm'] == "") { ?> selected=selected <?php }
									; ?>value="">
										Pilih
									</option>
									<option <?php if ($rcek1['stat_sm'] == "DISPOSISI") { ?> selected=selected <?php }
									; ?>value="DISPOSISI">DISPOSISI</option>
									<option <?php if ($rcek1['stat_sm'] == "A") { ?> selected=selected <?php }
									; ?>value="A">A
									</option>
									<option <?php if ($rcek1['stat_sm'] == "R") { ?> selected=selected <?php }
									; ?>value="R">R
									</option>
									<option <?php if ($rcek1['stat_sm'] == "PASS") { ?> selected=selected <?php }
									; ?>value="PASS">
										PASS</option>
									<option <?php if ($rcek1['stat_sm'] == "FAIL") { ?> selected=selected <?php }
									; ?>value="FAIL">
										FAIL</option>
									<option <?php if ($rcek1['stat_sm'] == "RANDOM") { ?> selected=selected <?php }
									; ?>value="RANDOM">RANDOM</option>
								</select>
							</div>
						</div>
						<div class="form-group" id="dissm" style="display:none;">
							<label for="dissm" class="col-sm-2 control-label">SNAGGING MACE (DIS)</label>
							<div class="col-sm-1">
								<input name="dsnaggingm_l1" type="text" class="form-control" id="dsnaggingm_l1"
									value="<?php echo $rcekD['dsm_l1']; ?>" placeholder="LEN 1">
								<input name="dsnaggingm_w1" type="text" class="form-control" id="dsnaggingm_w1"
									value="<?php echo $rcekD['dsm_w1']; ?>" placeholder="WID 1">
							</div>
							<div class="col-sm-1">
								<input name="dsnaggingm_l2" type="text" class="form-control" id="dsnaggingm_l2"
									value="<?php echo $rcekD['dsm_l2']; ?>" placeholder="LEN 2">
								<input name="dsnaggingm_w2" type="text" class="form-control" id="dsnaggingm_w2"
									value="<?php echo $rcekD['dsm_w2']; ?>" placeholder="WID 2">
							</div>
							<div class="col-sm-1">
								<input name="dsnaggingm_l3" type="text" class="form-control" id="dsnaggingm_l3"
									value="<?php echo $rcekD['dsm_l3']; ?>" placeholder="LEN 3">
								<input name="dsnaggingm_w3" type="text" class="form-control" id="dsnaggingm_w3"
									value="<?php echo $rcekD['dsm_w3']; ?>" placeholder="WID 3">
							</div>
							<div class="col-sm-1">
								<input name="dsnaggingm_l4" type="text" class="form-control" id="dsnaggingm_l4"
									value="<?php echo $rcekD['dsm_l4']; ?>" placeholder="LEN 4">
								<input name="dsnaggingm_w4" type="text" class="form-control" id="dsnaggingm_w4"
									value="<?php echo $rcekD['dsm_w4']; ?>" placeholder="WID 4">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
									name="dsnam_note" maxlength="50"><?php echo $rcekD['dsnam_note']; ?></textarea>
							</div>
						</div>
						<div class="form-group" id="ransm" style="display:none;">
							<label for="ransm" class="col-sm-2 control-label">SNAGGING MACE (RAN)</label>
							<div class="col-sm-1">
								<input name="rsnaggingm_l1" type="text" class="form-control" id="rsnaggingm_l1"
									value="<?php echo $rcekR['rsm_l1']; ?>" placeholder="LEN 1" readonly>
								<input name="rsnaggingm_w1" type="text" class="form-control" id="rsnaggingm_w1"
									value="<?php echo $rcekR['rsm_w1']; ?>" placeholder="WID 1" readonly>
							</div>
							<div class="col-sm-1">
								<input name="rsnaggingm_l2" type="text" class="form-control" id="rsnaggingm_l2"
									value="<?php echo $rcekR['rsm_l2']; ?>" placeholder="LEN 2" readonly>
								<input name="rsnaggingm_w2" type="text" class="form-control" id="rsnaggingm_w2"
									value="<?php echo $rcekR['rsm_w2']; ?>" placeholder="WID 2" readonly>
							</div>
							<div class="col-sm-1">
								<input name="rsnaggingm_l3" type="text" class="form-control" id="rsnaggingm_l3"
									value="<?php echo $rcekR['rsm_l3']; ?>" placeholder="LEN 3" readonly>
								<input name="rsnaggingm_w3" type="text" class="form-control" id="rsnaggingm_w3"
									value="<?php echo $rcekR['rsm_w3']; ?>" placeholder="WID 3" readonly>
							</div>
							<div class="col-sm-1">
								<input name="rsnaggingm_l4" type="text" class="form-control" id="rsnaggingm_l4"
									value="<?php echo $rcekR['rsm_l4']; ?>" placeholder="LEN 4" readonly>
								<input name="rsnaggingm_w4" type="text" class="form-control" id="rsnaggingm_w4"
									value="<?php echo $rcekR['rsm_w4']; ?>" placeholder="WID 4" readonly>
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
									name="rsnam_note" maxlength="50" readonly><?php echo $rcekR['rsnam_note']; ?></textarea>
							</div>
						</div>
						<!-- SNAGGING MACE END-->
						<!-- SNAGGING POD BEGIN-->
						<div class="form-group" id="fc13" style="display:none;">
							<label for="snaggingp" class="col-sm-2 control-label">SNAGGING POD</label>
							<div class="col-sm-1">LEN(Face) 1
								<input name="sp_grdl1" type="text" class="form-control" id="sp_grdl1"
									value="<?php echo $rcek1['sp_grdl1']; ?>" placeholder="GRAD 1">
								<input name="sp_clsl1" type="text" class="form-control" id="sp_clsl1"
									value="<?php echo $rcek1['sp_clsl1']; ?>" placeholder="CLAS 1">
								<input name="sp_shol1" type="text" class="form-control" id="sp_shol1"
									value="<?php echo $rcek1['sp_shol1']; ?>" placeholder="SHO 1">
								<input name="sp_medl1" type="text" class="form-control" id="sp_medl1"
									value="<?php echo $rcek1['sp_medl1']; ?>" placeholder="MED 1">
								<input name="sp_lonl1" type="text" class="form-control" id="sp_lonl1"
									value="<?php echo $rcek1['sp_lonl1']; ?>" placeholder="LONG 1">
							</div>
							<div class="col-sm-1">WID(Face) 1
								<input name="sp_grdw1" type="text" class="form-control" id="sp_grdw1"
									value="<?php echo $rcek1['sp_grdw1']; ?>" placeholder="GRAD 1">
								<input name="sp_clsw1" type="text" class="form-control" id="sp_clsw1"
									value="<?php echo $rcek1['sp_clsw1']; ?>" placeholder="CLAS 1">
								<input name="sp_show1" type="text" class="form-control" id="sp_show1"
									value="<?php echo $rcek1['sp_show1']; ?>" placeholder="SHO 1">
								<input name="sp_medw1" type="text" class="form-control" id="sp_medw1"
									value="<?php echo $rcek1['sp_medw1']; ?>" placeholder="MED 1">
								<input name="sp_lonw1" type="text" class="form-control" id="sp_lonw1"
									value="<?php echo $rcek1['sp_lonw1']; ?>" placeholder="LONG 1">
							</div>
							<div class="col-sm-1">LEN(Back) 2
								<input name="sp_grdl2" type="text" class="form-control" id="sp_grdl2"
									value="<?php echo $rcek1['sp_grdl2']; ?>" placeholder="GRAD 2">
								<input name="sp_clsl2" type="text" class="form-control" id="sp_clsl2"
									value="<?php echo $rcek1['sp_clsl2']; ?>" placeholder="CLAS 2">
								<input name="sp_shol2" type="text" class="form-control" id="sp_shol2"
									value="<?php echo $rcek1['sp_shol2']; ?>" placeholder="SHO 2">
								<input name="sp_medl2" type="text" class="form-control" id="sp_medl2"
									value="<?php echo $rcek1['sp_medl2']; ?>" placeholder="MED 2">
								<input name="sp_lonl2" type="text" class="form-control" id="sp_lonl2"
									value="<?php echo $rcek1['sp_lonl2']; ?>" placeholder="LONG 2">
							</div>
							<div class="col-sm-1">WID(Back) 2
								<input name="sp_grdw2" type="text" class="form-control" id="sp_grdw2"
									value="<?php echo $rcek1['sp_grdw2']; ?>" placeholder="GRAD 2">
								<input name="sp_clsw2" type="text" class="form-control" id="sp_clsw2"
									value="<?php echo $rcek1['sp_clsw2']; ?>" placeholder="CLAS 2">
								<input name="sp_show2" type="text" class="form-control" id="sp_show2"
									value="<?php echo $rcek1['sp_show2']; ?>" placeholder="SHO 2">
								<input name="sp_medw2" type="text" class="form-control" id="sp_medw2"
									value="<?php echo $rcek1['sp_medw2']; ?>" placeholder="MED 2">
								<input name="sp_lonw2" type="text" class="form-control" id="sp_lonw2"
									value="<?php echo $rcek1['sp_lonw2']; ?>" placeholder="LONG 2">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="snap_note"
									maxlength="50"><?php echo $rcek1['snap_note']; ?></textarea>
							</div>
						</div>
						<div class="form-group" id="stat_sp" style="display:none;">
							<label for="stat_sp" class="col-sm-2 control-label">STATUS</label>
							<div class="col-sm-2">
								<select name="stat_sp" class="form-control select2" id="stat_sp" onChange="tampil();"
									style="width: 100%;">
									<option <?php if ($rcek1['stat_sp'] == "") { ?> selected=selected <?php }
									; ?>value="">
										Pilih
									</option>
									<option <?php if ($rcek1['stat_sp'] == "DISPOSISI") { ?> selected=selected <?php }
									; ?>value="DISPOSISI">DISPOSISI</option>
									<option <?php if ($rcek1['stat_sp'] == "A") { ?> selected=selected <?php }
									; ?>value="A">A
									</option>
									<option <?php if ($rcek1['stat_sp'] == "R") { ?> selected=selected <?php }
									; ?>value="R">R
									</option>
									<option <?php if ($rcek1['stat_sp'] == "PASS") { ?> selected=selected <?php }
									; ?>value="PASS">
										PASS</option>
									<option <?php if ($rcek1['stat_sp'] == "FAIL") { ?> selected=selected <?php }
									; ?>value="FAIL">
										FAIL</option>
									<option <?php if ($rcek1['stat_sp'] == "RANDOM") { ?> selected=selected <?php }
									; ?>value="RANDOM">RANDOM</option>
								</select>
							</div>
						</div>
						<div class="form-group" id="dissp" style="display:none;">
							<label for="dissp" class="col-sm-2 control-label">SNAGGING POD (DIS)</label>
							<div class="col-sm-1">LEN(Face) 1
								<input name="dsp_grdl1" type="text" class="form-control" id="dsp_grdl1"
									value="<?php echo $rcekD['dsp_grdl1']; ?>" placeholder="GRAD 1">
								<input name="dsp_clsl1" type="text" class="form-control" id="dsp_clsl1"
									value="<?php echo $rcekD['dsp_clsl1']; ?>" placeholder="CLAS 1">
								<input name="dsp_shol1" type="text" class="form-control" id="dsp_shol1"
									value="<?php echo $rcekD['dsp_shol1']; ?>" placeholder="SHO 1">
								<input name="dsp_medl1" type="text" class="form-control" id="dsp_medl1"
									value="<?php echo $rcekD['dsp_medl1']; ?>" placeholder="MED 1">
								<input name="dsp_lonl" type="text" class="form-control" id="dsp_lonl"
									value="<?php echo $rcekD['dsp_lonl']; ?>" placeholder="LONG 1">
							</div>
							<div class="col-sm-1">WID(Face) 1
								<input name="dsp_grdw1" type="text" class="form-control" id="dsp_grdw1"
									value="<?php echo $rcekD['dsp_grdw1']; ?>" placeholder="GRAD 1">
								<input name="dsp_clsw1" type="text" class="form-control" id="dsp_clsw1"
									value="<?php echo $rcekD['dsp_clsw1']; ?>" placeholder="CLAS 1">
								<input name="dsp_show1" type="text" class="form-control" id="dsp_show1"
									value="<?php echo $rcekD['dsp_show1']; ?>" placeholder="SHO 1">
								<input name="dsp_medw1" type="text" class="form-control" id="dsp_medw1"
									value="<?php echo $rcekD['dsp_medw1']; ?>" placeholder="MED 1">
								<input name="dsp_lonw1" type="text" class="form-control" id="dsp_lonw1"
									value="<?php echo $rcekD['dsp_lonw1']; ?>" placeholder="LONG 1">
							</div>
							<div class="col-sm-1">LEN(Back) 2
								<input name="dsp_grdl2" type="text" class="form-control" id="dsp_grdl2"
									value="<?php echo $rcekD['dsp_grdl2']; ?>" placeholder="GRAD 2">
								<input name="dsp_clsl2" type="text" class="form-control" id="dsp_clsl2"
									value="<?php echo $rcekD['dsp_clsl2']; ?>" placeholder="CLAS 2">
								<input name="dsp_shol2" type="text" class="form-control" id="dsp_shol2"
									value="<?php echo $rcekD['dsp_shol2']; ?>" placeholder="SHO 2">
								<input name="dsp_medl2" type="text" class="form-control" id="dsp_medl2"
									value="<?php echo $rcekD['dsp_medl2']; ?>" placeholder="MED 2">
								<input name="dsp_lonl2" type="text" class="form-control" id="dsp_lonl2"
									value="<?php echo $rcekD['dsp_lonl2']; ?>" placeholder="LONG 2">
							</div>
							<div class="col-sm-1">WID(Back) 2
								<input name="dsp_grdw2" type="text" class="form-control" id="dsp_grdw2"
									value="<?php echo $rcekD['dsp_grdw2']; ?>" placeholder="GRAD 2">
								<input name="dsp_clsw2" type="text" class="form-control" id="dsp_clsw2"
									value="<?php echo $rcekD['dsp_clsw2']; ?>" placeholder="CLAS 2">
								<input name="dsp_show2" type="text" class="form-control" id="dsp_show2"
									value="<?php echo $rcekD['dsp_show2']; ?>" placeholder="SHO 2">
								<input name="dsp_medw2" type="text" class="form-control" id="dsp_medw2"
									value="<?php echo $rcekD['dsp_medw2']; ?>" placeholder="MED 2">
								<input name="dsp_lonw2" type="text" class="form-control" id="dsp_lonw2"
									value="<?php echo $rcekD['dsp_lonw2']; ?>" placeholder="LONG 2">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
									name="dsnap_note" maxlength="50"><?php echo $rcekD['dsnap_note']; ?></textarea>
							</div>
						</div>
						<div class="form-group" id="ransp" style="display:none;">
							<label for="ransp" class="col-sm-2 control-label">SNAGGING POD (RAN)</label>
							<div class="col-sm-1">LEN(Face) 1
								<input name="rsp_grdl1" type="text" class="form-control" id="rsp_grdl1"
									value="<?php echo $rcekR['rsp_grdl1']; ?>" placeholder="GRAD 1" readonly>
								<input name="rsp_clsl1" type="text" class="form-control" id="rsp_clsl1"
									value="<?php echo $rcekR['rsp_clsl1']; ?>" placeholder="CLAS 1" readonly>
								<input name="rsp_shol1" type="text" class="form-control" id="rsp_shol1"
									value="<?php echo $rcekR['rsp_shol1']; ?>" placeholder="SHO 1" readonly>
								<input name="rsp_medl1" type="text" class="form-control" id="rsp_medl1"
									value="<?php echo $rcekR['rsp_medl1']; ?>" placeholder="MED 1" readonly>
								<input name="rsp_lonl" type="text" class="form-control" id="rsp_lonl"
									value="<?php echo $rcekR['rsp_lonl']; ?>" placeholder="LONG 1" readonly>
							</div>
							<div class="col-sm-1">WID(Face) 1
								<input name="rsp_grdw1" type="text" class="form-control" id="rsp_grdw1"
									value="<?php echo $rcekR['rsp_grdw1']; ?>" placeholder="GRAD 1" readonly>
								<input name="rsp_clsw1" type="text" class="form-control" id="rsp_clsw1"
									value="<?php echo $rcekR['rsp_clsw1']; ?>" placeholder="CLAS 1" readonly>
								<input name="rsp_show1" type="text" class="form-control" id="rsp_show1"
									value="<?php echo $rcekR['rsp_show1']; ?>" placeholder="SHO 1" readonly>
								<input name="rsp_medw1" type="text" class="form-control" id="rsp_medw1"
									value="<?php echo $rcekR['rsp_medw1']; ?>" placeholder="MED 1" readonly>
								<input name="rsp_lonw1" type="text" class="form-control" id="rsp_lonw1"
									value="<?php echo $rcekR['rsp_lonw1']; ?>" placeholder="LONG 1" readonly>
							</div>
							<div class="col-sm-1">LEN(Back) 2
								<input name="rsp_grdl2" type="text" class="form-control" id="rsp_grdl2"
									value="<?php echo $rcekR['rsp_grdl2']; ?>" placeholder="GRAD 2" readonly>
								<input name="rsp_clsl2" type="text" class="form-control" id="rsp_clsl2"
									value="<?php echo $rcekR['rsp_clsl2']; ?>" placeholder="CLAS 2" readonly>
								<input name="rsp_shol2" type="text" class="form-control" id="rsp_shol2"
									value="<?php echo $rcekR['rsp_shol2']; ?>" placeholder="SHO 2" readonly>
								<input name="rsp_medl2" type="text" class="form-control" id="rsp_medl2"
									value="<?php echo $rcekR['rsp_medl2']; ?>" placeholder="MED 2" readonly>
								<input name="rsp_lonl2" type="text" class="form-control" id="rsp_lonl2"
									value="<?php echo $rcekR['rsp_lonl2']; ?>" placeholder="LONG 2" readonly>
							</div>
							<div class="col-sm-1">WID(Back) 2
								<input name="rsp_grdw2" type="text" class="form-control" id="rsp_grdw2"
									value="<?php echo $rcekR['rsp_grdw2']; ?>" placeholder="GRAD 2" readonly>
								<input name="rsp_clsw2" type="text" class="form-control" id="rsp_clsw2"
									value="<?php echo $rcekR['rsp_clsw2']; ?>" placeholder="CLAS 2" readonly>
								<input name="rsp_show2" type="text" class="form-control" id="rsp_show2"
									value="<?php echo $rcekR['rsp_show2']; ?>" placeholder="SHO 2" readonly>
								<input name="rsp_medw2" type="text" class="form-control" id="rsp_medw2"
									value="<?php echo $rcekR['rsp_medw2']; ?>" placeholder="MED 2" readonly>
								<input name="rsp_lonw2" type="text" class="form-control" id="rsp_lonw2"
									value="<?php echo $rcekR['rsp_lonw2']; ?>" placeholder="LONG 2" readonly>
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
									name="rsnap_note" maxlength="50" readonly><?php echo $rcekR['rsnap_note']; ?></textarea>
							</div>
						</div>
						<!-- SNAGGING POD END-->
						<!-- BEAN BAG BEGIN-->
						<div class="form-group" id="fc14" style="display:none;">
							<label for="snaggingb" class="col-sm-2 control-label">BEAN BAG</label>
							<div class="col-sm-1">
								<input name="snaggingb_l1" type="text" class="form-control" id="snaggingb_l1"
									value="<?php echo $rcek1['sb_l1']; ?>" placeholder="LEN 1">
								<input name="snaggingb_w1" type="text" class="form-control" id="snaggingb_w1"
									value="<?php echo $rcek1['sb_w1']; ?>" placeholder="WID 1">
							</div>
							<!--
								<div class="col-sm-1">
									<input name="snaggingb_l2" type="text" class="form-control" id="snaggingb_l2" value="<?php echo $rcek1['sb_l2']; ?>" placeholder="LEN 2">
									<input name="snaggingb_w2" type="text" class="form-control" id="snaggingb_w2" value="<?php echo $rcek1['sb_w2']; ?>" placeholder="WID 2">
								</div>
								<div class="col-sm-1">
									<input name="snaggingb_l3" type="text" class="form-control" id="snaggingb_l3" value="<?php echo $rcek1['sb_l3']; ?>" placeholder="LEN 3">
									<input name="snaggingb_w3" type="text" class="form-control" id="snaggingb_w3" value="<?php echo $rcek1['sb_w3']; ?>" placeholder="WID 3">
								</div>
								<div class="col-sm-1">
									<input name="snaggingb_l4" type="text" class="form-control" id="snaggingb_l4" value="<?php echo $rcek1['sb_l4']; ?>" placeholder="LEN 4">
									<input name="snaggingb_w4" type="text" class="form-control" id="snaggingb_w4" value="<?php echo $rcek1['sb_w4']; ?>" placeholder="WID 4">
								</div>
								-->
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="snab_note"
									maxlength="50"><?php echo $rcek1['snab_note']; ?></textarea>
							</div>
						</div>
						<div class="form-group" id="stat_sb" style="display:none;">
							<label for="stat_sb" class="col-sm-2 control-label">STATUS</label>
							<div class="col-sm-2">
								<select name="stat_sb" class="form-control select2" id="stat_sb" onChange="tampil();"
									style="width: 100%;">
									<option <?php if ($rcek1['stat_sb'] == "") { ?> selected=selected <?php }
									; ?>value="">
										Pilih
									</option>
									<option <?php if ($rcek1['stat_sb'] == "DISPOSISI") { ?> selected=selected <?php }
									; ?>value="DISPOSISI">DISPOSISI</option>
									<option <?php if ($rcek1['stat_sb'] == "A") { ?> selected=selected <?php }
									; ?>value="A">A
									</option>
									<option <?php if ($rcek1['stat_sb'] == "R") { ?> selected=selected <?php }
									; ?>value="R">R
									</option>
									<option <?php if ($rcek1['stat_sb'] == "PASS") { ?> selected=selected <?php }
									; ?>value="PASS">
										PASS</option>
									<option <?php if ($rcek1['stat_sb'] == "FAIL") { ?> selected=selected <?php }
									; ?>value="FAIL">
										FAIL</option>
									<option <?php if ($rcek1['stat_sb'] == "RANDOM") { ?> selected=selected <?php }
									; ?>value="RANDOM">RANDOM</option>
								</select>
							</div>
						</div>
						<div class="form-group" id="dissb" style="display:none;">
							<label for="dissb" class="col-sm-2 control-label">BEAN BAG (DIS)</label>
							<div class="col-sm-1">
								<input name="dsnaggingb_l1" type="text" class="form-control" id="dsnaggingb_l1"
									value="<?php echo $rcekD['dsb_l1']; ?>" placeholder="LEN 1">
								<input name="dsnaggingb_w1" type="text" class="form-control" id="dsnaggingb_w1"
									value="<?php echo $rcekD['dsb_w1']; ?>" placeholder="WID 1">
							</div>
							<!--
								<div class="col-sm-1">
									<input name="snaggingb_l2" type="text" class="form-control" id="snaggingb_l2" value="<?php echo $rcek1['sb_l2']; ?>" placeholder="LEN 2">
									<input name="snaggingb_w2" type="text" class="form-control" id="snaggingb_w2" value="<?php echo $rcek1['sb_w2']; ?>" placeholder="WID 2">
								</div>
								<div class="col-sm-1">
									<input name="snaggingb_l3" type="text" class="form-control" id="snaggingb_l3" value="<?php echo $rcek1['sb_l3']; ?>" placeholder="LEN 3">
									<input name="snaggingb_w3" type="text" class="form-control" id="snaggingb_w3" value="<?php echo $rcek1['sb_w3']; ?>" placeholder="WID 3">
								</div>
								<div class="col-sm-1">
									<input name="snaggingb_l4" type="text" class="form-control" id="snaggingb_l4" value="<?php echo $rcek1['sb_l4']; ?>" placeholder="LEN 4">
									<input name="snaggingb_w4" type="text" class="form-control" id="snaggingb_w4" value="<?php echo $rcek1['sb_w4']; ?>" placeholder="WID 4">
								</div>
								-->
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
									name="dsnab_note" maxlength="50"><?php echo $rcekD['dsnab_note']; ?></textarea>
							</div>
						</div>
						<div class="form-group" id="ransb" style="display:none;">
							<label for="ransb" class="col-sm-2 control-label">BEAN BAG (RAN)</label>
							<div class="col-sm-1">
								<input name="rsnaggingb_l1" type="text" class="form-control" id="rsnaggingb_l1"
									value="<?php echo $rcekR['rsb_l1']; ?>" placeholder="LEN 1" readonly>
								<input name="rsnaggingb_w1" type="text" class="form-control" id="rsnaggingb_w1"
									value="<?php echo $rcekR['rsb_w1']; ?>" placeholder="WID 1" readonly>
							</div>
							<!--
								<div class="col-sm-1">
									<input name="snaggingb_l2" type="text" class="form-control" id="snaggingb_l2" value="<?php echo $rcek1['sb_l2']; ?>" placeholder="LEN 2">
									<input name="snaggingb_w2" type="text" class="form-control" id="snaggingb_w2" value="<?php echo $rcek1['sb_w2']; ?>" placeholder="WID 2">
								</div>
								<div class="col-sm-1">
									<input name="snaggingb_l3" type="text" class="form-control" id="snaggingb_l3" value="<?php echo $rcek1['sb_l3']; ?>" placeholder="LEN 3">
									<input name="snaggingb_w3" type="text" class="form-control" id="snaggingb_w3" value="<?php echo $rcek1['sb_w3']; ?>" placeholder="WID 3">
								</div>
								<div class="col-sm-1">
									<input name="snaggingb_l4" type="text" class="form-control" id="snaggingb_l4" value="<?php echo $rcek1['sb_l4']; ?>" placeholder="LEN 4">
									<input name="snaggingb_w4" type="text" class="form-control" id="snaggingb_w4" value="<?php echo $rcek1['sb_w4']; ?>" placeholder="WID 4">
								</div>
								-->
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
									name="rsnab_note" maxlength="50" readonly><?php echo $rcekR['rsnab_note']; ?></textarea>
							</div>
						</div>
						<!-- BEAN BAG END-->
						<!-- BURSTING STRENGTH BEGIN-->
						<div class="form-group" id="fc15" style="display:none;">
							<label for="burs_str" class="col-sm-2 control-label">INSTRON</label>
							<div class="col-sm-2">
								<input name="instron" type="text" class="form-control" id="instron"
									value="<?php echo $rcek1['bs_instron']; ?>" placeholder="INSTRON">
							</div>
							<div class="col-sm-2">
								<select name="stat_bs2" class="form-control select2" id="stat_bs2" onChange="tampil();"
									style="width: 100%;">
									<option <?php if ($rcek1['stat_bs2'] == "") { ?> selected=selected <?php }
									; ?>value="">
										Pilih
									</option>
									<option <?php if ($rcek1['stat_bs2'] == "DISPOSISI") { ?> selected=selected <?php }
									; ?>value="DISPOSISI">DISPOSISI</option>
									<option <?php if ($rcek1['stat_bs2'] == "A") { ?> selected=selected <?php }
									; ?>value="A">
										A
									</option>
									<option <?php if ($rcek1['stat_bs2'] == "R") { ?> selected=selected <?php }
									; ?>value="R">
										R
									</option>
									<option <?php if ($rcek1['stat_bs2'] == "PASS") { ?> selected=selected <?php }
									; ?>value="PASS">PASS</option>
									<option <?php if ($rcek1['stat_bs2'] == "MARGINAL PASS") { ?> selected=selected <?php }
									; ?>value="MARGINAL PASS">MARGINAL PASS</option>
									<option <?php if ($rcek1['stat_bs2'] == "DATA") { ?> selected=selected <?php }
									; ?>value="DATA">DATA</option>
									<option <?php if ($rcek1['stat_bs2'] == "FAIL") { ?> selected=selected <?php }
									; ?>value="FAIL">FAIL</option>
									<option <?php if ($rcek1['stat_bs2'] == "RANDOM") { ?> selected=selected <?php }
									; ?>value="RANDOM">RANDOM</option>
								</select>
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="burs_note"
									maxlength="50" rows="1"><?php echo $rcek1['burs_note']; ?></textarea>
							</div>
						</div>
						<div class="form-group" id="disbs2" style="display:none;">
							<label for="disbs2" class="col-sm-2 control-label">INSTRON (DIS) </label>
							<div class="col-sm-2">
								<input name="dinstron" type="text" class="form-control" id="dinstron"
									value="<?php echo $rcekD['dbs_instron']; ?>" placeholder="INSTRON">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
									name="dburs_note" maxlength="50" rows="1"><?php echo $rcekD['dburs_note']; ?></textarea>
							</div>
						</div>
						<div class="form-group" id="marbs2" style="display:none;">
							<label for="marbs2" class="col-sm-2 control-label">INSTRON (MARGINAL) </label>
							<div class="col-sm-2">
								<input name="minstron" type="text" class="form-control" id="minstron"
									value="<?php echo $rcekM['mbs_instron']; ?>" placeholder="INSTRON">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
									name="mburs_note" maxlength="50" rows="1"><?php echo $rcekM['mburs_note']; ?></textarea>
							</div>
						</div>
						<div class="form-group" id="ranbs2" style="display:none;">
							<label for="ranbs2" class="col-sm-2 control-label">INSTRON (RAN)</label>
							<div class="col-sm-2">
								<input name="rinstron" type="text" class="form-control" id="rinstron"
									value="<?php echo $rcekR['rbs_instron']; ?>" placeholder="INSTRON" readonly>
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
									name="rburs_note" maxlength="50" rows="1"
									readonly><?php echo $rcekR['rburs_note']; ?></textarea>
							</div>
						</div>
						<div class="form-group" id="fc26" style="display:none;">
							<label for="burs_str" class="col-sm-2 control-label">MULLEN</label>
							<div class="col-sm-2">
								<input name="mullen" type="text" class="form-control" id="mullen"
									value="<?php echo $rcek1['bs_mullen']; ?>" placeholder="MULLEN">
							</div>
							<div class="col-sm-2">
								<select name="stat_bs3" class="form-control select2" id="stat_bs3" onChange="tampil();"
									style="width: 100%;">
									<option <?php if ($rcek1['stat_bs3'] == "") { ?> selected=selected <?php }
									; ?>value="">
										Pilih
									</option>
									<option <?php if ($rcek1['stat_bs3'] == "DISPOSISI") { ?> selected=selected <?php }
									; ?>value="DISPOSISI">DISPOSISI</option>
									<option <?php if ($rcek1['stat_bs3'] == "A") { ?> selected=selected <?php }
									; ?>value="A">
										A
									</option>
									<option <?php if ($rcek1['stat_bs3'] == "R") { ?> selected=selected <?php }
									; ?>value="R">
										R
									</option>
									<option <?php if ($rcek1['stat_bs3'] == "PASS") { ?> selected=selected <?php }
									; ?>value="PASS">PASS</option>
									<option <?php if ($rcek1['stat_bs3'] == "MARGINAL PASS") { ?> selected=selected <?php }
									; ?>value="MARGINAL PASS">MARGINAL PASS</option>
									<option <?php if ($rcek1['stat_bs3'] == "DATA") { ?> selected=selected <?php }
									; ?>value="DATA">DATA</option>
									<option <?php if ($rcek1['stat_bs3'] == "FAIL") { ?> selected=selected <?php }
									; ?>value="FAIL">FAIL</option>
									<option <?php if ($rcek1['stat_bs3'] == "RANDOM") { ?> selected=selected <?php }
									; ?>value="RANDOM">RANDOM</option>
								</select>
							</div>
						</div>
						<div class="form-group" id="disbs3" style="display:none;">
							<label for="disbs3" class="col-sm-2 control-label">MULLEN (DIS) </label>
							<div class="col-sm-2">
								<input name="dmullen" type="text" class="form-control" id="dmullen"
									value="<?php echo $rcekD['dbs_mullen']; ?>" placeholder="MULLEN">
							</div>
						</div>
						<div class="form-group" id="marbs3" style="display:none;">
							<label for="marbs3" class="col-sm-2 control-label">MULLEN (MARGINAL) </label>
							<div class="col-sm-2">
								<input name="mmullen" type="text" class="form-control" id="mmullen"
									value="<?php echo $rcekM['mbs_mullen']; ?>" placeholder="MULLEN">
							</div>
						</div>
						<div class="form-group" id="ranbs3" style="display:none;">
							<label for="ranbs3" class="col-sm-2 control-label">MULLEN (RAN)</label>
							<div class="col-sm-2">
								<input name="rmullen" type="text" class="form-control" id="rmullen"
									value="<?php echo $rcekR['rbs_mullen']; ?>" placeholder="MULLEN" readonly>
							</div>
						</div>
						<div class="form-group" id="fc25" style="display:none;">
							<label for="burs_str" class="col-sm-2 control-label">TRU BURST</label>
							<div class="col-sm-2">
								<input name="tru_burst" type="text" class="form-control" id="tru_burst"
									value="<?php echo $rcek1['bs_tru']; ?>" placeholder="TRU BURST">
							</div>
							<div class="col-sm-2">
								<input name="tru_burst2" type="text" class="form-control" id="tru_burst2"
									value="<?php echo $rcek1['bs_tru2']; ?>" placeholder="TRU BURST 2">
							</div>
							<div class="col-sm-2">
								<select name="stat_bs" class="form-control select2" id="stat_bs" onChange="tampil();"
									style="width: 100%;">
									<option <?php if ($rcek1['stat_bs'] == "") { ?> selected=selected <?php }
									; ?>value="">
										Pilih
									</option>
									<option <?php if ($rcek1['stat_bs'] == "DISPOSISI") { ?> selected=selected <?php }
									; ?>value="DISPOSISI">DISPOSISI</option>
									<option <?php if ($rcek1['stat_bs'] == "A") { ?> selected=selected <?php }
									; ?>value="A">A
									</option>
									<option <?php if ($rcek1['stat_bs'] == "R") { ?> selected=selected <?php }
									; ?>value="R">R
									</option>
									<option <?php if ($rcek1['stat_bs'] == "PASS") { ?> selected=selected <?php }
									; ?>value="PASS">
										PASS</option>
									<option <?php if ($rcek1['stat_bs'] == "MARGINAL PASS") { ?> selected=selected <?php }
									; ?>value="MARGINAL PASS">MARGINAL PASS</option>
									<option <?php if ($rcek1['stat_bs'] == "DATA") { ?> selected=selected <?php }
									; ?>value="DATA">
										DATA</option>
									<option <?php if ($rcek1['stat_bs'] == "FAIL") { ?> selected=selected <?php }
									; ?>value="FAIL">
										FAIL</option>
									<option <?php if ($rcek1['stat_bs'] == "RANDOM") { ?> selected=selected <?php }
									; ?>value="RANDOM">RANDOM</option>
								</select>
							</div>
						</div>
						<div class="form-group" id="disbs" style="display:none;">
							<label for="disbs" class="col-sm-2 control-label">TRU BURST (DIS) </label>
							<div class="col-sm-2">
								<input name="dtru_burst" type="text" class="form-control" id="dtru_burst"
									value="<?php echo $rcekD['dbs_tru']; ?>" placeholder="TRU BURST">
							</div>
							<div class="col-sm-2">
								<input name="dtru_burst2" type="text" class="form-control" id="dtru_burst2"
									value="<?php echo $rcekD['dbs_tru2']; ?>" placeholder="TRU BURST 2">
							</div>
						</div>
						<div class="form-group" id="marbs" style="display:none;">
							<label for="marbs" class="col-sm-2 control-label">TRU BURST (MARGINAL) </label>
							<div class="col-sm-2">
								<input name="mtru_burst" type="text" class="form-control" id="mtru_burst"
									value="<?php echo $rcekM['mbs_tru']; ?>" placeholder="TRU BURST">
							</div>
							<div class="col-sm-2">
								<input name="mtru_burst2" type="text" class="form-control" id="mtru_burst2"
									value="<?php echo $rcekM['mbs_tru2']; ?>" placeholder="TRU BURST 2">
							</div>
						</div>
						<div class="form-group" id="ranbs" style="display:none;">
							<label for="ranbs" class="col-sm-2 control-label">TRU BURST (RAN)</label>
							<div class="col-sm-2">
								<input name="rtru_burst" type="text" class="form-control" id="rtru_burst"
									value="<?php echo $rcekR['rbs_tru']; ?>" placeholder="TRU BURST" readonly>
							</div>
							<div class="col-sm-2">
								<input name="rtru_burst2" type="text" class="form-control" id="rtru_burst2"
									value="<?php echo $rcekR['rbs_tru2']; ?>" placeholder="TRU BURST 2" readonly>
							</div>
						</div>
						<!-- BURSTING STRENGTH END-->
						<!-- THICKNESS BEGIN-->
						<div class="form-group" id="fc16" style="display:none;">
							<label for="thickn" class="col-sm-2 control-label">THICKNESS</label>
							<div class="col-sm-2">
								<input name="thick1" type="text" class="form-control" id="thick1"
									value="<?php echo $rcek1['thick1']; ?>" placeholder="1">
							</div>
							<div class="col-sm-2">
								<input name="thick2" type="text" class="form-control" id="thick2"
									value="<?php echo $rcek1['thick2']; ?>" placeholder="2">
							</div>
							<div class="col-sm-2">
								<input name="thick3" type="text" class="form-control" id="thick3"
									value="<?php echo $rcek1['thick3']; ?>" placeholder="3">
							</div>
							<div class="col-sm-2">
								<input name="thickav" type="text" class="form-control" id="thickav"
									value="<?php echo $rcek1['thickav']; ?>" placeholder="AV">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
									name="thick_note" maxlength="50" rows="1"><?php echo $rcek1['thick_note']; ?></textarea>
							</div>
						</div>
						<div class="form-group" id="stat_th" style="display:none;">
							<label for="stat_th" class="col-sm-2 control-label">STATUS</label>
							<div class="col-sm-2">
								<select name="stat_th" class="form-control select2" id="stat_th" onChange="tampil();"
									style="width: 100%;">
									<option <?php if ($rcek1['stat_th'] == "") { ?> selected=selected <?php }
									; ?>value="">
										Pilih
									</option>
									<option <?php if ($rcek1['stat_th'] == "DISPOSISI") { ?> selected=selected <?php }
									; ?>value="DISPOSISI">DISPOSISI</option>
									<option <?php if ($rcek1['stat_th'] == "A") { ?> selected=selected <?php }
									; ?>value="A">A
									</option>
									<option <?php if ($rcek1['stat_th'] == "R") { ?> selected=selected <?php }
									; ?>value="R">R
									</option>
									<option <?php if ($rcek1['stat_th'] == "PASS") { ?> selected=selected <?php }
									; ?>value="PASS">
										PASS</option>
									<option <?php if ($rcek1['stat_th'] == "FAIL") { ?> selected=selected <?php }
									; ?>value="FAIL">
										FAIL</option>
									<option <?php if ($rcek1['stat_th'] == "RANDOM") { ?> selected=selected <?php }
									; ?>value="RANDOM">RANDOM</option>
								</select>
							</div>
						</div>
						<div class="form-group" id="disth" style="display:none;">
							<label for="disth" class="col-sm-2 control-label">THICKNESS (DIS)</label>
							<div class="col-sm-2">
								<input name="dthick1" type="text" class="form-control" id="dthick1"
									value="<?php echo $rcekD['dthick1']; ?>" placeholder="1">
							</div>
							<div class="col-sm-2">
								<input name="dthick2" type="text" class="form-control" id="dthick2"
									value="<?php echo $rcekD['dthick2']; ?>" placeholder="2">
							</div>
							<div class="col-sm-2">
								<input name="dthick3" type="text" class="form-control" id="dthick3"
									value="<?php echo $rcekD['dthick3']; ?>" placeholder="3">
							</div>
							<div class="col-sm-2">
								<input name="dthickav" type="text" class="form-control" id="dthickav"
									value="<?php echo $rcekD['dthickav']; ?>" placeholder="AV">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
									name="dthick_note" maxlength="50"
									rows="1"><?php echo $rcekD['dthick_note']; ?></textarea>
							</div>
						</div>
						<div class="form-group" id="ranth" style="display:none;">
							<label for="ranth" class="col-sm-2 control-label">THICKNESS (RAN)</label>
							<div class="col-sm-2">
								<input name="rthick1" type="text" class="form-control" id="rthick1"
									value="<?php echo $rcekR['rthick1']; ?>" placeholder="1" readonly>
							</div>
							<div class="col-sm-2">
								<input name="rthick2" type="text" class="form-control" id="rthick2"
									value="<?php echo $rcekR['rthick2']; ?>" placeholder="2" readonly>
							</div>
							<div class="col-sm-2">
								<input name="rthick3" type="text" class="form-control" id="rthick3"
									value="<?php echo $rcekR['rthick3']; ?>" placeholder="3" readonly>
							</div>
							<div class="col-sm-2">
								<input name="rthickav" type="text" class="form-control" id="rthickav"
									value="<?php echo $rcekR['rthickav']; ?>" placeholder="AV" readonly>
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
									name="rthick_note" maxlength="50" rows="1"
									readonly><?php echo $rcekR['rthick_note']; ?></textarea>
							</div>
						</div>
						<!-- THICKNESS END-->
						<!-- STRECTH & RECOVERY BEGIN-->
						<div class="form-group" id="fc17" style="display:none;">
							<label for="stretch" class="col-sm-2 control-label">STRETCH</label>
							<div class="col-sm-1">
								<label><input type="checkbox" name="load_stretch" id="load_stretch" class="minimal"
										value="60" <?php if ($rcek1['load_stretch'] == '60') {
											echo "checked";
										} ?>> 60N
									&nbsp;
									&nbsp; &nbsp; &nbsp;
								</label>
								<label><input type="checkbox" name="load_stretch" id="load_stretch" class="minimal"
										value="22" <?php if ($rcek1['load_stretch'] == '22') {
											echo "checked";
										} ?>> 22N
								</label>
							</div>
							<div class="col-sm-1">
								<input name="stretch_l1" type="text" class="form-control" id="stretch_l1"
									value="<?php echo $rcek1['stretch_l1']; ?>" placeholder="LEN 1">
								<input name="stretch_w1" type="text" class="form-control" id="stretch_w1"
									value="<?php echo $rcek1['stretch_w1']; ?>" placeholder="WID 1">
							</div>
							<div class="col-sm-1">
								<input name="stretch_l2" type="text" class="form-control" id="stretch_l2"
									value="<?php echo $rcek1['stretch_l2']; ?>" placeholder="LEN 2">
								<input name="stretch_w2" type="text" class="form-control" id="stretch_w2"
									value="<?php echo $rcek1['stretch_w2']; ?>" placeholder="WID 2">
							</div>
							<div class="col-sm-1">
								<input name="stretch_l3" type="text" class="form-control" id="stretch_l3"
									value="<?php echo $rcek1['stretch_l3']; ?>" placeholder="LEN 3">
								<input name="stretch_w3" type="text" class="form-control" id="stretch_w3"
									value="<?php echo $rcek1['stretch_w3']; ?>" placeholder="WID 3">
							</div>
							<div class="col-sm-1">
								<input name="stretch_l4" type="text" class="form-control" id="stretch_l4"
									value="<?php echo $rcek1['stretch_l4']; ?>" placeholder="LEN 4">
								<input name="stretch_w4" type="text" class="form-control" id="stretch_w4"
									value="<?php echo $rcek1['stretch_w4']; ?>" placeholder="WID 4">
							</div>
							<div class="col-sm-1">
								<input name="stretch_l5" type="text" class="form-control" id="stretch_l5"
									value="<?php echo $rcek1['stretch_l5']; ?>" placeholder="LEN 5">
								<input name="stretch_w5" type="text" class="form-control" id="stretch_w5"
									value="<?php echo $rcek1['stretch_w5']; ?>" placeholder="WID 5">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
									name="stretch_note" maxlength="50"><?php echo $rcek1['stretch_note']; ?></textarea>
							</div>
						</div>
						<div class="form-group" id="fc18" style="display:none;">
							<label for="recover" class="col-sm-2 control-label">RECOVERY</label>
							<div class="col-sm-1">
								<input name="recover_l1" type="text" class="form-control" id="recover_l1"
									value="<?php echo $rcek1['recover_l1']; ?>" placeholder="LEN1 1">
								<input name="recover_l2" type="text" class="form-control" id="recover_l2"
									value="<?php echo $rcek1['recover_l2']; ?>" placeholder="LEN30 1">
								<input name="recover_w1" type="text" class="form-control" id="recover_w1"
									value="<?php echo $rcek1['recover_w1']; ?>" placeholder="WID1 1">
								<input name="recover_w2" type="text" class="form-control" id="recover_w2"
									value="<?php echo $rcek1['recover_w2']; ?>" placeholder="WID30 1">
							</div>
							<div class="col-sm-1">
								<input name="recover_l11" type="text" class="form-control" id="recover_l11"
									value="<?php echo $rcek1['recover_l11']; ?>" placeholder="LEN1 2">
								<input name="recover_l21" type="text" class="form-control" id="recover_l21"
									value="<?php echo $rcek1['recover_l21']; ?>" placeholder="LEN30 2">
								<input name="recover_w11" type="text" class="form-control" id="recover_w11"
									value="<?php echo $rcek1['recover_w11']; ?>" placeholder="WID1 2">
								<input name="recover_w21" type="text" class="form-control" id="recover_w21"
									value="<?php echo $rcek1['recover_w21']; ?>" placeholder="WID30 2">
							</div>
							<div class="col-sm-1">
								<input name="recover_l3" type="text" class="form-control" id="recover_l3"
									value="<?php echo $rcek1['recover_l3']; ?>" placeholder="LEN1 3">
								<input name="recover_l31" type="text" class="form-control" id="recover_l31"
									value="<?php echo $rcek1['recover_l31']; ?>" placeholder="LEN30 3">
								<input name="recover_w3" type="text" class="form-control" id="recover_w3"
									value="<?php echo $rcek1['recover_w3']; ?>" placeholder="WID1 3">
								<input name="recover_w31" type="text" class="form-control" id="recover_w31"
									value="<?php echo $rcek1['recover_w31']; ?>" placeholder="WID30 3">
							</div>
							<div class="col-sm-1">
								<input name="recover_l4" type="text" class="form-control" id="recover_l4"
									value="<?php echo $rcek1['recover_l4']; ?>" placeholder="LEN1 4">
								<input name="recover_l41" type="text" class="form-control" id="recover_l41"
									value="<?php echo $rcek1['recover_l41']; ?>" placeholder="LEN30 4">
								<input name="recover_w4" type="text" class="form-control" id="recover_w4"
									value="<?php echo $rcek1['recover_w4']; ?>" placeholder="WID1 4">
								<input name="recover_w41" type="text" class="form-control" id="recover_w41"
									value="<?php echo $rcek1['recover_w41']; ?>" placeholder="WID30 4">
							</div>
							<div class="col-sm-1">
								<input name="recover_l5" type="text" class="form-control" id="recover_l5"
									value="<?php echo $rcek1['recover_l5']; ?>" placeholder="LEN1 5">
								<input name="recover_l51" type="text" class="form-control" id="recover_l51"
									value="<?php echo $rcek1['recover_l51']; ?>" placeholder="LEN30 5">
								<input name="recover_w5" type="text" class="form-control" id="recover_w5"
									value="<?php echo $rcek1['recover_w5']; ?>" placeholder="WID1 5">
								<input name="recover_w51" type="text" class="form-control" id="recover_w51"
									value="<?php echo $rcek1['recover_w51']; ?>" placeholder="WID30 5">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
									name="recover_note" maxlength="50"><?php echo $rcek1['recover_note']; ?></textarea>
							</div>
						</div>
						<div class="form-group" id="stat_sr" style="display:none;">
							<label for="stat_sr" class="col-sm-2 control-label">STATUS</label>
							<div class="col-sm-2">
								<select name="stat_sr" class="form-control select2" id="stat_sr" onChange="tampil();"
									style="width: 100%;">
									<option <?php if ($rcek1['stat_sr'] == "") { ?> selected=selected <?php }
									; ?>value="">
										Pilih
									</option>
									<option <?php if ($rcek1['stat_sr'] == "DISPOSISI") { ?> selected=selected <?php }
									; ?>value="DISPOSISI">DISPOSISI</option>
									<option <?php if ($rcek1['stat_sr'] == "A") { ?> selected=selected <?php }
									; ?>value="A">A
									</option>
									<option <?php if ($rcek1['stat_sr'] == "R") { ?> selected=selected <?php }
									; ?>value="R">R
									</option>
									<option <?php if ($rcek1['stat_sr'] == "PASS") { ?> selected=selected <?php }
									; ?>value="PASS">
										PASS</option>
									<option <?php if ($rcek1['stat_sr'] == "MARGINAL PASS") { ?> selected=selected <?php }
									; ?>value="MARGINAL PASS">MARGINAL PASS</option>
									<option <?php if ($rcek1['stat_sr'] == "DATA") { ?> selected=selected <?php }
									; ?>value="DATA">
										DATA</option>
									<option <?php if ($rcek1['stat_sr'] == "FAIL") { ?> selected=selected <?php }
									; ?>value="FAIL">
										FAIL</option>
									<option <?php if ($rcek1['stat_sr'] == "RANDOM") { ?> selected=selected <?php }
									; ?>value="RANDOM">RANDOM</option>
								</select>
							</div>
						</div>
						<div class="form-group" id="disst" style="display:none;">
							<label for="disst" class="col-sm-2 control-label">STRETCH (DIS)</label>
							<div class="col-sm-1">
								<label><input type="checkbox" name="dload_stretch" id="dload_stretch" class="minimal"
										value="60" <?php if ($rcekD['dload_stretch'] == '60') {
											echo "checked";
										} ?>> 60N
									&nbsp;
									&nbsp; &nbsp; &nbsp;
								</label>
								<label><input type="checkbox" name="dload_stretch" id="dload_stretch" class="minimal"
										value="22" <?php if ($rcekD['dload_stretch'] == '22') {
											echo "checked";
										} ?>> 22N
								</label>
							</div>
							<div class="col-sm-1">
								<input name="dstretch_l1" type="text" class="form-control" id="dstretch_l1"
									value="<?php echo $rcekD['dstretch_l1']; ?>" placeholder="LEN 1">
								<input name="dstretch_w1" type="text" class="form-control" id="dstretch_w1"
									value="<?php echo $rcekD['dstretch_w1']; ?>" placeholder="WID 1">
							</div>
							<div class="col-sm-1">
								<input name="dstretch_l2" type="text" class="form-control" id="dstretch_l2"
									value="<?php echo $rcekD['dstretch_l2']; ?>" placeholder="LEN 2">
								<input name="dstretch_w2" type="text" class="form-control" id="dstretch_w2"
									value="<?php echo $rcekD['dstretch_w2']; ?>" placeholder="WID 2">
							</div>
							<div class="col-sm-1">
								<input name="dstretch_l3" type="text" class="form-control" id="dstretch_l3"
									value="<?php echo $rcekD['dstretch_l3']; ?>" placeholder="LEN 3">
								<input name="dstretch_w3" type="text" class="form-control" id="dstretch_w3"
									value="<?php echo $rcekD['dstretch_w3']; ?>" placeholder="WID 3">
							</div>
							<div class="col-sm-1">
								<input name="dstretch_l4" type="text" class="form-control" id="dstretch_l4"
									value="<?php echo $rcekD['dstretch_l4']; ?>" placeholder="LEN 4">
								<input name="dstretch_w4" type="text" class="form-control" id="dstretch_w4"
									value="<?php echo $rcekD['dstretch_w4']; ?>" placeholder="WID 4">
							</div>
							<div class="col-sm-1">
								<input name="dstretch_l5" type="text" class="form-control" id="dstretch_l5"
									value="<?php echo $rcekD['dstretch_l5']; ?>" placeholder="LEN 5">
								<input name="dstretch_w5" type="text" class="form-control" id="dstretch_w5"
									value="<?php echo $rcekD['dstretch_w5']; ?>" placeholder="WID 5">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
									name="dstretch_note" maxlength="50"><?php echo $rcekD['dstretch_note']; ?></textarea>
							</div>
						</div>
						<div class="form-group" id="marst" style="display:none;">
							<label for="marst" class="col-sm-2 control-label">STRETCH (MARGINAL)</label>
							<div class="col-sm-1">
								<label><input type="checkbox" name="mload_stretch" id="mload_stretch" class="minimal"
										value="60" <?php if ($rcekM['mload_stretch'] == '60') {
											echo "checked";
										} ?>> 60N
									&nbsp;
									&nbsp; &nbsp; &nbsp;
								</label>
								<label><input type="checkbox" name="mload_stretch" id="mload_stretch" class="minimal"
										value="22" <?php if ($rcekM['mload_stretch'] == '22') {
											echo "checked";
										} ?>> 22N
								</label>
							</div>
							<div class="col-sm-1">
								<input name="mstretch_l1" type="text" class="form-control" id="mstretch_l1"
									value="<?php echo $rcekM['mstretch_l1']; ?>" placeholder="LEN 1">
								<input name="mstretch_w1" type="text" class="form-control" id="mstretch_w1"
									value="<?php echo $rcekM['mstretch_w1']; ?>" placeholder="WID 1">
							</div>
							<div class="col-sm-1">
								<input name="mstretch_l2" type="text" class="form-control" id="mstretch_l2"
									value="<?php echo $rcekM['mstretch_l2']; ?>" placeholder="LEN 2">
								<input name="mstretch_w2" type="text" class="form-control" id="mstretch_w2"
									value="<?php echo $rcekM['mstretch_w2']; ?>" placeholder="WID 2">
							</div>
							<div class="col-sm-1">
								<input name="mstretch_l3" type="text" class="form-control" id="mstretch_l3"
									value="<?php echo $rcekM['mstretch_l3']; ?>" placeholder="LEN 3">
								<input name="mstretch_w3" type="text" class="form-control" id="mstretch_w3"
									value="<?php echo $rcekM['mstretch_w3']; ?>" placeholder="WID 3">
							</div>
							<div class="col-sm-1">
								<input name="mstretch_l4" type="text" class="form-control" id="mstretch_l4"
									value="<?php echo $rcekM['mstretch_l4']; ?>" placeholder="LEN 4">
								<input name="mstretch_w4" type="text" class="form-control" id="mstretch_w4"
									value="<?php echo $rcekM['mstretch_w4']; ?>" placeholder="WID 4">
							</div>
							<div class="col-sm-1">
								<input name="mstretch_l5" type="text" class="form-control" id="mstretch_l5"
									value="<?php echo $rcekM['mstretch_l5']; ?>" placeholder="LEN 5">
								<input name="mstretch_w5" type="text" class="form-control" id="mstretch_w5"
									value="<?php echo $rcekM['mstretch_w5']; ?>" placeholder="WID 5">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
									name="mstretch_note" maxlength="50"><?php echo $rcekM['mstretch_note']; ?></textarea>
							</div>
						</div>
						<div class="form-group" id="ranst" style="display:none;">
							<label for="ranst" class="col-sm-2 control-label">STRETCH (RAN)</label>
							<div class="col-sm-1">
								<label><input type="checkbox" name="rload_stretch" id="rload_stretch" class="minimal"
										value="60" <?php if ($rcekR['rload_stretch'] == '60') {
											echo "checked";
										} ?>> 60N
									&nbsp;
									&nbsp; &nbsp; &nbsp;
								</label>
								<label><input type="checkbox" name="rload_stretch" id="rload_stretch" class="minimal"
										value="22" <?php if ($rcekR['rload_stretch'] == '22') {
											echo "checked";
										} ?>> 22N
								</label>
							</div>
							<div class="col-sm-1">
								<input name="rstretch_l1" type="text" class="form-control" id="rstretch_l1"
									value="<?php echo $rcekR['rstretch_l1']; ?>" placeholder="LEN 1" readonly>
								<input name="rstretch_w1" type="text" class="form-control" id="rstretch_w1"
									value="<?php echo $rcekR['rstretch_w1']; ?>" placeholder="WID 1" readonly>
							</div>
							<div class="col-sm-1">
								<input name="rstretch_l2" type="text" class="form-control" id="rstretch_l2"
									value="<?php echo $rcekR['rstretch_l2']; ?>" placeholder="LEN 2" readonly>
								<input name="rstretch_w2" type="text" class="form-control" id="rstretch_w2"
									value="<?php echo $rcekR['rstretch_w2']; ?>" placeholder="WID 2" readonly>
							</div>
							<div class="col-sm-1">
								<input name="rstretch_l3" type="text" class="form-control" id="rstretch_l3"
									value="<?php echo $rcekR['rstretch_l3']; ?>" placeholder="LEN 3" readonly>
								<input name="rstretch_w3" type="text" class="form-control" id="rstretch_w3"
									value="<?php echo $rcekR['rstretch_w3']; ?>" placeholder="WID 3" readonly>
							</div>
							<div class="col-sm-1">
								<input name="rstretch_l4" type="text" class="form-control" id="rstretch_l4"
									value="<?php echo $rcekR['rstretch_l4']; ?>" placeholder="LEN 4" readonly>
								<input name="rstretch_w4" type="text" class="form-control" id="rstretch_w4"
									value="<?php echo $rcekR['rstretch_w4']; ?>" placeholder="WID 4" readonly>
							</div>
							<div class="col-sm-1">
								<input name="rstretch_l5" type="text" class="form-control" id="rstretch_l5"
									value="<?php echo $rcekR['rstretch_l5']; ?>" placeholder="LEN 5" readonly>
								<input name="rstretch_w5" type="text" class="form-control" id="rstretch_w5"
									value="<?php echo $rcekR['rstretch_w5']; ?>" placeholder="WID 5" readonly>
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
									name="rstretch_note" maxlength="50"
									readonly><?php echo $rcekR['rstretch_note']; ?></textarea>
							</div>
						</div>
						<div class="form-group" id="disrc" style="display:none;">
							<label for="disrc" class="col-sm-2 control-label">RECOVERY (DIS)</label>
							<div class="col-sm-1">
								<input name="drecover_l1" type="text" class="form-control" id="drecover_l1"
									value="<?php echo $rcekD['drecover_l1']; ?>" placeholder="LEN1 1">
								<input name="drecover_l2" type="text" class="form-control" id="drecover_l2"
									value="<?php echo $rcekD['drecover_l2']; ?>" placeholder="LEN30 1">
								<input name="drecover_w1" type="text" class="form-control" id="drecover_w1"
									value="<?php echo $rcekD['drecover_w1']; ?>" placeholder="WID1 1">
								<input name="drecover_w2" type="text" class="form-control" id="drecover_w2"
									value="<?php echo $rcekD['drecover_w2']; ?>" placeholder="WID30 1">
							</div>
							<div class="col-sm-1">
								<input name="drecover_l11" type="text" class="form-control" id="drecover_l11"
									value="<?php echo $rcekD['drecover_l11']; ?>" placeholder="LEN1 2">
								<input name="drecover_l21" type="text" class="form-control" id="drecover_l21"
									value="<?php echo $rcekD['drecover_l21']; ?>" placeholder="LEN30 2">
								<input name="drecover_w11" type="text" class="form-control" id="drecover_w11"
									value="<?php echo $rcekD['drecover_w11']; ?>" placeholder="WID1 2">
								<input name="drecover_w21" type="text" class="form-control" id="drecover_w21"
									value="<?php echo $rcekD['drecover_w21']; ?>" placeholder="WID30 2">
							</div>
							<div class="col-sm-1">
								<input name="drecover_l3" type="text" class="form-control" id="drecover_l3"
									value="<?php echo $rcekD['drecover_l3']; ?>" placeholder="LEN1 3">
								<input name="drecover_l31" type="text" class="form-control" id="drecover_l31"
									value="<?php echo $rcekD['drecover_l31']; ?>" placeholder="LEN30 3">
								<input name="drecover_w3" type="text" class="form-control" id="drecover_w3"
									value="<?php echo $rcekD['drecover_w3']; ?>" placeholder="WID1 3">
								<input name="drecover_w31" type="text" class="form-control" id="drecover_w31"
									value="<?php echo $rcekD['drecover_w31']; ?>" placeholder="WID30 3">
							</div>
							<div class="col-sm-1">
								<input name="drecover_l4" type="text" class="form-control" id="drecover_l4"
									value="<?php echo $rcekD['drecover_l4']; ?>" placeholder="LEN1 4">
								<input name="drecover_l41" type="text" class="form-control" id="drecover_l41"
									value="<?php echo $rcekD['drecover_l41']; ?>" placeholder="LEN30 4">
								<input name="drecover_w4" type="text" class="form-control" id="drecover_w4"
									value="<?php echo $rcekD['drecover_w4']; ?>" placeholder="WID1 4">
								<input name="drecover_w41" type="text" class="form-control" id="drecover_w41"
									value="<?php echo $rcekD['drecover_w41']; ?>" placeholder="WID30 4">
							</div>
							<div class="col-sm-1">
								<input name="drecover_l5" type="text" class="form-control" id="drecover_l5"
									value="<?php echo $rcekD['drecover_l5']; ?>" placeholder="LEN1 5">
								<input name="drecover_l51" type="text" class="form-control" id="drecover_l51"
									value="<?php echo $rcekD['drecover_l51']; ?>" placeholder="LEN30 5">
								<input name="drecover_w5" type="text" class="form-control" id="drecover_w5"
									value="<?php echo $rcekD['drecover_w5']; ?>" placeholder="WID1 5">
								<input name="drecover_w51" type="text" class="form-control" id="drecover_w51"
									value="<?php echo $rcekD['drecover_w51']; ?>" placeholder="WID30 5">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
									name="drecover_note" maxlength="50"><?php echo $rcekD['drecover_note']; ?></textarea>
							</div>
						</div>
						<div class="form-group" id="marrc" style="display:none;">
							<label for="marrc" class="col-sm-2 control-label">RECOVERY (MARGINAL)</label>
							<div class="col-sm-1">
								<input name="mrecover_l1" type="text" class="form-control" id="mrecover_l1"
									value="<?php echo $rcekM['mrecover_l1']; ?>" placeholder="LEN1 1">
								<input name="mrecover_l2" type="text" class="form-control" id="mrecover_l2"
									value="<?php echo $rcekM['mrecover_l2']; ?>" placeholder="LEN30 1">
								<input name="mrecover_w1" type="text" class="form-control" id="mrecover_w1"
									value="<?php echo $rcekM['mrecover_w1']; ?>" placeholder="WID1 1">
								<input name="mrecover_w2" type="text" class="form-control" id="mrecover_w2"
									value="<?php echo $rcekM['mrecover_w2']; ?>" placeholder="WID30 1">
							</div>
							<div class="col-sm-1">
								<input name="mrecover_l11" type="text" class="form-control" id="mrecover_l11"
									value="<?php echo $rcekM['mrecover_l11']; ?>" placeholder="LEN1 2">
								<input name="mrecover_l21" type="text" class="form-control" id="mrecover_l21"
									value="<?php echo $rcekM['mrecover_l21']; ?>" placeholder="LEN30 2">
								<input name="mrecover_w11" type="text" class="form-control" id="mrecover_w11"
									value="<?php echo $rcekM['mrecover_w11']; ?>" placeholder="WID1 2">
								<input name="mrecover_w21" type="text" class="form-control" id="mrecover_w21"
									value="<?php echo $rcekM['mrecover_w21']; ?>" placeholder="WID30 2">
							</div>
							<div class="col-sm-1">
								<input name="mrecover_l3" type="text" class="form-control" id="mrecover_l3"
									value="<?php echo $rcekM['mrecover_l3']; ?>" placeholder="LEN1 3">
								<input name="mrecover_l31" type="text" class="form-control" id="mrecover_l31"
									value="<?php echo $rcekM['mrecover_l31']; ?>" placeholder="LEN30 3">
								<input name="mrecover_w3" type="text" class="form-control" id="mrecover_w3"
									value="<?php echo $rcekM['mrecover_w3']; ?>" placeholder="WID1 3">
								<input name="mrecover_w31" type="text" class="form-control" id="mrecover_w31"
									value="<?php echo $rcekM['mrecover_w31']; ?>" placeholder="WID30 3">
							</div>
							<div class="col-sm-1">
								<input name="mrecover_l4" type="text" class="form-control" id="mrecover_l4"
									value="<?php echo $rcekM['mrecover_l4']; ?>" placeholder="LEN1 4">
								<input name="mrecover_l41" type="text" class="form-control" id="mrecover_l41"
									value="<?php echo $rcekM['mrecover_l41']; ?>" placeholder="LEN30 4">
								<input name="mrecover_w4" type="text" class="form-control" id="mrecover_w4"
									value="<?php echo $rcekM['mrecover_w4']; ?>" placeholder="WID1 4">
								<input name="mrecover_w41" type="text" class="form-control" id="mrecover_w41"
									value="<?php echo $rcekM['mrecover_w41']; ?>" placeholder="WID30 4">
							</div>
							<div class="col-sm-1">
								<input name="mrecover_l5" type="text" class="form-control" id="mrecover_l5"
									value="<?php echo $rcekM['mrecover_l5']; ?>" placeholder="LEN1 5">
								<input name="mrecover_l51" type="text" class="form-control" id="mrecover_l51"
									value="<?php echo $rcekM['mrecover_l51']; ?>" placeholder="LEN30 5">
								<input name="mrecover_w5" type="text" class="form-control" id="mrecover_w5"
									value="<?php echo $rcekM['mrecover_w5']; ?>" placeholder="WID1 5">
								<input name="mrecover_w51" type="text" class="form-control" id="mrecover_w51"
									value="<?php echo $rcekM['mrecover_w51']; ?>" placeholder="WID30 5">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
									name="mrecover_note" maxlength="50"><?php echo $rcekM['mrecover_note']; ?></textarea>
							</div>
						</div>
						<div class="form-group" id="ranrc" style="display:none;">
							<label for="ranrc" class="col-sm-2 control-label">RECOVERY (RAN)</label>
							<div class="col-sm-1">
								<input name="rrecover_l1" type="text" class="form-control" id="rrecover_l1"
									value="<?php echo $rcekR['rrecover_l1']; ?>" placeholder="LEN1 1" readonly>
								<input name="rrecover_l1" type="text" class="form-control" id="rrecover_l1"
									value="<?php echo $rcekR['rrecover_l1']; ?>" placeholder="LEN30 1" readonly>
								<input name="rrecover_w1" type="text" class="form-control" id="rrecover_w1"
									value="<?php echo $rcekR['rrecover_w1']; ?>" placeholder="WID1 1" readonly>
								<input name="rrecover_w11" type="text" class="form-control" id="rrecover_w11"
									value="<?php echo $rcekR['rrecover_w11']; ?>" placeholder="WID30 1" readonly>
							</div>
							<div class="col-sm-1">
								<input name="rrecover_l2" type="text" class="form-control" id="rrecover_l2"
									value="<?php echo $rcekR['rrecover_l2']; ?>" placeholder="LEN1 2" readonly>
								<input name="rrecover_l21" type="text" class="form-control" id="rrecover_l21"
									value="<?php echo $rcekR['rrecover_l21']; ?>" placeholder="LEN30 2" readonly>
								<input name="rrecover_w2" type="text" class="form-control" id="rrecover_w2"
									value="<?php echo $rcekR['rrecover_w2']; ?>" placeholder="WID1 2" readonly>
								<input name="rrecover_w21" type="text" class="form-control" id="rrecover_w21"
									value="<?php echo $rcekR['rrecover_w21']; ?>" placeholder="WID30 2" readonly>
							</div>
							<div class="col-sm-1">
								<input name="rrecover_l3" type="text" class="form-control" id="rrecover_l3"
									value="<?php echo $rcekR['rrecover_l3']; ?>" placeholder="LEN1 3" readonly>
								<input name="rrecover_l31" type="text" class="form-control" id="rrecover_l31"
									value="<?php echo $rcekR['rrecover_l31']; ?>" placeholder="LEN30 3" readonly>
								<input name="rrecover_w3" type="text" class="form-control" id="rrecover_w3"
									value="<?php echo $rcekR['rrecover_w3']; ?>" placeholder="WID1 3" readonly>
								<input name="rrecover_w31" type="text" class="form-control" id="rrecover_w31"
									value="<?php echo $rcekR['rrecover_w31']; ?>" placeholder="WID30 3" readonly>
							</div>
							<div class="col-sm-1">
								<input name="rrecover_l4" type="text" class="form-control" id="rrecover_l4"
									value="<?php echo $rcekR['rrecover_l4']; ?>" placeholder="LEN1 4" readonly>
								<input name="rrecover_l41" type="text" class="form-control" id="rrecover_l41"
									value="<?php echo $rcekR['rrecover_l41']; ?>" placeholder="LEN30 4" readonly>
								<input name="rrecover_w4" type="text" class="form-control" id="rrecover_w4"
									value="<?php echo $rcekR['rrecover_w4']; ?>" placeholder="WID1 4" readonly>
								<input name="rrecover_w41" type="text" class="form-control" id="rrecover_w41"
									value="<?php echo $rcekR['rrecover_w41']; ?>" placeholder="WID30 4" readonly>
							</div>
							<div class="col-sm-1">
								<input name="rrecover_l5" type="text" class="form-control" id="rrecover_l5"
									value="<?php echo $rcekR['rrecover_l5']; ?>" placeholder="LEN1 5" readonly>
								<input name="rrecover_l51" type="text" class="form-control" id="rrecover_l51"
									value="<?php echo $rcekR['rrecover_l51']; ?>" placeholder="LEN30 5" readonly>
								<input name="rrecover_w5" type="text" class="form-control" id="rrecover_w5"
									value="<?php echo $rcekR['rrecover_w5']; ?>" placeholder="WID1 5" readonly>
								<input name="rrecover_w51" type="text" class="form-control" id="rrecover_w51"
									value="<?php echo $rcekR['rrecover_w51']; ?>" placeholder="WID30 5" readonly>
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
									name="rrecover_note" maxlength="50"
									readonly><?php echo $rcekR['rrecover_note']; ?></textarea>
							</div>
						</div>
						<!-- STRECTH & RECOVERY END-->
						<!-- GROWTH BEGIN-->
						<div class="form-group" id="fc19" style="display:none;">
							<label for="growth" class="col-sm-2 control-label">GROWTH</label>
							<div class="col-sm-2">
								<input name="growth_l1" type="text" class="form-control" id="growth_l1"
									value="<?php echo $rcek1['growth_l1']; ?>" placeholder="LENGTH 1">
								<input name="growth_w1" type="text" class="form-control" id="growth_w1"
									value="<?php echo $rcek1['growth_w1']; ?>" placeholder="WIDTH 1">
							</div>
							<div class="col-sm-2">
								<input name="growth_l2" type="text" class="form-control" id="growth_l2"
									value="<?php echo $rcek1['growth_l2']; ?>" placeholder="LENGTH 2">
								<input name="growth_w2" type="text" class="form-control" id="growth_w2"
									value="<?php echo $rcek1['growth_w2']; ?>" placeholder="WIDTH 2">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
									name="growth_note" maxlength="50"><?php echo $rcek1['growth_note']; ?></textarea>
							</div>
						</div>
						<div class="form-group" id="fc27" style="display:none;">
							<label for="rec_growth" class="col-sm-2 control-label">RECOVERY</label>
							<div class="col-sm-2">
								<input name="rec_growth_l1" type="text" class="form-control" id="rec_growth_l1"
									value="<?php echo $rcek1['rec_growth_l1']; ?>" placeholder="LENGTH 1">
								<input name="rec_growth_w1" type="text" class="form-control" id="rec_growth_w1"
									value="<?php echo $rcek1['rec_growth_w1']; ?>" placeholder="WIDTH 1">
							</div>
							<div class="col-sm-2">
								<input name="rec_growth_l2" type="text" class="form-control" id="rec_growth_l2"
									value="<?php echo $rcek1['rec_growth_l2']; ?>" placeholder="LENGTH 2">
								<input name="rec_growth_w2" type="text" class="form-control" id="rec_growth_w2"
									value="<?php echo $rcek1['rec_growth_w2']; ?>" placeholder="WIDTH 2">
							</div>
						</div>
						<div class="form-group" id="stat_gr" style="display:none;">
							<label for="stat_gr" class="col-sm-2 control-label">STATUS</label>
							<div class="col-sm-2">
								<select name="stat_gr" class="form-control select2" id="stat_gr" onChange="tampil();"
									style="width: 100%;">
									<option <?php if ($rcek1['stat_gr'] == "") { ?> selected=selected <?php }
									; ?>value="">
										Pilih
									</option>
									<option <?php if ($rcek1['stat_gr'] == "DISPOSISI") { ?> selected=selected <?php }
									; ?>value="DISPOSISI">DISPOSISI</option>
									<option <?php if ($rcek1['stat_gr'] == "A") { ?> selected=selected <?php }
									; ?>value="A">A
									</option>
									<option <?php if ($rcek1['stat_gr'] == "R") { ?> selected=selected <?php }
									; ?>value="R">R
									</option>
									<option <?php if ($rcek1['stat_gr'] == "PASS") { ?> selected=selected <?php }
									; ?>value="PASS">
										PASS</option>
									<option <?php if ($rcek1['stat_gr'] == "FAIL") { ?> selected=selected <?php }
									; ?>value="FAIL">
										FAIL</option>
									<option <?php if ($rcek1['stat_gr'] == "RANDOM") { ?> selected=selected <?php }
									; ?>value="RANDOM">RANDOM</option>
								</select>
							</div>
						</div>
						<div class="form-group" id="disgr" style="display:none;">
							<label for="disgr" class="col-sm-2 control-label">GROWTH (DIS)</label>
							<div class="col-sm-2">
								<input name="dgrowth_l1" type="text" class="form-control" id="dgrowth_l1"
									value="<?php echo $rcekD['dgrowth_l1']; ?>" placeholder="LENGTH 1">
								<input name="dgrowth_w1" type="text" class="form-control" id="dgrowth_w1"
									value="<?php echo $rcekD['dgrowth_w1']; ?>" placeholder="WIDTH 1">
							</div>
							<div class="col-sm-2">
								<input name="dgrowth_l2" type="text" class="form-control" id="dgrowth_l2"
									value="<?php echo $rcekD['dgrowth_l2']; ?>" placeholder="LENGTH 2">
								<input name="dgrowth_w2" type="text" class="form-control" id="dgrowth_w2"
									value="<?php echo $rcekD['dgrowth_w2']; ?>" placeholder="WIDTH 2">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
									name="dgrowth_note" maxlength="50"><?php echo $rcekD['dgrowth_note']; ?></textarea>
							</div>
						</div>
						<div class="form-group" id="disgr1" style="display:none;">
							<label for="disgr1" class="col-sm-2 control-label">RECOVERY (DIS)</label>
							<div class="col-sm-2">
								<input name="drec_growth_l1" type="text" class="form-control" id="drec_growth_l1"
									value="<?php echo $rcekD['drec_growth_l1']; ?>" placeholder="LENGTH 1">
								<input name="drec_growth_w1" type="text" class="form-control" id="drec_growth_w1"
									value="<?php echo $rcekD['drec_growth_w1']; ?>" placeholder="WIDTH 1">
							</div>
							<div class="col-sm-2">
								<input name="drec_growth_l2" type="text" class="form-control" id="drec_growth_l2"
									value="<?php echo $rcekD['drec_growth_l2']; ?>" placeholder="LENGTH 2">
								<input name="drec_growth_w2" type="text" class="form-control" id="drec_growth_w2"
									value="<?php echo $rcekD['drec_growth_w2']; ?>" placeholder="WIDTH 2">
							</div>
						</div>
						<div class="form-group" id="rangr" style="display:none;">
							<label for="rangr" class="col-sm-2 control-label">GROWTH (RAN)</label>
							<div class="col-sm-2">
								<input name="rgrowth_l1" type="text" class="form-control" id="rgrowth_l1"
									value="<?php echo $rcekR['rgrowth_l1']; ?>" placeholder="LENGTH 1" readonly>
								<input name="rgrowth_w1" type="text" class="form-control" id="rgrowth_w1"
									value="<?php echo $rcekR['rgrowth_w1']; ?>" placeholder="WIDTH 1" readonly>
							</div>
							<div class="col-sm-2">
								<input name="rgrowth_l2" type="text" class="form-control" id="rgrowth_l2"
									value="<?php echo $rcekR['rgrowth_l2']; ?>" placeholder="LENGTH 2" readonly>
								<input name="rgrowth_w2" type="text" class="form-control" id="rgrowth_w2"
									value="<?php echo $rcekR['rgrowth_w2']; ?>" placeholder="WIDTH 2" readonly>
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
									name="rgrowth_note" maxlength="50"
									readonly><?php echo $rcekR['rgrowth_note']; ?></textarea>
							</div>
						</div>
						<div class="form-group" id="rangr1" style="display:none;">
							<label for="rangr1" class="col-sm-2 control-label">RECOVERY (RAN)</label>
							<div class="col-sm-2">
								<input name="rrec_growth_l1" type="text" class="form-control" id="rrec_growth_l1"
									value="<?php echo $rcekR['rrec_growth_l1']; ?>" placeholder="LENGTH 1" readonly>
								<input name="rrec_growth_w1" type="text" class="form-control" id="rrec_growth_w1"
									value="<?php echo $rcekR['rrec_growth_w1']; ?>" placeholder="WIDTH 1" readonly>
							</div>
							<div class="col-sm-2">
								<input name="rrec_growth_l2" type="text" class="form-control" id="rrec_growth_l2"
									value="<?php echo $rcekR['rrec_growth_l2']; ?>" placeholder="LENGTH 2" readonly>
								<input name="rrec_growth_w2" type="text" class="form-control" id="rrec_growth_w2"
									value="<?php echo $rcekR['rrec_growth_w2']; ?>" placeholder="WIDTH 2" readonly>
							</div>
						</div>
						<!-- GROWTH END-->
						<!-- APPEARANCE BEGIN-->
						<div class="form-group" id="fc20" style="display:none;">
							<label for="apper" class="col-sm-2 control-label">APPEARANCE</label>
							<div class="col-sm-2">
								<input name="apper_pf1" type="text" class="form-control" id="apper_pf1"
									value="<?php echo $rcek1['apper_pf1']; ?>" placeholder="PILLING FACE 1">
								<input name="apper_pb1" type="text" class="form-control" id="apper_pb1"
									value="<?php echo $rcek1['apper_pb1']; ?>" placeholder="PILLING BACK 1">
								<input name="apper_ch1" type="text" class="form-control" id="apper_ch1"
									value="<?php echo $rcek1['apper_ch1']; ?>" placeholder="PASS/FAIL 1">
								<input name="apper_cc1" type="text" class="form-control" id="apper_cc1"
									value="<?php echo $rcek1['apper_cc1']; ?>" placeholder="C.CHANGE 1">
								<input name="apper_st" type="text" class="form-control" id="apper_st"
									value="<?php echo $rcek1['apper_st']; ?>" placeholder="S.STAINING 1">
								<input name="apper_acetate" type="text" class="form-control" id="apper_acetate"
									value="<?php echo $rcek1['apper_acetate']; ?>" placeholder="ACETATE">
								<input name="apper_cotton" type="text" class="form-control" id="apper_cotton"
									value="<?php echo $rcek1['apper_cotton']; ?>" placeholder="COTTON">
								<input name="apper_nylon" type="text" class="form-control" id="apper_nylon"
									value="<?php echo $rcek1['apper_nylon']; ?>" placeholder="NYLON">
								<input name="apper_poly" type="text" class="form-control" id="apper_poly"
									value="<?php echo $rcek1['apper_poly']; ?>" placeholder="POLYESTER">
								<input name="apper_acrylic" type="text" class="form-control" id="apper_acrylic"
									value="<?php echo $rcek1['apper_acrylic']; ?>" placeholder="ACRYLIC">
								<input name="apper_wool" type="text" class="form-control" id="apper_wool"
									value="<?php echo $rcek1['apper_wool']; ?>" placeholder="WOOL">
							</div>
							<div class="col-sm-2">
								<input name="apper_pf2" type="text" class="form-control" id="apper_pf2"
									value="<?php echo $rcek1['apper_pf2']; ?>" placeholder="PILLING FACE 2">
								<input name="apper_pb2" type="text" class="form-control" id="apper_pb2"
									value="<?php echo $rcek1['apper_pb2']; ?>" placeholder="PILLING BACK 2">
								<input name="apper_ch2" type="text" class="form-control" id="apper_ch2"
									value="<?php echo $rcek1['apper_ch2']; ?>" placeholder="PASS/FAIL 2">
								<input name="apper_cc2" type="text" class="form-control" id="apper_cc2"
									value="<?php echo $rcek1['apper_cc2']; ?>" placeholder="C.CHANGE 2">
								<input name="apper_st2" type="text" class="form-control" id="apper_st2"
									value="<?php echo $rcek1['apper_st2']; ?>" placeholder="S.STAINING 2">
							</div>
							<div class="col-sm-2">
								<input name="apper_pf3" type="text" class="form-control" id="apper_pf3"
									value="<?php echo $rcek1['apper_pf3']; ?>" placeholder="PILLING FACE 3">
								<input name="apper_pb3" type="text" class="form-control" id="apper_pb3"
									value="<?php echo $rcek1['apper_pb3']; ?>" placeholder="PILLING BACK 3">
								<input name="apper_ch3" type="text" class="form-control" id="apper_ch3"
									value="<?php echo $rcek1['apper_ch3']; ?>" placeholder="PASS/FAIL 3">
								<input name="apper_cc3" type="text" class="form-control" id="apper_cc3"
									value="<?php echo $rcek1['apper_cc3']; ?>" placeholder="C.CHANGE 3">
								<input name="apper_st3" type="text" class="form-control" id="apper_st3"
									value="<?php echo $rcek1['apper_st3']; ?>" placeholder="S.STAINING 3">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
									name="apper_note" maxlength="50"><?php echo $rcek1['apper_note']; ?></textarea>
							</div>
						</div>
						<div class="form-group" id="stat_ap" style="display:none;">
							<label for="stat_ap" class="col-sm-2 control-label">STATUS</label>
							<div class="col-sm-2">
								<select name="stat_ap" class="form-control select2" id="stat_ap" onChange="tampil();"
									style="width: 100%;">
									<option <?php if ($rcek1['stat_ap'] == "") { ?> selected=selected <?php }
									; ?>value="">
										Pilih
									</option>
									<option <?php if ($rcek1['stat_ap'] == "DISPOSISI") { ?> selected=selected <?php }
									; ?>value="DISPOSISI">DISPOSISI</option>
									<option <?php if ($rcek1['stat_ap'] == "A") { ?> selected=selected <?php }
									; ?>value="A">A
									</option>
									<option <?php if ($rcek1['stat_ap'] == "R") { ?> selected=selected <?php }
									; ?>value="R">R
									</option>
									<option <?php if ($rcek1['stat_ap'] == "PASS") { ?> selected=selected <?php }
									; ?>value="PASS">
										PASS</option>
									<option <?php if ($rcek1['stat_ap'] == "MARGINAL PASS") { ?> selected=selected <?php }
									; ?>value="MARGINAL PASS">MARGINAL PASS</option>
									<option <?php if ($rcek1['stat_ap'] == "DATA") { ?> selected=selected <?php }
									; ?>value="DATA">
										DATA</option>
									<option <?php if ($rcek1['stat_ap'] == "FAIL") { ?> selected=selected <?php }
									; ?>value="FAIL">
										FAIL</option>
									<option <?php if ($rcek1['stat_ap'] == "RANDOM") { ?> selected=selected <?php }
									; ?>value="RANDOM">RANDOM</option>
								</select>
							</div>
						</div>
						<div class="form-group" id="disap" style="display:none;">
							<label for="disap" class="col-sm-2 control-label">APPEARANCE (DIS)</label>
							<div class="col-sm-2">
								<input name="dapper_pf1" type="text" class="form-control" id="dapper_pf1"
									value="<?php echo $rcekD['dapper_pf1']; ?>" placeholder="PILLING FACE 1">
								<input name="dapper_pb1" type="text" class="form-control" id="dapper_pb1"
									value="<?php echo $rcekD['dapper_pb1']; ?>" placeholder="PILLING BACK 1">
								<input name="dapper_ch1" type="text" class="form-control" id="dapper_ch1"
									value="<?php echo $rcekD['dapper_ch1']; ?>" placeholder="PASS/FAIL 1">
								<input name="dapper_cc1" type="text" class="form-control" id="dapper_cc1"
									value="<?php echo $rcekD['dapper_cc1']; ?>" placeholder="C.CHANGE 1">
								<input name="dapper_st" type="text" class="form-control" id="dapper_st"
									value="<?php echo $rcekD['dapper_st']; ?>" placeholder="S.STAINING 1">
								<input name="dapper_acetate" type="text" class="form-control" id="dapper_acetate"
									value="<?php echo $rcekD['dapper_acetate']; ?>" placeholder="ACETATE">
								<input name="dapper_cotton" type="text" class="form-control" id="dapper_cotton"
									value="<?php echo $rcekD['dapper_cotton']; ?>" placeholder="COTTON">
								<input name="dapper_nylon" type="text" class="form-control" id="dapper_nylon"
									value="<?php echo $rcekD['dapper_nylon']; ?>" placeholder="NYLON">
								<input name="dapper_poly" type="text" class="form-control" id="dapper_poly"
									value="<?php echo $rcekD['dapper_poly']; ?>" placeholder="POLYESTER">
								<input name="dapper_acrylic" type="text" class="form-control" id="dapper_acrylic"
									value="<?php echo $rcekD['dapper_acrylic']; ?>" placeholder="ACRYLIC">
								<input name="dapper_wool" type="text" class="form-control" id="dapper_wool"
									value="<?php echo $rcekD['dapper_wool']; ?>" placeholder="WOOL">
							</div>
							<div class="col-sm-2">
								<input name="dapper_pf2" type="text" class="form-control" id="dapper_pf2"
									value="<?php echo $rcekD['dapper_pf2']; ?>" placeholder="PILLING FACE 2">
								<input name="dapper_pb2" type="text" class="form-control" id="dapper_pb2"
									value="<?php echo $rcekD['dapper_pb2']; ?>" placeholder="PILLING BACK 2">
								<input name="dapper_ch2" type="text" class="form-control" id="dapper_ch2"
									value="<?php echo $rcekD['dapper_ch2']; ?>" placeholder="PASS/FAIL 2">
								<input name="dapper_cc2" type="text" class="form-control" id="dapper_cc2"
									value="<?php echo $rcekD['dapper_cc2']; ?>" placeholder="C.CHANGE 2">
								<input name="dapper_st2" type="text" class="form-control" id="dapper_st2"
									value="<?php echo $rcekD['dapper_st2']; ?>" placeholder="S.STAINING 2">
							</div>
							<div class="col-sm-2">
								<input name="dapper_pf3" type="text" class="form-control" id="dapper_pf3"
									value="<?php echo $rcekD['dapper_pf3']; ?>" placeholder="PILLING FACE 3">
								<input name="dapper_pb3" type="text" class="form-control" id="dapper_pb3"
									value="<?php echo $rcekD['dapper_pb3']; ?>" placeholder="PILLING BACK 3">
								<input name="dapper_ch3" type="text" class="form-control" id="dapper_ch3"
									value="<?php echo $rcekD['dapper_ch3']; ?>" placeholder="PASS/FAIL 3">
								<input name="dapper_cc3" type="text" class="form-control" id="dapper_cc3"
									value="<?php echo $rcekD['dapper_cc3']; ?>" placeholder="C.CHANGE 3">
								<input name="dapper_st3" type="text" class="form-control" id="dapper_st3"
									value="<?php echo $rcekD['dapper_st3']; ?>" placeholder="S.STAINING 3">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
									name="dapper_note" maxlength="50"><?php echo $rcekD['dapper_note']; ?></textarea>
							</div>
						</div>
						<div class="form-group" id="marap" style="display:none;">
							<label for="marap" class="col-sm-2 control-label">APPEARANCE (MARGINAL)</label>
							<div class="col-sm-2">
								<input name="mapper_pf1" type="text" class="form-control" id="mapper_pf1"
									value="<?php echo $rcekM['mapper_pf1']; ?>" placeholder="PILLING FACE 1">
								<input name="mapper_pb1" type="text" class="form-control" id="mapper_pb1"
									value="<?php echo $rcekM['mapper_pb1']; ?>" placeholder="PILLING BACK 1">
								<input name="mapper_ch1" type="text" class="form-control" id="mapper_ch1"
									value="<?php echo $rcekM['mapper_ch1']; ?>" placeholder="PASS/FAIL 1">
								<input name="mapper_cc1" type="text" class="form-control" id="mapper_cc1"
									value="<?php echo $rcekM['mapper_cc1']; ?>" placeholder="C.CHANGE 1">
								<input name="mapper_st" type="text" class="form-control" id="mapper_st"
									value="<?php echo $rcekM['mapper_st']; ?>" placeholder="S.STAINING 1">
								<input name="mapper_acetate" type="text" class="form-control" id="mapper_acetate"
									value="<?php echo $rcekM['mapper_acetate']; ?>" placeholder="ACETATE">
								<input name="mapper_cotton" type="text" class="form-control" id="mapper_cotton"
									value="<?php echo $rcekM['mapper_cotton']; ?>" placeholder="COTTON">
								<input name="mapper_nylon" type="text" class="form-control" id="mapper_nylon"
									value="<?php echo $rcekM['mapper_nylon']; ?>" placeholder="NYLON">
								<input name="mapper_poly" type="text" class="form-control" id="mapper_poly"
									value="<?php echo $rcekM['mapper_poly']; ?>" placeholder="POLYESTER">
								<input name="mapper_acrylic" type="text" class="form-control" id="mapper_acrylic"
									value="<?php echo $rcekM['mapper_acrylic']; ?>" placeholder="ACRYLIC">
								<input name="mapper_wool" type="text" class="form-control" id="mapper_wool"
									value="<?php echo $rcekM['mapper_wool']; ?>" placeholder="WOOL">
							</div>
							<div class="col-sm-2">
								<input name="mapper_pf2" type="text" class="form-control" id="mapper_pf2"
									value="<?php echo $rcekM['mapper_pf2']; ?>" placeholder="PILLING FACE 2">
								<input name="mapper_pb2" type="text" class="form-control" id="mapper_pb2"
									value="<?php echo $rcekM['mapper_pb2']; ?>" placeholder="PILLING BACK 2">
								<input name="mapper_ch2" type="text" class="form-control" id="mapper_ch2"
									value="<?php echo $rcekM['mapper_ch2']; ?>" placeholder="PASS/FAIL 2">
								<input name="mapper_cc2" type="text" class="form-control" id="mapper_cc2"
									value="<?php echo $rcekM['mapper_cc2']; ?>" placeholder="C.CHANGE 2">
								<input name="mapper_st2" type="text" class="form-control" id="mapper_st2"
									value="<?php echo $rcekM['mapper_st2']; ?>" placeholder="S.STAINING 2">
							</div>
							<div class="col-sm-2">
								<input name="mapper_pf3" type="text" class="form-control" id="mapper_pf3"
									value="<?php echo $rcekM['mapper_pf3']; ?>" placeholder="PILLING FACE 3">
								<input name="mapper_pb3" type="text" class="form-control" id="mapper_pb3"
									value="<?php echo $rcekM['mapper_pb3']; ?>" placeholder="PILLING BACK 3">
								<input name="mapper_ch3" type="text" class="form-control" id="mapper_ch3"
									value="<?php echo $rcekM['mapper_ch3']; ?>" placeholder="PASS/FAIL 3">
								<input name="mapper_cc3" type="text" class="form-control" id="mapper_cc3"
									value="<?php echo $rcekM['mapper_cc3']; ?>" placeholder="C.CHANGE 3">
								<input name="mapper_st3" type="text" class="form-control" id="mapper_st3"
									value="<?php echo $rcekM['mapper_st3']; ?>" placeholder="S.STAINING 3">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
									name="mapper_note" maxlength="50"><?php echo $rcekM['mapper_note']; ?></textarea>
							</div>
						</div>
						<div class="form-group" id="ranap" style="display:none;">
							<label for="ranap" class="col-sm-2 control-label">APPEARANCE (RAN)</label>
							<div class="col-sm-2">
								<input name="rapper_pf1" type="text" class="form-control" id="rapper_pf1"
									value="<?php echo $rcekR['rapper_pf1']; ?>" placeholder="PILLING FACE 1" readonly>
								<input name="rapper_pb1" type="text" class="form-control" id="rapper_pb1"
									value="<?php echo $rcekR['rapper_pb1']; ?>" placeholder="PILLING BACK 1" readonly>
								<input name="rapper_ch1" type="text" class="form-control" id="rapper_ch1"
									value="<?php echo $rcekR['rapper_ch1']; ?>" placeholder="PASS/FAIL 1" readonly>
								<input name="rapper_cc1" type="text" class="form-control" id="rapper_cc1"
									value="<?php echo $rcekR['rapper_cc1']; ?>" placeholder="C.CHANGE 1" readonly>
								<input name="rapper_st" type="text" class="form-control" id="rapper_st"
									value="<?php echo $rcekR['rapper_st']; ?>" placeholder="S.STAINING 1" readonly>
								<input name="rapper_acetate" type="text" class="form-control" id="rapper_acetate"
									value="<?php echo $rcekR['rapper_acetate']; ?>" placeholder="ACETATE" readonly>
								<input name="rapper_cotton" type="text" class="form-control" id="rapper_cotton"
									value="<?php echo $rcekR['rapper_cotton']; ?>" placeholder="COTTON" readonly>
								<input name="rapper_nylon" type="text" class="form-control" id="rapper_nylon"
									value="<?php echo $rcekR['rapper_nylon']; ?>" placeholder="NYLON" readonly>
								<input name="rapper_poly" type="text" class="form-control" id="rapper_poly"
									value="<?php echo $rcekR['rapper_poly']; ?>" placeholder="POLYESTER" readonly>
								<input name="rapper_acrylic" type="text" class="form-control" id="rapper_acrylic"
									value="<?php echo $rcekR['rapper_acrylic']; ?>" placeholder="ACRYLIC" readonly>
								<input name="rapper_wool" type="text" class="form-control" id="rapper_wool"
									value="<?php echo $rcekR['rapper_wool']; ?>" placeholder="WOOL" readonly>
							</div>
							<div class="col-sm-2">
								<input name="rapper_pf2" type="text" class="form-control" id="rapper_pf2"
									value="<?php echo $rcekR['rapper_pf2']; ?>" placeholder="PILLING FACE 2" readonly>
								<input name="rapper_pb2" type="text" class="form-control" id="rapper_pb2"
									value="<?php echo $rcekR['rapper_pb2']; ?>" placeholder="PILLING BACK 2" readonly>
								<input name="rapper_ch2" type="text" class="form-control" id="rapper_ch2"
									value="<?php echo $rcekR['rapper_ch2']; ?>" placeholder="PASS/FAIL 2" readonly>
								<input name="rapper_cc2" type="text" class="form-control" id="rapper_cc2"
									value="<?php echo $rcekR['rapper_cc2']; ?>" placeholder="C.CHANGE 2" readonly>
								<input name="rapper_st2" type="text" class="form-control" id="rapper_st2"
									value="<?php echo $rcekR['rapper_st2']; ?>" placeholder="S.STAINING 2" readonly>
							</div>
							<div class="col-sm-2">
								<input name="rapper_pf3" type="text" class="form-control" id="rapper_pf3"
									value="<?php echo $rcekR['rapper_pf3']; ?>" placeholder="PILLING FACE 3" readonly>
								<input name="rapper_pb3" type="text" class="form-control" id="rapper_pb3"
									value="<?php echo $rcekR['rapper_pb3']; ?>" placeholder="PILLING BACK 3" readonly>
								<input name="rapper_ch3" type="text" class="form-control" id="rapper_ch3"
									value="<?php echo $rcekR['rapper_ch3']; ?>" placeholder="PASS/FAIL 3" readonly>
								<input name="rapper_cc3" type="text" class="form-control" id="rapper_cc3"
									value="<?php echo $rcekR['rapper_cc3']; ?>" placeholder="C.CHANGE 3" readonly>
								<input name="rapper_st3" type="text" class="form-control" id="rapper_st3"
									value="<?php echo $rcekR['rapper_st3']; ?>" placeholder="S.STAINING 3" readonly>
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
									name="rapper_note" maxlength="50"
									readonly><?php echo $rcekR['rapper_note']; ?></textarea>
							</div>
						</div>
						<!-- APPEARANCE END-->
						<!-- HEAT SHRINKAGE BEGIN-->
						<div class="form-group" id="fc21" style="display:none;">
							<label for="h_shrinkage" class="col-sm-2 control-label">HEAT SHRINKAGE</label>
							<div class="col-sm-1">
								<label><input type="checkbox" name="h_shrinkage_temp" id="h_shrinkage_temp" class="minimal"
										value="170" <?php if ($rcek1['h_shrinkage_temp'] == '170') {
											echo "checked";
										} ?>>
									170&deg;C &nbsp; &nbsp; &nbsp; &nbsp;
								</label>
								<label><input type="checkbox" name="h_shrinkage_temp" id="h_shrinkage_temp" class="minimal"
										value="180" <?php if ($rcek1['h_shrinkage_temp'] == '180') {
											echo "checked";
										} ?>>
									180&deg;C
								</label>
								<label><input type="checkbox" name="h_shrinkage_temp" id="h_shrinkage_temp" class="minimal"
										value="200" <?php if ($rcek1['h_shrinkage_temp'] == '200') {
											echo "checked";
										} ?>>
									200&deg;C
								</label>
							</div>
							<div class="col-sm-1">
								<input name="h_shrinkage_l1" type="text" class="form-control" id="h_shrinkage_l1"
									value="<?php echo $rcek1['h_shrinkage_l1']; ?>" placeholder="LEN 1">
								<input name="h_shrinkage_w1" type="text" class="form-control" id="h_shrinkage_w1"
									value="<?php echo $rcek1['h_shrinkage_w1']; ?>" placeholder="WID 1">
							</div>
							<div class="col-sm-1">
								<input name="h_shrinkage_grd" type="text" class="form-control" id="h_shrinkage_grd"
									value="<?php echo $rcek1['h_shrinkage_grd']; ?>" placeholder="GRADE">
							</div>
							<div class="col-sm-2">
								<input name="h_shrinkage_app" type="text" class="form-control" id="h_shrinkage_app"
									value="<?php echo $rcek1['h_shrinkage_app']; ?>" placeholder="PASS/FAIL">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
									name="h_shrinkage_note"
									maxlength="50"><?php echo $rcek1['h_shrinkage_note']; ?></textarea>
							</div>
						</div>
						<div class="form-group" id="stat_hs" style="display:none;">
							<label for="stat_hs" class="col-sm-2 control-label">STATUS</label>
							<div class="col-sm-2">
								<select name="stat_hs" class="form-control select2" id="stat_hs" onChange="tampil();"
									style="width: 100%;">
									<option <?php if ($rcek1['stat_hs'] == "") { ?> selected=selected <?php }
									; ?>value="">
										Pilih
									</option>
									<option <?php if ($rcek1['stat_hs'] == "DISPOSISI") { ?> selected=selected <?php }
									; ?>value="DISPOSISI">DISPOSISI</option>
									<option <?php if ($rcek1['stat_hs'] == "A") { ?> selected=selected <?php }
									; ?>value="A">A
									</option>
									<option <?php if ($rcek1['stat_hs'] == "R") { ?> selected=selected <?php }
									; ?>value="R">R
									</option>
									<option <?php if ($rcek1['stat_hs'] == "PASS") { ?> selected=selected <?php }
									; ?>value="PASS">
										PASS</option>
									<option <?php if ($rcek1['stat_hs'] == "FAIL") { ?> selected=selected <?php }
									; ?>value="FAIL">
										FAIL</option>
									<option <?php if ($rcek1['stat_hs'] == "RANDOM") { ?> selected=selected <?php }
									; ?>value="RANDOM">RANDOM</option>
								</select>
							</div>
						</div>
						<div class="form-group" id="dishs" style="display:none;">
							<label for="dishs" class="col-sm-2 control-label">HEAT SHRINKAGE (DIS)</label>
							<div class="col-sm-1">
								<label><input type="checkbox" name="dh_shrinkage_temp" id="dh_shrinkage_temp"
										class="minimal" value="170" <?php if ($rcekD['dh_shrinkage_temp'] == '170') {
											echo "checked";
										} ?>> 170&deg;C &nbsp; &nbsp; &nbsp; &nbsp;
								</label>
								<label><input type="checkbox" name="dh_shrinkage_temp" id="dh_shrinkage_temp"
										class="minimal" value="180" <?php if ($rcekD['dh_shrinkage_temp'] == '180') {
											echo "checked";
										} ?>> 180&deg;C
								</label>
								<label><input type="checkbox" name="dh_shrinkage_temp" id="dh_shrinkage_temp"
										class="minimal" value="200" <?php if ($rcekD['dh_shrinkage_temp'] == '200') {
											echo "checked";
										} ?>> 200&deg;C
								</label>
							</div>
							<div class="col-sm-1">
								<input name="dh_shrinkage_l1" type="text" class="form-control" id="dh_shrinkage_l1"
									value="<?php echo $rcekD['dh_shrinkage_l1']; ?>" placeholder="LEN 1">
								<input name="dh_shrinkage_w1" type="text" class="form-control" id="dh_shrinkage_w1"
									value="<?php echo $rcekD['dh_shrinkage_w1']; ?>" placeholder="WID 1">
							</div>
							<div class="col-sm-1">
								<input name="dh_shrinkage_grd" type="text" class="form-control" id="dh_shrinkage_grd"
									value="<?php echo $rcekD['dh_shrinkage_grd']; ?>" placeholder="GRADE">
							</div>
							<div class="col-sm-2">
								<input name="dh_shrinkage_app" type="text" class="form-control" id="dh_shrinkage_app"
									value="<?php echo $rcekD['dh_shrinkage_app']; ?>" placeholder="PASS/FAIL">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
									name="dh_shrinkage_note"
									maxlength="50"><?php echo $rcekD['dh_shrinkage_note']; ?></textarea>
							</div>
						</div>
						<div class="form-group" id="ranhs" style="display:none;">
							<label for="ranhs" class="col-sm-2 control-label">HEAT SHRINKAGE (RAN)</label>
							<div class="col-sm-1">
								<label><input type="checkbox" name="rh_shrinkage_temp" id="rh_shrinkage_temp"
										class="minimal" value="170" <?php if ($rcekR['rh_shrinkage_temp'] == '170') {
											echo "checked";
										} ?>> 170&deg;C &nbsp; &nbsp; &nbsp; &nbsp;
								</label>
								<label><input type="checkbox" name="rh_shrinkage_temp" id="rh_shrinkage_temp"
										class="minimal" value="180" <?php if ($rcekR['rh_shrinkage_temp'] == '180') {
											echo "checked";
										} ?>> 180&deg;C
								</label>
								<label><input type="checkbox" name="rh_shrinkage_temp" id="rh_shrinkage_temp"
										class="minimal" value="200" <?php if ($rcekR['rh_shrinkage_temp'] == '200') {
											echo "checked";
										} ?>> 200&deg;C
								</label>
							</div>
							<div class="col-sm-1">
								<input name="rh_shrinkage_l1" type="text" class="form-control" id="rh_shrinkage_l1"
									value="<?php echo $rcekR['rh_shrinkage_l1']; ?>" placeholder="LEN 1" readonly>
								<input name="rh_shrinkage_w1" type="text" class="form-control" id="rh_shrinkage_w1"
									value="<?php echo $rcekR['rh_shrinkage_w1']; ?>" placeholder="WID 1" readonly>
							</div>
							<div class="col-sm-1">
								<input name="rh_shrinkage_grd" type="text" class="form-control" id="rh_shrinkage_grd"
									value="<?php echo $rcekR['rh_shrinkage_grd']; ?>" placeholder="GRADE" readonly>
							</div>
							<div class="col-sm-2">
								<input name="rh_shrinkage_app" type="text" class="form-control" id="rh_shrinkage_app"
									value="<?php echo $rcek1['rh_shrinkage_app']; ?>" placeholder="PASS/FAIL" readonly>
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
									name="rh_shrinkage_note" maxlength="50"
									readonly><?php echo $rcekR['rh_shrinkage_note']; ?></textarea>
							</div>
						</div>
						<!-- HEAT SHRINKAGE END-->
						<!-- FIBRE/FUZZ BEGIN-->
						<div class="form-group" id="fc22" style="display:none;">
							<label for="fibre" class="col-sm-2 control-label">FIBRE/FUZZ</label>
							<div class="col-sm-2">
								<input name="fibre_transfer" type="text" class="form-control" id="fibre_transfer"
									value="<?php echo $rcek1['fibre_transfer']; ?>" placeholder="FIBRE TRANSFER">
							</div>
							<div class="col-sm-1">
								<input name="fibre_grade" type="text" class="form-control" id="fibre_grade"
									value="<?php echo $rcek1['fibre_grade']; ?>" placeholder="GRADE">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
									name="fibre_note" maxlength="50"><?php echo $rcek1['fibre_note']; ?></textarea>
							</div>
						</div>
						<div class="form-group" id="stat_ff" style="display:none;">
							<label for="stat_ff" class="col-sm-2 control-label">STATUS</label>
							<div class="col-sm-2">
								<select name="stat_ff" class="form-control select2" id="stat_ff" onChange="tampil();"
									style="width: 100%;">
									<option <?php if ($rcek1['stat_ff'] == "") { ?> selected=selected <?php }
									; ?>value="">
										Pilih
									</option>
									<option <?php if ($rcek1['stat_ff'] == "DISPOSISI") { ?> selected=selected <?php }
									; ?>value="DISPOSISI">DISPOSISI</option>
									<option <?php if ($rcek1['stat_ff'] == "A") { ?> selected=selected <?php }
									; ?>value="A">A
									</option>
									<option <?php if ($rcek1['stat_ff'] == "R") { ?> selected=selected <?php }
									; ?>value="R">R
									</option>
									<option <?php if ($rcek1['stat_ff'] == "PASS") { ?> selected=selected <?php }
									; ?>value="PASS">
										PASS</option>
									<option <?php if ($rcek1['stat_ff'] == "FAIL") { ?> selected=selected <?php }
									; ?>value="FAIL">
										FAIL</option>
									<option <?php if ($rcek1['stat_ff'] == "RANDOM") { ?> selected=selected <?php }
									; ?>value="RANDOM">RANDOM</option>
								</select>
							</div>
						</div>
						<div class="form-group" id="disff" style="display:none;">
							<label for="disff" class="col-sm-2 control-label">FIBRE/FUZZ (DIS)</label>
							<div class="col-sm-2">
								<input name="dfibre_transfer" type="text" class="form-control" id="dfibre_transfer"
									value="<?php echo $rcekD['dfibre_transfer']; ?>" placeholder="FIBRE TRANSFER">
							</div>
							<div class="col-sm-1">
								<input name="dfibre_grade" type="text" class="form-control" id="dfibre_grade"
									value="<?php echo $rcekD['dfibre_grade']; ?>" placeholder="GRADE">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
									name="dfibre_note" maxlength="50"><?php echo $rcekD['dfibre_note']; ?></textarea>
							</div>
						</div>
						<div class="form-group" id="ranff" style="display:none;">
							<label for="ranff" class="col-sm-2 control-label">FIBRE/FUZZ (RAN)</label>
							<div class="col-sm-2">
								<input name="rfibre_transfer" type="text" class="form-control" id="rfibre_transfer"
									value="<?php echo $rcekR['rfibre_transfer']; ?>" placeholder="FIBRE TRANSFER" readonly>
							</div>
							<div class="col-sm-1">
								<input name="rfibre_grade" type="text" class="form-control" id="rfibre_grade"
									value="<?php echo $rcekR['rfibre_grade']; ?>" placeholder="GRADE" readonly>
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
									name="rfibre_note" maxlength="50"
									readonly><?php echo $rcekR['rfibre_note']; ?></textarea>
							</div>
						</div>
						<!-- FIBRE/FUZZ END-->
						<!-- ODOUR BEGIN -->
						<div class="form-group" id="fc28" style="display:none;">
							<label for="odour" class="col-sm-2 control-label">ODOUR</label>
							<div class="col-sm-2">
								<input name="odour" type="text" class="form-control" id="odour"
									value="<?php echo $rcek1['odour']; ?>" placeholder="ODOUR">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
									name="odour_note" maxlength="50"><?php echo $rcek1['odour_note']; ?></textarea>
							</div>
						</div>
						<div class="form-group" id="stat_odour" style="display:none;">
							<label for="stat_odour" class="col-sm-2 control-label">STATUS</label>
							<div class="col-sm-2">
								<select name="stat_odour" class="form-control select2" id="stat_odour" onChange="tampil();"
									style="width: 100%;">
									<option <?php if ($rcek1['stat_odour'] == "") { ?> selected=selected <?php }
									; ?>value="">
										Pilih
									</option>
									<option <?php if ($rcek1['stat_odour'] == "DISPOSISI") { ?> selected=selected <?php }
									; ?>value="DISPOSISI">DISPOSISI</option>
									<option <?php if ($rcek1['stat_odour'] == "A") { ?> selected=selected <?php }
									; ?>value="A">A
									</option>
									<option <?php if ($rcek1['stat_odour'] == "R") { ?> selected=selected <?php }
									; ?>value="R">R
									</option>
									<option <?php if ($rcek1['stat_odour'] == "PASS") { ?> selected=selected <?php }
									; ?>value="PASS">PASS</option>
									<option <?php if ($rcek1['stat_odour'] == "FAIL") { ?> selected=selected <?php }
									; ?>value="FAIL">FAIL</option>
									<option <?php if ($rcek1['stat_odour'] == "RANDOM") { ?> selected=selected <?php }
									; ?>value="RANDOM">RANDOM</option>
								</select>
							</div>
						</div>
						<div class="form-group" id="disod" style="display:none;">
							<label for="disod" class="col-sm-2 control-label">ODOUR (DIS)</label>
							<div class="col-sm-2">
								<input name="dodour" type="text" class="form-control" id="dodour"
									value="<?php echo $rcekD['dodour']; ?>" placeholder="ODOUR">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
									name="dodour_note" maxlength="50"><?php echo $rcekD['dodour_note']; ?></textarea>
							</div>
						</div>
						<div class="form-group" id="ranod" style="display:none;">
							<label for="ranod" class="col-sm-2 control-label">ODOUR (RAN)</label>
							<div class="col-sm-2">
								<input name="rodour" type="text" class="form-control" id="rodour"
									value="<?php echo $rcekR['rodour']; ?>" placeholder="ODOUR" readonly>
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
									name="rodour_note" maxlength="50"
									readonly><?php echo $rcekR['rodour_note']; ?></textarea>
							</div>
						</div>
						<!-- ODOUR END-->
						<!-- CURLING BEGIN -->
						<div class="form-group" id="fc29" style="display:none;">
							<label for="curling" class="col-sm-2 control-label">CURLING</label>
							<div class="col-sm-2">
								<input name="curling" type="text" class="form-control" id="curling"
									value="<?php echo $rcek1['curling']; ?>" placeholder="CURLING">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
									name="curling_note" maxlength="50"><?php echo $rcek1['curling_note']; ?></textarea>
							</div>
						</div>
						<div class="form-group" id="stat_curling" style="display:none;">
							<label for="stat_curling" class="col-sm-2 control-label">STATUS</label>
							<div class="col-sm-2">
								<select name="stat_curling" class="form-control select2" id="stat_curling"
									onChange="tampil();" style="width: 100%;">
									<option <?php if ($rcek1['stat_curling'] == "") { ?> selected=selected <?php }
									; ?>value="">
										Pilih</option>
									<option <?php if ($rcek1['stat_curling'] == "DISPOSISI") { ?> selected=selected <?php }
									; ?>value="DISPOSISI">DISPOSISI</option>
									<option <?php if ($rcek1['stat_curling'] == "A") { ?> selected=selected <?php }
									; ?>value="A">A
									</option>
									<option <?php if ($rcek1['stat_curling'] == "R") { ?> selected=selected <?php }
									; ?>value="R">R
									</option>
									<option <?php if ($rcek1['stat_curling'] == "PASS") { ?> selected=selected <?php }
									; ?>value="PASS">PASS</option>
									<option <?php if ($rcek1['stat_curling'] == "FAIL") { ?> selected=selected <?php }
									; ?>value="FAIL">FAIL</option>
									<option <?php if ($rcek1['stat_curling'] == "RANDOM") { ?> selected=selected <?php }
									; ?>value="RANDOM">RANDOM</option>
								</select>
							</div>
						</div>
						<div class="form-group" id="discur" style="display:none;">
							<label for="discur" class="col-sm-2 control-label">CURLING (DIS)</label>
							<div class="col-sm-2">
								<input name="dcurling" type="text" class="form-control" id="dcurling"
									value="<?php echo $rcekD['dcurling']; ?>" placeholder="CURLING">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
									name="dcurling_note" maxlength="50"><?php echo $rcekD['dcurling_note']; ?></textarea>
							</div>
						</div>
						<div class="form-group" id="rancur" style="display:none;">
							<label for="rancur" class="col-sm-2 control-label">CURLING (RAN)</label>
							<div class="col-sm-2">
								<input name="rcurling" type="text" class="form-control" id="rcurling"
									value="<?php echo $rcekR['rcurling']; ?>" placeholder="CURLING" readonly>
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
									name="rcurling_note" maxlength="50"
									readonly><?php echo $rcekR['rcurling_note']; ?></textarea>
							</div>
						</div>
						<!-- CURLING END-->
						<!-- NEDLE BEGIN -->
						<div class="form-group" id="fc30" style="display:none;">
							<label for="nedle" class="col-sm-2 control-label">NEDLE HOLES &amp; CRACKING</label>
							<div class="col-sm-2">
								<input name="nedle" type="text" class="form-control" id="nedle"
									value="<?php echo $rcek1['nedle']; ?>" placeholder="NEDLE">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
									name="nedle_note" maxlength="50"><?php echo $rcek1['nedle_note']; ?></textarea>
							</div>
						</div>
						<div class="form-group" id="stat_nedle" style="display:none;">
							<label for="stat_nedle" class="col-sm-2 control-label">STATUS</label>
							<div class="col-sm-2">
								<select name="stat_nedle" class="form-control select2" id="stat_nedle" onChange="tampil();"
									style="width: 100%;">
									<option <?php if ($rcek1['stat_nedle'] == "") { ?> selected=selected <?php }
									; ?>value="">
										Pilih
									</option>
									<option <?php if ($rcek1['stat_nedle'] == "DISPOSISI") { ?> selected=selected <?php }
									; ?>value="DISPOSISI">DISPOSISI</option>
									<option <?php if ($rcek1['stat_nedle'] == "A") { ?> selected=selected <?php }
									; ?>value="A">A
									</option>
									<option <?php if ($rcek1['stat_nedle'] == "R") { ?> selected=selected <?php }
									; ?>value="R">R
									</option>
									<option <?php if ($rcek1['stat_nedle'] == "PASS") { ?> selected=selected <?php }
									; ?>value="PASS">PASS</option>
									<option <?php if ($rcek1['stat_nedle'] == "FAIL") { ?> selected=selected <?php }
									; ?>value="FAIL">FAIL</option>
									<option <?php if ($rcek1['stat_nedle'] == "RANDOM") { ?> selected=selected <?php }
									; ?>value="RANDOM">RANDOM</option>
								</select>
							</div>
						</div>
						<div class="form-group" id="disned" style="display:none;">
							<label for="disned" class="col-sm-2 control-label">NEDLE HOLES &amp; CRACKING (DIS)</label>
							<div class="col-sm-2">
								<input name="dnedle" type="text" class="form-control" id="dnedle"
									value="<?php echo $rcekD['dnedle']; ?>" placeholder="NEDLE">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
									name="dnedle_note" maxlength="50"><?php echo $rcekD['dnedle_note']; ?></textarea>
							</div>
						</div>
						<div class="form-group" id="ranned" style="display:none;">
							<label for="ranned" class="col-sm-2 control-label">NEDLE HOLES &amp; CRACKING (RAN)</label>
							<div class="col-sm-2">
								<input name="rnedle" type="text" class="form-control" id="rnedle"
									value="<?php echo $rcekR['rnedle']; ?>" placeholder="NEDLE" readonly>
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
									name="rnedle_note" maxlength="50"
									readonly><?php echo $rcekR['rnedle_note']; ?></textarea>
							</div>
						</div>
						<!-- NEDLE END-->
						<!-- WRINKLE BEGIN -->
						<div class="form-group" id="fc31" style="display:none;">
							<label for="wrinkle" class="col-sm-2 control-label">WRINKLE ORIGINAL</label>
							<div class="col-sm-2">
								<input name="wrinkle" type="text" class="form-control" id="wrinkle"
									value="<?php echo $tq_test_2_array['wrinkle']; ?>" placeholder="Before Wash">
							</div>
							<div class="col-sm-2">
								<select name="stat_wrinkle" class="form-control select2" id="stat_wrinkle"
									onChange="tampil();" style="width: 100%;">
									<option <?php if ($tq_test_2_array['stat_wrinkle'] == "") { ?> selected=selected <?php }
									; ?>value="">Pilih</option>
									<!-- <option <?php //if($tq_test_2_array['stat_wrinkle']=="DISPOSISI"){       ?> selected=selected <?php //};       ?>value="DISPOSISI">DISPOSISI</option> -->
									<option <?php if ($tq_test_2_array['stat_wrinkle'] == "A") { ?> selected=selected <?php }
									; ?>value="A">A</option>
									<option <?php if ($tq_test_2_array['stat_wrinkle'] == "R") { ?> selected=selected <?php }
									; ?>value="R">R</option>
									<option <?php if ($tq_test_2_array['stat_wrinkle'] == "PASS") { ?> selected=selected <?php }
									; ?>value="PASS">PASS</option>
									<option <?php if ($tq_test_2_array['stat_wrinkle'] == "FAIL") { ?> selected=selected <?php }
									; ?>value="FAIL">FAIL</option>
									<!-- <option <?php //if($tq_test_2_array['stat_wrinkle']=="RANDOM"){       ?> selected=selected <?php //};       ?>value="RANDOM">RANDOM</option> -->
								</select>
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
									name="wrinkle_note" maxlength="50"
									rows="1"><?php echo $tq_test_2_array['wrinkle_note']; ?></textarea>
							</div>
						</div>

						<div class="form-group" id="fc32" style="display:none;">
							<label for="waterr" class="col-sm-2 control-label">WRINKLE AFTERWASH</label>
							<div class="col-sm-2">
								<input name="wrinkle1" type="text" class="form-control" id="wrinkle1"
									value="<?php echo $tq_test_2_array['wrinkle1']; ?>" placeholder="After Wash">
							</div>
							<div class="col-sm-2">
								<input name="wrinkle2" type="text" class="form-control" id="wrinkle2"
									value="<?php echo $tq_test_2_array['wrinkle2']; ?>" placeholder="After Wash">
							</div>
							<div class="col-sm-2">
								<select name="stat_wrinkle1" class="form-control select2" id="stat_wrinkle1"
									onChange="tampil();" style="width: 100%;">
									<option <?php if ($tq_test_2_array['stat_wrinkle1'] == "") { ?> selected=selected <?php }
									; ?>value="">Pilih</option>
									<!-- <option <?php //if($tq_test_2_array['stat_wrinkle1']=="DISPOSISI"){       ?> selected=selected <?php //};       ?>value="DISPOSISI">DISPOSISI</option> -->
									<option <?php if ($tq_test_2_array['stat_wrinkle1'] == "A") { ?> selected=selected <?php }
									; ?>value="A">A</option>
									<option <?php if ($tq_test_2_array['stat_wrinkle1'] == "R") { ?> selected=selected <?php }
									; ?>value="R">R</option>
									<option <?php if ($tq_test_2_array['stat_wrinkle1'] == "PASS") { ?> selected=selected
										<?php }
									; ?>value="PASS">PASS</option>
									<option <?php if ($tq_test_2_array['stat_wrinkle1'] == "FAIL") { ?> selected=selected
										<?php }
									; ?>value="FAIL">FAIL</option>
									<!-- <option <?php //if($tq_test_2_array['stat_wrinkle1']=="RANDOM"){       ?> selected=selected <?php //};       ?>value="RANDOM">RANDOM</option> -->
								</select>
							</div>
						</div>

						<!-- WRINKLE END -->
						<div class="form-group">
							<?php if ($notes != "") { ?>
								<button type="submit" class="btn btn-primary pull-right" name="physical_save" value="save"><i
										class="fa fa-save"></i> Simpan</button>
							<?php } ?>
						</div>
						</form>
					</div>
					<div class="tab-pane" id="tab_2">
						<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form2"
							id="form2">
							<div class="form-group">
								<label for="jns_test2" class="col-sm-2 control-label">JENIS TES</label>
								<div class="col-sm-3">
									<select name="jns_test2" class="form-control select2" id="jns_test2"
										onChange="tampil2();" style="width: 100%;">
										<option value="">Pilih</option>
										<?php
										$sql = "SELECT a.*, b.* From tbl_tq_nokk a INNER JOIN tbl_master_test b ON a.no_test=b.no_testmaster WHERE no_test='$rcek[no_test]'";
										$result = mysqli_query($con, $sql);
										while ($row = mysqli_fetch_array($result)) {
											$detail = explode(",", $row['colorfastness']); ?>
											<?php foreach ($detail as $key => $value):
												echo '<option value="' . $value . '">' . $value . '</option>';
											endforeach;
											?>
										<?php } ?>
									</select>
								</div>
							</div>
							<!-- WASHING BEGIN-->
							<div class="form-group" id="c1" style="display:none;">
								<label for="washing" class="col-sm-2 control-label">WASHING FASTNESS</label>
								<div class="col-sm-1">
									<label><input type="checkbox" name="wash_temp" id="wash_temp" class="minimal" value="30"
											<?php if ($rcek1['wash_temp'] == '30') {
												echo "checked";
											} ?>> 30&deg;C &nbsp;
										&nbsp;
										&nbsp; &nbsp;
									</label>
									<label><input type="checkbox" name="wash_temp" id="wash_temp" class="minimal" value="40"
											<?php if ($rcek1['wash_temp'] == '40') {
												echo "checked";
											} ?>> 40&deg;C
									</label>
									<label><input type="checkbox" name="wash_temp" id="wash_temp" class="minimal" value="60"
											<?php if ($rcek1['wash_temp'] == '60') {
												echo "checked";
											} ?>> 60&deg;C
									</label>
								</div>
								<div class="col-sm-2">
									<input name="wash_colorchange" type="text" class="form-control" id="wash_colorchange"
										value="<?php echo $rcek1['wash_colorchange']; ?>" placeholder="4-5 Color Change">
									<input name="wash_acetate" type="text" class="form-control" id="wash_acetate"
										value="<?php echo $rcek1['wash_acetate']; ?>" placeholder="4 Acetate">
								</div>
								<div class="col-sm-2">
									<input name="wash_cotton" type="text" class="form-control" id="wash_cotton"
										value="<?php echo $rcek1['wash_cotton']; ?>" placeholder="4 Cotton">
									<input name="wash_nylon" type="text" class="form-control" id="wash_nylon"
										value="<?php echo $rcek1['wash_nylon']; ?>" placeholder="4 Nylon">
								</div>
								<div class="col-sm-2">
									<input name="wash_poly" type="text" class="form-control" id="wash_poly"
										value="<?php echo $rcek1['wash_poly']; ?>" placeholder="4 Polyester">
									<input name="wash_acrylic" type="text" class="form-control" id="wash_acrylic"
										value="<?php echo $rcek1['wash_acrylic']; ?>" placeholder="4 Acrylic">
								</div>
								<div class="col-sm-2">
									<input name="wash_wool" type="text" class="form-control" id="wash_wool"
										value="<?php echo $rcek1['wash_wool']; ?>" placeholder="4 Wool">
									<input name="wash_staining" type="text" class="form-control" id="wash_staining"
										value="<?php echo $rcek1['wash_staining']; ?>" placeholder="4-5 Cross Staining">
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="wash_note" maxlength="50"
										rows="1"><?php echo $rcek1['wash_note']; ?></textarea>
								</div>
							</div>
							<div class="form-group" id="stat_wf" style="display:none;">
								<label for="stat_wf" class="col-sm-2 control-label">STATUS</label>
								<div class="col-sm-2">
									<select name="stat_wf" class="form-control select2" id="stat_wf" onChange="tampil2();"
										style="width: 100%;">
										<option <?php if ($rcek1['stat_wf'] == "") { ?> selected=selected <?php }
										; ?>value="">
											Pilih</option>
										<option <?php if ($rcek1['stat_wf'] == "DISPOSISI") { ?> selected=selected <?php }
										; ?>value="DISPOSISI">DISPOSISI</option>
										<option <?php if ($rcek1['stat_wf'] == "A") { ?> selected=selected <?php }
										; ?>value="A">A
										</option>
										<option <?php if ($rcek1['stat_wf'] == "R") { ?> selected=selected <?php }
										; ?>value="R">R
										</option>
										<option <?php if ($rcek1['stat_wf'] == "PASS") { ?> selected=selected <?php }
										; ?>value="PASS">PASS</option>
										<option <?php if ($rcek1['stat_wf'] == "MARGINAL PASS") { ?> selected=selected <?php }
										; ?>value="MARGINAL PASS">MARGINAL PASS</option>
										<option <?php if ($rcek1['stat_wf'] == "DATA") { ?> selected=selected <?php }
										; ?>value="DATA">DATA</option>
										<option <?php if ($rcek1['stat_wf'] == "FAIL") { ?> selected=selected <?php }
										; ?>value="FAIL">FAIL</option>
										<option <?php if ($rcek1['stat_wf'] == "RANDOM") { ?> selected=selected <?php }
										; ?>value="RANDOM">RANDOM</option>
									</select>
								</div>
							</div>
							<div class="form-group" id="diswf" style="display:none;">
								<label for="diswf" class="col-sm-2 control-label">WASHING FASTNESS (DIS)</label>
								<div class="col-sm-1">
									<label><input type="checkbox" name="dwash_temp" id="dwash_temp" class="minimal"
											value="30" <?php if ($rcekD['dwash_temp'] == '30') {
												echo "checked";
											} ?>>
										30&deg;C
										&nbsp; &nbsp; &nbsp; &nbsp;
									</label>
									<label><input type="checkbox" name="dwash_temp" id="dwash_temp" class="minimal"
											value="40" <?php if ($rcekD['dwash_temp'] == '40') {
												echo "checked";
											} ?>>
										40&deg;C
									</label>
								</div>
								<div class="col-sm-2">
									<input name="dwash_colorchange" type="text" class="form-control" id="dwash_colorchange"
										value="<?php echo $rcekD['dwash_colorchange']; ?>" placeholder="4-5 Color Change">
									<input name="dwash_acetate" type="text" class="form-control" id="dwash_acetate"
										value="<?php echo $rcekD['dwash_acetate']; ?>" placeholder="4 Acetate">
								</div>
								<div class="col-sm-2">
									<input name="dwash_cotton" type="text" class="form-control" id="dwash_cotton"
										value="<?php echo $rcekD['dwash_cotton']; ?>" placeholder="4 Cotton">
									<input name="dwash_nylon" type="text" class="form-control" id="dwash_nylon"
										value="<?php echo $rcekD['dwash_nylon']; ?>" placeholder="4 Nylon">
								</div>
								<div class="col-sm-2">
									<input name="dwash_poly" type="text" class="form-control" id="dwash_poly"
										value="<?php echo $rcekD['dwash_poly']; ?>" placeholder="4 Polyester">
									<input name="dwash_acrylic" type="text" class="form-control" id="dwash_acrylic"
										value="<?php echo $rcekD['dwash_acrylic']; ?>" placeholder="4 Acrylic">
								</div>
								<div class="col-sm-2">
									<input name="dwash_wool" type="text" class="form-control" id="dwash_wool"
										value="<?php echo $rcekD['dwash_wool']; ?>" placeholder="4 Wool">
									<input name="dwash_staining" type="text" class="form-control" id="dwash_staining"
										value="<?php echo $rcekD['dwash_staining']; ?>" placeholder="4-5 Cross Staining">
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="dwash_note" maxlength="50"
										rows="1"><?php echo $rcekD['dwash_note']; ?></textarea>
								</div>
							</div>
							<div class="form-group" id="marwf" style="display:none;">
								<label for="marwf" class="col-sm-2 control-label">WASHING FASTNESS (MARGINAL)</label>
								<div class="col-sm-1">
									<label><input type="checkbox" name="mwash_temp" id="mwash_temp" class="minimal"
											value="30" <?php if ($rcekM['mwash_temp'] == '30') {
												echo "checked";
											} ?>>
										30&deg;C
										&nbsp; &nbsp; &nbsp; &nbsp;
									</label>
									<label><input type="checkbox" name="mwash_temp" id="mwash_temp" class="minimal"
											value="40" <?php if ($rcekM['mwash_temp'] == '40') {
												echo "checked";
											} ?>>
										40&deg;C
									</label>
								</div>
								<div class="col-sm-2">
									<input name="mwash_colorchange" type="text" class="form-control" id="mwash_colorchange"
										value="<?php echo $rcekM['mwash_colorchange']; ?>" placeholder="4-5 Color Change">
									<input name="mwash_acetate" type="text" class="form-control" id="mwash_acetate"
										value="<?php echo $rcekM['mwash_acetate']; ?>" placeholder="4 Acetate">
								</div>
								<div class="col-sm-2">
									<input name="mwash_cotton" type="text" class="form-control" id="mwash_cotton"
										value="<?php echo $rcekM['mwash_cotton']; ?>" placeholder="4 Cotton">
									<input name="mwash_nylon" type="text" class="form-control" id="mwash_nylon"
										value="<?php echo $rcekM['mwash_nylon']; ?>" placeholder="4 Nylon">
								</div>
								<div class="col-sm-2">
									<input name="mwash_poly" type="text" class="form-control" id="mwash_poly"
										value="<?php echo $rcekM['mwash_poly']; ?>" placeholder="4 Polyester">
									<input name="mwash_acrylic" type="text" class="form-control" id="mwash_acrylic"
										value="<?php echo $rcekM['mwash_acrylic']; ?>" placeholder="4 Acrylic">
								</div>
								<div class="col-sm-2">
									<input name="mwash_wool" type="text" class="form-control" id="mwash_wool"
										value="<?php echo $rcekM['mwash_wool']; ?>" placeholder="4 Wool">
									<input name="mwash_staining" type="text" class="form-control" id="mwash_staining"
										value="<?php echo $rcekM['mwash_staining']; ?>" placeholder="4-5 Cross Staining">
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="mwash_note" maxlength="50"
										rows="1"><?php echo $rcekM['mwash_note']; ?></textarea>
								</div>
							</div>
							<div class="form-group" id="ranwf" style="display:none;">
								<label for="ranwf" class="col-sm-2 control-label">WASHING FASTNESS (RAN)</label>
								<div class="col-sm-1">
									<label><input type="checkbox" name="rwash_temp" id="rwash_temp" class="minimal"
											value="30" <?php if ($rcekR['rwash_temp'] == '30') {
												echo "checked";
											} ?>
											readonly>
										30&deg;C &nbsp; &nbsp; &nbsp; &nbsp;
									</label>
									<label><input type="checkbox" name="rwash_temp" id="rwash_temp" class="minimal"
											value="40" <?php if ($rcekR['rwash_temp'] == '40') {
												echo "checked";
											} ?>
											readonly>
										40&deg;C
									</label>
								</div>
								<div class="col-sm-2">
									<input name="rwash_colorchange" type="text" class="form-control" id="rwash_colorchange"
										value="<?php echo $rcekR['rwash_colorchange']; ?>" placeholder="4-5 Color Change"
										readonly>
									<input name="rwash_acetate" type="text" class="form-control" id="rwash_acetate"
										value="<?php echo $rcekR['rwash_acetate']; ?>" placeholder="4 Acetate" readonly>
								</div>
								<div class="col-sm-2">
									<input name="rwash_cotton" type="text" class="form-control" id="rwash_cotton"
										value="<?php echo $rcekR['rwash_cotton']; ?>" placeholder="4 Cotton" readonly>
									<input name="rwash_nylon" type="text" class="form-control" id="rwash_nylon"
										value="<?php echo $rcekR['rwash_nylon']; ?>" placeholder="4 Nylon" readonly>
								</div>
								<div class="col-sm-2">
									<input name="rwash_poly" type="text" class="form-control" id="rwash_poly"
										value="<?php echo $rcekR['rwash_poly']; ?>" placeholder="4 Polyester" readonly>
									<input name="rwash_acrylic" type="text" class="form-control" id="rwash_acrylic"
										value="<?php echo $rcekR['rwash_acrylic']; ?>" placeholder="4 Acrylic" readonly>
								</div>
								<div class="col-sm-2">
									<input name="rwash_wool" type="text" class="form-control" id="rwash_wool"
										value="<?php echo $rcekR['rwash_wool']; ?>" placeholder="4 Wool" readonly>
									<input name="rwash_staining" type="text" class="form-control" id="rwash_staining"
										value="<?php echo $rcekR['rwash_staining']; ?>" placeholder="4-5 Cross Staining"
										readonly>
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="rwash_note" maxlength="50" rows="1"
										readonly><?php echo $rcekR['rwash_note']; ?></textarea>
								</div>
							</div>
							<!-- WASHING END-->
							<!-- WATER BEGIN-->
							<div class="form-group" id="c2" style="display:none;">
								<label for="water" class="col-sm-2 control-label">WATER</label>
								<div class="col-sm-2">
									<input name="water_colorchange" type="text" class="form-control" id="water_colorchange"
										value="<?php echo $rcek1['water_colorchange']; ?>" placeholder="4-5 Color Change">
									<input name="water_acetate" type="text" class="form-control" id="water_acetate"
										value="<?php echo $rcek1['water_acetate']; ?>" placeholder="4 Acetate">
								</div>
								<div class="col-sm-2">
									<input name="water_cotton" type="text" class="form-control" id="water_cotton"
										value="<?php echo $rcek1['water_cotton']; ?>" placeholder="4 Cotton">
									<input name="water_nylon" type="text" class="form-control" id="water_nylon"
										value="<?php echo $rcek1['water_nylon']; ?>" placeholder="4 Nylon">
								</div>
								<div class="col-sm-2">
									<input name="water_poly" type="text" class="form-control" id="water_poly"
										value="<?php echo $rcek1['water_poly']; ?>" placeholder="4 Polyester">
									<input name="water_acrylic" type="text" class="form-control" id="water_acrylic"
										value="<?php echo $rcek1['water_acrylic']; ?>" placeholder="4 Acrylic">
								</div>
								<div class="col-sm-2">
									<input name="water_wool" type="text" class="form-control" id="water_wool"
										value="<?php echo $rcek1['water_wool']; ?>" placeholder="4 Wool">
									<input name="water_staining" type="text" class="form-control" id="water_staining"
										value="<?php echo $rcek1['water_staining']; ?>" placeholder="S.Staining">
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="water_note" maxlength="50"
										rows="1"><?php echo $rcek1['water_note']; ?></textarea>
								</div>
							</div>
							<div class="form-group" id="stat_wtr" style="display:none;">
								<label for="stat_wtr" class="col-sm-2 control-label">STATUS</label>
								<div class="col-sm-2">
									<select name="stat_wtr" class="form-control select2" id="stat_wtr" onChange="tampil2();"
										style="width: 100%;">
										<option <?php if ($rcek1['stat_wtr'] == "") { ?> selected=selected <?php }
										; ?>value="">
											Pilih</option>
										<option <?php if ($rcek1['stat_wtr'] == "DISPOSISI") { ?> selected=selected <?php }
										; ?>value="DISPOSISI">DISPOSISI</option>
										<option <?php if ($rcek1['stat_wtr'] == "A") { ?> selected=selected <?php }
										; ?>value="A">A
										</option>
										<option <?php if ($rcek1['stat_wtr'] == "R") { ?> selected=selected <?php }
										; ?>value="R">R
										</option>
										<option <?php if ($rcek1['stat_wtr'] == "PASS") { ?> selected=selected <?php }
										; ?>value="PASS">PASS</option>
										<option <?php if ($rcek1['stat_wtr'] == "MARGINAL PASS") { ?> selected=selected <?php }
										; ?>value="MARGINAL PASS">MARGINAL PASS</option>
										<option <?php if ($rcek1['stat_wtr'] == "DATA") { ?> selected=selected <?php }
										; ?>value="DATA">DATA</option>
										<option <?php if ($rcek1['stat_wtr'] == "FAIL") { ?> selected=selected <?php }
										; ?>value="FAIL">FAIL</option>
										<option <?php if ($rcek1['stat_wtr'] == "RANDOM") { ?> selected=selected <?php }
										; ?>value="RANDOM">RANDOM</option>
									</select>
								</div>
							</div>
							<div class="form-group" id="diswtr" style="display:none;">
								<label for="diswtr" class="col-sm-2 control-label">WATER (DIS)</label>
								<div class="col-sm-2">
									<input name="dwater_colorchange" type="text" class="form-control"
										id="dwater_colorchange" value="<?php echo $rcekD['dwater_colorchange']; ?>"
										placeholder="4-5 Color Change">
									<input name="dwater_acetate" type="text" class="form-control" id="dwater_acetate"
										value="<?php echo $rcekD['dwater_acetate']; ?>" placeholder="4 Acetate">
								</div>
								<div class="col-sm-2">
									<input name="dwater_cotton" type="text" class="form-control" id="dwater_cotton"
										value="<?php echo $rcekD['dwater_cotton']; ?>" placeholder="4 Cotton">
									<input name="dwater_nylon" type="text" class="form-control" id="dwater_nylon"
										value="<?php echo $rcekD['dwater_nylon']; ?>" placeholder="4 Nylon">
								</div>
								<div class="col-sm-2">
									<input name="dwater_poly" type="text" class="form-control" id="dwater_poly"
										value="<?php echo $rcekD['dwater_poly']; ?>" placeholder="4 Polyester">
									<input name="dwater_acrylic" type="text" class="form-control" id="dwater_acrylic"
										value="<?php echo $rcekD['dwater_acrylic']; ?>" placeholder="4 Acrylic">
								</div>
								<div class="col-sm-2">
									<input name="dwater_wool" type="text" class="form-control" id="dwater_wool"
										value="<?php echo $rcekD['dwater_wool']; ?>" placeholder="4 Wool">
									<input name="dwater_staining" type="text" class="form-control" id="dwater_staining"
										value="<?php echo $rcekD['dwater_staining']; ?>" placeholder="S.Staining">
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="dwater_note" maxlength="50"
										rows="1"><?php echo $rcekD['dwater_note']; ?></textarea>
								</div>
							</div>
							<div class="form-group" id="marwtr" style="display:none;">
								<label for="marwtr" class="col-sm-2 control-label">WATER (MARGINAL)</label>
								<div class="col-sm-2">
									<input name="mwater_colorchange" type="text" class="form-control"
										id="mwater_colorchange" value="<?php echo $rcekM['mwater_colorchange']; ?>"
										placeholder="4-5 Color Change">
									<input name="mwater_acetate" type="text" class="form-control" id="mwater_acetate"
										value="<?php echo $rcekM['mwater_acetate']; ?>" placeholder="4 Acetate">
								</div>
								<div class="col-sm-2">
									<input name="mwater_cotton" type="text" class="form-control" id="mwater_cotton"
										value="<?php echo $rcekM['mwater_cotton']; ?>" placeholder="4 Cotton">
									<input name="mwater_nylon" type="text" class="form-control" id="mwater_nylon"
										value="<?php echo $rcekM['mwater_nylon']; ?>" placeholder="4 Nylon">
								</div>
								<div class="col-sm-2">
									<input name="mwater_poly" type="text" class="form-control" id="mwater_poly"
										value="<?php echo $rcekM['mwater_poly']; ?>" placeholder="4 Polyester">
									<input name="mwater_acrylic" type="text" class="form-control" id="mwater_acrylic"
										value="<?php echo $rcekM['mwater_acrylic']; ?>" placeholder="4 Acrylic">
								</div>
								<div class="col-sm-2">
									<input name="mwater_wool" type="text" class="form-control" id="mwater_wool"
										value="<?php echo $rcekM['mwater_wool']; ?>" placeholder="4 Wool">
									<input name="mwater_staining" type="text" class="form-control" id="mwater_staining"
										value="<?php echo $rcekM['mwater_staining']; ?>" placeholder="S.Staining">
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="mwater_note" maxlength="50"
										rows="1"><?php echo $rcekM['mwater_note']; ?></textarea>
								</div>
							</div>
							<div class="form-group" id="ranwtr" style="display:none;">
								<label for="ranwtr" class="col-sm-2 control-label">WATER (RAN)</label>
								<div class="col-sm-2">
									<input name="rwater_colorchange" type="text" class="form-control"
										id="rwater_colorchange" value="<?php echo $rcekR['rwater_colorchange']; ?>"
										placeholder="4-5 Color Change" readonly>
									<input name="rwater_acetate" type="text" class="form-control" id="rwater_acetate"
										value="<?php echo $rcekR['rwater_acetate']; ?>" placeholder="4 Acetate" readonly>
								</div>
								<div class="col-sm-2">
									<input name="rwater_cotton" type="text" class="form-control" id="rwater_cotton"
										value="<?php echo $rcekR['rwater_cotton']; ?>" placeholder="4 Cotton" readonly>
									<input name="rwater_nylon" type="text" class="form-control" id="rwater_nylon"
										value="<?php echo $rcekR['rwater_nylon']; ?>" placeholder="4 Nylon" readonly>
								</div>
								<div class="col-sm-2">
									<input name="rwater_poly" type="text" class="form-control" id="rwater_poly"
										value="<?php echo $rcekR['rwater_poly']; ?>" placeholder="4 Polyester" readonly>
									<input name="rwater_acrylic" type="text" class="form-control" id="rwater_acrylic"
										value="<?php echo $rcekR['rwater_acrylic']; ?>" placeholder="4 Acrylic" readonly>
								</div>
								<div class="col-sm-2">
									<input name="rwater_wool" type="text" class="form-control" id="rwater_wool"
										value="<?php echo $rcekR['rwater_wool']; ?>" placeholder="4 Wool" readonly>
									<input name="rwater_staining" type="text" class="form-control" id="rwater_staining"
										value="<?php echo $rcekR['rwater_staining']; ?>" placeholder="S.Staining" readonly>
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="rwater_note" maxlength="50" rows="1"
										readonly><?php echo $rcekR['rwater_note']; ?></textarea>
								</div>
							</div>
							<!-- WATER END-->
							<!-- PERSPIRATION ACID BEGIN-->
							<div class="form-group" id="c3" style="display:none;">
								<label for="acid" class="col-sm-2 control-label">PERSPIRATION ACID</label>
								<div class="col-sm-2">
									<input name="acid_colorchange" type="text" class="form-control" id="acid_colorchange"
										value="<?php echo $rcek1['acid_colorchange']; ?>" placeholder="4-5 Color Change">
									<input name="acid_acetate" type="text" class="form-control" id="acid_acetate"
										value="<?php echo $rcek1['acid_acetate']; ?>" placeholder="4 Acetate">
								</div>
								<div class="col-sm-2">
									<input name="acid_cotton" type="text" class="form-control" id="acid_cotton"
										value="<?php echo $rcek1['acid_cotton']; ?>" placeholder="4 Cotton">
									<input name="acid_nylon" type="text" class="form-control" id="acid_nylon"
										value="<?php echo $rcek1['acid_nylon']; ?>" placeholder="4 Nylon">
								</div>
								<div class="col-sm-2">
									<input name="acid_poly" type="text" class="form-control" id="acid_poly"
										value="<?php echo $rcek1['acid_poly']; ?>" placeholder="4 Polyester">
									<input name="acid_acrylic" type="text" class="form-control" id="acid_acrylic"
										value="<?php echo $rcek1['acid_acrylic']; ?>" placeholder="4 Acrylic">
								</div>
								<div class="col-sm-2">
									<input name="acid_wool" type="text" class="form-control" id="acid_wool"
										value="<?php echo $rcek1['acid_wool']; ?>" placeholder="4 Wool">
									<input name="acid_staining" type="text" class="form-control" id="acid_staining"
										value="<?php echo $rcek1['acid_staining']; ?>" placeholder="S.Staining">
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="acid_note" maxlength="50"
										rows="1"><?php echo $rcek1['acid_note']; ?></textarea>
								</div>
							</div>
							<div class="form-group" id="stat_pac" style="display:none;">
								<label for="stat_pac" class="col-sm-2 control-label">STATUS</label>
								<div class="col-sm-2">
									<select name="stat_pac" class="form-control select2" id="stat_pac" onChange="tampil2();"
										style="width: 100%;">
										<option <?php if ($rcek1['stat_pac'] == "") { ?> selected=selected <?php }
										; ?>value="">
											Pilih</option>
										<option <?php if ($rcek1['stat_pac'] == "DISPOSISI") { ?> selected=selected <?php }
										; ?>value="DISPOSISI">DISPOSISI</option>
										<option <?php if ($rcek1['stat_pac'] == "A") { ?> selected=selected <?php }
										; ?>value="A">A
										</option>
										<option <?php if ($rcek1['stat_pac'] == "R") { ?> selected=selected <?php }
										; ?>value="R">R
										</option>
										<option <?php if ($rcek1['stat_pac'] == "PASS") { ?> selected=selected <?php }
										; ?>value="PASS">PASS</option>
										<option <?php if ($rcek1['stat_pac'] == "MARGINAL PASS") { ?> selected=selected <?php }
										; ?>value="MARGINAL PASS">MARGINAL PASS</option>
										<option <?php if ($rcek1['stat_pac'] == "DATA") { ?> selected=selected <?php }
										; ?>value="DATA">DATA</option>
										<option <?php if ($rcek1['stat_pac'] == "FAIL") { ?> selected=selected <?php }
										; ?>value="FAIL">FAIL</option>
										<option <?php if ($rcek1['stat_pac'] == "RANDOM") { ?> selected=selected <?php }
										; ?>value="RANDOM">RANDOM</option>
									</select>
								</div>
							</div>
							<div class="form-group" id="dispac" style="display:none;">
								<label for="dispac" class="col-sm-2 control-label">PERSPIRATION ACID (DIS)</label>
								<div class="col-sm-2">
									<input name="dacid_colorchange" type="text" class="form-control" id="dacid_colorchange"
										value="<?php echo $rcekD['dacid_colorchange']; ?>" placeholder="4-5 Color Change">
									<input name="dacid_acetate" type="text" class="form-control" id="dacid_acetate"
										value="<?php echo $rcekD['dacid_acetate']; ?>" placeholder="4 Acetate">
								</div>
								<div class="col-sm-2">
									<input name="dacid_cotton" type="text" class="form-control" id="dacid_cotton"
										value="<?php echo $rcekD['dacid_cotton']; ?>" placeholder="4 Cotton">
									<input name="dacid_nylon" type="text" class="form-control" id="dacid_nylon"
										value="<?php echo $rcekD['dacid_nylon']; ?>" placeholder="4 Nylon">
								</div>
								<div class="col-sm-2">
									<input name="dacid_poly" type="text" class="form-control" id="dacid_poly"
										value="<?php echo $rcekD['dacid_poly']; ?>" placeholder="4 Polyester">
									<input name="dacid_acrylic" type="text" class="form-control" id="dacid_acrylic"
										value="<?php echo $rcekD['dacid_acrylic']; ?>" placeholder="4 Acrylic">
								</div>
								<div class="col-sm-2">
									<input name="dacid_wool" type="text" class="form-control" id="dacid_wool"
										value="<?php echo $rcekD['dacid_wool']; ?>" placeholder="4 Wool">
									<input name="dacid_staining" type="text" class="form-control" id="dacid_staining"
										value="<?php echo $rcekD['dacid_staining']; ?>" placeholder="S.Staining">
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="dacid_note" maxlength="50"
										rows="1"><?php echo $rcekD['dacid_note']; ?></textarea>
								</div>
							</div>
							<div class="form-group" id="marpac" style="display:none;">
								<label for="marpac" class="col-sm-2 control-label">PERSPIRATION ACID (MARGINAL)</label>
								<div class="col-sm-2">
									<input name="macid_colorchange" type="text" class="form-control" id="macid_colorchange"
										value="<?php echo $rcekM['macid_colorchange']; ?>" placeholder="4-5 Color Change">
									<input name="macid_acetate" type="text" class="form-control" id="macid_acetate"
										value="<?php echo $rcekM['macid_acetate']; ?>" placeholder="4 Acetate">
								</div>
								<div class="col-sm-2">
									<input name="macid_cotton" type="text" class="form-control" id="macid_cotton"
										value="<?php echo $rcekM['macid_cotton']; ?>" placeholder="4 Cotton">
									<input name="macid_nylon" type="text" class="form-control" id="macid_nylon"
										value="<?php echo $rcekM['macid_nylon']; ?>" placeholder="4 Nylon">
								</div>
								<div class="col-sm-2">
									<input name="macid_poly" type="text" class="form-control" id="macid_poly"
										value="<?php echo $rcekM['macid_poly']; ?>" placeholder="4 Polyester">
									<input name="macid_acrylic" type="text" class="form-control" id="macid_acrylic"
										value="<?php echo $rcekM['macid_acrylic']; ?>" placeholder="4 Acrylic">
								</div>
								<div class="col-sm-2">
									<input name="macid_wool" type="text" class="form-control" id="macid_wool"
										value="<?php echo $rcekM['macid_wool']; ?>" placeholder="4 Wool">
									<input name="macid_staining" type="text" class="form-control" id="macid_staining"
										value="<?php echo $rcekM['macid_staining']; ?>" placeholder="S.Staining">
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="macid_note" maxlength="50"
										rows="1"><?php echo $rcekM['macid_note']; ?></textarea>
								</div>
							</div>
							<div class="form-group" id="ranpac" style="display:none;">
								<label for="ranpac" class="col-sm-2 control-label">PERSPIRATION ACID (RAN)</label>
								<div class="col-sm-2">
									<input name="racid_colorchange" type="text" class="form-control" id="racid_colorchange"
										value="<?php echo $rcekR['racid_colorchange']; ?>" placeholder="4-5 Color Change"
										readonly>
									<input name="racid_acetate" type="text" class="form-control" id="racid_acetate"
										value="<?php echo $rcekR['racid_acetate']; ?>" placeholder="4 Acetate" readonly>
								</div>
								<div class="col-sm-2">
									<input name="racid_cotton" type="text" class="form-control" id="racid_cotton"
										value="<?php echo $rcekR['racid_cotton']; ?>" placeholder="4 Cotton" readonly>
									<input name="racid_nylon" type="text" class="form-control" id="racid_nylon"
										value="<?php echo $rcekR['racid_nylon']; ?>" placeholder="4 Nylon" readonly>
								</div>
								<div class="col-sm-2">
									<input name="racid_poly" type="text" class="form-control" id="racid_poly"
										value="<?php echo $rcekR['racid_poly']; ?>" placeholder="4 Polyester" readonly>
									<input name="racid_acrylic" type="text" class="form-control" id="racid_acrylic"
										value="<?php echo $rcekR['racid_acrylic']; ?>" placeholder="4 Acrylic" readonly>
								</div>
								<div class="col-sm-2">
									<input name="racid_wool" type="text" class="form-control" id="racid_wool"
										value="<?php echo $rcekR['racid_wool']; ?>" placeholder="4 Wool" readonly>
									<input name="racid_staining" type="text" class="form-control" id="racid_staining"
										value="<?php echo $rcekR['racid_staining']; ?>" placeholder="S.Staining" readonly>
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="racid_note" maxlength="50" rows="1"
										readonly><?php echo $rcekR['racid_note']; ?></textarea>
								</div>
							</div>
							<!-- PERSPIRATION ACID END-->
							<!-- PERSPIRATION ALKALINE BEGIN-->
							<div class="form-group" id="c4" style="display:none;">
								<label for="alkaline" class="col-sm-2 control-label">PERSPIRATION ALKALINE</label>
								<div class="col-sm-2">
									<input name="alkaline_colorchange" type="text" class="form-control"
										id="alkaline_colorchange" value="<?php echo $rcek1['alkaline_colorchange']; ?>"
										placeholder="4-5 Color Change">
									<input name="alkaline_acetate" type="text" class="form-control" id="alkaline_acetate"
										value="<?php echo $rcek1['alkaline_acetate']; ?>" placeholder="4 Acetate">
								</div>
								<div class="col-sm-2">
									<input name="alkaline_cotton" type="text" class="form-control" id="alkaline_cotton"
										value="<?php echo $rcek1['alkaline_cotton']; ?>" placeholder="4 Cotton">
									<input name="alkaline_nylon" type="text" class="form-control" id="alkaline_nylon"
										value="<?php echo $rcek1['alkaline_nylon']; ?>" placeholder="4 Nylon">
								</div>
								<div class="col-sm-2">
									<input name="alkaline_poly" type="text" class="form-control" id="alkaline_poly"
										value="<?php echo $rcek1['alkaline_poly']; ?>" placeholder="4 Polyester">
									<input name="alkaline_acrylic" type="text" class="form-control" id="alkaline_acrylic"
										value="<?php echo $rcek1['alkaline_acrylic']; ?>" placeholder="4 Acrylic">
								</div>
								<div class="col-sm-2">
									<input name="alkaline_wool" type="text" class="form-control" id="alkaline_wool"
										value="<?php echo $rcek1['alkaline_wool']; ?>" placeholder="4 Wool">
									<input name="alkaline_staining" type="text" class="form-control" id="alkaline_staining"
										value="<?php echo $rcek1['alkaline_staining']; ?>" placeholder="S.Staining">
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="alkaline_note" maxlength="50"
										rows="1"><?php echo $rcek1['alkaline_note']; ?></textarea>
								</div>
							</div>
							<div class="form-group" id="stat_pal" style="display:none;">
								<label for="stat_pal" class="col-sm-2 control-label">STATUS</label>
								<div class="col-sm-2">
									<select name="stat_pal" class="form-control select2" id="stat_pal" onChange="tampil2();"
										style="width: 100%;">
										<option <?php if ($rcek1['stat_pal'] == "") { ?> selected=selected <?php }
										; ?>value="">
											Pilih</option>
										<option <?php if ($rcek1['stat_pal'] == "DISPOSISI") { ?> selected=selected <?php }
										; ?>value="DISPOSISI">DISPOSISI</option>
										<option <?php if ($rcek1['stat_pal'] == "A") { ?> selected=selected <?php }
										; ?>value="A">A
										</option>
										<option <?php if ($rcek1['stat_pal'] == "R") { ?> selected=selected <?php }
										; ?>value="R">R
										</option>
										<option <?php if ($rcek1['stat_pal'] == "PASS") { ?> selected=selected <?php }
										; ?>value="PASS">PASS</option>
										<option <?php if ($rcek1['stat_pal'] == "MARGINAL PASS") { ?> selected=selected <?php }
										; ?>value="MARGINAL PASS">MARGINAL PASS</option>
										<option <?php if ($rcek1['stat_pal'] == "DATA") { ?> selected=selected <?php }
										; ?>value="DATA">DATA</option>
										<option <?php if ($rcek1['stat_pal'] == "FAIL") { ?> selected=selected <?php }
										; ?>value="FAIL">FAIL</option>
										<option <?php if ($rcek1['stat_pal'] == "RANDOM") { ?> selected=selected <?php }
										; ?>value="RANDOM">RANDOM</option>
									</select>
								</div>
							</div>
							<div class="form-group" id="dispal" style="display:none;">
								<label for="dispal" class="col-sm-2 control-label">PERSPIRATION ALKALINE (DIS)</label>
								<div class="col-sm-2">
									<input name="dalkaline_colorchange" type="text" class="form-control"
										id="dalkaline_colorchange" value="<?php echo $rcekD['dalkaline_colorchange']; ?>"
										placeholder="4-5 Color Change">
									<input name="dalkaline_acetate" type="text" class="form-control" id="dalkaline_acetate"
										value="<?php echo $rcekD['dalkaline_acetate']; ?>" placeholder="4 Acetate">
								</div>
								<div class="col-sm-2">
									<input name="dalkaline_cotton" type="text" class="form-control" id="dalkaline_cotton"
										value="<?php echo $rcekD['dalkaline_cotton']; ?>" placeholder="4 Cotton">
									<input name="dalkaline_nylon" type="text" class="form-control" id="dalkaline_nylon"
										value="<?php echo $rcekD['dalkaline_nylon']; ?>" placeholder="4 Nylon">
								</div>
								<div class="col-sm-2">
									<input name="dalkaline_poly" type="text" class="form-control" id="dalkaline_poly"
										value="<?php echo $rcekD['dalkaline_poly']; ?>" placeholder="4 Polyester">
									<input name="dalkaline_acrylic" type="text" class="form-control" id="dalkaline_acrylic"
										value="<?php echo $rcekD['dalkaline_acrylic']; ?>" placeholder="4 Acrylic">
								</div>
								<div class="col-sm-2">
									<input name="dalkaline_wool" type="text" class="form-control" id="dalkaline_wool"
										value="<?php echo $rcekD['dalkaline_wool']; ?>" placeholder="4 Wool">
									<input name="dalkaline_staining" type="text" class="form-control"
										id="dalkaline_staining" value="<?php echo $rcekD['dalkaline_staining']; ?>"
										placeholder="S.Staining">
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="dalkaline_note" maxlength="50"
										rows="1"><?php echo $rcekD['dalkaline_note']; ?></textarea>
								</div>
							</div>
							<div class="form-group" id="marpal" style="display:none;">
								<label for="marpal" class="col-sm-2 control-label">PERSPIRATION ALKALINE (MARGINAL)</label>
								<div class="col-sm-2">
									<input name="malkaline_colorchange" type="text" class="form-control"
										id="malkaline_colorchange" value="<?php echo $rcekM['malkaline_colorchange']; ?>"
										placeholder="4-5 Color Change">
									<input name="malkaline_acetate" type="text" class="form-control" id="malkaline_acetate"
										value="<?php echo $rcekM['malkaline_acetate']; ?>" placeholder="4 Acetate">
								</div>
								<div class="col-sm-2">
									<input name="malkaline_cotton" type="text" class="form-control" id="malkaline_cotton"
										value="<?php echo $rcekM['malkaline_cotton']; ?>" placeholder="4 Cotton">
									<input name="malkaline_nylon" type="text" class="form-control" id="malkaline_nylon"
										value="<?php echo $rcekM['malkaline_nylon']; ?>" placeholder="4 Nylon">
								</div>
								<div class="col-sm-2">
									<input name="malkaline_poly" type="text" class="form-control" id="malkaline_poly"
										value="<?php echo $rcekM['malkaline_poly']; ?>" placeholder="4 Polyester">
									<input name="malkaline_acrylic" type="text" class="form-control" id="malkaline_acrylic"
										value="<?php echo $rcekM['malkaline_acrylic']; ?>" placeholder="4 Acrylic">
								</div>
								<div class="col-sm-2">
									<input name="malkaline_wool" type="text" class="form-control" id="malkaline_wool"
										value="<?php echo $rcekM['malkaline_wool']; ?>" placeholder="4 Wool">
									<input name="malkaline_staining" type="text" class="form-control"
										id="malkaline_staining" value="<?php echo $rcekM['malkaline_staining']; ?>"
										placeholder="S.Staining">
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="malkaline_note" maxlength="50"
										rows="1"><?php echo $rcekM['malkaline_note']; ?></textarea>
								</div>
							</div>
							<div class="form-group" id="ranpal" style="display:none;">
								<label for="ranpal" class="col-sm-2 control-label">PERSPIRATION ALKALINE (RAN)</label>
								<div class="col-sm-2">
									<input name="ralkaline_colorchange" type="text" class="form-control"
										id="ralkaline_colorchange" value="<?php echo $rcekR['ralkaline_colorchange']; ?>"
										placeholder="4-5 Color Change" readonly>
									<input name="ralkaline_acetate" type="text" class="form-control" id="ralkaline_acetate"
										value="<?php echo $rcekR['ralkaline_acetate']; ?>" placeholder="4 Acetate" readonly>
								</div>
								<div class="col-sm-2">
									<input name="ralkaline_cotton" type="text" class="form-control" id="ralkaline_cotton"
										value="<?php echo $rcekR['ralkaline_cotton']; ?>" placeholder="4 Cotton" readonly>
									<input name="ralkaline_nylon" type="text" class="form-control" id="ralkaline_nylon"
										value="<?php echo $rcekR['ralkaline_nylon']; ?>" placeholder="4 Nylon" readonly>
								</div>
								<div class="col-sm-2">
									<input name="ralkaline_poly" type="text" class="form-control" id="ralkaline_poly"
										value="<?php echo $rcekR['ralkaline_poly']; ?>" placeholder="4 Polyester" readonly>
									<input name="ralkaline_acrylic" type="text" class="form-control" id="ralkaline_acrylic"
										value="<?php echo $rcekR['ralkaline_acrylic']; ?>" placeholder="4 Acrylic" readonly>
								</div>
								<div class="col-sm-2">
									<input name="ralkaline_wool" type="text" class="form-control" id="ralkaline_wool"
										value="<?php echo $rcekR['ralkaline_wool']; ?>" placeholder="4 Wool" readonly>
									<input name="ralkaline_staining" type="text" class="form-control"
										id="ralkaline_staining" value="<?php echo $rcekR['ralkaline_staining']; ?>"
										placeholder="S.Staining">
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="ralkaline_note" maxlength="50" rows="1"
										readonly><?php echo $rcekR['ralkaline_note']; ?></textarea>
								</div>
							</div>
							<!-- PERSPIRATION ALKALINE END-->
							<!-- CROCKING BEGIN-->
							<div class="form-group" id="c5" style="display:none;">
								<label for="crocking" class="col-sm-2 control-label">CROCKING</label>
								<div class="col-sm-1">LEN 1
									<input name="crock_len1" type="text" class="form-control" id="crock_len1"
										value="<?php echo $rcek1['crock_len1']; ?>" placeholder="4 Dry">
								</div>
								<div class="col-sm-1">WID 1
									<input name="crock_wid1" type="text" class="form-control" id="crock_wid1"
										value="<?php echo $rcek1['crock_wid1']; ?>" placeholder="4 Dry">
								</div>
								<div class="col-sm-1">LEN 2
									<input name="crock_len2" type="text" class="form-control" id="crock_len2"
										value="<?php echo $rcek1['crock_len2']; ?>" placeholder="3 Wet">
								</div>
								<div class="col-sm-1">WID 2
									<input name="crock_wid2" type="text" class="form-control" id="crock_wid2"
										value="<?php echo $rcek1['crock_wid2']; ?>" placeholder="3 Wet">
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="crock_note" maxlength="50"><?php echo $rcek1['crock_note']; ?></textarea>
								</div>
							</div>
							<div class="form-group" id="stat_cr" style="display:none;">
								<label for="stat_cr" class="col-sm-2 control-label">STATUS</label>
								<div class="col-sm-2">
									<select name="stat_cr" class="form-control select2" id="stat_cr" onChange="tampil2();"
										style="width: 100%;">
										<option <?php if ($rcek1['stat_cr'] == "") { ?> selected=selected <?php }
										; ?>value="">
											Pilih</option>
										<option <?php if ($rcek1['stat_cr'] == "DISPOSISI") { ?> selected=selected <?php }
										; ?>value="DISPOSISI">DISPOSISI</option>
										<option <?php if ($rcek1['stat_cr'] == "A") { ?> selected=selected <?php }
										; ?>value="A">A
										</option>
										<option <?php if ($rcek1['stat_cr'] == "R") { ?> selected=selected <?php }
										; ?>value="R">R
										</option>
										<option <?php if ($rcek1['stat_cr'] == "PASS") { ?> selected=selected <?php }
										; ?>value="PASS">PASS</option>
										<option <?php if ($rcek1['stat_cr'] == "MARGINAL PASS") { ?> selected=selected <?php }
										; ?>value="MARGINAL PASS">MARGINAL PASS</option>
										<option <?php if ($rcek1['stat_cr'] == "DATA") { ?> selected=selected <?php }
										; ?>value="DATA">DATA</option>
										<option <?php if ($rcek1['stat_cr'] == "FAIL") { ?> selected=selected <?php }
										; ?>value="FAIL">FAIL</option>
										<option <?php if ($rcek1['stat_cr'] == "RANDOM") { ?> selected=selected <?php }
										; ?>value="RANDOM">RANDOM</option>
									</select>
								</div>
							</div>
							<div class="form-group" id="discr" style="display:none;">
								<label for="discr" class="col-sm-2 control-label">CROCKING (DIS)</label>
								<div class="col-sm-1">LEN 1
									<input name="dcrock_len1" type="text" class="form-control" id="dcrock_len1"
										value="<?php echo $rcekD['dcrock_len1']; ?>" placeholder="4 Dry">
								</div>
								<div class="col-sm-1">WID 1
									<input name="dcrock_wid1" type="text" class="form-control" id="dcrock_wid1"
										value="<?php echo $rcekD['dcrock_wid1']; ?>" placeholder="4 Dry">
								</div>
								<div class="col-sm-1">LEN 2
									<input name="dcrock_len2" type="text" class="form-control" id="dcrock_len2"
										value="<?php echo $rcekD['dcrock_len2']; ?>" placeholder="3 Wet">
								</div>
								<div class="col-sm-1">WID 2
									<input name="dcrock_wid2" type="text" class="form-control" id="dcrock_wid2"
										value="<?php echo $rcekD['dcrock_wid2']; ?>" placeholder="3 Wet">
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="dcrock_note" maxlength="50"><?php echo $rcekD['dcrock_note']; ?></textarea>
								</div>
							</div>
							<div class="form-group" id="marcr" style="display:none;">
								<label for="marcr" class="col-sm-2 control-label">CROCKING (MARGINAL)</label>
								<div class="col-sm-1">LEN 1
									<input name="mcrock_len1" type="text" class="form-control" id="mcrock_len1"
										value="<?php echo $rcekM['mcrock_len1']; ?>" placeholder="4 Dry">
								</div>
								<div class="col-sm-1">WID 1
									<input name="mcrock_wid1" type="text" class="form-control" id="mcrock_wid1"
										value="<?php echo $rcekM['mcrock_wid1']; ?>" placeholder="4 Dry">
								</div>
								<div class="col-sm-1">LEN 2
									<input name="mcrock_len2" type="text" class="form-control" id="mcrock_len2"
										value="<?php echo $rcekM['mcrock_len2']; ?>" placeholder="3 Wet">
								</div>
								<div class="col-sm-1">WID 2
									<input name="mcrock_wid2" type="text" class="form-control" id="mcrock_wid2"
										value="<?php echo $rcekM['mcrock_wid2']; ?>" placeholder="3 Wet">
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="mcrock_note" maxlength="50"><?php echo $rcekM['mcrock_note']; ?></textarea>
								</div>
							</div>
							<div class="form-group" id="rancr" style="display:none;">
								<label for="rancr" class="col-sm-2 control-label">CROCKING (RAN)</label>
								<div class="col-sm-1">LEN 1
									<input name="rcrock_len1" type="text" class="form-control" id="rcrock_len1"
										value="<?php echo $rcekR['rcrock_len1']; ?>" placeholder="4 Dry" readonly>
								</div>
								<div class="col-sm-1">WID 1
									<input name="rcrock_wid1" type="text" class="form-control" id="rcrock_wid1"
										value="<?php echo $rcekR['rcrock_wid1']; ?>" placeholder="4 Dry" readonly>
								</div>
								<div class="col-sm-1">LEN 2
									<input name="rcrock_len2" type="text" class="form-control" id="rcrock_len2"
										value="<?php echo $rcekR['rcrock_len2']; ?>" placeholder="3 Wet" readonly>
								</div>
								<div class="col-sm-1">WID 2
									<input name="rcrock_wid2" type="text" class="form-control" id="rcrock_wid2"
										value="<?php echo $rcekR['rcrock_wid2']; ?>" placeholder="3 Wet" readonly>
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="rcrock_note" maxlength="50"
										readonly><?php echo $rcekR['rcrock_note']; ?></textarea>
								</div>
							</div>
							<!-- CROCKING END-->
							<!-- PHENOLIC YELLOWING BEGIN-->
							<div class="form-group" id="c6" style="display:none;">
								<label for="phenolic" class="col-sm-2 control-label">PHENOLIC YELLOWING</label>
								<div class="col-sm-2">
									<input name="phenolic_colorchange" type="text" class="form-control"
										id="phenolic_colorchange" value="<?php echo $rcek1['phenolic_colorchange']; ?>"
										placeholder="4-5 Color Change">
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="phenolic_note" maxlength="50"
										rows="1"><?php echo $rcek1['phenolic_note']; ?></textarea>
								</div>
							</div>
							<div class="form-group" id="stat_py" style="display:none;">
								<label for="stat_py" class="col-sm-2 control-label">STATUS</label>
								<div class="col-sm-2">
									<select name="stat_py" class="form-control select2" id="stat_py" onChange="tampil2();"
										style="width: 100%;">
										<option <?php if ($rcek1['stat_py'] == "") { ?> selected=selected <?php }
										; ?>value="">
											Pilih</option>
										<option <?php if ($rcek1['stat_py'] == "DISPOSISI") { ?> selected=selected <?php }
										; ?>value="DISPOSISI">DISPOSISI</option>
										<option <?php if ($rcek1['stat_py'] == "A") { ?> selected=selected <?php }
										; ?>value="A">A
										</option>
										<option <?php if ($rcek1['stat_py'] == "R") { ?> selected=selected <?php }
										; ?>value="R">R
										</option>
										<option <?php if ($rcek1['stat_py'] == "PASS") { ?> selected=selected <?php }
										; ?>value="PASS">PASS</option>
										<option <?php if ($rcek1['stat_py'] == "MARGINAL PASS") { ?> selected=selected <?php }
										; ?>value="MARGINAL PASS">MARGINAL PASS</option>
										<option <?php if ($rcek1['stat_py'] == "DATA") { ?> selected=selected <?php }
										; ?>value="DATA">DATA</option>
										<option <?php if ($rcek1['stat_py'] == "FAIL") { ?> selected=selected <?php }
										; ?>value="FAIL">FAIL</option>
										<option <?php if ($rcek1['stat_py'] == "RANDOM") { ?> selected=selected <?php }
										; ?>value="RANDOM">RANDOM</option>
									</select>
								</div>
							</div>
							<div class="form-group" id="dispy" style="display:none;">
								<label for="dispy" class="col-sm-2 control-label">PHENOLIC YELLOWING (DIS)</label>
								<div class="col-sm-2">
									<input name="dphenolic_colorchange" type="text" class="form-control"
										id="dphenolic_colorchange" value="<?php echo $rcekD['dphenolic_colorchange']; ?>"
										placeholder="4-5 Color Change">
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="dphenolic_note" maxlength="50"
										rows="1"><?php echo $rcekD['dphenolic_note']; ?></textarea>
								</div>
							</div>
							<div class="form-group" id="marpy" style="display:none;">
								<label for="marpy" class="col-sm-2 control-label">PHENOLIC YELLOWING (MARGINAL)</label>
								<div class="col-sm-2">
									<input name="mphenolic_colorchange" type="text" class="form-control"
										id="mphenolic_colorchange" value="<?php echo $rcekM['mphenolic_colorchange']; ?>"
										placeholder="4-5 Color Change">
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="mphenolic_note" maxlength="50"
										rows="1"><?php echo $rcekM['mphenolic_note']; ?></textarea>
								</div>
							</div>
							<div class="form-group" id="ranpy" style="display:none;">
								<label for="ranpy" class="col-sm-2 control-label">PHENOLIC YELLOWING (RAN)</label>
								<div class="col-sm-2">
									<input name="rphenolic_colorchange" type="text" class="form-control"
										id="rphenolic_colorchange" value="<?php echo $rcekR['rphenolic_colorchange']; ?>"
										placeholder="4-5 Color Change" readonly>
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="rphenolic_note" maxlength="50" rows="1"
										readonly><?php echo $rcekR['rphenolic_note']; ?></textarea>
								</div>
							</div>
							<!-- PHENOLIC YELLOWING END-->
							<!-- COLOR MIGRATION - OVEN TEST BEGIN-->
							<div class="form-group" id="c7" style="display:none;">
								<label for="cm_printing" class="col-sm-2 control-label">COLOR MIGRATION - OVEN TEST</label>
								<div class="col-sm-2">
									<input name="cm_printing_colorchange" type="text" class="form-control"
										id="cm_printing_colorchange"
										value="<?php echo $rcek1['cm_printing_colorchange']; ?>" placeholder="Grade">
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="cm_printing_note" maxlength="50"
										rows="1"><?php echo $rcek1['cm_printing_note']; ?></textarea>
								</div>
							</div>
							<div class="form-group" id="stat_cmo" style="display:none;">
								<label for="stat_cmo" class="col-sm-2 control-label">STATUS</label>
								<div class="col-sm-2">
									<select name="stat_cmo" class="form-control select2" id="stat_cmo" onChange="tampil2();"
										style="width: 100%;">
										<option <?php if ($rcek1['stat_cmo'] == "") { ?> selected=selected <?php }
										; ?>value="">
											Pilih</option>
										<option <?php if ($rcek1['stat_cmo'] == "DISPOSISI") { ?> selected=selected <?php }
										; ?>value="DISPOSISI">DISPOSISI</option>
										<option <?php if ($rcek1['stat_cmo'] == "A") { ?> selected=selected <?php }
										; ?>value="A">A
										</option>
										<option <?php if ($rcek1['stat_cmo'] == "R") { ?> selected=selected <?php }
										; ?>value="R">R
										</option>
										<option <?php if ($rcek1['stat_cmo'] == "PASS") { ?> selected=selected <?php }
										; ?>value="PASS">PASS</option>
										<option <?php if ($rcek1['stat_cmo'] == "FAIL") { ?> selected=selected <?php }
										; ?>value="FAIL">FAIL</option>
										<option <?php if ($rcek1['stat_cmo'] == "RANDOM") { ?> selected=selected <?php }
										; ?>value="RANDOM">RANDOM</option>
									</select>
								</div>
							</div>
							<div class="form-group" id="discmo" style="display:none;">
								<label for="discmo" class="col-sm-2 control-label">COLOR MIGRATION - OVEN TEST (DIS)</label>
								<div class="col-sm-2">
									<input name="dcm_printing_colorchange" type="text" class="form-control"
										id="dcm_printing_colorchange"
										value="<?php echo $rcekD['dcm_printing_colorchange']; ?>" placeholder="Grade">
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="dcm_printing_note" maxlength="50"
										rows="1"><?php echo $rcekD['dcm_printing_note']; ?></textarea>
								</div>
							</div>
							<div class="form-group" id="rancmo" style="display:none;">
								<label for="rancmo" class="col-sm-2 control-label">COLOR MIGRATION - OVEN TEST (RAN)</label>
								<div class="col-sm-2">
									<input name="rcm_printing_colorchange" type="text" class="form-control"
										id="rcm_printing_colorchange"
										value="<?php echo $rcekR['rcm_printing_colorchange']; ?>" placeholder="Grade"
										readonly>
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="rcm_printing_note" maxlength="50" rows="1"
										readonly><?php echo $rcekR['rcm_printing_note']; ?></textarea>
								</div>
							</div>
							<!-- COLOR MIGRATION - OVEN TEST END-->

							<div class="form-group" id="conceal" style="display:none;">


								<label for="cm_dye" class="col-sm-2 control-label"></label>
								<div class="col-sm-10">
									<?php
									$sco_acid_original = explode("/", $rcek1['sco_acid_original']);
									$sca_acid_original = explode("/", $rcek1['sca_acid_original']);
									$sco_alkaline_afterwash = explode("/", $rcek1['sco_alkaline_afterwash']);
									$sca_alkaline_afterwash = explode("/", $rcek1['sca_alkaline_afterwash']);
									?>



									<?php
									$status_scs = ['DISPOSISI', 'A', 'R', 'PASS', 'FAIL', 'RANDOM'];
									?>

									<table width=100% class="sc">
										<tr>
											<td width=210px><b>Jenis Test</b></td>
											<td><b>Sweat Conceal</b></td>
											<td colspan=4></td>
										</tr>
										<tr>
											<td>Sweat Conceal Original Acid</td>
											<td><input class="form-control" type="text" name="sco_acid_original1"
													value="<?= $sco_acid_original[0]; ?>" placeholder="Original 1 Min"></td>
											<td><input class="form-control" type="text" name="sco_acid_original2"
													value="<?= $sco_acid_original[1]; ?>" placeholder="Original 2 Min"></td>
											<td><input class="form-control" type="text" name="sco_acid_original3"
													value="<?= $sco_acid_original[2]; ?>" placeholder="Original 3 Min"></td>

											<td width=110px>
												<select name="sco_acid_status" class="form-control">
													<option value="">Pilih</option>

													<?php foreach ($status_scs as $status_sc) {
														if ($status_sc == $rcek1['sco_acid_status']) {
															echo '<option selected value="' . $status_sc . '">' . $status_sc . '</option>';
														} else {
															echo '<option value="' . $status_sc . '">' . $status_sc . '</option>';
														}
													}
													?>
												</select>

											</td>
											<td rowspan=4 valign="top">
												<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
													name="sc_note" maxlength="50"
													rows="7"><?php echo $rcek1['sc_note']; ?></textarea>



											</td>
										</tr>
										<tr>
											<td>Sweat Conceal Afterwash Acid</td>
											<td><input class="form-control" type="text" name="sca_acid_original1"
													value="<?= $sca_acid_original[0] ?>" placeholder="Original 1 min"></td>
											<td><input class="form-control" type="text" name="sca_acid_original2"
													value="<?= $sca_acid_original[1] ?>" placeholder="Original 2 min"></td>
											<td><input class="form-control" type="text" name="sca_acid_original3"
													value="<?= $sca_acid_original[2] ?>" placeholder="Original 3 min"></td>
											<td>
												<select name="sca_acid_status" class="form-control">
													<option value="">Pilih</option>

													<?php foreach ($status_scs as $status_sc) {
														if ($status_sc == $rcek1['sca_acid_status']) {
															echo '<option selected value="' . $status_sc . '">' . $status_sc . '</option>';
														} else {
															echo '<option value="' . $status_sc . '">' . $status_sc . '</option>';
														}
													}
													?>
												</select>
											</td>

										</tr>
										<tr>
											<td>Sweat Conceal Original Alkaline</td>
											<td><input class="form-control" type="text" name="sco_alkaline_afterwash1"
													value="<?= $sco_alkaline_afterwash[0] ?>" placeholder="Afterwash 1 min">
											</td>
											<td><input class="form-control" type="text" name="sco_alkaline_afterwash2"
													value="<?= $sco_alkaline_afterwash[1] ?>" placeholder="Afterwash 2 min">
											</td>
											<td><input class="form-control" type="text" name="sco_alkaline_afterwash3"
													value="<?= $sco_alkaline_afterwash[2] ?>" placeholder="Afterwash 3 min">
											</td>
											<td>

												<select name="sco_alkaline_status" class="form-control">
													<option value="">Pilih</option>

													<?php foreach ($status_scs as $status_sc) {
														if ($status_sc == $rcek1['sco_alkaline_status']) {
															echo '<option selected value="' . $status_sc . '">' . $status_sc . '</option>';
														} else {
															echo '<option value="' . $status_sc . '">' . $status_sc . '</option>';
														}
													}
													?>
												</select>
											</td>

										</tr>
										<tr>
											<td>Sweat Conceal Afterwash Alkaline</td>
											<td><input class="form-control" type="text" name="sca_alkaline_afterwash1"
													value="<?= $sca_alkaline_afterwash[0] ?>" placeholder="Afterwash 1 min">
											</td>
											<td><input class="form-control" type="text" name="sca_alkaline_afterwash2"
													value="<?= $sca_alkaline_afterwash[1] ?>" placeholder="Afterwash 2 min">
											</td>
											<td><input class="form-control" type="text" name="sca_alkaline_afterwash3"
													value="<?= $sca_alkaline_afterwash[2] ?>" placeholder="Afterwash 3 min">
											</td>
											<td>


												<select name="sca_alkaline_status" class="form-control">
													<option value="">Pilih</option>

													<?php foreach ($status_scs as $status_sc) {
														if ($status_sc == $rcek1['sca_alkaline_status']) {
															echo '<option selected value="' . $status_sc . '">' . $status_sc . '</option>';
														} else {
															echo '<option value="' . $status_sc . '">' . $status_sc . '</option>';
														}
													}
													?>
												</select>
											</td>
										</tr>

									</table>


								</div>


							</div>
							<!-- COLOR MIGRATION BEGIN-->
							<div class="form-group" id="c8" style="display:none;">
								<label for="cm_dye" class="col-sm-2 control-label">COLOR MIGRATION FASTNESS</label>
								<div class="col-sm-2">
									<label><input type="checkbox" name="cm_dye_temp" id="cm_dye_temp" class="minimal"
											value="90" <?php if ($rcek1['cm_dye_temp'] == '90') {
												echo "checked";
											} ?>>
										90&deg;C x
										24h &nbsp; &nbsp; &nbsp; &nbsp;
									</label>
									<label><input type="checkbox" name="cm_dye_temp" id="cm_dye_temp" class="minimal"
											value="70" <?php if ($rcek1['cm_dye_temp'] == '70') {
												echo "checked";
											} ?>>
										70&deg;C x
										48h
									</label>
								</div>
								<div class="col-sm-2">
									<input name="cm_dye_colorchange" type="text" class="form-control"
										id="cm_dye_colorchange" value="<?php echo $rcek1['cm_dye_colorchange']; ?>"
										placeholder="4-5 Color Change">
								</div>
								<div class="col-sm-2">
									<input name="cm_dye_stainingface" type="text" class="form-control"
										id="cm_dye_stainingface" value="<?php echo $rcek1['cm_dye_stainingface']; ?>"
										placeholder="4 Color Staining">
								</div>
								<div class="col-sm-2">
									<input name="cm_dye_stainingback" type="text" class="form-control"
										id="cm_dye_stainingback" value="<?php echo $rcek1['cm_dye_stainingback']; ?>"
										placeholder="4 Color Staining With Paper">
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="cm_dye_note" maxlength="50"><?php echo $rcek1['cm_dye_note']; ?></textarea>
								</div>
							</div>
							<div class="form-group" id="stat_cm" style="display:none;">
								<label for="stat_cm" class="col-sm-2 control-label">STATUS</label>
								<div class="col-sm-2">
									<select name="stat_cm" class="form-control select2" id="stat_cm" onChange="tampil2();"
										style="width: 100%;">
										<option <?php if ($rcek1['stat_cm'] == "") { ?> selected=selected <?php }
										; ?>value="">
											Pilih</option>
										<option <?php if ($rcek1['stat_cm'] == "DISPOSISI") { ?> selected=selected <?php }
										; ?>value="DISPOSISI">DISPOSISI</option>
										<option <?php if ($rcek1['stat_cm'] == "A") { ?> selected=selected <?php }
										; ?>value="A">A
										</option>
										<option <?php if ($rcek1['stat_cm'] == "R") { ?> selected=selected <?php }
										; ?>value="R">R
										</option>
										<option <?php if ($rcek1['stat_cm'] == "PASS") { ?> selected=selected <?php }
										; ?>value="PASS">PASS</option>
										<option <?php if ($rcek1['stat_cm'] == "FAIL") { ?> selected=selected <?php }
										; ?>value="FAIL">FAIL</option>
										<option <?php if ($rcek1['stat_cm'] == "RANDOM") { ?> selected=selected <?php }
										; ?>value="RANDOM">RANDOM</option>
									</select>
								</div>
							</div>
							<div class="form-group" id="discm" style="display:none;">
								<label for="discm" class="col-sm-2 control-label">COLOR MIGRATION FASTNESS (DIS)</label>
								<div class="col-sm-2">
									<label><input type="checkbox" name="dcm_dye_temp" id="dcm_dye_temp" class="minimal"
											value="90" <?php if ($rcekD['dcm_dye_temp'] == '90') {
												echo "checked";
											} ?>>
										90&deg;C x
										24h &nbsp; &nbsp; &nbsp; &nbsp;
									</label>
									<label><input type="checkbox" name="dcm_dye_temp" id="dcm_dye_temp" class="minimal"
											value="70" <?php if ($rcekD['dcm_dye_temp'] == '70') {
												echo "checked";
											} ?>>
										70&deg;C x
										48h
									</label>
								</div>
								<div class="col-sm-2">
									<input name="dcm_dye_colorchange" type="text" class="form-control"
										id="dcm_dye_colorchange" value="<?php echo $rcekD['dcm_dye_colorchange']; ?>"
										placeholder="4-5 Color Change">
								</div>
								<div class="col-sm-2">
									<input name="dcm_dye_stainingface" type="text" class="form-control"
										id="dcm_dye_stainingface" value="<?php echo $rcekD['dcm_dye_stainingface']; ?>"
										placeholder="4 Color Staining">
								</div>
								<div class="col-sm-2">
									<input name="dcm_dye_stainingback" type="text" class="form-control"
										id="dcm_dye_stainingback" value="<?php echo $rcekD['dcm_dye_stainingback']; ?>"
										placeholder="4 Color Staining With Paper">
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="dcm_dye_note" maxlength="50"><?php echo $rcekD['dcm_dye_note']; ?></textarea>
								</div>
							</div>
							<div class="form-group" id="rancm" style="display:none;">
								<label for="rancm" class="col-sm-2 control-label">COLOR MIGRATION FASTNESS (RAN)</label>
								<div class="col-sm-2">
									<label><input type="checkbox" name="rcm_dye_temp" id="rcm_dye_temp" class="minimal"
											value="90" <?php if ($rcekR['rcm_dye_temp'] == '90') {
												echo "checked";
											} ?>
											readonly>
										90&deg;C x 24h &nbsp; &nbsp; &nbsp; &nbsp;
									</label>
									<label><input type="checkbox" name="rcm_dye_temp" id="rcm_dye_temp" class="minimal"
											value="70" <?php if ($rcekR['rcm_dye_temp'] == '70') {
												echo "checked";
											} ?>
											readonly>
										70&deg;C x 48h
									</label>
								</div>
								<div class="col-sm-2">
									<input name="rcm_dye_colorchange" type="text" class="form-control"
										id="rcm_dye_colorchange" value="<?php echo $rcekR['rcm_dye_colorchange']; ?>"
										placeholder="4-5 Color Change" readonly>
								</div>
								<div class="col-sm-2">
									<input name="rcm_dye_stainingface" type="text" class="form-control"
										id="rcm_dye_stainingface" value="<?php echo $rcekR['rcm_dye_stainingface']; ?>"
										placeholder="4 Color Staining" readonly>
								</div>
								<div class="col-sm-2">
									<input name="rcm_dye_stainingback" type="text" class="form-control"
										id="rcm_dye_stainingback" value="<?php echo $rcekR['rcm_dye_stainingback']; ?>"
										placeholder="4 Color Staining With Paper" readonly>
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="rcm_dye_note" maxlength="50"
										readonly><?php echo $rcekR['rcm_dye_note']; ?></textarea>
								</div>
							</div>
							<!-- COLOR MIGRATION END-->
							<!-- LIGHT FASTNESS BEGIN-->
							<div class="form-group" id="c9" style="display:none;">
								<label for="light" class="col-sm-2 control-label">LIGHT FASTNESS</label>
								<div class="col-sm-2">
									<input name="light_rating1" type="text" class="form-control" id="light_rating1"
										value="<?php echo $rcek1['light_rating1']; ?>"
										placeholder="3 Color Change (rating1)">
								</div>
								<div class="col-sm-2">
									<input name="light_rating2" type="text" class="form-control" id="light_rating2"
										value="<?php echo $rcek1['light_rating2']; ?>"
										placeholder="4 Color Change (rating2)">
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="light_note" maxlength="50"
										rows="1"><?php echo $rcek1['light_note']; ?></textarea>
								</div>
							</div>
							<div class="form-group" id="stat_lg" style="display:none;">
								<label for="stat_lg" class="col-sm-2 control-label">STATUS</label>
								<div class="col-sm-2">
									<select name="stat_lg" class="form-control select2" id="stat_lg" onChange="tampil2();"
										style="width: 100%;">
										<option <?php if ($rcek1['stat_lg'] == "") { ?> selected=selected <?php }
										; ?>value="">
											Pilih</option>
										<option <?php if ($rcek1['stat_lg'] == "DISPOSISI") { ?> selected=selected <?php }
										; ?>value="DISPOSISI">DISPOSISI</option>
										<option <?php if ($rcek1['stat_lg'] == "A") { ?> selected=selected <?php }
										; ?>value="A">A
										</option>
										<option <?php if ($rcek1['stat_lg'] == "R") { ?> selected=selected <?php }
										; ?>value="R">R
										</option>
										<option <?php if ($rcek1['stat_lg'] == "PASS") { ?> selected=selected <?php }
										; ?>value="PASS">PASS</option>
										<option <?php if ($rcek1['stat_lg'] == "MARGINAL PASS") { ?> selected=selected <?php }
										; ?>value="MARGINAL PASS">MARGINAL PASS</option>
										<option <?php if ($rcek1['stat_lg'] == "DATA") { ?> selected=selected <?php }
										; ?>value="DATA">DATA</option>
										<option <?php if ($rcek1['stat_lg'] == "FAIL") { ?> selected=selected <?php }
										; ?>value="FAIL">FAIL</option>
										<option <?php if ($rcek1['stat_lg'] == "RANDOM") { ?> selected=selected <?php }
										; ?>value="RANDOM">RANDOM</option>
									</select>
								</div>
							</div>
							<div class="form-group" id="dislg" style="display:none;">
								<label for="dislg" class="col-sm-2 control-label">LIGHT FASTNESS (DIS)</label>
								<div class="col-sm-2">
									<input name="dlight_rating1" type="text" class="form-control" id="rlight_rating1"
										value="<?php echo $rcekD['dlight_rating1']; ?>"
										placeholder="3 Color Change (rating1)">
								</div>
								<div class="col-sm-2">
									<input name="dlight_rating2" type="text" class="form-control" id="rlight_rating2"
										value="<?php echo $rcekD['dlight_rating2']; ?>"
										placeholder="4 Color Change (rating2)">
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="dlight_note" maxlength="50"
										rows="1"><?php echo $rcekD['dlight_note']; ?></textarea>
								</div>
							</div>
							<div class="form-group" id="marlg" style="display:none;">
								<label for="marlg" class="col-sm-2 control-label">LIGHT FASTNESS (MARGINAL)</label>
								<div class="col-sm-2">
									<input name="mlight_rating1" type="text" class="form-control" id="mlight_rating1"
										value="<?php echo $rcekM['mlight_rating1']; ?>"
										placeholder="3 Color Change (rating1)">
								</div>
								<div class="col-sm-2">
									<input name="mlight_rating2" type="text" class="form-control" id="mlight_rating2"
										value="<?php echo $rcekM['mlight_rating2']; ?>"
										placeholder="4 Color Change (rating2)">
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="mlight_note" maxlength="50"
										rows="1"><?php echo $rcekM['mlight_note']; ?></textarea>
								</div>
							</div>
							<div class="form-group" id="ranlg" style="display:none;">
								<label for="ranlg" class="col-sm-2 control-label">LIGHT FASTNESS (RAN)</label>
								<div class="col-sm-2">
									<input name="rlight_rating1" type="text" class="form-control" id="rlight_rating1"
										value="<?php echo $rcekR['rlight_rating1']; ?>"
										placeholder="3 Color Change (rating1)" readonly>
								</div>
								<div class="col-sm-2">
									<input name="rlight_rating2" type="text" class="form-control" id="rlight_rating2"
										value="<?php echo $rcekR['rlight_rating2']; ?>"
										placeholder="4 Color Change (rating2)" readonly>
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="rlight_note" maxlength="50" rows="1"
										readonly><?php echo $rcekR['rlight_note']; ?></textarea>
								</div>
							</div>
							<!-- LIGHT FASTNESS END-->
							<!-- LIGHT PERSPIRATION BEGIN-->
							<div class="form-group" id="c10" style="display:none;">
								<label for="light_pers" class="col-sm-2 control-label">LIGHT PERSPIRATION FASTNESS</label>
								<div class="col-sm-2">
									<input name="light_pers_colorchange" type="text" class="form-control"
										id="light_pers_colorchange" value="<?php echo $rcek1['light_pers_colorchange']; ?>"
										placeholder="3-4 Color Change">
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="light_pers_note" maxlength="50"
										rows="1"><?php echo $rcek1['light_pers_note']; ?></textarea>
								</div>
							</div>
							<div class="form-group" id="stat_lp" style="display:none;">
								<label for="stat_lp" class="col-sm-2 control-label">STATUS</label>
								<div class="col-sm-2">
									<select name="stat_lp" class="form-control select2" id="stat_lp" onChange="tampil2();"
										style="width: 100%;">
										<option <?php if ($rcek1['stat_lp'] == "") { ?> selected=selected <?php }
										; ?>value="">
											Pilih</option>
										<option <?php if ($rcek1['stat_lp'] == "DISPOSISI") { ?> selected=selected <?php }
										; ?>value="DISPOSISI">DISPOSISI</option>
										<option <?php if ($rcek1['stat_lp'] == "A") { ?> selected=selected <?php }
										; ?>value="A">A
										</option>
										<option <?php if ($rcek1['stat_lp'] == "R") { ?> selected=selected <?php }
										; ?>value="R">R
										</option>
										<option <?php if ($rcek1['stat_lp'] == "PASS") { ?> selected=selected <?php }
										; ?>value="PASS">PASS</option>
										<option <?php if ($rcek1['stat_lp'] == "MARGINAL PASS") { ?> selected=selected <?php }
										; ?>value="MARGINAL PASS">MARGINAL PASS</option>
										<option <?php if ($rcek1['stat_lp'] == "DATA") { ?> selected=selected <?php }
										; ?>value="DATA">DATA</option>
										<option <?php if ($rcek1['stat_lp'] == "FAIL") { ?> selected=selected <?php }
										; ?>value="FAIL">FAIL</option>
										<option <?php if ($rcek1['stat_lp'] == "RANDOM") { ?> selected=selected <?php }
										; ?>value="RANDOM">RANDOM</option>
									</select>
								</div>
							</div>
							<div class="form-group" id="dislp" style="display:none;">
								<label for="dislp" class="col-sm-2 control-label">LIGHT PERSPIRATION FASTNESS (DIS)</label>
								<div class="col-sm-2">
									<input name="dlight_pers_colorchange" type="text" class="form-control"
										id="dlight_pers_colorchange"
										value="<?php echo $rcekD['dlight_pers_colorchange']; ?>"
										placeholder="3-4 Color Change">
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="dlight_pers_note" maxlength="50"
										rows="1"><?php echo $rcekD['dlight_pers_note']; ?></textarea>
								</div>
							</div>
							<div class="form-group" id="marlp" style="display:none;">
								<label for="marlp" class="col-sm-2 control-label">LIGHT PERSPIRATION FASTNESS
									(MARGINAL)</label>
								<div class="col-sm-2">
									<input name="mlight_pers_colorchange" type="text" class="form-control"
										id="mlight_pers_colorchange"
										value="<?php echo $rcekM['mlight_pers_colorchange']; ?>"
										placeholder="3-4 Color Change">
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="mlight_pers_note" maxlength="50"
										rows="1"><?php echo $rcekM['mlight_pers_note']; ?></textarea>
								</div>
							</div>
							<div class="form-group" id="ranlp" style="display:none;">
								<label for="ranlp" class="col-sm-2 control-label">LIGHT PERSPIRATION FASTNESS (RAN)</label>
								<div class="col-sm-2">
									<input name="rlight_pers_colorchange" type="text" class="form-control"
										id="rlight_pers_colorchange"
										value="<?php echo $rcekR['rlight_pers_colorchange']; ?>"
										placeholder="3-4 Color Change" readonly>
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="rlight_pers_note" maxlength="50" rows="1"
										readonly><?php echo $rcekR['rlight_pers_note']; ?></textarea>
								</div>
							</div>
							<!-- LIGHT PERSPIRATION END-->
							<!-- SALIVA BEGIN-->
							<div class="form-group" id="c11" style="display:none;">
								<label for="saliva" class="col-sm-2 control-label">SALIVA FASTNESS</label>
								<div class="col-sm-2">
									<input name="saliva_staining" type="text" class="form-control" id="saliva_staining"
										value="<?php echo $rcek1['saliva_staining']; ?>" placeholder="4-5 Color Staining">
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="saliva_note" maxlength="50"
										rows="1"><?php echo $rcek1['saliva_note']; ?></textarea>
								</div>
							</div>
							<div class="form-group" id="stat_slv" style="display:none;">
								<label for="stat_slv" class="col-sm-2 control-label">STATUS</label>
								<div class="col-sm-2">
									<select name="stat_slv" class="form-control select2" id="stat_slv" onChange="tampil2();"
										style="width: 100%;">
										<option <?php if ($rcek1['stat_slv'] == "") { ?> selected=selected <?php }
										; ?>value="">
											Pilih</option>
										<option <?php if ($rcek1['stat_slv'] == "DISPOSISI") { ?> selected=selected <?php }
										; ?>value="DISPOSISI">DISPOSISI</option>
										<option <?php if ($rcek1['stat_slv'] == "A") { ?> selected=selected <?php }
										; ?>value="A">A
										</option>
										<option <?php if ($rcek1['stat_slv'] == "R") { ?> selected=selected <?php }
										; ?>value="R">R
										</option>
										<option <?php if ($rcek1['stat_slv'] == "PASS") { ?> selected=selected <?php }
										; ?>value="PASS">PASS</option>
										<option <?php if ($rcek1['stat_slv'] == "FAIL") { ?> selected=selected <?php }
										; ?>value="FAIL">FAIL</option>
										<option <?php if ($rcek1['stat_slv'] == "RANDOM") { ?> selected=selected <?php }
										; ?>value="RANDOM">RANDOM</option>
									</select>
								</div>
							</div>
							<div class="form-group" id="disslv" style="display:none;">
								<label for="disslv" class="col-sm-2 control-label">SALIVA FASTNESS (DIS)</label>
								<div class="col-sm-2">
									<input name="dsaliva_staining" type="text" class="form-control" id="dsaliva_staining"
										value="<?php echo $rcekD['dsaliva_staining']; ?>" placeholder="4-5 Color Staining">
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="dsaliva_note" maxlength="50"
										rows="1"><?php echo $rcekD['dsaliva_note']; ?></textarea>
								</div>
							</div>
							<div class="form-group" id="ranslv" style="display:none;">
								<label for="ranslv" class="col-sm-2 control-label">SALIVA FASTNESS (RAN)</label>
								<div class="col-sm-2">
									<input name="rsaliva_staining" type="text" class="form-control" id="rsaliva_staining"
										value="<?php echo $rcekR['rsaliva_staining']; ?>" placeholder="4-5 Color Staining"
										readonly>
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="rsaliva_note" maxlength="50" rows="1"
										readonly><?php echo $rcekR['rsaliva_note']; ?></textarea>
								</div>
							</div>
							<!-- SALIVA END-->
							<!-- BLEEDING BEGIN-->
							<div class="form-group" id="c12" style="display:none;">
								<label for="bleeding" class="col-sm-2 control-label">BLEEDING</label>

								<div class="col-sm-2">
									<input name="bleeding" type="text" class="form-control" id="bleeding"
										value="<?php echo $rcek1['bleeding']; ?>" placeholder="Watermark">
								</div>
								<div class="col-sm-2">
									<input name="bleeding_root" type="text" class="form-control"
										value="<?php echo $tq_test_2_array['bleeding_root']; ?>" placeholder="Root">
								</div>

								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="bleeding_note" maxlength="50"
										rows="1"><?php echo $rcek1['bleeding_note']; ?></textarea>
								</div>
							</div>
							<div class="form-group" id="stat_bld" style="display:none;">
								<label for="stat_bld" class="col-sm-2 control-label">STATUS</label>
								<div class="col-sm-2">
									<select name="stat_bld" class="form-control select2" id="stat_bld" onChange="tampil2();"
										style="width: 100%;">
										<option <?php if ($rcek1['stat_bld'] == "") { ?> selected=selected <?php }
										; ?>value="">
											Pilih</option>
										<option <?php if ($rcek1['stat_bld'] == "DISPOSISI") { ?> selected=selected <?php }
										; ?>value="DISPOSISI">DISPOSISI</option>
										<option <?php if ($rcek1['stat_bld'] == "A") { ?> selected=selected <?php }
										; ?>value="A">A
										</option>
										<option <?php if ($rcek1['stat_bld'] == "R") { ?> selected=selected <?php }
										; ?>value="R">R
										</option>
										<option <?php if ($rcek1['stat_bld'] == "PASS") { ?> selected=selected <?php }
										; ?>value="PASS">PASS</option>
										<option <?php if ($rcek1['stat_bld'] == "FAIL") { ?> selected=selected <?php }
										; ?>value="FAIL">FAIL</option>
										<option <?php if ($rcek1['stat_bld'] == "RANDOM") { ?> selected=selected <?php }
										; ?>value="RANDOM">RANDOM</option>
									</select>
								</div>
							</div>
							<div class="form-group" id="disbld" style="display:none;">
								<label for="disbld" class="col-sm-2 control-label">BLEEDING (DIS)</label>
								<div class="col-sm-2">
									<input name="dbleeding" type="text" class="form-control" id="dbleeding"
										value="<?php echo $rcekD['dbleeding']; ?>" placeholder="Watermark">
								</div>
								<div class="col-sm-2">
									<input name="dbleeding_root" type="text" class="form-control"
										value="<?php echo $rcekD['dbleeding_root']; ?>" placeholder="Root">
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="dbleeding_note" maxlength="50"
										rows="1"><?php echo $rcekD['dbleeding_note']; ?></textarea>
								</div>
							</div>
							<div class="form-group" id="ranbld" style="display:none;">
								<label for="ranbld" class="col-sm-2 control-label">BLEEDING (RAN)</label>
								<div class="col-sm-2">
									<input name="rbleeding" type="text" class="form-control" id="rbleeding"
										value="<?php echo $rcekR['rbleeding']; ?>" placeholder="Color Staining" readonly>
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="rbleeding_note" maxlength="50" rows="1"
										readonly><?php echo $rcekR['rbleeding_note']; ?></textarea>
								</div>
							</div>
							<!-- BLEEDING END-->
							<!-- CHLORIN BEGIN-->
							<div class="form-group" id="c13" style="display:none;">
								<label for="chlorin" class="col-sm-2 control-label">CHLORIN</label>
								<div class="col-sm-2">
									<input name="chlorin" type="text" class="form-control" id="chlorin"
										value="<?php echo $rcek1['chlorin']; ?>" placeholder="">
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="chlorin_note" maxlength="50"
										rows="1"><?php echo $rcek1['chlorin_note']; ?></textarea>
								</div>
							</div>
							<div class="form-group" id="stat_chl" style="display:none;">
								<label for="stat_chl" class="col-sm-2 control-label">STATUS</label>
								<div class="col-sm-2">
									<select name="stat_chl" class="form-control select2" id="stat_chl" onChange="tampil2();"
										style="width: 100%;">
										<option <?php if ($rcek1['stat_chl'] == "") { ?> selected=selected <?php }
										; ?>value="">
											Pilih</option>
										<option <?php if ($rcek1['stat_chl'] == "DISPOSISI") { ?> selected=selected <?php }
										; ?>value="DISPOSISI">DISPOSISI</option>
										<option <?php if ($rcek1['stat_chl'] == "A") { ?> selected=selected <?php }
										; ?>value="A">A
										</option>
										<option <?php if ($rcek1['stat_chl'] == "R") { ?> selected=selected <?php }
										; ?>value="R">R
										</option>
										<option <?php if ($rcek1['stat_chl'] == "PASS") { ?> selected=selected <?php }
										; ?>value="PASS">PASS</option>
										<option <?php if ($rcek1['stat_chl'] == "FAIL") { ?> selected=selected <?php }
										; ?>value="FAIL">FAIL</option>
										<option <?php if ($rcek1['stat_chl'] == "RANDOM") { ?> selected=selected <?php }
										; ?>value="RANDOM">RANDOM</option>
									</select>
								</div>
							</div>
							<div class="form-group" id="dischl" style="display:none;">
								<label for="dischl" class="col-sm-2 control-label">CHLORIN (DIS)</label>
								<div class="col-sm-2">
									<input name="dchlorin" type="text" class="form-control" id="dchlorin"
										value="<?php echo $rcekD['dchlorin']; ?>" placeholder="">
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="dchlorin_note" maxlength="50"
										rows="1"><?php echo $rcekD['dchlorin_note']; ?></textarea>
								</div>
							</div>
							<div class="form-group" id="ranchl" style="display:none;">
								<label for="ranchl" class="col-sm-2 control-label">CHLORIN (RAN)</label>
								<div class="col-sm-2">
									<input name="rchlorin" type="text" class="form-control" id="rchlorin"
										value="<?php echo $rcekR['rchlorin']; ?>" placeholder="" readonly>
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="rchlorin_note" maxlength="50" rows="1"
										readonly><?php echo $rcekR['rchlorin_note']; ?></textarea>
								</div>
							</div>
							<!-- CHLORIN END-->
							<!-- NON CHLORIN BEGIN-->
							<div class="form-group" id="c14" style="display:none;">
								<label for="nchlorin" class="col-sm-2 control-label">NON-CHLORIN</label>
								<div class="col-sm-2">
									<input name="nchlorin1" type="text" class="form-control" id="nchlorin1"
										value="<?php echo $rcek1['nchlorin1']; ?>" placeholder="">
									<input name="nchlorin2" type="text" class="form-control" id="nchlorin2"
										value="<?php echo $rcek1['nchlorin2']; ?>" placeholder="">
								</div>
							</div>
							<div class="form-group" id="stat_nchl" style="display:none;">
								<label for="stat_nchl" class="col-sm-2 control-label">STATUS</label>
								<div class="col-sm-2">
									<select name="stat_nchl" class="form-control select2" id="stat_nchl"
										onChange="tampil2();" style="width: 100%;">
										<option <?php if ($rcek1['stat_nchl'] == "") { ?> selected=selected <?php }
										; ?>value="">
											Pilih</option>
										<option <?php if ($rcek1['stat_nchl'] == "DISPOSISI") { ?> selected=selected <?php }
										; ?>value="DISPOSISI">DISPOSISI</option>
										<option <?php if ($rcek1['stat_nchl'] == "A") { ?> selected=selected <?php }
										; ?>value="A">
											A</option>
										<option <?php if ($rcek1['stat_nchl'] == "R") { ?> selected=selected <?php }
										; ?>value="R">
											R</option>
										<option <?php if ($rcek1['stat_nchl'] == "PASS") { ?> selected=selected <?php }
										; ?>value="PASS">PASS</option>
										<option <?php if ($rcek1['stat_nchl'] == "FAIL") { ?> selected=selected <?php }
										; ?>value="FAIL">FAIL</option>
										<option <?php if ($rcek1['stat_nchl'] == "RANDOM") { ?> selected=selected <?php }
										; ?>value="RANDOM">RANDOM</option>
									</select>
								</div>
							</div>
							<div class="form-group" id="disnchl" style="display:none;">
								<label for="disnchl" class="col-sm-2 control-label">NON CHLORIN (DIS)</label>
								<div class="col-sm-2">
									<input name="dnchlorin1" type="text" class="form-control" id="dnchlorin1"
										value="<?php echo $rcekD['dnchlorin1']; ?>" placeholder="">
									<input name="dnchlorin2" type="text" class="form-control" id="dnchlorin2"
										value="<?php echo $rcekD['dnchlorin2']; ?>" placeholder="">
								</div>
							</div>
							<div class="form-group" id="rannchl" style="display:none;">
								<label for="rannchl" class="col-sm-2 control-label">NON CHLORIN (RAN)</label>
								<div class="col-sm-2">
									<input name="rnchlorin1" type="text" class="form-control" id="rnchlorin1"
										value="<?php echo $rcekR['rnchlorin1']; ?>" placeholder="" readonly>
									<input name="rnchlorin2" type="text" class="form-control" id="rnchlorin2"
										value="<?php echo $rcekR['rnchlorin2']; ?>" placeholder="" readonly>
								</div>
							</div>
							<!-- NON CHLORIN END-->
							<!-- DYE TRANSFER BEGIN-->
							<div class="form-group" id="c15" style="display:none;">
								<label for="dye_tf" class="col-sm-2 control-label">DYE TRANSFER</label>
								<div class="col-sm-2">
									<input name="dye_tf_acetate" type="text" class="form-control" id="dye_tf_acetate"
										value="<?php echo $rcek1['dye_tf_acetate']; ?>" placeholder="Acetate">
									<input name="dye_tf_cotton" type="text" class="form-control" id="dye_tf_cotton"
										value="<?php echo $rcek1['dye_tf_cotton']; ?>" placeholder="Cotton">
								</div>
								<div class="col-sm-2">
									<input name="dye_tf_nylon" type="text" class="form-control" id="dye_tf_nylon"
										value="<?php echo $rcek1['dye_tf_nylon']; ?>" placeholder="Nylon">
									<input name="dye_tf_poly" type="text" class="form-control" id="dye_tf_poly"
										value="<?php echo $rcek1['dye_tf_poly']; ?>" placeholder="Polyester">
								</div>
								<div class="col-sm-2">
									<input name="dye_tf_acrylic" type="text" class="form-control" id="dye_tf_acrylic"
										value="<?php echo $rcek1['dye_tf_acrylic']; ?>" placeholder="Acrylic">
									<input name="dye_tf_wool" type="text" class="form-control" id="dye_tf_wool"
										value="<?php echo $rcek1['dye_tf_wool']; ?>" placeholder="Wool">
								</div>
								<div class="col-sm-2">
									<input name="dye_tf_sstaining" type="text" class="form-control" id="dye_tf_sstaining"
										value="<?php echo $rcek1['dye_tf_sstaining']; ?>" placeholder="Self Staining">
									<input name="dye_tf_cstaining" type="text" class="form-control" id="dye_tf_cstaining"
										value="<?php echo $rcek1['dye_tf_cstaining']; ?>" placeholder="Color Staining">
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="dye_tf_note" maxlength="50"
										rows="1"><?php echo $rcek1['dye_tf_note']; ?></textarea>
								</div>
							</div>
							<div class="form-group" id="stat_dye" style="display:none;">
								<label for="stat_dye" class="col-sm-2 control-label">STATUS</label>
								<div class="col-sm-2">
									<select name="stat_dye" class="form-control select2" id="stat_dye" onChange="tampil2();"
										style="width: 100%;">
										<option <?php if ($rcek1['stat_dye'] == "") { ?> selected=selected <?php }
										; ?>value="">
											Pilih</option>
										<option <?php if ($rcek1['stat_dye'] == "DISPOSISI") { ?> selected=selected <?php }
										; ?>value="DISPOSISI">DISPOSISI</option>
										<option <?php if ($rcek1['stat_dye'] == "A") { ?> selected=selected <?php }
										; ?>value="A">A
										</option>
										<option <?php if ($rcek1['stat_dye'] == "R") { ?> selected=selected <?php }
										; ?>value="R">R
										</option>
										<option <?php if ($rcek1['stat_dye'] == "PASS") { ?> selected=selected <?php }
										; ?>value="PASS">PASS</option>
										<option <?php if ($rcek1['stat_dye'] == "MARGINAL PASS") { ?> selected=selected <?php }
										; ?>value="MARGINAL PASS">MARGINAL PASS</option>
										<option <?php if ($rcek1['stat_dye'] == "DATA") { ?> selected=selected <?php }
										; ?>value="DATA">DATA</option>
										<option <?php if ($rcek1['stat_dye'] == "FAIL") { ?> selected=selected <?php }
										; ?>value="FAIL">FAIL</option>
										<option <?php if ($rcek1['stat_dye'] == "RANDOM") { ?> selected=selected <?php }
										; ?>value="RANDOM">RANDOM</option>
									</select>
								</div>
							</div>
							<div class="form-group" id="disdye" style="display:none;">
								<label for="disdye" class="col-sm-2 control-label">DYE TRANSFER (DIS)</label>
								<div class="col-sm-2">
									<input name="ddye_tf_acetate" type="text" class="form-control" id="ddye_tf_acetate"
										value="<?php echo $rcekD['ddye_tf_acetate']; ?>" placeholder="Acetate">
									<input name="ddye_tf_cotton" type="text" class="form-control" id="ddye_tf_cotton"
										value="<?php echo $rcekD['ddye_tf_cotton']; ?>" placeholder="Cotton">
								</div>
								<div class="col-sm-2">
									<input name="ddye_tf_nylon" type="text" class="form-control" id="ddye_tf_nylon"
										value="<?php echo $rcekD['ddye_tf_nylon']; ?>" placeholder="Nylon">
									<input name="ddye_tf_poly" type="text" class="form-control" id="ddye_tf_poly"
										value="<?php echo $rcekD['ddye_tf_poly']; ?>" placeholder="Polyester">
								</div>
								<div class="col-sm-2">
									<input name="ddye_tf_acrylic" type="text" class="form-control" id="ddye_tf_acrylic"
										value="<?php echo $rcekD['ddye_tf_acrylic']; ?>" placeholder="Acrylic">
									<input name="ddye_tf_wool" type="text" class="form-control" id="ddye_tf_wool"
										value="<?php echo $rcekD['ddye_tf_wool']; ?>" placeholder="Wool">
								</div>
								<div class="col-sm-2">
									<input name="ddye_tf_cstaining" type="text" class="form-control" id="ddye_tf_cstaining"
										value="<?php echo $rcekD['ddye_tf_cstaining']; ?>" placeholder="Color Staining">
									<input name="ddye_tf_sstaining" type="text" class="form-control" id="ddye_tf_sstaining"
										value="<?php echo $rcekD['ddye_tf_sstaining']; ?>" placeholder="Self Staining">
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="ddye_tf_note" maxlength="50"
										rows="1"><?php echo $rcekD['ddye_tf_note']; ?></textarea>
								</div>
							</div>
							<div class="form-group" id="mardye" style="display:none;">
								<label for="mardye" class="col-sm-2 control-label">DYE TRANSFER (MARGINAL)</label>
								<div class="col-sm-2">
									<input name="mdye_tf_acetate" type="text" class="form-control" id="mdye_tf_acetate"
										value="<?php echo $rcekM['mdye_tf_acetate']; ?>" placeholder="Acetate">
									<input name="mdye_tf_cotton" type="text" class="form-control" id="mdye_tf_cotton"
										value="<?php echo $rcekM['mdye_tf_cotton']; ?>" placeholder="Cotton">
								</div>
								<div class="col-sm-2">
									<input name="mdye_tf_nylon" type="text" class="form-control" id="mdye_tf_nylon"
										value="<?php echo $rcekM['mdye_tf_nylon']; ?>" placeholder="Nylon">
									<input name="mdye_tf_poly" type="text" class="form-control" id="mdye_tf_poly"
										value="<?php echo $rcekM['mdye_tf_poly']; ?>" placeholder="Polyester">
								</div>
								<div class="col-sm-2">
									<input name="mdye_tf_acrylic" type="text" class="form-control" id="mdye_tf_acrylic"
										value="<?php echo $rcekM['mdye_tf_acrylic']; ?>" placeholder="Acrylic">
									<input name="mdye_tf_wool" type="text" class="form-control" id="mdye_tf_wool"
										value="<?php echo $rcekM['mdye_tf_wool']; ?>" placeholder="Wool">
								</div>
								<div class="col-sm-2">
									<input name="mdye_tf_cstaining" type="text" class="form-control" id="mdye_tf_cstaining"
										value="<?php echo $rcekM['mdye_tf_cstaining']; ?>" placeholder="Color Staining">
									<input name="mdye_tf_sstaining" type="text" class="form-control" id="mdye_tf_sstaining"
										value="<?php echo $rcekM['mdye_tf_sstaining']; ?>" placeholder="Self Staining">
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="mdye_tf_note" maxlength="50"
										rows="1"><?php echo $rcekM['mdye_tf_note']; ?></textarea>
								</div>
							</div>
							<div class="form-group" id="randye" style="display:none;">
								<label for="randye" class="col-sm-2 control-label">DYE TRANSFER (RAN)</label>
								<div class="col-sm-2">
									<input name="rdye_tf_acetate" type="text" class="form-control" id="rdye_tf_acetate"
										value="<?php echo $rcekR['rdye_tf_acetate']; ?>" placeholder="Acetate" readonly>
									<input name="rdye_tf_cotton" type="text" class="form-control" id="rdye_tf_cotton"
										value="<?php echo $rcekR['rdye_tf_cotton']; ?>" placeholder="Cotton" readonly>
								</div>
								<div class="col-sm-2">
									<input name="rdye_tf_nylon" type="text" class="form-control" id="rdye_tf_nylon"
										value="<?php echo $rcekR['rdye_tf_nylon']; ?>" placeholder="Nylon" readonly>
									<input name="rdye_tf_poly" type="text" class="form-control" id="rdye_tf_poly"
										value="<?php echo $rcekR['rdye_tf_poly']; ?>" placeholder="Polyester" readonly>
								</div>
								<div class="col-sm-2">
									<input name="rdye_tf_acrylic" type="text" class="form-control" id="rdye_tf_acrylic"
										value="<?php echo $rcekR['rdye_tf_acrylic']; ?>" placeholder="Acrylic" readonly>
									<input name="rdye_tf_wool" type="text" class="form-control" id="rdye_tf_wool"
										value="<?php echo $rcekR['rdye_tf_wool']; ?>" placeholder="Wool" readonly>
								</div>
								<div class="col-sm-2">
									<input name="rdye_tf_cstaining" type="text" class="form-control" id="rdye_tf_cstaining"
										value="<?php echo $rcekR['rdye_tf_cstaining']; ?>" placeholder="Color Staining"
										readonly>
									<input name="rdye_tf_sstaining" type="text" class="form-control" id="rdye_tf_sstaining"
										value="<?php echo $rcekR['rdye_tf_sstaining']; ?>" placeholder="Self Staining"
										readonly>
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="rdye_tf_note" maxlength="50" rows="1"
										readonly><?php echo $rcekR['rdye_tf_note']; ?></textarea>
								</div>
							</div>
							<!-- DYE TRANSFER END-->
							<div class="form-group">
								<?php if ($notes != "") { ?>
									<button type="submit" class="btn btn-primary pull-right" name="colorfastness_save"
										value="save"><i class="fa fa-save"></i> Simpan</button>
								<?php } ?>
							</div>
						</form>
					</div>
					<div class="tab-pane" id="tab_3">
						<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form3"
							id="form3">
							<div class="form-group">
								<label for="jnstest1" class="col-sm-2 control-label">JENIS TES</label>
								<div class="col-sm-3">
									<select name="jns_test1" class="form-control select2" id="jns_test1"
										onChange="tampil1();" style="width: 100%;">
										<option value="">Pilih</option>
										<?php
										$sql = "SELECT a.*, b.* From tbl_tq_nokk a INNER JOIN tbl_master_test b ON a.no_test=b.no_testmaster WHERE no_test='$rcek[no_test]'";
										$result = mysqli_query($con, $sql);
										while ($row = mysqli_fetch_array($result)) {
											$detail = explode(",", $row['functional']); ?>
											<?php foreach ($detail as $key => $value):
												echo '<option value="' . $value . '">' . $value . '</option>';
											endforeach;
											?>
										<?php } ?>
									</select>
								</div>
							</div>
							<!-- WICKING BEGIN-->
							<div class="form-group" id="f1" style="display:none;">
								<label for="wicking" class="col-sm-2 control-label">WICKING LENGTH</label>
								<div class="col-sm-2">
									<input name="wick_l1" type="text" class="form-control" id="wick_l1"
										value="<?php echo $rcek1['wick_l1']; ?>" placeholder="Before Wash">
								</div>
								<div class="col-sm-2">
									<input name="wick_l3" type="text" class="form-control" id="wick_l3"
										value="<?php echo $rcek1['wick_l3']; ?>" placeholder="Before Wash">
									<!-- <input name="wick_l2" type="text" class="form-control" id="wick_l2" value="<?php echo $rcek1['wick_l2']; ?>" placeholder="LEN 2">
									<input name="wick_w2" type="text" class="form-control" id="wick_w2" value="<?php echo $rcek1['wick_w2']; ?>" placeholder="WID 2"> -->
								</div>
								<!--<div class="col-sm-1">
									<input name="wick_l3" type="text" class="form-control" id="wick_l3" value="<?php echo $rcek1['wick_l3']; ?>" placeholder="LEN 3">
									<input name="wick_w3" type="text" class="form-control" id="wick_w3" value="<?php echo $rcek1['wick_w3']; ?>" placeholder="WID 3">
								</div>-->
								<div class="col-sm-2">
									<select name="stat_wic" class="form-control select2" id="stat_wic" onChange="tampil1();"
										style="width: 100%;">
										<option <?php if ($rcek1['stat_wic'] == "") { ?> selected=selected <?php }
										; ?>value="">
											Pilih</option>
										<option <?php if ($rcek1['stat_wic'] == "DISPOSISI") { ?> selected=selected <?php }
										; ?>value="DISPOSISI">DISPOSISI</option>
										<option <?php if ($rcek1['stat_wic'] == "A") { ?> selected=selected <?php }
										; ?>value="A">A
										</option>
										<option <?php if ($rcek1['stat_wic'] == "R") { ?> selected=selected <?php }
										; ?>value="R">R
										</option>
										<option <?php if ($rcek1['stat_wic'] == "PASS") { ?> selected=selected <?php }
										; ?>value="PASS">PASS</option>
										<option <?php if ($rcek1['stat_wic'] == "MARGINAL PASS") { ?> selected=selected <?php }
										; ?>value="MARGINAL PASS">MARGINAL PASS</option>
										<option <?php if ($rcek1['stat_wic'] == "DATA") { ?> selected=selected <?php }
										; ?>value="DATA">DATA</option>
										<option <?php if ($rcek1['stat_wic'] == "FAIL") { ?> selected=selected <?php }
										; ?>value="FAIL">FAIL</option>
										<option <?php if ($rcek1['stat_wic'] == "RANDOM") { ?> selected=selected <?php }
										; ?>value="RANDOM">RANDOM</option>
									</select>
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="wick_note" maxlength="50"><?php echo $rcek1['wick_note']; ?></textarea>
								</div>
							</div>
							<div class="form-group" id="diswic" style="display:none;">
								<label for="diswic" class="col-sm-2 control-label">WICKING LENGTH (DIS)</label>
								<div class="col-sm-2">
									<input name="dwick_l1" type="text" class="form-control" id="dwick_l1"
										value="<?php echo $rcekD['dwick_l1']; ?>" placeholder="Before Wash">
								</div>
								<div class="col-sm-2">
									<input name="dwick_l3" type="text" class="form-control" id="dwick_l3"
										value="<?php echo $rcekD['dwick_l3']; ?>" placeholder="Before Wash">
									<!-- <input name="dwick_l2" type="text" class="form-control" id="dwick_l2" value="<?php echo $rcekD['dwick_l2']; ?>" placeholder="LEN 2">
									<input name="dwick_w2" type="text" class="form-control" id="dwick_w2" value="<?php echo $rcekD['dwick_w2']; ?>" placeholder="WID 2"> -->
								</div>
								<!--<div class="col-sm-1">
									<input name="dwick_l3" type="text" class="form-control" id="dwick_l3" value="<?php echo $rcekD['dwick_l3']; ?>" placeholder="LEN 3">
									<input name="dwick_w3" type="text" class="form-control" id="dwick_w3" value="<?php echo $rcekD['dwick_w3']; ?>" placeholder="WID 3">
								</div>-->
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="dwick_note" maxlength="50"><?php echo $rcekD['dwick_note']; ?></textarea>
								</div>
							</div>
							<div class="form-group" id="marwic" style="display:none;">
								<label for="marwic" class="col-sm-2 control-label">WICKING LENGTH (MARGINAL)</label>
								<div class="col-sm-2">
									<input name="mwick_l1" type="text" class="form-control" id="mwick_l1"
										value="<?php echo $rcekM['mwick_l1']; ?>" placeholder="Before Wash">
								</div>
								<div class="col-sm-2">
									<input name="mwick_l3" type="text" class="form-control" id="mwick_l3"
										value="<?php echo $rcekM['mwick_l3']; ?>" placeholder="Before Wash">
									<!-- <input name="dwick_l2" type="text" class="form-control" id="dwick_l2" value="<?php echo $rcekM['dwick_l2']; ?>" placeholder="LEN 2">
									<input name="dwick_w2" type="text" class="form-control" id="dwick_w2" value="<?php echo $rcekM['dwick_w2']; ?>" placeholder="WID 2"> -->
								</div>
								<!--<div class="col-sm-1">
									<input name="dwick_l3" type="text" class="form-control" id="dwick_l3" value="<?php echo $rcekM['dwick_l3']; ?>" placeholder="LEN 3">
									<input name="dwick_w3" type="text" class="form-control" id="dwick_w3" value="<?php echo $rcekM['dwick_w3']; ?>" placeholder="WID 3">
								</div>-->
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="mwick_note" maxlength="50"><?php echo $rcekM['mwick_note']; ?></textarea>
								</div>
							</div>
							<div class="form-group" id="ranwic" style="display:none;">
								<label for="ranwic" class="col-sm-2 control-label">WICKING LENGTH (RAN)</label>
								<div class="col-sm-2">
									<input name="rwick_l1" type="text" class="form-control" id="rwick_l1"
										value="<?php echo $rcekR['rwick_l1']; ?>" placeholder="Before Wash" readonly>
								</div>
								<div class="col-sm-2">
									<input name="rwick_l3" type="text" class="form-control" id="rwick_l3"
										value="<?php echo $rcekR['rwick_l3']; ?>" placeholder="Before Wash" readonly>
									<!-- <input name="rwick_l2" type="text" class="form-control" id="rwick_l2" value="<?php echo $rcekR['rwick_l2']; ?>" placeholder="LEN 2">
									<input name="rwick_w2" type="text" class="form-control" id="rwick_w2" value="<?php echo $rcekR['rwick_w2']; ?>" placeholder="WID 2"> -->
								</div>
								<!--<div class="col-sm-1">
									<input name="rwick_l3" type="text" class="form-control" id="rwick_l3" value="<?php echo $rcekR['rwick_l3']; ?>" placeholder="LEN 3">
									<input name="rwick_w3" type="text" class="form-control" id="rwick_w3" value="<?php echo $rcekR['rwick_w3']; ?>" placeholder="WID 3">
								</div>-->
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="rwick_note" maxlength="50"
										readonly><?php echo $rcekR['rwick_note']; ?></textarea>
								</div>
							</div>
							<div class="form-group" id="f9" style="display:none;">
								<label for="wicking" class="col-sm-2 control-label"></label>
								<div class="col-sm-2">
									<input name="wick_l2" type="text" class="form-control" id="wick_l2"
										value="<?php echo $rcek1['wick_l2']; ?>" placeholder="After Wash">
								</div>
								<div class="col-sm-2">
									<input name="wick_l4" type="text" class="form-control" id="wick_l4"
										value="<?php echo $rcek1['wick_l4']; ?>" placeholder="After Wash">
									<!-- <input name="wick_l2" type="text" class="form-control" id="wick_l2" value="<?php echo $rcek1['wick_l2']; ?>" placeholder="LEN 2">
									<input name="wick_w2" type="text" class="form-control" id="wick_w2" value="<?php echo $rcek1['wick_w2']; ?>" placeholder="WID 2"> -->
								</div>
								<!--<div class="col-sm-1">
									<input name="wick_l3" type="text" class="form-control" id="wick_l3" value="<?php echo $rcek1['wick_l3']; ?>" placeholder="LEN 3">
									<input name="wick_w3" type="text" class="form-control" id="wick_w3" value="<?php echo $rcek1['wick_w3']; ?>" placeholder="WID 3">
								</div>-->
								<div class="col-sm-2">
									<select name="stat_wic2" class="form-control select2" id="stat_wic2"
										onChange="tampil1();" style="width: 100%;">
										<option <?php if ($rcek1['stat_wic2'] == "") { ?> selected=selected <?php }
										; ?>value="">
											Pilih</option>
										<option <?php if ($rcek1['stat_wic2'] == "DISPOSISI") { ?> selected=selected <?php }
										; ?>value="DISPOSISI">DISPOSISI</option>
										<option <?php if ($rcek1['stat_wic2'] == "A") { ?> selected=selected <?php }
										; ?>value="A">
											A</option>
										<option <?php if ($rcek1['stat_wic2'] == "R") { ?> selected=selected <?php }
										; ?>value="R">
											R</option>
										<option <?php if ($rcek1['stat_wic2'] == "PASS") { ?> selected=selected <?php }
										; ?>value="PASS">PASS</option>
										<option <?php if ($rcek1['stat_wic2'] == "MARGINAL PASS") { ?> selected=selected <?php }
										; ?>value="MARGINAL PASS">MARGINAL PASS</option>
										<option <?php if ($rcek1['stat_wic2'] == "DATA") { ?> selected=selected <?php }
										; ?>value="DATA">DATA</option>
										<option <?php if ($rcek1['stat_wic2'] == "FAIL") { ?> selected=selected <?php }
										; ?>value="FAIL">FAIL</option>
										<option <?php if ($rcek1['stat_wic2'] == "RANDOM") { ?> selected=selected <?php }
										; ?>value="RANDOM">RANDOM</option>
									</select>
								</div>
							</div>
							<!--<div class="form-group" id="stat_wic" style="display:none;">
								<label for="stat_wic" class="col-sm-2 control-label">STATUS</label>

								</div>-->
							<div class="form-group" id="diswic2" style="display:none;">
								<label for="diswic2" class="col-sm-2 control-label">WICKING LENGTH (DIS)</label>
								<div class="col-sm-2">
									<input name="dwick_l2" type="text" class="form-control" id="dwick_l2"
										value="<?php echo $rcekD['dwick_l2']; ?>" placeholder="After Wash">
								</div>
								<div class="col-sm-2">
									<input name="dwick_l4" type="text" class="form-control" id="dwick_l4"
										value="<?php echo $rcekD['dwick_l4']; ?>" placeholder="After Wash">
									<!-- <input name="dwick_l2" type="text" class="form-control" id="dwick_l2" value="<?php echo $rcekD['dwick_l2']; ?>" placeholder="LEN 2">
									<input name="dwick_w2" type="text" class="form-control" id="dwick_w2" value="<?php echo $rcekD['dwick_w2']; ?>" placeholder="WID 2"> -->
								</div>
								<!--<div class="col-sm-1">
									<input name="dwick_l3" type="text" class="form-control" id="dwick_l3" value="<?php echo $rcekD['dwick_l3']; ?>" placeholder="LEN 3">
									<input name="dwick_w3" type="text" class="form-control" id="dwick_w3" value="<?php echo $rcekD['dwick_w3']; ?>" placeholder="WID 3">
								</div>-->
							</div>
							<div class="form-group" id="marwic2" style="display:none;">
								<label for="marwic2" class="col-sm-2 control-label">WICKING LENGTH (MARGINAL)</label>
								<div class="col-sm-2">
									<input name="mwick_l2" type="text" class="form-control" id="mwick_l2"
										value="<?php echo $rcekM['mwick_l2']; ?>" placeholder="After Wash">
								</div>
								<div class="col-sm-2">
									<input name="mwick_l4" type="text" class="form-control" id="mwick_l4"
										value="<?php echo $rcekM['mwick_l4']; ?>" placeholder="After Wash">
									<!-- <input name="dwick_l2" type="text" class="form-control" id="dwick_l2" value="<?php echo $rcekD['dwick_l2']; ?>" placeholder="LEN 2">
									<input name="dwick_w2" type="text" class="form-control" id="dwick_w2" value="<?php echo $rcekD['dwick_w2']; ?>" placeholder="WID 2"> -->
								</div>
								<!--<div class="col-sm-1">
									<input name="dwick_l3" type="text" class="form-control" id="dwick_l3" value="<?php echo $rcekD['dwick_l3']; ?>" placeholder="LEN 3">
									<input name="dwick_w3" type="text" class="form-control" id="dwick_w3" value="<?php echo $rcekD['dwick_w3']; ?>" placeholder="WID 3">
								</div>-->
							</div>
							<div class="form-group" id="ranwic2" style="display:none;">
								<label for="ranwic2" class="col-sm-2 control-label">WICKING LENGTH (RAN)</label>
								<div class="col-sm-2">
									<input name="rwick_l2" type="text" class="form-control" id="rwick_l2"
										value="<?php echo $rcekR['rwick_l2']; ?>" placeholder="After Wash" readonly>
								</div>
								<div class="col-sm-2">
									<input name="rwick_l4" type="text" class="form-control" id="rwick_l4"
										value="<?php echo $rcekR['rwick_l4']; ?>" placeholder="After Wash" readonly>
									<!-- <input name="rwick_l2" type="text" class="form-control" id="rwick_l2" value="<?php echo $rcekR['rwick_l2']; ?>" placeholder="LEN 2">
									<input name="rwick_w2" type="text" class="form-control" id="rwick_w2" value="<?php echo $rcekR['rwick_w2']; ?>" placeholder="WID 2"> -->
								</div>
								<!--<div class="col-sm-1">
									<input name="rwick_l3" type="text" class="form-control" id="rwick_l3" value="<?php echo $rcekR['rwick_l3']; ?>" placeholder="LEN 3">
									<input name="rwick_w3" type="text" class="form-control" id="rwick_w3" value="<?php echo $rcekR['rwick_w3']; ?>" placeholder="WID 3">
								</div>-->
							</div>
							<div class="form-group" id="f8" style="display:none;">
								<label for="wicking" class="col-sm-2 control-label">WICKING WIDTH</label>
								<!--<div class="col-sm-1">
									<input name="wick_l1" type="text" class="form-control" id="wick_l1" value="<?php echo $rcek1['wick_l1']; ?>" placeholder="LEN 1">
									<input name="wick_w1" type="text" class="form-control" id="wick_w1" value="<?php echo $rcek1['wick_w1']; ?>" placeholder="WID 1">
								</div>-->
								<div class="col-sm-2">
									<input name="wick_w1" type="text" class="form-control" id="wick_w1"
										value="<?php echo $rcek1['wick_w1']; ?>" placeholder="Before Wash">
								</div>
								<div class="col-sm-2">
									<input name="wick_w3" type="text" class="form-control" id="wick_w3"
										value="<?php echo $rcek1['wick_w3']; ?>" placeholder="Before Wash">
									<!-- <input name="wick_l3" type="text" class="form-control" id="wick_l3" value="<?php echo $rcek1['wick_l3']; ?>" placeholder="LEN 3">
									<input name="wick_w3" type="text" class="form-control" id="wick_w3" value="<?php echo $rcek1['wick_w3']; ?>" placeholder="WID 3"> -->
								</div>
								<div class="col-sm-2">
									<select name="stat_wic1" class="form-control select2" id="stat_wic1"
										onChange="tampil1();" style="width: 100%;">
										<option <?php if ($rcek1['stat_wic1'] == "") { ?> selected=selected <?php }
										; ?>value="">
											Pilih</option>
										<option <?php if ($rcek1['stat_wic1'] == "DISPOSISI") { ?> selected=selected <?php }
										; ?>value="DISPOSISI">DISPOSISI</option>
										<option <?php if ($rcek1['stat_wic1'] == "A") { ?> selected=selected <?php }
										; ?>value="A">
											A</option>
										<option <?php if ($rcek1['stat_wic1'] == "R") { ?> selected=selected <?php }
										; ?>value="R">
											R</option>
										<option <?php if ($rcek1['stat_wic1'] == "PASS") { ?> selected=selected <?php }
										; ?>value="PASS">PASS</option>
										<option <?php if ($rcek1['stat_wic1'] == "MARGINAL PASS") { ?> selected=selected <?php }
										; ?>value="MARGINAL PASS">MARGINAL PASS</option>
										<option <?php if ($rcek1['stat_wic1'] == "DATA") { ?> selected=selected <?php }
										; ?>value="DATA">DATA</option>
										<option <?php if ($rcek1['stat_wic1'] == "FAIL") { ?> selected=selected <?php }
										; ?>value="FAIL">FAIL</option>
										<option <?php if ($rcek1['stat_wic1'] == "RANDOM") { ?> selected=selected <?php }
										; ?>value="RANDOM">RANDOM</option>
									</select>
								</div>
							</div>
							<div class="form-group" id="diswic1" style="display:none;">
								<label for="diswic1" class="col-sm-2 control-label">WICKING WIDTH (DIS)</label>
								<!--<div class="col-sm-1">
									<input name="dwick_l1" type="text" class="form-control" id="dwick_l1" value="<?php echo $rcekD['dwick_l1']; ?>" placeholder="LEN 1">
									<input name="dwick_w1" type="text" class="form-control" id="dwick_w1" value="<?php echo $rcekD['dwick_w1']; ?>" placeholder="WID 1">
								</div>-->
								<div class="col-sm-2">
									<input name="dwick_w1" type="text" class="form-control" id="dwick_w1"
										value="<?php echo $rcekD['dwick_w1']; ?>" placeholder="Before Wash">
								</div>
								<div class="col-sm-2">
									<input name="dwick_w3" type="text" class="form-control" id="dwick_w3"
										value="<?php echo $rcekD['dwick_w3']; ?>" placeholder="Before Wash">
									<!-- <input name="dwick_l3" type="text" class="form-control" id="dwick_l3" value="<?php echo $rcekD['dwick_l3']; ?>" placeholder="LEN 3">
									<input name="dwick_w3" type="text" class="form-control" id="dwick_w3" value="<?php echo $rcekD['dwick_w3']; ?>" placeholder="WID 3"> -->
								</div>
							</div>
							<div class="form-group" id="marwic1" style="display:none;">
								<label for="marwic1" class="col-sm-2 control-label">WICKING WIDTH (MARGINAL)</label>
								<!--<div class="col-sm-1">
									<input name="dwick_l1" type="text" class="form-control" id="dwick_l1" value="<?php echo $rcekD['dwick_l1']; ?>" placeholder="LEN 1">
									<input name="dwick_w1" type="text" class="form-control" id="dwick_w1" value="<?php echo $rcekD['dwick_w1']; ?>" placeholder="WID 1">
								</div>-->
								<div class="col-sm-2">
									<input name="mwick_w1" type="text" class="form-control" id="mwick_w1"
										value="<?php echo $rcekD['mwick_w1']; ?>" placeholder="Before Wash">
								</div>
								<div class="col-sm-2">
									<input name="mwick_w3" type="text" class="form-control" id="mwick_w3"
										value="<?php echo $rcekD['mwick_w3']; ?>" placeholder="Before Wash">
									<!-- <input name="dwick_l3" type="text" class="form-control" id="dwick_l3" value="<?php echo $rcekD['dwick_l3']; ?>" placeholder="LEN 3">
									<input name="dwick_w3" type="text" class="form-control" id="dwick_w3" value="<?php echo $rcekD['dwick_w3']; ?>" placeholder="WID 3"> -->
								</div>
							</div>
							<div class="form-group" id="ranwic1" style="display:none;">
								<label for="ranwic1" class="col-sm-2 control-label">WICKING WIDTH (RAN)</label>
								<!--<div class="col-sm-1">
									<input name="rwick_l1" type="text" class="form-control" id="rwick_l1" value="<?php echo $rcekR['rwick_l1']; ?>" placeholder="LEN 1">
									<input name="rwick_w1" type="text" class="form-control" id="rwick_w1" value="<?php echo $rcekR['rwick_w1']; ?>" placeholder="WID 1">
								</div>-->
								<div class="col-sm-2">
									<input name="rwick_w1" type="text" class="form-control" id="rwick_w1"
										value="<?php echo $rcekR['rwick_w1']; ?>" placeholder="Before Wash" readonly>
								</div>
								<div class="col-sm-2">
									<input name="rwick_w3" type="text" class="form-control" id="rwick_w3"
										value="<?php echo $rcekR['rwick_w3']; ?>" placeholder="Before Wash" readonly>
									<!-- <input name="rwick_l3" type="text" class="form-control" id="rwick_l3" value="<?php echo $rcekR['rwick_l3']; ?>" placeholder="LEN 3">
									<input name="rwick_w3" type="text" class="form-control" id="rwick_w3" value="<?php echo $rcekR['rwick_w3']; ?>" placeholder="WID 3"> -->
								</div>
							</div>
							<div class="form-group" id="f10" style="display:none;">
								<label for="wicking" class="col-sm-2 control-label"></label>
								<!--<div class="col-sm-1">
									<input name="wick_l1" type="text" class="form-control" id="wick_l1" value="<?php echo $rcek1['wick_l1']; ?>" placeholder="LEN 1">
									<input name="wick_w1" type="text" class="form-control" id="wick_w1" value="<?php echo $rcek1['wick_w1']; ?>" placeholder="WID 1">
								</div>-->
								<div class="col-sm-2">
									<input name="wick_w2" type="text" class="form-control" id="wick_w2"
										value="<?php echo $rcek1['wick_w2']; ?>" placeholder="After Wash">
								</div>
								<div class="col-sm-2">
									<input name="wick_w4" type="text" class="form-control" id="wick_w4"
										value="<?php echo $rcek1['wick_w4']; ?>" placeholder="After Wash">
									<!-- <input name="wick_l3" type="text" class="form-control" id="wick_l3" value="<?php echo $rcek1['wick_l3']; ?>" placeholder="LEN 3">
									<input name="wick_w3" type="text" class="form-control" id="wick_w3" value="<?php echo $rcek1['wick_w3']; ?>" placeholder="WID 3"> -->
								</div>
								<div class="col-sm-2">
									<select name="stat_wic3" class="form-control select2" id="stat_wic3"
										onChange="tampil1();" style="width: 100%;">
										<option <?php if ($rcek1['stat_wic3'] == "") { ?> selected=selected <?php }
										; ?>value="">
											Pilih</option>
										<option <?php if ($rcek1['stat_wic3'] == "DISPOSISI") { ?> selected=selected <?php }
										; ?>value="DISPOSISI">DISPOSISI</option>
										<option <?php if ($rcek1['stat_wic3'] == "A") { ?> selected=selected <?php }
										; ?>value="A">
											A</option>
										<option <?php if ($rcek1['stat_wic3'] == "R") { ?> selected=selected <?php }
										; ?>value="R">
											R</option>
										<option <?php if ($rcek1['stat_wic3'] == "PASS") { ?> selected=selected <?php }
										; ?>value="PASS">PASS</option>
										<option <?php if ($rcek1['stat_wic3'] == "MARGINAL PASS") { ?> selected=selected <?php }
										; ?>value="MARGINAL PASS">MARGINAL PASS</option>
										<option <?php if ($rcek1['stat_wic3'] == "DATA") { ?> selected=selected <?php }
										; ?>value="DATA">DATA</option>
										<option <?php if ($rcek1['stat_wic3'] == "FAIL") { ?> selected=selected <?php }
										; ?>value="FAIL">FAIL</option>
										<option <?php if ($rcek1['stat_wic3'] == "RANDOM") { ?> selected=selected <?php }
										; ?>value="RANDOM">RANDOM</option>
									</select>
								</div>
							</div>
							<!--<div class="form-group" id="stat_wic" style="display:none;">
								<label for="stat_wic" class="col-sm-2 control-label">STATUS</label>

								</div>-->

							<div class="form-group" id="diswic3" style="display:none;">
								<label for="diswic3" class="col-sm-2 control-label">WICKING WIDTH (DIS)</label>
								<!--<div class="col-sm-1">
									<input name="dwick_l1" type="text" class="form-control" id="dwick_l1" value="<?php echo $rcekD['dwick_l1']; ?>" placeholder="LEN 1">
									<input name="dwick_w1" type="text" class="form-control" id="dwick_w1" value="<?php echo $rcekD['dwick_w1']; ?>" placeholder="WID 1">
								</div>-->
								<div class="col-sm-2">
									<input name="dwick_w2" type="text" class="form-control" id="dwick_w2"
										value="<?php echo $rcekD['dwick_w2']; ?>" placeholder="After Wash">
								</div>
								<div class="col-sm-2">
									<input name="dwick_w4" type="text" class="form-control" id="dwick_w4"
										value="<?php echo $rcekD['dwick_w4']; ?>" placeholder="After Wash">
									<!-- <input name="dwick_l3" type="text" class="form-control" id="dwick_l3" value="<?php echo $rcekD['dwick_l3']; ?>" placeholder="LEN 3">
									<input name="dwick_w3" type="text" class="form-control" id="dwick_w3" value="<?php echo $rcekD['dwick_w3']; ?>" placeholder="WID 3"> -->
								</div>
							</div>
							<div class="form-group" id="marwic3" style="display:none;">
								<label for="marwic3" class="col-sm-2 control-label">WICKING WIDTH (MARGINAL)</label>
								<!--<div class="col-sm-1">
									<input name="dwick_l1" type="text" class="form-control" id="dwick_l1" value="<?php echo $rcekD['dwick_l1']; ?>" placeholder="LEN 1">
									<input name="dwick_w1" type="text" class="form-control" id="dwick_w1" value="<?php echo $rcekD['dwick_w1']; ?>" placeholder="WID 1">
								</div>-->
								<div class="col-sm-2">
									<input name="mwick_w2" type="text" class="form-control" id="mwick_w2"
										value="<?php echo $rcekM['mwick_w2']; ?>" placeholder="After Wash">
								</div>
								<div class="col-sm-2">
									<input name="mwick_w4" type="text" class="form-control" id="mwick_w4"
										value="<?php echo $rcekM['mwick_w4']; ?>" placeholder="After Wash">
									<!-- <input name="dwick_l3" type="text" class="form-control" id="dwick_l3" value="<?php echo $rcekD['dwick_l3']; ?>" placeholder="LEN 3">
									<input name="dwick_w3" type="text" class="form-control" id="dwick_w3" value="<?php echo $rcekD['dwick_w3']; ?>" placeholder="WID 3"> -->
								</div>
							</div>
							<div class="form-group" id="ranwic3" style="display:none;">
								<label for="ranwic3" class="col-sm-2 control-label">WICKING WIDTH (RAN)</label>
								<!--<div class="col-sm-1">
									<input name="rwick_l1" type="text" class="form-control" id="rwick_l1" value="<?php echo $rcekR['rwick_l1']; ?>" placeholder="LEN 1">
									<input name="rwick_w1" type="text" class="form-control" id="rwick_w1" value="<?php echo $rcekR['rwick_w1']; ?>" placeholder="WID 1">
								</div>-->
								<div class="col-sm-2">
									<input name="rwick_w2" type="text" class="form-control" id="rwick_w2"
										value="<?php echo $rcekR['rwick_w2']; ?>" placeholder="After Wash" readonly>
								</div>
								<div class="col-sm-2">
									<input name="rwick_w4" type="text" class="form-control" id="rwick_w4"
										value="<?php echo $rcekR['rwick_w4']; ?>" placeholder="After Wash" readonly>
									<!-- <input name="rwick_l3" type="text" class="form-control" id="rwick_l3" value="<?php echo $rcekR['rwick_l3']; ?>" placeholder="LEN 3">
									<input name="rwick_w3" type="text" class="form-control" id="rwick_w3" value="<?php echo $rcekR['rwick_w3']; ?>" placeholder="WID 3"> -->
								</div>
							</div>
							<!-- WICKING END-->
							<!-- ABSORBENCY BEGIN-->
							<div class="form-group" id="f2" style="display:none;">
								<label for="absor" class="col-sm-2 control-label">ABSORBENCY ORIGINAL</label>
								<div class="col-sm-2">
									<input name="absor_f2" type="text" class="form-control" id="absor_f2"
										value="<?php echo $rcek1['absor_f2']; ?>" placeholder="ORIGINAL 1">
								</div>
								<div class="col-sm-2">
									<input name="absor_f1" type="text" class="form-control" id="absor_f1"
										value="<?php echo $rcek1['absor_f1']; ?>" placeholder="ORIGINAL 2">
								</div>
								<!--<div class="col-sm-2">
									<input name="absor_f3" type="text" class="form-control" id="absor_f3" value="<?php echo $rcek1['absor_f3']; ?>" placeholder="ORIGINAL 3">
								</div>-->
								<div class="col-sm-2">
									<select name="stat_abs" class="form-control select2" id="stat_abs" onChange="tampil1();"
										style="width: 100%;">
										<option <?php if ($rcek1['stat_abs'] == "") { ?> selected=selected <?php }
										; ?>value="">
											Pilih</option>
										<option <?php if ($rcek1['stat_abs'] == "DISPOSISI") { ?> selected=selected <?php }
										; ?>value="DISPOSISI">DISPOSISI</option>
										<option <?php if ($rcek1['stat_abs'] == "A") { ?> selected=selected <?php }
										; ?>value="A">A
										</option>
										<option <?php if ($rcek1['stat_abs'] == "R") { ?> selected=selected <?php }
										; ?>value="R">R
										</option>
										<option <?php if ($rcek1['stat_abs'] == "PASS") { ?> selected=selected <?php }
										; ?>value="PASS">PASS</option>
										<option <?php if ($rcek1['stat_abs'] == "FAIL") { ?> selected=selected <?php }
										; ?>value="FAIL">FAIL</option>
										<option <?php if ($rcek1['stat_abs'] == "RANDOM") { ?> selected=selected <?php }
										; ?>value="RANDOM">RANDOM</option>
									</select>
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="absor_note" maxlength="50"><?php echo $rcek1['absor_note']; ?></textarea>
								</div>
							</div>
							<div class="form-group" id="disabs" style="display:none;">
								<label for="disabs" class="col-sm-2 control-label">ABSORBENCY ORIGINAL (DIS)</label>
								<div class="col-sm-2">
									<input name="dabsor_f2" type="text" class="form-control" id="dabsor_f2"
										value="<?php echo $rcekD['dabsor_f2']; ?>" placeholder="ORIGINAL 1">
								</div>
								<div class="col-sm-2">
									<input name="dabsor_f1" type="text" class="form-control" id="dabsor_f1"
										value="<?php echo $rcekD['dabsor_f1']; ?>" placeholder="ORIGINAL 2">
								</div>
								<!--<div class="col-sm-2">
									<input name="dabsor_f3" type="text" class="form-control" id="dabsor_f3" value="<?php echo $rcekD['dabsor_f3']; ?>" placeholder="ORIGINAL 3">
								</div>-->
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="dabsor_note" maxlength="50"><?php echo $rcekD['dabsor_note']; ?></textarea>
								</div>
							</div>
							<div class="form-group" id="ranabs" style="display:none;">
								<label for="ranabs" class="col-sm-2 control-label">ABSORBENCY ORIGINAL (RAN)</label>
								<div class="col-sm-2">
									<input name="rabsor_f2" type="text" class="form-control" id="rabsor_f2"
										value="<?php echo $rcekR['rabsor_f2']; ?>" placeholder="ORIGINAL 1" readonly>
								</div>
								<div class="col-sm-2">
									<input name="rabsor_f1" type="text" class="form-control" id="rabsor_f1"
										value="<?php echo $rcekR['rabsor_f1']; ?>" placeholder="ORIGINAL 2" readonly>
								</div>
								<!--<div class="col-sm-2">
									<input name="rabsor_f3" type="text" class="form-control" id="rabsor_f3" value="<?php echo $rcekR['rabsor_f3']; ?>" placeholder="ORIGINAL 3">
								</div>-->
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="rabsor_note" maxlength="50"
										readonly><?php echo $rcekR['rabsor_note']; ?></textarea>
								</div>
							</div>
							<div class="form-group" id="f6" style="display:none;">
								<label for="absor" class="col-sm-2 control-label">ABSORBENCY AFTERWASH</label>
								<div class="col-sm-2">
									<input name="absor_b2" type="text" class="form-control" id="absor_b2"
										value="<?php echo $rcek1['absor_b2']; ?>" placeholder="AFTERWASH 1">
								</div>
								<div class="col-sm-2">
									<input name="absor_b1" type="text" class="form-control" id="absor_b1"
										value="<?php echo $rcek1['absor_b1']; ?>" placeholder="AFTERWASH 2">
								</div>
								<!--<div class="col-sm-2">
									<input name="absor_b3" type="text" class="form-control" id="absor_b3" value="<?php echo $rcek1['absor_b3']; ?>" placeholder="AFTERWASH 3">
								</div>-->
								<div class="col-sm-2">
									<select name="stat_abs1" class="form-control select2" id="stat_abs1"
										onChange="tampil1();" style="width: 100%;">
										<option <?php if ($rcek1['stat_abs1'] == "") { ?> selected=selected <?php }
										; ?>value="">
											Pilih</option>
										<option <?php if ($rcek1['stat_abs1'] == "DISPOSISI") { ?> selected=selected <?php }
										; ?>value="DISPOSISI">DISPOSISI</option>
										<option <?php if ($rcek1['stat_abs1'] == "A") { ?> selected=selected <?php }
										; ?>value="A">
											A</option>
										<option <?php if ($rcek1['stat_abs1'] == "R") { ?> selected=selected <?php }
										; ?>value="R">
											R</option>
										<option <?php if ($rcek1['stat_abs1'] == "PASS") { ?> selected=selected <?php }
										; ?>value="PASS">PASS</option>
										<option <?php if ($rcek1['stat_abs1'] == "FAIL") { ?> selected=selected <?php }
										; ?>value="FAIL">FAIL</option>
										<option <?php if ($rcek1['stat_abs1'] == "RANDOM") { ?> selected=selected <?php }
										; ?>value="RANDOM">RANDOM</option>
									</select>
								</div>
							</div>
							<div class="form-group" id="disabs1" style="display:none;">
								<label for="disabs1" class="col-sm-2 control-label">ABSORBENCY AFTERWASH (DIS)</label>
								<div class="col-sm-2">
									<input name="dabsor_b2" type="text" class="form-control" id="dabsor_b2"
										value="<?php echo $rcekD['dabsor_b2']; ?>" placeholder="AFTERWASH 1">
								</div>
								<div class="col-sm-2">
									<input name="dabsor_b1" type="text" class="form-control" id="dabsor_b1"
										value="<?php echo $rcekD['dabsor_b1']; ?>" placeholder="AFTERWASH 2">
								</div>
								<!--<div class="col-sm-2">
									<input name="dabsor_b3" type="text" class="form-control" id="dabsor_b3" value="<?php echo $rcekD['dabsor_b3']; ?>" placeholder="AFTERWASH 3">
								</div>-->
							</div>
							<div class="form-group" id="ranabs1" style="display:none;">
								<label for="ranabs1" class="col-sm-2 control-label">ABSORBENCY AFTERWASH (RAN)</label>
								<div class="col-sm-2">
									<input name="rabsor_b2" type="text" class="form-control" id="rabsor_b2"
										value="<?php echo $rcekR['rabsor_b2']; ?>" placeholder="AFTERWASH 1" readonly>
								</div>
								<div class="col-sm-2">
									<input name="rabsor_b1" type="text" class="form-control" id="rabsor_b1"
										value="<?php echo $rcekR['rabsor_b1']; ?>" placeholder="AFTERWASH 2" readonly>
								</div>
								<!--<div class="col-sm-2">
									<input name="rabsor_b3" type="text" class="form-control" id="rabsor_b3" value="<?php echo $rcekR['rabsor_b3']; ?>" placeholder="AFTERWASH 3">
								</div>-->
							</div>
							<!-- ABSORBENCY END-->
							<!-- DRYING TIME BEGIN-->
							<div class="form-group" id="f3" style="display:none;">
								<label for="dryingt" class="col-sm-2 control-label">DRYING TIME ORIGINAL</label>
								<div class="col-sm-2">
									<input name="dry1" type="text" class="form-control" id="dry1"
										value="<?php echo $rcek1['dry1']; ?>" placeholder="1">
								</div>
								<!--<div class="col-sm-2">
									<input name="dry2" type="text" class="form-control" id="dry2" value="<?php echo $rcek1['dry2']; ?>" placeholder="2">
								</div>
								<div class="col-sm-2">
									<input name="dry3" type="text" class="form-control" id="dry3" value="<?php echo $rcek1['dry3']; ?>" placeholder="3">
								</div>-->
								<div class="col-sm-2">
									<select name="stat_dry" class="form-control select2" id="stat_dry" onChange="tampil1();"
										style="width: 100%;">
										<option <?php if ($rcek1['stat_dry'] == "") { ?> selected=selected <?php }
										; ?>value="">
											Pilih</option>
										<option <?php if ($rcek1['stat_dry'] == "DISPOSISI") { ?> selected=selected <?php }
										; ?>value="DISPOSISI">DISPOSISI</option>
										<option <?php if ($rcek1['stat_dry'] == "A") { ?> selected=selected <?php }
										; ?>value="A">A
										</option>
										<option <?php if ($rcek1['stat_dry'] == "R") { ?> selected=selected <?php }
										; ?>value="R">R
										</option>
										<option <?php if ($rcek1['stat_dry'] == "PASS") { ?> selected=selected <?php }
										; ?>value="PASS">PASS</option>
										<option <?php if ($rcek1['stat_dry'] == "MARGINAL PASS") { ?> selected=selected <?php }
										; ?>value="MARGINAL PASS">MARGINAL PASS</option>
										<option <?php if ($rcek1['stat_dry'] == "DATA") { ?> selected=selected <?php }
										; ?>value="DATA">DATA</option>
										<option <?php if ($rcek1['stat_dry'] == "FAIL") { ?> selected=selected <?php }
										; ?>value="FAIL">FAIL</option>
										<option <?php if ($rcek1['stat_dry'] == "RANDOM") { ?> selected=selected <?php }
										; ?>value="RANDOM">RANDOM</option>
									</select>
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="dry_note" maxlength="50" rows="1"><?php echo $rcek1['dry_note']; ?></textarea>
								</div>
							</div>
							<!--<div class="form-group" id="stat_dry" style="display:none;">
								<label for="stat_dry" class="col-sm-2 control-label">STATUS</label>

								</div>-->
							<div class="form-group" id="disdry" style="display:none;">
								<label for="disdry" class="col-sm-2 control-label">DRYING TIME ORIGINAL (DIS)</label>
								<div class="col-sm-2">
									<input name="ddry1" type="text" class="form-control" id="ddry1"
										value="<?php echo $rcekD['ddry1']; ?>" placeholder="1">
								</div>
								<!--<div class="col-sm-2">
									<input name="ddry2" type="text" class="form-control" id="ddry2" value="<?php echo $rcekD['ddry2']; ?>" placeholder="2">
								</div>
								<div class="col-sm-2">
									<input name="ddry3" type="text" class="form-control" id="ddry3" value="<?php echo $rcekD['ddry3']; ?>" placeholder="3">
								</div>-->
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="ddry_note" maxlength="50"
										rows="1"><?php echo $rcekD['ddry_note']; ?></textarea>
								</div>
							</div>
							<div class="form-group" id="mardry" style="display:none;">
								<label for="mardry" class="col-sm-2 control-label">DRYING TIME ORIGINAL (MARGINAL)</label>
								<div class="col-sm-2">
									<input name="mdry1" type="text" class="form-control" id="mdry1"
										value="<?php echo $rcekM['mdry1']; ?>" placeholder="1">
								</div>
								<!--<div class="col-sm-2">
									<input name="ddry2" type="text" class="form-control" id="ddry2" value="<?php echo $rcekD['ddry2']; ?>" placeholder="2">
								</div>
								<div class="col-sm-2">
									<input name="ddry3" type="text" class="form-control" id="ddry3" value="<?php echo $rcekD['ddry3']; ?>" placeholder="3">
								</div>-->
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="mdry_note" maxlength="50"
										rows="1"><?php echo $rcekM['mdry_note']; ?></textarea>
								</div>
							</div>
							<div class="form-group" id="randry" style="display:none;">
								<label for="randry" class="col-sm-2 control-label">DRYING TIME ORIGINAL (RAN)</label>
								<div class="col-sm-2">
									<input name="rdry1" type="text" class="form-control" id="rdry1"
										value="<?php echo $rcekR['rdry1']; ?>" placeholder="1" readonly>
								</div>
								<!--<div class="col-sm-2">
									<input name="rdry2" type="text" class="form-control" id="rdry2" value="<?php echo $rcekR['rdry2']; ?>" placeholder="2">
								</div>
								<div class="col-sm-2">
									<input name="rdry3" type="text" class="form-control" id="rdry3" value="<?php echo $rcekR['rdry3']; ?>" placeholder="3">
								</div>-->
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="rdry_note" maxlength="50" rows="1"
										readonly><?php echo $rcekR['rdry_note']; ?></textarea>
								</div>
							</div>
							<div class="form-group" id="f7" style="display:none;">
								<label for="dryingt" class="col-sm-2 control-label">DRYING TIME AFTERWASH</label>
								<div class="col-sm-2">
									<input name="dryaf1" type="text" class="form-control" id="dryaf1"
										value="<?php echo $rcek1['dryaf1']; ?>" placeholder="1">
								</div>
								<!--<div class="col-sm-2">
									<input name="dryaf2" type="text" class="form-control" id="dryaf2" value="<?php echo $rcek1['dryaf2']; ?>" placeholder="2">
								</div>
								<div class="col-sm-2">
									<input name="dryaf3" type="text" class="form-control" id="dryaf3" value="<?php echo $rcek1['dryaf3']; ?>" placeholder="3">
								</div>-->
								<div class="col-sm-2">
									<select name="stat_dry1" class="form-control select2" id="stat_dry1"
										onChange="tampil1();" style="width: 100%;">
										<option <?php if ($rcek1['stat_dry1'] == "") { ?> selected=selected <?php }
										; ?>value="">
											Pilih</option>
										<option <?php if ($rcek1['stat_dry1'] == "DISPOSISI") { ?> selected=selected <?php }
										; ?>value="DISPOSISI">DISPOSISI</option>
										<option <?php if ($rcek1['stat_dry1'] == "A") { ?> selected=selected <?php }
										; ?>value="A">
											A</option>
										<option <?php if ($rcek1['stat_dry1'] == "R") { ?> selected=selected <?php }
										; ?>value="R">
											R</option>
										<option <?php if ($rcek1['stat_dry1'] == "PASS") { ?> selected=selected <?php }
										; ?>value="PASS">PASS</option>
										<option <?php if ($rcek1['stat_dry1'] == "MARGINAL PASS") { ?> selected=selected <?php }
										; ?>value="MARGINAL PASS">MARGINAL PASS</option>
										<option <?php if ($rcek1['stat_dry1'] == "DATA") { ?> selected=selected <?php }
										; ?>value="DATA">DATA</option>
										<option <?php if ($rcek1['stat_dry1'] == "FAIL") { ?> selected=selected <?php }
										; ?>value="FAIL">FAIL</option>
										<option <?php if ($rcek1['stat_dry1'] == "RANDOM") { ?> selected=selected <?php }
										; ?>value="RANDOM">RANDOM</option>
									</select>
								</div>
							</div>
							<!--<div class="form-group" id="stat_dry1" style="display:none;">
								<label for="stat_dry1" class="col-sm-2 control-label">STATUS</label>

								</div>-->
							<div class="form-group" id="disdry1" style="display:none;">
								<label for="disdry1" class="col-sm-2 control-label">DRYING TIME AFTERWASH (DIS)</label>
								<div class="col-sm-2">
									<input name="ddryaf1" type="text" class="form-control" id="ddryaf1"
										value="<?php echo $rcekD['ddryaf1']; ?>" placeholder="1">
								</div>
								<!--<div class="col-sm-2">
									<input name="ddryaf2" type="text" class="form-control" id="ddryaf2" value="<?php echo $rcekD['ddryaf2']; ?>" placeholder="2">
								</div>
								<div class="col-sm-2">
									<input name="ddryaf3" type="text" class="form-control" id="ddryaf3" value="<?php echo $rcekD['ddryaf3']; ?>" placeholder="3">
								</div>-->
							</div>
							<div class="form-group" id="mardry1" style="display:none;">
								<label for="mardry1" class="col-sm-2 control-label">DRYING TIME AFTERWASH (MARGINAL)</label>
								<div class="col-sm-2">
									<input name="mdryaf1" type="text" class="form-control" id="mdryaf1"
										value="<?php echo $rcekM['mdryaf1']; ?>" placeholder="1">
								</div>
								<!--<div class="col-sm-2">
									<input name="ddryaf2" type="text" class="form-control" id="ddryaf2" value="<?php echo $rcekD['ddryaf2']; ?>" placeholder="2">
								</div>
								<div class="col-sm-2">
									<input name="ddryaf3" type="text" class="form-control" id="ddryaf3" value="<?php echo $rcekD['ddryaf3']; ?>" placeholder="3">
								</div>-->
							</div>
							<div class="form-group" id="randry1" style="display:none;">
								<label for="randry1" class="col-sm-2 control-label">DRYING TIME AFTERWASH (RAN)</label>
								<div class="col-sm-2">
									<input name="rdryaf1" type="text" class="form-control" id="rdryaf1"
										value="<?php echo $rcekR['rdryaf1']; ?>" placeholder="1" readonly>
								</div>
								<!--<div class="col-sm-2">
									<input name="rdryaf2" type="text" class="form-control" id="rdryaf2" value="<?php echo $rcekR['rdryaf2']; ?>" placeholder="2">
								</div>
								<div class="col-sm-2">
									<input name="rdryaf3" type="text" class="form-control" id="rdryaf3" value="<?php echo $rcekR['rdryaf3']; ?>" placeholder="3">
								</div>-->
							</div>
							<!-- DRYING TIME END-->
							<!-- WATER REPPELENT BEGIN-->
							<div class="form-group" id="f4" style="display:none;">
								<label for="waterr" class="col-sm-2 control-label">WATER REPPELENT ORIGINAL</label>
								<div class="col-sm-2">
									<input name="repp1" type="text" class="form-control" id="repp1"
										value="<?php echo $rcek1['repp1']; ?>" placeholder="Before Wash">
								</div>
								<!--<div class="col-sm-2">
								<input name="repp2" type="text" class="form-control" id="repp2" value="<?php echo $rcek1['repp2']; ?>" placeholder="After Wash">
							</div>
							<div class="col-sm-2">
								<input name="repp3" type="text" class="form-control" id="repp3" value="<?php echo $rcek1['repp3']; ?>" placeholder="3">
							</div>
							<div class="col-sm-2">
								<input name="repp4" type="text" class="form-control" id="repp4" value="<?php echo $rcek1['repp4']; ?>" placeholder="4">
							</div>-->
								<div class="col-sm-2">
									<select name="stat_wp" class="form-control select2" id="stat_wp" onChange="tampil1();"
										style="width: 100%;">
										<option <?php if ($rcek1['stat_wp'] == "") { ?> selected=selected <?php }
										; ?>value="">
											Pilih</option>
										<option <?php if ($rcek1['stat_wp'] == "DISPOSISI") { ?> selected=selected <?php }
										; ?>value="DISPOSISI">DISPOSISI</option>
										<option <?php if ($rcek1['stat_wp'] == "A") { ?> selected=selected <?php }
										; ?>value="A">A
										</option>
										<option <?php if ($rcek1['stat_wp'] == "R") { ?> selected=selected <?php }
										; ?>value="R">R
										</option>
										<option <?php if ($rcek1['stat_wp'] == "PASS") { ?> selected=selected <?php }
										; ?>value="PASS">PASS</option>
										<option <?php if ($rcek1['stat_wp'] == "FAIL") { ?> selected=selected <?php }
										; ?>value="FAIL">FAIL</option>
										<option <?php if ($rcek1['stat_wp'] == "RANDOM") { ?> selected=selected <?php }
										; ?>value="RANDOM">RANDOM</option>
									</select>
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="repp_note" maxlength="50"
										rows="1"><?php echo $rcek1['repp_note']; ?></textarea>
								</div>
							</div>
							<!--<div class="form-group" id="stat_wp" style="display:none;">
							<label for="stat_wp" class="col-sm-2 control-label">STATUS</label>

						</div>-->
							<div class="form-group" id="diswp" style="display:none;">
								<label for="diswp" class="col-sm-2 control-label">WATER REPPELENT ORIGINAL (DIS)</label>
								<div class="col-sm-2">
									<input name="drepp1" type="text" class="form-control" id="drepp1"
										value="<?php echo $rcekD['drepp1']; ?>" placeholder="Before Wash">
								</div>
								<!--<div class="col-sm-2">
								<input name="drepp2" type="text" class="form-control" id="drepp2" value="<?php echo $rcekD['drepp2']; ?>" placeholder="After Wash">
							</div>
							<div class="col-sm-2">
								<input name="drepp3" type="text" class="form-control" id="drepp3" value="<?php echo $rcekD['drepp3']; ?>" placeholder="3">
							</div>
							<div class="col-sm-2">
								<input name="drepp4" type="text" class="form-control" id="drepp4" value="<?php echo $rcekD['drepp4']; ?>" placeholder="4">
							</div>-->
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="drepp_note" maxlength="50"
										rows="1"><?php echo $rcekD['drepp_note']; ?></textarea>
								</div>
							</div>
							<div class="form-group" id="ranwp" style="display:none;">
								<label for="ranwp" class="col-sm-2 control-label">WATER REPPELENT ORIGINAL (RAN)</label>
								<div class="col-sm-2">
									<input name="rrepp1" type="text" class="form-control" id="rrepp1"
										value="<?php echo $rcekR['rrepp1']; ?>" placeholder="Before Wash" readonly>
								</div>
								<!--<div class="col-sm-2">
								<input name="rrepp2" type="text" class="form-control" id="rrepp2" value="<?php echo $rcekR['rrepp2']; ?>" placeholder="After Wash" readonly>
							</div>
							<div class="col-sm-2">
								<input name="rrepp3" type="text" class="form-control" id="rrepp3" value="<?php echo $rcekR['rrepp3']; ?>" placeholder="3" readonly>
							</div>
							<div class="col-sm-2">
								<input name="rrepp4" type="text" class="form-control" id="rrepp4" value="<?php echo $rcekR['rrepp4']; ?>" placeholder="4" readonly>
							</div>-->
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="rrepp_note" maxlength="50" rows="1"
										readonly><?php echo $rcekR['rrepp_note']; ?></textarea>
								</div>
							</div>
							<div class="form-group" id="f11" style="display:none;">
								<label for="waterr" class="col-sm-2 control-label">WATER REPPELENT AFTERWASH</label>
								<div class="col-sm-2">
									<input name="repp2" type="text" class="form-control" id="repp2"
										value="<?php echo $rcek1['repp2']; ?>" placeholder="After Wash">
								</div>
								<!--<div class="col-sm-2">
								<input name="repp2" type="text" class="form-control" id="repp2" value="<?php echo $rcek1['repp2']; ?>" placeholder="After Wash">
							</div>
							<div class="col-sm-2">
								<input name="repp3" type="text" class="form-control" id="repp3" value="<?php echo $rcek1['repp3']; ?>" placeholder="3">
							</div>
							<div class="col-sm-2">
								<input name="repp4" type="text" class="form-control" id="repp4" value="<?php echo $rcek1['repp4']; ?>" placeholder="4">
							</div>-->
								<div class="col-sm-2">
									<select name="stat_wp1" class="form-control select2" id="stat_wp1" onChange="tampil1();"
										style="width: 100%;">
										<option <?php if ($rcek1['stat_wp1'] == "") { ?> selected=selected <?php }
										; ?>value="">
											Pilih</option>
										<option <?php if ($rcek1['stat_wp1'] == "DISPOSISI") { ?> selected=selected <?php }
										; ?>value="DISPOSISI">DISPOSISI</option>
										<option <?php if ($rcek1['stat_wp1'] == "A") { ?> selected=selected <?php }
										; ?>value="A">A
										</option>
										<option <?php if ($rcek1['stat_wp1'] == "R") { ?> selected=selected <?php }
										; ?>value="R">R
										</option>
										<option <?php if ($rcek1['stat_wp1'] == "PASS") { ?> selected=selected <?php }
										; ?>value="PASS">PASS</option>
										<option <?php if ($rcek1['stat_wp1'] == "FAIL") { ?> selected=selected <?php }
										; ?>value="FAIL">FAIL</option>
										<option <?php if ($rcek1['stat_wp1'] == "RANDOM") { ?> selected=selected <?php }
										; ?>value="RANDOM">RANDOM</option>
									</select>
								</div>
							</div>
							<!--<div class="form-group" id="stat_wp" style="display:none;">
							<label for="stat_wp" class="col-sm-2 control-label">STATUS</label>

						</div>-->
							<div class="form-group" id="diswp1" style="display:none;">
								<label for="diswp1" class="col-sm-2 control-label">WATER REPPELENT AFTERWASH (DIS)</label>
								<div class="col-sm-2">
									<input name="drepp2" type="text" class="form-control" id="drepp2"
										value="<?php echo $rcekD['drepp2']; ?>" placeholder="After Wash">
								</div>
								<!--<div class="col-sm-2">
								<input name="drepp2" type="text" class="form-control" id="drepp2" value="<?php echo $rcekD['drepp2']; ?>" placeholder="After Wash">
							</div>
							<div class="col-sm-2">
								<input name="drepp3" type="text" class="form-control" id="drepp3" value="<?php echo $rcekD['drepp3']; ?>" placeholder="3">
							</div>
							<div class="col-sm-2">
								<input name="drepp4" type="text" class="form-control" id="drepp4" value="<?php echo $rcekD['drepp4']; ?>" placeholder="4">
							</div>-->
							</div>
							<div class="form-group" id="ranwp1" style="display:none;">
								<label for="ranwp1" class="col-sm-2 control-label">WATER REPPELENT AFTERWASH (RAN)</label>
								<div class="col-sm-2">
									<input name="rrepp2" type="text" class="form-control" id="rrepp2"
										value="<?php echo $rcekR['rrepp2']; ?>" placeholder="After Wash" readonly>
								</div>
								<!--<div class="col-sm-2">
								<input name="rrepp2" type="text" class="form-control" id="rrepp2" value="<?php echo $rcekR['rrepp2']; ?>" placeholder="After Wash" readonly>
							</div>
							<div class="col-sm-2">
								<input name="rrepp3" type="text" class="form-control" id="rrepp3" value="<?php echo $rcekR['rrepp3']; ?>" placeholder="3" readonly>
							</div>
							<div class="col-sm-2">
								<input name="rrepp4" type="text" class="form-control" id="rrepp4" value="<?php echo $rcekR['rrepp4']; ?>" placeholder="4" readonly>
							</div>-->
							</div>
							<!-- WATER REPPELENT END-->
							<!-- PH BEGIN-->
							<div class="form-group" id="f5" style="display:none;">
								<label for="ph" class="col-sm-2 control-label">Ph</label>
								<div class="col-sm-2">
									<input name="ph" type="text" class="form-control" id="ph"
										value="<?php echo $rcek1['ph']; ?>" placeholder="Ph">
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="ph_note" maxlength="50" rows="1"><?php echo $rcek1['ph_note']; ?></textarea>
								</div>
							</div>
							<div class="form-group" id="stat_ph" style="display:none;">
								<label for="stat_ph" class="col-sm-2 control-label">STATUS</label>
								<div class="col-sm-2">
									<select name="stat_ph" class="form-control select2" id="stat_ph" onChange="tampil1();"
										style="width: 100%;">
										<option <?php if ($rcek1['stat_ph'] == "") { ?> selected=selected <?php }
										; ?>value="">
											Pilih</option>
										<option <?php if ($rcek1['stat_ph'] == "DISPOSISI") { ?> selected=selected <?php }
										; ?>value="DISPOSISI">DISPOSISI</option>
										<option <?php if ($rcek1['stat_ph'] == "A") { ?> selected=selected <?php }
										; ?>value="A">A
										</option>
										<option <?php if ($rcek1['stat_ph'] == "R") { ?> selected=selected <?php }
										; ?>value="R">R
										</option>
										<option <?php if ($rcek1['stat_ph'] == "PASS") { ?> selected=selected <?php }
										; ?>value="PASS">PASS</option>
										<option <?php if ($rcek1['stat_ph'] == "MARGINAL PASS") { ?> selected=selected <?php }
										; ?>value="MARGINAL PASS">MARGINAL PASS</option>
										<option <?php if ($rcek1['stat_ph'] == "DATA") { ?> selected=selected <?php }
										; ?>value="DATA">DATA</option>
										<option <?php if ($rcek1['stat_ph'] == "FAIL") { ?> selected=selected <?php }
										; ?>value="FAIL">FAIL</option>
										<option <?php if ($rcek1['stat_ph'] == "RANDOM") { ?> selected=selected <?php }
										; ?>value="RANDOM">RANDOM</option>
									</select>
								</div>
							</div>
							<div class="form-group" id="disph" style="display:none;">
								<label for="disph" class="col-sm-2 control-label">Ph (DIS)</label>
								<div class="col-sm-2">
									<input name="dph" type="text" class="form-control" id="dph"
										value="<?php echo $rcekD['dph']; ?>" placeholder="Ph">
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="dph_note" maxlength="50" rows="1"><?php echo $rcekD['dph_note']; ?></textarea>
								</div>
							</div>
							<div class="form-group" id="marph" style="display:none;">
								<label for="marph" class="col-sm-2 control-label">PH (MARGINAL)</label>
								<div class="col-sm-2">
									<input name="mph" type="text" class="form-control" id="mph"
										value="<?php echo $rcekM['mph']; ?>" placeholder="Ph">
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="mph_note" maxlength="50" rows="1"><?php echo $rcekM['mph_note']; ?></textarea>
								</div>
							</div>
							<div class="form-group" id="ranph" style="display:none;">
								<label for="ranph" class="col-sm-2 control-label">Ph (RAN)</label>
								<div class="col-sm-2">
									<input name="rph" type="text" class="form-control" id="rph"
										value="<?php echo $rcekR['rph']; ?>" placeholder="Ph" readonly>
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="rph_note" maxlength="50" rows="1"
										readonly><?php echo $rcekR['rph_note']; ?></textarea>
								</div>
							</div>
							<!-- PH END-->
							<!-- SOIL RELEASE BEGIN-->
							<div class="form-group" id="f24" style="display:none;">
								<label for="soil" class="col-sm-2 control-label">SOIL RELEASE</label>
								<div class="col-sm-2">
									<input name="soil" type="text" class="form-control" id="soil"
										value="<?php echo $rcek1['soil']; ?>" placeholder="Soil">
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="soil_note" maxlength="50"
										rows="1"><?php echo $rcek1['soil_note']; ?></textarea>
								</div>
							</div>
							<div class="form-group" id="stat_sor" style="display:none;">
								<label for="stat_sor" class="col-sm-2 control-label">STATUS</label>
								<div class="col-sm-2">
									<select name="stat_sor" class="form-control select2" id="stat_sor" onChange="tampil1();"
										style="width: 100%;">
										<option <?php if ($rcek1['stat_sor'] == "") { ?> selected=selected <?php }
										; ?>value="">
											Pilih</option>
										<option <?php if ($rcek1['stat_sor'] == "DISPOSISI") { ?> selected=selected <?php }
										; ?>value="DISPOSISI">DISPOSISI</option>
										<option <?php if ($rcek1['stat_sor'] == "A") { ?> selected=selected <?php }
										; ?>value="A">A
										</option>
										<option <?php if ($rcek1['stat_sor'] == "R") { ?> selected=selected <?php }
										; ?>value="R">R
										</option>
										<option <?php if ($rcek1['stat_sor'] == "PASS") { ?> selected=selected <?php }
										; ?>value="PASS">PASS</option>
										<option <?php if ($rcek1['stat_sor'] == "FAIL") { ?> selected=selected <?php }
										; ?>value="FAIL">FAIL</option>
										<option <?php if ($rcek1['stat_sor'] == "RANDOM") { ?> selected=selected <?php }
										; ?>value="RANDOM">RANDOM</option>
									</select>
								</div>
							</div>
							<div class="form-group" id="dissor" style="display:none;">
								<label for="dissor" class="col-sm-2 control-label">SOIL RELEASE (DIS)</label>
								<div class="col-sm-2">
									<input name="dsoil" type="text" class="form-control" id="dsoil"
										value="<?php echo $rcekD['dsoil']; ?>" placeholder="Soil">
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="dsoil_note" maxlength="50"
										rows="1"><?php echo $rcekD['dsoil_note']; ?></textarea>
								</div>
							</div>
							<div class="form-group" id="ransor" style="display:none;">
								<label for="ransor" class="col-sm-2 control-label">SOIL RELEASE (RAN)</label>
								<div class="col-sm-2">
									<input name="rsoil" type="text" class="form-control" id="rsoil"
										value="<?php echo $rcekR['rsoil']; ?>" placeholder="Soil" readonly>
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="rsoil_note" maxlength="50" rows="1"
										readonly><?php echo $rcekR['rsoil_note']; ?></textarea>
								</div>
							</div>
							<!-- SOIL RELEASE END-->
							<!-- HUMIDITY BEGIN-->
							<div class="form-group" id="f25" style="display:none;">
								<label for="humidity" class="col-sm-2 control-label">HUMIDITY</label>
								<div class="col-sm-2">
									<input name="humidity" type="text" class="form-control" id="humidity"
										value="<?php echo $rcek1['humidity']; ?>" placeholder="Humidity">
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="humidity_note" maxlength="50"
										rows="1"><?php echo $rcek1['humidity_note']; ?></textarea>
								</div>
							</div>
							<div class="form-group" id="stat_hum" style="display:none;">
								<label for="stat_hum" class="col-sm-2 control-label">STATUS</label>
								<div class="col-sm-2">
									<select name="stat_hum" class="form-control select2" id="stat_hum" onChange="tampil1();"
										style="width: 100%;">
										<option <?php if ($rcek1['stat_hum'] == "") { ?> selected=selected <?php }
										; ?>value="">
											Pilih</option>
										<option <?php if ($rcek1['stat_hum'] == "DISPOSISI") { ?> selected=selected <?php }
										; ?>value="DISPOSISI">DISPOSISI</option>
										<option <?php if ($rcek1['stat_hum'] == "A") { ?> selected=selected <?php }
										; ?>value="A">A
										</option>
										<option <?php if ($rcek1['stat_hum'] == "R") { ?> selected=selected <?php }
										; ?>value="R">R
										</option>
										<option <?php if ($rcek1['stat_hum'] == "PASS") { ?> selected=selected <?php }
										; ?>value="PASS">PASS</option>
										<option <?php if ($rcek1['stat_hum'] == "FAIL") { ?> selected=selected <?php }
										; ?>value="FAIL">FAIL</option>
										<option <?php if ($rcek1['stat_hum'] == "RANDOM") { ?> selected=selected <?php }
										; ?>value="RANDOM">RANDOM</option>
									</select>
								</div>
							</div>
							<div class="form-group" id="dishum" style="display:none;">
								<label for="dishum" class="col-sm-2 control-label">HUMIDITY (DIS)</label>
								<div class="col-sm-2">
									<input name="dhumidity" type="text" class="form-control" id="dhumidity"
										value="<?php echo $rcekD['dhumidity']; ?>" placeholder="Humidity">
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="dhumidity_note" maxlength="50"
										rows="1"><?php echo $rcekD['dhumidity_note']; ?></textarea>
								</div>
							</div>
							<div class="form-group" id="ranhum" style="display:none;">
								<label for="ranhum" class="col-sm-2 control-label">HUMIDITY (RAN)</label>
								<div class="col-sm-2">
									<input name="rhumidity" type="text" class="form-control" id="rhumidity"
										value="<?php echo $rcekR['rhumidity']; ?>" placeholder="Humidity" readonly>
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik"
										name="rhumidity_note" maxlength="50" rows="1"
										readonly><?php echo $rcekR['rhumidity_note']; ?></textarea>
								</div>
							</div>
							<!-- HUMIDITY END-->
							<div class="form-group">
								<?php if ($notes != "") { ?>
									<button type="submit" class="btn btn-primary pull-right" name="functional_save"
										value="save"><i class="fa fa-save"></i> Simpan</button>
								<?php } ?>
							</div>
						</form>
					</div>
				</div>
				<!-- /.tab-content -->
			</div>
			<!-- nav-tabs-custom -->
		</div>
		<!-- /.col -->
	</div>
	<div class="box-footer">

	</div>
	<!-- /.box-footer -->
	</div>
<?php } ?>

<?php if ($cek1 > 0) { ?>
	<section class="invoice">
		<!-- title row -->
		<div class="row">
			<div class="col-xs-12">
				<h2 class="page-header">
					<i class="fa fa-globe"></i> Result.
					<small class="pull-right">Date:
						<?php echo $rcek1['tgl_buat']; ?>
					</small>
				</h2>
			</div>
			<!-- /.col -->
		</div>
		<!-- info row -->
		<div class="row invoice-info">
			<div class="col-sm-4 invoice-col">
				<strong>PHYSICAL</strong>
				<hr>
				<div class="table-responsive">
					<table class="table">
						<?php if ($rcek1['flamability'] != "") { ?>
							<tr>
								<th colspan="2" style="width:50%">Flamability</th>
								<td colspan="6">
									<?php //if($rcek1['stat_fla']=="RANDOM"){echo $rcekR['rflamability'];}else{echo $rcek1['flamability'];}  ?>
									<?php if ($rcek1['flamability'] != "") {
										echo $rcek1['flamability'];
									} else {
										echo $rcekR['rflamability'];
									} ?>
								</td>
							</tr>
						<?php } ?>
						<!--<?php if ($rcek1['fibercontent'] != "") { ?>
			  <tr>
				<th colspan="2">Fiber Content</th>
				<td colspan="6">
				<?php //if($rcek1['stat_fib']=="RANDOM"){echo $rcekR['rfibercontent'];}else{echo $rcek1['fibercontent'];}  ?>
				<?php if ($rcek1['fibercontent'] != "") {
					echo $rcek1['fibercontent'];
				} else {
					echo $rcekR['rfibercontent'];
				} ?>
				</td>
			  </tr>
			  <?php } ?>-->
						<?php if ($rcek1['fc_cott'] != "" or $rcek1['fc_poly'] != "" or $rcek1['fc_elastane'] != "") { ?>
							<tr>
								<th colspan="2">Fiber Content</th>
								<td colspan="6">
									<?php
									// if($rcek1['stat_fib']=="RANDOM"){
									// 	if($rcekR['rfc_cott']!=""){
									// 		echo $rcekR['rfc_cott']."% ".$rcekR['rfc_cott1'];}
									// 	if($rcekR['rfc_poly']!=""){
									// 		echo $rcekR['rfc_poly']."% ".$rcekR['rfc_poly1'];
									// 	}
									// 	if($rcekR['rfc_elastane']!=""){
									// 		echo $rcekR['rfc_elastane']."% ".$rcekR['rfc_elastane1'];
									// 	}
									// }else {
									// 	if($rcek1['fc_cott']!=""){
									// 		echo $rcek1['fc_cott']."% ".$rcek1['fc_cott1'];
									// 	}
									// 	if($rcek1['fc_poly']!=""){
									// 		echo $rcek1['fc_poly']."% ".$rcek1['fc_poly1'];
									// 	}
									// 	if($rcek1['fc_elastane']!=""){
									// 		echo $rcek1['fc_elastane']."% ".$rcek1['fc_elastane1'];
									// 	}
									// }
									?>
									<?php
									if ($rcek1['fc_cott'] != "" || $rcek1['fc_poly'] != "" || $rcek1['fc_elastane'] != "") {
										if ($rcek1['fc_cott'] != "") {
											echo $rcek1['fc_cott'] . "% " . $rcek1['fc_cott1'];
										}
										if ($rcek1['fc_poly'] != "") {
											echo $rcek1['fc_poly'] . "% " . $rcek1['fc_poly1'];
										}
										if ($rcek1['fc_elastane'] != "") {
											echo $rcek1['fc_elastane'] . "% " . $rcek1['fc_elastane1'];
										}
									} else {
										if ($rcekR['rfc_cott'] != "") {
											echo $rcekR['rfc_cott'] . "% " . $rcekR['rfc_cott1'];
										}
										if ($rcekR['rfc_poly'] != "") {
											echo $rcekR['rfc_poly'] . "% " . $rcekR['rfc_poly1'];
										}
										if ($rcekR['rfc_elastane'] != "") {
											echo $rcekR['rfc_elastane'] . "% " . $rcekR['rfc_elastane1'];
										}
									}
									?>
								</td>
							</tr>
						<?php } ?>
						<?php if ($rcek1['fc_wpi'] != "" or $rcek1['fc_cpi'] != "") { ?>
							<tr>
								<th colspan="2">Fabric Count</th>
								<td colspan="6">
									W:
									<?php //if($rcek1['stat_fc']=="RANDOM"){echo $rcekR['rfc_wpi'];}else{echo $rcek1['fc_wpi'];}  ?>
									<?php if ($rcek1['fc_wpi'] != "") {
										echo $rcek1['fc_wpi'];
									} else {
										echo $rcekR['rfc_wpi'];
									} ?>
									C:
									<?php //if($rcek1['stat_fc']=="RANDOM"){echo $rcekR['rfc_cpi'];}else{echo $rcek1['fc_cpi'];}  ?>
									<?php if ($rcek1['fc_cpi'] != "") {
										echo $rcek1['fc_cpi'];
									} else {
										echo $rcekR['rfc_cpi'];
									} ?>
								</td>
							</tr>
						<?php } ?>
						<?php if ($rcek1['f_weight'] != "") { ?>
							<tr>
								<th colspan="2">Fabric Weight</th>
								<td colspan="6">
									<?php //if($rcek1['stat_fwss2']=="RANDOM"){echo $rcekR['rf_weight'];}else{echo $rcek1['f_weight'];}  ?>
									<?php if ($rcek1['f_weight'] != "") {
										echo $rcek1['f_weight'];
									} else {
										echo $$rcekR['rf_weight'];
									} ?>
								</td>
							</tr>
						<?php } ?>
						<?php if ($rcek1['f_width'] != "") { ?>
							<tr>
								<th colspan="2">Fabric Width</th>
								<td colspan="6">
									<?php //if($rcek1['stat_fwss3']=="RANDOM"){echo $rcekR['rf_width'];}else{echo $rcek1['f_width'];}  ?>
									<?php if ($rcek1['f_width'] != "") {
										echo $rcek1['f_width'];
									} else {
										echo $rcekR['rf_width'];
									} ?>
								</td>
							</tr>
						<?php } ?>
						<?php if ($rcek1['bow'] != "" or $rcek1['skew'] != "") { ?>
							<tr>
								<th colspan="2">Bow &amp; Skew</th>
								<td colspan="6">
									<?php if ($rcek1['bow'] != "") {
										echo $rcek1['bow'];
									} else {
										echo $rcekR['rbow'];
									}
									//if($rcek1['stat_bsk']=="RANDOM"){echo $rcekR['rbow'];}else{echo $rcek1['bow'];}  ?> &amp;
									<?php if ($rcek1['skew'] != "") {
										echo $rcek1['skew'];
									} else {
										echo $rcekR['rskew'];
									}
									//if($rcek1['stat_bsk']=="RANDOM"){echo $rcekR['rskew'];}else{echo $rcek1['skew'];}  ?>
								</td>
							</tr>
						<?php } ?>
						<?php if ($rcek1['ss_temp'] != "") { ?>
							<tr>
								<th colspan="2">Suhu Shrinkage Spirality</th>
								<td colspan="6">
									<?php //if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rss_temp'];}else{echo $rcek1['ss_temp'];}  ?>
									<?php if ($rcek1['ss_temp'] != "") {
										echo $rcek1['ss_temp'];
									} else {
										echo $rcekR['rss_temp'];
									} ?>
								</td>
							</tr>
						<?php } ?>
						<?php if ($rcek1['ss_washes'] != "") { ?>
							<tr>
								<th colspan="2">Washes Shrinkage Spirality</th>
								<td colspan="6">
									<?php //if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rss_washes'];}else{echo $rcek1['ss_washes'];}  ?>
									<?php if ($rcek1['ss_washes'] != "") {
										echo $rcek1['ss_washes'];
									} else {
										echo $rcekR['rss_washes'];
									} ?>
								</td>
							</tr>
						<?php } ?>
						<?php if ($rcek1['shrinkage_l1'] != "" or $rcek1['shrinkage_l2'] != "" or $rcek1['shrinkage_l3'] != "" or $rcek1['shrinkage_l4'] != "") { ?>
							<tr>
								<th colspan="2">Shrinkage Length</th>
								<!-- <td><?php //if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rshrinkage_l1'];}else{echo $rcek1['shrinkage_l1'];}  ?></td> -->
								<td>
									<?php if ($rcek1['shrinkage_l1'] != "") {
										echo $rcek1['shrinkage_l1'];
									} else {
										echo $rcekR['rshrinkage_l1'];
									} ?>
								</td>
								<!-- <td><?php //if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rshrinkage_l2'];}else{echo $rcek1['shrinkage_l2'];}  ?></td> -->
								<td>
									<?php if ($rcek1['shrinkage_l2'] != "") {
										echo $rcek1['shrinkage_l2'];
									} else {
										echo $rcekR['rshrinkage_l2'];
									} ?>
								</td>
								<!-- <td><?php //if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rshrinkage_l3'];}else{echo $rcek1['shrinkage_l3'];}  ?></td> -->
								<td>
									<?php if ($rcek1['shrinkage_l3'] != "") {
										echo $rcek1['shrinkage_l3'];
									} else {
										echo $rcekR['rshrinkage_l3'];
									} ?>
								</td>
								<!-- <td><?php //if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rshrinkage_l4'];}else{echo $rcek1['shrinkage_l4'];}  ?></td> -->
								<td>
									<?php if ($rcek1['shrinkage_l4'] != "") {
										echo $rcek1['shrinkage_l4'];
									} else {
										echo $rcekR['rshrinkage_l4'];
									} ?>
								</td>
								<!-- <td><?php //if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rshrinkage_l5'];}else{echo $rcek1['shrinkage_l5'];}  ?></td> -->
								<td>
									<?php if ($rcek1['shrinkage_l5'] != "") {
										echo $rcek1['shrinkage_l5'];
									} else {
										echo $rcekR['rshrinkage_l5'];
									} ?>
								</td>
								<!-- <td><?php //if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rshrinkage_l6'];}else{echo $rcek1['shrinkage_l6'];}  ?></td> -->
								<td>
									<?php if ($rcek1['shrinkage_l6'] != "") {
										echo $rcek1['shrinkage_l6'];
									} else {
										echo $rcekR['rshrinkage_l6'];
									} ?>
								</td>
							</tr>
						<?php } ?>
						<?php if ($rcek1['shrinkage_w1'] != "" or $rcek1['shrinkage_w2'] != "" or $rcek1['shrinkage_w3'] != "" or $rcek1['shrinkage_w4'] != "") { ?>
							<tr>
								<th colspan="2">Shrinkage Width</th>
								<!-- <td><?php //if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rshrinkage_w1'];}else{echo $rcek1['shrinkage_w1'];}  ?></td>
				<td><?php //if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rshrinkage_w2'];}else{echo $rcek1['shrinkage_w2'];}  ?></td>
				<td><?php //if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rshrinkage_w3'];}else{echo $rcek1['shrinkage_w3'];}  ?></td>
				<td><?php //if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rshrinkage_w4'];}else{echo $rcek1['shrinkage_w4'];}  ?></td>
				<td><?php //if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rshrinkage_w5'];}else{echo $rcek1['shrinkage_w5'];}  ?></td>
				<td><?php //if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rshrinkage_w6'];}else{echo $rcek1['shrinkage_w6'];}  ?></td> -->

								<td>
									<?php if ($rcek1['shrinkage_w1'] != "") {
										echo $rcek1['shrinkage_w1'];
									} else {
										echo $rcekR['rshrinkage_w1'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['shrinkage_w2'] != "") {
										echo $rcek1['shrinkage_w2'];
									} else {
										echo $rcekR['rshrinkage_w2'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['shrinkage_w3'] != "") {
										echo $rcek1['shrinkage_w3'];
									} else {
										echo $rcekR['rshrinkage_w3'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['shrinkage_w4'] != "") {
										echo $rcek1['shrinkage_w4'];
									} else {
										echo $rcekR['rshrinkage_w4'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['shrinkage_w5'] != "") {
										echo $rcek1['shrinkage_w5'];
									} else {
										echo $rcekR['rshrinkage_w5'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['shrinkage_w6'] != "") {
										echo $rcek1['shrinkage_w6'];
									} else {
										echo $rcekR['rshrinkage_w6'];
									} ?>
								</td>
							</tr>
						<?php } ?>
						<?php if ($rcek1['spirality1'] != "" or $rcek1['spirality2'] != "" or $rcek1['spirality3'] != "" or $rcek1['spirality4'] != "") { ?>
							<tr>
								<th colspan="2">Spirality</th>
								<!-- <td><?php //if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rspirality1'];}else{echo $rcek1['spirality1'];}  ?></td>
				<td><?php //if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rspirality2'];}else{echo $rcek1['spirality2'];}  ?></td>
				<td><?php //if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rspirality3'];}else{echo $rcek1['spirality3'];}  ?></td>
				<td><?php //if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rspirality4'];}else{echo $rcek1['spirality4'];}  ?></td>
				<td><?php //if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rspirality5'];}else{echo $rcek1['spirality5'];}  ?></td>
				<td><?php //if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rspirality6'];}else{echo $rcek1['spirality6'];}  ?></td> -->

								<td>
									<?php if ($rcek1['spirality1'] != "") {
										echo $rcek1['spirality1'];
									} else {
										echo $rcekR['rspirality1'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['spirality2'] != "") {
										echo $rcek1['spirality2'];
									} else {
										echo $rcekR['rspirality2'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['spirality3'] != "") {
										echo $rcek1['spirality3'];
									} else {
										echo $rcekR['rspirality3'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['spirality4'] != "") {
										echo $rcek1['spirality4'];
									} else {
										echo $rcekR['rspirality4'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['spirality5'] != "") {
										echo $rcek1['spirality5'];
									} else {
										echo $rcekR['rspirality5'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['spirality6'] != "") {
										echo $rcek1['spirality6'];
									} else {
										echo $rcekR['rspirality6'];
									} ?>
								</td>
							</tr>
						<?php } ?>
						<?php if ($rcek1['apperss_ch1'] != "" or $rcek1['apperss_ch2'] != "" or $rcek1['apperss_ch3'] != "" or $rcek1['apperss_ch4'] != "") { ?>
							<tr>
								<th>Apperance</th>
								<th>&nbsp;</th>
								<td>
									<?php //if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rapperss_ch1'];}else{echo $rcek1['apperss_ch1'];}  ?>
									<?php if ($rcek1['apperss_ch1'] != "") {
										echo $rcek1['apperss_ch1'];
									} else {
										echo $rcekR['rapperss_ch1'];
									} ?>
								</td>
								<td>
									<?php //if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rapperss_ch2'];}else{echo $rcek1['apperss_ch2'];}  ?>
									<?php if ($rcek1['apperss_ch2'] != "") {
										echo $rcek1['apperss_ch2'];
									} else {
										echo $rcekR['rapperss_ch2'];
									} ?>
								</td>
								<td>
									<?php //if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rapperss_ch3'];}else{echo $rcek1['apperss_ch3'];}  ?>
									<?php if ($rcek1['apperss_ch3'] != "") {
										echo $rcek1['apperss_ch3'];
									} else {
										echo $rcekR['rapperss_ch3'];
									} ?>
								</td>
								<td colspan="3">
									<?php if ($rcek1['stat_fwss'] == "RANDOM") {
										echo $rcekR['rapperss_ch4'];
									} else {
										echo $rcek1['apperss_ch4'];
									} ?>
								</td>
							</tr>
							<tr>
								<th>Colorchange</th>
								<th>&nbsp;</th>
								<!-- <td><?php //if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rapperss_cc1'];}else{echo $rcek1['apperss_cc1'];}  ?> -->
								<td>
									<?php if ($rcek1['apperss_cc1'] != "") {
										echo $rcek1['apperss_cc1'];
									} else {
										echo $rcekR['rapperss_cc1'];
									} ?>
								</td>
								<!-- <td><?php //if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rapperss_cc2'];}else{echo $rcek1['apperss_cc2'];}  ?> -->
								<td>
									<?php if ($rcek1['apperss_cc2'] != "") {
										echo $rcek1['apperss_cc2'];
									} else {
										echo $rcekR['rapperss_cc2'];
									} ?>
								</td>
								<!-- <td><?php //if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rapperss_cc3'];}else{echo $rcek1['apperss_cc3'];}  ?> -->
								<td>
									<?php if ($rcek1['apperss_cc3'] != "") {
										echo $rcek1['apperss_cc3'];
									} else {
										echo $rcekR['rapperss_cc3'];
									} ?>
								</td>
								<!-- <td colspan="3"><?php //if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rapperss_cc4'];}else{echo $rcek1['apperss_cc4'];}  ?> -->
								<td colspan="3">
									<?php if ($rcek1['apperss_cc4'] != "") {
										echo $rcek1['apperss_cc4'];
									} else {
										echo $rcekR['rapperss_cc4'];
									} ?>
								</td>
							</tr>
						<?php } ?>
						<?php if ($rcek1['pm_f1'] != "" or $rcek1['pm_f2'] != "" or $rcek1['pm_f3'] != "" or $rcek1['pm_f4'] != "" or $rcek1['pm_f5'] != "") { ?>
							<tr>
								<th rowspan="2">Pilling Martindle</th>
								<th>Face</th>
								<!-- <td><?php //if($rcek1['stat_pm']=="RANDOM"){echo $rcekR['rpm_f1'];}else{echo $rcek1['pm_f1'];}  ?></td>
				<td><?php //if($rcek1['stat_pm']=="RANDOM"){echo $rcekR['rpm_f2'];}else{echo $rcek1['pm_f2'];}  ?></td>
				<td><?php //if($rcek1['stat_pm']=="RANDOM"){echo $rcekR['rpm_f3'];}else{echo $rcek1['pm_f3'];}  ?></td>
				<td><?php //if($rcek1['stat_pm']=="RANDOM"){echo $rcekR['rpm_f4'];}else{echo $rcek1['pm_f4'];}  ?></td>
				<td><?php //if($rcek1['stat_pm']=="RANDOM"){echo $rcekR['rpm_f5'];}else{echo $rcek1['pm_f5'];}  ?></td> -->

								<td>
									<?php if ($rcek1['pm_f1'] != "") {
										echo $rcek1['pm_f1'];
									} else {
										echo $rcekR['rpm_f1'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['pm_f2'] != "") {
										echo $rcek1['pm_f2'];
									} else {
										echo $rcekR['rpm_f2'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['pm_f3'] != "") {
										echo $rcek1['pm_f3'];
									} else {
										echo $rcekR['rpm_f3'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['pm_f4'] != "") {
										echo $rcek1['pm_f4'];
									} else {
										echo $rcekR['rpm_f4'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['pm_f5'] != "") {
										echo $rcek1['pm_f5'];
									} else {
										echo $rcekR['rpm_f5'];
									} ?>
								</td>
								<td>&nbsp;</td>
							</tr>
						<?php } ?>
						<?php if ($rcek1['pm_b1'] != "" or $rcek1['pm_b2'] != "" or $rcek1['pm_b3'] != "" or $rcek1['pm_b4'] != "" or $rcek1['pm_b5'] != "" or $rcek1['pm_f1'] != "") { ?>
							<tr>
								<th>Back</th>
								<!-- <td><?php //if($rcek1['stat_pm']=="RANDOM"){echo $rcekR['rpm_b1'];}else{echo $rcek1['pm_b1'];}  ?></td>
				<td><?php //if($rcek1['stat_pm']=="RANDOM"){echo $rcekR['rpm_b2'];}else{echo $rcek1['pm_b2'];}  ?></td>
				<td><?php //if($rcek1['stat_pm']=="RANDOM"){echo $rcekR['rpm_b3'];}else{echo $rcek1['pm_b3'];}  ?></td>
				<td><?php //if($rcek1['stat_pm']=="RANDOM"){echo $rcekR['rpm_b4'];}else{echo $rcek1['pm_b4'];}  ?></td>
				<td><?php //if($rcek1['stat_pm']=="RANDOM"){echo $rcekR['rpm_b5'];}else{echo $rcek1['pm_b5'];}  ?></td> -->

								<td>
									<?php if ($rcek1['pm_b1'] != "") {
										echo $rcek1['pm_b1'];
									} else {
										echo $rcekR['rpm_b1'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['pm_b2'] != "") {
										echo $rcek1['pm_b2'];
									} else {
										echo $rcekR['rpm_b2'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['pm_b3'] != "") {
										echo $rcek1['pm_b3'];
									} else {
										echo $rcekR['rpm_b3'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['pm_b4'] != "") {
										echo $rcek1['pm_b4'];
									} else {
										echo $rcekR['rpm_b4'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['pm_b5'] != "") {
										echo $rcek1['pm_b5'];
									} else {
										echo $rcekR['rpm_b5'];
									} ?>
								</td>
								<td>&nbsp;</td>
							</tr>
						<?php } ?>
						<?php if ($rcek1['pl_f1'] != "" or $rcek1['pl_f2'] != "" or $rcek1['pl_f3'] != "" or $rcek1['pl_f4'] != "" or $rcek1['pl_f5'] != "" or $rcek1['pl_b1'] != "") { ?>
							<tr>
								<th rowspan="2">Pilling Locus</th>
								<th>Face</th>
								<!-- <td><?php //if($rcek1['stat_pl']=="RANDOM"){echo $rcekR['rpl_f1'];}else{echo $rcek1['pl_f1'];}  ?></td>
				<td><?php //if($rcek1['stat_pl']=="RANDOM"){echo $rcekR['rpl_f2'];}else{echo $rcek1['pl_f2'];}  ?></td>
				<td><?php //if($rcek1['stat_pl']=="RANDOM"){echo $rcekR['rpl_f3'];}else{echo $rcek1['pl_f3'];}  ?></td>
				<td><?php //if($rcek1['stat_pl']=="RANDOM"){echo $rcekR['rpl_f4'];}else{echo $rcek1['pl_f4'];}  ?></td>
				<td><?php //if($rcek1['stat_pl']=="RANDOM"){echo $rcekR['rpl_f5'];}else{echo $rcek1['pl_f5'];}  ?></td> -->

								<td>
									<?php if ($rcek1['pl_f1'] != "") {
										echo $rcek1['pl_f1'];
									} else {
										echo $rcekR['rpl_f1'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['pl_f2'] != "") {
										echo $rcek1['pl_f2'];
									} else {
										echo $rcekR['rpl_f2'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['pl_f3'] != "") {
										echo $rcek1['pl_f3'];
									} else {
										echo $rcekR['rpl_f3'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['pl_f4'] != "") {
										echo $rcek1['pl_f4'];
									} else {
										echo $rcekR['rpl_f4'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['pl_f5'] != "") {
										echo $rcek1['pl_f5'];
									} else {
										echo $rcekR['rpl_f5'];
									} ?>
								</td>
								<td>&nbsp;</td>
							</tr>
						<?php } ?>
						<?php if ($rcek1['pl_b1'] != "" or $rcek1['pl_b2'] != "" or $rcek1['pl_b3'] != "" or $rcek1['pl_b4'] != "" or $rcek1['pl_b5'] != "" or $rcek1['pl_f1'] != "") { ?>
							<tr>
								<th>Back</th>
								<!-- <td><?php //if($rcek1['stat_pl']=="RANDOM"){echo $rcekR['rpl_b1'];}else{echo $rcek1['pl_b1'];}  ?></td>
				<td><?php //if($rcek1['stat_pl']=="RANDOM"){echo $rcekR['rpl_b2'];}else{echo $rcek1['pl_b2'];}  ?></td>
				<td><?php //if($rcek1['stat_pl']=="RANDOM"){echo $rcekR['rpl_b3'];}else{echo $rcek1['pl_b3'];}  ?></td>
				<td><?php //if($rcek1['stat_pl']=="RANDOM"){echo $rcekR['rpl_b4'];}else{echo $rcek1['pl_b4'];}  ?></td>
				<td><?php //if($rcek1['stat_pl']=="RANDOM"){echo $rcekR['rpl_b5'];}else{echo $rcek1['pl_b5'];}  ?></td> -->

								<td>
									<?php if ($rcek1['pl_b1'] != "") {
										echo $rcek1['pl_b1'];
									} else {
										echo $rcekR['rpl_b1'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['pl_b2'] != "") {
										echo $rcek1['pl_b2'];
									} else {
										echo $rcekR['rpl_b2'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['pl_b3'] != "") {
										echo $rcek1['pl_b3'];
									} else {
										echo $rcekR['rpl_b3'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['pl_b4'] != "") {
										echo $rcek1['pl_b4'];
									} else {
										echo $rcekR['rpl_b4'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['pl_b5'] != "") {
										echo $rcek1['pl_b5'];
									} else {
										echo $rcekR['rpl_b5'];
									} ?>
								</td>
								<td>&nbsp;</td>
							</tr>
						<?php } ?>
						<?php if ($rcek1['pb_f1'] != "" or $rcek1['pb_f2'] != "" or $rcek1['pb_f3'] != "" or $rcek1['pb_f4'] != "" or $rcek1['pb_f5'] != "") { ?>
							<tr>
								<th rowspan="2">Pilling Box</th>
								<th>Face</th>
								<!-- <td><?php //if($rcek1['stat_pb']=="RANDOM"){echo $rcekR['rpb_f1'];}else{echo $rcek1['pb_f1'];}  ?></td>
				<td><?php //if($rcek1['stat_pb']=="RANDOM"){echo $rcekR['rpb_f2'];}else{echo $rcek1['pb_f2'];}  ?></td>
				<td><?php //if($rcek1['stat_pb']=="RANDOM"){echo $rcekR['rpb_f3'];}else{echo $rcek1['pb_f3'];}  ?></td>
				<td><?php //if($rcek1['stat_pb']=="RANDOM"){echo $rcekR['rpb_f4'];}else{echo $rcek1['pb_f4'];}  ?></td>
				<td><?php //if($rcek1['stat_pb']=="RANDOM"){echo $rcekR['rpb_f5'];}else{echo $rcek1['pb_f5'];}  ?></td> -->

								<td>
									<?php if ($rcek1['pb_f1'] != "") {
										echo $rcek1['pb_f1'];
									} else {
										echo $rcekR['rpb_f1'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['pb_f2'] != "") {
										echo $rcek1['pb_f2'];
									} else {
										echo $rcekR['rpb_f2'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['pb_f3'] != "") {
										echo $rcek1['pb_f3'];
									} else {
										echo $rcekR['rpb_f3'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['pb_f4'] != "") {
										echo $rcek1['pb_f4'];
									} else {
										echo $rcekR['rpb_f4'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['pb_f5'] != "") {
										echo $rcek1['pb_f5'];
									} else {
										echo $rcekR['rpb_f5'];
									} ?>
								</td>
								<td>&nbsp;</td>
							</tr>
						<?php } ?>
						<?php if ($rcek1['pb_b1'] != "" or $rcek1['pb_b2'] != "" or $rcek1['pb_b3'] != "" or $rcek1['pb_b4'] != "" or $rcek1['pb_b5'] != "") { ?>
							<tr>
								<th>Back</th>
								<!-- <td><?php //if($rcek1['stat_pb']=="RANDOM"){echo $rcekR['rpb_b1'];}else{echo $rcek1['pb_b1'];}  ?></td>
				<td><?php //if($rcek1['stat_pb']=="RANDOM"){echo $rcekR['rpb_b2'];}else{echo $rcek1['pb_b2'];}  ?></td>
				<td><?php //if($rcek1['stat_pb']=="RANDOM"){echo $rcekR['rpb_b3'];}else{echo $rcek1['pb_b3'];}  ?></td>
				<td><?php //if($rcek1['stat_pb']=="RANDOM"){echo $rcekR['rpb_b4'];}else{echo $rcek1['pb_b4'];}  ?></td>
				<td><?php //if($rcek1['stat_pb']=="RANDOM"){echo $rcekR['rpb_b5'];}else{echo $rcek1['pb_b5'];}  ?></td> -->

								<td>
									<?php if ($rcek1['pb_b1'] != "") {
										echo $rcek1['pb_b1'];
									} else {
										echo $rcekR['rpb_b1'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['pb_b2'] != "") {
										echo $rcek1['pb_b2'];
									} else {
										echo $rcekR['rpb_b2'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['pb_b3'] != "") {
										echo $rcek1['pb_b3'];
									} else {
										echo $rcekR['rpb_b3'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['pb_b4'] != "") {
										echo $rcek1['pb_b4'];
									} else {
										echo $rcekR['rpb_b4'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['pb_b5'] != "") {
										echo $rcek1['pb_b5'];
									} else {
										echo $rcekR['rpb_b5'];
									} ?>
								</td>
								<td>&nbsp;</td>
							</tr>
						<?php } ?>
						<?php if ($rcek1['prt_f1'] != "" or $rcek1['prt_f2'] != "" or $rcek1['prt_f3'] != "" or $rcek1['prt_f4'] != "" or $rcek1['prt_f5'] != "" or $rcek1['prt_b1'] != "") { ?>
							<tr>
								<th rowspan="2">Pilling Random Tumbler</th>
								<th>Face</th>
								<!-- <td><?php //if($rcek1['stat_prt']=="RANDOM"){echo $rcekR['rprt_f1'];}else{echo $rcek1['prt_f1'];}  ?></td>
				<td><?php //if($rcek1['stat_prt']=="RANDOM"){echo $rcekR['rprt_f2'];}else{echo $rcek1['prt_f2'];}  ?></td>
				<td><?php //if($rcek1['stat_prt']=="RANDOM"){echo $rcekR['rprt_f3'];}else{echo $rcek1['prt_f3'];}  ?></td>
				<td><?php //if($rcek1['stat_prt']=="RANDOM"){echo $rcekR['rprt_f4'];}else{echo $rcek1['prt_f4'];}  ?></td>
				<td><?php //if($rcek1['stat_prt']=="RANDOM"){echo $rcekR['rprt_f5'];}else{echo $rcek1['prt_f5'];}  ?></td> -->

								<td>
									<?php if ($rcek1['prt_f1'] != "") {
										echo $rcek1['prt_f1'];
									} else {
										echo $rcekR['rprt_f1'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['prt_f2'] != "") {
										echo $rcek1['prt_f2'];
									} else {
										echo $rcekR['rprt_f2'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['prt_f3'] != "") {
										echo $rcek1['prt_f3'];
									} else {
										echo $rcekR['rprt_f3'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['prt_f4'] != "") {
										echo $rcek1['prt_f4'];
									} else {
										echo $rcekR['rprt_f4'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['prt_f5'] != "") {
										echo $rcek1['prt_f5'];
									} else {
										echo $rcekR['rprt_f5'];
									} ?>
								</td>
								<td>&nbsp;</td>
							</tr>
						<?php } ?>
						<?php if ($rcek1['prt_f1'] != "" or $rcek1['prt_b1'] != "" or $rcek1['prt_b2'] != "" or $rcek1['prt_b3'] != "" or $rcek1['prt_b4'] != "" or $rcek1['prt_b5'] != "") { ?>
							<tr>
								<th>Back</th>
								<!-- <td><?php //if($rcek1['stat_prt']=="RANDOM"){echo $rcekR['rprt_b1'];}else{echo $rcek1['prt_b1'];}  ?></td>
				<td><?php //if($rcek1['stat_prt']=="RANDOM"){echo $rcekR['rprt_b2'];}else{echo $rcek1['prt_b2'];}  ?></td>
				<td><?php //if($rcek1['stat_prt']=="RANDOM"){echo $rcekR['rprt_b3'];}else{echo $rcek1['prt_b3'];}  ?></td>
				<td><?php //if($rcek1['stat_prt']=="RANDOM"){echo $rcekR['rprt_b4'];}else{echo $rcek1['prt_b4'];}  ?></td>
				<td><?php //if($rcek1['stat_prt']=="RANDOM"){echo $rcekR['rprt_b5'];}else{echo $rcek1['prt_b5'];}  ?></td> -->

								<td>
									<?php if ($rcek1['prt_b1'] != "") {
										echo $rcek1['prt_b1'];
									} else {
										echo $rcekR['rprt_b1'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['prt_b2'] != "") {
										echo $rcek1['prt_b2'];
									} else {
										echo $rcekR['rprt_b2'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['prt_b3'] != "") {
										echo $rcek1['prt_b3'];
									} else {
										echo $rcekR['rprt_b3'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['prt_b4'] != "") {
										echo $rcek1['prt_b4'];
									} else {
										echo $rcekR['rprt_b4'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['prt_b5'] != "") {
										echo $rcek1['prt_b5'];
									} else {
										echo $rcekR['rprt_b5'];
									} ?>
								</td>
								<td>&nbsp;</td>
							</tr>
						<?php } ?>
						<?php if ($rcek1['abration'] != "") { ?>
							<tr>
								<th colspan="2">Abration</th>
								<td colspan="6">
									<?php //if($rcek1['stat_abr']=="RANDOM"){echo $rcekR['rabration'];}else{echo $rcek1['abration'];}  ?>
									<?php if ($rcek1['abration'] != "RANDOM") {
										echo $rcek1['abration'];
									} else {
										echo $rcekR['rabration'];
									} ?>
								</td>
							</tr>
						<?php } ?>
						<?php if ($rcek1['sm_l1'] != "" or $rcek1['sm_l2'] != "" or $rcek1['sm_l3'] != "" or $rcek1['sm_l4'] != "") { ?>
							<tr>
								<th rowspan="2">Snagging Mace</th>
								<th>Len</th>
								<!-- <td><?php //if($rcek1['stat_sm']=="RANDOM"){echo $rcekR['rsm_l1'];}else{echo $rcek1['sm_l1'];}  ?></td>
				<td><?php //if($rcek1['stat_sm']=="RANDOM"){echo $rcekR['rsm_l2'];}else{echo $rcek1['sm_l2'];}  ?></td>
				<td><?php //if($rcek1['stat_sm']=="RANDOM"){echo $rcekR['rsm_l3'];}else{echo $rcek1['sm_l3'];}  ?></td>
				<td><?php //if($rcek1['stat_sm']=="RANDOM"){echo $rcekR['rsm_l4'];}else{echo $rcek1['sm_l4'];}  ?></td> -->

								<td>
									<?php if ($rcek1['sm_l1'] != "") {
										echo $rcek1['sm_l1'];
									} else {
										echo $rcekR['rsm_l1'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['sm_l2'] != "") {
										echo $rcek1['sm_l2'];
									} else {
										echo $rcekR['rsm_l2'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['sm_l3'] != "") {
										echo $rcek1['sm_l3'];
									} else {
										echo $rcekR['rsm_l3'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['sm_l4'] != "") {
										echo $rcek1['sm_l4'];
									} else {
										echo $rcekR['rsm_l4'];
									} ?>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
						<?php } ?>
						<?php if ($rcek1['sm_w1'] != "" or $rcek1['sm_w2'] != "" or $rcek1['sm_w3'] != "" or $rcek1['sm_w4'] != "") { ?>
							<tr>
								<th>Wid</th>
								<!-- <td><?php //if($rcek1['stat_sm']=="RANDOM"){echo $rcekR['rsm_w1'];}else{echo $rcek1['sm_w1'];}  ?></td>
				<td><?php //if($rcek1['stat_sm']=="RANDOM"){echo $rcekR['rsm_w2'];}else{echo $rcek1['sm_w2'];}  ?></td>
				<td><?php //if($rcek1['stat_sm']=="RANDOM"){echo $rcekR['rsm_w3'];}else{echo $rcek1['sm_w3'];}  ?></td>
				<td><?php //if($rcek1['stat_sm']=="RANDOM"){echo $rcekR['rsm_w4'];}else{echo $rcek1['sm_w4'];}  ?></td> -->

								<td>
									<?php if ($rcek1['sm_w1'] != "") {
										echo $rcek1['sm_w1'];
									} else {
										echo $rcekR['rsm_w1'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['sm_w2'] != "") {
										echo $rcek1['sm_w2'];
									} else {
										echo $rcekR['rsm_w2'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['sm_w3'] != "") {
										echo $rcek1['sm_w3'];
									} else {
										echo $rcekR['rsm_w3'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['sm_w4'] != "") {
										echo $rcek1['sm_w4'];
									} else {
										echo $rcekR['rsm_w4'];
									} ?>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
						<?php } ?>
						<?php if ($rcek1['sp_grdl1'] != "" or $rcek1['sp_clsl1'] != "" or $rcek1['sp_shol1'] != "" or $rcek1['sp_medl1'] != "" or $rcek1['sp_lonl1'] != "" or $rcek1['sp_grdl2'] != "" or $rcek1['sp_clsl2'] != "" or $rcek1['sp_shol2'] != "" or $rcek1['sp_medl2'] != "" or $rcek1['sp_lonl2'] != "" or $rcek1['sp_grdw1'] != "" or $rcek1['sp_clsw1'] != "" or $rcek1['sp_show1'] != "" or $rcek1['sp_medw1'] != "" or $rcek1['sp_lonw1'] != "" or $rcek1['sp_grdw2'] != "" or $rcek1['sp_clsw2'] != "" or $rcek1['sp_show2'] != "" or $rcek1['sp_medw2'] != "" or $rcek1['sp_lonw2'] != "") {
							if ($rcek1['sp_grdl1'] != "" or $rcek1['sp_clsl1'] != "" or $rcek1['sp_shol1'] != "" or $rcek1['sp_medl1'] != "" or $rcek1['sp_lonl1'] != "") {
								$rp1 = "1";
							} else {
								$rp1 = "0";
							}
							if ($rcek1['sp_grdl2'] != "" or $rcek1['sp_clsl2'] != "" or $rcek1['sp_shol2'] != "" or $rcek1['sp_medl2'] != "" or $rcek1['sp_lonl2'] != "") {
								$rp2 = "1";
							} else {
								$rp2 = "0";
							}
							if ($rcek1['sp_grdw1'] != "" or $rcek1['sp_clsw1'] != "" or $rcek1['sp_show1'] != "" or $rcek1['sp_medw1'] != "" or $rcek1['sp_lonw1'] != "") {
								$rp3 = "1";
							} else {
								$rp3 = "0";
							}
							if ($rcek1['sp_grdw2'] != "" or $rcek1['sp_clsw2'] != "" or $rcek1['sp_show2'] != "" or $rcek1['sp_medw2'] != "" or $rcek1['sp_lonw2'] != "") {
								$rp4 = "1";
							} else {
								$rp4 = "0";
							}
							$rowspan = $rp1 + $rp2 + $rp3 + $rp4 + 1;
							?>
							<tr>
								<th rowspan="<?php echo $rowspan; ?>">Snagging POD</th>
								<th>Srt</th>
								<th>Grd</th>
								<th>Cls</th>
								<th>Sho</th>
								<th>Med</th>
								<th>Long</th>
								<th>&nbsp;</th>
							</tr>
						<?php } ?>
						<?php if ($rcek1['sp_grdl1'] != "" or $rcek1['sp_clsl1'] != "" or $rcek1['sp_shol1'] != "" or $rcek1['sp_medl1'] != "" or $rcek1['sp_lonl1'] != "") { ?>
							<tr>
								<th>L1</th>
								<!-- <td><?php //if($rcek1['stat_sp']=="RANDOM"){echo $rcekR['rsp_grdl1'];}else{echo $rcek1['sp_grdl1'];}  ?></td>
				<td><?php //if($rcek1['stat_sp']=="RANDOM"){echo $rcekR['rsp_clsl1'];}else{echo $rcek1['sp_clsl1'];}  ?></td>
				<td><?php //if($rcek1['stat_sp']=="RANDOM"){echo $rcekR['rsp_shol1'];}else{echo $rcek1['sp_shol1'];}  ?></td>
				<td><?php //if($rcek1['stat_sp']=="RANDOM"){echo $rcekR['rsp_medl1'];}else{echo $rcek1['sp_medl1'];}  ?></td>
				<td><?php //if($rcek1['stat_sp']=="RANDOM"){echo $rcekR['rsp_lonl1'];}else{echo $rcek1['sp_lonl1'];}  ?></td> -->

								<td>
									<?php if ($rcek1['sp_grdl1'] != "") {
										echo $rcek1['sp_grdl1'];
									} else {
										echo $rcekR['rsp_grdl1'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['sp_clsl1'] != "") {
										echo $rcek1['sp_clsl1'];
									} else {
										echo $rcekR['rsp_clsl1'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['sp_shol1'] != "") {
										echo $rcek1['sp_shol1'];
									} else {
										echo $rcekR['rsp_shol1'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['sp_medl1'] != "") {
										echo $rcek1['sp_medl1'];
									} else {
										echo $rcekR['rsp_medl1'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['sp_lonl1'] != "") {
										echo $rcek1['sp_lonl1'];
									} else {
										echo $rcekR['rsp_lonl1'];
									} ?>
								</td>
								<td>&nbsp;</td>
							</tr>
						<?php } ?>
						<?php if ($rcek1['sp_grdl2'] != "" or $rcek1['sp_clsl2'] != "" or $rcek1['sp_shol2'] != "" or $rcek1['sp_medl2'] != "" or $rcek1['sp_lonl2'] != "") { ?>
							<tr>
								<th>L2</th>
								<!-- <td><?php //if($rcek1['stat_sp']=="RANDOM"){echo $rcekR['rsp_grdl2'];}else{echo $rcek1['sp_grdl2'];}  ?></td>
				<td><?php //if($rcek1['stat_sp']=="RANDOM"){echo $rcekR['rsp_clsl2'];}else{echo $rcek1['sp_clsl2'];}  ?></td>
				<td><?php //if($rcek1['stat_sp']=="RANDOM"){echo $rcekR['rsp_shol2'];}else{echo $rcek1['sp_shol2'];}  ?></td>
				<td><?php //if($rcek1['stat_sp']=="RANDOM"){echo $rcekR['rsp_medl2'];}else{echo $rcek1['sp_medl2'];}  ?></td>
				<td><?php //if($rcek1['stat_sp']=="RANDOM"){echo $rcekR['rsp_lonl2'];}else{echo $rcek1['sp_lonl2'];}  ?></td> -->

								<td>
									<?php if ($rcek1['sp_grdl2'] != "") {
										echo $rcek1['sp_grdl2'];
									} else {
										echo $rcekR['rsp_grdl2'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['sp_clsl2'] != "") {
										echo $rcek1['sp_clsl2'];
									} else {
										echo $rcekR['rsp_clsl2'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['sp_shol2'] != "") {
										echo $rcek1['sp_shol2'];
									} else {
										echo $rcekR['rsp_shol2'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['sp_medl2'] != "") {
										echo $rcek1['sp_medl2'];
									} else {
										echo $rcekR['rsp_medl2'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['sp_lonl2'] != "") {
										echo $rcek1['sp_lonl2'];
									} else {
										echo $rcekR['rsp_lonl2'];
									} ?>
								</td>
								<td>&nbsp;</td>
							</tr>
						<?php } ?>
						<?php if ($rcek1['sp_grdw1'] != "" or $rcek1['sp_clsw1'] != "" or $rcek1['sp_show1'] != "" or $rcek1['sp_medw1'] != "" or $rcek1['sp_lonw1'] != "") { ?>
							<tr>
								<th>W1</th>
								<!-- <td><?php //if($rcek1['stat_sp']=="RANDOM"){echo $rcekR['rsp_grdw1'];}else{echo $rcek1['sp_grdw1'];}  ?></td>
				<td><?php //if($rcek1['stat_sp']=="RANDOM"){echo $rcekR['rsp_clsw1'];}else{echo $rcek1['sp_clsw1'];}  ?></td>
				<td><?php //if($rcek1['stat_sp']=="RANDOM"){echo $rcekR['rsp_show1'];}else{echo $rcek1['sp_show1'];}  ?></td>
				<td><?php //if($rcek1['stat_sp']=="RANDOM"){echo $rcekR['rsp_medw1'];}else{echo $rcek1['sp_medw1'];}  ?></td>
				<td><?php //if($rcek1['stat_sp']=="RANDOM"){echo $rcekR['rsp_lonw1'];}else{echo $rcek1['sp_lonw1'];}  ?></td> -->

								<td>
									<?php if ($rcek1['sp_grdw1'] != "") {
										echo $rcek1['sp_grdw1'];
									} else {
										echo $rcekR['rsp_grdw1'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['sp_clsw1'] != "") {
										echo $rcek1['sp_clsw1'];
									} else {
										echo $rcekR['rsp_clsw1'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['sp_show1'] != "") {
										echo $rcek1['sp_show1'];
									} else {
										echo $rcekR['rsp_show1'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['sp_medw1'] != "") {
										echo $rcek1['sp_medw1'];
									} else {
										echo $rcekR['rsp_medw1'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['sp_lonw1'] != "") {
										echo $rcek1['sp_lonw1'];
									} else {
										echo $rcekR['rsp_lonw1'];
									} ?>
								</td>
								<td>&nbsp;</td>
							</tr>
						<?php } ?>
						<?php if ($rcek1['sp_grdw2'] != "" or $rcek1['sp_clsw2'] != "" or $rcek1['sp_show2'] != "" or $rcek1['sp_medw2'] != "" or $rcek1['sp_lonw2'] != "") { ?>
							<tr>
								<th>W2</th>
								<!-- <td><?php //if($rcek1['stat_sp']=="RANDOM"){echo $rcekR['rsp_grdw2'];}else{echo $rcek1['sp_grdw2'];}  ?></td>
				<td><?php //if($rcek1['stat_sp']=="RANDOM"){echo $rcekR['rsp_clsw2'];}else{echo $rcek1['sp_clsw2'];}  ?></td>
				<td><?php //if($rcek1['stat_sp']=="RANDOM"){echo $rcekR['rsp_show2'];}else{echo $rcek1['sp_show2'];}  ?></td>
				<td><?php //if($rcek1['stat_sp']=="RANDOM"){echo $rcekR['rsp_medw2'];}else{echo $rcek1['sp_medw2'];}  ?></td>
				<td><?php //if($rcek1['stat_sp']=="RANDOM"){echo $rcekR['rsp_lonw2'];}else{echo $rcek1['sp_lonw2'];}  ?></td> -->

								<td>
									<?php if ($rcek1['sp_grdw2'] != "") {
										echo $rcek1['sp_grdw2'];
									} else {
										echo $rcekR['rsp_grdw2'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['sp_clsw2'] != "") {
										echo $rcek1['sp_clsw2'];
									} else {
										echo $rcekR['rsp_clsw2'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['sp_show2'] != "") {
										echo $rcek1['sp_show2'];
									} else {
										echo $rcekR['rsp_show2'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['sp_medw2'] != "") {
										echo $rcek1['sp_medw2'];
									} else {
										echo $rcekR['rsp_medw2'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['sp_lonw2'] != "") {
										echo $rcek1['sp_lonw2'];
									} else {
										echo $rcekR['rsp_lonw2'];
									} ?>
								</td>
								<td>&nbsp;</td>
							</tr>
						<?php } ?>
						<?php if ($rcek1['sb_l1'] != "" or $rcek1['sb_l2'] != "" or $rcek1['sb_l3'] != "" or $rcek1['sb_l4'] != "") { ?>
							<tr>
								<th rowspan="2">Bean Bag</th>
								<th>Len</th>
								<!-- <td><?php //if($rcek1['stat_sb']=="RANDOM"){echo $rcekR['rsb_l1'];}else{echo $rcek1['sb_l1'];}  ?></td>
				<td><?php //if($rcek1['stat_sb']=="RANDOM"){echo $rcekR['rsb_l2'];}else{echo $rcek1['sb_l2'];}  ?></td>
				<td><?php //if($rcek1['stat_sb']=="RANDOM"){echo $rcekR['rsb_l3'];}else{echo $rcek1['sb_l3'];}  ?></td>
				<td><?php //if($rcek1['stat_sb']=="RANDOM"){echo $rcekR['rsb_l4'];}else{echo $rcek1['sb_l4'];}  ?></td> -->

								<td>
									<?php if ($rcek1['sb_l1'] != "") {
										echo $rcek1['sb_l1'];
									} else {
										echo $rcekR['rsb_l1'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['sb_l2'] != "") {
										echo $rcek1['sb_l2'];
									} else {
										echo $rcekR['rsb_l2'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['sb_l3'] != "") {
										echo $rcek1['sb_l3'];
									} else {
										echo $rcekR['rsb_l3'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['sb_l4'] != "") {
										echo $rcek1['sb_l4'];
									} else {
										echo $rcekR['rsb_l4'];
									} ?>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
						<?php } ?>
						<?php if ($rcek1['sb_w1'] != "" or $rcek1['sb_w2'] != "" or $rcek1['sb_w3'] != "" or $rcek1['sb_w4'] != "") { ?>
							<tr>
								<th>Wid</th>
								<!-- <td><?php //if($rcek1['stat_sb']=="RANDOM"){echo $rcekR['rsb_w1'];}else{echo $rcek1['sb_w1'];}  ?></td>
				<td><?php //if($rcek1['stat_sb']=="RANDOM"){echo $rcekR['rsb_w2'];}else{echo $rcek1['sb_w2'];}  ?></td>
				<td><?php //if($rcek1['stat_sb']=="RANDOM"){echo $rcekR['rsb_w3'];}else{echo $rcek1['sb_w3'];}  ?></td> -->

								<td>
									<?php if ($rcek1['sb_w1'] != "") {
										echo $rcek1['sb_w1'];
									} else {
										echo $rcekR['rsb_w1'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['sb_w2'] != "") {
										echo $rcek1['sb_w2'];
									} else {
										echo $rcekR['rsb_w2'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['sb_w3'] != "") {
										echo $rcek1['sb_w3'];
									} else {
										echo $rcekR['rsb_w3'];
									} ?>
								</td>
								<td>
									<?php echo $rcek1['sb_w4']; ?>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
						<?php } ?>
						<?php if ($rcek1['bs_instron'] != "" or $rcek1['bs_mullen'] != "" or $rcek1['bs_tru'] != "") { ?>
							<tr>
								<th colspan="2">Bursting Strength</th>
								<!-- <td><?php //if($rcek1['stat_bs2']=="RANDOM"){echo $rcekR['rbs_instron'];}else{echo $rcek1['bs_instron'];}  ?></td>
				<td><?php //if($rcek1['stat_bs3']=="RANDOM"){echo $rcekR['rbs_mullen'];}else{echo $rcek1['bs_mullen'];}  ?></td>
				<td colspan="4"><?php if ($rcek1['stat_bs'] == "RANDOM") {
					echo $rcekR['rbs_tru'];
				} else {
					echo $rcek1['bs_tru'];
				} ?></td> -->

								<td>
									<?php if ($rcek1['bs_instron'] != "") {
										echo $rcek1['bs_instron'];
									} else {
										echo $rcekR['rbs_instron'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['bs_mullen'] != "") {
										echo $rcek1['bs_mullen'];
									} else {
										echo $rcekR['rbs_mullen'];
									} ?>
								</td>
								<td colspan="4">
									<?php if ($rcek1['bs_tru'] != "") {
										echo $rcek1['bs_tru'];
									} else {
										echo $rcekR['rbs_tru'];
									} ?>
								</td>
							</tr>
						<?php } ?>
						<?php if ($rcek1['thick1'] != "" or $rcek1['thick2'] != "" or $rcek1['thick3'] != "" or $rcek1['thickav'] != "") { ?>
							<tr>
								<th colspan="2">Thickness</th>
								<!-- <td><?php //if($rcek1['stat_th']=="RANDOM"){echo $rcekR['rthick1'];}else{echo $rcek1['thick1'];}  ?></td>
				<td><?php //if($rcek1['stat_th']=="RANDOM"){echo $rcekR['rthick2'];}else{echo $rcek1['thick2'];}  ?></td>
				<td><?php //if($rcek1['stat_th']=="RANDOM"){echo $rcekR['rthick3'];}else{echo $rcek1['thick3'];}  ?></td>
				<td><?php //if($rcek1['stat_th']=="RANDOM"){echo $rcekR['rthickav'];}else{echo $rcek1['thickav'];}  ?></td> -->

								<td>
									<?php if ($rcek1['thick1'] != "") {
										echo $rcek1['thick1'];
									} else {
										echo $rcekR['rthick1'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['thick2'] != "") {
										echo $rcek1['thick2'];
									} else {
										echo $rcekR['rthick2'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['thick3'] != "") {
										echo $rcek1['thick3'];
									} else {
										echo $rcekR['rthick3'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['thickav'] != "") {
										echo $rcek1['thickav'];
									} else {
										echo $rcekR['rthickav'];
									} ?>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
						<?php } ?>
						<?php if ($rcek1['stretch_l1'] != "" or $rcek1['stretch_l2'] != "" or $rcek1['stretch_l3'] != "" or $rcek1['stretch_l4'] != "" or $rcek1['stretch_l5'] != "") { ?>
							<tr>
								<th rowspan="3">Stretch</th>
								<th>Load</th>
								<td>
									<?php if ($rcek1['load_stretch'] != "") {
										echo $rcek1['load_stretch'];
									} else {
										echo $rcekR['rload_stretch'];
									}
									//if($rcek1['stat_sr']=="RANDOM"){echo $rcekR['rload_stretch'];}else{echo $rcek1['load_stretch'];}  ?>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<th>Len</th>
								<td>
									<?php if ($rcek1['stretch_l1'] != "") {
										echo $rcek1['stretch_l1'];
									} else {
										echo $rcekR['rstretch_l1'];
									}
									//if($rcek1['stat_sr']=="RANDOM"){echo $rcekR['rstretch_l1'];}else{echo $rcek1['stretch_l1'];}  ?>
								</td>
								<td>
									<?php if ($rcek1['stretch_l2'] != "") {
										echo $rcek1['stretch_l2'];
									} else {
										echo $rcekR['rstretch_l2'];
									}
									//if($rcek1['stat_sr']=="RANDOM"){echo $rcekR['rstretch_l2'];}else{echo $rcek1['stretch_l2'];}  ?>
								</td>
								<td>
									<?php if ($rcek1['stretch_l3'] != "") {
										echo $rcek1['stretch_l3'];
									} else {
										echo $rcekR['rstretch_l3'];
									}
									//if($rcek1['stat_sr']=="RANDOM"){echo $rcekR['rstretch_l3'];}else{echo $rcek1['stretch_l3'];}  ?>
								</td>
								<td>
									<?php if ($rcek1['stretch_l4'] != "") {
										echo $rcek1['stretch_l4'];
									} else {
										echo $rcekR['rstretch_l4'];
									}
									//if($rcek1['stat_sr']=="RANDOM"){echo $rcekR['rstretch_l4'];}else{echo $rcek1['stretch_l4'];}  ?>
								</td>
								<td>
									<?php if ($rcek1['stretch_l5'] != "") {
										echo $rcek1['stretch_l5'];
									} else {
										echo $rcekR['rstretch_l5'];
									}
									//if($rcek1['stat_sr']=="RANDOM"){echo $rcekR['rstretch_l5'];}else{echo $rcek1['stretch_l5'];}  ?>
								</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<th>Wid</th>
								<td>
									<?php if ($rcek1['stretch_w1'] != "") {
										echo $rcek1['stretch_w1'];
									} else {
										echo $rcekR['rstretch_w1'];
									}
									//if($rcek1['stat_sr']=="RANDOM"){echo $rcekR['rstretch_w1'];}else{echo $rcek1['stretch_w1'];}  ?>
								</td>
								<td>
									<?php if ($rcek1['stretch_w2'] != "") {
										echo $rcek1['stretch_w2'];
									} else {
										echo $rcekR['rstretch_w2'];
									}
									//if($rcek1['stat_sr']=="RANDOM"){echo $rcekR['rstretch_w2'];}else{echo $rcek1['stretch_w2'];}  ?>
								</td>
								<td>
									<?php if ($rcek1['stretch_w3'] != "") {
										echo $rcek1['stretch_w3'];
									} else {
										echo $rcekR['rstretch_w3'];
									}
									//if($rcek1['stat_sr']=="RANDOM"){echo $rcekR['rstretch_w3'];}else{echo $rcek1['stretch_w3'];}  ?>
								</td>
								<td>
									<?php if ($rcek1['stretch_w4'] != "") {
										echo $rcek1['stretch_w4'];
									} else {
										echo $rcekR['rstretch_w4'];
									}
									//if($rcek1['stat_sr']=="RANDOM"){echo $rcekR['rstretch_w4'];}else{echo $rcek1['stretch_w4'];}  ?>
								</td>
								<td>
									<?php if ($rcek1['stretch_w5'] != "") {
										echo $rcek1['stretch_w5'];
									} else {
										echo $rcekR['rstretch_w5'];
									}
									//if($rcek1['stat_sr']=="RANDOM"){echo $rcekR['rstretch_w5'];}else{echo $rcek1['stretch_w5'];}  ?>
								</td>
								<td>&nbsp;</td>
							</tr>
						<?php } ?>
						<?php if ($rcek1['recover_l1'] != "" or $rcek1['recover_l2'] != "" or $rcek1['recover_l3'] != "" or $rcek1['recover_l4'] != "" or $rcek1['recover_l5'] != "") { ?>
							<tr>
								<th rowspan="2">Recovery</th>
								<th>Len</th>
								<td>
									<?php if ($rcek1['recover_l1'] != "") {
										echo $rcek1['recover_l1'];
									} else {
										echo $rcekR['rrecover_l1'];
									}
									//if($rcek1['stat_sr']=="RANDOM"){echo $rcekR['rrecover_l1'];}else{echo $rcek1['recover_l1'];}  ?>
								</td>
								<td>
									<?php if ($rcek1['recover_l2'] != "") {
										echo $rcek1['recover_l2'];
									} else {
										echo $rcekR['rrecover_l2'];
									}
									//if($rcek1['stat_sr']=="RANDOM"){echo $rcekR['rrecover_l11'];}else{echo $rcek1['recover_l11'];}  ?>
								</td>
								<td>
									<?php if ($rcek1['recover_l3'] != "") {
										echo $rcek1['recover_l3'];
									} else {
										echo $rcekR['rrecover_l3'];
									}
									//if($rcek1['stat_sr']=="RANDOM"){echo $rcekR['rrecover_l3'];}else{echo $rcek1['recover_l3'];}  ?>
								</td>
								<td>
									<?php if ($rcek1['recover_l4'] != "") {
										echo $rcek1['recover_l4'];
									} else {
										echo $rcekR['rrecover_l4'];
									}
									//if($rcek1['stat_sr']=="RANDOM"){echo $rcekR['rrecover_l4'];}else{echo $rcek1['recover_l4'];}  ?>
								</td>
								<td>
									<?php if ($rcek1['recover_l5'] != "") {
										echo $rcek1['recover_l5'];
									} else {
										echo $rcekR['rrecover_l5'];
									}
									//if($rcek1['stat_sr']=="RANDOM"){echo $rcekR['rrecover_l5'];}else{echo $rcek1['recover_l5'];}  ?>
								</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<th>Wid</th>
								<td>
									<?php if ($rcek1['recover_w1'] != "") {
										echo $rcek1['recover_w1'];
									} else {
										echo $rcekR['rrecover_w1'];
									}
									//if($rcek1['stat_sr']=="RANDOM"){echo $rcekR['rrecover_w1'];}else{echo $rcek1['recover_w1'];}  ?>
								</td>
								<td>
									<?php if ($rcek1['recover_w2'] != "") {
										echo $rcek1['recover_w2'];
									} else {
										echo $rcekR['rrecover_w2'];
									}
									//if($rcek1['stat_sr']=="RANDOM"){echo $rcekR['rrecover_w11'];}else{echo $rcek1['recover_w11'];}  ?>
								</td>
								<td>
									<?php if ($rcek1['recover_w3'] != "") {
										echo $rcek1['recover_w3'];
									} else {
										echo $rcekR['rrecover_w3'];
									}
									//if($rcek1['stat_sr']=="RANDOM"){echo $rcekR['rrecover_w3'];}else{echo $rcek1['recover_w3'];}  ?>
								</td>
								<td>
									<?php if ($rcek1['recover_w4'] != "") {
										echo $rcek1['recover_w4'];
									} else {
										echo $rcekR['rrecover_w4'];
									}
									//if($rcek1['stat_sr']=="RANDOM"){echo $rcekR['rrecover_w4'];}else{echo $rcek1['recover_w4'];}  ?>
								</td>
								<td>
									<?php if ($rcek1['recover_w5'] != "") {
										echo $rcek1['recover_w5'];
									} else {
										echo $rcekR['rrecover_w5'];
									}
									//if($rcek1['stat_sr']=="RANDOM"){echo $rcekR['rrecover_w5'];}else{echo $rcek1['recover_w5'];}  ?>
								</td>
								<td>&nbsp;</td>
							</tr>
						<?php } ?>
						<?php if ($rcek1['growth_l1'] != "" or $rcek1['growth_l2'] != "") { ?>
							<tr>
								<th rowspan="2">Growth</th>
								<th>Len</th>
								<!-- <td><?php //if($rcek1['stat_gr']=="RANDOM"){echo $rcekR['rgrowth_l1'];}else{echo $rcek1['growth_l1'];}  ?></td>
				<td><?php //if($rcek1['stat_gr']=="RANDOM"){echo $rcekR['rgrowth_l2'];}else{echo $rcek1['growth_l2'];}  ?></td> -->

								<td>
									<?php if ($rcek1['growth_l1'] != "") {
										echo $rcek1['growth_l1'];
									} else {
										echo $rcekR['rgrowth_l1'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['growth_l2'] != "") {
										echo $rcek1['growth_l2'];
									} else {
										echo $rcekR['rgrowth_l2'];
									} ?>
								</td>
								<td colspan="4">&nbsp;</td>
							</tr>
							<tr>
								<th>Wid</th>
								<!-- <td><?php //if($rcek1['stat_gr']=="RANDOM"){echo $rcekR['rgrowth_w1'];}else{echo $rcek1['growth_w1'];}  ?></td>
				<td><?php //if($rcek1['stat_gr']=="RANDOM"){echo $rcekR['rgrowth_w2'];}else{echo $rcek1['growth_w2'];}  ?></td> -->

								<td>
									<?php if ($rcek1['growth_w1'] != "") {
										echo $rcek1['growth_w1'];
									} else {
										echo $rcekR['rgrowth_w1'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['growth_w2'] != "") {
										echo $rcek1['growth_w2'];
									} else {
										echo $rcekR['rgrowth_w2'];
									} ?>
								</td>
								<td colspan="4">&nbsp;</td>
							</tr>
						<?php } ?>
						<?php if ($rcek1['rec_growth_l1'] != "" or $rcek1['rec_growth_l2'] != "") { ?>
							<tr>
								<th rowspan="2">Recovery Growth</th>
								<th>Len</th>
								<!-- <td><?php //if($rcek1['stat_gr']=="RANDOM"){echo $rcekR['rrec_growth_l1'];}else{echo $rcek1['rec_growth_l1'];}  ?></td>
				<td><?php //if($rcek1['stat_gr']=="RANDOM"){echo $rcekR['rrec_growth_l1'];}else{echo $rcek1['rec_growth_l1'];}  ?></td> -->

								<td>
									<?php if ($rcek1['rec_growth_l1'] != "") {
										echo $rcek1['rec_growth_l1'];
									} else {
										echo $rcekR['rrec_growth_l1'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['rec_growth_l2'] != "") {
										echo $rcek1['rec_growth_l2'];
									} else {
										echo $rcekR['rrec_growth_l2'];
									} ?>
								</td>
								<td colspan="4">&nbsp;</td>
							</tr>
							<tr>
								<th>Wid</th>
								<!-- <td><?php //if($rcek1['stat_gr']=="RANDOM"){echo $rcekR['rrec_growth_w1'];}else{echo $rcek1['rec_growth_w1'];}  ?></td>
				<td><?php //if($rcek1['stat_gr']=="RANDOM"){echo $rcekR['rrec_growth_w2'];}else{echo $rcek1['rec_growth_w2'];}  ?></td> -->

								<td>
									<?php if ($rcek1['rec_growth_w1'] != "") {
										echo $rcek1['rec_growth_w1'];
									} else {
										echo $rcekR['rrec_growth_w1'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['rec_growth_w2'] != "") {
										echo $rcek1['rec_growth_w2'];
									} else {
										echo $rcekR['rrec_growth_w2'];
									} ?>
								</td>
								<td colspan="4">&nbsp;</td>
							</tr>
						<?php } ?>
						<?php if ($rcek1['apper_ch1'] != "" or $rcek1['apper_ch2'] != "" or $rcek1['apper_ch3'] != "") { ?>
							<tr>
								<th rowspan="7">Apperance</th>
								<th>&nbsp;</th>
								<td>
									<?php //if($rcek1['stat_ap']=="RANDOM"){echo $rcekR['rapper_ch1'];}else{echo $rcek1['apper_ch1'];}  ?>
									<?php if ($rcek1['apper_ch1'] != "") {
										echo $rcek1['apper_ch1'];
									} else {
										echo $rcekR['rapper_ch1'];
									} ?>
								</td>
								<td>
									<?php //if($rcek1['stat_ap']=="RANDOM"){echo $rcekR['rapper_ch2'];}else{echo $rcek1['apper_ch2'];}  ?>
									<?php if ($rcek1['apper_ch2'] != "") {
										echo $rcek1['apper_ch2'];
									} else {
										echo $rcekR['rapper_ch2'];
									} ?>
								</td>
								<td colspan="4">
									<?php //if($rcek1['stat_ap']=="RANDOM"){echo $rcekR['rapper_ch3'];}else{echo $rcek1['apper_ch3'];}  ?>
									<?php if ($rcek1['apper_ch3'] != "") {
										echo $rcek1['apper_ch3'];
									} else {
										echo $rcekR['rapper_ch3'];
									} ?>
								</td>
							</tr>
							<tr>
								<th>&nbsp;</th>
								<td>
									<?php //if($rcek1['stat_ap']=="RANDOM"){echo $rcekR['rapper_cc1'];}else{echo $rcek1['apper_cc1'];}  ?>
									<?php if ($rcek1['apper_cc1'] != "") {
										echo $rcek1['apper_cc1'];
									} else {
										echo $rcekR['rapper_cc1'];
									} ?>
								</td>
								<td>
									<?php //if($rcek1['stat_ap']=="RANDOM"){echo $rcekR['rapper_cc2'];}else{echo $rcek1['apper_cc2'];}  ?>
									<?php if ($rcek1['apper_cc2'] != "") {
										echo $rcek1['apper_cc2'];
									} else {
										echo $rcekR['rapper_cc2'];
									} ?>
								</td>
								<td colspan="4">
									<?php //if($rcek1['stat_ap']=="RANDOM"){echo $rcekR['rapper_cc3'];}else{echo $rcek1['apper_cc3'];}  ?>
									<?php if ($rcek1['apper_cc3'] != "") {
										echo $rcek1['apper_cc3'];
									} else {
										echo $rcekR['rapper_cc3'];
									} ?>
								</td>
							</tr>
							<tr>
								<th>&nbsp;</th>
								<td>
									<?php //if($rcek1['stat_ap']=="RANDOM"){echo $rcekR['rapper_st'];}else{echo $rcek1['apper_st'];}  ?>
									<?php if ($rcek1['apper_st'] != "") {
										echo $rcek1['apper_st'];
									} else {
										echo $rcekR['rapper_st'];
									} ?>
								</td>
								<td>
									<?php //if($rcek1['stat_ap']=="RANDOM"){echo $rcekR['rapper_st2'];}else{echo $rcek1['apper_st2'];}  ?>
									<?php if ($rcek1['apper_st2'] != "") {
										echo $rcek1['apper_st2'];
									} else {
										echo $rcekR['rapper_st2'];
									} ?>
								</td>
								<td colspan="4">
									<?php //if($rcek1['stat_ap']=="RANDOM"){echo $rcekR['rapper_st3'];}else{echo $rcek1['apper_st3'];}  ?>
									<?php if ($rcek1['apper_st3'] != "") {
										echo $rcek1['apper_st3'];
									} else {
										echo $rcekR['rapper_st3'];
									} ?>
								</td>
							</tr>
							<tr>
								<th>Face</th>
								<td>
									<?php //if($rcek1['stat_ap']=="RANDOM"){echo $rcekR['rapper_pf1'];}else{echo $rcek1['apper_pf1'];}  ?>
									<?php if ($rcek1['apper_pf1'] != "") {
										echo $rcek1['apper_pf1'];
									} else {
										echo $rcekR['rapper_pf1'];
									} ?>
								</td>
								<td>
									<?php //if($rcek1['stat_ap']=="RANDOM"){echo $rcekR['rapper_pf2'];}else{echo $rcek1['apper_pf2'];}  ?>
									<?php if ($rcek1['apper_pf2'] != "") {
										echo $rcek1['apper_pf2'];
									} else {
										echo $rcekR['rapper_pf2'];
									} ?>
								</td>
								<td colspan="4">
									<?php //if($rcek1['stat_ap']=="RANDOM"){echo $rcekR['rapper_pf3'];}else{echo $rcek1['apper_pf3'];}  ?>
									<?php if ($rcek1['apper_pf3'] != "") {
										echo $rcek1['apper_pf3'];
									} else {
										echo $rcekR['rapper_pf3'];
									} ?>
								</td>
							</tr>
							<tr>
								<th>Back</th>
								<td>
									<?php //if($rcek1['stat_ap']=="RANDOM"){echo $rcekR['rapper_pb1'];}else{echo $rcek1['apper_pb1'];}  ?>
									<?php if ($rcek1['apper_pb1'] != "") {
										echo $rcek1['apper_pb1'];
									} else {
										echo $rcekR['rapper_pb1'];
									} ?>
								</td>
								<td>
									<?php //if($rcek1['stat_ap']=="RANDOM"){echo $rcekR['rapper_pb2'];}else{echo $rcek1['apper_pb2'];}  ?>
									<?php if ($rcek1['apper_pb2'] != "") {
										echo $rcek1['apper_pb2'];
									} else {
										echo $rcekR['rapper_pb2'];
									} ?>
								</td>
								<td colspan="4">
									<?php //if($rcek1['stat_ap']=="RANDOM"){echo $rcekR['rapper_pb3'];}else{echo $rcek1['apper_pb3'];}  ?>
									<?php if ($rcek1['apper_pb3'] != "") {
										echo $rcek1['apper_pb3'];
									} else {
										echo $rcekR['rapper_pb3'];
									} ?>
								</td>
							</tr>
							<tr>
								<th>&nbsp;</th>
								<td><strong>Ace</strong></td>
								<td><strong>Cot</strong></td>
								<td><strong>Nyl</strong></td>
								<td><strong>Poly</strong></td>
								<td><strong>Acr</strong></td>
								<td><strong>Wool</strong></td>
							</tr>
							<tr>
								<th>&nbsp;</th>
								<!-- <td><?php //if($rcek1['stat_ap']=="RANDOM"){echo $rcekR['rapper_acetate'];}else{echo $rcek1['apper_acetate'];}  ?></td>
				<td><?php //if($rcek1['stat_ap']=="RANDOM"){echo $rcekR['rapper_cotton'];}else{echo $rcek1['apper_cotton'];}  ?></td>
				<td><?php //if($rcek1['stat_ap']=="RANDOM"){echo $rcekR['rapper_nylon'];}else{echo $rcek1['apper_nylon'];}  ?></td>
				<td><?php //if($rcek1['stat_ap']=="RANDOM"){echo $rcekR['rapper_poly'];}else{echo $rcek1['apper_poly'];}  ?></td>
				<td><?php //if($rcek1['stat_ap']=="RANDOM"){echo $rcekR['rapper_acrylic'];}else{echo $rcek1['apper_acrylic'];}  ?></td>
				<td><?php //if($rcek1['stat_ap']=="RANDOM"){echo $rcekR['rapper_wool'];}else{echo $rcek1['apper_wool'];}  ?></td> -->

								<td>
									<?php if ($rcek1['apper_acetate'] != "") {
										echo $rcek1['apper_acetate'];
									} else {
										echo $rcekR['rapper_acetate'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['apper_cotton'] != "") {
										echo $rcek1['apper_cotton'];
									} else {
										echo $rcekR['rapper_cotton'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['apper_nylon'] != "") {
										echo $rcek1['apper_nylon'];
									} else {
										echo $rcekR['rapper_nylon'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['apper_poly'] != "") {
										echo $rcek1['apper_poly'];
									} else {
										echo $rcekR['rapper_poly'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['apper_acrylic'] != "") {
										echo $rcek1['apper_acrylic'];
									} else {
										echo $rcekR['rapper_acrylic'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['apper_wool'] != "") {
										echo $rcek1['apper_wool'];
									} else {
										echo $rcekR['rapper_wool'];
									} ?>
								</td>
							</tr>
						<?php } ?>
						<?php if ($rcek1['h_shrinkage_l1'] != "" or $rcek1['h_shrinkage_w1'] != "" or $rcek1['h_shrinkage_grd'] != "" or $rcek1['h_shrinkage_app'] != "") { ?>
							<tr>
								<th rowspan="5">Heat Shrinkage</th>
								<th>Suhu</th>
								<!-- <td><?php //if($rcek1['stat_hs']=="RANDOM"){echo $rcekR['rh_shrinkage_temp'];}else{echo $rcek1['h_shrinkage_temp'];}  ?></td> -->
								<td>
									<?php if ($rcek1['h_shrinkage_temp'] != "") {
										echo $rcek1['h_shrinkage_temp'];
									} else {
										echo $rcekR['rh_shrinkage_temp'];
									} ?>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<th>Len</th>
								<!-- <td><?php //if($rcek1['stat_hs']=="RANDOM"){echo $rcekR['rh_shrinkage_l1'];}else{echo $rcek1['h_shrinkage_l1'];}  ?></td> -->
								<td>
									<?php if ($rcek1['h_shrinkage_l1'] != "") {
										echo $rcek1['h_shrinkage_l1'];
									} else {
										echo $rcekR['rh_shrinkage_l1'];
									} ?>
								</td>disini
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<th>Wid</th>
								<!-- <td><?php //if($rcek1['stat_hs']=="RANDOM"){echo $rcekR['rh_shrinkage_w1'];}else{echo $rcek1['h_shrinkage_w1'];}  ?></td> -->
								<td>
									<?php if ($rcek1['h_shrinkage_w1'] != "") {
										echo $rcek1['h_shrinkage_w1'];
									} else {
										echo $rcekR['rh_shrinkage_w1'];
									} ?>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<th>Grade</th>
								<!-- <td><?php //if($rcek1['stat_hs']=="RANDOM"){echo $rcekR['rh_shrinkage_grd'];}else{echo $rcek1['h_shrinkage_grd'];}  ?></td> -->
								<td>
									<?php if ($rcek1['h_shrinkage_grd'] != "") {
										echo $rcek1['h_shrinkage_grd'];
									} else {
										echo $rcekR['rh_shrinkage_grd'];
									} ?>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<th>Appearance</th>
								<!-- <td><?php //if($rcek1['stat_hs']=="RANDOM"){echo $rcekR['rh_shrinkage_app'];}else{echo $rcek1['h_shrinkage_app'];}  ?></td> -->
								<td>
									<?php if ($rcek1['h_shrinkage_app'] != "") {
										echo $rcek1['h_shrinkage_app'];
									} else {
										echo $rcekR['rh_shrinkage_app'];
									} ?>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
						<?php } ?>
						<?php if ($rcek1['fibre_transfer'] != "" or $rcek1['fibre_grade'] != "") { ?>
							<tr>
								<th colspan="2">Fibre/Fuzz</th>
								<!-- <td><?php //if($rcek1['stat_ff']=="RANDOM"){echo $rcekR['rfibre_transfer'];}else{echo $rcek1['fibre_transfer'];}  ?></td> -->
								<!-- <td><?php //if($rcek1['stat_ff']=="RANDOM"){echo $rcekR['rfibre_grade'];}else{echo $rcek1['fibre_grade'];}  ?></td> -->

								<td>
									<?php if ($rcek1['fibre_transfer'] != "") {
										echo $rcek1['fibre_transfer'];
									} else {
										echo $rcekR['rfibre_transfer'];
									} ?>
								</td>
								<td>
									<?php if ($rcek1['fibre_grade'] != "") {
										echo $rcek1['fibre_grade'];
									} else {
										echo $rcekR['rfibre_grade'];
									} ?>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
						<?php } ?>
						<?php if ($rcek1['odour'] != "") { ?>
							<tr>
								<th colspan="2">Odour</th>
								<!-- <td colspan="4"><?php //if($rcek1['stat_odour']=="RANDOM"){echo $rcekR['rodour'];}else{echo $rcek1['odour'];}  ?></td> -->
								<td colspan="4">
									<?php if ($rcek1['odour'] != "") {
										echo $rcek1['odour'];
									} else {
										echo $rcekR['rodour'];
									} ?>
								</td>
								<td>&nbsp;</td>
							</tr>
						<?php } ?>
						<?php if ($rcek1['curling'] != "") { ?>
							<tr>
								<th colspan="2">Curling</th>
								<!-- <td colspan="4"><?php //if($rcek1['stat_curling']=="RANDOM"){echo $rcekR['rcurling'];}else{echo $rcek1['curling'];}  ?></td> -->
								<td colspan="4">
									<?php if ($rcek1['curling'] != "") {
										echo $rcek1['curling'];
									} else {
										echo $rcekR['rcurling'];
									} ?>
								</td>
								<td>&nbsp;</td>
							</tr>
						<?php } ?>
						<?php if ($rcek1['nedle'] != "") { ?>
							<tr>
								<th colspan="2">Nedle</th>
								<!-- <td colspan="4"><?php //if($rcek1['stat_nedle']=="RANDOM"){echo $rcekR['rnedle'];}else{echo $rcek1['nedle'];}  ?></td> -->
								<td colspan="4">
									<?php if ($rcek1['nedle'] != "") {
										echo $rcek1['nedle'];
									} else {
										echo $rcekR['rnedle'];
									} ?>
								</td>
								<td>&nbsp;</td>
							</tr>
						<?php } ?>
						<?php if ($rcek1['wrinkle'] != "" || $rcek1['wrinkle1'] != "" || $rcek1['wrinkle2'] != "") { ?>
							<tr>
								<th colspan="1">Wrinkle</th>
								<th>Original</th>
								<td>
									<?= $rcek1['wrinkle']; ?>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<th colspan="1">&nbsp;</th>
								<th>Afterwash</th>
								<td>
									<?= $rcek1['wrinkle1']; ?>
								</td> <!-- disiniya -->
								<td>
									<?= $rcek1['wrinkle2']; ?>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
						<?php } ?>
					</table>
				</div>
			</div>
			<!-- /.col -->
			<div class="col-sm-4 invoice-col">
				<strong>FUNCTIONAL</strong>
				<hr>
				<table class="table">
					<?php if ($rcek1['wick_l1'] != "" or $rcek1['wick_l2'] != "" or $rcek1['wick_l3'] != "" or $rcek1['wick_w1'] != "" or $rcek1['wick_w2'] != "" or $rcek1['wick_w3'] != "") { ?>
						<tr>
							<th rowspan="4" style="width:50%">Wicking</th>
							<th>Length</th>
							<th>Beforewash</th>
							<!-- <td><?php //if($rcek1['stat_wic']=="RANDOM"){echo $rcekR['rwick_l1'];}else{echo $rcek1['wick_l1'];}  ?></td>
				<td><?php //if($rcek1['stat_wic']=="RANDOM"){echo $rcekR['rwick_l2'];}else{echo $rcek1['wick_l2'];}  ?></td>
				<td><?php //if($rcek1['stat_wic']=="RANDOM"){echo $rcekR['rwick_l3'];}else{echo $rcek1['wick_l3'];}  ?></td>-->

							<td>
								<?php if ($rcek1['wick_l1'] != "") {
									echo $rcek1['wick_l1'];
								} else {
									echo $rcekR['rwick_l1'];
								} ?>
							</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<th>&nbsp;</th>
							<th>Afterwash</th>
							<!--<td><?php //if($rcek1['stat_wic2']=="RANDOM"){echo $rcekR['rwick_l2'];}else{echo $rcek1['wick_l2'];}  ?></td>
				<td><?php //if($rcek1['stat_wic']=="RANDOM"){echo $rcekR['rwick_w2'];}else{echo $rcek1['wick_w2'];}  ?></td>
				<td><?php //if($rcek1['stat_wic']=="RANDOM"){echo $rcekR['rwick_w3'];}else{echo $rcek1['wick_w3'];}  ?></td>-->

							<td>
								<?php if ($rcek1['wick_l2'] != "") {
									echo $rcek1['wick_l2'];
								} else {
									echo $rcekR['rwick_l2'];
								} ?>
							</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<th>Width</th>
							<th>Beforewash</th>
							<!--<td><?php //if($rcek1['stat_wic']=="RANDOM"){echo $rcekR['rwick_l1'];}else{echo $rcek1['wick_l1'];}  ?></td>-->
							<!-- <td><?php //if($rcek1['stat_wic1']=="RANDOM"){echo $rcekR['rwick_w1'];}else{echo $rcek1['wick_w1'];}  ?></td> -->
							<!--<td><?php //if($rcek1['stat_wic']=="RANDOM"){echo $rcekR['rwick_l3'];}else{echo $rcek1['wick_l3'];}  ?></td>-->

							<td>
								<?php if ($rcek1['wick_w1'] != "") {
									echo $rcek1['wick_w1'];
								} else {
									echo $rcekR['rwick_w1'];
								} ?>
							</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<th>&nbsp;</th>
							<th>Afterwash</th>
							<!--<td><?php //if($rcek1['stat_wic']=="RANDOM"){echo $rcekR['rwick_w1'];}else{echo $rcek1['wick_w1'];}  ?></td>-->
							<!-- <td><?php //if($rcek1['stat_wic3']=="RANDOM"){echo $rcekR['rwick_w2'];}else{echo $rcek1['wick_w2'];}  ?></td> -->
							<!--<td><?php //if($rcek1['stat_wic']=="RANDOM"){echo $rcekR['rwick_w3'];}else{echo $rcek1['wick_w3'];}  ?></td>-->

							<td>
								<?php if ($rcek1['wick_w2'] != "") {
									echo $rcek1['wick_w2'];
								} else {
									echo $rcekR['rwick_w2'];
								} ?>
							</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
					<?php } ?>
					<?php if ($rcek1['absor_f1'] != "" or $rcek1['absor_f2'] != "" or $rcek1['absor_f3'] != "" or $rcek1['absor_b1'] != "" or $rcek1['absor_b2'] != "" or $rcek1['absor_b3'] != "") { ?>
						<tr>
							<th rowspan="4">Absorbency</th>
							<th>Original</th>
							<th>Face</th>
							<!-- <td><?php //if($rcek1['stat_abs']=="RANDOM"){echo $rcekR['rabsor_f2'];}else{echo $rcek1['absor_f2'];}  ?></td> -->
							<!--<td><?php //if($rcek1['stat_abs']=="RANDOM"){echo $rcekR['rabsor_f3'];}else{echo $rcek1['absor_f3'];}  ?></td>-->

							<td>
								<?php if ($rcek1['absor_f2'] != "") {
									echo $rcek1['absor_f2'];
								} else {
									echo $rcekR['rabsor_f2'];
								} ?>
							</td>
							<!--<td><?php if ($rcek1['absor_f3'] != "") {
								echo $rcek1['absor_f3'];
							} else {
								echo $rcekR['rabsor_f3'];
							} ?></td>-->
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<th>&nbsp;</th>
							<th>Back</th>
							<!-- <td><?php //if($rcek1['stat_abs']=="RANDOM"){echo $rcekR['rabsor_f1'];}else{echo $rcek1['absor_f1'];}  ?></td> -->
							<td>
								<?php if ($rcek1['absor_f1'] != "") {
									echo $rcek1['absor_f1'];
								} else {
									echo $rcekR['rabsor_f1'];
								} ?>
							</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<th>Afterwash</th>
							<th>Face</th>
							<!-- <td><?php //if($rcek1['stat_abs1']=="RANDOM"){echo $rcekR['rabsor_b2'];}else{echo $rcek1['absor_b2'];}  ?></td> -->
							<!--<td><?php //if($rcek1['stat_abs1']=="RANDOM"){echo $rcekR['rabsor_b3'];}else{echo $rcek1['absor_b3'];}  ?></td>-->

							<td>
								<?php if ($rcek1['absor_b2'] != "") {
									echo $rcek1['absor_b2'];
								} else {
									echo $rcekR['rabsor_b2'];
								} ?>
							</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<th>&nbsp;</th>
							<th>Back</th>
							<!-- <td><?php //if($rcek1['stat_abs1']=="RANDOM"){echo $rcekR['rabsor_b1'];}else{echo $rcek1['absor_b1'];}  ?></td> -->
							<td>
								<?php if ($rcek1['absor_b1'] != "") {
									echo $rcek1['absor_b1'];
								} else {
									echo $rcekR['rabsor_b1'];
								} ?>
							</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
					<?php } ?>
					<?php if ($rcek1['dry1'] != "" or $rcek1['dry2'] != "" or $rcek1['dry3'] != "" or $rcek1['dryaf1'] != "" or $rcek1['dryaf2'] != "" or $rcek1['dryaf3'] != "") { ?>
						<tr>
							<th rowspan="2">Drying Time</th>
							<th>Original</th>
							<!-- <td><?php //if($rcek1['stat_dry']=="RANDOM"){echo $rcekR['rdry1'];}else{echo $rcek1['dry1'];}  ?></td>
				<td><?php //if($rcek1['stat_dry']=="RANDOM"){echo $rcekR['rdry2'];}else{echo $rcek1['dry2'];}  ?></td>
				<td><?php //if($rcek1['stat_dry']=="RANDOM"){echo $rcekR['rdry3'];}else{echo $rcek1['dry3'];}  ?></td> -->
							<td>
								<?php if ($rcek1['dry1'] != "") {
									echo $rcek1['dry1'];
								} else {
									echo $rcekR['rdry1'];
								} ?>
							</td>
							<td>
								<?php if ($rcek1['dry2'] != "") {
									echo $rcek1['dry2'];
								} else {
									echo $rcekR['rdry2'];
								} ?>
							</td>
							<td>
								<?php if ($rcek1['dry3'] != "") {
									echo $rcek1['dry3'];
								} else {
									echo $rcekR['rdry3'];
								} ?>
							</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<th>Afterwash</th>
							<!-- <td><?php //if($rcek1['stat_dry1']=="RANDOM"){echo $rcekR['rdryaf1'];}else{echo $rcek1['dryaf1'];}  ?></td>
				<td><?php //if($rcek1['stat_dry1']=="RANDOM"){echo $rcekR['rdryaf2'];}else{echo $rcek1['dryaf2'];}  ?></td>
				<td><?php //if($rcek1['stat_dry1']=="RANDOM"){echo $rcekR['rdryaf3'];}else{echo $rcek1['dryaf3'];}  ?></td> -->

							<td>
								<?php if ($rcek1['dryaf1'] != "") {
									echo $rcek1['dryaf1'];
								} else {
									echo $rcekR['rdryaf1'];
								} ?>
							</td>
							<td>
								<?php if ($rcek1['dryaf2'] != "") {
									echo $rcek1['dryaf2'];
								} else {
									echo $rcekR['rdryaf2'];
								} ?>
							</td>
							<td>
								<?php if ($rcek1['dryaf3'] != "") {
									echo $rcek1['dryaf3'];
								} else {
									echo $rcekR['rdryaf3'];
								} ?>
							</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
					<?php } ?>
					<?php if ($rcek1['repp1'] != "" or $rcek1['repp2'] != "") { ?>
						<tr>
							<th rowspan="2">Water Reppelent</th>
							<th>Original</th>
							<!--<td><?php //if($rcek1['stat_wp']=="RANDOM"){echo $rcekR['rrepp1'];}else{echo $rcek1['repp1'];}  ?></td>
				<td><?php //if($rcek1['stat_wp']=="RANDOM"){echo $rcekR['rrepp2'];}else{echo $rcek1['repp2'];}  ?></td>
				<td><?php //if($rcek1['stat_wp']=="RANDOM"){echo $rcekR['rrepp3'];}else{echo $rcek1['repp3'];}  ?></td>
				<td><?php //if($rcek1['stat_wp']=="RANDOM"){echo $rcekR['rrepp4'];}else{echo $rcek1['repp4'];}  ?></td>-->

							<td>
								<?php if ($rcek1['repp1'] != "") {
									echo $rcek1['repp1'];
								} else {
									echo $rcekR['rrepp1'];
								} ?>
							</td>
							<!--<td><?php if ($rcek1['repp2'] != "") {
								echo $rcek1['repp2'];
							} else {
								echo $rcekR['rrepp2'];
							} ?></td>
				<td><?php if ($rcek1['repp3'] != "") {
					echo $rcek1['repp3'];
				} else {
					echo $rcekR['rrepp3'];
				} ?></td>
				<td><?php if ($rcek1['repp4'] != "") {
					echo $rcek1['repp4'];
				} else {
					echo $rcekR['rrepp4'];
				} ?></td>-->
							<td>&nbsp;</td>
						</tr>
						<tr>
							<th>Afterwash</th>
							<!-- <td><?php //if($rcek1['stat_wp1']=="RANDOM"){echo $rcekR['rrepp2'];}else{echo $rcek1['repp2'];}  ?></td> -->
							<td>
								<?php if ($rcek1['repp2'] != "") {
									echo $rcek1['repp2'];
								} else {
									echo $rcekR['rrepp2'];
								} ?>
							</td>
							<td>&nbsp;</td>
						</tr>
					<?php } ?>
					<?php if ($rcek1['ph'] != "") { ?>
						<tr>
							<th colspan="2">Ph</th>
							<!-- <td colspan="4"><?php //if($rcek1['stat_ph']=="RANDOM"){echo $rcekR['rph'];}else{echo $rcek1['ph'];}  ?></td> -->
							<td colspan="4">
								<?php if ($rcek1['ph'] != "") {
									echo $rcek1['ph'];
								} else {
									echo $rcekR['rph'];
								} ?>
							</td>
							<td>&nbsp;</td>
						</tr>
					<?php } ?>
					<?php if ($rcek1['soil'] != "") { ?>
						<tr>
							<th colspan="2">Soil</th>
							<!-- <td colspan="4"><?php //if($rcek1['stat_sor']=="RANDOM"){echo $rcekR['rsoil'];}else{echo $rcek1['soil'];}  ?></td> -->
							<td colspan="4">
								<?php if ($rcek1['soil'] != "") {
									echo $rcek1['soil'];
								} else {
									echo $rcekR['rsoil'];
								} ?>
							</td>
							<td>&nbsp;</td>
						</tr>
					<?php } ?>
					<?php if ($rcek1['humidity'] != "") { ?>
						<tr>
							<th colspan="2">Humidity</th>
							<!-- <td colspan="4"><?php //if($rcek1['stat_hum']=="RANDOM"){echo $rcekR['rhumidity'];}else{echo $rcek1['humidity'];}  ?></td> -->
							<td colspan="4">
								<?php if ($rcek1['humidity'] != "") {
									echo $rcek1['humidity'];
								} else {
									echo $rcekR['rhumidity'];
								} ?>
							</td>
							<td>&nbsp;</td>
						</tr>
					<?php } ?>
				</table>
				<address>

				</address>
			</div>
			<!-- /.col -->
			<div class="col-sm-4 invoice-col">
				<strong>COLORFASTNESS</strong>
				<hr>
				<table class="table">
					<?php if ($rcek1['wash_temp'] != "" or $rcek1['wash_colorchange'] != "" or $rcek1['wash_acetate'] != "" or $rcek1['wash_cotton'] != "" or $rcek1['wash_nylon'] != "" or $rcek1['wash_poly'] != "" or $rcek1['wash_acrylic'] != "" or $rcek1['wash_wool'] != "" or $rcek1['wash_staining'] != "") { ?>
						<tr>
							<th rowspan="5">Washing</th>
							<th>Suhu</th>
							<!-- <td colspan="4"><?php //if($rcek1['stat_wf']=="RANDOM"){echo $rcekR['rwash_temp'];}else{echo $rcek1['wash_temp'];}  ?>&deg;</td> -->
							<td colspan="4">
								<?php if ($rcek1['wash_temp'] != "") {
									echo $rcek1['wash_temp'];
								} else {
									echo $rcekR['rwash_temp'];
								} ?>&deg;
							</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<th>&nbsp;</th>
							<td><strong>CC</strong></td>
							<td colspan="2"><strong>Ace</strong></td>
							<td><strong>Cot</strong></td>
							<td colspan="2"><strong>Nyl</strong></td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<th>&nbsp;</th>
							<!-- <td><?php //if($rcek1['stat_wf']=="RANDOM"){echo $rcekR['rwash_colorchange'];}else{echo $rcek1['wash_colorchange'];}  ?></td>
				  <td colspan="2"><?php //if($rcek1['stat_wf']=="RANDOM"){echo $rcekR['rwash_acetate'];}else{echo $rcek1['wash_acetate'];}  ?></td>
				<td><?php //if($rcek1['stat_wf']=="RANDOM"){echo $rcekR['rwash_cotton'];}else{echo $rcek1['wash_cotton'];}  ?></td>
				  <td colspan="2"><?php //if($rcek1['stat_wf']=="RANDOM"){echo $rcekR['rwash_nylon'];}else{echo $rcek1['wash_nylon'];}  ?></td>
				  <td>&nbsp;</td> -->
							<td>
								<?php if ($rcek1['wash_colorchange'] != "") {
									echo $rcek1['wash_colorchange'];
								} else {
									echo $rcekR['rwash_colorchange'];
								} ?>
							</td>
							<td colspan="2">
								<?php if ($rcek1['wash_acetate'] != "") {
									echo $rcek1['wash_acetate'];
								} else {
									echo $rcekR['rwash_acetate'];
								} ?>
							</td>
							<td>
								<?php if ($rcek1['wash_cotton'] != "") {
									echo $rcek1['wash_cotton'];
								} else {
									echo $rcekR['rwash_cotton'];
								} ?>
							</td>
							<td colspan="2">
								<?php if ($rcek1['wash_nylon'] != "") {
									echo $rcek1['wash_nylon'];
								} else {
									echo $rcekR['rwash_nylon'];
								} ?>
							</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<th>&nbsp;</th>
							<td><strong>Poly</strong></td>
							<td colspan="2"><strong>Acr</strong></td>
							<td><strong>Wool</strong></td>
							<td colspan="2"><strong>Sta</strong></td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<th>&nbsp;</th>
							<!-- <td><?php //if($rcek1['stat_wf']=="RANDOM"){echo $rcekR['rwash_poly'];}else{echo $rcek1['wash_poly'];}  ?></td>
				  <td colspan="2"><?php //if($rcek1['stat_wf']=="RANDOM"){echo $rcekR['rwash_acrylic'];}else{echo $rcek1['wash_acrylic'];}  ?></td>
				<td><?php //if($rcek1['stat_wf']=="RANDOM"){echo $rcekR['rwash_wool'];}else{echo $rcek1['wash_wool'];}  ?></td>
				  <td colspan="2"><?php //if($rcek1['stat_wf']=="RANDOM"){echo $rcekR['rwash_staining'];}else{echo $rcek1['wash_staining'];}  ?></td> -->

							<td>
								<?php if ($rcek1['wash_poly'] != "") {
									echo $rcek1['wash_poly'];
								} else {
									echo $rcekR['rwash_poly'];
								} ?>
							</td>
							<td colspan="2">
								<?php if ($rcek1['wash_acrylic'] != "") {
									echo $rcek1['wash_acrylic'];
								} else {
									echo $rcekR['rwash_acrylic'];
								} ?>
							</td>
							<td>
								<?php if ($rcek1['wash_wool'] != "") {
									echo $rcek1['wash_wool'];
								} else {
									echo $rcekR['rwash_wool'];
								} ?>
							</td>
							<td colspan="2">
								<?php if ($rcek1['wash_staining'] != "") {
									echo $rcek1['wash_staining'];
								} else {
									echo $rcekR['rwash_staining'];
								} ?>
							</td>
							<td>&nbsp;</td>
						</tr>
					<?php } ?>
					<?php if ($rcek1['acid_colorchange'] != "" or $rcek1['acid_acetate'] != "" or $rcek1['acid_cotton'] != "" or $rcek1['acid_nylon'] != "" or $rcek1['acid_poly'] != "" or $rcek1['acid_acrylic'] != "" or $rcek1['acid_wool'] != "" or $rcek1['acid_staining'] != "") { ?>
						<tr>
							<th rowspan="4" colspan="2">Perspiration Acid</th>
							<td><strong>CC</strong></td>
							<td colspan="2"><strong>Ace</strong></td>
							<td><strong>Cot</strong></td>
							<td colspan="2"><strong>Nyl</strong></td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<!-- <td ><?php //if($rcek1['stat_pac']=="RANDOM"){echo $rcekR['racid_colorchange'];}else{echo $rcek1['acid_colorchange'];}  ?></td>
			<td colspan="2"><?php //if($rcek1['stat_pac']=="RANDOM"){echo $rcekR['racid_acetate'];}else{echo $rcek1['acid_acetate'];}  ?></td>
			<td><?php //if($rcek1['stat_pac']=="RANDOM"){echo $rcekR['racid_cotton'];}else{echo $rcek1['acid_cotton'];}  ?></td>
			<td colspan="2"><?php //if($rcek1['stat_pac']=="RANDOM"){echo $rcekR['racid_nylon'];}else{echo $rcek1['acid_nylon'];}  ?></td>
			  <td>&nbsp;</td> -->
							<td>
								<?php if ($rcek1['acid_colorchange'] != "") {
									echo $rcek1['acid_colorchange'];
								} else {
									echo $rcekR['racid_colorchange'];
								} ?>
							</td>
							<td colspan="2">
								<?php if ($rcek1['acid_acetate'] != "") {
									echo $rcek1['acid_acetate'];
								} else {
									echo $rcekR['racid_acetate'];
								} ?>
							</td>
							<td>
								<?php if ($rcek1['acid_cotton'] != "") {
									echo $rcek1['acid_cotton'];
								} else {
									echo $rcekR['racid_cotton'];
								} ?>
							</td>
							<td colspan="2">
								<?php if ($rcek1['acid_nylon'] != "") {
									echo $rcek1['acid_nylon'];
								} else {
									echo $rcekR['racid_nylon'];
								} ?>
							</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td><strong>Poly</strong></td>
							<td colspan="2"><strong>Acr</strong></td>
							<td><strong>Wool</strong></td>
							<td colspan="2"><strong>Sta</strong></td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<!-- <td><?php //if($rcek1['stat_pac']=="RANDOM"){echo $rcekR['racid_poly'];}else{echo $rcek1['acid_poly'];}  ?></td>
			<td colspan="2"><?php //if($rcek1['stat_pac']=="RANDOM"){echo $rcekR['racid_acrylic'];}else{echo $rcek1['acid_acrylic'];}  ?></td>
			<td><?php //if($rcek1['stat_pac']=="RANDOM"){echo $rcekR['racid_wool'];}else{echo $rcek1['acid_wool'];}  ?></td>
			<td colspan="2"><?php //if($rcek1['stat_pac']=="RANDOM"){echo $rcekR['racid_staining'];}else{echo $rcek1['acid_staining'];}  ?></td> -->

							<td>
								<?php if ($rcek1['acid_poly'] != "") {
									echo $rcek1['acid_poly'];
								} else {
									echo $rcekR['racid_poly'];
								} ?>
							</td>
							<td colspan="2">
								<?php if ($rcek1['acid_acrylic'] != "") {
									echo $rcek1['acid_acrylic'];
								} else {
									echo $rcekR['racid_acrylic'];
								} ?>
							</td>
							<td>
								<?php if ($rcek1['acid_wool'] != "") {
									echo $rcek1['acid_wool'];
								} else {
									echo $rcekR['racid_wool'];
								} ?>
							</td>
							<td colspan="2">
								<?php if ($rcek1['acid_staining'] != "") {
									echo $rcek1['acid_staining'];
								} else {
									echo $rcekR['racid_staining'];
								} ?>
							</td>
							<td>&nbsp;</td>
							<!--<td colspan="2"><?php echo $rcek1['acid_staining']; ?></td>-->
						</tr>
					<?php } ?>
					<?php if ($rcek1['alkaline_colorchange'] != "" or $rcek1['alkaline_acetate'] != "" or $rcek1['alkaline_cotton'] != "" or $rcek1['alkaline_nylon'] != "" or $rcek1['alkaline_poly'] != "" or $rcek1['alkaline_acrylic'] != "" or $rcek1['alkaline_wool'] != "" or $rcek1['alkaline_staining'] != "") { ?>
						<tr>
							<th rowspan="4" colspan="2">Perspiration Alkaline</th>
							<td><strong>CC</strong></td>
							<td colspan="2"><strong>Ace</strong></td>
							<td><strong>Cot</strong></td>
							<td colspan="2"><strong>Nyl</strong></td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<!-- <td><?php //if($rcek1['stat_pal']=="RANDOM"){echo $rcekR['ralkaline_colorchange'];}else{echo $rcek1['alkaline_colorchange'];}  ?></td>
			<td colspan="2"><?php //if($rcek1['stat_pal']=="RANDOM"){echo $rcekR['ralkaline_acetate'];}else{echo $rcek1['alkaline_acetate'];}  ?></td>
			<td><?php //if($rcek1['stat_pal']=="RANDOM"){echo $rcekR['ralkaline_cotton'];}else{echo $rcek1['alkaline_cotton'];}  ?></td>
			<td colspan="2"><?php //if($rcek1['stat_pal']=="RANDOM"){echo $rcekR['ralkaline_nylon'];}else{echo $rcek1['alkaline_nylon'];}  ?></td>
			  <td>&nbsp;</td> -->
							<td>
								<?php if ($rcek1['alkaline_colorchange'] != "") {
									echo $rcek1['alkaline_colorchange'];
								} else {
									echo $rcekR['ralkaline_colorchange'];
								} ?>
							</td>
							<td colspan="2">
								<?php if ($rcek1['alkaline_acetate'] != "") {
									echo $rcek1['alkaline_acetate'];
								} else {
									echo $rcekR['ralkaline_acetate'];
								} ?>
							</td>
							<td>
								<?php if ($rcek1['alkaline_cotton'] != "") {
									echo $rcek1['alkaline_cotton'];
								} else {
									echo $rcekR['ralkaline_cotton'];
								} ?>
							</td>
							<td colspan="2">
								<?php if ($rcek1['alkaline_nylon'] != "") {
									echo $rcek1['alkaline_nylon'];
								} else {
									echo $rcekR['ralkaline_nylon'];
								} ?>
							</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td><strong>Poly</strong></td>
							<td colspan="2"><strong>Acr</strong></td>
							<td><strong>Wool</strong></td>
							<td colspan="2"><strong>Sta</strong></td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<!-- <td><?php //if($rcek1['stat_pal']=="RANDOM"){echo $rcekR['ralkaline_poly'];}else{echo $rcek1['alkaline_poly'];}  ?></td>
			<td colspan="2"><?php //if($rcek1['stat_pal']=="RANDOM"){echo $rcekR['ralkaline_acrylic'];}else{echo $rcek1['alkaline_acrylic'];}  ?></td>
			<td><?php //if($rcek1['stat_pal']=="RANDOM"){echo $rcekR['ralkaline_wool'];}else{echo $rcek1['alkaline_wool'];}  ?></td>
			<td colspan="2"><?php //if($rcek1['stat_pal']=="RANDOM"){echo $rcekR['ralkaline_staining'];}else{echo $rcek1['alkaline_staining'];}  ?></td>
			  <td>&nbsp;</td> -->
							<td>
								<?php if ($rcek1['alkaline_poly'] != "") {
									echo $rcek1['alkaline_poly'];
								} else {
									echo $rcekR['ralkaline_poly'];
								} ?>
							</td>
							<td colspan="2">
								<?php if ($rcek1['alkaline_acrylic'] != "") {
									echo $rcek1['alkaline_acrylic'];
								} else {
									echo $rcekR['ralkaline_acrylic'];
								} ?>
							</td>
							<td>
								<?php if ($rcek1['alkaline_wool'] != "") {
									echo $rcek1['alkaline_wool'];
								} else {
									echo $rcekR['ralkaline_wool'];
								} ?>
							</td>
							<td colspan="2">
								<?php if ($rcek1['alkaline_staining'] != "") {
									echo $rcek1['alkaline_staining'];
								} else {
									echo $rcekR['ralkaline_staining'];
								} ?>
							</td>
							<td>&nbsp;</td>
							<!--<td colspan="2"><?php echo $rcek1['alkaline_staining']; ?></td>-->
						</tr>
					<?php } ?>
					<?php if ($rcek1['water_colorchange'] != "" or $rcek1['water_acetate'] != "" or $rcek1['water_cotton'] != "" or $rcek1['water_nylon'] != "" or $rcek1['water_poly'] != "" or $rcek1['water_acrylic'] != "" or $rcek1['water_wool'] != "" or $rcek1['water_staining'] != "") { ?>
						<tr>
							<th rowspan="4" colspan="2">Water</th>
							<td><strong>CC</strong></td>
							<td colspan="2"><strong>Ace</strong></td>
							<td><strong>Cot</strong></td>
							<td colspan="2"><strong>Nyl</strong></td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<!-- <td><?php //if($rcek1['stat_wtr']=="RANDOM"){echo $rcekR['rwater_colorchange'];}else{echo $rcek1['water_colorchange'];}  ?></td>
			<td colspan="2"><?php //if($rcek1['stat_wtr']=="RANDOM"){echo $rcekR['rwater_acetate'];}else{echo $rcek1['water_acetate'];}  ?></td>
			<td><?php //if($rcek1['stat_wtr']=="RANDOM"){echo $rcekR['rwater_cotton'];}else{echo $rcek1['water_cotton'];}  ?></td>
			<td colspan="2"><?php //if($rcek1['stat_wtr']=="RANDOM"){echo $rcekR['rwater_nylon'];}else{echo $rcek1['water_nylon'];}  ?></td> -->

							<td>
								<?php if ($rcek1['water_colorchange'] != "") {
									echo $rcek1['water_colorchange'];
								} else {
									echo $rcekR['rwater_colorchange'];
								} ?>
							</td>
							<td colspan="2">
								<?php if ($rcek1['water_acetate'] != "") {
									echo $rcek1['water_acetate'];
								} else {
									echo $rcekR['rwater_acetate'];
								} ?>
							</td>
							<td>
								<?php if ($rcek1['water_cotton'] != "") {
									echo $rcek1['water_cotton'];
								} else {
									echo $rcekR['rwater_cotton'];
								} ?>
							</td>
							<td colspan="2">
								<?php if ($rcek1['water_nylon'] != "") {
									echo $rcek1['water_nylon'];
								} else {
									echo $rcekR['rwater_nylon'];
								} ?>
							</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td><strong>Poly</strong></td>
							<td colspan="2"><strong>Acr</strong></td>
							<td><strong>Wool</strong></td>
							<td colspan="2"><strong>Sta</strong></td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<!-- <td><?php //if($rcek1['stat_wtr']=="RANDOM"){echo $rcekR['rwater_poly'];}else{echo $rcek1['water_poly'];}  ?></td>
			<td colspan="2"><?php //if($rcek1['stat_wtr']=="RANDOM"){echo $rcekR['rwater_acrylic'];}else{echo $rcek1['water_acrylic'];}  ?></td>
			<td><?php //if($rcek1['stat_wtr']=="RANDOM"){echo $rcekR['rwater_wool'];}else{echo $rcek1['water_wool'];}  ?></td>
			<td colspan="2"><?php //if($rcek1['stat_wtr']=="RANDOM"){echo $rcekR['rwater_staining'];}else{echo $rcek1['water_staining'];}  ?></td> -->

							<td>
								<?php if ($rcek1['water_poly'] != "") {
									echo $rcek1['water_poly'];
								} else {
									echo $rcekR['rwater_poly'];
								} ?>
							</td>
							<td colspan="2">
								<?php if ($rcek1['water_acrylic'] != "") {
									echo $rcek1['water_acrylic'];
								} else {
									echo $rcekR['rwater_acrylic'];
								} ?>
							</td>
							<td>
								<?php if ($rcek1['water_wool'] != "") {
									echo $rcek1['water_wool'];
								} else {
									echo $rcekR['rwater_wool'];
								} ?>
							</td>
							<td colspan="2">
								<?php if ($rcek1['water_staining'] != "") {
									echo $rcek1['water_staining'];
								} else {
									echo $rcekR['rwater_staining'];
								} ?>
							</td>
							<td>&nbsp;</td>
							<!--<td><?php echo $rcek1['water_staining']; ?></td>-->
						</tr>
					<?php } ?>
					<?php if ($rcek1['crock_len1'] != "" or $rcek1['crock_wid1'] != "" or $rcek1['crock_len2'] != "" or $rcek1['crock_wid2'] != "") { ?>
						<tr>
							<th rowspan="3">Crocking</th>
							<th>Srt</th>
							<th>Dry</th>
							<th>Wet</th>
						</tr>
						<tr>
							<th>Len</th>
							<!-- <td><?php //if($rcek1['stat_cr']=="RANDOM"){echo $rcekR['rcrock_len1'];}else{echo $rcek1['crock_len1'];}  ?></td>
				  <td colspan="2"><?php //if($rcek1['stat_cr']=="RANDOM"){echo $rcekR['rcrock_len2'];}else{echo $rcek1['crock_len2'];}  ?></td> -->
							<td>
								<?php if ($rcek1['crock_len1'] != "") {
									echo $rcek1['crock_len1'];
								} else {
									echo $rcekR['rcrock_len1'];
								} ?>
							</td>
							<td colspan="2">
								<?php if ($rcek1['crock_len2'] != "") {
									echo $rcek1['crock_len2'];
								} else {
									echo $rcekR['rcrock_len2'];
								} ?>
							</td>
						</tr>
						<tr>
							<th>Wid</th>
							<!-- <td><?php //if($rcek1['stat_cr']=="RANDOM"){echo $rcekR['rcrock_wid1'];}else{echo $rcek1['crock_wid1'];}  ?></td>
				<td colspan="3"><?php //if($rcek1['stat_cr']=="RANDOM"){echo $rcekR['rcrock_wid2'];}else{echo $rcek1['crock_wid2'];}  ?></td> -->
							<td>
								<?php if ($rcek1['crock_wid1'] != "") {
									echo $rcek1['crock_wid1'];
								} else {
									echo $rcekR['rcrock_wid1'];
								} ?>
							</td>
							<td colspan="3">
								<?php if ($rcek1['crock_wid2'] != "") {
									echo $rcek1['crock_wid2'];
								} else {
									echo $rcekR['rcrock_wid2'];
								} ?>
							</td>
						</tr>
					<?php } ?>
					<?php if ($rcek1['phenolic_colorchange'] != "") { ?>
						<tr>
							<th>Phenolic Yellowing</th>
							<th><strong>CC</strong></th>
							<!-- <td colspan="4"><?php //if($rcek1['stat_py']=="RANDOM"){echo $rcekR['rphenolic_colorchange'];}else{echo $rcek1['phenolic_colorchange'];}  ?></td> -->
							<td colspan="4">
								<?php if ($rcek1['phenolic_colorchange'] != "") {
									echo $rcek1['phenolic_colorchange'];
								} else {
									echo $rcekR['rphenolic_colorchange'];
								} ?>
							</td>
						</tr>
					<?php } ?>
					<?php if ($rcek1['light_rating1'] != "" or $rcek1['light_rating2'] != "") { ?>
						<tr>
							<th>Light</th>
							<th>&nbsp;</th>
							<!-- <td><?php //if($rcek1['stat_lg']=="RANDOM"){echo $rcekR['rlight_rating1'];}else{echo $rcek1['light_rating1'];}  ?></td>
				 <td colspan="2"><?php //if($rcek1['stat_lg']=="RANDOM"){echo $rcekR['rlight_rating2'];}else{echo $rcek1['light_rating2'];}  ?></td> -->
							<td>
								<?php if ($rcek1['light_rating1'] != "") {
									echo $rcek1['light_rating1'];
								} else {
									echo $rcekR['rlight_rating1'];
								} ?>
							</td>
							<td colspan="2">
								<?php if ($rcek1['light_rating2'] != "") {
									echo $rcek1['light_rating2'];
								} else {
									echo $rcekR['rlight_rating2'];
								} ?>
							</td>
						</tr>
					<?php } ?>
					<?php if ($rcek1['cm_printing_colorchange'] != "" or $rcek1['cm_printing_staining'] != "") { ?>
						<tr>
							<th>Color Migration Oven</th>
							<th>&nbsp;</th>
							<!-- <td colspan="3"><?php //if($rcek1['stat_cmo']=="RANDOM"){echo $rcekR['rcm_printing_colorchange'];}else{echo $rcek1['cm_printing_colorchange'];}  ?></td>
				  <td><?php //if($rcek1['stat_cmo']=="RANDOM"){echo $rcekR['rcm_printing_staining'];}else{echo $rcek1['cm_printing_staining'];}  ?></td> -->
							<td colspan="3">
								<?php if ($rcek1['cm_printing_colorchange'] != "") {
									echo $rcek1['cm_printing_colorchange'];
								} else {
									echo $rcekR['rcm_printing_colorchange'];
								} ?>
							</td>
							<td>
								<?php if ($rcek1['cm_printing_staining'] != "") {
									echo $rcek1['cm_printing_staining'];
								} else {
									echo $rcekR['rcm_printing_staining'];
								} ?>
							</td>
						</tr>
					<?php } ?>
					<?php if ($rcek1['cm_dye_temp'] != "" or $rcek1['cm_dye_colorchange'] != "" or $rcek1['cm_dye_stainingface'] != "" or $rcek1['cm_dye_stainingback'] != "") { ?>
						<tr>
							<th rowspan="3">Color Migration</th>
							<th>Suhu</th>
							<!-- <td colspan="4"><?php //if($rcek1['stat_cm']=="RANDOM"){echo $rcekR['rcm_dye_temp'];}else{echo $rcek1['cm_dye_temp'];}  ?>&deg;</td> -->
							<td colspan="4">
								<?php if ($rcek1['cm_dye_temp'] != "") {
									echo $rcek1['cm_dye_temp'];
								} else {
									echo $rcekR['rcm_dye_temp'];
								} ?>&deg;
							</td>
						</tr>
						<tr>
							<th>&nbsp;</th>
							<td><strong>CC</strong></td>
							<td><strong>Sta</strong></td>
						</tr>
						<tr>
							<th>&nbsp;</th>
							<!-- <td><?php //if($rcek1['stat_cm']=="RANDOM"){echo $rcekR['rcm_dye_colorchange'];}else{echo $rcek1['cm_dye_colorchange'];}  ?></td>
				  <td colspan="4"><?php //if($rcek1['stat_cm']=="RANDOM"){echo $rcekR['rcm_dye_stainingface'];}else{echo $rcek1['cm_dye_stainingface'];}  ?></td> -->
							<td>
								<?php if ($rcek1['cm_dye_colorchange'] != "") {
									echo $rcek1['cm_dye_colorchange'];
								} else {
									echo $rcekR['rcm_dye_colorchange'];
								} ?>
							</td>
							<td colspan="4">
								<?php if ($rcek1['cm_dye_stainingface'] != "") {
									echo $rcek1['cm_dye_stainingface'];
								} else {
									echo $rcekR['rcm_dye_stainingface'];
								} ?>
							</td>
							<!--<td><?php echo $rcek1['cm_dye_stainingback']; ?></td>-->
						</tr>
					<?php } ?>
					<?php if ($rcek1['light_pers_colorchange'] != "") { ?>
						<tr>
							<th>Light Perspiration</th>
							<th><strong>CC</strong></th>
							<!-- <td colspan="4"><?php //if($rcek1['stat_lp']=="RANDOM"){echo $rcekR['rlight_pers_colorchange'];}else{echo $rcek1['light_pers_colorchange'];}  ?></td> -->
							<td colspan="4">
								<?php if ($rcek1['light_pers_colorchange'] != "") {
									echo $rcek1['light_pers_colorchange'];
								} else {
									echo $rcekR['rlight_pers_colorchange'];
								} ?>
							</td>
						</tr>
					<?php } ?>
					<?php if ($rcek1['saliva_staining'] != "") { ?>
						<tr>
							<th>Saliva</th>
							<th>&nbsp;</th>
							<!-- <td colspan="2"><?php //if($rcek1['stat_slv']=="RANDOM"){echo $rcekR['rsaliva_staining'];}else{echo $rcek1['saliva_staining'];}  ?></td> -->
							<td colspan="2">
								<?php if ($rcek1['saliva_staining'] != "") {
									echo $rcek1['saliva_staining'];
								} else {
									echo $rcekR['rsaliva_staining'];
								} ?>
							</td>
						</tr>
					<?php } ?>
					<?php if ($rcek1['bleeding'] != "") { ?>
						<tr>
							<th>Bleeding</th>
							<th>&nbsp;</th>
							<!-- <td colspan="2"><?php //if($rcek1['stat_bld']=="RANDOM"){echo $rcekR['rbleeding'];}else{echo $rcek1['bleeding'];}  ?></td> -->
							<td colspan="2">
								<?php if ($rcek1['bleeding'] != "") {
									echo $rcek1['bleeding'];
								} else {
									echo $rcekR['rbleeding'];
								} ?>
							</td>
						</tr>
					<?php } ?>
					<?php if ($rcek1['chlorin'] != "" or $rcek1['nchlorin1'] != "" or $rcek1['nchlorin2'] != "") { ?>
						<tr>
							<th>Chlorin</th>
							<th>&nbsp;</th>
							<!-- <td colspan="2"><?php //if($rcek1['stat_chl']=="RANDOM"){echo $rcekR['rchlorin'];}else{echo $rcek1['chlorin'];}  ?></td> -->
							<!-- <td colspan="2"><?php //if($rcek1['stat_chl']=="RANDOM"){echo $rcekR['rchlorin'];}else{echo $rcek1['chlorin'];}  ?></td> -->

							<!-- <td colspan="2"><?php if ($rcek1['chlorin'] != "") {
								echo $rcek1['chlorin'];
							} else {
								echo $rcekR['rchlorin'];
							} ?></td> -->
							<td colspan="2">
								<?php if ($rcek1['chlorin'] != "") {
									echo $rcek1['chlorin'];
								} else {
									echo $rcekR['rchlorin'];
								} ?>
							</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<th>Non-Chlorin</th>
							<th>&nbsp;</th>
							<!-- <td colspan="2"><?php //if($rcek1['stat_nchl']=="RANDOM"){echo $rcekR['rnchlorin1'];}else{echo $rcek1['nchlorin1'];}  ?></td>
				<td colspan="2"><?php //if($rcek1['stat_nchl']=="RANDOM"){echo $rcekR['rnchlorin2'];}else{echo $rcek1['nchlorin2'];}  ?></td> -->

							<td colspan="2">
								<?php if ($rcek1['nchlorin1'] != "") {
									echo $rcek1['nchlorin1'];
								} else {
									echo $rcekR['rnchlorin1'];
								} ?>
							</td>
							<td colspan="2">
								<?php if ($rcek1['nchlorin2'] != "") {
									echo $rcek1['nchlorin2'];
								} else {
									echo $rcekR['rnchlorin2'];
								} ?>
							</td>
						</tr>
					<?php } ?>
					<?php if ($rcek1['dye_tf_cstaining'] != "" or $rcek1['dye_tf_acetate'] != "" or $rcek1['dye_tf_cotton'] != "" or $rcek1['dye_tf_nylon'] != "" or $rcek1['dye_tf_poly'] != "" or $rcek1['dye_tf_acrylic'] != "" or $rcek1['dye_tf_wool'] != "" or $rcek1['dye_tf_sstaining'] != "") {
						?>
						<tr>
							<th rowspan="4" colspan="2">Dye Transfer</th>
							<td><strong>Ace</strong></td>
							<td colspan="2"><strong>Cot</strong></td>
							<td><strong>Nyl</strong></td>
							<td colspan="2"><strong>Poly</strong></td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<th>&nbsp;</th>
							<!-- <td><?php //if($rcek1['stat_dye']=="RANDOM"){echo $rcekR['rdye_tf_acetate'];}else{echo $rcek1['dye_tf_acetate'];}  ?></td>
			<td colspan="2"><?php //if($rcek1['stat_dye']=="RANDOM"){echo $rcekR['rdye_tf_cotton'];}else{echo $rcek1['dye_tf_cotton'];}  ?></td>
			<td><?php //if($rcek1['stat_dye']=="RANDOM"){echo $rcekR['rdye_tf_nylon'];}else{echo $rcek1['dye_tf_nylon'];}  ?></td>
			<td colspan="2"><?php //if($rcek1['stat_dye']=="RANDOM"){echo $rcekR['rdye_tf_poly'];}else{echo $rcek1['dye_tf_poly'];}  ?></td> -->

							<td>
								<?php if ($rcek1['dye_tf_acetate'] != "") {
									echo $rcek1['dye_tf_acetate'];
								} else {
									echo $rcekR['rdye_tf_acetate'];
								} ?>
							</td>
							<td colspan="2">
								<?php if ($rcek1['dye_tf_cotton'] != "") {
									echo $rcek1['dye_tf_cotton'];
								} else {
									echo $rcekR['rdye_tf_cotton'];
								} ?>
							</td>
							<td>
								<?php if ($rcek1['dye_tf_nylon'] != "") {
									echo $rcek1['dye_tf_nylon'];
								} else {
									echo $rcekR['rdye_tf_nylon'];
								} ?>
							</td>
							<td colspan="2">
								<?php if ($rcek1['dye_tf_poly'] != "") {
									echo $rcek1['dye_tf_poly'];
								} else {
									echo $rcekR['rdye_tf_poly'];
								} ?>
							</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<th>&nbsp;</th>
							<td><strong>Acr</strong></td>
							<td colspan="2"><strong>Wool</strong></td>
							<td><strong>C.Sta</strong></td>
							<td colspan="2"><strong>S.Sta</strong></td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<th>&nbsp;</th>
							<!-- <td><?php //if($rcek1['stat_dye']=="RANDOM"){echo $rcekR['rdye_tf_acrylic'];}else{echo $rcek1['dye_tf_acrylic'];}  ?></td>
			<td colspan="2"><?php //if($rcek1['stat_dye']=="RANDOM"){echo $rcekR['rdye_tf_wool'];}else{echo $rcek1['dye_tf_wool'];}  ?></td>
			<td><?php //if($rcek1['stat_dye']=="RANDOM"){echo $rcekR['rdye_tf_cstaining'];}else{echo $rcek1['dye_tf_cstaining'];}  ?></td>
			<td colspan="2"><?php //if($rcek1['stat_dye']=="RANDOM"){echo $rcekR['rdye_tf_sstaining'];}else{echo $rcek1['dye_tf_sstaining'];}  ?></td> -->

							<td>
								<?php if ($rcek1['dye_tf_acrylic'] != "") {
									echo $rcek1['dye_tf_acrylic'];
								} else {
									echo $rcekR['rdye_tf_acrylic'];
								} ?>
							</td>
							<td colspan="2">
								<?php if ($rcek1['dye_tf_wool'] != "") {
									echo $rcek1['dye_tf_wool'];
								} else {
									echo $rcekR['rdye_tf_wool'];
								} ?>
							</td>
							<td>
								<?php if ($rcek1['dye_tf_cstaining'] != "") {
									echo $rcek1['dye_tf_cstaining'];
								} else {
									echo $rcekR['rdye_tf_cstaining'];
								} ?>
							</td>
							<td colspan="2">
								<?php if ($rcek1['dye_tf_sstaining'] != "") {
									echo $rcek1['dye_tf_sstaining'];
								} else {
									echo $rcekR['rdye_tf_sstaining'];
								} ?>
							</td>
							<td>&nbsp;</td>
						</tr>
					<?php } ?>

					<?php
					//SWEAT CONCEAL RESULT START
					if (
						strlen($rcek1['sco_acid_original']) > 2
						or strlen($rcek1['sca_acid_original']) > 2
						or strlen($rcek1['sco_alkaline_afterwash']) > 2
						or strlen($rcek1['sca_alkaline_afterwash']) > 2
					) { ?>
						<?php

						$sco_acid_original = explode("/", $rcek1['sco_acid_original']);
						$sca_acid_original = explode("/", $rcek1['sca_acid_original']);
						$sco_alkaline_afterwash = explode("/", $rcek1['sco_alkaline_afterwash']);
						$sca_alkaline_afterwash = explode("/", $rcek1['sca_alkaline_afterwash']);
						?>
						<tr>
							<th width=100px>Sweat Conceal</th>
							<td> Original Acid</td>
							<td>
								<?= $sco_acid_original[0] ?>
							</td>
							<td colspan="2">
								<?= $sco_acid_original[1] ?>
							</td>
							<td>
								<?= $sco_acid_original[2] ?>
							</td>
							<td colspan="2"> </td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<th> </th>
							<td> Afterwash Acid</td>
							<td>
								<?= $sca_acid_original[0] ?>
							</td>
							<td colspan="2">
								<?= $sca_acid_original[1] ?>
							</td>
							<td>
								<?= $sca_acid_original[2] ?>
							</td>
							<td colspan="2"></td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<th> </th>
							<td> Original Alkaline</td>
							<td>
								<?= $sco_alkaline_afterwash[0] ?>
							</td>
							<td colspan="2">
								<?= $sco_alkaline_afterwash[1] ?>
							</td>
							<td>
								<?= $sco_alkaline_afterwash[2] ?>
							</td>
							<td colspan="2"></td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<th> </th>
							<td> Afterwash Alkaline</td>
							<td>
								<?= $sca_alkaline_afterwash[0] ?>
							</td>
							<td colspan="2">
								<?= $sca_alkaline_afterwash[1] ?>
							</td>
							<td>
								<?= $sca_alkaline_afterwash[2] ?>
							</td>
							<td colspan="2"></td>
							<td>&nbsp;</td>
						</tr>
						<?php
						//SWEAT CONCEAL RESULT END
					}
					?>


				</table>
				<address>

				</address>
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
		<!-- Table row -->
		<div class="row">
			<!-- accepted payments column -->
			<div class="col-xs-12">
				<p class="lead">Note: </p>
				<p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
					<?php echo trim($rcek1['note_g']); ?><br>
					<?php if (strpos($buyer, 'ADIDAS') !== false and $rcekcmt['note_apperss'] != "") {
						echo "PHX-AP0701 slight color change, no obvious pilling (face=" . $rcek1['apperss_pf2'] . ", back=" . $rcek1['apperss_pb2'] . "), snagging (face=" . $rcek1['apperss_sf2'] . ", back=" . $rcek1['apperss_sb2'] . "), overall satisfactory";
					} ?>
				</p>
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row --><!-- /.row -->

		<!-- this row will not appear when printing -->
		<div class="row no-print">
			<div class="col-xs-12">
				<a href="pages/cetak/cetak_result.php?idkk=<?php echo $rcek['id']; ?>&noitem=<?php echo $rcek['no_item']; ?>&nohanger=<?php echo $rcek['no_hanger']; ?>"
					target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
			</div>
		</div>
	</section>
<?php } ?>

<?php
$array_insert = [];
if ($_POST['physical_save'] == "save") {  // spirality_status_save
	$spirality_status = $_POST['spirality_status'];

	if ($tq_test_2_array) {
		if ($_POST['spirality_status'] == '0') { //update
			//$second = '/deleted'.date('is');
			//$sqlPHY=mysqli_query($con,"UPDATE tbl_tq_test_2 SET id_nokk = concat($id_tq_test_2,'$second') WHERE id_nokk='$id_tq_test_2'");
			$sqlPHY = mysqli_query($con, "UPDATE tbl_tq_test_2 SET spirality_status = null  WHERE id_nokk='$id_tq_test_2'");

		} else {
			$sqlPHY = mysqli_query($con, "UPDATE tbl_tq_test_2 SET spirality_status='$spirality_status' WHERE id_nokk='$id_tq_test_2'");
		}
	} else {
		if ($_POST['spirality_status'] != '0') { //insert 
			$array_insert[] = 1;
			$sql_no_demand = mysqli_query($con, "INSERT INTO tbl_tq_test_2 (id_nokk,spirality_status) VALUES ('$id_tq_test_2','$spirality_status')");
		}
	}
}

if ($_POST['colorfastness_save'] == "save") {  // bleeding_root save
	$bleeding_root = $_POST['bleeding_root'];
	$dbleeding_root = $_POST['dbleeding_root'];

	if ($tq_test_2_array or count($array_insert) > 0) {
		if ($bleeding_root == '') {
			$sqlPHY = mysqli_query($con, "UPDATE tbl_tq_test_2 SET bleeding_root = null  WHERE id_nokk='$id_tq_test_2'");
		} else {
			$sqlPHY = mysqli_query($con, "UPDATE tbl_tq_test_2 SET bleeding_root = '$bleeding_root'  WHERE id_nokk='$id_tq_test_2'");
		}
	} else {
		if ($_POST['bleeding_root'] != '0') { //insert 
			$sql_no_demand = mysqli_query($con, "INSERT INTO tbl_tq_test_2 (id_nokk,bleeding_root) VALUES ('$id_tq_test_2','$bleeding_root')");
		}
	}

	if ($dbleeding_root != '') {
		$sqlPHY = mysqli_query($con, "UPDATE tbl_tq_disptest_2 SET dbleeding_root = '$dbleeding_root'  WHERE id_nokk='$id_tq_test_2'");
		$sql_no_demand = mysqli_query($con, "INSERT INTO tbl_tq_disptest_2 (id_nokk,dbleeding_root) VALUES ('$id_tq_test_2','$dbleeding_root')");

	} else {
		$sqlPHY = mysqli_query($con, "UPDATE tbl_tq_disptest_2 SET dbleeding_root = null  WHERE id_nokk='$id_tq_test_2'");
		$sql_no_demand = mysqli_query($con, "INSERT INTO tbl_tq_disptest_2 (id_nokk,dbleeding_root) VALUES ('$id_tq_test_2','$dbleeding_root')");

	}





}

?>

<?php

if ($_POST['physical_save'] == "save") {
    $fields = array('wrinkle', 'wrinkle1', 'wrinkle2', 'stat_wrinkle', 'stat_wrinkle1', 'wrinkle_note');
    
    foreach ($fields as $field) {
        $value = trim($_POST[$field]);
        
        if ($value != "0" && $value != "") {
            $selectSql = "SELECT * FROM tbl_tq_test_2 WHERE id_nokk = '$id_tq_test_2'";
            $result = mysqli_query($con, $selectSql);

            if (mysqli_num_rows($result) > 0) {
                // Data sudah ada, lakukan UPDATE
                $updateSql = "UPDATE tbl_tq_test_2 SET $field = '$value' WHERE id_nokk = '$id_tq_test_2'";
                $sqlPHY = mysqli_query($con, $updateSql);
            } else {
                // Data belum ada, lakukan INSERT
                $insertSql = "INSERT INTO tbl_tq_test_2 (id_nokk, $field) VALUES ('$id_tq_test_2','$value')";
                $sqlPHY = mysqli_query($con, $insertSql);
            }
        } else {
            $sqlPHY = mysqli_query($con, "UPDATE tbl_tq_test_2 SET $field = null WHERE id_nokk = '$id_tq_test_2'");
        }
    }
}

?>

<?php
if ($_POST['physical_save'] == "save" and $cek1 > 0) {
	$sqlPHY = mysqli_query($con, "UPDATE tbl_tq_test SET
		  `flamability`='$_POST[flamability]',
		  `fla_note`='$_POST[fla_note]',
		  `fc_cott`='$_POST[fc_cott]',
		  `fc_poly`='$_POST[fc_poly]',
		  `fc_elastane`='$_POST[fc_ela]',
		  `fc_cott1`='$_POST[fc_cott1]',
		  `fc_poly1`='$_POST[fc_poly1]',
		  `fc_elastane1`='$_POST[fc_ela1]',
		  `std_fc_cott1`='$_POST[std_fc_cott1]',
		  `std_fc_poly1`='$_POST[std_fc_poly1]',
		  `std_fc_elastane1`='$_POST[std_fc_elastane1]',
		  `fibercontent`='$_POST[fibercontent]',
		  `fiber_note`='$_POST[fiber_note]',
		  `fc_wpi`='$_POST[wpi]',
		  `fc_cpi`='$_POST[cpi]',
		  `fc_note`='$_POST[fc_note]',
		  `f_weight`='$_POST[fabric_weight]',
		  `fwe_note`='$_POST[fwe_note]',
		  `f_width`='$_POST[fabric_width]',
		  `fwi_note`='$_POST[fwi_note]',
		  `bow`='$_POST[bow]',
		  `skew`='$_POST[skew]',
		  `bas_note`='$_POST[bas_note]',
		  `h_shrinkage_temp`='$_POST[h_shrinkage_temp]',
		  `h_shrinkage_l1`='$_POST[h_shrinkage_l1]',
		  `h_shrinkage_w1`='$_POST[h_shrinkage_w1]',
		  `h_shrinkage_grd`='$_POST[h_shrinkage_grd]',
		  `h_shrinkage_app`='$_POST[h_shrinkage_app]',
		  `h_shrinkage_note`='$_POST[h_shrinkage_note]',
		  `ss_temp`='$_POST[ss_temp]',
		  `ss_washes3`='$_POST[ss_washes3]',
		  `ss_washes10`='$_POST[ss_washes10]',
		  `ss_washes15`='$_POST[ss_washes15]',
		  `ss_cmt`='$_POST[ss_cmt]',
		  `shrinkage_l1`='$_POST[shrinkage_len1]',
		  `shrinkage_l2`='$_POST[shrinkage_len2]',
		  `shrinkage_l3`='$_POST[shrinkage_len3]',
		  `shrinkage_l4`='$_POST[shrinkage_len4]',
		  `shrinkage_l5`='$_POST[shrinkage_len5]',
		  `shrinkage_l6`='$_POST[shrinkage_len6]',
		  `shrinkage_w1`='$_POST[shrinkage_wid1]',
		  `shrinkage_w2`='$_POST[shrinkage_wid2]',
		  `shrinkage_w3`='$_POST[shrinkage_wid3]',
		  `shrinkage_w4`='$_POST[shrinkage_wid4]',
		  `shrinkage_w5`='$_POST[shrinkage_wid5]',
		  `shrinkage_w6`='$_POST[shrinkage_wid6]',
		  `spirality1`='$_POST[spirality1]',
		  `spirality2`='$_POST[spirality2]',
		  `spirality3`='$_POST[spirality3]',
		  `spirality4`='$_POST[spirality4]',
		  `spirality5`='$_POST[spirality5]',
		  `spirality6`='$_POST[spirality6]',
		  `ss_linedry`='$_POST[ss_linedry]',
		  `ss_tumbledry`='$_POST[ss_tumbledry]',
		  `sns_note`='$_POST[sns_note]',
		  `apperss_ch1`='$_POST[apperss_ch1]',
		  `apperss_ch2`='$_POST[apperss_ch2]',
		  `apperss_ch3`='$_POST[apperss_ch3]',
		  `apperss_ch4`='$_POST[apperss_ch4]',
		  `apperss_cc1`='$_POST[apperss_cc1]',
		  `apperss_cc2`='$_POST[apperss_cc2]',
		  `apperss_cc3`='$_POST[apperss_cc3]',
		  `apperss_cc4`='$_POST[apperss_cc4]',
		  `apperss_st`='$_POST[apperss_st]',
		  `apperss_pf1`='$_POST[apperss_pf1]',
		  `apperss_pf2`='$_POST[apperss_pf2]',
		  `apperss_pf3`='$_POST[apperss_pf3]',
		  `apperss_pf4`='$_POST[apperss_pf4]',
		  `apperss_pb1`='$_POST[apperss_pb1]',
		  `apperss_pb2`='$_POST[apperss_pb2]',
		  `apperss_pb3`='$_POST[apperss_pb3]',
		  `apperss_pb4`='$_POST[apperss_pb4]',
		  `apperss_sf1`='$_POST[apperss_sf1]',
		  `apperss_sf2`='$_POST[apperss_sf2]',
		  `apperss_sf3`='$_POST[apperss_sf3]',
		  `apperss_sf4`='$_POST[apperss_sf4]',
		  `apperss_sb1`='$_POST[apperss_sb1]',
		  `apperss_sb2`='$_POST[apperss_sb2]',
		  `apperss_sb3`='$_POST[apperss_sb3]',
		  `apperss_sb4`='$_POST[apperss_sb4]',
	 	  `apperss_note`='$_POST[apperss_note]',
		  `pm_f1`='$_POST[pillingm_f1]',
		  `pm_b1`='$_POST[pillingm_b1]',
		  `pm_f2`='$_POST[pillingm_f2]',
		  `pm_b2`='$_POST[pillingm_b2]',
		  `pm_f3`='$_POST[pillingm_f3]',
		  `pm_b3`='$_POST[pillingm_b3]',
		  `pm_f4`='$_POST[pillingm_f4]',
		  `pm_b4`='$_POST[pillingm_b4]',
		  `pm_f5`='$_POST[pillingm_f5]',
		  `pm_b5`='$_POST[pillingm_b5]',
		  `pillm_note`='$_POST[pillm_note]',
		  `pl_f1`='$_POST[pillingl_f1]',
		  `pl_b1`='$_POST[pillingl_b1]',
		  `pl_f2`='$_POST[pillingl_f2]',
		  `pl_b2`='$_POST[pillingl_b2]',
		  `pl_f3`='$_POST[pillingl_f3]',
		  `pl_b3`='$_POST[pillingl_b3]',
		  `pl_f4`='$_POST[pillingl_f4]',
		  `pl_b4`='$_POST[pillingl_b4]',
		  `pl_f5`='$_POST[pillingl_f5]',
		  `pl_b5`='$_POST[pillingl_b5]',
		  `pilll_note`='$_POST[pilll_note]',
		  `pb_f1`='$_POST[pillingb_f1]',
		  `pb_b1`='$_POST[pillingb_b1]',
		  `pb_f2`='$_POST[pillingb_f2]',
		  `pb_b2`='$_POST[pillingb_b2]',
		  `pb_f3`='$_POST[pillingb_f3]',
		  `pb_b3`='$_POST[pillingb_b3]',
		  `pb_f4`='$_POST[pillingb_f4]',
		  `pb_b4`='$_POST[pillingb_b4]',
		  `pb_f5`='$_POST[pillingb_f5]',
		  `pb_b5`='$_POST[pillingb_b5]',
		  `pillb_note`='$_POST[pillb_note]',
		  `prt_f1`='$_POST[pillingrt_f1]',
		  `prt_b1`='$_POST[pillingrt_b1]',
		  `prt_f2`='$_POST[pillingrt_f2]',
		  `prt_b2`='$_POST[pillingrt_b2]',
		  `prt_f3`='$_POST[pillingrt_f3]',
		  `prt_b3`='$_POST[pillingrt_b3]',
		  `prt_f4`='$_POST[pillingrt_f4]',
		  `prt_b4`='$_POST[pillingrt_b4]',
		  `prt_f5`='$_POST[pillingrt_f5]',
		  `prt_b5`='$_POST[pillingrt_b5]',
		  `pillr_note`='$_POST[pillr_note]',
		  `abration`='$_POST[abr]',
		  `abr_note`='$_POST[abr_note]',
		  `sm_l1`='$_POST[snaggingm_l1]',
		  `sm_w1`='$_POST[snaggingm_w1]',
		  `sm_l2`='$_POST[snaggingm_l2]',
		  `sm_w2`='$_POST[snaggingm_w2]',
		  `sm_l3`='$_POST[snaggingm_l3]',
		  `sm_w3`='$_POST[snaggingm_w3]',
		  `sm_l4`='$_POST[snaggingm_l4]',
		  `sm_w4`='$_POST[snaggingm_w4]',
		  `snam_note`='$_POST[snam_note]',
		  `sp_grdl1` ='$_POST[sp_grdl1]',
		  `sp_clsl1` ='$_POST[sp_clsl1]',
		  `sp_shol1` ='$_POST[sp_shol1]',
		  `sp_medl1` ='$_POST[sp_medl1]',
		  `sp_lonl1` ='$_POST[sp_lonl1]',
		  `sp_grdw1` ='$_POST[sp_grdw1]',
		  `sp_clsw1` ='$_POST[sp_clsw1]',
		  `sp_show1` ='$_POST[sp_show1]',
		  `sp_medw1` ='$_POST[sp_medw1]',
		  `sp_lonw1` ='$_POST[sp_lonw1]',
		  `sp_grdl2` ='$_POST[sp_grdl2]',
		  `sp_clsl2` ='$_POST[sp_clsl2]',
		  `sp_shol2` ='$_POST[sp_shol2]',
		  `sp_medl2` ='$_POST[sp_medl2]',
		  `sp_lonl2` ='$_POST[sp_lonl2]',
		  `sp_grdw2` ='$_POST[sp_grdw2]',
		  `sp_clsw2` ='$_POST[sp_clsw2]',
		  `sp_show2` ='$_POST[sp_show2]',
		  `sp_medw2` ='$_POST[sp_medw2]',
		  `sp_lonw2` ='$_POST[sp_lonw2]',
		  `snap_note`='$_POST[snap_note]',
		  `sb_l1`='$_POST[snaggingb_l1]',
		  `sb_w1`='$_POST[snaggingb_w1]',
		  `sb_l2`='$_POST[snaggingb_l2]',
		  `sb_w2`='$_POST[snaggingb_w2]',
		  `sb_l3`='$_POST[snaggingb_l3]',
		  `sb_w3`='$_POST[snaggingb_w3]',
		  `sb_l4`='$_POST[snaggingb_l4]',
		  `sb_w4`='$_POST[snaggingb_w4]',
		  `snab_note`='$_POST[snab_note]',
		  `bs_instron`='$_POST[instron]',
		  `bs_mullen`='$_POST[mullen]',
		  `bs_tru`='$_POST[tru_burst]',
		  `bs_tru2`='$_POST[tru_burst2]',
		  `burs_note`='$_POST[burs_note]',
		  `thick1`='$_POST[thick1]',
		  `thick2`='$_POST[thick2]',
		  `thick3`='$_POST[thick3]',
		  `thickav`='$_POST[thickav]',
		  `thick_note`='$_POST[thick_note]',
		  `stretch_l1`='$_POST[stretch_l1]',
		  `stretch_w1`='$_POST[stretch_w1]',
		  `stretch_l2`='$_POST[stretch_l2]',
		  `stretch_w2`='$_POST[stretch_w2]',
		  `stretch_l3`='$_POST[stretch_l3]',
		  `stretch_w3`='$_POST[stretch_w3]',
		  `stretch_l4`='$_POST[stretch_l4]',
		  `stretch_w4`='$_POST[stretch_w4]',
		  `stretch_l5`='$_POST[stretch_l5]',
		  `stretch_w5`='$_POST[stretch_w5]',
		  `load_stretch`='$_POST[load_stretch]',
		  `stretch_note`='$_POST[stretch_note]',
		  `recover_l1`='$_POST[recover_l1]',
		  `recover_w1`='$_POST[recover_w1]',
		  `recover_l2`='$_POST[recover_l2]',
		  `recover_w2`='$_POST[recover_w2]',
		  `recover_l3`='$_POST[recover_l3]',
		  `recover_w3`='$_POST[recover_w3]',
		  `recover_l4`='$_POST[recover_l4]',
		  `recover_w4`='$_POST[recover_w4]',
		  `recover_l5`='$_POST[recover_l5]',
		  `recover_w5`='$_POST[recover_w5]',
		  `recover_l11`='$_POST[recover_l11]',
		  `recover_w11`='$_POST[recover_w11]',
		  `recover_l21`='$_POST[recover_l21]',
		  `recover_w21`='$_POST[recover_w21]',
		  `recover_l31`='$_POST[recover_l31]',
		  `recover_w31`='$_POST[recover_w31]',
		  `recover_l41`='$_POST[recover_l41]',
		  `recover_w41`='$_POST[recover_w41]',
		  `recover_l51`='$_POST[recover_l51]',
		  `recover_w51`='$_POST[recover_w51]',
		  `recover_note`='$_POST[recover_note]',
		  `growth_l1`='$_POST[growth_l1]',
		  `growth_w1`='$_POST[growth_w1]',
		  `growth_l2`='$_POST[growth_l2]',
		  `growth_w2`='$_POST[growth_w2]',
		  `rec_growth_l1`='$_POST[rec_growth_l1]',
		  `rec_growth_w1`='$_POST[rec_growth_w1]',
		  `rec_growth_l2`='$_POST[rec_growth_l2]',
		  `rec_growth_w2`='$_POST[rec_growth_w2]',
		  `growth_note`='$_POST[growth_note]',
		  `apper_ch1`='$_POST[apper_ch1]',
		  `apper_ch2`='$_POST[apper_ch2]',
		  `apper_ch3`='$_POST[apper_ch3]',
		  `apper_cc1`='$_POST[apper_cc1]',
		  `apper_cc2`='$_POST[apper_cc2]',
		  `apper_cc3`='$_POST[apper_cc3]',
		  `apper_st`='$_POST[apper_st]',
		  `apper_st2`='$_POST[apper_st2]',
		  `apper_st3`='$_POST[apper_st3]',
		  `apper_pf1`='$_POST[apper_pf1]',
		  `apper_pf2`='$_POST[apper_pf2]',
		  `apper_pf3`='$_POST[apper_pf3]',
		  `apper_pb1`='$_POST[apper_pb1]',
		  `apper_pb2`='$_POST[apper_pb2]',
		  `apper_pb3`='$_POST[apper_pb3]',
		  `apper_acetate`='$_POST[apper_acetate]',
		  `apper_cotton`='$_POST[apper_cotton]',
		  `apper_nylon`='$_POST[apper_nylon]',
		  `apper_poly`='$_POST[apper_poly]',
		  `apper_acrylic`='$_POST[apper_acrylic]',
		  `apper_wool`='$_POST[apper_wool]',
	 	  `apper_note`='$_POST[apper_note]',
		  `fibre_transfer`='$_POST[fibre_transfer]',
		  `fibre_grade`='$_POST[fibre_grade]',
		  `fibre_note`='$_POST[fibre_note]',
		  `odour`='$_POST[odour]',
		  `odour_note`='$_POST[odour_note]',
		  `curling`='$_POST[curling]',
		  `curling_note`='$_POST[curling_note]',
		  `nedle`='$_POST[nedle]',
		  `nedle_note`='$_POST[nedle_note]',
	 	  `stat_fla`='$_POST[stat_fla]',
		  `stat_fib`='$_POST[stat_fib]',
		  `stat_fc`='$_POST[stat_fc]',
		  `stat_fwss`='$_POST[stat_fwss]',
		  `stat_fwss2`='$_POST[stat_fwss2]',
		  `stat_fwss3`='$_POST[stat_fwss3]',
		  `stat_bsk`='$_POST[stat_bsk]',
		  `stat_pm`='$_POST[stat_pm]',
		  `stat_pl`='$_POST[stat_pl]',
		  `stat_pb`='$_POST[stat_pb]',
		  `stat_prt`='$_POST[stat_prt]',
		  `stat_abr`='$_POST[stat_abr]',
		  `stat_sm`='$_POST[stat_sm]',
		  `stat_sp`='$_POST[stat_sp]',
		  `stat_sb`='$_POST[stat_sb]',
		  `stat_bs`='$_POST[stat_bs]',
		  `stat_bs2`='$_POST[stat_bs2]',
		  `stat_bs3`='$_POST[stat_bs3]',
		  `stat_th`='$_POST[stat_th]',
		  `stat_sr`='$_POST[stat_sr]',
		  `stat_gr`='$_POST[stat_gr]',
		  `stat_ap`='$_POST[stat_ap]',
		  `stat_hs`='$_POST[stat_hs]',
		  `stat_ff`='$_POST[stat_ff]',
		  `stat_odour`='$_POST[stat_odour]',
		  `stat_curling`='$_POST[stat_curling]',
		  `stat_nedle`='$_POST[stat_nedle]',
		  `tgl_update`=now()
		  WHERE `id_nokk`='$rcek[id]'");
	if ($sqlPHY) {
		$sqlPHYD = mysqli_query($con, "UPDATE tbl_tq_disptest SET
		`dflamability`='$_POST[dflamability]',
		`dfla_note`='$_POST[dfla_note]',
		`dfc_cott`='$_POST[dfc_cott]',
		`dfc_poly`='$_POST[dfc_poly]',
		`dfc_elastane`='$_POST[dfc_ela]',
		`dfc_cott1`='$_POST[dfc_cott1]',
		`dfc_poly1`='$_POST[dfc_poly1]',
		`dfc_elastane1`='$_POST[dfc_ela1]',
		`dfibercontent`='$_POST[dfibercontent]',
		`dfiber_note`='$_POST[dfiber_note]',
		`std_dfc_cott1`='$_POST[std_dfc_cott1]',
		`std_dfc_poly1`='$_POST[std_dfc_poly1]',
		`std_dfc_elastane1`='$_POST[std_dfc_elastane1]',
		`dfc_wpi`='$_POST[dwpi]',
		`dfc_cpi`='$_POST[dcpi]',
		`dfc_note`='$_POST[dfc_note]',
		`df_weight`='$_POST[dfabric_weight]',
		`dfwe_note`='$_POST[dfwe_note]',
		`df_width`='$_POST[dfabric_width]',
		`dfwi_note`='$_POST[dfwi_note]',
		`dbow`='$_POST[dbow]',
		`dskew`='$_POST[dskew]',
		`dbas_note`='$_POST[dbas_note]',
		`dh_shrinkage_temp`='$_POST[dh_shrinkage_temp]',
		`dh_shrinkage_l1`='$_POST[dh_shrinkage_l1]',
		`dh_shrinkage_w1`='$_POST[dh_shrinkage_w1]',
		`dh_shrinkage_grd`='$_POST[dh_shrinkage_grd]',
		`dh_shrinkage_app`='$_POST[dh_shrinkage_app]',
		`dh_shrinkage_note`='$_POST[dh_shrinkage_note]',
		`dss_temp`='$_POST[dss_temp]',
		`dss_washes3`='$_POST[dss_washes3]',
		`dss_washes10`='$_POST[dss_washes10]',
		`dss_washes15`='$_POST[dss_washes15]',
		`dss_cmt`='$_POST[dss_cmt]',
		`dshrinkage_l1`='$_POST[dshrinkage_len1]',
		`dshrinkage_l2`='$_POST[dshrinkage_len2]',
		`dshrinkage_l3`='$_POST[dshrinkage_len3]',
		`dshrinkage_l4`='$_POST[dshrinkage_len4]',
		`dshrinkage_l5`='$_POST[dshrinkage_len5]',
		`dshrinkage_l6`='$_POST[dshrinkage_len6]',
		`dshrinkage_w1`='$_POST[dshrinkage_wid1]',
		`dshrinkage_w2`='$_POST[dshrinkage_wid2]',
		`dshrinkage_w3`='$_POST[dshrinkage_wid3]',
		`dshrinkage_w4`='$_POST[dshrinkage_wid4]',
		`dshrinkage_w5`='$_POST[dshrinkage_wid5]',
		`dshrinkage_w6`='$_POST[dshrinkage_wid6]',
		`dspirality1`='$_POST[dspirality1]',
		`dspirality2`='$_POST[dspirality2]',
		`dspirality3`='$_POST[dspirality3]',
		`dspirality4`='$_POST[dspirality4]',
		`dspirality5`='$_POST[dspirality5]',
		`dspirality6`='$_POST[dspirality6]',
		`dss_linedry`='$_POST[dss_linedry]',
		`dss_tumbledry`='$_POST[dss_tumbledry]',
		`dsns_note`='$_POST[dsns_note]',
		`dapperss_ch1`='$_POST[dapperss_ch1]',
		`dapperss_ch2`='$_POST[dapperss_ch2]',
		`dapperss_ch3`='$_POST[dapperss_ch3]',
		`dapperss_ch4`='$_POST[dapperss_ch4]',
		`dapperss_cc1`='$_POST[dapperss_cc1]',
		`dapperss_cc2`='$_POST[dapperss_cc2]',
		`dapperss_cc3`='$_POST[dapperss_cc3]',
		`dapperss_cc4`='$_POST[dapperss_cc4]',
		`dapperss_st`='$_POST[dapperss_st]',
		`dapperss_pf1`='$_POST[dapperss_pf1]',
		`dapperss_pf2`='$_POST[dapperss_pf2]',
		`dapperss_pf3`='$_POST[dapperss_pf3]',
		`dapperss_pf4`='$_POST[dapperss_pf4]',
		`dapperss_pb1`='$_POST[dapperss_pb1]',
		`dapperss_pb2`='$_POST[dapperss_pb2]',
		`dapperss_pb3`='$_POST[dapperss_pb3]',
		`dapperss_pb4`='$_POST[dapperss_pb4]',
		`dapperss_sf1`='$_POST[dapperss_sf1]',
		`dapperss_sf2`='$_POST[dapperss_sf2]',
		`dapperss_sf3`='$_POST[dapperss_sf3]',
		`dapperss_sf4`='$_POST[dapperss_sf4]',
		`dapperss_sb1`='$_POST[dapperss_sb1]',
		`dapperss_sb2`='$_POST[dapperss_sb2]',
		`dapperss_sb3`='$_POST[dapperss_sb3]',
		`dapperss_sb4`='$_POST[dapperss_sb4]',
	 	`dapperss_note`='$_POST[dapperss_note]',
		`dpm_f1`='$_POST[dpillingm_f1]',
		`dpm_b1`='$_POST[dpillingm_b1]',
		`dpm_f2`='$_POST[dpillingm_f2]',
		`dpm_b2`='$_POST[dpillingm_b2]',
		`dpm_f3`='$_POST[dpillingm_f3]',
		`dpm_b3`='$_POST[dpillingm_b3]',
		`dpm_f4`='$_POST[dpillingm_f4]',
		`dpm_b4`='$_POST[dpillingm_b4]',
		`dpm_f5`='$_POST[dpillingm_f5]',
		`dpm_b5`='$_POST[dpillingm_b5]',
		`dpillm_note`='$_POST[dpillm_note]',
		`dpl_f1`='$_POST[dpillingl_f1]',
		`dpl_b1`='$_POST[dpillingl_b1]',
		`dpl_f2`='$_POST[dpillingl_f2]',
		`dpl_b2`='$_POST[dpillingl_b2]',
		`dpl_f3`='$_POST[dpillingl_f3]',
		`dpl_b3`='$_POST[dpillingl_b3]',
		`dpl_f4`='$_POST[dpillingl_f4]',
		`dpl_b4`='$_POST[dpillingl_b4]',
		`dpl_f5`='$_POST[dpillingl_f5]',
		`dpl_b5`='$_POST[dpillingl_b5]',
		`dpilll_note`='$_POST[dpilll_note]',
		`dpb_f1`='$_POST[dpillingb_f1]',
		`dpb_b1`='$_POST[dpillingb_b1]',
		`dpb_f2`='$_POST[dpillingb_f2]',
		`dpb_b2`='$_POST[dpillingb_b2]',
		`dpb_f3`='$_POST[dpillingb_f3]',
		`dpb_b3`='$_POST[dpillingb_b3]',
		`dpb_f4`='$_POST[dpillingb_f4]',
		`dpb_b4`='$_POST[dpillingb_b4]',
		`dpb_f5`='$_POST[dpillingb_f5]',
		`dpb_b5`='$_POST[dpillingb_b5]',
		`dpillb_note`='$_POST[dpillb_note]',
		`dprt_f1`='$_POST[dpillingrt_f1]',
		`dprt_b1`='$_POST[dpillingrt_b1]',
		`dprt_f2`='$_POST[dpillingrt_f2]',
		`dprt_b2`='$_POST[dpillingrt_b2]',
		`dprt_f3`='$_POST[dpillingrt_f3]',
		`dprt_b3`='$_POST[dpillingrt_b3]',
		`dprt_f4`='$_POST[dpillingrt_f4]',
		`dprt_b4`='$_POST[dpillingrt_b4]',
		`dprt_f5`='$_POST[dpillingrt_f5]',
		`dprt_b5`='$_POST[dpillingrt_b5]',
		`dpillr_note`='$_POST[dpillr_note]',
		`dabration`='$_POST[dabr]',
		`dabr_note`='$_POST[dabr_note]',
		`dsm_l1`='$_POST[dsnaggingm_l1]',
		`dsm_w1`='$_POST[dsnaggingm_w1]',
		`dsm_l2`='$_POST[dsnaggingm_l2]',
		`dsm_w2`='$_POST[dsnaggingm_w2]',
		`dsm_l3`='$_POST[dsnaggingm_l3]',
		`dsm_w3`='$_POST[dsnaggingm_w3]',
		`dsm_l4`='$_POST[dsnaggingm_l4]',
		`dsm_w4`='$_POST[dsnaggingm_w4]',
		`dsnam_note`='$_POST[dsnam_note]',
		`dsp_grdl1` ='$_POST[dsp_grdl1]',
		`dsp_clsl1` ='$_POST[dsp_clsl1]',
		`dsp_shol1` ='$_POST[dsp_shol1]',
		`dsp_medl1` ='$_POST[dsp_medl1]',
		`dsp_lonl1` ='$_POST[dsp_lonl1]',
		`dsp_grdw1` ='$_POST[dsp_grdw1]',
		`dsp_clsw1` ='$_POST[dsp_clsw1]',
		`dsp_show1` ='$_POST[dsp_show1]',
		`dsp_medw1` ='$_POST[dsp_medw1]',
		`dsp_lonw1` ='$_POST[dsp_lonw1]',
		`dsp_grdl2` ='$_POST[dsp_grdl2]',
		`dsp_clsl2` ='$_POST[dsp_clsl2]',
		`dsp_shol2` ='$_POST[dsp_shol2]',
		`dsp_medl2` ='$_POST[dsp_medl2]',
		`dsp_lonl2` ='$_POST[dsp_lonl2]',
		`dsp_grdw2` ='$_POST[dsp_grdw2]',
		`dsp_clsw2` ='$_POST[dsp_clsw2]',
		`dsp_show2` ='$_POST[dsp_show2]',
		`dsp_medw2` ='$_POST[dsp_medw2]',
		`dsp_lonw2` ='$_POST[dsp_lonw2]',
		`dsnap_note`='$_POST[dsnap_note]',
		`dsb_l1`='$_POST[dsnaggingb_l1]',
		`dsb_w1`='$_POST[dsnaggingb_w1]',
		`dsb_l2`='$_POST[dsnaggingb_l2]',
		`dsb_w2`='$_POST[dsnaggingb_w2]',
		`dsb_l3`='$_POST[dsnaggingb_l3]',
		`dsb_w3`='$_POST[dsnaggingb_w3]',
		`dsb_l4`='$_POST[dsnaggingb_l4]',
		`dsb_w4`='$_POST[dsnaggingb_w4]',
		`dsnab_note`='$_POST[dsnab_note]',
		`dbs_instron`='$_POST[dinstron]',
		`dbs_mullen`='$_POST[dmullen]',
		`dbs_tru`='$_POST[dtru_burst]',
		`dbs_tru2`='$_POST[dtru_burst2]',
		`dburs_note`='$_POST[dburs_note]',
		`dthick1`='$_POST[dthick1]',
		`dthick2`='$_POST[dthick2]',
		`dthick3`='$_POST[dthick3]',
		`dthickav`='$_POST[dthickav]',
		`dthick_note`='$_POST[dthick_note]',
		`dstretch_l1`='$_POST[dstretch_l1]',
		`dstretch_w1`='$_POST[dstretch_w1]',
		`dstretch_l2`='$_POST[dstretch_l2]',
		`dstretch_w2`='$_POST[dstretch_w2]',
		`dstretch_l3`='$_POST[dstretch_l3]',
		`dstretch_w3`='$_POST[dstretch_w3]',
		`dstretch_l4`='$_POST[dstretch_l4]',
		`dstretch_w4`='$_POST[dstretch_w4]',
		`dstretch_l5`='$_POST[dstretch_l5]',
		`dstretch_w5`='$_POST[dstretch_w5]',
		`dload_stretch`='$_POST[dload_stretch]',
		`dstretch_note`='$_POST[dstretch_note]',
		`drecover_l1`='$_POST[drecover_l1]',
		`drecover_w1`='$_POST[drecover_w1]',
		`drecover_l2`='$_POST[drecover_l2]',
		`drecover_w2`='$_POST[drecover_w2]',
		`drecover_l3`='$_POST[drecover_l3]',
		`drecover_w3`='$_POST[drecover_w3]',
		`drecover_l4`='$_POST[drecover_l4]',
		`drecover_w4`='$_POST[drecover_w4]',
		`drecover_l5`='$_POST[drecover_l5]',
		`drecover_w5`='$_POST[drecover_w5]',
		`drecover_w11`='$_POST[drecover_w11]',
		`drecover_l21`='$_POST[drecover_l21]',
		`drecover_w21`='$_POST[drecover_w21]',
		`drecover_l31`='$_POST[drecover_l31]',
		`drecover_w31`='$_POST[drecover_w31]',
		`drecover_l41`='$_POST[drecover_l41]',
		`drecover_w41`='$_POST[drecover_w41]',
		`drecover_l51`='$_POST[drecover_l51]',
		`drecover_w51`='$_POST[drecover_w51]',
		`drecover_note`='$_POST[drecover_note]',
		`dgrowth_l1`='$_POST[dgrowth_l1]',
		`dgrowth_w1`='$_POST[dgrowth_w1]',
		`dgrowth_l2`='$_POST[dgrowth_l2]',
		`dgrowth_w2`='$_POST[dgrowth_w2]',
		`drec_growth_l1`='$_POST[drec_growth_l1]',
		`drec_growth_w1`='$_POST[drec_growth_w1]',
		`drec_growth_l2`='$_POST[drec_growth_l2]',
		`drec_growth_w2`='$_POST[drec_growth_w2]',
		`dgrowth_note`='$_POST[dgrowth_note]',
		`dapper_ch1`='$_POST[dapper_ch1]',
		`dapper_ch2`='$_POST[dapper_ch2]',
		`dapper_ch3`='$_POST[dapper_ch3]',
		`dapper_cc1`='$_POST[dapper_cc1]',
		`dapper_cc2`='$_POST[dapper_cc2]',
		`dapper_cc3`='$_POST[dapper_cc3]',
		`dapper_st`='$_POST[dapper_st]',
		`dapper_st2`='$_POST[dapper_st2]',
		`dapper_st3`='$_POST[dapper_st3]',
		`dapper_pf1`='$_POST[dapper_pf1]',
		`dapper_pf2`='$_POST[dapper_pf2]',
		`dapper_pf3`='$_POST[dapper_pf3]',
		`dapper_pb1`='$_POST[dapper_pb1]',
		`dapper_pb2`='$_POST[dapper_pb2]',
		`dapper_pb3`='$_POST[dapper_pb3]',
		`dapper_acetate`='$_POST[dapper_acetate]',
		`dapper_cotton`='$_POST[dapper_cotton]',
		`dapper_nylon`='$_POST[dapper_nylon]',
		`dapper_poly`='$_POST[dapper_poly]',
		`dapper_acrylic`='$_POST[dapper_acrylic]',
		`dapper_wool`='$_POST[dapper_wool]',
		`dapper_note`='$_POST[dapper_note]',
		`dfibre_transfer`='$_POST[dfibre_transfer]',
		`dfibre_grade`='$_POST[dfibre_grade]',
		`dfibre_note`='$_POST[dfibre_note]',
		`dodour`='$_POST[dodour]',
		`dodour_note`='$_POST[dodour_note]',
		`dcurling`='$_POST[dcurling]',
		`dcurling_note`='$_POST[dcurling_note]',
		`dnedle`='$_POST[dnedle]',
		`dnedle_note`='$_POST[dnedle_note]',
		`tgl_update`=now()
		WHERE `id_nokk`='$rcek[id]'");

		$sqlPHYDI = mysqli_query($con, "INSERT INTO tbl_tq_disptest SET
		`id_nokk`='$rcek[id]',
		`dflamability`='$_POST[dflamability]',
		`dfla_note`='$_POST[dfla_note]',
		`dfc_cott`='$_POST[dfc_cott]',
		`dfc_poly`='$_POST[dfc_poly]',
		`dfc_elastane`='$_POST[dfc_ela]',
		`dfc_cott1`='$_POST[dfc_cott1]',
		`dfc_poly1`='$_POST[dfc_poly1]',
		`dfc_elastane1`='$_POST[dfc_ela1]',
		`std_dfc_cott1`='$_POST[std_dfc_cott1]',
		`std_dfc_poly1`='$_POST[std_dfc_poly1]',
		`std_dfc_elastane1`='$_POST[std_dfc_elastane1]',
		`dfibercontent`='$_POST[dfibercontent]',
		`dfiber_note`='$_POST[dfiber_note]',
		`dfc_wpi`='$_POST[dwpi]',
		`dfc_cpi`='$_POST[dcpi]',
		`dfc_note`='$_POST[dfc_note]',
		`df_weight`='$_POST[dfabric_weight]',
		`dfwe_note`='$_POST[dfwe_note]',
		`df_width`='$_POST[dfabric_width]',
		`dfwi_note`='$_POST[dfwi_note]',
		`dbow`='$_POST[dbow]',
		`dskew`='$_POST[dskew]',
		`dbas_note`='$_POST[dbas_note]',
		`dh_shrinkage_temp`='$_POST[dh_shrinkage_temp]',
		`dh_shrinkage_l1`='$_POST[dh_shrinkage_l1]',
		`dh_shrinkage_w1`='$_POST[dh_shrinkage_w1]',
		`dh_shrinkage_grd`='$_POST[dh_shrinkage_grd]',
		`dh_shrinkage_app`='$_POST[dh_shrinkage_app]',
		`dh_shrinkage_note`='$_POST[dh_shrinkage_note]',
		`dss_temp`='$_POST[dss_temp]',
		`dss_washes3`='$_POST[dss_washes3]',
		`dss_washes10`='$_POST[dss_washes10]',
		`dss_washes15`='$_POST[dss_washes15]',
		`dss_cmt`='$_POST[dss_cmt]',
		`dshrinkage_l1`='$_POST[dshrinkage_len1]',
		`dshrinkage_l2`='$_POST[dshrinkage_len2]',
		`dshrinkage_l3`='$_POST[dshrinkage_len3]',
		`dshrinkage_l4`='$_POST[dshrinkage_len4]',
		`dshrinkage_l5`='$_POST[dshrinkage_len5]',
		`dshrinkage_l6`='$_POST[dshrinkage_len6]',
		`dshrinkage_w1`='$_POST[dshrinkage_wid1]',
		`dshrinkage_w2`='$_POST[dshrinkage_wid2]',
		`dshrinkage_w3`='$_POST[dshrinkage_wid3]',
		`dshrinkage_w4`='$_POST[dshrinkage_wid4]',
		`dshrinkage_w5`='$_POST[dshrinkage_wid5]',
		`dshrinkage_w6`='$_POST[dshrinkage_wid6]',
		`dspirality1`='$_POST[dspirality1]',
		`dspirality2`='$_POST[dspirality2]',
		`dspirality3`='$_POST[dspirality3]',
		`dspirality4`='$_POST[dspirality4]',
		`dspirality5`='$_POST[dspirality5]',
		`dspirality6`='$_POST[dspirality6]',
		`dss_linedry`='$_POST[dss_linedry]',
		`dss_tumbledry`='$_POST[dss_tumbledry]',
		`dsns_note`='$_POST[dsns_note]',
		`dapperss_ch1`='$_POST[dapperss_ch1]',
		`dapperss_ch2`='$_POST[dapperss_ch2]',
		`dapperss_ch3`='$_POST[dapperss_ch3]',
		`dapperss_ch4`='$_POST[dapperss_ch4]',
		`dapperss_cc1`='$_POST[dapperss_cc1]',
		`dapperss_cc2`='$_POST[dapperss_cc2]',
		`dapperss_cc3`='$_POST[dapperss_cc3]',
		`dapperss_cc4`='$_POST[dapperss_cc4]',
		`dapperss_st`='$_POST[dapperss_st]',
		`dapperss_pf1`='$_POST[dapperss_pf1]',
		`dapperss_pf2`='$_POST[dapperss_pf2]',
		`dapperss_pf3`='$_POST[dapperss_pf3]',
		`dapperss_pf4`='$_POST[dapperss_pf4]',
		`dapperss_pb1`='$_POST[dapperss_pb1]',
		`dapperss_pb2`='$_POST[dapperss_pb2]',
		`dapperss_pb3`='$_POST[dapperss_pb3]',
		`dapperss_pb4`='$_POST[dapperss_pb4]',
		`dapperss_sf1`='$_POST[dapperss_sf1]',
		`dapperss_sf2`='$_POST[dapperss_sf2]',
		`dapperss_sf3`='$_POST[dapperss_sf3]',
		`dapperss_sf4`='$_POST[dapperss_sf4]',
		`dapperss_sb1`='$_POST[dapperss_sb1]',
		`dapperss_sb2`='$_POST[dapperss_sb2]',
		`dapperss_sb3`='$_POST[dapperss_sb3]',
		`dapperss_sb4`='$_POST[dapperss_sb4]',
	 	`dapperss_note`='$_POST[dapperss_note]',
		`dpm_f1`='$_POST[dpillingm_f1]',
		`dpm_b1`='$_POST[dpillingm_b1]',
		`dpm_f2`='$_POST[dpillingm_f2]',
		`dpm_b2`='$_POST[dpillingm_b2]',
		`dpm_f3`='$_POST[dpillingm_f3]',
		`dpm_b3`='$_POST[dpillingm_b3]',
		`dpm_f4`='$_POST[dpillingm_f4]',
		`dpm_b4`='$_POST[dpillingm_b4]',
		`dpm_f5`='$_POST[dpillingm_f5]',
		`dpm_b5`='$_POST[dpillingm_b5]',
		`dpillm_note`='$_POST[dpillm_note]',
		`dpl_f1`='$_POST[dpillingl_f1]',
		`dpl_b1`='$_POST[dpillingl_b1]',
		`dpl_f2`='$_POST[dpillingl_f2]',
		`dpl_b2`='$_POST[dpillingl_b2]',
		`dpl_f3`='$_POST[dpillingl_f3]',
		`dpl_b3`='$_POST[dpillingl_b3]',
		`dpl_f4`='$_POST[dpillingl_f4]',
		`dpl_b4`='$_POST[dpillingl_b4]',
		`dpl_f5`='$_POST[dpillingl_f5]',
		`dpl_b5`='$_POST[dpillingl_b5]',
		`dpilll_note`='$_POST[dpilll_note]',
		`dpb_f1`='$_POST[dpillingb_f1]',
		`dpb_b1`='$_POST[dpillingb_b1]',
		`dpb_f2`='$_POST[dpillingb_f2]',
		`dpb_b2`='$_POST[dpillingb_b2]',
		`dpb_f3`='$_POST[dpillingb_f3]',
		`dpb_b3`='$_POST[dpillingb_b3]',
		`dpb_f4`='$_POST[dpillingb_f4]',
		`dpb_b4`='$_POST[dpillingb_b4]',
		`dpb_f5`='$_POST[dpillingb_f5]',
		`dpb_b5`='$_POST[dpillingb_b5]',
		`dpillb_note`='$_POST[dpillb_note]',
		`dprt_f1`='$_POST[dpillingrt_f1]',
		`dprt_b1`='$_POST[dpillingrt_b1]',
		`dprt_f2`='$_POST[dpillingrt_f2]',
		`dprt_b2`='$_POST[dpillingrt_b2]',
		`dprt_f3`='$_POST[dpillingrt_f3]',
		`dprt_b3`='$_POST[dpillingrt_b3]',
		`dprt_f4`='$_POST[dpillingrt_f4]',
		`dprt_b4`='$_POST[dpillingrt_b4]',
		`dprt_f5`='$_POST[dpillingrt_f5]',
		`dprt_b5`='$_POST[dpillingrt_b5]',
		`dpillr_note`='$_POST[dpillr_note]',
		`dabration`='$_POST[dabr]',
		`dabr_note`='$_POST[dabr_note]',
		`dsm_l1`='$_POST[dsnaggingm_l1]',
		`dsm_w1`='$_POST[dsnaggingm_w1]',
		`dsm_l2`='$_POST[dsnaggingm_l2]',
		`dsm_w2`='$_POST[dsnaggingm_w2]',
		`dsm_l3`='$_POST[dsnaggingm_l3]',
		`dsm_w3`='$_POST[dsnaggingm_w3]',
		`dsm_l4`='$_POST[dsnaggingm_l4]',
		`dsm_w4`='$_POST[dsnaggingm_w4]',
		`dsnam_note`='$_POST[dsnam_note]',
		`dsp_grdl1` ='$_POST[dsp_grdl1]',
		`dsp_clsl1` ='$_POST[dsp_clsl1]',
		`dsp_shol1` ='$_POST[dsp_shol1]',
		`dsp_medl1` ='$_POST[dsp_medl1]',
		`dsp_lonl1` ='$_POST[dsp_lonl1]',
		`dsp_grdw1` ='$_POST[dsp_grdw1]',
		`dsp_clsw1` ='$_POST[dsp_clsw1]',
		`dsp_show1` ='$_POST[dsp_show1]',
		`dsp_medw1` ='$_POST[dsp_medw1]',
		`dsp_lonw1` ='$_POST[dsp_lonw1]',
		`dsp_grdl2` ='$_POST[dsp_grdl2]',
		`dsp_clsl2` ='$_POST[dsp_clsl2]',
		`dsp_shol2` ='$_POST[dsp_shol2]',
		`dsp_medl2` ='$_POST[dsp_medl2]',
		`dsp_lonl2` ='$_POST[dsp_lonl2]',
		`dsp_grdw2` ='$_POST[dsp_grdw2]',
		`dsp_clsw2` ='$_POST[dsp_clsw2]',
		`dsp_show2` ='$_POST[dsp_show2]',
		`dsp_medw2` ='$_POST[dsp_medw2]',
		`dsp_lonw2` ='$_POST[dsp_lonw2]',
		`dsnap_note`='$_POST[dsnap_note]',
		`dsb_l1`='$_POST[dsnaggingb_l1]',
		`dsb_w1`='$_POST[dsnaggingb_w1]',
		`dsb_l2`='$_POST[dsnaggingb_l2]',
		`dsb_w2`='$_POST[dsnaggingb_w2]',
		`dsb_l3`='$_POST[dsnaggingb_l3]',
		`dsb_w3`='$_POST[dsnaggingb_w3]',
		`dsb_l4`='$_POST[dsnaggingb_l4]',
		`dsb_w4`='$_POST[dsnaggingb_w4]',
		`dsnab_note`='$_POST[dsnab_note]',
		`dbs_instron`='$_POST[dinstron]',
		`dbs_mullen`='$_POST[dmullen]',
		`dbs_tru`='$_POST[dtru_burst]',
		`dbs_tru2`='$_POST[dtru_burst2]',
		`dburs_note`='$_POST[dburs_note]',
		`dthick1`='$_POST[dthick1]',
		`dthick2`='$_POST[dthick2]',
		`dthick3`='$_POST[dthick3]',
		`dthickav`='$_POST[dthickav]',
		`dthick_note`='$_POST[dthick_note]',
		`dstretch_l1`='$_POST[dstretch_l1]',
		`dstretch_w1`='$_POST[dstretch_w1]',
		`dstretch_l2`='$_POST[dstretch_l2]',
		`dstretch_w2`='$_POST[dstretch_w2]',
		`dstretch_l3`='$_POST[dstretch_l3]',
		`dstretch_w3`='$_POST[dstretch_w3]',
		`dstretch_l4`='$_POST[dstretch_l4]',
		`dstretch_w4`='$_POST[dstretch_w4]',
		`dstretch_l5`='$_POST[dstretch_l5]',
		`dstretch_w5`='$_POST[dstretch_w5]',
		`dload_stretch`='$_POST[dload_stretch]',
		`dstretch_note`='$_POST[dstretch_note]',
		`drecover_l1`='$_POST[drecover_l1]',
		`drecover_w1`='$_POST[drecover_w1]',
		`drecover_l2`='$_POST[drecover_l2]',
		`drecover_w2`='$_POST[drecover_w2]',
		`drecover_l3`='$_POST[drecover_l3]',
		`drecover_w3`='$_POST[drecover_w3]',
		`drecover_l4`='$_POST[drecover_l4]',
		`drecover_w4`='$_POST[drecover_w4]',
		`drecover_l5`='$_POST[drecover_l5]',
		`drecover_w5`='$_POST[drecover_w5]',
		`drecover_w11`='$_POST[drecover_w11]',
		`drecover_l21`='$_POST[drecover_l21]',
		`drecover_w21`='$_POST[drecover_w21]',
		`drecover_l31`='$_POST[drecover_l31]',
		`drecover_w31`='$_POST[drecover_w31]',
		`drecover_l41`='$_POST[drecover_l41]',
		`drecover_w41`='$_POST[drecover_w41]',
		`drecover_l51`='$_POST[drecover_l51]',
		`drecover_w51`='$_POST[drecover_w51]',
		`drecover_note`='$_POST[drecover_note]',
		`dgrowth_l1`='$_POST[dgrowth_l1]',
		`dgrowth_w1`='$_POST[dgrowth_w1]',
		`dgrowth_l2`='$_POST[dgrowth_l2]',
		`dgrowth_w2`='$_POST[dgrowth_w2]',
		`drec_growth_l1`='$_POST[drec_growth_l1]',
		`drec_growth_w1`='$_POST[drec_growth_w1]',
		`drec_growth_l2`='$_POST[drec_growth_l2]',
		`drec_growth_w2`='$_POST[drec_growth_w2]',
		`dgrowth_note`='$_POST[dgrowth_note]',
		`dapper_ch1`='$_POST[dapper_ch1]',
		`dapper_ch2`='$_POST[dapper_ch2]',
		`dapper_ch3`='$_POST[dapper_ch3]',
		`dapper_cc1`='$_POST[dapper_cc1]',
		`dapper_cc2`='$_POST[dapper_cc2]',
		`dapper_cc3`='$_POST[dapper_cc3]',
		`dapper_st`='$_POST[dapper_st]',
		`dapper_st2`='$_POST[dapper_st2]',
		`dapper_st3`='$_POST[dapper_st3]',
		`dapper_pf1`='$_POST[dapper_pf1]',
		`dapper_pf2`='$_POST[dapper_pf2]',
		`dapper_pf3`='$_POST[dapper_pf3]',
		`dapper_pb1`='$_POST[dapper_pb1]',
		`dapper_pb2`='$_POST[dapper_pb2]',
		`dapper_pb3`='$_POST[dapper_pb3]',
		`dapper_acetate`='$_POST[dapper_acetate]',
		`dapper_cotton`='$_POST[dapper_cotton]',
		`dapper_nylon`='$_POST[dapper_nylon]',
		`dapper_poly`='$_POST[dapper_poly]',
		`dapper_acrylic`='$_POST[dapper_acrylic]',
		`dapper_wool`='$_POST[dapper_wool]',
		`dapper_note`='$_POST[dapper_note]',
		`dfibre_transfer`='$_POST[dfibre_transfer]',
		`dfibre_grade`='$_POST[dfibre_grade]',
		`dfibre_note`='$_POST[dfibre_note]',
		`dodour`='$_POST[dodour]',
		`dodour_note`='$_POST[dodour_note]',
		`dcurling`='$_POST[dcurling]',
		`dcurling_note`='$_POST[dcurling_note]',
		`dnedle`='$_POST[dnedle]',
		`dnedle_note`='$_POST[dnedle_note]',
		`tgl_buat`=now(),
		`tgl_update`=now()");

		$sqlPHYM = mysqli_query($con, "UPDATE tbl_tq_marginal SET
`mflamability`='$_POST[mflamability]',
`mfla_note`='$_POST[mfla_note]',
`mfc_cott`='$_POST[mfc_cott]',
`mfc_poly`='$_POST[mfc_poly]',
`mfc_elastane`='$_POST[mfc_ela]',
`mfc_cott1`='$_POST[mfc_cott1]',
`mfc_poly1`='$_POST[mfc_poly1]',
`mfc_elastane1`='$_POST[mfc_ela1]',
`std_mfc_cott1`='$_POST[std_mfc_cott1]',
`std_mfc_poly1`='$_POST[std_mfc_poly1]',
`std_mfc_elastane1`='$_POST[std_mfc_elastane1]',
`mfibercontent`='$_POST[mfibercontent]',
`mfiber_note`='$_POST[mfiber_note]',
`mfc_wpi`='$_POST[mwpi]',
`mfc_cpi`='$_POST[mcpi]',
`mfc_note`='$_POST[mfc_note]',
`mf_weight`='$_POST[mfabric_weight]',
`mfwe_note`='$_POST[mfwe_note]',
`mf_width`='$_POST[mfabric_width]',
`mfwi_note`='$_POST[mfwi_note]',
`mbow`='$_POST[mbow]',
`mskew`='$_POST[mskew]',
`mbas_note`='$_POST[mbas_note]',
`mh_shrinkage_temp`='$_POST[mh_shrinkage_temp]',
`mh_shrinkage_l1`='$_POST[mh_shrinkage_l1]',
`mh_shrinkage_w1`='$_POST[mh_shrinkage_w1]',
`mh_shrinkage_grd`='$_POST[mh_shrinkage_grd]',
`mh_shrinkage_app`='$_POST[mh_shrinkage_app]',
`mh_shrinkage_note`='$_POST[mh_shrinkage_note]',
`mss_temp`='$_POST[mss_temp]',
`mss_washes3`='$_POST[mss_washes3]',
`mss_washes10`='$_POST[mss_washes10]',
`mss_washes15`='$_POST[mss_washes15]',
`mss_cmt`='$_POST[mss_cmt]',
`mshrinkage_l1`='$_POST[mshrinkage_len1]',
`mshrinkage_l2`='$_POST[mshrinkage_len2]',
`mshrinkage_l3`='$_POST[mshrinkage_len3]',
`mshrinkage_l4`='$_POST[mshrinkage_len4]',
`mshrinkage_l5`='$_POST[mshrinkage_len5]',
`mshrinkage_l6`='$_POST[mshrinkage_len6]',
`mshrinkage_w1`='$_POST[mshrinkage_wid1]',
`mshrinkage_w2`='$_POST[mshrinkage_wid2]',
`mshrinkage_w3`='$_POST[mshrinkage_wid3]',
`mshrinkage_w4`='$_POST[mshrinkage_wid4]',
`mshrinkage_w5`='$_POST[mshrinkage_wid5]',
`mshrinkage_w6`='$_POST[mshrinkage_wid6]',
`mspirality1`='$_POST[mspirality1]',
`mspirality2`='$_POST[mspirality2]',
`mspirality3`='$_POST[mspirality3]',
`mspirality4`='$_POST[mspirality4]',
`mspirality5`='$_POST[mspirality5]',
`mspirality6`='$_POST[mspirality6]',
`mss_linedry`='$_POST[mss_linedry]',
`mss_tumbledry`='$_POST[mss_tumbledry]',
`msns_note`='$_POST[msns_note]',
`mapperss_ch1`='$_POST[mapperss_ch1]',
`mapperss_ch2`='$_POST[mapperss_ch2]',
`mapperss_ch3`='$_POST[mapperss_ch3]',
`mapperss_ch4`='$_POST[mapperss_ch4]',
`mapperss_cc1`='$_POST[mapperss_cc1]',
`mapperss_cc2`='$_POST[mapperss_cc2]',
`mapperss_cc3`='$_POST[mapperss_cc3]',
`mapperss_cc4`='$_POST[mapperss_cc4]',
`mapperss_st`='$_POST[mapperss_st]',
`mapperss_pf1`='$_POST[mapperss_pf1]',
`mapperss_pf2`='$_POST[mapperss_pf2]',
`mapperss_pf3`='$_POST[mapperss_pf3]',
`mapperss_pf4`='$_POST[mapperss_pf4]',
`mapperss_pb1`='$_POST[mapperss_pb1]',
`mapperss_pb2`='$_POST[mapperss_pb2]',
`mapperss_pb3`='$_POST[mapperss_pb3]',
`mapperss_pb4`='$_POST[mapperss_pb4]',
`mapperss_sf1`='$_POST[mapperss_sf1]',
`mapperss_sf2`='$_POST[mapperss_sf2]',
`mapperss_sf3`='$_POST[mapperss_sf3]',
`mapperss_sf4`='$_POST[mapperss_sf4]',
`mapperss_sb1`='$_POST[mapperss_sb1]',
`mapperss_sb2`='$_POST[mapperss_sb2]',
`mapperss_sb3`='$_POST[mapperss_sb3]',
`mapperss_sb4`='$_POST[mapperss_sb4]',
`mapperss_note`='$_POST[mapperss_note]',
`mpm_f1`='$_POST[mpillingm_f1]',
`mpm_b1`='$_POST[mpillingm_b1]',
`mpm_f2`='$_POST[mpillingm_f2]',
`mpm_b2`='$_POST[mpillingm_b2]',
`mpm_f3`='$_POST[mpillingm_f3]',
`mpm_b3`='$_POST[mpillingm_b3]',
`mpm_f4`='$_POST[mpillingm_f4]',
`mpm_b4`='$_POST[mpillingm_b4]',
`mpm_f5`='$_POST[mpillingm_f5]',
`mpm_b5`='$_POST[mpillingm_b5]',
`mpillm_note`='$_POST[mpillm_note]',
`mpl_f1`='$_POST[mpillingl_f1]',
`mpl_b1`='$_POST[mpillingl_b1]',
`mpl_f2`='$_POST[mpillingl_f2]',
`mpl_b2`='$_POST[mpillingl_b2]',
`mpl_f3`='$_POST[mpillingl_f3]',
`mpl_b3`='$_POST[mpillingl_b3]',
`mpl_f4`='$_POST[mpillingl_f4]',
`mpl_b4`='$_POST[mpillingl_b4]',
`mpl_f5`='$_POST[mpillingl_f5]',
`mpl_b5`='$_POST[mpillingl_b5]',
`mpilll_note`='$_POST[mpilll_note]',
`mpb_f1`='$_POST[mpillingb_f1]',
`mpb_b1`='$_POST[mpillingb_b1]',
`mpb_f2`='$_POST[mpillingb_f2]',
`mpb_b2`='$_POST[mpillingb_b2]',
`mpb_f3`='$_POST[mpillingb_f3]',
`mpb_b3`='$_POST[mpillingb_b3]',
`mpb_f4`='$_POST[mpillingb_f4]',
`mpb_b4`='$_POST[mpillingb_b4]',
`mpb_f5`='$_POST[mpillingb_f5]',
`mpb_b5`='$_POST[mpillingb_b5]',
`mpillb_note`='$_POST[mpillb_note]',
`mprt_f1`='$_POST[mpillingrt_f1]',
`mprt_b1`='$_POST[mpillingrt_b1]',
`mprt_f2`='$_POST[mpillingrt_f2]',
`mprt_b2`='$_POST[mpillingrt_b2]',
`mprt_f3`='$_POST[mpillingrt_f3]',
`mprt_b3`='$_POST[mpillingrt_b3]',
`mprt_f4`='$_POST[mpillingrt_f4]',
`mprt_b4`='$_POST[mpillingrt_b4]',
`mprt_f5`='$_POST[mpillingrt_f5]',
`mprt_b5`='$_POST[mpillingrt_b5]',
`mpillr_note`='$_POST[mpillr_note]',
`mabration`='$_POST[mabr]',
`mabr_note`='$_POST[mabr_note]',
`msm_l1`='$_POST[msnaggingm_l1]',
`msm_w1`='$_POST[msnaggingm_w1]',
`msm_l2`='$_POST[msnaggingm_l2]',
`msm_w2`='$_POST[msnaggingm_w2]',
`msm_l3`='$_POST[msnaggingm_l3]',
`msm_w3`='$_POST[msnaggingm_w3]',
`msm_l4`='$_POST[msnaggingm_l4]',
`msm_w4`='$_POST[msnaggingm_w4]',
`msnam_note`='$_POST[msnam_note]',
`msp_grdl1` ='$_POST[msp_grdl1]',
`msp_clsl1` ='$_POST[msp_clsl1]',
`msp_shol1` ='$_POST[msp_shol1]',
`msp_medl1` ='$_POST[msp_medl1]',
`msp_lonl1` ='$_POST[msp_lonl1]',
`msp_grdw1` ='$_POST[msp_grdw1]',
`msp_clsw1` ='$_POST[msp_clsw1]',
`msp_show1` ='$_POST[msp_show1]',
`msp_medw1` ='$_POST[msp_medw1]',
`msp_lonw1` ='$_POST[msp_lonw1]',
`msp_grdl2` ='$_POST[msp_grdl2]',
`msp_clsl2` ='$_POST[msp_clsl2]',
`msp_shol2` ='$_POST[msp_shol2]',
`msp_medl2` ='$_POST[msp_medl2]',
`msp_lonl2` ='$_POST[msp_lonl2]',
`msp_grdw2` ='$_POST[msp_grdw2]',
`msp_clsw2` ='$_POST[msp_clsw2]',
`msp_show2` ='$_POST[msp_show2]',
`msp_medw2` ='$_POST[msp_medw2]',
`msp_lonw2` ='$_POST[msp_lonw2]',
`msnap_note`='$_POST[msnap_note]',
`msb_l1`='$_POST[msnaggingb_l1]',
`msb_w1`='$_POST[msnaggingb_w1]',
`msb_l2`='$_POST[msnaggingb_l2]',
`msb_w2`='$_POST[msnaggingb_w2]',
`msb_l3`='$_POST[msnaggingb_l3]',
`msb_w3`='$_POST[msnaggingb_w3]',
`msb_l4`='$_POST[msnaggingb_l4]',
`msb_w4`='$_POST[msnaggingb_w4]',
`msnab_note`='$_POST[msnab_note]',
`mbs_instron`='$_POST[minstron]',
`mbs_mullen`='$_POST[mmullen]',
`mbs_tru`='$_POST[mtru_burst]',
`mbs_tru2`='$_POST[mtru_burst2]',
`mburs_note`='$_POST[mburs_note]',
`mthick1`='$_POST[mthick1]',
`mthick2`='$_POST[mthick2]',
`mthick3`='$_POST[mthick3]',
`mthickav`='$_POST[mthickav]',
`mthick_note`='$_POST[mthick_note]',
`mstretch_l1`='$_POST[mstretch_l1]',
`mstretch_w1`='$_POST[mstretch_w1]',
`mstretch_l2`='$_POST[mstretch_l2]',
`mstretch_w2`='$_POST[mstretch_w2]',
`mstretch_l3`='$_POST[mstretch_l3]',
`mstretch_w3`='$_POST[mstretch_w3]',
`mstretch_l4`='$_POST[mstretch_l4]',
`mstretch_w4`='$_POST[mstretch_w4]',
`mstretch_l5`='$_POST[mstretch_l5]',
`mstretch_w5`='$_POST[mstretch_w5]',
`mload_stretch`='$_POST[mload_stretch]',
`mstretch_note`='$_POST[mstretch_note]',
`mrecover_l1`='$_POST[mrecover_l1]',
`mrecover_w1`='$_POST[mrecover_w1]',
`mrecover_l2`='$_POST[mrecover_l2]',
`mrecover_w2`='$_POST[mrecover_w2]',
`mrecover_l3`='$_POST[mrecover_l3]',
`mrecover_w3`='$_POST[mrecover_w3]',
`mrecover_l4`='$_POST[mrecover_l4]',
`mrecover_w4`='$_POST[mrecover_w4]',
`mrecover_l5`='$_POST[mrecover_l5]',
`mrecover_w5`='$_POST[mrecover_w5]',
`mrecover_l11`='$_POST[mrecover_l11]',
`mrecover_w11`='$_POST[mrecover_w11]',
`mrecover_l21`='$_POST[mrecover_l21]',
`mrecover_w21`='$_POST[mrecover_w21]',
`mrecover_l31`='$_POST[mrecover_l31]',
`mrecover_w31`='$_POST[mrecover_w31]',
`mrecover_l41`='$_POST[mrecover_l41]',
`mrecover_w41`='$_POST[mrecover_w41]',
`mrecover_l51`='$_POST[mrecover_l51]',
`mrecover_w51`='$_POST[mrecover_w51]',
`mrecover_note`='$_POST[mrecover_note]',
`mgrowth_l1`='$_POST[mgrowth_l1]',
`mgrowth_w1`='$_POST[mgrowth_w1]',
`mgrowth_l2`='$_POST[mgrowth_l2]',
`mgrowth_w2`='$_POST[mgrowth_w2]',
`mrec_growth_l1`='$_POST[mrec_growth_l1]',
`mrec_growth_w1`='$_POST[mrec_growth_w1]',
`mrec_growth_l2`='$_POST[mrec_growth_l2]',
`mrec_growth_w2`='$_POST[mrec_growth_w2]',
`mgrowth_note`='$_POST[mgrowth_note]',
`mapper_ch1`='$_POST[mapper_ch1]',
`mapper_ch2`='$_POST[mapper_ch2]',
`mapper_ch3`='$_POST[mapper_ch3]',
`mapper_cc1`='$_POST[mapper_cc1]',
`mapper_cc2`='$_POST[mapper_cc2]',
`mapper_cc3`='$_POST[mapper_cc3]',
`mapper_st`='$_POST[mapper_st]',
`mapper_st2`='$_POST[mapper_st2]',
`mapper_st3`='$_POST[mapper_st3]',
`mapper_pf1`='$_POST[mapper_pf1]',
`mapper_pf2`='$_POST[mapper_pf2]',
`mapper_pf3`='$_POST[mapper_pf3]',
`mapper_pb1`='$_POST[mapper_pb1]',
`mapper_pb2`='$_POST[mapper_pb2]',
`mapper_pb3`='$_POST[mapper_pb3]',
`mapper_acetate`='$_POST[mapper_acetate]',
`mapper_cotton`='$_POST[mapper_cotton]',
`mapper_nylon`='$_POST[mapper_nylon]',
`mapper_poly`='$_POST[mapper_poly]',
`mapper_acrylic`='$_POST[mapper_acrylic]',
`mapper_wool`='$_POST[mapper_wool]',
`mapper_note`='$_POST[mapper_note]',
`mfibre_transfer`='$_POST[mfibre_transfer]',
`mfibre_grade`='$_POST[mfibre_grade]',
`mfibre_note`='$_POST[mfibre_note]',
`modour`='$_POST[modour]',
`modour_note`='$_POST[modour_note]',
`tgl_update`=now()
WHERE `id_nokk`='$rcek[id]'");

		$sqlPHYMI = mysqli_query($con, "INSERT INTO tbl_tq_marginal SET
`id_nokk`='$rcek[id]',
`mflamability`='$_POST[mflamability]',
`mfla_note`='$_POST[mfla_note]',
`mfc_cott`='$_POST[mfc_cott]',
`mfc_poly`='$_POST[mfc_poly]',
`mfc_elastane`='$_POST[mfc_ela]',
`mfc_cott1`='$_POST[mfc_cott1]',
`mfc_poly1`='$_POST[mfc_poly1]',
`mfc_elastane1`='$_POST[mfc_ela1]',
`mfibercontent`='$_POST[mfibercontent]',
`mfiber_note`='$_POST[mfiber_note]',
`std_mfc_cott1`='$_POST[std_mfc_cott1]',
`std_mfc_poly1`='$_POST[std_mfc_poly1]',
`std_mfc_elastane1`='$_POST[std_mfc_elastane1]',
`mfc_wpi`='$_POST[mwpi]',
`mfc_cpi`='$_POST[mcpi]',
`mfc_note`='$_POST[mfc_note]',
`mf_weight`='$_POST[mfabric_weight]',
`mfwe_note`='$_POST[mfwe_note]',
`mf_width`='$_POST[mfabric_width]',
`mfwi_note`='$_POST[mfwi_note]',
`mbow`='$_POST[mbow]',
`mskew`='$_POST[mskew]',
`mbas_note`='$_POST[mbas_note]',
`mh_shrinkage_temp`='$_POST[mh_shrinkage_temp]',
`mh_shrinkage_l1`='$_POST[mh_shrinkage_l1]',
`mh_shrinkage_w1`='$_POST[mh_shrinkage_w1]',
`mh_shrinkage_grd`='$_POST[mh_shrinkage_grd]',
`mh_shrinkage_app`='$_POST[mh_shrinkage_app]',
`mh_shrinkage_note`='$_POST[mh_shrinkage_note]',
`mss_temp`='$_POST[mss_temp]',
`mss_washes3`='$_POST[mss_washes3]',
`mss_washes10`='$_POST[mss_washes10]',
`mss_washes15`='$_POST[mss_washes15]',
`mss_cmt`='$_POST[mss_cmt]',
`mshrinkage_l1`='$_POST[mshrinkage_len1]',
`mshrinkage_l2`='$_POST[mshrinkage_len2]',
`mshrinkage_l3`='$_POST[mshrinkage_len3]',
`mshrinkage_l4`='$_POST[mshrinkage_len4]',
`mshrinkage_l5`='$_POST[mshrinkage_len5]',
`mshrinkage_l6`='$_POST[mshrinkage_len6]',
`mshrinkage_w1`='$_POST[mshrinkage_wid1]',
`mshrinkage_w2`='$_POST[mshrinkage_wid2]',
`mshrinkage_w3`='$_POST[mshrinkage_wid3]',
`mshrinkage_w4`='$_POST[mshrinkage_wid4]',
`mshrinkage_w5`='$_POST[mshrinkage_wid5]',
`mshrinkage_w6`='$_POST[mshrinkage_wid6]',
`mspirality1`='$_POST[mspirality1]',
`mspirality2`='$_POST[mspirality2]',
`mspirality3`='$_POST[mspirality3]',
`mspirality4`='$_POST[mspirality4]',
`mspirality5`='$_POST[mspirality5]',
`mspirality6`='$_POST[mspirality6]',
`mss_linedry`='$_POST[mss_linedry]',
`mss_tumbledry`='$_POST[mss_tumbledry]',
`msns_note`='$_POST[msns_note]',
`mapperss_ch1`='$_POST[mapperss_ch1]',
`mapperss_ch2`='$_POST[mapperss_ch2]',
`mapperss_ch3`='$_POST[mapperss_ch3]',
`mapperss_ch4`='$_POST[mapperss_ch4]',
`mapperss_cc1`='$_POST[mapperss_cc1]',
`mapperss_cc2`='$_POST[mapperss_cc2]',
`mapperss_cc3`='$_POST[mapperss_cc3]',
`mapperss_cc4`='$_POST[mapperss_cc4]',
`mapperss_st`='$_POST[mapperss_st]',
`mapperss_pf1`='$_POST[mapperss_pf1]',
`mapperss_pf2`='$_POST[mapperss_pf2]',
`mapperss_pf3`='$_POST[mapperss_pf3]',
`mapperss_pf4`='$_POST[mapperss_pf4]',
`mapperss_pb1`='$_POST[mapperss_pb1]',
`mapperss_pb2`='$_POST[mapperss_pb2]',
`mapperss_pb3`='$_POST[mapperss_pb3]',
`mapperss_pb4`='$_POST[mapperss_pb4]',
`mapperss_sf1`='$_POST[mapperss_sf1]',
`mapperss_sf2`='$_POST[mapperss_sf2]',
`mapperss_sf3`='$_POST[mapperss_sf3]',
`mapperss_sf4`='$_POST[mapperss_sf4]',
`mapperss_sb1`='$_POST[mapperss_sb1]',
`mapperss_sb2`='$_POST[mapperss_sb2]',
`mapperss_sb3`='$_POST[mapperss_sb3]',
`mapperss_sb4`='$_POST[mapperss_sb4]',
`mapperss_note`='$_POST[mapperss_note]',
`mpm_f1`='$_POST[mpillingm_f1]',
`mpm_b1`='$_POST[mpillingm_b1]',
`mpm_f2`='$_POST[mpillingm_f2]',
`mpm_b2`='$_POST[mpillingm_b2]',
`mpm_f3`='$_POST[mpillingm_f3]',
`mpm_b3`='$_POST[mpillingm_b3]',
`mpm_f4`='$_POST[mpillingm_f4]',
`mpm_b4`='$_POST[mpillingm_b4]',
`mpm_f5`='$_POST[mpillingm_f5]',
`mpm_b5`='$_POST[mpillingm_b5]',
`mpillm_note`='$_POST[mpillm_note]',
`mpl_f1`='$_POST[mpillingl_f1]',
`mpl_b1`='$_POST[mpillingl_b1]',
`mpl_f2`='$_POST[mpillingl_f2]',
`mpl_b2`='$_POST[mpillingl_b2]',
`mpl_f3`='$_POST[mpillingl_f3]',
`mpl_b3`='$_POST[mpillingl_b3]',
`mpl_f4`='$_POST[mpillingl_f4]',
`mpl_b4`='$_POST[mpillingl_b4]',
`mpl_f5`='$_POST[mpillingl_f5]',
`mpl_b5`='$_POST[mpillingl_b5]',
`mpilll_note`='$_POST[mpilll_note]',
`mpb_f1`='$_POST[mpillingb_f1]',
`mpb_b1`='$_POST[mpillingb_b1]',
`mpb_f2`='$_POST[mpillingb_f2]',
`mpb_b2`='$_POST[mpillingb_b2]',
`mpb_f3`='$_POST[mpillingb_f3]',
`mpb_b3`='$_POST[mpillingb_b3]',
`mpb_f4`='$_POST[mpillingb_f4]',
`mpb_b4`='$_POST[mpillingb_b4]',
`mpb_f5`='$_POST[mpillingb_f5]',
`mpb_b5`='$_POST[mpillingb_b5]',
`mpillb_note`='$_POST[mpillb_note]',
`mprt_f1`='$_POST[mpillingrt_f1]',
`mprt_b1`='$_POST[mpillingrt_b1]',
`mprt_f2`='$_POST[mpillingrt_f2]',
`mprt_b2`='$_POST[mpillingrt_b2]',
`mprt_f3`='$_POST[mpillingrt_f3]',
`mprt_b3`='$_POST[mpillingrt_b3]',
`mprt_f4`='$_POST[mpillingrt_f4]',
`mprt_b4`='$_POST[mpillingrt_b4]',
`mprt_f5`='$_POST[mpillingrt_f5]',
`mprt_b5`='$_POST[mpillingrt_b5]',
`mpillr_note`='$_POST[mpillr_note]',
`mabration`='$_POST[mabr]',
`mabr_note`='$_POST[mabr_note]',
`msm_l1`='$_POST[msnaggingm_l1]',
`msm_w1`='$_POST[msnaggingm_w1]',
`msm_l2`='$_POST[msnaggingm_l2]',
`msm_w2`='$_POST[msnaggingm_w2]',
`msm_l3`='$_POST[msnaggingm_l3]',
`msm_w3`='$_POST[msnaggingm_w3]',
`msm_l4`='$_POST[msnaggingm_l4]',
`msm_w4`='$_POST[msnaggingm_w4]',
`msnam_note`='$_POST[msnam_note]',
`msp_grdl1` ='$_POST[msp_grdl1]',
`msp_clsl1` ='$_POST[msp_clsl1]',
`msp_shol1` ='$_POST[msp_shol1]',
`msp_medl1` ='$_POST[msp_medl1]',
`msp_lonl1` ='$_POST[msp_lonl1]',
`msp_grdw1` ='$_POST[msp_grdw1]',
`msp_clsw1` ='$_POST[msp_clsw1]',
`msp_show1` ='$_POST[msp_show1]',
`msp_medw1` ='$_POST[msp_medw1]',
`msp_lonw1` ='$_POST[msp_lonw1]',
`msp_grdl2` ='$_POST[msp_grdl2]',
`msp_clsl2` ='$_POST[msp_clsl2]',
`msp_shol2` ='$_POST[msp_shol2]',
`msp_medl2` ='$_POST[msp_medl2]',
`msp_lonl2` ='$_POST[msp_lonl2]',
`msp_grdw2` ='$_POST[msp_grdw2]',
`msp_clsw2` ='$_POST[msp_clsw2]',
`msp_show2` ='$_POST[msp_show2]',
`msp_medw2` ='$_POST[msp_medw2]',
`msp_lonw2` ='$_POST[msp_lonw2]',
`msnap_note`='$_POST[msnap_note]',
`msb_l1`='$_POST[msnaggingb_l1]',
`msb_w1`='$_POST[msnaggingb_w1]',
`msb_l2`='$_POST[msnaggingb_l2]',
`msb_w2`='$_POST[msnaggingb_w2]',
`msb_l3`='$_POST[msnaggingb_l3]',
`msb_w3`='$_POST[msnaggingb_w3]',
`msb_l4`='$_POST[msnaggingb_l4]',
`msb_w4`='$_POST[msnaggingb_w4]',
`msnab_note`='$_POST[msnab_note]',
`mbs_instron`='$_POST[minstron]',
`mbs_mullen`='$_POST[mmullen]',
`mbs_tru`='$_POST[mtru_burst]',
`mbs_tru2`='$_POST[mtru_burst2]',
`mburs_note`='$_POST[mburs_note]',
`mthick1`='$_POST[mthick1]',
`mthick2`='$_POST[mthick2]',
`mthick3`='$_POST[mthick3]',
`mthickav`='$_POST[mthickav]',
`mthick_note`='$_POST[mthick_note]',
`mstretch_l1`='$_POST[mstretch_l1]',
`mstretch_w1`='$_POST[mstretch_w1]',
`mstretch_l2`='$_POST[mstretch_l2]',
`mstretch_w2`='$_POST[mstretch_w2]',
`mstretch_l3`='$_POST[mstretch_l3]',
`mstretch_w3`='$_POST[mstretch_w3]',
`mstretch_l4`='$_POST[mstretch_l4]',
`mstretch_w4`='$_POST[mstretch_w4]',
`mstretch_l5`='$_POST[mstretch_l5]',
`mstretch_w5`='$_POST[mstretch_w5]',
`mload_stretch`='$_POST[mload_stretch]',
`mstretch_note`='$_POST[mstretch_note]',
`mrecover_l1`='$_POST[mrecover_l1]',
`mrecover_w1`='$_POST[mrecover_w1]',
`mrecover_l2`='$_POST[mrecover_l2]',
`mrecover_w2`='$_POST[mrecover_w2]',
`mrecover_l3`='$_POST[mrecover_l3]',
`mrecover_w3`='$_POST[mrecover_w3]',
`mrecover_l4`='$_POST[mrecover_l4]',
`mrecover_w4`='$_POST[mrecover_w4]',
`mrecover_l5`='$_POST[mrecover_l5]',
`mrecover_w5`='$_POST[mrecover_w5]',
`mrecover_l11`='$_POST[mrecover_l11]',
`mrecover_w11`='$_POST[mrecover_w11]',
`mrecover_l21`='$_POST[mrecover_l21]',
`mrecover_w21`='$_POST[mrecover_w21]',
`mrecover_l31`='$_POST[mrecover_l31]',
`mrecover_w31`='$_POST[mrecover_w31]',
`mrecover_l41`='$_POST[mrecover_l41]',
`mrecover_w41`='$_POST[mrecover_w41]',
`mrecover_l51`='$_POST[mrecover_l51]',
`mrecover_w51`='$_POST[mrecover_w51]',
`mrecover_note`='$_POST[mrecover_note]',
`mgrowth_l1`='$_POST[mgrowth_l1]',
`mgrowth_w1`='$_POST[mgrowth_w1]',
`mgrowth_l2`='$_POST[mgrowth_l2]',
`mgrowth_w2`='$_POST[mgrowth_w2]',
`mrec_growth_l1`='$_POST[mrec_growth_l1]',
`mrec_growth_w1`='$_POST[mrec_growth_w1]',
`mrec_growth_l2`='$_POST[mrec_growth_l2]',
`mrec_growth_w2`='$_POST[mrec_growth_w2]',
`mgrowth_note`='$_POST[mgrowth_note]',
`mapper_ch1`='$_POST[mapper_ch1]',
`mapper_ch2`='$_POST[mapper_ch2]',
`mapper_ch3`='$_POST[mapper_ch3]',
`mapper_cc1`='$_POST[mapper_cc1]',
`mapper_cc2`='$_POST[mapper_cc2]',
`mapper_cc3`='$_POST[mapper_cc3]',
`mapper_st`='$_POST[mapper_st]',
`mapper_st2`='$_POST[mapper_st2]',
`mapper_st3`='$_POST[mapper_st3]',
`mapper_pf1`='$_POST[mapper_pf1]',
`mapper_pf2`='$_POST[mapper_pf2]',
`mapper_pf3`='$_POST[mapper_pf3]',
`mapper_pb1`='$_POST[mapper_pb1]',
`mapper_pb2`='$_POST[mapper_pb2]',
`mapper_pb3`='$_POST[mapper_pb3]',
`mapper_acetate`='$_POST[mapper_acetate]',
`mapper_cotton`='$_POST[mapper_cotton]',
`mapper_nylon`='$_POST[mapper_nylon]',
`mapper_poly`='$_POST[mapper_poly]',
`mapper_acrylic`='$_POST[mapper_acrylic]',
`mapper_wool`='$_POST[mapper_wool]',
`mapper_note`='$_POST[mapper_note]',
`mfibre_transfer`='$_POST[mfibre_transfer]',
`mfibre_grade`='$_POST[mfibre_grade]',
`mfibre_note`='$_POST[mfibre_note]',
`modour`='$_POST[modour]',
`modour_note`='$_POST[modour_note]',
`tgl_update`=now()");

		echo "<script>swal({
		title: 'Data Physical Telah Tersimpan',
		text: 'Klik Ok untuk input data kembali',
		type: 'success',
		}).then((result) => {
		if (result.value) {

			window.location.href='TestingNewNoTes-$notes';
		}
		});</script>";
	}
} else if ($_POST['physical_save'] == "save") {
	$sqlPHY = mysqli_query($con, "INSERT INTO tbl_tq_test SET
		  `id_nokk`='$rcek[id]',
		  `flamability`='$_POST[flamability]',
		  `fla_note`='$_POST[fla_note]',
		  `fc_cott`='$_POST[fc_cott]',
		  `fc_poly`='$_POST[fc_poly]',
		  `fc_elastane`='$_POST[fc_ela]',
		  `fc_cott1`='$_POST[fc_cott1]',
		  `fc_poly1`='$_POST[fc_poly1]',
		  `fc_elastane1`='$_POST[fc_ela1]',
		  `std_fc_cott1`='$_POST[std_fc_cott1]',
		  `std_fc_poly1`='$_POST[std_fc_poly1]',
		  `std_fc_elastane1`='$_POST[std_fc_ela1]',
		  `fibercontent`='$_POST[fibercontent]',
		  `fiber_note`='$_POST[fiber_note]',
		  `fc_wpi`='$_POST[wpi]',
		  `fc_cpi`='$_POST[cpi]',
		  `fc_note`='$_POST[fc_note]',
		  `f_weight`='$_POST[fabric_weight]',
		  `fwe_note`='$_POST[fwe_note]',
		  `f_width`='$_POST[fabric_width]',
		  `fwi_note`='$_POST[fwi_note]',
		  `bow`='$_POST[bow]',
		  `skew`='$_POST[skew]',
		  `bas_note`='$_POST[bas_note]',
		  `h_shrinkage_temp`='$_POST[h_shrinkage_temp]',
		  `h_shrinkage_l1`='$_POST[h_shrinkage_l1]',
		  `h_shrinkage_w1`='$_POST[h_shrinkage_w1]',
		  `h_shrinkage_grd`='$_POST[h_shrinkage_grd]',
		  `h_shrinkage_app`='$_POST[h_shrinkage_app]',
		  `h_shrinkage_note`='$_POST[h_shrinkage_note]',
		  `ss_temp`='$_POST[ss_temp]',
		  `ss_washes3`='$_POST[ss_washes3]',
		  `ss_washes10`='$_POST[ss_washes10]',
		  `ss_washes15`='$_POST[ss_washes15]',
		  `ss_cmt`='$_POST[ss_cmt]',
		  `shrinkage_l1`='$_POST[shrinkage_len1]',
		  `shrinkage_l2`='$_POST[shrinkage_len2]',
		  `shrinkage_l3`='$_POST[shrinkage_len3]',
		  `shrinkage_l4`='$_POST[shrinkage_len4]',
		  `shrinkage_l5`='$_POST[shrinkage_len5]',
		  `shrinkage_l6`='$_POST[shrinkage_len6]',
		  `shrinkage_w1`='$_POST[shrinkage_wid1]',
		  `shrinkage_w2`='$_POST[shrinkage_wid2]',
		  `shrinkage_w3`='$_POST[shrinkage_wid3]',
		  `shrinkage_w4`='$_POST[shrinkage_wid4]',
		  `shrinkage_w5`='$_POST[shrinkage_wid5]',
		  `shrinkage_w6`='$_POST[shrinkage_wid6]',
		  `spirality1`='$_POST[spirality1]',
		  `spirality2`='$_POST[spirality2]',
		  `spirality3`='$_POST[spirality3]',
		  `spirality4`='$_POST[spirality4]',
		  `spirality5`='$_POST[spirality5]',
		  `spirality6`='$_POST[spirality6]',
		  `ss_linedry`='$_POST[ss_linedry]',
		  `ss_tumbledry`='$_POST[ss_tumbledry]',
		  `sns_note`='$_POST[sns_note]',
		  `apperss_ch1`='$_POST[apperss_ch1]',
		  `apperss_ch2`='$_POST[apperss_ch2]',
		  `apperss_ch3`='$_POST[apperss_ch3]',
		  `apperss_ch4`='$_POST[apperss_ch4]',
		  `apperss_cc1`='$_POST[apperss_cc1]',
		  `apperss_cc2`='$_POST[apperss_cc2]',
		  `apperss_cc3`='$_POST[apperss_cc3]',
		  `apperss_cc4`='$_POST[apperss_cc4]',
		  `apperss_st`='$_POST[apperss_st]',
		  `apperss_pf1`='$_POST[apperss_pf1]',
		  `apperss_pf2`='$_POST[apperss_pf2]',
		  `apperss_pf3`='$_POST[apperss_pf3]',
		  `apperss_pf4`='$_POST[apperss_pf4]',
		  `apperss_pb1`='$_POST[apperss_pb1]',
		  `apperss_pb2`='$_POST[apperss_pb2]',
		  `apperss_pb3`='$_POST[apperss_pb3]',
		  `apperss_pb4`='$_POST[apperss_pb4]',
		  `apperss_sf1`='$_POST[apperss_sf1]',
		  `apperss_sf2`='$_POST[apperss_sf2]',
		  `apperss_sf3`='$_POST[apperss_sf3]',
		  `apperss_sf4`='$_POST[apperss_sf4]',
		  `apperss_sb1`='$_POST[apperss_sb1]',
		  `apperss_sb2`='$_POST[apperss_sb2]',
		  `apperss_sb3`='$_POST[apperss_sb3]',
		  `apperss_sb4`='$_POST[apperss_sb4]',
	 	  `apperss_note`='$_POST[apperss_note]',
		  `pm_f1`='$_POST[pillingm_f1]',
		  `pm_b1`='$_POST[pillingm_b1]',
		  `pm_f2`='$_POST[pillingm_f2]',
		  `pm_b2`='$_POST[pillingm_b2]',
		  `pm_f3`='$_POST[pillingm_f3]',
		  `pm_b3`='$_POST[pillingm_b3]',
		  `pm_f4`='$_POST[pillingm_f4]',
		  `pm_b4`='$_POST[pillingm_b4]',
		  `pm_f5`='$_POST[pillingm_f5]',
		  `pm_b5`='$_POST[pillingm_b5]',
		  `pillm_note`='$_POST[pillm_note]',
		  `pl_f1`='$_POST[pillingl_f1]',
		  `pl_b1`='$_POST[pillingl_b1]',
		  `pl_f2`='$_POST[pillingl_f2]',
		  `pl_b2`='$_POST[pillingl_b2]',
		  `pl_f3`='$_POST[pillingl_f3]',
		  `pl_b3`='$_POST[pillingl_b3]',
		  `pl_f4`='$_POST[pillingl_f4]',
		  `pl_b4`='$_POST[pillingl_b4]',
		  `pl_f5`='$_POST[pillingl_f5]',
		  `pl_b5`='$_POST[pillingl_b5]',
		  `pilll_note`='$_POST[pilll_note]',
		  `pb_f1`='$_POST[pillingb_f1]',
		  `pb_b1`='$_POST[pillingb_b1]',
		  `pb_f2`='$_POST[pillingb_f2]',
		  `pb_b2`='$_POST[pillingb_b2]',
		  `pb_f3`='$_POST[pillingb_f3]',
		  `pb_b3`='$_POST[pillingb_b3]',
		  `pb_f4`='$_POST[pillingb_f4]',
		  `pb_b4`='$_POST[pillingb_b4]',
		  `pb_f5`='$_POST[pillingb_f5]',
		  `pb_b5`='$_POST[pillingb_b5]',
		  `pillb_note`='$_POST[pillb_note]',
		  `prt_f1`='$_POST[pillingrt_f1]',
		  `prt_b1`='$_POST[pillingrt_b1]',
		  `prt_f2`='$_POST[pillingrt_f2]',
		  `prt_b2`='$_POST[pillingrt_b2]',
		  `prt_f3`='$_POST[pillingrt_f3]',
		  `prt_b3`='$_POST[pillingrt_b3]',
		  `prt_f4`='$_POST[pillingrt_f4]',
		  `prt_b4`='$_POST[pillingrt_b4]',
		  `prt_f5`='$_POST[pillingrt_f5]',
		  `prt_b5`='$_POST[pillingrt_b5]',
		  `pillr_note`='$_POST[pillr_note]',
		  `abration`='$_POST[abr]',
		  `abr_note`='$_POST[abr_note]',
		  `sm_l1`='$_POST[snaggingm_l1]',
		  `sm_w1`='$_POST[snaggingm_w1]',
		  `sm_l2`='$_POST[snaggingm_l2]',
		  `sm_w2`='$_POST[snaggingm_w2]',
		  `sm_l3`='$_POST[snaggingm_l3]',
		  `sm_w3`='$_POST[snaggingm_w3]',
		  `sm_l4`='$_POST[snaggingm_l4]',
		  `sm_w4`='$_POST[snaggingm_w4]',
		  `snam_note`='$_POST[snam_note]',
		  `sp_grdl1` ='$_POST[sp_grdl1]',
		  `sp_clsl1` ='$_POST[sp_clsl1]',
		  `sp_shol1` ='$_POST[sp_shol1]',
		  `sp_medl1` ='$_POST[sp_medl1]',
		  `sp_lonl1` ='$_POST[sp_lonl1]',
		  `sp_grdw1` ='$_POST[sp_grdw1]',
		  `sp_clsw1` ='$_POST[sp_clsw1]',
		  `sp_show1` ='$_POST[sp_show1]',
		  `sp_medw1` ='$_POST[sp_medw1]',
		  `sp_lonw1` ='$_POST[sp_lonw1]',
		  `sp_grdl2` ='$_POST[sp_grdl2]',
		  `sp_clsl2` ='$_POST[sp_clsl2]',
		  `sp_shol2` ='$_POST[sp_shol2]',
		  `sp_medl2` ='$_POST[sp_medl2]',
		  `sp_lonl2` ='$_POST[sp_lonl2]',
		  `sp_grdw2` ='$_POST[sp_grdw2]',
		  `sp_clsw2` ='$_POST[sp_clsw2]',
		  `sp_show2` ='$_POST[sp_show2]',
		  `sp_medw2` ='$_POST[sp_medw2]',
		  `sp_lonw2` ='$_POST[sp_lonw2]',
		  `snap_note`='$_POST[snap_note]',
		  `sb_l1`='$_POST[snaggingb_l1]',
		  `sb_w1`='$_POST[snaggingb_w1]',
		  `sb_l2`='$_POST[snaggingb_l2]',
		  `sb_w2`='$_POST[snaggingb_w2]',
		  `sb_l3`='$_POST[snaggingb_l3]',
		  `sb_w3`='$_POST[snaggingb_w3]',
		  `sb_l4`='$_POST[snaggingb_l4]',
		  `sb_w4`='$_POST[snaggingb_w4]',
		  `snab_note`='$_POST[snab_note]',
		  `bs_instron`='$_POST[instron]',
		  `bs_mullen`='$_POST[mullen]',
		  `bs_tru`='$_POST[tru_burst]',
		  `bs_tru2`='$_POST[tru_burst2]',
		  `burs_note`='$_POST[burs_note]',
		  `thick1`='$_POST[thick1]',
		  `thick2`='$_POST[thick2]',
		  `thick3`='$_POST[thick3]',
		  `thickav`='$_POST[thickav]',
		  `thick_note`='$_POST[thick_note]',
		  `stretch_l1`='$_POST[stretch_l1]',
		  `stretch_w1`='$_POST[stretch_w1]',
		  `stretch_l2`='$_POST[stretch_l2]',
		  `stretch_w2`='$_POST[stretch_w2]',
		  `stretch_l3`='$_POST[stretch_l3]',
		  `stretch_w3`='$_POST[stretch_w3]',
		  `stretch_l4`='$_POST[stretch_l4]',
		  `stretch_w4`='$_POST[stretch_w4]',
		  `stretch_l5`='$_POST[stretch_l5]',
		  `stretch_w5`='$_POST[stretch_w5]',
		  `load_stretch`='$_POST[load_stretch]',
		  `stretch_note`='$_POST[stretch_note]',
		  `recover_l1`='$_POST[recover_l1]',
		  `recover_w1`='$_POST[recover_w1]',
		  `recover_l2`='$_POST[recover_l2]',
		  `recover_w2`='$_POST[recover_w2]',
		  `recover_l3`='$_POST[recover_l3]',
		  `recover_w3`='$_POST[recover_w3]',
		  `recover_l4`='$_POST[recover_l4]',
		  `recover_w4`='$_POST[recover_w4]',
		  `recover_l5`='$_POST[recover_l5]',
		  `recover_w5`='$_POST[recover_w5]',
		  `recover_l11`='$_POST[recover_l11]',
		  `recover_w11`='$_POST[recover_w11]',
		  `recover_l21`='$_POST[recover_l21]',
		  `recover_w21`='$_POST[recover_w21]',
		  `recover_l31`='$_POST[recover_l31]',
		  `recover_w31`='$_POST[recover_w31]',
		  `recover_l41`='$_POST[recover_l41]',
		  `recover_w41`='$_POST[recover_w41]',
		  `recover_l51`='$_POST[recover_l51]',
		  `recover_w51`='$_POST[recover_w51]',
		  `recover_note`='$_POST[recover_note]',
		  `growth_l1`='$_POST[growth_l1]',
		  `growth_w1`='$_POST[growth_w1]',
		  `growth_l2`='$_POST[growth_l2]',
		  `growth_w2`='$_POST[growth_w2]',
		  `rec_growth_l1`='$_POST[rec_growth_l1]',
		  `rec_growth_w1`='$_POST[rec_growth_w1]',
		  `rec_growth_l2`='$_POST[rec_growth_l2]',
		  `rec_growth_w2`='$_POST[rec_growth_w2]',
		  `growth_note`='$_POST[growth_note]',
		  `apper_ch1`='$_POST[apper_ch1]',
		  `apper_ch2`='$_POST[apper_ch2]',
		  `apper_ch3`='$_POST[apper_ch3]',
		  `apper_cc1`='$_POST[apper_cc1]',
		  `apper_cc2`='$_POST[apper_cc2]',
		  `apper_cc3`='$_POST[apper_cc3]',
		  `apper_st`='$_POST[apper_st]',
		  `apper_st2`='$_POST[apper_st2]',
		  `apper_st3`='$_POST[apper_st3]',
		  `apper_pf1`='$_POST[apper_pf1]',
		  `apper_pf2`='$_POST[apper_pf2]',
		  `apper_pf3`='$_POST[apper_pf3]',
		  `apper_pb1`='$_POST[apper_pb1]',
		  `apper_pb2`='$_POST[apper_pb2]',
		  `apper_pb3`='$_POST[apper_pb3]',
		  `apper_acetate`='$_POST[apper_acetate]',
		  `apper_cotton`='$_POST[apper_cotton]',
		  `apper_nylon`='$_POST[apper_nylon]',
		  `apper_poly`='$_POST[apper_poly]',
		  `apper_acrylic`='$_POST[apper_acrylic]',
		  `apper_wool`='$_POST[apper_wool]',
	 	  `apper_note`='$_POST[apper_note]',
		  `fibre_transfer`='$_POST[fibre_transfer]',
		  `fibre_grade`='$_POST[fibre_grade]',
	 	  `fibre_note`='$_POST[fibre_note]',
		   `odour`='$_POST[odour]',
		  `odour_note`='$_POST[odour_note]',
		  `curling`='$_POST[curling]',
		  `curling_note`='$_POST[curling_note]',
		  `nedle`='$_POST[nedle]',
		  `nedle_note`='$_POST[nedle_note]',
		  `stat_fla`='$_POST[stat_fla]',
		  `stat_fib`='$_POST[stat_fib]',
		  `stat_fc`='$_POST[stat_fc]',
		  `stat_fwss`='$_POST[stat_fwss]',
		  `stat_fwss2`='$_POST[stat_fwss2]',
		  `stat_fwss3`='$_POST[stat_fwss3]',
		  `stat_bsk`='$_POST[stat_bsk]',
		  `stat_pm`='$_POST[stat_pm]',
		  `stat_pl`='$_POST[stat_pl]',
		  `stat_pb`='$_POST[stat_pb]',
		  `stat_prt`='$_POST[stat_prt]',
		  `stat_abr`='$_POST[stat_abr]',
		  `stat_sm`='$_POST[stat_sm]',
		  `stat_sp`='$_POST[stat_sp]',
		  `stat_sb`='$_POST[stat_sb]',
		  `stat_bs`='$_POST[stat_bs]',
		  `stat_bs2`='$_POST[stat_bs2]',
		  `stat_bs3`='$_POST[stat_bs3]',
		  `stat_th`='$_POST[stat_th]',
		  `stat_sr`='$_POST[stat_sr]',
		  `stat_gr`='$_POST[stat_gr]',
		  `stat_ap`='$_POST[stat_ap]',
		  `stat_hs`='$_POST[stat_hs]',
		  `stat_ff`='$_POST[stat_ff]',
		  `stat_odour`='$_POST[stat_odour]',
		  `stat_curling`='$_POST[stat_curling]',
		  `stat_nedle`='$_POST[stat_nedle]',
		  `wick_l1`='$_POST[wick_l1]',
		  `wick_w1`='$_POST[wick_w1]',
		  `wick_l2`='$_POST[wick_l2]',
		  `wick_w2`='$_POST[wick_w2]',
		  `wick_l3`='$_POST[wick_l3]',
		  `wick_w3`='$_POST[wick_w3]',
		  `wick_note`='$_POST[wick_note]',
		  `absor_f1`='$_POST[absor_f1]',
		  `absor_f2`='$_POST[absor_f2]',
		  `absor_f3`='$_POST[absor_f3]',
		  `absor_b1`='$_POST[absor_b1]',
		  `absor_b2`='$_POST[absor_b2]',
		  `absor_b3`='$_POST[absor_b3]',
		  `absor_note`='$_POST[absor_note]',
		  `dry1`='$_POST[dry1]',
		  `dry2`='$_POST[dry2]',
		  `dry3`='$_POST[dry3]',
		  `dry_note`='$_POST[dry_note]',
		  `repp1`='$_POST[repp1]',
		  `repp2`='$_POST[repp3]',
		  `repp3`='$_POST[repp3]',
		  `repp4`='$_POST[repp4]',
		  `repp_note`='$_POST[repp_note]',
		  `ph`='$_POST[ph]',
		  `ph_note`='$_POST[ph_note]',
		  `soil` = '$_POST[soil]',
		  `soil_note` = '$_POST[soil_note]',
		  `tgl_buat`=now(),
		  `tgl_update`=now()");
	if ($sqlPHY) {
		echo "<script>swal({
title: 'Data Physical Telah Tersimpan',
text: 'Klik Ok untuk input data kembali',
type: 'success',
}).then((result) => {
if (result.value) {

	window.location.href='TestingNewNoTes-$notes';
}
});</script>";
	} else {
		echo "<script>swal({
title: 'Data Physical Gagal Tersimpan',
text: 'Klik Ok untuk input data kembali',
type: 'error',
}).then((result) => {
if (result.value) {

	window.location.href='TestingNewNoTes-$notes';
}
});</script>";
	}

}

$sco_original = $_POST['sco_acid_original1'] . '/' . $_POST['sco_acid_original2'] . '/' . $_POST['sco_acid_original3'];
$sca_acid = $_POST['sca_acid_original1'] . '/' . $_POST['sca_acid_original2'] . '/' . $_POST['sca_acid_original3'];
$sco_alkaline_afterwash = $_POST['sco_alkaline_afterwash1'] . '/' . $_POST['sco_alkaline_afterwash2'] . '/' . $_POST['sco_alkaline_afterwash3'];
$sca_alkaline_afterwash = $_POST['sca_alkaline_afterwash1'] . '/' . $_POST['sca_alkaline_afterwash2'] . '/' . $_POST['sca_alkaline_afterwash3'];

if ($_POST['colorfastness_save'] == "save" and $cek1 > 0) {
	$sqlCLR = mysqli_query($con, "UPDATE tbl_tq_test SET
	`wash_temp`='$_POST[wash_temp]',
	`wash_colorchange`='$_POST[wash_colorchange]',
	`wash_acetate`='$_POST[wash_acetate]',
	`wash_cotton`='$_POST[wash_cotton]',
	`wash_nylon`='$_POST[wash_nylon]',
	`wash_poly`='$_POST[wash_poly]',
	`wash_acrylic`='$_POST[wash_acrylic]',
	`wash_wool`='$_POST[wash_wool]',
	`wash_staining`='$_POST[wash_staining]',
	`wash_note`='$_POST[wash_note]',
	`water_colorchange`='$_POST[water_colorchange]',
	`water_acetate`='$_POST[water_acetate]',
	`water_cotton`='$_POST[water_cotton]',
	`water_nylon`='$_POST[water_nylon]',
	`water_poly`='$_POST[water_poly]',
	`water_acrylic`='$_POST[water_acrylic]',
	`water_wool`='$_POST[water_wool]',
	`water_staining`='$_POST[water_staining]',
	`water_note`='$_POST[water_note]',
	`acid_colorchange`='$_POST[acid_colorchange]',
	`acid_acetate`='$_POST[acid_acetate]',
	`acid_cotton`='$_POST[acid_cotton]',
	`acid_nylon`='$_POST[acid_nylon]',
	`acid_poly`='$_POST[acid_poly]',
	`acid_acrylic`='$_POST[acid_acrylic]',
	`acid_wool`='$_POST[acid_wool]',
	`acid_staining`='$_POST[acid_staining]',
	`acid_note`='$_POST[acid_note]',
	`alkaline_colorchange`='$_POST[alkaline_colorchange]',
	`alkaline_acetate`='$_POST[alkaline_acetate]',
	`alkaline_cotton`='$_POST[alkaline_cotton]',
	`alkaline_nylon`='$_POST[alkaline_nylon]',
	`alkaline_poly`='$_POST[alkaline_poly]',
	`alkaline_acrylic`='$_POST[alkaline_acrylic]',
	`alkaline_wool`='$_POST[alkaline_wool]',
	`alkaline_staining`='$_POST[alkaline_staining]',
	`alkaline_note`='$_POST[alkaline_note]',
	`crock_len1`='$_POST[crock_len1]',
	`crock_wid1`='$_POST[crock_wid1]',
	`crock_len2`='$_POST[crock_len2]',
	`crock_wid2`='$_POST[crock_wid2]',
	`crock_note`='$_POST[crock_note]',
	`phenolic_colorchange`='$_POST[phenolic_colorchange]',
	`phenolic_note`='$_POST[phenolic_note]',
	`cm_printing_colorchange`='$_POST[cm_printing_colorchange]',
	`cm_printing_staining`='$_POST[cm_printing_staining]',
	`cm_printing_note`='$_POST[cm_printing_note]',
	`cm_dye_temp`='$_POST[cm_dye_temp]',
	`cm_dye_colorchange`='$_POST[cm_dye_colorchange]',
	`cm_dye_stainingface`='$_POST[cm_dye_stainingface]',
	`cm_dye_stainingback`='$_POST[cm_dye_stainingback]',
	`cm_dye_note`='$_POST[cm_dye_note]',
	`light_rating1`='$_POST[light_rating1]',
	`light_rating2`='$_POST[light_rating2]',
	`light_note`='$_POST[light_note]',
	`light_pers_colorchange`='$_POST[light_pers_colorchange]',
	`light_pers_note`='$_POST[light_pers_note]',
	`saliva_staining`='$_POST[saliva_staining]',
	`saliva_note`='$_POST[saliva_note]',
	`bleeding`='$_POST[bleeding]',
	`bleeding_note`='$_POST[bleeding_note]',
	`chlorin`='$_POST[chlorin]',
	`nchlorin1`='$_POST[nchlorin1]',
	`nchlorin2`='$_POST[nchlorin2]',
	`chlorin_note`='$_POST[chlorin_note]',
	`dye_tf_sstaining`='$_POST[dye_tf_sstaining]',
	`dye_tf_cstaining`='$_POST[dye_tf_cstaining]',
	`dye_tf_acetate`='$_POST[dye_tf_acetate]',
	`dye_tf_cotton`='$_POST[dye_tf_cotton]',
	`dye_tf_nylon`='$_POST[dye_tf_nylon]',
	`dye_tf_poly`='$_POST[dye_tf_poly]',
	`dye_tf_acrylic`='$_POST[dye_tf_acrylic]',
	`dye_tf_wool`='$_POST[dye_tf_wool]',
	`dye_tf_note`='$_POST[dye_tf_note]',
	`stat_wf`='$_POST[stat_wf]',
	`stat_wtr`='$_POST[stat_wtr]',
	`stat_pac`='$_POST[stat_pac]',
	`stat_pal`='$_POST[stat_pal]',
	`stat_cr`='$_POST[stat_cr]',
	`stat_py`='$_POST[stat_py]',
	`stat_cmo`='$_POST[stat_cmo]',
	`stat_cm`='$_POST[stat_cm]',
	`stat_lg`='$_POST[stat_lg]',
	`stat_lp`='$_POST[stat_lp]',
	`stat_slv`='$_POST[stat_slv]',
	`stat_bld`='$_POST[stat_bld]',
	`stat_chl`='$_POST[stat_chl]',
	`stat_nchl`='$_POST[stat_nchl]',
	`stat_dye`='$_POST[stat_dye]',
	`tgl_update`=now(),
	`sco_acid_original`= '$sco_original',
	`sco_acid_status`= '$_POST[sco_acid_status]',
	`sca_acid_original`= '$sca_acid',
	`sca_acid_status`= '$_POST[sca_acid_status]',
	`sco_alkaline_afterwash` = '$sco_alkaline_afterwash',
	`sco_alkaline_status` = '$_POST[sco_alkaline_status]',
	`sca_alkaline_afterwash` = '$sca_alkaline_afterwash',
	`sca_alkaline_status` = '$_POST[sca_alkaline_status]',
	`sc_note` =  '$_POST[sc_note]'
	WHERE `id_nokk`='$rcek[id]'
	");
	if ($sqlCLR) {
		$sqlCLRD = mysqli_query($con, "UPDATE tbl_tq_disptest SET
	`dwash_temp`='$_POST[dwash_temp]',
	`dwash_colorchange`='$_POST[dwash_colorchange]',
	`dwash_acetate`='$_POST[dwash_acetate]',
	`dwash_cotton`='$_POST[dwash_cotton]',
	`dwash_nylon`='$_POST[dwash_nylon]',
	`dwash_poly`='$_POST[dwash_poly]',
	`dwash_acrylic`='$_POST[dwash_acrylic]',
	`dwash_wool`='$_POST[dwash_wool]',
	`dwash_staining`='$_POST[dwash_staining]',
	`dwash_note`='$_POST[dwash_note]',
	`dwater_colorchange`='$_POST[dwater_colorchange]',
	`dwater_acetate`='$_POST[dwater_acetate]',
	`dwater_cotton`='$_POST[dwater_cotton]',
	`dwater_nylon`='$_POST[dwater_nylon]',
	`dwater_poly`='$_POST[dwater_poly]',
	`dwater_acrylic`='$_POST[dwater_acrylic]',
	`dwater_wool`='$_POST[dwater_wool]',
	`dwater_staining`='$_POST[dwater_staining]',
	`dwater_note`='$_POST[dwater_note]',
	`dacid_colorchange`='$_POST[dacid_colorchange]',
	`dacid_acetate`='$_POST[dacid_acetate]',
	`dacid_cotton`='$_POST[dacid_cotton]',
	`dacid_nylon`='$_POST[dacid_nylon]',
	`dacid_poly`='$_POST[dacid_poly]',
	`dacid_acrylic`='$_POST[dacid_acrylic]',
	`dacid_wool`='$_POST[dacid_wool]',
	`dacid_staining`='$_POST[dacid_staining]',
	`dacid_note`='$_POST[dacid_note]',
	`dalkaline_colorchange`='$_POST[dalkaline_colorchange]',
	`dalkaline_acetate`='$_POST[dalkaline_acetate]',
	`dalkaline_cotton`='$_POST[dalkaline_cotton]',
	`dalkaline_nylon`='$_POST[dalkaline_nylon]',
	`dalkaline_poly`='$_POST[dalkaline_poly]',
	`dalkaline_acrylic`='$_POST[dalkaline_acrylic]',
	`dalkaline_wool`='$_POST[dalkaline_wool]',
	`dalkaline_staining`='$_POST[dalkaline_staining]',
	`dalkaline_note`='$_POST[dalkaline_note]',
	`dcrock_len1`='$_POST[dcrock_len1]',
	`dcrock_wid1`='$_POST[dcrock_wid1]',
	`dcrock_len2`='$_POST[dcrock_len2]',
	`dcrock_wid2`='$_POST[dcrock_wid2]',
	`dcrock_note`='$_POST[dcrock_note]',
	`dphenolic_colorchange`='$_POST[dphenolic_colorchange]',
	`dphenolic_note`='$_POST[dphenolic_note]',
	`dcm_printing_colorchange`='$_POST[dcm_printing_colorchange]',
	`dcm_printing_staining`='$_POST[dcm_printing_staining]',
	`dcm_printing_note`='$_POST[dcm_printing_note]',
	`dcm_dye_temp`='$_POST[dcm_dye_temp]',
	`dcm_dye_colorchange`='$_POST[dcm_dye_colorchange]',
	`dcm_dye_stainingface`='$_POST[dcm_dye_stainingface]',
	`dcm_dye_stainingback`='$_POST[dcm_dye_stainingback]',
	`dcm_dye_note`='$_POST[dcm_dye_note]',
	`dlight_rating1`='$_POST[dlight_rating1]',
	`dlight_rating2`='$_POST[dlight_rating2]',
	`dlight_note`='$_POST[dlight_note]',
	`dlight_pers_colorchange`='$_POST[dlight_pers_colorchange]',
	`dlight_pers_note`='$_POST[dlight_pers_note]',
	`dsaliva_staining`='$_POST[dsaliva_staining]',
	`dsaliva_note`='$_POST[dsaliva_note]',
	`dbleeding`='$_POST[dbleeding]',
	`dbleeding_note`='$_POST[dbleeding_note]',
	`dchlorin`='$_POST[dchlorin]',
	`dnchlorin1`='$_POST[dnchlorin1]',
	`dnchlorin2`='$_POST[dnchlorin2]',
	`dchlorin_note`='$_POST[dchlorin_note]',
	`ddye_tf_sstaining`='$_POST[ddye_tf_sstaining]',
	`ddye_tf_cstaining`='$_POST[ddye_tf_cstaining]',
	`ddye_tf_acetate`='$_POST[ddye_tf_acetate]',
	`ddye_tf_cotton`='$_POST[ddye_tf_cotton]',
	`ddye_tf_nylon`='$_POST[ddye_tf_nylon]',
	`ddye_tf_poly`='$_POST[ddye_tf_poly]',
	`ddye_tf_acrylic`='$_POST[ddye_tf_acrylic]',
	`ddye_tf_wool`='$_POST[ddye_tf_wool]',
	`ddye_tf_note`='$_POST[ddye_tf_note]',
	`tgl_update`=now()
	WHERE `id_nokk`='$rcek[id]'
	");

		$sqlCLRDI = mysqli_query($con, "INSERT INTO tbl_tq_disptest SET
`id_nokk`='$rcek[id]',
`dwash_temp`='$_POST[dwash_temp]',
`dwash_colorchange`='$_POST[dwash_colorchange]',
`dwash_acetate`='$_POST[dwash_acetate]',
`dwash_cotton`='$_POST[dwash_cotton]',
`dwash_nylon`='$_POST[dwash_nylon]',
`dwash_poly`='$_POST[dwash_poly]',
`dwash_acrylic`='$_POST[dwash_acrylic]',
`dwash_wool`='$_POST[dwash_wool]',
`dwash_staining`='$_POST[dwash_staining]',
`dwash_note`='$_POST[dwash_note]',
`dwater_colorchange`='$_POST[dwater_colorchange]',
`dwater_acetate`='$_POST[dwater_acetate]',
`dwater_cotton`='$_POST[dwater_cotton]',
`dwater_nylon`='$_POST[dwater_nylon]',
`dwater_poly`='$_POST[dwater_poly]',
`dwater_acrylic`='$_POST[dwater_acrylic]',
`dwater_wool`='$_POST[dwater_wool]',
`dwater_staining`='$_POST[dwater_staining]',
`dwater_note`='$_POST[dwater_note]',
`dacid_colorchange`='$_POST[dacid_colorchange]',
`dacid_acetate`='$_POST[dacid_acetate]',
`dacid_cotton`='$_POST[dacid_cotton]',
`dacid_nylon`='$_POST[dacid_nylon]',
`dacid_poly`='$_POST[dacid_poly]',
`dacid_acrylic`='$_POST[dacid_acrylic]',
`dacid_wool`='$_POST[dacid_wool]',
`dacid_staining`='$_POST[dacid_staining]',
`dacid_note`='$_POST[dacid_note]',
`dalkaline_colorchange`='$_POST[dalkaline_colorchange]',
`dalkaline_acetate`='$_POST[dalkaline_acetate]',
`dalkaline_cotton`='$_POST[dalkaline_cotton]',
`dalkaline_nylon`='$_POST[dalkaline_nylon]',
`dalkaline_poly`='$_POST[dalkaline_poly]',
`dalkaline_acrylic`='$_POST[dalkaline_acrylic]',
`dalkaline_wool`='$_POST[dalkaline_wool]',
`dalkaline_staining`='$_POST[dalkaline_staining]',
`dalkaline_note`='$_POST[dalkaline_note]',
`dcrock_len1`='$_POST[dcrock_len1]',
`dcrock_wid1`='$_POST[dcrock_wid1]',
`dcrock_len2`='$_POST[dcrock_len2]',
`dcrock_wid2`='$_POST[dcrock_wid2]',
`dcrock_note`='$_POST[dcrock_note]',
`dphenolic_colorchange`='$_POST[dphenolic_colorchange]',
`dphenolic_note`='$_POST[dphenolic_note]',
`dcm_printing_colorchange`='$_POST[dcm_printing_colorchange]',
`dcm_printing_staining`='$_POST[dcm_printing_staining]',
`dcm_printing_note`='$_POST[dcm_printing_note]',
`dcm_dye_temp`='$_POST[dcm_dye_temp]',
`dcm_dye_colorchange`='$_POST[dcm_dye_colorchange]',
`dcm_dye_stainingface`='$_POST[dcm_dye_stainingface]',
`dcm_dye_stainingback`='$_POST[dcm_dye_stainingback]',
`dcm_dye_note`='$_POST[dcm_dye_note]',
`dlight_rating1`='$_POST[dlight_rating1]',
`dlight_rating2`='$_POST[dlight_rating2]',
`dlight_note`='$_POST[dlight_note]',
`dlight_pers_colorchange`='$_POST[dlight_pers_colorchange]',
`dlight_pers_note`='$_POST[dlight_pers_note]',
`dsaliva_staining`='$_POST[dsaliva_staining]',
`dsaliva_note`='$_POST[dsaliva_note]',
`dbleeding`='$_POST[dbleeding]',
`dbleeding_note`='$_POST[dbleeding_note]',
`dchlorin`='$_POST[dchlorin]',
`dnchlorin1`='$_POST[dnchlorin1]',
`dnchlorin2`='$_POST[dnchlorin2]',
`dchlorin_note`='$_POST[dchlorin_note]',
`ddye_tf_sstaining`='$_POST[ddye_tf_sstaining]',
`ddye_tf_cstaining`='$_POST[ddye_tf_cstaining]',
`ddye_tf_acetate`='$_POST[ddye_tf_acetate]',
`ddye_tf_cotton`='$_POST[ddye_tf_cotton]',
`ddye_tf_nylon`='$_POST[ddye_tf_nylon]',
`ddye_tf_poly`='$_POST[ddye_tf_poly]',
`ddye_tf_acrylic`='$_POST[ddye_tf_acrylic]',
`ddye_tf_wool`='$_POST[ddye_tf_wool]',
`ddye_tf_note`='$_POST[ddye_tf_note]',
`tgl_buat`=now(),
`tgl_update`=now()
");

		$sqlCLRM = mysqli_query($con, "UPDATE tbl_tq_marginal SET
	`mwash_temp`='$_POST[mwash_temp]',
	`mwash_colorchange`='$_POST[mwash_colorchange]',
	`mwash_acetate`='$_POST[mwash_acetate]',
	`mwash_cotton`='$_POST[mwash_cotton]',
	`mwash_nylon`='$_POST[mwash_nylon]',
	`mwash_poly`='$_POST[mwash_poly]',
	`mwash_acrylic`='$_POST[mwash_acrylic]',
	`mwash_wool`='$_POST[mwash_wool]',
	`mwash_staining`='$_POST[mwash_staining]',
	`mwash_note`='$_POST[mwash_note]',
	`mwater_colorchange`='$_POST[mwater_colorchange]',
	`mwater_acetate`='$_POST[mwater_acetate]',
	`mwater_cotton`='$_POST[mwater_cotton]',
	`mwater_nylon`='$_POST[mwater_nylon]',
	`mwater_poly`='$_POST[mwater_poly]',
	`mwater_acrylic`='$_POST[mwater_acrylic]',
	`mwater_wool`='$_POST[mwater_wool]',
	`mwater_staining`='$_POST[mwater_staining]',
	`mwater_note`='$_POST[mwater_note]',
	`macid_colorchange`='$_POST[macid_colorchange]',
	`macid_acetate`='$_POST[macid_acetate]',
	`macid_cotton`='$_POST[macid_cotton]',
	`macid_nylon`='$_POST[macid_nylon]',
	`macid_poly`='$_POST[macid_poly]',
	`macid_acrylic`='$_POST[macid_acrylic]',
	`macid_wool`='$_POST[macid_wool]',
	`macid_staining`='$_POST[macid_staining]',
	`macid_note`='$_POST[macid_note]',
	`malkaline_colorchange`='$_POST[malkaline_colorchange]',
	`malkaline_acetate`='$_POST[malkaline_acetate]',
	`malkaline_cotton`='$_POST[malkaline_cotton]',
	`malkaline_nylon`='$_POST[malkaline_nylon]',
	`malkaline_poly`='$_POST[malkaline_poly]',
	`malkaline_acrylic`='$_POST[malkaline_acrylic]',
	`malkaline_wool`='$_POST[malkaline_wool]',
	`malkaline_staining`='$_POST[malkaline_staining]',
	`malkaline_note`='$_POST[malkaline_note]',
	`mcrock_len1`='$_POST[mcrock_len1]',
	`mcrock_wid1`='$_POST[mcrock_wid1]',
	`mcrock_len2`='$_POST[mcrock_len2]',
	`mcrock_wid2`='$_POST[mcrock_wid2]',
	`mcrock_note`='$_POST[mcrock_note]',
	`mphenolic_colorchange`='$_POST[mphenolic_colorchange]',
	`mphenolic_note`='$_POST[mphenolic_note]',
	`mcm_printing_colorchange`='$_POST[mcm_printing_colorchange]',
	`mcm_printing_staining`='$_POST[mcm_printing_staining]',
	`mcm_printing_note`='$_POST[mcm_printing_note]',
	`mcm_dye_temp`='$_POST[mcm_dye_temp]',
	`mcm_dye_colorchange`='$_POST[mcm_dye_colorchange]',
	`mcm_dye_stainingface`='$_POST[mcm_dye_stainingface]',
	`mcm_dye_stainingback`='$_POST[mcm_dye_stainingback]',
	`mcm_dye_note`='$_POST[mcm_dye_note]',
	`mlight_rating1`='$_POST[mlight_rating1]',
	`mlight_rating2`='$_POST[mlight_rating2]',
	`mlight_note`='$_POST[mlight_note]',
	`mlight_pers_colorchange`='$_POST[mlight_pers_colorchange]',
	`mlight_pers_note`='$_POST[mlight_pers_note]',
	`msaliva_staining`='$_POST[msaliva_staining]',
	`msaliva_note`='$_POST[msaliva_note]',
	`mbleeding`='$_POST[mbleeding]',
	`mbleeding_note`='$_POST[mbleeding_note]',
	`mchlorin`='$_POST[mchlorin]',
	`mnchlorin1`='$_POST[mnchlorin1]',
	`mnchlorin2`='$_POST[mnchlorin2]',
	`mchlorin_note`='$_POST[mchlorin_note]',
	`mdye_tf_sstaining`='$_POST[mdye_tf_sstaining]',
	`mdye_tf_cstaining`='$_POST[mdye_tf_cstaining]',
	`mdye_tf_acetate`='$_POST[mdye_tf_acetate]',
	`mdye_tf_cotton`='$_POST[mdye_tf_cotton]',
	`mdye_tf_nylon`='$_POST[mdye_tf_nylon]',
	`mdye_tf_poly`='$_POST[mdye_tf_poly]',
	`mdye_tf_acrylic`='$_POST[mdye_tf_acrylic]',
	`mdye_tf_wool`='$_POST[mdye_tf_wool]',
	`mdye_tf_note`='$_POST[mdye_tf_note]',
	`tgl_update`=now()
	WHERE `id_nokk`='$rcek[id]'
	");

		$sqlCLRMI = mysqli_query($con, "INSERT INTO tbl_tq_marginal SET
`id_nokk`='$rcek[id]',
`mwash_temp`='$_POST[mwash_temp]',
`mwash_colorchange`='$_POST[mwash_colorchange]',
`mwash_acetate`='$_POST[mwash_acetate]',
`mwash_cotton`='$_POST[mwash_cotton]',
`mwash_nylon`='$_POST[mwash_nylon]',
`mwash_poly`='$_POST[mwash_poly]',
`mwash_acrylic`='$_POST[mwash_acrylic]',
`mwash_wool`='$_POST[mwash_wool]',
`mwash_staining`='$_POST[mwash_staining]',
`mwash_note`='$_POST[mwash_note]',
`mwater_colorchange`='$_POST[mwater_colorchange]',
`mwater_acetate`='$_POST[mwater_acetate]',
`mwater_cotton`='$_POST[mwater_cotton]',
`mwater_nylon`='$_POST[mwater_nylon]',
`mwater_poly`='$_POST[mwater_poly]',
`mwater_acrylic`='$_POST[mwater_acrylic]',
`mwater_wool`='$_POST[mwater_wool]',
`mwater_staining`='$_POST[mwater_staining]',
`mwater_note`='$_POST[mwater_note]',
`macid_colorchange`='$_POST[macid_colorchange]',
`macid_acetate`='$_POST[macid_acetate]',
`macid_cotton`='$_POST[macid_cotton]',
`macid_nylon`='$_POST[macid_nylon]',
`macid_poly`='$_POST[macid_poly]',
`macid_acrylic`='$_POST[macid_acrylic]',
`macid_wool`='$_POST[macid_wool]',
`macid_staining`='$_POST[macid_staining]',
`macid_note`='$_POST[macid_note]',
`malkaline_colorchange`='$_POST[malkaline_colorchange]',
`malkaline_acetate`='$_POST[malkaline_acetate]',
`malkaline_cotton`='$_POST[malkaline_cotton]',
`malkaline_nylon`='$_POST[malkaline_nylon]',
`malkaline_poly`='$_POST[malkaline_poly]',
`malkaline_acrylic`='$_POST[malkaline_acrylic]',
`malkaline_wool`='$_POST[malkaline_wool]',
`malkaline_staining`='$_POST[malkaline_staining]',
`malkaline_note`='$_POST[malkaline_note]',
`mcrock_len1`='$_POST[mcrock_len1]',
`mcrock_wid1`='$_POST[mcrock_wid1]',
`mcrock_len2`='$_POST[mcrock_len2]',
`mcrock_wid2`='$_POST[mcrock_wid2]',
`mcrock_note`='$_POST[mcrock_note]',
`mphenolic_colorchange`='$_POST[mphenolic_colorchange]',
`mphenolic_note`='$_POST[mphenolic_note]',
`mcm_printing_colorchange`='$_POST[mcm_printing_colorchange]',
`mcm_printing_staining`='$_POST[mcm_printing_staining]',
`mcm_printing_note`='$_POST[mcm_printing_note]',
`mcm_dye_temp`='$_POST[mcm_dye_temp]',
`mcm_dye_colorchange`='$_POST[mcm_dye_colorchange]',
`mcm_dye_stainingface`='$_POST[mcm_dye_stainingface]',
`mcm_dye_stainingback`='$_POST[mcm_dye_stainingback]',
`mcm_dye_note`='$_POST[mcm_dye_note]',
`mlight_rating1`='$_POST[mlight_rating1]',
`mlight_rating2`='$_POST[mlight_rating2]',
`mlight_note`='$_POST[mlight_note]',
`mlight_pers_colorchange`='$_POST[mlight_pers_colorchange]',
`mlight_pers_note`='$_POST[mlight_pers_note]',
`msaliva_staining`='$_POST[msaliva_staining]',
`msaliva_note`='$_POST[msaliva_note]',
`mbleeding`='$_POST[mbleeding]',
`mbleeding_note`='$_POST[mbleeding_note]',
`mchlorin`='$_POST[mchlorin]',
`mnchlorin1`='$_POST[mnchlorin1]',
`mnchlorin2`='$_POST[mnchlorin2]',
`mchlorin_note`='$_POST[mchlorin_note]',
`mdye_tf_sstaining`='$_POST[mdye_tf_sstaining]',
`mdye_tf_cstaining`='$_POST[mdye_tf_cstaining]',
`mdye_tf_acetate`='$_POST[mdye_tf_acetate]',
`mdye_tf_cotton`='$_POST[mdye_tf_cotton]',
`mdye_tf_nylon`='$_POST[mdye_tf_nylon]',
`mdye_tf_poly`='$_POST[mdye_tf_poly]',
`mdye_tf_acrylic`='$_POST[mdye_tf_acrylic]',
`mdye_tf_wool`='$_POST[mdye_tf_wool]',
`mdye_tf_note`='$_POST[mdye_tf_note]',
`tgl_update`=now()");

		echo "<script>swal({
	title: 'Colorfastness save',
	text: 'Klik Ok untuk input data kembali',
	type: 'success',
	}).then((result) => {
	if (result.value) {

		window.location.href='TestingNewNoTes-$notes';
	}
	});</script>";
	}
} else if ($_POST['colorfastness_save'] == "save") {
	$sqlCLR = mysqli_query($con, "INSERT INTO tbl_tq_test SET
	`id_nokk`='$rcek[id]',
	`wash_temp`='$_POST[wash_temp]',
	`wash_colorchange`='$_POST[wash_colorchange]',
	`wash_acetate`='$_POST[wash_acetate]',
	`wash_cotton`='$_POST[wash_cotton]',
	`wash_nylon`='$_POST[wash_nylon]',
	`wash_poly`='$_POST[wash_poly]',
	`wash_acrylic`='$_POST[wash_acrylic]',
	`wash_wool`='$_POST[wash_wool]',
	`wash_staining`='$_POST[wash_staining]',
	`wash_note`='$_POST[wash_note]',
	`water_colorchange`='$_POST[water_colorchange]',
	`water_acetate`='$_POST[water_acetate]',
	`water_cotton`='$_POST[water_cotton]',
	`water_nylon`='$_POST[water_nylon]',
	`water_poly`='$_POST[water_poly]',
	`water_acrylic`='$_POST[water_acrylic]',
	`water_wool`='$_POST[water_wool]',
	`water_staining`='$_POST[water_staining]',
	`water_note`='$_POST[water_note]',
	`acid_colorchange`='$_POST[acid_colorchange]',
	`acid_acetate`='$_POST[acid_acetate]',
	`acid_cotton`='$_POST[acid_cotton]',
	`acid_nylon`='$_POST[acid_nylon]',
	`acid_poly`='$_POST[acid_poly]',
	`acid_acrylic`='$_POST[acid_acrylic]',
	`acid_wool`='$_POST[acid_wool]',
	`acid_staining`='$_POST[acid_staining]',
	`acid_note`='$_POST[acid_note]',
	`alkaline_colorchange`='$_POST[alkaline_colorchange]',
	`alkaline_acetate`='$_POST[alkaline_acetate]',
	`alkaline_cotton`='$_POST[alkaline_cotton]',
	`alkaline_nylon`='$_POST[alkaline_nylon]',
	`alkaline_poly`='$_POST[alkaline_poly]',
	`alkaline_acrylic`='$_POST[alkaline_acrylic]',
	`alkaline_wool`='$_POST[alkaline_wool]',
	`alkaline_staining`='$_POST[alkaline_staining]',
	`alkaline_note`='$_POST[alkaline_note]',
	`crock_len1`='$_POST[crock_len1]',
	`crock_wid1`='$_POST[crock_wid1]',
	`crock_len2`='$_POST[crock_len2]',
	`crock_wid2`='$_POST[crock_wid2]',
	`crock_note`='$_POST[crock_note]',
	`phenolic_colorchange`='$_POST[phenolic_colorchange]',
	`phenolic_note`='$_POST[phenolic_note]',
	`cm_printing_colorchange`='$_POST[cm_printing_colorchange]',
	`cm_printing_staining`='$_POST[cm_printing_staining]',
	`cm_printing_note`='$_POST[cm_printing_note]',
	`cm_dye_temp`='$_POST[cm_dye_temp]',
	`cm_dye_colorchange`='$_POST[cm_dye_colorchange]',
	`cm_dye_stainingface`='$_POST[cm_dye_stainingface]',
	`cm_dye_stainingback`='$_POST[cm_dye_stainingback]',
	`cm_dye_note`='$_POST[cm_dye_note]',
	`light_rating1`='$_POST[light_rating1]',
	`light_rating2`='$_POST[light_rating2]',
	`light_note`='$_POST[light_note]',
	`light_pers_colorchange`='$_POST[light_pers_colorchange]',
	`light_pers_note`='$_POST[light_pers_note]',
	`saliva_staining`='$_POST[saliva_staining]',
	`saliva_note`='$_POST[saliva_note]',
	`bleeding`='$_POST[bleeding]',
	`bleeding_note`='$_POST[bleeding_note]',
	`chlorin`='$_POST[chlorin]',
	`nchlorin1`='$_POST[nchlorin1]',
	`nchlorin2`='$_POST[nchlorin2]',
	`chlorin_note`='$_POST[chlorin_note]',
	`dye_tf_sstaining`='$_POST[dye_tf_sstaining]',
	`dye_tf_cstaining`='$_POST[dye_tf_cstaining]',
	`dye_tf_acetate`='$_POST[dye_tf_acetate]',
	`dye_tf_cotton`='$_POST[dye_tf_cotton]',
	`dye_tf_nylon`='$_POST[dye_tf_nylon]',
	`dye_tf_poly`='$_POST[dye_tf_poly]',
	`dye_tf_acrylic`='$_POST[dye_tf_acrylic]',
	`dye_tf_wool`='$_POST[dye_tf_wool]',
	`dye_tf_note`='$_POST[dye_tf_note]',
	`stat_wf`='$_POST[stat_wf]',
	`stat_wtr`='$_POST[stat_wtr]',
	`stat_pac`='$_POST[stat_pac]',
	`stat_pal`='$_POST[stat_pal]',
	`stat_cr`='$_POST[stat_cr]',
	`stat_py`='$_POST[stat_py]',
	`stat_cmo`='$_POST[stat_cmo]',
	`stat_cm`='$_POST[stat_cm]',
	`stat_lg`='$_POST[stat_lg]',
	`stat_lp`='$_POST[stat_lp]',
	`stat_slv`='$_POST[stat_slv]',
	`stat_bld`='$_POST[stat_bld]',
	`stat_chl`='$_POST[stat_chl]',
	`stat_nchl`='$_POST[stat_nchl]',
	`stat_dye`='$_POST[stat_dye]',
	`tgl_buat`=now(),
	`tgl_update`=now(),
	`sco_acid_original`= '$sco_original',
	`sco_acid_status`= '$_POST[sco_acid_status]',
	`sca_acid_original`= '$sca_acid',
	`sca_acid_status`= '$_POST[sca_acid_status]',
	`sco_alkaline_afterwash` = '$sco_alkaline_afterwash',
	`sco_alkaline_status` = '$_POST[sco_alkaline_status]',
	`sca_alkaline_afterwash` = '$sca_alkaline_afterwash',
	`sca_alkaline_status` = '$_POST[sca_alkaline_status]',
	`sc_note` =  '$_POST[sc_note]'
	");
	if ($sqlCLR) {
		echo "<script>swal({
		  title: 'Colorfastness Save',
		  text: 'Klik Ok untuk input data kembali',
		  type: 'success',
		  }).then((result) => {
		  if (result.value) {

			 window.location.href='TestingNewNoTes-$notes';
		  }
		});</script>";
	}
}
if ($_POST['functional_save'] == "save" and $cek1 > 0) {
	$sqlFPH = mysqli_query($con, "UPDATE tbl_tq_test SET
	`wick_l1` = '$_POST[wick_l1]',
	`wick_w1` = '$_POST[wick_w1]',
	`wick_l2` = '$_POST[wick_l2]',
	`wick_w2` = '$_POST[wick_w2]',
	`wick_l3` = '$_POST[wick_l3]',
	`wick_w3` = '$_POST[wick_w3]',
	`wick_l4` = '$_POST[wick_l4]',
	`wick_w4` = '$_POST[wick_w4]',
	`wick_note` = '$_POST[wick_note]',
	`absor_f1` = '$_POST[absor_f1]',
	`absor_f2` = '$_POST[absor_f2]',
	`absor_f3` = '$_POST[absor_f3]',
	`absor_b1` = '$_POST[absor_b1]',
	`absor_b2` = '$_POST[absor_b2]',
	`absor_b3` = '$_POST[absor_b3]',
	`absor_note` = '$_POST[absor_note]',
	`dry1` = '$_POST[dry1]',
	`dry2` = '$_POST[dry2]',
	`dry3` = '$_POST[dry3]',
	`dryaf1` = '$_POST[dryaf1]',
	`dryaf2` = '$_POST[dryaf2]',
	`dryaf3` = '$_POST[dryaf3]',
	`dry_note` = '$_POST[dry_note]',
	`repp1` = '$_POST[repp1]',
	`repp2` = '$_POST[repp2]',
	`repp3` = '$_POST[repp3]',
	`repp4` = '$_POST[repp4]',
	`repp_note` = '$_POST[repp_note]',
	`ph` = '$_POST[ph]',
	`ph_note` = '$_POST[ph_note]',
	`soil` = '$_POST[soil]',
	`soil_note` = '$_POST[soil_note]',
	`humidity` = '$_POST[humidity]',
	`humidity_note` = '$_POST[humidity_note]',
	`stat_wic`='$_POST[stat_wic]',
	`stat_wic1`='$_POST[stat_wic1]',
	`stat_wic2`='$_POST[stat_wic2]',
	`stat_wic3`='$_POST[stat_wic3]',
	`stat_abs`='$_POST[stat_abs]',
	`stat_abs1`='$_POST[stat_abs1]',
	`stat_dry`='$_POST[stat_dry]',
	`stat_dry1`='$_POST[stat_dry1]',
	`stat_wp`='$_POST[stat_wp]',
	`stat_wp1`='$_POST[stat_wp1]',
	`stat_ph`='$_POST[stat_ph]',
	`stat_sor`='$_POST[stat_sor]',
	`stat_hum`='$_POST[stat_hum]',
	`tgl_update`=now()
    WHERE `id_nokk`='$rcek[id]'
	");
	if ($sqlFPH) {
		$sqlFPHD = mysqli_query($con, "UPDATE tbl_tq_disptest SET
	`dwick_l1` = '$_POST[dwick_l1]',
	`dwick_w1` = '$_POST[dwick_w1]',
	`dwick_l2` = '$_POST[dwick_l2]',
	`dwick_w2` = '$_POST[dwick_w2]',
	`dwick_l3` = '$_POST[dwick_l3]',
	`dwick_w3` = '$_POST[dwick_w3]',
	`dwick_l4` = '$_POST[dwick_l4]',
	`dwick_w4` = '$_POST[dwick_w4]',
	`dwick_note` = '$_POST[dwick_note]',
	`dabsor_f1` = '$_POST[dabsor_f1]',
	`dabsor_f2` = '$_POST[dabsor_f2]',
	`dabsor_f3` = '$_POST[dabsor_f3]',
	`dabsor_b1` = '$_POST[dabsor_b1]',
	`dabsor_b2` = '$_POST[dabsor_b2]',
	`dabsor_b3` = '$_POST[dabsor_b3]',
	`dabsor_note` = '$_POST[dabsor_note]',
	`ddry1` = '$_POST[ddry1]',
	`ddry2` = '$_POST[ddry2]',
	`ddry3` = '$_POST[ddry3]',
	`ddryaf1` = '$_POST[ddryaf1]',
	`ddryaf2` = '$_POST[ddryaf2]',
	`ddryaf3` = '$_POST[ddryaf3]',
	`ddry_note` = '$_POST[ddry_note]',
	`drepp1` = '$_POST[drepp1]',
	`drepp2` = '$_POST[drepp2]',
	`drepp3` = '$_POST[drepp3]',
	`drepp4` = '$_POST[drepp4]',
	`drepp_note` = '$_POST[drepp_note]',
	`dph` = '$_POST[dph]',
	`dph_note` = '$_POST[dph_note]',
	`dsoil` = '$_POST[dsoil]',
	`dsoil_note` = '$_POST[dsoil_note]',
	`dhumidity` = '$_POST[dhumidity]',
	`dhumidity_note` = '$_POST[dhumidity_note]',
	`tgl_update`=now()
	WHERE `id_nokk`='$rcek[id]'
	");
		$sqlFPHDI = mysqli_query($con, "INSERT INTO tbl_tq_disptest SET
	`id_nokk`='$rcek[id]',
	`dwick_l1` = '$_POST[dwick_l1]',
	`dwick_w1` = '$_POST[dwick_w1]',
	`dwick_l2` = '$_POST[dwick_l2]',
	`dwick_w2` = '$_POST[dwick_w2]',
	`dwick_l3` = '$_POST[dwick_l3]',
	`dwick_w3` = '$_POST[dwick_w3]',
	`dwick_l4` = '$_POST[dwick_l4]',
	`dwick_w4` = '$_POST[dwick_w4]',
	`dwick_note` = '$_POST[dwick_note]',
	`dabsor_f1` = '$_POST[dabsor_f1]',
	`dabsor_f2` = '$_POST[dabsor_f2]',
	`dabsor_f3` = '$_POST[dabsor_f3]',
	`dabsor_b1` = '$_POST[dabsor_b1]',
	`dabsor_b2` = '$_POST[dabsor_b2]',
	`dabsor_b3` = '$_POST[dabsor_b3]',
	`dabsor_note` = '$_POST[dabsor_note]',
	`ddry1` = '$_POST[ddry1]',
	`ddry2` = '$_POST[ddry2]',
	`ddry3` = '$_POST[ddry3]',
	`ddryaf1` = '$_POST[ddryaf1]',
	`ddryaf2` = '$_POST[ddryaf2]',
	`ddryaf3` = '$_POST[ddryaf3]',
	`ddry_note` = '$_POST[ddry_note]',
	`drepp1` = '$_POST[drepp1]',
	`drepp2` = '$_POST[drepp2]',
	`drepp3` = '$_POST[drepp3]',
	`drepp4` = '$_POST[drepp4]',
	`drepp_note` = '$_POST[drepp_note]',
	`dph` = '$_POST[dph]',
	`dph_note` = '$_POST[dph_note]',
	`dsoil` = '$_POST[dsoil]',
	`dsoil_note` = '$_POST[dsoil_note]',
	`dhumidity` = '$_POST[dhumidity]',
	`dhumidity_note` = '$_POST[dhumidity_note]',
	`tgl_buat`=now(),
	`tgl_update`=now()
	");

		$sqlFPHM = mysqli_query($con, "UPDATE tbl_tq_marginal SET
`mwick_l1` = '$_POST[mwick_l1]',
`mwick_w1` = '$_POST[mwick_w1]',
`mwick_l2` = '$_POST[mwick_l2]',
`mwick_w2` = '$_POST[mwick_w2]',
`mwick_l3` = '$_POST[mwick_l3]',
`mwick_w3` = '$_POST[mwick_w3]',
`mwick_l4` = '$_POST[mwick_l4]',
`mwick_w4` = '$_POST[mwick_w4]',
`mwick_note` = '$_POST[mwick_note]',
`mabsor_f1` = '$_POST[mabsor_f1]',
`mabsor_f2` = '$_POST[mabsor_f2]',
`mabsor_f3` = '$_POST[mabsor_f3]',
`mabsor_b1` = '$_POST[mabsor_b1]',
`mabsor_b2` = '$_POST[mabsor_b2]',
`mabsor_b3` = '$_POST[mabsor_b3]',
`mabsor_note` = '$_POST[mabsor_note]',
`mdry1` = '$_POST[mdry1]',
`mdry2` = '$_POST[mdry2]',
`mdry3` = '$_POST[mdry3]',
`mdryaf1` = '$_POST[mdryaf1]',
`mdryaf2` = '$_POST[mdryaf2]',
`mdryaf3` = '$_POST[mdryaf3]',
`mdry_note` = '$_POST[mdry_note]',
`mrepp1` = '$_POST[mrepp1]',
`mrepp2` = '$_POST[mrepp2]',
`mrepp3` = '$_POST[mrepp3]',
`mrepp4` = '$_POST[mrepp4]',
`mrepp_note` = '$_POST[mrepp_note]',
`mph` = '$_POST[mph]',
`mph_note` = '$_POST[mph_note]',
`msoil` = '$_POST[msoil]',
`msoil_note` = '$_POST[msoil_note]',
`mhumidity` = '$_POST[mhumidity]',
`mhumidity_note` = '$_POST[mhumidity_note]',
`tgl_update`=now()
WHERE `id_nokk`='$rcek[id]'
");

		$sqlFPHMI = mysqli_query($con, "INSERT INTO tbl_tq_marginal SET
`id_nokk`='$rcek[id]',
`mwick_l1` = '$_POST[mwick_l1]',
`mwick_w1` = '$_POST[mwick_w1]',
`mwick_l2` = '$_POST[mwick_l2]',
`mwick_w2` = '$_POST[mwick_w2]',
`mwick_l3` = '$_POST[mwick_l3]',
`mwick_w3` = '$_POST[mwick_w3]',
`mwick_l4` = '$_POST[mwick_l4]',
`mwick_w4` = '$_POST[mwick_w4]',
`mwick_note` = '$_POST[mwick_note]',
`mabsor_f1` = '$_POST[mabsor_f1]',
`mabsor_f2` = '$_POST[mabsor_f2]',
`mabsor_f3` = '$_POST[mabsor_f3]',
`mabsor_b1` = '$_POST[mabsor_b1]',
`mabsor_b2` = '$_POST[mabsor_b2]',
`mabsor_b3` = '$_POST[mabsor_b3]',
`mabsor_note` = '$_POST[mabsor_note]',
`mdry1` = '$_POST[mdry1]',
`mdry2` = '$_POST[mdry2]',
`mdry3` = '$_POST[mdry3]',
`mdryaf1` = '$_POST[mdryaf1]',
`mdryaf2` = '$_POST[mdryaf2]',
`mdryaf3` = '$_POST[mdryaf3]',
`mdry_note` = '$_POST[mdry_note]',
`mrepp1` = '$_POST[mrepp1]',
`mrepp2` = '$_POST[mrepp2]',
`mrepp3` = '$_POST[mrepp3]',
`mrepp4` = '$_POST[mrepp4]',
`mrepp_note` = '$_POST[mrepp_note]',
`mph` = '$_POST[mph]',
`mph_note` = '$_POST[mph_note]',
`msoil` = '$_POST[msoil]',
`msoil_note` = '$_POST[msoil_note]',
`mhumidity` = '$_POST[mhumidity]',
`mhumidity_note` = '$_POST[mhumidity_note]',
`tgl_update`=now()");

		echo "<script>swal({
	title: 'Functional Save',
	text: 'Klik Ok untuk input data kembali',
	type: 'success',
	}).then((result) => {
	if (result.value) {

		window.location.href='TestingNewNoTes-$notes';
	}
	});</script>";
	}
} else if ($_POST['functional_save'] == "save") {
	$sqlFPH = mysqli_query($con, "INSERT INTO tbl_tq_test SET
	`id_nokk`='$rcek[id]',
	`wick_l1` = '$_POST[wick_l1]',
	`wick_w1` = '$_POST[wick_w1]',
	`wick_l2` = '$_POST[wick_l2]',
	`wick_w2` = '$_POST[wick_w2]',
	`wick_l3` = '$_POST[wick_l3]',
	`wick_w3` = '$_POST[wick_w3]',
	`wick_l4` = '$_POST[wick_l4]',
	`wick_w4` = '$_POST[wick_w4]',
	`wick_note` = '$_POST[wick_note]',
	`absor_f1` = '$_POST[absor_f1]',
	`absor_f2` = '$_POST[absor_f2]',
	`absor_f3` = '$_POST[absor_f3]',
	`absor_b1` = '$_POST[absor_b1]',
	`absor_b2` = '$_POST[absor_b2]',
	`absor_b3` = '$_POST[absor_b3]',
	`absor_note` = '$_POST[absor_note]',
	`dry1` = '$_POST[dry1]',
	`dry2` = '$_POST[dry2]',
	`dry3` = '$_POST[dry3]',
	`dryaf1` = '$_POST[dryaf1]',
	`dryaf2` = '$_POST[dryaf2]',
	`dryaf3` = '$_POST[dryaf3]',
	`dry_note` = '$_POST[dry_note]',
	`repp1` = '$_POST[repp1]',
	`repp2` = '$_POST[repp2]',
	`repp3` = '$_POST[repp3]',
	`repp4` = '$_POST[repp4]',
	`repp_note` = '$_POST[repp_note]',
	`ph` = '$_POST[ph]',
	`ph_note` = '$_POST[ph_note]',
	`soil` = '$_POST[soil]',
	`soil_note` = '$_POST[soil_note]',
	`humidity` = '$_POST[humidity]',
	`humidity_note` = '$_POST[humidity_note]',
	`stat_wic`='$_POST[stat_wic]',
	`stat_wic1`='$_POST[stat_wic1]',
	`stat_wic2`='$_POST[stat_wic2]',
	`stat_wic3`='$_POST[stat_wic3]',
	`stat_abs`='$_POST[stat_abs]',
	`stat_abs1`='$_POST[stat_abs1]',
	`stat_dry`='$_POST[stat_dry]',
	`stat_dry1`='$_POST[stat_dry1]',
	`stat_wp`='$_POST[stat_wp]',
	`stat_wp1`='$_POST[stat_wp1]',
	`stat_ph`='$_POST[stat_ph]',
	`stat_sor`='$_POST[stat_sor]',
	`stat_hum`='$_POST[stat_hum]',
	`tgl_buat`=now(),
	`tgl_update`=now()
	");
	if ($sqlFPH) {
		echo "<script>swal({
	title: 'Functional Save',
	text: 'Klik Ok untuk input data kembali',
	type: 'success',
	}).then((result) => {
	if (result.value) {

		window.location.href='TestingNewNoTes-$notes';
	}
	});</script>";
	}
}
if ($notes != "" and $cek == 0) {
	echo "<script>swal({
  title: 'No Kartu Tidak Ditemukan',
  text: 'Klik Ok untuk input data kembali',
  type: 'info',
  }).then((result) => {
  if (result.value) {

	 window.location.href='TestingNewNoTes';
  }
});</script>";
}
?>
<div id="PosisiKKTQ" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
	aria-hidden="true"></div>