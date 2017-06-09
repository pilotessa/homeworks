<h1>Lorem Ipsum</h1>
<p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec id ipsum feugiat, suscipit ante in, sagittis nibh. Sed rhoncus ligula ac felis dictum, ac aliquet sapien auctor. Suspendisse vel pharetra augue. Pellentesque nec dictum est. In hac habitasse platea dictumst. Sed ipsum enim, mollis et nibh eget, eleifend volutpat erat. Praesent pulvinar rhoncus sapien, nec rutrum sem sodales a. Sed tincidunt non dui eget imperdiet. Praesent dignissim metus sed dui fermentum porttitor at at nisl. Nullam arcu justo, vestibulum ut aliquam ut, euismod id nisl. Sed blandit mollis felis, nec pretium est tempus eget.</p>
<p>Donec tincidunt tellus vel iaculis laoreet. Donec nulla lorem, euismod sed elit nec, faucibus vulputate sem. Maecenas at mi arcu. Etiam at nisl turpis. Nulla accumsan ac elit id blandit. Ut iaculis pellentesque risus, gravida vehicula ante ornare ullamcorper. Donec accumsan augue dolor, ac interdum lacus sagittis non. Proin vitae pellentesque purus. Donec eu velit lectus. Nullam faucibus nulla in ullamcorper vehicula. Phasellus eleifend sit amet eros et pretium. Fusce ultrices, dolor ac semper viverra, ligula ante auctor nisl, id lobortis dolor turpis et orci.</p>
<p>Nullam arcu nisl, imperdiet eget dui in, dignissim efficitur magna. Proin eget mauris eget odio elementum pellentesque. Sed eu augue a nisl volutpat suscipit a id turpis. Vivamus sit amet viverra mi. Vestibulum turpis mi, dictum ut dui a, maximus commodo felis. Praesent sem metus, scelerisque id suscipit sagittis, aliquam eget ex. Donec sed fringilla metus. Proin eu dolor tincidunt, fermentum est iaculis, sodales odio.</p>
<p>Proin eu vulputate justo, non faucibus ex. Ut sodales erat est, at porta arcu auctor varius. Aenean aliquam ut orci ut lobortis. Proin vel nunc sit amet sem commodo fringilla. Sed eleifend elementum dapibus. Nam consequat tellus non nulla lacinia, vel pretium mauris sollicitudin. Maecenas semper eros in ultrices vestibulum.</p>
<p>Pellentesque et ante ornare purus tincidunt tincidunt. Etiam nec mi non diam blandit convallis id at neque. Nunc posuere condimentum tellus, eget gravida eros mollis vitae. Proin dolor sapien, fermentum non porta vitae, placerat eget enim. Praesent at porta lacus, sit amet laoreet ex. Etiam suscipit auctor lorem a varius. Vestibulum accumsan libero ipsum, et aliquet dolor efficitur vitae. Sed pretium, magna nec porttitor aliquet, ipsum justo faucibus augue, quis posuere mi risus at felis. Duis eget ullamcorper velit, sed rhoncus elit. Suspendisse volutpat eu sem ac auctor. Duis volutpat diam vel odio luctus, id bibendum lorem finibus. Etiam eu lectus bibendum, volutpat est eu, consectetur urna.</p>
<?php if(count($data['reviews'])) { ?>
<h3 id="reviews">Reviews
    <small class="pull-right">order by <a href="<?= Router::uri('/site/index/created#reviews') ?>">date</a> | <a href="<?= Router::uri('/site/index/author#reviews') ?>">author</a> | <a href="<?= Router::uri('/site/index/email#reviews') ?>">email</a></small>
</h3>
<?php } ?>
<?php foreach($data['reviews'] as $review) { ?>
<hr>
<div class="media">
    <?php if($review['image']) { ?>
    <span class="pull-left">
        <img class="media-object" src="<?= Router::uri($review['image']) ?>" alt="">
    </span>
    <?php } ?>
    <div class="media-body">
        <h4 class="media-heading"><a href="mailto:<?= $review['email'] ?>"><?= $review['author'] ?></a>
            <small><?= date('d-m-Y', strtotime($review['created'])) ?></small>
        </h4>
        <?=$review['message']?>
    </div>
</div>
<?php } ?>
<hr>
<div class="media" id="preview-box"></div>
<div class="media well">
    <h4>Leave a Review</h4>
    <form role="form" action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <input type="text" name="author" class="form-control" placeholder="Name" required>
        </div>
        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="form-group">
            <textarea name="message" class="form-control" placeholder="Message"></textarea>
        </div>
        <div class="form-group">
            <input type="file" name="image" class="form-control" accept="image/jpeg,image/png,image/gif">
        </div>
        <button type="submit" class="btn btn-default" id="preview-button">Preview</button>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
