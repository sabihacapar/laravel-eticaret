@extends('backend.shared.backend_theme')

@section('title',"Kullanıcı Modülü")
 
@section('subtitle',"Yeni Kullanıcı Ekle")

@section('btn_url',url()->previous())
@section('btn_label',"Geri Dön")
@section('btn_icon',"arrow-left")


 
@section('content')
<form action="{{ url("/users") }}" method="POST" novalidate>
  @csrf {{-- inputta bir dosya oluşturup oradan değer alır.Bu değere göre de nereden geldiğini ayrıştırır --}}
   <div class="row">
     <div class="col-lg-6">
       
         
      <div class="mt-2">
       <x-input label="Ad Soyad" placeholder="Ad Soyad Giriniz" field="name"/>
      </div>
                
     </div>
     <div class="col-lg-6">
      <div class="mt-2">
       <x-input label="Email" placeholder="Email Giriniz" field="email" type="email"/>
      </div>
       
     </div>
   </div>
   <div class="row">
     <div class="col-lg-6">
      
      <div class="mt-2">
       <x-input label="Şifre" placeholder="Şifre Giriniz" field="password" type="password"/>
      </div>
       
     </div>
     <div class="col-lg-6">
      <div class="mt-2">
      <x-input label="Şifre Tekrar" placeholder="Şifre Tekrar Giriniz" field="password_confirmation"  type="password"/>
      </div>
     </div>
   </div>
     <div class="row">
       <div class="col-lg-6">
         
         
           <div class="form-check mt-2 mb-2">
             
        <x-checkbox field="is_admin" label="Yetkili Kullanıcı"/>

           </div>
       </div>
       <div class="col-lg-6">
        
         <div class="form-check mt-2 mb-2">
          
        <x-checkbox field="is_active" label="Kullanıcı Aktif"/>

         </div>
         
       </div>
   </div>
   <div class="row"><div class="col-12">
     <button type="submit" class="btn btn-success mt-2">Kaydet</button>
   </div></div>
 </form>
@endsection
