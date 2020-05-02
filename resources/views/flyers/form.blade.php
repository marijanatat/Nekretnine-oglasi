@inject('countries', 'App\Http\Utilities\Country')

<div class='form-group ' >
    <label for="street"> Street:</label>
  <input class="form-control" type="text" value="{{old('street')}}" name="street" id="street" required>
  </div>

  <div class='form-group'>
   <label for="text">City :</label>
 <input class="form-control" type="text" value="{{old('city')}}" name="city" id="city" required>
 </div>


 <div class='form-group'>
   <label for="zip">Zip/Postal code</label>
 <input class="form-control" type="text" value="{{old('zip')}}" name="zip" id="zip" required>
 </div>

 <div class='form-group'>
   <label for="country">Country:</label>
 <select name="country" id="country" class="form-control" required>
   @foreach ($countries::all() as $country=>$code)
      <option value="{{$code}}">{{$country}}</option>      
   @endforeach
   <option value=""></option>
 </select>
 </div>

 <hr>


 <div class='form-group'>
   <label for="price">Sale price</label>
 <input class="form-control" type="text" value="{{old('price')}}" name="price" id="price" required>
 </div>

 <div class='form-group'>
   <label for="description">Home</label>
<textarea name="description" id="description"  rows="10" class="form-control" required >
 {{old('description')}}
</textarea>
 </div>

 

 <div class='form-group d-flex justify-content-between align-items-center'>
   <button type="submit" class="btn btn-primary btn-lg"> Create flyer:</button>
   <a class=" btn btn-primary btn-lg"  href="/pages/index" role="button" >Back to Homepage</a>
 </div>