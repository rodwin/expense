<?php

class ExampleTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testBasicExample()
	{
		$crawler = $this->client->request('GET', '/');
		$this->assertTrue($this->client->getResponse()->isOk());
	}
        /*
        public function testIndexActionBindsUsersFromRepository()
        {
            // Arrange...
            $repository = Mockery::mock('UserRepositoryInterface');
            $repository->shouldReceive('all')->once()->andReturn(array('foo'));
            App::instance('UserRepositoryInterface', $repository);
            
             // Act...
            $response = $this->action('GET', 'UsersController@getIndex');

             // Assert...
            $this->assertResponseOk();
//            $this->assertViewHas('users', array('foo'));
        }
         */

}
