<?php



/**

 *  Manage Menus Managements model

 * 

 * PHP version 5
 *  

 * @author sudhakar <sudhakar.c@siriinnovations.com>

 * @version 1.0

 * @license http://URL name 

 * @access public

 */



class footer_menus_model extends Model {

    

    public function __construct() {

        parent::__construct();

    }

    

    /**

     * 

     * @return array

     */

    public function getMenus() {
        $url = RESTURL."footer_menu/getallmenus";

        $result = $this->CallAPI("GET",$url);  
        return $result; 
    }

    /**

     * 

     * @return array

     */

    public function getAllPages() {

        $url = RESTURL."footer_menu/getallpages";  

        $result = $this->CallAPI("GET",$url);
         
        return $result;

    }

    /**

     * 

     * @return array

     */

    public function getAllModules() {

        $url = RESTURL."footer_menu/getallmodules";  

        $result = $this->CallAPI("GET",$url);
         
        return $result;        

    }
     public function getParentMenu($id){

        return $this->db->find("SELECT menu_name FROM ".DBPREFIX."_footer_menus WHERE `menu_id` = $id");

    }





    /**

     * 

     * @param array $data

     * @return boolean

     */

    public function addMenuDetails($data) {  

        extract($data); 
        $values = array();

        $values['menu_name'] = $menu_name;

          // $result =  $this->db->find("SELECT page_url FROM ".DB_PREFIX."pages WHERE page_id = $id");           

            // $values['menu_link'] = $result['page_url']; 
        
            $values['menu_module'] = $menu_module;

 $values['menu_parentid'] = $menu_parentid;

        $values['menu_status'] = $menu_status;

        $values['menu_type'] = $menu_type;

        $url = RESTURL."footer_menu/addmenudetails"; 

         // echo $url;var_dump(json_encode($values));die();

        $result = $this->CallAPI("POST",$url,$values); 
      

        return $result;         

    }

    /**

     * 

     * @param integer $id

     * @return array

     */

    

    /**

     * 

     * @param array $data

     * @return boolean

     */

     public function updateMenu($data) {

      
        extract($data);

        $values = array();

              

        $values['menu_parentid'] = $parent_id;

        $values['menu_position'] = $position;       

        $id = $menu_id;
        

        $result = $this->db->update(DBPREFIX.'_footer_menus',  "`menu_id` = $id");

        if($result) {

            return true;

        } else {

            return false;    

        }

    }

   public function updateMenuById($menu_id, $parent_id, $position) {

        $values = array(
            'menu_parentid' => $parent_id,
            'menu_position' => $position,
            'menu_id' => $menu_id
            
        );  
        $url = RESTURL."footer_menu/updatemenubyid";  
        // echo $url;var_dump(json_encode($values));die();
        $result = $this->CallAPI("POST",$url,$values);
        return $result;
 
    }

     /**

     * 

     * @param integer $id

     * @return array

     */

        

    /**

     * 

     * @param array $data

     * @return boolean

     */


    /*

     * for getting menu details

     * parameter integer $id

     * return array

     */

    public function getMenuDetails($id){
       

        return $this->db->find("SELECT * FROM ".DBPREFIX."_footer_menus WHERE `menu_id` = :menu_id", array(':menu_id' => $id));

    }
public function getMenuDescription(){
       
        return $this->db->find("SELECT menu_description FROM ".DBPREFIX."_footer_menus");


    }
    public function updateMenuDescription($data) {
    // Extract menu_description from the input data
    $menu_description = $data['menu_description'];

    // Perform the update using the update method
    $result = $this->db->update(
        DBPREFIX . '_footer_menus',
        ["menu_description" => $menu_description],
        '1' // No WHERE condition; this updates all rows
    );

    return $result ? true : false;
}



    

    /*

     * for updating menu data

     * parameter array $data

     * return boolean

     */

    public function updateMenuDetails($data){



        $url = RESTURL."footer_menu/updatemenudetails"; 

        // echo $url;var_dump(json_encode($values));die();
        $result = $this->CallAPI("POST",$url,$data); 

        return $result;

        // return $this->db->update(DBPREFIX.'_menus', $values, "`menu_id` = $menuId");

    }

    

    /*

     * foe deleting menu items

     *  parameter array $data

     */

    public function deleteMenuItems($data){
       extract($data);
     $url = RESTURL."footer_menu/deletemenuitems/".$deletId; 

        // echo $url;var_dump(json_encode($values));die();
        $result = $this->CallAPI("GET",$url); 

        return $result;
    }



}

    ?>