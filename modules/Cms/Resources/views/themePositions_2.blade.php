@extends(Config::get('cms.admin_theme'))

@section('content')

    <div id="content-wrapper">
        <div class="page-header">
            <h1>{{ trans('cms::cms.pageBuilder') }}</h1>
        </div>


        <aside id="modules_list" class="custom_scroll">

            <div id="trash_div" class="dropable">{{ trans('cms::cms.drop_module_here') }} <i class="fa fa-trash-o"></i>
            </div>

            <div id="modules_list_list">
                <div class="separator_div">{{ trans('cms::cms.modules_list') }}</div>
                <div
                        id="-2"
                        content_id="0"
                        float="0"
                        selected_pages="{{ $page_id }}"
                        all_pages="0"
                        value="0"
                        class="reorderable module_list_button"
                        draggable="true"
                        onclick="show_module_config_form($(this));"
                        ondrop="show_module_config_form($(this));"
                        >{{ trans('cms::cms.main_article_place') }}
                </div>

                <div id="-1"
                     data-type="database"
                     content_id="0"
                     float="0"
                     selected_pages="{{ $page_id }}"
                     all_pages="0"
                     value="0"
                     class="dragable module_list_button"
                     draggable="true"
                     onclick="get_module_options($(this),'http://localhost:8000/cms/modules/module-options-list2')"
                     class=" module_list_button">
                    {{ trans('cms::cms.menus') }}
                </div>

                <div class="sub_module_all_div"></div>


                @foreach($modules_list as $key=>$module)
                    <div id="{{ $key }}"
                         content_id="0"
                         float="0"

                         value="0"
                         all_pages="0"
                         class="dragable module_list_button"
                         onclick="get_module_options($(this),'{{ asset('cms/modules/module-options-list2') }}')"

                         class=" module_list_button"
                         @if(isset($module['type']))
                         data-type="{{ $module['type'] }}"
                         @else
                         data-type="0"
                            @endif >{{ $module['name'] }}


                    </div>

                    <div class="sub_module_all_div"></div>


                @endforeach
            </div>
            <div class="separator_div"><b
                        id="module_name_b">{{ trans('cms::cms.module') }}</b> {{ trans('cms::cms.attributes') }} <b
                        id="cur_module_status"></b></div>

            {!! Form::open(['url'=>asset('cms/pages/add-module'),'id'=>'module_config_form']) !!}
            {!! Form::select('module_value',['0'=>trans('cms::cms.no_values')],0,['id'=>'module_value']) !!}


            <div class="btn-group" data-toggle="buttons" id="float_button_group">
                <label class="btn btn-info">
                    <input type="radio" name="float" id="float_1" value="1"> {{ trans('cms::cms.left') }}
                </label>
                <label class="btn btn-info active">
                    <input type="radio" name="float" id="float_0" value="0"> {{ trans('cms::cms.no_float') }}
                </label>
                <label class="btn btn-info">
                    <input type="radio" name="float" id="float_2" value="2">{{ trans('cms::cms.right') }}
                </label>
            </div>

            <div class="btn-group" data-toggle="buttons" id="all_pages_button_group">
                <label class="btn btn-info">
                    <input type="radio" name="all_pages" id="all_pages_0" value="0"> {{ trans('cms::cms.all_pages') }}
                </label>
                <label class="btn btn-info active">
                    <input type="radio" name="all_pages" id="all_pages_1"
                           value="1"> {{ trans('cms::cms.selected_pages') }}
                </label>
                <label class="btn btn-info">
                    <input type="radio" name="all_pages" id="all_pages_2" value="2">{{ trans('cms::cms.except_pages') }}
                </label>
            </div>


            <div class="multi_select_all_div custom_scroll">
                <input type="hidden" name="selected_pages" value="1,3">
                @foreach($pages as $key=>$page)

                    <label value="{{ $key }}"> {{ $page }} </label>
                @endforeach
            </div>


            {!! Form::hidden('position',$page_id ,['id'=>'position_name_input' ,]) !!}

            {!! Form::hidden('type','' ) !!}
            {!! Form::hidden('content_id','' ) !!}

            {!! Form::hidden('page_id',$page_id ) !!}
            {!! Form::button( trans('cms::cms.save'),['id'=>'save_mdule_button','class'=>'btn btn-primary btn-flat']) !!}
            {!! Form::close() !!}


        </aside>

        <section id="theme_section">

            @foreach($themeRows as $row)


                <div class="themeRow">
                    @foreach( $row as $column)

                        <div class="{{ $column['class'] }}">
                            <div class="dropable" id="{{ $column['name'] }}">
                                @if(isset($positions[$column["name"].""]))
                                    @foreach($positions[$column["name"].""] as $position)
                                        {!! $position !!}
                                    @endforeach
                                @endif

                            </div>
                        </div>
                    @endforeach
                    <div class="clearfix"></div>
                </div>
            @endforeach
        </section>


    </div>


    <link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'cms_themePostions_2.css') }}">
    <script src="{{ asset($asset_folder.'jquery-2.1.1.min.js') }}"></script>
    <script src="{{ asset($asset_folder.'cms_themePostions_2.js') }}"></script>


    <link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'/myDragDrop/css/dragDrop.css') }}">
    <script src="{{ asset($asset_folder.'/myDragDrop/js/dragDropClass_2.js') }}"></script>

@stop