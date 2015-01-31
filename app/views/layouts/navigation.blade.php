<div class="navbar-header">
  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
  {{ HTML::link('/', 'wics', array('class' => 'navbar-brand')) }}
</div>
<ul class="nav navbar-right top-nav">
  @if(Auth::check())
    <ul class="nav navbar-nav navbar-right">
      <li>{{ HTML::link('profile', 'Profile') }}</li>
      <li>{{ HTML::link('help', 'Help') }}</li>
      <li>{{ HTML::link('logout', 'Logout ('.Auth::user()->userName.')') }}</li>
    </ul>
  @else
    <ul class="nav navbar-nav navbar-right"> 
      <li>{{ HTML::link('help', 'Help') }}</li>
    </ul>
  @endif
</ul>