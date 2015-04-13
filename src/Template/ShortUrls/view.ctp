<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Short Url'), ['action' => 'edit', $shortUrl->serial]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Short Url'), ['action' => 'delete', $shortUrl->serial], ['confirm' => __('Are you sure you want to delete # {0}?', $shortUrl->serial)]) ?> </li>
        <li><?= $this->Html->link(__('List Short Urls'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Short Url'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="shortUrls view large-10 medium-9 columns">
    <h2><?= h($shortUrl->serial) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('ShortUrl') ?></h6>
            <p><?= h($shortUrl->shortUrl) ?></p>
            <h6 class="subheader"><?= __('LongUrl') ?></h6>
            <p><?= h($shortUrl->longUrl) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Serial') ?></h6>
            <p><?= $this->Number->format($shortUrl->serial) ?></p>
            <h6 class="subheader"><?= __('TimeStamp') ?></h6>
            <p><?= $this->Number->format($shortUrl->timeStamp) ?></p>
        </div>
    </div>
</div>
