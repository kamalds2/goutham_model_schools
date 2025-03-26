~<?php
/**
 * Manage Menus Management
 * 
 * PHP version 5
 * 
 * @author sudhakar <sudhakar.c@siriinnovations.com>
 * @version 1.0
 * @license http://URL name
 * @access public
 */
class header_menus extends Controller {

    /**
     * Constructor
     */
    public function __construct() {
        parent::__construct();
        if (!$this->session->gets('adminuser_id')) {
            $this->redirect('login');

        }
         $menus1 = array();
          $menus = array();
    }

    /**
     * Load the menu management page
     */
    public function index() {
       $this->view->menuString = $this->addMenu();
             $this->view->menuString1 = $this->addMenu1(); 
       $this->view->menuDescription1 = $this->model->getmenuDescription1();
       
        $this->view->menuDisplayString1 = $this->displayMenu1();
       
        $this->view->menuDisplayString = $this->displayMenu();
        $this->view->LoadView('manageMenus', 'header_menus');
    }

    /**
     * Add a new menu
     */
    public function addMenuDetails() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = $this->model->addMenuDetails($_POST);
           
            if ($result) {
                $this->session->sets('success_msg', 'Menu added successfully');
            } else {
                $this->session->sets('error_msg', 'Failed to add menu');
            }
            $this->redirect('header_menus');
        }
    }

     public function getAllPages() {
        $result = $this->model->getAllPages();

        echo json_encode($result->pages) ;

     }

      /**

      * By using this funtion get all possible modules

      */

     public function getAllModules() {

          $result = $this->model->getAllModules();

         echo json_encode($result->modules) ;


     }


    public function ajaxSaveMenu() {
    $data = json_decode($_POST['menu'], true); // Decode the JSON data
    foreach ($data as $key => $item) {
        $newPosition = $key + 1;
        $parent_id = 0; // Default parent_id is 0 unless a parent is defined
        if (isset($item['children']) && is_array($item['children'])) {
            $parent_id = $item['id']; // Set parent_id to the current item's id
        }
        $this->updateMenuItem($item, $parent_id, $newPosition);
    }
    $this->set_logs($this->session->gets('adminuser_id'),'menus','ajaxSaveMenu'.implode('~',$_POST),'error_logs','Menu Updted Successfully','ACTS'); 
    echo "Menu Updated Successfully.";
    exit;
}

private function updateMenuItem($item, $parent_id = 0, $position = 0) {
    $menu_id = $item['id'];
    if($menu_id==$parent_id){
        $parent_id = 0;
    }
    $this->model->updateMenuById($menu_id, $parent_id, $position);
    if (isset($item['children']) && is_array($item['children'])) {
        foreach ($item['children'] as $key => $child) {
            $this->updateMenuItem($child, $menu_id, $key + 1); // Position starts from 1
        }
    }
}


    public function ajaxDisplayMenu() {

        echo $this->displayMenu();

    }
     public function displayMenu($parent_id = 0) {
        
        $submenu = false;
        $class = ($parent_id == 0) ? "parent" : "child";
        $menuString = ''; // Reset $menuString for each call
        // Assuming $this->menus is your menu data
        // data-url="' . htmlspecialchars($row['menu_url']) . '"
        
        foreach ($this->menus as $key => $row) {
            if ($row['menu_parentid'] == $parent_id) {
                if ($submenu === false) {
                    $submenu = true;
                    $menuString .= '<ol class="dd-list">';
                } 
                $menuString .= '<li class="dd-item dd3-item" data-id="' . $row['menu_id'] . '" data-label="' . htmlspecialchars($row['menu_name']) . '" >'
                  . '<div class="dd-handle dd3-handle"> Drag </div>'
                  . '<div class="dd3-content"><span>' . htmlspecialchars($row['menu_name']) . '</span><div class="item-edit"><a href="'.SITEURL.'header_menus/editMenus/'.$row['menu_id'].'" class="text-muted px-1"><i class="bi bi-pencil-fill"></i></a><a href="#" class="text-muted px-1 delete_menu" data-id="'.$row['menu_id'].'"><i class="bi bi-trash-fill"></i></a></div></div>'
                  ;
                // Recursively call displayMenu for children
                $menuString .= $this->displayMenu($key);
                $menuString .= "</li>\n";
            }
        }
        if ($submenu === true)
            $menuString .= "</ol>\n";
            return $menuString;
        }

           public function displayMenu1($parent_id = 0) {
        
        $submenu = false;
        $class = ($parent_id == 0) ? "parent" : "child";
        $menuString1 = ''; // Reset $menuString for each call
        // Assuming $this->menus is your menu data
        // data-url="' . htmlspecialchars($row['menu_url']) . '"
   //var_dump($this->menus1);
   
        foreach ($this->menus1 as $key => $row) {
            if ($row['menu_parentid'] == $parent_id) {
                if ($submenu === false) {
                    $submenu = true;
                    $menuString1 .= '<ol class="dd-list">';
                } 
                $menuString1 .= '<li class="dd-item dd3-item" data-id="' . $row['menu_id'] . '" data-label="' . htmlspecialchars($row['menu_name']) . '" >'
                  . '<div class="dd-handle dd3-handle"> Drag </div>'
                  . '<div class="dd3-content"><span>' . htmlspecialchars($row['menu_name']) . '</span><div class="item-edit"><a href="'.SITEURL.'footer_menus/editMenus/'.$row['menu_id'].'" class="text-muted px-1"><i class="bi bi-pencil-fill"></i></a><a href="#" class="text-muted px-1 delete_menu" data-id="'.$row['menu_id'].'"><i class="bi bi-trash-fill"></i></a></div></div>'
                  ;
                // Recursively call displayMenu for children
                $menuString1 .= $this->displayMenu1($key);
                $menuString1 .= "</li>\n";
            }
        }
        if ($submenu === true)
            $menuString1 .= "</ol>\n";
            return $menuString1;
        }
        /**

        * By using this method load the add Menu view page

        */

    public function addMenu($parent_id = 0, $level = 0, $spacer ='&#166;&nbsp;&nbsp;&nbsp;&nbsp;', $selected = false) {

         

         static $menuString = '';

         $this->a = $this->getParentMenu();

         foreach ($this->menus as $key => $row) {



             $sel = ($row['menu_id'] == $selected) ? " selected=\"selected\"" : "" ;

        if ($parent_id == $row['menu_parentid']) {



                    $menuString .=  "<option value=\"" . $row['menu_id'] . "\"".$sel.">";

                    for ($i = 0; $i < $level; $i++)

                       $menuString .= $spacer;

                 

              $menuString .=  $row['menu_name'] . "</option>\n";

                            $level++;

                $this->addMenu($key, $level, $spacer, $selected);

                $level--;

              }  

          }

        return $menuString;

      }
