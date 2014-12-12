<?php

/**
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.7
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2014 Fuel Development Team
 * @link       http://fuelphp.com
 */

/**
 * The Welcome Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 *
 * @package  app
 * @extends  Controller
 */
class Controller_Email extends Controller
{

	/**
	 * The basic welcome message
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
		$users = Model_User::find('all');
		shuffle($users);
		$split = array_chunk($users, count($users)/2);

		shuffle($split[0]);
		shuffle($split[1]);

		foreach ($split[0] as $key => $person) {

			$emails[$split[1][$key]->email] = $person;
			$emails[$person->email] = $split[1][$key];
		}

		foreach ($emails as $email => $santa) {
			$name = $santa->name;
			$candy = $santa->candy;
			$color = $santa->color;
			$store = $santa->store;
			$scent = $santa->scent;
			$other = $santa->other;


			$text = 

<<<EOD
		<p>Hi!</p>\r\n
	\r\n
		<p>Welcome to the FloFun Secret Santa! Don't tell anyone, but your secret santa is <b>$name</b>!</p>\r\n
	\r\n
		<p>Here are some gift ideas:</p>\r\n
	\r\n
		<ul>\r\n
			<li>Their favorite color is <b>$color</b></li>\r\n
			<li>They really like this kind of candy: <b>$candy</b></li>\r\n
			<li>They said they really like to shop at <b>$store</b></li>\r\n
			<li>Also, they really like the smell of <b>$scent</b></li>\r\n
		</ul>\r\n
	\r\n
		<p>If you can't think of anything else to get them, you could always get <b>$other</b></p>\r\n
	\r\n
		<p>Thanks for being a part of the Holiday Celebrations,<br/>\r\n
		The FloFun Team<p>\r\n
EOD;
			$subject = "Your Secret Santa pick";
			// To send HTML mail, the Content-type header must be set
			$headers = 'From: flofun@flocasts.com'."\r\n";
			$headers = 'MIME-Version: 1.0' . "\r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
			var_dump($email);

			var_dump(mail($email, $subject, $text, $headers));

		}
	}
}
