@extends('frontend.app')
@section('content')
<div class="container">
<div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading text text-center">Update Profile</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/user-info') }}">
                        {{ csrf_field() }}
                        
                        
                        

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-3 control-label">Address</label>
                            <div class="col-md-9">
                                <textarea  id="address" class="form-control" name="address" placeholder="Address" rows="2" required autofocus>{{isset($data->address)? $data->address : old('address') }}</textarea>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                            <label for="country" class="col-md-3 control-label">country</label>
                            <div class="col-md-9">
                                <input id="country" type="text" class="form-control" name="country" value="{{isset($data->country)? $data->country : old('country') }}" placeholder="country" required autofocus>

                                @if ($errors->has(' country'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first(' country') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                      
                        <div class="form-group{{ $errors->has('region') ? ' has-error' : '' }}">
                            <label for="region" class="col-md-3 control-label">region</label>
                            <div class="col-md-9">
                                <input id="region" type="text" class="form-control" name="region" value="{{isset($data->region)? $data->region : old('region') }}" placeholder="region" required autofocus>

                                @if ($errors->has('region'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('region') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        
                        <!-- <div class="form-group">
                            <div class="col-md-9 col-md-offset-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="is_shipping" value="1" {{(isset($data->is_shipping) and ($data->is_shipping==1))? 'checked' : '' }} > Save this address as shipping address
                                    </label>
                                </div>
                            </div>
                        </div>  -->

                        <div class="form-group">
                            <div class="col-md-9 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">Continue</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
        </div>
    
@endsection
