<?php
function check_login($pageName, $LoginFormPage, $doWeCheck, $messageNumber, $ticket)
{
		$login_status = array();
		if(strtoupper($doWeCheck) == 'YES')
			{
				if(isset($_SESSION['login']['userid']))
					{
						if(strtoupper(@$_SESSION['login']['usertype']) == $ticket) 
							{
								if($pageName 	== 	"loginadmin")
									{$pageName 	= 	"index";}
								if($pageName 	== 	"login")
									{$pageName 	= 	"login";}
							
								$login_status['gotopage'] 	= $pageName;  
							}
						else
							{
								$login_status['gotopage'] 	= $LoginFormPage;								
							}
					}
				else
					{ 
						$login_status['gotopage'] 	= $LoginFormPage;
					}

			}
		else
			{
				$login_status['gotopage'] 	= $pageName;
			}
		return $login_status;
}

function check_member_login($doWeCheck, $ticket, $pagename="", $from="")
{
		global $_DIR, $atend, $baratend, $_DELIM;
		if(!$pagename) $pagename="sign-in".$atend.($from?"pvs".$_DELIM.$from.$baratend:"");
		$login_status = array();
		if(strtoupper($doWeCheck) == 'YES')
			{
				if(isset($_SESSION['login']['userid']))
					{
						if(strtoupper(@$_SESSION['login']['usertype']) == $ticket) 
							{
								if($pageName 	== 	"loginadmin")
									{$pageName 	= 	"index";}
								if($pageName 	== 	"index")
									{$pageName 	= 	"index";}
							
								$login_status['gotopage'] 	= $pageName;
							}
						else
							{
								header("location: ".$_DIR["site"]["url"].$pagename);
								exit();
							}
					}
				else
					{ 
						header("location: ".$_DIR["site"]["url"].$pagename);
						exit();
					}

			}
		else
			{
				header("location: ".$_DIR["site"]["url"].$pagename);
				exit();
			}
		//debug($login_status); die;
		return $login_status;
}
?>