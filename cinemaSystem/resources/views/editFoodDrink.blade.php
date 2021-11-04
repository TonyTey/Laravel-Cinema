@extends('layout')
@section('content')

<div class="row mt-5">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">   
            <h2 class="text-center p-3">Update Food & Drink</h2>
            <form method="POST", action="{{ route('updateFoodDrink') }}" enctype="multipart/form-data">
                @CSRF
            @foreach($foodDrinks as $foodDrink)
            <input type="hidden" class="form-control" id="id" name="id" value="{{$foodDrink->id}}">
            <div class="form-group">
                <img src="{{asset('images/')}}/{{$foodDrink->image}}" alt="" width="200"><br>
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$foodDrink->name}}">
            </div>
            <div class="form-group">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="name" name="description" value="{{$foodDrink->description}}">
            </div>
            <div class="form-group">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" value="{{$foodDrink->price}}">
            </div>
            <div class="form-group">
                <label for="Food Drink Image">Image</label>
                <input type="file" class="form-control" id="foodDrink-image" name="foodDrink-image">
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" min="0" value="{{$foodDrink->quantity}}">
            </div>
            <div class="form-group">
                <label for="Category">Category</label>
                <select name="category" id="category" class="form-control">
                    @foreach($category as $category)
                        <option value="{{$category->name}}"
                            @if($foodDrink->category==$category->name)
                                selected
                            @endif
                        >{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            @endforeach
                <button type="submit" class="btn btn-primary mb-3" style="margin-left: 46%;">Update</button>
            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>
@endsection