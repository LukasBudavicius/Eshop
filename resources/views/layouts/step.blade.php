<div class="stepwizard col-md-offset-3">
    <div class="stepwizard-row setup-panel">
      @if(Request::is('cart'))
      <div class="stepwizard-step">
        <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
        <p>Step 1</p>
      @elseif(Request::is('checkout'))
      <div class="stepwizard-step">
        <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
        <p>Step 2</p>
      </div>
      @elseif(Request::is('buy-page'))
      <div class="stepwizard-step">
        <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
        <p>Step 3</p>
      </div>
      @endif
    </div>
  </div>
