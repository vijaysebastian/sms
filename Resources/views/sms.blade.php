@extends('themes.default1.admin.layout.admin')

@section('Settings')
class="active"
@stop

@section('settings-bar')
active
@stop

@section('sms')
class="active"
@stop

@section('HeadInclude')
@stop
<!-- header -->
@section('PageHeader')

@stop
<!-- /header -->
<!-- breadcrumbs -->
@section('breadcrumbs')
<ol class="breadcrumb">

</ol>
@stop
<!-- /breadcrumbs -->
<!-- content -->
@section('content')

<!-- open a form -->

	{!! Form::open(['url' => 'faveosms/postsms', 'method' => 'POST','files'=>true]) !!}

<!-- <div class="form-group {{ $errors->has('company_name') ? 'has-error' : '' }}"> -->
	<!-- table  -->

<div class="box box-primary">
	<div class="box-header">
        <h4 class="box-title">SMS</h4>{!! Form::submit(Lang::get('lang.save'),['class'=>'form-group btn btn-primary pull-right'])!!}
    </div>

    <!-- check whether success or not -->
    @if(Session::has('success'))
        <div class="alert alert-success alert-dismissable">
            <i class="fa  fa-check-circle"></i>
            <b>Success!</b>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{Session::get('success')}}
        </div>
    @endif
    <!-- failure message -->
    @if(Session::has('fails'))
        <div class="alert alert-danger alert-dismissable">
            <i class="fa fa-ban"></i>
            <b>Alert!</b> Failed.
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{Session::get('fails')}}
        </div>
    @endif

		<!-- Name text form Required -->
 		<div class="box-body">
            <div class="row">

                <div class="col-md-4 form-group {{ $errors->has('provider_id') ? 'has-error' : '' }}">

                    {!! Form::label('provider_id','Providers') !!}
                    {!! $errors->first('provider_id', '<spam class="help-block">:message</spam>') !!}
                    {!! Form::select('provider_id',['Providers'=>$providers->lists('name','id')],null,['class' => 'form-control']) !!}


                </div>

                <div class="col-md-4 form-group {{ $errors->has('auth_key') ? 'has-error' : '' }}">

                    {!! Form::label('auth_key','Auth Key') !!}
                    {!! $errors->first('auth_key', '<spam class="help-block">:message</spam>') !!}
                    {!! Form::text('auth_key',$auth_key->value,['class' => 'form-control']) !!}

                </div>



                <div class="col-md-4 form-group {{ $errors->has('sender_id') ? 'has-error' : '' }}">

                    {!! Form::label('sender_id','Sender Id') !!}
                    {!! $errors->first('sender_id', '<spam class="help-block">:message</spam>') !!}
                    {!! Form::text('sender_id',$sender_id->value,['class' => 'form-control']) !!}

                </div>

                <div class="col-md-4 form-group {{ $errors->has('route') ? 'has-error' : '' }}">

                    {!! Form::label('route','Route') !!}
                    {!! $errors->first('route', '<spam class="help-block">:message</spam>') !!}
                    {!! Form::text('route',$route->value,['class' => 'form-control']) !!}

                </div>

               
    </div>

@stop

@section('FooterInclude')

@stop
@stop
<!-- /content -->
