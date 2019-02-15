
<div class="row">
  <div class ="col-md-12">
<nav class="navbar navbar-light">
  <span class="navbar-brand mb-0 h1 mx-auto">Notre maison</span>
</nav>



<nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="{{url('/')}}">Acceuil</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{url('sale')}}">Soldes <span class="sr-only">(current)</span></a>
      </li>
      @forelse($categories as $id => $title)
      <li class="nav-item">
        <a class="nav-link" href="{{url('category', $id)}}">{{$title}}</a>
        
      </li>
      @empty
      <li class="nav-item">Vide</li>
      @endforelse
    </ul>

  </div>

  
</nav>
</div>
</div>