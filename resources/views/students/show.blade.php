@extends('master')

@section('content')


<div class="container">
	<div class="row">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

<div class="container">
  <div class="row ">
  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- bootsnipp Circle Menu -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-5715866801509976"
     data-ad-slot="3922266447"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>


<br>
<br>
<div class="col-lg-12">
  <div>
    <div class="container well">
      <div class=" = col-lg-6">
      Name : &emsp; {{$user->name}}<br>
      ID:  &nbsp; &emsp; &emsp; {{$user-> id}}<br>
      email: &nbsp; &emsp; {{$user->email}}<br>
    </div>
    <div class=" = col-lg-6">
    Batch:  &emsp;  &emsp;{{$user->batch}} <br>
    Sex: &emsp;   &emsp; &emsp;{{$user->sex}} <br>
    address:   &nbsp; &emsp; {{$user->address}} <br>
  </div>
    </div>
  </div>
</div>



<div class="col-lg-12">
  <div>

@for ($i = 0; $i < 10; $i++)
<div class="col-md-4">
  <div class="profile-card text-center well">

    <!-- <img class="img-responsive" src="https://images.unsplash.com/photo-1454678904372-2ca94103eca4?crop=entropy&fit=crop&fm=jpg&h=975&ixjsv=2.1.0&ixlib=rb-0.3.5&q=80&w=1925"> -->
    <div class="profile-info">


      <h2 class="hvr-underline-from-center"><span>Carom</span></h2>
      <div>Activity Details</div>
    </div>

  </div>
</div>
@endfor



      </div>
    </div>
  </div>
</div>
	</div>
</div>

@endsection
