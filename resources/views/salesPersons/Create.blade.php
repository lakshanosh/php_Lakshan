@extends('salesPersons.Layout')

@section('content')

<div class="container-sm">
    <div class="bg-info rounded bg-gradient text-gray">
        <h3>Add Sales Represenatative</h3>      
    </div>

<div class="row">
    <div class="col-lg-12 margin-tb">
    
        <div class="pull-right">
            <a href="{{route('salesperson.index')}}" class="btn btn-primary">Back</a>
        </div>
    </div>
</div>

@if($errors->any())
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach    
        </ul>
    </div>
    @endif

    <form action="{{route('salesperson.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="form-group">
                    <strong> Name : </strong>
                    <input type="text" name="name" class="form-control" placeholder="Full Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="form-group">
                    <strong>
                        Email :
                    </strong>
                    <input type="text" name="email" class="form-control" placeholder="Email">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="form-group">
                    <strong>
                        Telephone :
                    </strong>
                    <input type="text" name="telephone" class="form-control" placeholder="Telephone">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="form-group">
                    <strong>
                        Joined Date :
                    </strong>
                    <input type="Date" name="join_date" class="form-control" placeholder="Join Date">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="form-group">
                    <strong>
                        Current Routes :
                    </strong>
                    <input type="text" name="current_route" class="form-control" placeholder="Current Route">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="form-group">
                    <strong>
                       Comments :
                    </strong>
                    <textarea name="comments" class="form-control" placeholder="Comments"></textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 ">
                <button class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>
</div>    
@endsection