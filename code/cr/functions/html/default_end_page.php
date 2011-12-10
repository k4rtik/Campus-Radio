<?php
function default_end_page()
{
	$output = <<<EOQ

</div>
<div id="footer">
<div class="clearer">&nbsp;</div>
<div id="foot">
	<div class="footnav">
		<ul>
			<li><a href="/cr/index.php">HOME</a></li>
			<li><a href="/cr/about.php">ABOUT</a></li>
			<li><a href="/cr/rjs.php">RJs</a></li>
			<li><a href="/cr/archive.php">ARCHIVE</a></li>
			<li><a href="/cr/contact.php">CONTACT</a></li>
			<li><div class="clearer">&nbsp;</div></li>
		</ul>
	</div>
	<div class="clearer">&nbsp;</div>
	<div class="credit">&copy; 2011 NITC Campus Radio | Template by <a href="http://demusdesign.com">DemusDesign</a></div>
</div>
</div>
</div>
</body>
</html>
EOQ;
	return $output;
}
?>
