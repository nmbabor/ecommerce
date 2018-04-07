

 <div class="form-group col-md-6 {{ $errors->has('country') ? ' has-error' : '' }}">
      <p>Country<span>*</span></p>
         <input class="form-control" value="{{old('country') }}" name="country" type="text" placeholder="Country" required>
         @if ($errors->has('country'))
            <span class="help-block">
                <strong>{{ $errors->first('country') }}</strong>
            </span>
        @endif
 </div>
 <div class="form-group col-md-6 {{ $errors->has('region') ? ' has-error' : '' }}">
      <p>Region<span>*</span></p>
         <input class="form-control" value="{{old('region') }}" name="region" type="text" placeholder="Region" required>
         @if ($errors->has('region'))
            <span class="help-block">
                <strong>{{ $errors->first('region') }}</strong>
            </span>
        @endif
 </div>


<div class="form-group col-md-12"> 
    <label class="col-md-12"> Address<span>*</span></label>
    <textarea class="form-control" name="address" placeholder=" Address" rows="5" required></textarea>
 </div>