@extends('admin.layout')
@section('content')
 <div class="wrapper wrapper-content animated fadeInRight ecommerce">

            <div class="row">
                <div class="col-lg-12">
                    <div class="tabs-container">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#tab-1"> Bài viết mới</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active">
                                    <div class="panel-body">

                                        <fieldset class="form-horizontal">
                                            <div class="form-group"><label class="col-sm-2 control-label">Tiêu đề bài viết:</label>
                                                <div class="col-sm-10"><input type="text" class="form-control" placeholder="Tiêu đề của bài viết"></div>
                                            </div>
                                      
                                            <div class="form-group"><label class="col-sm-2 control-label">Meta Tag Description:</label>
                                                <div class="col-sm-10"><input type="text" class="form-control" placeholder="mô tả meta"></div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-2 control-label">Meta Tag Keywords:</label>
                                                <div class="col-sm-10"><input type="text" class="form-control" placeholder="cà phê hạt, cà phê gói,..."></div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-2 control-label">Nội dung</label>
                                                <div class="col-sm-10">
                                                    <div class="summernote">
                                                        <h1>test</h1>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                        </fieldset>

                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
@endsection
