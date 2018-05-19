{extends 'file:templates/base.tpl'}
{block 'CONTAINER'}
    <article>
        {include 'file:chunks/common/slider.tpl'}
    </article>
   {$_modx->resource.content}
{/block}