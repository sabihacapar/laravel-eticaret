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
       <x-input label="Şehir" placeholder="Şehir Giriniz" field="city"/>
       
                
     </div>
     <div class="col-lg-6">
      
         <x-input label="İlçe" placeholder="İlçe Giriniz" field="district"/>
       
     </div>
   </div>
   <div class="row">
     <div class="col-lg-6">
       
         <x-input label="Posta Kodu" placeholder="Posta Kodu Giriniz" field="zipcode"/>
       
     </div>
     <div class="col-lg-6">
      
        
      <div class="form-check mt-2 mb-2">
        <x-checkbox field="id_default" label="Varsayılan"/>
      </div>
     </div>
   </div>
     <div class="row">
       <div class="col-lg-12">
        <div class="mt-4">
         <x-textarea label="Açık Adres" placeholder="Açık Adres Giriniz" field="address" />
        </div>
         
       </div>
       
         
       </div>
   </div>
   <div class="row"><div class="col-12">
     <button type="submit" class="btn btn-success mt-2">Kaydet</button>
   </div></div>
 </form>
@endsection
