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
              <h1>Table Food</h1>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add
                </button>
              <table class="table">
                  <thead>
                      <tr>
                      <th scope="col">Food</th>
                      <th scope="col">Category</th>
                      <th scope="col">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($food as $item)
                      <tr>
                        <td>{{$item->food}}</td>
                        <td>{{$item->category->id}}</td>
                        <td>
                            <a href="/food/{{$item->id}}/edit" class="btn btn-warning">Edit</a>
                            <a href="/recip/{{$item->id}}" class="btn btn-info"  >Detail</a>
                            <form action="/food/{{$item->id}}" method="post" class="d-inline">
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
            <form method="post" action="/food">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name </label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Name Food" >
                </div>
                <div class="mb-3">
                    <label for="disabledSelect" class="form-label">Categories</label>
                    <select id="disabledSelect" class="form-select" name="category">
                        <option desible value> Category</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->category}}</option>
                        @endforeach
                    </select>
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