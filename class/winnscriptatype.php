<?php
/*
 * This script makes a remote call with Prototype. Be sure that you have included Prototype and Scriptaculous
 * I have included the javascripts in the /js folder
 *
 * Version: 2.1b
 * www.winn.ws
 *
 * Thanks for using this script! Support my site and add a link to me (<a href="http://winn.ws">Winn.ws</a>)!
 *
 * Updates and nighly dumps available here:
 * http://sourceforge.net/projects/winnscriptatype/
 * http://www.winn.ws/scriptatypephp
 *
 * Sample usage:
 * include 'winnscriptatype.php';
 * $w = new WinnScriptatype();
 *
 * Below is for one effect
 * $w->checkbox_do_fade('theDiv', 'CheckBoxID', '/path/to/url', array('id' => '1', 'listid' => '83'));
 *
 * Below is for two effects
 * $w->checkbox_do_fade_and_puff('theDiv', 'theDiv2', 'CheckBoxID', '/path/to/url', array('id' => '1', 'listid' => '83'));
 */
class WinnScriptatype {

	/*
	 * Below is the root function 'checkbox'
	 * All base functions will call this root function,
	 * the root function should not be called direct.
	 *
	 * Based off of my Ruby on Rails Plugin 'WinnScriptatype'
	 * Need help? Contact me at: greg [at] winn [dot] ws
	 *
	 * == DO NOT EDIT UNLESS YOU KNOW WHAT YOUR DOING
	 */
	function checkbox($numeffects,$theelmt,$theelmt2,$chkbox,$url,$urloptions,$effect,$effect2) {

		$urlopt = sizeof($urloptions);
		$urloptcount = 0;
		foreach($urloptions AS $key => $value) {
			$urloptcount += 1;
			if($urloptcount == $urlopt) {
				$options .= $key . ": '" . $value . "'";
			}else{
				$options .= $key . ": '" . $value . "',";
			}
		}

		if($numeffects == 'one') {
			$theRequest = "new Ajax.Request('" . $url . "', {method: 'get', onSuccess: new Effect." . $effect . "('" . $theelmt . "'), parameters: {" . $options . "} })";

			$cb = "<input type=\"checkbox\" id=\"" . $chkbox . "\" onclick=\"" . $theRequest . "\" />";

			return $cb;
		}else{

			$theRequest = "new Ajax.Request('" . $url . "', {method: 'get', onSuccess: new Effect." . $effect . "('" . $theelmt . "'), parameters: {" . $options . "} });";
			$secondeffect = "new Effect." . $effect2 . "('" . $theelmt2 . "')";
			$cb = "<input type=\"checkbox\" id=\"" . $chkbox . "\" onclick=\"" . $theRequest . $secondeffect . "\" />";

			return $cb;

		}

	}

	/*
	 * Builder functions for the effects
	 */
	function checkbox_do_fade($theelmt,$chkbox,$url,$urloptions,$effect = 'Fade') {
		return $this->checkbox('one',$theelmt,'',$chkbox,$url,$urloptions,$effect,'');
	}
	function checkbox_do_puff($theelmt,$chkbox,$url,$urloptions,$effect = 'Puff') {
		return $this->checkbox('one',$theelmt,'',$chkbox,$url,$urloptions,$effect,'');
	}
	function checkbox_do_blindup($theelmt,$chkbox,$url,$urloptions,$effect = 'BlindUp') {
		return $this->checkbox('one',$theelmt,'',$chkbox,$url,$urloptions,$effect,'');
	}
	function checkbox_do_dropout($theelmt,$chkbox,$url,$urloptions,$effect = 'DropOut') {
		return $this->checkbox('one',$theelmt,'',$chkbox,$url,$urloptions,$effect,'');
	}

