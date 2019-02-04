
@extends('layouts.app')

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
<script>
    WebFont.load({
    google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
    active: function() {
        sessionStorage.fonts = true;
    }
    });
</script>

<!--end::Web font -->

<link href="{{ asset('worldmap/include/spectrum.css') }}" rel="stylesheet">
<link href="{{ asset('worldmap/include/jquery.switchButton.css') }}" rel="stylesheet">
<link href="{{ asset('worldmap/styles.css') }}" rel="stylesheet">


<!--begin:: Global Mandatory Vendors -->
<link href="{{ asset('metronic/vendors/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" type="text/css" />

<!--end:: Global Mandatory Vendors -->

<!--begin:: Global Optional Vendors -->
<link href="{{ asset('metronic/vendors/tether/dist/css/tether.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/vendors/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/vendors/bootstrap-datetime-picker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/vendors/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/vendors/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/vendors/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/vendors/bootstrap-select/dist/css/bootstrap-select.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/vendors/select2/dist/css/select2.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/vendors/nouislider/distribute/nouislider.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/vendors/owl.carousel/dist/assets/owl.carousel.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/vendors/owl.carousel/dist/assets/owl.theme.default.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/vendors/ion-rangeslider/css/ion.rangeSlider.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/vendors/ion-rangeslider/css/ion.rangeSlider.skinFlat.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/vendors/dropzone/dist/dropzone.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/vendors/summernote/dist/summernote.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/vendors/bootstrap-markdown/css/bootstrap-markdown.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/vendors/animate.css/animate.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/vendors/toastr/build/toastr.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/vendors/jstree/dist/themes/default/style.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/vendors/morris.js/morris.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/vendors/chartist/dist/chartist.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/vendors/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/vendors/socicon/css/socicon.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/vendors/vendors/line-awesome/css/line-awesome.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/vendors/vendors/flaticon/css/flaticon.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/vendors/vendors/metronic/css/styles.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/vendors/vendors/fontawesome5/css/all.min.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ asset('metronic/demo/base/style.bundle.css') }}" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="{{ asset('metronic/demo/media/img/logo/favicon.ico') }}" />

<link href="{{ asset('css/home.css') }}" rel="stylesheet">

<style>
.ui-combobox {
    position: relative;
    display: inline-block;
}
.ui-combobox-button {
    position: absolute;
    top: 0;
    bottom: 0;
    margin-left: -1px;
    padding: 0;
    /* adjust styles for IE 6/7 */
    *height: 1.7em;
    *top: 0.1em;
}
</style>

