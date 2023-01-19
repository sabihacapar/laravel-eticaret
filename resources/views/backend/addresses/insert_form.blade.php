@extends('backend.shared.backend_theme')

@section('title',"Adres Modülü")
 
@section('subtitle',"Yeni Adres Ekle")

@section('btn_url',url()->previous())
@section('btn_label',"Geri Dön")
@section('btn_icon',"arrow-left")


 
@section('content')
<form action="{{ url("/users/$user->user_id/addresses") }}" method="POST" novalidate>
  @csrf {{-- inputta bir dosya oluşturup oradan değer alır.Bu değere göre de nereden geldiğini ayrıştırır --}}
  <input type="hidden" name="user_id" value="{{ $user->user_id }}" >
  <div class="row">
     <div class="col-lg-6">
       
         <label for="city" class="form-label">Şehir</label>
         <input type="text" class="form-control" id="city" name="city" value="{{ old("city") }}" placeholder="Şehir Giriniz">
       @error('city')
       <span class="text-danger">{{ $message }}</span>
       @enderror
                
     </div>
     <div class="col-lg-6">
      
         <label for="district" class="form-label">İlçe</label>
         <input type="text" class="form-control" id="district" name="district" value="{{ old("district") }}" placeholder="İlçe Giriniz">
         @error('district')
         <span class="text-danger">{{ $message }}</span>
         @enderror
       
     </div>
   </div>
   <div class="row">
     <div class="col-lg-6">
       
         <label for="zipcode" class="form-label">Posta Kodu</label>
         <input type="text" class="form-control" id="zipcode" name="zipcode"  placeholder="Posta kodu Giriniz">
         @error('zipcode')
         <span class="text-danger">{{ $message }}</span>
         @enderror
       
     </div>
     <div class="col-lg-6">
      
        
      <div class="form-check mt-2 mb-2">
        <input class="form-check-input" type="checkbox" id="is_default" name="is_default" value="1">
        <label class="form-checzk-label" for="is_default">
         Varsayılan
        </label>
      </div>
     </div>
   </div>
     <div class="row">
       <div class="col-lg-12">
        <div class="mt-4">
          <label for="address" class="form-label">Adres</label>
          <textarea type="address" class="form-control" id="address" name="address" cols="20" rows="5"></textarea>
          @error('address')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
         
       </div>
       
         
       </div>
   </div>
   <div class="row"><div class="col-12">
     <button type="submit" class="btn btn-success mt-2">Kaydet</button>
   </div></div>
 </form>
@endsection
