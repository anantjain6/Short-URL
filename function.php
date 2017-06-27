<?php

function addhttp($url)
{
	if (!preg_match("~^(?:f|ht)tps?://~i", $url))
	{
		$url = "http://" . $url;
	}
	return $url;
}

function short($url)
{
	$url = mysqli_real_escape_string($GLOBALS['con'], $url);
	$url = addhttp($url);
	$result = mysqli_query($GLOBALS['con'], 'INSERT INTO link(url) VALUES ("' . $url . '")');
	if ($result)
	{
		$result = mysqli_query($GLOBALS['con'], 'SELECT MAX(id) FROM link');
		while ($row = mysqli_fetch_assoc($result))
			$id = $row['MAX(id)'];
		return '{"status": "success","shortlink": "' . $GLOBALS['siteurl'] . $id . '"}';
	}
	else
	{
		return '{"status": "fail","error": "' . mysqli_error($GLOBALS['con']) . '"}';
	}
}

function urlfromid($id)
{
	$id = mysqli_real_escape_string($GLOBALS['con'], $id);
	$result = mysqli_query($GLOBALS['con'], 'SELECT url FROM link WHERE id="' . $id . '"');
	if ($result)
	{
		if(mysqli_num_rows($result)!=0)
		{
			while ($row = mysqli_fetch_assoc($result))
				$url = $row['url'];
			return '{"status": "success","longlink": "' . $url . '"}';
		}
		else
		{
			return '{"status": "fail","error": "data_not_found"}';
		}
	}
	else
	{
		return '{"status": "fail","error": "' . mysqli_error($GLOBALS['con']) . '"}';
	}
}

?>