<?php

	function title( $title ) {
		global $pageTitle;
		if(isset($pageTitle)) {
			echo $title . " | " . $pageTitle;
		} else {
			echo $title;
		}
	}