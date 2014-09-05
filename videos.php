<?php

foreach ($sources as $source) {
	echo "
	<div class=\"video\">
		<video width=\"800\" height=\"600\" controls=\"controls\">
			<source type=\"video/mp4\" src=\"{$source}\" />
		</video>
		<a href=\"{$source}\">Video URL :: Right click and \"Save as\"</a>
	</div>
";
}
