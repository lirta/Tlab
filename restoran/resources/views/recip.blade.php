@extends('layouts.default')
@section('content')
<section>
    <div class="container mt-5">
      <div class="row">
          <div class="col-lg-6">
              @if (session('status'))
                  <div class="alert alert-success">
                      {{ session('status') }}
                  </div>
              @endif

              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
              <h1>Table Recips <br> {{$item->food}}</h1>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add
                </button>
              <table class="table">
                  <thead>
                      <tr>
                      <th scope="col">Recip</th>
                      <th scope="col">Description</th>
                      <th scope="col">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($recips as $recip)
                      <tr>
                        <td>{{$recip->recipe}}</td>
                        <td>{{$recip->desc}}</td>
                        <td>
                            <form action="/recip/{{$recip->id}}" method="post" class="d-inline">
                            @method('delete') 
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>
      </div>
    </div>
    
</section>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Food</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form method="post" action="/recip">
                @csrf
                <input type="text" name="food" value="{{$item->id}}" hidden>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name </label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Name Recip" >
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Description </label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="desc" placeholder="Description" >
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection