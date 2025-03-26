<div id="layout-wrapper">
    <div class="main-content">  
        <div class="page-content">
            <div class="card mt-n4 mx-n3 border-0 rounded-0 bg-primary-subtle breadcrumb_bg">
                <div class="card-body pb-0 px-4">
                    <div class="container-fluid">
                        <div class="row justify-content-between align-items-center g-3 mb-5 pb-1 pt-3">
                            <div class="col-lg-4">
                                <h4 class="mb-0">Banners</h4>
                            </div>                            
                    </div>
                </div>
            </div>
        </div> 
        <div class="container-fluid"> 
            <div class="row mt-n5"> 
                <div class="card">   
            
                    <form id="editPgesForm" autocomplete="off" class="needs-validation p-2" novalidate method="post" action="<?php echo SITEURL?>otherpages/updatePage" enctype="multipart/form-data" >
                        <input type="hidden" id="edit_page_id" class="form-control" value="<?php echo $this->pages->id?>" name="page_id">
                      
                         
                        <div class="d-flex flex-column gap-3">
                            <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label for="edit_page_title" class="form-label">Title: <span class="text-danger">*</span>  </label>
                                <input type="text" class="form-control" name="image_type" id="edit_page_title" required value="<?php echo $this->pages->image_type?>"/>                                
                            </div> 
                           
                             <div class="col-lg-12 mb-3">
                            <label for="image" class="form-label">File Upload</label> 
                            <?php if($this->pages->image_name !='') { ?>
                            <img src="<?php echo FRONTUPLOADURL . 'banners/' . $image_name;} ?>" style="width:100px;">             
                            <input type="hidden" class="form-control" name="image_name_old" value="<?php echo $this->pages->image_name; ?>"> 
                      
                            <input type="file" class="form-control" id="image" name="image_name">
                        </div>
                              
                           
                            
                            <div class="col-lg-6 mb-3">
                                <label for="label" class="form-label">Status <span>*</span> </label>
                                <select class="form-select" id="label" name="page_status" required>
                                    <option value="0" <?php if($this->pages->page_status == '0') echo 'selected'  ?> >Active</option>
                                    <option value="1" <?php if($this->pages->page_status == '1') echo 'selected'  ?>>InActive</option>
                                </select>
                            </div>
                        </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-success">Update</button>
                                <button type="button" class="btn btn-danger" onclick="history.back('-1');">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
