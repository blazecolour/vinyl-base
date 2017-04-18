<?php
namespace app\commands;

use Yii;
use yii\console\Controller;
use app\rbac\ArtistRule;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        $createArtist = $auth->createPermission('createArtist');
        $createArtist->description = 'Create an Artist';
        $auth->add($createArtist);

        $updateArtist = $auth->createPermission('updateArtist');
        $updateArtist->description = 'Update an Artist';
        $auth->add($updateArtist);

        $createLabel = $auth->createPermission('createLabel');
        $createLabel->description = 'Create an Label';
        $auth->add($createLabel);

        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $createArtist);
        $auth->addChild($admin, $updateArtist);
        $auth->addChild($admin, $createLabel);

        $artistRule = new ArtistRule;
        $auth->add($artistRule);
        $updateArtist->ruleName = $artistRule;

        $auth->assign($admin, 1);
    }
    public function actionAssign($user, $role)
    {
        $auth = yii::$app->authManager;
        $auth->assign($admin, 1);
    }
}