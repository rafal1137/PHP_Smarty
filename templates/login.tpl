{include file="header.tpl"}

<div class="login-page">
    <form class="form" action="{$SCRIPT_NAME}" method="post">
        <p>Username: <input class="input" type="text" name="username" value="" /></p>
    <p>Password: <input class="input" type="password" name="password" value="" /></p>
    <input class="button" type="submit" name="login" value="Log in" />
    </form>
</div>
{include file="footer.tpl"}