<?php echo Form::open(['method' => 'POST', 'route' => 'backlogSync', 'class' => 'form-horizontal']); ?>


    <div class="form-group<?php echo e($errors->has('image') ? ' has-error' : ''); ?>">
        <?php echo Form::label('image', 'File label'); ?>

        <?php echo Form::file('image[]', ['required' => 'required']); ?>

        <p class="help-block">Help block text</p>
        <small class="text-danger"><?php echo e($errors->first('image')); ?></small>
    </div>

    <div class="form-group<?php echo e($errors->has('image') ? ' has-error' : ''); ?>">
        <?php echo Form::label('image', 'File label'); ?>

        <?php echo Form::file('image[]', ['required' => 'required']); ?>

        <p class="help-block">Help block text</p>
        <small class="text-danger"><?php echo e($errors->first('image')); ?></small>
    </div>


    <div class="form-group<?php echo e($errors->has('image') ? ' has-error' : ''); ?>">
        <?php echo Form::label('image', 'File label'); ?>

        <?php echo Form::file('image[]', ['required' => 'required']); ?>

        <p class="help-block">Help block text</p>
        <small class="text-danger"><?php echo e($errors->first('image')); ?></small>
    </div>

    <div class="btn-group pull-right">
        <?php echo Form::reset("Reset", ['class' => 'btn btn-warning']); ?>

        <?php echo Form::submit("Add", ['class' => 'btn btn-success']); ?>

    </div>

<?php echo Form::close(); ?><?php /**PATH /home/sanixu9b/public_html/app/resources/views/web/sync.blade.php ENDPATH**/ ?>