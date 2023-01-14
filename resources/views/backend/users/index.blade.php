@extends('backend.shared.backend_theme')

@section('title',"Kullanıcı Modülü")
 
@section('subtitle',"Kullanıcılar")

@section('btn_url',url("/users/create"))
@section('btn_label',"yeni ekle")
@section('btn_icon',"plus")
 
@section('content')
<table class="table table-striped table-sm">
  <thead>
    <tr>
      <th>Sıra No</th>
      <th>Ad Soyad</th>
      <th>E-Posta</th>
      <th>Durum</th>
      <th>İşlemler</th>
    </tr>
  </thead>
  <tbody>
    @if(count($users)>0)
    @foreach ($users as $user)
        
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>
       
        @if($user->is_active == 1)
        <span class="badge bg-success">Aktif</span>
        @else
        <span class="badge bg-danger">Pasif</span>
        @endif


      </td>
      <td>
        <ul class="nav float-start">
          <li class="nav-item">
            <a href="{{url("/users/$user->user_id/edit") }}" class="nav-link text-black">
              <span data-feather="edit"></span>
              Güncelle
            </a>

          </li>
          <li class="nav-item">
            <a class="nav-link list-item-delete text-black"
               href="{{url("/users/$user->user_id")}}">
                <span data-feather="trash-2"></span>
                Sil
            </a>
        </li>
          <li class="nav-item">
            <a href="{{url("/users/$user->user_id/change-password")}}" class="nav-link text-black">
              <span data-feather="lock"></span>
               Şifre Değiştir
            </a>

          </li>
          
        </ul>
      </td>
      
    </tr>
    @endforeach

    @else
    <tr>
        <td colspan="5">
            <p class="text-center">Herhangi bir kullanıcı bulunamadı</p>
        </td>
        
        
      </tr>
    @endif
  </tbody>
</table>
@endsection
