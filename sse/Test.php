<?php
/**
 * Created by PhpStorm.
 * User: locpx
 * Date: 18/01/2018
 * Time: 09:17
 */

namespace app\sse;

use odannyc\Yii2SSE\SSEBase;

class Test extends SSEBase {

	public function check() {

		return true;
	}

	public function update() {

		return 'abc';
	}
}