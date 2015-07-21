<?php

use App\Models\FacebookHelper;

class FacebookHelperTest extends TestCase {

	private $facebook_helper;

	public function setUp()
	{
		parent::setUp();
		$this->facebook_helper = new FacebookHelper();
	}

	public function testNewObjectFacebook()
	{
		$this->assertTrue(method_exists($this->facebook_helper, 'getLoginUrl'));
	}

	public function testPostCommentReplyToPage()
	{
		$feed = [
			'id' => '798513066932534', // POSTcenter Page
			'type' => 'feed',
			'access_token' => 'CAAPDcLHVDgsBAHdWRQKMIvy41SZCHPeihBmCltyjwQPCZCBjn6MntuZB8hsoHTNZAzVvk1wVZAVxnaOGxL5tPEuXVqtX3FmZBFkWWwMbwxMzcRsAfVluZCLEZChdwAGNuxPyWoyAWeaR8Nj3c0fNZA5jH6x0qlw5hItc9Rv8aoofagRPxTspvH67lGi3TXqV9VoZA7ACznaOhJSwZDZD',
			'msg' => [
				'name' => 'Set name link by POSTcenter',
				'link' => 'https://www.youtube.com/',
				'caption' => 'Set caption link by POSTcenter',
				'message' => 'Test post from POSTcenter Application '.date('Y-m-d H:i:s'),
			]
		];
		$feed = $this->facebook_helper->sendMessage($feed);
		$this->assertArrayHasKey('id', $feed);

		$comment = [
			'id' => $feed['id'], // POSTcenter Page
			'type' => 'comments',
			'access_token' => 'CAAPDcLHVDgsBAHdWRQKMIvy41SZCHPeihBmCltyjwQPCZCBjn6MntuZB8hsoHTNZAzVvk1wVZAVxnaOGxL5tPEuXVqtX3FmZBFkWWwMbwxMzcRsAfVluZCLEZChdwAGNuxPyWoyAWeaR8Nj3c0fNZA5jH6x0qlw5hItc9Rv8aoofagRPxTspvH67lGi3TXqV9VoZA7ACznaOhJSwZDZD',
			'msg' => [
				'link' => 'https://www.youtube.com/',
				'message' => 'Test Comment '.date('Y-m-d H:i:s'),
			]
		];
		$comments = $this->facebook_helper->sendMessage($comment);
		$this->assertArrayHasKey('id', $comments);

		$reply = [
			'id' => $comments['id'], // POSTcenter Page
			'type' => 'comments',
			'access_token' => 'CAAPDcLHVDgsBAHdWRQKMIvy41SZCHPeihBmCltyjwQPCZCBjn6MntuZB8hsoHTNZAzVvk1wVZAVxnaOGxL5tPEuXVqtX3FmZBFkWWwMbwxMzcRsAfVluZCLEZChdwAGNuxPyWoyAWeaR8Nj3c0fNZA5jH6x0qlw5hItc9Rv8aoofagRPxTspvH67lGi3TXqV9VoZA7ACznaOhJSwZDZD',
			'msg' => [
				'message' => 'Test Replay '.date('Y-m-d H:i:s'),
			]
		];
		$reply = $this->facebook_helper->sendMessage($reply);
		$this->assertArrayHasKey('id', $reply);
	}	

