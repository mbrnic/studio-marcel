<div class="row">
    <div class="large-12 columns">

        @if (Session::has('message'))

            <div class="box bg-light-green">
                <div class="box-header bg-light-green ">
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <span class="box-btn" data-widget="remove"><i class="icon-cross"></i>
                        </span>
                    </div>
                    <h3 class="box-title "><i class="text-white  icon-thumbs-up"></i>
                        <span class="text-white">SUCCESS</span>
                    </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body " style="display: block;">
                    <p class="text-white"><strong>{{ Session::get('message') }}</strong></p>
                </div>
            </div>

        @endif


        @if (Session::has('error'))

            <div class="box bg-red">
                <div class="box-header bg-red">
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <span class="box-btn" data-widget="remove"><i class="icon-cross"></i>
                        </span>
                    </div>
                    <h3 class="box-title "><i class="text-white  icon-thumbs-up"></i>
                        <span class="text-white">ERROR</span>
                    </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body " style="display: block;">
                    <p class="text-white"><strong>{{ Session::get('error') }}</strong></p>
                </div>
            </div>

        @endif



        @foreach ($errors->all() as $error)

            <div class="box bg-red">
                <div class="box-header bg-red">
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <span class="box-btn" data-widget="remove"><i class="icon-cross"></i>
                        </span>
                    </div>
                    <h3 class="box-title "><i class="text-white  fontello-cancel-circled"></i>
                        <span class="text-white">ERROR</span>
                    </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body " style="display: block;">
                    <p class="text-white"><strong>{{ $error }}</strong></p>
                </div>
            </div>

        @endforeach