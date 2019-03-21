<?php 

function _e($string)
{
	return htmlentities($string, ENT_QOUTES, 'UTF-8');
}