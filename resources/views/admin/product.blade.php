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
            <button type="button" id="create-new-product" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><span class="fa fa-plus"></span></button>
            <br>
            <div class="modal fade bs-example-modal-lg" id="ajax-product-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Add Product</h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4>Text in a modal</h4>
                    <form id="productForm" name="productForm" class="form-horizontal" enctype="multipart/form-data">
                        <input type="hidden" name="product_id" id="product_id">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Title</label>
                                <div class="col-sm-12">
                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Tilte" value="" maxlength="50" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Product Code</label>
                                <div class="col-sm-12">
                                <input type="text" class="form-control" id="product_code" name="product_code" placeholder="Enter Tilte" value="" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Description</label>
                                <div class="col-sm-12">
                                <input type="text" class="form-control" id="description" name="description" placeholder="Enter Description" value="" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Image</label>
                            <div class="col-sm-12">
                                <input id="image" type="file" name="image" accept="image/*" onchange="readURL(this);">
                                <input type="hidden" name="hidden_image" id="hidden_image">
                            </div>
                        </div>
                        <img id="modal-preview" src="https://via.placeholder.com/150" alt="Preview" class="form-group hidden" width="100" height="100">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btn-save" value="create">Save changes</button>
                    </form>
                </div>

                </div>
            </div>
            </div>
            <!-- /modals -->
            <br>
            <table class="table table-bordered table-striped" id="laravel_datatable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>S. No</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Product Code</th>
                        <th>Description</th>
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