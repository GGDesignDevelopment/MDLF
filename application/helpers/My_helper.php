<?php

function hash_512($string)
{
	return hash('sha512', $string . config_item('encryption_key'));
}
