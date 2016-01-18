@extends('frontend')

@section('style')
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet">
    <!-- <link href="{!! url('plugins/summernote') !!}/font-awesome.css" rel="stylesheet"> -->
    <link href="{!! url('plugins/summernote') !!}/summernote.css" rel="stylesheet">
@stop

@section('content')
    <section id="page-breadcrumb">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-8">
                            <h1 class="title">Fundraising</h1>
                            <p>Buat Fundraising Baru</p>
                        </div>
                        <div class="col-sm-4" class="pull-right" style="margin-top:12px">
                            <a href="{!! url('dashboard') !!}" class="pull-right btn btn-info">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </section>
    <!--/#action-->

    <section id="blog" class="padding-top" style="padding-top:4px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="username" class="control-label">Judul Campaign</label>
                        <input class="form-control" name="title" type="text" value="" id="title">
                    </div>
                    <div class="form-group">
                        <label for="username" class="control-label">Kategori</label>
                        <input class="form-control" name="username" type="text" value="" id="username">
                    </div>
                    <div class="form-group">
                        <label for="username" class="control-label">Provinsi</label>
                        <input class="form-control" name="username" type="text" value="" id="username">
                    </div>
                    <div class="form-group">
                        <label for="username" class="control-label">Kota</label>
                        <input class="form-control" name="username" type="text" value="" id="username">
                    </div>
                    <div class="form-group">
                        <label for="username" class="control-label">Target Donasi</label>
                        <input class="form-control" name="username" type="text" value="" id="username">
                    </div>
                    <div class="form-group">
                        <label for="username" class="control-label">Target Waktu</label>
                        <input class="form-control" name="username" type="text" value="" id="username">
                    </div>
                    <div class="form-group">
                        <label for="username" class="control-label">Video</label>
                        <input class="form-control" name="video" type="text" value="" id="video">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="username" class="control-label">Detail Informasi</label>
                        <textarea class="form-control" name="content" type="text" value="" id="content"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image" class="control-label">Image</label>
                        <input class="form-control" id="file" onchange="readUrl(this)" style="display:none" name="image" type="file">
                        <div class="text-danger"></div>
                        <button class="form-control btn bg-gray" type="button" onclick="chooseFile()"><i class="fa fa-upload"></i> Browse</button>
                        <br>
                        <p class="text-center">
                            <img id="preview_img" class="img img-thumbnail" style="margin-top: 25px; max-height:200px" src="">
                        </p>
                    </div>
                </div>
            </div><hr/>
            <div class="row">
                <div class="form-group live-preview">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-common uppercase form-control" style="color: #070779;border-color: #08087D;"> Submit </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#blog-->
	 <!--/#portfolio-information-->
    <section id="related-work" class="padding-top padding-bottom">
        <div class="container">
        </div>
    </section>
@stop

@section('script')
    <!-- Editor Script -->
    <script src="{!! url('plugins/summernote') !!}/summernote.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#content').summernote();
        });
        function readUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preview_img').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        function chooseFile()
        {
            $('#file').click();
        }
    </script>
@stop
