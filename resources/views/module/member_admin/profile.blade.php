@extends('frontend_dashboard')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box ">
                <div class="box-body">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger autohide">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ url('store-profil/'.session('member_session')['id']) }}" method="post" role="form" accept-charset="UTF-8" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="parent" class="control-label">Nama</label>    
                                <input class="form-control" id="fullname" name="fullname" type="text" value="{!! !empty($row->fullname) ? $row->fullname : '' !!}">  
                            </div>
                            <div class="form-group">
                                <label for="password" class="control-label">Password</label>    
                                <input class="form-control" id="password" name="password" type="password" value=""> 
                                <p> Kosongkan Password jika tidak mau diubah </p>     
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation" class="control-label">Password Confirmation</label>    
                                <input class="form-control" id="password_confirmation" name="password_confirmation" type="password" value="">            
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="image" class="control-label">Photo</label>    

                                <input class="form-control" id="file" onchange="readUrl(this)" style="display:none" name="image" type="file">    

                                <div class="text-danger"></div>
                                <button class="form-control btn bg-gray" id="upload" type="button" onclick="chooseFile()"><i class="fa fa-upload"></i> Browse</button>
                                <br>                        
                                <p class="text-center">
                                    <img id="preview_img" class="img img-thumbnail" style="margin-top: 25px; max-height:200px" src="{{ !empty($row->image) ? asset(GLobalHelper::checkImage($row->image)) : '' }}">
                                </p>                                
                            </div>
                        </div>

                        <div class="col-md-12"><hr/>
                            <div class="box-footer">
                                <div class="pull-right">
                                    <button class="btn btn-danger" type="button" id="reset">
                                        <i class="fa fa-refresh" style="margin-right:5px"></i> Perbaruhi Data
                                    </button>
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-file" style="margin-right:5px"></i> Simpan
                                    </button>
                                </div>
                                <div class="clearfix"></div> <br/>
                            </div>
                        </div><br/> 
                    </form>
                </div>
                <div class="clearfix"></div>
            </div>

        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
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
@endsection


