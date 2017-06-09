<h1>Oops</h1>
<p class="lead">Something went wrong.</p>
<?php if(Session::get('role') == 'admin') { ?>
<div class="alert alert-danger"><?=$data['error'];?></div>
<?php } ?>