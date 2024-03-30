<form id="UserForm" method="post"
        action=" @if(!empty($edit_users->id)!=0)  {{route('user.update',$edit_users->id)}}   @else {{route('user.store')}}@endif"
        enctype="multipart/form-data">
        @if(!empty($edit_users->id)) @method('PATCH') @endif @csrf
<!-- Form Name -->
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">First Name</label>  
  <div class="col-md-4">
 
  <input id="textinput" name="Fname" type="text" placeholder="placeholder" class="form-control input-md"  value="{{ old('Fname',isset($edit_users->Fname) ? $edit_users->Fname: ' ' )}}">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Last Name</label>  
  <div class="col-md-4">
  <input id="textinput" name="Lname" type="text" placeholder="placeholder" class="form-control input-md" value="{{ old('Lname',isset($edit_users->Lname) ? $edit_users->Lname: ' ' )}}">
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Email</label>  
  <div class="col-md-4">
  <input id="textinput" name="email" type="email" placeholder="placeholder" class="form-control input-md" value="{{ old('email',isset($edit_users->email) ? $edit_users->email: ' ' )}}">
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Select Country</label>
  <div class="col-md-4">
    <select id="selectbasic" name="c_code" class="form-control">
    @foreach($country_data as $data) 
    <option value="{{$data->id}}" {{  old('c_code', (isset($edit_users->c_code) && $edit_users->c_code == $data->id ) ? 'selected' : '') }}>{{ $data->name}}  {{ $data->code}}</option>
      @endforeach
    </select>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Mo Number</label>  
  <div class="col-md-4">
  <input id="textinput" name="number" type="number" placeholder="placeholder" class="form-control input-md" value="{{ old('number',isset($edit_users->number) ? $edit_users->number: ' ' )}}">
  </div>
</div>
<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="textarea">Address Area</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="textarea" name="Address">{{ old('Address',isset($edit_users->Address) ? $edit_users->Address: ' ' )}}</textarea>
  </div>
</div>

<!-- Multiple Radios -->
<div class="form-group">
  <label class="col-md-4 control-label" for="radios">Gender</label>
  <div class="col-md-4">
  <div class="radio">
    <label for="radios-0">
    <input type="radio" name="Gender" id="radios-0" value="M" {{ (isset($edit_users) && $edit_users->Gender == 'M') ? 'checked' : '' }}>
      Male
    </label>
	</div>
  <div class="radio">
    <label for="radios-1">
      <input type="radio" name="Gender" id="radios-1" value="F" {{ (isset($edit_users) && $edit_users->Gender == 'F') ? 'checked' : '' }}>
      Female
    </label>
	</div>
  </div>
</div>

@php
    $Hobby_data = (isset($edit_users)) ? explode(',', $edit_users->Hobby) : [];
@endphp
<!-- Multiple Checkboxes (inline) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="checkboxes">Hobby</label>
  <div class="col-md-4">
    <label class="checkbox-inline" for="checkboxes-0">
      <input type="checkbox" name="Hobby[]" id="checkboxes-0" value="sports" {{ in_array('sports', $Hobby_data) ? 'checked' :'' }}>
      sports
    </label>
    <label class="checkbox-inline" for="checkboxes-1">
      <input type="checkbox" name="Hobby[]" id="checkboxes-1" value="art" {{ in_array('art', $Hobby_data) ? 'checked' :'' }}>
      art
    </label>
    <label class="checkbox-inline" for="checkboxes-2">
      <input type="checkbox" name="Hobby[]" id="checkboxes-2" value="travel" {{ in_array('travel', $Hobby_data) ? 'checked' :'' }}>
      travel
    </label>
    <label class="checkbox-inline" for="checkboxes-3">
      <input type="checkbox" name="Hobby[]" id="checkboxes-3" value="outdoor activities" {{ in_array('outdoor activities', $Hobby_data) ? 'checked' :'' }}>
      outdoor activities
    </label>
  </div>
</div>

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="filebutton">File Photo</label>
  <div class="col-md-4">
    <input id="filebutton" name="Photo" class="input-file" type="file">
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <div class="col-md-4">
    <button   type="submit" class="btn btn-primary">submit</button>
  </div>
</div>

</form>
