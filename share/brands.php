<section class="instagram p-t-20">
		<div class="sec-title p-b-52 p-l-15 p-r-15">
			<h3 class="m-text5 t-center">
				Đối tác
			</h3>
		</div>

<div class="flex-w bg6">
    <script src="js/jssor.slider-27.5.0.min.js" type="text/javascript"></script>
	<script src="js/brands.js" type="text/javascript"></script>
	    <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:1080px;height:150px;overflow:hidden;visibility:hidden;">
	        <div data-u="slides" style="cursor:pointer;position:relative;top:60%;left:0px;width:1080px;height:30px;overflow:hidden;">

	        	<?php foreach ($brand as $b): ?>
	        		<div>
		                <a href="<?= $b['url'] ?>" target="_blank"><img data-u="image" src="<?= $b['image'] ?>" /></a>
		            </div>
	        	<?php endforeach ?>
		            
	        </div>

	    </div>
	    <script type="text/javascript">jssor_1_slider_init();</script>
	</div>
</section>