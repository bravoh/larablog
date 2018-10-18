@extends('layouts.admin')

@section('template_title')
@endsection

@section('template_description')
@endsection

@push('head')

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.6/compressed/themes/default.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.6/compressed/themes/default.date.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.6/compressed/themes/default.time.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css">

@endpush
@section('content')
<div class="content">
    <div class="row">
        <div class="col-12">
            <div class="card card-user">
                <div class="card-header">
                    <div class="badge badge-pill badge-primary pull-right">
                        <small>
                            {!! trans('forms.edit-post.id-title', ['id' => $id]) !!}
                        </small>
                    </div>
                    <h5 class="card-title">
                        {!! trans('forms.edit-post.title') !!}
                    </h5>
                </div>

                {!! Form::open(['method' => 'PUT', 'route' => ['updatepost', $id],  'class' => '', 'id' => 'edit_post_form', 'role' => 'form', 'enctype' => 'multipart/form-data' ]) !!}
                    {!! csrf_field() !!}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="PUT">
                    <meta name="_token" content="{!! csrf_token() !!}" />

                    <div class="card-body">
                        @include('admin.post.partials.post-form')
                    </div>

                    <hr>

                    <div class="card-footer">
                        <div class="row ">
                            <div class="col-md-6 mb-4">
                                {!! Form::button(trans('forms.edit-post.buttons.save-finished'), ['class' => 'btn btn-success btn-lg btn-block','type' => 'submit', 'name' => 'action', 'value' => 'finished']) !!}
                            </div>
                            <div class="col-md-6 mb-4">
                                {!! Form::button(trans('forms.edit-post.buttons.delete'), ['class' => 'btn btn-danger btn-lg btn-block','type' => 'submit', 'name' => 'action', 'value' => 'finished', 'data-toggle' => 'modal', 'data-target' => '#modal-delete']) !!}
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    <script type="text/javascript">
        $(function() {
            CKEDITOR.replace( 'content' );
            $("#publish_date").pickadate({
                format: "mmm-d-yyyy"
            });
            $("#publish_time").pickatime({
                format: "h:i A"
            });
            $("#tags").selectize({
                create: true
            });
        });
    </script>
@endpush