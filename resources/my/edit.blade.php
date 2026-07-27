@extends('layout.admin')

@section('content')
    <div class="card">

        <div class="card-header">
            <h4 class="card-title">Update Social Links</h4>
        </div>

        <div class="card-body ">
            <form action="" method="post">

                @csrf
                @method('PUT')
                {{--  1  --}}
                <div class="mb-3 form-group">
                    <label> Title </label>


                    <input type="text" name="" class="form-control" value="">
                </div>

        </div>



        
        {{--  button  --}}
        <button class="btn btn-primary"> Update Social Link </button>
        {{--  end  --}}

        </form>
    </div>





    </div>
@endsection
