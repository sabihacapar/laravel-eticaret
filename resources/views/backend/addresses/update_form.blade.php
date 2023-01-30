
@extends('backend.shared.backend_theme')

@section('title',"Adres Modülü")
 
@section('subtitle',"Adres Güncelle")

@section('btn_url',url()->previous())
@section('btn_label',"Geri Dön")
@section('btn_icon',"arrow-left")


 
@section('content')
        <form action="{{ url("/users/$user->user_id/addresses/$addr->address_id") }}" method="POST" autocomplete="off" novalidate>
         @csrf {{-- inputta bir dosya oluşturup oradan değer alır.Bu değere göre de nereden geldiğini ayrıştırır --}}
         @method("PUT")
         <input type="hidden" name="user_id" value="{{ $user->user_id }}">
         <input type="hidden" name="address_id" value="{{ $addr->address_id }}">

         <div class="row">
            <div class="col-lg-6">
              
                <label for="city" class="form-label">Şehir</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Ad Soyad Giriniz" value="{{ old("city",$addr->city) }}">
              
                @error('city')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6">
             
                <label for="district" class="form-label">İlçe</label>
                <input type="text" class="form-control" id="district" name="district" placeholder="İlçe Giriniz" value="{{ old("district",$addr->district) }}">
                @error('district')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              
            </div>
          </div>
      
            <div class="row">
              <div class="col-lg-6">
                
                
                <label for="zipcode" class="form-label">Posta Kodu</label>
                <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="İPosta Kodu Giriniz" value="{{ old("zipcode",$addr->district) }}">
                @error('zipcode')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              
              </div>
              <div class="col-lg-6">
               
                <div class="form-check mt-2 mb-2">
                  <input class="form-check-input" type="checkbox" id="is_default" name="is_default" value="1" {{ $addr->is_default == 1 ? "checked" : "" }}>
                  <label class="form-check-label" for="is_default">
                    Varsayılan
                  </label>
                </div>
                
              </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              
              
              <label for="address" class="form-label">İlçe</label>
              <textarea type="text" class="form-control" id="address" name="address" placeholder="Adres Giriniz">{{ old("address",$addr->address) }}</textarea>
              @error('zipcode')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            
            </div></div>
          <div class="row"><div class="col-12">
            <button type="submit" class="btn btn-success mt-2">Kaydet</button>
          </div></div>
        </form>
         @endsection