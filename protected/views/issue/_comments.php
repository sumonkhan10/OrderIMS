

<?php foreach ($comments as $comment): ?>
<div class="comment">
    <?php 
        echo $comment->author->username . ': <br>'
                . date('j F, Y \a\t g:i:s a', strtotime($comment->create_time)) . '<br>' 
                . CHtml::encode($comment->content);     
    ?>
    <hr>
</div>
<?php endforeach; ?>


 
