<?php
/**
 * Created by PhpStorm.
 * User: Alumne Matí
 * Date: 19/7/2018
 * Time: 13:20
 */

class ItemMenu
{

    /*****************
     * Propiedades
     *****************/
    public $title;
    public $url;
    public $section;
    public $action;
    public $profile;
    public $submenu;
    public $submenu_title;
    public $submenu_items;



    /*****************
     * Constructor
     *****************/
    public function __construct(string $title='',string $url='',string $section='',string $action='',string $profile='public',bool $submenu=false,string $submenu_title='',array $submenu_items=array())
    {
        $this->title=$title;
        $this->url=$url;
        $this->section=$section;
        $this->action=$action;
        $this->profile=$profile;
        $this->submenu=$submenu;
        $this->submenu_title=$submenu_title;
        $this->submenu_items=$submenu_items;

    }

    /*****************
     * Métodos
     *****************/

    // toString
    public function __toString()
    {

        return "";
    }
}