	/*
	 * Builder functions for two effects
	 */
	function checkbox_do_fade_and_appear($theelmt,$theelmt2,$chkbox,$url,$urloptions,$effect = 'Fade') {
		return $this->checkbox('two',$theelmt,$theelmt2,$chkbox,$url,$urloptions,$effect,'Appear');
	}
	function checkbox_do_fade_and_puff($theelmt,$theelmt2,$chkbox,$url,$urloptions,$effect = 'Fade') {
		return $this->checkbox('two',$theelmt,$theelmt2,$chkbox,$url,$urloptions,$effect,'Puff');
	}
	function checkbox_do_fade_and_blindup($theelmt,$theelmt2,$chkbox,$url,$urloptions,$effect = 'Fade') {
		return $this->checkbox('two',$theelmt,$theelmt2,$chkbox,$url,$urloptions,$effect,'BlindUp');
	}
	function checkbox_do_fade_and_blinddown($theelmt,$theelmt2,$chkbox,$url,$urloptions,$effect = 'Fade') {
		return $this->checkbox('two',$theelmt,$theelmt2,$chkbox,$url,$urloptions,$effect,'BlindDown');
	}
	function checkbox_do_fade_and_dropout($theelmt,$theelmt2,$chkbox,$url,$urloptions,$effect = 'Fade') {
		return $this->checkbox('two',$theelmt,$theelmt2,$chkbox,$url,$urloptions,$effect,'DropOut');
	}
	function checkbox_do_fade_and_highlight($theelmt,$theelmt2,$chkbox,$url,$urloptions,$effect = 'Fade') {
		return $this->checkbox('two',$theelmt,$theelmt2,$chkbox,$url,$urloptions,$effect,'Highlight');
	}

	// ========================== TEXTLINK ==============
	function textlink($numeffects,$theelmt,$theelmt2,$urltext,$url,$urloptions,$effect,$effect2) {

		$urlopt = sizeof($urloptions);
		$urloptcount = 0;
		foreach($urloptions AS $key => $value) {
			$urloptcount += 1;
			if($urloptcount == $urlopt) {
				$options .= $key . ": '" . $value . "'";
			}else{
				$options .= $key . ": '" . $value . "',";
			}
		}

		if($numeffects == 'one') {
			$theRequest = "new Ajax.Request('" . $url . "', {method: 'get', onSuccess: new Effect." . $effect . "('" . $theelmt . "'), parameters: {" . $options . "} })";

			$cb = "<a href=\"javascript://\" onclick=\"" . $theRequest . "\">" . $urltext . "</a>";

			return $cb;
		}else if($numeffects == 'then') {

			$theRequest = "new Ajax.Request('" . $url . "', {method: 'get', onSuccess: new Effect." . $effect . "('" . $theelmt . "'), parameters: {" . $options . "} });";

			$thenEffect = " setTimeout(new Effect." . $effect2 . "('" . $theelmt . "'),2900)";
			$cb = "<a href=\"javascript://\" onclick=\"" . $theRequest . $thenEffect . "\">" . $urltext . "</a>";

			return $cb;

		}else{

			//$theRequest = "new Ajax.Request('" . $url . "', {method: 'get', onSuccess: new Effect." . $effect . "('" . $theelmt . "'), parameters: {" . $options . "} });";
			//$secondeffect = "new Effect." . $effect2 . "('" . $theelmt2 . "')";
			//$cb = "<input type=\"checkbox\" id=\"" . $chkbox . "\" onclick=\"" . $theRequest . $secondeffect . "\" />";

			//return $cb;

		}

	}

	function textlink_do_fade($theelmt,$urltext,$url,$urloptions,$effect = 'Fade') {
		return $this->textlink('one',$theelmt,'',$urltext,$url,$urloptions,$effect,'');
	}
	function textlink_do_puff($theelmt,$urltext,$url,$urloptions,$effect = 'Puff') {
		return $this->textlink('one',$theelmt,'',$urltext,$url,$urloptions,$effect,'');
	}
	function textlink_do_blindup($theelmt,$urltext,$url,$urloptions,$effect = 'BlindUp') {
		return $this->textlink('one',$theelmt,'',$urltext,$url,$urloptions,$effect,'');
	}
	function textlink_do_dropout($theelmt,$urltext,$url,$urloptions,$effect = 'DropOut') {
		return $this->textlink('one',$theelmt,'',$urltext,$url,$urloptions,$effect,'');
	}


	/*
	 * Fields
	 * $f->text(array('name' => 'user', 'id' => 'userfield'));
	 * $f->hidden(array('name' => 'somthing', 'value' => $COOKIE['user']));
	 */

	 function field($type,$elmopts) {
	 	$f = "<input type=\"" . $type . "\" ";

	 	foreach($elmopts AS $k => $v) {
	 		$f .= $k . "=\"" . $v . "\" ";
	 	}

	 	$f .= "/>";
	 	return $f;
	 }

	/*
	 * Building the form calls
	 */
	 function text($array) {
	 	return $this->field('text',$array);
	 }
	 function password($array) {
	 	return $this->field('password',$array);
	 }
	 function hidden($array) {
	 	return $this->field('hidden',$array);
	 }

}// End Class
?>