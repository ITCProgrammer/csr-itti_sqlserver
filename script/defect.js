// -----------------------YARN DEFECT-------------------
// SLUB
$(document).ready(function () {
    $("#tambah_slub").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#slub_1').val();
            var x = parseInt(x) + 1;
            $('#slub_1').val(x);
        } else if (point == 2) {
            var x = jQuery('#slub_2').val();
            var x = parseInt(x) + 1;
            $('#slub_2').val(x);
        } else if (point == 3) {
            var x = jQuery('#slub_3').val();
            var x = parseInt(x) + 1;
            $('#slub_3').val(x);
        } else if (point == 4) {
            var x = jQuery('#slub_4').val();
            var x = parseInt(x) + 1;
            $('#slub_4').val(x);
        } else {
            swal({
                title: 'Silahkan Pilih NUMBER DEFACT',
                text: 'Klik Ok untuk memilih nomor kk kembali',
                type: 'error'
            });
        }
    });
});
$(document).ready(function () {
    $("#kurang_slub").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#slub_1').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#slub_1').val() = 0;
            } else {
                $('#slub_1').val(x);
            }
        } else if (point == 2) {
            var x = jQuery('#slub_2').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#slub_2').val() = 0;
            } else {
                $('#slub_2').val(x);
            }
        } else if (point == 3) {
            var x = jQuery('#slub_3').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#slub_3').val() = 0;
            } else {
                $('#slub_3').val(x);
            }
        } else if (point == 4) {
            var x = jQuery('#slub_4').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#slub_4').val() = 0;
            } else {
                $('#slub_4').val(x);
            }
        } else {
            swal({
                title: 'Silahkan Pilih NUMBER DEFACT',
                text: 'Klik Ok untuk memilih nomor kk kembali',
                type: 'error'
            });
        }
    });
});

// BARRE
$(document).ready(function () {
    $("#tambah_barredefect").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#barredefect_1').val();
            var x = parseInt(x) + 1;
            $('#barredefect_1').val(x);
        } else if (point == 2) {
            var x = jQuery('#barredefect_2').val();
            var x = parseInt(x) + 1;
            $('#barredefect_2').val(x);
        } else if (point == 3) {
            var x = jQuery('#barredefect_3').val();
            var x = parseInt(x) + 1;
            $('#barredefect_3').val(x);
        } else if (point == 4) {
            var x = jQuery('#barredefect_4').val();
            var x = parseInt(x) + 1;
            $('#barredefect_4').val(x);
        } else {
            swal({
                title: 'Silahkan Pilih NUMBER DEFACT',
                text: 'Klik Ok untuk memilih nomor kk kembali',
                type: 'error'
            });
        }
    });
});
$(document).ready(function () {
    $("#kurang_barredefect").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#barredefect_1').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#barredefect_1').val() = 0;
            } else {
                $('#barredefect_1').val(x);
            }
        } else if (point == 2) {
            var x = jQuery('#barredefect_2').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#barredefect_2').val() = 0;
            } else {
                $('#barredefect_2').val(x);
            }
        } else if (point == 3) {
            var x = jQuery('#barredefect_3').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#barredefect_3').val() = 0;
            } else {
                $('#barredefect_3').val(x);
            }
        } else if (point == 4) {
            var x = jQuery('#barredefect_4').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#barredefect_4').val() = 0;
            } else {
                $('#barredefect_4').val(x);
            }
        } else {
            swal({
                title: 'Silahkan Pilih NUMBER DEFACT',
                text: 'Klik Ok untuk memilih nomor kk kembali',
                type: 'error'
            });
        }
    });
});

// UNEVEN
$(document).ready(function () {
    $("#tambah_uneven").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#uneven_1').val();
            var x = parseInt(x) + 1;
            $('#uneven_1').val(x);
        } else if (point == 2) {
            var x = jQuery('#uneven_2').val();
            var x = parseInt(x) + 1;
            $('#uneven_2').val(x);
        } else if (point == 3) {
            var x = jQuery('#uneven_3').val();
            var x = parseInt(x) + 1;
            $('#uneven_3').val(x);
        } else if (point == 4) {
            var x = jQuery('#uneven_4').val();
            var x = parseInt(x) + 1;
            $('#uneven_4').val(x);
        } else {
            swal({
                title: 'Silahkan Pilih NUMBER DEFACT',
                text: 'Klik Ok untuk memilih nomor kk kembali',
                type: 'error'
            });
        }
    });
});
$(document).ready(function () {
    $("#kurang_uneven").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#uneven_1').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#uneven_1').val() = 0;
            } else {
                $('#uneven_1').val(x);
            }
        } else if (point == 2) {
            var x = jQuery('#uneven_2').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#uneven_2').val() = 0;
            } else {
                $('#uneven_2').val(x);
            }
        } else if (point == 3) {
            var x = jQuery('#uneven_3').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#uneven_3').val() = 0;
            } else {
                $('#uneven_3').val(x);
            }
        } else if (point == 4) {
            var x = jQuery('#uneven_4').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#uneven_4').val() = 0;
            } else {
                $('#uneven_4').val(x);
            }
        } else {
            swal({
                title: 'Silahkan Pilih NUMBER DEFACT',
                text: 'Klik Ok untuk memilih nomor kk kembali',
                type: 'error'
            });
        }
    });
});

