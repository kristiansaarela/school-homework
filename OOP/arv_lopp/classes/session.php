<?php
/*

CREATE TABLE `session` (
  `sid` varchar(32) NOT NULL,
  `kasutaja_nimi` varchar(16),
  `user_data` text,
  `svars` text,
  `created` datetime NOT NULL,
  `changed` timestamp NOT NULL default CURRENT_TIMESTAMP
)

*/

class Session
{
	//sessiooni muutujad
	var $sid = false;
	var $vars = array();
	var $http = false;
	var $db = false;


	var $timeout = 1800; //sekundites, 1800 = 30 minutit

	function Session(&$http, &$db)
	{
		$this->http = &$http;
		$this->db = &$db;
		$this->sid = $http->get('sid'); //http klassist pärit muutuja väärtus
		$this->checkSession();
	}//Session

	//timeout määramiseks vajalik meetod
	function setTimeout($t)
	{
		$this->timeout = $t;
	}//setTimeout

	function checkSession()
	{
		$this->clearSessions();
		
		//kui võti on antud, siis tuleb kontrollida, kas sessioon on lahti - kui juba timeout, siis tuleb uue luua
		if($this->sid !== false)
		{
			$sql = "SELECT * FROM session WHERE sid='".$this->sid."'";
			$res = $this->db->getArray($sql);
			
			//kui andmebaasist päringut ei tule
			if($res == false)
			{
				//sessioon kustutakse
					$this->sid = false;
					$this->http->del('sid');
			}
			//sessiooni muutujate sisse lugemine andmebaasi
			else
			{
				$vars = @unserialize($res[0]['svars']);
				if(!is_array($vars))
				{
					$vars = array();
				}
				$this->vars = $vars;

				//muidu andmebaasis saame vajaliku andmed kätte kasutaja kohta
				$user_data = unserialize($res[0]['user_data']);
				$this->user_data = $user_data;
			}

		}
	}//checkSession


	//meetod, mis kustutab andmebaasis kõik sessioonid
	function clearSessions()
	{
		$sql = "DELETE FROM session WHERE ".time()." - UNIX_TIMESTAMP(changed) > ".$this->timeout;
		$this->db->query($sql);
	}//clearSessions

	function createSession($user=false)
	{
		//võimalikult unikaalne sessiooni id
		$sid = md5(uniqid(time().mt_rand(1, 1000), true));

		//sisestame andmed andmebaasi
		$sql = "INSERT INTO session SET sid='".$sid."', kasutaja_nimi='".$user['kasutaja_nimi']."', user_data='".serialize($user)."', created=NOW()";
		$this->db->query($sql);
		
		//määrame sessiooni id
		$this->sid = $sid;
		$this->http->set('sid', $sid);

		
		$sql = "SELECT * FROM session WHERE sid='".$this->sid."'";
		$res = $this->db->getArray($sql);

		//muidu andmebaasis saame vajaliku andmed kätte kasutaja kohta
		$user_data = unserialize($res[0]['user_data']);
		$this->user_data = $user_data;
	}//createSession

	//sessiooni kustutamine
	function delSession()
	{
		if($this->sid !== false)
		{
			$sql = "DELETE FROM session WHERE sid='".$this->sid."'";
			$this->db->query($sql);
			$this->sid = false;
			$this->http->del('sid');
		}
	}//delSession
	
	//meetod, mis me kasutame kasutaja sisendi asendamiseks
	function set($name, $val)
	{
		$this->vars[$name] = $val;
	}

	//meetod, mis tagastab vastava muutuja nime, juhul kui ta eksisteerib
	//html jaoks on ohutu
	function get($name)
	{
		if(isset($this->vars[$name]))
		{
			return $this->vars[$name];
		}
		return false;
	}

	//meetod, mis kasutatakse kasutaja sisendi kustutamiseks
	function del($name)
	{
		if(isset($this->vars[$name]))
		{
			unset($this->vars[$name]);
		}
	}

	//sessiooni muutujad ei tohi ära jätta - kui sessioon lõpeb, tuleb neid kustutada
	function flush()
	{
		if($this->sid != false)
		{
			$sql = "UPDATE session SET changed=NOW(), svars='".serialize($this->vars)."' WHERE sid='".$this->sid."'";
			$this->db->query($sql);
		}
	}

}
?>