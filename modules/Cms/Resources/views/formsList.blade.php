@extends(Config::get('cms.admin_theme'))

@section('content')
    <div id="content-wrapper">
        <div class="page-header">
            <h1>{{ trans('cms::cms.formsList') }}</h1>
        </div>

        {!! Form::open(['url'=>asset('cms/forms/form'),'method'=>'get', 'style'=>'margin-bottom:30px']) !!}

        {!! Form::submit(trans('cms::cms.create_new_form'),["name"=>'new_form_submit','class'=>'btn btn-primary' ]) !!}

        {!! Form::close() !!}


        <div class="table-light">
            <div class="table-header">
                <div class="table-caption">

                    {{ trans('cms::cms.formsList') }}
                </div>
            </div>
            {!! Form::open(['url'=>asset('cms/forms/forms')]) !!}
            <table border="0" class="table table-bordered table-striped cms_table">
                <thead>
                <th style="width:100px;">{!! Form::checkbox('check_all','0',false,['id'=>'check_all']).Form::label('check_all',trans('cms::cms.select_all')) !!}</th>
                <th>{{ trans('cms::cms.id') }}</th>
                <th>{{ trans('cms::cms.name') }}</th>
                <th>{{ trans('cms::cms.page') }} </th>
                <th></th>
                </thead>
                <tbody>
                {{-- */$i=0;/* --}}
                {{-- */$class='';/* --}}
                @foreach($forms as $form)
                    {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                    <tr class='{{ $class }}'>
                        <td>{!! Form::checkbox('forms_checkbox[]',$form->id,false,['class'=>'forms_checkbox']) !!}</td>
                        <td>{{ $form->id }}</td>
                        <td><a href="/cms/{{ strtolower($form->name) }}">{{ $form->alias }}</a></td>
                        <td>{{ $pages[$form->page_id] }}</td>
                        <td>
                            <button class="icon_button tooltip_number">
                                <a  href="/cms/{{ strtolower($form->name) }}" class="icon_button blue_icon fa fa-file-text tooltip_number" data-original-title={{trans('cms::cms.details')}}></a>
                            </button>

                            <button class="icon_button tooltip_number">
                                <a  href="{{ route('emailtemplates.createFormTemplate') }}?formId={{$form->id}}&templateType=client" class="icon_button blue_icon fa fa-users tooltip_number" data-original-title="{{trans('cms::cms.clientEmailTemplate')}}"></a>
                            </button>

                            <button class="icon_button tooltip_number">
                                <a  href="{{ route('emailtemplates.createFormTemplate') }}?formId={{$form->id}}&templateType=admin" class="icon_button blue_icon fa fa-user tooltip_number" data-original-title="{{trans('cms::cms.adminEmailTemplate')}}"></a>
                            </button>

                            {!! Form::button('<i class="fa fa-cog "></i>',['name'=>'edit_form_page' ,'class'=>'icon_button blue_icon tooltip_number','data-original-title'=>trans('cms::cms.edit'),'type'=>'submit','value'=>$form->id ]) !!}

                            {!! Form::button('<i class="fa fa-trash-o"></i>',['name'=>'delete_form_submit' ,'onclick'=>'if(!confirm("Are you sure you want to delete forms with its links")) return false;','class'=>'icon_button tooltip_number','data-original-title'=>trans('cms::cms.delete'),'type'=>'submit','value'=>$form->id ]) !!}

                        </td>
                    <tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="5">

                        <div style="width:250px;display: inline-block; ">
                            {!! Form::select('pages_select',$pages,0) !!}
                        </div>
                        {!! Form::button(trans('cms::cms.change_forms_page'),['name'=>'change_groub_form_pages_submit' ,'type'=>'submit' ,'class'=>'btn btn-primary']) !!}
                    </td>
                </tr>
                </tfoot>
            </table>
            {!! Form::close() !!}
        </div>

        <link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'main.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'cms_formsList.css') }}">
        <script src="{{ asset($asset_folder.'jquery-2.1.1.min.js') }}"></script>
        <!-- Javascript -->
        <script>

            init.push(function () {

                $('.tooltip_number').tooltip();

                // Single select
                $("select[name='pages_select']").select2({
                    allowClear: true,
                    placeholder: "select page"
                });


            });
            $('input[name="check_all"]').click(function () {
                if ($(this).prop("checked")) {
                    $("input[name='forms_checkbox[]']").prop("checked", true);
                } else {

                    $("input[name='forms_checkbox[]']").prop("checked", false);
                }
            });
        </script>
        <!-- / Javascript -->
@stop