// YARN
$(document).ready(function () {
    $("#tambah_yarn").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#yarn_con_1').val();
            var x = parseInt(x) + 1;
            $('#yarn_con_1').val(x);
        } else if (point == 2) {
            var x = jQuery('#yarn_con_2').val();
            var x = parseInt(x) + 1;
            $('#yarn_con_2').val(x);
        } else if (point == 3) {
            var x = jQuery('#yarn_con_3').val();
            var x = parseInt(x) + 1;
            $('#yarn_con_3').val(x);
        } else if (point == 4) {
            var x = jQuery('#yarn_con_4').val();
            var x = parseInt(x) + 1;
            $('#yarn_con_4').val(x);
        } else {
            swal({
                title: 'Silahkan Pilih NUMBER DEFACT',
                text: 'Klik Ok untuk memilih nomor kk kembali',
                type: 'error'
            });
        }

    });
});
$(document).ready(function () {
    $("#kurang_yarn").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#yarn_con_1').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#yarn_con_1').val() = 0;
            } else {
                $('#yarn_con_1').val(x);
            }
        } else if (point == 2) {
            var x = jQuery('#yarn_con_2').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#yarn_con_2').val() = 0;
            } else {
                $('#yarn_con_2').val(x);
            }
        } else if (point == 3) {
            var x = jQuery('#yarn_co_3').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#yarn_co_3').val() = 0;
            } else {
                $('#yarn_co_3').val(x);
            }
        } else if (point == 4) {
            var x = jQuery('#yarn_con_4').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#yarn_con_4').val() = 0;
            } else {
                $('#yarn_con_4').val(x);
            }
        } else {
            swal({
                title: 'Silahkan Pilih NUMBER DEFACT',
                text: 'Klik Ok untuk memilih nomor kk kembali',
                type: 'error'
            });
        }
    });
});

// NEPS
$(document).ready(function () {
    $("#tambah_neps").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#neps_1').val();
            var x = parseInt(x) + 1;
            $('#neps_1').val(x);
        } else if (point == 2) {
            var x = jQuery('#neps_2').val();
            var x = parseInt(x) + 1;
            $('#neps_2').val(x);
        } else if (point == 3) {
            var x = jQuery('#neps_3').val();
            var x = parseInt(x) + 1;
            $('#neps_3').val(x);
        } else if (point == 4) {
            var x = jQuery('#neps_4').val();
            var x = parseInt(x) + 1;
            $('#neps_4').val(x);
        } else {
            swal({
                title: 'Silahkan Pilih NUMBER DEFACT',
                text: 'Klik Ok untuk memilih nomor kk kembali',
                type: 'error'
            });
        }

    });
});
$(document).ready(function () {
    $("#kurang_neps").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#neps_1').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#neps_1').val() = 0;
            } else {
                $('#neps_1').val(x);
            }
        } else if (point == 2) {
            var x = jQuery('#neps_2').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#neps_2').val() = 0;
            } else {
                $('#neps_2').val(x);
            }
        } else if (point == 3) {
            var x = jQuery('#neps_3').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#neps_3').val() = 0;
            } else {
                $('#neps_3').val(x);
            }
        } else if (point == 4) {
            var x = jQuery('#neps_4').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#neps_4').val() = 0;
            } else {
                $('#neps_4').val(x);
            }
        } else {
            swal({
                title: 'Silahkan Pilih NUMBER DEFACT',
                text: 'Klik Ok untuk memilih nomor kk kembali',
                type: 'error'
            });
        }
    });
});

// MISC
$(document).ready(function () {
    $("#tambah_misc").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#misc_1').val();
            var x = parseInt(x) + 1;
            $('#misc_1').val(x);
        } else if (point == 2) {
            var x = jQuery('#misc_2').val();
            var x = parseInt(x) + 1;
            $('#misc_2').val(x);
        } else if (point == 3) {
            var x = jQuery('#misc_3').val();
            var x = parseInt(x) + 1;
            $('#misc_3').val(x);
        } else if (point == 4) {
            var x = jQuery('#misc_4').val();
            var x = parseInt(x) + 1;
            $('#misc_4').val(x);
        } else {
            swal({
                title: 'Silahkan Pilih NUMBER DEFACT',
                text: 'Klik Ok untuk memilih nomor kk kembali',
                type: 'error'
            });
        }
    });
});
$(document).ready(function () {
    $("#kurang_misc").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#misc_1').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#misc_1').val() = 0;
            } else {
                $('#misc_1').val(x);
            }
        } else if (point == 2) {
            var x = jQuery('#misc_2').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#misc_2').val() = 0;
            } else {
                $('#misc_2').val(x);
            }
        } else if (point == 3) {
            var x = jQuery('#misc_3').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#misc_3').val() = 0;
            } else {
                $('#misc_3').val(x);
            }
        } else if (point == 4) {
            var x = jQuery('#misc_4').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#misc_4').val() = 0;
            } else {
                $('#misc_4').val(x);
            }
        } else {
            swal({
                title: 'Silahkan Pilih NUMBER DEFACT',
                text: 'Klik Ok untuk memilih nomor kk kembali',
                type: 'error'
            });
        }
    });
});

// -----------------------CONSTRUCTION-------------------
// MISSING
$(document).ready(function () {
    $("#tambah_missing").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#missing_1').val();
            var x = parseInt(x) + 1;
            $('#missing_1').val(x);
        } else if (point == 2) {
            var x = jQuery('#missing_2').val();
            var x = parseInt(x) + 1;
            $('#missing_2').val(x);
        } else if (point == 3) {
            var x = jQuery('#missing_3').val();
            var x = parseInt(x) + 1;
            $('#missing_3').val(x);
        } else if (point == 4) {
            var x = jQuery('#missing_4').val();
            var x = parseInt(x) + 1;
            $('#missing_4').val(x);
        }
    });
});
$(document).ready(function () {
    $("#kurang_missing").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#missing_1').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#missing_1').val() = 0;
            } else {
                $('#missing_1').val(x);
            }
        } else if (point == 2) {
            var x = jQuery('#missing_2').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#missing_2').val() = 0;
            } else {
                $('#missing_2').val(x);
            }
        } else if (point == 3) {
            var x = jQuery('#missing_3').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#missing_3').val() = 0;
            } else {
                $('#missing_3').val(x);
            }
        } else if (point == 4) {
            var x = jQuery('#missing_4').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#missing_4').val() = 0;
            } else {
                $('#missing_4').val(x);
            }
        }
    });
});

