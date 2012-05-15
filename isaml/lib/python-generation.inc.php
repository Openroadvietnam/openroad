<?php
/**
	@param $string A regular string
	@return This string as it would appear in Python code
*/
function stringToPython($string) {
	/// TODO shouldn't we try to escape those triple-quotes?
	return sprintf('"""%s"""', $string);
}

/**
	@param $boolean A regular boolean
	@return This boolean as it would appear in Python code
*/
function booleanToPython($boolean) {
	return $boolean ? 'True' : 'False';
}

/**
	@param $array A regular, single-dimension array
	@return This boolean as it would appear in Python code
*/
function arrayToPython($array) {
	$python = '[';
	foreach ($array as $value) {
		$python .= valueToPython($value) . ', ';
	}
	$python .= ']';
	return $python;
}

/**
	@param $value Any value, but an associative array (aka hash, dictionary,
	...)
	@return This value as it would appear in Python code
*/
function valueToPython($value) {
	if (is_array($value)) {
		return arrayToPython($value);
	} elseif (is_bool($value)) {
		return booleanToPython($value);
	} elseif (is_string($value)) {
		return stringToPython($value);
	} else {
		return (string)$value;
	}
}
