
@extends('backend.shared.backend_theme')

@section('title',"Kullanıcı Modülü")
 
@section('subtitle',"Kullanıcı Güncelle")

@section('btn_url',url()->previous())
@section('btn_label',"Geri Dön")
@section('btn_icon',"arrow-left")


 
@section('content')
        <form action="{{ url("/users/$user->user_id") }}" method="POST" autocomplete="off" novalidate>
         @csrf {{-- inputta bir dosya oluşturup oradan değer alır.Bu değere göre de nereden geldiğini ayrıştırır --}}
         @method("PUT")
         <input type="hidden" name="user_id" value="{{ $user->user_id }}">
         <div class="row">
            <div class="col-lg-6">
              
                

                <x-input label="Ad Soyad" placeholder="Ad Soyad Giriniz" field="name" value="{{$user->name}}"/>

            </div>
            <div class="col-lg-6">
             
                
                <x-input label="E-Posta" placeholder="Email Giriniz" field="email" value="{{$user->email}}"/>
              
            </div>
          </div>
      
            <div class="row">
              <div class="col-lg-6">
                
                
                  <div class="form-check mt-2 mb-2">
                  
                    <x-checkbox field="is_admin" label="Yetkili Kullanıcı" checked="{{ $user->is_admin == 1}}"/>

                  </div>
              </div>
              <div class="col-lg-6">
               
                <div class="form-check mt-2 mb-2">
               
                  <x-checkbox field="is_active" label="Kullanıcı Aktif" checked="{{ $user->is_active == 1}}"/>

                </div>
                
              </div>
          </div>
          <div class="row"><div class="col-12">
            <button type="submit" class="btn btn-success mt-2">Kaydet</button>
          </div></div>
        </form>
         @endsection