// HOLES
$(document).ready(function () {
    $("#tambah_holes").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#holes_1').val();
            var x = parseInt(x) + 1;
            $('#holes_1').val(x);
        } else if (point == 2) {
            var x = jQuery('#holes_2').val();
            var x = parseInt(x) + 1;
            $('#holes_2').val(x);
        } else if (point == 3) {
            var x = jQuery('#holes_3').val();
            var x = parseInt(x) + 1;
            $('#holes_3').val(x);
        } else if (point == 4) {
            var x = jQuery('#holes_4').val();
            var x = parseInt(x) + 1;
            $('#holes_4').val(x);
        }
    });
});

$(document).ready(function () {
    $("#kurang_holes").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#holes_1').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#holes_1').val() = 0;
            } else {
                $('#holes_1').val(x);
            }
        } else if (point == 2) {
            var x = jQuery('#holes_2').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#holes_2').val() = 0;
            } else {
                $('#holes_2').val(x);
            }
        } else if (point == 3) {
            var x = jQuery('#holes_3').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#holes_3').val() = 0;
            } else {
                $('#holes_3').val(x);
            }
        } else if (point == 4) {
            var x = jQuery('#holes_4').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#holes_4').val() = 0;
            } else {
                $('#holes_4').val(x);
            }
        }

    });
});

// STEAKS
$(document).ready(function () {
    $("#tambah_steaks").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#steaks_1').val();
            var x = parseInt(x) + 1;
            $('#steaks_1').val(x);
        } else if (point == 2) {
            var x = jQuery('#steaks_2').val();
            var x = parseInt(x) + 1;
            $('#steaks_2').val(x);
        } else if (point == 3) {
            var x = jQuery('#steaks_3').val();
            var x = parseInt(x) + 1;
            $('#steaks_3').val(x);
        } else if (point == 4) {
            var x = jQuery('#steaks_4').val();
            var x = parseInt(x) + 1;
            $('#steaks_4').val(x);
        }
    });
});
$(document).ready(function () {
    $("#kurang_steaks").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#steaks_1').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#steaks_1').val() = 0;
            } else {
                $('#steaks_1').val(x);
            }
        } else if (point == 2) {
            var x = jQuery('#steaks_2').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#steaks_2').val() = 0;
            } else {
                $('#steaks_2').val(x);
            }
        } else if (point == 3) {
            var x = jQuery('#steaks_3').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#steaks_3').val() = 0;
            } else {
                $('#steaks_3').val(x);
            }
        } else if (point == 4) {
            var x = jQuery('#steaks_4').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#steaks_4').val() = 0;
            } else {
                $('#steaks_4').val(x);
            }
        }
    });
});

// MISKNIT
$(document).ready(function () {
    $("#tambah_misknit").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#misknit_1').val();
            var x = parseInt(x) + 1;
            $('#misknit_1').val(x);
        } else if (point == 2) {
            var x = jQuery('#misknit_2').val();
            var x = parseInt(x) + 1;
            $('#misknit_2').val(x);
        } else if (point == 3) {
            var x = jQuery('#misknit_3').val();
            var x = parseInt(x) + 1;
            $('#misknit_3').val(x);
        } else if (point == 4) {
            var x = jQuery('#misknit_4').val();
            var x = parseInt(x) + 1;
            $('#misknit_4').val(x);
        }
    });
});
$(document).ready(function () {
    $("#kurang_misknit").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#misknit_1').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#misknit_1').val() = 0;
            } else {
                $('#misknit_1').val(x);
            }
        } else if (point == 2) {
            var x = jQuery('#misknit_2').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#misknit_2').val() = 0;
            } else {
                $('#misknit_2').val(x);
            }
        } else if (point == 3) {
            var x = jQuery('#misknit_3').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#misknit_3').val() = 0;
            } else {
                $('#misknit_3').val(x);
            }
        } else if (point == 4) {
            var x = jQuery('#misknit_4').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#misknit_4').val() = 0;
            } else {
                $('#misknit_4').val(x);
            }
        }
    });
});

// KNOT
$(document).ready(function () {
    $("#tambah_knot").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#knot_1').val();
            var x = parseInt(x) + 1;
            $('#knot_1').val(x);
        } else if (point == 2) {
            var x = jQuery('#knot_2').val();
            var x = parseInt(x) + 1;
            $('#knot_2').val(x);
        } else if (point == 3) {
            var x = jQuery('#knot_3').val();
            var x = parseInt(x) + 1;
            $('#knot_3').val(x);
        } else if (point == 4) {
            var x = jQuery('#knot_4').val();
            var x = parseInt(x) + 1;
            $('#knot_4').val(x);
        }
    });
});
$(document).ready(function () {
    $("#kurang_knot").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#knot_1').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#knot_1').val() = 0;
            } else {
                $('#knot_1').val(x);
            }
        } else if (point == 2) {
            var x = jQuery('#knot_2').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#knot_2').val() = 0;
            } else {
                $('#knot_2').val(x);
            }
        } else if (point == 3) {
            var x = jQuery('#knot_3').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#knot_3').val() = 0;
            } else {
                $('#knot_3').val(x);
            }
        } else if (point == 4) {
            var x = jQuery('#knot_4').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#knot_4').val() = 0;
            } else {
                $('#knot_4').val(x);
            }
        }
    });
});

// OIL
$(document).ready(function () {
    $("#tambah_oil").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#oil_1').val();
            var x = parseInt(x) + 1;
            $('#oil_1').val(x);
        } else if (point == 2) {
            var x = jQuery('#oil_2').val();
            var x = parseInt(x) + 1;
            $('#oil_2').val(x);
        } else if (point == 3) {
            var x = jQuery('#oil_3').val();
            var x = parseInt(x) + 1;
            $('#oil_3').val(x);
        } else if (point == 4) {
            var x = jQuery('#oil_4').val();
            var x = parseInt(x) + 1;
            $('#oil_4').val(x);
        }
    });
});
$(document).ready(function () {
    $("#kurang_oil").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#oil_1').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#oil_1').val() = 0;
            } else {
                $('#oil_1').val(x);
            }
        } else if (point == 2) {
            var x = jQuery('#oil_2').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#oil_2').val() = 0;
            } else {
                $('#oil_2').val(x);
            }
        } else if (point == 3) {
            var x = jQuery('#oil_3').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#oil_3').val() = 0;
            } else {
                $('#oil_3').val(x);
            }
        } else if (point == 4) {
            var x = jQuery('#oil_4').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#oil_4').val() = 0;
            } else {
                $('#oil_4').val(x);
            }
        }

    });
});

