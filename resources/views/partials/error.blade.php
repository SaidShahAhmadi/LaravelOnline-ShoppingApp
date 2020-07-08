<script>
        $(document).ready(function(){

             // Toastr Notification Demo
             @if(Session::has('success_message'))
                    toastr.success("{{Session::get('success_message')}}");   
             @endif

            @if(Session::has('delete_message'))
                    toastr.error("{{Session::get('delete_message')}}");
            @endif

            // // the error meassage will hide in 2 second
            //   $(".alert-danger").delay(2000).slideUp(200);
            // // the success meassage will hide in 2 second
            //   $(".alert-success").delay(2000).slideUp(200);

        });
  </script>

{{-- @if(count($errors))
        @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>{{$error}}</strong>  
                </div>
        @endforeach
@endif --}}



