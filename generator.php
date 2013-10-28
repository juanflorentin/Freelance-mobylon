<?php

class CaptchaGenerator
{
	protected $winstatess = array();
	protected $iv         = null;
	protected $encryptkey ="XiTo74dOO09N48YeUmuvbL0E";
	public    $separator  = "--";

	function __construct()
	{
		$this->winstates[] = array(0, 1, 2, array(3, 4, 5, 6, 7, 8)); 
		$this->winstates[] = array(3, 4, 5, array(0, 1, 2, 6, 7, 8)); 
		$this->winstates[] = array(6, 7, 8, array(0, 1, 2, 3, 4, 5)); 
		$this->winstates[] = array(2, 1, 0, array(3, 4, 5, 6, 7, 8)); 
		$this->winstates[] = array(5, 4, 3, array(0, 1, 2, 6, 7, 8)); 
		$this->winstates[] = array(8, 7, 6, array(0, 1, 2, 3, 4, 5)); 
		$this->winstates[] = array(0, 3, 6, array(1, 4, 7, 2, 5, 8)); 
		$this->winstates[] = array(1, 4, 7, array(0, 3, 6, 2, 5, 8)); 
		$this->winstates[] = array(2, 5, 8, array(0, 1, 3, 4, 6, 7)); 
		$this->winstates[] = array(0, 3, 6, array(1, 4, 7, 2, 5, 8)); 
		$this->winstates[] = array(7, 4, 1, array(0, 3, 6, 2, 5, 8)); 
		$this->winstates[] = array(8, 5, 2, array(0, 1, 3, 4, 6, 7)); 
		$this->winstates[] = array(0, 4, 8, array(1, 2, 3, 5, 6, 7)); 
		$this->winstates[] = array(6, 4, 2, array(0, 1, 3, 5, 7, 8)); 
		$this->winstates[] = array(2, 4, 6, array(0, 1, 3, 5, 7, 8)); 
		$this->winstates[] = array(8, 4, 0, array(1, 2, 3, 5, 6, 7)); 
		$this->winstates[] = array(0, 2, 1, array(3, 4, 5, 6, 7, 8)); 
		$this->winstates[] = array(0, 8, 4, array(1, 2, 3, 5, 6, 7)); 
		$this->winstates[] = array(2, 6, 4, array(0, 1, 3, 5, 7, 8)); 
		$this->winstates[] = array(0, 6, 3, array(1, 2, 4, 5, 7, 8)); 
		$this->winstates[] = array(2, 8, 5, array(0, 1, 3, 4, 6, 7)); 
		$this->winstates[] = array(3, 5, 4, array(0, 1, 2, 6, 7, 8)); 
		$this->winstates[] = array(6, 8, 7, array(0, 1, 2, 3, 4, 5)); 
		$this->winstates[] = array(1, 7, 4, array(0, 2, 3, 5, 6, 8)); 

		$this->iv = mcrypt_create_iv (mcrypt_get_block_size (MCRYPT_TripleDES, MCRYPT_MODE_CBC), MCRYPT_DEV_RANDOM);
	}

	function getNewWinState()
	{
		shuffle($this->winstates);	
		
		$index = array_rand($this->winstates);
		return $this->winstates[$index];		
	}

	function generateState()
	{
		$wincombo    = $this->getNewWinState();
		$stateString = $this->buildStateString($wincombo);
		
		return array(
			"combo"    => $wincombo,
			"state"    => $stateString,
			"encstate" => $this->encrypeStateData($stateString, $wincombo) 
		);
	}
	
	function buildStateString($wincombo)
	{
		$result          = "";
		$boardsize       = 9;
		$circlepositions = $this->getCirclePositions($wincombo[3]);
		
		while(strlen($result) < $boardsize)
		{
			$finding = strlen($result);	

			if ($this->isTargetBox($wincombo, $finding))
			{
				$result .= "e";
				continue;
			}

			if ($this->isInArray($circlepositions, $finding))
			{
				$result .= "o";
			}
			else
			{
				if ($this->isInArray($wincombo, $finding))
				{
					$result .= "x";
				}
				else
				{
					$result .= "e";
				}
			}
		};

		return $result;
	}
	
