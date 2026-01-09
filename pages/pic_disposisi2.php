<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
    $modal_id=$_GET['id'];
	$modal=mysqli_query($con,"SELECT * FROM `tbl_disposisi_now` WHERE file_foto2='$modal_id'");
    $r=mysqli_fetch_array($modal);
?>
<script type="text/javascript">
    $(document).ready(function(){
				var current = {x: 0, y: 0, zoom: 1};
	$(document).on("click","#modal-zoom-photo",function(e){
		
		if(current.zoom > 1){
			current = {x: 0, y: 0, zoom: 1};
			$(this).removeClass().addClass("zoom-in-cursor");
		}
		else{
			$(this).removeClass().addClass("zoom-out-cursor");
			 var coef = e.shiftKey || e.ctrlKey ? 0.5 : 2,
				delm = document.documentElement,
				oz = current.zoom,
				nz = current.zoom * coef,
				sx = delm.scrollLeft,
				sy = delm.scrollTop,
				ox = 50 + 21,
				oy = 50 + 22,
				mx = e.clientX - ox + sx,
				my = e.clientY - oy + sy,
				ix = (mx - current.x) / oz,
				iy = (my - current.y) / oz,
				nx = ix * nz,
				ny = iy * nz,
				cx = (ix + (mx - ix) - nx),
				cy = (iy + (my - iy) - ny)
			;
			  current.zoom = nz;
			  current.x = cx;
			  current.y = cy;
		}
			
		$(".modal-zoom-large-photo-wrap").css({
		  '-webkit-transform' : 'translate('+current.x+'px, '+current.y+'px) scale(' + current.zoom + ')',
		  '-moz-transform'    : 'translate('+current.x+'px, '+current.y+'px) scale(' + current.zoom + ')',
		  '-ms-transform'     : 'translate('+current.x+'px, '+current.y+'px) scale(' + current.zoom + ')',
		  '-o-transform'      : 'translate('+current.x+'px, '+current.y+'px) scale(' + current.zoom + ')',
		  'transform'         : 'translate('+current.x+'px, '+current.y+'px) scale(' + current.zoom + ')'
		});
		return false;
	});
});
</script>
<style>
    .modal-zoom-large-photo-wrap img{
		margin:0 auto;
		max-height:720px;
	}

	.modal-zoom-large-photo-wrap{
		text-align:center;
		height:720px;
		overflow:hidden;
		width: 100%;
	}
	
.wrapped{
    position: relative;
    width:700px;
	height:700px;
    overflow:hidden;
}
.absolute{position: absolute;}
.modal-zoom-large-photo-wrap{
	position: absolute;
    width: 100%;
    height: 100%;
    transform-origin: 0 0 0;
    transition: transform 0.3s;
    transition-timing-function: ease-in-out;
    transform: translate(0,0) scale(1);
}
.zoom-out-cursor{
	cursor:zoom-out;
}

.zoom-in-cursor{
	cursor:zoom-in;
}
</style>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="View_Pic" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">View Picture (2) Disposisi</h3>
                </div>
                <div class="modal-body">
                    <div class="wrapped">
                        <div class="modal-zoom-large-photo-wrap">
                            <div class="absolute">
                                <a id="modal-zoom-photo" class="zoom-in-cursor" href="#"><img class="margin-bottom img-responsive" src="dist/img-disposisinow/<?php echo $r['file_foto2'];?>"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>




<!-- <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="View_Pic" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">View Picture Disposisi</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="<?php echo $r['id'];?>">
                        <div class="form-group">
                            <label for="no_item" class="col-md-2 control-label">File Foto</label>
                                <div class="col-md-8">
                                    <img src="dist/img-disposisinow/<?php echo $r['file_foto'];?>" height="500"/>
                                </div>
                        </div>
		        </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
</div> -->