@extends('layouts.default')
@section('content')
<section>
    <div class="container mt-5">
      <div class="row">
          <div class="col-lg-6">
                <h1>Edit {{$item->category}}</h1>
                <form method="post" action="/category/{{$item->id}}">
                    @method('patch')
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label" >Name </label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="{{$item->category}}" >
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
          </div>
      </div>
    </div>
    
</section>
@endsection