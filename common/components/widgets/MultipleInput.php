<?php
namespace common\components\widgets;

class MultipleInput extends \unclead\multipleinput\MultipleInput
{
    public $iconMap = [
        self::ICONS_SOURCE_GLYPHICONS => [
            'drag-handle'   => 'glyphicon glyphicon-menu-hamburger',
            'remove'        => 'icon-cross2',
            'add'           => 'icon-plus2',
            'clone'         => 'glyphicon glyphicon-duplicate',
        ],
        self::ICONS_SOURCE_FONTAWESOME => [
            'drag-handle'   => 'fa fa-bars',
            'remove'        => 'icon-cross2',
            'add'           => 'icon-plus2',
            'clone'         => 'fa fa-files-o',
        ],
    ];

}