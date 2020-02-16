<?php
class Menu extends Model {
    var $menu = false;
    function  __construct() {
        parent::__construct();
    }
    function load($module) {
        // check current user and generate only applicable menuitems
        $query = $this->db->query("select * from menu where module='$module'");
        $this->menu = $query->result();
        return true;
    }

    function getCategories() {
        $res = array();
        if ($this->menu != false) {
            foreach ($this->menu as $mi) {
                if (in_array($mi->category, $res) == false) {
                    $res[] = $mi->category;
                }
            }
        }
        return $res;
    }
    function getPages($category) {
        $res = array();
        if ($this->menu != false) {
            foreach ($this->menu as $mi) {
                if ($mi->category==$category) {
                    $res[] = $mi;
                }
            }
        }
        return $res;
    }
}
?>
