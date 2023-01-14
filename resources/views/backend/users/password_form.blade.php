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
              
                <label for="password" class="form-label">Şifre</label>
                <input type="password" class="form-control" id="password" name="password"  placeholder="Şifre Giriniz">
                @error('password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              
            </div>
            <div class="col-lg-6">
             
                <label for="password_confirmation" class="form-label">Şifre Tekrar</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Şifre Tekrar Giriniz">
                @error('password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
          </div>
           
          <div class="row"><div class="col-12">
            <button type="submit" class="btn btn-success mt-2">Kaydet</button>
          </div></div>
        </form>
        @endsection
