{$content}
<div class="links">
{if $linkcategorys}
{section name=lc loop=$linkcategorys}
  <div class="link-category">
    <h3>{$linkcategorys[lc].lc_name}</h3>
    {if $linkcategorys[lc].lc_desc}<strong>{$linkcategorys[lc].lc_desc}</strong><br />{/if}

    {section name=lk loop=$links}
    {if $links[lk].lk_categoryid == $linkcategorys[lc].linkcategoryid}
    <!-- [{$links[lk].lk_name}] -->
    <div class="link">
      {if $links[lk].lk_image}<img src="images/w100/links/{$links[lk].lk_image}" alt="{$links[lk].lk_name}" />{/if}
      <h3><a href="{$links[lk].lk_url}" target="_BLANK" title="{$links[lk].lk_url|replace:"http://":""}"{if $links[lk].lk_follow=='no'} rel="nofollow"{/if}>{$links[lk].lk_name}</a></h3>
      <p>{if $links[lk].lk_desc}{$links[lk].lk_desc}{/if}</p>
    </div>

{/if}
{/section}
  </div>
{/section}

{else}

{section name=lk loop=$links}
  <!-- [{$links[lk].lk_name}] -->
  <div class="link">
    {if $links[lk].lk_image}<a href="{$links[lk].lk_url}" target="_BLANK" title="{$links[lk].lk_url|replace:"http://":""}"><img src="images/w100/links/{$links[lk].lk_image}" alt="{$links[lk].lk_name}" /></a>{/if}
    <h3><a href="{$links[lk].lk_url}" target="_BLANK" title="{$links[lk].lk_url|replace:"http://":""}"{if $links[lk].lk_follow=='no'} rel="nofollow"{/if}>{$links[lk].lk_name}</a></h3>
    <p>{if $links[lk].lk_desc}{$links[lk].lk_desc}<br />{/if}
    <a href="{$links[lk].lk_url}" target="_BLANK" title="{$links[lk].lk_url|replace:"http://":""}">{$links[lk].lk_url}</a></p>
  </div>

{sectionelse}
  <p>There are currently no links in our database.</p>
{/section}
{/if}
</div>