@extends('layouts.dashboard')
@section('content')

<div class="overview-box">
    <div class="box">
        <div class="box-topic">Food & Drinks</div>
    </div>
</div>

<div class="insert_area_box">
    <div class="insert_area_title">Insert Food & Drinks</div>
    <div class="insert_area_card">
        <div class="insert_area_details">
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <br>
                    <form method="POST" action="{{ route('addFoodDrink') }}" enctype="multipart/form-data">
                        @CSRF
                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-lg">Name</span>
                            </div>
                            <input type="text" class="form-control" id="name" name="name" required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                        </div>

                        <br>

                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-lg">Description</span>
                            </div>
                            <textarea class="form-control" id="description" name="description" required aria-label="With textarea"></textarea>
                        </div>

                        <br>

                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-lg">Price(RM)</span>
                            </div>
                            <input type="number" step="any" class="form-control" id="price" name="price" required value="1" min="1" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                        </div>

                        <br>

                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-lg">Image</span>
                            </div>
                            <input type="file" class="form-control" id="foodDrink-image" name="foodDrink-image" required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                        </div>

                        <br>

                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-lg">Quantity</span>
                            </div>
                            <input type="number" class="form-control" id="quantity" name="quantity" required value="1" min="1" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                        </div>

                        <br>

                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-lg">Category</span>
                            </div>

                            <select name="category" id="category" class="form-control" required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                                @foreach($categories as $category)
                                <option value="{{$category->name}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <br>
                        <button type="submit" class="btn btn-primary submitBtn float-right">SUBMIT</button>
                    </form>
                    <a href="{{ route('viewFoodDrink') }}"><button type="submit" class="btn btn-primary cancelBtn">CANCEL</button></a>
                    <br>
                </div>
                <div class="col-sm-1"></div>
            </div>
        </div>
    </div>
    <br>
</div>



@endsection