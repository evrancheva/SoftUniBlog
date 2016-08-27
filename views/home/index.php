

<aside>
    <h2>Recent Posts</h2>
    <?php foreach ($this->sidebarPosts as $post) : ?>
    <a href="<?=APP_ROOT?>/home/view/<?=$post['id']?>"><?=htmlentities($post['title'])?></a>
    <?php endforeach;?>
</aside>
<div class="container">
<main id="posts">
<?php $this->title = 'Welcome to My Blog'; ?>

<h1><?=htmlspecialchars($this->title)?></h1>
    <article>
        <?php foreach ($this->posts as $post):?>
        <h2 class="title"><?=htmlentities($post['title'])?></h2>
        <div class="date"><i>Posted on</i><?=(new DateTime($post['date']))->format('d-M-y')?>
        <i>by</i> <?=htmlentities($post['full_name'])?></div>

        <p class="content"><?=$post['content']?></p>
        <?php endforeach;?>


    </article>
</main>
</div>