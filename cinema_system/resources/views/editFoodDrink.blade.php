@extends('layouts.dashboard')
@section('content')

<div class="overview-box">
    <div class="box">
        <div class="box-topic">Food & Drinks</div>
    </div>
</div>

<div class="insert_area_box">
    <div class="insert_area_title">Edit Food & Drinks</div>
    <div class="insert_area_card" style="width: 90%; margin-left: 70px;">
        <div class="insert_area_details">

            <div class="row">
                <div class="col-sm-4" style="display: flex; align-items: center;">
                    @foreach($foodDrinks as $foodDrink)
                        <img src="{{asset('images/')}}/{{$foodDrink->image}}" alt="" width="350" ><br>
                    @endforeach
                </div>
                <div class="col-sm-7">
                    <br>
                    <form method="POST" , action="{{ route('updateFoodDrink') }}" enctype="multipart/form-data">
                        @CSRF

                        @foreach($foodDrinks as $foodDrink)

                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-lg">ID</span>
                            </div>
                            <input type="text" class="form-control" id="id" name="id" value="{{$foodDrink->id}}" readonly aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                        </div>

                        <br>

                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-lg">Name</span>
                            </div>
                            <input type="text" class="form-control" id="name" name="name" value="{{$foodDrink->name}}" required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                        </div>

                        <br>

                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-lg">Description</span>
                            </div>
                            <textarea class="form-control" id="description" name="description" value="{{$foodDrink->description}}" required aria-label="With textarea">{{$foodDrink->description}}</textarea>
                        </div>

                        <br>

                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-lg">Price(RM)</span>
                            </div>
                            <input type="number" step="any" class="form-control" id="price" name="price" value="{{$foodDrink->price}}" min="1" required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                        </div>

                        <br>

                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-lg">Image</span>
                            </div>
                            <input type="file" class="form-control" id="foodDrink-image" name="foodDrink-image" value="{{asset('images/')}}/{{$foodDrink->image}}" min="1" required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                        </div>

                        <br>

                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-lg">Quantity</span>
                            </div>
                            <input type="number" class="form-control" id="quantity" name="quantity" value="{{$foodDrink->quantity}}" min="1" required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                        </div>

                        <br>

                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-lg">Category</span>
                            </div>
                            <select name="category" id="category" class="form-control" required>
                                @foreach($categories as $category)
                                <option value="{{$category->name}}" @if($foodDrink->category==$category->name)
                                    selected
                                    @endif>{{$category->name}}</option>
                                @endforeach
                            </select>

                        </div>

                        <br>

                        <button type="submit" class="btn btn-primary submitBtn">UPDATE</button>
                        @endforeach
                    </form>
                    <a href="{{ route('viewFoodDrink') }}"><button type="submit" class="btn btn-primary cancelBtn">CANCEL</button></a>
                    <br><br>
                </div>
                <div class="col-sm-1"></div>
            </div>
        </div>
    </div>
</div>
@endsection