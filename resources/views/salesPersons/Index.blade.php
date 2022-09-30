@extends('salesPersons.Layout')

@section('contents')
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>


<div class="container-sm">

    <div class="bg-info rounded bg-gradient text-gray">
        <h3>Sales Team</h3>      
    </div>

    <div class="pull-left">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="full-right">
                    <a class="btn btn-success" href="{{route('salesperson.create')}}">Create New Sales</a>
                </div>
            </div>
        </div>

        @if($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div>
        @endif
        
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Telephone</th>
                <th>Current Route</th>
                <th>Action</th>
                
            </tr>
            @foreach ($salespersons as $saleSperson)
            <tr>
                <td>{{++$i}}</td>
                <td>{{$saleSperson->name}}</td>
                <td>{{$saleSperson->email}}</td>
                <td>{{$saleSperson->telephone}}</td>
                <td>{{$saleSperson->current_route}}</td>
                <td>
                    <form action="{{ route('salesperson.destroy', $saleSperson->id)}}" id="form" onsubmit="submitForm(event)" method="POST">
                        <a href="" class="btn btn-info"
                        data-toggle="modal" data-target="#exampleModalLong{{ $saleSperson->id}}">Show</a>


                        <!-- Modal Sales Person-->
                        <div class="modal fade" id="exampleModalLong{{ $saleSperson->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">{{$saleSperson->name}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Id</th>
                                        <td>{{$saleSperson->id}}</td>
                                    </tr>
                                    <tr>
                                        <th>Full Name</th>
                                        <td>{{$saleSperson->name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Email Address</th>
                                        <td>{{$saleSperson->email}}</td>
                                    </tr>
                                    <tr>
                                        <th>Telephone</th>
                                        <td>{{$saleSperson->telephone}}</td>
                                    </tr>
                                    <tr>
                                        <th>Joined Date</th>
                                        <td>{{$saleSperson->join_date}}</td>
                                    </tr>
                                    <tr>
                                        <th>Current Routes</th>
                                        <td>{{$saleSperson->current_route}}</td>
                                    </tr>
                                    <tr>
                                        <th>Comments</th>
                                        <td>{{$saleSperson->comments}}</td>
                                    </tr>
                                </table>    
                            </div>
                            
                            </div>
                        </div>
                        </div>
                        <!-- End of the model-->

                        <a href="{{ route('salesperson.edit', $saleSperson->id) }}" class="btn btn-primary">Edit</a>
            
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>

    </div>
</div>

<script type="text/JavaScript">

    function submitForm(event){

        if (confirm('Are you sure to delete...?')) {
            return true;
        } else {
           
            event.preventDefault();
        }
      
  }
        
</script>