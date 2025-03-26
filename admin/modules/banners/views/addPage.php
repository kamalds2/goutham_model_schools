<div id="layout-wrapper">
    <div class="main-content">  
        <div class="page-content">
            <div class="card mt-n4 mx-n3 border-0 rounded-0 bg-primary-subtle breadcrumb_bg">
                <div class="card-body pb-0 px-4">
                    <div class="container-fluid">
                        <div class="row justify-content-between align-items-center g-3 mb-5 pb-1 pt-3">
                            <div class="col-lg-4">
                                <h4 class="mb-0"> Banners</h4>
                            </div>                            
                    </div>
                </div>
            </div> 
        </div> 
        <div class="container-fluid"> 
            <div class="row mt-n5">                 
                <div class="card">            
                    <form id="addPagesForm" autocomplete="off" class="needs-validation p-2" novalidate method="post" action="<?php echo SITEURL?>banners/createPage" enctype="multipart/form-data" onSubmit="return validform();">
                         
                        <div class="d-flex flex-column gap-3">
                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <label for="edit_page_title" class="form-label">Title <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control" name="image_type" id="edit_page_title"  />                                
                                </div>
                                                               
                            
                                 <div class="col-lg-12 mb-3">                                 
                                <label for="image" class="form-label"> File Upload :  <span class="text-danger"> * </span> </label>
                                <input type="file" class="form-control" id="image" name="image_name" >
                            </div>


                             
                                <div class="col-lg-6 mb-3">
                                    <label for="page_status" class="form-label">Status <span class="text-danger">*</span></label> 
                                    <select class="form-select" id="page_status" name="image_status">
                                        <option value=""  >Select Status</option>
                                        <option value="0"  >Active</option>
                                        <option value="1" >InActive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-success">Add</button>
                            <button type="button" class="btn btn-danger" onclick="history.back('-1');">Cancel</button>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

 


