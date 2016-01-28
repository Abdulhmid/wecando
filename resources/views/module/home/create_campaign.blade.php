@extends('frontend')

@section('style')
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet">
    <!-- <link href="{!! url('plugins/summernote') !!}/font-awesome.css" rel="stylesheet"> -->
    <link href="{!! url('plugins/summernote') !!}/summernote.css" rel="stylesheet">
    <link href="{!! asset('plugins/datepicker/datepicker3.css') !!} "rel="stylesheet" type="text/css"/> 
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
        <form id="actionForm"  action="{!! url('/store-campaign') !!}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title" class="control-label">Judul Campaign</label>
                            <input class="form-control" name="title" type="text" value="" id="title" required>
                        </div>
                        <div class="form-group">
                            <label for="category_id" class="control-label">Kategori</label>
                            <select class="form-control" name="category_id" id="category_id" required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach($categoryCampaign as $key => $value)
                                    <option value="{!! $value->id !!}">{!! $value->name !!}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="state" class="control-label">Provinsi</label>
                            <select class="form-control" name="state" id="state" required>
                                <option value="">-- Pilih Provinsi --</option>
                                @foreach(ConfigurationHelper::takeState() as $key => $value)
                                    <option value="{!! $value->state_id !!}">{!! $value->name !!}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="location_id" class="control-label">Kota</label>
                            <select class="form-control" name="location_id" id="location_id" required>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="target" class="control-label">Target Donasi</label>
                            <input class="form-control" name="target" type="text" value="" id="target" required>
                        </div>
                        <div class="form-group">
                            <label for="stop" class="control-label">Target Waktu</label>
                            <input class="form-control" name="stop" type="text" value="" id="stop" required>
                        </div>
                        <div class="form-group">
                            <label for="video" class="control-label">Video</label>
                            <input class="form-control" name="video" type="url" value="" id="video" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="detail" class="control-label">Detail Informasi</label>
                            <textarea class="form-control" name="detail" type="text" id="detail" required></textarea>
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
        </form>
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
    <script type="text/javascript" src="{!! asset('plugins/datepicker/bootstrap-datepicker.js') !!}"></script>
    <script src="{!! url('plugins/summernote') !!}/summernote.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#stop').datepicker({
                format: 'yyyy-mm-d',
                autoclose : true,
                startDate: '+0d'
                // endDate: '+0d'
            });

            $("#target").keyup(function(e){
                $(this).val(format($(this).val()));
            });

            $('#detail').summernote();
            $("select#state").change(function(){
                $.get("{!! url('take-city') !!}", {
                    province_id: $("select#state").val()
                },
                function(data){
                    console.log(data);
                    $("select#location_id").empty();
                    $.each(data, function(key, value) {
                        $('select#location_id')
                            .append($("<option></option>")
                                .attr("value",key)
                                .text(value));
                    });
                });
            });
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

        var format = function(num){
            var str = num.toString().replace("$", ""), parts = false, output = [], i = 1, formatted = null;
            if(str.indexOf(".") > 0) {
                parts = str.split(".");
                str = parts[0];
            }
            str = str.split("").reverse();
            for(var j = 0, len = str.length; j < len; j++) {
                if(str[j] != ",") {
                    output.push(str[j]);
                    if(i%3 == 0 && j < (len - 1)) {
                        output.push(",");
                    }
                    i++;
                }
            }
            formatted = output.reverse().join("");
            return(formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
        };
    </script>
@stop
