@extends('layouts.app')
@section('main')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3">Edit User</h6>
            </div>
          </div>
          <div class="card-body">
            <form action="{{ route('user.update',$user -> id)}}" method="POST">
              @csrf
              @method('PUT')
            
            <div class="input-group input-group-dynamic mb-4">
              
              <input type="text" class="form-control" placeholder="Name" name="name" value="{{ $user->name }}" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="input-group input-group-dynamic mb-4">
              
              <input type="text" class="form-control" placeholder="Username" name="username" value="{{ $user->username }}" aria-label="Username" aria-describedby="basic-addon1">
          </div>
            <div class="input-group input-group-dynamic mb-4">
              
              <input type="password" class="form-control" placeholder="Password" name="password" value="" aria-label="Username" aria-describedby="basic-addon1">
            </div>
        {{-- <div class="input-group input-group-outline mb-3">
              <label for="jabatan" class="form-label">Jabatan</label>
                <select class="form-control" name="jabatan">
                <option value=""></option>
                <option value="Admin">Admin</option>
                <option value="Owner">Owner</option>
                <option value="Keuangan">Keuangan</option>
                <option value="Penjualan">Penjualan</option>
                <option value="Stockis">Stockis</option>
                </select>
            </div> --}}
            </div>
            <button type="submit" class="btn btn-primary">Save</button> 

            </form>
          </div>
        </div>
      </div>
    </div>
    
  </div>
  @stop