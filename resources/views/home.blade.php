@extends('layouts.master')

@section('title')
J3 Foods - Online Food Ordering
@endsection



@section('navigation')
@include('includes.topbar')
@endsection


@section('content')
<div class="container-fluid" id="landingpage-container">
  <div class="row">
        <div class="col-md-12 text-center" id="lpgreet">
			<div class="row">
				<div class="col-sm-6">
					<a href= "{{ route('logincust')    }}"> <button type="button" class="button btn-lg" id="landinglogin-cus" >Customer</button> </a>
				</div>
				<div class="col-sm-6">
					<a href="{{ route('loginrest') }}"> <button type="button" class="button btn-lg" id="landinglogin-res" >Restaurant</button> </a>
				</div>
			</div>
		</div>
	</div>
  <div class="row" id="lpinfo">
    <h1 id="lpinfo-heading">What do we offer?</h1>
    <div class="col-md-4">
      <div class="card card-block">
        <h1 class="card-title text-center">Registered Customer</h1>
        <img class="img-circle img-responsive center-block" src="images/placeholder2.png"  alt="...">
        <p class="card-text">Are you  hungry but don't want to leave the house? Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı 1500'lerden beri endüstri standardı sahte metinler olarak kullanılmıştır. Beşyüz yıl boyunca varlığını sürdürmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sıçramıştır. 1960'larda Lorem Ipsum pasajları da içeren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum sürümleri içeren masaüstü yayıncılık yazılımları ile popüler olmuştur.</p>
        <a href=" {{ url('/home') }}" class="btn btn-primary btn-block">Get Started</a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card card-block">
        <h1 class="card-title text-center">Restaurant Owner</h1>
        <img class="img-circle img-responsive center-block" src="images/placeholder2.png"  alt="...">
        <p class="card-text">Are you a local restaurant owner interested in reaching more customers mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı 1500'lerden beri endüstri standardı sahte metinler olarak kullanılmıştır. Beşyüz yıl boyunca varlığını sürdürmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sıçramıştır. 1960'larda Lorem Ipsum pasajları da içeren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum sürümleri içeren masaüstü yayıncılık yazılımları ile popüler olmuştur.</p>
        <a href="{{  url('/home') }}" class="btn btn-primary  btn-block">Get Started</a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card card-block">
        <h1 class="card-title text-center">Guest</h1>
        <img class="img-circle img-responsive center-block" src="images/placeholder2.png"  alt="...">
        <p class="card-text">Too hungry to provide all that information kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı 1500'lerden beri endüstri standardı sahte metinler olarak kullanılmıştır. Beşyüz yıl boyunca varlığını sürdürmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sıçramıştır. 1960'larda Lorem Ipsum pasajları da içeren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum sürümleri içeren masaüstü yayıncılık yazılımları ile popüler olmuştur.</p>
        <a href="{{  url('/home') }}" class="btn btn-primary  btn-block">Get Started</a>
      </div>
    </div>
  </div>


</div>
@endsection
