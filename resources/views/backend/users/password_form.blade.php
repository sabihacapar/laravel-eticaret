@extends('backend.shared.backend_theme')

@section('title',"Kullanıcı Modülü")
 
@section('subtitle',"Şifre Değiştirme")

@section('btn_url',url()->previous())
@section('btn_label',"Geri Dön")
@section('btn_icon',"arrow-left")

 
@section('content')
        <form action="{{ url("/users/$user->user_id/change-password") }}" method="POST" novalidate>
         @csrf {{-- inputta bir dosya oluşturup oradan değer alır.Bu değere göre de nereden geldiğini ayrıştırır --}}
          
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
           
          <div class="row"><div class="col-12">
            <button type="submit" class="btn btn-success mt-2">Kaydet</button>
          </div></div>
        </form>
        @endsection