// FLY
$(document).ready(function () {
    $("#tambah_fly").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#fly_1').val();
            var x = parseInt(x) + 1;
            $('#fly_1').val(x);
        } else if (point == 2) {
            var x = jQuery('#fly_2').val();
            var x = parseInt(x) + 1;
            $('#fly_2').val(x);
        } else if (point == 3) {
            var x = jQuery('#fly_3').val();
            var x = parseInt(x) + 1;
            $('#fly_3').val(x);
        } else if (point == 4) {
            var x = jQuery('#fly_4').val();
            var x = parseInt(x) + 1;
            $('#fly_4').val(x);
        }
    });
});
$(document).ready(function () {
    $("#kurang_fly").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#fly_1').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#fly_1').val() = 0;
            } else {
                $('#fly_1').val(x);
            }
        } else if (point == 2) {
            var x = jQuery('#fly_2').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#fly_2').val() = 0;
            } else {
                $('#fly_2').val(x);
            }
        } else if (point == 3) {
            var x = jQuery('#fly_3').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#fly_3').val() = 0;
            } else {
                $('#fly_3').val(x);
            }
        } else if (point == 4) {
            var x = jQuery('#fly_4').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#fly_4').val() = 0;
            } else {
                $('#fly_4').val(x);
            }
        }
    });
});

// MISC2
$(document).ready(function () {
    $("#tambah_misc2").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#misc2_1').val();
            var x = parseInt(x) + 1;
            $('#misc2_1').val(x);
        } else if (point == 2) {
            var x = jQuery('#misc2_2').val();
            var x = parseInt(x) + 1;
            $('#misc2_2').val(x);
        } else if (point == 3) {
            var x = jQuery('#misc2_3').val();
            var x = parseInt(x) + 1;
            $('#misc2_3').val(x);
        } else if (point == 4) {
            var x = jQuery('#misc2_4').val();
            var x = parseInt(x) + 1;
            $('#misc2_4').val(x);
        }
    });
});
$(document).ready(function () {
    $("#kurang_misc2").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#misc2_1').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#misc2_1').val() = 0;
            } else {
                $('#misc2_1').val(x);
            }
        } else if (point == 2) {
            var x = jQuery('#misc2_2').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#misc2_2').val() = 0;
            } else {
                $('#misc2_2').val(x);
            }
        } else if (point == 3) {
            var x = jQuery('#misc2_3').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#misc2_3').val() = 0;
            } else {
                $('#misc2_3').val(x);
            }
        } else if (point == 4) {
            var x = jQuery('#misc2_4').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#misc2_4').val() = 0;
            } else {
                $('#misc2_4').val(x);
            }
        }
    });
});


// -----------------------DYE & FINISHING DEFECT-------------------
// HAIRINESS
$(document).ready(function () {
    $("#tambah_hairiness").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#hairiness_1').val();
            var x = parseInt(x) + 1;
            $('#hairiness_1').val(x);
        } else if (point == 2) {
            var x = jQuery('#hairiness_2').val();
            var x = parseInt(x) + 1;
            $('#hairiness_2').val(x);
        } else if (point == 3) {
            var x = jQuery('#hairiness_3').val();
            var x = parseInt(x) + 1;
            $('#hairiness_3').val(x);
        } else if (point == 4) {
            var x = jQuery('#hairiness_4').val();
            var x = parseInt(x) + 1;
            $('#hairiness_4').val(x);
        }
    });
});
$(document).ready(function () {
    $("#kurang_hairiness").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#hairiness_1').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#hairiness_1').val() = 0;
            } else {
                $('#hairiness_1').val(x);
            }
        } else if (point == 2) {
            var x = jQuery('#hairiness_2').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#hairiness_2').val() = 0;
            } else {
                $('#hairiness_2').val(x);
            }
        } else if (point == 3) {
            var x = jQuery('#hairiness_3').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#hairiness_3').val() = 0;
            } else {
                $('#hairiness_3').val(x);
            }
        } else if (point == 4) {
            var x = jQuery('#hairiness_4').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#hairiness_4').val() = 0;
            } else {
                $('#hairiness_4').val(x);
            }
        }
    });
});

// HOLES
$(document).ready(function () {
    $("#tambah_holes_dye").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#holes_dye_1').val();
            var x = parseInt(x) + 1;
            $('#holes_dye_1').val(x);
        } else if (point == 2) {
            var x = jQuery('#holes_dye_2').val();
            var x = parseInt(x) + 1;
            $('#holes_dye_2').val(x);
        } else if (point == 3) {
            var x = jQuery('#holes_dye_3').val();
            var x = parseInt(x) + 1;
            $('#holes_dye_3').val(x);
        } else if (point == 4) {
            var x = jQuery('#holes_dye_4').val();
            var x = parseInt(x) + 1;
            $('#holes_dye_4').val(x);
        }
    });
});
$(document).ready(function () {
    $("#kurang_holes_dye").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#holes_dye_1').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#holes_dye_1').val() = 0;
            } else {
                $('#holes_dye_1').val(x);
            }
        } else if (point == 2) {
            var x = jQuery('#holes_dye_2').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#holes_dye_2').val() = 0;
            } else {
                $('#holes_dye_2').val(x);
            }
        } else if (point == 3) {
            var x = jQuery('#holes_dye_3').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#holes_dye_3').val() = 0;
            } else {
                $('#holes_dye_3').val(x);
            }
        } else if (point == 4) {
            var x = jQuery('#holes_dye_4').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#holes_dye_4').val() = 0;
            } else {
                $('#holes_dye_4').val(x);
            }
        }
    });
});

