@extends('layouts.dashboard')
@section('page_body')

<!--delete studentModal -->
<div class="modal fade" id="deleteBusinessModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Remove Business</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <input type="hidden" id="delete_business_id">
                <h4><em>Are you sure you want to delete? <span class="business_name"></span></em></h4>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary delete_business_btn">Yes Delete</button>
            </div>
        </div>
    </div>
</div>
<!-- end delete student modal-->

<div class="row">
    <div class="col-md-12 text-center">
        <h1>Welcome on board</h1>
    </div>

    <div class="col-md-6 offset-3">
        <em style="font-size:20px;" class="text-center">Get business by category...</em>

        <form method="GET" action="" id="get_categories">
            @csrf
            <div class="input-group mb-3 mt-2">

                <select class="form-select" name="category" class="category" id="inputGroupSelect04">
                    <option value="">Choose...</option>
                    @foreach ($categories as $cat)
                    <option value="{{$cat->id}}">{{$cat->category}}</option>
                    @endforeach
                </select>

                <button class="btn btn-outline-secondary" type="button">Get</button>
            </div>
        </form>
    </div>
</div>

<div class="row mt-5">
    <div class="col-md-8 offset-2">
        <em class="success">{{session('Success')}}</em>
       
        <div class="row">
            @forelse ($businesses as $business)
            <div class="col-sm-6 mb-2">
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">{{$business->business_name}}</h5>
                        <p class="card-text">
                            {{$business->description}}
                        </p>

                        <a href="{{route('dashboard.show-business', $business->business_name)}}" class="btn btn-outline-secondary"><span class="fa fa-eye"></span></a>

                        <a href="{{route('dashboard.edit-business', $business->business_name)}}" class="btn btn-outline-secondary"><span class="fa fa-edit"></span></a>

                        <button value="{{$business->id}}" class="btn btn-outline-secondary delete_btn"><span class="fa fa-trash"></span></button>



                    </div>
                </div>
            </div>
            @empty
            <em class="text-center">You have not added a business</em>
            @endforelse

        </div>

    </div>

</div>

@endsection

@section('scripts')

<script>
    $(document).ready(function() {

        $(document).on('click', '.delete_btn', function(e) {
            e.preventDefault()
            let business_id = $(this).val()
            $('#delete_business_id').val(business_id)
            jQuery('#deleteBusinessModal').modal('show')

            $.ajax({
                type: "GET",
                url: `/dashboard/delete-business/${business_id}/delete`,
                success: function(response) {
                    if (response.status == 200) {
                        $('.business_name').text(response.business.business_name)
                    }
                }
            });
        })

        $(document).on('click', '.delete_business_btn', function(e) {
            e.preventDefault()
            $(this).text('Deleting...')
            let business_id = $('#delete_business_id').val()

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: `/dashboard/business/${business_id}/delete`,
                success: function (response) {        
                    jQuery('#deleteBusinessModal').modal('hide')
                    $('.delete_business_btn').text('Yes')
                    location.reload('true')
                }
            });

        })

    });
</script>

@endsection