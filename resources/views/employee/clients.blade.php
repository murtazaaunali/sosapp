@extends('employee.layout.master')
@section('title', 'Clients - Success On The Spectrum')
@section('content')
<style>
* {box-sizing: border-box;}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
}

.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #2196F3;
  color: white;
}

.topnav .search-container {
  float: right;
}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}

.topnav .search-container button {
  float: right;
  padding: 10px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .search-container button:hover {
  background: #ccc;
}

@media screen and (max-width: 600px) {
  .topnav .search-container {
    float: none;
  }
  .topnav a, .topnav input[type=text], .topnav .search-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;  
  }
}
</style>
<div class="row">
    <div class="col-md-12">
        <div class="topnav">
          <div class="search-container">
            <form action="/action_page.php">
              <input type="text" placeholder="Search.." name="search" autocomplete="off">
              <button type="submit"><i class="fa fa-search"></i></button>
            </form>
          </div>
        </div>
    </div>
    <div class="col-md-12 clients-listing">
        <?php if( !empty($clients) ){ 
                foreach ($clients as $key => $client) {
            ?>
            <div class="col-md-4">
                <div class="c-candidate">
                    <div class="c-candidate__cover">
                        <img src="../img/candidate1.jpg" alt="Candidate's Cover photo">
                    </div>
                    <div class="c-candidate__info">
                        <div class="c-candidate__avatar">
                            <img src="{{ URL::asset('client_images/'.$client->picture) }}" alt="client avatar">
                        </div>
                        <div class="c-candidate__meta">
                            <h3 class="c-candidate__title"><?php echo $client->name; ?>
                                <span class="c-candidate__country">
                                    Started <?php echo date("d F, Y", strtotime($client->created_at)); ?>
                                </span>
                            </h3>
                        </div>
                    </div>
                    <div class="c-candidate__footer">
                        <a href="#" class="c-btn c-btn--info">
                            <i class="x-eye u-mr-xsmall"></i>View Client
                        </a>
                        <a href="javascript:void(0);" class="c-btn c-btn--info remove" data-client = "<?php echo $client->client_id; ?>">Remove Client
                        </a>
                        <div class="c-candidate__status">
                            <?php 
                            if( $client->status == 0 ){ 
                                    $status = "Inactive";
                                }
                                else if( $client->status == 1 ){
                                    $status = "Active";
                                }
                                ?>
                            Status: <span class="u-color-success"><?php echo $status; ?></span>
                        </div>
                    </div><!-- // .c-candidate__footer -->
                </div><!-- // .c-candidate -->
            </div>
            <?php 
                }
            } ?>
    </div> 
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('input[name=\'search\']').keyup(function(){ 
            var query = $(this).val();
            if( query.length > 0 )
            {
                query = query;
            }else{
                query = "all";
            }
            $.ajax({
              url:'{!! url('/employee/client/autocomplete') !!}/'+query,
              method:"GET",
              dataType: 'json',
              success:function(data){
                console.log(data);
                  $('.clients-listing').empty();
                  $('.clients-listing').html(data.result);
              }
             });
        });


        $(document).on('click', '.remove', function(){
            var client_id = $(this).attr("data-client");

            swal({
              title: "Are you sure?",
              text: "Once deleted, you will not be able to recover client!",
              icon: "warning",
              buttons: true,
              dangerMode: true
            })
            .then((willDelete) => {
              if (willDelete) {
                 $.ajax({
                    url: "{{ url('/employee/remove_client') }}",
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        '_token': "{{csrf_token()}}",
                        'client_id' : client_id,
                    },
                    success: function(response){
                        if( response ){
                            swal({
                                title:"Congratulation!", 
                                text: "Client Deleted Successfully!", 
                                type:"success", 
                                timer:1000 
                            });
                            location.reload(true); 
                        }
                    }
                });
              }
            });
        });
    });
</script>
@endsection