// COLOR
$(document).ready(function () {
    $("#tambah_color").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#color_1').val();
            var x = parseInt(x) + 1;
            $('#color_1').val(x);
        } else if (point == 2) {
            var x = jQuery('#color_2').val();
            var x = parseInt(x) + 1;
            $('#color_2').val(x);
        } else if (point == 3) {
            var x = jQuery('#color_3').val();
            var x = parseInt(x) + 1;
            $('#color_3').val(x);
        } else if (point == 4) {
            var x = jQuery('#color_4').val();
            var x = parseInt(x) + 1;
            $('#color_4').val(x);
        }
    });
});
$(document).ready(function () {
    $("#kurang_color").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#color_1').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#color_1').val() = 0;
            } else {
                $('#color_1').val(x);
            }
        } else if (point == 2) {
            var x = jQuery('#color_2').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#color_2').val() = 0;
            } else {
                $('#color_2').val(x);
            }
        } else if (point == 3) {
            var x = jQuery('#color_3').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#color_3').val() = 0;
            } else {
                $('#color_3').val(x);
            }
        } else if (point == 4) {
            var x = jQuery('#color_4').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#color_4').val() = 0;
            } else {
                $('#color_4').val(x);
            }
        }
    });
});

// ABRASION
$(document).ready(function () {
    $("#tambah_abrasion").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#abrasion_1').val();
            var x = parseInt(x) + 1;
            $('#abrasion_1').val(x);
        } else if (point == 2) {
            var x = jQuery('#abrasion_2').val();
            var x = parseInt(x) + 1;
            $('#abrasion_2').val(x);
        } else if (point == 3) {
            var x = jQuery('#abrasion_3').val();
            var x = parseInt(x) + 1;
            $('#abrasion_3').val(x);
        } else if (point == 4) {
            var x = jQuery('#abrasion_4').val();
            var x = parseInt(x) + 1;
            $('#abrasion_4').val(x);
        }

    });
});
$(document).ready(function () {
    $("#kurang_abrasion").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#abrasion_1').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#abrasion_1').val() = 0;
            } else {
                $('#abrasion_1').val(x);
            }
        } else if (point == 2) {
            var x = jQuery('#abrasion_2').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#abrasion_2').val() = 0;
            } else {
                $('#abrasion_2').val(x);
            }
        } else if (point == 3) {
            var x = jQuery('#abrasion_3').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#abrasion_3').val() = 0;
            } else {
                $('#abrasion_3').val(x);
            }
        } else if (point == 4) {
            var x = jQuery('#abrasion_4').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#abrasion_4').val() = 0;
            } else {
                $('#abrasion_4').val(x);
            }
        }
    });
});

// DYE SPOT
$(document).ready(function () {
    $("#tambah_dye_spot").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#dye_spot_1').val();
            var x = parseInt(x) + 1;
            $('#dye_spot_1').val(x);
        } else if (point == 2) {
            var x = jQuery('#dye_spot_2').val();
            var x = parseInt(x) + 1;
            $('#dye_spot_2').val(x);
        } else if (point == 3) {
            var x = jQuery('#dye_spot_3').val();
            var x = parseInt(x) + 1;
            $('#dye_spot_3').val(x);
        } else if (point == 4) {
            var x = jQuery('#dye_spot_4').val();
            var x = parseInt(x) + 1;
            $('#dye_spot_4').val(x);
        }
    });
});
$(document).ready(function () {
    $("#kurang_dye_spot").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#dye_spot_1').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#dye_spot_1').val() = 0;
            } else {
                $('#dye_spot_1').val(x);
            }
        } else if (point == 2) {
            var x = jQuery('#dye_spot_2').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#dye_spot_2').val() = 0;
            } else {
                $('#dye_spot_2').val(x);
            }
        } else if (point == 3) {
            var x = jQuery('#dye_spot_3').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#dye_spot_3').val() = 0;
            } else {
                $('#dye_spot_3').val(x);
            }
        } else if (point == 4) {
            var x = jQuery('#dye_spot_4').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#dye_spot_4').val() = 0;
            } else {
                $('#dye_spot_4').val(x);
            }
        }
    });
});

// WRINKLES
$(document).ready(function () {
    $("#tambah_wrinkles").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#wrinkles_1').val();
            var x = parseInt(x) + 1;
            $('#wrinkles_1').val(x);
        } else if (point == 2) {
            var x = jQuery('#wrinkles_2').val();
            var x = parseInt(x) + 1;
            $('#wrinkles_2').val(x);
        } else if (point == 3) {
            var x = jQuery('#wrinkles_3').val();
            var x = parseInt(x) + 1;
            $('#wrinkles_3').val(x);
        } else if (point == 4) {
            var x = jQuery('#wrinkles_4').val();
            var x = parseInt(x) + 1;
            $('#wrinkles_4').val(x);
        }
    });
});
$(document).ready(function () {
    $("#kurang_wrinkles").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#wrinkles_1').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#wrinkles_1').val() = 0;
            } else {
                $('#wrinkles_1').val(x);
            }
        } else if (point == 2) {
            var x = jQuery('#wrinkles_2').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#wrinkles_2').val() = 0;
            } else {
                $('#wrinkles_2').val(x);
            }
        } else if (point == 3) {
            var x = jQuery('#wrinkles_3').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#wrinkles_3').val() = 0;
            } else {
                $('#wrinkles_3').val(x);
            }
        } else if (point == 4) {
            var x = jQuery('#wrinkles_4').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#wrinkles_4').val() = 0;
            } else {
                $('#wrinkles_4').val(x);
            }
        }
    });
});

