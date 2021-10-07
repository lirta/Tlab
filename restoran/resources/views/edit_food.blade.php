@extends('layouts.default')
@section('content')
<section>
    <div class="container mt-5">
      <div class="row">
          <div class="col-lg-6">
                <h1>Edit {{$item->food}}</h1>
                <form method="post" action="/food/{{$item->id}}">
                    @method('patch')
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name </label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="{{$item->food}}" placeholder="Name Food" >
                    </div>
                    <div class="mb-3">
                        <label for="disabledSelect" class="form-label">Categories</label>
                        <select id="disabledSelect" class="form-select" name="category">
                            <option value="{{$item->id}}">{{$item->category->category}}</option>
                            @foreach($categories as $cat)
                            <option value="{{$cat->id}}">{{$cat->category}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
          </div>
      </div>
    </div>
    
</section>
@endsection