@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            
                <div class="card-header font-weight-bold">Player Profile <button class="btn btn-md btn-default-outline btn btn-primary hBack" type="button"><i class="glyphicon glyphicon-repeat"></i> Back Button</button></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
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
                        </div><br />
                        @endif

                    <div class="container bootstrap snippet">
                        
                        <div class="row">
                        
                            <div class="col-sm-3">
                                
                        <form method="post" action="{{ route('players.update', $player->id) }}" enctype="multipart/form-data">
                      
                        <div class="text-center">
                          <img src= "/storage/cover_images/{{$player->profile}}" class="img-thumbnail" alt="Cinque Terre" width="304" height="236"><br><br>
                          <h5 Style="padding:10px" class ="font-weight-bold">Profile Image Upload</h5>
                          <input type="file" class="text-center center-block file-upload" name="profile"/>
                           <span style="color:green">Only jpg,png image format Allowed</span> 
                        </div>   
                            </div>
                            <div class="col-sm-9">                    
                            <div class="tab-content">
                                <div class="tab-pane active" id="home">
                                 
                                        <div class="form-group">  
                                            <div class="col-xs-6">
                                                @csrf @method('PATCH')
                                                <label class = "font-weight-bold" for="name">Name</label>
                                                <input type="text" class="form-control" name="name" value="{{ $player->name }}"/>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">  
                                            <div class="col-xs-6">
                                                <label class = "font-weight-bold" for="email">Email</label>
                                                <input type="email" class="form-control" name="email" value="{{ $player->email }}" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required/>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">  
                                            <div class="col-xs-6">
                                               <label class = "font-weight-bold" for="mobile">Mobile</label>
                                               <input type="tel" class="form-control" name="mobile" value="{{ $player->mobile }}" onkeypress="return onlyNumberKey(event)" maxlength="10" required/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-6">    
                                        <label class = "font-weight-bold" for="dob">DOB</label>
                                        <input type="text" class="date form-control" name="dob" value="{{ $player->dob }}" required readonly/>
                                            </div>
                                        </div>

                                     <div class="form-group">
                                            <div class="col-xs-6">
                                              <label class = "font-weight-bold" for="gender">Gender</label>
                                              <select name="gender" class="form-control" >
                                             <option class = ""value="" selected disabled>Please select</option>
											 <option <?php echo ($player->gender == "Male")?"selected":"" ?> >Male</option>
											 <option <?php echo ($player->gender == "Female")?"selected":"" ?> >Female</option>
                                              </select>  
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            
                                            <div class="col-xs-6">
                                                 <label class = "font-weight-bold" for="playing_role">Playing Role</label>
                                                 <input type="text" class="form-control" name="playing_role" value="{{ $player->playing_role }}"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            
                                            <div class="col-xs-6">
                                                <label class = "font-weight-bold" for="batting_style">Batting Style</label>
                                                <input type="text" class="form-control" name="batting_style" value="{{ $player->batting_style }}"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            
                                            <div class="col-xs-6">
                                                <label class = "font-weight-bold" for="bowling_style">Bowling Style</label>
                                                <input type="text" class="form-control" name="bowling_style" value="{{ $player->bowling_style }}"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            
                                            <div class="col-xs-6">
                                                 <label class = "font-weight-bold" for="career_info">Career Information</label>
                                                 <input type="text" class="form-control" name="career_info" value="{{ $player->career_info }}"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                    <br>
                                                    <button class="btn btn-lg btn-success" style="margin-right: 30px" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                                    <button class="btn btn-lg btn-default-outline btn btn-primary" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                                                </div>
                                        </div>
                                    </form>
                                                                                                        
                </div>
            </div>
        </div>
    </div>
</div>
<script>
        function onlyNumberKey(evt) {
            // Only ASCII charactar in that range allowed
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                return false;
            return true;
        }
    </script>

    <script type="text/javascript">
    $('.date').datepicker({
        format: 'dd/mm/yyyy'
    });

</script>
<script>
$(".hBack").on("click", function(e){
    e.preventDefault();
    window.history.back();
});
</script>
@endsection
