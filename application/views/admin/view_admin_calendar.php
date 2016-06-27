<div class="container">
    <?php
    $style = array(
        'class' => 'field_set'
    );

    //echo form_open('',$style);
    echo form_fieldset('Day Event');
    $text = array(
        'name' => '',
        'id' => 'day_event',
        'value' => '',
        'style' => 'width:97%'
    );
    echo form_input($text);

    $text1 = array(
        'name' => 'addEvent',
        'id' => 'addEvent',
        'content' => 'Add Event',
        'style' => 'width:33%;padding:5px'
    );
    echo form_button($text1);

    $text2 = array(
        'name' => 'cancel',
        'id' => 'cancel',
        'content' => 'Cancel',
        'style' => 'width:33%;padding:5px'
    );
    echo form_button($text2);

    $text3 = array(
        'name' => 'delete',
        'id' => 'delete',
        'content' => ' Delete',
        'style' => 'width:33%;padding:5px'
    );

    echo form_close();
    
    ?>

    <?php echo $calendar; ?>
</div>