public function addMenu1($parent_id = 0, $level = 0, $spacer ='&#166;&nbsp;&nbsp;&nbsp;&nbsp;', $selected = false) {

         

         static $menuString1 = '';

         $this->a = $this->getParentMenu1();

         foreach ($this->menus1 as $key => $row) {



             $sel = ($row['menu_id'] == $selected) ? " selected=\"selected\"" : "" ;

        if ($parent_id == $row['menu_parentid']) {



                    $menuString1 .=  "<option value=\"" . $row['menu_id'] . "\"".$sel.">";

                    for ($i = 0; $i < $level; $i++)

                       $menuString1 .= $spacer;

                 

              $menuString1 .=  $row['menu_name'] . "</option>\n";

                            $level++;

                $this->addMenu1($key, $level, $spacer, $selected);

                $level--;

              }  

          }

        return $menuString1;

      }

     

     /**

      * 

      * @return array

      */

      public function getParentMenu() {

        $this->a = $this->model->getMenus();
        
        foreach($this->a->menus as $m) { 
            $this->menus[$m->menu_id]  = array('menu_id'=>$m->menu_id,

                'menu_name' => $m->menu_name,'menu_parentid' => $m->menu_parentid);

         }

         return $this->menus;

     }
     public function getParentMenu1() {

        $this->a = $this->model->getMenus1();
        
        foreach($this->a->menus as $m) { 
            $this->menus1[$m->menu_id]  = array('menu_id'=>$m->menu_id,

                'menu_name' => $m->menu_name,'menu_parentid' => $m->menu_parentid);

         }

         return $this->menus1;

     }

  
    public function editMenus($id){
 
        $this->view->menuString = $this->addMenu();
        $this->view->menuDisplayString = $this->displayMenu();
        $menuItem = $this->model->getMenuDetails($id);
        
        
        $this->view->parent = $this->model->getParentMenu($menuItem['menu_parentid']);
        $this->view->menuDetails = $menuItem;
        // var_dump($this->view->menuDetails);die;
        if($menuItem['menu_type'] == 'page') {
            $result = $this->model->getAllPages();

            $str = "";
            foreach($result->pages as $res) {
                $str .= "<option value='".$menuItem['menu_module']."'";
                if($res->page_id == $menuItem['menu_module']) {
                    $str .= " selected";
                }
                $str .= ">".$res->page_title."</option>";
            }
            $str .= "";            
        }
        else if($menuItem['menu_type'] == 'module') {
            $result = $this->model->getAllModules();
            $str = "";
            foreach($result->modules as $res) {
                $str .= "<option value='".$res->module_name."'";
                if($res->module_name == $menuItem['menu_module']) {
                    $str .= " selected";
                }
                $str .= ">".$res->module_name."</option>";
            }
            $str .= "";
        }
        else if($menuItem['menu_type'] == 'login') {
            $str = "
                        <option value='login' selected>Logins</option>

                      ";

        }
        else if($menuItem['menu_type'] == 'homepage') {
            $str = "

                        <option value='index' selected>homepage</option>

                        ";

        }
      
        $this->view->contentStr = $str;
        $this->view->LoadView('editMenus', 'header_menus');
    }


    /**
     * Update a menu
     */
    public function updateMenuDetails() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = $this->model->updateMenuDetails($_POST);
            if ($result) {
                $this->session->sets('success_msg', 'Menu updated successfully');
            } else {
                $this->session->sets('error_msg', 'Failed to update menu');
            }
            $this->redirect('header_menus');
        }
    }

    /**
     * Delete a menu
     */
    public function deleteMenuItems() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->deleteMenuItems($_POST);
            die();
            $this->redirect('header_menus');
        }
    }

}
?>