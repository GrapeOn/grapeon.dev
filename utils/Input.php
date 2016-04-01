<?php
class Input
{
	public static function has($key)
	{
		return isset($_REQUEST[$key]);
	}

	public static function get($key, $default = null)
	{
		return self::has($key) ? $_REQUEST[$key] : $default;
	}

	public static function getString($key){
		$value = self::get($key);
		if (
			($value == null || is_resource($value))
			|| (is_numeric($value) || is_bool($value))
			|| (is_array($value)) || is_object($value)) {
			throw new Exception('Your input must be a string!');
		} else {
			return $value;
		}
	}

	public static function getNumber($key){

		$value = self::get($key);

		if (!is_numeric($value) || $value == null) {
			throw new Exception('The value is not a number or it is null');
		} else {
			return (float) $value;
		}
	}

	public static function getDate($key){
		$value = self::get($key);
		$validDate = date_create($value);
		if ($validDate) {
			return $value;
		} else {
			throw new Exception("Must be a date!!");
		}
	}

	public static function escape($input)
	{
		return htmlspecialchars(strip_tags($input));
	}
}