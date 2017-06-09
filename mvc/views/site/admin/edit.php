<h3>Edit review</h3>
<form action="" method="post">
    <div class="form-group">
        <label for="author">Author</label>
        <input type="text" name="author" value="<?= $data['review']['author'] ?>" class="form-control">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" value="<?= $data['review']['email'] ?>" class="form-control">
    </div>
    <div class="form-group">
        <label for="message">Message</label>
        <textarea name="message" class="form-control"><?= $data['review']['message'] ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>