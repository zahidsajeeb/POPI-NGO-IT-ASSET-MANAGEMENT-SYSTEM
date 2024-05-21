<h4>Upload Documents: <span>Step 5 - 5</span></h4>
<hr class="mt-5">
<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Passport Required (Automated):</label>
            <input type="file" name="passport_img[]" class="form-control required" autocomplete="off" multiple style="margin-bottom:5px;">
            <table border="1" style="width:100%;">
                <tr>
                    @foreach($document_data as $row)
                        @if($row->type=='passport')
                            <td style="padding:11px;">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_theme_primary<?php echo $row->id; ?>">File View <i class="icon-file-pdf ml-2"></i>
                                </button>
                                <span><a href="javascript:void(0)" class="btn btn-danger btn-sm delete_file" data-id="<?php echo $row->file_name;?>"><i class="icon-trash ml-2"></i></a></span>
                            </td>
                        @endif
                        <div id="modal_theme_primary<?php echo $row->id; ?>"
                             class="modal fade" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary text-white">
                                        <h6 class="modal-title">Primary header</h6>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <embed src="{{ url('upload/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tr>
            </table>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <label style="color:black;font-weight:500;">SSC Certificate Required (Automated):</label>
            <input type="file" name="ssc_certificate_img[]" class="form-control" autocomplete="off" multiple style="margin-bottom:5px;">
            <table border="1" style="width:100%;">
                <tr>
                    @foreach($document_data as $row)
                        @if($row->type=='ssc_certificate')
                            <td style="padding:11px;">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_theme_primary<?php echo $row->id; ?>">File View <i class="icon-file-pdf ml-2"></i>
                                </button>
                                <span><a href="javascript:void(0)" class="btn btn-danger btn-sm delete_file" data-id="<?php echo $row->file_name;?>"><i class="icon-trash ml-2"></i></a></span>
                            </td>
                        @endif
                        <div id="modal_theme_primary<?php echo $row->id; ?>"
                             class="modal fade" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary text-white">
                                        <h6 class="modal-title">Primary header</h6>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <embed src="{{ url('upload/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tr>
            </table>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <label style="color:black;font-weight:500;">HSC Certificate Required (Automated):</label>
            <input type="file" name="hsc_certificate_img[]" class="form-control" autocomplete="off" multiple style="margin-bottom:5px;">
            <table border="1" style="width:100%;">
                <tr>
                    @foreach($document_data as $row)
                        @if($row->type=='hsc_certificate')
                            <td style="padding:11px;">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_theme_primary<?php echo $row->id; ?>">File View <i class="icon-file-pdf ml-2"></i>
                                </button>
                                <span><a href="javascript:void(0)" class="btn btn-danger btn-sm delete_file" data-id="<?php echo $row->file_name;?>"><i class="icon-trash ml-2"></i></a></span>
                            </td>
                        @endif
                        <div id="modal_theme_primary<?php echo $row->id; ?>"
                             class="modal fade" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary text-white">
                                        <h6 class="modal-title">Primary header</h6>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <embed src="{{ url('upload/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tr>
            </table>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <label style="color:black;font-weight:500;">University Certificate Required (Automated):</label>
            <input type="file" name="uni_certificate_img[]" class="form-control" autocomplete="off" multiple style="margin-bottom:5px;">
            <table border="1" style="width:100%;">
                <tr>
                    @foreach($document_data as $row)
                        @if($row->type=='uni_certificate')
                            <td style="padding:11px;">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_theme_primary<?php echo $row->id; ?>">File View <i class="icon-file-pdf ml-2"></i>
                                </button>
                                <span><a href="javascript:void(0)" class="btn btn-danger btn-sm delete_file" data-id="<?php echo $row->file_name;?>"><i class="icon-trash ml-2"></i></a></span>
                            </td>
                        @endif
                        <div id="modal_theme_primary<?php echo $row->id; ?>" class="modal fade" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary text-white">
                                        <h6 class="modal-title">Primary header</h6>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <embed src="{{ url('upload/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tr>
            </table>
        </div>
    </div>
</div>
<br/>
<div class="form-wizard-buttons">
    <button type="button" class="btn btn-previous" style="border-radius:0px;"><i class="icon icon-backward2"></i> Previous</button>
    <button type="submit" id="updateBtn" class="btn btn-submit second" style="border-radius:0px;"><i class="icon icon-forward"></i> Update</button>
</div>
