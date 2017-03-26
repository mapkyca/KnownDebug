

<div class="row">

    <div class="col-md-10 col-md-offset-1">
	<?= $this->draw('admin/menu') ?>
        <h1>Entity dump</h1>
    </div>

</div>

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <form action="<?= \Idno\Core\site()->config()->getURL() ?>admin/entitydump/" class="form-horizontal" method="post">


            <div class="controls-group">
                <p>
                    Display raw details of an entity.
                </p>


            </div>

	    <div class="controls-group">
                <p>
                    <label class="control-label" for="uuid">UUID/ID/Slug</label>
                    <input type="text" placeholder="" class="form-control" name="uuid" value="<?= htmlentities(\Idno\Core\Idno::site()->currentPage()->getInput('uuid')); ?>" required >
                </p>



            </div>

            <div class="controls-group">
                <div class="controls-save">
                    <button type="submit" class="btn btn-primary">Dump</button>
                </div>
            </div>
	    <?= \Idno\Core\site()->actions()->signForm('/admin/entitydump/') ?>
        </form>
    </div>

</div>

<div class="row">
    <div class="col-md-10 col-md-offset-1">

	<?php
	if (!empty($vars['entities'])) {
	    ?>
    	<hr>

	    <?php
	    if (count($vars['entities']) == 1) {
		?>
		<pre>
<?= htmlentities(print_r($vars['entities'][0], true)); ?>
		</pre>
		    <?php
		} else {
	
		    ?>
	<ul>
	<?php	    
		    foreach ($vars['entities'] as $entity) {
			
			?>
	    <li><a href="#collapse-<?= $entity->getID(); ?>" data-toggle="collapse"><?= $entity->getUUID(); ?></a>
		<div id="collapse-<?= $entity->getID(); ?>" class="collapse">
		    <pre>
<?= htmlentities(print_r($entity, true)); ?>
		</pre>
		</div>
	    </li>
			<?php
			
			
		    }
		    ?>
	</ul>
		<?php    
		}
		?>

	    <?php
	}
	?>
    </div>
</div>