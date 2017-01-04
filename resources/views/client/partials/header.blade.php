  <!-- Top Navigation -->
  <nav class=" navbar navbar-default navbar-static-top m-b-0"  >
    <div class="navbar-header">
      <!-- .Logo -->
      <div class="top-left-part"><a class="logo" href="/">
        <!--This is logo icon-->
        <img src="{{'/assets/'.config('fxweb.layoutAssetsFolder')}}/plugins/images/eliteadmin-small-logo.png" alt="home" class="light-logo" /></a></div>
         <ul class="nav navbar-top-links navbar-left hidden-xs">
           <li><a href="javascript:void(0)" class="logotext">
             <!--This is logo text-->
             <img src="/assets/fxwebkit/img/logo.png" style="max-width:100px;" alt="home" class="light-logo" alt="home" /></a></li>
         </ul>
      <!-- /.Logo -->
      <!-- top right panel -->
      <ul class="nav navbar-top-links navbar-right pull-right">

        <!-- .dropdown -->
        <li class="dropdown">
         <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"><i class="fa fa-language"></i>
{{ trans('general.language') }}
          </a>
          <ul class="dropdown-menu dropdown-tasks animated slideInUp">
                {{-- --}}
@foreach(config('app.language')  as $locale=>$name)

            <li> <a href="?locale={{$locale}}">
            {{ trans('general.'.$name) }}
              </a> </li>
@endforeach

                </ul>
          <!-- /.dropdown-tasks -->
        </li>
        <!-- /.dropdown -->
        <!-- .dropdown -->
        <li class="dropdown"> <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="data:image/jpeg;base64,{{ current_user()->getAvatar() }}" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">{{ current_user()->getName() }}</b> </a>
          <ul class="dropdown-menu dropdown-user animated flipInY">
            <li><a href="{{ route('client.users.profile') }}"><i class="ti-user"></i> {{ trans('general.Profile') }}</a></li>
            <li><a href=" {{ route('client.users.changePassword') }}"><i class="ti-lock "></i>{{ trans('general.changePassword') }}</a></li>

                            <li role="separator" class="divider"></li>

                            <li role="separator" class="divider"></li>
                            <li><a href="{{ route('client.auth.logout') }}"><i class="fa fa-power-off"></i> {{ trans('general.Logout') }}</a></li>
                                                          </ul>
                                                          <!-- /.dropdown-user -->
                                                        </li>
                                                        <!-- /.dropdown -->
                                                        <!-- .right toggle -->
                                                        <li class="right-side-toggle"><a class="waves-effect waves-light" href="javascript:void(0)"> <i class="ti-arrow-right"></i></a></li>
                                                        <!-- /.right toggle -->
                                                      </ul>
                                                      <!-- top right panel -->
                                                    </div>
                                                  </nav>
                                                  <!-- End Top Navigation -->
















{{--app_name()--}}

                                {{--@foreach(config('app.language')  as $locale=>$name)--}}
                                   {{--{{$locale}}{{ trans('general.'.$name) }}--}}

                                {{--@endforeach--}}
                          {{--{{ current_user()->getAvatar() }}--}}
                                {{--{{ current_user()->getName() }}--}}
                                {{--{{ route('client.users.profile') }}--}}
                                {{--{{ Lang::get('general.Profile') }}--}}
                                {{--{{ route('client.users.changePassword') }}--}}
                                {{--{{ trans('general.changePassword') }}--}}
                                {{--{{ route('client.auth.logout') }}--}}
                                {{--{{ Lang::get('general.Logout') }}--}}