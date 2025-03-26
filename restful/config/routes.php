<?php
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App; 

 
return function (App $app) { 

  define('SOURCEPATH', ''); 

  /* USERS */

  $app->post(SOURCEPATH.'/users/checklogin',\App\Action\Users\CheckLogin::class);
  $app->post(SOURCEPATH.'/users/checklogin2', \App\Action\Users\CheckLogin2::class);
  $app->get(SOURCEPATH.'/users/getusers',\App\Action\Users\GetUsers::class);
  $app->get(SOURCEPATH.'/users/getuserdetails/{user_id}',\App\Action\Users\GetUserDetails::class);
  $app->get(SOURCEPATH.'/users/getusername',\App\Action\Users\GetUserName::class);  
  $app->get(SOURCEPATH.'/users/getcustomers',\App\Action\Users\GetCustomers::class);
  $app->post(SOURCEPATH.'/users/adduser', \App\Action\Users\AddUser::class);
  $app->post(SOURCEPATH.'/users/edituser', \App\Action\Users\EditUser::class);
  $app->post(SOURCEPATH.'/users/deleteuser',\App\Action\Users\DeleteUser::class);
  $app->get(SOURCEPATH.'/users/checkusername/{user_name}',\App\Action\Users\CheckUserName::class);
  $app->get(SOURCEPATH.'/users/checkuseremail/{user_email}',\App\Action\Users\CheckUserEmail::class);
  
  $app->get(SOURCEPATH.'/users/getuseremaildetails/{email}',\App\Action\Users\GetUserEmailDetails::class);
  $app->post(SOURCEPATH.'/users/checkpassword',\App\Action\Users\CheckPassword::class);
  $app->post(SOURCEPATH.'/users/updatepassword', \App\Action\Users\UpdatePassword::class);
  $app->get(SOURCEPATH.'/users/getuserdetails',\App\Action\Users\GetUserDetails::class); 

  $app->post(SOURCEPATH.'/users/checkemail',\App\Action\Users\CheckEmail::class);
  $app->post(SOURCEPATH.'/users/checkeditemail',\App\Action\Users\CheckEditEmail::class);
  $app->post(SOURCEPATH.'/users/updateprofiledetails',\App\Action\Users\UpdateProfileDetails::class);
  
  $app->get(SOURCEPATH.'/users/getsitesettings',\App\Action\Users\GetSiteSettings::class);
  $app->post(SOURCEPATH.'/users/updatesettingsdetails',\App\Action\Users\UpdateSettingsDetails::class);



  /* Roles*/
  $app->get(SOURCEPATH.'/roles/getroles',\App\Action\Roles\GetRoles::class);
  $app->post(SOURCEPATH.'/roles/addrole',\App\Action\Roles\AddRole::class);
  $app->post(SOURCEPATH.'/roles/editrole',\App\Action\Roles\EditRole::class);
  $app->delete(SOURCEPATH.'/roles/deleterole/{role_id}/{user_id}/{apiKey}',\App\Action\Roles\DeleteRole::class);
  $app->get(SOURCEPATH.'/roles/getmodules',\App\Action\Roles\GetModules::class);
  $app->get(SOURCEPATH.'/roles/getprivileges/{role_id}',\App\Action\Roles\GetPrivileges::class);
  $app->post(SOURCEPATH.'/roles/accesspages',\App\Action\Roles\AccessPages::class);



   /* Pages */
  $app->post(SOURCEPATH.'/pages/addpage',\App\Action\Pages\AddPage::class);
  $app->post(SOURCEPATH.'/pages/getallpages',\App\Action\Pages\GetAllPages::class);
  $app->get(SOURCEPATH.'/pages/getpagedetails/{page_id}',\App\Action\Pages\GetPageDetails::class);
  $app->post(SOURCEPATH.'/pages/updatepage',\App\Action\Pages\UpdatePage::class);
  $app->post(SOURCEPATH.'/pages/deletepage',\App\Action\Pages\DeletePage::class);

  /* banners */
  $app->post(SOURCEPATH.'/banners/addpage',\App\Action\Banners\AddPage::class);
  $app->post(SOURCEPATH.'/banners/getallpages',\App\Action\Banners\GetAllPages::class);
  $app->get(SOURCEPATH.'/banners/getpagedetails/{id}',\App\Action\Banners\GetPageDetails::class);
  $app->post(SOURCEPATH.'/banners/updatepage',\App\Action\Banners\UpdatePage::class);
  $app->post(SOURCEPATH.'/banners/deletepage',\App\Action\Banners\DeletePage::class);
  
  

  /* menus */
  
  $app->get(SOURCEPATH.'/menus/getallmenus',\App\Action\Menus\GetAllMenus::class);
  $app->get(SOURCEPATH.'/menus/getallpages',\App\Action\Menus\GetAllPages::class);
  $app->get(SOURCEPATH.'/menus/getallmodules',\App\Action\Menus\GetAllModules::class);
  $app->post(SOURCEPATH.'/menus/addmenudetails',\App\Action\Menus\AddMenuDetails::class);
  $app->post(SOURCEPATH.'/menus/updatemenudetails',\App\Action\Menus\UpdateMenuDetails::class);
  $app->get(SOURCEPATH.'/menus/getmenudetails/{menu_id}',\App\Action\Menus\GetMenuDetails::class);
    $app->get(SOURCEPATH.'/menus/deletemenuitems/{menu_id}',\App\Action\Menus\DeleteMenuItems::class);
  $app->post(SOURCEPATH.'/menus/updatemenubyid',\App\Action\Menus\UpdateMenuById::class);

/* footer menus */
   $app->get(SOURCEPATH.'/footer_menu/getallmenus',\App\Action\Footer_menu\GetAllMenus::class);
  $app->get(SOURCEPATH.'/footer_menu/getallpages',\App\Action\Footer_menu\GetAllPages::class);
  $app->get(SOURCEPATH.'/footer_menu/getallmodules',\App\Action\Footer_menu\GetAllModules::class);
  $app->post(SOURCEPATH.'/footer_menu/addmenudetails',\App\Action\Footer_menu\AddMenuDetails::class);
  $app->post(SOURCEPATH.'/footer_menu/updatemenudetails',\App\Action\Footer_menu\UpdateMenuDetails::class);
  $app->get(SOURCEPATH.'/footer_menu/getmenudetails/{menu_id}',\App\Action\Footer_menu\GetMenuDetails::class);
    $app->get(SOURCEPATH.'/footer_menu/deletemenuitems/{menu_id}',\App\Action\Footer_menu\DeleteMenuItems::class);
  $app->post(SOURCEPATH.'/footer_menu/updatemenubyid',\App\Action\Footer_menu\UpdateMenuById::class);

  /* Enquiries */
  $app->get(SOURCEPATH.'/enquiries/getallenquiries',\App\Action\Enquiries\GetAllEnquiries::class);

   /* Dashboard */

 
  $app->get(SOURCEPATH.'/dashboard/getdashboardpages',\App\Action\Dashboard\GetDashboardPages::class);

  $app->get(SOURCEPATH.'/dashboard/getdashboardcount',\App\Action\Dashboard\GetDashboardCount::class);


  /* Front End */

  $app->get(SOURCEPATH.'/goutham/getallmenus',\App\Action\Gouthams\GetAllMenus::class);
  $app->get(SOURCEPATH.'/goutham/getallfooter_menus',\App\Action\Gouthams\GetAllFooterMenus::class);

 
  $app->post(SOURCEPATH.'/goutham/gethomepagedetails',\App\Action\Gouthams\GetHomePageDetails::class); 

  $app->get(SOURCEPATH.'/goutham/getpagedetails/{page_type}',\App\Action\Gouthams\GetPageDetails::class); 
  $app->post(SOURCEPATH.'/goutham/sendenquiry',\App\Action\Gouthams\SendEnquiry::class);
  $app->post(SOURCEPATH.'/goutham/addcontactdetails',\App\Action\Gouthams\AddContactDetails::class);
  $app->get(SOURCEPATH.'/goutham/getmoduledetails/{module_id}',\App\Action\Gouthams\GetModuleDetails::class);  
  $app->get(SOURCEPATH.'/goutham/getsettingsdata',\App\Action\Gouthams\GetSettingsData::class); 


  


 



};