// BOWING
$(document).ready(function () {
    $("#tambah_bowing").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#bowing_1').val();
            var x = parseInt(x) + 1;
            $('#bowing_1').val(x);
        } else if (point == 2) {
            var x = jQuery('#bowing_2').val();
            var x = parseInt(x) + 1;
            $('#bowing_2').val(x);
        } else if (point == 3) {
            var x = jQuery('#bowing_3').val();
            var x = parseInt(x) + 1;
            $('#bowing_3').val(x);
        } else if (point == 4) {
            var x = jQuery('#bowing_4').val();
            var x = parseInt(x) + 1;
            $('#bowing_4').val(x);
        }
    });
});
$(document).ready(function () {
    $("#kurang_bowing").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#bowing_1').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#bowing_1').val() = 0;
            } else {
                $('#bowing_1').val(x);
            }
        } else if (point == 2) {
            var x = jQuery('#bowing_2').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#bowing_2').val() = 0;
            } else {
                $('#bowing_2').val(x);
            }
        } else if (point == 3) {
            var x = jQuery('#bowing_3').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#bowing_3').val() = 0;
            } else {
                $('#bowing_3').val(x);
            }
        } else if (point == 4) {
            var x = jQuery('#bowing_4').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#bowing_4').val() = 0;
            } else {
                $('#bowing_4').val(x);
            }
        }
    });
});

// PIN
$(document).ready(function () {
    $("#tambah_pin").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#pin_1').val();
            var x = parseInt(x) + 1;
            $('#pin_1').val(x);
        } else if (point == 2) {
            var x = jQuery('#pin_2').val();
            var x = parseInt(x) + 1;
            $('#pin_2').val(x);
        } else if (point == 3) {
            var x = jQuery('#pin_3').val();
            var x = parseInt(x) + 1;
            $('#pin_3').val(x);
        } else if (point == 4) {
            var x = jQuery('#pin_4').val();
            var x = parseInt(x) + 1;
            $('#pin_4').val(x);
        }
    });
});
$(document).ready(function () {
    $("#kurang_pin").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#pin_1').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#pin_1').val() = 0;
            } else {
                $('#pin_1').val(x);
            }
        } else if (point == 2) {
            var x = jQuery('#pin_2').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#pin_2').val() = 0;
            } else {
                $('#pin_2').val(x);
            }
        } else if (point == 3) {
            var x = jQuery('#pin_3').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#pin_3').val() = 0;
            } else {
                $('#pin_3').val(x);
            }
        } else if (point == 4) {
            var x = jQuery('#pin_4').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#pin_4').val() = 0;
            } else {
                $('#pin_4').val(x);
            }
        }

    });
});

// PICK
$(document).ready(function () {
    $("#tambah_pick").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#pick_1').val();
            var x = parseInt(x) + 1;
            $('#pick_1').val(x);
        } else if (point == 2) {
            var x = jQuery('#pick_2').val();
            var x = parseInt(x) + 1;
            $('#pick_2').val(x);
        } else if (point == 3) {
            var x = jQuery('#pick_3').val();
            var x = parseInt(x) + 1;
            $('#pick_3').val(x);
        } else if (point == 4) {
            var x = jQuery('#pick_4').val();
            var x = parseInt(x) + 1;
            $('#pick_4').val(x);
        }
    });
});
$(document).ready(function () {
    $("#kurang_pick").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#pick_1').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#pick_1').val() = 0;
            } else {
                $('#pick_1').val(x);
            }
        } else if (point == 2) {
            var x = jQuery('#pick_2').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#pick_2').val() = 0;
            } else {
                $('#pick_2').val(x);
            }
        } else if (point == 3) {
            var x = jQuery('#pick_3').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#pick_3').val() = 0;
            } else {
                $('#pick_3').val(x);
            }
        } else if (point == 4) {
            var x = jQuery('#pick_4').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#pick_4').val() = 0;
            } else {
                $('#pick_4').val(x);
            }
        }
    });
});

// KNOT 2
$(document).ready(function () {
    $("#tambah_knot2").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#knot2_1').val();
            var x = parseInt(x) + 1;
            $('#knot2_1').val(x);
        } else if (point == 2) {
            var x = jQuery('#knot2_2').val();
            var x = parseInt(x) + 1;
            $('#knot2_2').val(x);
        } else if (point == 3) {
            var x = jQuery('#knot2_3').val();
            var x = parseInt(x) + 1;
            $('#knot2_3').val(x);
        } else if (point == 4) {
            var x = jQuery('#knot2_4').val();
            var x = parseInt(x) + 1;
            $('#knot2_4').val(x);
        }
    });
});
$(document).ready(function () {
    $("#kurang_knot2").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#knot2_1').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#knot2_1').val() = 0;
            } else {
                $('#knot2_1').val(x);
            }
        } else if (point == 2) {
            var x = jQuery('#knot2_2').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#knot2_2').val() = 0;
            } else {
                $('#knot2_2').val(x);
            }
        } else if (point == 3) {
            var x = jQuery('#knot2_3').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#knot2_3').val() = 0;
            } else {
                $('#knot2_3').val(x);
            }
        } else if (point == 4) {
            var x = jQuery('#knot2_4').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#knot2_4').val() = 0;
            } else {
                $('#knot2_4').val(x);
            }
        }
    });
});

