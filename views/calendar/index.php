<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\web\JsExpression;

/* @var $this yii\web\View */
$this->title = 'Lịch công việc';

?>
<div class="site-index normal-table-list">
    <?php

    $JSEventClick = <<<EOF
function(calEvent, jsEvent, view) {
    alert(calEvent.title);
    $(this).css('border-color', 'red');

}

EOF;

    ?>
    <div class="body-content">
        <?= yii2fullcalendar\yii2fullcalendar::widget(array(
            'clientOptions' => [
                'selectable' => true,
                'selectHelper' => true,
                'eventClick' => new JsExpression($JSEventClick),
                'defaultDate' => date('Y-m-d')
            ],
            'ajaxEvents' => Url::toRoute(['/calendar/jsoncalendar'])
        ));
        ?>
    </div>
</div>
