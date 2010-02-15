{$content}
<div class="links">
{if $linkcategorys}
{foreach name=lc from=$linkcategorys item=lc}
  <div class="link-category">
    <h3>{$lc.lc_name}</h3>
    {if $lc.lc_desc}<strong>{$lc.lc_desc}</strong><br />{/if}

    {foreach name=lk from=$links item=lk}
    {if $lk.lk_categoryid == $lc.linkcategoryid}
    <!-- [{$lk.lk_name}] -->
    <div class="link">
      {if $lk.lk_image}<img src="images/w100/links/{$lk.lk_image}" alt="{$lk.lk_name}" />{/if}
      <h3><a href="{$lk.lk_url}" target="_BLANK" title="{$lk.lk_url|replace:"http://":""}"{if $lk.lk_follow=='no'} rel="nofollow"{/if}>{$lk.lk_name}</a></h3>
      <p>{if $lk.lk_desc}{$lk.lk_desc}{/if}</p>
    </div>

{/if}
{/foreach}
  </div>
{/foreach}

{elseif $links}

{foreach name=lk from=$links item=lk}
  <!-- [{$lk.lk_name}] -->
  <div class="link">
    {if $lk.lk_image}<a href="{$lk.lk_url}" target="_BLANK" title="{$lk.lk_url|replace:"http://":""}"><img src="images/w100/links/{$lk.lk_image}" alt="{$lk.lk_name}" /></a>{/if}
    <h3><a href="{$lk.lk_url}" target="_BLANK" title="{$lk.lk_url|replace:"http://":""}"{if $lk.lk_follow=='no'} rel="nofollow"{/if}>{$lk.lk_name}</a></h3>
    <p>{if $lk.lk_desc}{$lk.lk_desc}<br />{/if}
    <a href="{$lk.lk_url}" target="_BLANK" title="{$lk.lk_url|replace:"http://":""}">{$lk.lk_url}</a></p>
  </div>

{/foreach}
{else}
<p>There are currently no links in our database.</p>
{/if}
</div>