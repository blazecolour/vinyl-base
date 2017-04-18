<?php
namespace app\rbac;
use yii\rbac\Rule;

class ArtistRule extends Rule
{
    public $name = 'isArtist';


    public function execute($user, $item, $params)
    {
        return isset($params['post'])
         ? $params['post']->createdBy == $user
          : false;
    }
}
