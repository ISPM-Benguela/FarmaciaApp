@if (Session::has('info'))
<script>
        $(document).ready(function(){
          $.alert({
              title: 'Atenção!',
              content: "{!! Session::get('info') !!}",
          });
        })
      </script>
@endif

@if (Session::has('success'))
     <script>
        $(document).ready(function(){
          $.alert({
              title: 'Atenção!',
              content: "{!! Session::get('success') !!}",
          });
        })
      </script>
@endif

@if (Session::has('warning'))
<div class="clearfix"></div>
<div class="alert alert-warning" role="alert">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {!! Session::get('warning') !!}
</div>
@endif

@if (Session::has('error'))
<div class="clearfix"></div>
<div class="alert alert-danger" role="alert">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {!! Session::get('error') !!}
</div>
@endif