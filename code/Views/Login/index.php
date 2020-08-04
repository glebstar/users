<h1>Login</h1>
<?php if(isset($this->_pars['errors'])): ?>
    <?php foreach ($this->_pars['errors'] as $e): ?>
    <p class="error"><?=$e; ?></p>
    <?php endforeach; ?>
<?php endif; ?>
<form action="/login-post" method="post">
    <input type="text" name="login" placeholder="login" value="<?=old('login'); ?>"><br>
    <input type="password" name="password" placeholder="password"><br>
    <button type="submit">Login</button>
</form>

<p><a href="/">Home page</a> | <a href="/register">Registration</a></p>