	function getCirclePositions($circlepositions)
	{
		$foundValidCombo = true;
		
		do
		{
			$foundValidCombo = true;
			$randomInxs      = array_rand($circlepositions, 3);

			$positions = array(
				$circlepositions[$randomInxs[0]],
				$circlepositions[$randomInxs[1]],
				$circlepositions[$randomInxs[2]],
			);


			if($this->isInArray($positions, 0) && $this->isInArray($positions, 1) && $this->isInArray($positions, 2))
			{
				$foundValidCombo = false;
				continue;
			}			
		
			if($this->isInArray($positions, 3) && $this->isInArray($positions, 4) && $this->isInArray($positions, 5))
			{
				$foundValidCombo = false;
				continue;
			}			

			if($this->isInArray($positions, 6) && $this->isInArray($positions, 7) && $this->isInArray($positions, 8))
			{
				$foundValidCombo = false;
				continue;
			}			
		
			if($this->isInArray($positions, 0) && $this->isInArray($positions, 3) && $this->isInArray($positions, 6))
			{
				$foundValidCombo = false;
				continue;
			}			

			if($this->isInArray($positions, 1) && $this->isInArray($positions, 4) && $this->isInArray($positions, 7))
			{
				$foundValidCombo = false;
				continue;
			}			

			if($this->isInArray($positions, 2) && $this->isInArray($positions, 5) && $this->isInArray($positions, 8))
			{
				$foundValidCombo = false;
				continue;
			}			

		} while($foundValidCombo == false);
	
		return $positions;
	}
	
	function isTargetBox($combo, $move) 
	{
		return ($combo[2] == $move);
	}
	
	function isInArray($combo, $move) 
	{
		foreach($combo as $entry)
			if ($entry == $move)
				return true;
		return false;
	}
	
	function encrypeStateData($state, $combo)
	{
		$winstate = array(
			$combo[0],
			$combo[1],
			$combo[2]
		);
		
		$string = $state . $this->separator . implode(",", $winstate); 
		$result = trim(mcrypt_cbc(MCRYPT_TripleDES, $this->encryptkey, $string, MCRYPT_ENCRYPT, $this->iv));

		return base64_encode($result);
	}

	function dencrypeStateData($string)
	{
		$string = base64_decode($string);
		return trim(mcrypt_cbc(MCRYPT_TripleDES, $this->encryptkey, $string, MCRYPT_DECRYPT, $this->iv));
	}
	
	function check($form, $inx)
	{
		$field = "captcha" . $inx . "flag";
		if (!isset($form[$field]))
			return false;
	
		$selection = $form[$field];
		$parts     = split($this->separator, $selection);
		$statedata = $this->dencrypeStateData($parts[0]);
		$index     = $parts[1];
		
		return ($index == $statedata[strlen($statedata) - 1]);
	}
} 

function checkCaptcha($form, $inx)
{
	$captcha = new CaptchaGenerator();
	return $captcha->check($form, $inx);
}

function renderCaptcha($captchaInx)
{
	$id       = "captcha" . $captchaInx;
	$captcha  = new CaptchaGenerator();
	$data     = $captcha->generateState();
	$state    = $data["state"   ];
	$encstate = $data["encstate"];
?>
	<div class="funcaptcha" id="<?php echo $id; ?>">

		<?php 

			for($i = 0; $i < strlen($state); $i++) 
			{ 
				$char  = $state[$i];
				$class = "";

				if ($char == "o")	
					$class = "circle";
				else if ($char == "e")	
					$class = "empty";
				else
					$class = "cross";
		?>
			<a class="<?php echo $class; ?>" href="" onclick="return false;">
				<span class="box" data="<?php echo $encstate . $captcha->separator . $i; ?>" onclick="setCaptcha('<?php echo $id; ?>', <?php echo $i; ?>); return false;"></span>
			</a>	
		<?php	
		}
		?>
	</div>
<?php	
}

?>