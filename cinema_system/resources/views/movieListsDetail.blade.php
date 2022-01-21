@extends('layout')
@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<style>
    input[type=checkbox]{
            transform: scale(1.5);
        }
        input[type=checkbox] + label {
            color: grey;
        }

        input[type=checkbox]:checked + label {
            color: green;
            font-style: normal;
            display: inline-block;
        } 
</style>

<script>
  $( function() {
    $( "#datepicker" ).datepicker();
    $( "#format" ).on( "change", function() {
      $( "#datepicker" ).datepicker( "option", "dateFormat", $( this ).val() );
    });
  } );

    document.getElementById('cinema').addEventListener('change', function () {
        var style = this.value == 1 ? 'block' : 'none';
        document.getElementById('hidden_div').style.display = style;
    });

    function checkBoxLimit(value){

        var totalPrice;
        var moviePrice = document.getElementById("moviePrice").value;
        totalPrice=moviePrice * value; 

        document.getElementById('price').value = totalPrice;

    var checkBoxGroup = document.forms['bookingDetail']['seats[]'];
    var limit = value;
    
        for (var i = 0; i < checkBoxGroup.length; i++) {
        checkBoxGroup[i].onclick = function() {
            var checkedcount = 0;
            for (var i = 0; i < checkBoxGroup.length; i++) {
                checkedcount += (checkBoxGroup[i].checked) ? 1 : 0;
            }
            if (checkedcount > limit) {
                console.log("You can select maximum of " + limit + " seats.");
                alert("You can select maximum of " + limit + " seats.");
                this.checked = false;
            }else if(checkedcount == 0){
                console.log("You must select minimum of 1 seat.");
                alert("You must select minimum of 1 seat.");
                this.checked = true;
            }
        }
    }

    }
   
</script>

