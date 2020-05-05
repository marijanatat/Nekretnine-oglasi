@inject('countries', 'App\Http\Utilities\Country')

<div class="row">
    <div class="col-md-6">
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
        
    </div>
     <hr>
    
    
     <div class="col-md-6">
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
    </div>
     
     <hr>

     <div class='col-md-12'>
       <button type="submit" class="btn btn-primary btn-lg mr-3"> Create flyer</button>
       <a class=" btn btn-primary btn-lg mr-3" 
         href="/flyers/create" role="button" >Cancel</a>
  
     </div>
</div>