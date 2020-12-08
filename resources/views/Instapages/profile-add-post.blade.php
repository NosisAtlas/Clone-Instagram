@extends('Instapages.Instagramhome')


@section('content')


<div class="add-post">
        

        <form action="{{ route('page.postimage')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" name="image_nom" class="input-desc" id=""><br><br>
            <input type="file" name="input_image" id="file" style="display:none">
            <label for="file" class="pic-choose">Choose a Picture</label><br><br>
            <input type="submit" class="pub-validate" value="PUBLISH">
        </form>

</div>

@endsection