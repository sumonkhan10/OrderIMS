<?php
$this->breadcrumbs=array(
	'Issues'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Issue', 'url'=>array('index')),
	array('label'=>'Create Issue', 'url'=>array('create')),
	array('label'=>'Update Issue', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Issue', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Issue', 'url'=>array('admin')),
);
?>

<h1>View Issue #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
		'project_name',
		array(
			'name'=>'type_id',
			'value'=>CHtml::encode($model->getTypeText())
		),
		array(
			'name'=>'status_id',
			'value'=>CHtml::encode($model->getStatusText())
		),
		array(
			'name'=>'owner_id',
			'value'=>CHtml::encode($model->owner->username)
		),
        array(
			'name'=>'requester_id',
			'value'=>CHtml::encode($model->requester->username)
		),
	),
)); ?>

<div id="comments">
    <?php if($model->commentCount >= 0): ?>
    <h3>
        <?php echo $model->commentCount .' Comments'?>
    </h3>
        <?php $this->renderPartial('_comments',array('comments' => $model->comments));?>
    <?php endif; ?>
    
    <h3> Leave a comment</h3>
    
    <?php if(Yii::app()->user->hasFlash('commentSubmitted')): ?>
		<div class="flash-success">
			<?php echo Yii::app()->user->getFlash('commentSubmitted'); ?>
		</div>
	<?php else: ?>
		<?php $this->renderPartial('/comment/_form',array('model'=>$comment,)); ?>
	<?php endif; ?>
    
</div>