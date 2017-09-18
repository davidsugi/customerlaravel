<?php


namespace App\Helpers;

class Helper {

	public static function money($value) {
		return "Rp ". number_format($value, 2, ',', '.');
	}
}