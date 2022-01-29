@extends('admin.layouts.app')

@section('content')
<div class="right_col" role="main">
    <div class="col-md-12">
        <div class="x_panel">
        <div class="x_title">
            <h2><i class="fa fa-table"></i> Data Product</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <button type="button" id="addNewProduct" class="btn btn-success">Add</button></div>

            <div class="modal fade bs-example-modal-lg" id="ajax-product-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="ajaxBookModel"></h4>
                    <button type="button" class="close" data-dismiss="modal" ><span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" id="addEditProductForm" name="addEditProductForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name Product" maxlength="255" required="required">
                            </div>
                        </div>  

                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Price</label>
                            <div class="col-sm-12">
                            <input type="text" class="form-control" id="price" name="price" placeholder="Enter Price Produt" maxlength="50" required="required">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-12">
                            <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="Enter Description Product"></textarea>
                            </div>
                        </div>             
                        <br>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Image/Video</label>
                            <div class="col-sm-12">
                            <input type="file" class="form-control" id="image" name="image" required="">
                            </div>               
                            <div class="col-sm-12">
                            <img id="preview-image" src="https://www.riobeauty.co.uk/images/product_image_not_found.gif"
                                    alt="Preview" style="max-height: 250px;">
                            </div>
                        </div>
                        
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btn-save" value="addNewProduct">Save changes</button>
                    </form>
                </div>

                </div>
            </div>
            </div>
            <!-- /modals -->
            <br>
            <table class="table table-bordered table-striped" id="datatable-ajax-crud">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
        </div>
    </div>
</div>
@endsection