<div class="page-wrapper">
    @include('include/topbar')
    <button id="btn-1" class="btn m-btn--square  btn-success m-btn m-btn--custom m-btn--bolder m-btn--uppercase" data-toggle="modal" data-target="#m_modal_1">Search for friends</button>
    <button id="btn-2" class="btn m-btn--pill m-btn--air btn-success"><i class="socicon-google" data-toggle="modal" data-target="#m_modal_2"></i></button>
    <button id="btn-3" class="btn m-btn--square  btn-success m-btn m-btn--custom m-btn--bolder m-btn--uppercase" data-toggle="modal" data-target="#m_modal_3">Invite Friend</button>
    <button id="btn-4" class="btn m-btn--pill m-btn--air btn-success" data-toggle="modal" data-target="#m_modal_4">Setting</button>

    <!--begin::Modal-->
    <div class="modal fade" id="m_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Search for friends</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="form-control-label">Latitude:</label>
                            <input type="text" class="form-control" id="lat">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="form-control-label">Logitude:</label>
                            <input type="text" class="form-control" id="lng">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveData">Send message</button>
                </div>
            </div>
        </div>
    </div>

    <!--end::Modal-->


    <!--begin::Modal-->
    <div class="modal fade" id="m_modal_2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Groups</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>I don't know what to do here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!--end::Modal-->

    <!--begin::Modal-->
    <div class="modal fade" id="m_modal_3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Friend Request</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ url('/invite')}}" id="inviteForm">
                        @csrf
                        <div class="form-group">
                            <label for="friend_name" class="form-control-label">Name:</label>
                            <div class="ui-widget" style="display:none;">
                                <select id="friend_list">
                                @foreach($friends as $friend)
                                    <option value="{{ $friend }}">{{$friend}}</option>
                                @endforeach
                                </select>
                            </div>
                            <input type="text" class="form-control" name="friend_name">
                            <input type="hidden" name="social_type">
                            <input type="hidden" name="current_user" id="current_user" value="{{ $currentUser }}">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="form-control-label">SocialType:</label>
                            <div class="social-box">
                                <ul>
                                    <li><i class="socicon-google"></i></li>
                                    <li><i class="socicon-facebook"></i></li>
                                    <li><i class="socicon-twitter"></i></li>
                                    <li><i class="socicon-istock"></i></li>
                                    <li><i class="socicon-rss"></i></li>
                                </ul>
                                <ul>
                                    <li><i class="socicon-paypal"></i></li>
                                    <li><i class="socicon-qq"></i></li>
                                    <li><i class="socicon-mail"></i></li>
                                    <li><i class="socicon-outlook"></i></li>
                                    <li><i class="socicon-dribbble"></i></li>
                                </ul>
                                <ul>
                                    <li><i class="socicon-apple"></i></li>
                                    <li><i class="socicon-bebo"></i></li>
                                    <li><i class="socicon-skype"></i></li>
                                    <li><i class="socicon-lastfm"></i></li>
                                    <li><i class="socicon-baidu"></i></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="send_invite">Invite</button>
                    <button type="button" class="btn btn-primary" id="add_globe">Add without Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <!--end::Modal-->


    <!--begin::Modal-->
    <div class="modal fade" id="m_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Settings:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form method="POST" action="{{ url('/setting')}}" id="settingForm">
                    @csrf
                    <h5>People can add me to their globe without confirmation:</h5>
                    <label class="m-checkbox">
                        @if($setting_1)
                        <input type="checkbox" id="setting_1" checked="checked">
                        @else
                        <input type="checkbox" id="setting_1">
                        @endif
                        <input type="hidden" name="setting_1" value="{{ $setting_1 }}">
                        <span></span>
                    </label>
                    <hr>
                    <h5>Change Location accordingly:</h5>
                    <label class="m-checkbox">
                        @if($setting_2)
                        <input type="checkbox" id="setting_2" checked="checked">
                        @else
                        <input type="checkbox" id="setting_2">
                        @endif
                        <input type="hidden" name="setting_2" value="{{ $setting_2 }}">
                        <span></span>
                    </label>  
                    <hr>
                    <h5>Clean all Pins</h5>
                    <button type="button" class="btn btn-primary" id="clear_map">Clear Map</button>
                </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="setting_save">OK</button>
                </div>
            </div>
        </div>
    </div>

    <!--end::Modal-->


    <div class="page-container">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>
    <div id="container">
            <div id="globe" style="margin:0px;"></div>
            <input type="hidden" id="newData" value="{{ $newData }}">

            <div id="options" style="display:none;">
                <div id="options-content">
                    <h3>Add element by clicking map below</h3>
                    <img class="projection" src="resources/point_picker.png" width= "280px"/>
                    <ul id = "add-element">
                        <li id="add-pin" class="button selected">Drop Pin</li>
                        <li id="add-marker" class="button">Marker</li>
                        <li id="add-satellite" class="button">Satellite</li>
                    </ul>
                    <h3>Configure Globe</h3>

                    <div>
                        <label>
                            Color Palette
                        </label>
                        <ul id="color-options">
                            <li title="Globe Color"><input type="text" id="globe-color" value="#ffcc00"></li>
                            <li title="Pin Color"><input type="text" id="pin-color" value="#8FD8D8"></li>
                            <li title="Marker Color"><input type="text" id="marker-color" value="#ffcc00"></li>
                            <li title="Satellite Core Color"><input type="text" id="satellite-color" value="#ff0000"></li>
                        </ul>

                        <label>
                            Globe Scale
                        </label>
                        <input type="text" id="globe-scale" data-slider="true" data-slider-range=".1, 3.0" data-slider-step=".01" data-slider-highlight="true" value="1.0"/>

                        <label>
                            View Angle
                        </label>
                        <input type="text" id="globe-va" data-slider="true" data-slider-range="-1.57, 1.57" data-slider-step=".01" data-slider-highlight="true" value=".1"/>

                        <label>
                            Seconds per Rotation
                        </label>
                        <input type="text" id="globe-spr" data-slider="true" data-slider-range="1, 120" data-slider-step="1" data-slider-highlight="true" value="28"/>

                        <!--
                        <label>
                            Points per Degree
                        </label>
                        <input type="text" id="globe-ppd" data-slider="true" data-slider-range=".5,4" data-slider-step=".1" data-slider-highlight="true" value="1.1"/>

                        <label>
                            Point Size
                        </label>
                        <input type="text" id="globe-ps" data-slider="true" data-slider-range=".1,1.0" data-slider-step=".1" data-slider-highlight="true" value=".6"/>
                        -->

                        <label>
                            Intro Duration (ms)
                        </label>
                        <input type="text" id="globe-id" data-slider="true" data-slider-range="500,5000" data-slider-step="100" data-slider-highlight="true" value="2000"/>

                        <label>
                            Max Pins
                        </label>
                        <input type="text" id="globe-mp" data-slider="true" data-slider-range="10,1000" data-slider-step="10" data-slider-highlight="true" value="500"/>

                        <label>
                            Max Markers
                        </label>
                        <input type="text" id="globe-mm" data-slider="true" data-slider-range="1,10" data-slider-step="1" data-slider-highlight="true" value="4"/>

                        <label>
                            Satellite Altitude
                        </label>
                        <input type="text" id="globe-sa" data-slider="true" data-slider-range="1.0,3.0" data-slider-step=".01" data-slider-highlight="true" value="1.3"/>

                        <label>
                            Satellite Intensity
                        </label>
                        <input type="text" id="globe-si" data-slider="true" data-slider-range="3,12" data-slider-step="1" data-slider-highlight="true" value="8"/>

                        <label>
                            Load Dummy Data
                        </label>
                        <div class="switch">
                            <input type="checkbox" id="globe-dd" value="1" checked>
                        </div>
                    </div>

                    <div id="apply-button" class="button">Reload</div>                    
                </div>
            </div>    
        </div>
