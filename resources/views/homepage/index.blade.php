@extends('layouts.template')
@section('content')
<style>
  .row .card:hover {
      box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.4);
      transform: scale(1.02);
  }
  </style>
<div class="container">
    <!-- carousel -->
    <div class="row">
      <div class="col">
        <div id="carousel" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            @foreach($itemslide as $index => $slide )
              @if($index == 0)
                <div class="carousel-item active">
                    <img src="{{ \Storage::url($slide->foto) }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>{{ $slide->caption_title }}</h5>
                      <p>{{ $slide->caption_content }}</p>
                    </div>
                </div>
              @else
                <div class="carousel-item">
                    <img src="{{ \Storage::url($slide->foto) }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>{{ $slide->caption_title }}</h5>
                      <p>{{ $slide->caption_content }}</p>
                    </div>
                </div>
              @endif
            @endforeach          
          </div>
          <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
    <!-- end carousel -->

  <!-- kategori produk -->
  <div class="row mt-4">
    <div class="col col-md-12 col-sm-12 mb-4">
      <h2 class="text-center"> 
        <div class="Color-huruf">
          <span><b>K</b></span>ategori <span><b>P</b></span>roduk 
        </div>
      </h2>
      <hr>
    </div>
    @foreach($itemkategori as $kategori)
      <!-- kategori pertama -->
      <div class="col-md-4">
        <div class="card mb-4 shadow-sm">
          <a href="{{ URL::to('kategori/'.$kategori->slug_kategori) }}">
            @if($kategori->foto != null)
              <img src="{{ \Storage::url($kategori->foto) }}" alt="{{ $kategori->nama_kategori }}" class="card-img-top">
            @else
              <img src="{{ asset('') }}" alt="{{ $kategori->nama_kategori }}" class="card-img-top">
            @endif
          </a>
          <div class="card-body">
            <a href="{{ URL::to('kategori/'.$kategori->slug_kategori) }}" class="text-decoration-none color-text">
              <p class="card-text "> <b> {{ $kategori->nama_kategori }}</b></p>
            </a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
  <!-- end kategori produk -->

  <!-- produk Promo-->
  <div class="row mt-4">
    <div class="col col-md-12 col-sm-12 mb-4">
      <h2 class="text-center Color-huruf"> <span><b>P</b></span>romo</h2>
      <hr>
    </div>
    @foreach($itempromo as $promo)
      <!-- produk pertama -->
      <div class="col-md-4">
        <div class="card mb-4 shadow-sm">
          <a href="{{ URL::to('produk/'.$promo->produk->slug_produk) }}">
            @if($promo->produk->foto != null)
              <img src="{{\Storage::url($promo->produk->foto) }}" alt="{{ $promo->produk->nama_produk }}" class="card-img-top">
            @else
              <img src="{{asset('') }}" alt="{{ $promo->produk->nama_produk }}" class="card-img-top">
            @endif
          </a>
          <div class="card-body">
            <a href="{{ URL::to('produk/'.$promo->produk->slug_produk) }}" class="text-decoration-none">
              <p class="card-text color-text ">
                {{ $promo->produk->nama_produk }}
              </p>
            </a>
            <div class="row mt-4">
              <div class="col">
                <button class="btn btn-light">
                  <i class="far fa-heart"></i>
                </button>
              </div>
              <div class="col-auto">
                <p>
                  <del>Rp. {{ number_format($promo->harga_awal, 2) }}</del>
                  <br />
                  Rp. {{ number_format($promo->harga_akhir, 2) }}
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
  <!-- end produk promo -->

  <!-- produk Terbaru-->
  <div class="row mt-4 mb-5">
    <div class="col col-md-12 col-sm-12 mb-4">
      <h2 class="text-center Color-huruf"> <span><b>P</b></span>roduk  <span><b>T</b></span>erbaru</h2>
      <hr>
    </div>
    @foreach($itemproduk as $produk)
      <!-- produk pertama -->
      <div class="col-md-4">
        <div class="card mb-4 shadow-sm">
          <a href="{{ URL::to('produk/satu') }}">
            @if($produk->foto != null)
              <img src="{{ \Storage::url($produk->foto) }}" alt="{{ $produk->nama_produk }}" class="card-img-top">
            @else
              <img src="{{ asset('images/bag.jpg') }}" alt="{{ $produk->nama_produk }}" class="card-img-top">
            @endif
          </a>
            <div class="card-body">
              <a href="{{ URL::to('produk/'.$produk->slug_produk ) }}" class="text-decoration-none">
                <p class="card-text color-text"> <b>
                  {{ $produk->nama_produk }}
                  </b>
                </p>
              </a>
                <div class="row mt-4">
                  <div class="col">
                    <button class="btn btn-light">
                      <i class="far fa-heart"></i>
                    </button>
                  </div>
                  <div class="col-auto">
                    <p>
                      Rp. {{ number_format($produk->harga, 2) }}
                    </p>
                  </div>
                </div>
            </div>
        </div>
      </div>
    @endforeach
    <!-- end produk terbaru -->
  </div>
</div>
@endsection