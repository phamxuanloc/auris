<?php
namespace app\commands;

use jones\wschat\components\Chat;
use jones\wschat\components\ChatManager;
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use Yii;

class ServerController extends \yii\console\Controller
{
	public function actionRun()
	{
		$manager = Yii::configure(new ChatManager(), [
			'userClassName' => '\app\models\User' //allow to get users from MySQL or PostgreSQL
		]);
		$server = IoServer::factory(new HttpServer(new WsServer(new Chat($manager))), 8080);
		$server->run();
	}
}