</div>

<script src="//code.jquery.com/jquery-2.0.3.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
<!-- <script src="{{asset('worldmap/include/jquery.min.js')}}"></script>
<script src="{{asset('worldmap/include/jqueryui.js')}}"></script> -->
<script src="{{asset('worldmap/include/spectrum.js')}}"></script>
<script src="{{asset('worldmap/include/jquery.switchButton.js')}}"></script>
<script src="{{asset('worldmap/include/pusher.color.js')}}"></script>
<script src="{{asset('worldmap/include/Detector.js')}}"></script>
<script src="{{asset('worldmap/data.js')}}"></script>
<script src="{{asset('worldmap/grid.js')}}"></script>
<script src="{{asset('worldmap/build/encom-globe.js')}}"></script>
<script src="{{asset('worldmap/index.js')}}"></script>   


<!--begin:: Global Mandatory Vendors -->
<script src="{{asset('metronic/vendors/jquery/dist/jquery.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/popper.js/dist/umd/popper.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/js-cookie/src/js.cookie.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/moment/min/moment.min.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/tooltip.js/dist/umd/tooltip.min.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/perfect-scrollbar/dist/perfect-scrollbar.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/wnumb/wNumb.js') }}" type="text/javascript"></script>

<!--end:: Global Mandatory Vendors -->

<!--begin:: Global Optional Vendors -->
<script src="{{asset('metronic/vendors/jquery.repeater/src/lib.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/jquery.repeater/src/jquery.input.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/jquery.repeater/src/repeater.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/jquery-form/dist/jquery.form.min.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/block-ui/jquery.blockUI.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/js/framework/components/plugins/forms/bootstrap-datepicker.init.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/js/framework/components/plugins/forms/bootstrap-timepicker.init.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/bootstrap-daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/js/framework/components/plugins/forms/bootstrap-daterangepicker.init.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/bootstrap-maxlength/src/bootstrap-maxlength.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/bootstrap-switch/dist/js/bootstrap-switch.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/js/framework/components/plugins/forms/bootstrap-switch.init.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/bootstrap-select/dist/js/bootstrap-select.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/select2/dist/js/select2.full.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/typeahead.js/dist/typeahead.bundle.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/handlebars/dist/handlebars.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/inputmask/dist/jquery.inputmask.bundle.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/inputmask/dist/inputmask/inputmask.date.extensions.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/inputmask/dist/inputmask/inputmask.numeric.extensions.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/inputmask/dist/inputmask/inputmask.phone.extensions.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/nouislider/distribute/nouislider.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/owl.carousel/dist/owl.carousel.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/autosize/dist/autosize.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/clipboard/dist/clipboard.min.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/ion-rangeslider/js/ion.rangeSlider.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/dropzone/dist/dropzone.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/summernote/dist/summernote.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/markdown/lib/markdown.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/bootstrap-markdown/js/bootstrap-markdown.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/js/framework/components/plugins/forms/bootstrap-markdown.init.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/jquery-validation/dist/jquery.validate.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/jquery-validation/dist/additional-methods.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/js/framework/components/plugins/forms/jquery-validation.init.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/bootstrap-notify/bootstrap-notify.min.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/js/framework/components/plugins/base/bootstrap-notify.init.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/toastr/build/toastr.min.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/jstree/dist/jstree.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/raphael/raphael.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/morris.js/morris.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/chartist/dist/chartist.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/chart.js/dist/Chart.bundle.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/js/framework/components/plugins/charts/chart.init.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/vendors/jquery-idletimer/idle-timer.min.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/waypoints/lib/jquery.waypoints.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/counterup/jquery.counterup.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/es6-promise-polyfill/promise.min.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/sweetalert2/dist/sweetalert2.min.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/js/framework/components/plugins/base/sweetalert2.init.js') }}" type="text/javascript"></script>


<!--begin::Global Theme Bundle -->
<script src="{{ asset('metronic//demo/base/scripts.bundle.js') }}" type="text/javascript"></script>

<script src="//js.pusher.com/3.1/pusher.min.js"></script>
<script src="{{ asset('js/home.js') }}" type="text/javascript"></script>


@endsection

