@extends('layout')

<!-- @section('meta-title',$post->title) -->
@section('meta-title')
  $post->title
@endsection

@section('meta-description',$post->excerpt)


@section('contenido')
	
    <article class="post container">


      @include( $post->viewType())


        <div class="content-post">

          @include('posts.header')


          <h1>{{ $post->title }}</h1>

          <div class="divider"></div>
          <div class="image-w-text">
              
              {!! $post->body !!}
              
          </div>

           <footer class="container-flex space-between">
              <!-- al usar de esta manera description toma valores de acuerdo al url donde se encuantra-->	
              @include('partials.social-links',['description'=>$post->title])

              @include('posts.tags')

           </footer>

          <div class="comments">
            <div class="divider"></div>
            <div id="disqus_thread"></div>

            @include('partials.disqus-script')
                                    
          </div><!-- .comments -->

        </div>
    </article>

@endsection


@push('styles')

  <link rel="stylesheet" type="text/css" href="/css/twiter-bootstrap.css">

@endpush


@push('scripts')

	<script id="dsq-count-scr" src="//zendero.disqus.com/count.js" async></script>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

  <script src="/js/twiter-bootstrap.js" async></script>

@endpush
