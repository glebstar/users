<h1>Registration</h1>
<?php if(isset($this->_pars['errors'])): ?>
    <?php foreach ($this->_pars['errors'] as $e): ?>
        <p class="error"><?=$e; ?></p>
    <?php endforeach; ?>
<?php endif; ?>
<form action="/register-post" method="post">
    <input type="text" name="email" placeholder="email" value="<?=old('email'); ?>"><br>
    <input type="text" name="login" placeholder="login" value="<?=old('login'); ?>"><br>
    <input type="text" name="fio" placeholder="full name" value="<?=old('fio'); ?>"><br>
    <input type="password" name="password" placeholder="password"><br>
    <input type="password" name="confirm-password" placeholder="confirm password"><br>
    <button type="submit">Register</button>
</form>

<p><a href="/">Home</a> | <a href="/login">Login</a></p>
