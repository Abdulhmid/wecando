<div class="row">
    <div class="col-lg-4 col-xs-6">
        <div class="small-box bg-green">
            <div class="inner">
                <h3>
                    <span id="active"></span>
                </h3>
                <span id="loading-active"><i class="fa fa-spinner fa-2x fa-pulse"></i></span>

                <p>Total Campaign Masih Aktif</p>
            </div>
            <div class="icon">
                <i class="ion ion-checkmark"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-xs-6">
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><span id="finish"></span></h3>
                <span id="loading-finish"><i class="fa fa-spinner fa-2x fa-pulse"></i></span>

                <p>Total Campaign Selesai</p>
            </div>
            <div class="icon">
                <i class="ion ion-close-round"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-xs-6">
        <div class="small-box bg-red">
            <div class="inner">
                <h3><span id="all"></span></h3>
                <span id="loading-all"><i class="fa fa-spinner fa-2x fa-pulse"></i></span>

                <p>Total Keseluruhan Campaign</p>
            </div>
            <div class="icon">
                <i class="ion ion-arrow-move"></i>
            </div>
        </div>
    </div>
</div>

@section('script')
    @parent

    <script type="text/javascript">
        $(document).ready(function () {

            /* Running Well */
            $.get("{!! url('home/campaign-active') !!}"+"/"+1, function (data) {
                        $('#active')
                                .text(data);
                    })
                    .always(function () {
                        $('#loading-active').show()
                    })
                    .done(function () {
                        $('#loading-active').hide();
                    });

            /* Finish */
            $.get("{!! url('home/campaign-active') !!}"+"/"+0, function (data) {
                        $('#finish')
                                .text(data);
                    })
                    .always(function () {
                        $('#loading-finish').show()
                    })
                    .done(function () {
                        $('#loading-finish').hide();
                    });

            /* All */
            $.get("{!! url('home/campaign-all') !!}", function (data) {
                        $('#all')
                                .text(data);
                    })
                    .always(function () {
                        $('#loading-all').show()
                    })
                    .done(function () {
                        $('#loading-all').hide();
                    });
        });
    </script>

@endsection