// KNOT 2
$(document).ready(function () {
    $("#tambah_misc3").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#misc3_1').val();
            var x = parseInt(x) + 1;
            $('#misc3_1').val(x);
        } else if (point == 2) {
            var x = jQuery('#misc3_2').val();
            var x = parseInt(x) + 1;
            $('#misc3_2').val(x);
        } else if (point == 3) {
            var x = jQuery('#misc3_3').val();
            var x = parseInt(x) + 1;
            $('#misc3_3').val(x);
        } else if (point == 4) {
            var x = jQuery('#misc3_4').val();
            var x = parseInt(x) + 1;
            $('#misc3_4').val(x);
        }
    });
});
$(document).ready(function () {
    $("#kurang_misc3").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#misc3_1').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#misc3_1').val() = 0;
            } else {
                $('#misc3_1').val(x);
            }
        } else if (point == 2) {
            var x = jQuery('#misc3_2').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#misc3_2').val() = 0;
            } else {
                $('#misc3_2').val(x);
            }
        } else if (point == 3) {
            var x = jQuery('#misc3_3').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#misc3_3').val() = 0;
            } else {
                $('#misc3_3').val(x);
            }
        } else if (point == 4) {
            var x = jQuery('#misc3_4').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#misc3_4').val() = 0;
            } else {
                $('#misc3_4').val(x);
            }
        }
    });
});

// -----------------------CELANING DEFECT-------------------
// UEVEN SHEARING
$(document).ready(function () {
    $("#tambah_ueven").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#ueven_1').val();
            var x = parseInt(x) + 1;
            $('#ueven_1').val(x);
        } else if (point == 2) {
            var x = jQuery('#ueven_2').val();
            var x = parseInt(x) + 1;
            $('#ueven_2').val(x);
        } else if (point == 3) {
            var x = jQuery('#ueven_3').val();
            var x = parseInt(x) + 1;
            $('#ueven_3').val(x);
        } else if (point == 4) {
            var x = jQuery('#ueven_4').val();
            var x = parseInt(x) + 1;
            $('#ueven_4').val(x);
        }
    });
});
$(document).ready(function () {
    $("#kurang_ueven").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#ueven_1').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#ueven_1').val() = 0;
            } else {
                $('#ueven_1').val(x);
            }
        } else if (point == 2) {
            var x = jQuery('#ueven_2').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#ueven_2').val() = 0;
            } else {
                $('#ueven_2').val(x);
            }
        } else if (point == 3) {
            var x = jQuery('#ueven_3').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#ueven_3').val() = 0;
            } else {
                $('#ueven_3').val(x);
            }
        } else if (point == 4) {
            var x = jQuery('#ueven_4').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#ueven_4').val() = 0;
            } else {
                $('#ueven_4').val(x);
            }
        }
    });
});

// STAINS
$(document).ready(function () {
    $("#tambah_stains").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#stains_1').val();
            var x = parseInt(x) + 1;
            $('#stains_1').val(x);
        } else if (point == 2) {
            var x = jQuery('#stains_2').val();
            var x = parseInt(x) + 1;
            $('#stains_2').val(x);
        } else if (point == 3) {
            var x = jQuery('#stains_3').val();
            var x = parseInt(x) + 1;
            $('#stains_3').val(x);
        } else if (point == 4) {
            var x = jQuery('#stains_4').val();
            var x = parseInt(x) + 1;
            $('#stains_4').val(x);
        }
    });
});
$(document).ready(function () {
    $("#kurang_stains").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#stains_1').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#stains_1').val() = 0;
            } else {
                $('#stains_1').val(x);
            }
        } else if (point == 2) {
            var x = jQuery('#stains_2').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#stains_2').val() = 0;
            } else {
                $('#stains_2').val(x);
            }
        } else if (point == 3) {
            var x = jQuery('#stains_3').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#stains_3').val() = 0;
            } else {
                $('#stains_3').val(x);
            }
        } else if (point == 4) {
            var x = jQuery('#stains_4').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#stains_4').val() = 0;
            } else {
                $('#stains_4').val(x);
            }
        }

    });
});

// OIL GREASE
$(document).ready(function () {
    $("#tambah_oil_grease").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#oil_grease_1').val();
            var x = parseInt(x) + 1;
            $('#oil_grease_1').val(x);
        } else if (point == 2) {
            var x = jQuery('#oil_grease_2').val();
            var x = parseInt(x) + 1;
            $('#oil_grease_2').val(x);
        } else if (point == 3) {
            var x = jQuery('#oil_grease_3').val();
            var x = parseInt(x) + 1;
            $('#oil_grease_3').val(x);
        } else if (point == 4) {
            var x = jQuery('#oil_grease_4').val();
            var x = parseInt(x) + 1;
            $('#oil_grease_4').val(x);
        }
    });
});
$(document).ready(function () {
    $("#kurang_oil_grease").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#oil_grease_1').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#oil_grease_1').val() = 0;
            } else {
                $('#oil_grease_1').val(x);
            }
        } else if (point == 2) {
            var x = jQuery('#oil_grease_2').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#oil_grease_2').val() = 0;
            } else {
                $('#oil_grease_2').val(x);
            }
        } else if (point == 3) {
            var x = jQuery('#oil_grease_3').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#oil_grease_3').val() = 0;
            } else {
                $('#oil_grease_3').val(x);
            }
        } else if (point == 4) {
            var x = jQuery('#oil_grease_4').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#oil_grease_4').val() = 0;
            } else {
                $('#oil_grease_4').val(x);
            }
        }

    });
});

// DIRT
$(document).ready(function () {
    $("#tambah_dirt").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#dirt_1').val();
            var x = parseInt(x) + 1;
            $('#dirt_1').val(x);
        } else if (point == 2) {
            var x = jQuery('#dirt_2').val();
            var x = parseInt(x) + 1;
            $('#dirt_2').val(x);
        } else if (point == 3) {
            var x = jQuery('#dirt_3').val();
            var x = parseInt(x) + 1;
            $('#dirt_3').val(x);
        } else if (point == 4) {
            var x = jQuery('#dirt_4').val();
            var x = parseInt(x) + 1;
            $('#dirt_4').val(x);
        }
    });
});
$(document).ready(function () {
    $("#kurang_dirt").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#dirt_1').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#dirt_1').val() = 0;
            } else {
                $('#dirt_1').val(x);
            }
        } else if (point == 2) {
            var x = jQuery('#dirt_2').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#dirt_2').val() = 0;
            } else {
                $('#dirt_2').val(x);
            }
        } else if (point == 3) {
            var x = jQuery('#dirt_3').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#dirt_3').val() = 0;
            } else {
                $('#dirt_3').val(x);
            }
        } else if (point == 4) {
            var x = jQuery('#dirt_4').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#dirt_4').val() = 0;
            } else {
                $('#dirt_4').val(x);
            }
        }
    });
});