<header class="masthead mt-5" style="background-color: #434d45;">
 	<div class="container pt-5">
 		<div class="col-lg-12">
 			<div class="row">
            @foreach($movies as $movie)
                    <div class="col-md-4">
                        <img src="{{ asset('images/') }}/{{$movie->image}}" alt="movie image" class="img-fluid">
                    </div>
                    <div class="col-md-8">
                        
                        <div class="card bg-dark">
                            <div class="card-body text-white">
                                <h3><b>{{$movie->name}}</b></h3>
                                <hr style="background-color: white;">
                                <div class="row">
                                    <div class="col-4">
                                        <p class=""><b>Label: </b>{{$movie->label}}</p>
                                    </div>
                                    <div class="col-4">
                                        <p class=""><b>Subtitle: </b>{{$movie->subtitle}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">     
                                        <p class=""><b>Duration (Minutes): </b> {{$movie->duration}} </p>
                                    </div>
                                    <div class="col-4">
                                        <p class=""><b>Price (RM): </b>{{$movie->price}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card bg-light mt-2 mb-3">
                        <form action="{{ route('insertNewBook') }}" method="post" name="bookingDetail" id="bookingDetail">
                        @CSRF
                            <div class="card-body"> 
                                    <h4>Reserve Here</h4>
                                    
                                        <input type="hidden" name="id" value="{{$movie->id}}"><input type="hidden" name="moviePrice" value="{{$movie->price}}" id="moviePrice">
                                        <input type="hidden" name="movieName" value="{{$movie->name}}">
                                        <div class="row">
                                            @foreach($users as $user)
                                            <div class="form-group col-md-4">
                                                <label for="name" class="control-label">Name</label>
                                                <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}" readonly>
                                                <input type="hidden" name="userId" id="userId" value="{{$user->id}}"> 
                                            </div>
                                            @endforeach

                                            <div class="form-group col-md-4">
                                                <label for="date" class="control-label">Date</label>
                                                <input type="text" name="date" id="datepicker" size="30" required="" value="{{$dateTimes}}" class="form-control" readonly>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="time" class="control-label">Time</label>
                                                    <select name="time" id="time" class="form-control">
                                                        @foreach($times as $time)
                                                            <option value="{{$time}}" selected>{{ $time }}</option>
                                                        @endforeach 
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="quantity" class="control-label">Quantity</label>
                                                <input type="number" name="quantity" id="quantity" class="form-control" required="" min="0" onkeyup="checkBoxLimit(this.value);">
                                            </div>
                                            <div class="form-group col-md-4">
                                               
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="Cinema">Cinema(s)</label>
                                                <div class="form-group">
                                                    <select name="cinema" id="cinema" class="form-control" name="form_select" onchange="" >
                                                        @foreach($branches as $branch)
                                                            @foreach($branchesID as $branchID)
                                                                @if($branchID == $branch->id)
                                                                    <option value="{{$branch->name}}" selected>{{$branch->name}}</option>
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group ml-5 checkbox checkbox-circle">
                                                <input type="checkbox" value="1" onclick="showDiv(this)" id="confirm" class="form-check-input">
                                                <label for="confirm" class="form-check-label">Confirm</label>
                                            </div>

                                        </div>

                                        <div class="seatArea ml-2" id="hidden_div" style="display:none;">
                                            <p class="text-center text-bold">Select Your Seats</p>
                                            <button class="btn btn-dark mb-4" style="width:350px;margin-left: 24%;" disabled>Screen</button>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="seat1" value="1" name="seats[]">
                                                        <label class="form-check-label" for="seat1"><i class="fa fa-user">&nbsp;01</i></label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="seat2" value="2" name="seats[]" >
                                                        <label class="form-check-label" for="seat2"><i class="fa fa-user">&nbsp;02</i></label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="seat3" value="3" name="seats[]">
                                                        <label class="form-check-label" for="seat3"><i class="fa fa-user">&nbsp;03</i></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-check form-check-inline"></div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="seat4" value="4" name="seats[]">
                                                        <label class="form-check-label" for="seat4"><i class="fa fa-user">&nbsp;04</i></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="seat5" value="5" name="seats[]" >
                                                        <label class="form-check-label" for="seat5"><i class="fa fa-user">&nbsp;05</i></label>
                                                    </div>
                                                    <div class="form-check form-check-inline"></div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="seat6" value="6" name="seats[]">
                                                        <label class="form-check-label" for="seat6"><i class="fa fa-user">&nbsp;06</i></label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="seat7" value="7" name="seats[]" >
                                                        <label class="form-check-label" for="seat7"><i class="fa fa-user">&nbsp;07</i></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-check form-check-inline"></div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="seat8" value="8" name="seats[]" >
                                                        <label class="form-check-label" for="seat8"><i class="fa fa-user">&nbsp;08</i></label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="seat9" value="9" name="seats[]">
                                                        <label class="form-check-label" for="seat9"><i class="fa fa-user">&nbsp;09</i></label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="seat10" value="10" name="seats[]">
                                                        <label class="form-check-label" for="seat10"><i class="fa fa-user">&nbsp;10</i></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="seat11" value="11" name="seats[]">          
                                                        <label class="form-check-label" for="seat11"><i class="fa fa-user">&nbsp;11</i></label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="seat12" value="12" name="seats[]">
                                                        <label class="form-check-label" for="seat12"><i class="fa fa-user">&nbsp;12</i></label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="seat13" value="13" name="seats[]">
                                                        <label class="form-check-label" for="seat13"><i class="fa fa-user">&nbsp;13</i></label>
                                                    </div>
                                                    </div>
                                                <div class="form-group">
                                                    <div class="form-check form-check-inline">         
                                                        </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" id="seat14" value="14" name="seats[]">
                                                                <label class="form-check-label" for="seat14"><i class="fa fa-user">&nbsp;14</i></label>
                                                            </div>
                                                        </div>
                                                <div class="form-group">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="5" value="15" name="seats[]" >
                                                        <label class="form-check-label" for="seat15"><i class="fa fa-user">&nbsp;15</i></label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                                    
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="seat16" value="16" name="seats[]">
                                                        <label class="form-check-label" for="seat16"><i class="fa fa-user">&nbsp;16</i></label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="seat17" value="17" name="seats[]" >
                                                        <label class="form-check-label" for="seat17"><i class="fa fa-user">&nbsp;17</i></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-check form-check-inline"></div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="seat18" value="18" name="seats[]">
                                                        <label class="form-check-label" for="seat18"><i class="fa fa-user">&nbsp;18</i></label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="seat19" value="19" name="seats[]" >
                                                        <label class="form-check-label" for="seat19"><i class="fa fa-user">&nbsp;19</i></label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="seat20" value="20" name="seats[]" >
                                                        <label class="form-check-label" for="seat20"><i class="fa fa-user">&nbsp;20</i></label>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="seat21" value="21" name="seats[]" >                                                      
                                                        <label class="form-check-label" for="seat21"><i class="fa fa-user">&nbsp;21</i></label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="seat22" value="22" name="seats[]" >
                                                        <label class="form-check-label" for="seat22"><i class="fa fa-user">&nbsp;22</i></label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="seat23" value="23" name="seats[]" >
                                                        <label class="form-check-label" for="seat23"><i class="fa fa-user">&nbsp;23</i></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-check form-check-inline"></div>      
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="seat24" value="24" name="seats[]" >
                                                        <label class="form-check-label" for="seat24"><i class="fa fa-user">&nbsp;24</i></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="seat26" value="25" name="seats[]" >
                                                        <label class="form-check-label" for="seat25"><i class="fa fa-user">&nbsp;25</i></label>
                                                    </div>
                                                    <div class="form-check form-check-inline"></div>    
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="seat26" value="26" name="seats[]" >
                                                        <label class="form-check-label" for="seat26"><i class="fa fa-user">&nbsp;26</i></label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="seat27" value="27" name="seats[]" >
                                                        <label class="form-check-label" for="seat27"><i class="fa fa-user">&nbsp;27</i></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-check form-check-inline"></div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="seat28" value="28" name="seats[]">
                                                        <label class="form-check-label" for="seat28"><i class="fa fa-user">&nbsp;28</i></label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="seat29" value="29" name="seats[]" >
                                                        <label class="form-check-label" for="seat29"><i class="fa fa-user">&nbsp;29</i></label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="seat30" value="30" name="seats[]" >
                                                        <label class="form-check-label" for="seat30"><i class="fa fa-user">&nbsp;30</i></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="seat31" value="31" name="seats[]">
                                                        <label class="form-check-label" for="seat31"><i class="fa fa-user">&nbsp;31</i></label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="seat32" value="32" name="seats[]" >
                                                        <label class="form-check-label" for="seat32"><i class="fa fa-user">&nbsp;32</i></label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="seat33" value="33" name="seats[]">
                                                        <label class="form-check-label" for="seat33"><i class="fa fa-user">&nbsp;33</i></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-check form-check-inline"></div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="seat34" value="34" name="seats[]">
                                                        <label class="form-check-label" for="seat34"><i class="fa fa-user">&nbsp34</i></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="seat35" value="35" name="seats[]" >
                                                        <label class="form-check-label" for="seat35"><i class="fa fa-user">&nbsp;35</i></label>
                                                    </div>
                                                    <div class="form-check form-check-inline"></div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="seat36" value="36" name="seats[]">
                                                        <label class="form-check-label" for="seat36"><i class="fa fa-user">&nbsp;36</i></label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="seat37" value="37" name="seats[]" >
                                                        <label class="form-check-label" for="seat37"><i class="fa fa-user">&nbsp;37</i></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-check form-check-inline"></div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="seat38" value="38" name="seats[]" >
                                                        <label class="form-check-label" for="seat38"><i class="fa fa-user">&nbsp;38</i></label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="seat39" value="39" name="seats[]">
                                                        <label class="form-check-label" for="seat39"><i class="fa fa-user">&nbsp;39</i></label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="seat40" value="40" name="seats[]">
                                                        <label class="form-check-label" for="seat40"><i class="fa fa-user">&nbsp;40</i></label>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-5">
                                                    <label for="total price">Total Price (RM)</label>
                                                    <input type="text" class="form-control" id="price" name="price" min="0" readonly value="0">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <button type="reset" class="btn btn-danger"><i class="fa fa-trash">&nbsp;Cancel</i></button>
                                                <!-- class="btn btn-dark" col-md-2   btn btn-block btn-dark-->
                                                <button type="submit" class="btn btn-dark ml-3" onclick="return val()"><i class="fa fa-ticket">&nbsp;Book</i></button>
                                            </div>
                                        </div>
                            </div>
                        </div> 
                        </form>
                        <script type="text/javascript">
                            checkBoxLimit()
                        </script>
                        </div>
                    </div>
            @endforeach
 			</div>
 		</div>
 	</div>
</header>

<script type="text/javascript">
function showDiv(input){
   if(input.checked){
    document.getElementById('hidden_div').style.display = "block";
   } else{
    document.getElementById('hidden_div').style.display = "none";
   }
} 
</script>

@endsection