<?php

function grid_controllers_events ($controller){

    cmsCore::loadAllControllersLanguages();

    $options = array(
        'is_sortable' => true,
        'is_filter' => false,
        'is_draggable' => true,
        'is_pagination' => false,
        'order_by' => 'event',
        'order_to' => 'asc'
    );

    $columns = array(
        'id' => array(
            'title' => 'id',
            'width' => 30
        ),
        'event' => array(
            'title' => LANG_EVENTS_EVENT_NAME,
        ),
        'listener' => array(
            'title' => LANG_EVENTS_LISTENER,
            'width' => 200,
            'handler' => function($val, $row){
                return string_lang($val.'_CONTROLLER', $val);
            }
        ),
        'ordering' => array(
            'title' => LANG_ORDER,
            'width' => 70
        ),
        'is_enabled' => array(
            'title' => LANG_IS_ENABLED,
            'flag' => true,
            'flag_toggle' => href_to($controller->name, 'controllers', array('events_toggle', '{id}')),
            'width' => 80
        )
    );

    return array(
        'options' => $options,
        'columns' => $columns,
        'actions' => array()
    );

}