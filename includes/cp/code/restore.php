<?PHP
$_GET['err']  = finding_id_from_url('err', $_DELIM);
$_GET['suc']  = finding_id_from_url('suc', $_DELIM);
$isAllQueryExecuted = false;
if($_SERVER['REQUEST_METHOD'] == "POST")
 {

function remove_remarks($sql)
{
	$lines = explode("\n", $sql);
	
	// try to keep mem. use down
	$sql = "";
	
	$linecount = count($lines);
	$output = "";

	for ($i = 0; $i < $linecount; $i++)
	{
		if (($i != ($linecount - 1)) || (strlen($lines[$i]) > 0))
		{
			if ($lines[$i][0] != "#")
			{
				$output .= $lines[$i] . "\n";
			}
			else
			{
				$output .= "\n";
			}
			// Trading a bit of speed for lower mem. use here.
			$lines[$i] = "";
		}
	}
	
	return $output;
	
}

function split_sql_file($sql, $delimiter)
{
	// Split up our string into "possible" SQL statements.
	$tokens = explode($delimiter, $sql);

	// try to save mem.
	$sql = "";
	$output = array();
	
	// we don't actually care about the matches preg gives us.
	$matches = array();
	
	// this is faster than calling count($oktens) every time thru the loop.
	$token_count = count($tokens);
	for ($i = 0; $i < $token_count; $i++)
	{
		// Don't wanna add an empty string as the last thing in the array.
		if (($i != ($token_count - 1)) || (strlen($tokens[$i] > 0)))
		{
			// This is the total number of single quotes in the token.
			$total_quotes = preg_match_all("/'/", $tokens[$i], $matches);
			// Counts single quotes that are preceded by an odd number of backslashes, 
			// which means they're escaped quotes.
			$escaped_quotes = preg_match_all("/(?<!\\\\)(\\\\\\\\)*\\\\'/", $tokens[$i], $matches);
			
			$unescaped_quotes = $total_quotes - $escaped_quotes;
			
			// If the number of unescaped quotes is even, then the delimiter did NOT occur inside a string literal.
			if (($unescaped_quotes % 2) == 0)
			{
				// It's a complete sql statement.
				$output[] = $tokens[$i];
				// save memory.
				$tokens[$i] = "";
			}
			else
			{
				// incomplete sql statement. keep adding tokens until we have a complete one.
				// $temp will hold what we have so far.
				$temp = $tokens[$i] . $delimiter;
				// save memory..
				$tokens[$i] = "";
				
				// Do we have a complete statement yet? 
				$complete_stmt = false;
				
				for ($j = $i + 1; (!$complete_stmt && ($j < $token_count)); $j++)
				{
					// This is the total number of single quotes in the token.
					$total_quotes = preg_match_all("/'/", $tokens[$j], $matches);
					// Counts single quotes that are preceded by an odd number of backslashes, 
					// which means they're escaped quotes.
					$escaped_quotes = preg_match_all("/(?<!\\\\)(\\\\\\\\)*\\\\'/", $tokens[$j], $matches);
			
					$unescaped_quotes = $total_quotes - $escaped_quotes;
					
					if (($unescaped_quotes % 2) == 1)
					{
						// odd number of unescaped quotes. In combination with the previous incomplete
						// statement(s), we now have a complete statement. (2 odds always make an even)
						$output[] = $temp . $tokens[$j];

						// save memory.
						$tokens[$j] = "";
						$temp = "";
						
						// exit the loop.
						$complete_stmt = true;
						// make sure the outer loop continues at the right point.
						$i = $j;
					}
					else
					{
						// even number of unescaped quotes. We still don't have a complete statement. 
						// (1 odd and 1 even always make an odd)
						$temp .= $tokens[$j] . $delimiter;
						// save memory.
						$tokens[$j] = "";
					}
					
				} // for..
			} // else
		}
	}

	return $output;
}

 
$backup_file_name = (!empty($HTTP_POST_FILES['backup_file']['name'])) ? $HTTP_POST_FILES['backup_file']['name'] : "";
$backup_file_tmpname = ($HTTP_POST_FILES['backup_file']['tmp_name'] != "none") ? $HTTP_POST_FILES['backup_file']['tmp_name'] : "";
$backup_file_type = (!empty($HTTP_POST_FILES['backup_file']['type'])) ? $HTTP_POST_FILES['backup_file']['type'] : "";

if($backup_file_tmpname == "" || $backup_file_name == "")
{	
	$_MSG[] = "Please uploaded file.";
	$error = 1;
}

if(!$error && file_exists($backup_file_tmpname) )
{
	if( preg_match("/^(text\/[a-zA-Z]+)|(application\/(x\-)?gzip(\-compressed)?)|(application\/octet-stream)$/is", $backup_file_type) )
	{
		if( preg_match("/\.gz$/is",$backup_file_name) )
		{
				$do_gzip_compress = FALSE;
				$phpver = phpversion();
				if($phpver >= "4.0")
				{
					if(extension_loaded("zlib"))
					{
						$do_gzip_compress = TRUE;
					}
				}

				if($do_gzip_compress)
				{
					$gz_ptr = gzopen($backup_file_tmpname, 'rb');
					$sql_query = "";
					while( !gzeof($gz_ptr) )
					{
						$sql_query .= gzgets($gz_ptr, 100000);
					}
				}
				else
				{					
					$_MSG[] = "Cannot decompress a gzip file; please upload a plain text version.";
					$error = 1;
				}
		}
		else
		{
			$sql_query = fread(fopen($backup_file_tmpname, 'r'), filesize($backup_file_tmpname));
		}
	}
	else
	{
		$_MSG[] = "Filename problem; please try an alternative file $backup_file_type $backup_file_name.";
		$error = 1;

	}
}

if($sql_query != "")
{
	// Strip out sql comments...
	$sql_query = remove_remarks($sql_query);
	$pieces = split_sql_file($sql_query, ";");

	$sql_count = count($pieces);
	for($i = 0; $i < $sql_count; $i++)
	{
		$sql = trim($pieces[$i]);

		if(!empty($sql) and $sql[0] != "#")
		{
			if(VERBOSE == 1)
			{
				echo "Executing: $sql\n<br>";
				flush();
			}
			
			$_CONN->Execute($sql);
			
		}
	}
	$success = "The database has been successfully restored.";
	$isAllQueryExecuted = true;
}
}
?>