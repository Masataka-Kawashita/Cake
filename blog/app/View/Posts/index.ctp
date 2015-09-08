<h2>記事一覧</h2>

<ul>
	<?php foreach ($posts as $post) : ?>
	<li id="post_<?php echo h($post['Post']['id']); ?>">
		<?php echo $this->Html->link($post['Post']['title'], '/posts/view/'.$post['Post']['id']); ?>
		<?php echo $this->Html->link('編集',array('action'=>'edit',$post['Post']['id']))?>

            <?php echo $this->Form->postLink(
                'Delete',
                array('action' => 'delete', $post['Post']['id']),
                array('confirm' => 'Are you sure?'));
            ?>	</li>
	
	<?php endforeach; ?>
</ul>

<h2>Add Post</h2>
<?php echo $this->Html->link('Add post',array('controller'=>'posts','action'=>'add'));
?>
<script>
	$(function() {
	  $('a.delete').click(function(e) {
	  	if(confirm('Are you sure?')){
	  		$.post('/blog/posts/delete/'+$(this).data('post-id'),{},
	  		function(res) {
				$('#post_'+res.id).fadeOut("slow");
			  },"json");
	  	}
		return false;
	  });
	});
</script>