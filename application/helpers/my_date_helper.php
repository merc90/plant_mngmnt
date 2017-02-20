<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function formateDateString($date)
{
	if(!empty($date))
	  return (mdate('%D, %d %M %Y %h:%i:%s %A %T',strtotime($date)));
	else
		return "---";
}

function dateFromMysqlDate($date)
{
	if(!empty($date) && $date !="0000-00-00")
  		return mdate('%d-%M-%Y',strtotime($date));
  	else
  		return "---";
}

function dateTimeFromMysqlDate($date)
{
	if(!empty($date)&&$date!="NULL" && $date !="0000-00-00 00:00:00")
 		return mdate('%D, %d %M %Y %h:%i:%s %A %T', strtotime($date));
	else
 		return "<p style='text-align: center;'>---</p>";
}

function qgFormateDate()
{
	if(!empty($date))
  		return mdate('%D, %d %M %Y %h:%i:%s %A %T', now());
	else
  		return "---";
}

function logDate($date)
{
	if(!empty($date))
  		return mdate('%D, %d %M %Y', strtotime($date));
	else
  		return "---";
}

function logTime($time)
{
	if(!empty($time))
  		return mdate('%h:%i:%s %A %T', strtotime($time));
	else
  		return "---";
}
