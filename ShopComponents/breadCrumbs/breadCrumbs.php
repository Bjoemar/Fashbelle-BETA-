<div class="_web_breadCrumbs">
	<ul class="_bread_crumbs">
		<?php for ($i = 0; $i < count($breadCrumbsContent); $i++): ?>
			<li><a href="<?php echo $breadCrumbsContent[$i][1]; ?>"><?php echo $breadCrumbsContent[$i][0]; ?></a></li>
		<?php endfor; ?>
	</ul>
</div>