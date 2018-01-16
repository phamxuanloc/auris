<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\widgets;

use Yii;
use yii\base\Widget;
use yii\widgets\Menu;

class SidebarWidget extends Widget
{

    public function init()
    {
    }

    public function run()
    {
        return $this->render('sidebar');
    }
}