	public function testSendMessagesMultiplePage()
	{
		$feed = [
			'id' => 'me', // POSTcenter Page
			'type' => 'feed',
			'access_token' => [
				'CAAPDcLHVDgsBAHdWRQKMIvy41SZCHPeihBmCltyjwQPCZCBjn6MntuZB8hsoHTNZAzVvk1wVZAVxnaOGxL5tPEuXVqtX3FmZBFkWWwMbwxMzcRsAfVluZCLEZChdwAGNuxPyWoyAWeaR8Nj3c0fNZA5jH6x0qlw5hItc9Rv8aoofagRPxTspvH67lGi3TXqV9VoZA7ACznaOhJSwZDZD', // POSTcenter
				'CAAPDcLHVDgsBAOPxB208RAmOohlvU792bDvticvM8cphS7EqJcoE0jmy2uDnXAb9fB2KKDo44V9dM2taBjUdoNRmgJQBARACMLeeMY2JyTWhCiZAof4t6wZCSkuU5SeRLcHJGrbZA9xYZCv8LWxt2q3YOglVL5cv2QBmEGKZBWESNWYDLUui0SzPD5pZAveLC8h1jQxjJSEwZDZD', // Upgrade
				'CAAPDcLHVDgsBAJYmcfxZCAKeZAc6wl6nmnje6Jp8tnOMJUcZCfleFst8aHzSZAmsrRcaBZCytfipYPbmmw9XmY7LZAdiA5XCT2TJkS5jZC7cZBRTNUiIeSz2COve8j5kRS9gjPKhGnzVtjaS5ds2i0ixYjYkfZCS2iD616SMLtWl6xsfgrUCZCfrnD8JZCZCZAKY8N7xC3PMrGU8yyQZDZD', // Hon top 10
				],
			'msg' => [
				'link' => 'https://www.youtube.com/',
				'message' => 'Test post multiple to page '.date('Y-m-d H:i:s'),
			]
		];

		$response = $this->facebook_helper->sendMessagesMultiplePage($feed);
		$this->assertEquals(count($feed['access_token']), count($response));
	}

	public function testPostMessageWithPhoto()
	{
		$feed = [
			'id' => 'me', // POSTcenter Page
			'type' => 'photos',
			'access_token' => 
				'CAAPDcLHVDgsBAHdWRQKMIvy41SZCHPeihBmCltyjwQPCZCBjn6MntuZB8hsoHTNZAzVvk1wVZAVxnaOGxL5tPEuXVqtX3FmZBFkWWwMbwxMzcRsAfVluZCLEZChdwAGNuxPyWoyAWeaR8Nj3c0fNZA5jH6x0qlw5hItc9Rv8aoofagRPxTspvH67lGi3TXqV9VoZA7ACznaOhJSwZDZD' // POSTcenter
				,
			'msg' => [
				'message' => 'Test post Message with Photo '.date('Y-m-d H:i:s'),
				'url' => 'http://www.mx7.com/i/d7d/i9GTJo.png'
			]
		];

		$response = $this->facebook_helper->sendMessagesMultiplePage($feed);
		$this->assertArrayHasKey('id', $response);
	}

	public function testPostMessageWithPhotoMultiplePage()
	{
		$feed = [
			'id' => 'me', // POSTcenter Page
			'type' => 'photos',
			'access_token' => [
				'CAAPDcLHVDgsBAHdWRQKMIvy41SZCHPeihBmCltyjwQPCZCBjn6MntuZB8hsoHTNZAzVvk1wVZAVxnaOGxL5tPEuXVqtX3FmZBFkWWwMbwxMzcRsAfVluZCLEZChdwAGNuxPyWoyAWeaR8Nj3c0fNZA5jH6x0qlw5hItc9Rv8aoofagRPxTspvH67lGi3TXqV9VoZA7ACznaOhJSwZDZD', // POSTcenter
				'CAAPDcLHVDgsBAOPxB208RAmOohlvU792bDvticvM8cphS7EqJcoE0jmy2uDnXAb9fB2KKDo44V9dM2taBjUdoNRmgJQBARACMLeeMY2JyTWhCiZAof4t6wZCSkuU5SeRLcHJGrbZA9xYZCv8LWxt2q3YOglVL5cv2QBmEGKZBWESNWYDLUui0SzPD5pZAveLC8h1jQxjJSEwZDZD', // Upgrade
				'CAAPDcLHVDgsBAJYmcfxZCAKeZAc6wl6nmnje6Jp8tnOMJUcZCfleFst8aHzSZAmsrRcaBZCytfipYPbmmw9XmY7LZAdiA5XCT2TJkS5jZC7cZBRTNUiIeSz2COve8j5kRS9gjPKhGnzVtjaS5ds2i0ixYjYkfZCS2iD616SMLtWl6xsfgrUCZCfrnD8JZCZCZAKY8N7xC3PMrGU8yyQZDZD', // Hon top 10
				],
			'msg' => [
				'message' => 'Test post Message with Photo '.date('Y-m-d H:i:s'),
				'url' => 'http://www.mx7.com/i/d7d/i9GTJo.png'
			]
		];

		$response = $this->facebook_helper->sendMessagesMultiplePage($feed);
		$this->assertEquals(count($feed['access_token']), count($response));
	}

}
