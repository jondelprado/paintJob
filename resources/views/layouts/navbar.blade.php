<div class="row">

  <div class="col-lg-12 banner">


    <h1>JUAN'S AUTO PAINT</h1>

  </div>

</div>

  @if (empty($adminlink))
    @php
      $adminlink = "";
    @endphp
  @endif

  @if (empty($admintext))
    @php
      $admintext = "white";
    @endphp
  @endif

  @if (empty($homelink))
    @php
      $homelink = "";
    @endphp
  @endif

  @if (empty($hometext))
    @php
      $hometext = "white";
    @endphp
  @endif

<nav class="navbar navbar-expand-lg navbar-light nav_class">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item {{$homelink}}">
        <a style="color: {{$hometext}};" class="nav-link" href="http://localhost/paintJob/public/new-paint-job"><b>NEW PAINT JOB</b></a>
      </li>
      <li class="nav-item {{$adminlink}}">
        <a style="color: {{$admintext}};" class="nav-link" href="http://localhost/paintJob/public/paint-jobs"><b>PAINT JOBS</b></a>
      </li>
    </ul>
  </div>
</nav>
