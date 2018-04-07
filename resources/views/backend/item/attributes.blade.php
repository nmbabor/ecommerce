<p style="text-align: center;font-weight: bold;text-decoration: underline;">Attributes</p>
@foreach($attributes as $attr)
<div class="form-group col-sm-12 role_select" >
  <label class="control-label col-sm-3">{{$attr->name}}</label>
  <div class="col-sm-9">
  @foreach($options[$attr->id] as $opt)
  <label>
  <input type="checkbox" name="attributes[{{$attr->id}}][]" value="{{$opt->id}}"> {{$opt->name}}</label>
  @endforeach
  </div>
</div>
@endforeach