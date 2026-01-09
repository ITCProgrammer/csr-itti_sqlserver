<?php 
    $nokk                       = $_POST['nokk'];
    $tgl                        = $_POST['tgl'];
    $roll_no                    = $_POST['roll_no'];
    $actual_fabric_weight       = $_POST['actual_fabric_weight'];
    $satuan_fabric_weight       = "gr/m2";
    $actual_width               = $_POST['actual_width'];
    $satuan_width               = $_POST['satuan_width'];
    $default_length             = $_POST['default_length'];
    $satuan_default_length      = $_POST['satuan_default_length'];
    $total_point                = $_POST['total_point'];
    $grade_point                = $_POST['grade_point'];
    $u_extra_point              = $_POST['u_extra_point'];
    $extra_point                = $_POST['extra_point'];
    $total_counts               = $_POST['total_counts'];
    $grade_counts               = $_POST['grade_counts'];
    $u_extra_counts             = $_POST['u_extra_counts'];
    $extra_counts               = $_POST['extra_counts'];
    $keterangan                 = $_POST['keterangan'];
    $ket_inspek                 = $_POST['ket_inspek'];

    // YARN DEFECT
        $slub_yd1                    = $_POST['slubb1'];
        $slub_yd2                    = $_POST['slubb2'];
        $slub_yd3                    = $_POST['slubb3'];
        $slub_yd4                    = $_POST['slubb4'];
        $barre_yd1                   = $_POST['barre_defect1'];
        $barre_yd2                   = $_POST['barre_defect2'];
        $barre_yd3                   = $_POST['barre_defect3'];
        $barre_yd4                   = $_POST['barre_defect4'];
        $uneven_yarn_yd1             = $_POST['uneven1'];
        $uneven_yarn_yd2             = $_POST['uneven2'];
        $uneven_yarn_yd3             = $_POST['uneven3'];
        $uneven_yarn_yd4             = $_POST['uneven4'];
        $yarn_contamination_yd1      = $_POST['yarn1'];
        $yarn_contamination_yd2      = $_POST['yarn2'];
        $yarn_contamination_yd3      = $_POST['yarn3'];
        $yarn_contamination_yd4      = $_POST['yarn4'];
        $neps_dead_cotton_yd1        = $_POST['neps1'];
        $neps_dead_cotton_yd2        = $_POST['neps2'];
        $neps_dead_cotton_yd3        = $_POST['neps3'];
        $neps_dead_cotton_yd4        = $_POST['neps4'];
        $misc_yd1                    = $_POST['misc1'];
        $misc_yd2                    = $_POST['misc2'];
        $misc_yd3                    = $_POST['misc3'];
        $misc_yd4                    = $_POST['misc4'];
    // YARN DEFECT
 
    // CONSTRUCTION DEFECT
        $missing_line_cd1            = $_POST['missing1'];
        $missing_line_cd2            = $_POST['missing2'];
        $missing_line_cd3            = $_POST['missing3'];
        $missing_line_cd4            = $_POST['missing4'];
        $holes_cd1                   = $_POST['holes1'];
        $holes_cd2                   = $_POST['holes2'];
        $holes_cd3                   = $_POST['holes3'];
        $holes_cd4                   = $_POST['holes4'];
        $steaks_cd1                  = $_POST['steaks1'];
        $steaks_cd2                  = $_POST['steaks2'];
        $steaks_cd3                  = $_POST['steaks3'];
        $steaks_cd4                  = $_POST['steaks4'];
        $misknit_cd1                 = $_POST['misknit1'];
        $misknit_cd2                 = $_POST['misknit2'];
        $misknit_cd3                 = $_POST['misknit3'];
        $misknit_cd4                 = $_POST['misknit4'];
        $knot_cd1                    = $_POST['knot1'];
        $knot_cd2                    = $_POST['knot2'];
        $knot_cd3                    = $_POST['knot3'];
        $knot_cd4                    = $_POST['knot4'];
        $oil_mark_cd1                = $_POST['oil1'];
        $oil_mark_cd2                = $_POST['oil2'];
        $oil_mark_cd3                = $_POST['oil3'];
        $oil_mark_cd4                = $_POST['oil4'];
        $fly_cd1                     = $_POST['fly1'];
        $fly_cd2                     = $_POST['fly2'];
        $fly_cd3                     = $_POST['fly3'];
        $fly_cd4                     = $_POST['fly4'];
        $misc_cd1                    = $_POST['misc21'];
        $misc_cd2                    = $_POST['misc22'];
        $misc_cd3                    = $_POST['misc23'];
        $misc_cd4                    = $_POST['misc24'];
    // CONSTRUCTION DEFECT

    // DYE & FINISHING DEFECT
        $hairiness_dfd1              = $_POST['hairiness1'];
        $hairiness_dfd2              = $_POST['hairiness2'];
        $hairiness_dfd3              = $_POST['hairiness3'];
        $hairiness_dfd4              = $_POST['hairiness4'];
        $holes_dfd1                  = $_POST['holes_dye1'];
        $holes_dfd2                  = $_POST['holes_dye2'];
        $holes_dfd3                  = $_POST['holes_dye3'];
        $holes_dfd4                  = $_POST['holes_dye4'];
        $color_tone_dfd1             = $_POST['color1'];
        $color_tone_dfd2             = $_POST['color2'];
        $color_tone_dfd3             = $_POST['color3'];
        $color_tone_dfd4             = $_POST['color4'];
        $abrasion_dfd1               = $_POST['abrasion1'];
        $abrasion_dfd2               = $_POST['abrasion2'];
        $abrasion_dfd3               = $_POST['abrasion3'];
        $abrasion_dfd4               = $_POST['abrasion4'];
        $dye_spot_dfd1               = $_POST['dye_spot1'];
        $dye_spot_dfd2               = $_POST['dye_spot2'];
        $dye_spot_dfd3               = $_POST['dye_spot3'];
        $dye_spot_dfd4               = $_POST['dye_spot4'];
        $wrinkless_fold_dfd1         = $_POST['wrinkles1'];
        $wrinkless_fold_dfd2         = $_POST['wrinkles2'];
        $wrinkless_fold_dfd3         = $_POST['wrinkles3'];
        $wrinkless_fold_dfd4         = $_POST['wrinkles4'];
        $bowing_skewing_dfd1         = $_POST['bowing1'];
        $bowing_skewing_dfd2         = $_POST['bowing2'];
        $bowing_skewing_dfd3         = $_POST['bowing3'];
        $bowing_skewing_dfd4         = $_POST['bowing4'];
        $pin_holes_dfd1              = $_POST['pin1'];
        $pin_holes_dfd2              = $_POST['pin2'];
        $pin_holes_dfd3              = $_POST['pin3'];
        $pin_holes_dfd4              = $_POST['pin4'];
        $pick_dfd1                   = $_POST['pick1'];
        $pick_dfd2                   = $_POST['pick2'];
        $pick_dfd3                   = $_POST['pick3'];
        $pick_dfd4                   = $_POST['pick4'];
        $knot_dfd1                   = $_POST['knot21'];
        $knot_dfd2                   = $_POST['knot22'];
        $knot_dfd3                   = $_POST['knot23'];
        $knot_dfd4                   = $_POST['knot24'];
        $misc_dfd1                   = $_POST['misc31'];
        $misc_dfd2                   = $_POST['misc32'];
        $misc_dfd3                   = $_POST['misc33'];
        $misc_dfd4                   = $_POST['misc34'];
    // DYE & FINISHING DEFECT

    // CLEANLINESS DEFECT
        $ueven_shearing_cld1         = $_POST['ueven1'];
        $ueven_shearing_cld2         = $_POST['ueven2'];
        $ueven_shearing_cld3         = $_POST['ueven3'];
        $ueven_shearing_cld4         = $_POST['ueven4'];
        $stans_cld1                  = $_POST['stains1'];
        $stans_cld2                  = $_POST['stains2'];
        $stans_cld3                  = $_POST['stains3'];
        $stans_cld4                  = $_POST['stains4'];
        $oil_grease_cld1             = $_POST['oil_grease1'];
        $oil_grease_cld2             = $_POST['oil_grease2'];
        $oil_grease_cld3             = $_POST['oil_grease3'];
        $oil_grease_cld4             = $_POST['oil_grease4'];
        $dirt_cld1                   = $_POST['dirt1'];
        $dirt_cld2                   = $_POST['dirt2'];
        $dirt_cld3                   = $_POST['dirt3'];
        $dirt_cld4                   = $_POST['dirt4'];
        $water_cld1                  = $_POST['water1'];
        $water_cld2                  = $_POST['water2'];
        $water_cld3                  = $_POST['water3'];
        $water_cld4                  = $_POST['water4'];
        $misc_cld1                   = $_POST['misc41'];
        $misc_cld2                   = $_POST['misc42'];
        $misc_cld3                   = $_POST['misc43'];
        $misc_cld4                   = $_POST['misc44'];
    // CLEANLINESS DEFECT

    // PRINT DEFECT
        $print_pd1                   = $_POST['print_defect1'];
        $print_pd2                   = $_POST['print_defect2'];
        $print_pd3                   = $_POST['print_defect3'];
        $print_pd4                   = $_POST['print_defect4'];
        $misc_pd1                    = $_POST['misc51'];
        $misc_pd2                    = $_POST['misc52'];
        $misc_pd3                    = $_POST['misc53'];
        $misc_pd4                    = $_POST['misc54'];
    // PRINT DEFECT

    $sql_cek_noroll     = mysqli_query($con,"SELECT * FROM tbl_inspeksi_kain WHERE roll_no = '$roll_no' AND nokk = '$nokk'");
    $dataRoll           = mysqli_fetch_assoc($sql_cek_noroll);

    if ($dataRoll['roll_no'] && $nokk) { 
        $id_inspek  = $_POST['id_inspek'];
        $sql_inspeksi_kain = mysqli_query($con,"UPDATE tbl_inspeksi_kain 
                                            SET
                                                tgl = '$tgl',
                                                actual_fabric_weight = '$actual_fabric_weight',
                                                satuan_fabric_weight = '$satuan_fabric_weight',
                                                actual_width = '$actual_width',
                                                satuan_width = '$satuan_width',
                                                default_length = '$default_length',
                                                satuan_default_length = '$satuan_default_length',
                                                total_point = '$total_point',
                                                grade_point = '$grade_point',
                                                u_extra_point = '$u_extra_point',
                                                extra_point = '$extra_point',
                                                total_counts = '$total_counts',
                                                grade_counts = '$grade_counts',
                                                u_extra_counts = '$u_extra_counts',
                                                extra_counts = '$extra_counts',
                                                ket = '$keterangan',
                                                ket_inspek = '$ket_inspek'
                                            WHERE nokk = '$nokk' AND roll_no = '$roll_no'") or die (mysqli_error());
        $sql_detail_inspeksi_kain = mysqli_query($con,"UPDATE tbl_defect_inspeksi_kain 
                                                    SET 
                                                id_inspek_kain = '$id_inspek',
                                                slub_yd1 = '$slub_yd1',
                                                slub_yd2 = '$slub_yd2',
                                                slub_yd3 = '$slub_yd3',
                                                slub_yd4 = '$slub_yd4',
                                                barre_yd1 = '$barre_yd1',
                                                barre_yd2 = '$barre_yd2',
                                                barre_yd3 = '$barre_yd3',
                                                barre_yd4 = '$barre_yd4',
                                                uneven_yarn_yd1 = '$uneven_yarn_yd1',
                                                uneven_yarn_yd2 = '$uneven_yarn_yd2',
                                                uneven_yarn_yd3 = '$uneven_yarn_yd3',
                                                uneven_yarn_yd4 = '$uneven_yarn_yd4',
                                                yarn_contamination_yd1 = '$yarn_contamination_yd1',
                                                yarn_contamination_yd2 = '$yarn_contamination_yd2',
                                                yarn_contamination_yd3 = '$yarn_contamination_yd3',
                                                yarn_contamination_yd4 = '$yarn_contamination_yd4',
                                                neps_dead_cotton_yd1 = '$neps_dead_cotton_yd1',
                                                neps_dead_cotton_yd2 = '$neps_dead_cotton_yd2',
                                                neps_dead_cotton_yd3 = '$neps_dead_cotton_yd3',
                                                neps_dead_cotton_yd4 = '$neps_dead_cotton_yd4',
                                                misc_yd1 = '$misc_yd1',
                                                misc_yd2 = '$misc_yd2',
                                                misc_yd3 = '$misc_yd3',
                                                misc_yd4 = '$misc_yd4',
                                                missing_line_cd1 = '$missing_line_cd1',
                                                missing_line_cd2 = '$missing_line_cd2',
                                                missing_line_cd3 = '$missing_line_cd3',
                                                missing_line_cd4 = '$missing_line_cd4',
                                                holes_cd1 = '$holes_cd1',
                                                holes_cd2 = '$holes_cd2',
                                                holes_cd3 = '$holes_cd3',
                                                holes_cd4 = '$holes_cd4',
                                                steaks_cd1 = '$steaks_cd1',
                                                steaks_cd2 = '$steaks_cd2',
                                                steaks_cd3 = '$steaks_cd3',
                                                steaks_cd4 = '$steaks_cd4',
                                                misknit_cd1 = '$misknit_cd1',
                                                misknit_cd2 = '$misknit_cd2',
                                                misknit_cd3 = '$misknit_cd3',
                                                misknit_cd4 = '$misknit_cd4',
                                                knot_cd1 = '$knot_cd1',
                                                knot_cd2 = '$knot_cd2',
                                                knot_cd3 = '$knot_cd3',
                                                knot_cd4 = '$knot_cd4',
                                                oil_mark_cd1 = '$oil_mark_cd1',
                                                oil_mark_cd2 = '$oil_mark_cd2',
                                                oil_mark_cd3 = '$oil_mark_cd3',
                                                oil_mark_cd4 = '$oil_mark_cd4',
                                                fly_cd1 = '$fly_cd1',
                                                fly_cd2 = '$fly_cd2',
                                                fly_cd3 = '$fly_cd3',
                                                fly_cd4 = '$fly_cd4',
                                                misc_cd1 = '$misc_cd1',
                                                misc_cd2 = '$misc_cd2',
                                                misc_cd3 = '$misc_cd3',
                                                misc_cd4 = '$misc_cd4',
                                                hairiness_dfd1 = '$hairiness_dfd1',
                                                hairiness_dfd2 = '$hairiness_dfd2',
                                                hairiness_dfd3 = '$hairiness_dfd3',
                                                hairiness_dfd4 = '$hairiness_dfd4',
                                                holes_dfd1 = '$holes_dfd1',
                                                holes_dfd2 = '$holes_dfd2',
                                                holes_dfd3 = '$holes_dfd3',
                                                holes_dfd4 = '$holes_dfd4',
                                                color_tone_dfd1 = '$color_tone_dfd1',
                                                color_tone_dfd2 = '$color_tone_dfd2',
                                                color_tone_dfd3 = '$color_tone_dfd3',
                                                color_tone_dfd4 = '$color_tone_dfd4',
                                                abrasion_dfd1 = '$abrasion_dfd1',
                                                abrasion_dfd2 = '$abrasion_dfd2',
                                                abrasion_dfd3 = '$abrasion_dfd3',
                                                abrasion_dfd4 = '$abrasion_dfd4',
                                                dye_spot_dfd1 = '$dye_spot_dfd1',
                                                dye_spot_dfd2 = '$dye_spot_dfd2',
                                                dye_spot_dfd3 = '$dye_spot_dfd3',
                                                dye_spot_dfd4 = '$dye_spot_dfd4',
                                                wrinkless_fold_dfd1 = '$wrinkless_fold_dfd1',
                                                wrinkless_fold_dfd2 = '$wrinkless_fold_dfd2',
                                                wrinkless_fold_dfd3 = '$wrinkless_fold_dfd3',
                                                wrinkless_fold_dfd4 = '$wrinkless_fold_dfd4',
                                                bowing_skewing_dfd1 = '$bowing_skewing_dfd1',
                                                bowing_skewing_dfd2 = '$bowing_skewing_dfd2',
                                                bowing_skewing_dfd3 = '$bowing_skewing_dfd3',
                                                bowing_skewing_dfd4 = '$bowing_skewing_dfd4',
                                                pin_holes_dfd1 = '$pin_holes_dfd1',
                                                pin_holes_dfd2 = '$pin_holes_dfd2',
                                                pin_holes_dfd3 = '$pin_holes_dfd3',
                                                pin_holes_dfd4 = '$pin_holes_dfd4',
                                                pick_dfd1 = '$pick_dfd1',
                                                pick_dfd2 = '$pick_dfd2',
                                                pick_dfd3 = '$pick_dfd3',
                                                pick_dfd4 = '$pick_dfd4',
                                                knot_dfd1 = '$knot_dfd1',
                                                knot_dfd2 = '$knot_dfd2',
                                                knot_dfd3 = '$knot_dfd3',
                                                knot_dfd4 = '$knot_dfd4',
                                                misc_dfd1 = '$misc_dfd1',
                                                misc_dfd2 = '$misc_dfd2',
                                                misc_dfd3 = '$misc_dfd3',
                                                misc_dfd4 = '$misc_dfd4',
                                                ueven_shearing_cld1 = '$ueven_shearing_cld1',
                                                ueven_shearing_cld2 = '$ueven_shearing_cld2',
                                                ueven_shearing_cld3 = '$ueven_shearing_cld3',
                                                ueven_shearing_cld4 = '$ueven_shearing_cld4',
                                                stans_cld1 = '$stans_cld1',
                                                stans_cld2 = '$stans_cld2',
                                                stans_cld3 = '$stans_cld3',
                                                stans_cld4 = '$stans_cld4',
                                                oil_grease_cld1 = '$oil_grease_cld1',
                                                oil_grease_cld2 = '$oil_grease_cld2',
                                                oil_grease_cld3 = '$oil_grease_cld3',
                                                oil_grease_cld4 = '$oil_grease_cld4',
                                                dirt_cld1 = '$dirt_cld1',
                                                dirt_cld2 = '$dirt_cld2',
                                                dirt_cld3 = '$dirt_cld3',
                                                dirt_cld4 = '$dirt_cld4',
                                                water_cld1 = '$water_cld1',
                                                water_cld2 = '$water_cld2',
                                                water_cld3 = '$water_cld3',
                                                water_cld4 = '$water_cld4',
                                                misc_cld1 = '$misc_cld1',
                                                misc_cld2 = '$misc_cld2',
                                                misc_cld3 = '$misc_cld3',
                                                misc_cld4 = '$misc_cld4',
                                                print_pd1 = '$print_pd1',
                                                print_pd2 = '$print_pd2',
                                                print_pd3 = '$print_pd3',
                                                print_pd4 = '$print_pd4',
                                                misc_pd1 = '$misc_pd1',
                                                misc_pd2 = '$misc_pd2',
                                                misc_pd3 = '$misc_pd3',
                                                misc_pd4 = '$misc_pd4'
                                            WHERE nokk = '$nokk' AND id_inspek_kain = '$id_inspek'") or die (mysqli_error());
        if($sql_inspeksi_kain && $sql_detail_inspeksi_kain){
            echo    "<script>swal({
                        title: 'Data berhasil diubah',   
                        text: 'Klik Ok untuk input data kembali',
                        type: 'success',
                                }).then((result) => {
                                if (result.value) {
                                window.location.href='FormInspeksiKain-$nokk';
                                document.getElementById('ket_inspek').value = $ket_inspek; 
                                }
                            });
                    </script>";
        }else{
            echo    "<script>swal({
                        title: 'Data tidak berhasil diubah',   
                        text: 'Klik Ok untuk input data kembali',
                        type: 'error',
                                }).then((result) => {
                                if (result.value) {
                                window.location.href='FormInspeksiKain-$nokk'; 
                                document.getElementById('ket_inspek').value = $ket_inspek; 
                                }
                            });
                    </script>";
        }
    } else {
        $sql_inspeksi_kain          = mysqli_query($con,"INSERT INTO tbl_inspeksi_kain SET
                                                        nokk = '$nokk',
                                                        tgl = '$tgl',
                                                        roll_no = '$roll_no',
                                                        actual_fabric_weight = '$actual_fabric_weight',
                                                        satuan_fabric_weight = '$satuan_fabric_weight',
                                                        actual_width = '$actual_width',
                                                        satuan_width = '$satuan_width',
                                                        default_length = '$default_length',
                                                        satuan_default_length = '$satuan_default_length',
                                                        total_point = '$total_point',
                                                        grade_point = '$grade_point',
                                                        u_extra_point = '$u_extra_point',
                                                        extra_point = '$extra_point',
                                                        total_counts = '$total_counts',
                                                        grade_counts = '$grade_counts',
                                                        u_extra_counts = '$u_extra_counts',
                                                        extra_counts = '$extra_counts',
                                                        ket = '$keterangan',
                                                        ket_inspek = '$ket_inspek'",$con) or die (mysqli_error());
                                                $id_inspek = mysqli_insert_id();
        $sql_detail_inspeksi_kain   = mysqli_query($con,"INSERT INTO tbl_defect_inspeksi_kain SET
                                                        id_inspek_kain = '$id_inspek',
                                                        nokk = '$nokk',
                                                        slub_yd1 = '$slub_yd1',
                                                        slub_yd2 = '$slub_yd2',
                                                        slub_yd3 = '$slub_yd3',
                                                        slub_yd4 = '$slub_yd4',
                                                        barre_yd1 = '$barre_yd1',
                                                        barre_yd2 = '$barre_yd2',
                                                        barre_yd3 = '$barre_yd3',
                                                        barre_yd4 = '$barre_yd4',
                                                        uneven_yarn_yd1 = '$uneven_yarn_yd1',
                                                        uneven_yarn_yd2 = '$uneven_yarn_yd2',
                                                        uneven_yarn_yd3 = '$uneven_yarn_yd3',
                                                        uneven_yarn_yd4 = '$uneven_yarn_yd4',
                                                        yarn_contamination_yd1 = '$yarn_contamination_yd1',
                                                        yarn_contamination_yd2 = '$yarn_contamination_yd2',
                                                        yarn_contamination_yd3 = '$yarn_contamination_yd3',
                                                        yarn_contamination_yd4 = '$yarn_contamination_yd4',
                                                        neps_dead_cotton_yd1 = '$neps_dead_cotton_yd1',
                                                        neps_dead_cotton_yd2 = '$neps_dead_cotton_yd2',
                                                        neps_dead_cotton_yd3 = '$neps_dead_cotton_yd3',
                                                        neps_dead_cotton_yd4 = '$neps_dead_cotton_yd4',
                                                        misc_yd1 = '$misc_yd1',
                                                        misc_yd2 = '$misc_yd2',
                                                        misc_yd3 = '$misc_yd3',
                                                        misc_yd4 = '$misc_yd4',
                                                        missing_line_cd1 = '$missing_line_cd1',
                                                        missing_line_cd2 = '$missing_line_cd2',
                                                        missing_line_cd3 = '$missing_line_cd3',
                                                        missing_line_cd4 = '$missing_line_cd4',
                                                        holes_cd1 = '$holes_cd1',
                                                        holes_cd2 = '$holes_cd2',
                                                        holes_cd3 = '$holes_cd3',
                                                        holes_cd4 = '$holes_cd4',
                                                        steaks_cd1 = '$steaks_cd1',
                                                        steaks_cd2 = '$steaks_cd2',
                                                        steaks_cd3 = '$steaks_cd3',
                                                        steaks_cd4 = '$steaks_cd4',
                                                        misknit_cd1 = '$misknit_cd1',
                                                        misknit_cd2 = '$misknit_cd2',
                                                        misknit_cd3 = '$misknit_cd3',
                                                        misknit_cd4 = '$misknit_cd4',
                                                        knot_cd1 = '$knot_cd1',
                                                        knot_cd2 = '$knot_cd2',
                                                        knot_cd3 = '$knot_cd3',
                                                        knot_cd4 = '$knot_cd4',
                                                        oil_mark_cd1 = '$oil_mark_cd1',
                                                        oil_mark_cd2 = '$oil_mark_cd2',
                                                        oil_mark_cd3 = '$oil_mark_cd3',
                                                        oil_mark_cd4 = '$oil_mark_cd4',
                                                        fly_cd1 = '$fly_cd1',
                                                        fly_cd2 = '$fly_cd2',
                                                        fly_cd3 = '$fly_cd3',
                                                        fly_cd4 = '$fly_cd4',
                                                        misc_cd1 = '$misc_cd1',
                                                        misc_cd2 = '$misc_cd2',
                                                        misc_cd3 = '$misc_cd3',
                                                        misc_cd4 = '$misc_cd4',
                                                        hairiness_dfd1 = '$hairiness_dfd1',
                                                        hairiness_dfd2 = '$hairiness_dfd2',
                                                        hairiness_dfd3 = '$hairiness_dfd3',
                                                        hairiness_dfd4 = '$hairiness_dfd4',
                                                        holes_dfd1 = '$holes_dfd1',
                                                        holes_dfd2 = '$holes_dfd2',
                                                        holes_dfd3 = '$holes_dfd3',
                                                        holes_dfd4 = '$holes_dfd4',
                                                        color_tone_dfd1 = '$color_tone_dfd1',
                                                        color_tone_dfd2 = '$color_tone_dfd2',
                                                        color_tone_dfd3 = '$color_tone_dfd3',
                                                        color_tone_dfd4 = '$color_tone_dfd4',
                                                        abrasion_dfd1 = '$abrasion_dfd1',
                                                        abrasion_dfd2 = '$abrasion_dfd2',
                                                        abrasion_dfd3 = '$abrasion_dfd3',
                                                        abrasion_dfd4 = '$abrasion_dfd4',
                                                        dye_spot_dfd1 = '$dye_spot_dfd1',
                                                        dye_spot_dfd2 = '$dye_spot_dfd2',
                                                        dye_spot_dfd3 = '$dye_spot_dfd3',
                                                        dye_spot_dfd4 = '$dye_spot_dfd4',
                                                        wrinkless_fold_dfd1 = '$wrinkless_fold_dfd1',
                                                        wrinkless_fold_dfd2 = '$wrinkless_fold_dfd2',
                                                        wrinkless_fold_dfd3 = '$wrinkless_fold_dfd3',
                                                        wrinkless_fold_dfd4 = '$wrinkless_fold_dfd4',
                                                        bowing_skewing_dfd1 = '$bowing_skewing_dfd1',
                                                        bowing_skewing_dfd2 = '$bowing_skewing_dfd2',
                                                        bowing_skewing_dfd3 = '$bowing_skewing_dfd3',
                                                        bowing_skewing_dfd4 = '$bowing_skewing_dfd4',
                                                        pin_holes_dfd1 = '$pin_holes_dfd1',
                                                        pin_holes_dfd2 = '$pin_holes_dfd2',
                                                        pin_holes_dfd3 = '$pin_holes_dfd3',
                                                        pin_holes_dfd4 = '$pin_holes_dfd4',
                                                        pick_dfd1 = '$pick_dfd1',
                                                        pick_dfd2 = '$pick_dfd2',
                                                        pick_dfd3 = '$pick_dfd3',
                                                        pick_dfd4 = '$pick_dfd4',
                                                        knot_dfd1 = '$knot_dfd1',
                                                        knot_dfd2 = '$knot_dfd2',
                                                        knot_dfd3 = '$knot_dfd3',
                                                        knot_dfd4 = '$knot_dfd4',
                                                        misc_dfd1 = '$misc_dfd1',
                                                        misc_dfd2 = '$misc_dfd2',
                                                        misc_dfd3 = '$misc_dfd3',
                                                        misc_dfd4 = '$misc_dfd4',
                                                        ueven_shearing_cld1 = '$ueven_shearing_cld1',
                                                        ueven_shearing_cld2 = '$ueven_shearing_cld2',
                                                        ueven_shearing_cld3 = '$ueven_shearing_cld3',
                                                        ueven_shearing_cld4 = '$ueven_shearing_cld4',
                                                        stans_cld1 = '$stans_cld1',
                                                        stans_cld2 = '$stans_cld2',
                                                        stans_cld3 = '$stans_cld3',
                                                        stans_cld4 = '$stans_cld4',
                                                        oil_grease_cld1 = '$oil_grease_cld1',
                                                        oil_grease_cld2 = '$oil_grease_cld2',
                                                        oil_grease_cld3 = '$oil_grease_cld3',
                                                        oil_grease_cld4 = '$oil_grease_cld4',
                                                        dirt_cld1 = '$dirt_cld1',
                                                        dirt_cld2 = '$dirt_cld2',
                                                        dirt_cld3 = '$dirt_cld3',
                                                        dirt_cld4 = '$dirt_cld4',
                                                        water_cld1 = '$water_cld1',
                                                        water_cld2 = '$water_cld2',
                                                        water_cld3 = '$water_cld3',
                                                        water_cld4 = '$water_cld4',
                                                        misc_cld1 = '$misc_cld1',
                                                        misc_cld2 = '$misc_cld2',
                                                        misc_cld3 = '$misc_cld3',
                                                        misc_cld4 = '$misc_cld4',
                                                        print_pd1 = '$print_pd1',
                                                        print_pd2 = '$print_pd2',
                                                        print_pd3 = '$print_pd3',
                                                        print_pd4 = '$print_pd4',
                                                        misc_pd1 = '$misc_pd1',
                                                        misc_pd2 = '$misc_pd2',
                                                        misc_pd3 = '$misc_pd3',
                                                        misc_pd4 = '$misc_pd4'", $con);
        
    
        if($sql_inspeksi_kain && $sql_detail_inspeksi_kain){
            echo    "<script>swal({
                        title: 'Data Tersimpan',   
                        text: 'Klik Ok untuk input data kembali',
                        type: 'success',
                                }).then((result) => {
                                if (result.value) {
                                window.location.href='FormInspeksiKain-$nokk';
                                document.getElementById('ket_inspek').value = $ket_inspek; 
                                }
                            });
                    </script>";
        }else{
            echo    "<script>swal({
                        title: 'Data tidak Tersimpan',   
                        text: 'Klik Ok untuk input data kembali',
                        type: 'error',
                                }).then((result) => {
                                if (result.value) {
                                window.location.href='FormInspeksiKain-$nokk'; 
                                document.getElementById('ket_inspek').value = $ket_inspek; 
                                }
                            });
                    </script>";
        }
    }
?>