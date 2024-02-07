@extends('layouts.app')
@section('main')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3">Create User</h6>
            </div>
          </div>
          <div class="card-body">
            <form action="{{ route('user.store') }}" method="post">
              @csrf
              @method('POST')
            <div class="input-group input-group-outline mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" class="form-control" id="">
            </div>
            <div class="input-group input-group-outline mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="">
            </div>
            <div class="input-group input-group-outline mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" id="">
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
            <button type="submit" class="btn btn-primary">Save</button> 

            </form>
          </div>
        </div>
      </div>
    </div>
    
  </div>
  @stop