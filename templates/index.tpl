{include file="header.tpl"}

<b>Hello world, {$name}</b>
{if $member == true}
    <a href="{$SCRIPT_NAME}?page=logout">Log out</a>
    <p>Hello you are logged in here</p>
    <p>SID: {$sid}</p>
    <p>Auth; {$auth}</p>
{/if}

{include file="header.tpl"}