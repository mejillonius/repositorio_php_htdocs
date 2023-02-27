<?php
/**
 * Created by PhpStorm.
 * User: Alumne Matí
 * Date: 19/7/2018
 * Time: 13:18
 */

class Menu
{

    /*****************
     * Propiedades
     *****************/
    public $title;
    public $items;
    public $class_menu;


    /*****************
     * Constructor
     *****************/
    public function __construct(string $title,array $items=array(),string $class_menu='navbar-standard')
    {
        $this->title = $title;
        $this->items = $items;
        $this->class_menu = $class_menu;
    }

    /*****************
     * Métodos
     *****************/

    // Añadir un item al menu
    public function addItem(ItemMenu $itemMenu):Menu
    {
        $this->items[]=$itemMenu;

        return $this;
    }

    public function makeMenu()
    {
        // Si llega la Section en la URL
        $section = empty($_GET['section'])? DEFAULT_SECTION : htmlspecialchars($_GET['section']);

        // Si llega la Action en la URL
        $action = empty($_GET['action'])? DEFAULT_ACTION : htmlspecialchars($_GET['action']);

        $salida = "<nav class=\"navbar navbar-expand-lg $this->class_menu \">
                        <a class=\"navbar-brand\" href=\"index.php\">
                            $this->title
                        </a>
                        <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#menuweb\" aria-controls=\"menuweb\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                            <span class=\"navbar-toggler-icon\"></span>
                        </button>
                        <div class=\"collapse navbar-collapse\" id=\"menuweb\">
                        <ul class=\"navbar-nav mr-auto\">";
        foreach($this->items as $item_menu)
        {
            // Gestión de perfiles
            if($item_menu->profile == 'public' or (!empty($_SESSION['user_profile']) and $item_menu->profile == $_SESSION['user_profile']))
            {
                if($item_menu->section == $section)
                    $active = ' active ';
                else
                    $active = "";
                if($item_menu->submenu == true and count($item_menu->submenu_items) > 0)
                {
                    // Menu Dropdown
                    $salida .= "<li class=\"nav-item dropdown $active\">
                                    <a class=\"nav-link dropdown-toggle\" href=\"$item_menu->url\" id=\"navbarDropdown\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                                       $item_menu->title
                                    </a>
                                    <div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\">";

                    foreach($item_menu->submenu_items as $item_dropdown)
                    {
                        if($item_dropdown->action == $action and $item_dropdown->section == $section)
                            $active = ' active ';
                        else
                            $active = "";
                        if($item_dropdown->profile == 'public' or (!empty($_SESSION['user_profile']) and $item_dropdown->profile == $_SESSION['user_profile']))
                        {
                            $salida .= "<a class=\"dropdown-item $active\" href=\"$item_dropdown->url\">
                                            $item_dropdown->title
                                        </a>";
                        }
                    }
                    $salida .= "</div></li>";
                }
                else
                {
                    // Item Sencillo
                    $salida .= "<li class=\"nav-item $active \">
                                    <a class=\"nav-link\" href=\"$item_menu->url\">
                                        $item_menu->title 
                                    </a>
                                </li>";
                }
            }
        }

        $salida .="</ul></div></nav> ";

        echo $salida;
    }


    // toString
    public function __toString()
    {

        return "";
    }
}
