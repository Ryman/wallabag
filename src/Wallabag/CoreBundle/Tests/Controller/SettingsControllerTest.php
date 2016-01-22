<?php

namespace Wallabag\CoreBundle\Tests\Controller;

use Wallabag\CoreBundle\Tests\WallabagCoreTestCase;

/**
 * The controller `SettingsController` does not exist.
 * This test cover security against the internal settings page managed by CraueConfigBundle
 */
class SettingsControllerTest extends WallabagCoreTestCase
{
    public function testSettingsWithAdmin()
    {
        $this->logInAs('admin');
        $client = $this->getClient();

        $crawler = $client->request('GET', '/settings');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testSettingsWithNormalUser()
    {
        $this->logInAs('bob');
        $client = $this->getClient();

        $crawler = $client->request('GET', '/settings');

        $this->assertEquals(403, $client->getResponse()->getStatusCode());
    }
}
