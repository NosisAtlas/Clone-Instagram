@extends('Instapages.profile')


@section('content2')
<form action="{{ route('page.profile-editdata') }}" method="post" class=" mt-5 form-dataedit" enctype="multipart/form-data">
  @csrf
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroupFileAddon01">Profile Picture</span>
  </div>
  <div class="custom-file">
    <input type="file" name="input_image" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
  </div>
</div>

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
  </div>
  <input type="text" name="input_name" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
</div>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default">Bio</span>
  </div>
  <input type="text" name="input_bio" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
</div>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default">Email Address</span>
  </div>
  <input type="text" name="input_email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
</div>
<input type="submit" class="btn btn-primary btn-lg btn-block" value="submit">

</form>

@endsection