<?php
declare ( strict_types = 1 );

namespace Sphace\GUI\Layout;

class Fixed {
	
	private $width;
	
	public function __construct(int $width) {
		$this->width = $width;
	}
	
	public function render() {
		return '<body style="width: ' . $this->width . 'px;"></body>';
	}
}