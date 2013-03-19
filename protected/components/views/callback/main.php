<div id="backcall" class="header" onclick='$("#backcall").dialog("open"); return false;' rel="#callback-form"></div>

<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
    'id'=>'backcall',
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>'Dialog box 1',
        'autoOpen'=>false,
    ),
));

echo 'dialog content here';

$this->endWidget('zii.widgets.jui.CJuiDialog');

?>