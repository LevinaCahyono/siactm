@extends('layouts.app')
@section('main')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center">
              <h6 class="text-white text-capitalize ps-3 mb-0">Data User</h6>
              <a href="{{ route('user.create') }}" class="btn btn-light" style="margin-right: 15px;">Add User</a>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead> 
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">Kode Akun</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">Nama Akun</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">Keterangan</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">Grup Akun</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">SubGroup Akun</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-10"></th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-10"></th>



                    <th ></th>
                    <th ></th>

                   {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10"></th> --}}
                   {{-- <th class="text-secondary opacity-10"></th> --}}
                  </tr>
                </thead>
                <tbody>
                      @foreach($datas as $data)
                     <tr>
                      
                      <td><a href="{{route('user.edit', ['id' => $data->id])}}" class="btn btn-primary">Edit</a><td>
                      <td>
                      <form method="POST" action="{{route('user.destroy', $data->id)}}" >
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger" type="submit">Delete</button>
                      </form>
                      </td>
                    </tr>
                      @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  @stop