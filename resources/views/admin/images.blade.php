@if($image)
<img id="preview" src="{{ ('public/product/'.$image) }}" alt="Preview" class="form-group hidden" width="100" height="100">
@else
<img id="preview" src="https://via.placeholder.com/150" alt="Preview" class="form-group hidden" width="100" height="100">
@endif