// WATER
$(document).ready(function () {
    $("#tambah_water").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#water_1').val();
            var x = parseInt(x) + 1;
            $('#water_1').val(x);
        } else if (point == 2) {
            var x = jQuery('#water_2').val();
            var x = parseInt(x) + 1;
            $('#water_2').val(x);
        } else if (point == 3) {
            var x = jQuery('#water_3').val();
            var x = parseInt(x) + 1;
            $('#water_3').val(x);
        } else if (point == 4) {
            var x = jQuery('#water_4').val();
            var x = parseInt(x) + 1;
            $('#water_4').val(x);
        }
    });
});
$(document).ready(function () {
    $("#kurang_water").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#water_1').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#water_1').val() = 0;
            } else {
                $('#water_1').val(x);
            }
        } else if (point == 2) {
            var x = jQuery('#water_2').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#water_2').val() = 0;
            } else {
                $('#water_2').val(x);
            }
        } else if (point == 3) {
            var x = jQuery('#water_3').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#water_3').val() = 0;
            } else {
                $('#water_3').val(x);
            }
        } else if (point == 4) {
            var x = jQuery('#water_4').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#water_4').val() = 0;
            } else {
                $('#water_4').val(x);
            }
        }
    });
});

// MISC 4
$(document).ready(function () {
    $("#tambah_misc4").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#misc4_1').val();
            var x = parseInt(x) + 1;
            $('#misc4_1').val(x);
        } else if (point == 2) {
            var x = jQuery('#misc4_2').val();
            var x = parseInt(x) + 1;
            $('#misc4_2').val(x);
        } else if (point == 3) {
            var x = jQuery('#misc4_3').val();
            var x = parseInt(x) + 1;
            $('#misc4_3').val(x);
        } else if (point == 4) {
            var x = jQuery('#misc4_4').val();
            var x = parseInt(x) + 1;
            $('#misc4_4').val(x);
        }
    });
});
$(document).ready(function () {
    $("#kurang_misc4").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#misc4_1').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#misc4_1').val() = 0;
            } else {
                $('#misc4_1').val(x);
            }
        } else if (point == 2) {
            var x = jQuery('#misc4_2').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#misc4_2').val() = 0;
            } else {
                $('#misc4_2').val(x);
            }
        } else if (point == 3) {
            var x = jQuery('#misc4_3').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#misc4_3').val() = 0;
            } else {
                $('#misc4_3').val(x);
            }
        } else if (point == 4) {
            var x = jQuery('#misc4_4').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#misc4_4').val() = 0;
            } else {
                $('#misc4_4').val(x);
            }
        }
    });
});

// -----------------------CONSTRUCTION-------------------
// PRINT
$(document).ready(function () {
    $("#tambah_print_defect").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#print_defect_1').val();
            var x = parseInt(x) + 1;
            $('#print_defect_1').val(x);
        } else if (point == 2) {
            var x = jQuery('#print_defect_2').val();
            var x = parseInt(x) + 1;
            $('#print_defect_2').val(x);
        } else if (point == 3) {
            var x = jQuery('#print_defect_3').val();
            var x = parseInt(x) + 1;
            $('#print_defect_3').val(x);
        } else if (point == 4) {
            var x = jQuery('#print_defect_4').val();
            var x = parseInt(x) + 1;
            $('#print_defect_4').val(x);
        }
    });
});
$(document).ready(function () {
    $("#kurang_print_defect").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#print_defect_1').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#print_defect_1').val() = 0;
            } else {
                $('#print_defect_1').val(x);
            }
        } else if (point == 2) {
            var x = jQuery('#print_defect_2').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#print_defect_2').val() = 0;
            } else {
                $('#print_defect_2').val(x);
            }
        } else if (point == 3) {
            var x = jQuery('#print_defect_3').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#print_defect_3').val() = 0;
            } else {
                $('#print_defect_3').val(x);
            }
        } else if (point == 4) {
            var x = jQuery('#print_defect_4').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#print_defect_4').val() = 0;
            } else {
                $('#print_defect_4').val(x);
            }
        }
    });
});

// MISC 5
$(document).ready(function () {
    $("#tambah_misc5").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#misc5_1').val();
            var x = parseInt(x) + 1;
            $('#misc5_1').val(x);
        } else if (point == 2) {
            var x = jQuery('#misc5_2').val();
            var x = parseInt(x) + 1;
            $('#misc5_2').val(x);
        } else if (point == 3) {
            var x = jQuery('#misc5_3').val();
            var x = parseInt(x) + 1;
            $('#misc5_3').val(x);
        } else if (point == 4) {
            var x = jQuery('#misc5_4').val();
            var x = parseInt(x) + 1;
            $('#misc5_4').val(x);
        }
    });
});
$(document).ready(function () {
    $("#kurang_misc5").click(function () {
        var point = document.getElementById("point").value;

        if (point == 1) {
            var x = jQuery('#misc5_1').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#misc5_1').val() = 0;
            } else {
                $('#misc5_1').val(x);
            }
        } else if (point == 2) {
            var x = jQuery('#misc5_2').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#misc5_2').val() = 0;
            } else {
                $('#misc5_2').val(x);
            }
        } else if (point == 3) {
            var x = jQuery('#misc5_3').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#misc5_3').val() = 0;
            } else {
                $('#misc5_3').val(x);
            }
        } else if (point == 4) {
            var x = jQuery('#misc5_4').val();
            var x = parseInt(x) - 1;
            if (x < 0) {
                $('#misc5_4').val() = 0;
            } else {
                $('#misc5_4').val(x);
            }
        }
    });
});