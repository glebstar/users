<h1>Account</h1>
<?php if(isset($this->_pars['errors'])): ?>
    <?php foreach ($this->_pars['errors'] as $e): ?>
        <p class="error"><?=$e; ?></p>
    <?php endforeach; ?>
<?php endif; ?>

<?php if(isset($this->_pars['message'])): ?>
    <p class="success"><?=$this->_pars['message']; ?></p>
<?php endif; ?>
<form action="/account-post" method="post">
    <input type="text" name="email" value="<?=$this->_pars['user']['email']; ?>" disabled><br>
    <input type="text" name="login" placeholder="login" value="<?=$this->_pars['user']['login']; ?>" disabled><br>
    <input type="text" name="fio" placeholder="full name" value="<?=old('fio', $this->_pars['user']['fio']); ?>"><br>
    <input type="password" name="password" placeholder="new password"><br>
    <input type="password" name="confirm-password" placeholder="confirm password"><br>
    <button type="submit">Update</button>
</form>

<p><a href="/">Home page</a> | <a href="/logout">Logout</a></p>
